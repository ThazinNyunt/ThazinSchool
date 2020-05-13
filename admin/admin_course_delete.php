<?php 
include('header.php');
include('../services.php');

$courseId = $_GET['course_id'];
$row = getCourse($courseId);


if(isset($_POST['course_id'])) {
    //echo "<h1>Delete ....</h1>";
    deleteCourse($courseId);

    header("Location: admin_courses.php?"); 
    exit();
}
 
?>

    
<div class="container bg-white mt-2 p-4">
    <div class="container pt-5" >
        <div class="text-center">
            <h1 class="mb-5"><?php echo $row['course_name'];?></h1>

            <form method="post">
                <input type="hidden" name="course_id" value="<?php echo $courseId ?>"/>
                <h3>Confirm to Delete the course</h3>
                <div>
                    <button class="btn btn-danger" type="submit">Confirm Delete</button>
                    <a class="btn btn-outline-secondary" href="admin_courses.php">Cancel</a>
                </div>
            </form>
        </div>
        

    </div>
</div>

<?php include('footer.php'); ?>

