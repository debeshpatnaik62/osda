<?php
    /* ================================================
    File Name         	  : archieveMsgdetails.php
    Description		  : This is used for view archived Employer Speaks details.
    Author Name           : T Ketaki Debadarshini
    Date Created          : 17-Sept-2016
    Devloped On           : 17-Sept-2016
    Devloped By           : T Ketaki Debadarshini
    Update History	  : <Updated by>		<Updated On>		<Remarks>

    Style sheet           : 
    Javscript Functions   : loadAjax.js
    includes		  : header.php, util.php, archieveMsgdetailsInner.php

    ==================================================*/
    require 'archieveMsgdetailsInner.php';
?>

<script src="<?php echo APP_URL; ?>js/loadAjax.js"></script>

<script language="javascript">
	$(document).ready(function () {
		loadNavigation('Archive Employer Speaks');
                pageHeader = "Archive Employer Speaks";
                strFirstLink = "Manage Application";
                strLastLink = "Employer Speaks";
                <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission==3) { ?>
		activeMe	= "yes";
                 <?php }?>
		printMe		= "yes";
                 <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission!=1) { ?>		                
		deleteMe	= "yes";
                <?php }?>
		
		
               if('<?php echo $outMsg;?>'!='')                
                    viewAlert('<?php echo $outMsg;?>');

                    <?php if ($redirectPage != '') { ?>
                     $('#alertModal').on('hidden.bs.modal', function () {
                         window.location.href = '<?php echo $redirectPage; ?>';
                     });

                  <?php } ?>
                  //fill the education details
                     fillInstitute('<?php echo $intInst; ?>','ddlInst','');
                 
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
                    <a href="<?php echo APP_URL?>addMessagedtls/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a>
                <?php }?>
                <a href="<?php echo APP_URL;?>viewMessagedetails/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info ">View</a> <a href="javascript:void(0);" class="btn btn-info active">Archive</a></div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                
                <div class="searchTable">
              <div class="form-group">

                  <label class="col-sm-1 control-label no-padding-right" for="ddlInst">Institute</label>
                       <div class="col-sm-3"> 
                           <span class="colon">:</span>
                           <select class="form-control" name="ddlInst" id="ddlInst">
                              <option value="0">- All -</option>                                 
                           </select>
                        </div>                


                    <label class="col-sm-1 control-label no-padding-right" for="txtName">  Name</label>
                      <div class="col-sm-3"> 
                      <span class="colon">:</span> 
                          <input type="text" class="form-control" maxlength="80" name="txtName" id="txtName" value="<?php echo $strName; ?>"/>
                      </div>       
                      
                      <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                        <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>archieveMsgdetails/<?php echo $glId . '/' . $plId; ?>' ">
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
                                <th>Name </th> 
                                <th>Name in Odia</th> 
                                <th>Designation </th> 
                                <th>Designation in Odia</th> 
                                <th>Image</th>
                                <th>Institute</th>
                                <th>Description </th>    
                                <th>Created On </th>
                               
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {
                           
                                $ctr++; 
                                ?>
                            <tr <?php //echo $style;?>>
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['INT_MSG_ID'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['INT_MSG_ID'];?>" name="hdnPubStatus<?php echo $row['INT_MSG_ID'];?>" value="<?php echo $row['INT_PUBLISH_STATUS'];?>"/>
                                    </label>
                                </td>
                                <td><?php echo $ctr; ?></td>                                
                                
                                <td> <?php  echo htmlspecialchars_decode($row['VCH_NAME'],ENT_NOQUOTES);?>
                                </td> 
                                <td class="odia"> <?php  echo $row['VCH_NAME_O'];?>
                                </td> 
                                <td> <?php  echo htmlspecialchars_decode($row['VCH_DESIGNATION'],ENT_NOQUOTES);?>
                                </td> 
                                <td class="odia"> <?php  echo $row['VCH_DESIGNATION_O'];?>
                                </td>
                                <td align="center" width="150">
                                    <?php if($row['VCH_IMAGE']!=''){ ?>
                                    <a href="<?php echo APP_URL ?>uploadDocuments/messageBoard/<?php echo $row['VCH_IMAGE'];?>" target="_blank" title="INfo Photo"><img src="<?php echo APP_URL ?>uploadDocuments/messageBoard/<?php echo $row['VCH_IMAGE'];?>" alt="" width="120" height="80" /></a>
                                    <?php }else echo '';?>
                                </td>

                                <td>
                                  <?php if($row['intInstId'] != 0) { ?>
                                   <?php echo $objMsg->getName('vchInstituteName','t_institute_details','intInstituteId',$row['intInstId'],'0'); ?>   (<?php echo $objMsg->getName('vchDistrictname','m_district','intDistrictid',$row['dist_id'],'0'); ?>)
                                <?php } else { ?>
                                   <?php echo '--'; ?>
                                <?php } ?>
                                   </td>
                                
                                <td>
                                    <?php
                                        $strMessage= htmlspecialchars_decode($row['VCH_DESCRIPTION'],ENT_NOQUOTES);
                                        $shortmsg = $objMsg->wardWrap($strMessage, 250);
                                        echo $shortmsg ;
                                   ?>
                                  
                                </td>
                                <td><?php echo date("d-M-Y",strtotime($row['DTM_CREATED_ON']))?></td>
                               
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
                            <?php echo $objMsg->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                                <?php echo $objMsg->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
