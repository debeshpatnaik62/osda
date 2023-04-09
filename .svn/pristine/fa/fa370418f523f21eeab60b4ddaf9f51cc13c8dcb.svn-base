<?php
/* ------------------------------------------------------------------------
      File Name           : gallery-details-inner.php
      Description         : This page is to view photo .
      Author Name         : Ashis kumar Patra.
      Date Created        : 18-12-2018
      Update History      :
      <Updated by>           <Updated On>       <Remarks>
 -------------------------------------------------------------------------- */
   //========= include class for gallery ===========//
      
        include_once(CLASS_PATH.'clsGallery.php');
         //print_r($_REQUEST);exit;
  //======== create object ==================//        
        $objGal  = new clsGallery;
         $objGallerycat	= new clsGalleryCategory;

        $intGalleryCatId  = (isset($_REQUEST['NID']) && is_numeric($_REQUEST['NID']) != '')?$_REQUEST['NID']:0; 
        //echo  $intGalleryCatId;exit;     
        
        $catResult = $objGallerycat->manageGalleryCategory('FM',0,0,'','','','',0,0);
        
        
       //*******************get course details**************/
        
           
            //get tag line of my story  
            $strPluginInneres         = $objHomePages->getPlugindetailsbyPlugName('gallery-details');
            /*********Start: get the feature image and page name details**************/
            $strPlPageTitle           = ($_SESSION['lang']=='O' && $strPluginInneres['vchTitleH']!='')?$strPluginInneres['vchTitleH']:htmlspecialchars_decode($strPluginInneres['vchTitle'],ENT_QUOTES);          
            $strTagline               = ($_SESSION['lang']=='O' && $strPluginInneres['vchTaglineO']!='')?$strPluginInneres['vchTaglineO']:htmlspecialchars_decode($strPluginInneres['vchTagline'],ENT_QUOTES);
            $strTagTtlcls             = ($_SESSION['lang']=='O' && $strPluginInneres['vchTaglineO']!='')?'odia':'';
          
        
        /******************************/
                $strPageFeatureimg        = ($strPageFeatureimg!='')?$strPageFeatureimg:SITE_URL.'images/banner/my-story-banner.jpg';   
        
       
         $strGlPageTitle           = ($_SESSION['lang']=='O')?'&#2864;&#2879;&#2872;&#2891;&#2864;&#2893;&#2872;&#2887;&#2872;':'RESOURCES';
         $strPlPageTitle           = ($_SESSION['lang']=='O')?'&#2821;&#2849;&#2879;&#2835; &#2861;&#2879;&#2844;&#2881;&#2822;&#2866; &#2839;&#2893;&#2911;&#2878;&#2866;&#2887;&#2864;&#2880;':'AV Gallery';
         $strPageTtlcls            = ($strPageTtlcls=='')?$strcls:$strPageTtlcls;
         $galleryTitle=($_SESSION['lang']=='E')?'Gallery':'&#2839;&#2893;&#2911;&#2878;&#2866;&#2887;&#2864;&#2880;';
         $strPageTitle             = ($strPageTitle=='')?$galleryTitle:$strPageTitle;
         $strGlPageHref            = 'javascript:void(0);';
         $strPlPageHref            = ($_SESSION['lang']=='O')?SITE_URL.'resources/av-gallery':SITE_URL.'resources/av-gallery';
 ?>