<!doctype html>
<!--================================================
  ' File Name         : index.html
  ' Description         : Home Page
  ' Created by              : Rumana Parween
  ' Created on              : 18-01-2019
  ' Developed by            :  
  ' Developed on            : 
  ' Modification History    : 
 *  Modified by             : Rahul Kumar Saw
  ' <Updated By>              <Date>                  <Updated Summary>'     
  ' Style sheet             : bootstrap.min.css, font-awesome.min.css,custom.css,animate.css
  ' Javscript Functions     :jquery-2.1.1.js, bootstrap.min.js,
  ' includes          : header.php,footer.php
 ===== ============================================= -->
 
<html lang="en">
<link rel="stylesheet" href="<?php echo SITE_URL; ?>css/home.css"/>
<!--Start:: Header-->
<?php include 'include/header.php'
?>

<!--Facebook Widget-->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.3"></script>

<!-- START : skill competition toast banner -->
<!-- <div class="competition-toast"><button class="toast-close" title="close" type="button"><i class="fa fa-times"></i></button><a href="<?php echo SITE_URL; ?>skill-compete-register" aria-label="skill compete register"><img src="<?php echo SITE_URL; ?>images/bannerSkill.jpg" alt=""></a></div> -->
<!-- END HERE : skill competition toast banner -->
<!--End:: Header-->
<div class="page-loader">
	<div class="progress-line"></div>
	<img src="<?php echo SITE_URL; ?>images/logoload.png" alt="Odisha Skill Development Authority logo"/>
</div>
<!-- <div class="loader-wrapper">
	<div class="loadercont"> <img src="<?php echo SITE_URL; ?>images/logoload.png" alt="Odisha Skill Development Authority logo"/>
		<h2>Odisha Skill Development Authority</h2>
		<p>Government of Odisha</p>
	</div>
	<div class="loader-line"></div>
</div> -->
<!--==========================
            Intro Section============================-->
           
           <?php  if($totaltickerCnt>0) {
          	$ctr =1; ?>
          	<div class="tendersec">
         
           
		   <marquee attribute_name="attribute_value" ....more="" attributes="" onmouseover="this.stop()" onmouseout="this.start()" behavior="scroll">
		   	<?php  while ($rowT = $tickerResult->fetch_array()) {
                            
	                $tickerMsg = htmlspecialchars_decode($rowT['vchTickerName'],ENT_QUOTES);
	                $tickerMsgO = htmlspecialchars_decode($rowT['vchTickerNameO'],ENT_QUOTES);
	                $tickerUrl = htmlspecialchars_decode($rowT['vchTickerUrl'],ENT_QUOTES);
	                $scrollMsg = $_SESSION['lang']=='O'? $tickerMsgO : $tickerMsg;
	                if($ctr>0)
	                {
	                $pipe = ' || ';	
	                    
	                }
	                else
	                {
	                	$pipe = '';
	                    
	                }
	                $ctr++;  ?>
				 <span class="odianumcustom">
				 	<a href="<?php echo $tickerUrl;?>" class="linkscrool"><?php echo $scrollMsg; ?> </a> 
				 </span> 
					<a href="javascript:void(0)"><?php echo $pipe ;?> </a> 
			 <?php } ?> 
			 <?php  if($totaltenderCnt>0) {
			   while ($rowTen = $tenderResult->fetch_array()) {
                            
	                $tenderMsg = htmlspecialchars_decode($rowTen['VCH_TENDER_TITLE'],ENT_QUOTES);
	                $tenderMsgO = htmlspecialchars_decode($rowTen['VCH_TENDER_TITLE_O'],ENT_QUOTES);
	                $tickerUrl = SITE_URL.'tender';
	                $scrollMsgTen = $_SESSION['lang']=='O'? $tenderMsgO : $tenderMsg;
	                if($ctr>0)
	                {
	                $pipeT = ' || ';	
	                    
	                }
	                else
	                {
	                	$pipeT = '';
	                    
	                }
	                $ctr++;  ?>
				 <span class="odianumcustom">
				 	<a href="<?php echo $tickerUrl;?>" class="linkscrool"><?php echo $scrollMsgTen; ?> </a> 
				 </span> 
					<a href="javascript:void(0)"><?php echo $pipeT ;?> </a> 
			 <?php } } ?> 
			 <?php  if($totalCareerCnt>0) {
			   while ($rowCar = $careerResult->fetch_array()) {
                            
	                $careerMsg = htmlspecialchars_decode($rowCar['vchTickerName'],ENT_QUOTES);
	                $careerMsgO = htmlspecialchars_decode($rowCar['vchTickerNameO'],ENT_QUOTES);
	                $careerUrl = SITE_URL.'career';
	                $scrollMsgCar = $_SESSION['lang']=='O'? $careerMsgO : $careerMsg;
	                if($ctr>0)
	                {
	                $pipeC = ' || ';	
	                    
	                }
	                else
	                {
	                	$pipeC = '';
	                    
	                }
	                $ctr++;  ?>
				 <span class="odianumcustom">
				 	<a href="<?php echo $careerUrl;?>" class="linkscrool"><?php echo $scrollMsgCar; ?> </a> 
				 </span> 
					<a href="javascript:void(0)"><?php echo $pipeC ;?> </a> 
			 <?php } } ?>        	   
		  	</marquee>
           
           </div>
      <?php  } ?>

          
          <!-- <div class="tendersec">
		   <marquee attribute_name="attribute_value" ....more="" attributes="" onmouseover="this.stop()" onmouseout="this.start()" behavior="scroll">
			 <span class="odianumcustom">
			 <a href="<?php echo SITE_URL; ?>skill-compete-register" class="linkscrool"><?php echo $registrationMsg; ?> </a> </span> <a href="javascript:void(0)">&nbsp; &nbsp; || &nbsp; &nbsp; </a> 
			 <a href="<?php echo SITE_URL; ?>skill-registration-status" class="linkscrool"><?php echo $skillResult; ?> </a> </span> <a href="javascript:void(0)">&nbsp; &nbsp; || &nbsp; &nbsp; </a> 
        	  <a href="<?php echo SITE_URL; ?>tender" class="linkscrool"><?php echo $coronaTenderMsg; ?></a> 
        	  <a href="javascript:void(0)">&nbsp; &nbsp; || &nbsp; &nbsp; </a>
        	  <a href="https://skillodisha.webex.com/skillodisha/j.php?RGID=rd9bfb905cb36f0e51c683057c3cf6060" class="linkscrool" target="_blank"><?php echo $coringenTenderMsg; ?></a>
        	  <a href="javascript:void(0)">&nbsp; &nbsp; || &nbsp; &nbsp; </a>
        	  <a href="<?php echo SITE_URL; ?>tender" class="linkscrool"><?php echo $IFBTenderMsg; ?></a>
        	  <a href="javascript:void(0)">&nbsp; &nbsp; || &nbsp; &nbsp; </a>
        	  <a href="<?php echo SITE_URL; ?>tender" class="linkscrool"><?php echo $IFBRFPMsg; ?></a>
        	   
		  </marquee>
		 </div> --> 


          
