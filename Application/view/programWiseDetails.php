<?php
    /* ================================================
    File Name         	  : programWiseDetails.php
    Description		      : This is used for view Institute wise candidate Report.
    Author Name           : Rahul Kumar Saw
    Date Created          : 
    Devloped On           : 07-July-2022
    Devloped By           : Rahul Kumar Saw
    Update History	      : <Updated by>		<Updated On>		<Remarks>

    Style sheet           : 
    Javscript Functions   : 
    includes		  : util.php, programWiseDetails.php

    ==================================================*/
    require 'programWiseDetailsInner.php';

?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
	$(document).ready(function () {
            loadNavigation('Institute Wise Report');
            pageHeader      = "Institute Wise Report";
            strFirstLink    = "Manage Reports";
            strLastLink     = "Institute Wise Report";
            downloadMe    = "yes";
            
                  
		    
            if('<?php echo $outMsg;?>'!='')                
                   viewAlert('<?php echo $outMsg;?>');

            <?php if ($redirectPage != '') { ?>
             $('#alertModal').on('hidden.bs.modal', function () {
                 window.location.href = '<?php echo $redirectPage; ?>';
             });

          <?php } ?>
               
	});
</script>
    <div class="page-content">
        <div class="page-header">
            <h1 id="title" class="col-sm-5"></h1>
        </div>
        <div class="row">
            <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="top_tab_container">
                <a href="javascript:void(0);" class="btn btn-info active">Program Wise Report <span class="badge badge-pill badge-danger"><strong><?php echo $toalNumber;?></strong></span></a>
            </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
               <!--  <div class="searchTable">
              <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="selRegdType">Registration Type </label>
                        <div class="col-sm-2"> <span class="colon">:</span> 
                        <select class="form-control" name="selRegdType" id="selRegdType" >
                                <option value="">--All--</option>                                
                        </select>        
                        </div>

                        <label class="col-sm-1 control-label no-padding-right" for="selGender">Gender </label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <select class="form-control" name="selGender" id="selGender" >
                                <option value="">--All--</option>
                                <option value="1" <?php if($gender==1)echo 'selected="selected"'; ?>>Male</option>
                                <option value="2" <?php if($gender==2) echo 'selected="selected"'; ?>>Female</option>
                                <option value="3" <?php if($gender==3) echo 'selected="selected"'; ?>>Others</option>
                                
                        </select>        
                    </div>
                    
                      <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                     </div>                
              </div>
            </div> -->

                <div id="viewTable">
                <?php if (mysqli_num_rows($result) > 0) {
                    $ctr = $intRecno; ?>
                    <table class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                              
                                <th>Sl.#</th>
                                <th>Program Name </th>   
                                <th>No. Of Applicants</th>  
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {
                           
                                $ctr++; 
                                ?>
                            <tr>
                              
                               <td><?php echo $ctr; ?></td>
                                <td> <?php  echo htmlspecialchars_decode($row['vchProgramName'],ENT_QUOTES);?> </td>
                                  <td>
                                <?php if ($row['totalCandidate'] > 0) { ?>
                                            <a href="<?php echo APP_URL; ?>viewProgramWiseCandidateDetails/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intId']; ?>" class="badge badge-primary" ><?php echo $row['totalCandidate']; ?></a>
                                        <?php } else {
                                            echo $row['totalCandidate'];
                                        } ?>
                                </td>
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
                    <input name="hdn_qualification" id="hdn_qualify" type="hidden" value="21"/>
                <?php } else { ?>
                    <div class="noRecord">No record found</div>
            <?php } ?>
        </div>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <div class="row noPrint">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="sample-table-2_info">
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="javascript:void(0);" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a>/ <?php } ?> 
                    <?php echo $objReport->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                                <?php echo $objReport->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
         

