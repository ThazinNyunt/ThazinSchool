<?php 
include('header_student.php');
include('services.php');
$courseId =$_GET['course_id'];
$contentId = $_GET['content_id'];
$connection = new mysqli('localhost','root','','thazinschool');

$result = $connection->query("SELECT * from content where content_id = " . $contentId);
$row = $result->fetch_assoc();

$search = findEnrollCourseByUserId($_SESSION['user_id']);

if($row['free'] == "false")
{
    if(!isset($_SESSION['user_id']) )
    {
        echo "<script>window.alert('Please login first to continue.')</script>";
	    echo "<script>window.location='Login.php'</script>";
	    exit();
    }
    if($search <= 0)
    {
        echo "<div align='center'>";
        echo "<h1>enroll please</h1>";
        echo '<a href="course.php?id=". $courseId ." class="btn btn-primary">Go Back</a>';
        echo "</div>";
        exit();

    }
}




?>
<div class="container">
    <div class="card">
        <div class="card-header"><h2><?php echo $row['title'] ?></h2></div>
        <div class="card-body">
            <div>
            <?php echo $row['body'];?>
            </div>

            <?php if(strlen($row['video_url']) > 5): ?>
            <iframe width="100%" height="500"  src="<?php echo $row['video_url'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <?php endif;?>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>