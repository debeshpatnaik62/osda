<?php
/*plugin*/
 /* ================================================
    File Name         	  	: profile-details.php
    Description		  	: This is to view the institute profile details 
    Date Created		: 
    Created By		  	: MANAS RANJAN DAS
    Developed by      : Ashis kumar Patra
    Developed on      : 26-Dec-2018	
    Update History		:
    <Updated by>				<Updated On>		<Remarks>
      
 ==================================================*/
 $strPageFeatureimg        = ($strPageFeatureimg!='')?$strPageFeatureimg:SITE_URL.'images/banner/institute-profile-banner.jpg';
 $strInstutename           = ($_SESSION['lang']=='O' && $instresult['vchInstituteNameO']!='')?$instresult['vchInstituteNameO']:htmlspecialchars_decode($instresult['vchInstituteName'],ENT_QUOTES);
 $strcls                   = ($_SESSION['lang']=='O' && $instresult['vchInstituteNameO']!='')?'odia':'';

 $strPageTtlcls            = $strLangCls;
 $strPageTitle             = $strProfilelbl;
?>

<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?>
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/profile-details.css">

<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/lightGallery.css">

<script src="<?php echo SITE_URL;?>js/wow.min.js"></script>
<script src="<?php echo SITE_URL;?>js/jquery.fancybox.pack.js"></script>



<!--start:: contarea-->

  <section class="container contarea">
      <div class="row">
          <div class="col-12 col-lg-6">
            <h2 class="<?php echo ($_SESSION['lang']=='O' && $instresult['vchInstituteNameO']!='')?'odia':''; ?>"><img src="<?php echo SITE_URL;?>images/institute-icon.png" class="img-fluid centre-img mb-4 mb-lg-3 "> <?php echo ($_SESSION['lang']=='O' && $instresult['vchInstituteNameO']!='')?$instresult['vchInstituteNameO']:htmlspecialchars_decode($instresult['vchInstituteName'],ENT_QUOTES); ?></h2>
           <p class="<?php echo ($_SESSION['lang']=='O' && $instresult['vchDescriptionO']!='')?'odia':''; ?>"><?php echo ($_SESSION['lang']=='O' && $instresult['vchDescriptionO']!='')?$instresult['vchDescriptionO']:htmlspecialchars_decode($instresult['vchDescriptionE'],ENT_QUOTES); ?> </p>

            <div class="row mt-4 position-bottom">
              <div class="col-12 col-sm-6 mt-3">
                <div class="centre-details">
                  <div class="centre__icon">
                    <img src="<?php echo SITE_URL;?>images/year-of-establishment.png">
                  </div>
                  <div class="centre__attr">
                    <span class="<?php echo $strLangCls; ?>"><?php echo $strYearEstlbl; ?> </span>
                   <span class="<?php echo $strNumLangCls; ?>"><?php echo ($instresult['intEstYear']>0)?$instresult['intEstYear']:'--';?></span>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 mt-3">
                <div class="centre-details">
                  <div class="centre__icon">
                    <img src="<?php echo SITE_URL;?>images/Principal.png">
                  </div>
                  <div class="centre__attr">
                    <span class="<?php echo $strLangCls; ?>"><?php echo $strPrinciNamelbl; ?></span>
                    <span class="<?php echo ($_SESSION['lang']=='O' && $instresult['vchPrincipalNameO']!='')?'odia':''; ?>"><?php echo ($_SESSION['lang']=='O' && $instresult['vchPrincipalNameO']!='')?$instresult['vchPrincipalNameO']:htmlspecialchars_decode($instresult['vchPrincipalName'],ENT_QUOTES); ?> </span>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 mt-3">
                <div class="centre-details">
                  <div class="centre__icon">
                    <img src="<?php echo SITE_URL;?>images/Institute-Type.png">
                  </div>
                  <div class="centre__attr">
                    <span class="<?php echo $strLangCls; ?>"><?php echo $strInstTypelbl; ?> </span>
                    <span class="<?php echo $strLangCls; ?>"> <?php  echo ($instresult['tinInstituteType']==1)?$govermentlbl:'Private';?></span>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 mt-3">
                <div class="centre-details">
                  <div class="centre__icon">
                    <img src="<?php echo SITE_URL;?>images/District.png">
                  </div>
                  <div class="centre__attr">
                    <span class="<?php echo $strLangCls; ?>"> <?php echo $strDistrictlbl; ?></span>
                  <span class="<?php echo ($_SESSION['lang']=='O' && $instresult['vchDistrictnameO']!='')?'odia':''; ?>"><?php echo ($_SESSION['lang']=='O' && $instresult['vchDistrictnameO']!='')?$instresult['vchDistrictnameO']:htmlspecialchars_decode($instresult['vchDistrictname'],ENT_QUOTES); ?> </span> 
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6">
          
          
             <div class="profiledetails">
                    <?php
                
                    if($galresult->num_rows >0 || $instresult['vchImage']!=''){
                        
                      ?>
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
<!--
				  <ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				  </ol>
-->
				  <div class="carousel-inner">
                                       
                                       <?php $ctr=0; if($instresult['vchImage']!=''){   $ctr++; ?>
                                        <div class="carousel-item active">
					  <img class="d-block w-100 <?php echo $strCaptioncls ?>" src="<?php echo APP_URL ?>uploadDocuments/institute/<?php echo $instresult['vchImage'];?>" alt="<?php echo htmlspecialchars_decode($instresult['vchInstituteName'],ENT_QUOTES) ; ?>">
					</div>
                                        <?php } ?>
                                        <?php
                                       
                                        while ($galrow = mysqli_fetch_array($galresult)) {
                            
                                                $strCaption     = ($_SESSION['lang']=='O' && $galrow['vchCaptionO']!='')?$galrow['vchCaptionO']:htmlspecialchars_decode($galrow['vchCaptionE'],ENT_QUOTES);
                                                $strCaptioncls  = ($_SESSION['lang']=='O' && $galrow['vchCaptionO']!='')?'odia':'';
                                                 
                                                ?>
                                        <div class="carousel-item <?php echo ($ctr<1)?'active':'';?>">
					  <img class="d-block w-100 <?php echo $strCaptioncls ?>" src="<?php echo APP_URL ?>uploadDocuments/instGallery/<?php echo $galrow['vchImage'];?>" alt="<?php echo $strCaption ?>">
					</div>
					
                                         <?php  $ctr++; } ?>
				  </div>

				  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				  </a>
				</div>
                <?php }?>
          
             </div>
          
          
          
          
