<?php
/*plugin*/

/* ================================================
  File Name          : skill-development-login.php
  Description        : This is login for skill development
  Date Created       :
  Created By         : Rahul kumar saw
  Developed by       : Rahul Kumar Saw
  Developed on       : 20-April-2022
  Update History        :
  <Updated by>          <Updated On>      <Remarks>

  ================================================== */
?>
<!doctype html>
<html lang="en">

<?php include 'include/header.php';?>


<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/feedback.css"> 
<link rel="stylesheet" type="text/css"
	href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"> 
   <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/lightGallery.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/skill-development-login.css">




<form name="frmOsda" id="frmOsda" method="post" action="" enctype="multipart/form-data" autocomplete="off">
   
  <!-- added by deepak pandey dt:  09-08-2022  -->
   <!-- new section -->
   <div class="container-fluid">
	<!-- banner section -->
	<div class="banner-section pt-4">
		<div id="banner-carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">

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
	
		<div class="col-xl-5 login-container2-parent  mb-4 mb-xl-0"> 
  <div class="login-container2">
      <h3>Student Login for Digitall</h3>
      <div class="form-group row">
         <div class="col-sm-8 col-xs-12">
            <label for="txtRegdNo">  Registration No. / Mobile No.</label>
            <input type="text" name="txtRegdNo" id="txtRegdNo"   class="form-control " value="<?php echo $nid;?>">
         </div>
         <div class="col-sm-3 col-md-4 pl-sm-0">
            <div class="custome-mrtop"> 
                  <input type="submit" id="btnOTP" class="generate-otp-btn"  name="btnOTP" value="Generate OTP" onclick="return validateGenerate();" >
            </div>
         </div>
      </div>
      <div class="form-group row">
         <div class="col-sm-8 col-xs-12">
            <label for="coursera" class="coustomd-none">OTP </label>
            <input type="text" name="txtVerify" id="txtVerify"  class="form-control d-block" value="<?php echo $otp;?>">
             <!-- <div class="d-flex justify-content-between">
                     <div> <small  class="text-danger mb-0">OTP valid upto : <span class="font-weight-bolder">1:59 sec</span></small></div>
                                    
                                    <a href="javascript:void(0);" class="vaild-text">Resend OTP</a>
                                 </div> -->
                     <!--  <span class="verify">
                     <?php if($verifiedStatus==1){?>
                           <img src="<?php echo SITE_URL; ?>images/check.png" alt="Valid">
                     
                        <?php } else if($verifiedStatus==2){ ?>
                           <img src="<?php echo SITE_URL; ?>images/close.png" alt="Invalid">
                  
                        <?php } ?> 
                     </span> -->
         </div>
      </div>
      <div class="form-group row">
         <div class="col-sm-8  col-xs-12">
            <label for="txtCaptcha" class="coustomd-none">Captcha </label>
            <input type="text" name="txtCaptcha" id="txtCaptcha"  class="form-control d-block">
         </div>
         <div class="col-sm-3  captcha_form pl-sm-0 align-self-end">
            <label for="coursera" class="d-sm-block d-none "> </label>
            <div class="captcha-img d-flex ">
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
      <p class="text-center  mt-2 mb-3">Registration for Digitall Skilling Program</p>
      <div class=" text-center  button-grp">
         <a class="btn login-outline-btn  mt-1" href="<?php echo SITE_URL;?>skill-development">Student</a>
         <a class="btn login-outline-btn  mt-1  ml-md-2 custome-ml  mt-1" href="<?php echo SITE_URL;?>skill-training-partner">Training Partner</a>
         <a class="btn login-outline-btn  mt-1  ml-md-2 custome-ml  mt-1" href="<?php echo SITE_URL;?>skill-institute">Institution</a> 
         <a class="btn login-outline-btn  mt-1  ml-md-2 custome-ml  mt-1" href="<?php echo SITE_URL;?>totRegistration">ToT Registration</a> 
      </div>
 </div>   
		</div>
      <!-- Gallery -->
			<div class="col-md-6 col-xl-4 small-carousel-sec mb-4 mb-md-0">
				<h2 class="conatainer-title">Gallery</h2> 
            <div class="card  card-shadow gallery-carousel "> 
               <div class="card-body">
               <ul class="  galleryinner"> 
					<?php if ($intTotalGallery > 0) {?>
			
					<?php  while ($rowG = $galleryResult->fetch_array()) { 
					
					$galleryImage = isset($rowG['VCH_LARGE_IMAGE']) ? APP_URL . 'uploadDocuments/banner/' . $rowG['VCH_LARGE_IMAGE'] : '';
					$videoUrl = isset($rowG['VCH_URL']) ? $rowG['VCH_URL'] : '';
					$title = !empty($rowG['VCH_HEADLINE_E']) ? htmlspecialchars_decode($rowG['VCH_HEADLINE_E'], ENT_QUOTES) : '';
					?>
					<li>
						<a href="<?php echo $galleryImage;?>" data-thumbnail="<?php echo $galleryImage;?>" data-group="cat-45" class="html5lightbox galleryNew Portfolio hovereffect" data-width="480" data-height="320" title="<?php echo $title;?>">
							<img src="<?php echo $galleryImage;?>">
							<div class="innericons"> <i class="fa fa-picture-o" aria-hidden="true"></i></div>
							<div class="overlay">
								<span class="multi_hover"><i class="fa fa-search" aria-hidden="true"></i></span>
							</div>
						</a>
					</li> 
				<?php }?>
				
				<?php }?>

					
				</ul>
               </div>
            </div>
			
 
			</div>
			<!-- Gallery end -->
			<!-- Partner Information -->
			<div class="col-md-6 col-xl-3 small-carousel-sec">
				<h2 class="conatainer-title">Partners</h2>  
               <div class="card partner-card card-shadow partner-carousel"> 
                  <div class="card-body">
                     <ul>
                        <?php if ($intTotalPartner > 0) {?>
      
                        <?php  while ($rowP = $partnerResult->fetch_array()) { 
                        
                        $partnerImage = isset($rowP['vchImageFile']) ? APP_URL . 'uploadDocuments/Partner/' . $rowP['vchImageFile'] : '';
                        $source = isset($rowP['vchSource']) ? $rowP['vchSource'] : 'javascript:void(0)';
                        $title = !empty($rowP['vchHeadLineE']) ? htmlspecialchars_decode($rowP['vchHeadLineE'], ENT_QUOTES) : '';
                        ?>
                        <li>
                           <a href="<?php echo $source;?>" class="d-block" target="_blank">
                              <img src="<?php echo $partnerImage;?>" alt="<?php echo $title;?>">
                           </a>
                        </li>
                     <?php }?>
                     
                     <?php }?>
                     </ul>
                  </div> 
               </div>  
					<!-- <div class="item">
						<div class="card partner-card card-shadow"> 
							<div class="card-body">
								<ul>
									<li>
										<a href="javascript:;" class="d-block">
											<img src="images/DDUGKY-lg.png" alt="parterns imgs">
										</a>
									</li>
									<li>
										<a href="javascript:;" class="d-block">
											<img src="images/pmkvy.png" alt="parterns imgs">
										</a>
									</li>
									<li>
										<a href="javascript:;" class="d-block">
											<img src="images/orient.jpg" alt="parterns imgs">
										</a>
									</li>
									<li>
										<a href="javascript:;" class="d-block">
											<img src="images/poimtec.jpg" alt="parterns imgs">
										</a>
									</li>
								</ul>
							</div> 
						</div> 
					</div>  -->   
			</div>
			<!-- Partner Information end -->
	
	</div>
	<!-- news & login section end -->
	<!--start:: partner info-->
	
	<!--end:: partner info-->
	<section class="small-carousel-sec">
		<div class="row">
			<!-- Social Media Feeds -->
			<div class="col-md-6 col-xl-3">
				<h2 class="conatainer-title">Social Media Feeds</h2> 
				<div class="social-feed mb-4 mb-md-0">
				<a class="twitter-timeline" href="https://twitter.com/skilled_odisha?ref_src=twsrc%5Etfw">Tweets by skilled_odisha</a>
				<script defer src="https://platform.twitter.com/widgets.js"></script>
				</div>
			</div>
			<!-- Social Media Feeds end-->
			<!-- Testimonials -->
			<div class="col-md-6 col-xl-3">
				<h2 class="conatainer-title">Testimonials</h2> 
				<div class="testimonial-carousel owl-carousel">
					<?php if ($intTotalMonial > 0) {?>
			
					<?php  while ($rowG = $testimonialResult->fetch_array()) { 

						$userImage = isset($rowG['vchImage']) ? APP_URL . 'uploadDocuments/Testimonial/' . $rowG['vchImage'] : '';
						$testName = isset($rowG['vchName']) ? $rowG['vchName'] : '';
						$testNameO = isset($rowG['vchNameO']) ? $rowG['vchNameO'] : '';
						$designation = !empty($rowG['vchDesignation']) ? htmlspecialchars_decode($rowG['vchDesignation'], ENT_QUOTES) : '';
						$designationO = !empty($rowG['vchDesignationO']) ? htmlspecialchars_decode($rowG['vchDesignationO'], ENT_QUOTES) : '';
						$desc = !empty($rowG['vchDescription']) ? htmlspecialchars_decode($rowG['vchDescription'], ENT_QUOTES) : '';
						$descO = !empty($rowG['vchDescriptionO']) ? htmlspecialchars_decode($rowG['vchDescriptionO'], ENT_QUOTES) : '';
						$description = ($_SESSION['lang'] == 'O') ? $descO : $desc;
						$desig = ($_SESSION['lang'] == 'O') ? $designationO : $designation;
						$name = ($_SESSION['lang'] == 'O') ? $testNameO : $testName;
            $shortDesc = $objNews->wardWrap($description, 500);
						?>
					<div class="item">
						<div class="card testimonial-card card-shadow"> 
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="testimonial-card-img mr-3">
										<img src="<?php echo $userImage;?>" alt="<?php echo $name;?>">
										 <i class="fa fa-quote-right"></i>
									</div>
									<div>
										<h6 class="testimonial-card-name"><?php echo $name;?></h6>
										<span class="testimonial-card-occupation"><?php echo $desig;?></span>
									</div>
								</div> 
								<p><?php echo $shortDesc;?></p>
							</div>
							<div class="bg-quote">
								<svg id="Group_18" data-name="Group 18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="0 0 54.565 38.452">
											<defs>
												<clipPath id="clip-path">
												<rect id="Rectangle_34" data-name="Rectangle 34" width="54.565" height="38.452"/>
												</clipPath>
											</defs>
											<g id="Group_17" data-name="Group 17" transform="translate(0 0)" clip-path="url(#clip-path)">
												<path id="Path_40" data-name="Path 40" d="M28.408,11.029a24.137,24.137,0,0,1,.878-3.373,11.66,11.66,0,0,1,9.3-7.471A11.3,11.3,0,0,1,48.633,3.248a12.564,12.564,0,0,1,3.747,7.121,24.954,24.954,0,0,1,.191,6.572A32.372,32.372,0,0,1,49.08,29.065a31.027,31.027,0,0,1-6.749,8.958c-.622.564-1,.566-1.6-.025Q38.861,36.143,37,34.274c-.516-.519-.547-.813-.126-1.456a18.752,18.752,0,0,0,2.539-5.3,8.989,8.989,0,0,0,.387-3.215,30.915,30.915,0,0,1-3.933-1.118,11.818,11.818,0,0,1-7.348-9.518c-.029-.173-.076-.343-.114-.514ZM41.637,36.415c.894-1.031,1.842-2.019,2.673-3.1a30.35,30.35,0,0,0,6.615-20.63,13.152,13.152,0,0,0-1.4-5.454A10.158,10.158,0,0,0,38.406,1.909,10.367,10.367,0,0,0,40,22.422c1.1.038,1.27.185,1.457,1.266a4.256,4.256,0,0,1,.059.581,14.579,14.579,0,0,1-1.891,7.264c-.331.639-.706,1.258-1.064,1.89l3.077,2.993" transform="translate(-28.408 0.008)"/>
												<path id="Path_41" data-name="Path 41" d="M24.276,15.936c-.172,1.315-.3,2.636-.522,3.942a32.225,32.225,0,0,1-4.293,11.36,29.793,29.793,0,0,1-5.53,6.778c-.643.582-1.022.586-1.636-.025q-1.834-1.818-3.654-3.648c-.574-.577-.612-.848-.164-1.535A17.216,17.216,0,0,0,11.1,27.1c.2-.941.265-1.913.387-2.838-1.084-.236-2.048-.38-2.972-.658A12.059,12.059,0,0,1,9.588.279a11.841,11.841,0,0,1,13,6.1,14.4,14.4,0,0,1,1.612,5.95,5.063,5.063,0,0,0,.078.518v3.085m-11.058,20.5c.893-1.031,1.835-2.022,2.67-3.1a30.428,30.428,0,0,0,6.644-17.759,19.094,19.094,0,0,0-.6-6.369A10.321,10.321,0,1,0,4.3,18.935a10.231,10.231,0,0,0,7.485,3.509c.837.03,1.075.237,1.213,1.04a10.357,10.357,0,0,1-.384,4.567,19.245,19.245,0,0,1-2.237,4.971c-.094.152-.143.482-.053.573.917.937,1.866,1.841,2.893,2.838" transform="translate(30.29 -0.005)"/>
											</g>
											</svg> 
							</div>
						</div> 
					</div> 
					<?php } }?>
				</div>
			</div>
			<!-- Testimonials end -->
         <!-- news section -->
         <div class="col-xl-6">
			<div class="row mb-4 mb-xl-0"> 
				<div class="col-lg-7">
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
								<p class="mb-3"><?php echo $objNews->wardWrap($description, 140);?></p>
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
						$newsShortDesc = $objNews->wardWrap($desc, 50);
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
         <!-- news section end -->
			
		</div>
	</section>
</div>
   <!-- new section end -->
     <!-- added by deepak pandey dt:  09-08-2022  -->
</form>
   <!--end:: contarea-->
   <!--start::Footer-->
   <?php include 'include/footer.php' ?>
 
   <!-- added by deepak pandey dt:  09-08-2022  -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
 <script src="js/html5lightbox.js"></script>
 <script>
    $(function(){ 
       
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
		// testimonial carousel
		$('.owl-carousel.testimonial-carousel').owlCarousel({
			loop: true,
			margin: 10,
			responsiveClass: true,
			nav:true,
			items: 1			 
		}) 
    /* added by deepak pandey dt: 09-08-2022 end*/


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

    /*function verifyOTP() 
     {
         if (!blankCheck('txtVerify', 'Please enter OTP'))
            return false;
    }*/
   </script>
   <script>
   localStorage.setItem('regdNo', "<?php echo $nid;?>");
   localStorage.setItem('viewUrl', '<?php echo SITE_URL."digital-skill-dashboard/".$encId;?>');
</script>
