<?php

    echo '
    <style>
    *
    {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
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
        z-index: 1;
        top:0;
    }
    
    .navbar-custom
    {
        background-color:#232F3E ;
    }
    
    .nav-item>.nav-link
    {
        color: white;
        font-weight: bold;
        font-size: 20px;
        border: 3px solid transparent;
        margin-left: 16px;
    }
    
    .nav-item>.nav-link:hover
    {
        font-size: 21px;
        border-bottom-color:  red;
        color:white;
      
    }
    
    .navbar-nav li:hover>ul.dropdown-menu
    {
        display: block;
    }
    
    .dropdown-submenu
    {
        position: relative;
    }
    
    .dropdown-submenu>.dropdown-menu 
     {
         top: 0;
         margin-top: -5px;
         left: 100%;
    
     }
    
     .dropdown-menu>li>a:hover::after{
         text-decoration: underline;
         transform: rotate(-90deg);
     }
     
    
     .container-fluid-custom
     {
        background-color: #4fa9d2;
        display: flex;
        justify-content: center;
        font-family: cursive;
     }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <nav class="navbar navbar-expand-lg  px-5 py-2 px-md-0  navbar-custom" id="navbar">
           <div class="container-fluid">
            <h1 class="topic col-lg-0">Farm House</h1>
              <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="20"  fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
                </button>
                 <div class="collapse navbar-collapse justify-content-end px-5 " id="menu">
                     <ul class="navbar-nav">    

                          <li class="nav-item">
                          <a class="nav-link  text-white" href="../assets/template/logout.php" id="navbarDropdownMenuLine" role="button" aria-expanded="false" >
                          Logout</a>
                        </li>
                     </ul>
                             
                </div>
              </div>
            </nav>
            

            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
            ';
            ?>




