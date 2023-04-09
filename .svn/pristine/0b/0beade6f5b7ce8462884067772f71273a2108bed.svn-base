<?php
/*plugin*/
/*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 18th Dec 2018
Author : MRD
 */
?>
<!doctype html>
<html lang="en">
<?php include 'include/header.php'?>
<script src="<?php echo APP_URL; ?>js/loadComponent.js"></script>
<script src="<?php echo SITE_URL; ?>js/loadAjax.js"></script>
<!-- <script src="<?php //echo SITE_URL; ?>js/validatorchklist.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<link href="<?php echo SITE_URL; ?>css/nano-unicorn.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
<!--start:: contarea-->
<section class="container contarea">
	<div class="row">
		<div class="col-12">
			<!-- <h2>What is Nano-Unicorn ?</h2>-->
		</div>
		<div class="tabsec">
			<nav>
				<div class="nav nav-tabs" id="nav-tab" role="tablist">
					<a class="nav-item nav-link <?php echo (($webNid == 'what-is-nano-unicorn' || $webNid == '') && $errFlag==0) ? 'show active' : ''; ?>" id="nav-Process-tab" data-toggle="tab" href="#nav-Process" role="tab" aria-controls="nav-Process" aria-selected="true">
						<?php echo $process; ?>
					</a>
					<a class="nav-item nav-link <?php echo ($webNid == 'meet-the-nano-unicorns') ? 'show active' : ''; ?>" id="nav-Meet-tab" data-toggle="tab" href="#nav-Meet" role="tab" aria-controls="nav-Meet" aria-selected="false">
						<?php echo $meet; ?>
					</a>
					<a class="nav-item nav-link <?php echo ($webNid == 'become-a-nano-unicorn' || $errFlag==1) ? 'show active' : ''; ?>" id="nav-Register-tab" data-toggle="tab" href="#nav-Register" role="tab" aria-controls="nav-Register" aria-selected="false">
						<?php echo $register; ?>
					</a>
				</div>
			</nav>
			<div class="tab-content <?php echo $odiaClass; ?>" id="nav-tabContent">


				<div class="tab-pane fade <?php echo (($webNid == 'what-is-nano-unicorn' || $webNid == '') && $errFlag==0) ? 'show active' : ''; ?>" id="nav-Process" role="tabpanel" aria-labelledby="nav-Process-tab">
					<h2 class="text-center">
						<?php echo $process; ?>
					</h2>

					<div class="row">
						<div class="col-12 col-lg-8">
							<img src="<?php echo SITE_URL; ?>images/Nano-Unicorn.jpg" class="img-fluid">
							<div class="overlay__section">
								<span class="overlay__tag"><i class="fa fa-book"></i> <?php echo $nanounicorn; ?></span>
								<span class="overlay__text">
									<?php echo $nanounicorn; ?>
								</span>
							</div>
						</div>
						<?php
