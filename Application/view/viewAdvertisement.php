<?php
 /* ================================================
	  File Name         	  : viewAdvertisement.php
	  Description	          : This is used for view skill competiton details
	  Author Name	          : T Ketaki Debadarshini
	  Date Created		  : 24-Jan-2018 
	  Devloped By		  : T Ketaki Debadarshini
	  Devloped On		  : 24-Jan-2018 
	  Update History		  :
	  <Updated by>		<Updated On>		<Remarks>
	 *       
	  Style sheet             : 
	  Javscript Functions     : 
	  includes                : viewAdvertisementInner.php
  ================================================== */
    include_once('viewAdvertisementInner.php');
?>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script language="javascript">
    $(document).ready(function () {
        loadNavigation('View Advertisement Details');
        pageHeader   = "View Advertisement";
        strFirstLink = "Manage Advertisement";
        strLastLink  = "Mobile Advertisement";
       
        deleteMe     = "yes";
        printMe      = "yes";
        
      
        if('<?php echo $outMsg;?>'!='')                
	        viewAlert('<?php echo $outMsg;?>');
         

        $('.date-picker').datepicker({
                autoclose: true,
                todayHighlight: true
            });
            
      
      
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
                    <a href="<?php echo APP_URL?>addAdvertisement/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a>
                <?php }?> 
                <a href="javascript:void(0);" class="btn btn-info active">View</a>           
                
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
        


            <div id="viewTable">
                <?php if ($result->num_rows > 0) {
                    $ctr = $intRecno;
                    ?>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="20" class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkAll"><span class="lbl"></span></label>
                                </th>
                                <th width="20">Sl.#</th>
                                <th>Advt. Type </th> 
                                <th>From Date</th> 
                                <th>To Date</th>  
                                <th>Duration (in seconds)</th>  
                                <th>Uploaded File </th> 
                                <th>Link </th> 
                                <th>Created On </th>
                                <th width="30" class="noPrint" style="<?php echo $editPriv; ?>">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             $imgfolderPath          = APP_URL."uploadDocuments/mobAds/image/";
                            $vidfolderPath          = APP_URL."uploadDocuments/mobAds/video/";
                           while ($row = $result->fetch_array()) {
                            //print_r($row);exit;
                                $ctr ++;
                                ?>
                                <tr>
                                    <td class="noPrint">
                                        <label class="position-relative">
                                            <input type="checkbox" class="ace chkItem" value="<?php echo $row['intAdvertisementId']; ?>"><span class="lbl"></span></label>
                                    </td>
                                    <td><?php echo $ctr; ?></td>

                                    <td>
                                        
                                       <?php echo ($row['tinType']==1)?'Image':'Video'; ?>
                                      </div>
                                      
                                       
                                    </td>
                                    <td > <?php echo date('d-M-Y',  strtotime($row['dtmFromDate'])); ?></td>
                                    <td > <?php echo date('d-M-Y',  strtotime($row['dtmToDate']));; ?></td>
                                    <td > <?php echo htmlspecialchars_decode($row['vchDuration'], ENT_QUOTES); ?>

                                    <td > <?php

                                    $strUploadFilePath =  ($row['tinType']==1)?$imgfolderPath.htmlspecialchars_decode($row['vchUploadFile'],ENT_QUOTES):$vidfolderPath.htmlspecialchars_decode($row['vchUploadFile'],ENT_QUOTES); 
                                    if($row['tinType']==1){
                                    ?>
                                        <a href="<?php echo $strUploadFilePath; ?>" title="Image"  target="_blank"><img src="<?php echo $strUploadFilePath; ?>" class="img-polaroid " height="100px" width="100px"></a>

                                    <?php }else{ ?>
                                          <a href="<?php echo $strUploadFilePath; ?>" title="Video"  target="_blank"><i class="fa fa-2x fa-video-camera"></i></a>
                                    <?php } ?>
                                    </td>
                                 
                                    <td><?php echo htmlspecialchars_decode($row['vchPagelink'], ENT_QUOTES); ?></td>
                                    
                                    <td><?php echo date('d-M-Y', strtotime($row['stmCreatedOn'])); ?></td>
                                     <td align="center" valign="middle" class="noPrint" style="<?php echo $editPriv; ?>"><a href="<?php echo APP_URL?>addAdvertisement/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intAdvertisementId'] ?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>
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
                                    <?php echo $objAdvt->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                        <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                                    <?php echo $objAdvt->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
 
 