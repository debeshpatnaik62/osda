<?php
/* ================================================
  File Name       : viewPanelTag.php
  Description		  : This is used for view the candidate tag details.
  Author Name		  : Rahul Kumar Saw
  Date Created		: 05-Aug-2021
  Update History	  : <Updated by>		<Updated On>		<Remarks>

  Style sheet           : 
  Javscript Functions   : 
  includes              : util.php, viewPanelTagInner.php

  ================================================== */
    require("viewPanelTagInner.php");
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
       fillPanel('<?php echo $strPanel; ?>','ddlPanel','0','<?php echo $strVenue;?>');
       fillVenue('<?php echo $strVenue;?>','selVenue','<?php echo $level; ?>');
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
            
              <a href="<?php echo APP_URL ?>candidateTag/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a> 
            
              <a href="javascript:void(0);" class="btn btn-info active">View</a>
              <a href="<?php echo APP_URL; ?>panelTagData/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View Panel Tag Data</a>
              <a href="<?php echo APP_URL; ?>sendEmailDetails/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View Email Details</a>
             
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

                    <label class="col-sm-1 control-label no-padding-right" for="selLevel">Level </label>
                    <div class="col-sm-1"> <span class="colon">:</span> 
                        <select class="form-control" name="selLevel" id="selLevel" onchange="fillVenue(0,'selVenue',this.value)">
                                
                                <option value="0">- Select -</option> 
                                <option value="2" <?php if($level==2) echo 'selected="selected"'; ?>>Level-2</option> 
                                <option value="3" <?php if($level==3) echo 'selected="selected"'; ?>>Level-3</option> 
                        </select>        
                    </div>

                    <label class="col-sm-1 control-label no-padding-right" for="selVenue">Venue Name </label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <select class="form-control" name="selVenue" id="selVenue" onchange="fillPanel(0,'ddlPanel',$('#selLevel').val(),this.value)">
                                <option value="">--All--</option>
                               
                        </select>        
                    </div>

                    <label class="col-sm-1 control-label no-padding-right" for="ddlPanel">Panel Name </label>
                    <div class="col-sm-1"> <span class="colon">:</span> 
                        <select class="form-control" name="ddlPanel" id="ddlPanel" >
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
                                <th>Panel Name</th>
                                <th>District </th>                                 
                                <th>Level</th> 
                                <th>Exam Date</th> 
                                <th>Tagged On </th> 
                                <th>No. Of Candidate </th> 
                                <th class="noPrint">Action</th>
                                <!-- <th width="30" class="noPrint">Edit</th> -->
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = $result->fetch_array()) {
                                $ctr++; 
                                
                              
                         ?>
                            <tr>
                                <!-- <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intSkillId'].'_'.$row['intDistId'].'_'.$row['intPanelId'];?>">
                                    </label>
                                </td> -->
                                <td><?php echo $ctr; ?></td>
                                <td><?php  echo htmlspecialchars_decode($row['panelName'],ENT_QUOTES);?> </td> 
                                <td> 
                                    <?php echo (!empty($row['vchDistrictname']))?htmlspecialchars_decode($row['vchDistrictname'],ENT_QUOTES):'--'; ?>
                                </td>
                              
                                 
                                <!-- <td><?php  echo htmlspecialchars_decode($row['strSkills'],ENT_QUOTES);?> </td> -->  
                                <td><?php  echo htmlspecialchars_decode($row['intLevel'],ENT_QUOTES);?> </td>   
                               <td><?php echo date("d-M-Y",strtotime($row['stmExamDate']))?></td>
                                <td><?php echo date("d-M-Y",strtotime($row['stmCreatedOn']))?></td>
                                <td><?php  echo $row['totalCan'];?> </td> 
                                <td align="left" valign="middle" class="noPrint">
                                 <a href="javascript:void(0);" onclick="gotoCandidate('viewPanelTag','<?php echo $row['intSkillId']; ?>','<?php echo $row['intDistId']; ?>',<?php echo $row['intPanelId']; ?>,'<?php echo $row['intLevel']; ?>','<?php echo $row['intRegistrationType']; ?>');" data-rel="tooltip" class="btn btn-xs btn-info">View Candidates </a>
                             </td>
                               <!-- <td align="center" valign="middle" class="noPrint">
                               <a href="<?php echo APP_URL; ?>venueTag/<?php echo $row['intSkillId']; ?>/<?php echo $row['intDistId']; ?>/<?php echo $row['intVenueId']; ?>"  data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a>
                             </td>  -->
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