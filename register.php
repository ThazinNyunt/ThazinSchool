<?php 
include('header_student.php');
include('services.php');

if(isset($_POST['btnsave']))
{
    $user_name = $_POST['txtusername'];
    $email = $_POST['txtemail'];
    $password = $_POST['txtpassword'];
    $role = 'student';

    $check = findUserByEmail($email);
    //print_r($rows);
    if($check > 0)
    {   
    ?>        
        <div class="alert alert-warning alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Warning!</strong> This alert box could indicate a warning that might need attention.
        </div>
    <?php
    }
    else 
    {
        $row = registerUser($user_name,$email,$password,$role);
        if(isset($row))
        {
            header("Location: login.php"); 
        }
    }

}
?>
<div class="container-fluid bg-white">
    <h1 align="center">Sign Up</h1>
    <div class="container bg-white pt-5 pb-5">

      <form action="register.php" method="post">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">User Name: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="txtusername" placeholder="Enter User Name" required>
            </div>
        </div>
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
            <button type="submit" name="btnsave" class="btn btn-primary">Sign Up</button>
            </div>
        </div>

      </form>
    </div>
</div>