if ($nanoResult->num_rows > 0) {
    ?>
						<div class="col-12 col-lg-4 mt-4 mt-lg-0">
							<?php
$ctr = 0;
    while ($rows = $nanoResult->fetch_array()) {
        if ($ctr == 0) {
            $unicornId = $rows['intNanoUnicornId']; //echo $newsId;exit;
            $nameE = htmlspecialchars_decode($rows['vchName'], ENT_QUOTES);
            $nameO = $rows['vchNameO'];
            $name = ($_SESSION['lang'] == 'O' && $nameO != '') ? $nameO : $nameE;
            $descE = htmlspecialchars_decode($rows['vchDescription'], ENT_QUOTES);
            $descO = htmlspecialchars_decode($rows['vchDescriptionO'], ENT_QUOTES);
            $desc = ($_SESSION['lang'] == 'O' && $descO != '') ? $descO : $descE;
            $descCls = ($_SESSION['lang'] == 'O' && $descO != '') ? 'odia' : '';
            $descCount = ($_SESSION['lang'] == 'O' && $descO != '') ? 250 : 190;
            $image = ($rows['vchImage'] != '') ? APP_URL . "uploadDocuments/NanoUnicorn/" . $rows['vchImage'] : '';
            $audio = ($rows['vchAudio'] != '') ? APP_URL . "uploadDocuments/NanoUnicorn/" . $rows['vchAudio'] : '';
            $ctr++;
            ?>
							<div class="card box-shadow">
								<img class="card-img-top" src="<?php echo $image; ?>" alt="<?php echo $name; ?>">
								<div class="card-body">

									<h4 class="card-title">
										<?php echo $name; ?>
									</h4>

									<p class="card-text color <?php echo $descCls; ?>" id="text<?php echo $ctr; ?>">
										<?php echo str_replace('...', '', $objNano->wardWrap(strip_tags($desc), $descCount)); ?>
										<?php if (strlen(strip_tags($desc)) <= $descCount) {?>
									</p>
									<?php } else {?><span class="dots" id="dots<?php echo $ctr; ?>">...</span>
									<?php }?>
									<?php
//$descCount=($_SESSION['lang']=='O')?900:600;
            if (strlen(strip_tags($desc)) > $descCount) {
                ?>
									<span class="more" id="more<?php echo $ctr; ?>">
										<?php echo $objNano->nthWardWrap(strip_tags($desc), mb_strlen(str_replace('...', '', $objNano->wardWrap(strip_tags($desc), $descCount)), 'UTF-8'), strlen(strip_tags($desc))); ?>
									</span>
									</p>
									<button onclick="viewMore()" id="myBtn<?php echo $ctr; ?>" class="read-more myBtn <?php echo $odiaClass; ?>">
										<?php echo $strViewMorelbl; ?>
									</button>
									<?php }?>
									<?php if($audio!='') {?>	
											<audio controls>
										  <source src="<?php echo APP_URL;?>uploadDocuments/content/nano_unicoen_interview.mp3" type="audio/mpeg" target="_blank">
										</audio>
									<?php } ?>

									<div class="clearfix"></div>
									<!--									<a href="javascript:viod(0);" class="pt-1 read-more">Read More</a>-->
								</div>
							</div>
							<?php }}?>
						</div>
						<?php }?>
					</div>
					<div class="col-12 mt-sm-3">
						<p class="text-justify">
							<?php echo $nanoDesc1; ?>
						</p>
						<ul class="list-type-arrow mt-4">
							<li>
								<?php echo $nanoDesc2; ?> </li>
							<li>
								<?php echo $nanoDesc3; ?> </li>
							<li>
								<?php echo $nanoDesc4; ?>
							</li>
							<li>
								<?php echo $nanoDescnew; ?>
							</li>
						</ul>
					</div>
					<div class="col-12">
						<h3 class="text-center mb-4">
							<?php echo $nanoDesc5; ?>
						</h3>
						<div class="pt-md-2">
							<div class="nano-unicorn mt-5">
								<div class="timeline timeline--left">
									<span class="timeline__count">1</span>
									<div class="timeline__container">
										<div class="timeline__items">
											<span class="timeline__media wow fadeInRight" data-wow-delay=".3s"><img src="<?php echo SITE_URL; ?>images/pre-requisite.png"></span>
											<div class="timeline__item wow fadeInLeft">
												<h4 class="timeline__heading">
													<?php echo $nanoDesc6; ?>
												</h4>
												<p>
													<?php echo $nanoDesc7; ?>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="timeline timeline--right">
									<span class="timeline__count">2</span>
									<div class="timeline__container">
										<div class="timeline__items">
											<span class="timeline__media wow fadeInLeft" data-wow-delay=".8s"><img src="<?php echo SITE_URL; ?>images/selection.png"></span>
											<div class="timeline__item wow fadeInRight" data-wow-delay=".5s">
												<h4 class="timeline__heading">
													<?php echo $nanoDesc8; ?>
												</h4>
												<p>
													<?php echo $nanoDesc9; ?>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="timeline timeline--left">
									<span class="timeline__count">3</span>
									<div class="timeline__container">
										<div class="timeline__items">
											<span class="timeline__media wow fadeInRight" data-wow-delay="1.3s"><img src="<?php echo SITE_URL; ?>images/training.png"></span>
											<div class="timeline__item wow fadeInLeft" data-wow-delay="1s">
												<h4 class="timeline__heading">
													<?php echo $nanoDesc10; ?>
												</h4>
												<p>
													<?php echo $nanoDesc11; ?>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="timeline timeline--right">
									<span class="timeline__count">4</span>
									<div class="timeline__container">
										<div class="timeline__items">
											<span class="timeline__media wow fadeInLeft" data-wow-delay="1.8s"><img src="<?php echo SITE_URL; ?>images/funding.png"></span>
											<div class="timeline__item wow fadeInRight" data-wow-delay="1.5s">
												<h4 class="timeline__heading">
													<?php echo $nanoDesc12; ?>
												</h4>
												<p>
													<?php echo $nanoDesc13; ?>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="timeline timeline--left">
									<span class="timeline__count">5</span>
									<div class="timeline__container">
										<div class="timeline__items">
											<span class="timeline__media wow fadeInRight" data-wow-delay="2.3s"><img src="<?php echo SITE_URL; ?>images/business-kick-off.png"></span>
											<div class="timeline__item wow fadeInLeft" data-wow-delay="2s">
												<h4 class="timeline__heading">
													<?php echo $nanoDesc14; ?>
												</h4>
												<p>
													<?php echo $nanoDesc15; ?>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="timeline timeline--right">
									<span class="timeline__count">6</span>
									<div class="timeline__container">
										<div class="timeline__items">
											<span class="timeline__media wow fadeInLeft" data-wow-delay="2.5s"><img src="<?php echo SITE_URL; ?>images/knowledge-hub.png"></span>
											<div class="timeline__item wow fadeInRight" data-wow-delay="2.2s">
												<h4 class="timeline__heading">
													<?php echo $nanoDesc22; ?>
												</h4>
												<p>
													<?php echo $nanoDesc23; ?>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="timeline timeline--left">
									<span class="timeline__count">7</span>
									<div class="timeline__container">
										<div class="timeline__items">
											<span class="timeline__media wow fadeInRight" data-wow-delay="2.5s"><img src="<?php echo SITE_URL; ?>images/aim-of-nano-unicorn.png"></span>
											<div class="timeline__item wow fadeInLeft" data-wow-delay="2.3s">
												<h4 class="timeline__heading">
													<?php echo $nanoDesc16; ?>
												</h4>
												<p>
													<?php echo $nanoDesc17; ?>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="timeline timeline--right">
									<span class="timeline__count">8</span>
									<div class="timeline__container">
										<div class="timeline__items">
											<span class="timeline__media wow fadeInLeft" data-wow-delay="2.7s"><img src="<?php echo SITE_URL; ?>images/knowledge-hub.png"></span>
											<div class="timeline__item wow fadeInRight" data-wow-delay="2.5s">
												<h4 class="timeline__heading">
													<?php echo $nanoDesc18; ?>
												</h4>
												<p>
													<?php echo $nanoDesc19; ?>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="timeline timeline--left">
									<span class="timeline__count">9</span>
									<div class="timeline__container">
										<div class="timeline__items">
											<span class="timeline__media wow fadeInRight" data-wow-delay="2.7s"><img src="<?php echo SITE_URL; ?>images/the-experience.png"></span>
											<div class="timeline__item wow fadeInLeft" data-wow-delay="2.7s">
												<h4 class="timeline__heading">
													<?php echo $nanoDesc20; ?>
												</h4>
												<p>
													<?php echo $nanoDesc21; ?>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="tab-pane fade <?php echo ($webNid == 'meet-the-nano-unicorns') ? 'show active' : ''; ?>" id="nav-Meet" role="tabpanel" aria-labelledby="nav-Meet-tab">

					<div class="col-12" id="meet-nanounicorn">
						<div class="meet-nano-unicorn">
							<h2 class="text-center">
								<?php echo $meet; ?>
							</h2>
							<?php
