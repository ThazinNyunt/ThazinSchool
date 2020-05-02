<?php 
include('header.php');       
include('services.php');
include('form_library.php');

$courseId= $_GET['course_id'];

if(isset($_POST['btnsave']))
{
  //print_r($_POST);
    $weeknumber=$_POST['number'];
    $description=$_POST['description'];

    $row = insertNewWeek($courseId,$weeknumber,$description);
    if($row)
    {
        //print_r($row);
        header("Location: admin_course_detail.php?course_id=" . $courseId . '&saved'); 
        exit();
    }
}

$fields = [
  new FormField('number', 'Week Number', 'text'),
  new FormField('description', 'Description', 'textarea'),
];
$form_title = "Add New Week";
$form_action = "admin_newweek.php?course_id=" . $courseId;

include('admin_form.php');
include('footer.php');
?>