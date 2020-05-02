<?php

include('header.php');       
include('../services.php');

if(isset($_POST['btnsave']))
{
    $teacher_name = $_POST['teacher_name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $current_job = $_POST['current_job'];
    $address = $_POST['address'];
    $experiences = $_POST['experiences'];

    $check = findTeacherByEmail($email);
    if($check > 0)
    {
    ?>        
        <div class="alert alert-warning alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Warning!</strong> Email already Exist. 
        </div>
        
    <?php
    }
    else 
    {
        $rows = registerTeacher($teacher_name,$phone_number,$email,$current_job,$address,$experiences);
        if($rows)
        {
            ?>        
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> Teacher successfully register.
            </div>
            
            <?php
        }
    }
} 

?>


<div class="container-fluid bg-white">
    <h1 align="center">Teacher Register</h1>
    <div class="container bg-white ">

      <form action="teacher_register.php" method="post">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Teacher Name: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="teacher_name" placeholder="Enter Name">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Phone Number: </label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="phone_number" placeholder="Enter Phone Number">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email: </label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" placeholder="Enter Email">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Current Job: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="current_job" placeholder="Enter Current Job">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Address: </label>
            <div class="col-sm-10">
                <textarea class="form-control" name="address" placeholder="Enter Address"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Experiences : </label>
            <div class="col-sm-10">
                <textarea class="form-control" name="experiences" placeholder="Enter Experiences"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
            <button type="submit" name="btnsave" class="btn btn-primary">Register</button>
            </div>
        </div>

      </form>
    </div>
</div>