if ($nanoResult->num_rows > 0) {
    ?>
							<div class="row">
								<?php
mysqli_data_seek($nanoResult, 0);
    $counter = 2;
    while ($rows = $nanoResult->fetch_array()) {
        $unicornId = $rows['intNanoUnicornId']; //echo $newsId;exit;
        $nameE = htmlspecialchars_decode($rows['vchName'], ENT_QUOTES);
        $nameO = $rows['vchNameO'];
        $name = ($_SESSION['lang'] == 'O' && $nameO != '') ? $nameO : $nameE;
        $descE = htmlspecialchars_decode($rows['vchDescription'], ENT_QUOTES);
        $descO = htmlspecialchars_decode($rows['vchDescriptionO'], ENT_QUOTES);
        $desc = ($_SESSION['lang'] == 'O' && $descO != '') ? $descO : $descE;
        $descCls = ($_SESSION['lang'] == 'O' && $descO != '') ? 'odia' : '';
        $descCount = ($_SESSION['lang'] == 'O' && $descO != '') ? 300 : 140;
        $image = ($rows['vchImage'] != '') ? APP_URL . "uploadDocuments/NanoUnicorn/" . $rows['vchImage'] : '';
        $audio = ($rows['vchAudio'] != '') ? APP_URL . "uploadDocuments/NanoUnicorn/" . $rows['vchAudio'] : '';
        $counter++;
        ?>
								<div class="col-12 col-sm-6 col-lg-4 mb-4">
									<div class="card h-100">
										<img class="card-img-top" src="<?php echo $image; ?>" alt="<?php echo $name; ?>">
										<div class="card-body">
											<h4 class="card-title">
												<?php echo $name; ?>
											</h4>
											<p class="card-text color <?php echo $descCls; ?>" id="text<?php echo $counter; ?>">
												<?php echo str_replace('...', '', $objNano->wardWrap(strip_tags($desc), $descCount)); ?>
												<?php if (strlen(strip_tags($desc)) <= $descCount) {?>
											</p>
											<?php } else {?><span class="dots" id="dots<?php echo $counter; ?>">...</span>
											<?php }?>
											<?php
//$descCount=($_SESSION['lang']=='O')?900:600;
        if (strlen(strip_tags($desc)) > $descCount) {
            ?>
											<span class="more" id="more<?php echo $counter; ?>">
												<?php echo $objNano->nthWardWrap(strip_tags($desc), mb_strlen(str_replace('...', '', $objNano->wardWrap(strip_tags($desc), $descCount)), 'UTF-8'), strlen(strip_tags($desc))); ?>
											</span>
											</p>
											<button onclick='myFunction("<?php echo $unicornId; ?>", this)' id="myModal<?php echo $unicornId; ?>" class="read-more myBtn <?php echo $odiaClass; ?>" data-name="<?php echo $name; ?>" data-image="<?php echo $image; ?>">
												<?php echo $strReadMorelbl; ?>
											</button>
											<?php }?>
											<input type="hidden" name="hdnDesc<?php echo $unicornId; ?>" id="hdnDesc<?php echo $unicornId; ?>" value="<?php echo htmlspecialchars($desc); ?>">
										<?php if($audio!='') {?>	
											<audio controls>
										  <source src="<?php echo APP_URL;?>uploadDocuments/content/nano_unicoen_interview.mp3" type="audio/mpeg" target="_blank">
										</audio>
									<?php } ?>
										</div>
									</div>
								</div>
								<?php }?>
							</div>
							<?php }?>
				<div class="clearfix"></div>

						</div>
					</div>

				</div>


				<div class="tab-pane fade <?php echo ($webNid == 'become-a-nano-unicorn' || $errFlag==1) ? 'show active' : ''; ?>" id="nav-Register" role="tabpanel" aria-labelledby="nav-Register-tab">

					<form name="frmOsda" id="frmOsda" method="post" action="" enctype="multipart/form-data" autocomplete="off">
						<div class="col-12" id="register">
							<div class="became-nano-unicorn">
								<h2 class="text-center">
									<?php echo $register; ?>
								</h2>
								<div class="row">
									<div class="col-md-6 form-group">
										<label>
											<?php echo $strNamelbl; ?>
										</label>
										<input type="text" class="form-control" placeholder="<?php echo $strNamelbl; ?>" id="txtName" maxlength="100" name="txtName" value="<?php echo $strName; ?>">
									</div>
									<div class="col-md-6 form-group">
										<label>
											<?php echo $strDistrictlbl; ?>
										</label>
										<select class="form-control <?php echo $strLangCls; ?>" name="selDistrict" id="selDistrict">
											<option>--
												<?php //echo $strSelectlbl; ?>--</option>

										</select>
									</div>
									<div class="col-md-6 form-group">
										<label>
											<?php echo $strMobileNolbl; ?>
										</label>
										<input type="text" class="form-control" id="txtPhone" name="txtPhone" maxlength="10" placeholder="<?php echo $strMobileNolbl; ?>" value="<?php echo $strPhone; ?>" onKeyPress="return isNumberKey(event);">
									</div>
									<div class="col-md-6 form-group">
										<label>
											<?php echo $strDOBLevel; ?>
										</label>
										<input type="text" class="form-control datepicker" data-date-format="dd-mm-yyyy" name="txtDOB" id="txtDOB" readonly value="<?php echo $strDOB; ?>">
									</div>

									<div class="col-md-6 form-group">
					                    
					                        <input type="radio"  name="radCourseType" class="ace" value="1">                           
					                        <span class="lbl">
					                        	<?php echo $strNanoRadio1; ?></span>
					                </div>
					                <div class="col-md-6 form-group">        
					                        <input type="radio"  name="radCourseType" class="ace" value="2">
					                        <span class="lbl"><?php echo $strNanoRadio2; ?></span>
											
					                </div>

					                <div class="col-md-6 form-group piadiv">
										<label>
											<?php echo $strNanoITI; ?>
										</label>
										<select class="form-control <?php echo $strLangCls; ?>" name="selITI" id="selITI" onchange="fillTrade('0','selCourse',this.value);">
											<option value="0">-<?php echo $strSelectlbl;?>-</option>
										</select>
									</div>


									<div class="col-md-6 form-group piadivCenter">
										<label>
											<?php echo $strNanoCenter; ?>
										</label>
										<select class="form-control <?php echo $strLangCls; ?>" name="selCenter" id="selCenter" onchange="fillTrade('0','selCourse',this.value);">
											<option value="0">-<?php echo $strSelectlbl;?>-</option>
										</select>
									</div>

									<div class="col-md-6 form-group">
										<label>
											<?php echo $strNanoTrade; ?>
										</label>
										<select class="form-control <?php echo $strLangCls; ?>" name="selCourse" id="selCourse">
											<option value="0">-<?php echo $strSelectlbl;?>-</option>
										</select>
									</div>


									<div class="col-md-12 form-group">
										<label>
											<?php echo $strBusinessLable; ?>
										</label>
										<textarea class="form-control" name="txtBusiness" id="txtBusiness" rows="6" onKeyUp="return TextCounter('txtBusiness','lblChar1',500)" onMouseUp="return TextCounter('txtBusiness','lblChar1',500)">
											<?php echo trim($strBusiness); ?>
										</textarea>
										<span id="lblChar1" class="text-danger <?php echo $strNumLangCls; ?>">
											<?php echo $strMax500Charlbl; ?>
										</span>
										<?php echo $strCharlbl; ?> </span>
									</div>

									<div class="col-md-4 form-group">
										<input type="text" class="form-control" name="txtNanoCaptcha" id="txtNanoCaptcha" maxlength="20" placeholder=<?php echo $queryCaptcha; ?>>
									</div>
									<div class="col-md-3 form-group">
										<div class="captchaimg-sec screenreader">
											<div class="captcha_refresh pull-right" style="cursor: pointer;">
												<i class="fa fa-refresh" id="reload" onClick="generateCaptcha();" aria-hidden="true" style=""></i>
											</div>
											<img src="<?php echo APP_URL; ?>includes/captcha.php" style="display: none;"/>
											<img src="<?php echo APP_URL; ?>includes/captcha.php" alt="captcha image" align="absmiddle" style="" id="captchaImage"/>
										</div>
									</div>
									<!-- <input type="hidden" <?php echo ($isTrainStatus == 1) ? 'checked="checked"' : ''; ?> value="0" name="ckTrainStatus"> -->
									<div class="col col-sm-6 col-md-4">
										<input type="submit" class="btn osda--btn pl-5 pr-5" id="btnSubmitNano" name="btnSubmitNano" value="<?php echo $strSubmitlbl; ?>" onclick="return validateNano();"/>
									</div>
								</div>
							</div>
						</div>
					</form>

				</div>


			</div>
		</div>
		<div class="clearfix"></div>
