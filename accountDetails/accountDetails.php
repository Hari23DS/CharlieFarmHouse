<?php
  session_start();
  if ($_SESSION["auth"] == "true") {

  $uname = $_SESSION["uname"] ; 
  $email = $_SESSION["email"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material purchase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .btn1
{
    border: none;
    outline: none;
    height: 40px;
    width:30%;
    background-color: green;
    color: white;
    font-weight: bold;
}
.btn1:hover
{
    background-color: white;
    border: 2px solid;
    color: green;
}
.btn2
{
    border: none;
    outline: none;
    height: 40px;
    width:30%;
    background-color: black;
    color: white;
    font-weight: bold;
}
.btn2:hover
{
    background-color: white;
    border: 2px solid;
    color: black;
}
    </style>
</head>
<body>
     <?php
include '../assets/template/header.php';   ?>
      <div class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card my-5" >
                        <div class="card-header"><h4 class="text-center text-bold">Account Details</h4></div>
                        <div class="card-body">
                            <form name="my-form"  action="accountDetailsData.php" method="post">
                            <div class="form-group row">
                                    <label for="breedId" class="col-md-4 col-form-label text-md-right my-3" id="breedId">Username</label>
                                    <div class="col-md-6">
                                    <input type="text" id="breed-id" class="form-control my-3" name="uname" value="<?php echo $uname; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nature-of-work" class="col-md-4 col-form-label text-md-right my-3">e-mail</label>
                                    <div class="col-md-6">
                                        <input type="text" id="nature-of-work" class="form-control my-3" name="email" value="<?php echo $email; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nature-of-work" class="col-md-4 col-form-label text-md-right my-3">New password</label>
                                    <div class="col-md-6">
                                        <input type="text"  class="form-control my-3" id="pass" name="pass" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nature-of-work" class="col-md-4 col-form-label text-md-right my-3">confirm password</label>
                                    <div class="col-md-6">
                                        <input type="text"  class="form-control my-3" id="cpass" name="cpass" >
                                    </div>
                                </div>

                                
                                </div>
                                    <div class="col-md-6 offset-md-4">
                                       
                                        <button type="submit" class="btn1  mx-3 mb-3" name="save" value="save" >
                                       Save
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
       

        





<br><br><br><br>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
<?php
include '../assets/template/footer.php'; 
  }
?>





