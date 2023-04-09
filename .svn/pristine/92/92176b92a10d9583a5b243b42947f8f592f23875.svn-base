<?php
/*plugin*/
/*
  Website Name : Odisha Skill Developement Authority (OSDA)
  Date Created : 4rd Dec 2018
  Author : Rumana Parween
 */
?>



<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?>

    <script type="text/javascript" src="js/html5lightbox.js"></script>

<style>.hovereffect img {transform: none;}</style>
<link rel="stylesheet" href="<?php echo SITE_URL; ?>css/inner.css" /> 
    <!--start:: contarea-->
    <section class="container contarea">		  
<div class="">
	<?php
	if ( ( $catResult->num_rows ) > 0 ) {
		$arrayCatId = array();
		$navactiveclass = ( $intGalleryCatId == 0 ) ? 'active' : '';
		?>
		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
			<li class="nav-item">
				<a class="nav-link <?php echo $navactiveclass;?>" id="showall-tab" data-toggle="pill" href="#showall" role="tab" aria-controls="showall" aria-selected="true">
					<?php echo $strAlllbl;?>
				</a>
			</li>
			<?php
			while ( $row = $catResult->fetch_array() ) {
				$navactiveclass = ( $intGalleryCatId == $row[ "INT_CATEGORY_ID" ] ) ? 'active' : '';
				array_push( $arrayCatId, $row[ "INT_CATEGORY_ID" ] );
				$intCatId = $row[ "INT_CATEGORY_ID" ];
				$strCatNameE = ( htmlspecialchars_decode( $row[ "VCH_CATEGORY_NAME" ], ENT_QUOTES ) );
				$strCatNameO = $row[ "VCH_CATEGORY_NAME_O" ];
				$strCatName = ( $_SESSION[ 'lang' ] == 'O' && $strCatNameO != '' ) ? $strCatNameO : $strCatNameE;
				$strLangCls = ( $_SESSION[ 'lang' ] == 'O' ) ? 'odia' : '';
				?>
			<li class="nav-item">
				<a class="nav-link <?php echo $strLangCls.' '.$navactiveclass; ?>" id="cat-<?php echo $intCatId; ?>-tab" data-toggle="pill" href="#tab-cat<?php echo $intCatId;?>" role="tab" aria-controls="showall" aria-selected="true">
					<?php echo $strCatName; ?>
				</a>
			</li>
			<?php } ?>
		</ul>
	<?php } ?>

	
	<div class="">
		<?php if (count($arrayCatId) > 0) { 
			$activeclassAll=($intGalleryCatId==0)?'show active':'';
		?>
		<div class="tab-content" id="pills-tabContent">
			<div class="tab-pane fade <?php echo $activeclassAll;?>" id="showall" role="tabpanel" aria-labelledby="showall-tab">
				<h2><?php echo $strAllMedia;?></h2>
				<!-- All gallery obj from db -->
				<?php
					$imageresult = $objGal->manageGallery( 'VRG', 0, 0, 0, 0, '', '', '', '', '', '', '', 2, 0, 0, '' );
					$count = $imageresult->num_rows;
					if ( $count > 0 ) {
				?>
				
					<div class="galleryinner">
						<div class="row">
							<?php
								while ( $row = $imageresult->fetch_array() ) {

									$intGalleryId = $row[ 'INT_GALLERY_ID' ];
									$intCategoryId = $row[ 'INT_CATEGORY_ID' ];
									$strImageFile = isset( $row[ 'VCH_LARGE_IMAGE' ] ) ? APP_URL . 'uploadDocuments/gallery/' . $row[ 'VCH_LARGE_IMAGE' ]: '';
									$intTypeId = $row[ 'INT_TYPE_ID' ];
									$strCaption = ( $_SESSION[ 'lang' ] == 'O' && $row[ 'VCH_HEADLINE_O' ] != '' ) ? $row[ 'VCH_HEADLINE_O' ] : htmlspecialchars_decode( $row[ 'VCH_HEADLINE_E' ], ENT_QUOTES );
									$strClass = ( $_SESSION[ 'lang' ] == 'O' && $row[ 'VCH_HEADLINE_O' ] != '' ) ? 'odia' : '';
									$strCaptionE = htmlspecialchars_decode( $row[ 'VCH_HEADLINE_E' ], ENT_QUOTES );

									$strCatgory = ( $_SESSION[ 'lang' ] == 'O' && $row[ 'VCH_CATEGORY_NAME_O' ] != '' ) ? $row[ 'VCH_CATEGORY_NAME_O' ] : htmlspecialchars_decode( $row[ 'VCH_CATEGORY_NAME' ], ENT_QUOTES );
									$strCatClass = ( $_SESSION[ 'lang' ] == 'O' && $row[ 'VCH_CATEGORY_NAME_O' ] != '' ) ? 'odia' : '';
									$strCatgoryE = htmlspecialchars_decode( $row[ 'VCH_CATEGORY_NAME' ], ENT_QUOTES );

									$video = $row[ 'VCH_THUMB_IMAGE' ];
									$linkType = $row[ 'INT_VIDEO_LINK_TYPE' ];
									$url = $row[ 'VCH_URL' ];

									$strVideoNumCls = $strNumLangCls;
									$strTypeicon = ( $intTypeId == 3 ) ? '<i class="fa fa-video-camera"></i>' : '<i class="fa fa-picture-o" aria-hidden="true"></i>';
									$strTypeInnericon = ( $intTypeId == 3 ) ? '<i class="fa fa-play" aria-hidden="true"></i>' : '<i class="fa fa-search" aria-hidden="true"></i>';
									$strVideoCls = ( $_SESSION[ 'lang' ] == 'O' ) ? 'odia' : '';
									$strDate = ( $_SESSION[ 'lang' ] == 'O' ) ? '<span class="' . $strNumLangCls . '">' . date( 'd', strtotime( $row[ 'DTM_CREATED_ON' ] ) ) . '</span> ' . $objGal->getOdiaMonths( date( 'n', strtotime( $row[ 'DTM_CREATED_ON' ] ) ) ) . ' <span class="' . $strNumLangCls . '">' . date( 'Y', strtotime( $row[ 'DTM_CREATED_ON' ] ) ) . '</span>': date( 'jS F Y ', strtotime( $row[ 'DTM_CREATED_ON' ] ) );
									$videourl = ( $linkType == 1 ) ? APP_URL . "uploadDocuments/Video/VideoFile/" . $video: $url;
									if ( $intTypeId == 3 ) {
										$thumbImage = $strImageFile;
										$refId = 'video' . $intGalleryId;
										$sourceURL = $videourl;
									} else {
										$thumbImage = $strImageFile;
										$refId = 'photo' . $intGalleryId;
										$sourceURL = $strImageFile;
									}
							?>

							<div class="col-lg-3 col-md-3 col-sm-12">
								<a href="<?php echo $sourceURL;?>" data-thumbnail="<?php echo $strImageFile;?>" data-group="cat-<?php echo $intCategoryId;?>" class="html5lightbox galleryNew Portfolio hovereffect" data-width="480" data-height="320" title="<?php echo $strCatName;?>">
									<img src="<?php echo $strImageFile;?>">
									<div class="innericons"> <?php echo $strTypeicon;?></div>
									<div class="overlay">
										<span class="multi_hover"><?php echo $strTypeInnericon;?></span>
									</div>
								</a>
							</div> 

						<?php } ?>
						<!-- While loop end here -->
						</div>				
					</div>		

				<?php } ?>
				<!-- Gallery object from db End -->
			</div>
			<!-- For loop start -->
			<?php 
				for($i=0;$i<count($arrayCatId);$i++){                         
					$catDataresult         = $objGal->manageGallery('CM',0,$arrayCatId[$i],0,0,'','','','','','','',2,0,0,'');
					if($catDataresult->num_rows > 0) {  
						$catRow = $catDataresult->fetch_array();
						$strCatName      = ($_SESSION['lang']=='O' && $catRow['VCH_CATEGORY_NAME_O']!='')?$catRow['VCH_CATEGORY_NAME_O']:htmlspecialchars_decode($catRow['VCH_CATEGORY_NAME'],ENT_QUOTES);;
						$strCatNameCls   = ($_SESSION['lang']=='O' && $catRow['VCH_CATEGORY_NAME_O']!='')?'odia':'';
						$totalPhotos     =  $catRow['RECNO'];

						$strCatDesc      = ($_SESSION['lang']=='O' && $catRow['VCH_DESCRIPTION_O']!='')?$catRow['VCH_DESCRIPTION_O']:htmlspecialchars_decode($catRow['VCH_DESCRIPTION'],ENT_QUOTES);
						$strCatDescls    = ($_SESSION['lang']=='O' && $catRow['VCH_DESCRIPTION_O']!='')?'odia':'';
			
						$activeclass=($intGalleryCatId==$arrayCatId[$i])?'show active':'';
			?>
				<div class="tab-pane fade <?php echo $activeclass;?>" id="tab-cat<?php echo $arrayCatId[$i];?>" role="tabpanel" aria-labelledby="cat-<?php echo $intCatId; ?>-tab">

					<h2 class="<?php echo $strCatNameCls;?>">
						<?php echo $strCatName;?>
					</h2>
					<p class="<?php echo $strCatDescls;?>">
						<?php echo $strCatDesc;?>
					</p>
					<!-- Gallery object from db -->
					<?php
						$imageresult = $objGal->manageGallery( 'V', 0, $arrayCatId[ $i ], 0, 0, '', '', '', '', '', '', '', 2, 0, 0, '' );
						$count = $imageresult->num_rows;
						if ( $count > 0 ) {
					?>
					<!-- Data received from database -->
					
					<div class="galleryinner">
						<div class="row">
							<?php
								while ( $row = $imageresult->fetch_array() ) {

									$intGalleryId = $row[ 'INT_GALLERY_ID' ];
									$intCategoryId = $row[ 'INT_CATEGORY_ID' ];
									$strImageFile = isset( $row[ 'VCH_LARGE_IMAGE' ] ) ? APP_URL . 'uploadDocuments/gallery/' . $row[ 'VCH_LARGE_IMAGE' ]: '';
									$intTypeId = $row[ 'INT_TYPE_ID' ];
									$strCaption = ( $_SESSION[ 'lang' ] == 'O' && $row[ 'VCH_HEADLINE_O' ] != '' ) ? $row[ 'VCH_HEADLINE_O' ] : htmlspecialchars_decode( $row[ 'VCH_HEADLINE_E' ], ENT_QUOTES );
									$strClass = ( $_SESSION[ 'lang' ] == 'O' && $row[ 'VCH_HEADLINE_O' ] != '' ) ? 'odia' : '';
									$strCaptionE = htmlspecialchars_decode( $row[ 'VCH_HEADLINE_E' ], ENT_QUOTES );

									$strCatgory = ( $_SESSION[ 'lang' ] == 'O' && $row[ 'VCH_CATEGORY_NAME_O' ] != '' ) ? $row[ 'VCH_CATEGORY_NAME_O' ] : htmlspecialchars_decode( $row[ 'VCH_CATEGORY_NAME' ], ENT_QUOTES );
									$strCatClass = ( $_SESSION[ 'lang' ] == 'O' && $row[ 'VCH_CATEGORY_NAME_O' ] != '' ) ? 'odia' : '';
									$strCatgoryE = htmlspecialchars_decode( $row[ 'VCH_CATEGORY_NAME' ], ENT_QUOTES );

									$video = $row[ 'VCH_THUMB_IMAGE' ];
									$linkType = $row[ 'INT_VIDEO_LINK_TYPE' ];
									$url = $row[ 'VCH_URL' ];

									$strVideoNumCls = $strNumLangCls;
									$strTypeicon = ( $intTypeId == 3 ) ? '<i class="fa fa-video-camera"></i>' : '<i class="fa fa-picture-o" aria-hidden="true"></i>';
									$strTypeInnericon = ( $intTypeId == 3 ) ? '<i class="fa fa-play" aria-hidden="true"></i>' : '<i class="fa fa-search" aria-hidden="true"></i>';
									$strVideoCls = ( $_SESSION[ 'lang' ] == 'O' ) ? 'odia' : '';
									$strDate = ( $_SESSION[ 'lang' ] == 'O' ) ? '<span class="' . $strNumLangCls . '">' . date( 'd', strtotime( $row[ 'DTM_CREATED_ON' ] ) ) . '</span> ' . $objGal->getOdiaMonths( date( 'n', strtotime( $row[ 'DTM_CREATED_ON' ] ) ) ) . ' <span class="' . $strNumLangCls . '">' . date( 'Y', strtotime( $row[ 'DTM_CREATED_ON' ] ) ) . '</span>': date( 'jS F Y ', strtotime( $row[ 'DTM_CREATED_ON' ] ) );
									$videourl = ( $linkType == 1 ) ? APP_URL . "uploadDocuments/Video/VideoFile/" . $video: $url;
									if ( $intTypeId == 3 ) {
										$thumbImage = $strImageFile;
										$refId = 'video' . $intGalleryId;
										$sourceURL = $videourl;
									} else {
										$thumbImage = $strImageFile;
										$refId = 'photo' . $intGalleryId;
										$sourceURL = $strImageFile;
									}
							?>

							<div class="col-lg-3 col-md-3 col-sm-12">
								<a href="<?php echo $sourceURL;?>" data-thumbnail="<?php echo $strImageFile;?>" data-group="cat-<?php echo $intCategoryId;?>" class="html5lightbox galleryNew Portfolio hovereffect" data-width="480" data-height="320" title="<?php echo $strCatName;?>">
									<img src="<?php echo $strImageFile;?>">
									<div class="innericons"> <?php echo $strTypeicon;?></div>
									<div class="overlay">
										<span class="multi_hover"><?php echo $strTypeInnericon;?></span>
									</div>
								</a>
							</div> 
					
						<?php } ?>
						<!-- While loop end here -->
						</div>				
					</div>		

					<?php } ?>
					<!-- Gallery object from db End -->
				</div>
			<?php } } ?>
			<!-- For Loop end -->

		</div>
		<?php } else { ?>

		<?php } ?>
	</div>

</div>
  <div class="clearfix"></div>  
    </section>
</div>

<!--end:: contarea-->
<!--start::Footer-->

<?php include 'include/footer.php' ?>
</body>
</html>

<!--<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css">-->
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/lightGallery.css">
<!--<link rel="stylesheet" type="text/css" href="css/slideshow.css">-->

<!--
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/gallery.js"></script>
-->
<script type="text/javascript" src="<?php echo SITE_URL;?>js/html5lightbox.js"></script>



<script>
    $(document).ready(function () {
        //=== Wow Initialization ===// 	  
        $('.windowLoader').show().fadeOut(2000);
        // new WOW().init();
        //=== Wow Initialization ===// 	  
        //===Tooltip===//  
        $('[data-toggle="tooltip"]').tooltip();

        //$('.fancybox').fancybox();

    });
</script>