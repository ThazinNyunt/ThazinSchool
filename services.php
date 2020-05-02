<?php

class UserSession {
    var $id;
    var $username;
    var $email;
    var $role;
    function __construct($id, $username, $email, $role) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->role = $role;
    }
}

class Week {
    var $id;
    var $number;
    var $description;
    var $sections = [];
    function __construct($id, $number, $description) {
        $this->id = $id;
        $this->number = $number;
        $this->description = $description;
    }
 }
 
 class Section {
     var $id;
     var $title;
     var $week_number;
     var $contents = [];
 
     function __construct($id, $title, $week_number) {
         $this->id = $id;
         $this->title = $title;
         $this->week_number = $week_number;
     }
 }

 class Content {
     var $id;
     var $title;
     var $free;
     var $section_id;
 
     function __construct($content_id, $title, $free, $section_id)
     {
         $this->id = $content_id;
         $this->title = $title;
         $this->free = $free;
         $this->section_id = $section_id;
     }
 }

 function connectDb() {
     return new mysqli('localhost','root','','thazinschool');
 }

function getWeeks($courseId) {
    $connection = connectDb();
    $result = $connection->query(
        "SELECT content_id, content.title as content_title, content.free as free,
        section.section_id, section.title as section_title,
        week.week_id as week_id,
        week.number as week_number, week.description as week_description
        FROM content
        LEFT JOIN section on content.section_id = section.section_id
        LEFT JOIN week on section.week_id = week.week_id
        where week.course_id = " . $courseId);
    $rows = $result->fetch_all(MYSQLI_ASSOC);


    $weeks = [];
    $sections = [];
    $contents = [];
    
    foreach($rows as $row) {
        //print_r($row);
        $week_id = $row['week_id']; 
        $week_number = $row['week_number']; 
        $weeks[$week_number] = new Week($week_id, $week_number, $row['week_description']);
    
        $section_id = $row['section_id']; 
        $section_title = $row['section_title']; 
        $sections[$section_id] = new Section($section_id, $section_title, $week_number);
    
        $content_id = $row['content_id'];
        $contents[$content_id] = new Content($content_id, $row['content_title'],$row['free'], $section_id);
    }  
       
    foreach($sections as $section) {
        $week_number = $section->week_number;
        $week = $weeks[$week_number];
        $week->sections[] = $section;
    }
    
    foreach($contents as $content)
    {
        $section_id = $content->section_id;
        $section = $sections[$section_id];
        $section ->contents[] = $content;
    }

    return $weeks;
}

function getWeeks2($courseId) {
    $connection = connectDb();
    $result = $connection->query(
        "SELECT content_id, content.title as content_title, content.free as free,
        section.section_id, section.title as section_title,
        week.week_id,
        week.number as week_number, week.description as week_description 
        FROM week 
        LEFT JOIN section on week.week_id = section.week_id
        LEFT JOIN content on section.section_id = content.section_id
        WHERE course_id = " . $courseId . " ORDER BY `number` ASC");
    $rows = $result->fetch_all(MYSQLI_ASSOC);


    $weeks = [];
    $sections = [];
    $contents = [];
    
    foreach($rows as $row) {
        $week_id = $row['week_id']; 
        $week_number = $row['week_number']; 
        $weeks[$week_number] = new Week($week_id, $week_number, $row['week_description']);
    
        $section_id = $row['section_id']; 
        if($section_id != null) {
            $section_title = $row['section_title']; 
            $sections[$section_id] = new Section($section_id, $section_title, $week_number);
        }
        
        $content_id = $row['content_id'];
        if($content_id != null) {            
            $contents[$content_id] = new Content($content_id, $row['content_title'], $row['free'], $section_id);
        }
        
    }  
       
    foreach($sections as $section) {
        $week_number = $section->week_number;
        $week = $weeks[$week_number];
        $week->sections[] = $section;
    }
    
    foreach($contents as $content)
    {
        $section_id = $content->section_id;
        $section = $sections[$section_id];
        $section ->contents[] = $content;
    }

    return $weeks;
}

function getCourses() {
    $connection = connectDb();
    $result = $connection->query("SELECT * from course");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getCourse($courseId) {
    $connection = connectDb();
    $result = $connection->query("SELECT * from course where course_id = " . $courseId);
    return $result->fetch_assoc();
}

function getNewCourse($coursename,$description,$image_url){
    $connection = connectDb();
    $result = $connection->query("Insert into course (course_name, description, image_url)
                                    Values('$coursename', '$description', '$image_url')");
    return $result;
}

function insertNewWeek($courseId,$weeknumber,$description){
    $connection = connectDb();
    $result = $connection->query("Insert into week (course_id,number, description)
                                    Values('$courseId','$weeknumber', '$description')");
    return $result;
}

function insertNewSection($weekId,$title){
    $connection = connectDb();
    $result = $connection->query("Insert into section (week_id,title)
                                    Values('$weekId','$title')");
    return $result;
}

function insertNewContent($sectionId,$title,$priority,$body,$type,$video_url){
    $connection = connectDb();
    $result = $connection->query("Insert into content (section_id,title,priority,body,type,video_url)
                                    Values('$sectionId','$title','$priority','$body','$type','$video_url')");
    return $result;
}

function updateContent($contentId,$title,$priority,$body,$type,$video_url){
    $connection = connectDb();
    $result = $connection->query("Update content SET title='$title', priority='$priority', body='$body', type='$type', video_url='$video_url' Where content_id = " . $contentId);
    return $result;
}

function updateSection($sectionId,$title){
    $connection = connectDb();
    $result = $connection->query("Update section SET title='$title' Where section_id = " . $sectionId);
    return $result;
}

function updateWeek($weekId,$number,$description){
    $connection = connectDb();
    $result = $connection->query("Update week SET number='$number', description='$description' Where week_id = " . $weekId);
    return $result;
}

function getWeeksByCourseId($courseId) {
    $connection = connectDb();
    $result = $connection->query("SELECT * from week where course_id = " . $courseId);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getSectionsByWeeksId($weekId) {
    $connection = connectDb();
    $result = $connection->query("SELECT * from section where week_id = " . $weekId);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getContentsBySectionId($sectionId) {
    $connection = connectDb();
    $result = $connection->query("SELECT * from content where section_id = " . $sectionId);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getContentByContentId($contentId){
    $connection = connectDb();
    $result = $connection->query("SELECT * from content where content_id = ". $contentId);
    return $result->fetch_assoc();
}

function getSectionBySectionId($sectionId){
    $connection = connectDb();
    $result = $connection->query("SELECT * from section where section_id = ". $sectionId);
    return $result->fetch_assoc();
}

function getWeekByWeekId($weekId){
    $connection = connectDb();
    $result = $connection->query("SELECT * from week where week_id = ". $weekId);
    return $result->fetch_assoc();
}

function adminLogin($email,$Password) {

    $connection = connectDb();
    $result = $connection->query("SELECT * from users WHERE email='$email' And password='$Password' AND role='teacher' ");
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    if(count($rows) > 0) {
        $row = $rows[0];
        //print_r($row['user_id']);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['role'] = $row['role'];
        return true;
    } 
    else {
        return false;
    }
}

function studentLogin($email,$password) {
    $connection = connectDb();
    $result = $connection->query("SELECT * from users WHERE email='$email' And password='$password'");
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    if(count($rows) > 0) {
        $row = $rows[0];
        //print_r($row['user_id']);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['role'] = $row['role'];
        return true;
    } 
    else {
        return false;
    }
}

function category(){
    $connection = connectDb();
    $result = $connection->query("SELECT * from category ");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getCategory($category_id){
    $connection = connectDb();
    $result = $connection->query("SELECT * from category where category_id = " . $category_id);
    return $result->fetch_assoc();
    
}

function getCoursesByCategoryId($category_id){
    $connection = connectDb();
    $result = $connection->query("SELECT * from course where category_id = " . $category_id);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getCoursesBySearchTerm($term) {
    $connection = connectDb();
    $result = $connection->query("SELECT * from course where course_name Like '%$term%' or description Like '%$term%' ");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getTeacherName($teacher_id){
    $connection = connectDb();
    $result = $connection->query("SELECT * from teacher where teacher_Id = ". $teacher_id);
    return $result->fetch_assoc();
}

function findUserByEmail($email) {
    $connection = connectDb();
    $select = $connection->query("SELECT * from users where email = '" . $email . "'");
    return count($select->fetch_assoc());

}

function registerUser($user_name,$email,$password,$role){
    $connection = connectDb();
    $result = $connection->query("Insert into users (user_name,email,password,role)
                                        Values('$user_name','$email','$password','$role')");
    return true;
}

function findTeacherByEmail($email) {
    $connection = connectDb();
    $select = $connection->query("SELECT * from teacher where email = '" . $email . "'");
    return count($select->fetch_assoc());
}

function registerTeacher($teacher_name,$phone_number,$email,$current_job,$address,$experiences){
    $connection = connectDb();
    $result = $connection->query("Insert into teacher (teacher_name,phone_number,email,current_job,address,experiences)
                                        Values('$teacher_name','$phone_number','$email','$current_job','$address','$experiences')");
    return true;
}

function getQuestion($courseId){
    $connection = connectDb();
    $result = $connection->query("SELECT * from question where course_id = ". $courseId);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function insertExamRecord($userId,$courseId,$result,$total_question,$date){
    $connection = connectDb();
    $result = $connection->query("Insert into exam_result (user_id,course_id,result,total_question,date)
                                    Values('$userId','$courseId','$result','$total_question','$date')");
    return $result;
}

function enrollCourse($userId,$courseId,$enroll_date){
    $connection = connectDb();
    $result = $connection->query("Insert into enroll (course_id,user_id,enroll_date)
                                    Values('$courseId','$userId','$enroll_date')");
    return $result;
}

function findEnrollCourse($courseId,$userId) {
    $connection = connectDb();
    $select = $connection->query("SELECT * from enroll WHERE course_id='$courseId' And user_id='$userId' ");
    return count($select->fetch_assoc());

}

function findEnrollCourseByUserId($userId) {
    $connection = connectDb();
    $select = $connection->query("SELECT * from enroll WHERE user_id='$userId'");
    return count($select->fetch_assoc());

}
?>








