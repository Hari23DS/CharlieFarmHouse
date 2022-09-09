<?php
session_start();
if ($_SESSION['auth'] == 'true') {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material purchase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="fodderExpense.css" type="text/css">
<body>
     <?php
include '../assets/template/header.php';     ?>
      <div class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card my-5" >
                        <div class="card-header"><h4 class="text-center text-bold">Fodder Expense</h4></div>
                        <div class="card-body">
                            <form name="my-form"  action="fodderExpenseData.php" method="post">
                                <div class="form-group row">
                                    <label for="fodder-name" class="col-md-4 col-form-label text-md-right my-3">Fodder Name </label>
                                    <div class="col-md-6">
                                    <select class="form-control my-3" name="fodderName" id="fodderName" required>
                                            <option value="" selected disabled>choose...</option>
                                            <?php
                                            require '../assets/template/db_1.php';
                                            
                                            if(!$conn) {
                                                echo "connection eror ". mysqli_connect_error();
                                            } 
                                            $sql = "SELECT `Bname` FROM `fodderexpense`";
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

                                <div class="form-group row">
                                    <label for="purchase-date" class="col-md-4 col-form-label text-md-right my-3">Date</label>
                                    <div class="col-md-6">
                                        <input type="date" id="purchase-date" class="form-control my-3" name="purchaseDate" value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="quantity" class="col-md-4 col-form-label text-md-right my-3">Quantity</label>
                                    <div class="col-md-6">
                                        <input type="text" id="quantity" class="form-control my-3" name="quantity" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="amount" class="col-md-4 col-form-label text-md-right my-3">Amount</label>
                                    <div class="col-md-6">
                                        <input type="text" id="amount" class="form-control my-3" name="amount" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="remarks" class="col-md-4 col-form-label text-md-right my-3">Remarks</label>
                                    <div class="col-md-6">
                                        <input type="text" id="remarks" class="form-control my-3" name="remarks" >
                                    </div>
                                </div>
                                </div>
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn1  mx-3" onclick="populate('fodderName')">
                                       Submit
                                        </button>
                                        <button type="reset" class="btn2  mx-3 mb-3">
                                       Reset
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</div>
       <br><?php
       include '../assets/template/footer.php';
       ?>

        
   


<!-- <script>
    function populate(s1)
               {
                   var s1 = document.getElementById(s1);  
                   var s2 = document.getElementById('fodderName');                              
                   if(s1.value == "-1" && s2.value != '')
                   {
                  confirm('select fodder name');
                   document.getElementById("breedType").focus();
                   }
                }
</script> -->






<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
<?php
}
?>