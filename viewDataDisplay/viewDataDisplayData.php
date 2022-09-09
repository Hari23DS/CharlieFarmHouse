<?php
  session_start();
  if ($_SESSION['auth'] == 'true') {


  $_SESSION["expenseOrIncome"] = $_POST["expenseOrIncome"];
  $_SESSION["subDiv"] = $_POST["subDiv"];
  $_SESSION["from"] = $_POST["from"];
  $_SESSION["to"] = $_POST["to"];

  if ($_POST["expenseOrIncome"] == "income") {
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
  header('Location: viewDataDisplay.php');
}
?>