<?php
//get the logo 
include_once(CLASS_PATH . 'clsLogo.php');
$objLogo = new clsLogo();
$logoresult = $objLogo->manageLogo('V', 0, '', '', '', '', '', '', '', 0, 0, 0, 0);
if ($logoresult->num_rows > 0) {
    $logorow = $logoresult->fetch_array();
    $strHomelogoimg = ($logorow['VCH_IMAGE_H'] != '') ? APP_URL . 'uploadDocuments/Logo/' . $logorow['VCH_IMAGE_H'] : SITE_URL . 'images/logo.png';
    $strHomelogoimgO = ($logorow['VCH_IMAGE_O'] != '') ? APP_URL . 'uploadDocuments/Logo/' . $logorow['VCH_IMAGE_O'] : SITE_URL . 'images/logo-or.png';
    $strHomelogoTitle = htmlspecialchars_decode($logorow['VCH_LOGO_TITLE'], ENT_QUOTES);
    $strInnerlogoimg = ($logorow['VCH_INNERIMAGE'] != '') ? APP_URL . 'uploadDocuments/Logo/' . $logorow['VCH_INNERIMAGE'] : SITE_URL . 'images/logo.png';
    $strInnerlogoimgO = ($logorow['VCH_INNERIMAGE_O'] != '') ? APP_URL . 'uploadDocuments/Logo/' . $logorow['VCH_INNERIMAGE_O'] : SITE_URL . 'images/logo-or.png';
}
$strWebsitelogoimg = ($page == 'home' || $page == '' || $page == 'index') ? $strHomelogoimg : $strInnerlogoimg;
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> -->
    <meta name="keywords" content="<?php if ($strmetakeywords != '') echo $strmetakeywords;
    else echo 'OSDA, skill, Odisha, skilled, development, government, Institute, training, authority, Student'; ?>">
    <meta name="description" content="<?php if ($strmetadescription != '') echo $strmetadescription;
    else echo 'Odisha Skill Development Authority (OSDA) main motto is to make youth of Odisha skillful in order to  get employment opportunities & make Skilled-in-Odisha-a Global Brand'; ?>">
    <title><?php if ($strmetatitle != '') echo TITLE . '|' . $strmetatitle;
    else echo TITLE; ?></title>
    <link rel="icon" type="image/png" href="<?php echo SITE_URL; ?>images/favicon.png" />
    <link rel="canonical" href="<?php echo SITE_URL . (($_REQUEST['PG'] != '' ? $_REQUEST['PG'] : '')) . (($_REQUEST['GL'] != '' ? '/' . $_REQUEST['GL'] : '')) . (($_REQUEST['PL'] != '' ? '/' . $_REQUEST['PL'] : '')) . (($_REQUEST['NID'] != '' ? '/' . $_REQUEST['NID'] : '')); ?>" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>css/bootstrap.css">
    <!-- <link rel="stylesheet" href="<?php //echo SITE_URL; ?>css/icon.css" /> -->
    <link href="<?php echo APP_URL; ?>css/datepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>css/common.css" />
    <link rel="icon" href="<?php echo SITE_URL; ?>images/favicon.png" type="image/png" sizes="16x16">
    <link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans+Condensed:300,700" rel="stylesheet">
    <link href="<?php echo SITE_URL; ?>css/font-awesome.min.css" rel="stylesheet">
     <link href="<?php echo SITE_URL; ?>css/custom-black.css" rel="alternate stylesheet" type="text/css" media="screen" title="contrast"/>
    <!--Jquery Min-->
    
     <!-- <script src="<?php echo SITE_URL; ?>js/webMain.js" defer></script>
-->
       
    <!---Inner Css Management (add page you want to include innercss)-->
   
    
    <?php
   //echo $webNid;exit;
    $innerCssIncludePage = array('Institute', 'courses', 'success-stories', 'gallery', 'gallery-details', 'timeline', 'map-view', 'success-stories-dec', 'trainingPartner', 'photoGalleryInnerPage', 'government-iti', 'articles', 'success-stories-details', 'government-polytechnic','employer-speak','skill-compete-register','skill-compete-register2','institution-profile','politechnic-profile');
    if ((in_array($page, $innerCssIncludePage))==TRUE || (in_array($webNid, $innerCssIncludePage))==TRUE) {
        ?>
        <link rel="stylesheet" href="<?php echo SITE_URL; ?>css/inner.css" /> 
<?php } ?>
<?php if ($_SESSION['lang'] == 'O') { ?>
        <link href="<?php echo SITE_URL; ?>css/oriya.css" rel="stylesheet">
<?php } ?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-104508314-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
 
  gtag('config', 'UA-104508314-1');
