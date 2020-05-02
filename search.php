<?php   
include('header_student.php');
include('services.php');
    
$term = $_GET['term'];
$rows = getCoursesBySearchTerm($term);
//print_r($rows);
?>
<div class="container bg-white">
    <div class="row mt-4 mb-2">
        <?php foreach($rows as $row):  ?>
        <div class="col-3">
            <div class="card mb-3" >
                <img src="<?php echo $course['image_url'];?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['course_name'];?></h5>
                    <p class="card-text"><?php echo $row['description']; ?></p>
                    <a href="course.php?id=<?php echo $row['course_id'];?>" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>    
</div>  