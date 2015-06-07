<!DOCTYPE html>
<html lang="en">
<head>
    <title>Family Portal - Chat</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="css/custom.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/business-casual.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    <script>
        
        $(document).ready(function () 
        {         
            updateTable();

            var index = localStorage.uName;

            document.getElementById("userddl").selectedIndex = index;

            setInterval(updateTable, 1000);

            $( "#chatform" ).submit(function( event )
            {
                addMessage();
                e.preventDefault();
            });

            function updateTable()
            {            
                $.post('php/chat.php', function(data)
                {
                    $('#chattable').html(data);

                }).fail(function()
                {
                });
            }

            function changeUser()
            {
                localStorage.uName = document.getElementById("userddl").selectedIndex;
            }

        });

        function addMessage()
        {            
            var choice = document.getElementById("userddl");
            var u = choice.options[choice.selectedIndex].value;
            
            var c = $("#chat").val();

            $.ajax(
            {
                url: 'php/updateChat.php',
                type:'POST',
                data:
                {
                    user: u,
                    chat: c
                },
                success: function(msg)
                {
                    $('#chat').val('');
                }               
            });   
        }

    </script>   

</head>

<body>

    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <ul class="nav navbar-nav">
                <li>
                    <a href="index.php">Chat</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <br>
                    <hr>

                    <h2 class="intro-text text-center">
                        Past 20 Messages - <strong>Leave a message here</strong>
                    </h2>

                    <hr>

                    <form id="chatform" autocomplete="off" onsubmit="return false">
                        
                        <label>Username</label>

                        <br>

                        <select name="user" id="userddl" onchange="changeUser()" onSubmit="return false;">
                            <option value="0">Anonymous</option>
                            <option value="1">User 1</option>
                            <option value="2">User 2</option>
                        </select>

                        <br>

                        <label style="padding-top:4px">Chat</label>

                            <input type="text" class="form-control" id="chat" name="chat" placeholder="Enter chat message" maxlength="100" size="100" style="margin-bottom:10px">

                        <input type="submit" value="Send Message"> 

                    </form>

                    <br>
                    
                    <!-- CHATBOX --> 

                    <div id="tableman">
                        <div id="chattable"></div>
                    </div>
                    <!-- CHATBOX --> 

                </div>
            </div>
        </div>

    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
