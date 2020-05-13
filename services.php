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

 class Section {
     var $id;
     var $title;
     var $contents = [];
 
     function __construct($id, $title) {
         $this->id = $id;
         $this->title = $title;
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
     $settings = parse_ini_file("settings.ini");
     return new mysqli('localhost', $settings['user'], $settings['password'], $settings['dbname']);
 }

 

function getSections($courseId) {
    $connection = connectDb();
    $result = $connection->query(
        "SELECT content_id, content.title as content_title, content.free as free,
        section.section_id, section.title as section_title
        FROM content
        LEFT JOIN section on content.section_id = section.section_id
        where section.course_id = " . $courseId);
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    $sections = [];
    $contents = [];
    
    foreach($rows as $row) {
        //print_r($row);
        
        $section_id = $row['section_id']; 
        $section_title = $row['section_title']; 
        $sections[$section_id] = new Section($section_id, $section_title);
    
        $content_id = $row['content_id'];
        $contents[$content_id] = new Content($content_id, $row['content_title'],$row['free'], $section_id);
    }  
           
    foreach($contents as $content)
    {
        $section_id = $content->section_id;
        $section = $sections[$section_id];
        $section ->contents[] = $content;
    }

    return $sections;
}

function getSections2($courseId) {
    $connection = connectDb();
    $result = $connection->query(
        "SELECT content_id, content.title as content_title, content.free as free,
        section.section_id, section.title as section_title
        FROM section 
        LEFT JOIN content on section.section_id = content.section_id
        WHERE course_id = " . $courseId . " ORDER BY `number` ASC");
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    $sections = [];
    $contents = [];
    
    foreach($rows as $row) {
    
        $section_id = $row['section_id']; 
        if($section_id != null) {
            $section_title = $row['section_title']; 
            $sections[$section_id] = new Section($section_id, $section_title);
        }
        
        $content_id = $row['content_id'];
        if($content_id != null) {            
            $contents[$content_id] = new Content($content_id, $row['content_title'], $row['free'], $section_id);
        }
        
    }  

    foreach($contents as $content)
    {
        $section_id = $content->section_id;
        $section = $sections[$section_id];
        $section ->contents[] = $content;
    }

    return $sections;
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

function addNewCourse($coursename,$description,$image_url, $teacher_id){
    $connection = connectDb();
    $result = $connection->query("Insert into course (course_name, description, image_url, teacher_id)
                                    Values('$coursename', '$description', '$image_url', $teacher_id)");
    return $result;
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

function insertNewContent($sectionId,$title,$priority,$body,$type,$video_url,$free){
    $connection = connectDb();
    $result = $connection->query("Insert into content (section_id,title,priority,body,type,video_url,free)
                                    Values('$sectionId','$title','$priority','$body','$type','$video_url','$free')");
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

function getCourseByCourseId($courseId){
    $connection = connectDb();
    $result = $connection->query("SELECT * from course where course_id = " . $courseId);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getCourseByCourseId2($courseId){
    $connection = connectDb();
    $result = $connection->query("SELECT * from course where course_id = " . $courseId);
    return $result->fetch_assoc();
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

function getTeachers(){
    $connection = connectDb();
    $result = $connection->query("SELECT * from teacher");
    return $result->fetch_all(MYSQLI_ASSOC);
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
    $result = $select->fetch_assoc();
    if(is_array($result)) {
        return count($result);
    } else {
        return 0;
    }    

}

function isStudentEnrolledInCourse($courseId,$userId) {
    $connection = connectDb();
    $select = $connection->query("SELECT * from enroll WHERE course_id='$courseId' And user_id='$userId' ");    
    $result = $select->fetch_assoc();
    if(is_array($result) ) { 
        return count($result) > 0;
    } else {
        return false;
    }  
}


function findEnrollCourseByUserId($userId) {
    $connection = connectDb();
    $select = $connection->query("SELECT * from enroll WHERE user_id=" . $userId);
    return count($select->fetch_assoc());

}

function getPopularCourse() {
    $connection = connectDb();
    $result = $connection->query("SELECT course_id,COUNT(*) FROM enroll GROUP BY course_id ORDER BY COUNT(course_id) DESC LIMIT 2");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function searchUser($userId){
    $connection = connectDb();
    $result = $connection->query("SELECT * from users where user_id = ". $userId);
    return $result->fetch_assoc();
}

function searchCourseByUserId($userId){
    $connection = connectDb();
    $result = $connection->query("SELECT * from enroll where user_id = ". $userId);
    return $result->fetch_assoc();
}

function savePassingdate($courseId,$userId,$date){
    $connection = connectDb();
    $result = $connection->query("UPDATE enroll SET status = 'passed', passing_date = '$date' where user_id = '$userId' AND course_id = '$courseId'");
    return true;
}

?>








