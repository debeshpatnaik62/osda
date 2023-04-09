<?php
/*plugin*/
/*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 28th Dec 2018
Author : MRD
*/
?>

<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?>
<link rel="stylesheet" type="text/css"
	href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/skill-competition.css">

<!-- added by deepak pandey dt: 25-07-2022 -->
<form name="frmOsda" id="frmOsda" method="post" action="" enctype="multipart/form-data" autocomplete="off">
<div class="container-fluid">
	<!-- banner section -->
	<div class="banner-section pt-4">
		<div id="banner-carousel" class="carousel fade" data-ride="carousel" data-interval="false">

			<?php  if ($intTotalBanner > 0) {?>
			<div class="carousel-inner">
				<?php $total = 0;  $counter = 0; while ($rowT = $bannerResul->fetch_array()) { 
				$counter++;
				$bannerImage = isset($rowT['VCH_LARGE_IMAGE']) ? APP_URL . 'uploadDocuments/banner/' . $rowT['VCH_LARGE_IMAGE'] : '';
				$videoUrl = isset($rowT['VCH_URL']) ? $rowT['VCH_URL'] : '';
				//$videoFile = isset($rowT['VCH_URL']) ? APP_URL . 'uploadDocuments/Video/VideoFile/' . $rowT['VCH_URL'] : '';
				$thumbImage = isset($rowT['VCH_LARGE_IMAGE']) ? APP_URL . 'uploadDocuments/Video/ThumbImage/' . $rowT['VCH_LARGE_IMAGE'] : '';
				$title = !empty($rowT['VCH_HEADLINE_E']) ? htmlspecialchars_decode($rowT['VCH_HEADLINE_E'], ENT_QUOTES) : '';
				$activeCLass = ($counter == 1) ? 'active' : '';
				$typeId    = $rowT['INT_TYPE_ID'];
			    if($typeId==2){?>

			  <div class="carousel-item <?php echo $activeCLass;?>">
				<img src="<?php echo $bannerImage;?>" alt="banner images">
			  </div> 
			  <?php } else if($typeId==3) {?>  
			  <div class="carousel-item">
				<iframe class="h-100 w-100" src="<?php echo $videoUrl;?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			  </div>  
			<?php } 
					$total++;
				} ?>
			   
			</div> 
			<ol class="carousel-indicators">
				<?php for($i=0;$i<$total;$i++){

				 ?>
			  		<li data-target="#banner-carousel" data-slide-to="<?php echo $i;?>"  class="<?php echo ($i==0)?'active':'';?>"></li>
			 	<?php } ?>
			</ol>  
			<?php } ?>

			
		  </div>
	</div>
	<!-- banner section end -->
	<!-- news & login section -->
	
	<div class="row py-4">
		<div class="col-xl-8">
			<div class="row mb-4 mb-xl-0"> 
				<div class="col-lg-7 ">
					<div class="tab-content news-preview">
						<?php  
						$counter = 0; 
						while ($rowN = $newsResult->fetch_array()) { 
						$counter++;
						$newsImage = isset($rowN['vchImageFile']) ? APP_URL . 'uploadDocuments/news/' . $rowN['vchImageFile'] : '';
						$hedline    = !empty($rowN['vchHeadLineE']) ? htmlspecialchars_decode($rowN['vchHeadLineE'], ENT_QUOTES) : '';
						$headlineO  = !empty($rowN['vchHeadLineH']) ? htmlspecialchars_decode($rowN['vchHeadLineH'], ENT_QUOTES) : '';
						$desc      = !empty($rowN['vchDescriptionE']) ? htmlspecialchars_decode($rowN['vchDescriptionE'], ENT_QUOTES) : '';
						$descO     = urldecode($rowN['vchDescriptionH']);
						$description = ($_SESSION['lang'] == 'O') ? $descO : $desc;
						$title = ($_SESSION['lang'] == 'O') ? $headlineO : $hedline;
						$nesDate   =  date("d-M-Y",strtotime($rowN['dtmNewsDate']));
						$activeCLass = ($counter == 1) ? 'active' : '';
						$newsId    = $rowN['intNewsId'];
					    ?>
						<div class="tab-pane fade show <?php echo $activeCLass;?>" id="news-list<?php echo $newsId;?>" role="tabpanel" aria-labelledby="news-list<?php echo $newsId;?>-tab">
							<img src="<?php echo $newsImage;?>" alt="Skill Competition"> 
							<div class="news-details">
								<h2><?php echo $title;?></h2>
								<p class="mb-3"><?php echo $objNews->wardWrap($description, 200);?></p>
								<div>
									<i class="fa fa-calendar text-warning pr-2" aria-hidden="true"></i>
									<span><?php echo $nesDate;?></span>
								</div>
							</div>
						</div>
						<?php  }?>
					</div> 
				</div>
				<div class="col-lg news-lists-parent">
					<nav class="nav nav-tabs flex-column news-lists"  id="nav-tab" role="tablist">
						<?php  
						$counter = 0;
						mysqli_data_seek($newsResult, 0); 
						while ($rowD = $newsResult->fetch_array()) { 
						$counter++;
						$newsImage = isset($rowD['vchImageFile']) ? APP_URL . 'uploadDocuments/news/' . $rowD['vchImageFile'] : '';
						$hedline    = !empty($rowD['vchHeadLineE']) ? htmlspecialchars_decode($rowD['vchHeadLineE'], ENT_QUOTES) : '';
						$headlineO  = !empty($rowD['vchHeadLineH']) ? htmlspecialchars_decode($rowD['vchHeadLineH'], ENT_QUOTES) : '';
						$newsdesc      = !empty($rowD['vchDescriptionE']) ? htmlspecialchars_decode($rowD['vchDescriptionE'], ENT_QUOTES) : '';
						$newsdescO     = urldecode($rowD['vchDescriptionH']);
						$desc = ($_SESSION['lang'] == 'O') ? $newsdescO : $newsdesc;
						$title = ($_SESSION['lang'] == 'O') ? $headlineO : $hedline;
						$nesDate   =  date("d-M-Y",strtotime($rowD['dtmNewsDate']));
						$activeCLass = ($counter == 1) ? 'active' : '';
						$newsId    = $rowD['intNewsId'];

						$newsShortDesc = $objNews->wardWrap($desc, 80);
					    ?>

						<a class="nav-link  screen-reader <?php echo $activeCLass;?>" id="news-list<?php echo $newsId;?>-tab" data-toggle="tab" href="#news-list<?php echo $newsId;?>">
							<img src="<?php echo $newsImage;?>" alt="Skill Competition">
						
							<div class="news-headlines-title">
								<p><?php echo $newsShortDesc;?></p>
								<div class="news-date">
									<i class="fa fa-calendar text-warning pr-2" aria-hidden="true"></i>
									<small><?php echo $nesDate;?></small>
								</div>
							</div>
						</a>
						<?php  }?>				
						
			  
					  </nav>  
				</div> 
			  </div>
		</div>
		<div class="col-xl-4 login-container2-parent">
			<div class="login-container2">
				<h3>Student Login for Skill Competition</h3>
				<div class="form-group row">
					<div class="col-sm-8 col-xs-12">
						<label for="coursera"> Registration No. / Mobile No. </label>
						<input type="text" name="txtRegdNo" id="txtRegdNo"  class="form-control " value="<?php echo $nid;?>" autocomplete="off">
					</div>
					<div class="col-sm-3 col-md-4 pl-sm-0">
						<div class="custome-mrtop">
							<input type="submit" class="generate-otp-btn" id="btnOTP" name="btnOTP" value="Generate OTP"
								onclick="return validateGenerate();">
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-8 col-xs-12">
						<label for="coursera" class="coustomd-none">OTP </label>
						<input type="text" name="txtVerify" id="txtVerify"  class="form-control d-block" value="<?php echo $otp;?>" autocomplete="off">
						<!-- <span class="verify"></span> -->
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-8  col-xs-12">
						<label for="coursera" class="coustomd-none">Captcha </label>
						<input type="text" name="txtCaptcha" id="txtCaptcha" placeholder="Enter Captcha "
							class="form-control d-block" autocomplete="off">
					</div>
					<div class="col-sm-3  captcha_form pl-sm-0 align-self-end">
						<label for="coursera" class="d-sm-block d-none "> </label>
						<div class="captcha-img d-flex align-items-end">
							<img src="<?php echo APP_URL; ?>includes/captcha.php" alt="captcha image" align="absmiddle" style="" id="captchaImage">
                       		<span class="captcha_refresh "><i class="fa fa-refresh" id="reload" onClick="generateCaptcha();" aria-hidden="true" style=""></i></span> 

						</div>
					</div>
				</div>
				<div class=" text-center mb-3  mt-sm-3 mt-4 px-0">
					<input type="submit" class="btn login-btn" id="btnSubmit" name="btnSubmit" value="Login"
						onclick="return validateLogin();">

				</div>
				<div class="or-section text-center"><span>OR</span></div>
				<p class="text-center  mt-2 mb-3">New Registration for Skill Competition</p>
				<div class=" text-center">
					<a class="btn login-outline-btn  mt-1"
						href="<?php echo SITE_URL;?>skill-compete-register"> Register Here</a>

				</div>
			</div>
		</div>
	
	</div>
	<!-- news & login section end -->
	<!--start:: partner info-->
	<div class="partner-info">
		<h2>Partners </h2>
		<div class="owl-carousel partner-info-carousel">
			<?php if ($intTotalBanner > 0) {?>
			
				<?php  while ($rowP = $partnerResult->fetch_array()) { 
				
				$partnerImage = isset($rowP['vchImageFile']) ? APP_URL . 'uploadDocuments/Partner/' . $rowP['vchImageFile'] : '';
				$source = isset($rowP['vchSource']) ? $rowP['vchSource'] : 'javascript:void(0)';
				$title = !empty($rowP['vchHeadLineE']) ? htmlspecialchars_decode($rowP['vchHeadLineE'], ENT_QUOTES) : '';
				?>
				<div class="item text-center">
				<a href="<?php echo $source;?>" class="d-block" target="_blank">
					<img src="<?php echo $partnerImage;?>" alt="<?php echo $title;?>">
				</a>
				</div>
			<?php }?>
			
			<?php }?>
		</div>
	</div>
	<!--end:: partner info-->
