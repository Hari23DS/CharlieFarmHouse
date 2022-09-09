<?php
session_start();
if ($_SESSION['admin'] == 'true') {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entry Page</title>
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
     include 'newEntrynav.php';
     ?>   

<div class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card my-5" >
                        <div class="card-header"><h4 class="text-center text-bold">New Entry</h4>
                        </div>
                        <div class="card-body">
                        
                <div class="input-group">
                    <form action="newEntryData.php" method="post">
                    
                            <select class="form-select " id="select1" name="newEntry" onchange="populate(this.id)" required>
                                <option value="" selected disabled>Choose...</option>
                                <option value="Materialexpense">Material expense</option>
                                <option value="Breedexpense">Breed expense</option>
                                <option value="Fodderexpense">Fodder expense</option>
                                <option value="Income">Income</option>
                                <option value="labour">Labour Expense(Nature of Work)</option>
                                <option value="treatment">Treatment Expense</option>
                            </select>
                 </div>
           
           
            <div class="form-group row">
                                    <label for="amount" class="col-md-4 col-form-label text-md-right my-3" id="id">Breed Id / Id</label>
                                    <div class="col-md-6">
                                        <input type="text" id="amount" class="form-control my-3" name="id" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="amount" class="col-md-4 col-form-label text-md-right my-3" id="breedType">Type / Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="amount" class="form-control my-3" name="name" required>
                                    </div>
                                </div>
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn1  mx-3" name="submit" value="submit">
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
<script>
    function populate(s1)
               {
                   var s1 = document.getElementById(s1);                
                   if(s1.value == "Fodderexpense")
                   {
                    document.getElementById("id").innerHTML = "Id";
                    document.getElementById("breedType").innerHTML = "Name";
                   }

                   if (s1.value == "Materialexpense") {
                    document.getElementById("id").innerHTML = "Id";
                    document.getElementById("breedType").innerHTML = "Name";
                   }

                   if (s1.value == "Breedexpense") {
                    document.getElementById("id").innerHTML = "Breed Id";
                    document.getElementById("breedType").innerHTML = "Type";
                   }


                   if (s1.value == "Income") {
                    document.getElementById("id").innerHTML = "Breed Id";
                    document.getElementById("breedType").innerHTML = "Type";
                   }


                   if (s1.value == "labour") {
                    document.getElementById("id").innerHTML = "Id";
                    document.getElementById("breedType").innerHTML = "Nature of work";
                   }


                   if (s1.value == "treatment") {
                    document.getElementById("id").innerHTML = "Id";
                    document.getElementById("breedType").innerHTML = "Breed Type";
                   }

                }
</script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>


<?php
}
if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
}


;?>