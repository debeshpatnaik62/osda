<?php
/*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 04-11-2020
Author : Rahul Kumar Saw
*/
$strPageTitle             = $title;
//echo $_POST['hdntxtName'];exit;
?>
<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/feedback.css">
<!--start:: contarea-->
<form name="frmOsda" id="frmOsda" method="post" action="" enctype="multipart/form-data" autocomplete="off">
    <section class="container contarea">
        <!-- <h2 class="text-center">Registration for Special Skill Development Program</h2> -->

        <body>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="name"><?php echo $skillName; ?></label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtName" name="txtName" placeholder="<?php echo $enterhere; ?>">
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6 form-group">
                        <label for=""><?php echo $strGender; ?></label>
                        <span class="required">*</span>
                        <select class="form-control" id="intGender" name="intGender">
                            <option value="0"><?php echo $select; ?></option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            <option value="3">Transgender</option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label for=""><?php echo $qualification; ?></label>
                        <span class="required">*</span>
                        <select class="form-control" id="intQualification" name="intQualification">
                            <option value="0"><?php echo $select; ?></option>
                            <option value="1">Below 10th</option>
                            <option value="2">10th Pass </option>
                            <option value="3">12th Pass</option>
                            <option value="4">ITI/Diploma</option>
                            <option value="5">Graduate</option>
                            <option value="6">Post Graduate</option>
                            <option value="7">No Formal Education</option>
                        </select>
                    </div>
                </div>

                <div class="row">


                    <div class="col-md-6 form-group">
                        <label for=""><?php echo $applyingFor; ?></label>
                        <span class="required">*</span>
                        <select class="form-control" id="intJob" name="intJob">
                            <option value="0"><?php echo $select; ?></option>
                            <option value="Aerospace & Aviation">Aerospace & Aviation</option>
                            <option value="Agriculture">Agriculture</option>
                            <option value="Apparel, Made-Ups & Home Furnishing">Apparel, Made-Ups & Home Furnishing</option>
                            <option value="Automotive">Automotive</option>
                            <option value="Beauty & Wellness">Beauty & Wellness</option>
                            <option value="Banking, Financial Services and Insurance">Banking, Financial Services and Insurance</option>
                            <option value="Capital Goods">Capital Goods</option>
                            <option value="Construction">Construction</option>
                            <option value="Domestic Worker">Domestic Worker</option>
                            <option value="Electronics & Hardware">Electronics & Hardware</option>
                            <option value="Food Processing">Food Processing</option>
                            <option value="Furniture & Fittings">Furniture & Fittings</option>
                            <option value="Gems & Jewellery">Gems & Jewellery</option>
                            <option value="Green Jobs">Green Jobs</option>
                            <option value="Handicrafts & Carpets">Handicrafts & Carpets</option>
                            <option value="Healthcare">Healthcare</option>
                            <option value="Hydrocarbons">Hydrocarbons</option>
                            <option value="Infrastructure Equipment">Infrastructure Equipment</option>
                            <option value="Instrumentation, Automation, Surveillance and Communication">Instrumentation, Automation, Surveillance and Communication</option>
                            <option value="Iron & Steel">Iron & Steel</option>
                            <option value="IT-ITES">IT-ITES</option>
                            <option value="Leather">Leather</option>
                            <option value="Life Sciences">Life Sciences</option>
                            <option value="Logistics">Logistics</option>
                            <option value="Management and Entrepreneurship & Professional">Management and Entrepreneurship & Professional</option>
                            <option value="Media & Entertainment">Media & Entertainment</option>
                            <option value="Mining">Mining</option>
                            <option value="Paints & Coatings">Paints & Coatings </option>
                            <option value="People with Disability">People with Disability</option>
                            <option value="Plumbing">Plumbing</option>
                            <option value="Power">Power</option>
                            <option value="Retail">Retail</option>
                            <option value="Rubber">Rubber</option>
                            <option value="Sports">Sports</option>
                            <option value="Telecom">Telecom </option>
                            <option value="Textiles & Handlooms">Textiles & Handlooms</option>
                            <option value="Tourism & Hospitality">Tourism & Hospitality</option>
                            <option value="People with Disability">People with Disability</option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label for=""><?php echo $trainedRole; ?></label>
                        <span class="required">*</span>
                        <select class="form-control" id="intTrained" name="intTrained">
                            <option value="0"><?php echo $select; ?></option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="">Institute Type</label>
                        <!-- <span class="required">*</span> -->
                        <select class="form-control" id="instituteType" name="instituteType">
                            <option value="0"><?php echo $select; ?></option>
                            <option value="1">Govt. ITI</option>
                            <option value="2">Govt. Polytechnic</option>
                            <option value="3">Training Partner</option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="">Institute Name</label>
                        <select class="form-control" id="selInstituteName" name="selInstituteName">
                            <option value="0"><?php echo $select; ?></option>
                            <!-- <option value="1">ITI CUTTACK</option>
                            <option value="2">ITI BBSR</option>
                            <option value="Others">Others</option> -->
                        </select>
                    </div>

                </div>
                <div class="row otherInstitute" style="display: none">
                    <div class="col-md-6 form-group">
                        <label for="">Other Institute Name</label>
                        <input type="text" name="otherInstituteName" id="otherInstituteName" class="form-control">
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="">Do you have a Valid Certificate of the training undergone</label>
                        <span class="required">*</span>
                        <select class="form-control" id="selCertificate" name="selCertificate">
                            <option value="0"><?php echo $select; ?></option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                    </div>

                </div>

                <div class="row validCertificate" style="display: none">
                    <div class="col-md-6 form-group">
                        <label for="">Skill Details 1</label>
                        <select class="form-control" id="skillDetails1" name="skillDetails1">
                            <option value="0"><?php echo $select; ?></option>
                            <option value="Aerospace & Aviation">Aerospace & Aviation</option>
                            <option value="Agriculture">Agriculture</option>
                            <option value="Apparel, Made-Ups & Home Furnishing">Apparel, Made-Ups & Home Furnishing</option>
                            <option value="Automotive">Automotive</option>
                            <option value="Beauty & Wellness">Beauty & Wellness</option>
                            <option value="Banking, Financial Services and Insurance">Banking, Financial Services and Insurance</option>
                            <option value="Capital Goods">Capital Goods</option>
                            <option value="Construction">Construction</option>
                            <option value="Domestic Worker">Domestic Worker</option>
                            <option value="Electronics & Hardware">Electronics & Hardware</option>
                            <option value="Food Processing">Food Processing</option>
                            <option value="Furniture & Fittings">Furniture & Fittings</option>
                            <option value="Gems & Jewellery">Gems & Jewellery</option>
                            <option value="Green Jobs">Green Jobs</option>
                            <option value="Handicrafts & Carpets">Handicrafts & Carpets</option>
                            <option value="Healthcare">Healthcare</option>
                            <option value="Hydrocarbons">Hydrocarbons</option>
                            <option value="Infrastructure Equipment">Infrastructure Equipment</option>
                            <option value="Instrumentation, Automation, Surveillance and Communication">Instrumentation, Automation, Surveillance and Communication</option>
                            <option value="Iron & Steel">Iron & Steel</option>
                            <option value="IT-ITES">IT-ITES</option>
                            <option value="Leather">Leather</option>
                            <option value="Life Sciences">Life Sciences</option>
                            <option value="Logistics">Logistics</option>
                            <option value="Management and Entrepreneurship & Professional">Management and Entrepreneurship & Professional</option>
                            <option value="Media & Entertainment">Media & Entertainment</option>
                            <option value="Mining">Mining</option>
                            <option value="Paints & Coatings">Paints & Coatings </option>
                            <option value="People with Disability">People with Disability</option>
                            <option value="Plumbing">Plumbing</option>
                            <option value="Power">Power</option>
                            <option value="Retail">Retail</option>
                            <option value="Rubber">Rubber</option>
                            <option value="Sports">Sports</option>
                            <option value="Telecom">Telecom </option>
                            <option value="Textiles & Handlooms">Textiles & Handlooms</option>
                            <option value="Tourism & Hospitality">Tourism & Hospitality</option>
                            <option value="People with Disability">People with Disability</option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="">Skill Details 2</label>
                        <select class="form-control" id="skillDetails2" name="skillDetails2">
                            <option value="0"><?php echo $select; ?></option>
                            <option value="Aerospace & Aviation">Aerospace & Aviation</option>
                            <option value="Agriculture">Agriculture</option>
                            <option value="Apparel, Made-Ups & Home Furnishing">Apparel, Made-Ups & Home Furnishing</option>
                            <option value="Automotive">Automotive</option>
                            <option value="Beauty & Wellness">Beauty & Wellness</option>
                            <option value="Banking, Financial Services and Insurance">Banking, Financial Services and Insurance</option>
                            <option value="Capital Goods">Capital Goods</option>
                            <option value="Construction">Construction</option>
                            <option value="Domestic Worker">Domestic Worker</option>
                            <option value="Electronics & Hardware">Electronics & Hardware</option>
                            <option value="Food Processing">Food Processing</option>
                            <option value="Furniture & Fittings">Furniture & Fittings</option>
                            <option value="Gems & Jewellery">Gems & Jewellery</option>
                            <option value="Green Jobs">Green Jobs</option>
                            <option value="Handicrafts & Carpets">Handicrafts & Carpets</option>
                            <option value="Healthcare">Healthcare</option>
                            <option value="Hydrocarbons">Hydrocarbons</option>
                            <option value="Infrastructure Equipment">Infrastructure Equipment</option>
                            <option value="Instrumentation, Automation, Surveillance and Communication">Instrumentation, Automation, Surveillance and Communication</option>
                            <option value="Iron & Steel">Iron & Steel</option>
                            <option value="IT-ITES">IT-ITES</option>
                            <option value="Leather">Leather</option>
                            <option value="Life Sciences">Life Sciences</option>
                            <option value="Logistics">Logistics</option>
                            <option value="Management and Entrepreneurship & Professional">Management and Entrepreneurship & Professional</option>
                            <option value="Media & Entertainment">Media & Entertainment</option>
                            <option value="Mining">Mining</option>
                            <option value="Paints & Coatings">Paints & Coatings </option>
                            <option value="People with Disability">People with Disability</option>
                            <option value="Plumbing">Plumbing</option>
                            <option value="Power">Power</option>
                            <option value="Retail">Retail</option>
                            <option value="Rubber">Rubber</option>
                            <option value="Sports">Sports</option>
                            <option value="Telecom">Telecom </option>
                            <option value="Textiles & Handlooms">Textiles & Handlooms</option>
                            <option value="Tourism & Hospitality">Tourism & Hospitality</option>
                            <option value="People with Disability">People with Disability</option>
                        </select>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for=""><?php echo $experience; ?></label>
                        <select name="ddlYearOfExp" id="ddlYearOfExp" class="form-control">
                            <option value="0"><?php echo $select; ?></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="100">Above 10</option>

                        </select>
                    </div>

                    <div class="col-md-6 form-group experience" style="display: none">
                        <label for=""><?php echo $briefExperience; ?></label>
                        <textarea name="txtExperience" rows="2" cols="20" id="txtExperience" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6 form-group align-self-end" id="rbtnstate">
                        <label for="">Are you from Odisha ?</label>
                        <span class="required">*</span>
                        <div class="inline-radio">
                            <input id="rbtnstate_0" type="radio" name="rbtnstate" value="1" checked="checked">
                            <label for="rbtnstate_0">Yes</label>
                            <input id="rbtnstate_1" type="radio" name="rbtnstate" value="2">
                            <label for="rbtnstate_1">No</label>
                        </div>
                    </div>

                </div>
                <div class="row" id="state" style="display: none">
                    <div class="col-md-6 form-group">
                        <label for="">State Name</label>
                        <span class="required">*</span>
                        <input type="text" name="stateName" id="stateName" class="form-control" placeholder="Enter here">
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="">District Name</label>
                        <span class="required">*</span>
                        <input type="text" name="txtDistrict" id="txtDistrict" class="form-control" placeholder="Enter here">
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="">Block / ULB</label>
                        <input type="text" name="txtBlock" id="txtBlock" class="form-control" placeholder="Enter here">
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="">Gram Panchayat</label>
                        <input type="text" name="txtPanchayat" id="txtPanchayat" class="form-control" placeholder="Enter here">
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="">Village</label>
                        <input type="text" name="txtVillage" id="txtVillage" class="form-control" placeholder="Enter here">
                    </div>

                </div>
                <div class="row" id="withoutstate">
                    <div class="col-md-6 form-group">
                        <label for=""><?php echo $strDistrict; ?></label>
                        <span class="required">*</span>
                        <select class="form-control" id="selDistrict" name="selDistrict">
                            <option value="0"><?php echo $select; ?></option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="">Block / ULB</label>
                        <select class="form-control" id="selBlock" name="selBlock">
                            <option value="0"><?php echo $select; ?></option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="">Gram Panchayat</label>
                        <select class="form-control" id="selPanchayat" name="selPanchayat">
                            <option value="0"><?php echo $select; ?></option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="">Village</label>
                        <select class="form-control" id="selVillage" name="selVillage">
                            <option value="0"><?php echo $select; ?></option>
                        </select>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for=""><?php echo $strAddress; ?></label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="txtAddress" name="txtAddress" placeholder="<?php echo $enterhere; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="txtareaJDesc" class="col-form-label">Language(s) you speak</label> <span class="required">*</span>
                        <div class="inline-radio">
                            <input id="chkOdia" type="checkbox" name="chkLanguage[]" value="Odia"><label for="chkOdia">Odia</label>
                            <input id="chkHindi" type="checkbox" name="chkLanguage[]" value="Hindi"><label for="chkHindi">Hindi</label>
                            <input id="chkEnglish" type="checkbox" name="chkLanguage[]" value="English"><label for="chkEnglish">English</label>
                            <input id="chkBengli" type="checkbox" name="chkLanguage[]" value="Bengali"><label for="chkBengli">Bengali</label>
                            <input id="chkTelugu" type="checkbox" name="chkLanguage[]" value="Telugu"><label for="chkTelugu">Telugu</label>
                            <input id="chkOther" type="checkbox" name="chkLanguage[]" value="Other"><label for="chkOther">Other</label>
                        </div>
                    </div>
                </div>
                <div class="row" id="divOtherLanguage" style="display: none">
                    <div class="col-md-6 form-group">
                        <input name="txtLang1" type="text" id="txtLang1" class="form-control" placeholder="language 1" autocomplete="off">
                    </div>

                    <div class="col-md-6 form-group">
                        <input name="txtLang2" type="text" id="txtLang2" class="form-control" placeholder="language 2" autocomplete="off">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for=""><?php echo $mobileNo; ?></label>
                        <span class="required">*</span>
                        <input type="text" class="form-control " id="txtPhone" name="txtPhone" placeholder="<?php echo $enterhere; ?>">
                    </div>

                    <div class="col-md-6 form-group">
                        <label for=""><?php echo $skiEmail; ?></label>
                        <input type="email" class="form-control " id="txtEmail" name="txtEmail" placeholder="<?php echo $enterhere; ?>">
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for=""><?php echo $moveOut; ?></label>
                        <span class="required">*</span>
                        <select class="form-control" id="selMoveOut" name="selMoveOut">
                            <option value="0"><?php echo $select; ?></option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                    </div>
                    <div class='col-md-6 form-group date'>
                        <label for="">Date of Birth</label>
                        <span class="required">*</span>
                        <div class="input-group">
                            <input type="text" data-date-format="dd-mm-yyyy" name="txtDob" id="txtDob" class="form-control date-picker" placeholder="dd/mm/yyyy" value="<?php echo $txtDob; ?>">
                        </div>
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="age"><?php echo $strAge; ?></label>
                        <span class="required">*</span>
                        <input type="text" class="form-control" id="intAge" name="intAge" placeholder="<?php echo $enterhere; ?>" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for=""><?php echo $otherInfo; ?></label>
                        <textarea name="txtInformation" rows="2" cols="20" id="txtInformation" class="form-control" maxlength="100"></textarea>
                    </div>
                </div>


                <div class="row mt-3 mb-5">
                    <div class="col-md-12 text-right">
                        <input type="submit" class="osda--btn btn--rounded px-5" id="btnSubmit" name="btnSubmit" value="Submit" onclick="return validate();" />
                    </div>
                </div>

            </div>
        </body>
    </section>
