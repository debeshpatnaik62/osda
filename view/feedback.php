<?php
/*plugin*/

/* ================================================
  File Name         	  	: course.php
  Description		  	: This is to view the course details
  Date Created		  	:
  Created By		  	: Rumana Parmeen
  Developed by                    : Ashis kumar Patra
  Developed on                    : 06-Dec-2018
  Update History		  	:
  <Updated by>				<Updated On>		<Remarks>

  ================================================== */
?>
<!doctype html>
<html lang="en">

<?php include 'include/header.php' ?>

<script src="<?php echo APP_URL; ?>js/loadComponent.js"></script>
<script src="<?php echo APP_URL; ?>js/loadAjax.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/feedback.css">

<form name="frmOsda" id="frmOsda"  method="post" action="" enctype="multipart/form-data" autocomplete="off">
<section class="container contarea">





	<div class="feedback">

		<div class="clearfix"></div>
		<!-- <div class="row">
			<div class="col-md-12 col-lg-6">
				<?php if($_SESSION['lang'] != 'O') {?>
				<h2 class="osda--heading">Feedback</h2>
				<p>These are stories of inspiring people who overcame adversities and hardships to transform their own lives and that of others by skilling themselves. Enhancing their skills and taking up vocations of different kinds, they have shown the desire and determination to succeed and become shining examples of Skilled-In-Odisha. They are our role models. </p>
			<?php } else { ?>
				<h2 class="osda--heading"><?php echo '&#2822;&#2858;&#2851;&#2841;&#2893;&#2837; &#2862;&#2852;&#2878;&#2862;&#2852;'; ?> </h2>
				<p>'&#2831;&#2873;&#2878; &#2873;&#2887;&#2825;&#2843;&#2879; &#2858;&#2893;&#2864;&#2887;&#2864;&#2851;&#2878;&#2854;&#2878;&#2911;&#2880; &#2860;&#2893;&#2911;&#2837;&#2893;&#2852;&#2879; &#2860;&#2879;&#2870;&#2887;&#2871;&#2841;&#2893;&#2837; &#2837;&#2878;&#2873;&#2878;&#2851;&#2880;&#59; &#2863;&#2887;&#2825;&#2817;&#2862;&#2878;&#2856;&#2887; &#2858;&#2893;&#2864;&#2852;&#2879;&#2837;&#2882;&#2867; &#2858;&#2864;&#2879;&#2872;&#2893;&#2853;&#2879;&#2852;&#2879; &#2862;&#2855;&#2893;&#2911;&#2864;&#2887; &#2837;&#2848;&#2879;&#2856; &#2858;&#2864;&#2879;&#2870;&#2893;&#2864;&#2862; &#2837;&#2864;&#2879; &#2856;&#2879;&#2844; &#2844;&#2880;&#2860;&#2856; &#2872;&#2873; &#2821;&#2856;&#2893;&#2911;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2844;&#2880;&#2860;&#2856;&#2855;&#2878;&#2864;&#2878;&#2864;&#2887; &#2858;&#2864;&#2879;&#2860;&#2864;&#2893;&#2852;&#2893;&#2852;&#2856; &#2822;&#2851;&#2879;&#2858;&#2878;&#2864;&#2879;&#2843;&#2856;&#2893;&#2852;&#2879;&#2404; &#2837;&#2887;&#2860;&#2867; &#2872;&#2887;&#2852;&#2879;&#2837;&#2879; &#2856;&#2881;&#2873;&#2887;&#2817;&#44; &#2856;&#2879;&#2844; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2883;&#2854;&#2893;&#2855;&#2879; &#2837;&#2864;&#2879;&#2860;&#2878; &#2872;&#2873; &#2860;&#2879;&#2861;&#2879;&#2856;&#2893;&#2856; &#2858;&#2893;&#2864;&#2837;&#2878;&#2864; &#2855;&#2856;&#2893;&#2854;&#2878;&#2862;&#2882;&#2867;&#2837; &#2852;&#2878;&#2866;&#2879;&#2862; &#2856;&#2887;&#2823; &#2872;&#2859;&#2867; &#2873;&#2887;&#2860;&#2878;&#2864; &#2823;&#2842;&#2893;&#2843;&#2878; &#2835; &#2860;&#2854;&#2893;&#2855;&#2858;&#2864;&#2879;&#2837;&#2864;&#2852;&#2878; &#2854;&#2887;&#2838;&#2878;&#2823;&#2843;&#2856;&#2893;&#2852;&#2879; &#2835; &#2872;&#2893;&#2837;&#2879;&#2866;&#2893;&#2849; &#2823;&#2856;&#2893; &#8204;&#2835;&#2849;&#2879;&#2870;&#2878;&#2864; &#2825;&#2854;&#2878;&#2873;&#2864;&#2851; &#2858;&#2878;&#2866;&#2847;&#2879;&#2843;&#2856;&#2893;&#2852;&#2879;&#2404; &#2872;&#2887;&#2862;&#2878;&#2856;&#2887; &#2873;&#2887;&#2825;&#2843;&#2856;&#2893;&#2852;&#2879; &#2822;&#2862; &#2858;&#2878;&#2823;&#2817; &#2864;&#2891;&#2866; &#2862;&#2849;&#2887;&#2866;&#2404;' </p> 
			<?php } ?></div>
			<div class="col-md-12 col-lg-6">
				<?php if($_SESSION['lang'] != 'O') {?>
				<img src="<?php echo SITE_URL;?>images/Feedback1.png" alt="feedback">
			<?php } else{ ?>
				<img src="<?php echo SITE_URL;?>images/feedback2.png" alt="feedback">
			<?php } ?>
			</div>
		</div>

		<div class="clearfix"></div> -->
		<div class="col-md-12 col-sm-12">


			<div class="form-group">
				<label><?php echo $strNamelbl; ?>:</label>
				<span class="required">*</span>
				<input type="text" class="form-control" id="txtName" name="txtName" value="<?php echo $strName; ?>" maxlength="100" autocomplete="off">
			</div>
			<div class="form-group">
				<label><?php echo $strEmailAddresslbl; ?>:</label>
				<!-- <span class="required">*</span> -->
				<input type="text" class="form-control" name="txtEmail" id="txtEmail" value="<?php echo $strEmail; ?>" maxlength="50" autocomplete="off">
			</div>
			<div class="form-group">
				<label><?php echo $strMobileNolbl; ?>:</label>
				<span class="required">*</span>
				<input type="text" class="form-control" id="txtPhone" name="txtPhone" value="<?php echo $strPhone; ?>" maxlength="10" autocomplete="off" onKeyPress="return isNumberKey(event);">
			</div>
			<div class="form-group">
				<label class="screenreader " tabindex="16"><?php echo $strfeedbacklbl; ?>:</label>
				<span class="required">*</span>
				<textarea class="form-control" rows="4" cols="10" name="txtMsg" id="txtMsg"onKeyUp="return TextCounter('txtMsg','lblChar1',5000)" onMouseUp="return TextCounter('txtMsg','lblChar1',5000)"><?php echo $strMessage; ?></textarea>
                                <span id="lblChar1" class="text-danger <?php echo $strNumLangCls; ?>"><?php echo $strMax500Charlbl; ?></span><span class="text-danger"> <?php echo $strCharlbl; ?> </span>
			</div>
			<div class="form-group">

				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<div class="form-group input-group-md">
							<input name="txtCaptcha" type="text" class="form-control  pull-left" style="width:100%;" id="txtCaptcha" autocomplete="off" onKeyUp="return blockspecialchar_first(this);" maxlength="20" placeholder="<?php echo $queryCaptcha;?>">
						</div>
					</div>

					<div class="col-sm-3 col-xs-10">
						<div class="captchaimg-sec screenreader">
							<div class="pull-right">
								<i class="fa fa-refresh" id="reload" onClick="generateCaptcha();" aria-hidden="true" style=""></i>
							</div>
							<div class="pull-left">
								<img src="<?php echo APP_URL;?>includes/captcha.php" alt="captcha image" align="absmiddle" style="" id="captchaImage"/>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>

					<div class="col-sm-3 col-xs-10">
						<input type="submit" class="osda--btn btn--rounded btn-block" id="btnSubmit" name="btnSubmit" value="<?php echo $strSubmitlbl; ?>" onclick="return validate();"/>
					</div>



				</div>
			</div>


		</div>


		<div class="clear50"></div>


		<div class="clear50 hidden-xs hidden-1024"></div>

	</div>










