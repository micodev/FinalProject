

<?php 
   session_start();
   $GLOBALS["pagetitle"] ="Home";
      if(isset($_SESSION["isTeacher"])){
      if($_SESSION["isTeacher"] ==true)
     {
     // if teacher jump to teacher panel
      header("location: TeacherPanel.php",  true,  301 );  exit;
     }
     else
     {
     // if teacher jump to student panel
        header("Location:StudentPanel.php", true,  301);
     
     }
   
   }
   ?>
<!DOCTYPE html>
<html class="h-100" >
   <?php  include_once("Head.php"); ?>
   <body class="h-100 d-flex flex-column">
     
      <?php
         include("Header.php"); 
         include("notLogin.php");  
         ?>
   </body>
</html>

