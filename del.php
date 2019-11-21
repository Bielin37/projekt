<?php

session_start();
error_reporting(0);

header('Location: sklep.php');

$_SESSION = array();
session_destroy();
?>