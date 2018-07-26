
<?php
    session_start();
    ini_set("display_errors",true);
    $qnum = isset($_POST["num"])?$_POST["num"]:NULL;
    $qid = isset($_POST["qid"])?$_POST["qid"]:isset($_GET["qid"])?$_GET["qid"]:null;
    include_once("mysql.php");
    $student = selectStudent($_SESSION["id"]);
    if($qid !=null)
    {
     if(!isset($_SESSION["qid"])||$qid!=$_SESSION["qid"])
     {$_SESSION["qid"]=$qid; $_SESSION["qnum"]=null;}
     if(!isset($_SESSION["qnum"]))
     {$_SESSION["qnum"]=1;  $qnum=0;}
     else
     {$qnum=$_SESSION["qnum"];$_SESSION["qnum"]=$_SESSION["qnum"]+1;}
     $sub = selectSubject($qid);
     $qstr="submit";
     $question = json_decode($sub[0]["questionsId"],JSON_OBJECT_AS_ARRAY)[$qnum];
     if($qnum>0){
        $degree = json_decode($sub[0]["degree"],JSON_OBJECT_AS_ARRAY);
        $question_1=$_POST["question"];
        $answers = json_decode($sub[0]["answers"],JSON_OBJECT_AS_ARRAY)[$question_1];
        $choice = $_POST["choice"];
       
        if($answers['a']==$choice){
            $count = $sub[0]["questionCount"];
                $degree[$student["email"]] += (100/$count); 
                $v = array("degree"=>addslashes(json_encode($degree)));
                updateSubject($v);
          
       }
     }
     $answers = json_decode($sub[0]["answers"],JSON_OBJECT_AS_ARRAY)[$question];
     shuffle($answers);
     $type = json_decode($sub[0]["type"],JSON_OBJECT_AS_ARRAY)[$qnum];
     $qnum=$qnum+1;
     if($sub[0]["questionCount"]<=$qnum)
     {
         // last question
         $qstr = "Finish";

     }
    }
    else
    {
      echo "wot ? ";
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
         <?php if($qstr=="Finish") include("finishQuestion.php");else include("answeringQuestion.php");?>
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

