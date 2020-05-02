<?php 
include('header_student.php');
include('services.php');

$teacher_id = $_GET['teacher_id'];
$teacher = getTeacherName($teacher_id);
//print_r($teacher);
 
?>
<div class="container-fluid bg-white mb-5 ">
    <div class="container">
    <p>Image</p>
    <p>Name :  <b><?php echo $teacher['teacher_name']; ?></b></p>
    <p>Phone :  <?php echo $teacher['phone_number']; ?></p>
    <p>Email :  <?php echo $teacher['email']; ?></p>
    <p>Experiences :  <?php echo $teacher['experiences']; ?></p>
    </div>
</div>