<?php
/*plugin*/
/*
  Website Name : Odisha Skill Developement Authority (OSDA)

 */
?>

<!doctype html>
<html lang="en">
    <?php include 'include/header.php' ?>


    <script src="<?php echo APP_URL; ?>js/loadComponent.js"></script>
    <script src="<?php echo APP_URL; ?>js/loadAjax.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/contact-us.css">
    <script src="<?php echo SITE_URL; ?>js/chosen.jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/chosen.min.css">
    <script type="text/javascript">
        $(document).ready(function () {
            $(".chosen-select").chosen({max_selected_options: 5, width: "100%", class: "form-control"});
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
                                 <h3 class="<?php echo $odiaClass;?>"><?php echo $strPhonelbl;?></h3>
                                <p class="<?php echo $strNumLangCls;?>">0674-2394415</p></a>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-6 p-3 p-md-4 flex-item-center">
                            <a href="mailto:osdabbsr.od@gov.in" class="text-dark"><i class="fa fa-envelope-o fa-2x text-info"></i>
                              <h3 class="<?php echo $odiaClass;?>"><?php echo $strEmaillbl;?></h3>
                                <p>osdabbsr.od@gov.in</p></a>
                        </div>

                        <div class="col-12 col-sm-12 col-lg-12 p-3 p-md-4 flex-item-center">
                            <i class="fa fa-address-card-o fa-2x text-info"></i>
                            <p class="<?php echo $odiaClass;?>"><?php echo $strContactAddrslbl1; ?> <?php echo $strContactAddrslbl2; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <iframe src="https://www.google.com/maps/embed/v1/place?q=Rajib+Bhavan,+Bhubaneswar,+Odisha&amp;key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
                </div>
            </div>

            <div class="tabsec">
                <nav>
                    <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link <?php echo ($activeTab == 'student') ? 'active' : ''; ?> <?php echo $odiaClass;?>" id="nav-Process-tab" data-toggle="tab" href="#nav-Process" role="tab" aria-controls="nav-Process" aria-selected="true"><?php echo $strStudentlbl;?></a>
                        <a class="nav-item nav-link <?php echo ($activeTab == 'employer') ? 'active' : ''; ?> <?php echo $odiaClass;?>" id="nav-Meet-tab" data-toggle="tab" href="#nav-Meet" role="tab" aria-controls="nav-Meet" aria-selected="false"><?php echo $strEmployerlbl;?></a>
                        <a class="nav-item nav-link <?php echo ($activeTab == 'training') ? 'active' : ''; ?> <?php echo $odiaClass;?>" id="nav-Register-tab" data-toggle="tab" href="#nav-Register" role="tab" aria-controls="nav-Register" aria-selected="false"><?php echo $strTrainPartnerslbl;?></a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">

                    <div class="tab-pane fade <?php echo ($activeTab == 'student') ? 'show active' : ''; ?>" id="nav-Process" role="tabpanel" aria-labelledby="nav-Process-tab">
                        <h2 class="text-center <?php echo $odiaClass;?>"><?php echo $strStudentlbl;?></h2>
                        <div class="row box-shadow p-2 pt-4 pb-4 p-md-4 mt-4 mt-md-0 br-5 mt-md-4">
                            <div class="col-12"><h3 class="<?php echo $odiaClass;?>"><?php echo $home45;?>
                                    <small class="d-block mb-5"><strong class="<?php echo $odiaClass;?>"><?php echo $home46;?></strong></small>
                                </h3></div>

                            <div class="col-12">
                                <div class="form-row">


                                    <div class="form-group col-md-6">
                                        <!-- <label>Your Name</label> -->
                                        <div class="form-group">

                                            <input type="text" class="form-control form-input" placeholder="<?php echo $home47; ?>" id="txtName" name="txtName" value="<?php echo $strName; ?>" maxlength="60" autocomplete="off">
                                            <span class="mandatory">*</span>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <!-- <label>Mobile No</label> -->
                                        <div class="form-group">

                                            <input type="text" class="form-control form-input" id="txtMobile" placeholder="<?php echo $home48; ?>" name="txtMobile" value="<?php echo $strMobile; ?>" maxlength="10" autocomplete="off" onKeyPress="return isNumberKey(event);">
                                        <span class="mandatory">*</span>
                                        </div>            
                                    </div>



                                    <div class="form-group col-md-6">
                                        <!-- <label>Email Address</label> -->
                                        <div class="form-group">
                                            <input type="text" class="form-control form-input" name="txtEmail" placeholder="<?php echo $home49; ?>" id="txtEmail" value="<?php echo $strEmail; ?>" maxlength="60" autocomplete="off">
                                        </div>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <!-- <label>District</label> -->
                                        <select class="form-control form-input <?php echo $strLangCls; ?>" name="selDistrict" id="selDistrict">
                                            <option>--<?php echo $strAllDistlbl; ?>--</option>
                                            <!-- <option>Khurda</option>
                                            <option>Kendrapar</option>
                                            <option>Balasore</option>
                                            <option>Kalahandi</option> -->
                                        </select>
                                        <span class="mandatory">*</span>
                                    </div>

                                    <!-- <div class="form-row"> -->
                                    <div class="form-group col-md-12">
                                        <!-- <label>Your Message</label> -->
                                        <div class="form-group">
                                            <textarea class="form-control form-input" rows="4" cols="10" maxlength="500" placeholder="<?php echo $home50; ?>" name="txtMessage" id="txtMessage"onKeyUp="return TextCounter('txtMessage', 'lblChar1', 500)" onMouseUp="return TextCounter('txtMessage', 'lblChar1', 500)"><?php echo $strMessage; ?></textarea>
                                            <span id="lblChar1" class="text-danger <?php echo $strNumLangCls; ?>"><?php echo $strMax500Charlbl; ?></span><span class="text-danger"> <?php echo $strCharlbl; ?> </span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">

                                        <div class="row">
                                            <div class="col-sm-4 col-xs-12">
                                                <div class="form-group input-group-md">
                                                    <input name="txtCaptcha" type="text" class="form-control form-input"  id="txtCaptcha" autocomplete="off" onKeyUp="return blockspecialchar_first(this);" maxlength="20" placeholder="<?php echo $queryCaptcha; ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-4 col-xs-10">
                                                <div class="captchaimg-sec screenreader">

                                                    <div class="pull-left">
                                                        <img src="<?php echo APP_URL; ?>includes/captcha.php" alt="captcha image" align="absmiddle" style="" id="captchaImage"/>
                                                    </div>

                                                    <div class="pull-left refreshicon">
                                                        <i class="fa fa-refresh" id="reload" onClick="generateFormCaptcha('captchaImage');" aria-hidden="true" style=""></i>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>

                                            <div class="col-sm-3 col-xs-10">
                                                <input type="submit" class="osda--btn btn--rounded btn-block" id="btnSubmit" name="student-submit" value="<?php echo $strSubmitlbl; ?>" onclick="return validateStudentForm();"/>
                                            </div>
                                        </div>
                                    </div>


                                </div>


                                <div class="clear50"></div>


                                <div class="clear50 hidden-xs hidden-1024"></div>

                            </div>
                        </div> 
                    </div>

                    
                    

                    <div class="tab-pane fade <?php echo ($activeTab == 'employer') ? 'show active' : ''; ?>" id="nav-Meet" role="tabpanel" aria-labelledby="nav-Meet-tab">
                        <h2 class="text-center <?php echo $odiaClass;?>"><?php echo $strEmployerlbl;?></h2>
                        <div class="row box-shadow p-2 pt-4 pb-4 p-md-4 mt-4 mt-md-0 br-5 mt-md-4">
                            <div class="col-12"><h3 class="<?php echo $odiaClass;?>"><?php echo $home51;?>
                                    <small class="d-block mb-5"><strong class="<?php echo $odiaClass;?>"><?php echo $home52;?></strong></small>
                                </h3></div>
                            <div class="col-12">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <!-- <label>Company Name</label> -->
                                        <div class="form-group">

                                            <input type="text" class="form-control " placeholder="<?php echo $home55;?>" id="txtCompanyName" name="txtCompanyName" value="<?php echo $strCompanyName; ?>" maxlength="60" autocomplete="off">
                                         <span class="mandatory">*</span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <!-- <label>Your Name</label> -->
                                        <div class="form-group">
                                            <input type="text" class="form-control " placeholder="<?php echo $home47; ?>" id="txtNameEmp" name="txtNameEmp" value="<?php echo $strNameEmp; ?>" maxlength="60" autocomplete="off">
                                        </div>
                                         <span class="mandatory">*</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <!-- <label>Company Email Address</label> -->
                                        <div class="form-group">
                                            <input type="text" class="form-control " name="txtEmailEmp" placeholder="<?php echo $home49; ?>" id="txtEmailEmp" value="<?php echo $strEmailEmp; ?>" maxlength="60" autocomplete="off">
                                        </div>
                                         <span class="mandatory">*</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <!-- <label>Mobile No</label> -->
                                        <div class="form-group">
                                            <input type="text" class="form-control " id="txtMobileEmp" placeholder="<?php echo $home48; ?>" name="txtMobileEmp" value="<?php echo $strMobileEmp; ?>" maxlength="10" autocomplete="off" onKeyPress="return isNumberKey(event);">
                                        </div> 
                                         <span class="mandatory">*</span>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <!-- <label>Designation</label> -->
                                        <div class="form-group">
                                            <input type="text" class="form-control " name="txtDesignation" placeholder="<?php echo $home56; ?>" id="txtDesignation" value="<?php echo $strDesignation; ?>" maxlength="60" autocomplete="off">
                                        </div>
                                    </div>                
                                    <div class="col-12 col-md-6 form-group">
                                        <select class="form-control chosen-select <?php echo $strLangCls; ?>" data-placeholder="<?php echo $home57; ?>" multiple size="5" id="selSkills" name="selSkills[]">

                                            <?php
                                            if ($skillResults->num_rows > 0) {

                                                while ($skillRow = $skillResults->fetch_array()) {

                                                    $skillVal = htmlspecialchars_decode($skillRow['vchSkillName'], ENT_QUOTES);
                                                    $selected = (in_array($skillVal, $skillAry)) ? 'selected' : '';
                                                    ?>

                                                    <option class="<?php echo $strLangCls; ?>" value="<?php echo htmlspecialchars_decode($skillRow['vchSkillName'], ENT_QUOTES); ?>" <?php echo $selected; ?>><?php echo ($_SESSION['lang'] == 'O' && $skillRow['vchSkillNameO'] != '') ? $skillRow['vchSkillNameO'] : htmlspecialchars_decode($skillRow['vchSkillName'], ENT_QUOTES); ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <?php
                                        $valAry = array(0, 1, 2, 3, 4, 5);
                                        ?>
                                        <!-- <label>How many candidates you are planning to hire?</label> -->
                                        <select class="form-control " name="selCandidates" id="selCandidates" onchange="//addText(this);">
                                            <option value="0" ><?php echo $home58; ?></option>
                                            <option value="1" <?php echo ($strCandidates == 1) ? 'selected' : ''; ?>>0-10</option>
                                            <option value="2" <?php echo ($strCandidates == 2) ? 'selected' : ''; ?>>11-20</option>
                                            <option value="3" <?php echo ($strCandidates == 3) ? 'selected' : ''; ?>>21-50</option>
                                            <option value="4" <?php echo ($strCandidates == 4) ? 'selected' : ''; ?>>50-100</option>
                                            <option value="5" <?php echo ($strCandidates == 5) ? 'selected' : ''; ?>>100+</option>
                                        </select>
                                    </div>

                                    <!-- <div class="form-row"> -->
                                    <div class="form-group col-md-12">
                                        <!-- <label>Your Message</label> -->
                                        <div class="form-group">
                                            <textarea class="form-control " rows="4" cols="10" maxlength="500" placeholder="<?php echo $home50; ?>" name="txtMessageEmp" id="txtMessageEmp" onKeyUp="return TextCounter('txtMessageEmp', 'lblChar2', 500)" onMouseUp="return TextCounter('txtMessageEmp', 'lblChar2', 500)"><?php echo $strMessageEmp; ?></textarea>
                                            <span id="lblChar2" class="text-danger <?php echo $strNumLangCls; ?>"><?php echo $strMax500Charlbl; ?></span><span class="text-danger"> <?php echo $strCharlbl; ?> </span>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">

                                        <div class="row">
                                            <div class="col-sm-4 col-xs-12">
                                                <div class="form-group input-group-md">
                                                    <input name="txtCaptchaEmp" type="text" class="form-control "  id="txtCaptchaEmp" autocomplete="off" onKeyUp="return blockspecialchar_first(this);" maxlength="20" placeholder="<?php echo $queryCaptcha; ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-4 col-xs-10">
                                                <div class="captchaimg-sec screenreader">

                                                    <div class="pull-left">
                                                        <img src="<?php echo APP_URL; ?>includes/captcha.php" alt="captcha image" align="absmiddle" style="" id="captchaImageEmp"/>
                                                    </div>

                                                    <div class="pull-left refreshicon">
                                                        <i class="fa fa-refresh" id="reload" onClick="generateFormCaptcha('captchaImageEmp');" aria-hidden="true" style=""></i>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>

                                            <div class="col-sm-3 col-xs-10">
                                                <input type="submit" class="osda--btn btn--rounded btn-block" id="btnSubmitEmp" name="employer-submit" value="<?php echo $strSubmitlbl; ?>" onclick="return validateEmployerForm();"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear50"></div>
                                <div class="clear50 hidden-xs hidden-1024"></div>
                            </div>
                        </div>
                    </div>   


                    <div class="tab-pane fade <?php echo ($activeTab == 'training') ? 'show active' : ''; ?>" id="nav-Register" role="tabpanel" aria-labelledby="nav-Register-tab">
                        <h2 class="text-center <?php echo $odiaClass;?>"><?php echo $strTrainPartnerslbl;?></h2>
                        <div class="row box-shadow p-2 pt-4 pb-4 p-md-4 mt-4 mt-md-0 br-5 mt-md-4">


                            <div class="col-12"> 
                                <h3 class="<?php echo $odiaClass;?>"><?php echo $home53;?>
                                    <small class="d-block mb-5"><strong class="<?php echo $odiaClass;?>"><?php echo $home54;?></strong></small>
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
                                            <input type="text" class="form-control " placeholder="<?php echo $home47; ?>" id="txtNameTrn" name="txtNameTrn" value="<?php echo $strNameTrn; ?>" maxlength="60" autocomplete="off">
                                         <span class="mandatory">*</span>
                                        </div>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <!-- <label>Mobile No</label> -->
                                        <!-- <input type="text" class="form-control " placeholder="10 Digit Mobile Number*"> -->
                                        <div class="form-group">
                                            <!--  <label>Mobile Number:</label> -->
                                            <input type="text" class="form-control " id="txtMobileTrn" placeholder="<?php echo $home48; ?>" name="txtMobileTrn" value="<?php echo $strMobileTrn; ?>" maxlength="10" autocomplete="off" onKeyPress="return isNumberKey(event);">
                                         <span class="mandatory">*</span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <!-- <label>Email Address</label> -->
                                        <!-- <input type="email" class="form-control " placeholder="Email Address*"> -->
                                        <div class="form-group">
                                            <!-- <label>Email:</label>
                                            <span class="required">*</span> -->
                                            <input type="text" class="form-control " name="txtEmailTrn" placeholder="<?php echo $home49; ?>" id="txtEmailTrn" value="<?php echo $strEmailTrn; ?>" maxlength="60" autocomplete="off">
                                         <span class="mandatory">*</span>
                                        </div>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <!-- <label>Institute Name</label> -->
                                       <!--  <input type="text" class="form-control " placeholder="Institute Name"> -->
                                        <div class="form-group">
                                            <!-- <label>Institute Name:</label>
                                            <span class="required">*</span> -->
                                            <input type="text" class="form-control " name="txtInstitute" placeholder="<?php echo $home59;?>" id="txtInstitute" value="<?php echo $strInstitute; ?>" maxlength="100" autocomplete="off">
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
                                            <textarea class="form-control " rows="4" cols="10" maxlength="500" placeholder="<?php echo $home50; ?>" name="txtMessageTrn" id="txtMessageTrn" onKeyUp="return TextCounter('txtMessageTrn', 'lblChar3', 500)" onMouseUp="return TextCounter('txtMessageTrn', 'lblChar3', 500)"><?php echo $strMessageTrn; ?></textarea>
                                            <span id="lblChar3" class="text-danger <?php echo $strNumLangCls; ?>"><?php echo $strMax500Charlbl; ?></span><span class="text-danger"> <?php echo $strCharlbl; ?> </span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">

                                        <div class="row">
                                            <div class="col-sm-4 col-xs-12">
                                                <div class="form-group input-group-md">
                                                    <input name="txtCaptchaTrn" type="text" class="form-control "  id="txtCaptchaTrn" autocomplete="off" onKeyUp="return blockspecialchar_first(this);" maxlength="20" placeholder="<?php echo $queryCaptcha; ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-4 col-xs-10">
                                                <div class="captchaimg-sec screenreader">

                                                    <div class="pull-left">
                                                        <img src="<?php echo APP_URL; ?>includes/captcha.php" alt="captcha image" align="absmiddle" style="" id="captchaImageTrn"/>
                                                    </div>

                                                    <div class="pull-left refreshicon">
                                                        <i class="fa fa-refresh" id="reload" onClick="generateFormCaptcha('captchaImageTrn');" aria-hidden="true" style=""></i>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>

                                            <div class="col-sm-3 col-xs-10">
                                                <input type="submit" class="osda--btn btn--rounded btn-block" id="btnSubmitTrn" name="training-submit" value="<?php echo $strSubmitlbl; ?>" onclick="return validateTaineeForm();"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear50"></div>
                                <div class="clear50 hidden-xs hidden-1024"></div>
                            </div>
                        </div> 
                    </div>


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

<?php if ($outMsgD != '') { ?>
            viewAlert('<?php echo $outMsgD; ?>', '', '<?php echo $redirectLoc; ?>');
<?php } ?>

        TextCounter('txtMessage', 'lblChar1', 500);
        fillDistricts('<?php echo $selDistrict; ?>', 'selDistrict');
        setTimeout(function(){
          $("#selDistrict option").each(function() {
            if($(this).text() != "--Select District--")
              $(this).val($(this).text());            
                                 
        });  
        
        },300);
        
        /*$('.date-picker').datepicker({
         autoclose: true,
         todayHighlight: true
         });*/

    });

    function validateStudentForm()
    {
        //alert('xsacc');
        if (!blankCheck('txtName', 'Please enter your name'))
            return false;
        if (!checkSpecialChar('txtName'))
            return false;
        if (!maxLength('txtName', 60, 'Name'))
            return false;
        if (!blankCheck('txtMobile', 'Please enter your Mobile Number'))
            return false;
        if (!checkSpecialChar('txtMobile'))
            return false;
        if (!validMobileNo('txtMobile', 'Enter a valid mobile no'))
            return false;
        if (!maxLength('txtMobile', 10, 'Mobile no'))
            return false;
        /*if (!blankCheck('txtEmail', 'Please enter your email'))
         return false;*/
        if (!checkSpecialChar('txtEmail'))
            return false;
        if (!validEmail('txtEmail'))
            return false;
        if (!maxLength('txtEmail', 60, 'Email'))
            return false;

        if (!selectDropdown('selDistrict', 'Please choose a District'))
            return false;
        /*if (!blankCheck('txtMessage', 'Please enter Message'))
         return false;*/
        if (!checkSpecialChar('txtMessage'))
            return false;
        if (!maxLength('txtMessage', 500, 'feedback message'))
            return false;
        if (!blankCheck('txtCaptcha', 'Captcha can not be left blank'))
            return false;

    }

    function validateEmployerForm()
    {
        //alert('xsacc');
        if (!blankCheck('txtCompanyName', 'Please enter Company Name'))
            return false;
        if (!checkSpecialChar('txtCompanyName'))
            return false;
        if (!maxLength('txtCompanyName', 60, 'Name'))
            return false;
        if (!blankCheck('txtNameEmp', 'Please enter your name'))
            return false;
        if (!checkSpecialChar('txtNameEmp'))
            return false;
        if (!maxLength('txtNameEmp', 60, 'Name'))
            return false;

        if (!blankCheck('txtEmailEmp', 'Please enter your email'))
            return false;
        if (!checkSpecialChar('txtEmailEmp'))
            return false;
        if (!validEmail('txtEmailEmp'))
            return false;
        if (!maxLength('txtEmailEmp', 60, 'Email'))
            return false;
        if (!blankCheck('txtMobileEmp', 'Please enter your Mobile Number'))
            return false;
        if (!checkSpecialChar('txtMobileEmp'))
            return false;
        if (!validMobileNo('txtMobileEmp', 'Enter a valid mobile no'))
            return false;
        if (!maxLength('txtMobileEmp', 10, 'Mobile no'))
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
         return false;*/

        /* if (!blankCheck('txtMessage', 'Please enter Message'))
         return false;*/
        if (!checkSpecialChar('txtMessage'))
            return false;
        if (!maxLength('txtMessage', 500, 'Message'))
            return false;
        if (!blankCheck('txtCaptchaEmp', 'Captcha can not be left blank'))
            return false;

    }

    function validateTaineeForm()
    {
        //alert('xsacc');
        if (!blankCheck('txtNameTrn', 'Please enter your name'))
            return false;
        if (!checkSpecialChar('txtNameTrn'))
            return false;
        if (!maxLength('txtNameTrn', 100, 'Name'))
            return false;
        if (!blankCheck('txtMobileTrn', 'Please enter your Mobile Number'))
            return false;
        if (!checkSpecialChar('txtMobileTrn'))
            return false;
        if (!validMobileNo('txtMobileTrn', 'Enter a valid mobile no'))
            return false;
        if (!maxLength('txtMobileTrn', 10, 'Mobile no'))
            return false;
        if (!blankCheck('txtEmailTrn', 'Please enter your email'))
            return false;
        if (!checkSpecialChar('txtEmailTrn'))
            return false;
        if (!validEmail('txtEmailTrn'))
            return false;
        if (!maxLength('txtEmailTrn', 50, 'Email'))
            return false;

        /*if (!blankCheck('txtInstitute', 'Please enter Institute Name'))
         return false;
         if (!blankCheck('txtMessage', 'Please enter Message'))
         return false;*/
        if (!checkSpecialChar('txtMessageTrn'))
            return false;
        if (!maxLength('txtMessageTrn', 500, 'feedback message'))
            return false;
        if (!blankCheck('txtCaptchaTrn', 'Captcha can not be left blank'))
            return false;

    }
    
    function generateFormCaptcha(ctrlId)
        {
            var ranNo = Math.floor((Math.random() * 100) + 1);
            $('#'+ctrlId).attr('src', '<?php echo APP_URL; ?>includes/captcha.php?' + ranNo);
        }
</script>
