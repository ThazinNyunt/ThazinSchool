<?php
include('header_student.php');       
include('services.php');
include('form_library.php');

	if(isset($_POST['btnsave']))
	{
    $email=$_POST['email'];
	$password=$_POST['password'];
    $isSuccessful = studentLogin($email,$password);

    if(isset($isSuccessful))
    {
        header("Location: index.php");
    }
    else
    {
        header("Location: login.php");
    }
   
  } 
?>
<div class="container-fluid bg-white pt-5">
    <h1 align="center">Login</h1>
    <div class="container bg-white pt-5 pb-5">

      <form action="login.php" method="post">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email: </label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" placeholder="Enter Your Email">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Password: </label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password" placeholder="Enter Password">
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