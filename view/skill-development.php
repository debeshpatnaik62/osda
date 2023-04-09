<?php
/*plugin*/

/* ================================================
  File Name             : skill-development.php
  Description        : This is to register for skill development
  Date Created       :
  Created By         : Rahul kumar saw
  Developed by       : Rahul Kumar Saw
  Developed on       : 14-July-2020
  Update History        :
  <Updated by>          <Updated On>      <Remarks>

  ================================================== */
?>
<!doctype html>
<html lang="en">

<?php include 'include/header.php' ?>

<script src="<?php echo APP_URL; ?>js/loadComponent.js"></script>
<script src="<?php echo APP_URL; ?>js/loadAjax.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/feedback.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/nano-unicorn.css">
<style type="text/css">
   .sapForm {display: none;}
   .courseraForm {display: none;}
</style>

<form name="frmOsda" id="frmOsda" method="post" action="" enctype="multipart/form-data" autocomplete="off">
   <section class="container contarea">
      <h2 class="text-center"><?php echo $regdMsg; ?></h2>
      <!-- <div class="tabsec">
         <nav class="mb-0">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
               <a class="nav-item nav-link active" href="<?php echo SITE_URL;?>skill-development">Student Registration</a>
               <a class="nav-item nav-link" href="<?php echo SITE_URL;?>skill-training-partner">Training Partner Registration</a>
               <a class="nav-item nav-link" href="<?php echo SITE_URL;?>skill-institute">Institution Registration</a>
            </div>
         </nav>
      </div> -->
      <div class="feedback pt-4 mb-4" id="selectCoursesought">
         <div class="row">
            <div class="col-md-4 form-group mx-auto">
               <div id="coursesought" style="display: none;">
                  <label for="coursera"><?php echo $sought; ?> :</label>
                  <span class="required">*</span>
                  <select class="form-control" name="coursera" id="coursera">
                     <option value="">-Select-</option>
                     <!-- <option value="Coursera">Coursera </option>
                     <option value="SAP ERP">SAP ERP </option> -->
                  </select>
               </div>
            </div>
         </div>
      </div>
      <div class="defaultShow" id="information-wrapper" style="display:none;">
         <div class="card px-4 py-2">
            <h4 class="mb-4"><?php echo $information; ?> :</h4>
            <ol class="mb-0 courseraForm">
               <li><?php echo $information1; ?></li>
               <li><?php echo $information2; ?></li>
               <li><?php echo $information3; ?></li>
               <li><?php echo $information4; ?></li>
               <li><?php echo $information5; ?></li>
               <li><?php echo $information6; ?></li>
               <li><a href="<?php echo SITE_URL;?>images/Most_Sought_after_Course_List_as_suggested_by_Coursera.pdf" target="_blank" ><?php echo $information7; ?></li></a>
            </ol>

            <ol class="mb-0 sapForm">
               <li><?php echo $informationSap1; ?></li>
               <li><?php echo $informationSap2; ?></li>
               <li><?php echo $informationSap3; ?></li>
               <li><?php echo $informationSap4; ?></li>
               <li><?php echo $informationSap5; ?></li>
               <li><?php echo $informationSap6; ?></li>
               <li><?php echo $informationSap7; ?></li>
               <li><?php echo $informationSap8; ?></li>
               <li><?php echo $informationSap9; ?></li>
               <li><?php echo $informationSap10; ?></li>
               <li><?php echo $informationSap11; ?></li>
               <li><a href="<?php echo SITE_URL;?>images/Course_List_SAP.pdf" target="_blank" ><?php echo $informationSap12; ?></li></a>

            </ol>
         </div>
          <div class="pt-3 text-right">
            <input type="button" class="osda--btn btn--rounded px-5" id="btnNext" name="btnNext" value="Next">
         </div> 
      </div>

      <div>

         <div class="feedback pt-4" id="form-wrapper" style="display:none;">

            <div class="row">
               <div class="col-md-6 form-group mx-auto">
                  <div>
                     <label for="selectedCourse"><?php echo $sought; ?> :</label>
                     <select class="form-control" name="selectedCourse" id="selectedCourse" disabled>
                        <!-- <option value="Coursera">Coursera </option>
                        <option value="SAP ERP">SAP ERP </option> -->
                     </select>
                  </div>
               </div>
               <div class="col-md-6 form-group defaultShow" style="display: none">
                  <label><?php echo $skillName1; ?>:</label>
                  <span class="required">*</span>
                  <input type="text" class="form-control" id="txtName" placeholder="<?php echo $enterhere; ?>" name="txtName" value="<?php echo $strName; ?>" maxlength="100" autocomplete="off">
               </div>
               <div class="col-md-6 form-group defaultShow" style="display: none">
                  <label><?php echo $skiEmail; ?>:</label>
                  <span class="required">*</span>
                  <input type="text" class="form-control" name="txtEmail" placeholder="<?php echo $enterhere; ?>" id="txtEmail" value="<?php echo $strEmail; ?>" maxlength="50" autocomplete="off">
               </div>

               <!-- <div class="row sapForm" style="display:none;"> -->
               <div class="col-md-6 form-group sapForm" >
                  <label><?php echo $mobileNo;?>:</label>
                  <span class="required">*</span>
                  <input type="text" class="form-control" name="txtMobile" placeholder="<?php echo $enterhere; ?>" id="txtMobile" value="<?php echo $txtPhone; ?>" maxlength="10" autocomplete="off" onKeyPress="return isNumberKey(event)";>
               </div>

               <div class="col-md-6 form-group sapForm">
                  <label><?php echo $colInstitue;?>:
                  </label> <span class="required">*</span>
                   <select class="form-control <?php echo $strLangCls; ?>" name="selInstituteName" id="selInstituteName" onchange="fillInstituteProgram('<?php echo $selInterestCourse;?>','selInterestCourse',this.value);">
                     <option value="0">-<?php echo $select;?>-</option>
                  </select>
               </div>

               <div class="col-md-6 form-group otherInstitute " style="display:none;">
                  <label><?php echo $otherInstitute;?>:</label> <span class="required">*</span>
                  <input type="text" class="form-control" name="txtOtherInstName" id="txtOtherInstName" placeholder="<?php echo $enterhere; ?>" maxlength="200" autocomplete="off" value="<?php echo $txtOtherInstName;?>">
               </div>

               <div class="col-md-6 form-group sapForm">
                  <label><?php echo $colRedgId;?>:</label>
                  <!-- <span class="required">*</span> -->
                  <input type="text" class="form-control" name="txtRegdNumber" placeholder="<?php echo $enterhere; ?>" id="txtRegdNumber" value="<?php echo $txtRegdNumber;?>" maxlength="20" autocomplete="off">
               </div>
               

               <div class="col-md-6 form-group sapForm">
                  <label><?php echo $strCourses;?>:
                  </label> <span class="required">*</span>
                   <select class="form-control <?php echo $strLangCls; ?>" name="selCourse" id="selCourse">
                     <option value="0">-<?php echo $select;?>-</option>
                  </select>
               </div>
               <div class="col-md-6 form-group otherCourse" style="display:none;">
                  <label><?php echo $otherCourse;?>:</label> <span class="required">*</span>
                  <input type="text" class="form-control" name="txtOtherCourseName" id="txtOtherCourseName" placeholder="<?php echo $enterhere; ?>" maxlength="200" autocomplete="off" value="<?php echo $txtOtherCourseName;?>">
               </div>

               <div class="col-md-6 form-group sapForm">
                  <label><?php echo $branch;?>:
                  </label> <span class="required">*</span>
                   <select class="form-control <?php echo $strLangCls; ?>" name="selBranch" id="selBranch">
                     <option value="0">-<?php echo $select;?>-</option>
                  </select>
               </div>

               <div class="col-md-6 form-group sapForm">
                  <label><?php echo $semester;?>:
                  </label> <span class="required">*</span>
                   <select class="form-control <?php echo $strLangCls; ?>" name="selSemester" id="selSemester">
                     <option value="0">-<?php echo $select;?>-</option>
                     <option value="Semester-1"  <?php if($selSemester=='Semester-1') echo 'selected="selected"'; ?>>Semester-1</option>
                     <option value="Semester-2" <?php if($selSemester=='Semester-2') echo 'selected="selected"'; ?>>Semester-2</option>
                     <option value="Semester-3" <?php if($selSemester=='Semester-3') echo 'selected="selected"'; ?>>Semester-3</option>
                     <option value="Semester-4" <?php if($selSemester=='Semester-4') echo 'selected="selected"'; ?>>Semester-4</option>
                     <option value="Semester-5" <?php if($selSemester=='Semester-5') echo 'selected="selected"'; ?>>Semester-5</option>
                     <option value="Semester-6" <?php if($selSemester=='Semester-6') echo 'selected="selected"'; ?>>Semester-6</option>
                     <option value="Semester-7" <?php if($selSemester=='Semester-7') echo 'selected="selected"'; ?>>Semester-7</option>
                     <option value="Semester-8" <?php if($selSemester=='Semester-8') echo 'selected="selected"'; ?>>Semester-8</option>
                     <option value="Semester-9" <?php if($selSemester=='Semester-1') echo 'selected="selected"'; ?>>Semester-9</option>
                     <option value="Semester-10" <?php if($selSemester=='Semester-10') echo 'selected="selected"'; ?>>Semester-10</option>
                  </select>
               </div>


               <div class="col-md-6 form-group sapForm">
                  <label><?php echo $interestedCourse;?>:
                  </label> <span class="required">*</span>
                   <select class="form-control <?php echo $strLangCls; ?>" name="selInterestCourse" id="selInterestCourse">
                     <option value="0">-<?php echo $select;?>-</option>
                  </select>
               </div>

               <div class="col-md-6 form-group courseraForm">
                  <label><?php echo $interSkill; ?>:
                  </label> <span class="required">*</span>
                  <input type="text" class="form-control" name="txtSkill" placeholder="<?php echo $enterhere; ?>" id="txtSkill" value="<?php echo $txtInterested; ?>" maxlength="200" autocomplete="off">
               </div>

               <div class="col-md-6 form-group document defaultShow" style="display:none;">
                  <label><?php echo $selectIdentity; ?>: </label> <span class="required">*</span>
                  <select class="form-control" name="selDocumentType" id="selDocumentType">
                     <option value="0">-<?php echo $select;?>-</option>
                     <option value="Aadhaar Card" <?php if($selDocumentType=='Aadhaar Card') echo 'selected="selected"'; ?>>Aadhaar Card</option>
                     <option value="Voter Card" <?php if($selDocumentType=='Voter Card') echo 'selected="selected"'; ?>>Voter Card</option>
                     <option value="PAN Card" <?php if($selDocumentType=='PAN Card') echo 'selected="selected"'; ?>>PAN Card</option>
                     <option value="College ID Card" <?php if($selDocumentType=='College ID Card') echo 'selected="selected"'; ?>>College ID Card</option>
                     <option value="Other" <?php if($selDocumentType=='Other') echo 'selected="selected"'; ?>>Other</option>
                  </select>
               </div>
               <div class="col-md-6 form-group otherDocument" style="display:none;">
                  <label><?php echo $documentType; ?>:</label> <span class="required">*</span>
                  <input type="text" class="form-control" name="txtDocumentName" id="txtDocumentName" placeholder="<?php echo $enterhere; ?>" maxlength="200" autocomplete="off" value="<?php echo $coursera;?>">
               </div>
               <div class="col-sm-6 defaultShow" style="display:none;">

                  <label> <?php echo $anyDocu; ?>: </label> <span class="required">*</span>

                  <input type="file" id="fileFeaturedImage" name="fileFeaturedImage" placeholder="" class="form-control" onchange="readImage(this,'imageFile');">
                  <input type="hidden" name="hdnImageFile" id="hdnImageFile" value="<?php echo $ReportFile; ?>" />

                  <!-- <span class="red">(jpeg, jpg, png file only and max size 5 MB)</span> -->
               </div>

               <div class="col-md-6 form-group piadiv defaultShow" style="display:none;">
                  <label><?php echo $docNumber; ?>:</label> <span class="required">*</span>
                  <input type="text" class="form-control" name="txtDocumentNumber" id="txtDocumentNumber" placeholder="<?php echo $enterhere; ?>" maxlength="20" autocomplete="off" value="<?php echo $txtDocumentNumber;?>">
               </div>
               <div class="col-sm-6 defaultShow" style="display:none;">
                  <label for="address"><?php echo $currentAdre; ?>:</label>
                  <span class="required">*</span>
                  <textarea class="form-control" name="txtMessage" placeholder="<?php echo $enterhere; ?>" id="txtMessage" autocomplete="off"><?php echo $strMessage;?></textarea>
               </div>
               <div class="col-sm-6 align-self-center defaultShow" style="display:none;">
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

            <div class="card bg-light p-4 mb-4 mt-5 defaultShow" style="display:none;">
               <h4 class="mb-4"><?php echo $decration; ?> :</h4>
               <ol class="mb-0 courseraForm">
                  <li><?php echo $decrationRule1; ?></li>
                  <li><?php echo $decrationRule2; ?></li>
                  <li><?php echo $decrationRule3; ?></li>
                  <li><?php echo $decrationRule4; ?></li>
                  <li><?php echo $decrationRule5; ?></li>
                  <li><?php echo $decrationRule6; ?></li>
                  <li><?php echo $decrationRule7; ?></li>
                  <li><?php echo $decrationRule8; ?></li>
                  <li><?php echo $decrationRule9; ?></li>

               </ol>


               <ol class="mb-0 sapForm">
                  <li><?php echo $declarationSap1; ?></li>
                  <li><?php echo $declarationSap2; ?></li>
                  <li><?php echo $declarationSap3; ?></li>
                  <li><?php echo $declarationSap4; ?></li>
                  <li><?php echo $declarationSap5; ?></li>
                  <li><?php echo $declarationSap6; ?></li>
                  <li><?php echo $declarationSap7; ?></li>
                  <li><?php echo $declarationSap8; ?></li>
                  <li><?php echo $declarationSap9; ?></li>
               </ol>

            </div>
            <div class="row align-items-center defaultShow" style="display:none;">
               <div class="col-sm-9">
                  <label for="intAccept"><input type="checkbox" id="intAccept" name="intAccept" value="1">&nbsp; <?php echo $terms; ?></label>
               </div>
               <div class="col-sm-3 text-center">
                  <input type="submit" class="osda--btn btn--rounded btn-block" id="btnSubmit" name="btnSubmit" value="Submit" onclick="return validate();" />
               </div>
            </div>


         </div>
         <div class="card bg-light p-4 mb-4 mt-5 noticeBoard" style="display: none;">
               <h4 class="mb-4"><?php echo $noticeMsg; ?> :</h4>
               <p><?php echo $sucssMsg;?></p>
               <!-- <p><small><strong><?php echo $suggestionMsg;?></strong></small></p>
               <ol class="mb-0">
                  <li><?php echo $msgpoint1; ?></li>
                  <li><?php echo $msgpoint2;?> <a href="<?php echo SITE_URL;?>skill-development"><?php echo $msgpoint3;?> </a> <?php echo $msgpoint4;?> <a href="https://intune.timestsw.com/register/10243" target="_blank"><?php echo $msgpoint5;?> </a><?php echo $msgpoint6;?> </a> <a href="https://intune.timestsw.com/" target="_blank"><?php echo $msgpoint7;?> </a></li>
                  <li><?php echo $msgpoint8;?> <a href="https://intune.timestsw.com/register/10243" target="_blank"><?php echo $msgpoint9;?> </a> <?php echo $msgpoint10;?></li>
                  <li><?php echo $msgpoint11; ?></li>
                  <li><?php echo $msgpoint12; ?></li>
                  <li><?php echo $msgpoint13; ?> <b><?php echo $msgpoint14; ?></b></li>
                  <li><?php echo $msgpoint15;?> </li>
                  <li><?php echo $msgpoint16;?>
                  <div><p><small><?php echo $msgpoint17;?></small> </p>
                  <p><small><?php echo $msgpoint18;?></small> </p>
                  <p><small><?php echo $msgpoint19;?></small> </p>
                  <p><small><?php echo $msgpoint20;?></small> </p>
                  <p><small><?php echo $msgpoint21;?></small> </p></div>
                   </li>
                  
                  <li><?php echo $msgpoint22;?> </li>
                  <li><?php echo $msgpoint23;?> </li>
                  <li><?php echo $msgpoint24;?> </li>
                  <li><?php echo $msgpoint25;?> </li>
                  
               </ol> -->

            </div>

         <!-- <div class="clear50 hidden-xs hidden-1024"></div>
         <br><br>
         <hr />
         <div class="tabsec">
            <p class="text-center text-muted">Already Qualified for the Course?</p>  
            <div class="nav nav-tabs">
               <a class="nav-item nav-link" href="<?php echo SITE_URL;?>payment-process">Make Payment</a>
            </div>
         </div> -->

      </div>

   </section>

   <section class="counter-wrapper py-5 bg-light">
      <h1 class="count text-center text-warning"><?php echo $visitor;?></h1>
      <p class="text-center text-muted mb-0"><?php echo $totalRegistered;?></p>
   </section>

   <!--end:: contarea-->
   <!--start::Footer-->
   <?php include 'include/footer.php' ?>
   <script type="text/javascript" language="javascript">
      $(document).ready(function() {
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg; ?>', '', '<?php echo $redirectLoc;?>');
         <?php }  ?>

         fillTPName('<?php echo $coursera;?>','coursera');
         fillTPName('<?php echo $coursera;?>','selectedCourse');
         fillApproveInstituteName('<?php echo $selInstituteName;?>','selInstituteName');

         fillDegreeName('<?php echo $selCourse;?>','selCourse');
         fillBranchName('<?php echo $selBranch;?>','selBranch');
         //fillSkillDevelopInstituteName('','selInstituteName');
         //fillInterestedCourseName('','selInterestCourse');

         $('#selDocumentType').on('change', function() {


            var selVal = $('#selDocumentType option:selected').val();

            if (selVal == 'Other') {
               $('.otherDocument').show();
            } else {
               $('.otherDocument').hide();

            }
         });


         // SAP ERP course form show from this class
         $('#coursera').on('change', function() {


            var selVal = $('#coursera option:selected').val();

            $('#selectedCourse option[value="'+selVal+'"]').prop('selected','selected');

           /* if (selVal == 'SAP ERP' || selVal==1 || selVal==2 || selVal==3) {
               $('.sapForm').show();
               $('.courseraForm').hide();
               $('.defaultShow').show();
               $('.noticeBoard').hide();

            } 
            else*/ if (selVal == 'Coursera')
            {
               $('.sapForm').hide();
               $('.courseraForm').show();
               $('.defaultShow').show();
               $('.noticeBoard').hide();

            }
            else
            {
               $('.sapForm').show();
               $('.courseraForm').hide();
               $('.defaultShow').show();
               $('.noticeBoard').hide();
               /*$('.sapForm').hide();
               $('.courseraForm').hide();
               $('.defaultShow').hide();
               $('.noticeBoard').hide();*/
            }

         });

         $('#selCourse').on('change', function() {


            var selVal = $('#selCourse option:selected').val();

            if (selVal == 'Others') {
               $('.otherCourse').show();
            } else {
               $('.otherCourse').hide();

            }
         });

         $('#selInstituteName').on('change', function() {


            var selVal = $('#selInstituteName option:selected').val();

            if (selVal == '1000') {
               $('.otherInstitute').show();
            } else {
               $('.otherInstitute').hide();

            }
         });


         // Show page Visitor Counter
         var countFlag = false;
         $(window).scroll(function() {
            var top_of_element = $(".counter-wrapper").offset().top;
            var bottom_of_element = $(".counter-wrapper").offset().top + $(".counter-wrapper").outerHeight();
            var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
            var top_of_screen = $(window).scrollTop();

            if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element) && countFlag == false){
               countFlag = true;
               $('.count').each(function () {
                  $(this).prop('Counter',0).animate({
                     Counter: $(this).text()
                  }, {
                     duration: 4000,
                     easing: 'swing',
                     step: function (now) {
                        $(this).text(Math.ceil(now).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
                     }
                  });
               });
            }
         });
         
         $('#btnNext').click(function() {
            $('#information-wrapper, #selectCoursesought').hide();
            $('#form-wrapper').show();
         })

      });

      function validate() {
         //alert('xsacc');

         if (!blankCheck('txtName', 'Please enter your name'))
            return false;
         if (!checkSpecialChar('txtName'))
            return false;
         if (!maxLength('txtName', 100, 'Name'))
            return false;
         if (!blankCheck('txtEmail', 'Please enter your email'))
            return false;
         if (!checkSpecialChar('txtEmail'))
            return false;
         if (!validEmail('txtEmail'))
            return false;
         if (!maxLength('txtEmail', 100, 'Email'))
            return false;
         var selVal = $('#coursera option:selected').val();
         if(selVal == 'Coursera')
         {
            if (!blankCheck('txtSkill', 'Please enter interested skill'))
            return false;
         }
         else
         {
         if (!blankCheck('txtMobile', 'Please enter your Mobile Number'))
            return false;
        if (!checkSpecialChar('txtMobile'))
            return false;
        if (!validMobileNo('txtMobile', 'Enter a valid mobile no'))
            return false;
        if (!maxLength('txtMobile', 10, 'Mobile no'))
            return false;
         if (!selectDropdown('selInstituteName', 'Select College / Institution Name'))
            return false;
         var selVal = $('#selInstituteName option:selected').val();
         if(selVal == '1000')
         {
            if (!blankCheck('txtOtherInstName', 'Please enter other institute name'))
            return false;
         }
         /*if (!blankCheck('txtRegdNumber', 'Please enter College / Institute Roll / Registration Number'))
            return false;*/
         if (!checkSpecialChar('txtRegdNumber'))
            return false;
         
         if (!selectDropdown('selCourse', 'Select Course'))
            return false;
         if (!selectDropdown('selBranch', 'Select Branch / Discipline'))
            return false;
         if (!selectDropdown('selSemester', 'Select Semester'))
            return false;

         if (!selectDropdown('selInterestCourse', 'Select Interested For Courses'))
            return false;
         }
         
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
         if (!maxLength('txtMessage', 500, 'feedback message'))
            return false;

         if (!blankCheck('txtCaptcha', 'Captcha can not be left blank'))
            return false;
         if (!blankChkRad('intAccept', 'You must be agree to the declaration.'))
            return false;
      }
      $(window).on('load', function() {
         $('#coursesought').show();
         $('.noticeBoard').hide();
      })
   </script>