<!--
                <?php if($instresult['vchImage']!=''){  ?>
                  <div class="institute-img">
                    <img class="img-fluid" src="<?php echo APP_URL ?>uploadDocuments/institute/<?php echo $instresult['vchImage'];?>" alt="<?php echo htmlspecialchars_decode($instresult['vchInstituteName'],ENT_QUOTES) ; ?>" title="<?php echo htmlspecialchars_decode($instresult['vchInstituteName'],ENT_QUOTES) ; ?>">
                  </div>
                  <?php } ?>
-->
          </div>
      </div>
      <hr class="mb-4 mt-5">
      <div class="row">
        <div class="col-12">
          <h3 class="text-center mb-sm-0 <?php echo $strLangCls; ?>"><?php echo $strContactInfolbl; ?></h3>
          <span class="secondary-text d-block mb-3 text-center"><?php echo $strContactDetaillbl; ?></span>
        </div>
        <div class="col-12 col-sm-6 col-md-3 contact-details">
          <img class="mb-2" src="<?php echo SITE_URL;?>images/Call.png">
          <h4 class="<?php echo $strLangCls; ?>"><?php echo $strCallus; ?></h4>
          <?php 
          if($instresult['vchMobileNo']!=''){
              echo ' <p class="'.$strNumLangCls.'">'.$instresult['vchMobileNo'].'</p>';
          }
          if($instresult['vchPhoneno']!=''){
                   echo  '<p class="'.$strNumLangCls.'">'.$instresult['vchPhoneno'].'</p>';
             
          } 
          ?>
        </div>
        <div class="col-12 col-sm-6 col-md-3 contact-details">
          <img class="mb-2" src="<?php echo SITE_URL;?>images/Message.png">
          <h4 <?php echo $strLangCls; ?>><?php echo $strSendMessage; ?></h4>
          <a href="mailto:<?php echo $instresult['vchEmailId']; ?>?Subject=Odisha Skill Development Authority " class="screenReader"><?php echo ($instresult['vchEmailId']!='')?$instresult['vchEmailId']:'--';?></a>
        </div>
        <div class="col-12 col-sm-6 col-md-3 contact-details">
          <img class="mb-2" src="<?php echo SITE_URL;?>images/Location.png">
          <h4 <?php echo $strLangCls; ?>><?php echo $strOurLocation; ?></h4>
          <p class="<?php echo ($_SESSION['lang']=='O' && $instresult['txtAddressO']!='')?'odia':''; ?>"><?php echo ($_SESSION['lang']=='O' && $instresult['txtAddressO']!='')?$instresult['txtAddressO']:htmlspecialchars_decode($instresult['vchAddress'],ENT_QUOTES); ?></p>
          
        </div>
        <div class="col-12 col-sm-6 col-md-3 contact-details">
          <img class="mb-2" src="<?php echo SITE_URL;?>images/Website.png">
          <h4 class="<?php echo $strLangCls; ?>"><?php echo $strWebsitelbl; ?></h4>
                          <?php echo ($instresult['vchWebsite']!='')?'<a href="'.$instresult['vchWebsite'].'" target="_blank">'.$instresult['vchWebsite'].'</a>':'--';?>
            
        </div>
      </div>
 <?php
             if ($result->num_rows > 0) {?>

      <div class="row" id="instCoursesec">
        <div class="col-12"><h3 class="text-center mt-5 mb-4 <?php echo $strLangCls; ?>"><?php echo $strCourseDetailslbl; ?></h3></div>
        <div class="col-12">
          <div class="table-responsive">
            <table class="table table-bordered table-striped">
            <thead class="bg-dark text-light">
              <tr>
                <th width="30%" class="<?php echo $strLangCls; ?>"><?php echo $strCourseNamelbl; ?></th>
                <th width="30%" class="<?php echo $strLangCls; ?>"><?php echo $strDurationlbl; ?></th>
                <th width="20%" class="<?php echo $strLangCls; ?>"><?php echo $strSeatCntlbl; ?></th>
                <th width="20%" class="<?php echo $strLangCls; ?>"><?php echo $strEligibilitylbl; ?></th>
              </tr>
            </thead>
            <tbody> 
              <?php
              while ($courserow = $result->fetch_array()) {
                    $intCourseType  = $courserow['intCourseType'];
                    if($intCourseType==12)
                    {
                      $courseType = '(Fresh)';
                      $courseType1 = '(&#2859;&#2893;&#2864;&#2887;&#2870;)';
                    }
                    else if($intCourseType==13)
                    {
                      $courseType  = '(Lateral Entry)';
                      $courseType1 = '(&#2866;&#2878;&#2847;&#2887;&#2864;&#2878;&#2866; &#2831;&#2851;&#2893;&#2847;&#2893;&#2864;&#2879;)';
                    }
                    else
                    {
                      $courseType  ='';
                      $courseType1 = '';
                    }
              ?>
                    <tr>
                      <td class="<?php echo ($_SESSION['lang']=='O' && $courserow['vchCourseNameO']!='')?'odia':''; ?>">
                          <!-- <a href="javascript:void(0);" onclick="redirectToCourse('<?php //echo $courserow['vchCourseNameE'];?>');" > -->
                              <?php echo ($_SESSION['lang']=='O' && $courserow['vchCourseNameO']!='')?$courserow['vchCourseNameO'].' '.$courseType1:htmlspecialchars_decode($courserow['vchCourseNameE'],ENT_QUOTES).' '.$courseType; ?>
                          <!--</a>-->
                      </td>
                      <?php
                        $strMonthVallbl              = ($courserow["intDuration"]>0)?'<span class="'.$strNumLangCls.'">'.floatval($courserow["intDuration"]).'</span> '.$strMonthlbl:$strNALevel;
                   
                        $strMonthVallblE              = ($courserow["intDuration"]>0 && $_SESSION['lang']!='O')?' in '.floatval($courserow["intDuration"]).' '.$strMonthlbl:'';
                        $strMonthVallblO              = ($courserow["intDuration"]>0 && $_SESSION['lang']=='O')?'<span class="'.$strNumLangCls.'">'.floatval($courserow["intDuration"]).'</span> '.$strMonthInlbl:'';

                        if($_SESSION['lang']=='O'){
                          $strDurationText     = ($courserow["decDurationHr"]>0)?$strMonthVallblO.' <span class="'.$strNumLangCls.'">'.floatval($courserow["decDurationHr"]).'</span> '.$strHourlbl:$strMonthVallbl;  
                        }else{
                         $strDurationText       = ($courserow["decDurationHr"]>0)?floatval($courserow["decDurationHr"]).' '.$strHourlbl.$strMonthVallblE:$strMonthVallbl;
                        }
                      
                       if($courserow["intEligibility"]==0 || $courserow["intEligibility"]>=10 )
                         $strQual         = ($_SESSION['lang']=='O' && $courserow["vchQualificationO"]!='')?$courserow["vchQualificationO"]:htmlspecialchars_decode($courserow["vchQualification"],ENT_QUOTES);
                       else 
                         $strQual         = $strNonmatric;
                      ?>
                      
                      <td align="center" class=" <?php echo ($_SESSION['lang']=='O')?'odia':''; ?>"><?php  echo (($courserow['intDuration']>0 || $courserow["decDurationHr"]>0)?$strDurationText:$strNALevel);?></td>
                     <?php /*?> <td align="center" class=" <?php echo ($_SESSION['lang']=='O')?'odia':''; ?>"><?php  echo $courserow['intBatchNo'];?></td><?php */?>
                      <td align="center" class=" <?php echo $strNumLangCls; ?>"><?php  echo $courserow['intBatchStrength'];?></td>
                      <td align="center" class=" <?php echo ($_SESSION['lang']=='O' && $courserow['vchQualificationO']!='')?'odia':''; ?>">
                          <?php echo $strQual; ?>
                      </td>
                    </tr>
                    <?php } ?>
                                    </tbody>
              </table>
              <input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno; ?>" />
                <input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno; ?>" />
                <input name="hdn_IsPaging" id="hdn_IsPaging" type="hidden" value="<?php echo $isPaging; ?>" />
          </div>
            
        </div>
      </div>
        <?php
                } else{ 
              ?>
                             <div class="row"> <div class="col-md-12 col-sm-12 noRecord" align="center">No course detail available</div></div>
              <?php } ?>
              <?php if ($result->num_rows > 0) { ?>
              <div class="row noPrint">
                <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                <div class="col-xs-12"> 
                  <div class="dataTables_paginate paging_bootstrap">
                    <ul class="pagination pull-right">
                      <?php echo $objInstituteCrs->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                    </ul>
                  </div>
                </div>
                <?php } ?>
              </div>
              <?php } ?>
              
              
              
                     	
        					 

     
              
