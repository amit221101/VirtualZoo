<?php
session_start();
session_destroy();
header('location:http://localhost/amit_auth/welcome.php')
?>