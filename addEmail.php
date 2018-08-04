<?php
session_start();
ini_set("display_error",1);
if($_SESSION["isTeacher"]) // check if user is teacher .
{
    if($_SERVER["REQUEST_METHOD"]=="POST") //check if request method is post.
    {
        include_once("mysql.php"); // include mysql for db usage.
        
        $subId = $_POST["id"]; // store subject id.
        $emails = ($_POST["email"]); // store users email .
        $sub = selectSubject($subId); // select subject from sub id.
        $degree = json_decode($sub[0]["degree"],JSON_OBJECT_AS_ARRAY); // get degrees table to modify
        $inExam = json_decode($sub[0]["inExam"],JSON_OBJECT_AS_ARRAY); // get users according the exam to modify.
 
        foreach($emails as $k=>$v) 
        {
            $val = strtolower($v);
            if(!array_key_exists($val,$degree)){ // if the user not exist
            $degree[$val]=-1;     // default degree
            $inExam[$val]="";     // default value of user to make exam
            }
        }
        $degree = addslashes(json_encode($degree,JSON_UNESCAPED_UNICODE)); // convert array to json object
        $inExam =addslashes(json_encode($inExam,JSON_UNESCAPED_UNICODE));  // convert array to json object
        if($GLOBALS["qid"]!=null)$GLOBALS["temp_qid"]=$GLOBALS["qid"]; // check if there is already has question id.
        $GLOBALS["qid"]=$subId;
        updateSubject(array("degree"=>$degree,"inExam"=>$inExam)); // update the subject
        $GLOBALS["qid"]=$GLOBALS["temp_qid"];  //swap making 
        $GLOBALS["temp_qid"]=null;
        header("location:TeacherPanel.php",true,301);
        exit();
    }
}
else
{
    // if it is not a teacher (not login or student).
    header("location:Home.php",true,301);
    exit();
}
?>