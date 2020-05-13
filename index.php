<?php 
include('header_student.php');
include('services.php');
$connection = connectDb();
$courses = getPopularCourse();
//print_r($courses);

?>
<div class="container bg-white pt-4">
    <div class="row ">
        <div class="col">
            <div id="carouselExampleSlidesOnly" class="carousel slide mt-3" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/banner.jpg" class="d-block w-100"  alt="...">
                        <div class="centered">
                        <h1>FOR BETTER EDUCATION</h1>
                        <a class="btn btn-primary btn-lg" type="button" href="login.php" >JOIN NOW</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>       
    </div>
    <div class="container p-4">
        <h1 align="center"> Popular Courses </h1> 
        
    </div>
    <div class="row mt-4">
        <?php foreach($courses as $course): ?>
        <?php $rows = getCourseByCourseId($course['course_id']); ?>
            <?php foreach($rows as $row):  ?>
            <div class="col-3">
                <div class="card mb-3" >
                    <img src="<?php echo $row['image_url'];?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['course_name'];?></h5>
                        <p class="card-text"><?php echo $row['description']; ?></p>
                        <a href="course.php?id=<?php echo $row['course_id'];?>" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>   
        <?php endforeach; ?>   
    </div>
</div>
    <div class="container bg-secondary text-white pt-4 pb-4">
        <h1>Contact Us</h1>
        <a class="btn btn-primary btn-lg" type="button" href="login.php" >JOIN NOW</a>
    </div>
    <div class="container bg-white pt-4 pb-4">
        <h1 align="center"> Category </h1>  
            <div>
            <?php 
                $categoryRows=category();
                foreach($categoryRows as $row): 
            ?>                    
            <a type="button" class="btn btn-outline-info btn-lg p-4 m-4" href="category.php?category_id=<?php echo $row['category_id']; ?>">
            <?php echo $row['category_name'];?>
            </a>               
            <?php endforeach; ?>
            </div>
    </div>
                
<?php
include('footer_student.php');
?>