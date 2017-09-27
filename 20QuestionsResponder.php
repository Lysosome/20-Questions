<?php

//SET UP PDO

$ini_array = parse_ini_file("data.ini.php");

$host = $ini_array["host"];
$dbname = $ini_array["dbname"];
$user = $ini_array["user"];
$password = $ini_array["password"];

try {
    $pdo = new PDO("mysql:dbname=$dbname;host=$host" , $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo("PDO succesfully connected!<br/>");
} catch (PDOException $e) {
    //echo 'Connection failed: ' . $e->getMessage();
}


//DEBUGGING SECTION
/*
if(isset($_REQUEST['lastNodeID']))
{
	$test_node_id=$_REQUEST['lastNodeID'];
	$smt = $pdo->prepare("select * from 20Q_DataTree where id=:test_node_id");
	$smt->bindParam(":test_node_id",$test_node_id);  //bindParam makes sure that it's not a SQL injection statement
	
	if($smt->execute())
	{
		//echo("Smt is executing.<br/>");
		$rows = $smt->fetchAll();	
		print_r($rows);
	}
}
*/


//HANDLE 20 QUESTIONS GAME RESPONSE

function getLeft($node, $pdo)
{
	$smt = $pdo->prepare("select leftChild from 20Q_DataTree where id=:node_id");
	$smt->bindParam(":node_id",$node);
	if($smt->execute())
	{
		//echo("Smt in getLeft is executing.<br/>");
		$rows = $smt->fetchAll();	
		$dataArray=$rows[0];
		return $dataArray['leftChild'];
	}
	else
	{
		//echo("Smt execution in getLeft failed <br/>");	
	}
}

function getRight($node, $pdo)
{
	$smt = $pdo->prepare("select rightChild from 20Q_DataTree where id=:node_id");
	$smt->bindParam(":node_id",$node);
	if($smt->execute())
	{
		//echo("Smt in getRight is executing.<br/>");
		$rows = $smt->fetchAll();	
		$dataArray=$rows[0];
		return $dataArray['rightChild'];
	}
	else
	{
		//echo("Smt execution in getRight failed <br/>");	
	}
}

//$data = json_decode($_REQUEST['data']);

$postdata = file_get_contents("php://input");
//echo "Post Data: ".$postdata;
$data = json_decode($postdata);
//var_dump($data);
$response = $data->response;
$lastNodeID = $data->lastNodeID;
$gameOver = $data->gameOver;
$newItem = $data->newItem;
$newAttribute = $data->newAttribute;
$nextNodeID = -1;
if( isset($response) ) {
	
	
	/*
	$response = $_REQUEST['response'];
	$lastNodeID = $_REQUEST['lastNodeID'];
	$nextNodeID = -1; //-1 means there was an error, any number greater than or equal to 1 refers to a node
	if(isset($_REQUEST['gameOver']))
		$gameOver = $_REQUEST['gameOver']; //0 means game is still going, 1 means user has lost, 2 means user has won
	*/
	//Case where game is over and user is inputting new data
	if($gameOver == 1 || $gameOver == 2)
	{
		if($newItem!="" && $newAttribute!="")
		{
			//save current value to temp
         	$smt = $pdo->prepare("select value from 20Q_DataTree where id=:node_id");
			$smt->bindParam(":node_id",$lastNodeID);
			if($smt->execute())
			{
				$rows = $smt->fetchAll();	
				$dataArray=$rows[0];
				$tempVal = $dataArray['value'];
				//echo("Saving current val $tempVal to temp.<br/>");
			}
			//set current value to newAttribute
			$smt = $pdo->prepare("UPDATE 20Q_DataTree SET value=:newAttribute WHERE id=:node_id");
			$smt->bindParam(":node_id",$lastNodeID);
			$smt->bindParam(":newAttribute",$newAttribute);
			if($smt->execute())
			{
				//echo "Set current node value to $newAttribute <br/>";
			}
			//then create left and right children
			$smt = $pdo->prepare("INSERT INTO 20Q_DataTree (value, leftChild, rightChild) VALUES (:leftValue, 0, 0); INSERT INTO 20Q_DataTree (value, leftChild, rightChild) VALUES (:rightValue, 0, 0)");
			$smt->bindParam(":leftValue",$tempVal);
			$smt->bindParam(":rightValue",$newItem);
			if($smt->execute())
			{
				//echo "Created new children <br/>";
			}
			//get IDs of the newly created left and right children
			$smt = $pdo->prepare("select id from 20Q_DataTree where value = :leftValue");
			$smt->bindParam(":leftValue",$tempVal);
			if($smt->execute())
			{
				//echo("Smt is finding ID of new left child.<br/>");
				$rows = $smt->fetchAll();	
				$dataArray=$rows[0];
				$leftID = $dataArray['id'];
			}
			$smt = $pdo->prepare("select id from 20Q_DataTree where value = :rightValue");
			$smt->bindParam(":rightValue",$newItem);
			if($smt->execute())
			{
				//echo("Smt is finding ID of new right child.<br/>");
				$rows = $smt->fetchAll();	
				$dataArray=$rows[0];
				$rightID = $dataArray['id'];
			}
			//then set currentNode to refer to left and right children.
         	$smt = $pdo->prepare("UPDATE 20Q_DataTree SET leftChild=:leftID, rightChild=:rightID WHERE id=:node_id");
			$smt->bindParam(":node_id",$lastNodeID);
			$smt->bindParam(":leftID",$leftID);
			$smt->bindParam(":rightID",$rightID);
			if($smt->execute())
			{
				//echo "Set current node to refer to left and right children <br/>";
			}
			//DONE
			$displayMessage = "Inserted item '".$newItem."' into my tree of knowledge!";
		}
		else
		{
			$displayMessage = "Error: no new item and/or attribute provided to insert into tree!";	
		}
	}
	
	//Case where game is still going and user's last response was "no"
	else if($response==0)
	{
		if(getLeft($lastNodeID, $pdo) == 0)
		{
			//user wins
			$nextNodeID = $lastNodeID;
			$gameOver = 2;
			$displayMessage =  "You stumped me!  You win.  What is the object you were thinking of?";
		}
		else
		{
			$nextNodeID = getLeft($lastNodeID, $pdo);
			$smt = $pdo->prepare("select value from 20Q_DataTree where id=:node_id");
			$smt->bindParam(":node_id",$nextNodeID);
			if($smt->execute())
			{
				//echo("Smt in finding new left value is executing.<br/>");
				$rows = $smt->fetchAll();	
				$dataArray=$rows[0];
				$attribute = $dataArray['value'];
			}
			else
			{
				//echo("Smt execution failed <br/>");	
			}
			$displayMessage = "Is it ".$attribute."?";
		}
	}
	//Case where game is still going and user's last response was "yes"
	else
	{
		if(getRight($lastNodeID, $pdo) == 0)
		{
			//user loses
			$nextNodeID = $lastNodeID;
			$gameOver = 1;
			$displayMessage =  "I guessed it! Thanks for playing! Play again?";
		}
		else
		{
			$nextNodeID = getRight($lastNodeID, $pdo);
			$smt = $pdo->prepare("select value from 20Q_DataTree where id=:node_id");
			$smt->bindParam(":node_id",$nextNodeID);
			if($smt->execute())
			{
				//echo("Smt in finding new right value is executing.<br/>");
				$rows = $smt->fetchAll();	
				$dataArray=$rows[0];
				$attribute = $dataArray['value'];
			}
			else
			{
				//echo("Smt execution failed <br/>");	
			}
			$displayMessage = "Is it ".$attribute."?";
		}
	}
	
}
//if the game is unable to read in a response
else
{
	$gameOver = 0;
	$nextNodeID = -1;
	$displayMessage = "No response recorded!";
}

$retArr = array("gameOver" => $gameOver, "nextNodeID" => intval($nextNodeID), "displayMessage" => $displayMessage);
echo json_encode($retArr);

?>