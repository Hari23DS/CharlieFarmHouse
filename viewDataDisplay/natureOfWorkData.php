<?php
session_start();
if ($_SESSION['auth'] == 'true') {
    $_SESSION["pname"] = $_GET["pname"];
    header('Location: natureOfWork.php');
}
?>