

<?php
   session_start();
   include_once("mysql.php");
   ini_set('display_errors', 1); ini_set('display_startup_errors', 1);
   $stId = isset($_SESSION["id"])?$_SESSION["id"]:"";
   
   if($stId=="") // if user not login and enter the Home Again
{
    header("Location:Home.php");
}
else // if user login as teacher or student and enter the Home
{
if($_SESSION["isTeacher"])
{
   
    header("Location:Home.php");
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

