<?php
    //Create Connection
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    // Check Connection
    if(mysqli_connect_errno()){
        //Connection failed
        echo 'Failed to connecto to mySQL '. mysqli_connect_errno();
    }
?>