<?php
session_start();
if($_SESSION["isTeacher"])
{
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        include_once("mysql.php");
        
        $subId = $_POST["id"];
        $emails = $_POST["email"];
        $sub = selectSubject($subId);
        var_dump($sub);
        $degree = json_decode($sub[0]["degree"],JSON_OBJECT_AS_ARRAY);
        $inExam = json_decode($sub[0]["inExam"],JSON_OBJECT_AS_ARRAY);
        foreach($emails as $k=>$v)
        {
            $v = strtolower($v);
            if(!array_key_exists($v,$degree)){
            $degree[$v]=-1;
            $inExam[$v]="";
            }
        }
        $degree = addslashes(json_encode($degree,JSON_UNESCAPED_UNICODE));
        $inExam =addslashes(json_encode($inExam,JSON_UNESCAPED_UNICODE));
        if($GLOBALS["qid"]!=null)$GLOBALS["temp_qid"]=$GLOBALS["qid"];
        $GLOBALS["qid"]=$subId;
        updateSubject(array("degree"=>$degree,"inExam"=>$inExam));
        $GLOBALS["qid"]=$GLOBALS["temp_qid"];
        $GLOBALS["temp_qid"]=null;
        header("location:TeacherPanel.php",true,301);
        exit();
    }
}
else
{
    header("location:Home.php",true,301);
    exit();
}
?>