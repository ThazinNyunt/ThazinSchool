<?php 
include('header.php');       
include('../services.php');
include('form_library.php');

$courseId =$_GET['course_id'];

if(isset($_POST['btnsave']))
{
    $title = $_POST['title'];

    $row = insertNewSection($courseId,$title);
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
$form_action = "admin_newsection.php?course_id=". $courseId ;

include('admin_form.php');
include('footer.php');
?>