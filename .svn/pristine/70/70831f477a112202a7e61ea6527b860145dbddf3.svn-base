<!--start::Footer-->

                <div class="footersocial">
      <ul>
        <li><a href="https://twitter.com/skilled_odisha" class="hvr-sweep-to-right tweet" aria-label="twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
        <li><a href="https://www.youtube.com/channel/UCY3rrB4FEg_ZNzfGvt5DSUw/videos?shelf_id=0&amp;view=0&amp;sort=dd" aria-label="youtube" class="hvr-sweep-to-right youtube1" target="_blank"><i class="fa fa-youtube"></i></a></li>
        <li><a href="https://www.facebook.com/SkilledinOdisha-359419377823349/" class="hvr-sweep-to-right face" aria-label="facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
      </ul>


    </div>




<footer class="footer">
  <div class="container-fluid">
    <div class="innersec">
      <div class="row justify-content-center">

       <?php
$objPages = new clsGlobalLink;
$footerMenuResult = $objPages->manageGL('VP', 0, 0, 0, 2, 0, 'globalLink', '');

if ($footerMenuResult->num_rows > 0) {
    $intglCunt = 0;
    while ($ftrglRows = mysqli_fetch_array($footerMenuResult)) {
        $menuGlPage = strtolower(htmlspecialchars_decode($ftrglRows['vchPageAlias'], ENT_QUOTES));

        $menuGlName_e = strtoupper(htmlspecialchars_decode($ftrglRows['vchTitle'], ENT_QUOTES));
        $menuGlName_h = $ftrglRows['vchTitleH'];
        $menuGlName = ($_SESSION['lang'] == 'O' && $menuGlName_h != '') ? $menuGlName_h : $menuGlName_e;
        $menuGlcls = ($_SESSION['lang'] == 'O' && $menuGlName_h != '') ? 'odia' : '';
        $intFtrpageId = $ftrglRows['intPageId'];
        /**************************Start-Main Menu Global Link section***************************/

        $ftrplResult = $objPages->manageGL('VP', 0, 0, $intFtrpageId, 2, 0, 'primaryLink', '');
        $totalPlCount = mysqli_num_rows($ftrplResult);

        $menuGlPage = ($_SESSION['lang'] == 'O' && $totalPlCount == 0) ? $menuGlPage . '-or' : $menuGlPage;

        if ($webGl == $menuGlPage) {
            $activeClass = 'active';
        } else if ($id == $menuGlPage) {
            $activeClass = 'active';
        } else {
            $activeClass = '';
        }
        //screenReader

        echo ' <div class="col-6 col-sm-4 col-lg-2 "><h4 class="' . $activeClass . ' ' . $menuGlcls . ' " title="' . $menuGlName_e . '">' . $menuGlName . '</h4> ';

        /**************************Start-Main Menu Primary Link section***************************/

        if ($totalPlCount > 0) {
            echo '<ul class="footerlinks">';
            //    $Copyright = ($_SESSION['lang']=='O')?'&#2837;&#2858;&#2879; &#2872;&#2818;&#2864;&#2837;&#2893;&#2871;&#2879;&#2852; <span class="">&copy;</span> &#2835;&#2908;&#2879;&#2870;&#2878; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2858;&#2893;&#2864;&#2878;&#2855;&#2879;&#2837;&#2864;&#2851; &#2920;&#2918;&#2919;&#2925; &#2872;&#2862;&#2872;&#2893;&#2852; &#2872;&#2852;&#2893;&#2852;&#2893;&#2860; &#2872;&#2818;&#2864;&#2837;&#2893;&#2871;&#2879;&#2852;':'Copyright © 2017 Odisha Skill Development Authority. All Rights Reserved';
            while ($ftrplRows = mysqli_fetch_array($ftrplResult)) {
                $count++;
                $menuPlPage = strtolower(htmlspecialchars_decode($ftrplRows['vchPageAlias'], ENT_QUOTES));

                $plMenuTitle_e = htmlspecialchars_decode($ftrplRows['vchTitle'], ENT_QUOTES);
                $plMenuTitle_h = $ftrplRows['vchTitleH'];

                $plMenuTitle = ($_SESSION['lang'] == 'O' && $plMenuTitle_h != '') ? $plMenuTitle_h : $plMenuTitle_e;
                $plMenuTitlecls = ($_SESSION['lang'] == 'O' && $plMenuTitle_h != '') ? 'odia' : '';

                $plMenuUrl = htmlspecialchars_decode($ftrplRows['vchUrl'], ENT_QUOTES);
                $plPluginName = htmlspecialchars_decode($ftrplRows['vchPluginName'], ENT_QUOTES);

                $intPlLinkType = $ftrplRows['intLinkType'];
                $plPageId = $ftrplRows['intPageId'];
                $intplTemplateType = $ftrplRows['intTemplateType'];
                $intPlWindownStatus = $ftrplRows['intWindowStatus'];
                $strPLPageNav = $ftrplRows['vchPageNavigation'];

                $menuPlPage = ($_SESSION['lang'] == 'O') ? $menuPlPage . '-or' : $menuPlPage;

                if ($intPlLinkType == 1) {
                    if ($intplTemplateType == 1 || $intplTemplateType == 2) {
                        $pluginPlName = $menuGlPage . '/' . $menuPlPage;
                        $href = SITE_URL . $pluginPlName;
                    } else if ($intplTemplateType == 3) {
                        $href = 'javascript:void(0);';
                    }

                } else if ($intPlLinkType == 2) {
                    $href = $plMenuUrl;
                }

                if ($intPlWindownStatus == 1) {
                    $plTargetBlank = '';
                } else {
                    $plTargetBlank = 'target="_blank"';
                }


                if($plPageId==19)
                {
                  $plMenuFeedbackCls = "footerfeedback";
                }
                else
                {
                  $plMenuFeedbackCls = "";
                }
                echo ' <li> <a href="' . $href . '" ' . $plTargetBlank . ' title="' . $plMenuTitle_e . '" class="' . $plMenuTitlecls .' '. $plMenuFeedbackCls .'">' . $plMenuTitle . '</a> </li> ';

            } //ENd of Primarilink while loop

            echo '</ul>';
        }

        /**************************End-Main Menu Primary Link section***************************/

        echo ' </div>';
    }
}
?>
 </div>
    <div class="clearfix"></div>
    </div>
  </div>
