<?php
session_start();
if ($_SESSION['auth'] == 'true') {

if(isset($_SESSION["row"])) {
    $row = $_SESSION["row"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material purchase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="breedMaintenance.css" type="text/css">
<body>
     <?php
include '../assets/template/header.php';     ?>
     <div class="container container-custom">
         <div class="row justify-content-center">
             <div class="col-lg-1 col-3 my-5 ">
                 <form action="breedIdData.php" method="get">
                 <label for="name"><h3>ID</h3</label>
           </div>
                <div class="col-lg-3 col-6 my-5">
                <div class="form-group ">
                    <input type="text" id="id" name="breedId" class="form-control">
                </div>
                </div>
                <div class="col-lg-2  my-lg-5 ">
                   <button type="submit" class="btn  mx-3 btn-success"> Search</button>
                </div>
                </form>
            </div>
     </div>

<?php
$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

if($pageWasRefreshed ) {
   //do something because page was refreshed;
   unset($_SESSION["row"]);
} else {
   //do nothing;
}
?>

     




<?php
if(isset($_SESSION["row"])) {
?>
    <div class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card my-5" >
                        <div class="card-header"><h4 class="text-center text-bold">Breed Maintenance</h4></div>
                        <div class="card-body">
                            <form name="my-form"  action="breedMaintenanceData.php" method="POST">
                                <div class="form-group row">
                                    <label for="breed_id" class="col-md-4 col-form-label text-md-right my-3">Breed Id </label>
                                    <div class="col-md-6">
                                        <input type="text" id="breed_id" class="form-control my-3" name="breed-id" value="<?php echo $row['breedId']; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="purchase" class="col-md-4 col-form-label text-md-right my-3">Purchase Date</label>
                                    <div class="col-md-6">
                                        <input type="date" id="purchase" class="form-control my-3" name="pdate" value="<?php echo $row['dobrpdate']; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="breed_name" class="col-md-4 col-form-label text-md-right my-3">Breed Name </label>
                                    <div class="col-md-6">
                                        <input type="text" id="breed_name" class="form-control my-3" name="breed-name" value="<?php echo $row['breedName']; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="breed_category" class="col-md-4 col-form-label text-md-right my-3">Breed category</label>
                                    <div class="col-md-6">
                                        <input type="text" id="breed_category" class="form-control my-3" name="breed-category" value="<?php echo $row['breedCategory']; ?>">
                                    </div>
                                </div>




                                <div class="form-group row">
                                    <label for="gender" class="col-md-4 col-form-label text-md-right my-3">Gender</label>
                                    <div class="col-md-6">
                                        <input type="text" id="gender" class="form-control my-3" name="gender" value="<?php echo $row['gender']; ?>">
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right my-3" id="label">Activity Done</label>
                                    <div class="col-md-6">
                                        <input type="date"  class="form-control my-3"  value="<?php echo date('Y-m-d'); ?>" name="activityDate">
                                    </div>
                                </div>
                                <div class=" my-3 form-group row ">
                                     <div class="col-md-4  form-checkbox">
                                     <input type="checkbox" id="flexchechDefault" class="form-check-input" name="ckbx1" value="1">
                                    <label for="flexchechDefault" class="col-md-6 my--5 col-form-label text-md-right text-danger form-check-label" id="phone">De-Worming</label>
                                     </div>
                                     <div class="col-md-6">
                                        <input type="text" id="phone_number" class="form-control" name="de-worming">
                                    </div>
                                </div>
                                <div class=" my-3 form-group row ">
                                     <div class="col-md-4  form-checkbox">
                                     <input type="checkbox" id="flexchechDefault" class="form-check-input" name="ckbx2" value="1">
                                    <label for="flexchechDefault" class="col-md-6 my--5 col-form-label text-md-right text-danger form-check-label" id="phone">Vaccine</label>
                                     </div>
                                     <div class="col-md-6">
                                        <input type="text" id="phone_number" class="form-control" name="vaccine">
                                    </div>
                                </div>
                                 <div class=" my-3 form-group row ">
                                     <div class="col-md-4  form-checkbox">
                                     <input type="checkbox" id="flexchechDefault" class="form-check-input" name="ckbx3" value="1">
                                    <label for="flexchechDefault" class="col-md-6 my--5 col-form-label text-md-right text-danger form-check-label" id="phone">Weight Measurement</label>
                                     </div>
                                     <div class="col-md-6">
                                        <input type="text" id="phone_number" class="form-control" name="weight" value="<?php echo $row['weight'] ?>">
                                    </div>
                                </div>
                               
                                <div class=" my-3 form-group row ">
                                     <div class="col-md-4  form-checkbox">
                                     <input type="checkbox" id="flexchechDefault" class="form-check-input" name="ckbx4" value="1">
                                    <label for="flexchechDefault" class="col-md-6 my--5 col-form-label text-md-right text-danger form-check-label" id="phone">Maternity</label>
                                     </div>
                                     <div class="col-md-6">
                                        <input type="text" id="phone_number" class="form-control" name="maternity">
                                    </div>
                                </div>
                                 
                                <div class=" my-3 form-group row ">
                                     <div class="col-md-4  form-checkbox">
                                     <input type="checkbox" id="flexchechDefault" class="form-check-input" name="ckbx5" value="1">
                                    <label for="flexchechDefault" class="col-md-6 my--5 col-form-label text-md-right text-danger form-check-label" id="phone">calf yeild</label>
                                     </div>
                                     <div class="col-md-6">
                                        <input type="text" id="phone_number" class="form-control" name="calf-yeild">
                                    </div>
                                </div>
                                
                                
                                <div class="form-group row">
                                    <label for="remarks" class="col-md-4 col-form-label text-md-right my-3">Remarks</label>
                                    <div class="col-md-6">
                                        <input type="text" id="remarks" class="form-control my-3" name="remarks">
                                    </div>
                                </div>
                                
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn1  mx-3">
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
<br>
<?php
include '../assets/template/footer.php';
}
?>
       

   




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
<?php
}
?>