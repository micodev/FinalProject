<?php
session_start();
include("mysql.php");
function Login()
{
  $email =strip_tags($_POST["email"]);
  $password = strip_tags($_POST["password"]);
  $row =selectTeacherOrStudent($email,true); 
  var_dump($email . " : " .$password);
  var_dump($row);
  if(isset($row["password"])& $row["password"]==$password)
  { 
   
      $isT = $row["isTeacher"];
      var_dump($isT);
      $_SESSION["isTeacher"] = $isT;
      $_SESSION["name"] = $row["name"];
      if($isT)
      {
        $_SESSION["id"] = $row["teacherId"];
        header("Location:TeacherPanel.php");
       }
      else{
        $_SESSION["id"] = $row["studentId"];
        header("Location:StudentPanel.php");
      }
    
  }
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  Login();
}
else
{
  header("Location:Reallynigga?");
}
?>