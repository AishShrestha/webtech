<?php
$cookieName = 'username';
$cookieValue = 'AishShrestha';

// Set a cookie that expires in 60 seconds
setcookie($cookieName, $cookieValue, time() + 60);

// Check if the cookie is set and display its value
if (isset($_COOKIE[$cookieName])) {
    echo "UserName: " . $_COOKIE[$cookieName];
} else {
    echo "No cookie found";                                                               
}
?>
