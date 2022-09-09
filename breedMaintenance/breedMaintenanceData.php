<?php
session_start();
if ($_SESSION['auth'] == 'true') {


if (isset($_POST)) {
    $breedId = $_POST['breed-id'];
    $remarks = $_POST['remarks'];
    $activityDate = $_POST["activityDate"];
    if (isset($_POST["ckbx1"])) {
        if ($_POST["ckbx1"] == "1") {
            $deWorming = "De-Worming: ".$_POST["de-worming"]." | ";
        }
    } else {
        $deWorming = "";
    }

    if (isset($_POST["ckbx2"])) {
        if ($_POST["ckbx2"] == "1") {
            $vaccine = "Vaccine: ".$_POST["vaccine"]." | ";
        }
    } else {
        $vaccine = "";
    }

    if (isset($_POST["ckbx3"])) {
        if ($_POST["ckbx3"] == "1") {
            $weight = "Weight: ".$_POST["weight"]." | ";
        }
    } else {
        $weight = "";
    }


    if (isset($_POST["ckbx4"])) {
        if ($_POST["ckbx4"] == "1") {
            $maternity = "Maternity: ".$_POST["maternity"]." | ";
        }
    } else {
        $maternity = "";
    }


    if (isset($_POST["ckbx5"])) {
        if ($_POST["ckbx5"] == "1") {
            $calfYeild = "Calf Yeild: ".$_POST["calf-yeild"]." | ";
        }
    } else {
        $calfYeild = "";
    }
    
}

$activityDate = $_POST["activityDate"];
$activityDone = $deWorming.$vaccine.$weight.$maternity.$calfYeild;


require '../assets/template/db.php';


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $sql = "insert into breedMaintenance values('$breedId', '$activityDate', '$activityDone', '$remarks')";
        if(mysqli_query($conn, $sql)) {
            echo "<script type='text/javascript'>";
            echo "alert('Data saved successfully')";
            echo "</script>";
            unset($_SESSION["row"]);
            header('refresh:1, url= breedMaintenance.php');
            } else {
        echo "Query error ".mysqli_error($conn);
            }
}
}
?>