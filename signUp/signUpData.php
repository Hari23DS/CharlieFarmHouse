<?php
session_start();
$uname = $_POST['uname'];
$pass = $_POST['pass'];
$email = $_POST['email'];
$_SESSION['uname'] = $uname;

$servername = "localhost";
$username = "hariraj";
$password = "Hari_Sboj@24";

// Creating a connection
$conn = mysqli_connect($servername, $username, $password);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$db = $uname.'_Db'; 

// Creating a database 
try {
    $sql = "CREATE DATABASE `$db`";
    if ($conn->query($sql) === TRUE) {
    //   echo "Database created successfully";
  } else {
      echo "Error creating database: " . $conn->error;
      $_SESSION['auth'] = 'false';
  }





  


//   Table for loginData

    $sql = "CREATE TABLE loginData(
        uname VARCHAR(15) PRIMARY KEY,
        pass VARCHAR(20),
        email VARCHAR(25) UNIQUE)";

    

    $conn = mysqli_connect($servername, $username, $password, $db);
    
    if ($conn->query($sql) === TRUE) {
        $sql = "insert into loginData values('$uname', '$pass', '$email')";
        if(mysqli_query($conn, $sql)) {
            } else {
        echo "Query error ".mysqli_error($conn);
            }
    } else {
        echo "Error creating table: " . $conn->error;
    }

      


//Table for breedMaintenanceEntry
      $sql = "CREATE TABLE breedMaintenance (
        breedId VARCHAR(50),
        activityDate DATE,
        activityDone VARCHAR(500) DEFAULT 'No Data Provided',
        remarks VARCHAR(1000) DEFAULT 'No Data Provided'
        )";
    
    
  
  if ($conn->query($sql) === TRUE) {
  } else {
      echo "Error creating table: " . $conn->error;
  }





    

    // table for income
    $sql = "CREATE TABLE income (
        breedId VARCHAR(50),
        breedType VARCHAR(50),
        salesDate date ,
        Quantity VARCHAR(50),
        salesAmount INT,
        remarks VARCHAR(1000) DEFAULT 'No Data Provided'
        )";
    
    
  
  if ($conn->query($sql) === TRUE) {
  } else {
      echo "Error creating table: " . $conn->error;
  }





  

      




      //table for materialExpense
      $sql = "CREATE TABLE materialExpense (
        productName VARCHAR(50),
        productUsedFor VARCHAR(50),
        pDate date ,
        amount INT,
        remarks VARCHAR(1000) DEFAULT 'No Data Provided'
        )";
    
    
  
  if ($conn->query($sql) === TRUE) {
  } else {
      echo "Error creating table: " . $conn->error;
  }




      //table for breedExpense
      $sql = "CREATE TABLE breedExpense (
        breedId  VARCHAR(50) PRIMARY KEY,
        breedType VARCHAR(50),
        breedName VARCHAR(50),
        breedCategory VARCHAR(50),
        gender  VARCHAR(50),
        dobrpdate  date ,
        amount  INT DEFAULT 0,
        remarks VARCHAR(1000) DEFAULT 'No Data Provided'
        )";
    
    
  
  if ($conn->query($sql) === TRUE) {
  } else {
      echo "Error creating table: " . $conn->error;
  }





      //table for fodderExpense
      $sql = "CREATE TABLE fodderExpense (
        fodderName VARCHAR(50),
        incomeDate date ,
        quantity VARCHAR(50),
        amount INT,
        remarks VARCHAR(1000) DEFAULT 'No Data Provided'
        )";
    
    
  
  if ($conn->query($sql) === TRUE) {
  } else {
      echo "Error creating table: " . $conn->error;
  }




      //table for labourExpense
      $sql = "CREATE TABLE labourExpense (
        breedId VARCHAR(50),
        natureOfWork VARCHAR(100) DEFAULT 'Unknown',
        dateLabour date ,
        amount INT DEFAULT 0,
        remarks VARCHAR(1000) DEFAULT 'Unknown'
        )";
    
    
  
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error creating table: " . $conn->error;
    }




      //table for treatementExpense
      $sql = "CREATE TABLE treatementExpense (
        breedType VARCHAR(100) DEFAULT 'Unknown',
        dateTreatment date ,
        treatmentGiven VARCHAR(100) DEFAULT 'Unknown',
        quantity VARCHAR(100) DEFAULT 'Unknown',
        amount INT DEFAULT 0,
        remarks VARCHAR(1000) DEFAULT 'Unknown'
        )";
    
    
  
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error creating table: " . $conn->error;
    }

} catch(Exception $e) {
    $_SESSION['auth'] = 'false';
    $conn->close();
}

if (isset($_SESSION['auth'])) {
    if ($_SESSION['auth'] == 'false') {
        echo "<script type='text/javascript'>";
        echo "alert('Username unavailable')";
        echo "</script>";
        header('refresh:1, url=signUp.php');
    } } else {
    $_SESSION['auth'] = 'true';
    $conn->close();
    header('refresh:1, url=../entryViewData/entryViewData.php');
    }

?>
