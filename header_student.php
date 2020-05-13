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
    
    <style>
  .centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
  
}
.sub-menu-1
{
  display: none;
}


    </style>
    <script src="mockup/bootstrap4/js/jquery-3.2.1.slim.min.js" ></script>
  <script src="mockup/bootstrap4/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
  <nav class="mb-1 navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand" href="index.php">Thazin School</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
      <form class="form-inline my-2 my-lg-0" action="search.php">
        <input name="term" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search Course</button>
      </form>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">Courses</a>
            <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
              <a class="dropdown-item" href="category.php?category_id=1">Language</a>
              <a class="dropdown-item" href="category.php?category_id=2">Management</a>            
            </div>
          </li>

          <?php if(isset($_SESSION['user_id'])):?>
            <li class="nav-item">
              <a class="nav-link" href="profile.php"><?php echo $_SESSION['user_name']; ?></a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Register.php">Sign up</a>
            </li>
          <?php endif; ?>
      </ul>
  </div>
</nav>
<!--/.Navbar -->