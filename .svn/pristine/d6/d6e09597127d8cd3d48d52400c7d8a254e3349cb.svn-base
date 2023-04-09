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
        <div class="text-center py-5" style="<?php echo (isset($qualifyStatus) && $qualifyStatus==1)?'display: block;':'display: none;';  ?>">
          <?php if($strSkills=='Heavy Vehicle Technology') {?>
            <h3 style="text-align: center;" class="text-success mb-4 mt-3"><?php echo $heavyVic1;?>&nbsp;<strong><?php echo $strSkills;?></strong>&nbsp;<?php echo $heavyVic2;?></h3>
             <?php if($regType!='WS') { ?>
             <p class="text-center">
                <?php echo $heavyCon1;?>&nbsp;<strong><?php echo $strSkills;?></strong>&nbsp;<?php echo $heavyCon2;?>
            </p>
            <p class="text-center">
                <a href="<?php echo SITE_URL.'skill-compete-register/'.$objComp->encrypt($comptId);?>" class="osda--btn btn--rounded"><?php echo $edit;?></a>
            </p> 
          <?php } ?>
          <?php } elseif($strSkills=='Cyber Security' || $strSkills=='Landscape Gardening' || $strSkills=='Mechatronics' || $strSkills=='Mobile Robotics' || $strSkills=='Robot System Integration' || $strSkills=='Industry 4.O' ) {?>
            <h3 style="text-align: center;" class="text-success mb-4 mt-3"><?php echo $pairMsg;?></h3>
            <p class="text-center">
                <a href="<?php echo SITE_URL.'skill-registration-confirmation/'.$objComp->encrypt($comptId."@@@".$intType);?>" class="osda--btn btn--rounded"><?php echo $confirm;?></a>
            </p>
          <?php } else { ?>
            <h3 style="text-align: center;" class="text-success mb-4 mt-3"><?php echo $conMsg;?></h3>
            <p class="text-center">
                <a href="<?php echo SITE_URL.'skill-registration-confirmation/'.$objComp->encrypt($comptId."@@@".$intType);?>" class="osda--btn btn--rounded"><?php echo $confirm;?></a>
            </p>
          <?php } ?>
        </div>
   
        <div class="text-center py-5" style="<?php echo ( isset($qualifyStatus) && $qualifyStatus==0)?'display: block;':'display: none;';  ?>">
          <?php if($freshRegType=='Fresh'){ ?>
            <h3 class="text-danger text-center mb-4 mt-3"><?php echo $freshRegMsg;?></h3>
          <?php } else{ ?>
            <h3 class="text-danger text-center mb-4 mt-3"><?php echo $regreatMsg1;?>&nbsp;<strong><?php echo $strSkills;?></strong>&nbsp;<?php echo $regreatMsg2;?></h3>

             <?php } if($regType!='WS' && empty($freshRegType)) {
             if($teamId=='') {?>
            <p class="text-center">
                <?php echo $updateMsg1;?>
            </p>
            <p class="text-center">
                <a href="<?php echo SITE_URL.'skill-compete-register/'.$objComp->encrypt($comptId);?>" class="osda--btn btn--rounded"><?php echo $edit;?></a>
            </p>
          <?php } else { ?> 
            <p class="text-center">
                <?php echo $forNoEdit1;?>&nbsp;<?php echo $strUpdatedSkills;?>&nbsp;<?php echo $forNoEdit2;?><strong>&nbsp;<?php echo $name .'('.$aadharId.')';?></strong>
            </p>
          <?php } } ?>
        </div>

        <div class="card bg-light p-4 mb-4 mt-5">
          <h4 class="mb-4"><?php echo $note;?> :</h4>
          <p><?php echo $disPhase;?></p>
            <p><?php echo $canditure;?></p>
            <ul class="pt-3 list-type-arrow">
              <li><?php echo $adharNumber;?>: XXXXXXXXXX</li>
              <li><?php echo $wsidNo;?>: WSID-XXXXX</li>
              <li><?php echo $skillPortal;?>: OSXXXXXX</li>
            </ul>
            <p><?php echo $covidGuidance1;?></p>
            <p><?php echo $covidGuidance2;?></p>
        </div>
        <div class="text-center">
          <?php  if ($_SESSION['lang'] == 'O') { ?>
          <a href="<?php echo SITE_URL; ?>images/Skill_Competition_FAQ.pdf" target="_new" class="osda--btn btn--rounded"><?php echo $faq;?></a>
          <?php  } else { ?>
            <a href="<?php echo SITE_URL; ?>images/Skill_Competition_FAQ.pdf" target="_new" class="osda--btn btn--rounded"><?php echo $faq;?></a>
          <?php } ?>
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
        $('form').attr('action', '<?php echo SITE_URL;?>skill-registration-status');
        $('form').submit();
        
    }

    $(document).ready(function() {
        <?php if ($outMsg != '' && !empty($_POST['txtRegdNo'])) { ?>
            viewAlert('<?php echo $outMsg; ?>', 'txtRegdNo', '<?php echo $redirectUrl;?>');
         <?php }  ?>
       });  
</script>
