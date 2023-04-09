<?php
/* ================================================
  File Name           : slaConfiguration.php
  Description         : This is used for add sla Configuration.
  Designed By         :
  Designed On         : 
  Devloped By         : Rahul Kumar Saw
  Devloped On         : 24-March-2023
  Update History      : <Updated by>        <Updated On>        <Remarks>
  Style sheet         : 
  Javscript Functions : ckeditor.js, validatorchklist.js
  includes            : util.php,slaConfigurationInner.php           :

  ================================================== */

require 'slaConfigurationInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
    $(document).ready(function () {
        
        pageHeader   = "SLA Configuration";
        strFirstLink = "Manage Grievance";
        strLastLink  = "SLA Configuration"; 
        loadNavigation('<?php echo $strTab; ?> SLA Configuration');
        
        indicate = 'yes';
        $('#selectCategory').focus();
      
         
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?>    

     });
     //function to validate the SLA Configuration
        function validator()
        {     
            if(!selectDropdown('selectCategory', 'Select Category'))
                return false;  
            if(!selectDropdown('slaPriority', 'Select Complain Priority'))
                return false;  
            if(!selectDropdown('slaPeriodUnit', 'Select SLA Period'))
                return false; 
            if (!checkSpecialChar('slaPeriodUnit'))
                return false;
            if (!blankCheck('txtSlaPeriod', 'Please Enter SLA Period'))
                return false;
            if (!checkSpecialChar('txtSlaPeriod'))
                return false;
           
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
                <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab;?></a>
                <a href="<?php echo APP_URL; ?>viewSLAConfiguration/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="selectCategory">Select Category </label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="selectCategory" id="selectCategory">
                            <option value="0">--Select--</option>
                            <option value="1"<?php if($strCatId==1) echo 'selected="selected"'; ?>>Exam</option>
                            <option value="2"<?php if($strCatId==2) echo 'selected="selected"'; ?>>Result</option>
                            <option value="3"<?php if($strCatId==3) echo 'selected="selected"'; ?>>Category is not populating</option>
                        </select>   
                        <span class="mandatory">*</span>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="slaPriority">Complain Priority</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="slaPriority" id="slaPriority">
                            <option value="0">--Select--</option>
                            <option value="1" <?php if($ddlPriorty==1) echo 'selected="selected"'; ?>>High</option>
                            <option value="2" <?php if($ddlPriorty==2) echo 'selected="selected"'; ?>>Medium</option>
                            <option value="3" <?php if($ddlPriorty==3) echo 'selected="selected"'; ?>>Low</option>
                        </select>
                        <span class="mandatory">*</span>
                      
                    </div>
                </div> 

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="slaPeriodUnit">SLA Period Unit</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="slaPeriodUnit" id="slaPeriodUnit">
                            <option value="0">--Select--</option>
                            <option value="1" <?php if($periodUnit==1) echo 'selected="selected"'; ?>>Hours</option>
                            <option value="2" <?php if($periodUnit==2) echo 'selected="selected"'; ?>>Days</option>
                        </select>
                        <span class="mandatory">*</span>
                      
                    </div>
                </div> 

                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtSlaPeriod">SLA Period</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtSlaPeriod" name="txtSlaPeriod" maxlength="5" placeholder="" class="form-control" value="<?php echo $strPeriod; ?>" onkeyup="return isNumberKey(event);" onkeypress="return isNumberKey(event);">
                        <span class="mandatory">*</span>
                    </div>
                </div> 

                 

                
                
                <div class="form-group">
                    <div class="col-sm-2 no-padding-right"></div>
                    <div class="col-sm-4">
                        <input type="submit" id="btnSubmit" name="btnSubmit" value="<?php echo $strSubmit; ?>" class="btn btn-success" onclick="return validator();"/>
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