</footer>
<!--end::Footer-->

<!--start::bottom-Footer-->
<?php //echo $strCopyrightlbl1; ?>
<div class="">
  <div class="copyrights">
    <p class="<?php echo $strLangCls; ?>"> &copy; <span class="<?php echo $strNumLangCls; ?>"><?php echo date('Y'); ?></span> <span class="<?php echo $strLangCls; ?>"><?php echo $strCopyrightlbl2; ?></span></p>
  </div>
</div>


<div class="enquiry-form-container">
  <a href="javascript:void(0);" class="osda--btn <?php echo $odiaClass; ?>"><i class="fa fa-edit"></i> <?php echo $enquiryLevel; ?></a>
  <div class="enquiry-form">
    <div class="forms">
       
      
       <a href="javascript:void(0);" class="form-close close-enquiry" aria-label="close"><i class="fa fa-close"></i></a>
       <h3 class="<?php echo $strLangCls; ?>"><?php echo $strSubmitQuerylbl; ?></h3>
     
       
       
<!--       <p class="<?php //echo $strLangCls; ?>"><?php //echo $strSubmitQueryP1lbl; ?> <a class="<?php //echo $strLangCls; ?>" href="<?php //echo SITE_URL; ?>faq"><?php //echo $strFaqlbl; ?></a> <?php //echo $strSubmitQueryp2lbl; ?></p>-->
       
        <div class="enquiry-body">
        <div class="form-group mt-4 mt-md-0">
          <input type="text" class="form-control" title="<?php echo $queryFormNamelvl; ?>" placeholder="<?php echo $queryFormNamelvl; ?>" name="txtQueryName" id="txtQueryName" maxlength="100" value="<?php echo $txtQueryName; ?>">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" title="<?php echo $strEmaillbl; ?>" placeholder="<?php echo $strEmaillbl; ?>" name="txtQueryEmail" id="txtQueryEmail" maxlength="50" value="<?php echo $txtQueryEmail; ?>">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" title="<?php echo $queryFormMobilelvl; ?>" placeholder="<?php echo $queryFormMobilelvl; ?>" name="txtQueryPhone" id="txtQueryPhone" maxlength="10" value="<?php echo $txtQueryPhone; ?>" onKeyPress="return isNumberKey(event);">
        </div>
        <div class="form-group">
          <textarea class="form-control" rows="3" title="<?php echo $queryTypeLvl; ?>" cols="10" placeholder="<?php echo $queryTypeLvl; ?>" name="txtQueryMsg" id="txtQueryMsg"><?php echo $txtQueryMsg; ?></textarea>
        </div>
        <div class="form-group">
          <div class="row">

            <div class="col-12 col-sm-4 pb-3 pr-sm-0">
              <input type="text" class="form-control" title="<?php echo $queryCaptcha; ?>" placeholder="<?php echo $queryCaptcha; ?>" name="txtCaptchaQry" id="txtCaptchaQry" onKeyUp="return blockspecialchar_first(this);" Autocomplete="off" maxlength="20" value="">
            </div>


            <div class="col-12 col-sm-5 pr-sm-0">
              <div class="form-control"><img src="<?php echo APP_URL; ?>includes/captcha.php" alt="captcha image" id="captchaImageQuery" width="110"/>
              </div>
            </div>

            <div class="col-12 col-sm-3">
              <div class="form-control"><a href="javascript:void(0);" onclick="generateQueryCaptcha();"  aria-label="refresh"><i class="fa fa-refresh text-danger"></i></a></div>
            </div>


            <div class="col-12 mt-3"> <a href="#" class="btn bg-osdaColor2 pl-5 pr-5 w-100 <?php echo $strLangCls; ?>"  id="btnQuerySubmit" onclick="return validatorQuery();"><?php echo $strSubmitlbl; ?></a> <span class="queryLoader"><img src="<?php echo SITE_URL; ?>images/loader.gif" alt="loading" /></span></div>
          </div>
        </div>
          </div>
        
       <input type="hidden" name="hdnPrevSessionId" id="hdnPrevSessionId" value="<?php echo session_id(); ?>" >
      </div>
  </div>
