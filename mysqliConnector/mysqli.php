<?php
session_start();
   
    $mysqli = new mysqli('127.0.0.1', 'root', '170895@l$G(.', 'c_taxo');

    if ($mysqli->connect_errno) {    
        echo "Sorry, this website is experiencing problems.";  
        echo "Error: Failed to make a MySQL connection, here is why: \n";
        echo "Errno: " . $mysqli->connect_errno . "\n";
        echo "Error: " . $mysqli->connect_error . "\n";    
    exit;
    }
?>