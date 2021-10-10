<?php
   include_once "autoload.php";
   $student_id = $_GET['delete_id'];

   connect()->query("DELETE FROM students WHERE id='$student_id'");

   header("location:index.php");

?>