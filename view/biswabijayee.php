<?php
/*plugin*/
/*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 5th Dec 2018
Author : MRD
*/ 

?>

<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/articles.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/jssocials.css" />
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/jssocials-theme-minima.css" />


<script src="<?php echo SITE_URL;?>/js/loadAjax.js" type="text/javascript"></script>
<script src="<?php echo SITE_URL;?>js/jssocials.min.js"></script>
<!--start:: contarea-->
<form name="frmOsda" id="frmOsda"  method="post" action="" enctype="multipart/form-data" autocomplete="off">
<section class="container contarea">
	          
  <div class="row">
          <div class="col-12">
         
                        <h3 class="inNews__headline <?php echo $headlineCls; ?>">
                            <?php echo $headline; ?>
                        </h3>
                        <div class="position-relative">
                            <div class="inNews__share">
                                <span class="inNews__share__handle"><i class="fa fa-share-alt"></i>
                                    <span class="inNews__share__icons sharing">
                                        <a href="javascript:void(0);" title="" class="twitter"><i class="fa fa-twitter"></i></a>
                                        <a href="javascript:void(0);" title="" class="fb"><i class="fa fa-facebook"></i></a>
                                        <a href="javascript:void(0);" title="" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                        <a href="javascript:void(0);" title="" class="pinterest"><i class="fa fa-pinterest"></i></a>
                                        <a href="javascript:void(0);" title="" class="whatsapp"><i class="fa fa-whatsapp"></i></a>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <span class="inNews__meta__date  <?php echo $dateClass; ?>"><i class="fa fa-calendar"></i> <?php echo $date; ?>   </span> 
                        <div class="inNews__desc <?php echo $desCls; ?>">
                            <p class="screenreader <?php echo $desCls; ?>"><?php echo $des; ?> </p>          
                        </div>
          </div>
    </div> 
 		
</section>
</form>

<!--end:: contarea-->



<!--start::Footer-->
<?php include 'include/footer.php' ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    
            $('.datepicker').datepicker({
                        autoclose: true,
                        todayHighlight: true,
                          uiLibrary: 'bootstrap4'
                    });
      
        $('.datepicker').on('click', function(e) {
                <?php if($_SESSION['lang']=='O'){ ?> 
                          $('.datepicker').addClass(' odianum');
                       
                  <?php }else{ ?>   
                       $('.datepicker').removeClass(' odianum');
               <?php } ?> 

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
</body>
</html>