</form>

<!--end:: contarea-->
<!--start::Footer-->
<?php include 'include/footer.php' ?>
<script src="<?php echo APP_URL; ?>js/loadComponent.js"></script>
<script src="<?php echo APP_URL; ?>js/loadAjax.js"></script>
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo APP_URL; ?>js/moment.min.js"></script>
<script type="text/javascript">
    function validate() {
        if (!blankCheck('txtName', 'Please enter your name'))
            return false;
        if (!checkSpecialChar('txtName'))
            return false;
        if (!maxLength('txtName', 100, 'Name'))
            return false;
        if (!selectDropdown('intGender', 'Select Gender'))
            return false;
        if (!selectDropdown('intQualification', 'Select Qualification'))
            return false;
        if (!selectDropdown('intJob', 'Select Job Role Applying For'))
            return false;
        if (!selectDropdown('intTrained', 'Select Trained in job role'))
            return false;
        if (!selectDropdown('selCertificate', 'Select Certification'))
            return false;
        /* if (!selectDropdown('selDistrict', 'Select District'))
             return false;*/
        if (!blankCheck('txtAddress', 'Please enter address'))
            return false;
        if (!checkSpecialChar('txtAddress'))
            return false;
        if (!maxLength('txtAddress', 200, 'Address'))
            return false;
        if (!blankCheck('txtPhone', 'Please enter your Mobile Number'))
            return false;
        if (!checkSpecialChar('txtPhone'))
            return false;
        if (!validMobileNo('txtPhone', 'Enter a valid mobile no'))
            return false;
        if (!maxLength('txtPhone', 10, 'Mobile no'))
            return false;
        /*if (!blankCheck('txtEmail', 'Please enter your email'))
           return false;
        if (!checkSpecialChar('txtEmail'))
           return false;
        if (!validEmail('txtEmail'))
           return false;*/
        if (!maxLength('txtEmail', 100, 'Email'))
            return false;
        if (!selectDropdown('selMoveOut', 'Select Move Out from state'))
            return false;
        if (!checkSpecialChar('txtExperience'))
            return false;
        if (!maxLength('txtExperience', 200, 'Experience'))
            return false;
        if (!blankCheck('txtDob', 'Choose date of birth'))
            return false;
        if (!checkSpecialChar('txtInformation'))
            return false;
        if (!maxLength('txtInformation', 100, 'Information'))
            return false;
    }

    $(document).ready(function() {
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg; ?>', '', '<?php echo $redirect; ?>');
        <?php }  ?>

        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true
        }).on('changeDate', function(e) {
            var age = moment().diff(e.date, 'years', true);
            $("#intAge").val(parseInt(age));
        });

        $('#selInstituteName').on('change', function() {


            var selInstitute = $('#selInstituteName option:selected').val();

            if (selInstitute == 'Others') {
                $('.otherInstitute').show();
            } else {
                $('.otherInstitute').hide();

            }
        });

        $('#selCertificate').on('change', function() {


            var selValCert = $('#selCertificate option:selected').val();

            if (selValCert == 1) {
                $('.validCertificate').show();
            } else {
                $('.validCertificate').hide();

            }
        });


        $('#ddlYearOfExp').on('change', function() {


            var selVal = $('#ddlYearOfExp option:selected').val();

            if (selVal > 0) {
                $('.experience').show();
            } else {
                $('.experience').hide();

            }
        });

        $("#rbtnstate").change(function() {

            if ($("input[name='rbtnstate']:checked").val() == "1") {
                $("#state").hide();
                $("#withoutstate").show();
            } else {
                $("#state").show();
                $("#withoutstate").hide();
            }
        });

        $('#chkOther').change(function() {

            if (this.checked) {
                $('#divOtherLanguage').show();
            } else {

                $('#divOtherLanguage').hide();
            }
        });

        fillSkillDistrict('', 'selDistrict');

        $('#selDistrict').on('change', function() {
            var distId = $('#selDistrict option:selected').val();
            fillSkillBlock('', 'selBlock', distId);
        });

        $('#selBlock').on('change', function() {
            var blockId = $('#selBlock option:selected').val();
            fillSkillGp('', 'selPanchayat', blockId);
        });


        $('#selPanchayat').on('change', function() {
            var gpId = $('#selPanchayat option:selected').val();
            fillSkillVillage('', 'selVillage', gpId);
        });

        $('#instituteType').on('change', function() {
            var instituteTypeId = $('#instituteType option:selected').val();
            if(instituteTypeId==3)
            {
                fillJobTraining('', 'selInstituteName');

            }
            else
            {
                fillJobInstituteName('', 'selInstituteName', instituteTypeId);

            }
        });

        

    });
</script>
</body>

</html>