<form name="frmOsda" id="frmOsda" method="post" action="#" enctype="multipart/form-data" autocomplete="off">
<div class="top-space"></div>
	<section id="intro" class="d-sm-block">
		<div class="intro-container">
			<div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">
				<ol class="carousel-indicators">
				</ol>
		
				<?php if ($totalbannerCnt > 0) {?>
				<div class="carousel-inner">
					<?php
$counter = 0;
$i=1;
    while ($bannerRow = $bannerResult->fetch_array()) {
    	
        $counter++;
        $bannerImage = isset($bannerRow['vchFeaturedImage']) ? APP_URL . 'uploadDocuments/banner/' . $bannerRow['vchFeaturedImage'] : '';
        $bannerTextE = !empty($bannerRow['vchDescpEng']) ? htmlspecialchars_decode($bannerRow['vchDescpEng'], ENT_QUOTES) : '';
        $bannerText = ($_SESSION['lang'] == 'O' && $bannerRow['vchDescpOdia'] != '') ? htmlspecialchars_decode($bannerRow['vchDescpOdia'], ENT_QUOTES) : $bannerTextE;
        $activeCLass = ($counter == 1) ? 'active' : '';
        $captionE = !empty($bannerRow['vchBcNmEng']) ? htmlspecialchars_decode($bannerRow['vchBcNmEng'], ENT_QUOTES) : '';
        $caption = ($_SESSION['lang'] == 'O' && $bannerRow['vchBcNmOdia'] != '') ? htmlspecialchars_decode(stripslashes($bannerRow['vchBcNmOdia']), ENT_QUOTES) : $captionE;
        $captionCls = ($_SESSION['lang'] == 'O' && $bannerRow['vchBcNmOdia'] != '') ? 'odia' : '';
        $coronaImage = ($_SESSION['lang'] == 'O')? APP_URL . 'uploadDocuments/banner/coronaBannerOdia.jpeg':APP_URL . 'uploadDocuments/banner/coronaBannerEng.jpeg';
        ?>
					<div class="carousel-item <?php echo $activeCLass; ?>">

					<?php if($i==1)
					{ ?>
						<div class="carousel-background coronabanner" style="background-image:url(<?php echo $coronaImage; ?>)"> </div>
						<div class="carousel-container">
							<div class="carousel-content bannertext <?php echo $odiaClass; ?>">
								<!-- <h2 class="hfont <?php echo $captionCls; ?>">
									<?php echo $bannerTitle; ?>
								
								</h2> -->
							</div>
						</div>
					<?php } else { ?>

						<div class="carousel-background" style="background-image:url(<?php echo $bannerImage; ?>)"> </div>
						<div class="carousel-container">
							<div class="carousel-content bannertext <?php echo $odiaClass; ?>">
								<h2 class="hfont <?php echo $captionCls; ?>">
									<?php echo $caption; ?>
								
								<?php echo $bannerText; ?>
								</h2>
							</div>
						</div>
					<?php } ?>	

						
					</div>
					<?php $i++;}?>
				</div>
				<?php } else {?>
				<?php }?>
				<a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev"> <span class="carousel-control-prev-icon fa fa-angle-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next"> <span class="carousel-control-next-icon fa fa-angle-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
		</div>


