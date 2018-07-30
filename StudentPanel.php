<?php
   session_start();
   include_once("mysql.php");
   $stId = isset($_SESSION["id"])?$_SESSION["id"]:null;
   if(!isset($stId)) // if user not login and enter the Home Again
{
    $_SESSION["id"]= null;
    $_SESSION["isTeacher"]=null;
    header("Location:Home.php",true,301);
}
else // if user login as teacher or student and enter the Home
{
    if(isset($_SESSION["geturl"]))
    {    
            $qid = $_SESSION["geturl"];
            echo($qid);
            $_SESSION["geturl"]=null;
            header("Location:questions.php?qid=".$qid);
            exit();
    }
    if($_SESSION["isTeacher"]){
            header("Location:TeacherPanel.php");
            exit();
    }
}
   ?>
<!DOCTYPE html>
<html>
   <?php include("Head.php"); ?>
   <body>
      
      <?php 
      include("Header.php"); 
      ?>
      <main class="container" role="main">
         <div class="jumbotron text-center">
       
         <div class="row">
               <?php
               $student = selectStudent($stId);
               $sub = selectSubject($student["email"],true);
             
              foreach($sub as $val){
               $degree= json_decode($val["degree"],$options=JSON_OBJECT_AS_ARRAY)[$student["email"]];
               $degree = $degree==-1?0:$degree ;
               $card = ' <div class="col-sm-6">
                            <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">'.$val["name"].'</h5>
                                <p class="card-text">Degree&nbsp:&nbsp'.$degree.'</p>
                                <a href="questions.php?qid='.$val["Id"].'" class="btn btn-primary">Go somewhere</a>
                            </div>
                            </div>
                          </div>';
                echo $card;
              }
               
               ?>
          </div>
      </main>
   </body>
</html>

