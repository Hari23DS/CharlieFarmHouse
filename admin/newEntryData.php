<?php
  session_start();
  if ($_SESSION['admin'] == 'true') {

  require '../assets/template/db_1.php';

  $table = $_POST["newEntry"];
  $id = $_POST["id"];
  $name = $_POST["name"];

  if(!$conn) {
      echo "connection eror ". mysqli_connect_error();
  } 
  
  if ($table == "Materialexpense") {
      $sql = "insert into materialexpense values ('$id', '$name')";
      if(mysqli_query($conn, $sql)) {
        $conn->close();
        echo "<script type='text/javascript'>";
        echo "alert('Data saved successfully')";
        echo "</script>";
        header('refresh:1, url= newEntry.php');
        } else {
          echo "<script type='text/javascript'>";
          echo "alert('Error')";
          echo "</script>";
          header('refresh:1, url= newEntry.php');
      }
  }



  if ($table == "Breedexpense") {
    $sql = "insert into breedexpense values ('$id', '$name')";
    if(mysqli_query($conn, $sql)) {
      $conn->close();
      echo "<script type='text/javascript'>";
      echo "alert('Data saved successfully')";
      echo "</script>";
      header('refresh:1, url= newEntry.php');
      } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error')";
        echo "</script>";
        header('refresh:1, url= newEntry.php');
    }
}



if ($table == "Fodderexpense") {
    $sql = "insert into fodderexpense values ('$id', '$name')";
    if(mysqli_query($conn, $sql)) {
      $conn->close();
      echo "<script type='text/javascript'>";
      echo "alert('Data saved successfully')";
      echo "</script>";
      header('refresh:1, url= newEntry.php');
      } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error')";
        echo "</script>";
        header('refresh:1, url= newEntry.php');
    }
}


if ($table == "Income") {
  $sql = "insert into income values ('$id', '$name')";
  if(mysqli_query($conn, $sql)) {
    $conn->close();
    echo "<script type='text/javascript'>";
    echo "alert('Data saved successfully')";
    echo "</script>";
    header('refresh:1, url= newEntry.php');
    } else {
      echo "<script type='text/javascript'>";
      echo "alert('Error')";
      echo "</script>";
      header('refresh:1, url= newEntry.php');
  }
}



if ($table == "labour") {
  $sql = "insert into labour values ('$id', '$name')";
  if(mysqli_query($conn, $sql)) {
    $conn->close();
    echo "<script type='text/javascript'>";
    echo "alert('Data saved successfully')";
    echo "</script>";
    header('refresh:1, url= newEntry.php');
    } else {
      echo "<script type='text/javascript'>";
      echo "alert('Error')";
      echo "</script>";
      header('refresh:1, url= newEntry.php');
  }
}



if ($table == "treatment") {
    $sql = "insert into treatment values ('$id', '$name')";
    if(mysqli_query($conn, $sql)) {
      $conn->close();
      echo "<script type='text/javascript'>";
      echo "alert('Data saved successfully')";
      echo "</script>";
      header('refresh:1, url= newEntry.php');
      } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error')";
        echo "</script>";
        header('refresh:1, url= newEntry.php');
    }
}
  }
 ?>