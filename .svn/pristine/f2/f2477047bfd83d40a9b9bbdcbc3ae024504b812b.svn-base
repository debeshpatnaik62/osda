<?php
/* ================================================
  File Name               : addEmpDirectory.php
  Description         : This is used for add Employer Speaks details.
  Designed By         :
  Designed On         : 
  Devloped By             : T Ketaki Debadarshini
  Devloped On             : 15-July-2017
  Update History      : <Updated by>        <Updated On>        <Remarks>
  Style sheet             : 
  Javscript Functions       : ckeditor.js, validatorchklist.js
  includes                  : util.php,addEmpDirectoryInner.php           :

  ================================================== */

require 'addEmpDirectoryInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
    $(document).ready(function () {
        
        pageHeader   = "<?php echo $strTab; ?>  District Employment Directory";
        strFirstLink = "Manage Application";
        strLastLink  = "District Employment Directory"; 
        loadNavigation('<?php echo $strTab; ?> District Employment Directory');
        
        indicate = 'yes';
        $('#txtHeadlineE').focus();
      
         //fill the districts details
           fillDistricts('<?php echo $intDist; ?>','ddlDist');
        
         
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?>    

     });
     //function to validate the employee directory
        function validator()
        {    
            /*if(!selectDropdown('ddlDistrict', 'Select District')){
                    return false;  
            }*/
            if(!selectDropdown('ddlType', 'Select Type'))
           return false;  
         
            if(!selectDropdown('ddlDist', 'Select District'))
             return false; 

             if (!blankCheck('txtName', 'Employee Name can not be left blank'))
                return false;
            if (!checkSpecialChar('txtName'))
                return false;
            if (!maxLength('txtName', 100, 'Employee Name'))
                return false;

            if (!blankCheck('txtEmail', 'EMail-Id can not be left blank'))
                return false;
            
            if (!validEmail('txtEmail'))
                return false;
            if (!checkSpecialChar('txtEmail'))
                return false;
            
             if (!maxLength('txtEmail', 70, 'EMail-Id'))
                return false;

            if (!validatePhone('txtPhoneno','Invalid Phone No'))
                return false;
            if (!validMobileNo('txtMobileNo','Invalid Mobile No'))
                return false;
             if (!maxLength('txtMobileNo', 10, 'Mobile No'))
                return false;
            var phone   =  $('#txtPhoneno').val();
            var mobile  =  $('#txtMobileNo').val();
            
          
            if(!(phone || mobile))
            {
                 viewAlert('Please provide either phone no or mobile no');
                   return false;
            }     
           
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
             <a href="<?php echo APP_URL; ?>viewEmpDirectory/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>
              <a href="<?php echo APP_URL; ?>archiveEmpDirectory/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Archive</a></div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="col-xs-12">
                <div class="form-group " >
                    <label class="col-sm-2 control-label no-padding-right" for="ddlType">Select Type</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlType" id="ddlType" >
                            <option value="0" >- Select -</option> 
                            <option value="1" <?php if($intType == 1) echo "selected"; ?> >Employment Officer</option> 
                            <option value="2" <?php if($intType == 2) echo "selected"; ?>>Project Director</option> 
                        </select>
                         <span class="mandatory">*</span>             
                    </div>
                </div>
                <div class="form-group" >
                    <label class="col-sm-2 control-label no-padding-right" for="ddlDist">Select District</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlDist" id="ddlDist" >
                            <option value="0">- Select -</option> 
                            
                        </select>
                          <span class="mandatory">*</span>              
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtName">Employee Name </label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtName" name="txtName" maxlength="100" placeholder="" class="form-control" value="<?php echo $strName; ?>">
                        <span class="mandatory">*</span>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtNameO">Employee Name in Odia</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtNameO" name="txtNameO" maxlength="120" placeholder="" class="form-control odia" value="<?php echo $strNameO; ?>">
                      
                    </div>
                </div> 
               
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtEmail">Email-id </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtEmail" name="txtEmail" placeholder="" class="form-control" maxlength="70" value="<?php echo $strEmail; ?>">
                        <span class="mandatory">*</span>  
                    </div>    
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtMobileNo">Mobile No </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtMobileNo" name="txtMobileNo" placeholder="" class="form-control" maxlength="10" onkeypress="return isNumberKey(event);" value="<?php echo $strMobileno; ?>">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtPhoneno">Phone No </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtPhoneno" name="txtPhoneno" placeholder="" class="form-control" maxlength="15" value="<?php echo $strPhoneno; ?>">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right"></label>
                    <div class="col-sm-8">
                       <span class="red">(Enter valid phone No. &nbsp;Ex: 0674-3246014)</span>
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


