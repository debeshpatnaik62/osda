<?php 
/*plugin*/
/*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 28th Dec 2018
Author : MRD
*/ ?>

<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/world-skill-centre.css">
<!--start:: contarea-->

<section class="container contarea">
<div class="row">
 <div class="col-12">
<!--
 <div class="page--banner">
    <div class="item">
        <div class="worldimg">
           <img src="<?php echo SITE_URL;?>images/world-skill-tower.jpg" alt="" class="img-fluid br-15">
		</div>
        <div class="overlay__section">
            <span class="overlay__tag"><i class="fa fa-bank"></i> <?php echo $home77; ?></span>
            <span class="overlay__text"><?php echo $home81; ?></span>
        </div>
    </div>
 </div>
-->
   
   
   
   <div class="page--carousel">
				<div class="slide-progress"></div>
				<div class="owl-carousel">
					<div class="item">
						<img src="<?php echo SITE_URL;?>images/world-skill-tower.jpg" alt="philosophy" class="img-fluid mb-4">
						<div class="overlay__section">
							<span class="overlay__tag"><i class="fa fa-bank"></i> <?php echo $home77; ?></span>
							<span class="overlay__text"> <?php echo $home81; ?></span>
						</div>
					</div>
					<div class="item">
						<img src="<?php echo SITE_URL;?>images/world-skill-tower1.jpg" alt="philosophy" class="img-fluid mb-4">
						<div class="overlay__section">
							<span class="overlay__tag"><i class="fa fa-bank"></i> <?php echo $home77; ?></span>
							<span class="overlay__text"><?php echo $home81; ?></span>
						</div>
					</div>
					<div class="item">
						<img src="<?php echo SITE_URL;?>images/world-skill-tower2.jpg" alt="philosophy" class="img-fluid mb-4">
						<div class="overlay__section">
							<span class="overlay__tag"><i class="fa fa-bank"></i> <?php echo $home77; ?></span>
							<span class="overlay__text"><?php echo $home81; ?></span>
						</div>
					</div>
					<div class="item">
						<img src="<?php echo SITE_URL;?>images/world-skill-tower3.jpg" alt="philosophy" class="img-fluid mb-4">
						<div class="overlay__section">
							<span class="overlay__tag"><i class="fa fa-bank"></i> <?php echo $home77; ?></span>
							<span class="overlay__text"> <?php echo $home81; ?></span>
						</div>
					</div>
				</div>
			</div>
   
   
   
   
   
   
    <div class="page__content">
        <h3><?php echo $home77; ?></h3>
      
        <div class="highlight-text">
            <p><?php echo $home60; ?></p>
            <!-- <ul class="list-type-arrow">
               <li> <a href="https://www.ite.edu.sg/" target="_blank"><?php echo $home64; ?></a> <?php echo $home82; ?></li>
                <li><?php echo $home61; ?></li>
               <li><?php echo $home62; ?></li>
                <li><?php echo $home63; ?></li>
                <li><?php echo $home65; ?></li>
                <li><?php echo $home66; ?></li>
            </ul> -->
        </div>
        
        <p><?php echo $home67; ?></p>
        <p><?php echo $home1234; ?></p>
        <p><?php echo $home68; ?></p>
        <ul class="list-type-arrow">
           <li><?php echo $home69; ?></li> 
           <li><?php echo $home70; ?></li> 
           <!-- <li><?php echo $home71; ?></li>  -->
           <li><?php echo $home72; ?></li> 
           <!-- <li><?php echo $home73; ?></li> --> 
           <!-- <li><?php echo $home74; ?></li>  -->
           <!-- <li><?php echo $home75; ?></li> 
           <li><?php echo $home76; ?></li>  -->
        </ul>

		<p><?php echo $home78; ?></p>
		<p><?php echo $home79; ?></p>

        <h3 class="mt-5"><?php echo $home80; ?></h3>
        <img src="<?php echo SITE_URL;?>images/world-skill-tower1.jpeg" alt="world-skill-tower" class="img-fluid">

       

        <!-- <div class="blog">
            <div class="blog__media">
                <img src="<?php echo SITE_URL;?>images/award2.jpg" alt="">
            </div>
            <div class="blog__content">
                <div class="content__heading">
                    Odisha Skill Development Authority was established to provide overall direction, guidance
                </div>
                <div class="content__desc">
                    Odisha Skill Development Authority was established to provide overall direction, guidance &amp; implementation of skill development programs in the State by converging different sectors.
                </div>
            </div>
        </div> -->
        
         </div>
    </div> 
         
              
        
 </div>
</section>

<!--end:: contarea-->

<!--start::Footer-->
<?php include 'include/footer.php' ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
	initSlider();
	function initSlider() {
		$( ".owl-carousel" ).owlCarousel( {
			items: 1,
			loop: true,
			dots: false,
			autoplay: true,
			onInitialized: startProgressBar,
			onTranslate: resetProgressBar,
			onTranslated: startProgressBar
		} );
	}

	function startProgressBar() {
		// apply keyframe animation
		$( ".slide-progress" ).css( {
			width: "100%",
			transition: "width 5000ms"
		} );
	}

	function resetProgressBar() {
		$( ".slide-progress" ).css( {
			width: 0,
			transition: "width 0s"
		} );
	}
</script>
</body>
</html>