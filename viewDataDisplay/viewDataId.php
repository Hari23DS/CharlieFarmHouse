<?php
session_start();
if ($_SESSION['auth'] == 'true') {

$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

if($pageWasRefreshed ) {
   //do something because page was refreshed;
   unset($_SESSION["breedId"], $_SESSION["Id"]);
} else {
   //do nothing;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php
include '../assets/template/header.php';    ?>

     <div class="container container-custom">
         <div class="row justify-content-center">
             <div class="col-lg-3 col-5 my-5 ">
             <div class="input-group">
                 <form action="viewDataIdData.php" method="get">
                         <select class="form-select" id="Id" name="Id" class="form-control my-3" required>
                                        <option value = "" selected>Choose...</option>
                                        <option value="1">Breed Expense</option>
                                        <option value="2">Breed Maintenance</option>  
                        </select>
              </div>
           </div>
                <div class="col-lg-3 col-6 my-5">
                <div class="form-group ">
                    <input type="text" id="id" name="breedId" class="form-control" placeholder="for multiple id use only comma" required>
                </div>
                </div>
                <div class="col-lg-2  my-lg-5 ">
                   <button type="submit" class="btn  mx-3 btn-success"> Search</button>
                </div>
             
                </form>
            </div>
     </div>





     <?php

if (isset($_SESSION["Id"]) && isset($_SESSION["breedId"] )) {
    $total = 0;
   
        $breedId = $_SESSION["breedId"];
        if (strpos($breedId, ',')) {
            $breedData = explode (",", $breedId);
            $breedId = join("','",$breedData);
              }
        
    
    $Id = $_SESSION["Id"];
  


    require '../assets/template/db.php';


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    
    // table
    if ($Id == "1") {
        if (isset($breedData)) {
            $sql = "SELECT * FROM `breedexpense` WHERE `breedId` IN ('$breedId')";
        } else {
            $sql = "SELECT * FROM `breedexpense` WHERE `breedId` = '$breedId'";
        }
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo '<div class="container my-5"> 
        <div class="table-responsive">
        <table class="table table-danger table-bordered border-dark text-center" >
                <thead>
                <tr>
                            <th scope="col">Breed Id</th>
                            <th scope="col">Breed Type</th>
                            <th scope="col">Breed Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Dob Or PurchasedDate</th>
                            <th scope="col">Weighgt</th>
                            <th scope="col">Purchase Amount</th>
                            <th scope="col">Remarks</th>
                            </tr>
                        </thead>';
        while($row = mysqli_fetch_assoc($result)) {
            $total = $total + $row["amount"];
    if ($row != '') {
        echo '<tbody>' ; 
        echo "<tr>";
        echo "<td>" .$row["breedId"]. "</td>";
        echo "<td>" .$row["breedCategory"]. "</td>";
        echo "<td>" .$row["breedName"]. "</td>";
        echo "<td>" .$row["gender"]. "</td>";
        echo "<td>" .$row["dobrpdate"]. "</td>";
        echo "<td>" .$row["weight"]. "</td>";
        echo "<td>" .$row["amount"]. "</td>";
        echo "<td>" .$row["remarks"]. "</td>";
        echo "</tr>";
  
  echo '</tbody>' ;
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Enter correct breed ID')";
        echo "</script>";
    }
}
echo "<tr>";
echo "<td colspan='8'>"."<b>"."Total = ".$total."</b> </td>";
echo "</tr>";
} else {
        echo "<script type='text/javascript'>";
        echo "alert('Enter correct breed ID')";
        echo "</script>";
}
    


  echo "</table>";
  echo '</div>';
  echo '</div>';
  unset($_SESSION["Id"],$_SESSION["breedId"]);

}
if ($Id == "2") {
    if (isset($breedData)) {
        $sql = "SELECT * FROM `breedmaintenance` WHERE `breedId` IN ('$breedId')";
    } else {
        $sql = "SELECT * FROM `breedmaintenance` WHERE `breedId` = '$breedId'";
    }
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo '<div class="container my-5"> 
                    <div class="table-responsive">
                    <table class="table table-danger table-bordered border-dark text-center" >
                            <thead>
                            <tr>
                                        <th scope="col">Breed Id</th>
                                        <th scope="col">Activity Date</th>
                                        <th scope="col">Activity Done</th>
                                        <th scope="col">Remarks</th>
                                        </tr>
                                    </thead>';
        while($row = mysqli_fetch_assoc($result)) {
    if ($row != '') {
        echo '<tbody>' ; 
        echo "<tr>";
        echo "<td>" .$row["breedId"]. "</td>";
        echo "<td>" .$row["activityDate"]. "</td>";
        echo "<td>" .$row["activityDone"]. "</td>";
        echo "<td>" .$row["remarks"]. "</td>";
        echo "</tr>";
  
  echo '</tbody>' ;
    }  else {
        echo "<script type='text/javascript'>";
        echo "alert('Enter correct breed ID')";
        echo "</script>";
    }
}
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Enter correct breed ID')";
        echo "</script>";
}
    
  echo "</table>";
  echo '</div>';
  echo '</div>';
  unset($_SESSION["Id"],$_SESSION["breedId"]);
}
}
}
?>


<br>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include '../assets/template/footer.php';
}
?>