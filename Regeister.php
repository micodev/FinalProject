<?php
//echo"<pre>";
//print_r( $_SERVER["REQUEST_METHOD"]);
//echo"</pre>";
include_once("mysql.php");
function regeister($teacher=false)
{
  $GLOBALS["s"] = "t";
  $name = strip_tags($_POST["name"]);
  $email =strip_tags($_POST["email"]);
  $password = strip_tags($_POST["password"]);
  if(strlen($name)==0){ echo "<script>alert('name must be more than zero character');</script>"; sleep(5);header("Location:Home.php");}
  if(strlen($email)==0){echo "email must be more than zero character"; sleep(5);header("Location:Home.php");}
  if(strlen($password)==0){echo ("password must be more than zero character");sleep(5);header("Location:Home.php");}
  if($teacher){
   insertTeacher($name,$email,$password);
   $_SESSION["isTeacher"] = true;
   $te = selectTeacher($email,true);
   $_SESSION["id"]=$te["teacherId"];
   setcookie("id",$te["teacherId"],time()+(60*60*2),"/","localhost");
   header("Location:Home.php");
  }
  else{
   insertStudent($name,$email,$password);
   $te = selectStudent($email,true);
   $_SESSION["id"]=$te["studentId"];
   $_SESSION["isTeacher"] = false;
   setcookie("id",$te["studentId"],time()+(60*60*2),"/","localhost");
   header("Location:Home.php");
  }
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  $isTeacher =strip_tags($_POST["isTeacher"]);
  if($isTeacher=="on")
   $isTeacher=true;
   else $isTeacher=false;
  regeister($isTeacher);
}
else
{
  header("Location:Reallynigga?");
}
?>