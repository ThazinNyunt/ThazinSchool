<?php 
include('header.php');       
include('../services.php');
include('form_library.php');

$courseId =$_GET['course_id'];
$rows = getQuestion($courseId);
//print_r($rows);

?>
<div class="container bg-white">

<h1 align="center">Questions</h1>
<?php foreach($rows as $row): ?>
    <div class="custom-control custom-checkbox mb-3 pr-4">
        Q: <b><?php echo $row['question_text'];?></b><br>
        <?php 
            $answers = Array(
                1 => $row['answer1'],
                2 => $row['answer2'],
                3 => $row['answer3'],
                4 => $row['answer4']
            );
        ?>
        Ans: 
        <?php for($i=1; $i<5; $i++): ?>
            <?php if($row['correct_answer'] == $i) : ?>
                <b class="text-success"><?php echo $answers[$i]; ?>&nbsp;</b>
            <?php else: ?>
                <b>&nbsp;<?php echo $answers[$i]; ?>&nbsp;</b>                
            <?php endif;?>    
        <?php endfor;?>           
    </div>
    <br>
<?php endforeach; ?>
Total Question: <?php echo count($rows); ?>
</div>
