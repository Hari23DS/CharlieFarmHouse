<?php
session_start();
if ($_SESSION['auth'] == 'true') {

$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

if($pageWasRefreshed ) {
   //do something because page was refreshed;
   unset($_SESSION["fname"]);
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
    <link rel="stylesheet" href="" type="text/css">
</head>
<body>
    <?php
include '../assets/template/header.php';    ?>

<div class="container container-custom">
         <div class="row justify-content-center">
             <div class="col-lg-2 col-3 my-5 ">
                 <form action="viewDataNameData.php" method="get">
                 <label for="name"><h3>Name</h3</label>
           </div>
                <div class="col-lg-3 col-6 my-5">
                <div class="form-group ">
                <select class="form-control my-3" id="fname" name="fname" required>
                    <option value="" selected disabled>choose...</option>
                    <?php
                    require '../assets/template/db_1.php';
                    
                    if(!$conn) {
                        echo "connection eror ". mysqli_connect_error();
                    } 
                    $sql = "SELECT `Bname` FROM `fodderExpense`";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='".$row['Bname']."'>".$row['Bname']."</option>";
                    }
                }
                    ?>
                </select>
                </div>
                </div>
                <div class="col-lg-2  my-lg-5 ">
                   <button type="submit" class="btn  mx-3 btn-success"> Search</button>
                </div>
              
                </form>
            </div>
     </div>







     <?php
if(isset($_SESSION["fname"])) {
    $total = 0;

    $fname = $_SESSION["fname"];

    if (strpos($fname, ',')) {
        $fnameData = explode (",", $fname);
        $fname = join("','",$fnameData);
          }


          require '../assets/template/db.php';


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {

            if (isset($fnameData)) {
                $sql = "SELECT * FROM `fodderexpense` WHERE `fodderName` IN ('$fname')";
            } else {
                $sql = "SELECT * FROM `fodderexpense` WHERE `fodderName` = '$fname'";
            }
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo '<div class="container my-5"> 
          <div class="table-responsive">
          <table class="table table-danger table-bordered border-dark text-center" >
                  <thead>
                  <tr>
                              <th scope="col">fodder Name</th>
                              <th scope="col">Date Fodder Income</th>
                              <th scope="col">Quantity</th>
                              <th scope="col">amount</th>
                              <th scope="col">Remarks</th>
                              </tr>
                          </thead>';
            while($row = mysqli_fetch_assoc($result)) {
                $total = $total + $row["amount"];
            // if ($row != '') {
                echo '<tbody>' ; 
                echo "<tr>";
                echo "<td>" .$row["fodderName"]. "</td>";
                echo "<td>" .$row["incomeDate"]. "</td>";
                echo "<td>" .$row["quantity"]. "</td>";
                echo "<td>" .$row["amount"]. "</td>";
                echo "<td>" .$row["remarks"]. "</td>";
                echo "</tr>";
               
            // } else {
                // echo "<script type='text/javascript'>";
                // echo "alert('Enter correct Fodder Name')";
                // echo "</script>";
            // }
        }

        echo "<tr>";
        echo "<td colspan='5'>"."<b>"."Total = ".$total."</b> </td>";
        echo "</tr>";

    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Enter correct Fodder Name')";
        echo "</script>";
}
            

echo '</tbody>' ;
          echo "</table>";
          echo '</div>';
          echo '</div>';
          unset($_SESSION["fname"]);
}
}

?>

<br>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</html>
<?php
include '../assets/template/footer.php';
}
?>