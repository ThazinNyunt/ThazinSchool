<?php 
include('header.php');       
include('../services.php');
include('form_library.php');

$weekId= $_GET['week_id'];
$courseId =$_GET['course_id'];

if(isset($_POST['btnsave']))
{
    $title = $_POST['title'];

    $row = insertNewSection($weekId,$title);
    if($row)
    {
        header("Location: admin_course_detail.php?course_id=" . $courseId . '&saved'); 
        //exit();
    }
}

$fields = [

  new FormField('title', 'Section Title', 'text')

];
$form_title = "Add New Section";
$form_action = "admin_newsection.php?course_id=". $courseId ."&week_id=" . $weekId;

include('admin_form.php');
include('footer.php');
?>