<?php 

include('header_admin.php'); 
include('check.php');
include('services.php');

?>

<div class="container-fluid bg-white">
    <h1 align="center">Courses</h1>
    <div class="float-right bg-white mb-3">
    <a href="admin_newcourse.php" class="btn btn-primary">Create Course</a>
    </div>

    <div>
    <?php 
    $rows = getCourses(); 
    $keys = ['course_name', 'description', 'image_url'];
    //$Id = $row-> $courseId;

    //$course_id_key = 'course_id';
    $link = 'admin_course_detail.php?course_id=';
    $key_for_id = 'course_id';

    include('admin_table.php');
    ?>
    
    </div>
</div>





<?php include('footer.php'); ?>
