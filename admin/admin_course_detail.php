<?php 
include('header.php');
include('../services.php');

$courseId = $_GET['course_id'];
$row = getCourse($courseId);
$weeks = getWeeks2($courseId);

 
?>

    
<div class="container-fluid bg-white">
    <div class="container pt-5" >
        <div class="text-center">
            <h1 class="mb-5"><?php echo $row['course_name'];?></h1>
        </div>
        <div class="text-left mt-4">      
            <a href="admin_course_question.php?course_id=<?php echo $courseId;?>" class="btn btn-primary">Questions</a>
        </div>
        <div class="text-right mb-4">
            <a href="admin_newweek.php?course_id=<?php echo $courseId;?>" class="btn btn-primary">Create Week</a>
        </div>
        <?php foreach($weeks as $week): ?>  

        <?php $weekId = $week->id; ?>         

        <div class="card">
            <div class="card-header" id="heading-<?php echo $week->number;?>">
                <div class="row">
                    <div class="col">
                    Week <?php echo $week->number; ?> -  <?php echo $week->description; ?>
                    </div>
                    <div class="col text-right">
                    <a class=" btn btn-sm btn-outline-primary" href="admin_editweek.php?course_id=<?php echo $courseId?>&week_id=<?php echo $weekId; ?>">Update</a>
                    <a href="admin_newsection.php?course_id=<?php echo $courseId;?>&week_id=<?php echo $weekId;?>" 
                    class=" btn btn-sm btn-outline-primary">Add New Section</a>
                    </div>
                </div>

            
            </div>

            <div id="collapse-<?php echo $week->number;?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <?php foreach($week->sections as $section): ?>  
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"><?php echo $section->title; ?></th>
                                <td><a class=" btn btn-sm btn-outline-primary" href="admin_editsection.php?course_id=<?php echo $courseId?>&section_id=<?php echo $section->id; ?>">Update Section</a>
                                <a class=" btn btn-sm btn-outline-primary" href="admin_editsection.php?course_id=<?php echo $courseId?>&section_id=<?php echo $section->id; ?>">Delete</a></td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($section->contents as $content): ?>                                
                            <tr>                                    
                                <td><a class="nav-link active" href="content.php?id=<?php echo $content->id; ?>"><?php echo $content->title; ?></a></td>
                                <td>
                                    <a class=" btn btn-sm btn-outline-primary" href="admin_editcontent.php?course_id=<?php echo $courseId?>&content_id=<?php echo $content->id; ?>">Update Content</a>
                                    <a class=" btn btn-sm btn-outline-primary" href="admin_editcontent.php?course_id=<?php echo $courseId?>&content_id=<?php echo $content->id; ?>">Delete</a>
                                </td>
                            </tr>                                                           
                        <?php endforeach;?>    
                            <tr>
                                <td>
                                <a href="admin_newcontent.php?course_id=<?php echo $courseId;?>&week_id=<?php echo $weekId;?>&section_id=<?php echo $section->id; ?>" 
                                class=" btn btn-sm btn-outline-primary">Add New Content</a>
                                </td>
                            </tr>            
                        </tbody>

                    </table>  
                <?php endforeach;?>   
                
                
            </div>
            </div>
        </div>
        
        <?php endforeach;?>    

    </div>
</div>

<?php include('footer.php'); ?>

