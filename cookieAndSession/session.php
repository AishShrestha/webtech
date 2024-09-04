<?php

session_start();

$_SESSION['username'] = "AishShrestha";

if(isset($_SESSION['username'])){
    echo "username: " . $_SESSION['username'];
}else{
    echo "Session not set";
}

session_unset();

session_destroy();


?>