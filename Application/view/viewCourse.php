<?php
/* ================================================
  File Name         	  : viewCourse.php
  Description		  : This is used for view the course details.
  Author Name		  : T Ketaki Debadarshini   
  Date Created		  : 21-March-2017
  Update History	  : <Updated by>		<Updated On>		<Remarks>

  Style sheet           : 
  Javscript Functions   : 
  includes              : util.php,viewCourseInner.php

  ================================================== */
require("viewCourseInner.php");
?>

<script language="javascript">
    $(document).ready(function () {
        loadNavigation('View Course Details');
        pageHeader      = "View Course Details";
        strFirstLink    = "Manage Application";
        strLastLink     = "Course Details";
         $('[data-rel=tooltip]').tooltip(); 
	 <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission==3) { ?>
		 archiveMe	= "yes";
                 <?php }?>
             /*    deleteMe  = "yes";
                 <?php ?>*/
		printMe		= "yes";
                 <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission!=1) { ?>		                
		publishMe       = "yes"
                unpublishMe     = "yes"
                <?php }?>

                //fill the sector details
                      fillSector('<?php echo $intSectorId; ?>','ddlSector');
                    
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
            <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission!=2) { ?>
                    <a href="<?php echo APP_URL ?>addCourse/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a> 
              <?php }?>
              <a href="javascript:void(0);" class="btn btn-info active">View</a>
              <a href="<?php echo APP_URL ?>archiveCourse/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Archive</a> 
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>

            <div class="searchTable">
              <div class="form-group">

                  <label class="col-sm-1 control-label no-padding-right" for="ddlSector">Sector</label>
                       <div class="col-sm-2"> 
                           <span class="colon">:</span>
                           <select class="form-control" name="ddlSector" id="ddlSector">
                              <option value="0">- All -</option>                                 
                           </select>
                        </div>

                   <label class="col-sm-1 control-label no-padding-right" for="txtCourseName"> Course Name</label>
                      <div class="col-sm-2"> <span class="colon">:</span> 
                          <input type="text" class="form-control" maxlength="80" name="txtCourseName" id="txtCourseName" value="<?php echo $strCourseName; ?>"/>
                      </div>  
                      <label class="col-sm-1 control-label no-padding-right" for="selStatus">Status</label>
                       <div class="col-sm-2"> 
                           <span class="colon">:</span>
                           <select class="form-control" name="selStatus" id="selStatus">
                              <option value="0">- Select -</option>
                              <option value="2" <?php echo ($intStatus == 2)?'selected="selected"':'';?>> Active </option>
                              <option value="1" <?php echo ($intStatus == 1)?'selected="selected"':'';?>> In active </option>                                 
                           </select>
                        </div>
                      <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                        <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href = '<?php echo APP_URL; ?>viewCourse/<?php echo $glId . '/' . $plId; ?>' ">
                     </div>                
              </div>
            </div>
			
          <div class="legandBox">			
                <span class="greenLegend">&nbsp;</span>Published Course(s) &nbsp;			
                <span class="yellowLegend">&nbsp;</span> Unpublished Course(s) &nbsp;
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
                                <th>Course Name in English</th>  
                                <th>Course Name in Odia</th>
                                <th>Course Alias </th>  
                                <th>Sector </th>  
                                <th>Duration in Months/Hours</th> 
                                <th>Eligibility</th> 

                                <th>Created On </th>
                                <th width="30" class="noPrint">Edit</th>
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {
                            if($row['tinPublishStatus']==2)
                                $style	= 'class="greenBorder"';
                            else
                                $style	= 'class="yellowBorder"'; 
                                $ctr++; 
                                ?>
                            <tr <?php echo $style;?>>
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intCourseId'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['intCourseId'];?>" name="hdnPubStatus<?php echo $row['intCourseId'];?>" value="<?php echo $row['tinPublishStatus'];?>"/>
                                    </label>
                                </td>
                                <td><?php echo $ctr; ?></td>
                                <td> 
                                 <?php
                                      if($row['vchDescriptionE']!='')
                                      {
                                     ?>
                                        <a href="#myModal<?php echo $row['intCourseId']; ?>" role="button" data-toggle="modal"><?php echo htmlspecialchars_decode($row['vchCourseNameE'],ENT_QUOTES); ?></a>
                                        
                                        <div style="display:none;" class="modal fade" id="myModal<?php echo $row['intCourseId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                  <h4 class="modal-title" id="myModalLabel">Description</h4>
                                                </div>
                                                  <div class="modal-body" id="divContent">
                                                    <?php echo htmlspecialchars_decode($row['vchDescriptionE'],ENT_QUOTES);?>
                                                   <?php
                                                     if($row['vchDescriptionO']!='')
                                                     {
                                                   ?>
                                                      <br><h5 class="modal-title" id="myModalLabel"><b>Description in Odia </b></h5> 
                                                      <span class="odia"> <?php echo $row['vchDescriptionO'];?> </span>
                                                    <?php
                                                     }
                                                    ?>
                                                 </div>

                                              </div>
                                            </div>
                                          </div>
                                        <?php }else{ ?>
                                        <?php echo htmlspecialchars_decode($row['vchCourseNameE'],ENT_QUOTES); ?>
                                        <?php } ?>
                                
                                </td>
                                
                                
                                <td class="odia"> <?php  echo htmlspecialchars_decode($row['vchCourseNameO'],ENT_QUOTES);?> </td>  
                                <td> <?php  echo htmlspecialchars_decode($row['vchCourseAlias'],ENT_QUOTES);?> </td>  
                                <td> <?php  echo htmlspecialchars_decode($row['vchSecotrName'],ENT_QUOTES);?> </td>  
                                <td> <?php  echo (($row['decDurationHr']!='' && $row['decDurationHr']>0)?floatval($row['decDurationHr']).'Hrs in '.floatval($row['intDuration']).' Months':floatval($row['intDuration']).' Months');?> </td>  
                                 <td> <?php  echo htmlspecialchars_decode($row['vchQualification'],ENT_QUOTES);?> </td>  
                                 

                                <td><?php echo date("d-M-Y",strtotime($row['stmCreatedOn']))?></td>
                                <td align="center" valign="middle" class="noPrint"><a href="<?php echo APP_URL?>addCourse/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intCourseId'] ?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>
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
