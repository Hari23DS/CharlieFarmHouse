<?php
session_start();
if ($_SESSION['auth'] == 'true') {

if(isset($_GET["breedId"])) {

$breedId = $_GET['breedId'];

require '../assets/template/db.php';


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $sql = "SELECT * FROM `breedexpense` WHERE `breedId` = '$breedId'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row == '') {
        echo "<script type='text/javascript'>";
        echo "confirm('Enter correct Breed ID')";
        echo "</script>";
        unset($_SESSION["row"]);
        header('refresh:1, url= breedMaintenance.php');
    } else {
        $_SESSION["row"] = $row;
        header('Location: breedMaintenance.php');
    }
    
}
}
}
?>