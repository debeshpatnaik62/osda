<?php
  /*plugin*/
/*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 4rd Dec 2018
Author : MRD
*/ ?>

<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?>
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/journey-so-far.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/lightGallery2.css">

<!--start:: contarea-->

  <section class="container contarea">
      <div class="row timelines">
          <div class="col-12" id="accord">
            <?php 
            $prevYear='';
            $prevMonth='';
           if($intTotalRec>0){
               $recordCount=0;
              while($row=$totalResult->fetch_array()){
                 
                  $activeClass=($recordCount==0)?'show':'';
                  $activeIcon=($recordCount==0)?'<i class="fa fa-minus"></i>':'<i class="fa fa-plus"></i>';
                  $recordCount++;
                  $currYear= date('Y',strtotime($row['DTM_PUBLISHDATE']));
                  $currMonthNo=date('n',strtotime($row['DTM_PUBLISHDATE']));
                  $currMonth=date('M',strtotime($row['DTM_PUBLISHDATE']));
                  
               if($prevYear!=$currYear){
                      $prevMonth='';
                      
                   
                  if($prevYear!='') {   
              ?>
              
                  </div></div></div>
              <?php } ?> 
              <div class="timeline">
                  <span class="timeline__year collapsed <?php echo $strNumLangCls;?>" data-target="#accordBox<?php echo $currYear;?>">
					
					  
					  <strong class="plus-minus"><?php echo $activeIcon;?></strong>  
					  <br><?php echo $currYear;?></span>
                  <div class="timeline__container collapse <?php echo $activeClass;?>" data-parent="#accord" id="accordBox<?php echo $currYear;?>">
           
            <?php } ?>       
                  <?php
                      if($prevMonth!=$currMonth){
                           if($prevMonth!='') {      
                      ?>
                           </div>
                       <?php }?> 
                  
                      <div class="timeline__items">
                          <span class="timeline__month <?php $strLangCls;?>"><?php echo ($_SESSION['lang'] == 'O')?$odiaMonthAry[$currMonthNo-1]:$currMonth;?></span>
                     <?php }?>   
                          
                          <div class="timeline__item">
                               <?php
                                  $imageUrl=($row['VCH_IMAGE']!='')?'<div class="timeline__media"><a href='.APP_URL.'uploadDocuments/Timeline/'.$row['VCH_IMAGE'].' title="'.$row['VCH_IMAGE'].'"> <img src='.APP_URL.'uploadDocuments/Timeline/'.$row['VCH_IMAGE'].' alt="'.$row['VCH_IMAGE'].'" /></a></div>':'';
                                  $descClass = ($_SESSION['lang']=='O' && $row['VCH_DESCRIPTION_O']!='')?'odia':'';
                                  echo $imageUrl;
                                  ?>
                              <div class="timeline__accord timeline__less <?php echo $descClass;?>">
                                  <?php
                                  $desc      = ($row['VCH_DESCRIPTION_O']!='' && $_SESSION['lang']=='O' )?htmlspecialchars_decode($row['VCH_DESCRIPTION_O'], ENT_QUOTES):htmlspecialchars_decode(stripslashes($row['VCH_DESCRIPTION']), ENT_QUOTES); 
                                  $countDesc=($row['VCH_DESCRIPTION_O']!='' && $_SESSION['lang']=='O' )?820:280;
                                           ?>
                                  <?php echo $desc;?>
                              </div>
                             
                            <div class="clearfix"></div>
                           </div>
                      
                      <?php //}else{?>
                      
                    

         
              <?php
                  $prevMonth=$currMonth;
                  $prevYear= $currYear;
                  
                           } }else{?>
              <div class="row"> <div class="col-md-12 col-sm-12 noRecord <?php echo $strLangCls; ?>" align="center"><?php echo $strNoRecordlbl; ?></div></div>
              
              
            <?php }?>
              

          </div>
      </div>

     
  </section>

    <!--end:: contarea-->



    <!--start::Footer-->
    <?php include 'include/footer.php' ?>
    <script src="<?php echo SITE_URL; ?>js/picturefill.min.js"></script>
    <script src="<?php echo SITE_URL; ?>js/lightgallery.min.js"></script>
    <script>
      $('.timeline__item').lightGallery({
          selector: '.timeline__media a'
      });
    </script>

    <script>
        $('.timeline__item .handle').click(function() {
            $(this).parents('.timeline__item').find('.timeline__accord').toggleClass('timeline__less');
            $(this).parents('.timeline__item').find('.fa').toggleClass('fa-chevron-down fa-chevron-up');
            if ($(this).parents('.timeline__item').find('a.handle').text() == '<?php echo $strReadMorelbl;?>') {
                $(this).parents('.timeline__item').find('a.handle').addClass('less');
                $(this).parents('.timeline__item').find('a.handle').html('<?php echo $strReadLesslbl;?>');
            }
            else{
                $(this).parents('.timeline__item').find('a.handle').removeClass('less').addClass('more');
                $(this).parents('.timeline__item').find('a.handle').html('<?php echo $strReadMorelbl;?>');
                $(this).parents('.timeline__item').find('a.handle').html('<?php echo $strReadLesslbl;?>');
            }
        });
        
        /*add plus minus icon*/

//        $('.timeline__year').each(function () {
//            if ($(this).closest('div').find('.timeline__container').hasClass('show') == true) {
//                $(this).find('strong .plus-minus').html('<i class="fa fa-plus"></i>');
//            } else {
//                 $(this).find('strong .plus-minus').html('<i class="fa fa-minus"></i>');
//            }
//        });

        $('.timeline__year').on('click',function () {
			var targetId = $(this).data('target');
			$(targetId).toggleClass('show');
//            $('i.fa-minus-circle').hide();
//            $('i.fa-plus-circle').show();
            if ($(this).next('.timeline__container').hasClass('show') == true) {
                $('.plus-minus').html('<i class="fa fa-plus"></i>');
                $(this).find('.plus-minus').html('<i class="fa fa-minus"></i>');
//                $(this).find('i.fa-minus-circle').hide();
//                $(this).find('i.fa-plus-circle').show();
            } else {
				$(this).find('.plus-minus').html('<i class="fa fa-plus"></i>');
//                $(this).find('i.fa-minus-circle').show();
//                $(this).find('i.fa-plus-circle').hide();
            }

        });

    </script>
</body>
</html>
