<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "egodage100";
$dbSelect = "keymanagementsystem";
$con=mysql_connect($dbHost,$dbUser,$dbPass) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db($dbSelect,$con) or die("Failed to connect to MySQL: " . mysql_error());
?>