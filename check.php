<?php 
if(isset($_SESSION['user_id']) == false) {
  //echo "Not logg...";
  header("Location: admin_login.php");
  exit;
} else {
  if($_SESSION['role'] != 'teacher') {
    echo "Unauthorized";
    exit;
  } 
}
?>