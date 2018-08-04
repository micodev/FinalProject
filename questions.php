<?php
session_start();
$GLOBALS["pagetitle"] ="Exam";
$stId = isset($_SESSION["id"]) ? $_SESSION["id"] : null; // check if there's an ID
if (!isset($stId)) // if user not login and enter the Home Again
    {
    if (isset($_GET["qid"]))
        $_SESSION["geturl"] = $_GET["qid"];
    $_SESSION["isTeacher"] = null;
    header("Location:Home.php", true, 301);
    exit();
} else // if user login as teacher or student and enter the Home
    {
    if ($_SESSION["isTeacher"]) {
        header("Location:TeacherPanel.php");
        exit();
    }
}
$qnum = isset($_POST["num"]) ? $_POST["num"] : NULL; //check question current question .
$qid  = isset($_POST["qid"]) ? $_POST["qid"] : (isset($_GET["qid"])) ? $_GET["qid"] : null; //check quesion id question id
if($_SERVER["REQUEST_METHOD"]=="GET"){ if($_SESSION["qnum"]!=null){ // if user push reload the exam will canceled
    header("Location:StudentPanel.php",true,301); 
    exit();
}}
include_once("mysql.php");
$student = selectStudent($stId); // select student 
if ($qid != null) { // if the quesion id found
    $sub  = selectSubject($qid); // select subject
    $GLOBALS["pagetitle"] ="Exam : "+$sub[0]['name']; 
    if(isset($sub["error"])||!strpos($sub[0]["inExam"],$student["email"])){  // if the subject deleted or not found
        $_SESSION["qid"]  = $qid;
        $_SESSION["qnum"] = null;
       
       header("Location:StudentPanel.php",true,301); 
     exit();
    }
    if (!isset($_SESSION["qid"]) || $qid != $_SESSION["qid"]) { //set the new subJECT ID
        $_SESSION["qid"]  = $qid;
        $_SESSION["qnum"] = null;
    }
    if (!isset($_SESSION["qnum"])) { //if no question number then set one
        $_SESSION["qnum"] = 1;
        $qnum             = 0;
    } else { // after push submit get next question
        if($_SESSION["qnum"]>=$sub[0]["questionCount"]+1)$_SESSION["qnum"]=0;
        $qnum = $_SESSION["qnum"];
        $_SESSION["qnum"] = $_SESSION["qnum"] + 1;
    }
    $subinExam = json_decode($sub[0]["inExam"],JSON_OBJECT_AS_ARRAY);
    $inExam = $subinExam[$student["email"]];
    if($inExam!="" && $inExam!=$_SESSION["currentSession"]){
        // enter exam already
        header("Location:StudentPanel.php", true, 301);
        exit();
    }
    if($inExam==""){ // store the session of the exam
        $_SESSION["qnum"] = 1;
        $qnum = 0;
        $inExams =json_decode($sub[0]["inExam"],JSON_OBJECT_AS_ARRAY); 
        $inExams[$student["email"]]= $_SESSION["currentSession"];
        updateSubject(array("inExam"=>addslashes(json_encode($inExams))));
    }
    $qstr = "submit";
    if ($qnum > 0) {
        if ($_SERVER['REQUEST_METHOD'] != 'POST'){ // if the method not post.
             header("Location:Home.php", true, 301);
             exit();
        }
        $degree     = json_decode($sub[0]["degree"], JSON_OBJECT_AS_ARRAY);
        $question_1 = $_POST["question"];
        $answers = json_decode($sub[0]["answers"],JSON_OBJECT_AS_ARRAY)[$question_1];
        $choice     = $_POST["choice"];
        
        if ($answers['a'] == $choice) { //chek the answer if true
            $count = $sub[0]["questionCount"];
            $degree[$student["email"]] += round((100 / $count));
            if($degree[$student["email"]]==99){$degree[$student["email"]]=100;}
            $v = array(
                "degree" => addslashes(json_encode($degree))
            );
            updateSubject($v);
            
        }
        // set the answer of eacher student
        $currentQuestion = json_decode($student["questioncurrent"],JSON_OBJECT_AS_ARRAY);
        $currentQuestion[$sub[0]["Id"]][$question_1]=$choice;
        $currentQuestion =addslashes(json_encode($currentQuestion,JSON_UNESCAPED_UNICODE));
        updateStudent(array("questioncurrent"=>$currentQuestion));
    }
   if ($sub[0]["questionCount"] == $qnum) { //if it was last question
        $_SESSION["qid"]  = $qid;
        $_SESSION["qnum"] = null;
        $_SESSION["currentSession"] =crypt(uniqid(($stId.microtime(TRUE))));
        header("Location:StudentPanel.php");
        exit();
    } else {
        if($sub[0]["questionCount"] == $qnum+1) // if it is the last question
        {
            $qstr  = "Finish";
        }
        $question = json_decode($sub[0]["questionsId"],JSON_OBJECT_AS_ARRAY)[$qnum] ;
        $answers = json_decode($sub[0]["answers"],JSON_OBJECT_AS_ARRAY)[$question];
        shuffle($answers);
        $type = json_decode($sub[0]["type"],JSON_OBJECT_AS_ARRAY)[$qnum];
        $qnum = $qnum + 1;
    }
} else {
    // go away if any error happened
    header("Location:Home.php", true, 301);
    die();
}

?> 
<!DOCTYPE html>
<html>
   <?php include("Head.php"); ?>
   <body>
      <?php
         include("Header.php");
         ?>
      <div class="jumbotron vertical-center">
         <div class="container text-center">
            <form id="formquestions" action="<?php "questions.php?qid=$qid";?>" method="POST">
               <div class="row">
                  <div class="col">
                     <div class="card" style="width: 100%;">
                        <div class="card-body">
                           <h5 class="card-title"><?php echo "Question ".$qnum;?></h5>
                           <p name="question" class="card-text"><?php echo $question;?></p>
                           <input type="hidden" name="question" value="<?php echo $question;?>" />
                           <div class="row text-center">
                              <?php 
                                 $p = 1;
                                 foreach($answers as $value)
                                 {
                                     $radio = '<div class="col form-check">
                                                 <input class="form-check-input" type="radio" name="choice" id="Radios1" value="'.$value.'" checked>
                                                 <label class="form-check-label" for="Radios1">
                                                 '.$value.'
                                                 </label>
                                               </div>';
                                     echo $radio;
                                     $p++;
                                 }
                                 ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col">
                     <input type="submit" id="submait" class="btn btn-primary btn-lg btn-block" value="<?php echo $qstr; ?>">
                  </div>
               </div>
            </form>
         </div>
      </div>
      <footer style="width:100%;" class="pt-4 my-md-5 pt-md-5 border-top">
         <div style="width:100%;" class="row">
         <div class="col-12 col-md">
            <small class="d-block mb-1 text-muted">&copy; 2017-2018</small>
         </div>
      </footer>
   </body>
</html>

