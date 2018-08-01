<?php
 session_start();
 $username = "root";
 $password = "password";
 $hostname = "localhost"; 
 $dbhandle = mysqli_connect($hostname, $username, $password)or die("Unable to connect to MySQL");
 $selected = mysqli_select_db($dbhandle,"Online_Examination");
 function selectTeacherOrStudent($id,$email=false){
  $dbhandle = $GLOBALS["dbhandle"];
  $query ="SELECT * FROM Teacher where teacherId like '".strtolower($id)."'";
  if($email ==true)
  {$query .=" OR email like '".strtolower($id)."'";}
  $result = mysqli_query($dbhandle,$query);
  while($row = mysqli_fetch_array($result)){
     $row["isTeacher"] = true;
      return $row;
  }
  $query = "SELECT * FROM Student where studentId like '".strtolower($id)."'";
  if($email ==true)
  {$query .=" OR email like '".strtolower($id)."'";}
  $result = mysqli_query($dbhandle,$query);
  while($row = mysqli_fetch_array($result)){
    $row["isTeacher"] = false;
      return $row;
  }
  return array("error"=>"not found");}
 function selectTeacher($id,$email=false){
  $dbhandle = $GLOBALS["dbhandle"];
  $query ="SELECT * FROM Teacher where teacherId like '".strtolower($id)."'";
  if($email ==true)
  {$query .=" OR email like '".strtolower($id)."' ";}
  $result = mysqli_query($dbhandle,$query);
  while($row = mysqli_fetch_array($result)){
    $row["isTeacher"] = true;
      return $row;
    
  }
  return array("error"=>"not found");}
 function selectAllTeacher(){
  $dbhandle = $GLOBALS["dbhandle"];
  $query ="SELECT * FROM Teacher";
  echo $query;
  $result = mysqli_query($dbhandle,$query);
  $arrayofarray = null;
  while($row = mysqli_fetch_array($result)){
    $row["isTeacher"] = true;
   $arrayofarray[$row["teacherId"]] = $row;
  }
  if(count($arrayofarray)==0)
  return array("error"=>"no rows");
  else
  return $arrayofarray;}

 function insertTeacher($name,$email,$password){
  $arr =selectTeacherOrStudent($email,true);
  $in = !array_key_exists("error",$arr);
  if($in){return array("status"=>"exist");}
  $dbhandle = $GLOBALS["dbhandle"];
  $id=crypt(uniqid($email),$email);
  $query ="INSERT INTO Teacher VALUES ('$id', '$name', '$email', '$password', '{}', '{}')";
  $result = mysqli_query($dbhandle,$query);
  return array("status"=>$result);}
 function updateTeacher($change){
   // get Id from sesssion or cookies 
   $id ="1999126";
   $keys = array_keys($change);
   $values = array_values(($change));
   $arr =selectTeacher($id);
   $in = array_key_exists("error",$arr);
    if($in){return array("status"=>"not exist");}
    $dbhandle = $GLOBALS["dbhandle"];
    $query ="UPDATE Teacher SET ";
    for($i=0;$i<count($keys);$i++){
      if($i<(count($keys)-1))
      $query .=$keys[$i] . "=\"".$values[$i]."\",";
      else
      $query .=$keys[$i] . "=\"".$values[$i]."\"";
    }
   $query .=" WHERE teacherId=".$arr["teacherId"];
   $result = mysqli_query($dbhandle,$query);
   return array("status"=>$result);
   }

 
 function deleteTeacher($id,$email=false){
    $dbhandle = $GLOBALS["dbhandle"];
    $query ="delete FROM Teacher where teacherId like '".strtolower($id)."'";
    if($email ==true){$query .=" OR email like '".strtolower($id)."' ";}
    $result = mysqli_query($dbhandle,$query);
    return array("status"=>boolval($result));
  }
 function selectStudent($id,$email=false){
    $dbhandle = $GLOBALS["dbhandle"];
    $query ="SELECT * FROM Student where studentId like '".strtolower($id)."'";
    if($email ==true)
    {$query .=" OR email like '".strtolower($id)."' ";}
    $result = mysqli_query($dbhandle,$query);
    while($row = mysqli_fetch_array($result)){
      $row["isTeacher"] = false;
        return $row;
      
    }
  return array("error"=>"not found");}
 function selectAllStudent(){
    $dbhandle = $GLOBALS["dbhandle"];
    $query ="SELECT * FROM Student";
    echo $query;
    $result = mysqli_query($dbhandle,$query);
    $arrayofarray = null;
    while($row = mysqli_fetch_array($result)){
      $row["isTeacher"] = false;
     $arrayofarray[$row["StudentId"]] = $row;
    }
    if(count($arrayofarray)==0)
    return array("error"=>"no rows");
    else
    return $arrayofarray;}
  
 function insertStudent($name,$email,$password){
    $arr =selectTeacherOrStudent($email,true);
    $in = !array_key_exists("error",$arr);
    if($in){return array("status"=>"exist");}
    $dbhandle = $GLOBALS["dbhandle"];
    $id=crypt(uniqid($email),$email);
    $query ="INSERT INTO Student VALUES ('$id', '$name', '$email', '$password', '{}')";
    $result = mysqli_query($dbhandle,$query);
    return array("status"=>$result);}
 function updateStudent($change){
     // get Id from sesssion or cookies 
     $id ="1999126";
     $keys = array_keys($change);
     $values = array_values(($change));
     $arr =selectStudent($id);
     $in = array_key_exists("error",$arr);
      if($in){return array("status"=>"not exist");}
      $dbhandle = $GLOBALS["dbhandle"];
      $query ="UPDATE Student SET ";
      for($i=0;$i<count($keys);$i++){
        if($i<(count($keys)-1))
        $query .=$keys[$i] . "=\"".$values[$i]."\",";
        else
        $query .=$keys[$i] . "=\"".$values[$i]."\"";
      }
     $query .=" WHERE studentId=".$arr["studentId"];
     $result = mysqli_query($dbhandle,$query);
     return array("status"=>$result);
     }
  
   
 function deleteStudent($id,$email=false){
      $dbhandle = $GLOBALS["dbhandle"];
      $query ="delete FROM Student where studentId like '".strtolower($id)."'";
      if($email ==true){$query .=" OR email like '".strtolower($id)."' ";}
      $result = mysqli_query($dbhandle,$query);
      return array("status"=>boolval($result));
    }
 function selectSubject($id,$email=false,$cid=false){
      $dbhandle = $GLOBALS["dbhandle"];
      $query ="SELECT * FROM Subject where Id like '".$id."'";
      if($email){$query.=" or degree LIKE '%".strtolower($id)."%'";}
      if($cid){$query.=" or creatorId LIKE '".($id)."'";}
      $result = mysqli_query($dbhandle,$query);
      $sub=array();
      while($row = mysqli_fetch_array($result)){
        $sub[] = $row;
      }
      if(count($sub)>0)
       return $sub;
    return array("error"=>"not found");}  

 function selectAllSubject(){
      $dbhandle = $GLOBALS["dbhandle"];
      $query ="SELECT * FROM Subject";
      $result = mysqli_query($dbhandle,$query);
      $arrayofarray = null;
      while($row = mysqli_fetch_array($result)){
       $arrayofarray[$row["Id"]] = $row;
      }
      if(count($arrayofarray)==0)
      return array("error"=>"no rows");
      else
      return $arrayofarray;}

 function insertSubject($creator ,$name,$questionCount,$questions,$answers,$type,$degree,$inExam){
         // get id from session or cookies
    
        $cid =  $creator;
        $dbhandle = $GLOBALS["dbhandle"];
       
        $id="$cid".crypt(uniqid(time()),time());
        $query ="INSERT INTO Subject VALUES ('$id', '$name', '$questionCount', '$questions', '$answers','$type','$cid','$degree','$inExam')";
        $result = mysqli_query($dbhandle,$query);
      
        return array("status"=>$result,"subId"=>$id);}
 function updateSubject($change){
          $id =$GLOBALS["qid"];
          $keys = array_keys($change);
          $values = array_values($change);
          $arr =selectSubject($id);
          $arr = $arr[0];
          $in = array_key_exists("error",$arr);
           if($in){return array("status"=>"not exist");}
           $dbhandle = $GLOBALS["dbhandle"];
           $query ="UPDATE Subject SET ";
           for($i=0;$i<count($keys);$i++){
             
             if($i<(count($keys)-1))
             $query .=$keys[$i] . "=\"".$values[$i]."\",";
             else
             $query .=$keys[$i] . "=\"".$values[$i]."\"";
           }
          $query .=" WHERE Id=\"".$arr["Id"]."\"";
          $result = mysqli_query($dbhandle,$query);
        
          return array("status"=>$result);
  }
       
        
 function deleteSubject($id){
           $dbhandle = $GLOBALS["dbhandle"];
           $query ="delete FROM Subject where Id like '".$id."'";
           $result = mysqli_query($dbhandle,$query);
           return array("status"=>boolval($result));
         }
      

 ?>