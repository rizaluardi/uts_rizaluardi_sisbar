<?php 
$dir = 'sqlite:db/upload.db';
$db  = new PDO($dir) or die("cannot open the database");
?>