</div>


<div class="modal fade in" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModal" aria-hidden="false" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
      <h4 class="alertMessage center"></h4>
        <div class="form-group">
          <div class="center"> <a class=" btn btn-danger btn-sm" id="btnAlertOk" data-dismiss="modal" style="width:100px; margin-top:30px;">Ok</a> </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade in" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModal" aria-hidden="false" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
       <h4 class="confirmMessage center"></h4>
        <div class="form-group">
          <div class="center">

      <a class=" btn btn-success btn-sm" id="btnConfirmOk"  style="width:100px; margin-top:30px;">Ok</a>

      <a class=" btn btn-danger btn-sm" id="btnConfirmCancel" data-dismiss="modal" style="width:100px; margin-top:30px;">Cancel</a>

      </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--bottom-Footer-->

<a href="javascript:void(0);" class="back-to-top" data-toggle="tooltip" data-placement="top" data-original-title="Go to Top" style="display:none;"><i class="fa fa-chevron-up"></i></a>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <link rel="stylesheet" type="text/css" href="<?php //echo SITE_URL; ?>css/default.css" id="color-switcher"> -->


    <script src="<?php echo SITE_URL; ?>js/jquery.min.js"></script> 
    <script src="<?php echo APP_URL; ?>js/loadComponent.js" defer></script>
    <script src="<?php echo APP_URL; ?>js/validatorchklist.js" defer></script>
    <script src="<?php echo SITE_URL; ?>js/loadAjax.js" defer></script>
     <script src="<?php echo SITE_URL; ?>js/styleswitch.js" defer></script>
   
     
     
