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
           
            //get tag line of my story  
           
	}
       
        
        /******************************/
        $strPageFeatureimg        = ($strPageFeatureimg!='')?$strPageFeatureimg:SITE_URL.'images/banner/my-story-banner.jpg';   
        
        $strStoryname              = ($_SESSION['lang']=='O' && $storyresult['vchNameO']!='')?$storyresult['vchNameO']:htmlspecialchars_decode($storyresult['vchNameE'],ENT_QUOTES);
        $strcls                    = ($_SESSION['lang']=='O' && $instresult['vchNameO']!='')?'odia':'';
         
         
//         $strGlPageTitle           = $strSuccessStorylbl;
//         $strPageTtlcls            = ($strPageTtlcls=='')?$strcls:$strPageTtlcls;
//         $strPageTitle             = ($strPageTitle=='')?$strStoryname:$strPageTitle;
//         $strGlPageHref            = 'javascript:void(0);';
//         $strPlPageHref            = ($_SESSION['lang']=='O')?SITE_URL.'success-story/my-story-or':SITE_URL.'success-story/my-story';
//     
//         
         
         
         
?>