</script>

<!-- Google tag (gtag.js) updated ON 27-Mar-2023--> 
<script async src="https://www.googletagmanager.com/gtag/js?id=G-GC8XV8B2RB"></script> 
<script> 
window.dataLayer = window.dataLayer || []; 
function gtag(){dataLayer.push(arguments);} 
gtag('js', new Date()); 
gtag('config', 'G-GC8XV8B2RB'); 
</script>

</head>




<body>

    <!-- Social Floating Box -->
    <div class="socialIconBox">
        <div class="floatingSocial" title="Connect with us"> 
        </div>
        <div class="icons">
            <a href="https://www.facebook.com/SkilledinOdisha-359419377823349/" title="Facebook" target="_blank" class="fb--bg"><span class="fa fa-facebook"></span></a>
            <a href="https://twitter.com/skilled_odisha" title="Twitter" target="_blank" class="twitter--bg"><span class="fa fa-twitter"></span></a>
            <a href="https://www.youtube.com/channel/UCY3rrB4FEg_ZNzfGvt5DSUw/videos?shelf_id=0&amp;view=0&amp;sort=dd" title="Youtube" target="_blank" class="youtube--bg"><span class="fa fa-youtube"></span></a>
            <a href="" title="linkedin" target="_blank" class="linkedin--bg"><span class="fa fa-linkedin"></span></a>
            <a href="" title="pinterest" target="_blank" class="pinterest--bg"><span class="fa fa-pinterest"></span></a>
        </div>
    </div>
    <div id="header">
        <div class="container-fluid">
            <div id="logo" class="pull-left"> <a href="<?php echo SITE_URL; ?>" class="scrollto"> <img src="<?php echo $strHomelogoimg; ?>" alt="<?php echo $strHomelogoTitle; ?>" title="<?php echo $strHomelogoTitle; ?>" /></a>
                <h1 class="hfont <?php echo $strLangCls; ?>">
                    <a href="<?php echo SITE_URL; ?>" class="scrollto"> <?php echo $strlogotitlelbl; ?></a>
                    <small><?php echo $strgovtofdishalbl; ?></small>
                </h1>

                <!-- Uncomment below if you prefer to use an image logo --> 
                <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>--> 
            </div>
            <div class="top-header">
                <div class="setting-itemss" id="sw-color"> 
                    <a class="oriya" href="javascript:void(0);" onclick="changeLanguage('<?php echo (isset($_SESSION['lang']) && $_SESSION['lang'] == 'O') ? 'E' : 'O' ?>', '<?php echo $page; ?>', '<?php echo $webGl; ?>', '<?php echo $webPl; ?>', '<?php echo $webNid; ?>','<?php echo $isPaging; ?>','<?php echo $intPgno; ?>','<?php echo $intRecno; ?>');"><?php echo ($_SESSION['lang'] == 'O') ? 'English' : '&#2835;&#2849;&#2876;&#2879;&#2822;' ?></a>
                   <!--  <a class="oriya" href="<?php echo SITE_URL; ?>Application"><?php echo ($_SESSION['lang'] != 'O') ? 'Login' : '&#2866;&#2839;&#2879;&#2856;&#2893;' ?></a> -->
                    
                    
                    <!--<a href="javascript:void(0);" title="Dark theme" class="black-box" data-path="<?php echo SITE_URL; ?>css/custom-black.css"></a>
                    <a href="javascript:void(0);" title="Light theme" class="white-box" data-path="<?php echo SITE_URL; ?>css/common.css"></a>-->

                          


                            <a href="javascript:void(0)" onClick="chooseStyle('contrast', 60);" class="black-box" title="" data-toggle="tooltip" data-placement="bottom" data-original-title="High contrast view" tabindex="0">&nbsp;</a> 
                            
                            <a href="javascript:void(0)" onclick="chooseStyle('none', 60);" class="white-box screenReader " title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Low contrast view" tabindex="1">&nbsp;</a> 
                          



						  
