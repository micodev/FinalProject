<?php include("question1.php");?>
<div id="question2">
    <div class="row">
    <div class="col-lg">
    <div class="form-group">
        <label for="qustion2">Enter Question 2</label>
        <input type="text" name="question2" id="question2" class="form-control" placeholder="What is your name ?" aria-describedby="helpId">
    </div>
    </div>
    </div>
    <div class="row">
        <div class="col-sm">
         <div class="input-group mb-3">
           <input name="anq2[]" type="text" class="form-control  alert alert-success" placeholder="Answer 1" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
          </div>
        </div>
   
        <div class="col-sm">
         <div class="input-group mb-3">
           <input name="anq2[]" type="text" class="form-control  alert alert-danger" placeholder="Answer 2" aria-label="Recipient's username" aria-describedby="basic-addon2"  required>
          </div>
        </div>
        
        <div class="col-sm">
         <div class="input-group mb-3">
           <input name="an3q2" type="text" class="form-control  alert alert-danger" placeholder="Answer 3" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
           <div class="input-group-append">
            <button name="anq2[]" class="close-answer q2 a3 btn btn-outline-secondary" type="button">
            <i class="fas fa-times-circle"></i>
            </button>
           </div>
          </div>
        </div>
       
        <div class="col-sm">
         <div class="input-group mb-3">
           <input type="text" name="an4q2" class="form-control alert alert-danger" placeholder="Answer 4" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
           <div class="input-group-append">
            <button name="anq2[]" class="close-answer btn btn-outline-secondary" type="button"> <i class="fas fa-times-circle"></i></button>
           </div>
          </div>
        </div>
        <div class="col-sm">
         <div class="input-group mb-3">
            <button name="r2" type="button" class="rest-answer btn btn btn-outline-secondary">Rest answers <i class="fas fa-sync-alt"></i></button>
         </div>
        </div>
    </div>
</div>
