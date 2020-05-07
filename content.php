<?php 
include('header_student.php');
include('services.php');
$courseId =$_GET['course_id'];
$contentId = $_GET['content_id'];
$connection = connectDb();

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
<div class="container bg-white pt-4">
    <div class="card">
        <div class="card-header"><h2><?php echo $row['title'] ?></h2></div>
        <div class="card-body">
            <div>
            <p><?php echo $row['body'];?><p>
            <br>
            </div>

            <?php if(strlen($row['video_url']) > 5): ?>
            <iframe width="100%" height="500"  src="<?php echo $row['video_url'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <?php endif;?>
        </div>
    </div>
    <div class="pt-5 pb-5"><br>
            <a href="course.php?id=<?php echo $courseId; ?>"class="btn btn-primary btn-lg">Back</a>
            
    </div>
</div>