<!--
							<div class="theme-color" id="sw-color">
								<a href="javascript:void(0);" title="Dark theme" class="color-1" data-path="css/dark.css"></a>
								<a href="javascript:void(0);" title="Light theme" class="color-2" data-path="css/bssca.css"></a>
							</div>
-->
						  
                </div>
                <div class="setting-itemss">
                    <div class="font-size"> 
                        <a href="javascript:void(0);" class="fontresize" id="jfontsize-m" data-toggle="tooltip" data-placement="bottom" data-original-title="Decrease font size" tabindex="2"><?php echo $albl; ?>-</a> 
                        <a href="javascript:void(0);" class="fontresize" id="jfontsize-d" data-toggle="tooltip" data-placement="bottom" data-original-title="Standard font size" tabindex="3"><?php echo $albl; ?></a> 
                        <a href="javascript:void(0);" class="fontresize" id="jfontsize-p" data-toggle="tooltip" data-placement="bottom" data-original-title="Increase font size" tabindex="4"><?php echo $albl; ?>+</a>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="about">
                    
                    
                    <?php
                    $objPages = new clsGlobalLink;
                    $topMenuResult = $objPages->manageGL('VP', 0, 0, 0, 3, 0, 'globalLink', '');
                    $content = 'content';
                    if ($topMenuResult->num_rows > 0) {
                        ?>
                        <ul>
                            <!-- <li><a href="http://164.164.122.177/GoSkill_STG" class="no-link"><img src="<?php echo SITE_URL; ?>images/go-skill-logo.png" alt="" height="36px"></a></li> -->
<!--
                            <li class="careerblink"><a href="<?php echo SITE_URL; ?>career" title="<?php echo $strCareer; ?>"  class="screenreader <?php echo $strLangCls; ?>">
                            <span class="blink"><?php echo $strCareer; ?></span></a></li>
-->
                            
                            
                             <li class="careerblink"><a href="<?php echo SITE_URL; ?>career" title="<?php echo $strCareer; ?>"  class="screenreader <?php echo $strLangCls; ?>">
                           <?php echo $strCareer; ?></a></li> 
                            
                            
                            <?php
                            $topListCount = 0;
                            while ($topRows = mysqli_fetch_array($topMenuResult)) {
                                $menuGlPage = (htmlspecialchars_decode($topRows['vchPageAlias'], ENT_QUOTES));

                                $menuGlName_e = ucfirst(htmlspecialchars_decode($topRows['vchTitle'], ENT_QUOTES));
                                $menuGlName_h = $topRows['vchTitleH'];
                                $menuGlName = ($_SESSION['lang'] == 'O' && $menuGlName_h != '') ? $menuGlName_h : $menuGlName_e;
                                $menuGlcls = ($_SESSION['lang'] == 'O' && $menuGlName_h != '') ? 'odia' : '';

                                $menuGlSnippet = ($_SESSION['lang'] == 'O' && $topRows['vchSnippetO'] != '') ? $topRows['vchSnippetO'] : htmlspecialchars_decode($topRows['vchSnippet'], ENT_QUOTES);
                                $menuGlSncls = ($_SESSION['lang'] == 'O' && $topRows['vchSnippetO'] != '') ? 'odia' : '';

                                $menuGlUrl = htmlspecialchars_decode($topRows['vchUrl'], ENT_QUOTES);
                                $pluginGl = htmlspecialchars_decode($topRows['vchPluginName'], ENT_QUOTES);

                                $intLinkGLType = $topRows['intLinkType'];
                                $pageId = $topRows['intPageId'];
                                $intTemplateGLType = $topRows['intTemplateType'];
                                $intGlWindownStatus = $topRows['intWindowStatus'];
                                $strPageNav = $topRows['vchPageNavigation']; //44
                                $expPageNav = (explode("/", $strPageNav));
                                $pageGLId = $strPageNav;
                                $menuGlMetaimg = ($topRows["vchMetaImage"] != '') ? APP_URL . 'uploadDocuments/banner/' . $topRows["vchMetaImage"] : SITE_URL . 'images/odisha-skilled.jpg';
                                $topListCount++;

                                $menuGlPageA = $menuGlPage;
                                $menuGlPage = ($_SESSION['lang'] == 'O') ? $menuGlPage . '-or' : $menuGlPage;
                                if ($intLinkGLType == 1) {
                                    if ($intTemplateGLType == 1 || $intTemplateGLType == 2) {
                                        $href = SITE_URL . $menuGlPage;
                                    } else if ($intTemplateGLType == 3) {
                                        $href = 'javascript:void(0);';
                                    }
                                } else if ($intLinkGLType == 2)
                                    $href = $menuGlUrl;

                                if ($intGlWindownStatus == 1)
                                    $glTargetBlank = '';
                                else
                                    $glTargetBlank = 'target="_blank"';
                                if ($page == $menuGlPageA) {
                                    $activeClass = 'active';
                                }
                                else if ($id == $menuGlPageA) {
                                    $activeClass = 'active';
                                }
                                else {
                                    $activeClass = '';
                                }
                                ?>
                                <li class="<?php echo $activeClass; ?>"><a href="<?php echo $href; ?>" class="<?php echo $menuGlcls; ?>"  title="<?php echo $menuGlName; ?>" <?php echo $glTargetBlank; ?>><?php echo $menuGlName; ?></a></li>
                            <li></li>
                        <?php } ?>
                        </ul>

<?php } ?>

                </div>
                <!--
                      <a href="javascript:void(0)" class="screenReader" title="Print"> <i class="fa fa-print"></i> Print</a> 
                      <a href="javascript:void(0)" class="skip-to-content screenReader" title="Skip to main content"> Skip to main content</a> 
                      <a href="javascript:void(0)" class="screenReader tmenu" title="Download Screen reader">Download Screen Reader</a>
                -->


                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="container-fluid p-0 bg-white">
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                   
                   <li class="homeicon"><a href="<?php echo SITE_URL; ?>home" class="" title="<?php echo $strhomelbl; ?>"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                   
                    <?php
                    $objPages = new clsGlobalLink;
                    $mainMenuResult = $objPages->manageGL('VP', 0, 0, 0, 1, 0, 'globalLink', '');
                    $content = 'content';

                    if ($mainMenuResult->num_rows > 0) {

                        $intglCunt = 0;
                        while ($glRows = mysqli_fetch_array($mainMenuResult)) {
                            $menuGlPage = (htmlspecialchars_decode($glRows['vchPageAlias'], ENT_QUOTES));

                            $menuGlName_e = ucfirst(htmlspecialchars_decode($glRows['vchTitle'], ENT_QUOTES));
                            $menuGlName_h = $glRows['vchTitleH'];
                            $menuGlName = ($_SESSION['lang'] == 'O' && $menuGlName_h != '') ? $menuGlName_h : $menuGlName_e;
                            $menuGlcls = ($_SESSION['lang'] == 'O' && $menuGlName_h != '') ? 'odia' : '';

                            $menuGlSnippet = ($_SESSION['lang'] == 'O' && $glRows['vchSnippetO'] != '') ? $glRows['vchSnippetO'] : htmlspecialchars_decode($glRows['vchSnippet'], ENT_QUOTES);
                            $menuGlSncls = ($_SESSION['lang'] == 'O' && $glRows['vchSnippetO'] != '') ? 'odia' : '';

                            $menuGlUrl = htmlspecialchars_decode($glRows['vchUrl'], ENT_QUOTES);
                            $pluginGl = htmlspecialchars_decode($glRows['vchPluginName'], ENT_QUOTES);

                            $intLinkGLType = $glRows['intLinkType'];
                            $pageId = $glRows['intPageId'];
                            $intTemplateGLType = $glRows['intTemplateType'];
                            $intGlWindownStatus = $glRows['intWindowStatus'];
                            $strPageNav = $glRows['vchPageNavigation']; //44
                            $expPageNav = (explode("/", $strPageNav));
                            $pageGLId = $strPageNav;
                            $menuGlMetaimg = ($glRows["vchMetaImage"] != '') ? APP_URL . 'uploadDocuments/banner/' . $glRows["vchMetaImage"] : SITE_URL . 'images/odisha-skilled.jpg';
                            $intglCunt++;
                            /*                             * ************************Start-Main Menu Global Link section************************** */

                            $plResult = $objPages->manageGL('VP', 0, 0, $pageId, 1, 0, 'primaryLink', '');
                            $totalPlCount = mysqli_num_rows($plResult);

                            $menuGlPageA = $menuGlPage;
                            $menuGlPage = ($_SESSION['lang'] == 'O') ? $menuGlPage . '-or' : $menuGlPage;
                            $dropDownMobClass = ($totalPlCount > 0) ? 'menu-has-children' : '';
                            if ($intLinkGLType == 1) {
                                if ($intTemplateGLType == 1 || $intTemplateGLType == 2) {
                                    $href = SITE_URL . $menuGlPage;
                                } else if ($intTemplateGLType == 3) {
                                    $href = 'javascript:void(0);';
                                }
                            } else if ($intLinkGLType == 2)
                                $href = $menuGlUrl;

                            if ($intGlWindownStatus == 1)
                                $glTargetBlank = '';
                            else
                                $glTargetBlank = 'target="_blank"';

                            if ($page == $menuGlPageA)
                                $activeClass = 'active';
                            else if ($id == $menuGlPageA)
                                $activeClass = 'active';
                            else
                                $activeClass = '';  //screenReader
							
							//$custom = 'custom-toggle-menu';



                            echo ' <li class="' . $dropDownMobClass . ' ' . $activeClass . '"><a href="' . $href . '" class=" ' . $menuGlcls . ' " title="' . $menuGlName . '" ' . $glTargetBlank . '>' . $menuGlName . '</a>';

                            /*                             * ************************Start-Main Menu Primary Link section************************** */
                            if ($totalPlCount > 0) {
//                                if($intglCunt==1){
//                                    echo '<ul class="bg-secondary">';
//                                   // echo '<li class="menutext intro-box"> <img src="'.$menuGlMetaimg.'" alt="'.$menuGlName.'" title="'.$menuGlName.'" width="100%"/>';
//                                   // echo '  <h2></h2>';
//                                    //if($menuGlSnippet!='')
//                                    // echo ' <p class="'.$menuGlSncls.'"> '.$menuGlSnippet.'</p></li>';
//                                    echo '<li class="menutext menu-box"> ';
//                                    
//                                 }else
                                echo '<ul>';

                                while ($plRows = mysqli_fetch_array($plResult)) {
                                    $count++;
                                    $menuPlPage = (htmlspecialchars_decode($plRows['vchPageAlias'], ENT_QUOTES));

                                    $plMenuTitle_e = ucfirst(htmlspecialchars_decode($plRows['vchTitle'], ENT_QUOTES));
                                    $plMenuTitle_h = $plRows['vchTitleH'];

                                    $plMenuTitle = ($_SESSION['lang'] == 'O' && $plMenuTitle_h != '') ? $plMenuTitle_h : $plMenuTitle_e;
                                    $plMenuTitlecls = ($_SESSION['lang'] == 'O' && $plMenuTitle_h != '') ? 'odia' : '';

                                    $plMenuUrl = htmlspecialchars_decode($plRows['vchUrl'], ENT_QUOTES);
                                    $plPluginName = htmlspecialchars_decode($plRows['vchPluginName'], ENT_QUOTES);

                                    $intPlLinkType = $plRows['intLinkType'];
                                    $plPageId = $plRows['intPageId'];
                                    $intplTemplateType = $plRows['intTemplateType'];
                                    $intPlWindownStatus = $plRows['intWindowStatus'];
                                    $strPLPageNav = $plRows['vchPageNavigation'];

                                    $menuPlPage = ($_SESSION['lang'] == 'O') ? $menuPlPage . '-or' : $menuPlPage;

                                    if ($intPlLinkType == 1) {
                                        if ($intplTemplateType == 1 || $intplTemplateType == 2) {
                                            $pluginPlName = $menuGlPage . '/' . $menuPlPage;
                                            $href = SITE_URL . $pluginPlName;
                                        } else if ($intplTemplateType == 3) {
                                            $href = 'javascript:void(0);';
                                        }
                                    } else if ($intPlLinkType == 2)
                                        $href = $plMenuUrl;

                                    if ($intPlWindownStatus == 1)
                                        $plTargetBlank = '';
                                    else
                                        $plTargetBlank = 'target="_blank"';


                                    echo '<li><a href="' . $href . '" ' . $plTargetBlank . ' title="' . $plMenuTitle . '" class="' . $plMenuTitlecls . '">' . $plMenuTitle . '</a></li>';
                                }  //ENd of Primarilink while loop
                                echo '</ul>';
                            }

                            /*                             * ************************End-Main Menu Primary Link section************************** */
                            echo '</li>';
                        }
                    }
                    ?>
                </ul>
                
            <div class="about aboutsm">
                    <?php
                     mysqli_data_seek($topMenuResult, 0);
                    $content = 'content';
                    if ($topMenuResult->num_rows > 0) {
                        ?>
                        <ul>
                            <!-- <li class="careerblink mobilebtns"><a href="<?php echo SITE_URL; ?>career" title="<?php echo $strCareer; ?>"  class="screenreader <?php echo $strLangCls; ?>"><?php echo $strCareer; ?></a></li> -->
                            <?php
                            $topListCount = 0;
                            while ($topRows = mysqli_fetch_array($topMenuResult)) {
                                $menuGlPage = (htmlspecialchars_decode($topRows['vchPageAlias'], ENT_QUOTES));

                                $menuGlName_e = ucfirst(htmlspecialchars_decode($topRows['vchTitle'], ENT_QUOTES));
                                $menuGlName_h = $topRows['vchTitleH'];
                                $menuGlName = ($_SESSION['lang'] == 'O' && $menuGlName_h != '') ? $menuGlName_h : $menuGlName_e;
                                $menuGlcls = ($_SESSION['lang'] == 'O' && $menuGlName_h != '') ? 'odia' : '';

                                $menuGlSnippet = ($_SESSION['lang'] == 'O' && $topRows['vchSnippetO'] != '') ? $topRows['vchSnippetO'] : htmlspecialchars_decode($topRows['vchSnippet'], ENT_QUOTES);
                                $menuGlSncls = ($_SESSION['lang'] == 'O' && $topRows['vchSnippetO'] != '') ? 'odia' : '';

                                $menuGlUrl = htmlspecialchars_decode($topRows['vchUrl'], ENT_QUOTES);
                                $pluginGl = htmlspecialchars_decode($topRows['vchPluginName'], ENT_QUOTES);

                                $intLinkGLType = $topRows['intLinkType'];
                                $pageId = $topRows['intPageId'];
                                $intTemplateGLType = $topRows['intTemplateType'];
                                $intGlWindownStatus = $topRows['intWindowStatus'];
                                $strPageNav = $topRows['vchPageNavigation']; //44
                                $expPageNav = (explode("/", $strPageNav));
                                $pageGLId = $strPageNav;
                                $menuGlMetaimg = ($topRows["vchMetaImage"] != '') ? APP_URL . 'uploadDocuments/banner/' . $topRows["vchMetaImage"] : SITE_URL . 'images/odisha-skilled.jpg';
                                $topListCount++;

                                $menuGlPageA = $menuGlPage;
                                $menuGlPage = ($_SESSION['lang'] == 'O') ? $menuGlPage . '-or' : $menuGlPage;

                                if ($intLinkGLType == 1) {
                                    if ($intTemplateGLType == 1 || $intTemplateGLType == 2) {
                                        $href = SITE_URL . $menuGlPage;
                                    } else if ($intTemplateGLType == 3) {
                                        $href = 'javascript:void(0);';
                                    }
                                } else if ($intLinkGLType == 2)
                                    $href = $menuGlUrl;

                                if ($intGlWindownStatus == 1)
                                    $glTargetBlank = '';
                                else
                                    $glTargetBlank = 'target="_blank"';

                                if ($page == $menuGlPageA)
                                    $activeClass = 'active';
                                else if ($id == $menuGlPageA)
                                    $activeClass = 'active';
                                else
                                    $activeClass = '';
                                ?>
                                <li class="<?php echo $activeClass; ?> mobilebtns"><a href="<?php echo $href; ?>" class="<?php echo $menuGlcls; ?>"  title="<?php echo $menuGlName_e; ?>" <?php echo $glTargetBlank; ?>><?php echo $menuGlName; ?></a></li>
                                <li></li>
                        <?php } ?>
                        </ul>
<?php } ?>
<a  class="screenReader languagemob" href="javascript:void(0);" onclick="changeLanguage('<?php echo (isset($_SESSION['lang']) && $_SESSION['lang'] == 'O') ? 'E' : 'O' ?>', '<?php echo $page; ?>', '<?php echo $webGl; ?>', '<?php echo $webPl; ?>', '<?php echo $webNid; ?>');"><?php echo ($_SESSION['lang'] == 'O') ? 'English' : '&#2835;&#2849;&#2876;&#2879;&#2822;' ?></a> 
                </div>
            </nav>
           
            <div class="search">
                <div class="input-group md-form form-sm form-2 pl-0" id="mobilesearch">
                    <input class="form-control my-0 py-1 amber-border" type="text" name="txtSearchMob" id="txtSearchMob" placeholder="Search"   aria-label="Search">
                    <div class="input-group-append toggleSearch ml-0"> 
					   	<span class="input-group-text amber lighten-3" id="basic-text1" >
							<i class="fa fa-search text-grey searchIcon" aria-hidden="true" ></i>
							<img src="<?php echo SITE_URL; ?>images/cross.png" class="hide closeIcon" alt="close image"/>
						</span> 
					</div>
                </div>
            </div>
           
            <div class="clearfix"></div>
            <form name="frmSearch" id="frmSearch" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="searchinner">
