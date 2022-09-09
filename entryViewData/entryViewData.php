<?php
session_start();
$uname = $_SESSION["uname"];
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Entry Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
        <link rel="stylesheet" href="entryViewData.css" type="text/css">
    </head>
    <body>
  
    
    
    <!-- ============= COMPONENT ============== -->
    <nav class="navbar navbar-expand-lg bgcolor" id="navbar">
     <div class="container-fluid">
        <a class="navbar-brand" href="#"><h1>Farm House</h1></a>
      <button class="navbar-toggler text-white " type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
      <svg xmlns="http://www.w3.org/2000/svg" width="26" height="20"  fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
        </button>
      <div class="collapse navbar-collapse" id="main_nav">
      
    
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">  Details Entry  </a>
            <ul class="dropdown-menu" id="dropdownmenu">
            <li><a class="dropdown-item" href="#" id="sub"> Expenses &raquo; </a>
               <ul class="submenu dropdown-menu">
                <li><a class="dropdown-item " href="../materialExpense/materialExpense.php" id="sub" >Material Expense</a></li>
                <li><a class="dropdown-item" href="../breedExpense/breedExpense.php" id="sub">Breed Expense</a></li>
              <li><a class="dropdown-item" href="../fodderExpense/fodderExpense.php" id="sub">Fodder Expense</a></li>
              <li><a class="dropdown-item" href="../labourExpense/labourExpense.php" id="sub">Laborer Expense</a></li>
        
                <li><a class="dropdown-item" href="../treatmentExpense/treatmentExpense.php" id="sub">Treatment Expense</a></li>
             </ul>
            </li>
            <li><a class="dropdown-item" href="../breedMaintenance/breedMaintenance.php" id="sub"> Breed Maintenance </a></li>
            <li><a class="dropdown-item" href="../income/income.php" id="sub"> Income </a>
            </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#"  data-bs-toggle="dropdown">   View Data  </a>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../viewDataDisplay/viewDataId.php" id="sub"> Breed Id </a></li>
            <li><a class="dropdown-item" href="../viewDataDisplay/viewDataName.php" id="sub"> Fodder Name  </a>
            </li>
            <li><a class="dropdown-item" href="../viewDataDisplay/natureOfWork.php" id="sub"> Labour Expense</a></li>
            <li><a class="dropdown-item" href="../viewDataDisplay/viewDataDisplay.php" id="sub"> All Data  </a>
            </li>
            </ul>
        </li>
        <li class="nav-item dropdown me-5">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">   <?php  echo $uname ?>  </a>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../accountDetails/accountDetails.php" id="sub"> Account Details </a></li>
            <li><a class="dropdown-item " href="../assets/template/logout.php" id="sub"> Logout </a>
            </li>
            </ul>
        </li>
      </ul>
      </div>
     </div> 
    </nav>
 
 <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="../assets/images/goat1.jpg" class="d-block w-100" alt="..." height="520px">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Welcome Farm House</h5>
                    <p>Right place for the people who has to manage their cattle business</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="../assets/images/goat8.jpg" class="d-block w-100" alt="..." height="520px">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Welcome Farm House</h5>
                    <p>Sign Up today to gear up your business</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="../assets/images/goat4.jpg" class="d-block w-100" alt="..." height="520px">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Welcome Farm House</h5>
                    <p>You can get your personalised website here. You can customize youself</p>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
             
            
              <br><br>
            <div class="container-fluid footer bg-black text-white">
              <h1 class="text-center">ScrollUp</h1>
            </div>
            
    
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!--main script-->
    <script src="entryViewData.js"></script>
   
    </body>
    </html>





