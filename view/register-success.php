<?php /*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 3rd Dec 2018
Author : MRD
*/ ?>

<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?><br/><br/><br/><br/><br/><br/><br/>
<link rel="stylesheet" type="text/css" href="css/content.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/jssocials.css" />
<script src="<?php echo SITE_URL;?>js/jssocials.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/jssocials-theme-minima.css" />
<style>
   .jssocials-share-logo {
    width: 1.5em;
    vertical-align: middle;
    font-size: 1.1em;
}</style>
<!--start:: contarea-->
	<section class="container">
     	<div class="contarea">
			<div class="printbox" id="printbox">
                            <h3 id="headingPrint" style="display:none" class="noPrint">ODISHA Skills 2022</h3>
					   <a href="javascript:void(0);" title="Print" onclick="printRegisterModal('headingPrint','printbox');" class="osda--btn printbtn noPrint"><i class="fa fa-print print-class" aria-hidden="true"></i></a>
                                <div class="row">
                                    <div class="clearfix"></div>
							 <div class="col-md-12 col-sm-12 text-center">
								  <img src="<?php echo SITE_URL; ?>images/logo-osc.png" alt="IndiaSkills" class="mb-4 mt-2 "/>
							  <h4 class="screenreader  <?php echo $strPageTtlcls; ?>"><?php //echo $strRegisterForlbl; ?></h4>

							 <p class="font-lgb screenreader noPrint <?php echo $strPageTtlcls; ?>"><?php echo $strPageSnippet; ?> </p>
							 </div>

						<div class="clear30"></div>                    
						<div class="col-md-12 col-sm-12 text-center">

							<h4 class="blueCol text-success  <?php echo $strPageTtlcls; ?>"> <?php echo $strThankyoulbl; ?></h4>
						   <div class="clear30"></div>    
							<!-- <p>Thank you <strong><?php echo $strFirstName;?></strong>, for registering at Odisha Skills 2021. Your Competition ID is <strong><?php echo $strAckid;?></strong>. All other important details will be communicated to you by email and SMS. Below are the details you provided us.</p> -->
							<?php if(!empty($strSecondCompId)) { ?>
							<p>Thank you <strong><?php echo $strSecondName . '('. $strSecondCompId.')'; ?> and  <?php echo $strFirstName .'('. $strFirstCompId.')' ;?></strong>, for registering at Odisha Skills 2022. All other important details will be communicated to you by email and SMS.</p>
							<?php } else {  ?>
							<p>Thank you <strong><?php echo $strFirstName . '('. $strFirstCompId.')' ;?></strong>, for registering at Odisha Skills 2022. All other important details will be communicated to you by email and SMS.</p>
							<?php } ?>
						   </div> 
						   
						       <div class="col-sm-12 text-center noPrint">   
						          <h3 class="mb-3">Follow Us On</h3> 
						          
						           <a href="https://twitter.com/skilled_odisha"  target="_blank" class="twitter--square"> <i class="fa fa-twitter"></i></a>
						           <a href="https://www.youtube.com/channel/UCY3rrB4FEg_ZNzfGvt5DSUw/videos?shelf_id=0&amp;view=0&amp;sort=dd" target="_blank" class="youtube--square"> <i class="fa fa-youtube"></i></a>
						           <a href="https://www.facebook.com/SkilledinOdisha-359419377823349/" target="_blank" class="fb--square"> <i class="fa fa-facebook"></i></a>
						          <div class="clearfix"></div>
						          
						          
						          <!-- <a href="javascript:void(0);" class="osda--btn mt-4 sharethis"> Share this</a> -->
						          <a href="<?php echo SITE_URL.'skill-competition';?>" class="osda--btn mt-4 sharethis">OK</a>
						          
						          <!--<div class="share sharing" data-heading="<?php echo $shareMsg; ?>" data-url="<?php echo $url; ?>">
									   <a href="#" class="twitter--square"> <i class="fa fa-twitter"></i></a>
									   <a href="#" class="pinterest--square"> <i class="fa fa-pinterest"></i></a>
									   <a href="#" class="fb--square"> <i class="fa fa-facebook"></i></a>
									   <a href="#" class="whatsapp--square"> <i class="fa fa-whatsapp"></i></a>
									   <a href="#" class="linkedin--square"> <i class="fa fa-linkedin"></i></a>
									   <a href="#" class="pinterest--square"> <i class="fa fa-google"></i></a>
						          </div> -->
						          
						          
						       
						       </div>   

					
						<div class="clear50"></div>


						<div class="clear50 hidden-xs hidden-1024"></div>
				</div>
			</div>
        
	  	</div>
	</section>


<!--end:: contarea-->



<!--start::Footer-->
<?php include 'include/footer.php' ?>
   
</body>
</html>



<script>
$(document).ready(function(){
  $(".sharethis").click(function(){
   $(".share").slideToggle();
   }); 
   
   $(".sharing").each(function() {
            $(this).jsSocials({ 
                url : $(this).data('url'),
                text: $(this).data('heading'),
                shares: [
                     { share: "twitter", via: "skilledinodisha" }, 
                    "facebook", "googleplus", "linkedin", "pinterest","whatsapp"
                ],
                showLabel: false,
                showCount: "inside",
                shareIn: "popup"
            });
        }); 
   
});
</script>






