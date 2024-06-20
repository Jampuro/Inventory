<?php

    $conn = new mysqli('localhost','root','','delmundobsis32_1');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
?>