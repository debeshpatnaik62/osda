<?php
    /* ================================================
    File Name         	  : viewDistrict.php
    Description		  : This is used for view district details.
    Author Name           : T Ketaki Debadarshini
    Date Created          : 
    Devloped On           : 21-Sept-2016
    Devloped By           : T Ketaki Debadarshini
    Update History	  : <Updated by>		<Updated On>		<Remarks>

    Style sheet           : 
    Javscript Functions   : 
    includes		  : util.php, viewDistrictInner.php

    ==================================================*/
    require 'viewDistrictInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
	$(document).ready(function () {
            loadNavigation('View District');
            pageHeader      = "View District";
            strFirstLink    = "Manage Master";
            strLastLink     = "District";
            
            deleteMe        = "yes";          
            printMe         = "yes";            
		
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
                <?php  if ($noAdd != '1') { ?>
                    <a href="<?php echo APP_URL?>addDistrict/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a>
                <?php }?>
                <a href="javascript:void(0);" class="btn btn-info active">View</a> </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                 
               
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
                                <th>District </th>   
                                <th>District in Odia</th>    
                                <th>Description</th>  
                                <th>Description in Odia</th>  
                                <th>Created On </th>
                                <th width="30" class="noPrint" style="<?php echo $editPriv; ?>">Edit</th>
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {
                           
                                $ctr++; 
                                ?>
                            <tr>
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intDistrictid'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['intDistrictid'];?>" name="hdnPubStatus<?php echo $row['intDistrictid'];?>" value=""/>
                                    </label>
                                </td>
                                <td><?php echo $ctr; ?></td>
                                <td> <?php  echo htmlspecialchars_decode($row['vchDistrictname'],ENT_NOQUOTES);?> </td>                            
                                <td class="odia"> <?php  echo $row['vchDistrictnameO'];?> </td>  
                                <td> <?php  echo htmlspecialchars_decode($row['vchDescription'],ENT_NOQUOTES);?> </td>                            
                                <td class="odia"> <?php  echo $row['vchDescriptionO'];?> </td>  
                                
                                <td><?php echo date("d-M-Y",strtotime($row['stmCreatedOn']))?></td>
                                <td align="center" valign="middle" class="noPrint" style="<?php echo $editPriv; ?>"><a href="<?php echo APP_URL?>addDistrict/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intDistrictid'] ?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>
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
    <?php echo $objDist->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
        <?php echo $objDist->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
         

