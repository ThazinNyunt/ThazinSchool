<?php
include('services.php');

$questions = $_POST['question'];
$total_question = count($_POST['question']);
$result = 0;
foreach ($questions as $question) :
    if ($question['correct_answer']==$question['user_answer']) 
    {
        $result++;
    }
endforeach;
$percentage = ($result*100)/$total_question;

$date =date('Y-m-d');
echo "DATE: " .$date;
$row = insertExamRecord($_POST['user_id'],$_POST['course_id'],$result,$total_question,$date);

?>

<div align="center">
    <br>
    <p>Your Result: <?php echo $result; ?>/<?php echo $total_question;?></p>
    <br>
    <?php if($percentage>=50) 
        {
            $update = savePassingdate($_POST['course_id'],$_POST['user_id'],$date);
        ?>
        <h1>You Pass the Exam</h1>
        <a href="certificate.php?course_id=<?php echo $_POST['course_id']; ?>&user_id=<?php echo $_POST['user_id']; ?>" class='btn btn-primary'>Download Certificate</a>
<?php   } ?>
    <?php if($percentage<50): ?>
        <h1>You Fail the Exam</h1>
        <a href="questions.php?course_id=<?php echo $_POST['course_id']; ?>" class="btn btn-primary">Try Again</a>
    <?php endif; ?>

    <br><br><br><br>
        <a href="index.php">go home</a>
    
    

</div>
