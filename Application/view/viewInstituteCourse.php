<?php
    /* ================================================
    File Name         	  : viewInstituteCourse.php
    Description		  : This is used for view sector details.
    Author Name           : T Ketaki Debadarshini
    Date Created          : 17-Sept-2016
    Devloped On           : 17-Sept-2016
    Devloped By           : T Ketaki Debadarshini
    Update History	  : <Updated by>		<Updated On>		<Remarks>

    Style sheet           : 
    Javscript Functions   : loadAjax.js
    includes		  : header.php, util.php, viewSectorInner.php

    ==================================================*/
    require 'viewInstituteCourseInner.php';
?>

<script src="<?php echo APP_URL; ?>js/loadAjax.js"></script>

<script language="javascript">
    $(document).ready(function () {

            pageHeader = "View Institute Courses";
            strFirstLink = "Manage Application";
            strLastLink  = " Manage Institute Courses"; 

            loadNavigation('View Institute Courses');

            <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission==3) { ?>
             deleteMe     = "yes";
             <?php }?>
             printMe		= "yes";
             <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission!=1) { ?>		                
             

            <?php }?>

            if('<?php echo $outMsg;?>'!='')                
                viewAlert('<?php echo $outMsg;?>');

            <?php if ($redirectPage != '') { ?>
             $('#alertModal').on('hidden.bs.modal', function () {
                 window.location.href = '<?php echo $redirectPage; ?>';
             });

          <?php } ?>
           //fill the districts details
                fillDistricts('<?php echo $intDist; ?>','ddlDist');
          //fill the education details
                fillInstitute('<?php echo $intInst; ?>','ddlInst','<?php echo $intDist; ?>');

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
                <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission!=2) { ?>
                    <a href="<?php echo APP_URL?>addInstituteCourse/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a>
                <?php }?>
                <a href="javascript:void(0);" class="btn btn-info active">View</a> 
            </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                
                <div class="searchTable">
                  <div class="form-group">

                  <label class="col-sm-1 control-label no-padding-right" for="ddlDist">District</label>
                       <div class="col-sm-3"> 
                           <span class="colon">:</span>
                           <select class="form-control" name="ddlDist" id="ddlDist" onchange="fillInstitute(0,'ddlInst',this.value);">
                              <option value="0">- All -</option>                                 
                           </select>
                        </div>   
              

                 <label class="col-sm-1 control-label no-padding-right" for="ddlInst"> Institute</label>
                    <div class="col-sm-3">       
                    <span class="colon">:</span>  
                    <select class="form-control" name="ddlInst" id="ddlInst">
                              <option value="0">- All -</option>                                 
                           </select>
                    </div>            
                      
                      <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                        <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href = '<?php echo APP_URL; ?>viewInstituteCourse/<?php echo $glId . '/' . $plId; ?>' ">
                     </div>                
              </div>
            </div>
                
                
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
                                <th>Institute</th>                            
                                <th>District</th> 
                                <th>Available Course(s)</th>
                                <th class="noPrint">Course Details</th> 
                                
                                <th width="30" class="noPrint">Edit</th>
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {
                           
                                $ctr++; 
                                ?>
                            <tr >
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intInstituteId'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['intInstituteId'];?>" name="hdnPubStatus<?php echo $row['intInstituteId'];?>" value=""/>
                                    </label>
                                </td>
                                <td><?php echo $ctr; ?></td>
                                <td> <?php  echo htmlspecialchars_decode($row['vchInstituteName'],ENT_QUOTES);?></td> 
                                <td> <?php  echo htmlspecialchars_decode($row['vchDistrictname'],ENT_QUOTES);?></td> 
                                <td> <?php  echo $row['totCourse'];?></td> 
                                <td class="noPrint"><a href="javascript:void(0);" class="btn btn-xs btn-success" data-toggle="modal" onclick="showInstituteCourse('<?php echo $row['intInstituteId'];?>');">Show</a></td>
                                
                                
                                
                                <td align="center" valign="middle" class="noPrint"><a href="<?php echo APP_URL?>addInstituteCourse/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intInstituteId'] ?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>
                            </tr>
                        <?php } ?>
                         </tbody>
                    </table>
                    <input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno; ?>" />
                    <input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno; ?>" />
                    <input name="hdn_IsPaging" id="hdn_IsPaging" type="hidden" value="<?php echo $isPaging; ?>" />
                    <input name="hdn_ids" id="hdn_ids" type="hidden" />
                    <input name="hdn_qs" id="hdn_qs" type="hidden" />
                    
                    <input name="hdn_msgid" id="hdn_msgid" type="hidden" />
                    
                <?php } else { ?>
                    <div class="noRecord">No record found</div>
            <?php } ?>
        </div>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <div class="row noPrint">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="sample-table-2_info">
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a>/ <?php } ?> 
                            <?php echo $objCourse->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                            <?php echo $objCourse->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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


         
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Institute Course Details</h4>
            </div>
            <div class="modal-body" id="divInstituteCourse"><div class="text-center m-t-lg"><i class="fa fa-gear spinner-lg fa-spin"></i></div></div> 

        </div>
    </div>
</div>


