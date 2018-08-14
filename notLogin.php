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
  <!-- new login begin -->
    <div id="fullheight" class="h-100 bg-login">
          <div class="d-flex h-100 align-items-center justify-content-center">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading btn-dark">
						<div class="row justify-content-center">
							<div class="col-xs-6 mr-2">
								<a href="#" class="active" id="login-form-link">Login</a>
                            </div>
                            <div class="col-xs-6 mr-2">
								<p class="text-primary d-inline">Or</p>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body" style="padding-left:5%;padding-right:5%;">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form"  action="Login.php" method="POST" role="form" style="display: block;">
                                    <div class="form-group form-group-md">
                                        <input type="email" id="email-log" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                                        <div class="alert alert-danger" role="alert" <?php if(!isset($_SESSION["email_error_login"]))echo "hidden"?>>
                                                <?php echo $_SESSION["email_error_login"]; ?>
                                                </div>
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>Enter email
                                    </div>
                                    <div class="form-group form-group-md">
                                        <input type="password" class="form-control"  placeholder="Password" name="password">
                                        <div class="alert alert-danger" role="alert" <?php if(!isset($_SESSION["password_error_login"]))echo "hidden"?>>
                                                <?php echo $_SESSION["password_error_login"]; ?>
                                        </div>
                                    </div>
           
								
									<div class="form-group">
										<div class="row justify-content-center">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-dark" value="Log In">
											</div>
										</div>
									</div>
								
								</form>
								<form id="register-form" action="Regeister.php" method="POST"  role="form" style="display: none;">
                                    <div class="form-group form-group-md">
                                           
                                            <input type="text" class="form-control" id="exampleInputName" aria-describedby="NameHelp" placeholder="Enter Name" name="name" value="">
                                            <div class="alert alert-danger" role="alert" <?php if(!isset($_SESSION["name_error"]))echo "hidden"?>>
                                            <?php echo $_SESSION["name_error"]; ?>
                                            </div>
                                    </div>
                                        
                                    <div class="form-group form-group-md">
                                               
                                                <input type="email" class="form-control" id="email-reg" aria-describedby="emailHelp" name="email" placeholder="Enter email">
                                                <div class="alert alert-danger" role="alert" <?php if(!isset($_SESSION["email_error"]))echo "hidden"?>>
                                                <?php echo $_SESSION["email_error"]; ?>
                                                </div>
                                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                    <div class="form-group form-group-md">
                                            
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
										<div class="row justify-content-center">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-info" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		
          </div>
    </div>

        
<?php 
    // rest errors
    $_SESSION["name_error"] = null; 
    $_SESSION["email_error"]=null; 
    $_SESSION["password_error"]=null;
    $_SESSION["regeister"] =null;
    $_SESSION["email_error_login"]=null;
    $_SESSION["password_error_login"] =null;
?>