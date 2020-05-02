<?php 
include('header.php'); 
include('services.php');

$weekId = $_GET['week_id'];
?>

<div class="container-fluid bg-white">
    <h1 align="center">Sections</h1>

    <?php if(isset($_GET['saved'])): ?>
        <div class="alert alert-success">
            Successfully Saved!
        </div>
    <?php endif;?>

    <div class="float-right bg-white mb-3">
    <a href="admin_newsection.php?week_id=<?php echo $weekId;?>" class="btn btn-primary">Create Section</a>
    </div>

    <div>
    <?php 
    $rows = getSectionsByWeeksId($weekId); 
    $keys = ['title'];

    $link = 'admin_contents.php?section_id=';
    $key_for_id = 'section_id';

    include('admin_table.php');
    ?>
    
    </div>
</div>





<?php include('footer.php'); ?>
