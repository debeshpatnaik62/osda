<?php 

include_once("Application/model/customModel.php");

//print_r($_REQUEST);exit;
class Controller {

    public function __construct() {
		
        $this->invoke();
    }

// === Function for call pages and created by Sunil Kumar Parida on 1-Sept-2014 ===//
    public function invoke() {
        include('config.php');
        
        
        $page 	= (isset($_REQUEST['PG']) && $_REQUEST['PG'] != '') ? $_REQUEST['PG'] : 'home';
        $id 	= (isset($_REQUEST['ID']) && $_REQUEST['ID'] > 0) ? $_REQUEST['ID'] : '0';
        $webNid = (isset($_REQUEST['NID']) && $_REQUEST['NID'] !='') ? $_REQUEST['NID'] : '';
        $webGl 	= (isset($_REQUEST['GL']) && $_REQUEST['GL'] !='') ? $_REQUEST['GL'] : '';
        $webPl  = (isset($_REQUEST['PL']) && $_REQUEST['PL'] !='') ? $_REQUEST['PL'] : '';
        $encId 	= (isset($_REQUEST['PARAM']) && $_REQUEST['PARAM'] !='') ? $_REQUEST['PARAM'] : '';
        //print_r($_REQUEST);exit;
         /*if(empty($encId) && $page =='skill-compete-register'){
            header("Location:" . SITE_URL . "error");
         }*/
       // unset($_SESSION['lang']);
        //$_SESSION['lang'] = 'E';

         if($page=='skill-development' || $page=='payment-process' || $page=='payment-response')
            {
               //set default lang english
                $_SESSION['lang']          = 'E'; 
            }
            else
            {
                //set default lang odia
                $_SESSION['lang']          =  (isset($_SESSION['lang']) && $_SESSION['lang'] !='')? $_SESSION['lang']: 'O'; 

            }
	
        /****************************/
            $strlastString              = substr($page, -3);
            if($strlastString=='-or')
                $page                   = substr($page,0,-3);
            if($webNid!=''){
                $strNidlastString       = substr($webNid,-3);
                if($strNidlastString=='-or')
                    $webNid             = substr($webNid,0,-3);
            }

           
          
         
         
        /****************************/
      
        require (CLASS_PATH.'clsLinks.php');
        
        $objHomePages             = new clsPages;
        $strPluginre              = $objHomePages->getPlugindetails($page,$webNid);
        //echo "<pre>";
        // print_r($strPluginre);exit;
        $strpgname                = '';
        if($strPluginre['intTemplateType']==2)
            $strpgname                =$strPluginre['vchPluginName'];
        else  if($strPluginre['intTemplateType']==1)
            $strpgname                ='content';
        
       
        /*********Start: get the feature image and page name details**************/
        $strPageFeatureimg        = ($strPluginre["vchFeaturedImage"]!='')?APP_URL.'uploadDocuments/featuredImage/'.$strPluginre["vchFeaturedImage"]:'';
        $strPageSnippet           = ($_SESSION['lang']=='O' && $strPluginre['vchSnippetO']!='')?$strPluginre['vchSnippetO']:htmlspecialchars_decode($strPluginre['vchSnippet'],ENT_QUOTES);
        $strPageSnptcls           = ($_SESSION['lang']=='O' && $strPluginre['vchSnippetO']!='')?'odia':'';

        $strPageTitle             = ($_SESSION['lang']=='O' && $strPluginre['vchTitleH']!='')?$strPluginre['vchTitleH']:htmlspecialchars_decode($strPluginre['vchTitle'],ENT_QUOTES);
        $strPageTtlcls            = ($_SESSION['lang']=='O' && $strPluginre['vchTitleH']!='')?'odia':'';
        $strTagline               = ($_SESSION['lang']=='O' && $strPluginre['vchTaglineO']!='')?$strPluginre['vchTaglineO']:htmlspecialchars_decode($strPluginre['vchTagline'],ENT_QUOTES);
        $strTagTtlcls             = ($_SESSION['lang']=='O' && $strPluginre['vchTaglineO']!='')?'odia':'';
        $strmetatitle             = $strPluginre['vchMetaTitle'];
        $intContentPgid           = $strPluginre['intPageId'];
        $strmetakeywords          = ($strPluginre['vchMetaKeyword']!='')?$strPluginre['vchMetaKeyword']:'OSDA, skill, Odisha, skilled, development, government, Institute, training, authority, Student';
        $strmetadescription       = ($strPluginre['vchMetaDescription']!='')?$strPluginre['vchMetaDescription']:'Odisha Skill Development Authority (OSDA) main motto is to make youth of Odisha skillful in order to  get employment opportunities & make Skilled-in-Odisha-a Global Brand';
       
        if($webNid!='' && $page!=''){
            $strnavigationres     = $objHomePages->getPlugindetails($page,'');
            $strGlPageTitle       = ($_SESSION['lang']=='O' && $strnavigationres['vchTitleH']!='')?$strnavigationres['vchTitleH']:htmlspecialchars_decode($strnavigationres['vchTitle'],ENT_QUOTES);
            $strGlPageTtlcls      = ($_SESSION['lang']=='O' && $strnavigationres['vchTitleH']!='')?'odia':'';
            $strTagline               = ($_SESSION['lang']=='O' && $strPluginre['vchTaglineO']!='')?$strPluginre['vchTaglineO']:htmlspecialchars_decode($strPluginre['vchTagline'],ENT_QUOTES);
            $strTagTtlcls             = ($_SESSION['lang']=='O' && $strPluginre['vchTaglineO']!='')?'odia':'';
            $strGlPageHref        = ($strnavigationres['vchPageAlias']!='' && $strnavigationres['intTemplateType']!=3)?SITE_URL.$strnavigationres['vchPageAlias']:'javascript:void(0);';
        } 
        
        $odiaClass=($_SESSION['lang'] == 'O')?'odia':'';
       /*********End: get the feature image and page name details**************/ 
       // echo 'gg'.$strpgname.' pp'.$page;
        //die(); 
       
         include('view/langConverter.php');
         $newSessionId           = session_id();
         $hdnPrevSessionId       = $_POST['hdnPrevSessionId'];

        
       
            if ($page == 'home') {
               include('view/indexInner.php');
               include('includes/doctype.php');
               //include('includes/header.php');
               include 'view/index.php';

           }else if ($page == 'index1') {
               include('view/indexInner.php');
               include('includes/doctype.php');
               //include('includes/header.php');
               include 'view/index1.php';

           }
           else if (file_exists("view/" . $page . ".php")) 
           { 
              
             /*  if(($hdnPrevSessionId!='' && $newSessionId == $hdnPrevSessionId) || ($hdnPrevSessionId==''))
                { */
                    //session_regenerate_id();                    
                    if (file_exists("view/" . $page . "Inner.php")) {
                       
                        include 'view/' . $page . 'Inner.php';
                    }
                    include('includes/doctype.php');
                    include 'view/' . $page . '.php';
             /*  }else if($hdnPrevSessionId!='' && ($newSessionId != $hdnPrevSessionId)){

                     echo '<script>alert("Operation failed due to session mismatch");</script>';
                     session_destroy();
                     include('includes/doctype.php');
                     include 'view/error.php';
                     exit;
                   }*/
                   
               
           }
           else if (file_exists("cronjob/" . $webNid . ".php")) 
           { 
              
                                
                    if (file_exists("cronjob/" . $webNid . "Inner.php")) {
                       
                        include 'cronjob/' . $webNid . 'Inner.php';
                    }
                    include('includes/doctype.php');
                    include 'cronjob/' . $webNid . '.php';                   
               
           }
           else if($strpgname!='' && file_exists("view/" . $strpgname . ".php" )){
               
              /* if(($hdnPrevSessionId!='' && $newSessionId == $hdnPrevSessionId) || ($hdnPrevSessionId==''))
                { 
                    //session_regenerate_id();    */                
                    if (file_exists("view/" . $strpgname . "Inner.php")) {
                        include 'view/' . $strpgname . 'Inner.php';
                    }
                    include('includes/doctype.php'); 
                   
                    include 'view/' . $strpgname . '.php';
                    
               /*  }else if($hdnPrevSessionId!='' && ($newSessionId != $hdnPrevSessionId)){

                     echo '<script>alert("Operation failed due to session mismatch");</script>';
                      session_destroy();
                     include('includes/doctype.php');
                     include 'view/error.php';
                     exit;
                 }*/
             
           }
           else if ($page == 'proxy'){
               include ('proxy.php');
           }else if ($page =='mobile-service-proxy') {            
            include ('mobile-service-proxy.php');
            }else if($page =='samp-service-proxy') { 
		    include ('samp-service-proxy.php');		
           }else {
               include('includes/doctype.php');
               //include('includes/header.php');
               include 'view/error.php';
               exit;
               //include('includes/footer.php');
           }
           
    }
   
   }
   
	