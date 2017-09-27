<!doctype html>
<html>
    <head>
    
        <!-- Ben Ma & Ankit Mukherjee Period 7 Web Apps -->
        
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        
        <title>20 Questions</title>
        
        <!--CSS-->
        <link rel="stylesheet" type="text/css" href="style.css">
                
        <!--Typeface-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        
        <!--Favicon-->
        <link rel="icon" type="image/png" href="favicon.png"/>
        
        <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
    </head>
 
    <body>
    <div id="welcome">
            	<p>Welcome to 20 Questions!</p>
    </div>
    <div class="footer">
    	<img src="favicon.png" width="24" height="24" alt=""/>
    </div>
    <div id="container">
            <!--Gets response-->
            <div id="newItem">Your object: 
                <input id="newItemBox" type="text"></input>
            </div>
            <br>
            <div id="newAttribute">What differentiates it from <span class="lastItem"></span>? It is <input id="newAttributeBox" type="text"></input>, but <span class="lastItem"></span> is not. (Try to be as general as possible). </div>
            <br>
            <button id="yesButton">Yes</button>
            <button id="noButton">No</button>
            <button id="submitButton">Submit</button>
            <p id="demo"></p>
            <p id="display"><span style="color:#23CF5F;font-size: 4em; font-family: 'Montserrat', sans-serif;">Is it a living thing?</span></p>
           
            <script>
            //Processes response
            $(function(){
                var currentNode = 1;
                var gameOver = 0;
                var displayMessage = "Is it a living thing?";
                var lastItem = "No item provided";
                resetPage();
                $('#yesButton').click( function() {
                    ajaxRequest(1,"","");
                });
                $('#noButton').click( function() {
                    ajaxRequest(0,"","");
                });
                $('#submitButton').click( function() {
                    ajaxRequest(0,$('#newItemBox').val(),$('#newAttributeBox').val());
                });
                function ajaxRequest(response, newItem, newAttribute)
                {
                    //Prints response (for testing)
                    //document.getElementById("demo").innerHTML = response;
                    
                    //Preparation for AJAX send
                    var lastNodeID = currentNode;
                    var sendData = "{ \"response\": "+response+", \"lastNodeID\": "+lastNodeID+", \"gameOver\": "+gameOver+", \"newItem\": \""+newItem+"\", \"newAttribute\": \""+newAttribute+"\" }";
                    //alert("Requesting using senddata "+sendData);	
                        $.ajax({
                                type: "POST",
                                data: sendData,
                                url: "http://times.bcp.org/webapps/BenMa/20QuestionsResponder.php",
                                success: successFunction
                        });
                }
                function resetPage()
                {
                    currentNode = 1;
                    gameOver = 0;
                    displayMessage = "Is it a living thing?";
                    $("#newItem").hide();
                    $("#newAttribute").hide();
                    $("#submitButton").hide();
                    $("#yesButton").show();
                    $("#noButton").show();
                }
                
                function successFunction( retData ) {
                    //alert(retData);
                    var parsedData = JSON.parse(retData);  
                    displayMessage = parsedData.displayMessage;
                    currentNode = parsedData.nextNodeID;
                    gameOver = parsedData.gameOver;
                    lastItem = parsedData.lastItem;
                    //alert( "Display Message: "+displayMessage+"\nCurrent Node: "+currentNode+"\nGame Over? "+gameOver);
                    
                    if(gameOver=='2')
                    {
                        //alert("Game Over = 2!");
                        $('.lastItem').html(lastItem);
                        $("#newItem").show();
                        $("#newAttribute").show();
                        $("#yesButton").hide();
                        $("#noButton").hide();
                        $("#submitButton").show();
                    }
                    
                    if(gameOver=='3')
                    {
                        //alert("Game Over = 3!");
                        resetPage();
                    }
                    
                    $('#display').html("<span style=\"color:#23CF5F;font-size: 4em; font-family: 'Montserrat', sans-serif;\">" + displayMessage + "<\/span>");
                }
            
            });
        </script>
    </div>
    </body>
</html>