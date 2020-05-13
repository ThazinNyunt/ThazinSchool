<?php
include('header_student.php');       
include('services.php');
$row = searchUser($_SESSION['user_id']);

$course = [];

if($_SESSION['role'] == "teacher") {
    $courses = getCoursesByTeacherId($_SESSION['user_id']);    
} else {
    $courses = getCoursesByStudentId($_SESSION['user_id']);
}

?>

<div class="container bg-white py-4">

<div class="text-center">
<h6>Profile</h6>
<h1><?php echo $_SESSION['user_name']; ?></h1>
<p>Role: <?php echo $_SESSION['role']; ?></p>
</div>    


<?php if($_SESSION['role'] == "teacher"): ?>
    
    <table class="table table-striped">
        <?php foreach($courses as $course): ?>
        <tr>
            <td>
                <?php
                echo $course['course_name']
                ?>
            </td>
        </tr>    
        <?php endforeach;?>
    </table>
<?php endif; ?>


</div>