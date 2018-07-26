

<?php 
   session_start();
   setcookie("ch","true",0,"/","localhost");
   if(count($_COOKIE)>0)
   {
       // the cookie is enabled
   }
   else
   { 
       // cookies not enabled
   }
      if(isset($_SESSION["isTeacher"])){
      if($_SESSION["isTeacher"] ==true)
     {
      header("location: TeacherPanel.php",  true,  301 );  exit;
     
     }
     else
     {
   
        header("Location:StudentPanel.php", true,  301);
     
     }
   }
   ?>
<!DOCTYPE html>
<html>
   <?php  include_once("Head.php"); ?>
   <body>
      <?php 
         echo $_SESSION["isTeacher"]." <br>";
         echo $_SESSION["id"]; ?>
      <?php
         include("Header.php"); 
         include("notLogin.php");
           
         ?>
   </body>
</html>

