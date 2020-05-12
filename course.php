<?php 
include('header_student.php');
include('services.php');

$courseId = $_GET['id'];
$connection = connectDb();

$result = $connection->query("SELECT * from course where course_id = " . $courseId);
$row = $result->fetch_assoc();
echo $row['fee'];

$sections =  getSections($courseId);

$teacher = getTeacherName($row['teacher_id']);

?>
<div class="container bg-white pt-4">

    <div class="row">
        <div class="col">
            <h1 class="card-title"><?php echo $row['course_name'];?></h1>
        </div>
        <div class="col text-right">
        <?php if(isset($_SESSION['user_id'])) 
                {
                $userId = $_SESSION['user_id'];
                $isEnrolled = isStudentEnrolledInCourse($courseId,$userId) > 0 ;
                    if($isEnrolled)
                    { ?>
                        <h3 class="text-success">Enrolled</h3>
        <?php       } 
                    elseif($row['fee']==0)
                    {
                        $isEnrolled = null; ?>
                        <a href="enroll_course.php?course_id=<?php echo $courseId; ?>" class="btn btn-primary" style="float: right;">Enroll Now</a>
            <?php   }
                    else 
                    {   
                        $isEnrolled = null; ?>
                        <a href="payment.php?course_id=<?php echo $courseId; ?>" class="btn btn-primary" style="float: right;"><?php echo $row['fee']; ?> MMK</a>
            <?php   } 
                }
                elseif($row['fee']==0)
                {
                    $isEnrolled = null; ?>
                    <a href="enroll_course.php?course_id=<?php echo $courseId; ?>" class="btn btn-primary" style="float: right;">Enroll Now</a>
        <?php   }
                else 
                {   
                    $isEnrolled = null; ?>
                    <a href="payment.php?course_id=<?php echo $courseId; ?>" class="btn btn-primary" style="float: right;"><?php echo $row['fee']; ?> MMK</a>
        <?php   } ?>
        </div>
    </div>  
    

    <p><?php echo $row['description'];?></p>
    <p>Teacher Name: <a href="teacher_profile.php?teacher_id=<?php echo $teacher['teacher_id']; ?>"><?php echo $teacher['teacher_name']; ?></a></p>

        <div class="accordion" id="accordionExample">
            <?php foreach($sections as $section): ?>   
            <?php //print_r($week); ?>         
            <div class="card">
                <div class="card-header" id="heading-<?php echo $section->id;?>">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $section->id;?>" aria-expanded="true" aria-controls="collapseOne">
                    <?php echo $section->title; ?>
                    </button>
                </h2>
                </div>

                <div id="collapse-<?php echo $section->id;?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    
                        <table class="table">
                        <?php foreach($section->contents as $content): ?> 
                                <tr>   
                                
                                    <td>
                                        <?php if($isEnrolled): ?>
                                            <a class="nav-link active" href="content.php?course_id=<?php echo $courseId; ?>&content_id=<?php echo $content->id; ?>"><?php echo $content->title; ?>
                                            <?php if(($content->free) == "true"): ?>
                                            <span class="badge badge-success">Free</span>
                                             <?php endif; ?>
                                            </a>
                                        <?php else: ?>
                                            <p><?php echo $content->title; ?></p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
 
                    <?php endforeach;?>   
                    </table> 
                </div>
                </div>
            </div>
            <?php endforeach;?>   
        </div>
        
        <div class= " p-4">
        <?php if($isEnrolled): ?>
            <a href="questions.php?course_id=<?php echo $courseId; ?>"class="btn btn-primary">Questions</a>
            <?php endif; ?>
        </div>
        
     </div>
</div>


