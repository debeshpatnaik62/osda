<?php
/* ================================================
  File Name           : addVenue.php
  Description         : This is used for add Venue details.
  Designed By         :
  Designed On         : 
  Devloped By         : Rahul Kumar Saw
  Devloped On         : 22-March-2021
  Update History      : <Updated by>        <Updated On>        <Remarks>
  Style sheet         : 
  Javscript Functions : ckeditor.js, validatorchklist.js
  includes            : util.php,addVenueInner.php           :

  ================================================== */

require 'addVenueInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
    $(document).ready(function () {
        
        pageHeader   = "<?php echo $strTab; ?> Venue";
        strFirstLink = "Manage Venue";
        strLastLink  = "Venue"; 
        loadNavigation('<?php echo $strTab; ?> Venue');
        
        indicate = 'yes';
        $('#txtHeadlineE').focus();
      
         //fill the districts details
           fillDistricts('<?php echo $intDist; ?>','ddlDist');
           //fillRegistrationPhase('<?php echo $regdType; ?>','selRegdType');
         
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?>    

     });
     //function to validate the employee directory
        function validator()
        {     
         
            //if(!selectDropdown('selRegdType', 'Select Registration Type'))
            // return false; 
            if(!selectDropdown('ddlDist', 'Select District'))
             return false; 

             if (!blankCheck('txtName', 'Venue Name can not be left blank'))
                return false;
            if (!checkSpecialChar('txtName'))
                return false;
            if (!maxLength('txtName', 100, 'Venue Name'))
                return false;
            if (!blankCheck('txtOfficerName', 'Venue Officer Name can not be left blank'))
                return false;
            if (!checkSpecialChar('txtOfficerName'))
                return false;
            if (!maxLength('txtOfficerName', 100, 'Venue Officer Name'))
                return false;
            if (!blankCheck('txtMobile', 'Mobile Number can not be left blank'))
                return false;
            if (!checkSpecialChar('txtMobile'))
                return false;
            if(!validMobileNo('txtMobile','Please enter a valid mobile no'))
                    return false;
            if (!minLength('txtMobile', 10, 'Mobile Number'))
                return false;
            if (!maxLength('txtMobile', 10, 'Mobile Number'))
                return false;
            if (!blankCheck('txtEmailId', 'Email Id can not be left blank'))
                return false;
            if (!checkSpecialChar('txtEmailId'))
                return false;
            if (!validEmail('txtEmailId'))
                return false;
            if (!maxLength('txtEmailId', 100, 'Email ID'))
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
                <a href="<?php echo APP_URL; ?>viewVenue/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>
                <a href="<?php echo APP_URL ?>addOfflineVenue/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add Offline Venue</a>
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="col-xs-12">
                <!-- <div class="form-group" >
                    <label class="col-sm-2 control-label no-padding-right" for="selRegdType">Select Registration Type</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="selRegdType" id="selRegdType" >
                            <option value="0">- Select -</option> 
                            
                        </select>
                          <span class="mandatory">*</span>              
                    </div>
                </div> -->
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
                    <label class="col-sm-2 control-label no-padding-right" for="txtName">Venue Name </label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtName" name="txtName" maxlength="200" placeholder="" class="form-control" value="<?php echo $strName; ?>">
                        <span class="mandatory">*</span>
                    </div>
                </div> 
                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtOfficerName">Venue Officer Name</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtOfficerName" name="txtOfficerName" maxlength="200" placeholder="" class="form-control" value="<?php echo $strOfficerName; ?>">
                        <span class="mandatory">*</span>
                      
                    </div>
                </div> 

                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtMobile">Mobile Number</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtMobile" name="txtMobile" maxlength="10" placeholder="" class="form-control" value="<?php echo $strMobile; ?>" onkeypress="return isNumberKey(event);">
                         <span class="mandatory">*</span>
                      
                    </div>
                </div> 

                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtEmailId">Email Id</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtEmailId" name="txtEmailId" maxlength="100" placeholder="" class="form-control" value="<?php echo $strEmailId; ?>">
                        <span class="mandatory">*</span>
                      
                    </div>
                </div>  
               
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtCapacity">Capacity </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtCapacity" name="txtCapacity" placeholder="" class="form-control" maxlength="5" value="<?php echo $strCapacity; ?>" onkeypress="return isNumberKey(event);">
                        
                    </div>    
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtAddress">Venue Address </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtAddress" name="txtAddress" maxlength="200" placeholder="" class="form-control" value="<?php echo $strAddress; ?>">
                         </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtCity">City </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtCity" name="txtCity" maxlength="200" placeholder="" class="form-control" value="<?php echo $strCity; ?>">
                         </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="intPinCode">Pin Code </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="intPinCode" name="intPinCode" maxlength="6" placeholder="" class="form-control" value="<?php echo $intPinCode; ?>" onkeypress="return isNumberKey(event);">
                         </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtMapAddress">Landmark </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtMapAddress" name="txtMapAddress" maxlength="200" placeholder="" class="form-control" value="<?php echo $strMapAddress; ?>">
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


