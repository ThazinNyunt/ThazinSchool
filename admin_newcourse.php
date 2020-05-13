<?php 
include('header.php');       
include('services.php');
include('form_library.php');

  if(isset($_POST['btnsave']))
  {
    $coursename=$_POST['coursename'];
    $description=$_POST['description'];
    $image_url=$_POST['image_url'];

    $row = getNewCourse($coursename,$description,$image_url);
    if($row)
    {
      echo "<script>
                window.alert('New course is saved.');
                window.location='admin_courses.php';
            </script>";
    }
  }

?>

<?php

//$field_names = ['coursename', 'description', 'image_url', 'note'];

$fields = [
  new FormField('coursename', 'Course Name', 'text'),
  new FormField('description', 'Description', 'textarea'),
  new FormField('image_url', 'Image url', 'text'),
  new FormField('teacher_id', 'Teacher', 'text')
];
$form_title = "Add New Course";
$form_action = "admin_newcourse.php";

include('admin_form.php');
?>





<?php include('footer.php'); ?>