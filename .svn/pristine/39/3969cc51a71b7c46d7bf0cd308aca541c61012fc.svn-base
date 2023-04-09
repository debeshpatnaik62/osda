<?php
/*plugin*/
$strPageTitle             = 'Institution Registration';
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
      <!-- <h2 class="text-center">Training Institute Registration</h2> -->
     
                  <div class="feedback mb-4 pt-4">
                  <h3>Institute Details </h3>
                  <div class="">
                  <div class="row">     
                     <div class="col-md-6 form-group">
                        <label>Institute Name:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtInsName" placeholder="Enter here" name="txtInsName" value="<?php echo $strName;?>" maxlength="200" autocomplete="off">
                     </div>
                     <div class="col-md-6 form-group">
                        <label>Email Id:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtInsEmail" placeholder="Enter here" name="txtInsEmail" value="<?php echo $txtInsEmail;?>" maxlength="100" autocomplete="off">
                     </div>
                     <div class="col-md-6 form-group">
                        <label>Contact Number:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtInsNumber" placeholder="Enter here" name="txtInsNumber" value="<?php echo $txtInsNumber;?>" maxlength="10" autocomplete="off" onKeyPress="return isNumberKey(event);">
                     </div>
                     <div class="col-md-6 form-group">
                        <label>PAN Number:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtPanNumber" placeholder="Enter here" name="txtPanNumber" value="<?php echo $txtInsPan;?>" maxlength="64" autocomplete="off">
                     </div>
                     <div class="col-md-6 form-group">
                        <label>Institute Regd. Number:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtRegdNumber" placeholder="Enter here" name="txtRegdNumber" value="<?php echo $txtInsRegd;?>" maxlength="64" autocomplete="off">
                     </div>
                     <div class="col-md-6 form-group">
                        <label>Program Name:</label>
                        <span class="required">*</span>
                        <select class="form-control <?php echo $strLangCls; ?>" name="selProgramName" id="selProgramName" onchange="setStudentAvail(this.id);">
                           <option value="0">-select-</option>
                        </select>
                        <p class="text-info mb-0" id="txtSeat" >(<span id="txtSeatNumberTot">0</span> Seats are available out of <span id="txtTotalSeat">0</span>)</p>
                     </div>
                     <div class="col-md-6 form-group">
                        <label>Seat Requirement:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="selSeat" placeholder="Enter here" name="selSeat" value="<?php echo $takenSeat;?>" maxlength="5" autocomplete="off" onKeyPress="return isNumberKey(event);">
                     </div>
                     <div class="col-md-6 form-group">
                        <label>Institute Address:</label>
                        <span class="required">*</span>
                        <textarea class="form-control" name="txtInsAddress" placeholder="Enter here" id="txtInsAddress" autocomplete="off"><?php echo $txtAdress;?></textarea>
                     </div>
                     <div class="col-md-6 form-group">
                        <label>Remark:</label>
                        <textarea class="form-control" name="txtInsRemark" placeholder="Enter here" id="txtInsRemark" autocomplete="off"><?php echo $txtInsRemark;?></textarea>
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
            <h3>Placement Cell Contact Details </h3>
               <div class="">
               <div class="row">
                     <div class="col-md-6 form-group">
                        <label>Name:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtCellPersonName" placeholder="Enter here" name="txtCellPersonName" value="<?php echo $txtCellPersonName;?>" maxlength="200" autocomplete="off">
                     </div>
                     <div class="col-md-6 form-group">
                        <label>Email Id:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtCellPersonEmail" placeholder="Enter here" name="txtCellPersonEmail" value="<?php echo $txtCellPersonEmail;?>" maxlength="100" autocomplete="off">
                     </div>
                     <div class="col-md-6 form-group">
                        <label>Mobile Number:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtCellPersonNumber" placeholder="Enter here" name="txtCellPersonNumber" onkeyup="return isNumberKey(event);" onkeypress="return isNumberKey(event);" value="<?php echo $txtCellPersonNumber;?>" maxlength="10" autocomplete="off">
                     </div>              
                  </div>
                  <br>
            </div>
            <h3>Principal / Dean Contact Details </h3>
               <div class="">
               <div class="row">
                     <div class="col-md-6 form-group">
                        <label> Name:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtPrincipleName" placeholder="Enter here" name="txtPrincipleName" value="<?php echo $txtPrincipleName;?>" maxlength="200" autocomplete="off">
                     </div>
                     <div class="col-md-6 form-group">
                        <label>Email Id:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtPrincipleEmail" placeholder="Enter here" name="txtPrincipleEmail" value="<?php echo $txtPrincipleEmail;?>" maxlength="100" autocomplete="off">
                     </div>
                     <div class="col-md-6 form-group">
                        <label>Mobile Number:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtPrincipleNumber" placeholder="Enter here" name="txtPrincipleNumber" onkeyup="return isNumberKey(event);" onkeypress="return isNumberKey(event);" value="<?php echo $txtPrincipleNumber;?>" maxlength="10" autocomplete="off">
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
                        <input type="text" class="form-control" id="txtPersonEmail" placeholder="Enter here" name="txtPersonEmail" value="<?php echo $txtPersonEmail;?>" maxlength="100" autocomplete="off">
                     </div>
                     <div class="col-md-6 form-group">
                        <label>Mobile Number:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtPersonNumber" placeholder="Enter here" name="txtPersonNumber" onkeyup="return isNumberKey(event);" onkeypress="return isNumberKey(event);" value="<?php echo $txtPersonNumber;?>" maxlength="10" autocomplete="off">
                     </div>
                                          
                    <!--  <div class="col-md-6 form-group">
                        <label>Enter User Id:</label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtUserId" placeholder="Enter here" name="txtUserId" value="" maxlength="50" autocomplete="off">
                     </div> -->
                     <div class="col-sm-6 align-self-center">
                        <div class="row align-items-center">
                           <div class="col-sm-6 col-xs-12">
                              <div class="form-group input-group-md">
                                 <input name="txtInsCaptcha" type="text" class="form-control  pull-left" style="width:100%;" id="txtInsCaptcha" autocomplete="off" onKeyUp="return blockspecialchar_first(this);" maxlength="20" placeholder="<?php echo $queryCaptcha; ?>">
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
                  <input type="submit" class="osda--btn btn--rounded btn-block" id="btnInsSubmit" name="btnInsSubmit" value="Submit" onclick="return validateInstitute();">
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
        <?php if ($outMsg != '' && isset($_REQUEST['btnInsSubmit'])) { ?>
            viewAlert('<?php echo $outMsg; ?>', '', '<?php echo $redirectLoc;?>');
         <?php }  ?>
        
         fillProgramName('<?php echo $selProgramId;?>','selProgramName');

      });

      function setStudentAvail(sourceId)
      { 
        var srId =  $('#'+sourceId).find(":selected").attr('data-id');
        var totalVal =  $('#'+sourceId).find(":selected").attr('data-num');
        //$('#'+targetId).val(srId).prop('disabled',true); 
        $('#txtSeatNumberTot').html(srId);  
        $('#txtTotalSeat').html(totalVal);  
      }


      function validateInstitute() {
         //alert('xsacc');
         var seatTaken = $('#selSeat').val();
         var availSeat = $('#selProgramName').find(":selected").attr('data-id');
         //alert(srId);
         if (!blankCheck('txtInsName', 'Please enter institute name'))
            return false;
         if (!checkSpecialChar('txtInsName'))
            return false;
         if (!maxLength('txtInsName', 200, 'Name'))
            return false;
         if (!blankCheck('txtInsEmail', 'Please enter email id'))
            return false;
         if (!checkSpecialChar('txtInsEmail'))
            return false;
         if (!validEmail('txtInsEmail'))
            return false;
         if (!maxLength('txtInsEmail', 100, 'Email'))
            return false;
         if (!blankCheck('txtInsNumber', 'Please enter contact number'))
            return false;
         if (!checkSpecialChar('txtInsNumber'))
            return false;
         if (!blankCheck('txtPanNumber', 'Please enter PAN number'))
            return false;
         var panVal = $('#txtPanNumber').val();
         var regpan = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;
         if(regpan.test(panVal) == false){
            viewAlert("PAN Number not valid.");
            return false;
         }
         if (!checkSpecialChar('txtPanNumber'))
            return false;
         if (!blankCheck('txtRegdNumber', 'Please enter registration number'))
            return false;
         if (!checkSpecialChar('txtRegdNumber'))
            return false;
         /*if (!validMobileNo('txtPersonNumber', 'Enter a valid mobile no'))
            return false;
         if (!maxLength('txtPersonNumber', 10, 'Mobile no'))
            return false;*/
         if(!selectDropdown('selProgramName', 'Select Program'))
             return false;
         if (!blankCheck('selSeat', 'Please enter seat requirement'))
            return false;
         if(parseInt(seatTaken) > parseInt(availSeat))
         { 
            viewAlert("You can not add more then available seat.");
            return false;
         }
         if (!blankCheck('txtInsAddress', 'Please enter institute Address'))
            return false;
         if (!checkSpecialChar('txtInsAddress'))
            return false;
         if (!maxLength('txtInsAddress', 500, 'Address'))
            return false;
         if (!checkSpecialChar('txtInsRemark'))
            return false;
         if (!maxLength('txtInsRemark', 250, 'Remark'))
            return false;
         if (!blankCheck('txtAccName', 'Please enter account holder name'))
            return false;
         if (!blankCheck('txtAccNumber', 'Please enter account number'))
            return false;
         if (!blankCheck('txtIfscCode', 'Please enter IFSC Code'))
            return false;
         if (!blankCheck('txtBranchName', 'Please enter branch name'))
            return false;

         if (!blankCheck('txtCellPersonName', 'Please enter placement cell person name'))
            return false;
         if (!checkSpecialChar('txtCellPersonName'))
            return false;
         if (!maxLength('txtCellPersonName', 200, 'Name'))
            return false;
         if (!blankCheck('txtCellPersonEmail', 'Please enter placement cell email id'))
            return false;
         if (!checkSpecialChar('txtCellPersonEmail'))
            return false;
         if (!validEmail('txtCellPersonEmail'))
            return false;
         if (!maxLength('txtCellPersonEmail', 100, 'Email'))
            return false;
         if (!blankCheck('txtCellPersonNumber', 'Please enter placement cell person mobile number'))
            return false;
         if (!checkSpecialChar('txtCellPersonNumber'))
            return false;

         if (!blankCheck('txtPrincipleName', 'Please enter principal / dean name'))
            return false;
         if (!checkSpecialChar('txtPrincipleName'))
            return false;
         if (!maxLength('txtPrincipleName', 200, 'Name'))
            return false;
         if (!blankCheck('txtPrincipleEmail', 'Please enter principal / dean email id'))
            return false;
         if (!checkSpecialChar('txtPrincipleEmail'))
            return false;
         if (!validEmail('txtPrincipleEmail'))
            return false;
         if (!maxLength('txtPrincipleEmail', 100, 'Email'))
            return false;
         if (!blankCheck('txtPrincipleNumber', 'Please enter principal / dean mobile number'))
            return false;
         if (!checkSpecialChar('txtPrincipleNumber'))
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
         if (!blankCheck('txtInsCaptcha', 'Captcha can not be left blank'))
            return false;
      }
   </script>