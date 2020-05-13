<?php 
include('header.php');
include('../services.php');

$courseId = $_GET['course_id'];
$row = getCourse($courseId);

$studentRows = getCourseEnrollments($courseId);
 
?>

    
<div class="container bg-white mt-2 p-4">
    <div class="container pt-5" >
        <div class="text-center">
            <h1 class="mb-5"><?php echo $row['course_name'];?></h1>
        </div>
        
        <table class="table table-striped w-100">
            <thead>
                <th>Student Name</th>
                <th>Email</th>
                <th>Enroll Date</th>
            </thead>    

            <tbody>
                <?php foreach($studentRows as $student): ?>
                <tr>
                    <td>
                        <?php 
                            echo $student['user_name'];
                        ?>
                    </td> 

                    <td>
                        <?php 
                            echo $student['email'];
                        ?>
                    </td> 
                    
                    <td>
                        <?php 
                            echo $student['enroll_date'];
                        ?>
                    </td> 
                </tr> 
                <?php endforeach;?>   
            </tbody>    
        </table>

    </div>
</div>

<?php include('footer.php'); ?>

