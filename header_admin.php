<?php
 session_start();

 $check = true;
if (defined('IGNORE_SESSION')) {
  $check = (IGNORE_SESSION == false);
}

print_r("should check " . $check . '  ');

if($check) {

  if(isset($_SESSION['user_id']) == false) {
    //echo "Not logg...";
    header("Location: admin_login.php");
    exit;
  } else {
    if($_SESSION['role'] != 'teacher') {
      echo "Unauthorized";
      exit;
    } 
  }
}




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
                <a class="navbar-brand" href="#">Thazin School</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    
                    
                  <form class="form-inline my-2 my-lg-0">
                    <?php 
                    if(isset($_SESSION['user_id']))
                    {
                      echo $_SESSION['user_name'];
                      echo '<a class="btn btn-primary my-2 my-sm-0 ml-4" type="button" href="" >Profile</a>';
                      echo '<a class="btn btn-primary my-2 my-sm-0 ml-4" type="button" href="admin_logout.php" >Logout</a>';
                    }
                    else {
                      //header("Location: login.php");
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