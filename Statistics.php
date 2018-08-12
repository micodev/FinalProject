<?php
// get student statistics
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
{
 include_once("mysql.php");
 $qid  = $_GET["qid"];
 $student = selectAllStudent($qid,true);
 $sub = selectSubject($qid); $sub =$sub[0];
 $degree = json_decode($sub["degree"],JSON_OBJECT_AS_ARRAY);
 $questions=json_decode($sub["answers"],JSON_OBJECT_AS_ARRAY);
}
?>
<table class="table table-condensed table-sm table-hover table-inverse table-responsive table-bordered">
    <thead class="thead-inverse|thead-default">
        <tr>
            <th>#</th>
            <?php
            foreach($questions as $k=>$v)
            {
                echo "<th>$k</th>";
            }
            ?>
        </tr>
        </thead>
        <tbody>
           <?php 
           $rightAnswer= "<tr class='table-dark'><td scope='row'>Right answer</td>";
           foreach($questions as $v1)
            {
                $rightAnswer.="<td class='table-success'>".$v1['a']."</td>";
            }
            $rightAnswer.="</tr>";
            echo($rightAnswer);
           foreach( $degree as $k=>$v) 
           {

               $col=' <tr><td scope="row">'.$k.'</td>';
               $std =json_decode($student[$k]["questioncurrent"],JSON_OBJECT_AS_ARRAY);
               $std = isset($std[$qid])?$std[$qid]:array();
               $to = $sub["questionCount"];
            
               foreach($questions as $k1=>$v1)
               {
                   $ans = isset($std[$k1])?$std[$k1]:"N/A";
                   $class="";
                   if($ans!="N/A"){
                     $class = ($v1["a"]==$ans)?'class="table-success"':'class="table-danger"';
                    
                   }else{$class='class="table-warning"';}
                   $col.="<td ".$class.">".$ans."</td>";
               }
               $col.="</tr>";
               echo $col;
               
           }
         
           ?>
           
            
           
        </tbody>
</table>