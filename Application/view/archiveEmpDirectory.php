<?php
/* ================================================
  File Name         	  : viewEmpDirectory.php
  Description		  : This is used for view the EMp Directory details.
  Author Name		  : T Ketaki Debadarshini
  Date Created		  : 15-July-2017
  Update History	  : <Updated by>		<Updated On>		<Remarks>

  Style sheet           : 
  Javscript Functions   : 
  includes              : util.php, archiveEmpDirectoryInner.php

  ================================================== */
    require("archiveEmpDirectoryInner.php");
?>

<script language="javascript">
    $(document).ready(function () {
        loadNavigation('Archive District Employment Directory');
        pageHeader      = "Archive District Employment Directory";
        strFirstLink    = "Manage Application";
        strLastLink     = "District Employment Directory";
        $('[data-rel=tooltip]').tooltip(); 
         
	 <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission==3) { ?>
           activeMe        = "yes";
            <?php }?>
           printMe          = "yes";
            <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission!=1) { ?>		                
           deleteMe        = "yes"
         
        <?php }?>

         if('<?php echo $outMsg;?>'!='')                
                 viewAlert('<?php echo $outMsg;?>');


       fillDistricts('<?php echo $intDistid; ?>','ddlDistrict');
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
                    <a href="<?php echo APP_URL ?>addEmpDirectory/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a> 
              <?php }?>
              <a href="<?php echo APP_URL ?>viewEmpDirectory/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info ">View</a>
              <a href="javascript:void(0);" class="btn btn-info active">Archive</a> 
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>

            <div class="searchTable">
              <div class="form-group">
                  <label class="col-sm-1 control-label no-padding-right" for="ddlDistrict">District</label>
                    <div class="col-sm-2"> 
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlDistrict" id="ddlDistrict">
                           <option value="0">- All -</option>                                 
                        </select>
                     </div>

                   <label class="col-sm-2 control-label no-padding-right" for="txtEmployeeName"> Employee Name</label>
                      <div class="col-sm-2"> <span class="colon">:</span> 
                          <input type="text" class="form-control" maxlength="80" name="txtEmployeeName" id="txtEmployeeName" value="<?php echo $strEmployeeName; ?>"/>
                      </div>  
                      
                      <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                        <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewEmpDirectory/<?php echo $glId . '/' . $plId; ?>' ">
                     </div>                
              </div>
            </div>
			
          
             <div id="viewTable">
                <?php if ($result->num_rows > 0) {
                    $ctr = $intRecno; ?>
                    <table class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="20" class="noPrint">
                                    <label class="position-relative">
                                    <input type="checkbox" class="ace chkAll"><span class="lbl"></span></label>
                                </th>
                                <th width="20">Sl.#</th>
                                <th>Employee Name </th>  
                                <th>Employee Name in Odia</th> 
                                <th>District</th> 
                                <th>Email </th> 
                                <th>Contact Details</th> 
                                 <th>Type</th>
                                <th>Created On </th>
                                <th width="30" class="noPrint">Edit</th>
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = $result->fetch_array()) {
                            
                                $ctr++; 
                                $strSeparator   = ($row['vchPhoneno']!='' && $row['vchMobileNo']!='')?'/':'';
                              
                         ?>
                            <tr <?php echo $style;?>>
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intEmployeeId'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['intEmployeeId'];?>" name="hdnPubStatus<?php echo $row['intEmployeeId'];?>" value="<?php echo $row['tinPublishStatus'];?>"/>
                                    </label>
                                </td>
                                <td><?php echo $ctr; ?></td>
                                <td> 
                                    <?php echo htmlspecialchars_decode($row['vchEmployeeName'],ENT_QUOTES); ?>
                                </td>
                                
                                <td class="odia"><?php  echo $row['vchEmployeeNameO'];?> </td>
                                 <td><?php  echo htmlspecialchars_decode($row['vchDistrictname'],ENT_QUOTES);?> </td>  
                                <td><?php  echo htmlspecialchars_decode($row['vchEmailId'],ENT_QUOTES);?> </td>  
                               
                                 <td ><?php  echo (($row['vchPhoneno']!='')?htmlspecialchars_decode($row['vchPhoneno'],ENT_QUOTES):'').$strSeparator.(($row['vchMobileNo']!='')?htmlspecialchars_decode($row['vchMobileNo'],ENT_QUOTES):'');?> </td>  
                                 <td><?php if($row['intEmpType']==1) echo 'Employment Officer'; else echo 'Project Director';?> </td>  
                                <td><?php echo date("d-M-Y",strtotime($row['stmCreatedOn']))?></td>
                                <td align="center" valign="middle" class="noPrint"><a href="<?php echo APP_URL?>addEmpDirectory/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intEmployeeId'] ?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>
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
                            <?php echo $objEmpDirectory->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                     <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                                <?php echo $objEmpDirectory->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
