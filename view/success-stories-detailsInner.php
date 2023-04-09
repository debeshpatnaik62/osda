<?php
 /* ================================================
	  ' File Name		  	: success-storiesInner.php
	  ' Description 	  	: Website Success story  Inner Page
	  ' Developed by          	: Ashis kumar Patra
	  ' Developed on          	: 10-12-2018
	  ' Modification History  	: 
	  ' Modified by             : 
	  ' <Updated By>           	  <Date>                  <Updated Summary>'  
  ================================================== */
       include_once( CLASS_PATH.'clsStory.php');
       $objStory           = new clsStory;
       //echo $_REQUEST['NID'];exit;
       $strStoryAlias     = (isset($_REQUEST['NID']))?htmlspecialchars(trim($_REQUEST['NID']), ENT_QUOTES):'';
  
        $totalStoryRes           = $objStory->manageStory('V',0,'','','','','','','','','',0,'','','','','',2,0,0,0,0);       
        $intTotalRec             = $totalStoryRes->num_rows; 
        $storyArray=array();
        if($intTotalRec>0){
              while ($row = $totalStoryRes->fetch_array()) {
                 array_push($storyArray,$row['vchAlias']);
              }
        }
        $k             = array_rand($storyArray);
        $strStoryAlias = ($strStoryAlias!='')?$strStoryAlias:$storyArray[$k];
       
    
        //*******************get course details**************/
        if($strStoryAlias!='')
	{
            $storyresult              = $objStory->readStoryByAlias($strStoryAlias);
            $intPersonId=$storyresult['intStoryId'];
           
            //get tag line of my story  
            $strPluginInneres         = $objHomePages->getPlugindetailsbyPlugName('success-stories');
           
            /*********Start: get the feature image and page name details**************/
            $strPlPageTitle           = ($_SESSION['lang']=='O' && $strPluginInneres['vchTitleH']!='')?$strPluginInneres['vchTitleH']:htmlspecialchars_decode($strPluginInneres['vchTitle'],ENT_QUOTES);          
            $strTagline               = ($_SESSION['lang']=='O' && $strPluginInneres['vchTaglineO']!='')?$strPluginInneres['vchTaglineO']:htmlspecialchars_decode($strPluginInneres['vchTagline'],ENT_QUOTES);
            $strTagTtlcls             = ($_SESSION['lang']=='O' && $strPluginInneres['vchTaglineO']!='')?'odia':'';
            
            $strmetatitle             = $strPluginInneres['vchMetaTitle'].' | Share your Story | '.htmlspecialchars_decode($storyresult['vchNameE'],ENT_QUOTES);
            $strmetakeywords          = ($strPluginInneres['vchMetaKeyword']!='')?$strPluginInneres['vchMetaKeyword'].' | Share your Story | '.htmlspecialchars_decode($storyresult['vchNameE'],ENT_QUOTES):'Share your Story | '.htmlspecialchars_decode($storyresult['vchNameE'],ENT_QUOTES);
            $strmetadescription       = ($strPluginInneres['vchMetaDescription']!='')?$strPluginInneres['vchMetaDescription'].' | Share your Story | '.htmlspecialchars_decode($storyresult['vchNameE'],ENT_QUOTES):'Share your Story | '.htmlspecialchars_decode($storyresult['vchNameE'],ENT_QUOTES);
            
            $strPageFeatureimg        = ($strPluginInneres["vchFeaturedImage"]!='')?APP_URL.'uploadDocuments/featuredImage/'.$strPluginInneres["vchFeaturedImage"]:'';
	}
       
        
        /******************************/
        $strPageFeatureimg        = ($strPageFeatureimg!='')?$strPageFeatureimg:SITE_URL.'images/banner/my-story-banner.jpg';   
        
        $strStoryname              = ($_SESSION['lang']=='O' && $storyresult['vchNameO']!='')?$storyresult['vchNameO']:htmlspecialchars_decode($storyresult['vchNameE'],ENT_QUOTES);
        $strcls                    = ($_SESSION['lang']=='O' && $instresult['vchNameO']!='')?'odia':'';
         
         
         $strGlPageTitle           = '';
        // $strPlPageTitle           = ($_SESSION['lang']=='O')?'&#2862;&#2891; &#2837;&#2878;&#2873;&#2878;&#2851;&#2880;':'My Story';
         $strPageTtlcls            = ($strPageTtlcls=='')?$strcls:$strPageTtlcls;
         $strPageTitle             = ($strPageTitle=='')?$strStoryname:$strPageTitle;
         $strGlPageHref            = 'javascript:void(0);';
         $strPlPageHref            = ($_SESSION['lang']=='O')?SITE_URL.'resources/success-stories':SITE_URL.'resources/success-stories';
     
         
         
         
         
?>