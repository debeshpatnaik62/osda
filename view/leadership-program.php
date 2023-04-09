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
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/leadership-program.css">
<!--start:: contarea-->

<section class="container contarea">
<div class="row">
 <div class="col-12">
    <div class="page--banner">
      <div class="item">
          <img src="<?php echo SITE_URL;?>images/Leadership.jpg" alt="leadership program" class="img-fluid br-15">
          <!-- <div class="overlay__section">
              <span class="overlay__tag"><i class="fa fa-bank"></i> Leadership Program</span>
              <span class="overlay__text">Leadership Program at ITI Cuttack, Odisha</span>
          </div> -->
      </div>
   </div>
    <div class="page__content">
        <h3><?php echo $home1;?></h3>

        <div class="highlight-text">
            <p><?php echo $home10;?></p>
            <p><?php echo $home11;?></p>
            <p><?php echo $home12;?></p>
            <ul>
              <li><?php echo $home13;?></li>
              <li><?php echo $home14;?></li>
            </ul>
        </div>
        <h4><?php echo $home15;?></h4>
        <p><?php echo $home16;?></p>
        
        <h5><?php echo $home17;?></h5>
        <p><?php echo $home18;?></p>

        <h5><?php echo $home19;?></h5>
        <p><?php echo $home20;?> </p>
        <p><?php echo $home21;?> </p>
        <ul class="list-type-arrow">
          <li><?php echo $home22;?></li>
          <li><?php echo $home23;?></li>
          <li><?php echo $home24;?></li>
          <li><?php echo $home25;?></li>
          <li><?php echo $home26;?></li>
          <li><?php echo $home27;?> </li>
          <li><?php echo $home28;?></li>
          <li><?php echo $home29;?></li>
          <li><?php echo $home30;?></li>
          <li><?php echo $home31;?></li>
          <li><?php echo $home32;?></li>
          <li><?php echo $home33;?></li>
        </ul>
        
        <h5><?php echo $home34;?></h5>
        <p><?php echo $home35;?></p>
        <p><?php echo $home36;?></p>
        <ul class="list-type-arrow">
          <li><?php echo $home37;?></li>
          <li><?php echo $home38;?></li>
          <li><?php echo $home39;?></li>
        </ul>

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