<?php 
include('header.php'); 
include('services.php');

$sectionId = $_GET['section_id'];
?>

<div class="container-fluid bg-white">
    <h1 align="center">Contents</h1>

    <?php if(isset($_GET['saved'])): ?>
        <div class="alert alert-success">
            Successfully Saved!
        </div>
    <?php endif;?>

    <div class="float-right bg-white mb-3">
    <a href="admin_newcontent.php?section_id=<?php echo $sectionId;?>" class="btn btn-primary">Create Contents</a>
    </div>

    <div>
    <?php 
    $rows = getContentsBySectionId($sectionId); 
    $keys = ['title','priority','body','type','video_url'];

    $link = 'admin_contents.php?section_id=';
    $key_for_id = 'section_id';

    include('admin_table.php');
    ?>
    
    </div>
</div>





<?php include('footer.php'); ?>
