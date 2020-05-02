<?php
//define('IGNORE_SESSION', false);

include('header_admin.php');       
include('services.php');
include('form_library.php');


if(isset($_POST['btnsave']))
{
  //print_r($_POST);
  $userName=$_POST['user_name'];
  $password=$_POST['password'];
  $isSuccessful = admin_login($userName,$password);

  if($_SESSION['role'] == 'teacher') {
      header("Location: admin_courses.php");
  } else {      
      header("Location: admin_login.php");
  }
  
} 
?>
<div class="container-fluid bg-white">
    <div class="container pt-5" >
<?php 
  $fields = [

    new FormField('user_name', 'User Name', 'text'),
    new FormField('password', 'Password', 'text')
  
  ];
  $form_title = "Login";
  $form_action = "admin_login.php";
  
  include('admin_form.php');
  include('footer.php');
?>
</div>
</div>
	
