<?php
/* ================================================
  File Name                 : addTrainingPartnerRegistration.php
  Description               : This is used for Manage Program details.
  Designed By               :
  Designed On               :
  Developed By              : Rahul Kumar Saw
  Developed On              : 25-Nov-2021
  Update History            : <Updated by>    <Updated On>    <Remarks>

  Style sheet               : 
  Javscript Functions       :  validatorchklist.js
  includes                  :  util.php,addTrainingPartnerRegistrationInner.php       :

  ================================================== */
    require("addTrainingPartnerRegistrationInner.php");
?>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script language="javascript">
    $(document).ready(function () {
        
        pageHeader   = "Add Program";
        strFirstLink = "Manage Skill Development";
        strLastLink  = "Manage Program";
        loadNavigation('Add Program');
        $('#ddlTP').focus();
        fillTPName('<?php echo $tpId;?>','ddlTP');
        indicate = 'yes';
        var dateToday = new Date();
        $('.date-picker').datepicker({
              autoclose: true,
              todayHighlight: true,
              startDate: dateToday
          });
        
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php 
            } 
        ?>   
        studentprogramFeeCalculation();   
   });
   
    function validateRegdTP()
    {         
            if (!blankCheck('txtProgram', 'Program name can not be left blank'))
             return false;
            if (!checkSpecialChar('txtProgram'))
            return false;
         
            if (!blankCheck('txtStartDate', 'Program start date can not be left blank'))
             return false;
            if (!checkSpecialChar('txtStartDate'))
            return false;
            if (!blankCheck('txtEndDate', 'Program end date can not be left blank'))
             return false;
            if (!checkSpecialChar('txtEndDate'))
            return false;  
            if ($('input[name=rdoOpen]:checked').length <= 0) {

                viewAlert('Please select program open for all', 'rnd1', '');
                return false;
            }  
            if (!blankCheck('txtStudentFee', 'Student Fee can not be left blank'))
             return false;
            if (!checkSpecialChar('txtStudentFee'))
            return false; 
            if (!blankCheck('txtStudentQty', 'Student Quantity can not be left blank'))
             return false;
            if (!checkSpecialChar('txtStudentQty'))
            return false; 
            if (!blankCheck('txtTrainFee', 'Train Fee can not be left blank'))
             return false;
            if (!checkSpecialChar('txtTrainFee'))
            return false; 
            if (!blankCheck('txtTrainQty', 'Train Quantity can not be left blank'))
             return false;
            if (!checkSpecialChar('txtTrainQty'))
            return false; 
            if (!blankCheck('txtInstituteFee', 'Institute Fee can not be left blank'))
             return false;
            if (!checkSpecialChar('txtInstituteFee'))
            return false; 
            if (!blankCheck('txtInsQty', 'Institute Quantity can not be left blank'))
             return false;
            if (!checkSpecialChar('txtInsQty'))
            return false;  
    }

    function studentprogramFeeCalculation()
    { 
        var stuFee     = ($('#txtStudentFee').val())?$('#txtStudentFee').val():0;
        var stuQty     = ($('#txtStudentQty').val())?$('#txtStudentQty').val():0;

        var trainFee   = ($('#txtTrainFee').val())?$('#txtTrainFee').val():0;
        var trainQty   = ($('#txtTrainQty').val())?$('#txtTrainQty').val():0;

        var insFee     = ($('#txtInstituteFee').val())?$('#txtInstituteFee').val():0;
        var insQty     = ($('#txtInsQty').val())?$('#txtInsQty').val():0;

        var studAmount  = (stuFee)*(stuQty);
        var trainAmount = (trainFee)*(trainQty);
        var insAmount   = (insFee)*(insQty);
        
        var totAmount   = parseInt(studAmount)+parseInt(trainAmount)+parseInt(insAmount);
        
        $("#spnStudFee").html(custom_money_format(studAmount));
        $("#spnTrainFee").html(custom_money_format(trainAmount));
        $("#spnInsFee").html(custom_money_format(insAmount));
        
        $("#spnTotalFee").html(custom_money_format(totAmount));
        //console.log(totAmount);
        //console.log(trainAmount);
              
    } 

</script>