<script src="<?php echo SITE_URL; ?>js/popper.min.js" defer></script>
<script src="<?php echo SITE_URL; ?>js/bootstrap.min.js" defer></script>
<script src="<?php echo SITE_URL; ?>js/main.js" defer></script>
<script src="<?php echo SITE_URL; ?>js/superfish.min.js" defer></script>
<script src="<?php echo SITE_URL; ?>js/jquery.fontresize.js"></script>
<script src="<?php echo SITE_URL; ?>js/AprantDynamic.js"></script>




<script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
  <?php $pageName = $_REQUEST['PG']; ?>
         var SITE_URL = '<?php echo SITE_URL; ?>';
        $(document).ready(function () {

            // loadPopularPages();
            setTimeout(function () {

                $("a[target=_blank]").each(function () {
                    var href = $(this).attr("href"); // retrive href foreach a
                    //alert(href);
                    var fileTypepdf = href.search("pdf");
                    var fileTypedoc = href.search("doc");
                    var fileTypedocx = href.search("docx");
                    var fileTypeppt = href.search("ppt");
                    if (fileTypepdf > 0 || fileTypedoc > 0 || fileTypedocx > 0 || fileTypeppt > 0) {
                    } else {
                        $(this).attr("onclick", "return confirm('<?php echo EXTERNAL_MSG; ?>')"); // replace href attribute with wich u want
                    }
                    // etc
                });

            }, 1000);


           /* setTimeout(function(){ 
            $("a").each(function () {
              var href = $(this).attr("href"); // retrive href foreach a
              var newhref = $(this).attr("href").replace('http://localhost/OSDA/skill-competition', '');
              $(this).attr('href' , 'http://skillodisha.gov.in'+newhref);
            });

          }, 1000);*/
        });




  //fontresize
  $('body p, body ul li, body ul li a').jfontsize({
    btnMinusClasseId: '#jfontsize-m',
    btnDefaultClasseId: '#jfontsize-d',
    btnPlusClasseId: '#jfontsize-p',
    btnMinusMaxHits: 3,
    btnPlusMaxHits: 3,
    sizeChange: 1
  });

$(function(){

  //alert($(window).width());
  
  
     $('.queryLoader').hide();
     <?php if ($outMsg != '' && isset($_REQUEST['btnQuerySubmit'])) {?>
                viewAlert('<?php echo $outMsg; ?>','','');
      <?php }?>


    $(".toggleSearch").click(function(){
        $(".searchinner").slideToggle("slow");
    $('.closeIcon,.searchIcon').toggle();
    });
    

  if('<?php echo $_SESSION['lang']; ?>'=='O')  {
    setTimeout(function(){

        var highlightedItems = document.querySelectorAll("h1,h2,h3,h4,h5,h6,strong,span:not(.carousel-control-next-icon):not(.carousel-control-prev-icon):not(.fa-facebook):not(.fa-youtube):not(.fa-twitter),div:not(.loadercont),label,input,button,p,li,a,textarea,select,table,div");

        highlightedItems.forEach(function(userItem) {
            if(!$(userItem).hasClass('odia') && !$(userItem).hasClass('odianum')){
                 var matches=   hasNumber($(userItem).text());

                    if (matches == true) {
                        $(userItem).addClass('odianum');
                    }else{
                    $(userItem).addClass('odia');}
                }
            });

    },300)
  }

    $('#sw-color a').on('click', function(){
                 var path = $(this).data('path');
                 $('#color-switcher').attr('href', path);
            });

});

  function generateCaptcha()
  {
            var ranNo = Math.floor((Math.random() * 100) + 1);
            $('#captchaImage').attr('src', '<?php echo APP_URL; ?>includes/captcha.php?' + ranNo);
  }

function hasNumber(myString) {
  return /\d/.test(myString);
}

