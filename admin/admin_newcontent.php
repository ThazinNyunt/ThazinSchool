<?php 
include('header.php');       
include('../services.php');
include('form_library.php');

$sectionId= $_GET['section_id'];
$courseId = $_GET['course_id'];

if(isset($_POST['btnsave']))
{
    print_r($_POST);
    $title = $_POST['title'];
    $priority = $_POST['priority'];
    $type = $_POST['type'];
    $video_url = $_POST['video_url'];

    $row = insertNewContent($sectionId,$title,$priority,$type,$video_url);
    if($row)
    {
        header("Location: admin_course_detail.php?course_id=" . $courseId . '&saved'); 
        exit();
    }
}



$fields = [

  new FormField('title', 'Content Title', 'text'),
  new FormField('priority', 'Priority', 'text'),
  new FormField('body','Body','textarea'),
  new FormField('type', 'Type', 'text'),
  new FormField('video_url', 'Video_url', 'text')

];
$form_title = "Add New Content";
$form_action = "admin_newcontent.php?course_id=" . $courseId . "&section_id=" .$sectionId;

include('admin_form.php');
include('footer.php');
?>