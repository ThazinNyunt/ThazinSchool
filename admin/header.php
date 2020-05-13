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
            <?php if($isLoginPage == false): ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="float: right;">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="admin_courses.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="admin_courses.php">Courses</a>
                </li>
              
                <?php if(isset($_SESSION['user_id'])): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="admin_courses.php"><?php echo $_SESSION['user_name'];?></a>
                    
                  </li>
                  <li>
                  <a class="nav-link" href="logout.php">Logout</a>
                  </li>
                <?php endif; ?>
                </ul>
              
            </div>
              <?php endif;?>
          </nav>
          