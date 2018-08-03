<?php
    session_start();
    if(isset($_SESSION['isTeacher']))
        if($_SESSION["isTeacher"])
        {
            if($_SERVER["REQUEST_METHOD"]=="POST") // check if it is post method
            {
                include_once("mysql.php"); // include mysql for db usage
                $id = $_POST["delete"]; // the id of subject to be deleted
                deleteSubject($id); // delete sub
                header("location:TeacherPanel.php",true,301); // redirect .
                exit();
            }
        }
        else
        {
            header("location:Home.php",true,301); // if not teacher redirect .
            exit();
        }
    else
    {
      // if not logined redirect ....
      header("location:Home.php",true,301); 
      exit();
    }
?>