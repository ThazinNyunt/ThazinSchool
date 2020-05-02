<?php 
include('header.php');       
include('../services.php');
include('form_library.php');

$courseId =$_GET['course_id'];

$contentId= $_GET['content_id'];

$row = getContentByContentId($contentId);

$title = $row['title'];
$priority = $row['priority'];
$body = $row['body'];
$type = $row['type'];
$video_url = $row['video_url'];

if(isset($_POST['btnsave']))
{
    $title = $_POST['title'];
    $priority = $_POST['priority'];
    $body = $_POST['body'];
    $type = $_POST['type'];
    $video_url = $_POST['video_url'];

    $row = updateContent($contentId,$title,$priority,$body,$type,$video_url);
    print_r($row);
    if($row)
    {
      header("Location: admin_course_detail.php?course_id=" . $courseId); 
    }
}

$fields = [
    new FormField('title', 'Content Title', 'text', $title),
    new FormField('priority', 'Priority', 'text', $priority),
    new FormField('body','Body','textarea', $body),
    new FormField('type', 'Type', 'text', $type),
    new FormField('video_url', 'Video_url', 'text', $video_url)
  
  ];
  $form_title = "Edit Content";
  $form_action = "admin_editcontent.php?course_id=" . $courseId . "&content_id=" .$contentId;
  
  include('admin_form.php');
  include('footer.php');
  ?>