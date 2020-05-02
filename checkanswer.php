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
    <?php if($percentage>=50): ?>
        <h1>Pass</h1>
        <a href='certifcate.php' class='btn btn-primary'>Download Certificate</a>
    <?php endif; ?>
    <?php if($percentage<50): ?>
        <h1>Fail</h1>
        <a href="questions.php?course_id=<?php echo $_POST['course_id']; ?>" class="btn btn-primary">Try Again</a>
    <?php endif; ?>
    
    

</div>