</section>

<?php if($_SESSION['lang']=='O'){ ?> 
            <?php include('include/datepickermenus-odia.php'); ?>
  <?php } ?> 
<!--end:: contarea-->

<!--start::Footer-->
<?php include 'include/footer.php'?>

<!-- <link rel="stylesheet" href="css/datepicker.css"> -->
<script>
	new WOW().init();
</script>

<script>
	$( document ).ready( function () {

		$( '.datepicker' ).datepicker( {
			autoclose: true,
			todayHighlight: true,
			uiLibrary: 'bootstrap4'
		} );

		$( '.datepicker' ).on( 'click', function ( e ) {
			<?php if ($_SESSION['lang'] == 'O') {?>
			$( '.datepicker' ).addClass( ' odianum' );

			<?php } else {?>
			$( '.datepicker' ).removeClass( ' odianum' );
			<?php }?>

		} );

      

	} );

	function viewMore()
	{
		$('#nav-Meet-tab').trigger('click');
	}
</script>

<!--end :: footer-->
<script type="text/javascript" language="javascript">
	$( document ).ready( function () {
		<?php if ($outMsg != '' && isset($_REQUEST['btnSubmitNano'])) {?>
		viewAlert( '<?php echo $outMsg; ?>', '', '<?php echo $redirectLoc; ?>' );
		<?php }?>
		TextCounter( 'txtBusiness', 'lblChar1', 500 );
		fillDistricts( '<?php echo $selDistrict; ?>', 'selDistrict' );
		fillITI( '<?php echo $selITI; ?>', 'selITI' );
		fillTrainingCenter( '<?php echo $selCenter; ?>', 'selCenter' );
		//fillTrade('<?php echo $selCourse;?>','selCourse','0');
		
		$('.piadiv').hide();
		$('.piadivCenter').hide();
		
		
		$('.ace').click(function () {
            var idval = $(this).val();
            if(idval==1){
              $('.piadiv').show();
              $('.piadivCenter').hide();
            }else if(idval==2){
              $('.piadiv').hide();
              $('.piadivCenter').show();
            } else {
              $('.piadiv').hide();
              $('.piadivCenter').hide();
            }
        });

	} );
