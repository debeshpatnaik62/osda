<?php

    require 'viewSapReportInner.php';
?>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
	$(document).ready(function () {
		pageHeader = "Skill Development Program Report";
                strFirstLink = "Manage Reports";
                strLastLink = "Skill Development Program";
               loadNavigation('Skill Development Program Report');

		printMe		= "yes";     		                
        downloadMe    = "yes";
        deleteMe = "yes";

        <?php if ($msg != '' && isset($_REQUEST['btnUpdate'])) { ?>
            viewAlert('<?php echo $msg; ?>', '', '');
         <?php }  ?>
		
		$('.showModal').click(function(){
			$('#myModal1').modal();			
		});
                $('.showModal2').click(function () {
                    $('#myModal2').modal();
                });
               if('<?php echo $outMsg;?>'!='')                
                    viewAlert('<?php echo $outMsg;?>');

                <?php if ($redirectPage != '') { ?>
                 $('#alertModal').on('hidden.bs.modal', function () {
                     window.location.href = '<?php echo $redirectPage; ?>';
                 });
                 <?php } ?>
                   
                  $('.date-picker').datepicker({
                        autoclose: true,
                        todayHighlight: true
                    });   
        fillSkillDevelopInstituteName('<?php echo $instituteName;?>','selInstituteName');        
              
        var studentMob;
        var studName;
        var studDoc;
        var studAddress;
        var studMark;
        var studEligibility;
        var studExamAttend;
        var studAttendDate;
        var studCourse;
       $('.viewStudentDetails').on('click',function(){
          studName = $(this).parents('tr').find('.studName').val();
          studentMob = $(this).parents('tr').find('.studMobile').val();
          studDoc = $(this).parents('tr').find('.studDoc').val();
          studAddress = $(this).parents('tr').find('.studAddress').val();
          studMark = $(this).parents('tr').find('.studMark').val();
          studEligibility = $(this).parents('tr').find('.studEligibility').val();
          studExamAttend = $(this).parents('tr').find('.studExamAttend').val();
          studAttendDate = $(this).parents('tr').find('.studAttendDate').val();
          studCourse = $(this).parents('tr').find('.studCourse').val();
         $('#studentDetails').modal('show');

       });

       $('#studentDetails').on('shown.bs.modal', function (e) {
        
        $('#studName').html(studName);
        $('#studMobile').html(studentMob);
        $('#studDoc').html(studDoc);
        $('#studAddress').html(studAddress);
        $('#studMark').html(studMark);
        $('#studEligibility').html(studEligibility);
        $('#studExamAttend').html(studExamAttend);
        $('#studAttendDate').html(studAttendDate);
        $('#studCourse').html(studCourse);
            
        })       
	});
        
   function assignStatusData(intId)
      {
          $('#assStatusId').val(intId);
          var status = $("#assignedStatus"+intId).val();
          $("#assignedStatus").val(status);
          $('#frmOGP').submit();
      }     
