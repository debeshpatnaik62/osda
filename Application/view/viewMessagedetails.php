<?php
    /* ================================================
    File Name         	  : viewMessagedetails.php
    Description		  : This is used for view Employer Speaks details.
    Author Name           : T Ketaki Debadarshini
    Date Created          : 17-Sept-2016
    Devloped On           : 17-Sept-2016
    Devloped By           : T Ketaki Debadarshini
    Update History	  : <Updated by>		<Updated On>		<Remarks>

    Style sheet           : 
    Javscript Functions   : loadAjax.js
    includes		  : header.php, util.php, viewMessagedetailsInner.php

    ==================================================*/
    require 'viewMessagedetailsInner.php';
?>

<script src="<?php echo APP_URL; ?>js/loadAjax.js"></script>

<script language="javascript">
	$(document).ready(function () {
		
                pageHeader = "View Employer Speaks";
                strFirstLink = "Manage Application";
                strLastLink = "Employer Speaks";
               loadNavigation('View Employer Speaks');
                <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission==3) { ?>
		archiveMe	= "yes";
                 <?php }?>
		printMe		= "yes";
                 <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission!=1) { ?>		                
		publishMe       = "yes"
                unpublishMe     = "yes"
                
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
                <a href="javascript:void(0);" class="btn btn-info active">View</a> 
                <a href="<?php echo APP_URL;?>archieveMsgdetails/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Archive</a>
            </div>
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
                        <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewMessagedetails/<?php echo $glId . '/' . $plId; ?>' ">
                     </div>                
              </div>
            </div>
                
                <div class="legandBox">			
                    <span class="greenLegend">&nbsp;</span>Published Employer Speak(s)&nbsp;			
                    <span class="yellowLegend">&nbsp;</span> Unpublished Employer Speak(s) &nbsp;
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
                                <th>Designation</th> 
                                <th>Designation in Odia</th> 
                                <th>Organization</th>
                                <th>Organization in Odia</th>
                                <th>Image</th>
                                <th>Institute</th>                                
                                <th>Created On </th>
                                <th width="30" class="noPrint">Edit</th>
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {
                            if($row['INT_PUBLISH_STATUS']==2)
                                $style	= 'class="greenBorder"';
                            else
                                $style	= 'class="yellowBorder"'; 
                                $ctr++; 
                                ?>
                            <tr <?php echo $style;?>>
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['INT_MSG_ID'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['INT_MSG_ID'];?>" name="hdnPubStatus<?php echo $row['INT_MSG_ID'];?>" value="<?php echo $row['INT_PUBLISH_STATUS'];?>"/>
                                    </label>
                                </td>
                                <td><?php echo $ctr; ?></td>   

                                <td> 
                                 <?php
                                      if($row['VCH_DESCRIPTION']!='')
                                      {
                                     ?>
                                        <a href="#myModal<?php echo $row['INT_MSG_ID']; ?>" role="button" data-toggle="modal"><?php echo htmlspecialchars_decode($row['VCH_NAME'],ENT_QUOTES); ?></a>
                                        
                                        <div style="display:none;" class="modal fade" id="myModal<?php echo $row['INT_MSG_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                  <h4 class="modal-title" id="myModalLabel">Description</h4>
                                                </div>
                                                  <div class="modal-body" id="divContent">
                                                     <br><h5 class="modal-title" id="myModalLabel"><b>Description in English </b></h5> 
                                                    <?php echo htmlspecialchars_decode($row['VCH_DESCRIPTION'],ENT_QUOTES);?>
                                                   <?php
                                                     if($row['VCH_DESCRIPTION_O']!='')
                                                     {
                                                   ?>
                                                      <br><h5 class="modal-title" id="myModalLabel"><b>Description in Odia </b></h5> 
                                                      <span class="odia"> <?php echo $row['VCH_DESCRIPTION_O'];?> </span>
                                                    <?php
                                                     }
                                                    ?>
                                                 </div>

                                              </div>
                                            </div>
                                          </div>
                                        <?php }else{ ?>
                                        <?php echo htmlspecialchars_decode($row['VCH_NAME'],ENT_QUOTES); ?>
                                        <?php } ?>
                                
                                </td>

                                <td class="odia"> <?php  echo $row['VCH_NAME_O'];?>
                                </td> 
                                <td> <?php  echo htmlspecialchars_decode($row['VCH_DESIGNATION'],ENT_NOQUOTES);?>
                                </td> 
                                <td class="odia"> <?php  echo $row['VCH_DESIGNATION_O'];?>
                                </td> 
                                <td><?php echo htmlspecialchars_decode($row['VCH_ORG'], ENT_QUOTES); ?></td>
                                <td class="odia"><?php echo $row['VCH_ORG_O']; ?></td>
                                <td align="center" width="150">
                                    <?php if($row['VCH_IMAGE']!=''){ ?>
                                    <a href="<?php echo APP_URL ?>uploadDocuments/messageBoard/<?php echo $row['VCH_IMAGE'];?>" target="_blank" title="Info Photo"><img src="<?php echo APP_URL ?>uploadDocuments/messageBoard/<?php echo $row['VCH_IMAGE'];?>"  width="120" height="80" /></a>
                                    <?php }else echo '&nbsp;';?>
                                </td>

                                <td>
                                  <?php if($row['intInstId'] != 0) { ?>
                                   <?php echo $objMsg->getName('vchInstituteName','t_institute_details','intInstituteId',$row['intInstId'],'0'); ?>   (<?php echo $objMsg->getName('vchDistrictname','m_district','intDistrictid',$row['dist_id'],'0'); ?>)
                                <?php } else { ?>
                                   <?php echo '--'; ?>
                                <?php } ?>
                                   </td>

                                <td><?php echo date("d-M-Y",strtotime($row['DTM_CREATED_ON']))?></td>
                                <td align="center" valign="middle" class="noPrint"><a href="<?php echo APP_URL?>addMessagedtls/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['INT_MSG_ID'] ?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>
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
<script type="text/javascript">
    function setHomeMessage(msgId)
	{
            if(confirm('Are you sure to set this as Home page Message ?'))
            {
                $("#hdn_msgid").val(msgId);
		$("form").submit();
            }
            else
               return false;
	}
 </script>