<!--                <div id="closed"><img src="<?php //echo SITE_URL; ?>images/cross.png"/></div>-->
                <div class="searchback">
                    <div class="row">
                        <div class="col-sm-9">            
                            <div class="md-form mt-0">
                                <input class="form-control" type="text" placeholder="<?php echo $strSearchInput;?>" name="txtSearch" id="txtSearch" aria-label="Search">
                            </div>      
                        </div>      
                        <div class="col-md-3"> <a href="javascript:void(0)" onClick="goToSearch('txtSearch');" class="footerbtn hvr-sweep-to-right" aria-label="<?php echo $strsearch ;?>"><?php echo $strsearch ;?></a> </div>        
                    </div> 
                    <div class="searchsection">        
                        <div class="row">
                            <div class="col-md-3">    
                                <div class="tags" id="searchKeyword">
                                    <h3><?php echo $strsearchKeyword;?></h3>
                                    <ul>
                                        <!-- <li><a href="javascript:void(0)" class="active">Search All</a></li>-->
                                        <li><a href="<?php echo SITE_URL; ?>courses" class="active"><?php echo $strcourseslbl;?></a></li>
                                        <li><a href="<?php echo SITE_URL; ?>institutes/government-iti"><?php echo $strGvtItilbl; ?></a></li>
                                        <li><a href="<?php echo SITE_URL; ?>articles"><?php echo $lblBiswa;?></a></li>
                                        <li><a href="<?php echo SITE_URL; ?>nano-unicorn"><?php echo $strNanounicornLable;?></a></li>
                                        <li><a href="<?php echo SITE_URL; ?>articles"><?php echo $lblArticle;?></a></li>
                                        <li><a href="<?php echo SITE_URL; ?>success-stories"><?php echo $strSuccessStorylbl;?></a></li>
                                        <li><a href="<?php echo SITE_URL; ?>gallery"><?php echo $ourgallerylbl;?></a></li>
                                    </ul>
                                </div>        
                            </div>      
                            <div class="col-md-9"> 
                                <h3><?php echo $strPopularPage;?></h3>
                                <div class="searchblog" id="popularPages">


                                </div>
                            </div>       
                        </div>                     
                    </div>           

                </div>                                                                                                                                                                         
            </div></form>
            <!-- #nav-menu-container -->
            <div class="clearfix"></div>
        </div>
    </div>
    <?php
    $allowBreadCrumb = array('index', 'home','register-success','index1');
    if (!in_array($page, $allowBreadCrumb)) {
        include_once('include/breadcrum.php');
    }
    ?>