<?php 
include('header.php');
include('../services.php');

$courseId = $_GET['course_id'];
$sectionId = $_GET['section_id'];
$row = getSection($sectionId);

if(isset($_POST['section_id'])) {
    deleteSection($sectionId);
    header("Location: admin_course_detail.php?course_id=$courseId"); 
    exit();
    
}
 
?>

    
<div class="container bg-white mt-2 p-4">
    <div class="container pt-5" >
        <div class="text-center">
            <h1 class="mb-5"><?php echo $row['title'];?></h1>

            <form method="post">
                <input type="hidden" name="section_id" value="<?php echo $sectionId ?>"/>
                <h3>Confirm to Delete this Section</h3>
                <div>
                    <button class="btn btn-danger" type="submit">Confirm Delete</button>
                    <a class="btn btn-outline-secondary" href="admin_course_detail.php?course_id=<?php echo $courseId?>">Cancel</a>
                </div>
            </form>
        </div>
        

    </div>
</div>

<?php include('footer.php'); ?>

