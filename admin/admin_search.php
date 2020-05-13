<?php   
include('header.php');
include('../services.php');
    
$term = $_GET['term'];
$rows = getCoursesBySearchTerm($term);
//print_r($rows);
?>
<div class="container bg-white mt-2 p-4">
    <?php 
    echo "<h4>Search for ' ". $term ." '</h4><br>";
    $keys = ['course_name', 'description', 'image_url'];
    //$Id = $row-> $courseId;

    //$course_id_key = 'course_id';
    $link = 'admin_course_detail.php?course_id=';
    $key_for_id = 'course_id';

    include('admin_table.php');
    ?>
</div>