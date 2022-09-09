<?php
  session_start();
  if (isset($_GET)) {
    $uname = $_GET['uname'];             
    $pass = $_GET['pass'];
    $_SESSION['uname'] = $uname;
    require '../assets/template/db.php';
    $sql = "select * from loginData where uname = '$uname' and pass = '$pass'";
    $result = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($result)) {
      $_SESSION['email'] = $row['email'];
    }
    if(mysqli_num_rows($result) == 1){
        $_SESSION['auth'] = 'true';
        header('Location: ../entryViewData/entryViewData.php');
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Incorrect username or password')";
        echo "</script>";
        header('refresh:1, url= login.html');
    }


   require '../assets/template/db_1.php';
    if(!$conn) {
        echo "connection eror ". mysqli_connect_error();
    } 
    $array = array();
    $sql = "SELECT `Bname` FROM `income`";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      array_push($array, $row["Bname"]);
    }
    $_SESSION["income"] = $array;
}


  } 
 
?>