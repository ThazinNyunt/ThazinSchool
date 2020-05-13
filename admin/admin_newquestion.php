<?php 
include('header.php');       
include('../services.php');
include('form_library.php');
$courseId = $_GET['course_id'];

if(isset($_POST['btnsave']))
{
    $question_text = $_POST['question_text'];
    $answer1 = $_POST['answer1'];
    $answer2 = $_POST['answer2'];
    $answer3 = $_POST['answer3'];
    $correct_answer = $_POST['correct_answer'];

    print_r($_POST);
    /*$row = addNewQuestion($question_text,$answer1,$answer2,$answer3,$correct_answer);
    if($row)
    {
        echo "<script>
                window.alert('New Question is saved.');
                window.location='admin_question.php';
            </script>";
    }*/
}

$questionsOptions= [
  new Option("1", "Answer 1"),
  new Option("2", "Answer 2"),
  new Option("3", "Answer 3"),
  new Option("4", "Answer 4")

];

$fields = [

  new FormField('question_text', 'Question Text', 'textarea'),
  new FormField('answer1', 'Answer 1', 'text'),
  new FormField('answer1','Answer 2','text'),
  new FormField('answer1', 'Answer 3', 'text'),
  new FormField('answer1', 'Answer 4', 'text'),
  new FormField('correct_answer', 'Correct Answer', 'select', null, $questionsOptions)
 

];
$form_title = "Add New Question";
$form_action = "admin_newquestion.php?course_id=". $courseId;


include('admin_form.php');
include('footer.php');
?>