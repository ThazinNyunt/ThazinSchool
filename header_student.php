<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="mockup/bootstrap4/css/bootstrap.min.css">
    
  
</head>
<body class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-white ">
                <a class="navbar-brand" href="index.php">Thazin School</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Courses
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </li>                    
                  </ul>
                  <form class="form-inline my-2 my-lg-0" action="search.php">
                    <input name="term" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    <?php 
                    if(isset($_SESSION['user_id']))
                    {
                      echo $_SESSION['user_name'];
                      echo '<a class="btn btn-primary my-2 my-sm-0 ml-4" type="button" href="" >Profile</a>';
                      echo '<a class="btn btn-primary my-2 my-sm-0 ml-4" type="button" href="logout.php" >Logout</a>';
                      
                    }
                    else
                    {
                      echo '<a class="btn btn-primary my-2 my-sm-0 ml-4" type="button" href="login.php" >Login</a>';
                      echo '<a class="btn btn-secondary my-2 my-sm-0 ml-1" type="button" href="register.php">Signup</a>';
                    }
                    ?>
                  </form>
                </div>
              </nav>

<!--
              <div class="media border p-3">
  <div class="media-body">
    <h4>John Doe <small><i>Posted on February 19, 2016</i></small></h4>
    <p>Lorem ipsum...</p>
  </div>
  <img src="img_avatar3.png" alt="John Doe" class="ml-3 mt-3 rounded-circle" style="width:60px;">
</div> -->