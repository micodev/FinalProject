

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
         print('
         <span style="display:block;margin:0;"class="input-group alert alert-primary text-center" id="copy" role="alert">
           click to copy question link that you have created
         </span>
         <input id="copytarget" value="'.$_SERVER['HTTP_HOST'] .'/questions.php?qid='.$subId.'"  hidden>
       ');
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
                        <option value="4">Four</option>
                        <option value="5">Five</option>
                     </select>
                  </div>
                  <div id="questionField">
                  </div>
                  <div class="alert alert-primary row">
                    <label for="UserEmail">Email address</label>
                    <input type="email" class="form-control" id="UserEmail" aria-describedby="emailHelp" placeholder="Enter email" name="email[]" required>
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
                <!-- Modal add email -->
            <div class="modal fade" id="addEamilModal" tabindex="-1" role="dialog" aria-labelledby="addEamilModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addEamilModalLabel">addEmail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="/addEmail.php" method="POST">
                    <div class="modal-body">
                    
                      <div class="alert alert-primary row">
                        <label for="UserEmail">Email address</label>
                        <input class="subIdModal btn btn-primary" value="" name="id" hidden>
                        <input type="email" class="form-control" id="UserEmail" aria-describedby="emailHelp" placeholder="Enter email" name="email[]" required>
                        <button style="margin-top:1%" name="addEmail" id="addStudentModal" class="btn btn-outline-primary" type="button"> Add student email <i class="fas fa-plus"></i></button>
                      </div>
                  
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Modal for student stats -->
            <div class="modal fade" id="studentStats" tabindex="-1" role="dialog" aria-labelledby="studentStatsLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="studentStatsLabel">Student stats</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body" id="statistic-container">
                    ...
                  </div>
                  <div class="modal-footer text-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
         </div>
         
      </main>
   </body>
</html>