<!--           <div class="go-next"><a href="javascript:void(0);" class="hvr-icon-hang" title="Go Next" ></a></div>-->



<!--
			<section id="section10" class="demo go-next">
			  <a href="#scrooldown"><span></span></a>
			</section>
-->




<!--

			<div class="go-next">
		        <a href="javascript:void(0);" class="" title="Go Next" >
				  <div class="chevron"></div>
				  <div class="chevron"></div>
				  <div class="chevron"></div>
			    </a>
			</div>

-->


<!--

         <div class="go-next">
			<section id="section03" class="demo">
			  <a href="javascript:viod(0);"><span></span></a>
			</section>
		</div>
-->





	</section>
	<!-- #intro -->
	<!--Start:: stories-->
	

	<div class="row" id="scrooldown">
		<div class="container-fluid">
			<div class="institute" >
				<div class="carousel-inner" >
					<div class="graysec">
						<div class="">
							<div class="carousel-item active">
								<div class="position">
									<div class="row d-flex portlets">
										<?php
if ($intPhilCount > 0) {

    $row = $philoResult->fetch_array();

    $strTitleE = ($row['vchTitle'] != '') ? htmlspecialchars_decode($row['vchTitle'], ENT_QUOTES) : '';
    $strTitle = ($_SESSION['lang'] == 'O' && $row['vchTitleO'] != '') ? $row['vchTitleO'] : $strTitleE;
    $strTaglineE = ($row['vchTagline'] != '') ? htmlspecialchars_decode($row['vchTagline'], ENT_QUOTES) : '';
    $tagLineCount = ($_SESSION['lang'] == 'O' && $row['vchTaglineO'] != '') ? 100 : 80;
    $strTagline = ($_SESSION['lang'] == 'O' && $row['vchTaglineO'] != '') ? $row['vchTaglineO'] : $strTaglineE;
    $strImage = ($row['vchImage'] != '') ? APP_URL . 'uploadDocuments/Philosophy/' . $row['vchImage'] : '';
    $descClass = ($_SESSION['lang'] == 'O' && $row['vchDescriptionO'] != '') ? 'odia' : '';
    $strDescE = ($row['vchDescription'] != '') ? htmlspecialchars_decode($row['vchDescription'], ENT_QUOTES) : '';
    $strDesc = ($_SESSION['lang'] == 'O' && $row['vchDescriptionO'] != '') ? $row['vchDescriptionO'] : $strDescE;
    $descCount = ($_SESSION['lang'] == 'O' && $row['vchDescriptionO'] != '') ? 190 : 140;
    ?>
										<div class="col-12 col-lg-9 d-flex mr-0 pr0">
											<!-- <div class="philosophy" style="background:url(<?php //echo $strImage;   ?>) no-repeat">-->
											<a class="<?php echo $odiaClass; ?>" href="<?php echo SITE_URL; ?>vision">
											<div class="philosophy card">
												<div class="philosophyimg"> <img src="<?php echo $strImage; ?>" alt="<?php echo $strTitle; ?>"> </div>
												<div class="philosophycont">
													  <h2 class="<?php echo $odiaClass; ?>">
														<?php echo $visionTitle; ?>
														<!-- <span class="<?php echo $odiaClass; ?>">
															<?php echo $ourVisonlbl; ?>
														</span> --> 
													</h2>
													<!-- <p class="<?php echo $odiaClass; ?>">
														<?php echo $visionTitle; ?>
													</p> -->  
													<a class="<?php echo $odiaClass; ?>" href="<?php echo SITE_URL; ?>vision">
														<?php echo $strViewMore; ?>&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i>
													</a>
												</div>
											</div>
										</a>
										</div>
										<?php
}
if ($intTotalNews > 0) {

    $newsRow = $newsResultData->fetch_array();

    $strLangcls = ($_SESSION['lang'] == 'O') ? 'odia' : '';
    $newsId = $newsRow['intNewsId'];

    $headlineE = htmlspecialchars_decode($newsRow['vchHeadLineE'], ENT_QUOTES);
    $headlineO = $newsRow['vchHeadLineH'];

    $headlineCount = ($_SESSION['lang'] == 'O' && $headlineO != '') ? 70 : 50;
    $headline = ($_SESSION['lang'] == 'O' && $headlineO != '') ? $objNews->wardWrap(strip_tags($headlineO), $headlineCount) : $objNews->wardWrap(strip_tags($headlineE), $headlineCount);
    $headlineCls = ($_SESSION['lang'] == 'O' && $headlineO != '') ? 'odia' : '';
    $descNewsE = htmlspecialchars_decode($newsRow['vchDescriptionE'], ENT_QUOTES);
    $descNewsO = urldecode($newsRow['vchDescriptionH']);
    $descNews = ($_SESSION['lang'] == 'O' && $descNewsO != '') ? $descNewsO : $descNewsE;
    $descCls = ($_SESSION['lang'] == 'O' && $descNewsO != '') ? 'odia' : '';
    $descCount = ($_SESSION['lang'] == 'O' && $descNewsO != '') ? 100 : 70;
    $newsDate = ($_SESSION['lang'] == 'O') ? date('d', strtotime($newsRow['dtmNewsDate'])) . ' ' . $objNews->getOdiaMonths(date('n', strtotime($newsRow['dtmNewsDate']))) : date('jS F', strtotime($newsRow['dtmNewsDate']));
    $image = ($newsRow['vchImageFile'] != '') ? APP_URL . "uploadDocuments/news/" . $newsRow['vchImageFile'] : '';

    $vchSourcename = ($_SESSION['lang'] == 'O' && $newsRow['vchSourcenameO'] != '') ? $newsRow['vchSourcename'] : htmlspecialchars_decode($newsRow['vchSourcename'], ENT_QUOTES);
    $vchSourcenameCls = ($_SESSION['lang'] == 'O' && $newsRow['vchSourcenameO'] != '') ? 'odia' : '';
    $vchSource = $newsRow['vchSource'];

    $vchNewsCategory = ($_SESSION['lang'] == 'O' && $newsRow['vchNewsCategoryO'] != '') ? $newsRow['vchNewsCategoryO'] : htmlspecialchars_decode($newsRow['vchNewsCategory'], ENT_QUOTES);
    $vchSourcenameCls = ($_SESSION['lang'] == 'O' && $newsRow['vchNewsCategoryO'] != '') ? 'odia' : '';
    $sourceHtml = ($newsRow['intCategoryId'] == 2) ? $vchSourcename : '<a href="' . $vchSource . '" title="" target="_blank">' . $vchSourcename . '</a>';
    ?>
										<div class="col-12 col-sm-12 col-lg-3 d-flex mr-0">

											<div class="card">
												<a href="<?php echo $vchSource; ?>" target="_blank"> 
												<div class="hovereffect">
												<div class="imgparents"> <img class="img-responsive" src="<?php echo $image; ?>" alt="News Image">
												</div>
											      <div class="overlay"> </div>
											  </div>
												<div class="card-body">
													<p class="card-text"><small class="text-muted <?php echo $odiaClass; ?>"> <i class="icon-InNews"></i>
                            <!--                                                        <img src="<?php //echo SITE_URL;  ?>images/InNews.png"/>-->
                            <?php echo $strNewUpdateslbl; ?></small>
													</p>
													<p class="card-text card-textnew <?php echo $odiaClass; ?>">
														<small class="text-muted <?php echo ($_SESSION['lang'] == 'O') ? $strNumLangCls : ''; ?>">
															<?php echo $newsDate; ?>
														</small>
													</p>
													<h4 class="<?php echo $odiaClass; ?>">
														<?php echo $headline; ?>
													</h4>
													<p class="card-text mrgn90 <?php echo $descCls; ?>">
														<?php echo $objNews->wardWrap(strip_tags($descNews), $descCount); ?> </p>
													<!--                                                        <p class="card-text card-textnew"><?php //echo $strNewsSourcelbl;  ?> : <small class="text-muted"><?php //echo $sourceHtml;  ?></small></p>-->
													<a href="<?php echo $vchSource; ?>" target="_blank" class="purplebtn hvr-grow <?php echo $odiaClass; ?>">
														<?php echo $readNewslbl; ?><i class="fa fa-chevron-right"></i> </a>
												</div>
												</a>
											</div>
										</div>
										<?php }?>
									</div>
									<div class="card-deck portlets">
										<div class="col-12 col-sm-6 col-lg-3 d-flex mr-0 pr0">
											<div class="card" id="divempSpeak">
												<!--Employee Speaker-->
											</div>
										</div>
										
										
			<!--							
				<div class="card">
							<div class="hovereffect">
								<div class="osdaimg"> <img class="img-responsive card-img-top" src="images/Students.jpg" alt="Students"> </div>
								<div class="overlay"> </div>
							</div>
							
						</div>	-->	
										
										
										
										
										
										<div class="col-12 col-sm-6 col-lg-3 d-flex pr0">
											<div class="card mr-0" id="successStory">
												<!--Success Story Block-->
											</div>
										</div>
										<div class="col-12 col-sm-6 col-lg-3 d-flex pr0">
											<div class="card mr-0" id="homeGallery">
											</div>
										</div>
										<div class="col-12 col-sm-6 col-lg-3 d-flex pd0">
											<div class="card" id="homeBlog">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12 col-sm-12 col-lg-6">
											<div class="row portlets">
												<div class="col-12 col-sm-6 col-lg-6 pr0">
													<div class="card mr-0 leadershipd">
														<a href="<?php echo SITE_URL; ?>leadership-program">
														<div class="hovereffect">
														<div class="imgparents"><img class="img-responsive" src="images/leadershipp.jpg" alt="Leadership Development Programme"> </div>
														 <div class="overlay"> </div>
														</div>
														<div class="card-body">
															
														 
															<p class="card-text"><small class="text-muted <?php echo $odiaClass; ?>"><i class="icon-RoleModel"></i> <?php echo $home1; ?></small> </p>
															<p class="card-text <?php echo $odiaClass; ?>"><?php echo $home44; ?></p>

															<a href="<?php echo SITE_URL; ?>leadership-program" class="purplebtn hvr-grow <?php echo $odiaClass; ?>">
																<?php echo $strKnwMorelbl; ?><i class="fa fa-chevron-right"></i> </a>
														</a>		
														</div>
													</div>
												</div>
                                              <!-- <div class="col-12 col-sm-6 col-lg-6 d-flex pr0">
													<div class="card mr-0">
														<div class="twitterheading <?php echo $odiaClass; ?>"><i class="fa fa-twitter" aria-hidden="true"></i><?php echo $strTwiterlbl; ?></div>
														<div class="twittersec">
														<a class="twitter-timeline" href="https://twitter.com/skilled_odisha?ref_src=twsrc%5Etfw">Tweets by skilled_odisha</a>
															<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
														</div>
													</div>
												</div>-->



											<div class="col-12 col-sm-6 col-lg-6 pr0">
												<div class="card mr-0">
													<div class="twitterheading">
														<ul class="nav nav-tabs" id="myTab" role="tablist">

														  <li class="nav-item">
															<a class="nav-link active" id="Twitter-tab" data-toggle="tab" href="#Twitter" role="tab" aria-controls="Twitter" aria-selected="false"><i class="fa fa-twitter"></i>Twitter</a>
														  </li>
														  <li class="nav-item">
															<a class="nav-link " id="Facebook-tab" data-toggle="tab" href="#Facebook" role="tab" aria-controls="Facebook" aria-selected="true"><i class="fa fa-facebook"></i>Facebook</a>
														  </li>


				<!--
														  <li class="nav-item">
															<a class="nav-link" id="Linked-tab" data-toggle="tab" href="#Linked" role="tab" aria-controls="Linked" aria-selected="false">Linked <i class="fa fa-linkedin" aria-hidden="true"></i></a>
														  </li>
				-->
														</ul>
													</div>

													<div class="twittersec">
														<div class="tab-content" id="myTabContent">

													  <div class="tab-pane fade show active" id="Twitter" role="tabpanel" aria-labelledby="Twitter-tab">

															<div class="twittersec">
																<a class="twitter-timeline" href="https://twitter.com/skilled_odisha?ref_src=twsrc%5Etfw">Tweets by skilled_odisha</a>
																<script defer src="https://platform.twitter.com/widgets.js"></script>
															</div>

														  </div>




														  <div class="tab-pane fade " id="Facebook" role="tabpanel" aria-labelledby="Facebook-tab">
														  <div class="fb-page" data-href="https://www.facebook.com/SkilledinOdisha-359419377823349/" data-tabs="timeline" data-width="327" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/SkilledinOdisha-359419377823349/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/SkilledinOdisha-359419377823349/">Odisha Skill Development Authority</a></blockquote></div>
														  </div>

														  <div class="tab-pane fade" id="Linked" role="tabpanel" aria-labelledby="Linked-tab">Data Not Found</div>
														</div>
													</div>
												</div>
											</div>



											</div>
										</div>
										<div class="col-12 col-sm-12 col-lg-6 d-flex">
											<div class="portlets focus-iti">
												<div class="card cardpadding">
													<?php if ($inFocusresult->num_rows > 0) {?>
													<div class="tabsec">
														<div class="row">
															<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
																<?php
$focctr = 0;
    while ($focusRow = $inFocusresult->fetch_array()) {
        $focctr++;
        $intFocusId = $focusRow['intId'];
        $strFocTitleE = ($focusRow['vchTitle'] != '') ? htmlspecialchars_decode($focusRow['vchTitle'], ENT_QUOTES) : '';
        $strFocTitlecls = ($_SESSION['lang'] == 'O' && $focusRow['vchTitleO'] != '') ? 'odia' : '';
        $strFocTitle = ($_SESSION['lang'] == 'O' && $focusRow['vchTitleO'] != '') ? $focusRow['vchTitleO'] : $strFocTitleE;
        $strFocNameE = ($focusRow['vchName'] != '') ? htmlspecialchars_decode($focusRow['vchName'], ENT_QUOTES) : '';

        $strFocName = ($_SESSION['lang'] == 'O' && $focusRow['vchNameO'] != '') ? $focusRow['vchNameO'] : $strFocNameE;
        $strFocNameCls = ($_SESSION['lang'] == 'O' && $focusRow['vchNameO'] != '') ? 'odia' : '';
        $strFocImage = ($focusRow['vchImage'] != '') ? APP_URL . 'uploadDocuments/Infocus/' . $focusRow['vchImage'] : '';
        $focdescClass = ($_SESSION['lang'] == 'O' && $focusRow['vchDescriptionO'] != '') ? 'odia' : '';
        $strFocDescE = ($row['vchDescription'] != '') ? htmlspecialchars_decode($focusRow['vchDescription'], ENT_QUOTES) : '';
        $strFocDesc = ($_SESSION['lang'] == 'O' && $focusRow['vchDescriptionO'] != '') ? $focusRow['vchDescriptionO'] : $strFocDescE;
        $descFocCount = ($_SESSION['lang'] == 'O' && $focusRow['vchDescriptionO'] != '') ? 100 : 80;

        $clsActive = ($focctr == 1) ? 'active' : '';
        ?>
																<a class="nav-link <?php echo $clsActive; ?>" id="v-pills-<?php echo $intFocusId; ?>-tab" data-toggle="pill" href="#v-pills-<?php echo $intFocusId; ?>" role="tab" aria-controls="v-pills-<?php echo $intFocusId; ?>" aria-selected="false">
                                <p class="<?php echo $strFocTitlecls; ?>"><?php echo $strFocTitle; ?></p>
                                <h3 class="<?php echo $strFocNameCls; ?>"><?php echo $strFocName; ?></h3>
                                </a>

																<?php }?>
															</div>
															<?php }?>
															<?php if ($inFocusresult->num_rows > 0) {?>
															<div class="tab-content" id="v-pills-tabContent">
																<?php
$focctr = 0;
    mysqli_data_seek($inFocusresult, 0);
    while ($focusRow = $inFocusresult->fetch_array()) {
        $focctr++;
        $intFocusId = $focusRow['intId'];
        $strFocTitleE = ($focusRow['vchTitle'] != '') ? htmlspecialchars_decode($focusRow['vchTitle'], ENT_QUOTES) : '';
        $strFocTitlecls = ($_SESSION['lang'] == 'O' && $focusRow['vchTitleO'] != '') ? 'odia' : '';
        $strFocTitle = ($_SESSION['lang'] == 'O' && $focusRow['vchTitleO'] != '') ? $focusRow['vchTitleO'] : $strFocTitleE;
        $strFocNameE = ($focusRow['vchName'] != '') ? htmlspecialchars_decode($focusRow['vchName'], ENT_QUOTES) : '';

        $strFocName = ($_SESSION['lang'] == 'O' && $focusRow['vchNameO'] != '') ? $focusRow['vchNameO'] : $strFocNameE;
        $strFocNameCls = ($_SESSION['lang'] == 'O' && $focusRow['vchNameO'] != '') ? 'odia' : '';
        $strFocImage = ($focusRow['vchImage'] != '') ? APP_URL . 'uploadDocuments/Infocus/' . $focusRow['vchImage'] : '';
        $focdescClass = ($_SESSION['lang'] == 'O' && $focusRow['vchDescriptionO'] != '') ? 'odia' : '';
        $strFocDescE = ($row['vchDescription'] != '') ? htmlspecialchars_decode($focusRow['vchDescription'], ENT_QUOTES) : '';
        $strFocDesc = ($_SESSION['lang'] == 'O' && $focusRow['vchDescriptionO'] != '') ? $focusRow['vchDescriptionO'] : $strFocDescE;
        $descFocCount = ($_SESSION['lang'] == 'O' && $focusRow['vchDescriptionO'] != '') ? 100 : 80;

        $clsActive = ($focctr == 1) ? 'active show' : '';
        ?>
																<div class="tab-pane fade show <?php echo $clsActive; ?>" id="v-pills-<?php echo $intFocusId; ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $intFocusId; ?>-tab">
																	<div class="tabright">
																		<a class="<?php echo $odiaClass; ?>" href="<?php echo SITE_URL; ?>/in-focus#focused-<?php echo $intFocusId; ?>">
																		<div class="tabimg"> <img src="<?php echo $strFocImage; ?>" alt="In focus"/> </div>
																		<div class="tabcontent">
																			<p class="<?php echo $strFocTitlecls; ?>">
																				<?php echo $objNews->wardWrap(strip_tags($strFocDesc), $descFocCount); ?>
																			</p>
																			<a class="<?php echo $odiaClass; ?>" href="<?php echo SITE_URL; ?>/in-focus#focused-<?php echo $intFocusId; ?>">
																				<?php echo $strKnowmorelbl; ?>&nbsp;&nbsp;<i class="fa fa-chevron-right"></i>
																			</a>
																		</div>
																		<div class="clearfix"></div>
																		</a>
																	</div>
																</div>
																<?php }?>
															</div>
															<?php }?>
														</div>
														<div class="clearfix"></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--End:: stories-->

	<!--start:: nano unicorn-->
	<div class="row">
		<a href="<?php echo SITE_URL; ?>nano-unicorn">
		<div class="col-md-12 pdl0 pdr0 nanoimg">
			<div class="container">
				<div class="unicornsec <?php echo $odiaClass; ?>">
					<h3 class="<?php echo $odiaClass; ?>"><?php echo $home40; ?></h3>
					<h1 class="<?php echo $odiaClass; ?>"><?php echo $home41; ?></h1>
					<p><?php echo $home42; ?></p>
					<a href="<?php echo SITE_URL; ?>nano-unicorn" class="unicornbtn hvr-sweep-to-right" aria-label="<?php echo $nanounicornbtn; ?>"><?php echo $nanounicornbtn; ?></a> </div>
			</div>
		</div>
		</a>
	</div>
	<!--End:: nano unicorn-->

	<!--start:: What OSDA does-->
	<div class="osdaportlet <?php echo $odiaClass; ?>">
		<div class="container">
			<!--<h1>WHAT OSDA DOES</h1>-->
			<div class="">
				<div class="row">
					<div class="col-12 col-sm-12 col-lg-4 ">
						<div class="card">
							<a href="<?php echo SITE_URL; ?>contact">
							
							<div class="hovereffect">
								<div class="osdaimg"> <img class="img-responsive card-img-top" src="images/Students.jpg" alt="Students"> </div>
								<div class="overlay"> </div>
							</div>
							<div class="card-body <?php echo $odiaClass; ?>">
								<h3 class="<?php echo $odiaClass; ?>">
									<?php echo $home2; ?>
								</h3>
								<p class="card-text <?php echo $odiaClass; ?>">
									<?php echo $studentContact1; ?></br>
									<?php echo $studentContact2; ?></br>
								</p>
								<a href="<?php echo SITE_URL; ?>contact" class="purplebtn hvr-grow" aria-label="<?php echo $studentbtn; ?>">
									<?php echo $studentbtn; ?><i class="fa fa-chevron-right"></i> </a>
							</div>
							</a>
						</div>
					</div>
					<div class="col-12 col-sm-12 col-lg-4">
						<div class="card">
							<a href="<?php echo SITE_URL; ?>contact/2">
							<div class="hovereffect">
								<div class="osdaimg"> <img class="img-responsive card-img-top" src="images/Individuals.jpg" alt="Individuals"> </div>
								<div class="overlay"> </div>
							</div>
							<div class="card-body <?php echo $odiaClass; ?>">
								<h3 class="<?php echo $odiaClass; ?>">
									<?php echo $home6; ?>
								</h3>
								<!-- <h5 class="card-title">#India Competition</h5>-->
								<p class="card-text <?php echo $odiaClass; ?>">
									<?php echo $studentContact7; ?></br>
									<?php echo $studentContact8; ?></br>
								</p>
								<a href="<?php echo SITE_URL; ?>contact/2" class="purplebtn hvr-grow" aria-label="<?php echo $employeebtn; ?>">
									<?php echo $employeebtn; ?><i class="fa fa-chevron-right"></i> </a>
							</div>
						</a>
						</div>
					</div>
					<div class="col-12 col-sm-12 col-lg-4 ">
						<div class="card">
							<a href="<?php echo SITE_URL; ?>contact/3">
							<div class="hovereffect">
								<div class="osdaimg"><img class="img-responsive card-img-top" src="images/Unicorns.jpg" alt="Unicorns"> </div>
								<div class="overlay"> </div>
							</div>
							<div class="card-body <?php echo $odiaClass; ?>">
								<h3 class="<?php echo $odiaClass; ?>">
									<?php echo $home4; ?>
								</h3>
								<p class="card-text <?php echo $odiaClass; ?>">
									<?php echo $studentContact3; ?></br>
									<?php echo $studentContact4; ?></br>
									<?php echo $studentContact5; ?></br>
									<?php echo $studentContact6; ?></br>
								</p>
								<a href="<?php echo SITE_URL; ?>contact/3" class="purplebtn hvr-grow" aria-label="<?php echo $trainingbtn; ?>">
									<?php echo $trainingbtn; ?><i class="fa fa-chevron-right"></i> </a>
							</div>
						</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--End::What OSDA does-->

	<!--start:: Odisha skill competation-->

	<div class="row">
		<div class="container-fluid">
			<div class="skillcompetation">
				<div class="container">
				<a href="<?php echo SITE_URL; ?>skill-competition">	
					<div class="comptext <?php echo $odiaClass; ?>">
						<h3 class="<?php echo $odiaClass; ?>">
							<?php echo $home8; ?>
						</h3>
						<h1 class="<?php echo $odiaClass; ?>">
							<?php echo $home9; ?>
						</h1>
						<p><?php echo $home43; ?></p>
						<a href="<?php echo SITE_URL; ?>skill-competition" class="unicornbtn hvr-sweep-to-right" aria-label="<?php echo $strKnwMorelbl; ?>"><?php echo $strKnwMorelbl; ?></a> </div>

					<div class="skill-logo">
					<a href="#" title=""> <img src="images/IndiaSkills.png" alt="IndiaSkills"/> </a>
					<a href="#" title=""> <img src="images/WorldSkillKazan.png" alt="WorldSkillKazan"/> </a>
					<a href="#" title=""> <img src="images/WorldSkills.png" alt="WorldSkills"/> </a>
					<a href="#" title=""> <img src="images/logo.png" alt="logo"/> </a> </div>
				</a>
			</div>
			</div>
		</div>
	</div>

	<!--end:: Odisha skill competation-->

	<!--start::Footer-->
	<?php include 'include/footer.php'
	?>
	<!--end::Footer-->

	<!--bottom-Footer-->
	<!---->

	<a href="javascript:void(0);" class="back-to-top" style="display:none;"><i class="fa fa-chevron-up"></i></a>
	<!-- The Modal -->
	<input type="hidden" name="emp-no" id="emp-no" value=""/>
