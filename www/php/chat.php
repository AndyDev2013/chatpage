<?php

    require("connection.php");                                

    $tableString = "<table class='table table-striped'><tbody>";

    $connect = mysqli_connect($_dbhost, $_dbuser,$_dbpass,$_dbname) or die('Error showing mail server');      
    $information = mysqli_query($connect, "SELECT TIME,USER,CHAT from chatbox ORDER BY TIME DESC LIMIT 0,20") or die('Error showing chat');
    mysqli_close($connect);   

    while ($row = mysqli_fetch_array($information)) 
    {
        $tableString = $tableString . "<tr>";
        $tableString = $tableString . "<td class='col-md-1'>". date("H:i:s",strtotime($row[0])) . "</td>";
        $tableString = $tableString . "<td class='col-md-2'>". $row[1] . "</td>";
        $tableString = $tableString . "<td class='col-md-8'>". checkforlink($row[2]) . "</td>";
        $tableString = $tableString .  "</tr>";
    } 

    $tableString = $tableString . "</tbody></table>";

    print_r($tableString);

    function checkforlink($text)
    { 
        $arrType = array(                                        
            ".jpg" =>  "Image",
            ".jpeg" => "Image",
            ".png" =>  "Image",
            ".mp3" =>  "Music",
            ".mp4" =>  "Video",
            ".flv" =>  "Youtube File",
            ".pdf" =>  "PDF File",
            ".gif" =>  "GIF Image",
            ".zip" =>  "Zip Download",
            "https://www.youtube.com/" => "Youtube video",                                        
            "http://" => "Website",
            "https://" => "Website"
        );

        $text = urldecode($text);

        foreach ($arrType as $type => $ext)
        {
            if(strpos($text, $type) !== false)
            {
                $t = $arrType[$type];

                $text = "<a href='" . $text . "'>" . $t . "</a>";

                break;
            }
        }
       
        return urldecode($text);
    }

?>