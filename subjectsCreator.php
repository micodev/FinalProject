<?php
                      $sub = selectSubject($sid,false,true);
                      foreach($sub as $val)
                      {
                        $name = $val["name"];
                        $degree = json_decode($val["degree"],JSON_OBJECT_AS_ARRAY);
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
                                  </div>
                                </div>
                              </div>';
                              echo $col;
                      }
                      
                      ?>