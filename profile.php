<?php
include('header_student.php');       
include('services.php');
$row = searchUser($_SESSION['user_id']);
$course = searchCourseByUserId ($_SESSION['user_id']);

echo $course;
?>

<div class="container bg-white pt-4">
<h1 align="center">Profile</h1>
<p>Name: <?php echo $_SESSION['user_name']; ?></p>

<p>
</div>