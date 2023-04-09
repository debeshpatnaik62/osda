<?php /*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 5th Dec 2018
Author : MRD
*/ 

?>

<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?>
<link rel="stylesheet" type="text/css" href="css/in-news.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>

<script src="<?php echo SITE_URL;?>/js/loadAjax.js" type="text/javascript"></script>
<!--start:: contarea-->
<form name="frmOsda" id="frmOsda"  method="post" action="" enctype="multipart/form-data" autocomplete="off">
<section class="container contarea">
	<div class="row">
          <div class="col-12">
               <div class="inNews__filter">
                    <div class="form-row">
                        <div class="form-group col-md-3 form--calendar">
                               <label class="<?php echo $strLangCls; ?>"><?php echo $strFromDatelbl; ?></label>
                              <input type="text" class="form-control datepicker <?php echo $strNumLangCls; ?> " data-date-format="dd-mm-yyyy" placeholder="" name="txtFromDate" id="txtFromDate"  value="<?php echo ($strFromDate!='0000-00-00')?date('d-m-Y',strtotime($strFromDate)):''; ?>">
                               <i class="fa fa-calendar"></i>
                        </div>
                        <div class="form-group col-md-3 form--calendar">
                             <label class="<?php echo $strLangCls; ?>"><?php echo $strToDatelbl; ?></label>
                           <input type="text" class="form-control datepicker <?php echo $strNumLangCls; ?> " data-date-format="dd-mm-yyyy" placeholder="" name="txtToDate" id="txtToDate"  value="<?php echo ($strToDate!='0000-00-00')?date('d-m-Y',strtotime($strToDate)):''; ?>">
                              <i class="fa fa-calendar"></i>
                        </div>
                        <div class="form-group col-md-4">
                           <label class="<?php echo $strLangCls; ?>"><?php echo $strNewsHeadlinelbl; ?></label>
                         <input type="text" class="form-control <?php echo $strLangCls; ?>" placeholder="" name="txtHeadline" id="txtHeadline" maxlength="100" value="<?php echo $strHeadline;?>">
                        </div>
                        <div class="form-group col-md-2">
                         <label></label>
                          <button class="osda--btn btn--rounded<?php echo $strLangCls; ?>"><?php echo $strSubmitlbl; ?></button>
                        </div>
                    </div>

                    
               </div>
          </div>  
            <?php if($result->num_rows > 0) { 
                        $intCounter      = 0; 
                        $strclsBorder    = '';
                ?>       
            <?php while($newsRow = $result->fetch_array()) {
                
                   $intCounter++;                   
                   if($intCounter==$result->num_rows)
                       $strclsBorder    = 'borderzero';  
                   
                    $strLangcls = ($_SESSION['lang']=='O')?'odia':'';;
                    $newsId       = $newsRow['intNewsId'];//echo $newsId;exit;
                    $headlineE    = htmlspecialchars_decode($newsRow['vchHeadLineE'], ENT_QUOTES);
                    $headlineO    = $newsRow['vchHeadLineH'];
                    $headline     = ($_SESSION['lang']=='O' && $headlineO != '')?$headlineO:$headlineE;
                   
                    
                    $headlineCls  = ($_SESSION['lang']=='O' && $headlineO != '')?'odia':'';
                    $descE        = htmlspecialchars_decode($newsRow['vchDescriptionE'], ENT_QUOTES);
                    $descO        = urldecode($newsRow['vchDescriptionH']);
                    $desc         = ($_SESSION['lang']=='O' && $descO != '')?$descO:$descE;
                    $descCls      = ($_SESSION['lang']=='O' && $descO != '')?'odia':'';
                    $descCount    = ($_SESSION['lang']=='O' && $descO != '')?190:140;
                    $newsDate     = ($_SESSION['lang']=='O')?'<span class="'.$strNumLangCls.'">'.date('d',strtotime($newsRow['dtmNewsDate'])).'</span> '.$objNews->getOdiaMonths(date('n',strtotime($newsRow['dtmNewsDate']))).' <span class="'.$strNumLangCls.'">'.date('Y',strtotime($newsRow['dtmNewsDate'])).'</span>':date('dS M  Y',strtotime($newsRow['dtmNewsDate']));
                   $image        =($newsRow['vchImageFile']!='') ?APP_URL . "uploadDocuments/news/" . $newsRow['vchImageFile']:'';
                    
                    $vchSourcename     = ($_SESSION['lang']=='O' && $newsRow['vchSourcenameO'] != '')?$newsRow['vchSourcename']:htmlspecialchars_decode($newsRow['vchSourcename'], ENT_QUOTES);
                    $vchSourcenameCls  = ($_SESSION['lang']=='O' && $newsRow['vchSourcenameO'] != '')?'odia':'';
                    $vchSource          = $newsRow['vchSource'];
                    
                    $vchNewsCategory     = ($_SESSION['lang']=='O' && $newsRow['vchNewsCategoryO'] != '')?$newsRow['vchNewsCategoryO']:htmlspecialchars_decode($newsRow['vchNewsCategory'], ENT_QUOTES);
                    $vchSourcenameCls    = ($_SESSION['lang']=='O' && $newsRow['vchNewsCategoryO'] != '')?'odia':'';
                   
                    $strReadMore   = ($_SESSION['lang']=='O' && $vchSourcename != '')?$strReadMorelbl:$strReadMorelbl;
                   
                    $strReadMore   = ($vchSourcename != '')?$strReadMore:$strReadMorelbl;
                    $SourceLevel   = ($newsRow['intCategoryId']==2)?$strAuthorLabel:$strNewsSourcelbl;
                    $sourceHtml=($newsRow['intCategoryId']==2)?$vchSourcename:'<a href="'.$vchSource.'" title="">'.$vchSourcename.'</a>';
                    
                   
            ?>
            <div class="col-12">
              <div class="row">
                <div class="col-12 col-md-7">
                  <div class="first-news box--shadow">
                    <img src="<?php echo SITE_URL;?>images/Nano-Unicorn.jpg" alt="">
                    <div class="inNews__details">
                        <span class="inNews__category">Article</span>
                         <h3 class="inNews__headline ">
                            <a href="javascript:void(0);" title="">India needs businesses in small villages</a>
                         </h3>
                         <div class="inNews__meta">
                            <span class="inNews__meta__date  ">13th Dec  2018</span>
                            <span class="inNews__meta__source">Source  : <a href="" title="">India needs businesses in small villages</a></span>
                         </div>
                         <div class="inNews__desc ">Subroto Bagchi, Chairman of Odisha Skill Development Authority, lists social stigma as one of the challenges to encouraging skilled jobs, .. </div>
                    </div>
                  </div>  
                </div>

                <div class="col-12 col-md-5">
                  <div class="following-news box--shadow">
                      <div class="inNews__media">
                         <img src="<?php echo SITE_URL;?>images/Nano-Unicorn.jpg" alt="">
                         <a href="javascript:void(0);" title=""></a>
                      </div>
                      <div class="inNews__details">
                         <h3 class="inNews__headline ">
                              <a href="javascript:void(0);" title="">Odisha to provide skill training to 6.3 lakh youths through various central schemes</a>
                         </h3>
                         <div class="inNews__meta">
                            <span class="inNews__meta__date  ">13th Jul  2017</span>
                            <span class="inNews__meta__source">Source  : <a href="https://orissadiary.com/odisha-provide-skill-training-6-3-lakh-youths-various-central-schemes/" title="">Orissadiary.com</a></span>
                         </div>
                      </div>
                  </div>
                  <div class="following-news box--shadow">
                      <div class="inNews__media">
                         <img src="<?php echo SITE_URL;?>images/Nano-Unicorn.jpg" alt="">
                         <a href="javascript:void(0);" title=""></a>
                      </div>
                      <div class="inNews__details">
                         <h3 class="inNews__headline ">
                              <a href="javascript:void(0);" title="">Odisha to provide skill training to 6.3 lakh youths through various central schemes</a>
                         </h3>
                         <div class="inNews__meta">
                            <span class="inNews__meta__date  ">13th Jul  2017</span>
                            <span class="inNews__meta__source">Source  : <a href="https://orissadiary.com/odisha-provide-skill-training-6-3-lakh-youths-various-central-schemes/" title="">Orissadiary.com</a></span>
                         </div>
                      </div>
                  </div>
                  <div class="following-news box--shadow">
                      <div class="inNews__media">
                         <img src="<?php echo SITE_URL;?>images/Nano-Unicorn.jpg" alt="">
                         <a href="javascript:void(0);" title=""></a>
                      </div>
                      <div class="inNews__details">
                         <h3 class="inNews__headline ">
                              <a href="javascript:void(0);" title="">Odisha to provide skill training to 6.3 lakh youths through various central schemes</a>
                         </h3>
                         <div class="inNews__meta">
                            <span class="inNews__meta__date  ">13th Jul  2017</span>
                            <span class="inNews__meta__source">Source  : <a href="https://orissadiary.com/odisha-provide-skill-training-6-3-lakh-youths-various-central-schemes/" title="">Orissadiary.com</a></span>
                         </div>
                      </div>
                  </div>
                  <div class="following-news box--shadow">
                      <div class="inNews__media">
                         <img src="<?php echo SITE_URL;?>images/Nano-Unicorn.jpg" alt="">
                         <a href="javascript:void(0);" title=""></a>
                      </div>
                      <div class="inNews__details">
                         <h3 class="inNews__headline ">
                              <a href="javascript:void(0);" title="">Odisha to provide skill training to 6.3 lakh youths through various central schemes</a>
                         </h3>
                         <div class="inNews__meta">
                            <span class="inNews__meta__date  ">13th Jul  2017</span>
                            <span class="inNews__meta__source">Source  : <a href="https://orissadiary.com/odisha-provide-skill-training-6-3-lakh-youths-various-central-schemes/" title="">Orissadiary.com</a></span>
                         </div>
                      </div>
                  </div>
                </div>
              </div>
              <hr class="mb-4 mt-4">
            </div>
        


          <div class="col-12 col-lg-6">
               <div class="inNews">
                    <div class="inNews__media">
                         <img src="<?php echo $image;?>" alt="" class="img-fluid">
                         <a href="javascript:void(0);" title=""></a>
                    </div>
                    <div class="inNews__details">
                        <span class="inNews__category <?php echo $vchSourcenameCls;?>"><?php echo ucfirst($vchNewsCategory);?></span>
                         <h3 class="inNews__headline <?php echo $headlineCls; ?>">
                              <a href="javascript:void(0);" title=""><?php echo $headline;?></a>
                         </h3>
                         <div class="inNews__meta">
                              <span class="inNews__meta__date <?php echo $strLangcls; ?> "><?php echo $newsDate; ?></span>
                               <?php if($vchSourcename!=''){ ?>
                              <span class="inNews__meta__source"><?php echo $SourceLevel; ?>  : <?php echo $sourceHtml;?>
                              </span>
                            <?php  } ?>
                              
                              
                         </div>
                         <div class="inNews__desc <?php echo $descCls; ?>"><?php echo $objNews->wardWrap(strip_tags($desc),$descCount); ?> </div>
                         <div class="inNews__share">
                              <span class="inNews__share__handle"><i class="fa fa-share-alt"></i>
                                   <span class="inNews__share__icons">
                                        <a href="javascript:void(0);" title="" class="twitter"><i class="fa fa-twitter"></i></a>
                                        <a href="javascript:void(0);" title="" class="fb"><i class="fa fa-facebook"></i></a>
                                        <a href="javascript:void(0);" title="" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                        <a href="javascript:void(0);" title="" class="pinterest"><i class="fa fa-pinterest"></i></a>
                                        <a href="javascript:void(0);" title="" class="whatsapp"><i class="fa fa-whatsapp"></i></a>
                                   </span>
                              </span>
                         </div>

                    </div>
               </div>
          </div> 
            <?php } ?>            
            <?php }else{ ?>
          <div class="noRecord <?php echo $strLangCls; ?>"><?php echo $strNorecordlbl; ?></div>
            <?php } ?>

           <input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno; ?>" />
         <input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno; ?>" />
         <input name="hdn_IsPaging" id="hdn_IsPaging" type="hidden" value="<?php echo $isPaging; ?>" />
         
     </div>
    <?php if (mysqli_num_rows($result) > 0) { ?>
                <div class="row noPrint">
                    <div class="col-sm-12 text-right">
                          <div class="dataTables_info " id="sample-table-2_info">
                              <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? $strPaginglbl1 : $strPaginglbl2; ?></a>/ <?php } ?> 
                                   <?php echo $objNews->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                          </div>
                      </div>
                      <div class="clearfix"></div>
                    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-12">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                                <?php echo $objNews->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
                                </ul>
                            </div>
                        </div>
                <?php } ?>
                </div>
<?php } ?>
 		
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
