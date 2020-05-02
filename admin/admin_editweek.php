<?php 
include('header.php');       
include('../services.php');
include('form_library.php');

$courseId =$_GET['course_id'];

$weekId= $_GET['week_id'];

$row = getWeekByWeekId($weekId);

$number = $row['number'];
$description = $row['description'];;

if(isset($_POST['btnsave']))
{
    $number = $_POST['number'];
    $description = $_POST['description'];

    $row = updateWeek($weekId,$number,$description);
    print_r($row);
    if($row)
    {
      header("Location: admin_course_detail.php?course_id=" . $courseId); 
    }
}

$fields = [
    new FormField('number', 'Week Number: ', 'text', $number),
    new FormField('description', 'Description', 'textarea', $description)
  
  ];
  $form_title = "Edit Week";
  $form_action = "admin_editweek.php?course_id=" . $courseId . "&week_id=" .$weekId;
  
  include('admin_form.php');
  include('footer.php');
  ?>