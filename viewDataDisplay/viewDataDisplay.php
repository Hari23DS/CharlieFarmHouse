<?php
  session_start();
  if ($_SESSION['auth'] == 'true') {

  $income_list = $_SESSION["income"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="view_data.css" type="text/css">
</head>
<body>
<?php
include '../assets/template/header.php';     ?>
     
     <div class="container">
        <div class="row">
            <div class="col-lg-2 col-6 my-5">
                <div class="input-group">
                    <form action="viewDataDisplayData.php" method="post">
                            <select class="form-select " id="select1" name="expenseOrIncome" onchange="populate(this.id,'subDiv')" required>
                                <option selected value = "">Choose...</option>
                                <option value="expense">Expense</option>
                                <option value="income">Income</option>
                                <option value="Maintenance">Maintenance</option>
                            </select>
                 </div>
            </div>
            <div class="col-lg-2  col-5  my-5">
            <div class="input-group">
                <select class="form-select" id="subDiv" name="subDiv" required>
                 </select>
            </div>
            </div>
            <div class="col-lg-1 col-5  my-5">
            <div class="form-group">
            <label for="date" class="form-control-label fw-bold" id="date"><h3>From</h3></label>
             </div>
            </div>
            <div class="col-lg-2 col-5 my-5">
            <div class="form-group ">
                 <input type="date" name="from" id="phone_number" class="form-control" >
            </div>
            </div>
            <div class="col-lg-1 col-5 my-5">
            <div class="form-group">
            <label for="date" class="form-control-label fw-bold mx-4" id="date" ><h3>To</h3></label>
             </div>
            </div>
            <div class="col-lg-2 col-5 my-5">
            <div class="form-group ">
                 <input type="date" id="phone_number" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="to">
            </div>
            </div>
            <div class="col-lg-2  my-5">
            <button type="submit" class="btn  mx-3 btn-success"  > Search</button>
            </div>
           
        </div>
    </div>   

                
           <script>
               function populate(s1,s2)
               {
                   var s1 = document.getElementById(s1);
                   var s2 = document.getElementById(s2);

                   s2.innerHTML = "";

                   if(s1.value == "expense")
                   {
                       var optionArray =['Material Expense','Breed Expense','Fodder Expense','Laborer Expense','Treatment expense'];
                   }
                   else if(s1.value == "income")
                   {
                    var optionArray = <?php echo json_encode($income_list , JSON_HEX_TAG); ?>;
                    optionArray.push('all');
                   }
                   else if(s1.value == "Maintenance")
                   {
                       var optionArray =['Breed Maintenance'];
                   }

                   for(var option in optionArray)
                   {
                       var pair = optionArray[option];
                       var newoption = document.createElement("option");

                       newoption.value=pair;
                       newoption.innerHTML=pair;
                       s2.options.add(newoption);
                   }


               }


              



           </script>     

<?php
  $total = 0;
  require '../assets/template/db.php';

  if(isset($_SESSION["expenseOrIncome"]) && isset($_SESSION["subDiv"])) {
  $incorsal = $_SESSION["expenseOrIncome"] ;
  $div = $_SESSION["subDiv"];

  
  if(!$conn) {
      echo "connection eror ". mysqli_connect_error();
  } 
  if ($incorsal != 'income') {
    echo "<center><h1><b>$div</b></h1></center>";
  } else {
    echo "<center><h1><b>$incorsal</b></h1></center>";
  }
  
  if (($incorsal == "expense") && ($div == "Material Expense")) {
    if (isset($_SESSION["from"])) {
      $start_date = $_SESSION["from"];
      $end_date = $_SESSION["to"];
      $sql = "SELECT * FROM `materialexpense` WHERE `pDate` BETWEEN '$start_date' AND '$end_date' ORDER BY `pDate` ASC";
    } else {
      $sql = "select * from materialexpense ";
    }
      
      $result = mysqli_query($conn, $sql);
      
      if (mysqli_num_rows($result) > 0) {
        echo '<div class="container my-5"> 
        <div class="table-responsive">
        <table class="table table-danger table-bordered border-dark text-center" >
                <thead>
                <tr>
                            <th scope="col">FirstProduct Name</th>
                            <th scope="col">Used For</th>
                            <th scope="col">Date</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Remarks</th>
                            </tr>
                        </thead>';
        while($row = mysqli_fetch_assoc($result)) {
          $total = $total + $row["amount"];
          echo '<tbody>' ; 
          echo "<tr>";
          echo "<td>" .$row["productName"]. "</td>";
          echo "<td>" .$row["productUsedFor"]. "</td>";
          echo "<td>" .$row["pDate"]. "</td>";
          echo "<td>" .$row["amount"]. "</td>";
          echo "<td>" .$row["remarks"]. "</td>";
          echo "</tr>";
        }
        echo "<tr>";
        echo "<td colspan='5'>"."<b>"."Total = ".$total."</b> </td>";
        echo "</tr>";
        echo '</tbody>' ;
        echo "</table>";
        echo '</div>';
        echo '</div>';
        // echo "Total : ".$total;
      } else {
        echo "<script type='text/javascript'>";
        echo "alert('No Data present')";
        echo "</script>";
      }

      
    }
    if (($incorsal == "expense") && ($div == "Breed Expense")) {

      if (isset($_SESSION["from"])) {
        $start_date = $_SESSION["from"];
        $end_date = $_SESSION["to"];
        $sql = "SELECT * FROM `breedexpense` WHERE `dobrpdate` BETWEEN '$start_date' AND '$end_date' ORDER BY `dobrpdate` ASC";
      } else {
        $sql = "select * from breedexpense ";
      }

        
        $result = mysqli_query($conn, $sql);
  
        if (mysqli_num_rows($result) > 0) {
          echo '<div class="container my-5"> 
          <div class="table-responsive">
          <table class="table table-danger table-hover table-bordered border-dark text-center" >
                  <thead>
                  <tr>
                              <th scope="col">Breed Id</th>
                              <th scope="col">Breed Category</th>
                              <th scope="col">Breed Name</th>
                              <th scope="col">Gender</th>
                              <th scope="col">Date</th>
                              <th scope="col">Amount</th>
                              <th scope="col">Remarks</th>
                              </tr>
                          </thead>';
          while($row = mysqli_fetch_assoc($result)) {
            $total = $total + $row["amount"];
            echo '<tbody>' ; 
            echo "<tr>";
            echo "<td>" .$row["breedId"]. "</td>";
            echo "<td>" .$row["breedCategory"]. "</td>";
            echo "<td>" .$row["breedName"]. "</td>";
            echo "<td>" .$row["gender"]. "</td>";
            echo "<td>" .$row["dobrpdate"]. "</td>";
            echo "<td>" .$row["amount"]. "</td>";
            echo "<td>" .$row["remarks"]. "</td>";
            echo "</tr>";
          }
          echo "<tr>";
        echo "<td colspan='8'>"."<b>"."Total = ".$total."</b> </td>";
        echo "</tr>";
          echo '</tbody>' ;
          echo "</table>";
          echo '</div>';
          echo '</div>';
        } else {
          echo "<script type='text/javascript'>";
          echo "alert('No Data present')";
          echo "</script>";
        }
  
      } 





      if (($incorsal == "expense") && ($div == "Fodder Expense")) {


        if (isset($_SESSION["from"])) {
          $start_date = $_SESSION["from"];
          $end_date = $_SESSION["to"];
          $sql = "SELECT * FROM `fodderexpense` WHERE `incomeDate` BETWEEN '$start_date' AND '$end_date' ORDER BY `incomeDate` ASC";
        } else {
          $sql = "select * from fodderexpense ";
        }

        
        $result = mysqli_query($conn, $sql);
  
        if (mysqli_num_rows($result) > 0) {
          echo '<div class="container my-5"> 
          <div class="table-responsive">
          <table class="table table-danger table-bordered border-dark text-center" >
                  <thead>
                  <tr>
                              <th scope="col">fodder Name</th>
                              <th scope="col">Date</th>
                              <th scope="col">Quantity</th>
                              <th scope="col">Amount</th>
                              <th scope="col">Remarks</th>
                              </tr>
                          </thead>';
          while($row = mysqli_fetch_assoc($result)) {
            $total = $total + $row["amount"];
            echo '<tbody>'; 
            echo "<tr>";
            echo "<td>" .$row["fodderName"]. "</td>";
            echo "<td>" .$row["incomeDate"]. "</td>";
            echo "<td>" .$row["quantity"]. "</td>";
            echo "<td>" .$row["amount"]. "</td>";
            echo "<td>" .$row["remarks"]. "</td>";
            echo "</tr>";
          }
          echo "<tr>";
        echo "<td colspan='5'>"."<b>"."Total = ".$total."</b> </td>";
        echo "</tr>";
          echo '</tbody>' ;
          echo "</table>";
          echo '</div>';
          echo '</div>';
        }  else {
          echo "<script type='text/javascript'>";
          echo "alert('No Data present')";
          echo "</script>";
        }
  
      }






      if (($incorsal == "expense") && ($div == "Laborer Expense")) {



        if (isset($_SESSION["from"])) {
          $start_date = $_SESSION["from"];
          $end_date = $_SESSION["to"];
          $sql = "SELECT * FROM `labourexpense` WHERE `dateLabour` BETWEEN '$start_date' AND '$end_date' ORDER BY `dateLabour` ASC";
        } else {
          $sql = "select * from labourexpense";
        }

        
        $result = mysqli_query($conn, $sql);
  
        if (mysqli_num_rows($result) > 0) {
            echo '<div class="container my-5"> 
            <div class="table-responsive">
            <table class="table table-danger table-bordered border-dark text-center" >
                    <thead>
                    <tr>
                                <th scope="col">"Breed Id</th>
                                <th scope="col">Nature Of Work</th>
                                <th scope="col">Date</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Remarks</th>
                                </tr>
                            </thead>';
            while($row = mysqli_fetch_assoc($result)) {
              $total = $total + $row["amount"];
              echo '<tbody>' ; 
              echo "<tr>";
              echo "<td>" .$row["breedId"]. "</td>";
              echo "<td>" .$row["natureOfWork"]. "</td>";
              echo "<td>" .$row["dateLabour"]. "</td>";
              echo "<td>" .$row["amount"]. "</td>";
              echo "<td>" .$row["remarks"]. "</td>";
              echo "</tr>";
            }
            
            echo "<tr>";
            echo "<td colspan='5'>"."<b>"."Total = ".$total."</b> </td>";
            echo "</tr>";
            echo '</tbody>' ;
            echo "</table>";
            echo '</div>';
            echo '</div>';
          } else {
        echo "<script type='text/javascript'>";
        echo "alert('No Data present')";
        echo "</script>";
      }
    
        }
       



       
            if (($incorsal == "expense") && ($div == "Treatment expense")) {


              if (isset($_SESSION["from"])) {
                $start_date = $_SESSION["from"];
                $end_date = $_SESSION["to"];
                $sql = "SELECT * FROM `treatementexpense` WHERE `dateTreatment` BETWEEN '$start_date' AND '$end_date' ORDER BY `dateTreatment` ASC";
              } else {
                $sql = "select * from treatementexpense";
              }

              
              $result = mysqli_query($conn, $sql);
                 
              if (mysqli_num_rows($result) > 0) {
                  echo '<div class="container my-5"> 
                  <div class="table-responsive">
                  <table class="table table-danger table-bordered border-dark text-center" >
                          <thead>
                          <tr>
                                      <th scope="col">Breed Type</th>
                                      <th scope="col">Date</th>
                                      <th scope="col">Treatment Given</th>
                                      <th scope="col">Quantity</th>
                                      <th scope="col">Amount</th>
                                      <th scope="col">Remarks</th>
                                      </tr>
                                  </thead>';
                  while($row = mysqli_fetch_assoc($result)) {
                    $total = $total + $row["amount"];
                    echo '<tbody>' ; 
                    echo "<tr>";
                    echo "<td>" .$row["breedType"]. "</td>";
                    echo "<td>" .$row["dateTreatment"]. "</td>";
                    echo "<td>" .$row["treatmentGiven"]. "</td>";
                    echo "<td>" .$row["quantity"]. "</td>";
                    echo "<td>" .$row["amount"]. "</td>";
                    echo "<td>" .$row["remarks"]. "</td>";
                    echo "</tr>";
                  }
                  echo "<tr>";
                  echo "<td colspan='6'>"."<b>"."Total = ".$total."</b> </td>";
                  echo "</tr>";
                  echo '</tbody>' ;
                  echo "</table>";
                  echo '</div>';
                  echo '</div>';
                }  else {
                  echo "<script type='text/javascript'>";
                  echo "alert('No Data present')";
                  echo "</script>";
                }
          
               
              }






              if (($incorsal == "Maintenance") && ($div == "Breed Maintenance")) {



                if (isset($_SESSION["from"])) {
                  $start_date = $_SESSION["from"];
                  $end_date = $_SESSION["to"];
                  $sql = "SELECT * FROM `breedmaintenance` WHERE `activityDate` BETWEEN '$start_date' AND '$end_date' ORDER BY `activityDate` ASC";
                } else {
                  $sql = "select * from breedmaintenance";
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
                      // $total = $total + $row["amount"];
                      echo '<tbody>' ; 
                      echo "<tr>";
                      echo "<td>" .$row["breedId"]. "</td>";
                      echo "<td>" .$row["activityDate"]. "</td>";
                      echo "<td>" .$row["activityDone"]. "</td>";
                      echo "<td>" .$row["remarks"]. "</td>";
                      echo "</tr>";
                    }
                    //             echo "<tr>";
                    // echo "<td colspan='4'>"."<b>"."Total = ".$total."</b> </td>";
                    // echo "</tr>";
                    echo '</tbody>' ;
                    echo "</table>";
                    echo '</div>';
                    echo '</div>';
                  } else {
                    echo "<script type='text/javascript'>";
                    echo "alert('No Data present')";
                    echo "</script>";
                  }
            
                  
                }





                if (($incorsal == "income") && ($div != 'all')) {



                  if (isset($_SESSION["from"])) {
                    $start_date = $_SESSION["from"];
                    $end_date = $_SESSION["to"];
                    $sql = "SELECT * FROM `income` WHERE `breedType` = '$div' AND `salesDate` BETWEEN '$start_date' AND '$end_date' ORDER BY `salesDate` ASC";
                  } else {
                    $sql = "select * from `income` where `breedType` = '$div'";
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
                                          <th scope="col">Sales Date</th>
                                          <th scope="col">Quantity</th>
                                          <th scope="col">Amount</th>
                                          <th scope="col">Remark</th>
                                          </tr>
                                      </thead>';
                      while($row = mysqli_fetch_assoc($result)) {
                        $total = $total + $row["amount"];
                        echo '<tbody>' ; 
                        echo "<tr>";
                        echo "<td>" .$row["breedId"]. "</td>";
                        echo "<td>" .$row["breedType"]. "</td>";
                        echo "<td>" .$row["salesDate"]. "</td>";
                        echo "<td>" .$row["Quantity"]. "</td>";
                        echo "<td>" .$row["amount"]. "</td>";
                        echo "<td>" .$row["remarks"]. "</td>";
                        echo "</tr>";
                      }
                      
                      echo "<tr>";
                      echo "<td colspan='6'>"."<b>"."Total = ".$total."</b> </td>";
                      echo "</tr>";
                      echo '</tbody>' ;
                      echo "</table>";
                      echo '</div>';
                      echo '</div>';
                    }   else {
                      echo "<script type='text/javascript'>";
                      echo "alert('No Data present')";
                      echo "</script>";
                    }
    
                  }





                  if (($incorsal == "income") && ($div == 'all')) {



                    if (isset($_SESSION["from"])) {
                      $start_date = $_SESSION["from"];
                      $end_date = $_SESSION["to"];
                      $sql = "SELECT * FROM `income` WHERE `salesDate` BETWEEN '$start_date' AND '$end_date' ORDER BY `salesDate` ASC";
                    } else {
                      $sql = "select * from income";
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
                                            <th scope="col">Sales Date</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Remark</th>
                                            </tr>
                                        </thead>';
                        while($row = mysqli_fetch_assoc($result)) {
                          $total = $total + $row["amount"];
                          echo '<tbody>' ; 
                          echo "<tr>";
                          echo "<td>" .$row["breedId"]. "</td>";
                          echo "<td>" .$row["breedType"]. "</td>";
                          echo "<td>" .$row["salesDate"]. "</td>";
                          echo "<td>" .$row["Quantity"]. "</td>";
                          echo "<td>" .$row["amount"]. "</td>";
                          echo "<td>" .$row["remarks"]. "</td>";
                          echo "</tr>";
                        }
                        
                        echo "<tr>";
                        echo "<td colspan='6'>"."<b>"."Total = ".$total."</b> </td>";
                        echo "</tr>";
                        echo '</tbody>' ;
                        echo "</table>";
                        echo '</div>';
                        echo '</div>';
                      }   else {
                        echo "<script type='text/javascript'>";
                        echo "alert('No Data present')";
                        echo "</script>";
                      }
      
                    }

                  $conn->close();
  }
 ?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php
  
  $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

if($pageWasRefreshed ) {
   //do something because page was refreshed;
   unset($_SESSION["subDiv"], $_SESSION["expenseOrIncome"]);
} else {
   //do nothing;
}
include '../assets/template/footer.php';
?>
        
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>
<?php
  }
?>