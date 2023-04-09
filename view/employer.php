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
<!-- 
<script src="<?php echo APP_URL; ?>js/loadComponent.js"></script>
<script src="<?php echo APP_URL; ?>js/loadAjax.js"></script> -->


<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/contact-us.css">
<script src="<?php echo SITE_URL; ?>js/chosen.jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/chosen.min.css">
<script type="text/javascript">
$(document).ready(function () {
    $(".chosen-select").chosen({max_selected_options: 5,width: "100%",class: "form-control"});
});
</script>
<form name="frmOsda" id="frmOsda"  method="post" action="" enctype="multipart/form-data" autocomplete="off">
<!--start:: contarea-->

  <section class="container contarea">
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="row">
            <div class="col-12 col-sm-6 col-lg-6 p-3 p-md-4 flex-item-center">
              <a href="tel:+91-0674-2394415" class="text-dark">
              <i class="fa fa-phone fa-2x text-info"></i>
              <h3 <?php echo $odiaClass;?>><?php echo $phone;?></h3>
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
        <div class="col-12"><h3>Want to hire from the world's best pool of skilled resources?
        <small class="d-block mb-5"><strong>Write to us with your requirement, our officers will get in touch with you.</strong></small>
        </h3></div>
        <div class="col-12">
           <div class="form-row">
            <div class="form-group col-md-6">
              <!-- <label>Company Name</label> -->
             <div class="form-group">
                    
                      <input type="text" class="form-control " placeholder="Company Name*" id="txtCompanyName" name="txtCompanyName" value="<?php echo $strCompanyName; ?>" maxlength="60" autocomplete="off">
            </div>
            </div>
            <div class="form-group col-md-6">
              <!-- <label>Your Name</label> -->
              <div class="form-group">
               <input type="text" class="form-control " placeholder="Your Full Name*" id="txtName" name="txtName" value="<?php echo $strName; ?>" maxlength="60" autocomplete="off">
            </div>
            </div>
            <div class="form-group col-md-6">
              <!-- <label>Company Email Address</label> -->
                <div class="form-group">
            <input type="text" class="form-control " name="txtEmail" placeholder="Enter Valid Email Address*" id="txtEmail" value="<?php echo $strEmail; ?>" maxlength="60" autocomplete="off">
            </div>
            </div>
            <div class="form-group col-md-6">
              <!-- <label>Mobile No</label> -->
            <div class="form-group">
                 <input type="text" class="form-control " id="txtMobile" placeholder="10 Digit Mobile Number*" name="txtMobile" value="<?php echo $strMobile; ?>" maxlength="10" autocomplete="off" onKeyPress="return isNumberKey(event);">
                </div> 
            </div>


            <div class="form-group col-md-6">
              <!-- <label>Designation</label> -->
             <div class="form-group">
            <input type="text" class="form-control " name="txtDesignation" placeholder="Enter Designation" id="txtDesignation" value="<?php echo $strDesignation; ?>" maxlength="60" autocomplete="off">
            </div>
            </div>

<!--               <div class="form-group col-md-6">
               <label>Which skill-set you are looking for?</label> 
              <select class="form-control " name="selSector" id="selSector">
                <option value=0>--Which sector you are looking for?--</option>
                  <option value=1>ITI</option>
                <option value=2>Diploma</option>
                <option value=3>Engineer</option>
                <option value=4>Others</option>  
              </select>
            </div>-->


<!--             <div class="form-group col-md-6">
              <select class="form-control " name="selSkills" id="selSkills">
                <option value=0>--Which course you are looking for?--</option>
                  <option value=1>ITI</option>
                <option value=2>Diploma</option>
                <option value=3>Engineer</option>
                <option value=4>Others</option>  
              </select>
            </div> -->
                <div class="col-12 col-md-6 form-group">
                <select class="form-control chosen-select <?php echo $strLangCls;?>" data-placeholder="Which skill-set you are looking for?" multiple size="5" id="selSkills" name="selSkills[]">
                    
                      <?php    
                                if ($skillResults->num_rows > 0) {

                                    while ($skillRow = $skillResults->fetch_array()) {         
                            ?>
                                
                      <option class="<?php echo $strLangCls;?>"><?php echo ($_SESSION['lang']=='O' && $skillRow['vchSkillNameO']!='')?$skillRow['vchSkillNameO']:htmlspecialchars_decode($skillRow['vchSkillName'], ENT_QUOTES); ?></option>
                        <?php              } 
                                    } 
                             ?>
                    </select>
                  </div>

            <div class="form-group col-md-6">
              <!-- <label>How many candidates you are planning to hire?</label> -->
              <select class="form-control " name="selCandidates" id="selCandidates" onchange="//addText(this);">
                <option value=0>--How many candidates you are planning to hire?--</option>
                <option value=1>0-10</option>
                <option value=2>11-20</option>
                <option value=3>21-50</option>
                <option value=4>50-100</option>
                <option value=5>100+</option>
              </select>
            </div>
        
          <!-- <div class="form-row"> -->
            <div class="form-group col-md-12">
              <!-- <label>Your Message</label> -->
               <div class="form-group">
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
<script type="text/javascript">
    
 
  $(document).ready(function () {
     
      <?php if($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>              
                viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
      <?php }  ?>
          
         TextCounter('txtMessage','lblChar1',500);


      fillSector('<?php echo $intType; ?>','selSector');
      fillCourse('<?php echo $intType; ?>','selSkills');
      
  });

    function validate()
     {
       //alert('xsacc');
       if (!blankCheck('txtCompanyName', 'Please enter Company Name'))
            return false;
        if (!checkSpecialChar('txtCompanyName'))
            return false;
        if (!maxLength('txtCompanyName', 60, 'Name'))
            return false;
        if (!blankCheck('txtName', 'Please enter your name'))
            return false;
        if (!checkSpecialChar('txtName'))
            return false;
        if (!maxLength('txtName', 60, 'Name'))
            return false;
           
        if (!blankCheck('txtEmail', 'Please enter your email'))
           return false;
        if (!checkSpecialChar('txtEmail'))
           return false;
        if (!validEmail('txtEmail'))
           return false; 
        if (!maxLength('txtEmail', 60, 'Email'))
           return false;      
       if (!blankCheck('txtMobile', 'Please enter your Mobile Number'))
           return false;        
        if (!checkSpecialChar('txtMobile'))
           return false;
        if (!validMobileNo('txtMobile','Enter a valid mobile no'))
           return false; 
        if (!maxLength('txtMobile', 10, 'Mobile no'))
           return false;   
            
        /*if (!blankCheck('txtDesignation', 'Enter Designation'))
           return false;*/
         if (!checkSpecialChar('txtDesignation'))
            return false;
        if (!maxLength('txtDesignation', 60, 'Name'))
            return false;

          /*if (!selectDropdown('selSkills', 'Please choose a Skill'))
           return false;
         if (!selectDropdown('selCandidates', 'Please choose Number Of Candidates'))
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
     
    /*Function to add some extra text to candidate field*/ 
     function addText(elmId){
         var id=$(elmId).attr('id');
        
         var txt=$('#'+id+' option:selected').text();
         
         $('#'+id+' option:selected').text(txt+ ' no. of candidates');
         
         
     }
  </script>

         