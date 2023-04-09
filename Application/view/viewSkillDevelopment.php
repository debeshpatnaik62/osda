<?php

    require 'viewSkillDevelopmentInner.php';
?>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
	$(document).ready(function () {
		pageHeader = "Skill Development Program Report";
                strFirstLink = "Manage Reports";
                strLastLink = "Skill Development Program";
               loadNavigation('Skill Development Program Report');

		printMe		= "yes";     		                
        downloadMe    = "yes";
        deleteMe = "yes";
		
		$('.showModal').click(function(){
			$('#myModal1').modal();			
		});
                $('.showModal2').click(function () {
                    $('#myModal2').modal();
                });
               if('<?php echo $outMsg;?>'!='')                
                    viewAlert('<?php echo $outMsg;?>');

                <?php if ($redirectPage != '') { ?>
                 $('#alertModal').on('hidden.bs.modal', function () {
                     window.location.href = '<?php echo $redirectPage; ?>';
                 });
                 <?php } ?>
                   
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
        <div class="row no-margin">
            <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="top_tab_container">
               
                
                <a href="<?php echo APP_URL; ?>viewSapReport/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">SAP ERP</a>
                <a href="javascript:void(0);" class="btn btn-info active">Coursera</a>
                
                 </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                <div class="searchTable">
                    <div class="form-group">                   
                       
                    <label class="col-sm-2 control-label no-padding-right" for="txtEndDt">Date To</label>
                       <div class="col-sm-2"> <span class="colon">:</span>
                           <div class="input-group">
                               <input class="form-control date-picker" id="txtEndDt" name="txtEndDt" type="text" data-date-format="dd-mm-yyyy" value="<?php echo ($strEndDate!='0000-00-00')?date('d-m-Y',strtotime($strEndDate)):''; ?>">
                                <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 
                           </div>
                       </div>
                           
                    <label class="col-sm-2 control-label no-padding-right" for="txtStartDt">Date From</label>
                        <div class="col-sm-2"> <span class="colon">:</span>
                            <div class="input-group">
                                <input class="form-control date-picker" id="txtStartDt" name="txtStartDt" type="text" data-date-format="dd-mm-yyyy" value="<?php echo ($strStartDt!='0000-00-00')?date('d-m-Y',strtotime($strStartDt)):''; ?>">
                                 <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 
                            </div>
                       </div>
                     </div>
                     <div class="form-group">  

                    <label class="col-sm-2 control-label no-padding-right" for="txtSearch">Registration Number</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <input type="text" class="form-control" maxlength="100" name="txtRegdNumber" id="txtRegdNumber" value="<?php echo $strNumber; ?>"/>
                    </div> 
                    <!-- <label class="col-sm-2 control-label no-padding-right" for="selSkill">Course Type</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <select class="form-control" name="coursera" id="coursera" >
                                <option value="Coursera" selected>Coursera </option>
                                
                        </select>        
                    </div>  --> 
    
                   
                        <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                        <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewSkillDevelopment/<?php echo $glId . '/' . $plId; ?>' ">
                    </div>
                </div>
                    </div>
                </div>
                <!-- <div class="legandBox">			
                    <span class="greenLegend">&nbsp;</span>Published Skill Program(s)&nbsp;			
                    <span class="yellowLegend">&nbsp;</span> Unpublished Skill Program(s) &nbsp;
                </div> -->
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
                                <th>Applicant Name</th>    
                                <th>Registration Number</th>
                                <th>Course Type</th> 
                                <th>Skill</th> 
                                <th>Document Type</th>
                                <th>Document Number</th>
                                <th>Address</th>
                                <th>Registered On</th>


                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {
                            
                            
                                $ctr++; 
                                ?>
                            <tr>
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intId'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['intId'];?>" name="hdnPubStatus<?php echo $row['intId'];?>" value="<?php echo $row['tinPublishStatus'];?>"/>
                                    </label>
                                </td>
                                <td><?php echo $ctr; ?></td>
                                <td>
                                <div class="media-body pull-left"> 
                                                
                                        <h4><?php echo htmlspecialchars_decode($row['vchName'], ENT_QUOTES); ?></h4>
                                            
                                        <small class="text-muted"><i class="fa fa-envelope"></i> <?php echo htmlspecialchars_decode($row['vchEmail'],ENT_QUOTES); ?></small> 
                                      </div>

                                 <td> <?php  echo htmlspecialchars_decode($row['vchRegdNumber'],ENT_NOQUOTES);?> </td> 
                                  <td> <?php  echo htmlspecialchars_decode($row['vchCourseType'],ENT_NOQUOTES);?> </td>
                               <td> <?php  echo htmlspecialchars_decode($row['vchSkill'],ENT_NOQUOTES);?> </td>

                               <td> <?php  echo htmlspecialchars_decode($row['vchDocumentType'],ENT_NOQUOTES);?> </td> 
                                  <td> <?php  echo htmlspecialchars_decode($row['vchDocumentNumber'],ENT_NOQUOTES);?> </td>
                               <td> <?php  echo htmlspecialchars_decode($row['vchAddress'],ENT_NOQUOTES);?> </td>

                                <td><?php echo date('d-M-Y', strtotime($row['stmCreatedOn'])); ?></td>
                                
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
    <?php echo $objDevelop->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
        <?php echo $objDevelop->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
                <h4 class="modal-Name" id="myModalLabel"></h4>
            </div>
            <div class="modal-body" id="divContent">

            </div>

        </div>
    </div>
</div>

