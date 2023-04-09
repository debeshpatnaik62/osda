<?php

    require 'viewTaggedProgramInner.php';
?>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
	$(document).ready(function () {
		pageHeader = "Skill Development Program";
                strFirstLink = "Manage Skill Development";
                strLastLink = "View Tagged Program Details";
               loadNavigation('Skill Development Program Report');

		printMe		   = "yes";     		                
        downloadMe   = "yes";
        //deleteMe     = "yes";

         <?php if ($msgRemark != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $msgRemark; ?>', '', '');
         <?php }  ?>
		
	
         if('<?php echo $outMsg;?>'!='')                
              viewAlert('<?php echo $outMsg;?>');

                 
                   
        $('.date-picker').datepicker({
              autoclose: true,
              todayHighlight: true
          });   
            
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
                <!-- <a href="<?php echo APP_URL; ?>addTrainingPartnerRegistration/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add Training Program</a> -->
                <a href="javascript:void(0);" class="btn btn-info active">View Tagged Program Details</a>
                 </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                
                </div>
              
                <div id="viewTable">
                <?php if (mysqli_num_rows($result) > 0) {
                    $ctr = $intRecno; ?>
                    <table class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="20">Sl.#</th>
                                <th>Program Name</th>
                                <th>Program Fee</th>
                                <th>Seat Allotted </th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Tagged Date</th> 
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {
                            
                                //$studentFee     = $row['intStudentFee'];
                                //$appStudFee     = $row['intAppStudFee'];
                                $studentFee     = $row['intStudentFee'];
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
                                   $strProgramFee =  $verifiedProFee;
                                }
                                else
                                {
                                    $strProgramFee = $studProFee;
                                }
                                $instituteFee= $row['intInstituteFee'];
                                $TPFee       = $row['intTPFee'];
                                $OSDAFee     = $row['intOSDAFee'];
                                $totalPer    = $instituteFee+$TPFee+$OSDAFee;
                                $payableFee  = ($strProgramFee)-($strProgramFee)/(100/$totalPer);
                                /*if($appStudFee>0)
                                {
                                   $strProgramFee =  $appStudFee;
                                }
                                else
                                {
                                    $strProgramFee = $studentFee;
                                }*/ 
                                $ctr++; 
                                ?>
                            <tr>
                                <td><?php echo $ctr;?></td>
                                <td><?php echo htmlspecialchars_decode($row['vchProgramName'], ENT_QUOTES); ?></td>
                                <td><?php echo $payableFee; ?></td>
                                <td><?php echo $row['intBookedSeat']; ?></td>
                                <td><?php echo date('d-M-Y', strtotime($row['dtmStartDate'])); ?></td>
                                <td><?php echo date('d-M-Y', strtotime($row['dtmEndDate'])); ?></td>                           
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
               <?php } else { ?>
                    <div class="noRecord">No record found</div>
            <?php } ?>     
                
        </div>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <div class="row noPrint">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="sample-table-2_info">
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a>/ <?php } ?> 
                    <?php echo $objIns->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                                        </div>
                                    </div>
                    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                                        <div class="col-xs-6">
                                            <div class="dataTables_paginate paging_bootstrap">
                                                <ul class="pagination">
                        <?php echo $objIns->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
         
 