</div>
</form>
<!-- added by deepak pandey dt: 25-07-2022 end-->





<!--start::Footer-->
<?php include 'include/footer.php' ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
 
<script>
	/* added by deepak pandey dt: 25-07-2022*/
	$(function(){ 
		  
		// if($(window).width()> 1500 || ($(window).width() > 700 && $(window).width() < 1200)){
		// 	var newsTitle = $('.news-headlines-title p').text().substr(0,90);
		// 	$('.news-headlines-title p').text(newsTitle + "...");
		// } else {
		// 	var newsTitle = $('.news-headlines-title p').text().substr(0,50);
		// 	$('.news-headlines-title p').text(newsTitle + "...");
		// }
		// console.log() 
		$('.carousel').carousel({
			interval: false
		})
	})
		// partner info carousel
		$('.owl-carousel.partner-info-carousel').owlCarousel({
			loop: true,
			margin: 10,
			responsiveClass: true,
			responsive: {
				0: {
					items: 2,
					nav: true
				},
				600: {
					items: 4,
					nav: false
				},
				1000: {
					items: 7,
					nav: true,
					loop: false
				}
			}
		})

	/* added by deepak pandey dt: 25-07-2022 end*/

	initSlider();
	function initSlider() {
		$(".owl-carousel").owlCarousel({
			items: 1,
			loop: true,
			dots: false,
			autoplay: true,
			onInitialized: startProgressBar,
			onTranslate: resetProgressBar,
			onTranslated: startProgressBar
		});
	}

	function startProgressBar() {
		// apply keyframe animation
		$(".slide-progress").css({
			width: "100%",
			transition: "width 5000ms"
		});
	}

	function resetProgressBar() {
		$(".slide-progress").css({
			width: 0,
			transition: "width 0s"
		});
	}

    $(document).ready(function() {
        <?php if ($outMsg!='' && isset($_REQUEST['btnOTP'])) { ?>
            viewAlert('<?php echo $outMsg; ?>', '', '');
         <?php }  ?>
         <?php if ($outMsg!='' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg; ?>', '', '<?php echo $redirectLoc;?>');
         <?php }  ?>

       });
     function validateLogin() 
     {
         if (!blankCheck('txtRegdNo', 'Please enter Registration No. / Mobile No.'))
            return false;
          if (!blankCheck('txtVerify', 'Please enter OTP'))
            return false;
          if (!blankCheck('txtCaptcha', 'Captcha can not be left blank'))
            return false;
    }

    function validateGenerate() 
     {
         if (!blankCheck('txtRegdNo', 'Please enter Registration No. / Mobile No.'))
            return false;
    }
   </script>
</body>

</html>