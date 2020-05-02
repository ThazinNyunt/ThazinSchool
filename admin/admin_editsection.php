<?php 
include('header.php');       
include('../services.php');
include('form_library.php');

$courseId =$_GET['course_id'];

$sectionId= $_GET['section_id'];

$row = getSectionBySectionId($sectionId);

$title = $row['title'];

if(isset($_POST['btnsave']))
{
    $title = $_POST['title'];

    $row = updateSection($sectionId,$title);
    print_r($row);
    if($row)
    {
      header("Location: admin_course_detail.php?course_id=" . $courseId); 
    }
}

$fields = [
    new FormField('title', 'Edit Section', 'text', $title)
  
  ];
  $form_title = "Edit Section";
  $form_action = "admin_editsection.php?course_id=" . $courseId . "&section_id=" .$sectionId;
  
  include('admin_form.php');
  include('footer.php');
  ?>