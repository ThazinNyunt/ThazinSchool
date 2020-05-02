<?php 
include('header.php'); 
include('../services.php');

$courseId = $_GET['course_id'];
?>

<div class="container-fluid bg-white">
    <h1 align="center">Weeks</h1>

    <?php if(isset($_GET['saved'])): ?>
        <div class="alert alert-success">
            Successfully Saved!
        </div>
    <?php endif;?>

    <div class="float-right bg-white mb-3">
    <a href="admin_newweek.php?course_id=<?php echo $courseId;?>" class="btn btn-primary">Create Week</a>
    </div>

    <div>
    <?php 
    $rows = getWeeksByCourseId($courseId); 
    $keys = ['number', 'description'];

    $link = 'admin_sections.php?week_id=';
    $key_for_id = 'week_id';

    include('admin_table.php');
    ?>
    
    </div>
</div>





<?php include('footer.php'); ?>
