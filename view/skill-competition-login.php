<?php
/*plugin*/

/* ================================================
  File Name          : skill-competition-login.php
  Description        : This is login for skill development
  Date Created       :
  Created By         : Rahul kumar saw
  Developed by       : Rahul Kumar Saw
  Developed on       : 13-May-2022
  Update History        :
  <Updated by>          <Updated On>      <Remarks>

  ================================================== */
  $strPageTitle = ($_SESSION['lang']=='O')?'Skill Competition Login':'Skill Competition Login';
?>
<!doctype html>
<html lang="en">

<?php include 'include/header.php';?>


<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/feedback.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/nano-unicorn.css">
<form name="frmOsda" id="frmOsda" method="post" action="" enctype="multipart/form-data" autocomplete="off">
<section class="container contarea">
 
   <div class="card login-card p-2">
    <div class="row">
       <div class="col-lg-5 pr-lg-0 d-lg-block d-none">
               <div class="login-bg">
                  <img src="<?php echo SITE_URL; ?>images/skillcompetition.png">
               </div>
           </div>
            <div class="col-lg-7 pl-lg-0">
                <div class="login-content">
                   <div class="loginform-section">
                     <h3 class="m-0">Student Login for Skill Competition</h3>
             <div class="purple"></div>
              <div class="form-group row">
                  <div class="col-sm-8 col-xs-12">
                      <label for="coursera"> Registration No. / Mobile No. </label>
                  <input type="text" name="txtRegdNo" id="txtRegdNo"  class="form-control " value="<?php echo $nid;?>">
                  </div>
                  <div class="col-sm-3 col-md-4 pl-sm-0">
                     <div class="custome-mrtop">
                  <input type="submit" class="custome-btn " id="btnOTP" name="btnOTP" value="Generate OTP" onclick="return validateGenerate();"></div>
                </div>
               </div>
                   <div class="form-group row">
                   <div class="col-sm-8 col-xs-12">
                             <label for="coursera" class="coustomd-none">OTP </label>
                         <input type="text" name="txtVerify" id="txtVerify"  class="form-control d-block" value="<?php echo $otp;?>">
                            <!-- <div class="d-flex justify-content-between">
                            <div> <small  class="text-danger mb-0">OTP Valid Upto : <span class="font-weight-bolder">1:59 sec</span></small></div> 
                                 <a href="javascript:void(0);" class="vaild-text">Resend OTP</a>
                            </div> -->
                            <!--  <span class="verify">
                              <?php if($verifiedStatus==1){?>
                             <img src="<?php echo SITE_URL; ?>images/check.png" alt="Valid">
                              <?php } else if($verifiedStatus==2){ ?>
                              <img src="<?php echo SITE_URL; ?>images/close.png" alt="Invalid">
                               <?php } ?> 
                            </span> -->
                      
                   </div>

                   <!-- <div class="col-sm-3 col-md-4 pl-sm-0 ">
                     <div class="custome-mrtop">
                            <input type="submit" class="custome-btn " id="btnVerifyOTP" name="btnVerifyOTP" value="Verify OTP" onclick="return verifyOTP();">
                        </div>
                      
                 </div> -->
                  </div>
                         <div class="form-group row">
                   <div class="col-sm-8  col-xs-12">
                             <label for="coursera" class="coustomd-none">Captcha </label>
                         <input type="text" name="txtCaptcha" id="txtCaptcha" placeholder="Enter Captcha " class="form-control d-block">
                   
                   </div>

                   <div class="col-sm-3  captcha_form pl-sm-0">
                       <label for="coursera" class="d-sm-block d-none "> </label>
                       <div class="captcha-img d-flex ">
                           <img src="<?php echo APP_URL; ?>includes/captcha.php" alt="captcha image" align="absmiddle" style="" id="captchaImage">
                       <span class="captcha_refresh "><i class="fa fa-refresh" id="reload" onClick="generateCaptcha();" aria-hidden="true" style=""></i></span> 
                       </div>
                    
                  </div>
               
            
             </div>
                <div class=" text-center mb-3  mt-sm-3 mt-4 px-0">
                  <input type="submit" class="osda--btn btn--rounded btn-block w-26" id="btnSubmit" name="btnSubmit" value="Login" onclick="return validateLogin();">

              </div>
                 <div class="or-section text-center">OR</div>
              <p class="text-center  mt-2 mb-3">New Registration for Skill Competition</p>
           <div class=" text-center">
               <a class="osda--btn btn--rounded check-venue-cutome mt-1" href="<?php echo SITE_URL;?>skill-compete-register"> Register Here</a>

          </div>
                   </div>
                 </div>
            </div>
    </div>

   </div>


</section>
<hr class="mb-0">
</form>
   <!--end:: contarea-->
   <!--start::Footer-->
   <?php include 'include/footer.php' ?>
   <script type="text/javascript">
    $(document).ready(function() {
        <?php if ($outMsg!='' && isset($_REQUEST['btnOTP'])) { ?>
            viewAlert('<?php echo $outMsg; ?>', '', '');
         <?php }  ?>

/*         <?php //if ($outMsg!='' && isset($_REQUEST['btnVerifyOTP'])) { ?>
            viewAlert('<?php// echo $outMsg; ?>', '', '');
         <?php //}  ?>*/
         <?php if ($outMsg!='' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg; ?>', '', '<?php echo $redirectLoc;?>');
         <?php }  ?>

       });
     function validateLogin() 
     {
         if (!blankCheck('txtRegdNo', 'Please enter Registration No. / Mobile No.'))
            return false;
          if (!blankCheck('txtVerify', 'Please enter OTP'))
            return false;
          if (!blankCheck('txtCaptcha', 'Captcha can not be left blank'))
            return false;
    }

    function validateGenerate() 
     {
         if (!blankCheck('txtRegdNo', 'Please enter Registration No. / Mobile No.'))
            return false;
    }

    /*function verifyOTP() 
     {
         if (!blankCheck('txtVerify', 'Please enter OTP'))
            return false;
    }*/
   </script>
   <script>
   localStorage.setItem('regdNo', "<?php echo $nid;?>");
   localStorage.setItem('viewUrl', '<?php echo SITE_URL."skill-competition-dashboard/".$encId;?>');
   </script>