<div class="page-content">
    <div class="page-header">
        <h1 id="title"></h1>
    </div>
    <div class="row">
        <div class="col-xs-12"> 
            <!-- PAGE CONTENT BEGINS -->
            <div class="top_tab_container"> 
                <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab; ?></a> 
                <a href="<?php echo APP_URL; ?>viewTrainingProgram/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View Program</a>
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="col-xs-12">
                <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtProgram">Training Partner Name </label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <?php  if($privilege>2 || $id>0){ $display='disabled';}?>
                        <select class="form-control" name="ddlTP" id="ddlTP" <?php echo $display;?>>
                        <option value="0">--Select-- </option>
                     </select>
                  <span class="mandatory">*</span>
                </div>
              </div>  

               <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtProgram">Program Name </label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="text" id="txtProgram" name="txtProgram" maxlength="200" placeholder="" class="form-control" value="<?php echo $strProgram; ?>">
                  <span class="mandatory">*</span>
                </div>
              </div>          

              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtStartDate">Start Date </label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <div class="input-group date">
                         <input type="text" class="form-control date-picker clsStartDate" data-date-format="dd-mm-yyyy" id="txtStartDate" name="txtStartDate" value="<?php echo ($startDate != '') ? date('d-m-Y', strtotime($startDate)) : ''; ?>" maxlength="15" autocomplete="off">
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span><span class="mandatory">*</span>
                     </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtEndDate">End Date </label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <div class="input-group date">
                         <input type="text" class="form-control date-picker clsEndDate" data-date-format="dd-mm-yyyy" id="txtEndDate" name="txtEndDate" value="<?php echo ($endDate != '') ? date('d-m-Y', strtotime($endDate)) : ''; ?>" maxlength="15" autocomplete="off">
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span><span class="mandatory">*</span>
                     </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtEndDate">Program Open For All</label>
                  <div class="col-sm-6" >
                      <span class="colon">:</span>
                      <label class="radio-inline">
                           <input type="radio" id="rnd1" name="rdoOpen" value="1" <?php echo (($openProgram == 1) ? 'checked' : ''); ?>> Yes
                      </label>
                        <label class="radio-inline">
                            <input type="radio" id="rnd2" name="rdoOpen" value="2" <?php echo (($openProgram == 2) ? 'checked' : ''); ?> > No
                      </label>
                  </div>
               
                </div>

                <h3>Program Fee Structure</h3>
                <div class="row form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtSFee">Student Fee</label>
                    <div class="col-sm-2">
                        <span class="colon">:</span>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="input-group-text">
                                    <i class="fa fa-rupee"></i>
                                </span>
                            </div>
                            <input type="text" id="txtStudentFee" name="txtStudentFee" maxlength="6" placeholder="Amount per candidate"
                                class="form-control" value="<?php echo $txtStudentFee;?>" onKeyPress="return isNumberKey(event);"
                                onkeyup="studentprogramFeeCalculation();">
                        </div>
                        <span class="mandatory">*</span>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" id="txtStudentQty" name="txtStudentQty" maxlength="6" placeholder="No. of candidate"
                            class="form-control" value="<?php echo $txtStudentQty;?>" onKeyPress="return isNumberKey(event);"
                            onkeyup="studentprogramFeeCalculation();">   <span class="mandatory">*</span>
                    </div>
                    <div class="col-sm-2">
                        <span><i class="fa fa-rupee"></i></span>
                        <span id="spnStudFee">0</span></span>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtTFee">Train Of Trainers Fee </label>
                    <div class="col-sm-2">
                        <span class="colon">:</span>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="input-group-text">
                                    <i class="fa fa-rupee"></i>
                                </span>
                            </div>
                            <input type="text" id="txtTrainFee" name="txtTrainFee" maxlength="6" placeholder="Amount per tot"
                                class="form-control" value="<?php echo $txtTrainFee;?>" onKeyPress="return isNumberKey(event);"
                                onkeyup="studentprogramFeeCalculation();">
                        </div>

                        <span class="mandatory">*</span>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" id="txtTrainQty" name="txtTrainQty" maxlength="6" placeholder="No. of tot"
                            class="form-control" value="<?php echo $txtTrainQty;?>" onKeyPress="return isNumberKey(event);"
                            onkeyup="studentprogramFeeCalculation();"> <span class="mandatory">*</span>
                    </div>
                    <div class="col-sm-2">
                        <span><i class="fa fa-rupee"></i></span>
                        <span id="spnTrainFee">0</span></span>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtIFee">Institute Fee </label>
                    <div class="col-sm-2">
                        <span class="colon">:</span>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="input-group-text">
                                    <i class="fa fa-rupee"></i>
                                </span>
                            </div>
                            <input type="text" id="txtInstituteFee" name="txtInstituteFee" maxlength="6" placeholder="Amount per institute"
                                class="form-control" value="<?php echo $txtInstituteFee;?>" onKeyPress="return isNumberKey(event);"
                                onkeyup="studentprogramFeeCalculation();">
                        </div>
                        <span class="mandatory">*</span>


                    </div>
                    <div class="col-sm-2">
                        <input type="text" id="txtInsQty" name="txtInsQty" maxlength="6" placeholder="No. of institute"
                            class="form-control" value="<?php echo $txtInsQty;?>" onKeyPress="return isNumberKey(event);"
                            onkeyup="studentprogramFeeCalculation();"><span class="mandatory">*</span>
                       
                    </div>
                    <div class="col-sm-2">
                        <span><i class="fa fa-rupee"></i></span>
                        <span id="spnInsFee">0</span></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label no-padding-right" for="txtEndDate">Final Amount</label>
                    <div class="col-sm-2">
                       <strong>
                            <span class="colon">:</span>
                            <span style="display: block;padding-top: 7px;"><span><i class="fa fa-rupee"></i></span> <span id="spnTotalFee"> 0</span></span>
                     </strong>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 no-padding-right"></div>
                    <div class="col-sm-4">
                        <input type="submit" id="btnSubmit" name="btnSubmit" value="<?php echo $strSubmit; ?>" class="btn btn-success" onclick="return validateRegdTP();"/>
                        <input type="reset" id="btnReset" name="btnReset"  class="btn btn-danger" value="<?php echo $strReset; ?>" onclick="<?php echo $strclick; ?>" />
                    </div>
                </div>
                
            </div>
            <div class="hr hr32 hr-dotted"></div>
            <!-- PAGE CONTENT ENDS --> 
        </div>
        <!-- /.col --> 
    </div>
    <!-- /.row --> 
</div>
<!-- /.page-content --> 
