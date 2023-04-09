<?php
/* ================================================
  File Name      : applicantTagDetails.php
  Description	 : This is used to view applicant tag details.  
  Devloped By    : Rahul Kumar Saw
  Devloped On	 : 27-April-2021

  Update History :	<Updated by>		<Updated On>		<Remarks>
 
  includes		: header.php, navigation.php, util.php, footer.php,preAssessmentScoreInner.php
  ================================================== */
 include('applicantTagDetailsInner.php')
?>

<script language="javascript">
    $(document).ready(function () {

        pageHeader   = "Tagged Applicant details";
        strFirstLink = "Manage Event";
        strLastLink  = "Venue Tag"; 
        loadNavigation('Tagged Applicant details');

                printMe 	= "yes";
                backMe		= "yes"
                backPath	="";
                downloadMe       = "yes";
		
		 $('#excelIcon').click(function(){
		 	$('#hdn_qs').val('EX');
			$('form').submit();
		 });
                 
		 backPath='<?php echo $_COOKIES['backPath']; ?>';
    });
	
	
</script>
<div class="page-content">
  <div class="page-header">
    <h1 id="title" class="col-sm-5"></h1>
  </div>
  <div class="row">
    <div class="col-xs-12"> 
      <!-- PAGE CONTENT BEGINS -->
      <div class="top_tab_container"><a href="javascript:void(0);" class="btn btn-info active">Tagged Applicant details</a> </div>
      <?php include('includes/util.php'); ?>
      <div class="hr hr-solid"></div>
      <input name="hdn_qs" id="hdn_qs" type="hidden" />
      <input type="hidden" id="pageTitle" value="Tagged Applicant Report" />
      <div id="viewTable">
          <div id="divTraingDetails">
              <?php
                /*if($trainingResult->num_rows> 0){
                    
                    $trainingRow = $trainingResult->fetch_array();
                    
                    $vchTiCode 	   = htmlspecialchars_decode($trainingRow['vchTiCode'], ENT_QUOTES);  
                    $strCentertype = ($trainingRow['tinCenterType'] ==1)?'Government  ':' Private  ';    
              ?>
                <div class="alert alert-info" id="searchInfo">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td width="100"><label>Training Subject</label></td>
                                <td width="20" align="center">:</td>
                                <td><?php echo $trainingRow['vchTrainingSubject']; ?> </td>
                                <td width="50">&nbsp;</td>
                                <td width="100"><label>Unit</label></td>
                                <td width="20" align="center">:</td>
                                <td><?php echo $trainingRow['batchName']; ?></td>
                                <td width="50">&nbsp;</td>
                                
                            </tr>
                            <tr>
                                <td width="100"><label>Institution</label></td>
                                <td width="20" align="center">:</td>
                                <td><?php echo htmlspecialchars_decode($trainingRow['vchCenterName'], ENT_QUOTES).' ('.$strCentertype.')'; ?></td>
                                <td width="50">&nbsp;</td>
                                <td width="100"><label>Course Name </label></td>
                                <td width="20" align="center">:</td>
                                <td><?php echo htmlspecialchars_decode($trainingRow['vchCourseName'], ENT_QUOTES); ?></td>
                                <td width="50">&nbsp;</td>
                              </tr>
                              <tr>
                                <td width="90"><label>Training Date</label></td>
                                <td width="20" align="center">:</td>
                                <td colspan="5">
                                    <div class="time-icon">&nbsp;</div>
                                    <div class="datetime-section">
                                        <div class="date-box" title="<?php echo date('d M Y', strtotime($trainingRow['dtFromDate'])); ?> to  <?php echo date('d M Y', strtotime($trainingRow['dtToDate'])); ?>">
                                            <span class="date-colm"><label><?php echo date('d M Y', strtotime($trainingRow['dtFromDate'])); ?></label></span>
                                            <b>-</b><br>
                                        </div>
                                        <div class="time-box">
                                            <span class="date-colm"><label><?php echo date('d M Y', strtotime($trainingRow['dtToDate'])); ?></label></span> 
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                    
              
              <?php
              
                }*/
              if ($result->num_rows> 0) {
                    $ctr = $intRecno; 
                    
               ?>
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    
                          <th width="20"><label>Sl.# </label></th>
                          <th><label>Applicant Name   </label></th>
                          <th><label>Competition Id  </label></th>                    
                          <th><label>Skill Name  </label></th>                    
                          <th><label>Venue Name  </label></th>                    
                          <th><label>Exam Date  </label></th>                    
                          <th><label>Exam Time  </label></th>                    
                         
                  </tr>
                </thead>
                <tbody>

              <?php  while ($row = $result->fetch_array()) {                
                            $ctr++; 
                    $strMemberName  = ucwords(strtolower(htmlspecialchars_decode($row['applicantName'], ENT_QUOTES)));  
                    $strSkills  = ucwords(strtolower(htmlspecialchars_decode($row['strSkills'], ENT_QUOTES)));  
                    $strVenue 	= htmlspecialchars_decode($row['venueName'], ENT_QUOTES);  

                    $competitionId          = $row['competitionId'];
                    $examDate        = date("d-M-Y", strtotime($row['stmExamDate']));
                    $examTime        = $row['stmExamTime'];

                ?>
                  <tr>
                    
                    <td><?php echo $ctr; ?></td>
                    <td><?php echo $strMemberName; ?></td>
                    <td><?php echo $competitionId; ?></td>
                    <td><?php echo $strSkills; ?></td>
                    <td><?php echo $strVenue; ?></td>
                    <td><?php echo $examDate; ?></td>
                    <td><?php echo $examTime; ?></td>
                    
                  </tr>

                  <?php } ?>
                </tbody>
              </table>
             
              <?php  } else { ?>
              <div class="noRecord">No details found</div>
              <?php } ?>
            </div>
            <input name="hdnAction" id="hdnAction" type="hidden" />   
              
              
              
          </div>
		
      </div>
	
      <!-- PAGE CONTENT ENDS --> 
    </div>
    <!-- /.col --> 
  </div>
  <!-- /.row --> 
</div>