</form>


<script>


	$(document).ready(function () {
			getEmployerSpeak( 'divempSpeak' );
			getSuccessStories( 'successStory' );
			getHomeGallery( 'homeGallery' );
			getHomepageBlog( 'homeBlog' );

	//Go next function
		$('.go-next a').on('click', function(){
			$('html,body').animate({scrollTop: $(this).offset().top}, 1000);
		});
		$(window).scroll(function () {
			if ($(this).scrollTop() > 30) {
				$('.go-next').fadeOut();
			}
			else {
				$('.go-next').fadeIn();
			}
		});
	//end

	});

	$( function () {
			
		$('.toast-close').click(function(){
			$(this).parent().removeClass('open');
			setTimeout(function(){
				$(this).parent().remove();
			}, 100);
		});

		/*$('#coursecarousal').carousel({
		 interval: 15000
		 });*/

		$( '#institutecarousal' ).carousel( {
			interval: 20000
		} );

		$( '#jobscarousal' ).carousel( {
			interval: 25000
		} );

		$( '#resourcecarousal' ).carousel( {
			interval: 30000
		} );

		$( '#partnercarousal' ).carousel( {
			interval: 15000
		} );

	} );

	//

	window.onload = function () {
		$( '.page-loader' ).addClass('removing');
		setTimeout( function () {
			$( '.page-loader' ).fadeOut(800);
			setTimeout( function () {
				$( '.page-loader' ).removeClass('removing').remove();
				$('.competition-toast').addClass('open');
			}, 400 );
		}, 400 );
		//alert(2);
		//$('.osda--btn').trigger('click');
	}

	function goToEmpSpeak( empId ) {
		
		if ( empId > 0 ) {
			$( '#emp-no' ).val( empId );
			//$( '#frmOsda' ).attr( 'action', '<?php echo SITE_URL; ?>employer-speak#emp-'+empId );
			$( '#frmOsda' ).attr( 'action', '<?php echo SITE_URL; ?>employer-speak' );
			$( '#frmOsda' ).submit();
		}
	}
	
	
</script>
<script>	
	$( function () {			
		var now = new Date().getTime();
		var page_load_time = now - performance.timing.navigationStart;
		// Code for page line loader
		var width = 100;
		
		$(".progress-line").animate({

            width: width + "%"

        }, parseInt(page_load_time), function(){

            $('#mobile-nav ul li ul').hide();

        });
		// END HERE
	});
</script>

</body>
</html>