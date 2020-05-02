<?php
include('header_student.php');
include('services.php');

if(!isset($_SESSION['user_id']))
{
    echo "<script>window.alert('Please login first to continue.')</script>";
    echo "<script>window.location='Login.php'</script>";
    exit();
}

$courseId = $_GET['course_id'];
$userId = $_SESSION['user_id'];
$enroll_date =date('Y-m-d');
$search = findEnrollCourse($courseId,$userId);
$insert = enrollCourse($userId,$courseId,$enroll_date);
?>
<div align="center">
    <?php if($search >0):?>
        <h1>You have already enroll this course</h1>
        <a href="course.php?course_id=<?php echo $courseId; ?>"class="btn btn-primary">Go Back</a>
    <?php
        exit();
    endif;
        if($insert):?>
        <h1>Enrollment Completed</h1>
        <a href="course.php?id=<?php echo $courseId; ?>"class="btn btn-primary">Start Course</a>
        <?php endif;?>
</div>