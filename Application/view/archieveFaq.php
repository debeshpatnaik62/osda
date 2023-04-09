<?php
    /* ================================================
    File Name         	  : archieveFaq.php
    Description		  : This is used for view archived Faqs.
 
    Devloped On           : 1-Dec-2015
    Devloped By           : T Ketaki Debadarshini
    Update History	  : <Updated by>		<Updated On>		<Remarks>

    Style sheet           : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css
    Javscript Functions   : jquery.min.js, bootstrap.min.js, custom.js, loadcomponent.js
    includes		  : header.php, navigation.php, util.php, footer.php,archieveFaqInner.php

    ==================================================*/
    require 'archieveFaqInner.php';
?>
<script language="javascript">
	$(document).ready(function () {
		pageHeader = "Archive FAQ";
                strFirstLink = "Manage Application";
                strLastLink = "FAQ";
               loadNavigation('Archive FAQ');
                <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission==3) { ?>
		
                enableMe	= "yes";  
		printMe		= "yes";     		                
		deleteMe    = "yes";
               
               
                <?php }?>
		
		$('.showModal').click(function(){
			$('#myModal1').modal();			
		});
                $('.showModal2').click(function () {
                    $('#myModal2').modal();
                });
                if('<?php echo $outMsg;?>'!='')                
                   viewAlert('<?php echo $outMsg;?>');       
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
                    <a href="<?php echo APP_URL?>addFaq/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a>
                <?php }?>
                <a href="<?php echo APP_URL;?>viewFaq/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info ">View</a> 
                <a href="javascript:void(0);" class="btn btn-info active">Archive</a>
                <a href="<?php echo APP_URL; ?>submited-query/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Submitted Query</a>
                </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                <div class="searchTable">
                    <div class="form-group">
                        <label class="col-sm-1 control-label no-padding-right" for="txtHeadLineE">Question</label>
                        <div class="col-sm-3"> <span class="colon">:</span>
                            <input type="text" id="txtHeadLineE" name="txtHeadLineE" maxlength="250" class="form-control" value="<?php echo $strHeadlineE; ?>">
                        </div>
                   
                        <div class="col-sm-2">
                            <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                            <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>archieveFaq/<?php echo $glId . '/' . $plId; ?>' ">
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
                                <th>Question </th>    
                                <th>Question in Odia </th>  
                                <th>Created On </th>
                               
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
                            <tr <?php //echo $style;?>>
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intFaqId'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['intFaqId'];?>" name="hdnPubStatus<?php echo $row['intFaqId'];?>" value="<?php echo $row['tinPublishStatus'];?>"/>
                                    </label>
                                </td>
                                <td><?php echo $ctr; ?></td>
                                <td> <?php if($row['vchAnswerE']!=''){?>
                                    <a href="javascript:void(0);" title="Faq Details" class="showModal" onclick="getFaqDetails('<?php echo $row['intFaqId'];?>',1)"><?php echo htmlspecialchars_decode($row['vchQuestionE'],ENT_NOQUOTES);?></a>
                                    <?php }else{  echo htmlspecialchars_decode($row['vchQuestionE'],ENT_NOQUOTES);}?>
                                </td>  
                                
                                <td class="odia"> <?php if($row['vchAnswerH']!=''){?>
                                    <a href="javascript:void(0);" title="Faq Details" class="showModal" onclick="getFaqDetails('<?php echo $row['intFaqId'];?>',2)"><?php echo htmlspecialchars_decode($row['vchQuestionH'],ENT_NOQUOTES);?></a>
                                    <?php }else{  echo htmlspecialchars_decode($row['vchQuestionH'],ENT_NOQUOTES);}?>
                                </td> 
                            
                                <td><?php echo date("d-M-Y",strtotime($row['stmCreatedOn']))?></td>
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
    <?php echo $objFaq->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
        <?php echo $objFaq->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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

