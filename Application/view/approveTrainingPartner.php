<?php

    require 'approveTrainingPartnerInner.php';
?>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
	$(document).ready(function () {
		pageHeader = "Skill Development Program";
                strFirstLink = "Manage Skill Development";
                strLastLink = "Approved TP Details";
               loadNavigation('Skill Development Program Report');

		    printMe		   = "yes";     		                
        downloadMe   = "yes";
        //deleteMe     = "yes";

        <?php if ($msg != '' && isset($_REQUEST['btnUpdate'])) { ?>
            viewAlert('<?php echo $msg; ?>', '', '');
         <?php }  ?>

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
                
                <a href="javascript:void(0);" class="btn btn-info active">View Training Partner Details</a>
               <!--  <a href="<?php echo APP_URL; ?>addTrainingPartnerRegistration/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add Program</a>
                <a href="<?php echo APP_URL; ?>viewTrainingProgram/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View Program</a> -->
                 </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                <!-- <div class="searchTable">
                    <div class="form-group">                   
                        <label class="col-sm-2 control-label no-padding-right" for="txtSearch">Registration Number</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <input type="text" class="form-control" maxlength="100" name="txtRegdNumber" id="txtRegdNumber" value="<?php echo $strNumber; ?>"/>
                    </div>
                     </div>
                     <div class="form-group">  
                    
                        <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                        <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewSapReport/<?php echo $glId . '/' . $plId; ?>' ">
                    </div>
                </div>
                    </div> -->
                </div>
              
                <div id="viewTable">
                <?php if (mysqli_num_rows($result) > 0) {
                    $ctr = $intRecno; ?>
                    <table class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="20">Sl.#</th>
                                <th>Organisation Name</th> 
                                <th>Email Id</th>   
                                <th>Contact No.</th>   
                                <th>PAN Number</th>   
                                <th>Organisation Regd No.</th>
                                <th>Organisation Address</th>
                                <th>Total Program</th>
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {

                                

                                $ctr++; 
                                ?>
                            <tr>
                                <td><?php echo $ctr;?></td>
                                <td><?php echo htmlspecialchars_decode($row['vchOrgName'], ENT_QUOTES); ?></td>
                                <td><?php echo htmlspecialchars_decode($row['vchOrgEmail'], ENT_QUOTES); ?></td>
                                <td><?php echo htmlspecialchars_decode($row['vchOrgMobile'], ENT_QUOTES); ?></td>
                                <td><?php echo htmlspecialchars_decode($row['vchPan'], ENT_QUOTES); ?></td>
                                <td><?php echo htmlspecialchars_decode($row['vchRegdNo'], ENT_QUOTES); ?> </td> 
                                <td><?php echo htmlspecialchars_decode($row['vchAddress'], ENT_QUOTES); ?> </td> 
                                <td><?php echo $row['totalProgram']; ?></td> 
                                 
                                <!-- <td> 
                                  
                                  <a href="<?php echo APP_URL; ?>addTrainingPartnerRegistration/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intId']; ?>" class="btn btn-info">Add Program</a>
                                  <a href="<?php echo APP_URL; ?>viewTrainingProgram/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intId']; ?>" class="btn btn-info">View Program</a>
                                 
                               </td>        -->                        
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
                    <?php echo $objTP->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                                        </div>
                                    </div>
                    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                                        <div class="col-xs-6">
                                            <div class="dataTables_paginate paging_bootstrap">
                                                <ul class="pagination">
                        <?php echo $objTP->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
         
 