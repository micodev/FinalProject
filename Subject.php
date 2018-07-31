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
    for($i =1;;$i++) // when np isset break
    {
      $q = isset($_POST["question$i"])?$_POST["question$i"] : null;
      if($q==null){break;}
      $anq =$_POST["anq$i"];
      addquestion($q,$anq);
    }
    $emails = $_POST["email"];
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
    //header("Location:TeacherPanel.php");
  //  exit();


?>