<?php 

include('header.php'); 
include('../services.php');


?>

<div class="container-fluid bg-white mt-2 p-4">
    <h1 align="center">Courses</h1>
    <div class="float-right bg-white mb-3">
    <a href="admin_newcourse.php" class="btn btn-primary">Create Course</a>
    </div>
    <form class="form-inline my-2 my-lg-0" action="admin_search.php">
        <input name="term" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search Course</button>
    </form>

    <div>
    <?php 
    $rows = getCourses(); 
    $keys = ['course_name', 'description', 'image_url'];
    //$Id = $row-> $courseId;

    //$course_id_key = 'course_id';
    $link = 'admin_course_detail.php?course_id=';
    $key_for_id = 'course_id';

    //include('admin_table.php');
    ?>

    <table class="table table-hover">
        <thead>
            <th>Course Name</th>            
            <th class="text-right">Action</th>
        </thead>
        <tbody>
            <?php foreach($rows as $row): ?>
            <tr>
                <td>
                    <?php echo $row['course_name']; ?>
                </td>
                
                <td class="text-right">
                    <a href="<?php echo "admin_course_detail.php?course_id=". $row[$key_for_id]; ?>" class="btn btn-sm btn-outline-primary">
                    View Details
                    </a>
                    <a href="<?php echo "admin_course_enrollments.php?course_id=". $row[$key_for_id]; ?>" class="btn btn-sm btn-outline-primary">
                    Enrollments
                    </a>

                    <a href="<?php echo "admin_course_delete.php?course_id=". $row[$key_for_id]; ?>" class="btn btn-sm btn-outline-danger">
                    Delete
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    </div>
</div>





<?php include('footer.php'); ?>
