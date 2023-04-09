<?php


include_once 'studentRegistrationInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo APP_URL; ?>ckeditor/ckeditor.js"></script>
<script language="javascript">
    $(document).ready(function () {
        pageHeader = "Skill Development Program";
                strFirstLink = "Manage Skill Development";
                strLastLink = "Add student registration";
               loadNavigation('Skill Development Program Report');

        printMe        = "yes";                             
        downloadMe   = "yes";
        //deleteMe     = "yes";
        fillTPName('<?php echo $instituteId;?>','selectedCourse');
        fillApproveInstituteName('<?php echo $instituteId;?>','selInstituteName');
        fillDegreeName('<?php echo $intSkillInstitute;?>','selCourse');
        fillBranchName('','selBranch');
        <?php if($privilege==4) { ?>
        fillInstituteProgram(0,'selInterestCourse','<?php echo $instituteId;?>');
        <?php } ?>
         <?php if ($msgRemark != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $msgRemark; ?>', '', '');
         <?php }  ?>

        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?>     
                   
        $('.date-picker').datepicker({
              autoclose: true,
              todayHighlight: true
          });   
            
    });

    function validate() {
        if (!selectDropdown('selectedCourse', 'Select Course sought for'))
            return false;
         if (!blankCheck('txtName', 'Please enter your name'))
            return false;
         if (!checkSpecialChar('txtName'))
            return false;
         if (!maxLength('txtName', 200, 'Name'))
            return false;
         if (!blankCheck('txtEmail', 'Please enter your email'))
            return false;
         if (!checkSpecialChar('txtEmail'))
            return false;
         if (!validEmail('txtEmail'))
            return false;
         if (!maxLength('txtEmail', 100, 'Email'))
            return false;
         if (!blankCheck('txtMobile', 'Please enter your Mobile Number'))
            return false;
        if (!checkSpecialChar('txtMobile'))
            return false;
        if (!validMobileNo('txtMobile', 'Enter a valid mobile no'))
            return false;
        if (!maxLength('txtMobile', 10, 'Mobile no'))
            return false;
         if (!blankCheck('txtRegdNumber', 'Please enter College / Institute Roll / Registration Number'))
            return false;
         if (!checkSpecialChar('txtRegdNumber'))
            return false;

         if (!selectDropdown('selInstituteName', 'Select College / Institution Name'))
            return false;
         
         if (!selectDropdown('selCourse', 'Select Course'))
            return false;
         if (!selectDropdown('selBranch', 'Select Branch / Discipline'))
            return false;
         if (!selectDropdown('selSemester', 'Select Semester'))
            return false;

         if (!selectDropdown('selInterestCourse', 'Select Interested For Courses'))
            return false;
         
         if (!selectDropdown('selDocumentType', 'Select Document Type'))
            return false;

         if (!blankCheck('fileFeaturedImage', 'Please choose identity proof'))
            return false;

         if (!blankCheck('txtDocumentNumber', 'Please enter document number'))
            return false;

         if (!blankCheck('txtMessage', 'Please enter your Address'))
            return false;
         if (!checkSpecialChar('txtMessage'))
            return false;
         if (!maxLength('txtMessage', 500, 'message'))
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
            <a href="<?php echo APP_URL; ?>viewSkillRegistration/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View Student Details</a>
            <a href="javascript:void(0);" class="btn btn-info active">Add Student</a>
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
           
            <div class="col-xs-12">
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtCareerName">Type of courses sought for</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="selectedCourse" id="selectedCourse">
                        <option value="0">--select-- </option>
                        <!-- <option value="Coursera">Coursera </option>
                        <option value="SAP ERP">SAP ERP </option> -->
                     </select>
                        <span class="mandatory">*</span>
                    </div>
                </div>  
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtCareerNameO">Name</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" class="form-control" id="txtName" placeholder="Enter here" name="txtName" value="<?php echo $strName; ?>" maxlength="100" autocomplete="off">
                              <span class="mandatory">*</span>
                    </div>
                </div>

                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtCareerNameO">Email Address</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" class="form-control" name="txtEmail" placeholder="Enter here" id="txtEmail" value="<?php echo $strEmail; ?>" maxlength="50" autocomplete="off">
                              <span class="mandatory">*</span>
                    </div>
                </div>

                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtCareerNameO">Mobile Number</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" class="form-control" name="txtMobile" placeholder="Enter here" id="txtMobile" value="<?php echo $strEmail; ?>" maxlength="12" autocomplete="off" onKeyPress="return isNumberKey(event)";> <span class="mandatory">*</span>
                    </div>
                </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtCareerNameO">College / Institute Roll / Registration Number</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                       <input type="text" class="form-control" name="txtRegdNumber" placeholder="Enter here" id="txtRegdNumber" value="" maxlength="50" autocomplete="off">
                              <span class="mandatory">*</span>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtCareerNameO">College / Institution Name</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control " name="selInstituteName" id="selInstituteName" onchange="fillInstituteProgram(0,'selInterestCourse',this.value);">
                         <option value="0">--select--</option>
                      </select>
                              <span class="mandatory">*</span>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtCareerNameO">Courses</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                       <select class="form-control " name="selCourse" id="selCourse">
                         <option value="0">--select--</option>
                      </select>
                              <span class="mandatory">*</span>
                    </div>
                </div>

                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtCareerNameO">Branch / Discipline</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control " name="selBranch" id="selBranch">
                     <option value="0">--select--</option>
                  </select>
                    <span class="mandatory">*</span>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtCareerNameO">Semester</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                      <select class="form-control " name="selSemester" id="selSemester">
                         <option value="0">--select--</option>
                         <option value="Semester-1">Semester-1</option>
                         <option value="Semester-2">Semester-2</option>
                         <option value="Semester-3">Semester-3</option>
                         <option value="Semester-4">Semester-4</option>
                         <option value="Semester-5">Semester-5</option>
                         <option value="Semester-6">Semester-6</option>
                         <option value="Semester-7">Semester-7</option>
                         <option value="Semester-8">Semester-8</option>
                         <option value="Semester-9">Semester-9</option>
                         <option value="Semester-10">Semester-10</option>
                      </select>
                        <span class="mandatory">*</span>
                    </div>
                </div>

                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtCareerNameO">Interested For Courses</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                      <select class="form-control " name="selInterestCourse" id="selInterestCourse">
                         <option value="0">--select--</option>
                      </select>
                              <span class="mandatory">*</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtCareerNameO">Select Identity Document Type</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                          <select class="form-control" name="selDocumentType" id="selDocumentType">
                         <option value="0">--select--</option>
                         <option value="Aadhaar Card">Aadhaar Card</option>
                         <option value="Voter Card">Voter Card</option>
                         <option value="PAN Card">PAN Card</option>
                         <option value="College ID Card">College ID Card</option>
                         <option value="Other">Other</option>
                      </select>
                              <span class="mandatory">*</span>
                    </div>
                </div>

                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtCareerNameO">Any Identity Document</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                         <input type="file" id="fileFeaturedImage" name="fileFeaturedImage" placeholder="" class="form-control" onchange="readImage(this,'imageFile');">
                         <input type="hidden" name="hdnImageFile" id="hdnImageFile" value="<?php echo $strImageFile; ?>" />
                              <span class="mandatory">*</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtCareerNameO">Enter Identity Document Number</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" class="form-control" name="txtDocumentNumber" id="txtDocumentNumber" placeholder="Enter here" maxlength="60" autocomplete="off">
                              <span class="mandatory">*</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtCareerNameO">Enter Current Address</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <textarea class="form-control" name="txtMessage" placeholder="Enter here" id="txtMessage" autocomplete="off"></textarea>
                              <span class="mandatory">*</span>
                    </div>
                </div>
 

                <div class="form-group">
                    <div class="col-sm-2 no-padding-right"></div>
                    <div class="col-sm-4">
                        <input type="submit" id="btnSubmit" name="btnSubmit" value="<?php echo $strSubmit; ?>" class="btn btn-success" onclick="return validate();"/>
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


