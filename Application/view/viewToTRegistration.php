<?php

/* ================================================
  File Name          : viewToTRegistration.php
  Description        : This is used for view ToT registration details
  Date Created       :
  Created By         : Rahul kumar saw
  Developed by       : Rahul Kumar Saw
  Developed on       : 16-Mar-2023
  Update History        :
  <Updated by>          <Updated On>      <Remarks>

  ================================================== */

    require 'viewToTRegistrationInner.php';
?>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
	$(document).ready(function () {
		pageHeader = "ToT Registration";
                strFirstLink = "Manage Digitall Skilling";
                strLastLink = "View ToT Registered Details";
               loadNavigation('View ToT Registered Details');

		    printMe		 = "yes";     		                
           downloadMe    = "yes";
        
        <?php if ($msg != '' && isset($_REQUEST['hdnAction'])) { ?>
            viewAlert('<?php echo $msg; ?>', '', '');
         <?php }  ?>
		
    //$('.paymentData').hide();

    /*<?php if($program>0 && isset($_REQUEST['btnSearch']) && $privilege !=3) { ?>
      $('.paymentData').show();
    <?php } ?>*/
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
        
       <?php if($privilege==4)
        { ?>
            fillApproveInstituteName('<?php echo $instituteId;?>','selInstituteName');
            <?php $display = 'disabled';?>
            //fillApproveInstituteName('<?php echo $instituteId;?>','selInstitute');
            fillInstituteProgram('<?php echo $program;?>','selInterestCourse','<?php echo $instituteId;?>');
       <?php }
        else
        { ?>
            fillApproveInstituteName('<?php echo $instituteName;?>','selInstituteName');
            <?php $display = '';?>
            //fillApproveInstituteName('<?php echo $instituteName;?>','selInstitute');
            fillInstituteProgram('<?php echo $program;?>','selInterestCourse','<?php echo $instituteName;?>');
       <?php  } ?>
                    
	});
        
</script>
    <div class="page-content">
        <div class="page-header">
            <h1 id="title" class="col-sm-5"></h1>
        </div>
        <div class="row no-margin">
            <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="top_tab_container">

                
                <a href="javascript:void(0);" class="btn btn-info active">View ToT Details</a>
                 </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                <div class="searchTable">
                    <div class="form-group">                   
                       
                    <label class="col-sm-2 control-label no-padding-right" for="txtEndDt">Date To</label>
                       <div class="col-sm-2"> <span class="colon">:</span>
                           <div class="input-group">
                               <input class="form-control date-picker" id="txtEndDt" name="txtEndDt" type="text" data-date-format="dd-mm-yyyy" value="<?php echo ($strEndDate!='0000-00-00')?date('d-m-Y',strtotime($strEndDate)):''; ?>">
                                <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 
                           </div>
                       </div>
                           
                    <label class="col-sm-2 control-label no-padding-right" for="txtStartDt">Date From</label>
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
                      <label class="col-sm-2 control-label no-padding-right" for="selInstituteName">Institute/College</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <select class="form-control" name="selInstituteName" id="selInstituteName" onchange="fillInstituteProgram(0,'selInterestCourse',this.value);" <?php echo $display;?> >
                                <option value="0" >--Select Institute-- </option>
                                
                        </select>        
                    </div>
                  
                    <label class="col-sm-2 control-label no-padding-right" for="selInterestCourse">Program</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <select class="form-control" name="selInterestCourse" id="selInterestCourse" >
                                <option value="0" >--Select Program-- </option>
                                
                        </select>        
                    </div>

                   
                        <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                        <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewToTRegistration/<?php echo $glId . '/' . $plId; ?>' ">
                        </div>
                 </div>
                </div>


                <div id="viewTable"> 
                    <?php if (mysqli_num_rows($result) > 0) {
                    $ctr = $intRecno; ?>
                    <table class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                              
                                <th width="20">Sl.#</th>
                                <th>Applicant Details</th>    
                                <th>Registration Number</th>
                                <th>Courses sought for(TP)</th>
                                <th>College / Institution Name</th> 
                                <th>Program</th>
                                <th>Address</th>
                                <th>Registered On</th>
                    
                                <!-- <th width="130px" class="noPrint">Action </th> --> 
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {

                                
                                
                                if($row['intInstituteId']==1000)
                                {
                                  $instituteName = $row['vchOtherInstituteName'];
                                }
                                else
                                {
                                  $instituteName = $row['instituteName'];
                                }
                                /*$studentFee     = $row['intStudentFee'];
                                $studentQty     = $row['intStudentQty'];
                                $trainFee       = $row['intTrainFee'];
                                $trainQty       = $row['intTrainQty'];
                                $insFee         = $row['intInsFee'];
                                $insQty         = $row['intInsQty'];
                                $appStudentFee  = $row['intAppStudFee'];
                                $appStudentQty  = $row['intAppStudQty'];
                                $appTrainFee    = $row['intAppTrainFee'];
                                $appTrainQty    = $row['intAppTrainQty'];
                                $appInsFee      = $row['intAppInsFee'];
                                $appInsQty      = $row['intAppInsQty'];
                                $totTPAmount      = ($studentFee*$studentQty)+($trainFee*$trainQty)+($insFee*$insQty);
                                $totVerifiedAmount = ($appStudentFee*$appStudentQty)+($appTrainFee*$appTrainQty)+($appInsFee*$appInsQty);
                                $studProFee     = $totTPAmount/$studentQty;
                                $verifiedProFee = $totVerifiedAmount/$appStudentQty;
                                if($totVerifiedAmount>0)
                                {
                                   $programFee =  $verifiedProFee;
                                }
                                else if($totTPAmount>0)
                                {
                                    $programFee = $studProFee;
                                }
                                else
                                {
                                  $programFee = '0';
                                }

                                $instituteFee= $row['instituteFee'];
                              $TPFee       = $row['TPFee'];
                              $OSDAFee     = $row['OSDAFee'];
                              $totalPer    = $instituteFee+$TPFee+$OSDAFee;
                              $payableFee  = ($programFee)-($programFee)/(100/$totalPer);*/


                                $ctr++; 
                                ?>
                            <tr>
                             
                                <td><?php echo $ctr; ?></td>
                                <td>
                                <div class="media-body pull-left"> 
                                                
                                        <h4><?php echo htmlspecialchars_decode($row['vchName'], ENT_QUOTES); ?></h4>   
                                        <small class="text-primary"><i class="fa fa-phone"></i> +91- <?php echo $row['vchMobile']; ?></small><br/>
                                        <small class="text-muted"><i class="fa fa-envelope"></i> <?php echo htmlspecialchars_decode($row['vchEmail'],ENT_QUOTES); ?></small>
                                      </div>

                                 <td> <?php  echo htmlspecialchars_decode($row['vchRegdNumber'],ENT_NOQUOTES);?> </td> 
                                 <td><?php echo htmlspecialchars_decode($row['tpName'], ENT_QUOTES); ?></td>
                                  <td> <?php  echo $instituteName;?> </td>
                                  <td> <?php  echo $row['interestedCourseName'];?> </td>
                                  <td> <?php  echo $row['vchAddress'];?> </td>
                                  
                                <td><?php echo date('d-M-Y', strtotime($row['stmCreatedOn'])); ?></td>
                                
                                
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
                    <input type="hidden" name="proStatusId" id="proStatusId" value="">
                    <input type="hidden" name="proRejectId" id="proRejectId" value="">
                    
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