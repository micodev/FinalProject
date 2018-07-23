

<?php
   session_start();
   if(!isset($_SESSION["id"])) // if user not login and enter the Home Again
{header("Location:Home.php");
  exit();
}
else // if user login as teacher or student and enter the Home
{
if(!$_SESSION["isTeacher"])
{
   
    header("Location:Home.php");
    exit();
}
}
   ?>
<!DOCTYPE html>
<html>
   <?php include("Head.php"); ?>
   <body>
      <?php include("Header.php"); ?>
      <main class="container" role="main">
         <div class="jumbotron text-center">
         <div class="col-md-12 text-center">
            <p>Create Subject</p>
            <ul class="nav nav-pills center-pills">
               <li>
                  <a class="nav-link" id="pills-Subject-tab" data-toggle="pill" href="#pills-Subject" role="tab" aria-controls="pills-Subject" aria-selected="false">New Subject</a> 
               </li>
            </ul>
         </div>
         <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade" id="pills-Subject" role="tabpanel" aria-labelledby="pills-Subject-tab">
               <form id="addSubject" action="/FinalProject/Subject.php" method="POST" >
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
         </div>
      </main>
   </body>
</html>

