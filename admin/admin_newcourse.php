<?php 
include('header.php');       
include('../services.php');
include('form_library.php');

$row = getTeacher();

  if(isset($_POST['btnsave']))
  {

    print_r($_POST);
    $coursename=$_POST['coursename'];
    $categoryId=$_POST['category_id'];
    $description=$_POST['description'];
    $image_url=$_POST['image_url'];
    $teacherId = $_POST['teacher_id'];

    $row = addNewCourse($coursename,$categoryId,$description,$image_url, $teacherId);
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

$teacherRows = getTeachers();
$categoryRows = category();
print_r($categoryRows);
//print_r($teachers);

$teacherOptions = [];
foreach($teacherRows as $teacherRow) {
  $teacherOptions[] = new Option($teacherRow['teacher_id'], $teacherRow['teacher_name']);
}
$categoryOptions = [];
foreach($categoryRows as $categoryRow) {
  $categoryOptions[] = new Option($categoryRow['category_id'], $categoryRow['category_name']);
}


$fields = [
  new FormField('coursename', 'Course Name', 'text'),
  new FormField('category_id', 'Category', 'select', null, $categoryOptions),
  new FormField('description', 'Description', 'textarea'),
  new FormField('image_url', 'Image url', 'text'),
  new FormField('teacher_id', 'Teacher', 'select', null, $teacherOptions)

];
$form_title = "Add New Course";
$form_action = "admin_newcourse.php";

include('admin_form.php');
?>





<?php include('footer.php'); ?>