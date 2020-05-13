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
    $body = $_POST['body'];
    $type = $_POST['type'];
    $video_url = $_POST['video_url'];
    $free = $_POST['free'];

    $row = insertNewContent($sectionId,$title,$priority,$body,$type,$video_url,$free);
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
  new FormField('video_url', 'Video_url', 'text'),
  new FormField('free', 'Free', 'text')

];
$form_title = "Add New Content";
$form_action = "admin_newcontent.php?course_id=" . $courseId . "&section_id=" .$sectionId;

include('admin_form.php');
include('footer.php');
?>