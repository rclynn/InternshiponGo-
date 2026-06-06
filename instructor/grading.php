<div class="col-12 col-xxl-6">
                    <div class="card ">
                      <div class="card-body">
                        <h2 class="">University Rating System</h2>
                        <table class="table table-bordered border-primary">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">CRITERIA</th>
						      <th scope="col">PERCENTAGE</th>
						      <th scope="col">GRADE</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <th scope="row">1</th>
						      <td>OJT Narrative Report </td>
						      <td data-bs-toggle="tooltip" data-bs-placement="top" title="Please enter 75 to 100 points only">15% <span data-feather="info" class="text-primary"></span></td>
						      <td>
						      		<?php 
						      		$onrs=0; 
						      		$onr=mysqli_query($con,"SELECT * from ojtnarrativereport where OJTNarrativeReportIDSTUDENTID = '$studentID'")or die(mysqli_error($con));
            						$rowonr=mysqli_fetch_object($onr); 
            						if (!empty($rowonr)) {
            							$onrs=$rowonr->OJTNarrativeReportIDPOINTS;
            						}

            						echo $onrs."(";

            						echo $totalonrs = ((($onrs/100)*100)*0.15); 
            						echo ")";

            						?>

						      	<span data-feather="edit" class="text-primary"  data-bs-toggle="modal" data-bs-target="#onr"></span>
			                      <div class="modal fade" id="onr" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			                        <div class="modal-dialog">
			                          <div class="modal-content">
			                            <div class="modal-header bg-primary">
			                              <h5 class="modal-title text-white" id="staticBackdropLabel">Enter OJT Narrative Report Points</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs--1 text-white" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs--1 text-white"></span> Font Awesome fontawesome.com --></button>
			                            </div>
			                            <form method="post" action="query.php">
			                            <div class="modal-body">
			                              <p class="text-700 lh-lg mb-0">Please enter 75 to 100 points only</p>
			                              <div class="mb-3">
			                              <input type="text" name="studentID" value="<?= $studentID;?>" hidden>
										  <input class="form-control form-control" id="" type="number" name="points" placeholder="" min="75" max="100"  required="" />
										</div>
			                            </div>
			                            <div class="modal-footer"><button class="btn btn-primary" type="submit" name="addonr">Okay</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
			                            </form>
			                          </div>
			                        </div>
			                      </div>
						      </td>
						    </tr>
						    <tr>
						      <th scope="row">2</th>
						      <td>Student Trainee Journal </td>
						      <td data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">15% <span data-feather="info" class="text-primary"></span></td>
						      <td>
						      <?php $countjournal=mysqli_query($con,"SELECT * FROM studentjournal where studentID ='$studentID'")or die(mysqli_error($con)); 
								$rowcountjournal= mysqli_num_rows( $countjournal );

								if (!empty($rowcountjournal)) {
									$journals1 = $rowcountjournal/61;
									$journals2 = $journals1*100;
									$journals3=$journals2*0.15;
								}else{
									$journals3=0;
								}

								?>
								<?= $journals3; ?>	
						      </td>
						    </tr>
						    <tr>
						      <th scope="row">3</th>
						      <td colspan="">Attendance & Participation<BR>
								(In Pre & Post Seminars and other activities)</td>
								<td data-bs-toggle="tooltip" data-bs-placement="top" title="Please enter 75 to 100 points only">10% <span data-feather="info" class="text-primary"></span></td>
						      <td>
						      		<?php 
						      		$aps=0; 
						      		$ap=mysqli_query($con,"SELECT * from attendanceparticipation where AttendanceParticipationSTUDENTID = '$studentID'")or die(mysqli_error($con));
            						$rowap=mysqli_fetch_object($ap); 
            						if (!empty($rowap)) {
            							$aps=$rowap->AttendanceParticipationPOINTS;
            						}

            						echo $aps;
            						echo "(";

            						echo $totalaps = ((($aps/100)*100)*0.10);
            						echo ")";

            						?>

						      	<span data-feather="edit" class="text-primary"  data-bs-toggle="modal" data-bs-target="#anp"></span>
			                      <div class="modal fade" id="anp" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			                        <div class="modal-dialog">
			                          <div class="modal-content">
			                            <div class="modal-header bg-primary">
			                              <h5 class="modal-title text-white" id="staticBackdropLabel">Attendance & Participation</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs--1 text-white" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs--1 text-white"></span> Font Awesome fontawesome.com --></button>
			                            </div>
			                            <form method="post" action="query.php">
			                            <div class="modal-body">
			                              <p class="text-700 lh-lg mb-0">Please enter 75 to 100 points only</p>
			                              <div class="mb-3">
			                              <input type="text" name="studentID" value="<?= $studentID;?>" hidden>
										  <input class="form-control form-control" id="" type="number" name="points" placeholder="" min="75" max="100"  required="" />
										</div>
			                            </div>
			                            <div class="modal-footer"><button class="btn btn-primary" type="submit" name="addps">Okay</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
			                            </form>
			                          </div>
			                        </div>
			                      </div>
						      </td>
						    </tr>
						    <tr>
						      <th scope="row">4</th>
						      <td colspan="">Performance Evaluation Report<BR>
								(from Cooperating Agency)</td>
								<td data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">50% <span data-feather="info" class="text-primary"></span></td>
						      <td>
						      	 <?php
                            $A1=0;
                            $technicalskills=mysqli_query($con,"SELECT * from technicalskills where TechnicalSkillsSTUDENTID = '$studentID'")or die(mysqli_error($con));
                                $rowtechnicalskills=mysqli_fetch_object($technicalskills);
                              if (empty($rowtechnicalskills)) {
                              }else{ 
                                  $total=$rowtechnicalskills->A1+$rowtechnicalskills->A2+$rowtechnicalskills->A3+$rowtechnicalskills->A4+$rowtechnicalskills->A5+$rowtechnicalskills->A6+$rowtechnicalskills->A7+$rowtechnicalskills->A8;;
                               $A1=$total/8;
                                } 
                            ?>  
                              <?php
                            $B1=0;
                            $professionalskills=mysqli_query($con,"SELECT * from professionalskills where professionalskillsSTUDENTID = '$rowstudent->StudentID'")or die(mysqli_error($con));
                                $rowprofessionalskills=mysqli_fetch_object($professionalskills);
                              if (empty($rowprofessionalskills)) {
                              }else{ 
                                  $total=$rowprofessionalskills->B1+$rowprofessionalskills->B2+$rowprofessionalskills->B3+$rowprofessionalskills->B4+$rowprofessionalskills->B5+$rowprofessionalskills->B6;
                               		$B1=$total/6;
                                } 
                            ?> 
                              <?php $per1= ($A1+$B1)/2;
                               		$per2=$per1/5.00;
                              		$per3=$per2*100;
                              		$per4=$per3*0.5;
                              ?> 
                              <?= $per4; ?>
						      </td>
						    </tr>
						    <tr>
						      <th scope="row">5</th>
						      <td colspan="">Field Observation by the Coordinator<BR>
								(from Cooperating Agency)</td>
								<td data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">10% <span data-feather="info" class="text-primary"></span></td>
						      <td>
						      	 <?php
                            $C1=0;
                            $p4=0;
                            $personality=mysqli_query($con,"SELECT * from personality where personalitySTUDENTID = '$rowstudent->StudentID'")or die(mysqli_error($con));
                                $rowpersonality=mysqli_fetch_object($personality);
                              if (empty($rowpersonality)) {
                              }else{ 
                                  $total=$rowpersonality->C1+$rowpersonality->C2+$rowpersonality->C3+$rowpersonality->C4+$rowpersonality->C5+$rowpersonality->C6+$rowpersonality->C7+$rowpersonality->C8;
                                $p1=$C1=$total/8;
                                $p2=$p1/5.00;
                                $p3=$p2*100;
                                $p4=$p3*0.1;
                                } 
                            ?>  
                            <?= $p4; ?> 
						      </td>
						    </tr>
						    <tr>
						      <th colspan="2" scope="row">Total</th>
						      <td colspan="" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">100% <span data-feather="info" class="text-primary"></span></td>
								
						      <td>
						      	<?php echo $xxxx=$p4+$per4+$totalaps+$totalonrs+$journals3;?>
						      </td>
						    </tr>
						  </tbody>
						</table>
                      </div>
                   </div>
                 </div>