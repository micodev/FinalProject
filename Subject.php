<?php
 include_once("mysql.php");
 session_start();
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
  $GLOBALS["qs"] = array();
  $GLOBALS["ans"] = array();
  $GLOBALS["types"] = array();
 function addquestion($q,$anq)
 {
  $GLOBALS["qs"][]=$q;
  $l="a";
  foreach ($anq as $key => $value) {
    $GLOBALS["ans"][$q][$l++] = $value;
  }
  $type = "";
  if(count($anq)==2)
    $type = "tf";
  else
   $type="ml";
   $GLOBALS["types"][] = $type;
 }
 $creator =$_SESSION["id"];
 $subName=$_POST["subName"];
    $q1 = $_POST["question1"];
    $anq1=$_POST["anq1"];
    $q2 = isset($_POST["question2"]) ?$_POST["question2"] : null;
    $anq2 =  isset($_POST["anq2"])?$_POST["anq2"]: null;
    $emails = $_POST["email"];
    $q3 =  isset($_POST["question3"])?$_POST["question3"]: null;
    $anq3 =  isset($_POST["anq3"])?$_POST["anq3"]: null;
    addquestion($q1,$anq1);
     if(!empty($q2))addquestion($q2,$anq2);
     if(!empty($q3))addquestion($q3,$anq3);
    $degress = array();
    $inExam =array();
    foreach($emails as $value)
    {
      $degress[strtolower($value)]= -1;
      $inExam[strtolower($value)]="";
    }
    print("<pre>");
    print_r($qs);
    print("</pre>");
    $res = insertSubject($creator,$subName,count($qs),json_encode($qs,JSON_UNESCAPED_UNICODE),
    json_encode($ans,JSON_UNESCAPED_UNICODE),json_encode($types,JSON_UNESCAPED_UNICODE),
    json_encode($degress,JSON_UNESCAPED_UNICODE),json_encode($inExam,JSON_UNESCAPED_UNICODE));
    $_SESSION["subId"] = $res["subId"];
    header("Location:TeacherPanel.php");
    exit();


?>