</script>
<script>
	function validateNano() {

		
		var selVal = $("input[name='radCourseType']:checked").val();

		if ( !blankCheck( 'txtName', 'Please enter your name' ) )
			return false;
		if ( !checkSpecialChar( 'txtName' ) )
			return false;
		if ( !maxLength( 'txtName', 100, 'Name' ) )
			return false;

		if ( !selectDropdown( 'selDistrict', 'Select District' ) )
			return false;

		if ( !blankCheck( 'txtPhone', 'Please enter Mobile No.' ) )
			return false;
		if ( !checkSpecialChar( 'txtPhone' ) )
			return false;
		if ( !equalLength( 'txtPhone', 10, 'Enter a valid mobile no.' ) )
			return false;
		if ( !blankCheck( 'txtDOB', 'Please enter date of birth' ) )
			return false;
		if(selVal==1)
		{ 
			if ( !selectDropdown( 'selITI', 'Select Govt. ITI' ) )
			return false;
		} 
		else if(selVal==2)
		{
			if ( !selectDropdown( 'selCenter', 'Select Training Center' ) )
			return false;
		}
		
		if ( !selectDropdown( 'selCourse', 'Select Trade' ) )
			return false;
		if ( !blankCheck( 'txtBusiness', 'Please enter business details' ) )
			return false;
		if ( !checkSpecialChar( 'txtBusiness' ) )
			return false;

		if ( !maxLength( 'txtBusiness', 500, 'business details' ) )
			return false;


		if ( !blankCheck( 'txtNanoCaptcha', 'Captcha can not be left blank' ) )
			return false;

	}
