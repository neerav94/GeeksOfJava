<?php
session_start();

//destroy session
session_destroy();

//unset cookies
setcookie("username","",time()-3600);

header("Location: index.html"); // Redirecting To Home Page
?>