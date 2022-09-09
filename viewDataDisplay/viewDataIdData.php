<?php
session_start();
if ($_SESSION['auth'] == 'true') {

$_SESSION["Id"] = $_GET["Id"];
$_SESSION["breedId"] = $_GET["breedId"];
header('Location: viewDataId.php');
}
?>