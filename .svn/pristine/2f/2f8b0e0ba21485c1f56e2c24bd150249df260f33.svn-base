<?php
    /* ================================================
    File Name         : tenderReport.php
    Description		  	: This is used for Tender Report.
    Designed By		  	: Rahul Kumar saw.	
  	Designed On		  	: 1-FEB-2022
  	Devloped By       : Rahul Kumar saw
  	Devloped On       : 1-FEB-2022
    
    Javscript File    : validatorchklist.js
    includes		      : tenderReportInner.php

    ==================================================*/
    require 'tenderReportInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script language="javascript">
	$(document).ready(function () {
		
        pageHeader   = "Tender Report";
        strFirstLink = "Manage Application";
        strLastLink  = "Tender";
        downloadMe       = "yes";
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
        $('.date-picker').datepicker({
                autoclose: true,
                todayHighlight: true
            });         
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
                <a href="<?php echo APP_URL;?>archiveTender/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Archive</a>
                <a href="javascript:void(0);" class="btn btn-info active">Tender Report</a>
            </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                <div class="searchTable">
                    <div class="form-group">
                         <label class="col-sm-2 control-label no-padding-right" for="txtTenderType">Tender Type</label>
                         <div class="col-sm-2"><span class="colon">:</span>
                           <select class="form-control" name="intTenderType" id="intTenderType" >
                                        <option value="0" <?php if($intTenderType==0) echo 'selected="selected"'; ?>>- Select -</option>
                                        <option value="1" <?php if($intTenderType==1) echo 'selected="selected"'; ?>> Advertisement </option>
                                        <option value="2" <?php if($intTenderType==2) echo 'selected="selected"'; ?>> Notice </option>
                                        <option value="3" <?php if($intTenderType==3) echo 'selected="selected"'; ?>> ERP </option>
                                        <option value="4" <?php if($intTenderType==4) echo 'selected="selected"'; ?>> EOI </option>
                          </select>
                         </div>
                         <label class="col-sm-1 control-label no-padding-right" for="txtStartDt">Date From</label>
                        <div class="col-sm-2"> <span class="colon">:</span>
                            <div class="input-group">
                                <input class="form-control date-picker" id="txtStartDt" name="txtStartDt" type="text" data-date-format="dd-mm-yyyy" value="<?php echo ($strStartDt!=BLANK_DATE)?date('d-m-Y',strtotime($strStartDt)):''; ?>">
                                 <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 
                            </div>
                       </div>

                    <label class="col-sm-1 control-label no-padding-right" for="txtEndDt">Date To</label>
                       <div class="col-sm-2"> <span class="colon">:</span>
                           <div class="input-group">
                               <input class="form-control date-picker" id="txtEndDt" name="txtEndDt" type="text" data-date-format="dd-mm-yyyy" value="<?php echo ($strEndDate!=BLANK_DATE)?date('d-m-Y',strtotime($strEndDate)):''; ?>">
                                <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 
                           </div>
                       </div>
                        <div class="col-sm-2">
                          <input class="btn btn-success" name="btnSearch" type="submit" value="Show" onclick="return srchValid();" />
                          <input type="button" name="btnClear" class="btn btn-danger" value="Clear" onclick="window.location.href='<?php echo APP_URL .'tenderReport/'. $glId .'/'. $plId; ?>'">
                        </div>
						        </div>
                </div>
                <div id="viewTable">
				
                <?php if (mysqli_num_rows($result) > 0) {
                    $ctr = $intRecno; ?>
                    <table class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="20">Sl.#</th>
                                 
								<th>Tender Type</th>
                                <th>Title</th>
                                <th>Title in Odia</th>  
                                <th>Opening Date </th>
                                <th>Closing Date </th>
                                <th class="noPrint">Document </th>
                                <th>Created By</th>
                                <th>Updated By</th> 
                                <th>Updated On</th>
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
                            else if($type==2)
                            {
                                $tenderType ='Notice';
                            } else if($type==3)
                            {
                                $tenderType ='ERP';
                            } else if($type==4)
                            {
                                $tenderType ='EOI';
                            }
                            
                             
                                $ctr++; 
                                ?>
                            <tr>
                               
                                <td><?php echo $ctr; ?></td>
                                <td><?php echo $tenderType;?></td>
                                <td><?php echo htmlspecialchars_decode($row['VCH_TENDER_TITLE'], ENT_QUOTES); ?></td>
                                <td><?php echo htmlspecialchars_decode($row['VCH_TENDER_TITLE_O'], ENT_QUOTES); ?></td>
                                <td><?php echo date("d-M-Y, h:i A",strtotime(htmlspecialchars_decode($row['DTM_OPENING_DATETIME'],ENT_QUOTES)));?></td>
                          <td><?php echo date("d-M-Y, h:i A",strtotime(htmlspecialchars_decode($row['DTM_CLOSING_DATETIME'],ENT_QUOTES)));?></td>
                                <td class="noPrint">
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
                                
                                <td><?php echo $row['createdBy']; ?></td> 
                                <td><?php echo $row['updatedBy']; ?></td> 
                                <td><?php echo date("d-M-Y",strtotime(htmlspecialchars_decode($row['DTM_CREATED_ON'],ENT_QUOTES)));?></td>                         
                    </tr>
                        <?php } ?>
                         </tbody>
                    </table>
                    <input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno; ?>" />
                    <input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno; ?>" />
                    <input name="hdn_IsPaging" id="hdn_IsPaging" type="hidden" value="<?php echo $isPaging; ?>" />
                    <input name="hdn_ids" id="hdn_ids" type="hidden" />
                    <input name="hdn_qs" id="hdn_qs" type="hidden" />
                    <input name="hdnAction" id="hdnAction" type="hidden" />
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

