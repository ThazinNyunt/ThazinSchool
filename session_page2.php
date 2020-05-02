<?php
session_start();

echo $_SESSION['user_id'] . ' - ' . $_SESSION['user_name'];
 