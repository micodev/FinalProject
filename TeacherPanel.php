

<?php
   session_start();
   include("mysql.php");
   if(!isset($_SESSION["id"])) // if user not login and enter the Home Again
   header("Location:Home.php");
   else // if user login as teacher or student and enter the Home
   if(!$_SESSION["isTeacher"])
   header("Location:StudentPanel.php");
   $sid = $_SESSION["id"];
   ?>
<!DOCTYPE html>
<html>
   <?php include("Head.php"); ?>
   <body>
       <?php 
       if(isset($_SESSION["subId"]))
       {
         $subId = $_SESSION["subId"];
         print('<div class ="row justify-content-center">
         <span class="col-md-6 input-group mb-4 alert alert-primary" id="copy" role="alert">
           click to copy question link that you have created
             <span id="copytarget" hidden>'.$_SERVER['HTTP_HOST'] .'/questions.php?qid='.$subId.'</span>
           </span>
       </div>');
       $_SESSION["subId"]= null;
       }
       ?>
      
      <?php 
      include("Header.php"); 
      ?>
      <main class="container" role="main">
         <div class="jumbotron text-center">
        <div class="row">
         <div class="col-md-12 ">
            <p>Create Subject</p>
            <ul class="nav nav-pills center-pills">
               <li>
                  <a class="nav-link" id="pills-Subject-tab" data-toggle="pill" href="#pills-Subject" role="tab" aria-controls="pills-Subject" aria-selected="false">New Subject</a> 
                  <a class="nav-link" id="pills-Subject-tab" data-toggle="pill" href="#pills-Subjects" role="tab" aria-controls="pills-Subject" aria-selected="false">Your Subjects</a> 
               </li>
            </ul>
         </div>
        </div>
         <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade" id="pills-Subject" role="tabpanel" aria-labelledby="pills-Subject-tab">
               <form id="addSubject" action="Subject.php" method="POST" >
                  <div class="form-group">
                     <label for="subName" >Subject Name</label>
                     <input name="subName" id="subName" class="form-control" type="text" required>
                  </div>
                  <div class="input-group mb-3">
                     <div class="input-group-prepend">
                        <label class="input-group-text" for="questionCount">Options</label>
                     </div>
                     <select class="custom-select" id="questionCount" required>
                        <option value="0" selected disabled>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                     </select>
                  </div>
                  <div id="questionField">
                  </div>
                  <div class="alert alert-primary row">
                    <label for="UserEmail">Email address</label>
                    <input type="email" class="form-control" id="UserEmail" aria-describedby="emailHelp" placeholder="Enter email" name="email[]">
                    <button style="margin-top:1%" name="addEmail" id="addStudent" class="btn btn-outline-primary" type="button"> Add student email <i class="fas fa-plus"></i></button>
                  </div>
                  <button type="submit" class="btn btn-light">Submit</button>
               </form>
            </div>
            <div  class="tab-pane fade" id="pills-Subjects" role="tabpanel" aria-labelledby="pills-Subjects-tab">
                <div class="container">
                    <div class="row" >
                     <?php include("subjectsCreator.php") ?>
                    </div>
                </div>
            </div>
         </div>
      </main>
   </body>
</html>

