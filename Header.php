<?php
session_start();
$name = isset($_SESSION["name"])?$_SESSION["name"]:null;
?>
<header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">About</h4>
              <p class="text-muted">
                this is a earler version of online examination system
                here you can make your own subject question then send 
                the link to your student they must has already emails
                that you know to can engage with the subject question
                for more information please watch those tutrials <a class="badge badge-info" href="https://www.youtube.com/playlist?list=PLqfYvMw2TCypD6f6pygcvOlFikw_uhEb7">click here</a> .
              </p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Contact</h4>
              <ul class="list-unstyled">
                <li><a href="https://m.me/micodev" class="text-white">Facebook Massenger</a></li>
                <li><a href="https://t.me/micotslbot" class="text-white">Telegram</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-sm-between justify-content-center">
          <a id="navicon" href="#" class="navbar-brand d-flex align-items-center">
          <i class="fas fa-book"></i>
            <strong>&nbspOES</strong>
          </a>
          <button class="navbar-toggler" closer='tip' type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon tool_tip" data-toggle="tooltip" data-placement="bottom" data-html="true" title="if this first visit click here <a closer='tip' href='#' >x</a>"></span>
          </button>
          <form action="/logout.php" method="POST" <?php if(!isset($_SESSION["id"])) echo("hidden"); ?>>
          <div class="input-group input-group-sm m-1" >
            <?php
            if($name!=null){
               $namediv = '<div class="input-group-prepend ">
                <span class="input-group-text">Welcome '.$name.' !</span>
                </div>';
                echo $namediv;
            }
            ?>
            <button name="sub" id="sub"  type="submit" style="cursor:pointer;" class="form-control">Sign-Out <i class="fas fa-sign-out-alt"></i></button>
          </div>
               
          </form>
        </div>
      </div>
</header>