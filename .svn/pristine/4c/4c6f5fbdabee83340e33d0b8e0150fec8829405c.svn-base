<?php
/*plugin*/
$strPageTitle             = 'Training Partner Registration';
/* ================================================
  File Name          : skill-training-partner.php
  Description        : This is to register for skill development
  Date Created       :
  Created By         : Rahul kumar saw
  Developed by       : Rahul Kumar Saw
  Developed on       : 12-Nov-2021
  Update History        :
  <Updated by>          <Updated On>      <Remarks>

  ================================================== */
?>
<!doctype html>
<html lang="en">

<?php include 'include/header.php' ?>

<script src="<?php echo APP_URL; ?>js/loadComponent.js"></script>
<script src="<?php echo APP_URL; ?>js/loadAjax.js"></script>
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/feedback.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/nano-unicorn.css">

<form name="frmOsda" id="frmOsda" method="post" action="" enctype="multipart/form-data" autocomplete="off">
   <section class="container ">
      <!-- <h2 class="text-center">Training Partner Registration</h2> -->
      <!-- <div class="tabsec">
         <nav class="mb-0">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
               <a class="nav-item nav-link active" href="<?php echo SITE_URL;?>skill-development">New Registration</a>
               <a class="nav-item nav-link" href="<?php echo SITE_URL;?>payment-process">Make Payment</a>
            </div>
         </nav>
      </div> -->

         <div class="feedback mb-4 pt-4">
               <h3>Training Partner Details </h3>
               <div class="">
                  <div class="row">
                     <div class="col-md-6 form-group">
                        <label>Organisation Name:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtOrgName" placeholder="Enter here" name="txtOrgName" value="<?php echo $strName;?>" maxlength="100" autocomplete="off">
                     </div>
                     <div class="col-md-6 form-group">
                        <label>Email Id:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtOrgEmail" placeholder="Enter here" name="txtOrgEmail" value="<?php echo $txtOrgEmail;?>" maxlength="64" autocomplete="off">
                     </div>
                     <div class="col-md-6 form-group">
                        <label>Contact Number:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtOrgMobile" placeholder="Enter here" name="txtOrgMobile" value="<?php echo $txtOrgMobile;?>" maxlength="10" autocomplete="off">
                     </div>
                     <div class="col-md-6 form-group">
                        <label>PAN Number:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtOrgPan" placeholder="Enter here" name="txtOrgPan" value="<?php echo $txtOrgPan;?>" maxlength="64" autocomplete="off">
                     </div>
                     <div class="col-md-6 form-group">
                        <label>Organisation Regd. Number:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtOrgRegd" placeholder="Enter here" name="txtOrgRegd" value="<?php echo $txtOrgRegd;?>" maxlength="64" autocomplete="off">
                     </div>

                     <div class="col-md-6 form-group">
                        <label>Organisation Address:</label>
                        <span class="required">*</span>
                        <textarea class="form-control" name="txtOrgAddress" placeholder="Enter here" id="txtOrgAddress" autocomplete="off"><?php echo $txtAdress;?></textarea>
                     </div>

                     <div class="col-md-6 form-group">
                        <label>Remark:</label>
                        <textarea class="form-control" name="txtOrgRemark" placeholder="Enter here" id="txtOrgRemark" autocomplete="off"><?php echo $txtOrgRemark;?></textarea>
                     </div>
                  </div>
               </div>
               <h3>Bank Information </h3>
               <div class="">
               <div class="row">
                     <div class="col-md-6 form-group">
                        <label>Account Holder Name:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtAccName" placeholder="Enter here" name="txtAccName" value="<?php echo $txtAccName;?>" maxlength="200" autocomplete="off">
                     </div> 
                     <div class="col-md-6 form-group">
                        <label>Account Number:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtAccNumber" placeholder="Enter here" name="txtAccNumber" onkeyup="return isNumberKey(event);" onkeypress="return isNumberKey(event);" value="<?php echo $txtAccNumber;?>" maxlength="20" autocomplete="off">
                     </div>
                     <div class="col-md-6 form-group">
                        <label>IFSC Code:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtIfscCode" placeholder="Enter here" name="txtIfscCode" value="<?php echo $txtIfscCode;?>" maxlength="64" autocomplete="off">
                     </div>
                     <div class="col-md-6 form-group">
                        <label>Branch Name:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtBranchName" placeholder="Enter here" name="txtBranchName" value="<?php echo $txtBranchName;?>" maxlength="200" autocomplete="off">
                     </div>                 
                  </div>
                  <br>
            </div>
               <h3>Contact Person Details </h3>
               <div class="">
               <div class="row">
                     <div class="col-md-6 form-group">
                        <label> Name:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtPersonName" placeholder="Enter here" name="txtPersonName" value="<?php echo $txtPersonName;?>" maxlength="200" autocomplete="off">
                     </div>
                     <div class="col-md-6 form-group">
                        <label>Email Id:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtPersonEmail" placeholder="Enter here" name="txtPersonEmail" value="<?php echo $txtPersonEmail;?>" maxlength="64" autocomplete="off">
                     </div>
                     <div class="col-md-6 form-group">
                        <label>Mobile Number:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtPersonNumber" placeholder="Enter here" name="txtPersonNumber" onkeyup="return isNumberKey(event);" onkeypress="return isNumberKey(event);" value="<?php echo $txtPersonNumber;?>" maxlength="10" autocomplete="off">
                     </div>
                     <!-- <div class="col-md-6 form-group">
                        <label>Enter User Id:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtUserId" placeholder="Enter here" name="txtUserId" value="" maxlength="100" autocomplete="off">
                     </div> -->
                     <div class="col-sm-6 align-self-center">
                        <div class="row align-items-center">
                           <div class="col-sm-6 col-xs-12">
                              <div class="form-group input-group-md">
                                 <input name="txtCaptcha" type="text" class="form-control  pull-left" style="width:100%;" id="txtCaptcha" autocomplete="off" onKeyUp="return blockspecialchar_first(this);" maxlength="20" placeholder="<?php echo $queryCaptcha; ?>">
                              </div>
                           </div>

                           <div class="col-sm-6 col-xs-10">
                              <div class="captchaimg-sec screenreader">
                                 <div class="pull-right">
                                    <i class="fa fa-refresh" id="reload" onClick="generateCaptcha();" aria-hidden="true" style=""></i>
                                 </div>
                                 <div class="pull-left">
                                    <img src="<?php echo APP_URL; ?>includes/captcha.php" alt="captcha image" align="absmiddle" style="" id="captchaImage" />
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>
               <div class="row align-items-center">
               <div class="col-sm-3 text-center">
                  <input type="submit" class="osda--btn btn--rounded btn-block" id="btnTPSubmit" name="btnTPSubmit" value="Submit" onclick="return validateTP();">
               </div>
            </div>
            </div>
            </div>

   </section>

   <!--end:: contarea-->
   <!--start::Footer-->
   <?php include 'include/footer.php' ?>
   <script type="text/javascript" language="javascript">
      $(document).ready(function() {
        <?php if ($outMsg != '' && isset($_REQUEST['btnTPSubmit'])) { ?>
            viewAlert('<?php echo $outMsg; ?>', '', '<?php echo $redirectLoc;?>');
         <?php }  ?>
         $('.datepicker').datepicker({
              autoclose: true,
              todayHighlight: true
          });

      });

      function validateTP() {
         //alert('xsacc');
         if (!blankCheck('txtOrgName', 'Please enter organisation name'))
            return false;
         if (!checkSpecialChar('txtOrgName'))
            return false;
         if (!maxLength('txtOrgName', 200, 'Name'))
            return false;
         if (!blankCheck('txtOrgEmail', 'Please enter email id'))
            return false;
         if (!checkSpecialChar('txtOrgEmail'))
            return false;
         if (!validEmail('txtOrgEmail'))
            return false;
         if (!maxLength('txtOrgEmail', 100, 'Email'))
            return false;
         if (!blankCheck('txtOrgMobile', 'Please enter contact number'))
            return false;
         if (!checkSpecialChar('txtOrgMobile'))
            return false;
         if (!blankCheck('txtOrgPan', 'Please enter PAN number'))
            return false;
         var panVal = $('#txtOrgPan').val();
         var regpan = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;
         if(regpan.test(panVal) == false){
            viewAlert("PAN Number not valid.");
            return false;
         }
         if (!checkSpecialChar('txtOrgPan'))
            return false;
         if (!blankCheck('txtOrgRegd', 'Please enter registration number'))
            return false;
         if (!checkSpecialChar('txtOrgRegd'))
            return false;
         /*if (!validMobileNo('txtPersonNumber', 'Enter a valid mobile no'))
            return false;
         if (!maxLength('txtPersonNumber', 10, 'Mobile no'))
            return false;*/
         
         if (!blankCheck('txtOrgAddress', 'Please enter organisation Address'))
            return false;
         if (!checkSpecialChar('txtOrgAddress'))
            return false;
         if (!maxLength('txtOrgAddress', 500, 'Address'))
            return false;
         if (!checkSpecialChar('txtOrgRemark'))
            return false;
         if (!maxLength('txtOrgRemark', 250, 'Remark'))
            return false;
         if (!blankCheck('txtAccName', 'Please enter account holder name'))
            return false;
         if (!blankCheck('txtAccNumber', 'Please enter account number'))
            return false;
         if (!blankCheck('txtIfscCode', 'Please enter IFSC Code'))
            return false;
         if (!blankCheck('txtBranchName', 'Please enter branch name'))
            return false;
         if (!blankCheck('txtPersonName', 'Please enter person name'))
            return false;
         if (!checkSpecialChar('txtPersonName'))
            return false;
         if (!maxLength('txtPersonName', 200, 'Name'))
            return false;
         if (!blankCheck('txtPersonEmail', 'Please enter email id'))
            return false;
         if (!checkSpecialChar('txtPersonEmail'))
            return false;
         if (!validEmail('txtPersonEmail'))
            return false;
         if (!maxLength('txtPersonEmail', 100, 'Email'))
            return false;
         if (!blankCheck('txtPersonNumber', 'Please enter person mobile number'))
            return false;
         if (!checkSpecialChar('txtPersonNumber'))
            return false;
         if (!blankCheck('txtCaptcha', 'Captcha can not be left blank'))
            return false;
      }
   </script>