<?php 
/*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 
Author : 
*/ 
$strPageTitle             = 'Check Venue';
?>
<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?>
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/nano-unicorn.css">
<!--start:: contarea-->
<section class="container contarea">
    <!-- <form name="frmOsda" id="frmOsda" method="post" action="" enctype="multipart/form-data" autocomplete="off">
    <div class="row mt-4 align-items-end">
    <div class="col-md-3"></div>
    <div class="col-md-4 form-group">
      <label>Enter Registration Number / Aadhar Number :</label>
      <span class="required">*</span>
      <input type="text" placeholder="Enter here" class="form-control" name="txtRegdNo" id="txtRegdNo" value="<?php echo $regdNo; ?>" maxlength="50" autocomplete="off">
   </div>

      <div class="col-md-2 form-group">
      <input type="button" class="osda--btn btn--rounded btn-block" id="btnSubmit" name="btnSubmit" value="Check Venue" onclick="return validate();"/>
     </div>
     <div class="col-md-3"></div>
 </div>
 </form> -->
<?php if (!empty($strName)) { ?>
    <div class="row my-5">
        <div class="col-sm-4">
            <div class="mb-3">
                <p class="mb-0">Name :</p>
                <h3 class="mt-0"><?php echo $strName;?></h3>
            </div>
            <div class="mb-3">
                <p class="mb-0">Registration Number :</p>
                <h3><?php echo $strAckNo;?></h3>

            </div>
            <div class="mb-3">
                <p class="mb-0">Aadhar Number :</p>
                <h3><?php echo $strAadharno;?></h3>

            </div>
            <div class="mb-3">
                <p class="mb-0">Email Address :</p>
                <h3><?php echo $strEmail;?></h3>

            </div>
            <?php if(!empty($strMobile)) { ?>
            <div class="mb-3">
                <p class="mb-0">Mobile Number :</p>

                <h3><?php echo $strMobile;?></h3>
            </div>
            <?php } if(!empty($strDistName)) { ?>
            <div class="mb-3">
                <p class="mb-0">District :</p>
                <h3 class="mt-0"><?php echo $strDistName;?></h3>
            </div>
        <?php } ?>
        </div>
        <div class="col-sm-4">
            <?php if(!empty($strVenueName)) { ?>
            <div class="mb-3">
                <p class="mb-0">Venue Name :</p>
                <h3 class="mt-0"><?php echo $strVenueName;?></h3>
            </div>
        <?php  } if(!empty($address)) { ?>
            <div class="mb-3">
                <p class="mb-0">Venue Address :</p>
                <h3><?php echo $address;?></h3>
            </div>
            <?php  } if(!empty($skillName)) { ?>
            <div class="mb-3">
                <p class="mb-0">Skill/ Trade :</p>

                <h3><?php echo $skillName;?></h3>
            </div>
            <?php } if(!empty($serverCode)) { ?>
            <div class="mb-3">
                <p class="mb-0">Server Code :</p>
                <h3 class="mt-0"><?php echo $serverCode;?></h3>
            </div>
            <?php } if(!empty($examDate)) { ?>
            <div class="mb-3">
                <p class="mb-0">Exam Date :</p>
                <h3><?php echo $examDate;?></h3>

            </div>
            <?php } if(!empty($examTime)) { ?>
            <div class="mb-3">
                <p class="mb-0">Exam Time :</p>

                <h3><?php echo $examTime;?></h3>
            </div>
             <?php } if(!empty($level)) { ?>
            <div class="mb-3">
                <p class="mb-0">Level :</p>

                <h3><?php echo $level;?></h3>
            </div>
             <?php } ?>
        </div>
         <div class="col-sm-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <div class="photos">
                        <div>
                            <?php if((!empty($profilePhoto)) && file_exists(APP_PATH.'uploadDocuments/skillCompetition/'.$strAckNo.'/'.$profilePhoto)) { ?>
                                <img src="<?php echo APP_URL.'uploadDocuments/skillCompetition/'.$strAckNo.'/'.$profilePhoto; ?>">
                            <?php }  else {?>
                                <img src="<?php  echo  SITE_URL;?>images/demo-profile.png">
                            <?php } ?>
                        </div>
                        <div><img src="<?php  echo  SITE_URL;?>include/generateQR.php?text=<?php echo $regdNo; ?>"></div>
                    </div>
                    <div class="mt-5">
                        <a class="osda--btn btn--rounded btn-block text-white"  href="javascript:void(0); " onclick ="downloadAdmitCard()">Download Admit Card</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

    
        <div class="text-center py-5" style="<?php echo ( isset($flag) && $flag==1)?'display: block;':'display: none;';  ?>">
            <h3 class="text-danger text-center mb-4 mt-3">Sorry! You are not eligible for Odisha Skill Competition. For further details please see the note below.</h3>

        <div class="card bg-light p-4 mb-4 mt-5">
          <h4 class="mb-4 text-left">Probable Reasons for not eligible of Odisha Skill Competition.</h4>
            <ul class="pt-3 list-type-arrow text-left">
              <li>Incorrect registration number / aadhar number is entered.</li>
              <li>Odisha Skills 2021 is not conducting Competition in Freight Forwarding, Floristry, Print media Technology, Visual Merchandising, Additive Manufacturing, Building Information modelling, Industrial Design Technology, Mobile Application development, Renewable Energy, Robot system Integration and Yoga skills.</li>
               <li>Candidates who have registered in 2021 in skills other than Electrical Installation, Electronics, Automobile Technology, CNC Turning and Welding will be directly eligible to appear for Zonal Round. </li>
            </ul>
        </div>
        </div>

</section>

<!--end:: contarea-->
<!--start::Footer-->
<?php include 'include/footer.php' ?>
</body>
</html>
<script type="text/javascript">
    function downloadAdmitCard(){
        var qrUrl = "<?php echo SITE_URL.'include/generateQR2.php?text='.$regdNo ;?>";
        //var qrUrl = "<?php //echo SITE_URL.'include/generateQR2.php?text='.$regdNo.'_'.$firstName.'_'.$examDate.'_'.$level ;?>";
        //console.log(qrUrl);
        var dowloadURL = "<?php echo SITE_URL;?>admitCard/<?php echo $regdNo; ?>";
           $.ajax({
               type: "GET",
               url: qrUrl,
               dataType: "html",
               success: function (data) {
                  if(data =='success'){
                      window.open(dowloadURL);
                    }
               }
           });
    }
    function validate() {
        if (!blankCheck('txtRegdNo', 'Please enter your registration number or aadhar number'))
            return false;
        //$('form').attr('action', '<?php echo SITE_URL;?>payment-process');
        $('form').submit();
    }

    $(document).ready(function() {
        <?php if ($outMsg != '' && !empty($_POST['txtRegdNo'])) { ?>
            viewAlert('<?php echo $outMsg; ?>', 'txtRegdNo', '');
         <?php }  ?>
       });  
</script>
<style>
    .photos {
        display: flex;
    }
    .photos div {
        flex: 1;
        padding: 0.5rem;
    }
    .photos div img {
        width: 100%;
        display: block;
        border: 3px solid #e2e2e2;
    }
</style>