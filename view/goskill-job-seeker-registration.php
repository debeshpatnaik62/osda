<?php 
/*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 04-11-2020
Author : Rahul Kumar Saw
*/ 
$strPageTitle             = 'Goskill Job Seeker Registration Form';
//echo $_POST['hdntxtName'];exit;
?>
<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?>
<script src="<?php echo APP_URL; ?>js/loadComponent.js"></script>
<script src="<?php echo APP_URL; ?>js/loadAjax.js"></script>
<!--start:: contarea-->
<form name="frmOsda" id="frmOsda" method="post" action="" enctype="multipart/form-data" autocomplete="off">
<section class="container contarea">
    <!-- <h2 class="text-center">Registration for Special Skill Development Program</h2> -->
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 form-group">
                <label for="name">Name of the candidate</label>
                <input type="text" class="form-control" id="txtName" name="txtName" placeholder="Enter here" >
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="intAge" name="intAge" placeholder="Enter here">
            </div>

            <div class="col-md-6 form-group">
                <label for="">Select Gender</label>
                <select class="form-control" id="intGender" name="intGender" >
                    <option value="0">Select</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">Transgender</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 form-group">
                <label for="">Domicile District</label>
                <select class="form-control" id="selDistrict" name="selDistrict">
                    <option value="0">Select District</option>
                </select>
            </div>

            <div class="col-md-6 form-group">
                <label for="">Address</label>
                <input type="text" class="form-control" id="txtAddress" name="txtAddress" placeholder="Enter here">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 form-group">
                <label for="">Highest Educational Qualification</label>
                <select class="form-control" id="intQualification" name="intQualification">
                    <option value="0">Select</option>
                    <option value="1">10th</option>
                    <option value="2">12th</option>
                </select>
            </div>

            <div class="col-md-6 form-group">
                <label for="">Job Role Applying For ?</label>
                <select class="form-control" id="intJob" name="intJob" >
                    <option value="0">Select</option>
                    <option value="1">Sewing Machine Operator</option>
                    <option value="2">Self- Employed Tailor</option>
                    <option value="3">Apparel Packaging</option>
                </select>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6 form-group">
                <label for="">Whether Trained in the job role ?</label>
                <select class="form-control" id="intTrained" name="intTrained" >
                    <option value="0">Select</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                </select>
            </div>

            <div class="col-md-6 form-group">
                <label for="">Contact Number</label>
                <input type="text" class="form-control " id="txtPhone" name="txtPhone" placeholder="Enter here">
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="">Email Id</label>
                <input type="email" class="form-control " id="txtEmail" name="txtEmail" placeholder="Enter here">
            </div>

            <div class="col-md-6 form-group">
                <label for="">Ready to move out of the State?</label>
                <select class="form-control" id="selMoveOut" name="selMoveOut" >
                    <option value="0">Select</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                </select>
            </div>
        </div>
        
        <div class="row mt-3 mb-5">
            <div class="col-md-12 text-right">
                <!-- <button class="btn btn-success px-5">SUBMIT</button> -->
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
</body>
</html>
<script type="text/javascript">
    function validate() {
        if (!blankCheck('txtName', 'Please enter your name'))
            return false;
         if (!checkSpecialChar('txtName'))
            return false;
         if (!maxLength('txtName', 100, 'Name'))
            return false;
        if(!blankCheck('intAge', 'Please enter age'))
            return false;
        if (!selectDropdown('intGender', 'Select Gender'))
            return false;
        if (!selectDropdown('selDistrict', 'Select District'))
            return false;
        if (!blankCheck('txtAddress', 'Please enter address'))
            return false;
         if (!checkSpecialChar('txtAddress'))
            return false;
         if (!maxLength('txtAddress', 200, 'Address'))
            return false;
        if (!selectDropdown('intQualification', 'Select Qualification'))
            return false;
        if (!selectDropdown('intJob', 'Select Job Role Applying For'))
            return false;
        if (!selectDropdown('intTrained', 'Select Trained in job role'))
            return false;
        if (!blankCheck('txtPhone', 'Please enter your Mobile Number'))
            return false;
        if (!checkSpecialChar('txtPhone'))
            return false;
        if (!validMobileNo('txtPhone', 'Enter a valid mobile no'))
            return false;
        if (!maxLength('txtPhone', 10, 'Mobile no'))
            return false;
         if (!blankCheck('txtEmail', 'Please enter your email'))
            return false;
         if (!checkSpecialChar('txtEmail'))
            return false;
         if (!validEmail('txtEmail'))
            return false;
         if (!maxLength('txtEmail', 100, 'Email'))
            return false;
        if (!selectDropdown('selMoveOut', 'Select Move Out from state'))
            return false;
    }

    $(document).ready(function() {
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg; ?>', '', '');
         <?php }  ?>
       });  

    fillDistricts('<?php echo $selDistrict; ?>', 'selDistrict');
</script>
