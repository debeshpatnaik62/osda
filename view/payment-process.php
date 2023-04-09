<?php 
/*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 
Author : 
*/ 
$strPageTitle             = 'Payment Process';
//echo $_POST['hdntxtName'];exit;
?>
<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?>
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/nano-unicorn.css">
<!--start:: contarea-->
<section class="container contarea">
    <h2 class="text-center">Registration for Special Skill Development Program</h2>

    <div class="tabsec">
         <nav class="mb-0">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
               <a class="nav-item nav-link " href="<?php echo SITE_URL;?>skill-development">Student Registration</a>
               <a class="nav-item nav-link active" href="javascript: void(0);">Make Payment</a>
            </div>
         </nav>
      </div>

    <form name="frmOsda" id="frmOsda" method="post" action="" enctype="multipart/form-data" autocomplete="off">
    <div class="row mt-4 align-items-end">
    <div class="col-md-3"></div>
    <div class="col-md-4 form-group">
      <label>Registration Number :</label>
      <span class="required">*</span>
      <input type="text" placeholder="Enter here" class="form-control" name="txtRegdNo" id="txtRegdNo" value="<?php echo $regdNo; ?>" maxlength="50" autocomplete="off">
   </div>

      <div class="col-md-2 form-group">
      <input type="button" class="osda--btn btn--rounded btn-block" id="btnSubmit" name="btnSubmit" value="Click to Proceed" onclick="return validate();"/>
     </div>
     <div class="col-md-3"></div>
 </div>
 </form>
<?php if (!empty($strName)) { ?>
    <div class="row my-5">
        <div class="col-sm-4">
            <div class="mb-3">
                <p class="mb-0">Type of courses sought for :</p>
                <h3 class="mt-0"><?php echo $strCourseType;?></h3>
            </div>
            <div class="mb-3">
                <p class="mb-0">Name :</p>
                <h3 class="mt-0"><?php echo $strName;?></h3>
            </div>
            <div class="mb-3">
                <p class="mb-0">Email Address :</p>
                <h3><?php echo $strEmail;?></h3>

            </div>
            <?php if(!empty($strSkill)) { ?>
            <div class="mb-3">
                <p class="mb-0">Interested Skill/ Sector/ Course :</p>

                <h3><?php echo $strSkill;?></h3>
            </div>
             <?php } ?>
            <?php if(!empty($strMobile)) { ?>
            <div class="mb-3">
                <p class="mb-0">Mobile Number :</p>

                <h3><?php echo $strMobile;?></h3>
            </div>
        <?php } ?>
        </div>
        <div class="col-sm-4">
            <?php if(!empty($strInstituteId)) { ?>
            <div class="mb-3">
                <p class="mb-0">College Name :</p>
                <h3 class="mt-0"><?php echo $strInstituteId;?></h3>
            </div>

            <?php } if(!empty($strCoursesFor)) { ?>
            <div class="mb-3">
                <p class="mb-0">Courses :</p>
                <h3 class="mt-0"><?php echo $strCoursesFor;?></h3>
            </div>
            <?php } if(!empty($strBranch)) { ?>
            <div class="mb-3">
                <p class="mb-0">Branch :</p>
                <h3><?php echo $strBranch;?></h3>

            </div>
            <?php } if(!empty($strInterestedCourse)) { ?>
            <div class="mb-3">
                <p class="mb-0">Interested for Courses :</p>

                <h3><?php echo $strInterestedCourse;?></h3>
            </div>
             <?php } ?>
        </div>
        <div class="col-sm-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <p><strong>Course Price</strong></p>
                    <?php if($strCourseType=='Coursera') { ?>
                    <h1 class="text-success"><i class="fa fa-inr" aria-hidden="true" style="font-size: 2rem;"></i> <?php echo COURSERA_FEE;?> /- Only</h1>
                    <?php } else if($strCourseType=='SAP ERP') { ?>
                        <h1 class="text-success"><i class="fa fa-inr" aria-hidden="true" style="font-size: 2rem;"></i> <?php echo $courseFee;?> /- Only</h1>
                    <?php } ?>
                    <?php if($payStatus!=1 && $eligibleStatus==1) {?>
                    <div class="mt-5">
                        <a class="osda--btn btn--rounded btn-block text-white" id='paymentFormData' href="javascript:void(0);"  onclick="javascript:paymentForm();">Make Payment</a>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

</section>

<!--end:: contarea-->
<!--start::Footer-->
<?php include 'include/footer.php' ?>
</body>
</html>
<script type="text/javascript">
    function paymentForm()
    {  
        $('form').attr('action', '<?php echo SITE_URL;?>ccavRequestHandler'); 
        if(confirm('You are leaving the current webpage of www.skillodisha.gov.in to a merchant bank payment gateway for having a secured transaction to pay the relevant fees. Kindly do not close the browser while it is processing.')){
            $('#paymentFormData').hide();
            $('form').submit();
        }
    }

    function validate() {
        if (!blankCheck('txtRegdNo', 'Please enter your registration number'))
            return false;
        $('form').attr('action', '<?php echo SITE_URL;?>payment-process');
        $('form').submit();
    }

    $(document).ready(function() {
        <?php if ($outMsg != '' && !empty($_POST['txtRegdNo'])) { ?>
            viewAlert('<?php echo $outMsg; ?>', 'txtRegdNo', '');
         <?php }  ?>
       });  
</script>
