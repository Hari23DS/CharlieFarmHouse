<?php
  session_start();
  $uname = $_POST['uname'];             
  $email = $_POST['email'];
  $password = $_POST['pass'];
  $conPassword = $_POST['cpass'];


  $host='localhost'; //mysql host name sql306.epizy.com
  $user='hariraj';  //mysql username    epiz_31319160
  $pass='Hari_Sboj@24';   //mysql password
  $db= $uname.'_Db'; //mysql database epiz_31319160_farm_data
  try {
    $conn = mysqli_connect($host, $user, $pass, $db);
    if(!$conn) {
      echo "connection eror ". mysqli_connect_error();
  } else {
      if ($password == $conPassword) {
        $sql = "select * from loginData where uname = '$uname' and email = '$email'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 1){
            $sql = "UPDATE `loginData` SET `pass` = '$password' WHERE `uname` = '$uname'";
            if (mysqli_query($conn, $sql)) {
                $conn->close();
                $_SESSION['auth'] = 'true';
                echo "<script type='text/javascript'>";
                echo "alert('Password changed')";
                echo "</script>";
                header('refresh:1, url=../entryViewData/entryViewData.php');
            }
        } else {
            $conn->close();
            echo "<script type='text/javascript'>";
            echo "alert('Incorrect username or email')";
            echo "</script>";
            header('refresh:1, url=forgetPassword.html');
        }
      } else {
        echo "<script type='text/javascript'>";
        echo "alert('password and confirm password didn\'t match')";
        echo "</script>";
        header('refresh:1, url=forgetPassword.html');
      }
      
  }
  } catch (Exception $e) {
        echo "<script type='text/javascript'>";
        echo  "alert('Incorrect username or email')";
        echo "</script>";
        header('refresh:1, url=forgetPassword.html');
  }

  
 ?>