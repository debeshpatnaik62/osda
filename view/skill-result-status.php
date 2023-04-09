<?php 
/*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 
Author : 
*/ 
?>
<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?>
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/nano-unicorn.css">
<!--start:: contarea-->
<section class="container contarea">
    <!-- <h2 class="text-center">Skill Registration Status</h2> -->

     <!-- <div class="tabsec">
         <nav class="mb-0">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
               <a class="nav-item nav-link " href="<?php echo SITE_URL;?>skill-compete-register"><?php echo $newReg;?></a>
               <a class="nav-item nav-link active" href="javascript: void(0);"><?php echo $checkStatus;?></a>
            </div>
         </nav>
      </div>  -->

    <form name="frmOsda" id="frmOsda" method="post" action="" enctype="multipart/form-data" autocomplete="off">
    <div class="row mt-4 align-items-end">
    <div class="col-md-3"></div>
    <div class="col-md-4 form-group">
      <label><?php echo $enterDetails;?></label>
      <span class="required">*</span>
      <input type="text" placeholder="<?php echo $enterhere;?>" class="form-control" name="txtRegdNo" id="txtRegdNo" value="<?php echo $regdNo; ?>" maxlength="50" autocomplete="off">
   </div>

      <div class="col-md-2 form-group">
      <input type="button" class="osda--btn btn--rounded btn-block" id="btnSubmit" name="btnSubmit" value="Submit" onclick="return validate();"/>
     </div>
     <div class="col-md-3"></div>
 </div>
 </form>
        <div class="text-center py-5" style="<?php echo ( isset($levelIqualify))?'display: block;':'display: none;';  ?>">
          <?php if($tagId ==1 && $levelIqualify==1 && $panelId==0) {?>
            <h3 style="text-align: center;" class="text-success mb-4 mt-3"> "Congratulations! You are qualified for Panel round of Odisha Skill-2021 in <strong><?php echo $skillName;?></strong> skill."</h3>
          <?php } elseif($tagId ==1 && $levelIqualify==0 && $panelId==0 ) {?>
            <h3 style="text-align: center;" class="text-success mb-4 mt-3">Sorry, you are dis-qualified for panel round.</h3>
          <?php } elseif($panelId > 0 && $panelQualStatus==1 ) {?>
            <h3 style="text-align: center;" class="text-success mb-4 mt-3"> "Congratulations! You are qualified for State level of Odisha Skill-2021 in <strong><?php echo $skillName;?></strong> skill."</h3>
          <?php } elseif($panelId >0 && $panelQualStatus==0 ) {?>
            <h3 style="text-align: center;" class="text-success mb-4 mt-3">Sorry, you are dis-qualified for state level.</h3>
          <?php } else { ?>
            <h3 style="text-align: center;" class="text-danger mb-4 mt-3"><?php echo $restMsg;?></h3>
          <?php } ?>
        </div>
   

         <div class="card bg-light p-4 mb-4 mt-5">
          <h4 class="mb-4"><?php echo $note;?> :</h4>
          <p><?php echo $disPhase;?></p>
            <p><?php echo $canditure;?></p>
            <ul class="pt-3 list-type-arrow">
              <li><?php echo $adharNumber;?>: XXXXXXXXXX</li>
              <!-- <li><?php echo $wsidNo;?>: WSID-XXXXX</li> -->
              <li><?php echo $skillPortal;?>: OSXXXXXX</li>
            </ul>
            <!-- <p>Results for Team Events i.e ( Mechtronics, Mobile Robotics, Cyber Security and Landscape Gardening) will be published shortly.</p> -->
            <!-- <p><?php echo $covidGuidance2;?></p> -->
        </div>
   
</section>

<!--end:: contarea-->
<!--start::Footer-->
<?php include 'include/footer.php' ?>
</body>
</html>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<script type="text/javascript">
    

    function validate() {
        if (!blankCheck('txtRegdNo', 'Please enter your registration or aadhar or mobile number'))
            return false;
        $('form').attr('action', '<?php echo SITE_URL;?>skill-result-status');
        $('form').submit();
        
    }

    $(document).ready(function() {
        <?php if ($outMsg != '' && !empty($_POST['txtRegdNo'])) { ?>
            viewAlert('<?php echo $outMsg; ?>', 'txtRegdNo', '<?php echo $redirectUrl;?>');
         <?php }  ?>
       });  
</script>
