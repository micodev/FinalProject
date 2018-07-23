<?php include("question2.php") ?>
<div id="question2">
    <div class="row">
    <div class="col-lg">
    <div class="form-group">
        <label for="qustion1">Enter Question 3</label>
        <input type="text" name="question3" id="question3" class="form-control" placeholder="What is your name ?" aria-describedby="helpId">
    </div>
    </div>
    </div>
    <div class="row">
        <div class="col-sm">
         <div class="input-group mb-3">
           <input name="anq3[]" type="text" class="form-control  alert alert-success" placeholder="Answer 1" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
          </div>
        </div>
   
        <div class="col-sm">
         <div class="input-group mb-3">
           <input name="anq3[]" type="text" class="form-control  alert alert-danger" placeholder="Answer 2" aria-label="Recipient's username" aria-describedby="basic-addon2"  required>
          </div>
        </div>
        
        <div class="col-sm">
         <div class="input-group mb-3">
           <input name="anq3[]" type="text" class="form-control  alert alert-danger" placeholder="Answer 3" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
           <div class="input-group-append">
            <button name="a3q3" class="close-answer q1 a3 btn btn-outline-secondary" type="button">
            <i class="fas fa-times-circle"></i>
            </button>
           </div>
          </div>
        </div>
       
        <div class="col-sm">
         <div class="input-group mb-3">
           <input type="text" name="an4q3" class="form-control alert alert-danger" placeholder="Answer 4" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
           <div class="input-group-append">
            <button name="anq3[]" class="close-answer btn btn-outline-secondary" type="button"> <i class="fas fa-times-circle"></i></button>
           </div>
          </div>
        </div>
        <div class="col-sm">
         <div class="input-group mb-3">
            <button name="r3" type="button" class="rest-answer btn btn btn-outline-secondary">Rest answers <i class="fas fa-sync-alt"></i></button>
         </div>
        </div>
    </div>
</div>
