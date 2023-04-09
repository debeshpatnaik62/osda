<?php

/* ================================================
  File Name          : skill-registration-confirmation.php
  Description        : This is to confirmation for availability
  Date Created       :
  Created By         : Rahul kumar saw
  Developed by       : Rahul Kumar Saw
  Developed on       : 17-March-2021
  Update History        :
  <Updated by>          <Updated On>      <Remarks>

  ================================================== */
?>
<!doctype html>
<html lang="en">

<?php include 'include/header.php' ?>

<!-- <script src="<?php echo APP_URL; ?>js/loadComponent.js"></script>
<script src="<?php echo APP_URL; ?>js/loadAjax.js"></script> -->

<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/feedback.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/nano-unicorn.css">

<form name="frmOsda" id="frmOsda" method="post" action="" enctype="multipart/form-data" autocomplete="off">
   <section class="container contarea">

      <div>

            <div class="card bg-light p-4 mb-4 mt-5">
               <h4 class="mb-4"><?php echo $regdMsg; ?> :</h4>


               <ul class="list-type-arrow">
                  <li><?php echo $informationSap1; ?></li>
                  <li><?php echo $informationSap2; ?></li>
                  <li><?php echo $informationSap3; ?></li>
               </ul>

            </div>
            <div class="row align-items-center">
               <div class="col-sm-9">
                  <label for="intAccept"><input type="checkbox" id="intAccept" name="intAccept" value="1">&nbsp; <?php echo $terms; ?></label>
               </div>
               <div class="col-sm-3 text-center">
                  <input type="submit" class="osda--btn btn--rounded btn-block" id="btnSubmit" name="btnSubmit" value="Submit" onclick="return validate();" />
               </div>
            </div>
        

         <div class="clear50 hidden-xs hidden-1024"></div>



      </div>

   </section>

   <!--end:: contarea-->
   <!--start::Footer-->
   <?php include 'include/footer.php' ?>
   <script type="text/javascript" language="javascript">
      $(document).ready(function() {
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg; ?>', '', '<?php echo $redirectLoc;?>');
         <?php }  ?>
         

      });

      function validate() {
         
         if (!blankChkRad('intAccept', 'You must be agree to the above.'))
            return false;
      }
   </script>