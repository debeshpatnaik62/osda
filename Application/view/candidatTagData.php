<?php
/* ================================================
  File Name       : candidatTagData.php
  Description		  : This is used for view the candidate tag details.
  Author Name		  : Rahul Kumar Saw
  Date Created		: 05-Aug-2021
  Update History	  : <Updated by>		<Updated On>		<Remarks>

  Style sheet           : 
  Javscript Functions   : 
  includes              : util.php, viewPanelTagInner.php

  ================================================== */
    require("candidatTagDataInner.php");
?>

<script language="javascript">
    $(document).ready(function () {
        loadNavigation('View Candidate Tag');
        pageHeader      = "View Candidate Tag";
        strFirstLink    = "Manage Skill Competition";
        strLastLink     = "View Candidate Tag";
        $('[data-rel=tooltip]').tooltip(); 
         
       
           printMe          = "yes";		                
           /*publishMe        = "yes";
           unpublishMe      = "yes";*/

         if('<?php echo $outMsg;?>'!='')                
                 viewAlert('<?php echo $outMsg;?>');


       fillDistricts('<?php echo $intDistid; ?>','ddlDistrict');
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
            
              <a href="<?php echo APP_URL ?>venueTag/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a> 
            <a href="<?php echo APP_URL; ?>viewVenueTag/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>
              <a href="javascript:void(0);" class="btn btn-info active">View Tag Data</a>
              <a href="<?php echo APP_URL ?>sendEmailCandidateDetails/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View Email Details</a>
             
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="searchTable">
              <div class="form-group">
                    <label class="col-sm-1 control-label no-padding-right" for="selRegdType">Registration Type </label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <select class="form-control" name="selRegdType" id="selRegdType" >
                                <option value="">--All--</option>
                        </select>        
                    </div>
                      
                      <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                     </div>                
              </div>
            </div>
             <div id="viewTable">
               <?php if ($result->num_rows > 0) {
                    $ctr = $intRecno; ?>
                    <table class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="20">Sl.#</th>  
                                <th>Skill Name</th>
                                <th>Registered Candidate </th>  
                                <th>Total Tagged </th> 
                                <th>Total Untagged</th> 
                            </tr>
                        </thead>
              		<tbody>
                      
                           <?php while ($row = $result->fetch_array()) {                    
                                $ctr++; 
                              
                         ?>
                            <tr>
                                <td><?php echo $ctr; ?></td>
                                <td> 
                                    <?php echo htmlspecialchars_decode($row['vchSkillName'],ENT_QUOTES); ?>
                                </td> 
                                <td> <?php echo htmlspecialchars_decode($row['totalSkill'],ENT_QUOTES); ?></td>
                                <td>
                                 <?php if ($row['totalTag'] > 0) { ?>
                                            <a href="<?php echo APP_URL; ?>venueTagCandidate/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intSkillId']; ?>" class="badge badge-primary" ><?php echo $row['totalTag']; ?></a>
                                        <?php } else {
                                            echo $row['totalTag'];
                                        } ?>
                                </td>
                                <td> <?php echo $row['totalSkill']-$row['totalTag'];?></td>
                            </tr>
                     <?php } ?>
                     
                         </tbody>
                    </table>
                    <input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno; ?>" />
                    <input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno; ?>" />
                    <input name="hdn_IsPaging" id="hdn_IsPaging" type="hidden" value="<?php echo $isPaging; ?>" />
                    <input name="hdn_ids" id="hdn_ids" type="hidden" />
                    <input name="hdn_qs" id="hdn_qs" type="hidden" />
                               
              
       <?php } else { ?>
                    <div class="noRecord">No record found</div>
            <?php } ?>

        </div>
           <?php if($result->num_rows > 0) { ?>
                <div class="row noPrint">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="sample-table-2_info">
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a>/ <?php } ?> 
                            <?php echo $objVenueTag->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                     <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                                <?php echo $objVenueTag->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
