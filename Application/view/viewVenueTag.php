<?php
/* ================================================
  File Name       : viewVenueTag.php
  Description		  : This is used for view the View tag venue details.
  Author Name		  : Rahul Kumar Saw
  Date Created		  : 21-April-2021
  Update History	  : <Updated by>		<Updated On>		<Remarks>

  Style sheet           : 
  Javscript Functions   : 
  includes              : util.php, viewVenueTagInner.php

  ================================================== */
    require("viewVenueTagInner.php");
?>

<script language="javascript">
    $(document).ready(function () {
        loadNavigation('View Venue Tag');
        pageHeader      = "View Venue Tag";
        strFirstLink    = "Manage Event";
        strLastLink     = "View Venue Tag";
        $('[data-rel=tooltip]').tooltip(); 
         
       
           printMe          = "yes";		                
           /*publishMe        = "yes";
           unpublishMe      = "yes";*/

         if('<?php echo $outMsg;?>'!='')                
                 viewAlert('<?php echo $outMsg;?>');


       fillDistricts('<?php echo $intDistid; ?>','ddlDistrict');
       fillIndiaSkill('<?php echo $intSkill;?>','selSkill');
       fillVenueName('<?php echo $venueId;?>','ddlVenue','<?php echo $intDistid; ?>');
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
            
              <a href="javascript:void(0);" class="btn btn-info active">View</a>
              <a href="<?php echo APP_URL ?>candidatTagData/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View Tag Data</a> 
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
                  <label class="col-sm-1 control-label no-padding-right" for="ddlDistrict">District</label>
                    <div class="col-sm-2"> 
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlDistrict" id="ddlDistrict" onchange="fillVenueName(0,'ddlVenue',this.value)">
                           <option value="0">- All -</option>                                 
                        </select>
                     </div>

                     <label class="col-sm-1 control-label no-padding-right" for="ddlVenue">Venue</label>
                    <div class="col-sm-2"> 
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlVenue" id="ddlVenue">
                           <option value="0">- All -</option>                                 
                        </select>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-1 control-label no-padding-right" for="selSkill">Skill</label>
                    <div class="col-sm-2"> 
                        <span class="colon">:</span>
                        <select class="form-control" name="selSkill" id="selSkill">
                           <option value="0">- All -</option>                                 
                        </select>
                     </div>  
                      
                      <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                        <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewVenueTag/<?php echo $glId . '/' . $plId; ?>' ">
                     </div>                
              </div>
            </div>
			
          <!-- <div class="legandBox">			
                <span class="greenLegend">&nbsp;</span>Published Venue(s) &nbsp;			
                <span class="yellowLegend">&nbsp;</span> Unpublished Venue(s) &nbsp;
            </div> -->
             <div id="viewTable">
                <?php if ($result->num_rows > 0) {
                    $ctr = $intRecno; ?>
                    <table class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <!-- <th width="20" class="noPrint">
                                    <label class="position-relative">
                                    <input type="checkbox" class="ace chkAll"><span class="lbl"></span></label>
                                </th> -->
                                <th width="20">Sl.#</th>
                                <th>District </th>  
                                <th>Venue Name</th>                                 
                                <th>Skill</th> 
                                <th>Exam Date </th>
                                <th>No. Of Candidate </th> 
                                <th>Level</th>
                                <th class="noPrint">Details</th> 
                                <th>Created On </th>
                                <th width="30" class="noPrint">Edit</th>
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = $result->fetch_array()) {
                            
                           /* if($row['tinPublishStatus']==1)
                                $style	= 'class="greenBorder"';
                            else
                                $style	= 'class="yellowBorder"';*/ 
                                $ctr++; 
                                
                              
                         ?>
                            <tr>
                                <!-- <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intSkillId'].'_'.$row['intDistId'].'_'.$row['intVenueId'];?>">
                                    </label>
                                </td> -->
                                <td><?php echo $ctr; ?></td>
                                <td> 
                                    <?php echo htmlspecialchars_decode($row['vchDistrictname'],ENT_QUOTES); ?>
                                </td>
                              
                                <td><?php  echo htmlspecialchars_decode($row['venueName'],ENT_QUOTES);?> </td>  
                                <td><?php  echo htmlspecialchars_decode($row['strSkills'],ENT_QUOTES);?> </td>  
                               
                                <td><?php echo date("d-M-Y",strtotime($row['stmExamDate']))?></td>
                                <td><?php  echo $row['totalCan'];?> </td>
                                <td><?php  echo $row['intLevel'];?> </td>
                                <td align="center" valign="middle" class="noPrint">
                                 <a href="javascript:void(0);" onclick="gotoAssignment('viewVenueTag','<?php echo $row['intSkillId']; ?>','<?php echo $row['intDistId']; ?>',<?php echo $row['intVenueId']; ?>,<?php echo $row['intRegistrationType']; ?>);" data-rel="tooltip" title="" data-original-title="Details" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-file-text bigger-120"></i> </a>
                             </td>
                             <td><?php echo date("d-M-Y",strtotime($row['stmCreatedOn']))?></td>
                             <td align="center" valign="middle" class="noPrint">
                               <a href="<?php echo APP_URL; ?>venueTag/<?php echo $row['intSkillId']; ?>/<?php echo $row['intDistId']; ?>/<?php echo $row['intVenueId']; ?>"  data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a>
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
<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <a href="javascript:void(0)" title="Print" onclick="printModal('myModalLabel','divContent');" class="btn btn-success btn-sm pull-right" style="margin-right:10px;"><i class="icon-white icon-print"></i> Print</a>
        <h4 class="modal-title" id="myModalLabel">Applicant Details</h4>
      </div>
      <div class="modal-body" id="divContent">
        
      </div>
    </div>
  </div>
</div>