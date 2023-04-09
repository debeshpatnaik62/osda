<?php
/*plugin*/
/*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 21st Dec 2018
Author : MRD
*/ 

?>

<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?>
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/want-to-hire.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<script src="<?php echo SITE_URL;?>js/loadAjax.js" type="text/javascript"></script>
<script src="<?php echo APP_URL; ?>js/loadComponent.js"></script>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script src="<?php echo SITE_URL; ?>js/chosen.jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/chosen.min.css">
 
<script type="text/javascript">
$(document).ready(function () {
    $(".chosen-select").chosen({max_selected_options: 5,width: "100%",class: "form-control"});
});
</script>
<!--start:: contarea-->
<form name="frmOsda" id="frmOsda"  method="post" action="" enctype="multipart/form-data" autocomplete="off">
<section class="container contarea">
	<div class="row">
    <div class="col-12">
      <div class="page--banner">
        <img src="<?php echo SITE_URL; ?>images/want-to-hire.jpg" alt="philosophy" class="img-fluid mb-4 img--shadow">
      </div>
          <div class="page__content">
            <div class="">
                <h3>Want to Hire ?</h3>
                <p class="mb-3">Want to hire from the world's best pool of skilled resources?<br>
                  Write to us with your requirement, our officers will get in touch with you. </p>

                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Your Name</label>
                    <input type="text" class="form-control" placeholder="Your Name" maxlength="100" id="txtName" name="txtName" value="<?php echo $strName; ?>" maxlength="100" >
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Company Name</label>
                    <input type="text" class="form-control" placeholder="Company Name" id="txtCompanyName" name="txtCompanyName" value="<?php echo $strCompanyName; ?>" maxlength="100"  >
                  </div>
                  <div class="col-12 col-md-6 form-group">
                    <label>Which skill(s) you need ?</label>
                    <select class="form-control <?php echo $selSkills; ?> chosen-select" multiple size="5" id="selSkills" name="selSkills[]">
                      <option>--Select Skills--</option>
                      <option>Skill1</option>
                      <option>Skill2</option>
                      <option>Skill3</option>
                      <option>Skill4</option>
                      <option>Skill5</option>
                    </select>
                  </div>
                  <div class="col-12 col-md-6 form-group">

                  <!-- </div> -->
                      <div class="col-12 form-group p-0">
                        <label class="d-block mb-3">Qualification</label>
                        <div class="form-check-inline">

                          <label class="form-check-label" for="check1">
                            <input type="checkbox" class="form-check-input" id="chkQualification1" name="chkQualification[]" value="ITI">ITI
                          </label>
                        </div>
                        <div class="form-check-inline">
                          <label class="form-check-label" for="check2">
                            <input type="checkbox" class="form-check-input" id="chkQualification2" name="chkQualification[]" value='Diploma'>Diploma
                          </label>
                        </div>
                        <div class="form-check-inline">
                          <label class="form-check-label" for="check2">
                            <input type="checkbox" class="form-check-input" id="chkQualification3" name="chkQualification[]" value="B.Tech">B.Tech
                          </label>
                        </div>
                        <div class="form-check-inline">
                          <label class="form-check-label" for="check2">
                            <input type="checkbox" class="form-check-input" id="chkQualification4" name="chkQualification[]" value="Graduation">Graduation
                          </label>
                        </div>
                      </div>
                      <div class="col-12 p-0">
                        <label class="d-block mb-3">How many Candidates?</label>
                        <div class="form-check-inline">
                          <label class="form-check-label" for="radio1">
                            <input type="radio" class="form-check-input" id="rdoNoCandidates1" name="optCandidate" value="5" >0-5
                          </label>
                        </div>
                        <div class="form-check-inline">
                          <label class="form-check-label" for="radio2">
                            <input type="radio" class="form-check-input" id="rdoNoCandidates2" name="optCandidate" value="15">5-15
                          </label>
                        </div>
                        <div class="form-check-inline">
                          <label class="form-check-label" for="radio3">
                          <input type="radio" class="form-check-input" id="rdoNoCandidates3" name="optCandidate" value="50">15-50
                          </label>
                        </div>
                        <div class="form-check-inline">
                          <label class="form-check-label" for="radio4">
                            <input type="radio" class="form-check-input" id="rdoNoCandidates4" name="optCandidate" value="100">50-100
                          </label>
                        </div>
                        <div class="form-check-inline">
                          <label class="form-check-label" for="radio5">
                            <input type="radio" class="form-check-input" id="rdoNoCandidates5" name="optCandidate" value="101">100+
                          </label>
                        </div>
                      </div>
                  </div>
                 
                  <div class="col-md-12 form-group">
                    <label>Your Message</label>
                    <textarea class="form-control" id="txtMessage" name="txtMessage" rows="6"></textarea>
                  </div>
                  <div class="col-12 col-sm-3">
                    <input type="submit" class="btn bg-osdaColor1 w-100" id="btnSubmit" name="btnSubmit" value="Submit" onclick="return validateHire();"/>
                  </div>
                </div>
            </div>
          </div>
        </div>
  </div>
</section>
</form>

<!--end:: contarea-->

<!--start::Footer-->
<?php include 'include/footer.php' ?>

<script type="text/javascript" language="javascript">
  $(document).ready(function () {
     
      <?php if($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>              
                viewAlert('<?php echo $outMsg;?>','','');
      <?php }  ?>
          
         TextCounter('txtMessage','lblChar1',500);
  });
    function validateHire()
     {
       //alert('xsacc');
        if (!blankCheck('txtName', 'Please enter your name'))
            return false;
        if (!checkSpecialChar('txtName'))
            return false;
        if (!maxLength('txtName', 100, 'Name'))
            return false;
        if (!blankCheck('txtCompanyName', 'Please enter CompanyName'))
           return false;
        if (!checkSpecialChar('txtCompanyName'))
           return false;
        
        if (!maxLength('txtCompanyName', 50, 'CompanyName'))
           return false;        
            if (!selectDropdown('selSkills', 'Please Choose your skills'))
           return false; 
          /*if (!blankChkRad('chkQualification', 'Please Check atleast one Qualification'))
           return false;*/
              
         if (!blankChkRad('optCandidate', 'Please Choose No of Candidates'))
           return false;  
        if (!blankCheck('txtMessage', 'Please enter your message'))
           return false;
        if (!checkSpecialChar('txtMessage'))
           return false;    
       if (!maxLength('txtMessage', 500, 'message'))
            return false;
        
     }
  </script>

</body>
</html>