</section>

<!--end:: contarea-->
<!--start::Footer-->
<?php include 'include/footer.php' ?>
<script type="text/javascript" language="javascript">
    
 
  $(document).ready(function () {
     
      <?php if($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>              
                viewAlert('<?php echo $outMsg;?>','','');
      <?php }  ?>
          
         TextCounter('txtMsg','lblChar1',5000);
    
    
  });

    function validate()
     {
       //alert('xsacc');
        if (!blankCheck('txtName', 'Please enter your name'))
            return false;
        if (!checkSpecialChar('txtName'))
            return false;
        if (!maxLength('txtName', 100, 'Name'))
            return false;
        /*if (!blankCheck('txtEmail', 'Please enter your email'))
           return false;*/
        if (!checkSpecialChar('txtEmail'))
           return false;
        if (!validEmail('txtEmail'))
           return false; 
        if (!maxLength('txtEmail', 50, 'Email'))
           return false;        
            if (!blankCheck('txtPhone', 'Please enter your mobile number'))
           return false;        
        if (!checkSpecialChar('txtPhone'))
           return false;
        if (!validMobileNo('txtPhone','Enter a valid mobile no'))
           return false; 
        if (!maxLength('txtPhone', 10, 'Mobile no'))
           return false;    
        if (!blankCheck('txtMsg', 'Please enter your feedback'))
           return false;
        if (!checkSpecialChar('txtMsg'))
           return false;    
       if (!maxLength('txtMsg', 5000, 'feedback message'))
            return false;
        if (!blankCheck('txtCaptcha', 'Captcha can not be left blank'))
                    return false;

     }
  </script>
  