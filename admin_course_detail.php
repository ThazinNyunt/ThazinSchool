<?php 
include('header.php');
include('../services.php');

$courseId = $_GET['course_id'];
$row = getCourse($courseId);
$sections = getSections2($courseId);

 
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
            <a href="admin_newsection.php?course_id=<?php echo $courseId;?>" class="btn btn-primary">Create Section</a>
        </div>
        <?php foreach($sections as $section): ?>  

        <?php $sectionId = $section->id; ?>         

        <div class="card">
            <div class="card-header" id="heading-<?php echo $section->id;?>">
                <div class="row">
                    <div class="col">
                        <?php echo $section->title; ?>
                    </div>
                    <div class="col text-right">
                    <a class=" btn btn-sm btn-outline-primary" href="admin_editsection.php?course_id=<?php echo $courseId?>&section_id=<?php echo $sectionId; ?>">Update</a>
                    <a href="admin_newcontent.php?course_id=<?php echo $courseId;?>&section_id=<?php echo $sectionId;?>" 
                    class=" btn btn-sm btn-outline-primary">Add New Content</a>
                    </div>
                </div>

            
            </div>

            <div id="collapse-<?php echo $section->id;?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                
                    <table class="table table-borderless">
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

