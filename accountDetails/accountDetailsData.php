<?php
session_start();
if ($_SESSION["auth"] == "true") {


if (isset($_POST["save"])) {


 require '../assets/template/db.php';

  $uname = $_POST["uname"] ; 
  $email = $_POST["email"];
  $password = $_POST["pass"];
  $cpass = $_POST["cpass"];

  if(!$conn) {
      echo "connection eror ". mysqli_connect_error();
  } else {
      if (($password == $cpass) && $password != "") {
        $sql = "UPDATE `logindata` SET `uname` = '$uname', `email` = '$email', `pass` = '$password' ";
        if(mysqli_query($conn, $sql) ){
          echo "<script type='text/javascript'>";
          echo "alert('Data updated successfully')";
          echo "</script>";
          header('refresh:1, url=accountDetails.php');
        } 

        if (isset($email)) {
            $_SESSION["email"] = $email;
        }
        if (isset($uname)) {
          $_SESSION["uname"] = $uname;
        }
      } else {
        echo "<script type='text/javascript'>";
        echo "alert('password and confirm password should be same')";
        echo "</script>";
        header('refresh:1, url=accountDetails.php');
      }
     
  }
}
}
 ?>