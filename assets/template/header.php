<?php
$uname = $_SESSION["uname"];
?>
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


</div>
<style>

*
{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

h1, h2, h3, h4, h5, h6
{
font-family: "Jost", sans-serif;
 }

 body
{
    background-color: #ffffff;
}

.topic
{
    color: white;
}

#navbar
{
    position: sticky;
    z-index: 10;
    top:0;
    background-color:#000;
}

#sub
{
color: #000;
}
#sub:hover
{
color: #47b2e4;
}

.search
{
height: 40px;
width: 80%;
border-radius:60px;
outline:none;
border:2px solid rgb(248,26,92);
}

.button
{
height: 40px;
width:40%;
outline: none;
border:none;
background:rgb(248,26,92);
margin-left:-35px;
color:white;
border-radius:60px;
font-weight: 700;
}

::placeholder
{
position: absolute;
margin-right:80px;
}



.navbar li {
position: relative;

}
.navbar a, .navbar a:focus {


font-size: 15px;
font-weight: 500;
color: white;
white-space: nowrap;
transition: 0.3s;
}
.navbar a i, .navbar a:focus i {
font-size: 12px;
line-height: 0;
margin-left: 5px;
}
.navbar a:hover, .navbar .active, .navbar .active:focus, .navbar li:hover > a {
color: #47b2e4;
}

.nav-item>.nav-link
{
   
    border: 3px solid transparent;
    margin-left: 16px;
}
/*.navbar-nav li:hover>ul.dropdown-menu
{
  display: block;
}*/



/* ============ desktop view ============ */
@media all and (min-width: 992px) {

.dropdown-menu li{
position: relative;
}
.dropdown-menu .submenu{ 
display: none;
position: absolute;
left:100%; top:-7px;
}
.dropdown-menu .submenu-left{ 
right:100%; left:auto;
}

.dropdown-menu > li:hover{ background-color: #f1f1f1 }
.dropdown-menu > li:hover > .submenu{
display: block;
}
}	
/* ============ desktop view .end// ============ */

/* ============ small devices ============ */
@media (max-width: 991px) {

.dropdown-menu .dropdown-menu{
margin-left:0.7rem; margin-right:0.7rem; margin-bottom: .5rem;
}

}	
</style>

<script>
    
    document.addEventListener("DOMContentLoaded", function(){
          
  
      /////// Prevent closing from click inside dropdown
    document.querySelectorAll(".dropdown-menu").forEach(function(element){
      element.addEventListener("click", function (e) {
        e.stopPropagation();
      });
    })



    // make it as accordion for smaller screens
    if (window.innerWidth < 992) {

      // close all inner dropdowns when parent is closed
      document.querySelectorAll(".navbar .dropdown").forEach(function(everydropdown){
        everydropdown.addEventListener("hidden.bs.dropdown", function () {
          // after dropdown is hidden, then find all submenus
            this.querySelectorAll(".submenu").forEach(function(everysubmenu){
              // hide every submenu as well
              everysubmenu.style.display = "none";
            });
        })
      });
      
      document.querySelectorAll(".dropdown-menu a").forEach(function(element){
        element.addEventListener("click", function (e) {
    
            let nextEl = this.nextElementSibling;
            if(nextEl && nextEl.classList.contains("submenu")) {	
              // prevent opening link if link needs to open dropdown
              e.preventDefault();
              console.log(nextEl);
              if(nextEl.style.display == "block"){
                nextEl.style.display = "none";
              } else {
                nextEl.style.display = "block";
              }

            }
        });
      });
     
    }
    // end if innerWidth

  }); 
  // DOMContentLoaded  end
    </script>