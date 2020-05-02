<?php
 session_start();
 $info = pathinfo($_SERVER['SCRIPT_NAME']);
 $fileName = $info['filename'];
 $isLoginPage = ($fileName == 'login');

//print_r("should check " . $check . '  ');
//print_r(pathinfo($_SERVER['SCRIPT_NAME']));

if($isLoginPage == false) {
  if(isset($_SESSION['user_id']) == false) {
    //echo "Not logg...";
    //print_r('hello');
    header("Location: login.php");
    echo "hi";
    exit;
  } 
  else {
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
    <link rel="stylesheet" href="../mockup/bootstrap4/css/bootstrap.min.css">
    
  
</head>
<body class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-white ">
            <a class="navbar-brand" href="index.php">Thazin School</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <?php if($isLoginPage == false): ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                
                
              <form class="form-inline my-3 my-lg-0">
                <?php 
                if(isset($_SESSION['user_id']))
                {
                  echo $_SESSION['user_name'];
                  echo '<a class="btn btn-primary my-2 my-sm-0 ml-4" type="button" href="" >Profile</a>';
                  echo '<a class="btn btn-primary my-2 my-sm-0 ml-4" type="button" href="logout.php" >Logout</a>';
                }
                else {
                  //header("Location: login.php");
                }
                
                ?>
              </form>
            </div>
              <?php endif;?>
          </nav>