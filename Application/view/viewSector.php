<?php
    /* ================================================
    File Name         	  : viewSector.php
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
    require 'viewSectorInner.php';
?>

<script src="<?php echo APP_URL; ?>js/loadAjax.js"></script>

<script language="javascript">
    $(document).ready(function () {

            pageHeader = "View Sector";
            strFirstLink = "Manage Application";
            strLastLink  = " Manage Sector"; 

            loadNavigation('View Sector');

            <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission==3) { ?>
             deleteMe     = "yes";
             <?php }?>
             printMe		= "yes";
             <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission!=1) { ?>		                
             inactiveMe     = "yes";
             activeMe       = "yes";
             
            showHome        = "yes";
            hideHome        = "yes"

            <?php }?>

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
                    <a href="<?php echo APP_URL?>addSector/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a>
                <?php }?>
                <a href="javascript:void(0);" class="btn btn-info active">View</a> 
            </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>

                <div class="searchTable">
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txtName"> Sector Name</label>
                        <div class="col-sm-3"> <span class="colon">:</span> 
                        <input type="text" class="form-control" maxlength="80" name="txtName" id="txtName" value="<?php echo $strName; ?>"/>
                    </div>  

                    <div class="col-sm-2">
                      <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                      <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewSector/<?php echo $glId . '/' . $plId; ?>' ">
                    </div>

                    </div>
                </div>
                
                <div class="legandBox">			
                    <span class="greenLegend">&nbsp;</span>Active Sector(s)&nbsp;			
                    <span class="yellowLegend">&nbsp;</span>Inactive Sector(s) &nbsp;
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
                                <th>Sector</th>                            
                                <th>Sector in Odia</th> 
                                <th>Sector Alias</th>           
                                <th>Image</th>
                                <th>Description</th> 
                                <th>Description in Odia</th> 
                                 <th>Show at Home </th>
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
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intSectorId'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['intSectorId'];?>" name="hdnPubStatus<?php echo $row['intSectorId'];?>" value="<?php echo $row['tinPublishStatus'];?>"/>
                                    </label>
                                </td>
                                <td><?php echo $ctr; ?></td>
                                <td> <?php  echo htmlspecialchars_decode($row['vchSecotrName'],ENT_QUOTES);?></td> 
                                <td class="odia"> <?php  echo $row['vchSecotrNameO'];?> </td> 
                                <td> <?php  echo htmlspecialchars_decode($row['vchSecotrAlias'],ENT_QUOTES);?></td> 
                                <td align="center" width="150">
                                    <?php if($row['vchImage']!=''){ ?>
                                    <a href="<?php echo APP_URL ?>uploadDocuments/sector/<?php echo $row['vchImage'];?>" target="_blank" title="sector Photo"><img src="<?php echo APP_URL ?>uploadDocuments/sector/<?php echo $row['vchImage'];?>"  width="120" height="80" /></a>
                                    <?php }else echo '&nbsp;';?>
                                </td>
                                
                                <td>
                                    <?php
                                        $strMessage= htmlspecialchars_decode($row['vchDescription'],ENT_QUOTES);
                                        if($strMessage!=''){
                                            $shortmsg = $objSector->wardWrap($strMessage, 250);
                                            echo $shortmsg ;
                                        }
                                   ?>
                                  
                                </td>
                                <td class="odia">
                                    <?php
                                        $strMessageO= $row['vchDescriptionO'];
                                        if($strMessageO!=''){
                                            $shortmsgO = $objSector->wardWrap($strMessageO, 350);
                                            echo $shortmsgO ;
                                        }
                                   ?>
                                  
                                </td>
                                <td align="center" width="70" >
                                    <?php 
                                    if($row['intShowHome']==1){?>
                                    <i class="icon-ok" title="Show on Home page"></i>		
                                    <?php } else
                                    echo '&nbsp;';
                                    ?>
                                </td>
                                <td><?php echo date("d-M-Y",strtotime($row['stmCreatedOn']))?></td>
                                <td align="center" valign="middle" class="noPrint"><a href="<?php echo APP_URL?>addSector/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intSectorId'] ?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>
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
                            <?php echo $objSector->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                            <?php echo $objSector->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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