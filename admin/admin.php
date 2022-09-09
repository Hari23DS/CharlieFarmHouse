<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="admin.css" type="text/css">
</head>
<body>
   
    
<nav class="navbar navbar-expand-lg  px-2 py-2  navbar-custom bgcolor" id="navbar">
           <div class="container-fluid">
            <h1 class="topic col-lg-0">Farm House</h1>
              <button class="navbar-toggler  ms-auto text-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="20"  fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
                </button>
                      <a href="login/login.html" class="user bg-light d-block d-lg-none me-md-2 mx-3">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                       </a>
                 <div class="collapse navbar-collapse " id="menu">
                     <ul class="navbar-nav ms-auto  ">
                     <li class="nav-item">
                          <a class="nav-link" href="admin/admin.php">Home</a>
                      </li>
                         <li class="nav-item">
                          <a class="nav-link" href="admin/admin.php">Admin</a>
                      </li>
                     </ul>
                             
                             <a class="nav-link nav-link-custom d-none d-lg-block  px-3 mx-3 " href="../login/login.html">SIGN IN</a>
                               
                             
                 </div>
              </div>
            </nav>
         <div class="container my-5 ">
             <div class="row gx-0">
                 <div class="col-lg-5 col-md-5 col-sm-12">
                     <img src="../assets/images/goat2.jpg" alt="" class="img-fluid">
                 </div>
                 <div class="col-lg-7 col-md-7 col-12 px-5 pt-5">
                     <h1 class="font-weight-bold py-3">Admin Login</h1>
                     <h4>Sign into your account</h4>
                     <form action="adminData.php" action="get">
                         <div class="form-row">
                             <div class="col-lg-7 col-md-7 col-12 ">
                                 <input  type=" text" placeholder="Username" class="form-control my-3 p-2" name="uname">
                             </div>
                         </div>
                         <div class="form-row">
                             <div class="col-lg-7 col-md-7 col-12">
                                 <input  type="password" placeholder="Password" class="form-control my-3 p-2" name="pass">
                             </div>
                         </div>
                         <div class="form-row">
                             <div class="col-lg-7 col-md-7 col-12">
                                 <button type="submit" class="btn1 mt-3 mb-3" name="signin" value="signin">Sign in</button>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
    




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>


