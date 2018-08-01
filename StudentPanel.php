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
            if(!isset($_SESSION["currentSession"])) $_SESSION["currentSession"]= crypt(uniqid($qid),time()); 
            $_SESSION["geturl"]=null;
            header("Location:questions.php?qid=".$qid);
            exit();
    }
    if($_SESSION["isTeacher"]){
            header("Location:TeacherPanel.php");
            exit();
    }
    if(!isset($_SESSION["currentSession"])) $_SESSION["currentSession"] = crypt(uniqid( $stId ),time()); 
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
       
         <div class="row row-eq-height">
               <?php
               $student = selectStudent($stId);
               $sub = selectSubject($student["email"],true);
             if(!isset($sub["error"]))
              foreach($sub as $val){
               $Exam = json_decode($val["inExam"],JSON_OBJECT_AS_ARRAY);
               $canExam =($Exam[$student["email"]]=="")?
                        '<a href="questions.php?qid='.$val["Id"].'" class="btn btn-primary">Enter the exam</a>'
                        :'<input href="#" type="button" class="btn btn-secondary" value="Compelete" disabled>';
               $degree= json_decode($val["degree"],$options=JSON_OBJECT_AS_ARRAY)[$student["email"]];
               $degree = $degree==-1?0:$degree ;
               $card = ' <div class="col col-sm-6">
                            <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">'.$val["name"].'</h5>
                                <p class="card-text">Degree&nbsp:&nbsp'.$degree.'</p>'
                               .$canExam.
                            '</div>
                            </div>
                          </div>';
                echo $card;
              }
               
               ?>
          </div>
      </main>
   </body>
</html>