<!--
        <div class="row">
          <div class="col-sm-12">
        	<h3 class="text-center mt-5 mb-4 ">Our Gallery</h3>
        	
				
				<div class="storypersons">
				  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
					  <div class="carousel-item active">
						<div class="light-gallery">
								 <div class="row">
								  <div class="col-lg-2 col-md-2 col-sm-12">
									<div class="galleryNew" data-src="<?php echo SITE_URL;?>images/Abinash_Swain.jpg"> <a class="GalleryImg fancybox" href="<?php echo SITE_URL;?>images/Abinash_Swain.jpg" data-fancybox-group="gallery" title=""> <img src="<?php echo SITE_URL;?>images/Abinash_Swain.jpg" title="Principal Secretary, Industries Department addressing ..." alt="Principal Secretary, Industries Department addressing ...">
									  <div class="multi_hover"> <i class="fa fa-search"></i> </div>
									  </a>
									</div>
								  </div>
								  <div class="col-lg-2 col-md-2 col-sm-12">
									<div class="galleryNew" data-src="<?php echo SITE_URL;?>images/Aditya_Narayan_Sahoo.jpg"> <a class="GalleryImg fancybox" href="<?php echo SITE_URL;?>images/Aditya_Narayan_Sahoo.jpg" data-fancybox-group="gallery" title=""> <img src="<?php echo SITE_URL;?>images/Aditya_Narayan_Sahoo.jpg" title="Principal Secretary, Industries Department addressing ..." alt="Principal Secretary, Industries Department addressing ...">
									  <div class="multi_hover"> <i class="fa fa-search"></i> </div>
									  </a>
									</div>
								  </div>
								  <div class="col-lg-2 col-md-2 col-sm-12 ">
									<div class="galleryNew" data-src="<?php echo SITE_URL;?>images/Anup_Kumar_Bharati.jpg">
								   <a class="GalleryImg fancybox" href="<?php echo SITE_URL;?>images/Anup_Kumar_Bharati.jpg" data-fancybox-group="gallery" title=""> 
								   <img src="<?php echo SITE_URL;?>images/Anup_Kumar_Bharati.jpg" title="Principal Secretary, Industries Department addressing ..." alt="Principal Secretary, Industries Department addressing ...">
									  <div class="multi_hover"> <i class="fa fa-search"></i> </div>
									  </a>
									</div>
								  </div>
								  <div class="col-lg-2 col-md-2 col-sm-12">
									<div class="galleryNew" data-src="<?php echo SITE_URL;?>images/Abinash_Swain.jpg"> <a class="GalleryImg fancybox" href="<?php echo SITE_URL;?>images/Abinash_Swain.jpg" data-fancybox-group="gallery" title=""> <img src="<?php echo SITE_URL;?>images/Abinash_Swain.jpg" title="Principal Secretary, Industries Department addressing ..." alt="Principal Secretary, Industries Department addressing ...">
									  <div class="multi_hover"> <i class="fa fa-search"></i> </div>
									  </a>
									</div>
								  </div>
								  <div class="col-lg-2 col-md-2 col-sm-12">
									<div class="galleryNew" data-src="<?php echo SITE_URL;?>images/Aditya_Narayan_Sahoo.jpg"> <a class="GalleryImg fancybox" href="<?php echo SITE_URL;?>images/Aditya_Narayan_Sahoo.jpg" data-fancybox-group="gallery" title=""> <img src="<?php echo SITE_URL;?>images/Aditya_Narayan_Sahoo.jpg" title="Principal Secretary, Industries Department addressing ..." alt="Principal Secretary, Industries Department addressing ...">
									  <div class="multi_hover"> <i class="fa fa-search"></i> </div>
									  </a>
									</div>
								  </div>
								  <div class="col-lg-2 col-md-2 col-sm-12 ">
									<div class="galleryNew" data-src="<?php echo SITE_URL;?>images/Anup_Kumar_Bharati.jpg">
								   <a class="GalleryImg fancybox" href="<?php echo SITE_URL;?>images/Anup_Kumar_Bharati.jpg" data-fancybox-group="gallery" title=""> 
								   <img src="<?php echo SITE_URL;?>images/Anup_Kumar_Bharati.jpg" title="Principal Secretary, Industries Department addressing ..." alt="Principal Secretary, Industries Department addressing ...">
									  <div class="multi_hover"> <i class="fa fa-search"></i> </div>
									  </a>
									</div>
								  </div>

								  </div>
								</div>
								
					  </div>
					  <div class="carousel-item">
						<div class="light-gallery">
								 <div class="row">
								  <div class="col-lg-2 col-md-2 col-sm-12">
									<div class="galleryNew" data-src="<?php echo SITE_URL;?>images/Abinash_Swain.jpg"> <a class="GalleryImg fancybox" href="<?php echo SITE_URL;?>images/Abinash_Swain.jpg" data-fancybox-group="gallery" title=""> <img src="<?php echo SITE_URL;?>images/Abinash_Swain.jpg" title="Principal Secretary, Industries Department addressing ..." alt="Principal Secretary, Industries Department addressing ...">
									  <div class="multi_hover"> <i class="fa fa-search"></i> </div>
									  </a>
									</div>
								  </div>
								  <div class="col-lg-2 col-md-2 col-sm-12">
									<div class="galleryNew" data-src="<?php echo SITE_URL;?>images/Aditya_Narayan_Sahoo.jpg"> <a class="GalleryImg fancybox" href="<?php echo SITE_URL;?>images/Aditya_Narayan_Sahoo.jpg" data-fancybox-group="gallery" title=""> <img src="<?php echo SITE_URL;?>images/Aditya_Narayan_Sahoo.jpg" title="Principal Secretary, Industries Department addressing ..." alt="Principal Secretary, Industries Department addressing ...">
									  <div class="multi_hover"> <i class="fa fa-search"></i> </div>
									  </a>
									</div>
								  </div>
								  <div class="col-lg-2 col-md-2 col-sm-12 ">
									<div class="galleryNew" data-src="<?php echo SITE_URL;?>images/Anup_Kumar_Bharati.jpg">
								   <a class="GalleryImg fancybox" href="<?php echo SITE_URL;?>images/Anup_Kumar_Bharati.jpg" data-fancybox-group="gallery" title=""> 
								   <img src="<?php echo SITE_URL;?>images/Anup_Kumar_Bharati.jpg" title="Principal Secretary, Industries Department addressing ..." alt="Principal Secretary, Industries Department addressing ...">
									  <div class="multi_hover"> <i class="fa fa-search"></i> </div>
									  </a>
									</div>
								  </div>
								  <div class="col-lg-2 col-md-2 col-sm-12">
									<div class="galleryNew" data-src="<?php echo SITE_URL;?>images/Abinash_Swain.jpg"> <a class="GalleryImg fancybox" href="<?php echo SITE_URL;?>images/Abinash_Swain.jpg" data-fancybox-group="gallery" title=""> <img src="<?php echo SITE_URL;?>images/Abinash_Swain.jpg" title="Principal Secretary, Industries Department addressing ..." alt="Principal Secretary, Industries Department addressing ...">
									  <div class="multi_hover"> <i class="fa fa-search"></i> </div>
									  </a>
									</div>
								  </div>
								  <div class="col-lg-2 col-md-2 col-sm-12">
									<div class="galleryNew" data-src="<?php echo SITE_URL;?>images/Aditya_Narayan_Sahoo.jpg"> <a class="GalleryImg fancybox" href="<?php echo SITE_URL;?>images/Aditya_Narayan_Sahoo.jpg" data-fancybox-group="gallery" title=""> <img src="<?php echo SITE_URL;?>images/Aditya_Narayan_Sahoo.jpg" title="Principal Secretary, Industries Department addressing ..." alt="Principal Secretary, Industries Department addressing ...">
									  <div class="multi_hover"> <i class="fa fa-search"></i> </div>
									  </a>
									</div>
								  </div>
								  <div class="col-lg-2 col-md-2 col-sm-12 ">
									<div class="galleryNew" data-src="<?php echo SITE_URL;?>images/Anup_Kumar_Bharati.jpg">
								   <a class="GalleryImg fancybox" href="<?php echo SITE_URL;?>images/Anup_Kumar_Bharati.jpg" data-fancybox-group="gallery" title=""> 
								   <img src="<?php echo SITE_URL;?>images/Anup_Kumar_Bharati.jpg" title="Principal Secretary, Industries Department addressing ..." alt="Principal Secretary, Industries Department addressing ...">
									  <div class="multi_hover"> <i class="fa fa-search"></i> </div>
									  </a>
									</div>
								  </div>

								  </div>
								</div>
					  </div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"><strong><i class="fa fa-angle-left" aria-hidden="true"></i></strong></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"><strong><i class="fa fa-angle-right" aria-hidden="true"></i></strong></span> <span class="sr-only">Next</span> </a> </div>
				</div>
        	
			   <div class="light-gallery">
				 <div class="row">
				  <div class="col-lg-2 col-md-2 col-sm-12">
					<div class="galleryNew" data-src="<?php //echo SITE_URL;?>images/Abinash_Swain.jpg"> <a class="GalleryImg fancybox" href="<?php //echo SITE_URL;?>images/Abinash_Swain.jpg" data-fancybox-group="gallery" title=""> <img src="<?php //echo SITE_URL;?>images/Abinash_Swain.jpg" title="Principal Secretary, Industries Department addressing ..." alt="Principal Secretary, Industries Department addressing ...">
					  <div class="multi_hover"> <i class="fa fa-search"></i> </div>
					  </a>
					</div>
				  </div>
				  <div class="col-lg-2 col-md-2 col-sm-12">
					<div class="galleryNew" data-src="<?php //echo SITE_URL;?>images/Aditya_Narayan_Sahoo.jpg"> <a class="GalleryImg fancybox" href="<?php //echo SITE_URL;?>images/Aditya_Narayan_Sahoo.jpg" data-fancybox-group="gallery" title=""> <img src="<?php //echo SITE_URL;?>images/Aditya_Narayan_Sahoo.jpg" title="Principal Secretary, Industries Department addressing ..." alt="Principal Secretary, Industries Department addressing ...">
					  <div class="multi_hover"> <i class="fa fa-search"></i> </div>
					  </a>
					</div>
				  </div>
				  <div class="col-lg-2 col-md-2 col-sm-12 ">
					<div class="galleryNew" data-src="<?php //echo SITE_URL;?>images/Anup_Kumar_Bharati.jpg">
				   <a class="GalleryImg fancybox" href="<?php //echo SITE_URL;?>images/Anup_Kumar_Bharati.jpg" data-fancybox-group="gallery" title=""> 
				   <img src="<?php //echo SITE_URL;?>images/Anup_Kumar_Bharati.jpg" title="Principal Secretary, Industries Department addressing ..." alt="Principal Secretary, Industries Department addressing ...">
					  <div class="multi_hover"> <i class="fa fa-search"></i> </div>
					  </a>
					</div>
				  </div>
				  <div class="col-lg-2 col-md-2 col-sm-12">
					<div class="galleryNew" data-src="<?php //echo SITE_URL;?>images/Abinash_Swain.jpg"> <a class="GalleryImg fancybox" href="<?php echo SITE_URL;?>images/Abinash_Swain.jpg" data-fancybox-group="gallery" title=""> <img src="<?php echo SITE_URL;?>images/Abinash_Swain.jpg" title="Principal Secretary, Industries Department addressing ..." alt="Principal Secretary, Industries Department addressing ...">
					  <div class="multi_hover"> <i class="fa fa-search"></i> </div>
					  </a>
					</div>
				  </div>
				  <div class="col-lg-2 col-md-2 col-sm-12">
					<div class="galleryNew" data-src="<?php //echo SITE_URL;?>images/Aditya_Narayan_Sahoo.jpg"> <a class="GalleryImg fancybox" href="<?php //echo SITE_URL;?>images/Aditya_Narayan_Sahoo.jpg" data-fancybox-group="gallery" title=""> <img src="<?php echo SITE_URL;?>images/Aditya_Narayan_Sahoo.jpg" title="Principal Secretary, Industries Department addressing ..." alt="Principal Secretary, Industries Department addressing ...">
					  <div class="multi_hover"> <i class="fa fa-search"></i> </div>
					  </a>
					</div>
				  </div>
				  <div class="col-lg-2 col-md-2 col-sm-12 ">
					<div class="galleryNew" data-src="<?php //echo SITE_URL;?>images/Anup_Kumar_Bharati.jpg">
				   <a class="GalleryImg fancybox" href="<?php //echo SITE_URL;?>images/Anup_Kumar_Bharati.jpg" data-fancybox-group="gallery" title=""> 
				   <img src="<?php //echo SITE_URL;?>images/Anup_Kumar_Bharati.jpg" title="Principal Secretary, Industries Department addressing ..." alt="Principal Secretary, Industries Department addressing ...">
					  <div class="multi_hover"> <i class="fa fa-search"></i> </div>
					  </a>
					</div>
				  </div>

				  </div>
				</div>
            
             </div>  
        </div>      
-->
  </section>

    <!--end:: contarea-->

    <!--start::Footer-->
    <?php include 'include/footer.php' ?>
 
</body>
</html>






<script>
     $(document).ready(function () {
	//=== Wow Initialization ===// 	  
	 $('.windowLoader').show().fadeOut(2000);
	 new WOW().init();	
	//=== Wow Initialization ===// 	  
      //===Tooltip===//  
      $('[data-toggle="tooltip"]').tooltip();   
		 
	   $('.fancybox').fancybox();	 
      });
</script>

























