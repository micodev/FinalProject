<?php // make question form for exam . ?>
<form id="formquestions" action="<?php "questions.php?qid=$qid";?>" method="POST">
            <div class="row">
               <div class="col">
                  <div class="card" style="width: 100%;">
                     <div class="card-body">
                        <h5 class="card-title"><?php echo "Question ".$qnum;?></h5>
                        <p name="question" class="card-text"><?php echo $question;?></p>
                        <input type="hidden" name="question" value="<?php echo $question;?>" />
                        <div class="row text-center">
                           <?php 
                              $p = 1;
                              foreach($answers as $value)
                              {
                                  $radio = '<div class="col form-check">
                                              <input class="form-check-input" type="radio" name="choice" id="Radios1" value="'.$value.'" checked>
                                              <label class="form-check-label" for="Radios1">
                                              '.$value.'
                                              </label>
                                            </div>';
                                  echo $radio;
                                  $p++;
                              }
                              ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="submit" id="submait" class="btn btn-primary btn-lg btn-block" value="<?php echo $qstr; ?>">
                </div>
            </div>
             </form>