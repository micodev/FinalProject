

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
    if($sub[0]["questionCount"]==$qnum)
    {
        $qstr = "Finish";
        header("Location:StudentPanel.php",true,301);
    }
    else{
    $question = json_decode($sub[0]["questionsId"],JSON_OBJECT_AS_ARRAY)[$qnum] ;
    $answers = json_decode($sub[0]["answers"],JSON_OBJECT_AS_ARRAY)[$question];
    shuffle($answers);
    $type = json_decode($sub[0]["type"],JSON_OBJECT_AS_ARRAY)[$qnum];
    $qnum=$qnum+1;
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

