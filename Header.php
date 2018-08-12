<?php
session_start();
$name = isset($_SESSION["name"])?$_SESSION["name"]:null;
$file =  basename($_SERVER['REQUEST_URI'], '?'.$_SERVER['QUERY_STRING']);
   $isQuestionPage =  strcmp($file,"questions.php");
?>
   <header class="masthead">
        <div class="inner">
          <h3 class="masthead-brand d-flex"><a id="navicon" href="#" class="navbar-brand d-flex align-items-center">
              <i  class="ico fas fa-book"></i>
                <strong  class="ico">&nbspOES</strong>
              </a>
          </h3>
          <nav class="nav d-inline">
          <form action="/logout.php" class="d-inline" method="POST">
            <div class="input-group input-group-sm <?php if(!isset($_SESSION["id"])) echo("d-none"); else echo("d-inline"); ?>" >
              <?php
              if($name!=null){
                $namediv = '<div class="input-group-prepend d-inline">
                  <span class=" text-white d-inline">Welcome '.$name.' | </span>
                  </div>';
                  echo $namediv;
              }
              ?>
              <button name="sub" id="sub"  type="submit" style="cursor:pointer;" class="btn btn-link d-inline" >Sign-Out <i class="fas fa-sign-out-alt"></i></button>
            </div>
          </form>
          </nav>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link <?php if($isQuestionPage!=0) echo "active"; ?>" href="/">Home</a>
            <a class="nav-link" href="#AboutUs" data-toggle="modal" data-target="#AboutUs">About</a>
            <a class="nav-link" href="#ShowContractUs" data-toggle="modal" data-target="#ShowContractUs">Contact</a>
          </nav>
        </div>
    </header>
      <!-- new nav end -->
  
          <!-- start contract modal-->
<div class="modal fade" id="ShowContractUs" tabindex="-1" role="dialog" aria-labelledby="ShowContractUsTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ShowContractUsTitle">Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <ul class="list-unstyled ">
                  <li><a href="https://m.me/micodev" target="_blank" class="text-black">Facebook Massenger</a></li>
                  <li><a href="https://t.me/micotslbot" target="_blank"  class="text-black">Telegram</a></li>
                </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end contract modal-->
<!-- start contract about-->
<div class="modal fade" id="AboutUs" tabindex="-1" role="dialog" aria-labelledby="AboutUsTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AboutUsTitle">About</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p class="text-muted">
                this is a earler version of online examination system
                here you can make your own subject question then send 
                the link to your student they must has already emails
                that you know to can engage with the subject question
                for more information please watch those tutrials <a class="badge badge-info" href="https://www.youtube.com/playlist?list=PLqfYvMw2TCypD6f6pygcvOlFikw_uhEb7" target="_blank" >click here</a> .
              </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end contract about-->
</header>