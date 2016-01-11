![Screenshot](http://puu.sh/mrcoJ/8abeeae115.jpg)

# chatpage
This project is intended for local use only and was quickly thrown together over the course of a day or so
to test some jQuery and PHP. 

This project is a local chat page for Home use. It enables users to select a hardcoded username and to leave messages
that can be viewed on a local network. It uses Bootstrap so it scales nicely to mobile devices.

There is some very basic parsing, if you post a youtube link as a single message
it should be parsed and displayed in the table in the form of a youtube link.
To edit or build upon this php/chat.php has the code behind the parsing.

For installation:

Intended for LAMP. WAMP users may have to change file structure connections e.g

php/ on LAMP changed to /php/ for WAMP

Build the Database and Tables using the .sql file through LAMP/WAMP
Put all the files into the WWW directory

Important: Change the database password string in the php/connection.php file.
This is very important otherwise the chatpage can't talk to the database obviously.

If you wish to add users change the user names in the index.php
add <option value="3">User 3</option>

ALSO 

In the php/updateChat.php file change the switch statement to include this new user.
e.g
case 3:
	$user = "User 3";
	break;
