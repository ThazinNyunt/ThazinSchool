<?php 
include('header_student.php');
include('services.php');
$connection = connectDb();
?>

<div class="container-fluid bg-white">
    <div class="row ">
        <div class="col">
            <div id="carouselExampleSlidesOnly" class="carousel slide mt-3" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/banner.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/Image4.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/Image5.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
        </div>       
    </div>
    <div class="container bg-black pt-4 pb-4">
        <h1 align="center"> Category </h1>  
            <div>
            <?php 
                $categoryRows=category();
                foreach($categoryRows as $row): 
            ?>                    
            <a type="button" class="btn btn-outline-info" href="category.php?category_id=<?php echo $row['category_id']; ?>">
            <?php echo $row['category_name'];?>
            </a>               
            <?php endforeach; ?>
            </div>
    </div>
</div>

<?php include('footer.php'); ?>

