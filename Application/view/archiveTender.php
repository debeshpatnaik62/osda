<?php
    /* ================================================
    File Name         : archiveTender.php
    Description		  	: This is used for archive Tender.
    Designed By		  	: Rahul Kumar saw.	
  	Designed On		  	: 14-Oct-2019
  	Devloped By       : Rahul Kumar saw
  	Devloped On       : 14-Oct-2019
    
    Javscript File    : validatorchklist.js
    includes		      : archiveTenderInner.php

    ==================================================*/
    require 'archiveTenderInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
	$(document).ready(function () {
		
    pageHeader   = "Archive Tender";
        strFirstLink = "Manage Application";
        strLastLink  = "Tender";
        deleteMe     = "<?php echo $deletePriv; ?>";
        enableMe     = "<?php echo $noActive; ?>";
        printMe      = "yes";
		$('.showModal').click(function(){
			$('#myModal1').modal();			
		});
		$('.showModal2').click(function () {
			$('#myModal2').modal();
		});
		if('<?php echo $outMsg;?>'!='')                
		   viewAlert('<?php echo $outMsg;?>');
        $('[data-rel=tooltip]').tooltip();          
	});

  //---- Function for search validation By:: Rahul Kumar Saw On::14-Oct-2019
      function srchValid()
      {
           if(!checkSpecialChar('txtHeadLineE'))
             return false;
          if(!checkSpecialChar('txtTenderno'))
            return false;
      }
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
                    <a href="<?php echo APP_URL?>addTender/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a>
                <?php }?>
                <a href="<?php echo APP_URL;?>viewTender/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>
                <a href="javascript:void(0);" class="btn btn-info active">Archive</a>
                <a href="<?php echo APP_URL;?>tenderReport/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Tender Report</a>
            </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                <div class="searchTable">
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txtTenderTitle">Tender Title</label>
                        <div class="col-sm-3"> <span class="colon">:</span>
                            <input type="text" id="txtTenderTitle" name="txtTenderTitle" class="form-control" maxlength="50" value="<?php echo $strTenderTitle; ?>">
                        </div> 
                        <!-- <label class="col-sm-2 control-label no-padding-right" for="txtStartDt">Tender Number</label>
                        <div class="col-sm-3"> <span class="colon">:</span>
                            <div class="input-group">
                                <input class="form-control" id="txtTenderno" name="txtTenderno" type="text" maxlength="50" value="<?php echo $strTenderNo; ?>">                             
                            </div>
                        </div> -->
                        <div class="col-sm-2">
                          <input class="btn btn-success" name="btnSearch" type="submit" value="Show" onclick="return srchValid();" />
                          <input type="button" name="btnClear" class="btn btn-danger" value="Clear" onclick="window.location.href='<?php echo APP_URL .'archiveTender/'. $glId .'/'. $plId; ?>'">
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
                                 
								<th>Tender Type</th>
                                <th>Title</th>
                                <th>Title in Odia</th>  
                                <th>Opening Date </th>
                                <th>Closing Date </th>
                                <th>Document </th>
                                <th>Description</th>
                                <th>Description in Odia</th>
                                <th>Reactive</th> 
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {

                            $type = $row['INT_TENDER_TYPE'];
                            $tenderDocument = $row['TenderDocument'];//!empty($row['TenderDocument'])?APP_URL.'uploadDocuments/tender/'.$row['TenderDocument']:'';
                            $document = explode(",", $tenderDocument);
                            if($type==1)
                            {
                                $tenderType ='Advertisement';
                            }
                            else
                            {
                                $tenderType ='Notice';
                            }
                            if($row['INT_PUBLISH_STATUS']==2)
                                $style	= 'class="greenBorder"';
                            else
                                $style	= 'class="yellowBorder"'; 
                                $ctr++; 
                                ?>
                            <tr <?php //echo $style;?>>
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['INT_TENDER_ID'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['INT_TENDER_ID'];?>" name="hdnPubStatus<?php echo $row['INT_TENDER_ID'];?>" value="<?php echo $row['INT_PUBLISH_STATUS'];?>"/>
                                    </label>
                                </td>
                                <td><?php echo $ctr; ?></td>
                                <td><?php echo $tenderType;?></td>
                                <td><?php echo htmlspecialchars_decode($row['VCH_TENDER_TITLE'], ENT_QUOTES); ?></td>
                                <td><?php echo htmlspecialchars_decode($row['VCH_TENDER_TITLE_O'], ENT_QUOTES); ?></td>
                                <td><?php echo date("d-M-Y, h:i A",strtotime(htmlspecialchars_decode($row['DTM_OPENING_DATETIME'],ENT_QUOTES)));?></td>
                          <td><?php echo date("d-M-Y, h:i A",strtotime(htmlspecialchars_decode($row['DTM_CLOSING_DATETIME'],ENT_QUOTES)));?></td>
                                <td>
                                    <?php 
                            foreach($document as $documName){
                            $doc  = APP_URL . 'uploadDocuments/tender/' . $documName;
                            $ext  = strtolower(pathinfo($doc, PATHINFO_EXTENSION));                     
                            ?>
                            <?php if(!empty($doc) && $ext=='pdf') { ?>
                            <a href="<?php echo $doc; ?>" target="_blank" title="<?php echo $documName; ?>"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                            <?php } elseif (!empty($doc) && $ext=='rar') {  ?>
                            <a href="<?php echo $doc; ?>" target="_blank" title="<?php echo $documName; ?>"> <i class="fa fa-file-archive-o" aria-hidden="true"></i></a>
                            <?php } elseif (!empty($doc) && $ext=='docx' || $ext=='doc') {  ?>
                            <a href="<?php echo $doc; ?>" target="_blank" title="<?php echo $documName; ?>"> <i class="fa fa-file-word-o" aria-hidden="true"></i></a>  
                            <?php } else echo '--'; ?>
                            <?php } ?>
                                </td>
                                <td> <?php echo htmlspecialchars_decode($row['VCH_DESCRIPTION_E'],ENT_QUOTES); ?></td>
                                <td> <?php echo htmlspecialchars_decode($row['VCH_DESCRIPTION_O'],ENT_QUOTES); ?></td>
                                <td align="center" valign="middle" class="noPrint" style="<?php echo $editPriv; ?>"><a href="<?php echo APP_URL?>addTender/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['INT_TENDER_ID'] ?>" data-rel="tooltip" title="" data-original-title="Reactive" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>                          
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
                  <?php echo $objTender->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                  <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                  <?php echo $objTender->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
         
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body" id="divContent">

            </div>

        </div>
    </div>
</div>

