<?php 
/*plugin*/
/*
  Website Name : Odisha Skill Developement Authority (OSDA)
  Date Created : 4rd Dec 2018
  Author : Rumana Parween
 */ ?>
<!doctype html>
<html lang="en">
 <?php include 'include/header.php' ?>
<link rel="stylesheet" href="<?php echo SITE_URL; ?>css/inner.css" /> 

<!--start:: contarea-->


	<section class="container contarea">
 
      <div class="gallerysec">
      
           <?php if($result->num_rows >0) { ?>
      <div class="row">
          <?php 
          $ctr=0;
          while($photoRow = $result->fetch_array()){    
                    
              if($intTotalRec>0  && $ctr<1){
                       $catID           = $photoRow['INT_CATEGORY_ID'];
                       $catNameE        = $photoRow['VCH_CATEGORY_NAME'];
                       $catNameO        = $photoRow['VCH_CATEGORY_NAME_O'];
                       $catName         = ($_SESSION['lang'] == 'O' && $catNameO != '')?$catNameO:$catNameE;
                       $catNameCls      = ($_SESSION['lang'] == 'O' && $catNameO != '')?'odia':'';
                       $image           = APP_URL . "uploadDocuments/gallery/" . $photoRow['VCH_LARGE_IMAGE'];
                      
                       $counter         = ($_SESSION['lang']=='O' && $photoRow['VCH_DESCRIPTION_O']!='')?180:60;
                       $strDescription  = ($_SESSION['lang']=='O' && $photoRow['VCH_DESCRIPTION_O']!='')?$photoRow['VCH_DESCRIPTION_O']:htmlspecialchars_decode($photoRow['VCH_DESCRIPTION'], ENT_QUOTES);  
                       $strDescriptionCls =($_SESSION['lang']=='O' && $photoRow['VCH_DESCRIPTION_O']!='')?'odia':'';
                       
                       
                       $strVideolbl1=($photoRow['totalVideos']==1)?$strVideolbl:$strVideolbl.'s';
                       $strPhotolbl1=($photoRow['totalPhotos']==1)?$strPhotolbl:$strPhotolbl.'s';
                       
                        $videoHTML = ($photoRow['totalVideos']>0)?'<i class="fa fa-video-camera" aria-hidden="true"></i>'.$photoRow['totalVideos']." ".$strVideolbl1:'';
                       $photoHTML = ($photoRow['totalPhotos']>0)?'<i class="fa fa-picture-o" aria-hidden="true"></i>'.$photoRow['totalPhotos']." ".$strPhotolbl1 :'';
                       
                     
                       
                        if($strDescription !=''){
                            $string = strip_tags($strDescription);
                            if (strlen($string) > $counter) {
                                // truncate string
                                $stringCut = substr($string, 0, $counter);
                                // make sure it ends in a word so assassinate doesn't become ass...
                                $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
                                 $strDescription = $string."...";
                            }
                            else
                             $strDescription = $string;
                           
                        }
         
                    ?>
          
		  <div class="col-lg-8">
			<div class="card bigpart">
			  <div class="hovereffect"> 
			  
			  <div class="imgparentbig">
			     <img class="img-fluid card-img-top" src="<?php echo $image; ?>" alt="<?php echo $catName; ?>" title="<?php echo $catName; ?>"/>
			  </div>
			  
				<div class="overlay">
<!--				  <p class="<?php echo $catNameCls;?>"><a href="<?php echo SITE_URL; ?>gallery-details/<?php echo $catID;  ?>"><?php echo $catName;?></a></p>-->
				  <br>
				  <p><a href="<?php echo SITE_URL; ?>gallery-details/<?php echo $catID;  ?>" class="viewbtn <?php echo $odiaClass;?>"><?php echo $strViewalbumlbl;?></a></p>
				</div>
			  </div>
			  <div class="card-body">
				<h3 class="<?php echo $catNameCls;?>"><?php echo $catName;?></h3>
				 <p class="card-text <?php echo $strDescriptionCls;?>"><?php echo $strDescription;?></p>
				<a href="<?php echo SITE_URL; ?>gallery-details/<?php echo $catID;  ?>" class="vdobtn <?php echo $strNumLangCls;?>"><?php echo $videoHTML;?>  </a> 
			<a href="<?php echo SITE_URL; ?>gallery-details/<?php echo $catID;  ?>" class="photosbtn <?php echo $strNumLangCls;?>"><?php echo ($videoHTML!='')?"&nbsp;&nbsp;". $photoHTML:$photoHTML;?>  </a> </div>
                        </div>
		  </div>
              <?php $ctr++;
              
              
          } }  ?> 
          <?php 
         
          if($intTotalRec>1){ ?>
          
           <div class="col-lg-4">
             <div class="row">
          <?php
              mysqli_data_seek($result, 1);
               $ctr=1;
               while($photoRow = $result->fetch_array()){ 
                     if($ctr<3){
                         
                       $catID           = $photoRow['INT_CATEGORY_ID'];
                       $catNameE        = $photoRow['VCH_CATEGORY_NAME'];
                       $catNameO        = $photoRow['VCH_CATEGORY_NAME_O'];
                       $catName         = ($_SESSION['lang'] == 'O' && $catNameO != '')?$catNameO:$catNameE;
                       $catNameCls      = ($_SESSION['lang'] == 'O' && $catNameO != '')?'odia':'';
                       $image           = APP_URL . "uploadDocuments/gallery/" . $photoRow['VCH_LARGE_IMAGE'];
                      
                       $counter         = ($_SESSION['lang']=='O' && $photoRow['VCH_DESCRIPTION_O']!='')?180:60;
                       $strDescription  = ($_SESSION['lang']=='O' && $photoRow['VCH_DESCRIPTION_O']!='')?$photoRow['VCH_DESCRIPTION_O']:htmlspecialchars_decode($photoRow['VCH_DESCRIPTION'], ENT_QUOTES);  
                       $strDescriptionCls  =($_SESSION['lang']=='O' && $photoRow['VCH_DESCRIPTION_O']!='')?'odia':''
                               ;
                       $strVideolbl2=($photoRow['totalVideos']==1)?$strVideolbl:$strVideolbl.'s';
                       $strPhotolbl2=($photoRow['totalPhotos']==1)?$strPhotolbl:$strPhotolbl.'s';
                       
                       $videoHTML = ($photoRow['totalVideos']>0)?'<i class="fa fa-video-camera" aria-hidden="true"></i>'.$photoRow['totalVideos']." ".$strVideolbl2:'';
                       $photoHTML = ($photoRow['totalPhotos']>0)?'<i class="fa fa-picture-o" aria-hidden="true"></i>'.$photoRow['totalPhotos']." ".$strPhotolbl2 :'';
                       
                    
                        if($strDescription !=''){
                            $string = strip_tags($strDescription);
                            if (strlen($string) > $counter) {
                                // truncate string
                                $stringCut = substr($string, 0, $counter);
                                // make sure it ends in a word so assassinate doesn't become ass...
                                $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
                                 $strDescription = $string."..";
                            }
                            else
                             $strDescription = $string;
                           
                        }  
                         
                     
                    ?>
		 
		   <div class="col-md-6 col-lg-12">
                        <div class="card">
			  <div class="hovereffect"> 
			  <div class="imgparent">
			     <img class="img-fluid card-img-top" src="<?php echo $image; ?>" alt="<?php echo $catName; ?>" title="<?php echo $catName; ?>"/>
			  </div>
				<div class="overlay">
<!--				  <p class="<?php echo $catNameCls;?>"><a href="<?php echo SITE_URL; ?>gallery-details/<?php echo $catID;  ?>"><?php echo $catName;?></a></p>-->
				  <br>
				  <p><a href="<?php echo SITE_URL; ?>gallery-details/<?php echo $catID;  ?>" class="viewbtn <?php echo $odiaClass;?>"><?php echo $strViewalbumlbl;?></a></p>
				</div>
			  </div>
			  <div class="card-body">
				<h3 class="<?php echo $catNameCls;?>"><?php echo $catName;?></h3>
				 <p class="card-text <?php echo $strDescriptionCls;?>"><?php echo $strDescription;?></p>
       

				<a href="<?php echo SITE_URL; ?>gallery-details/<?php echo $catID;  ?>" class="vdobtn <?php echo $strNumLangCls;?>"><?php echo $videoHTML;?>  </a> 

       
			<a href="<?php echo SITE_URL; ?>gallery-details/<?php echo $catID;  ?>" class="photosbtn <?php echo $strNumLangCls;?>"><?php echo ($videoHTML!='')?"&nbsp;&nbsp;". $photoHTML:$photoHTML;?>  </a> </div>
			</div>
		  
                    </div>
               <?php $ctr++;} }?>	 
			  
		  </div>
          <?php } ?>
       </div>
       </div>
           <?php }else{?>
<div class="noRecord <?php echo $strLangCls; ?>"><?php echo $strNorecordlbl; ?></div>
      	
   <?php } ?> 
       
       
   <?php if($intTotalRec>3){ ?>
     
     
      <div class="gallery-row">
      <div class="row">
          <?php   
          mysqli_data_seek($result, 3);
               $count=3;  
              while($photoRow = $result->fetch_array()){ 
                   $catID           = $photoRow['INT_CATEGORY_ID'];
                       $catNameE        = $photoRow['VCH_CATEGORY_NAME'];
                       $catNameO        = $photoRow['VCH_CATEGORY_NAME_O'];
                       $catName         = ($_SESSION['lang'] == 'O' && $catNameO != '')?$catNameO:$catNameE;
                       $catNameCls      = ($_SESSION['lang'] == 'O' && $catNameO != '')?'odia':'';
                       $image           = APP_URL . "uploadDocuments/gallery/" . $photoRow['VCH_LARGE_IMAGE'];
                      
                       $counter         = ($_SESSION['lang']=='O' && $photoRow['VCH_DESCRIPTION_O']!='')?180:80;
                       $strDescription  = ($_SESSION['lang']=='O' && $photoRow['VCH_DESCRIPTION_O']!='')?$photoRow['VCH_DESCRIPTION_O']:htmlspecialchars_decode($photoRow['VCH_DESCRIPTION'], ENT_QUOTES);  
                       $strDescriptionCls  =($_SESSION['lang']=='O' && $photoRow['VCH_DESCRIPTION_O']!='')?'odia':'';
                       $strVideolbl3=($photoRow['totalVideos']==1)?$strVideolbl:$strVideolbl.'s';
                       $strPhotolbl3=($photoRow['totalPhotos']==1)?$strPhotolbl:$strPhotolbl.'s';
                       $videoHTML = ($photoRow['totalVideos']>0)?'<i class="fa fa-video-camera" aria-hidden="true"></i>'.$photoRow['totalVideos']." ".$strVideolbl3:'';
                       $photoHTML = ($photoRow['totalPhotos']>0)?'<i class="fa fa-picture-o" aria-hidden="true"></i>'.$photoRow['totalPhotos']." ".$strPhotolbl3 :'';
                        if($strDescription !=''){
                            $string = strip_tags($strDescription);
                            if (strlen($string) > $counter) {
                                // truncate string
                                $stringCut = substr($string, 0, $counter);
                                // make sure it ends in a word so assassinate doesn't become ass...
                                $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
                                 $strDescription = $string."..";
                            }
                            else
                             $strDescription = $string;
                           
                        }  
         ?>    
<div class="col-sm-4">
			<div class="card">
			  <div class="hovereffect"> 
			  <div class="imgparent">
			     <img class="img-fluid card-img-top" src="<?php echo $image; ?>" alt="<?php echo $catName; ?>" title="<?php echo $catName; ?>"/>
			  </div>
				<div class="overlay">
<!--				  <p class="<?php echo $catNameCls;?>"><a href="<?php echo SITE_URL; ?>gallery-details/<?php echo $catID;  ?>"><?php echo $catName;?></a></p>-->
                                  <p><a href="<?php echo SITE_URL; ?>gallery-details/<?php echo $catID;  ?>" class="viewbtn <?php echo $odiaClass;?>"><?php echo $strViewalbumlbl;?></a></p>
				</div>
			  </div>
			  <div class="card-body">
				<h3 class="<?php echo $catNameCls;?>"><?php echo $catName;?></h3>
				 <p class="card-text <?php echo $strDescriptionCls;?>"><?php echo $strDescription;?></p>
				<a href="<?php echo SITE_URL; ?>gallery-details/<?php echo $catID;  ?>" class="vdobtn <?php echo $strNumLangCls;?>"><?php echo $videoHTML;?>  </a> 
			<a href="<?php echo SITE_URL; ?>gallery-details/<?php echo $catID;  ?>" class="photosbtn  <?php echo $strNumLangCls;?>"><?php echo ($videoHTML!='')?"&nbsp;&nbsp;". $photoHTML:$photoHTML;?>  </a> </div>
			</div>
		</div>	
			
	 <?php $count++; if ($count % 3 == 0 && $ctr < $intTotalRec) { ?>
                                    </div>
	   <div class="row">

	<?php
	} 

	} ?>

	   </div>
		  </div>
	   
	   

   <?php }?>
       
       
       
       
         </div>
       


	</section>


<!--end:: contarea-->



<!--start::Footer-->

<?php include 'include/footer.php' ?>


</body>
</html>
