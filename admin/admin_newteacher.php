<?php 
include('header.php');       
include('../services.php');
include('form_library.php');


if(isset($_POST['btnsave']))
{
    $teacher_name = $_POST['teacher_name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $current_job = $_POST['current_job'];
    $address = $_POST['address'];
    $experiences = $_POST['experiences'];


    $row = insertN($teacher_name,$phone_number,$email,$current_job,$address,$experiences);
    if($row)
    {
        echo "<script>
                window.alert('Lecture detail is saved.');
                window.location='admin_courses.php';
            </script>";
    }
}



$fields = [

  new FormField('teacher_name', 'Teacher Name', 'text'),
  new FormField('phone_number', 'Phone Number', 'text'),
  new FormField('email','Email','text'),
  new FormField('current_job', 'Current Job', 'text'),
  new FormField('address', 'Address', 'textarea'),
  new FormField('experiences', 'Experiencs', 'textarea')

];
$form_title = "Add New Lecture";
$form_action = "admin_newteacher.php";

include('admin_form.php');
include('footer.php');
?>