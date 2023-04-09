<?php
/*plugin*/
/*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 29th Dec 2018
Author : MRD
*/ ?>

<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?>

<script src="<?php echo APP_URL; ?>js/loadComponent.js"></script>
<script src="<?php echo APP_URL; ?>js/loadAjax.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/contact-us.css">
<form name="frmOsda" id="frmOsda"  method="post" action="" enctype="multipart/form-data" autocomplete="off">

<!--start:: contarea-->

  <section class="container contarea">
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="row">
            <div class="col-12 col-sm-6 col-lg-6 p-3 p-md-4 flex-item-center">
              <a href="tel:+91-0674-2394415" class="text-dark">
              <i class="fa fa-phone fa-2x text-info"></i>
              <h3>Phone</h3>
              <p>0674-2394415</p></a>
            </div>
            <div class="col-12 col-sm-6 col-lg-6 p-3 p-md-4 flex-item-center">
              <a href="mailto:osdabbsr.od@gov.in" class="text-dark"><i class="fa fa-envelope-o fa-2x text-info"></i>
              <h3>Email</h3>
              <p>osdabbsr.od@gov.in</p></a>
            </div>
           
            <div class="col-12 col-sm-12 col-lg-12 p-3 p-md-4 flex-item-center">
              <i class="fa fa-address-card-o fa-2x text-info"></i>
              <p>Odisha Skill Development Authority, 1st Floor, Rajiv Bhavan, Unit-5, Bhubaneswar-751001, Odisha</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <iframe src="https://www.google.com/maps/embed/v1/place?q=Rajib+Bhavan,+Bhubaneswar,+Odisha&amp;key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
        </div>
      </div>
      <div class="row box-shadow p-2 pt-4 pb-4 p-md-4 mt-4 mt-md-0 br-5 mt-md-4">
       
       
       <div class="col-12"> 
       <h3>Do you want to setup your training center in Odisha?
       <small class="d-block mb-5"><strong>Write to us, our officers will guide you with the process.</strong></small>
       </h3>
       </div>
        <div class="col-12">
           <div class="form-row">
            <div class="form-group col-md-6">
              <!-- <label>Your Name</label> -->
              <!-- <input type="text" class="form-control " placeholder="Your Full Name*" id="txtName" name="txtName"> -->
              <div class="form-group">
