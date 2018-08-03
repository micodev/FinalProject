<?php // not login form 
  session_start();
  if($_SESSION["regeister"]){
      $ractive ="show active";
      $lactive="";
  }else
{
      $ractive ="";
      $lactive=" show active";
}

?>
<main class="container" role="main">
  <div class="jumbotron text-center">
    <div class="col-md-12 text-center">
        <p>Choose between</p>
        <ul class="nav nav-pills center-pills">
            <li> 
                <a class="nav-link <?php echo $lactive; ?>" id="pills-Login-tab" data-toggle="pill" href="#pills-Login" role="tab" aria-controls="pills-Login" aria-selected="true">Login</a> 
            </li> 
            <li>
                <a class="nav-link <?php echo $ractive; ?>" id="pills-Regeister-tab" data-toggle="pill" href="#pills-Regeister" role="tab" aria-controls="pills-Regeister" aria-selected="false">Regeister</a> 
            </li>
        </ul>
    </div>
    <div class="tab-content" id="pills-tabContent"> 
     <div class="tab-pane fade <?php echo $lactive; ?>" id="pills-Login" role="tabpanel" aria-labelledby="pills-Login-tab">
       <form action="Login.php" method="POST" >
           <div class="form-group form-group-md">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" name="email">
            <div class="alert alert-danger" role="alert" <?php if(!isset($_SESSION["email_error_login"]))echo "hidden"?>>
                     <?php echo $_SESSION["email_error_login"]; ?>
                    </div>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
           </div>
           <div class="form-group form-group-md">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control"  placeholder="Password" name="password">
            <div class="alert alert-danger" role="alert" <?php if(!isset($_SESSION["password_error_login"]))echo "hidden"?>>
                     <?php echo $_SESSION["password_error_login"]; ?>
                    </div>
           </div>
           
           <div class="form-group">
            <button type="submit" class="btn btn-primary" name="Login">Submit</button>
           </div>
       </form>
        </div> 
     <div class="tab-pane fade <?php echo $ractive; ?>" id="pills-Regeister" role="tabpanel" aria-labelledby="pills-Regeister-tab">
      <form action="Regeister.php" method="POST" >
           <div class="form-group form-group-md">
                    <label for="exampleInputName">Your Name</label>
                    <input type="text" class="form-control" id="exampleInputName" aria-describedby="NameHelp" placeholder="Enter Name" name="name" value="">
                    <div class="alert alert-danger" role="alert" <?php if(!isset($_SESSION["name_error"]))echo "hidden"?>>
                     <?php echo $_SESSION["name_error"]; ?>
                    </div>
           </div>
                  
           <div class="form-group form-group-md">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
                    <div class="alert alert-danger" role="alert" <?php if(!isset($_SESSION["email_error"]))echo "hidden"?>>
                     <?php echo $_SESSION["email_error"]; ?>
                    </div>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
           </div>
           <div class="form-group form-group-md">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                <div class="alert alert-danger" role="alert" <?php if(!isset($_SESSION["password_error"]))echo "hidden"?>>
                        <?php echo $_SESSION["password_error"]; ?>
                </div>
           </div>
           <div class="form-group form-group-md">
           <label for="TeacherRadio">Sign up as Teacher</label>
           <input type="checkbox" name="isTeacher" id="checkTeacher" autocomplete="off">
           </div>
           <div class="form-group">
            <button type="submit" class="btn btn-primary" name="Regeister">Submit</button>
           </div>
       </form>
    </div>
  </div>
</main>
<?php 
    // rest errors
    $_SESSION["name_error"] = null; 
    $_SESSION["email_error"]=null; 
    $_SESSION["password_error"]=null;
    $_SESSION["regeister"] =null;
    $_SESSION["email_error_login"]=null;
    $_SESSION["password_error_login"] =null;
?>