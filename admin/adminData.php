<?php
session_start();
  if (isset($_GET["signin"])) {
    $uname = $_GET['uname'];             
    $pass = $_GET['pass'];
        if ($uname == "Hari" and $pass == "123") {
            $_SESSION["admin"] = 'true';
            unset($_GET['signin']);
            header('location: newEntry.php');
        } else {
            echo "<script type='text/javascript'>";
            echo "alert('Incorrect username or password')";
            echo "</script>";
            header('refresh:1, url=admin.php');
        }

  }
 
?>