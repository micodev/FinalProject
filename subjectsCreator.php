<?php
                      // make subject card for teacher panel
                      session_start();
                      include_once("mysql.php");
                      $sid = $_SESSION["id"];
                      $sub = selectSubject($sid,false,true);
                      if(!isset($sub["error"]))
                      foreach($sub as $val)
                      {
                        $name = $val["name"];
                        $degree = json_decode($val["degree"],JSON_OBJECT_AS_ARRAY);
                        $Id =$val["Id"];
                        $col = 
                              '<div class="col col-sm-12 col-md-6" >
                                <div class="card text-center" style="margin-top:1%;">
                                  <div class="card-header">
                                    Subject Details
                                  </div>
                                  <div class="card-body">
                                    <h5 class="card-title">'.$name.'</h5>
                                    <div class="table-responsive">
                                         <table class="table table-sm table-dark table-hover">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Degree</th>
                                              </tr>
                                            </thead>';
                        $counter = 1;
                        foreach($degree as $k=>$v)
                        {
                          if($v==-1)$v="absent";
                          $row =
                                        '<tbody>
                                                  <tr>
                                                    <th scope="row">'.$counter++.'</th>
                                                    <td>'.$k.'</td>
                                                    <td>'.$v.'</td>
                                                  </tr>
                                                
                                                </tbody>
                                           ';
                          $col.=$row;
                        }
                                $col.=' </table>
                                      </div>
                                      <div class="row text-center">
                                          <div class="col" style="margin-bottom:1%">
                                              <button type="button" name="copylink" id="copylink" class="copy btn btn-secondary btn-md btn-block" value="'.$_SERVER['HTTP_HOST'] .'/questions.php?qid='.$Id.'"
                                              data-container="body" data-toggle="popover" data-placement="bottom" data-content="Copied">Copy Link</button>
                                          </div>
                                          <div class="col">
                                            <form action="deleteSub.php" method="POST">
                                                <button type="submit" name="delete" id="'.$Id.'" class="deleteSub btn btn-secondary btn-md btn-block" value="'.$Id.'">Delete Subject</button>
                                            </form>
                                          </div>
                                      </div>
                                      <div class="row text-center" style="margin-top:1%;">
                                        <div class="col m-1">
                                           <button type="button" data-toggle="modal" data-target="#addEamilModal" name="addEmail" class="addEmail btn btn-secondary btn-md btn-block" data-whatever="'.$Id.'">Add student email</button>
                                        </div>
                                        <div class="col m-1">
                                        <button type="button" class="std-info btn btn-info btn-md btn-block" data-toggle="modal"  data-target="#studentStats" data-whatever="'.$Id.'">Students stats <i class="fas fa-chart-bar"></i></button>
                                        </div>
                                      </div>
                                  </div>
                                </div>
                              </div>';
                              echo $col;
                      }
                      
                      ?>
                    