<!--                      <label>Name:</label>
                      <span class="required">*</span>-->
                      <input type="text" class="form-control " placeholder="Your Full Name*" id="txtName" name="txtName" value="<?php echo $strName; ?>" maxlength="60" autocomplete="off">
              </div>

            </div>
            <div class="form-group col-md-6">
              <!-- <label>Mobile No</label> -->
              <!-- <input type="text" class="form-control " placeholder="10 Digit Mobile Number*"> -->
              <div class="form-group">
                 <!--  <label>Mobile Number:</label> -->
                  <input type="text" class="form-control " id="txtMobile" placeholder="10 Digit Mobile Number*" name="txtMobile" value="<?php echo $strMobile; ?>" maxlength="10" autocomplete="off" onKeyPress="return isNumberKey(event);">
                </div>
            </div>
          <div class="form-group col-md-6">
            <!-- <label>Email Address</label> -->
            <!-- <input type="email" class="form-control " placeholder="Email Address*"> -->
                  <div class="form-group">
              <!-- <label>Email:</label>
              <span class="required">*</span> -->
            <input type="text" class="form-control " name="txtEmail" placeholder="Email Address*" id="txtEmail" value="<?php echo $strEmail; ?>" maxlength="60" autocomplete="off">
            </div>

          </div>
          <div class="form-group col-md-6">
            <!-- <label>Institute Name</label> -->
           <!--  <input type="text" class="form-control " placeholder="Institute Name"> -->
                  <div class="form-group">
              <!-- <label>Institute Name:</label>
              <span class="required">*</span> -->
            <input type="text" class="form-control " name="txtInstitute" placeholder="Institute Name" id="txtInstitute" value="<?php echo $strInstitute; ?>" maxlength="100" autocomplete="off">
            </div>
          </div>
          <!-- </div>
          </div>
          <div class="col-12">
          <div class="form-row"> -->
            <div class="form-group col-md-12">
              <!-- <label>Your Message</label> -->
              <!-- <textarea class="form-control " rows="5" placeholder="Your Message"></textarea> -->
              <div class="form-group">
                        <!-- <label class="screenreader " tabindex="16">Message:</label>
                        <span class="required">*</span> -->
                        <textarea class="form-control " rows="4" cols="10" maxlength="500" placeholder="Your Message" name="txtMessage" id="txtMessage"onKeyUp="return TextCounter('txtMessage','lblChar1',500)" onMouseUp="return TextCounter('txtMessage','lblChar1',500)"><?php echo $strMessage; ?></textarea>
                                                <span id="lblChar1" class="text-danger <?php echo $strNumLangCls; ?>"><?php echo $strMax500Charlbl; ?></span><span class="text-danger"> <?php echo $strCharlbl; ?> </span>
                      </div>
            </div>
    <div class="form-group col-md-12">

      <div class="row">
          <div class="col-sm-4 col-xs-12">
            <div class="form-group input-group-md">
              <input name="txtCaptcha" type="text" class="form-control "  id="txtCaptcha" autocomplete="off" onKeyUp="return blockspecialchar_first(this);" maxlength="20" placeholder="<?php echo $queryCaptcha;?>">
            </div>
          </div>

          <div class="col-sm-3 col-xs-10">
            <div class="captchaimg-sec screenreader">
              
              <div class="pull-left">
                <img src="<?php echo APP_URL;?>includes/captcha.php" alt="captcha image" align="absmiddle" style="" id="captchaImage"/>
              </div>
              
              <div class="pull-left refreshicon">
                <i class="fa fa-refresh" id="reload" onClick="generateCaptcha();" aria-hidden="true" style=""></i>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>

          <div class="col-sm-3 col-xs-10">
            <input type="submit" class="osda--btn btn--rounded btn-block" id="btnSubmit" name="btnSubmit" value="<?php echo $strSubmitlbl; ?>" onclick="return validate();"/>
          </div>
          </div>
      </div>
    </div>
    <div class="clear50"></div>
    <div class="clear50 hidden-xs hidden-1024"></div>
  </div>
</div>
</section>
    <!--end:: contarea-->

    <!--start::Footer-->
    <?php include 'include/footer.php' ?>

    </body>
</html>
<script type="text/javascript" language="javascript">
    
 
  $(document).ready(function () {
     
      <?php if($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>              
                viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
      <?php }  ?>
          
         TextCounter('txtMessage','lblChar1',500);
    
      
  });

    function validate()
     {
       //alert('xsacc');
        if (!blankCheck('txtName', 'Please enter your name'))
            return false;
        if (!checkSpecialChar('txtName'))
            return false;
        if (!maxLength('txtName', 100, 'Name'))
            return false;
          if (!blankCheck('txtMobile', 'Please enter your Mobile Number'))
           return false;        
        if (!checkSpecialChar('txtMobile'))
           return false;
        if (!validMobileNo('txtMobile','Enter a valid mobile no'))
           return false; 
        if (!maxLength('txtMobile', 10, 'Mobile no'))
           return false;    
        if (!blankCheck('txtEmail', 'Please enter your email'))
           return false;
        if (!checkSpecialChar('txtEmail'))
           return false;
        if (!validEmail('txtEmail'))
           return false; 
        if (!maxLength('txtEmail', 50, 'Email'))
           return false;        
            
        /*if (!blankCheck('txtInstitute', 'Please enter Institute Name'))
           return false;
         if (!blankCheck('txtMessage', 'Please enter Message'))
           return false;*/
        if (!checkSpecialChar('txtMessage'))
           return false;    
       if (!maxLength('txtMessage', 500, 'feedback message'))
            return false;
        if (!blankCheck('txtCaptcha', 'Captcha can not be left blank'))
            return false;
       
     }
  </script>
