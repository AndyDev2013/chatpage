<?php 

	if(isset($_POST))
	{
		$user = $_POST['user'];
	    $chat = $_POST['chat'];

	    switch($user)
	    {
	    	case 0:
	    		$user = "Anonymous";
	    		break;
	    	case 1:
	    		$user = "User 1";
	    		break;
	    	case 2:
	    		$user = "User 2";
	    		break;
	    	default:
	    		$user = "Anonymouse";
	    		break;	    	    		    		    		    	
	    }

	    $chat = urlencode($chat);

	    require("connection.php");

	    $time = date('Y-m-d H:i:s');

	    $query = "INSERT INTO chatbox (TIME,USER,CHAT) VALUES ('$time', '$user', '$chat')";

		$connect = mysqli_connect($_dbhost, $_dbuser,$_dbpass,$_dbname) or die('Error updating chatbox');      
		$information = mysqli_query($connect,$query) or die('Error showing chat');
		mysqli_close($connect);  

		//header("Location:../index.php");
	}

?>
