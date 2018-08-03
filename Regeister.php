<?php
session_start();
include_once("mysql.php");
function regeister($teacher=false)
{
  $GLOBALS["s"] = "t";
  $name = strip_tags($_POST["name"]);
  $email =strip_tags($_POST["email"]);
  $password = strip_tags($_POST["password"]);
  $error=false;
  if(strlen($name)==0){ $_SESSION["name_error"] = "name must be more than zero character"; $error=true;}
  if(strlen($email)==0){ $_SESSION["email_error"]="email must be more than zero character"; $error=true;}
  if(strlen($password)==0){$_SESSION["password_error"]="password must be more than zero character";$error=true;}
  if($error)
  {
    $_SESSION["regeister"]=true;
    header("location:Home.php",true,301); 
    die();
  }
  if($teacher){ // regeister as teacher
   $r = insertTeacher($name,$email,$password);
   if($r["status"]==="exist"){
    $_SESSION["email_error"] ="The email already in use.";
    $_SESSION["regeister"]=true;
    header("location:Home.php",true,301); 
    die();
   }
   $_SESSION["isTeacher"] = true;
   $te = selectTeacher($email,true);
   $_SESSION["id"]=$te["teacherId"];
   setcookie("id",$te["teacherId"],time()+(60*60*2),"/","localhost");
   header("Location:TeacherPanel.php");
  }
  else{// regeister as student
   $r = insertStudent($name,$email,$password);
   if($r["status"]==="exist"){
    $_SESSION["email_error"] ="The email already in use.";
    $_SESSION["regeister"]=true;
    header("location:Home.php",true,301); 
    die();
   }
   $te = selectStudent($email,true);
   print_r($te);
   $_SESSION["name"] = $te["name"];
   $_SESSION["id"]=$te["studentId"];
   $_SESSION["isTeacher"] = false;
   setcookie("id",$te["studentId"],time()+(60*60*2),"/","localhost");
  header("Location:StudentPanel.php");
  }
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  $istpost = isset($_POST["isTeacher"])?strip_tags($_POST["isTeacher"]):"";
  if($istpost=="on")
   $isTeacher=true;
   else $isTeacher=false;
  regeister($isTeacher);
}
else
{
  // if not post method send to notfound page.
  header("Location:Reallynigga?");
}
?>