<?php 
// quesiton template
$to = $_GET["max"];
for($i=1;$i<=$to;$i++)
{
  $question ='<div id="question'.$i.'">
    <div class="row">
    <div class="col-lg">
    <div class="form-group">
        <label for="qustion'.$i.'">Enter Question '.$i.'</label>
        <input type="text" name="question'.$i.'" id="question'.$i.'" class="form-control" placeholder="What is your name ?" aria-describedby="helpId">
    </div>
    </div>
    </div>
    <div class="row">
        <div class="col-sm">
         <div class="input-group mb-3">
           <input name="anq'.$i.'[]" type="text" class="form-control  alert alert-success" placeholder="Answer 1" aria-label="Recipient\'s username" aria-describedby="basic-addon2" required>
          </div>
        </div>
   
        <div class="col-sm">
         <div class="input-group mb-3">
           <input name="anq'.$i.'[]" type="text" class="form-control  alert alert-danger" placeholder="Answer 2" aria-label="Recipient\'s username" aria-describedby="basic-addon2"  required>
          </div>
        </div>
        
        <div class="col-sm">
         <div class="input-group mb-3">
           <input name="anq'.$i.'[]" type="text" class="form-control  alert alert-danger" placeholder="Answer 3" aria-label="Recipient\'s username" aria-describedby="basic-addon2" required>
           <div class="input-group-append">
            <button name="a3q'.$i.'" class="close-answer q'.$i.' a3 btn btn-outline-secondary" type="button">
            <i class="fas fa-times-circle"></i>
            </button>
           </div>
          </div>
        </div>
       
        <div class="col-sm">
         <div class="input-group mb-3">
           <input type="text" name="anq'.$i.'[]" class="form-control alert alert-danger" placeholder="Answer 4" aria-label="Recipient\'s username" aria-describedby="basic-addon2" required>
           <div class="input-group-append">
            <button name="a4q'.$i.'" class="close-answer btn btn-outline-secondary" type="button"> <i class="fas fa-times-circle"></i></button>
           </div>
          </div>
        </div>
        <div class="col-sm">
         <div class="input-group mb-3">
            <button name="r'.$i.'" type="button" class="rest-answer btn btn btn-outline-secondary">Rest answers <i class="fas fa-sync-alt"></i></button>
         </div>
        </div>
    </div>
</div>';
echo $question;
}
?>

