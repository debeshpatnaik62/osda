<?php
/* ================================================
	  File Name                   : feedbackInner.php
	  Description		      : This page is to manage Feedback details
	  Date Created		      : 24-03-2017
	  Created By		      : Arpita Rath
	  Update History		  :
	  <Updated by>				<Updated On>		<Remarks>
           1      T Ketaki Debadarshini                     27-March-2017               Google recptcha implemented.
	
  ================================================== */
        include_once(CLASS_PATH.'clsFeedback.php');
        $objFeedback = new clsFeedback;

        //google recaptcha
       // require_once __DIR__ . '/../controller/autoload.php'; 

     //============ Button Submit ===================
        if (isset($_POST['btnSubmit'])) {
         // print_r($result);exit;
            $result     = $objFeedback->addFeedback();
            // print_r($result);exit;
            $outMsg     = $result['msg'];     
            $errFlag    = $result['flag'];
            $strName    = htmlspecialchars_decode($result['strName'], ENT_QUOTES);
            $strEmail   = htmlspecialchars_decode($result['strEmail'], ENT_QUOTES);
            $strPhone   = $result['strPhone'];        
            $strMessage = htmlspecialchars_decode($result['strMessage'], ENT_QUOTES);
        }    
    
      /********************************/
        $strPageFeatureimg        = ($strPageFeatureimg!='')?$strPageFeatureimg:SITE_URL.'images/banner/share-story-banner.jpg';
        $strPageTitle           = ($_SESSION['lang']=='O')?'&#2822;&#2862;&#2837;&#2881; &#2866;&#2887;&#2838;&#2856;&#2893;&#2852;&#2881;':'Write to Us';
?>