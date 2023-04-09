<?php 
/*plugin*/
/*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 6th Dec 2018
Author : MRD
*/ ?>

<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/philosophy.css">
<!--start:: contarea-->

<section class="container contarea">
	<div class="row">
     <?php
      if($intTotalRec>0){
          ?>
        <div class="col-12">
             <div class="philosophy--banner">
                
                <div class="page--carousel">
                    <div class="slide-progress"></div>
                    <div class="owl-carousel">
                        <?php 
                        $ctr=0;
              while($row=$totalResult->fetch_array()){
                  
                 $strTitle   = ($row['vchTitle']!='')?htmlspecialchars_decode($row['vchTitle'], ENT_QUOTES):''; 
                 $strTagline =  ($row['vchTagline']!='')?htmlspecialchars_decode($row['vchTagline'], ENT_QUOTES):''; 
                 $tagLineCount = ($_SESSION['lang']=='O' &&  $row['vchTaglineO']!='')?100:80;
                 $strImage   = ($row['vchImage']!='')?APP_URL.'uploadDocuments/Philosophy/'.$row['vchImage']:''; 
                 $descClass  = ($_SESSION['lang']=='O' && $row['vchDescriptionO']!='')?'odia':'';
                 $strDescE   = ($row['vchDescription']!='')?htmlspecialchars_decode($row['vchDescription'], ENT_QUOTES):''; 
                 $strDesc    = ($_SESSION['lang']=='O' && $row['vchDescriptionO']!='')?htmlspecialchars_decode($row['vchDescriptionO'], ENT_QUOTES):$strDescE;
            
                ?>
                        <div class="item">
                            <img src="<?php echo $strImage;?>" alt="philosophy" class="img-fluid">
                            <div class="overlay__section">
                                <span class="overlay__tag"><i class="fa fa-book"></i> <?php echo 'Our Vision';?></span>
                                <span class="overlay__text"><?php echo $strTagline;?></span>
                            </div> 
                        </div>
                    <?php $ctr++;}?>     
                    </div>
                 </div>              
             </div>
             <div class="page__content <?php echo $odiaClass;?>">
                <?php echo stripslashes($strDesc);?>
             </div>
        <hr class="m-4 mb-md-5">
        </div> 
      <?php }else{;?>
             <div class="row"> <div class="col-md-12 col-sm-12 noRecord <?php echo $strLangCls; ?>" align="center"><?php echo $strNoRecordlbl; ?></div></div>
              
              
            <?php }?>
            
            
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
