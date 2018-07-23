<?php
 include_once("mysql.php");
 session_start();
 ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
 $creator =$_SESSION["id"];
 $subName=$_POST["subName"];
 if(isset($_POST["question3"]))
 {
    $q1 = $_POST["question1"];
    $anq1=$_POST["anq1"];

    $q2 = $_POST["question2"];
    $anq2 = $_POST["anq2"];
   
    $q3 = $_POST["question3"];
    $anq3 = $_POST["anq3"];
    
 }
 else if(isset($_POST["question2"]))
 {
    $q1 = $_POST["question1"];
    $anq1=$_POST["anq1"];
    $q2 = $_POST["question2"];
    $anq2 = $_POST["anq2"];
 }
 else if(isset($_POST["question1"]))
 {
   
    $q1 = $_POST["question1"];
    $anq1=$_POST["anq1"];
    $emails = $_POST["email"];
    $qs = array();
    $qs[]=$q1;
    $ans = array(array());
    $l="a";
    $types = array();
    foreach ($anq1 as $key => $value) {
        $ans[0][$l++] = $value;
    }
    
    $type = "";
    if(count($anq1)==2)
      $type = "tf";
    else
     $type="ml";
     $types[] = $type;
    $degress = array();
    foreach($emails as $value)
    {
      $degress[$value]= -1;
    }
  
    $res = insertSubject($creator,$subName,1,json_encode($qs),json_encode($ans),json_encode($types),json_encode($degress));   
    echo "<pre>";
    print_r($res);
    echo"</pre>";
 }
 


?>