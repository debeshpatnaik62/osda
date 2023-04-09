<?php

    require 'instituteProgramRequestInner.php';
?>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
	$(document).ready(function () {
		pageHeader = "Digitall Skilling";
                strFirstLink = "Digitall Skilling";
                strLastLink = "Institute Program Request";
               loadNavigation('Manage Digitall Skilling');

		    printMe		   = "yes";     		                
        //downloadMe   = "yes";
        //deleteMe     = "yes";

        <?php if ($msg != '' && isset($_REQUEST['btnUpdate'])) { ?>
            viewAlert('<?php echo $msg; ?>', '', '');
         <?php }  ?>
	
               
         if('<?php echo $outMsg;?>'!='')                
              viewAlert('<?php echo $outMsg;?>');

          
             
        $('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        });   


        fillApproveInstituteName('<?php echo $instituteName;?>','selInstituteName'); 
        fillProgramName('<?php echo $selProgramId;?>','selProgramName');
            
	});
        
  function programStatusData(intId,instId,programId)
    {   
        fillProgramSeatDetails(programId,instId);
        $('#proStatusId').val(intId);
        $('#programId').val(programId);
        $('#instId').val(instId);
        $('#proRejectId').val('');
        $("#seatDetails").modal();
    } 

    function validatorSeat(){
        
        if (!blankCheck('txtSeatPro', 'Please allot seat'))
            return false;

        confirmAlert("Are you sure to submit ?");
        $('#btnConfirmOk').on('click',function()
        {
          $('#hdnAction').val('U');
          $('#frmOGP').submit();
        });

        $('#btnConfirmCancel').on('click', function () {
            $("#alertModal").modal('hide');
        })
        return false;
    } 

    function programRejectData(intId,programId)
    { 
        $('#proRejectId').val(intId);
        $('#proStatusId').val('');
        $('#programId').val(programId);
        $("#callDetails").modal();
    }  
     
     function validatorCall(){
        
        if (!blankCheck('txtRemark', 'Remarks can not be left blank'))
            return false;

        confirmAlert('Are you sure to submit ?');
        $('#btnConfirmOk').on('click', function () {
            $('#hdnAction').val('R');
            $('#frmOGP').submit();
        })

        $('#btnConfirmCancel').on('click', function () {
            $("#alertModal").modal('hide');
        })
        return false;
    }     
</script>
    <div class="page-content">
        <div class="page-header">
            <h1 id="title" class="col-sm-5"></h1>
        </div>
        <div class="row no-margin">
            <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="top_tab_container">
                
                <a href="<?php echo APP_URL; ?>viewTPRegistrationRequest/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View TP Registration Request</a>
                <a href="<?php echo APP_URL; ?>viewInstituteProgram/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View Institute Registration Request</a>
                <a href="<?php echo APP_URL; ?>viewProgramRequest/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View TP Program Request</a>
                <a href="javascript:void(0);" class="btn btn-info active">Institute Program Request</a>
                
                 </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                <div class="searchTable">
                    <div class="row">                   
                    <div class="form-group">                   
                        <label class="col-sm-1 control-label no-padding-right" for="selInstituteName">Institute Name</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <select name="selInstituteName" id="selInstituteName" class="form-control">
                          <option value="">--Select--</option>
                        </select>
                    </div>

                    <label class="col-sm-1 control-label no-padding-right" for="selProgramName">Program Name</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <select name="selProgramName" id="selProgramName" class="form-control">
                          <option value="">--Select--</option>
                        </select>
                    </div>
                                        
                    <label class="col-sm-1 control-label no-padding-right" for="txtSearch">Status</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <select name="tinApproveStatus" id="tinApproveStatus" class="form-control">
                          <option value="">--Select--</option>
                          <option value="1" <?php if($tinApproveStatus==1) echo 'selected="selected"'; ?>>Approved</option>
                          <option value="2" <?php if($tinApproveStatus==2) echo 'selected="selected"'; ?>>Rejected</option>
                        </select>
                    </div>
                    
                        <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                        <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>instituteProgramRequest/<?php echo $glId . '/' . $plId; ?>' ">
                    </div>
                  </div>
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
                                <th>Institute Name</th>    
                                <th>Program Name</th>
                                <th>Seat Allotted</th>
                                <th>Program Date</th>
                                <th>Action</th> 
                                <th>Remarks</th>
                            </tr>
                        </thead>
              		<tbody>
                         <?php while ($row = mysqli_fetch_array($result)) {

                                

                                $ctr++; 
                                ?>
                            <tr>
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value=""><span class="lbl"></span>
                                    </label>
                                </td>
                                <td><?php echo $ctr;?></td>
                                <td><?php echo htmlspecialchars_decode($row['vchInsName'], ENT_QUOTES); ?> </td>
                                <td><?php echo htmlspecialchars_decode($row['programName'], ENT_QUOTES); ?> </td>
                                <td><?php echo htmlspecialchars_decode($row['intBookedSeat'], ENT_QUOTES); ?> </td>
                                 <td><?php echo date('d-M-Y', strtotime($row['dtmStartDate'])).' To '. date('d-M-Y', strtotime($row['dtmEndDate'])); ?></td>
                                
                                <td> 
                                  <?php $status = $row['tinApproveStatus']; 
                                  if($status==1){
                                    echo "Approved"; }
                                    else if($status==2) {
                                      echo "Rejected";}
                                      else {?>
                                  <div style="display: flex;"> 
                                    <input type="button" name="btnUpdate" id="btnUpdate" class="btn btn-success noPrint" value="Approve" style="margin-left:5px;" onclick="programStatusData('<?php echo $row['intId'];?>','<?php echo $row['intInsId'];?>','<?php echo $row['intProgramId'];?>')" >
                                    <input type="button" name="btnUpdate" id="btnUpdate" class="btn btn-danger noPrint" value="Reject" style="margin-left:5px;" onclick="programRejectData('<?php echo $row['intId'];?>','<?php echo $row['intProgramId'];?>')" >
                                 </div>
                                 <?php } ?>
                               </td> 
                                <td>
                                  <?php if($row['vchAppRemark']=='') {
                                   echo "--";
                                 } else {
                                  echo $row['vchAppRemark'];
                                } ?>
                              </td>                                 
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
                    <input type="hidden" name="proStatusId" id="proStatusId" value="">
                    <input type="hidden" name="proRejectId" id="proRejectId" value="">
                    <input type="hidden" name="proMarkId" id="proMarkId" value="">
                    <input type="hidden" name="instId" id="instId" value="">
                    <input type="hidden" name="programId" id="programId" value="">
               <?php } else { ?>
                    <div class="noRecord">No record found</div>
            <?php } ?>
                    
                
        </div>
           <?php if (mysqli_num_rows($result) > 0) { ?>
                <div class="row noPrint">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="sample-table-2_info">
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a>/ <?php } ?> 
                    <?php echo $objIns->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                                        </div>
                                    </div>
                    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                                        <div class="col-xs-6">
                                            <div class="dataTables_paginate paging_bootstrap">
                                                <ul class="pagination">
                        <?php echo $objIns->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
         
 
    <div class="modal fade" id="callDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title noPrint" id="myModalLabel">Institute Program Request</h4>
            </div>
            <div class="modal-body noPrint" id="divContent">
                
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right">Remarks</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <textarea class="form-control" name="txtRemark" id="txtRemark" autocomplete="off" spellcheck="false"></textarea>
                        <span class="mandatory">*</span>                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right"></label>
                    <div class="col-sm-4">
                        <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" class="btn btn-success noPrint" onclick="return validatorCall();"/>
                    </div>
                </div>

                
                 <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>  


<div class="modal fade" id="seatDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title noPrint" id="myModalLabel">Seat Availability Request</h4>
            </div>
            <div class="modal-body noPrint" id="divContent">
                <div id="viewTable">
                  <div id="divTraingDetails">
                        <div class="alert alert-info" id="seatInfo">
                        
                    </div>
                 </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right">Seat Allow</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" class="form-control" name="txtSeatPro" id="txtSeatPro" autocomplete="off">
                        <span class="mandatory">*</span>                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right"></label>
                    <div class="col-sm-4">
                        <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" class="btn btn-success noPrint" onclick="return validatorSeat();"/>
                    </div>
                </div>

                
                 <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>  