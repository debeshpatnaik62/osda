<?php
    /* ================================================
    File Name         	  : viewGraduateReport.php
    Description		      : This is used for view Graduation College Report.
    Author Name           : Ashis kumar Patra
    Date Created          : 21-Sept-2019
    Devloped On           : 21-Sept-2019
    Devloped By           : Ashis kumar Patra
    Update History	      : <Updated by>		<Updated On>		<Remarks>

    Style sheet           : 
    Javscript Functions   : 
    includes		      : util.php, viewGraduateReport.php

    ==================================================*/
    require 'viewGraduateReportInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
	$(document).ready(function () {
            loadNavigation('Degree College Report');
            pageHeader      = "Degree College Report";
            strFirstLink    = "Manage Reports";
            strLastLink     = "Degree College Report";
            downloadMe      ='yes';
                  
		
            if('<?php echo $outMsg;?>'!='')                
                   viewAlert('<?php echo $outMsg;?>');

            <?php if ($redirectPage != '') { ?>
             $('#alertModal').on('hidden.bs.modal', function () {
                 window.location.href = '<?php echo $redirectPage; ?>';
             });

          <?php } ?>
               
          fillRegistrationPhase('<?php echo $regdType; ?>','selRegdType');        
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
                <a href="<?php echo APP_URL;?>viewITIReport/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">ITIs <span class="badge badge-pill badge-light"><strong><?php echo $itiCount;?></strong></span></a>
                <a href="<?php echo APP_URL;?>viewEngineeringReport/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Engineering Colleges <span class="badge badge-light"><?php echo $engCount;?></span></a> 
                <a href="<?php echo APP_URL;?>viewPolytechnicReport/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Polytechnics <span class="badge badge-light"><?php echo $polyCount;?></span></a>
                <a href="javascript:void(0);" class="btn btn-info active">Graduation Colleges <span class="badge badge-danger"><?php echo  $gradCount;?></span></a>
                <a href="<?php echo APP_URL;?>viewHMReport/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Hotel Management <span class="badge badge-light"><?php echo  $hmCount;?></span></a>
                <a href="<?php echo APP_URL;?>viewNursingReport/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Nursing Colleges <span class="badge badge-light"><?php echo  $nurseCount;?></span></a>
                <a href="<?php echo APP_URL;?>viewOtherReport/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Other Institutes <span class="badge badge-light"><?php echo  $toalNumber;?></span></a>
            </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>                 
             <div class="searchTable">
              <div class="form-group">
                        <!-- <label class="col-sm-1 control-label no-padding-right" for="selType">Type</label>
                        <div class="col-sm-2"> 
                            <span class="colon">:</span>
                            <select class="form-control" name="selType" id="selType" >
                                <option  <?php //if( $strType=='5,6') echo 'selected="selected"';?> value="0">--All--</option>
                                <option  <?php //if( $strType=='5') echo 'selected="selected"';?> value="5">Govt.</option>
                                <option  <?php // if( $strType=='6') echo 'selected="selected"';?> value="6">Private</option>
                            </select>
                            
                         </div>
 -->
                         <label class="col-sm-1 control-label no-padding-right" for="selRegdType">Registration Type </label>
                        <div class="col-sm-2"> <span class="colon">:</span> 
                        <select class="form-control" name="selRegdType" id="selRegdType" >
                                <option value="">--All--</option>                                
                        </select>        
                        </div>
                      <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                        <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewGraduateReport/<?php echo $glId . '/' . $plId; ?>' ">
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
                                <th>Institute Name </th>   
                                <th width="100">No. Of Applicants</th>  
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {
                           
                                $ctr++; 
                                ?>
                            <tr>
                              
                               <td><?php echo $ctr; ?></td>
                                <td> <?php  echo htmlspecialchars_decode($row['vchInstituteName'],ENT_QUOTES);?> </td>
                                <td> <?php  echo $row['COUNTComp'];?> </td>  
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
                    <input name="hdn_qualification" id="hdn_qualify" type="hidden" value="17"/>
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
         

