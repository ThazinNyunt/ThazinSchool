<?php
include('header_student.php');
include('services.php');

if(!isset($_SESSION['user_id']))
{
    echo "<script>window.alert('Please login first to continue.')</script>";
    echo "<script>window.location='Login.php'</script>";
    exit();
}

$courseId = $_GET['course_id'];
$userId = $_SESSION['user_id'];
$enroll_date =date('Y-m-d');

if(isset($_POST['btnsave']))
{
    header("Location: enroll_course.php?course_id=". $courseId);
}


?>
<div class="container bg-white pt-4">
    <div align="center" class="p-4">
        <h1>Secure credit card payment</h1>
    
    <form action="enroll_course.php?course_id=<?php echo $courseId ?>" method="post">
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name on Card:</label>
        <div class="col-xs-4">
            <input type="text" class="form-control" name="txtname" placeholder="Your Name" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Card Number:   </label>
        <div class="col-xs-4">
            <input type="text" class="form-control" name="txtname" placeholder="Valid card number" required >
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Expiration Date: </label>
        <div class="col-xs-4">
            <input type="text" class="form-control" name="txtname" placeholder="MM/YY" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Security Code: </label>
        <div class="col-xs-2">
            <input type="text" class="form-control" name="txtname" placeholder="CVC" required>
        </div>
    </div>
    

        
<div align="center">
  <div class="col-sm-10">   
    <p>You will be charged </p>  
    <button type="submit" name="btnsave" class="btn btn-primary" >Confirm Payment</button>

</div>


</form>
</div>
</div>