function showEnquiry() {

      $(".enquiry-form-container").show();

      var clickCtr=window.localStorage.getItem('clicks');
      if(clickCtr!=1){
        <?php if(!empty($pageName) && $pageName != 'home'){?>

        <?php }else{?>
          $(".enquiry-form-container .enquiry-form").addClass("formToggle");
        <?php }?>  
        
      }



    }

        function generateQueryCaptcha()
            {
                    var qryranNo  = Math.floor((Math.random() * 100) + 1);
                    $('#captchaImageQuery').attr('src','<?php echo APP_URL; ?>includes/captcha.php?'+qryranNo);
            }
  function validatorQuery()
              {
                 if(!blankCheck('txtQueryName','Please enter your name'))
                    return false;
                 if(!checkSpecialChar('txtQueryName'))
                    return false;
                 if(!maxLength('txtQueryName', 100,'Name'))
                    return false;
                 if(!blankCheck('txtQueryEmail','Please enter your email'))
                    return false;
                 if(!checkSpecialChar('txtQueryEmail'))
                     return false;
                 if(!maxLength('txtQueryEmail', 50,'Email'))
                     return false;
                 if(!validEmail('txtQueryEmail'))
                    return false;
                 if(!checkSpecialChar('txtQueryPhone'))
                    return false;
                 if(!maxLength('txtQueryPhone', 10, 'Mobile No'))
                    return false;
                 if(!validMobileNo('txtQueryPhone','Please enter a valid mobile no'))
                    return false;
                 if(!blankCheck('txtQueryMsg','Please enter your query'))
                    return false;
                 if(!checkSpecialChar('txtQueryMsg'))
                    return false;
                 if(!maxLength('txtQueryMsg', 500,'Query'))
                    return false;
                 if (!blankCheck('txtCaptchaQry', 'Captcha can not be left blank'))
                    return false;

                   var name      = $('#txtQueryName').val();
                   var email     = $('#txtQueryEmail').val();
                   var phone     = $('#txtQueryPhone').val();
                   var message   = $('#txtQueryMsg').val();
                   var captcha   = $('#txtCaptchaQry').val();

                   addQuery1('A',name,email,phone,message,captcha,'<?php echo $_SESSION['lang']; ?>');
              }
</script>
<script>
    // Contest Popup
   var clickCtr=window.localStorage.getItem('clicks');

   if(clickCtr==null || clickCtr=='' || clickCtr==0){

        setTimeout(showEnquiry, 800);
    }

    $(".close-enquiry").click(function(){

          window.localStorage.setItem('clicks',1);
    });

   /*if(clickCtr==null || clickCtr=='' || clickCtr==0){

        setTimeout(showEnquiry, 800);
    }

    $(".close-enquiry").click(function(){

          window.localStorage.setItem('clicks',1);
    });*/

//    function setcontestSession(){
//        window.localStorage.setItem('clicks',1);
//    }
//
//    function getcontestSession(){
//        return window.localStorage.getItem('clicks');
//    }
    /*--For Search Result By Ashis Kumar Patra--*/
    function goToSearch(inputId)
    {
        var serchtext = $('#'+inputId).val();
        if(serchtext=='')
        {
            viewAlert("Please enter search text");
            $('#'+inputId).focus();
            return false;
         } else if(serchtext.length>0){

             $("#frmSearch").attr('action','<?php echo SITE_URL; ?>'+'search')
             $("#frmSearch").submit();
        }
    }

// Script for pwa: Added by Himalaya Pagada
    var xhr = new XMLHttpRequest();
    
    var url='<?php echo SITE_URL;?>';
    xhr.open("GET", url+"manifest.json");
    xhr.addEventListener('load', processJSON);
    xhr.send();

    function processJSON(event) {
        // var json = this.responseText;
        // var obj = JSON.parse(json);
        // and do something with obj here
    }
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker
                .register('js/pw-cache-assets.js')
                .then(reg => {
                    // console.log('service worker registered! with- ', reg.scope)
                })
                .catch(err => console.log(`service worker: Error : ${err}`))
        });
    }
</script>







