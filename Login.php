<?php
session_start();
include_once("mysql.php");  // include mysql for db usage.
function Login()
{
  $email =strip_tags($_POST["email"]); // get email.
  $password = strip_tags($_POST["password"]); // get password
  $row =selectTeacherOrStudent($email,true);  // select user accord to email
  if(isset($row["password"]) && $row["password"]==$password)
  { 
     // if information correct login and set session
      $isT = $row["isTeacher"];
      $_SESSION["isTeacher"] = $isT;
      $_SESSION["name"] = $row["name"];
      if($isT) //check if it is teacher 
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
  Login(); // if request post login
}
else
{
  header("Location:Reallynigga?"); // redirect to not found page.
}
?>