</script>
    <div class="page-content">
        <div class="page-header">
            <h1 id="title" class="col-sm-5"></h1>
        </div>
        <div class="row no-margin">
            <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="top_tab_container">

                
                <a href="javascript:void(0);" class="btn btn-info active">SAP ERP</a>
                <?php if($instituteId==0)
                { ?>
                    <a href="<?php echo APP_URL; ?>viewSkillDevelopment/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Coursera</a>
               <?php } ?>
                

                
                 </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                <div class="searchTable">
                    <div class="form-group">                   
                       
                    <label class="col-sm-1 control-label no-padding-right" for="txtEndDt">Date To</label>
                       <div class="col-sm-2"> <span class="colon">:</span>
                           <div class="input-group">
                               <input class="form-control date-picker" id="txtEndDt" name="txtEndDt" type="text" data-date-format="dd-mm-yyyy" value="<?php echo ($strEndDate!='0000-00-00')?date('d-m-Y',strtotime($strEndDate)):''; ?>">
                                <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 
                           </div>
                       </div>
                           
                    <label class="col-sm-1 control-label no-padding-right" for="txtStartDt">Date From</label>
                        <div class="col-sm-2"> <span class="colon">:</span>
                            <div class="input-group">
                                <input class="form-control date-picker" id="txtStartDt" name="txtStartDt" type="text" data-date-format="dd-mm-yyyy" value="<?php echo ($strStartDt!='0000-00-00')?date('d-m-Y',strtotime($strStartDt)):''; ?>">
                                 <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 
                            </div>
                       </div>
                        <label class="col-sm-2 control-label no-padding-right" for="txtSearch">Registration Number</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <input type="text" class="form-control" maxlength="100" name="txtRegdNumber" id="txtRegdNumber" value="<?php echo $strNumber; ?>"/>
                    </div>
                     </div>
                     <div class="form-group">  

                    
                   <label class="col-sm-1 control-label no-padding-right" for="paymentStatus">Payment Status</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <select class="form-control" name="paymentStatus" id="paymentStatus" >
                                <option value="" >All </option>
                                <option value="1" <?php if($paymentStatus==1) echo 'selected="selected"'; ?> >Paid </option>
                                <option value="9" <?php if($paymentStatus==9) echo 'selected="selected"'; ?> >Not Paid </option>
                                <option value="2"<?php if($paymentStatus==2) echo 'selected="selected"'; ?>> Failed </option>
                                <!-- <option value="9"<?php if($paymentStatus==9) echo 'selected="selected"'; ?>>Pending </option> -->
                                
                        </select>        
                    </div>
                    <label class="col-sm-1 control-label no-padding-right" for="paymentStatus">Eligibility</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <select class="form-control" name="eligibleStatus" id="eligibleStatus" >
                                <option value="" >All </option>
                                <option value="1" <?php if($eligibleStatus==1) echo 'selected="selected"'; ?> >Qualified </option>
                                <option value="2" <?php if($eligibleStatus==2) echo 'selected="selected"'; ?> >Not Qualified </option>
                                <option value="3"<?php if($eligibleStatus==3) echo 'selected="selected"'; ?>> Not Attempted </option>
                                
                        </select>        
                    </div>
                    <!-- <?php if($instituteId==9 || $instituteId==0)  { ?>
                    <label class="col-sm-2 control-label no-padding-right">Login Id Status</label>
                        <div class="col-sm-2"> <span class="colon">:</span>
                            <select class="form-control" name="assignStatus" id="assignStatus">
                            <option value="" >All </option>
                            <option value="1" <?php if($assignStatus==1) echo 'selected="selected"'; ?> >Not Assigned </option>
                            <option value="2" <?php if($assignStatus==2) echo 'selected="selected"'; ?> >Assigned </option>                               
                            </select>
                        </div>
                      <?php } ?> -->

                      <label class="col-sm-2 control-label no-padding-right" for="selInstituteName">Institute/College</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <select class="form-control" name="selInstituteName" id="selInstituteName" >
                                <option value="0" >--Select Institute-- </option>
                                
                        </select>        
                    </div>
    
                   
                        <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                        <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewSapReport/<?php echo $glId . '/' . $plId; ?>' ">
                    </div>
                </div>
                    </div>
                </div>
                <!-- <div class="legandBox">			
                    <span class="greenLegend">&nbsp;</span>Published Skill Program(s)&nbsp;			
                    <span class="yellowLegend">&nbsp;</span> Unpublished Skill Program(s) &nbsp;
                </div> -->
                <div id="viewTable">
                <?php if (mysqli_num_rows($result) > 0) {
                    $ctr = $intRecno; ?>
                    <table class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="20" class="noPrint">
                                    <label class="position-relative">
                                    <input type="checkbox" class="ace chkAll"><span class="lbl"></span></label>
                                </th>
                                <th width="20">Sl.#</th>
                                <th>Applicant Name</th>    
                                <th>Registration Number</th>
                                <!-- <?php //if($instituteId!=9)  { ?> --> 
                               <!--  <th>Mobile Number</th> -->
                                <th>College / Institution Name</th> 
                                
                                <th>Payment Status</th>
                                <th>Registered On</th>
                    
                                
                             <!-- <?php if($instituteId==9 || $instituteId==0)  { ?> 
                                <th>Login Id Status </th>

                            <?php } ?> -->
                            <th>Action </th>
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {

                                if($row['tinEligibleStatus']==1)
                                {
                                    $status = 'Qualifiled';
                                }
                                else if($row['tinEligibleStatus']==2)
                                {
                                    $status = 'Not Qualifiled';
                                }
                                else
                                {
                                    $status = 'Not Attempted';
                                }
                                if($row['tinAttend']==1)
                                {
                                    $attend = 'Yes';
                                }
                                else
                                {
                                    $attend = 'No';
                                }
                                if($row['dtmAttendDate']=='1000-01-01 00:00:00')
                                {
                                    $attendDate = 'Not Attempted';
                                }
                                else
                                {
                                    $attendDate = date('d-M-Y', strtotime($row['dtmAttendDate']));
                                }
                                if($row['tinPayStatus']==1)
                                {
                                    $payStatus = 'Paid';
                                }
                                else if($row['tinPayStatus']==2)
                                {
                                    $payStatus = 'Failed';
                                } /*else if($row['tinPayStatus']==3)
                                {
                                    $payStatus = 'Cancel';
                                }*/
                                else
                                {
                                    $payStatus = 'Not Paid';
                                }


                                $ctr++; 
                                ?>
                            <tr>
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intId'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['intId'];?>" name="hdnPubStatus<?php echo $row['intId'];?>" value="<?php echo $row['tinPublishStatus'];?>"/>
                                    </label>
                                </td>
                                <td><?php echo $ctr; ?></td>
                                <td>
                                <div class="media-body pull-left"> 
                                                
                                        <h4><?php echo htmlspecialchars_decode($row['vchName'], ENT_QUOTES); ?></h4>   
                                        <small class="text-muted"><i class="fa fa-envelope"></i> <?php echo htmlspecialchars_decode($row['vchEmail'],ENT_QUOTES); ?></small>
                                      </div>

                                 <td> <?php  echo htmlspecialchars_decode($row['vchRegdNumber'],ENT_NOQUOTES);?> </td> 
                                  <td> <?php  echo $row['instituteName'];?> </td>
                                  <td><?php echo $payStatus; ?></td>
                             

                                <td><?php echo date('d-M-Y', strtotime($row['stmCreatedOn'])); ?></td>
                               
                                
                                <!-- <?php if($instituteId==9 || $instituteId==0)  { ?>

                                <td> 
                                  <div style="display: flex;"> 
                                    <select class="form-control" id="assignedStatus<?php echo $row['intId'];?>" style="width: 100px" >
                                    <option value="1" <?php if($row['intAssignedStatus']==1) echo 'selected="selected"'; ?> >Not Assigned </option>
                                    <option value="2" <?php if($row['intAssignedStatus']==2) echo 'selected="selected"'; ?> >Assigned </option>                               
                                    </select>

                                    <input type="submit" name="btnUpdate" id="btnUpdate" class="btn btn-success noPrint" value="SAVE" style="margin-left:5px;" onclick="assignStatusData('<?php echo $row['intId'];?>')" >
                                 </div>
                               </td> 
                            <?php } ?> -->
                            <td class="noPrint"><button type="button" class="btn btn-info viewStudentDetails" >
                                  View Details</button></td>

                                <input type="hidden" name="" id="" value="<?php echo $row['vchName'];?>" class="studName">
                                <input type="hidden" name="" id="" value="<?php echo $row['vchMobile'];?>" class="studMobile">
                                <input type="hidden" name="" id="" value="<?php echo $row['vchDocumentType'];?>" class="studDoc">
                                <input type="hidden" name="" id="" value="<?php echo $row['vchAddress'];?>" class="studAddress">
                                <input type="hidden" name="" id="" value="<?php echo $row['intTestMark'];?>" class="studMark">
                                <input type="hidden" name="" id="" value="<?php echo $status;?>" class="studEligibility">
                                <input type="hidden" name="" id="" value="<?php echo $attend;?>" class="studExamAttend">
                                <input type="hidden" name="" id="" value="<?php echo $attendDate;?>" class="studAttendDate">
                                <input type="hidden" name="" id="" value="<?php echo $row['vchCoursesFor'];?>" class="studCourse">


                                
                            </tr>

                        <?php } ?>
                         </tbody>
                    </table>
                    <input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno; ?>" />
                    <input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno; ?>" />
                    <input name="hdn_IsPaging" id="hdn_IsPaging" type="hidden" value="<?php echo $isPaging; ?>" />
                    <input name="hdn_ids" id="hdn_ids" type="hidden" />
                    <input name="hdn_qs" id="hdn_qs" type="hidden" />
                    <input name="hdnAction" id="hdnAction" type="hidden" />
                    <input type="hidden" name="assStatusId" id="assStatusId" value="">
                    <input type="hidden" name="assignedStatus" id="assignedStatus" value="">
                    
                <?php } else { ?>
                    <div class="noRecord">No record found</div>
            <?php } ?>
        </div>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <div class="row noPrint">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="sample-table-2_info">
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a>/ <?php } ?> 
    <?php echo $objDevelop->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
        <?php echo $objDevelop->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
                                </ul>
                            </div>
                        </div>
                <?php } ?>
                </div>