</script>





<script>
	function myFunction( elemCtr, elm ) {
		// var dots = document.getElementById( "dots" + elemCtr );
		// var moreText = document.getElementById( "more" + elemCtr );
		// var btnText = document.getElementById( "myBtn" + elemCtr );

		// if ( dots.style.display === "none" ) {
		// 	dots.style.display = "inline";
		// 	btnText.innerHTML = "<?php echo $strViewMorelbl; ?>";
		// 	moreText.style.display = "none";
		// } else {
		// 	dots.style.display = "none";
		// 	btnText.innerHTML = "<?php echo $strViewLesslbl; ?>";
		// 	moreText.style.display = "inline";
		// }

		var name = $("#"+elm.id).data("name");
		var image = $("#"+elm.id).data("image");
		var desc = $("#hdnDesc"+elemCtr).val();
		var textImage = '<img src="'+image+'" alt="'+name+'" class="img-responsive">';
        var str = '<div class="modalPopImage">' + textImage+'</div>'+
            		'<div class="modalPopDesc">'+desc.replace(/div>/g, "p>")+'</div>';
		$('#myModalPop').modal({backdrop: 'static', keyboard: false});
		$('#msgDivHeading').html(name);
		$('#msgDivContent').html(str);
	}
</script>


<div class="modal fade" id="myModalPop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
             <div class="modal-header">
                <h4 class="modal-title" id="msgDivHeading">__</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> 
                
            </div> 
			   <div class="modal-body" id="msgDivContent"></div>
        </div>
    </div>
</div>



















































