<?php 

/*plugin*/
/*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 26th Dec 2018
Author : MRD
*/ ?>

<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/skill-museum.css">
<!--start:: contarea-->

<section class="container contarea">
<div class="row">
 <div class="col-12">
 <div class="page--carousel">
    <div class="slide-progress"></div>
    <div class="owl-carousel">
        <div class="item">
            <img src="<?php echo SITE_URL;?>images/Museum1.jpg" alt="philosophy" class="img-fluid mb-4">
            <div class="overlay__section">
              <a href="https://youtu.be/BQkSKlbnd00" target="_blank">  <span class="overlay__tag"> <?php echo $skilledVideo; ?></span></a>
                <span class="overlay__text"><?php echo $skilledbanner1; ?></span>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo SITE_URL;?>images/Museum2.jpg" alt="philosophy" class="img-fluid mb-4">
            <div class="overlay__section">
                <a href="https://youtu.be/BQkSKlbnd00" target="_blank">  <span class="overlay__tag"> <?php echo $skilledVideo; ?></span></a>
                <span class="overlay__text"><?php echo $skilledbanner1; ?></span>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo SITE_URL;?>images/Museum3.jpg" alt="philosophy" class="img-fluid mb-4">
            <div class="overlay__section">
                 <a href="https://youtu.be/BQkSKlbnd00" target="_blank">  <span class="overlay__tag"> <?php echo $skilledVideo; ?></span></a>
                <span class="overlay__text"><?php echo $skilledbanner1; ?></span>
            </div>
        </div>
    </div>
 </div>
    <div class="page__content">
        <h3><?php echo $skilled1; ?></h3>
        <div class="highlight-text">
            <p><?php echo $skilled2; ?></p>
            <p><?php echo $skilled3; ?> </p>
        </div>
        
        
        
   
        
        <div class="blockquote--border--left"><strong><?php echo $skilled4; ?></strong></div>
              
        
        
     
            <P></P>
            
            
            <ul class="list-type-arrow">
     					<li><?php echo $skilled5; ?></li>
     					<li><?php echo $closed; ?></li>
     					<li><?php echo $skillphone; ?></li>
     					<li><?php echo $skillemail; ?></li>
     				</ul>
            
            
            
            
            
            
            
            
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
        
        
        <h2 class="osda--heading text-center mt-4"><?php echo $skilled6; ?></h2>
        
        <div class="">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3738.5026744473207!2d85.8967229649229!3d20.444537136317738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8164d9613590e314!2sSkill+Museum%2C+Cuttack!5e0!3m2!1sen!2sin!4v1566295244516!5m2!1sen!2sin" allowfullscreen></iframe>
        </div>
        
        
        
        
        
        
        
        
        
        
        
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
  $(".owl-carousel").owlCarousel({
    items: 1,
    loop: true,
    dots:false,
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
    
</script>
</body>
</html>