<?php } ?>
          <!-- PAGE CONTENT ENDS -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
         
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-Name" id="myModalLabel"></h4>
            </div>
            <div class="modal-body" id="divContent">

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="studentDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog model-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Student Details</h5>
        <button type="button" class="close" style="position: absolute;right: 1rem;top: 0.2rem;color: #fff;" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
            <tr>
            <td width="50%">
                <label>Name </label>
              <div><strong id="studName"></strong></div>
            </td>
            <td>
               <label>Mobile Number </label>
              <div><strong id="studMobile"></strong></div>
            </td>
        </tr>

        <tr>
            <td>
                <label>Document Type </label>
              <div><strong id="studDoc"></strong></div>
            </td>
            <td>
               <label>Address </label>
              <div><strong id="studAddress"></strong></div> 
            </td>
        </tr>

        <tr>
            <td>
                 <label>Test Marks </label>
              <div><strong id="studMark"></strong></div>
            </td>
            <td>
               <label>Eligibility </label>
              <div><strong id="studEligibility"></strong></div>
            </td>
        </tr>

        <tr>
            <td>
                <label>Exam Attend </label>
              <div><strong id="studExamAttend"></strong></div>
            </td>
            <td>
             <label>Exam Attend Date </label>
              <div><strong id="studAttendDate"></strong></div>   
            </td>
        </tr>
        <tr>
            <td>
                <label>Courses </label>
              <div><strong id="studCourse"></strong></div>
            </td>
        </tr>
        
        </table>


      </div>
    </div>
  </div>
</div>
 