<?php

    require 'viewProgramRequestInner.php';
?>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
	$(document).ready(function () {
		pageHeader = "Digital Skilling";
                strFirstLink = "Digital Skilling";
                strLastLink = "TP Program Request";
               loadNavigation('Skill Development Program Report');

		    printMe		   = "yes";     		                
        downloadMe   = "yes";
        //deleteMe     = "yes";
        fillTPName('<?php echo $vchOrgName; ?>','intPartnerName');

        <?php if ($msg != '' && isset($_REQUEST['hdnAction'])) { ?>
            viewAlert('<?php echo $msg; ?>', '', '');
         <?php }  ?>

         <?php if ($msgRemark != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $msgRemark; ?>', '', '');
         <?php }  ?>
		
	
         if('<?php echo $outMsg;?>'!='')                
              viewAlert('<?php echo $outMsg;?>');

                 
                   
        $('.date-picker').datepicker({
              autoclose: true,
              todayHighlight: true
          });   
            
	});

    function feeModify(intId)
    { 
        fillTPFeeDetails(intId);
        $('#proStatusId').val(intId);    
         setTimeout(function(){
            var appSFee = $('#hdnappSFee').val();
            var appSQty = $('#hdnappSQty').val();
            var appTFee = $('#hdnappTFee').val();
            var appTQty = $('#hdnappTQty').val();
            var appIFee = $('#hdnappIFee').val();
            var appIQty = $('#hdnappIQty').val();
            var appStatus = $('#hdnappStatus').val();
            var appSAmount = $('#hdnappSAmount').val();
            var appTAmount = $('#hdnappTAmount').val();
            var appIAmount = $('#hdnappIAmount').val();
            var appFAmount = $('#hdnappFAmount').val();

            var SFee = $('#hdnSFee').val();
            var SQty = $('#hdnSQty').val();
            var TFee = $('#hdnTFee').val();
            var TQty = $('#hdnTQty').val();
            var IFee = $('#hdnIFee').val();
            var IQty = $('#hdnIQty').val();
            var SAmount = SFee*SQty;
            var TAmount = TFee*TQty;
            var IAmount = IFee*IQty;
            var FAmount = custom_money_format(SAmount+TAmount+IAmount);

            if(appSFee>0){
                $("#txtStudFee").val(appSFee);
                $("#spnStudFee").html(custom_money_format(appSAmount));
                $("#spnTotalFee").html(appFAmount);
            }
            else
            {
                $("#txtStudFee").val(SFee);
                $("#spnStudFee").html(custom_money_format(SAmount));
                $("#spnTotalFee").html(FAmount);
            }
            if(appSQty>0){
                $("#txtStudentQty").val(appSQty);
                
            }
            else
            {
                $("#txtStudentQty").val(SQty);
                
            }
            if(appTFee>0){
                $("#txtTrainFee").val(appTFee);
                $("#spnTrainFee").html(custom_money_format(appTAmount));
            } else{
                $("#txtTrainFee").val(TFee);
                $("#spnTrainFee").html(custom_money_format(TAmount));
            } 
            if(appTQty>0){
                $("#txtTrainQty").val(appTQty);
            }else {
                $("#txtTrainQty").val(TQty);
            }
            if(appIFee>0){
                $("#txtInsFee").val(appIFee);
                $("#spnInsFee").html(custom_money_format(appIAmount));
            }
            else
            {
                $("#txtInsFee").val(IFee);
                $("#spnInsFee").html(custom_money_format(IAmount));
            }
            if(appIQty>0){
                $("#txtInsQty").val(appIQty);
            }
            else
            {
                $("#txtInsQty").val(IQty);
            }
           
            /*if(appStatus==1)
            {
                $(".clsSubmit").hide();
            }
            else
            {
                $(".clsSubmit").show();
            }*/
        }, 300);


        $("#programFeeDetails").modal();
    }

    function studentprogramFeeCalculation()
    { 
        var stuFee     = ($('#txtStudFee').val())?$('#txtStudFee').val():0;
        var stuQty     = ($('#txtStudentQty').val())?$('#txtStudentQty').val():0;

        var trainFee   = ($('#txtTrainFee').val())?$('#txtTrainFee').val():0;
        var trainQty   = ($('#txtTrainQty').val())?$('#txtTrainQty').val():0;

        var insFee     = ($('#txtInsFee').val())?$('#txtInsFee').val():0;
        var insQty     = ($('#txtInsQty').val())?$('#txtInsQty').val():0;

        var studAmount  = (stuFee)*(stuQty);
        var trainAmount = (trainFee)*(trainQty);
        var insAmount   = (insFee)*(insQty);
        
        var totAmount   = parseInt(studAmount)+parseInt(trainAmount)+parseInt(insAmount);
        
        $("#spnStudFee").html(custom_money_format(studAmount));
        $("#spnTrainFee").html(custom_money_format(trainAmount));
        $("#spnInsFee").html(custom_money_format(insAmount));
        
        $("#spnTotalFee").html(custom_money_format(totAmount));
        //console.log(stuFee);
        //console.log(stuQty);
              
    } 
    function validatorFeeProgram(){
        
        /*if (!blankCheck('txtStudFee', 'Student Fee can not be left blank'))
         return false; 
        if (!blankCheck('txtStudentQty', 'Student Quantity can not be left blank'))
         return false;
        if (!blankCheck('txtTrainFee', 'Train Fee can not be left blank'))
         return false;
        
        if (!blankCheck('txtTrainQty', 'Train Quantity can not be left blank'))
         return false;
        
        if (!blankCheck('txtInsFee', 'Institute Fee can not be left blank'))
         return false;
       
        if (!blankCheck('txtInsQty', 'Institute Quantity can not be left blank'))
         return false;*/

        confirmAlert('Are you sure to submit ?');
        $('#btnConfirmOk').on('click', function () {
            $('#hdnAction').val('F');
            $('#frmOGP').submit();
        });

        $('#btnConfirmCancel').on('click', function () {
            $("#alertModal").modal('hide');
        });
        return false;
    }


    function programApprove(intId)
    { 
        fillTPDetails(intId);
        $('#proStatusId').val(intId);
        $('#proRejectId').val('');    
        $("#programDetails").modal();
    } 

    function programFeeCalculation()
    { 
        var tpPer      = ($('#txtProgramFee').val())?$('#txtProgramFee').val():0;
        var osdaPer    = ($('#txtOSDAFee').val())?$('#txtOSDAFee').val():0;
        var instiPer   = ($('#txtInstituteFee').val())?$('#txtInstituteFee').val():0;
        var programFee = $('#hdnProgFee').val();

        var tpAmount   = (programFee)*(tpPer/100);
        var osdaAmount = (programFee)*(osdaPer/100);
        var insAmount  = (programFee)*(instiPer/100);
        var totPer     = parseInt(tpPer)+parseInt(osdaPer)+parseInt(instiPer);
        var studentPer = 100-(totPer);
        var studentFee = programFee-(tpAmount+osdaAmount+insAmount);
        if(totPer>100)
        {
            viewAlert('Total Percentage should be 100 %');
        }
        
        $("#spnTrPatFee").html(custom_money_format(tpAmount));
        $("#spnOsdaFee").html(custom_money_format(osdaAmount));
        $("#spnInstFee").html(custom_money_format(insAmount));
        $("#spnStuFee").html(custom_money_format(studentFee));
        $("#txtStudentFee").val(studentPer);
        //console.log(studentPer);
        //console.log(studentFee);
              
    } 

    function validatorProgram(){
        
        var checkLength = $("input[name='txtCheck']:checked").length;
        if(checkLength==0)
        {
            viewAlert('Select Fee Structure');
            return false;
        }
        var feeVal = $("input[name='txtCheck']:checked").val();
        if(feeVal==2)
        {
            if (!blankCheck('txtProgramFee', 'Enter TP Percentage'))
            return false;
        }
        else if(feeVal==3)
        {
            if (!blankCheck('txtOSDAFee', 'Enter OSDA Percentage'))
            return false;
        }
        else if(feeVal==4)
        {
            if (!blankCheck('txtInstituteFee', 'Enter Institute Percentage'))
            return false;
        }

        confirmAlert('Are you sure to submit ?');
        $('#btnConfirmOk').on('click', function () {
            $('#hdnAction').val('U');
            $('#frmOGP').submit();
        });

        $('#btnConfirmCancel').on('click', function () {
            $("#alertModal").modal('hide');
        });
        return false;
    }
    function programReject(intId)
    { 
        $('#proRejectId').val(intId);
        $('#proStatusId').val('');
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
                <a href="javascript:void(0);" class="btn btn-info active">View TP Program Request</a>
                 <a href="<?php echo APP_URL; ?>instituteProgramRequest/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Institute Program Request</a></div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                <div class="searchTable">
                    <div class="row">                   
                    <div class="form-group">                             
                    <label class="col-sm-2 control-label no-padding-right" for="txtSearch">Partner Name</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <select name="intPartnerName" id="intPartnerName" class="form-control">
                          <option value="">--Select--</option>
                        </select>
                    </div>
                    <label class="col-sm-2 control-label no-padding-right" for="txtSearch">Status</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <select name="tinApproveStatus" id="tinApproveStatus" class="form-control">
                          <option value="">--Select--</option>
                          <option value="1" <?php if($tinApproveStatus==1) echo 'selected="selected"'; ?>>Approved</option>
                          <option value="2" <?php if($tinApproveStatus==2) echo 'selected="selected"'; ?>>Rejected</option>
                        </select>
                    </div>
                    
                        <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                        <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewProgramRequest/<?php echo $glId . '/' . $plId; ?>' ">
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
                                <th>Training Partner Name</th>    
                                <th>Program Name</th>
                                <th>Program Date</th>
                                <th>Program Proposal</th>
                                <th>Action</th>
                                <th>Remark</th>
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {

                                
                                $status = $row['tinApproveStatus'];
                                $ctr++; 
                                ?>
                            <tr>
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intId']; ?>"><span class="lbl"></span></label>
                                </td>
                                <td><?php echo $ctr;?></td>
                                <td><?php echo htmlspecialchars_decode($row['orgname'], ENT_QUOTES); ?></td>
                                <td><?php echo htmlspecialchars_decode($row['vchProgramName'], ENT_QUOTES); ?> </td> 
                                <td><?php echo date('d-M-Y', strtotime($row['dtmStartDate'])).' To '. date('d-M-Y', strtotime($row['dtmEndDate'])); ?></td>
                                <td><input type="button" name="btnUpdate" id="btnUpdate" class="btn btn-success noPrint" value="Verify" style="margin-left:5px;" onclick="feeModify('<?php echo $row['intId'];?>')" ></td>
                                <td> 
                                  <?php  
                                  if($status==1){
                                    echo "Approved"; }
                                    else if($status==2) {
                                      echo "Rejected";}
                                      else {?>
                                  <div style="display: flex;"> 
                                    <input type="button" name="btnUpdate" id="btnUpdate" class="btn btn-success noPrint" value="Approve" style="margin-left:5px;" onclick="programApprove('<?php echo $row['intId'];?>')" >
                                    <input type="button" name="btnUpdate" id="btnUpdate" class="btn btn-danger noPrint" value="Reject" style="margin-left:5px;" onclick="programReject('<?php echo $row['intId'];?>')" >
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
               <?php } else { ?>
                    <div class="noRecord">No record found</div>
            <?php } ?>     
                
        </div>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <div class="row noPrint">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="sample-table-2_info">
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a>/ <?php } ?> 
                    <?php echo $objTP->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                                        </div>
                                    </div>
                    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                                        <div class="col-xs-6">
                                            <div class="dataTables_paginate paging_bootstrap">
                                                <ul class="pagination">
                        <?php echo $objTP->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
                <h4 class="modal-title noPrint" id="myModalLabel">Training Partner Program Request</h4>
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


<div class="modal fade" id="programDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title noPrint" id="myModalLabel">Program Fee Structure</h4>
            </div>
            <div class="modal-body noPrint" id="divContent">
            <div id="viewTable">
              <div id="divTraingDetails">
                    <div class="alert alert-info" id="searchInfo">
                    
                </div>
             </div>
            </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right">Program Fee</label>
                    <div class="col-sm-10">
                        <span class="colon">:</span>                       
                         <div class="mb-3">
                        <input type="checkbox" id="txtTPFree" name="txtCheck" value="2">
                        <label for="txtProgramFee" class="w-139">By Training Partner (%)</label> <input type="text" id="txtProgramFee" name="txtProgramFee" maxlength="3" placeholder="Enter percentage" class="" value="" onKeyPress="return isNumberKey(event);" onkeyup="programFeeCalculation();">  <span><i class="fa fa-rupee"></i></span><span id="spnTrPatFee"> 0</span>
                          </div>
                       <div class="mb-3">
                        <input type="checkbox" id="txtOSDA" name="txtCheck" value="3">
                        <label for="txtOSDAFee" class="w-139"> By OSDA (%)</label> <input type="text" id="txtOSDAFee" name="txtOSDAFee" maxlength="3" placeholder="Enter percentage" class="" value="" onKeyPress="return isNumberKey(event);" onkeyup="programFeeCalculation();"> <span><i class="fa fa-rupee"></i></span><span id="spnOsdaFee"> 0</span>
                          </div>
                          <div class="mb-3">
                        <input type="checkbox" id="txtInstitute" name="txtCheck" value="4">
                        <label for="txtInstituteFee" class="w-139"> By Institute (%)</label> <input type="text" id="txtInstituteFee" name="txtInstituteFee" maxlength="3" placeholder="Enter percentage" class="" value="" onKeyPress="return isNumberKey(event);" onkeyup="programFeeCalculation();"> <span><i class="fa fa-rupee"></i></span><span id="spnInstFee"> 0</span> 
                        </div>
                        <div class="mb-3">
                        <input type="checkbox" id="txtTPFree" name="txtCheck" value="5" disabled>
                        <label for="txtStudentFee" class="w-139"> By Student (%)</label> <input type="text" id="txtStudentFee" name="txtStudentFee" maxlength="3" placeholder="Percentage" class="" value="" readonly> <span><i class="fa fa-rupee"></i></span><span id="spnStuFee"> 0</span>
                        </div>

                </div>
              </div> 

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right"></label>
                    <div class="col-sm-4">
                        <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" class="btn btn-success noPrint" onclick="return validatorProgram();"/>
                    </div>
                </div>

                
                 <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div> 

<div class="modal fade" id="programFeeDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title noPrint" id="myModalLabel">Program Fee Structure</h4>
            </div>
            <div class="modal-body noPrint" id="divContent">
            <div id="viewTable">
              <div id="divTraingDetails">
                    <div class="" id="searchFeeInfo">
                    
                </div>
             </div>
            </div>
              <div class="row form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="txtSFee">Student Fee</label>
                    <div class="col-sm-3">
                        <span class="colon">:</span>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="input-group-text">
                                    <i class="fa fa-rupee"></i>
                                </span>
                            </div>
                            <input type="text" id="txtStudFee" name="txtStudFee" maxlength="6" placeholder="Amount per candidate"
                                class="form-control" value="" onKeyPress="return isNumberKey(event);"
                                onkeyup="studentprogramFeeCalculation();">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" id="txtStudentQty" name="txtStudentQty" maxlength="6" placeholder="No. of candidate"
                            class="form-control" value="" onKeyPress="return isNumberKey(event);"
                            onkeyup="studentprogramFeeCalculation();">   
                    </div>
                    <div class="col-sm-3">
                        <span><i class="fa fa-rupee"></i></span>
                        <span id="spnStudFee">0</span></span>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="txtTFee">Train Of Trainers Fee </label>
                    <div class="col-sm-3">
                        <span class="colon">:</span>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="input-group-text">
                                    <i class="fa fa-rupee"></i>
                                </span>
                            </div>
                            <input type="text" id="txtTrainFee" name="txtTrainFee" maxlength="6" placeholder="Amount per tot"
                                class="form-control" value="" onKeyPress="return isNumberKey(event);"
                                onkeyup="studentprogramFeeCalculation();">
                        </div>

                        <!-- <span class="mandatory">*</span> -->
                    </div>
                    <div class="col-sm-3">
                        <input type="text" id="txtTrainQty" name="txtTrainQty" maxlength="6" placeholder="No. of tot"
                            class="form-control" value="" onKeyPress="return isNumberKey(event);"
                            onkeyup="studentprogramFeeCalculation();"> 
                    </div>
                    <div class="col-sm-3">
                        <span><i class="fa fa-rupee"></i></span>
                        <span id="spnTrainFee">0</span></span>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="txtIFee">Institute Fee </label>
                    <div class="col-sm-3">
                        <span class="colon">:</span>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="input-group-text">
                                    <i class="fa fa-rupee"></i>
                                </span>
                            </div>
                            <input type="text" id="txtInsFee" name="txtInsFee" maxlength="6" placeholder="Amount per institute"
                                class="form-control" value="" onKeyPress="return isNumberKey(event);"
                                onkeyup="studentprogramFeeCalculation();">
                        </div>


                    </div>
                    <div class="col-sm-3">
                        <input type="text" id="txtInsQty" name="txtInsQty" maxlength="6" placeholder="No. of institute"
                            class="form-control" value="" onKeyPress="return isNumberKey(event);"
                            onkeyup="studentprogramFeeCalculation();">
                       
                    </div>
                    <div class="col-sm-3">
                        <span><i class="fa fa-rupee"></i></span>
                        <span id="spnInsFee">0</span></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-9 control-label" style="text-align: right !important;" for="txtEndDate">Final Amount</label>
                    <div class="col-sm-3">
                       <strong>
                            <span class="colon">:</span>
                            <span style="display: block;padding-top: 7px;"><span><i class="fa fa-rupee"></i></span> <span id="spnTotalFee"> 0</span></span>
                     </strong>
                    </div>
                </div>

                <div class="form-group row clsSubmit">
                    <label class="col-sm-3 control-label no-padding-right"></label>
                    <div class="col-sm-4">
                        <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" class="btn btn-success noPrint"
                            onclick="return validatorFeeProgram();" />
                    </div>
                </div>

                
                 <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>  

 <style type="text/css">
     .mb-3{margin-bottom: 1rem;}
     .w-139{width: 33%;}
 </style>