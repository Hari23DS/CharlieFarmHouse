<?php
session_start();
if ($_SESSION['auth'] == 'true') {

$_SESSION["fname"] = $_GET["fname"];
header('Location: viewDataName.php');
}
?>