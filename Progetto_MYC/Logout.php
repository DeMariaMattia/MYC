<?php
require_once "Config.php";
session_start();
session_destroy();
header('Location:Login.php');
?>