<?php
    /* ================================================
    File Name         : viewQuestion.php
    Description		  	: This is used for view Question.
    Designed By		  	: Rahul Kumar saw.	
  	Designed On		  	: 26-AUG-2021
  	Devloped By       : Rahul Kumar saw
  	Devloped On       : 26-AUG-2021
    
    Javscript File    : validatorchklist.js
    includes		      : viewQuestionInner.php

    ==================================================*/
    require 'viewQuestionInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
	$(document).ready(function () {
		
    pageHeader 		= "View Question";
    strFirstLink 	= "Manage Skill Competition";
    strLastLink 	= "Question";
    //archiveMe		= "<?php echo $deletePriv;?>";
    printMe			= "yes"; 
    deleteMe        = "yes";               
    //publishMe       = "<?php echo $noPublish;?>";
    //unpublishMe     = "<?php echo $noPublish;?>";

    fillIndiaSkill('<?php echo $intSkillId;?>','selSkill');
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
                    <a href="<?php echo APP_URL?>addQuestion/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a>
                <?php }?>
                <a href="javascript:void(0);" class="btn btn-info active">View</a>
            </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                <div class="searchTable">
                <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txtTenderTitle">Select Skill</label>
                        <div class="col-sm-3"> <span class="colon">:</span>
                           <select class="form-control" name="selSkill" id="selSkill" >
                            <option value="0">- Select -</option>
                            </select>
                        </div> 
                        <div class="col-sm-2">
                          <input class="btn btn-success" name="btnSearch" type="submit" value="Show" />
                          <input type="button" name="btnClear" class="btn btn-danger" value="Clear" onclick="window.location.href='<?php echo APP_URL .'viewQuestion/'. $glId .'/'. $plId; ?>'">
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
                                 
								<th>Skill Name</th>
                                <th>Question</th> 
                                <th>Created On</th> 
                                <!-- <th width="30" class="noPrint" style="<?php echo $editPriv; ?>">Edit</th> -->
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {

                            /*if($row['INT_PUBLISH_STATUS']==2)
                                $style	= 'class="greenBorder"';
                            else
                                $style	= 'class="yellowBorder"'; */
                                $ctr++; 
                                ?>
                            <tr>
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intQuesId'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['intQuesId'];?>" name="hdnPubStatus<?php echo $row['intQuesId'];?>" value="<?php echo $row['INT_PUBLISH_STATUS'];?>"/>
                                    </label>
                                </td>
                                <td><?php echo $ctr; ?></td>
                                <td><?php echo $row['skillName'];?></td>
                                <td><?php echo htmlspecialchars_decode($row['vchQuestion'], ENT_QUOTES); ?></td>
                                <td><?php echo date("d-M-Y",strtotime($row['stmCreatedOn']));?></td>                          
                        
                       <!--  <td align="center" valign="middle" class="noPrint" style="<?php echo $editPriv; ?>"><a href="<?php echo APP_URL?>addQuestion/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['INT_Question_ID'] ?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td> -->
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
                  <?php echo $objQuestion->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                  <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                  <?php echo $objQuestion->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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

