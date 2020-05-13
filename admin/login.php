<?php
//define('IGNORE_SESSION', false);

define('IGNORE_SESSION', true);

include('header.php');       
include('../services.php');
include('form_library.php');


if(isset($_POST['btnsave']))
{
  //print_r($_POST);
  $email=$_POST['txtemail'];
  $password=$_POST['txtpassword'];
  $isSuccessful = adminLogin($email,$password);
<<<<<<< HEAD

  if($isSuccessful == true)
=======
 
  if(isset($isSuccessful))
>>>>>>> fbbbbf4ae7a4fa32548005fa12ab082f18b04891
  {
    if($_SESSION['role'] == 'teacher') 
    {
      header("Location: admin_courses.php");
    }
  }   
} 
?>

<div class="container-fluid bg-white pt-5">
    <h1 align="center">Login</h1>
    <div class="container bg-white pt-5 pb-5">

      <?php if(isset($_POST['btnsave']) && $isSuccessful == false): ?>
        <div class="alert alert-warning"> Login is not successful
        </div> 
      <?php endif;?>

      <form action="login.php" method="post">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email: </label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="txtemail" placeholder="Enter Your Email" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Password: </label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="txtpassword" placeholder="Enter Password" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
            <button type="submit" name="btnsave" class="btn btn-primary">Login</button>
            </div>
        </div>

      </form>
    </div>
</div>
  
?>
</div>
</div>
	
