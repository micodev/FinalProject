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
?>
<!DOCTYPE html>
<html>
 <?php include_once("Head.php"); ?>
<body>
<?php
include("Header.php"); 
if(!isset($_SESSION["id"])) // if user not login and enter the Home Again
include("notLogin.php");
else // if user login as teacher or student and enter the Home
{
if($_SESSION["isTeacher"])
{
    header("Location:TeacherPanel.php");
}
else
{
    header("Location:StudentPanel.php");
}
}
?>
</body>
</html>

