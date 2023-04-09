<?php 

include_once("Application/model/customModel.php");


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
        $webPl 	= (isset($_REQUEST['PL']) && $_REQUEST['PL'] !='') ? $_REQUEST['PL'] : '';
        
        /****************************/
            $strlastString  = substr($page, -3);
            if($strlastString=='-or')
                $page           = rtrim($page,$strlastString);
            if($webNid!=''){
                $strNidlastString  = substr($webNid, -3);
                if($strNidlastString=='-or')
                    $webNid           = rtrim($webNid,$strNidlastString);
            }
        /****************************/
       
        require (CLASS_PATH.'clsLinks.php');
        $objHomePages       = new clsPages;
        $strPluginre        = $objHomePages->getPlugindetails($page,$webNid);
        $strpgname          =($strPluginre['intTemplateType']==2)?$strPluginre['vchPluginName']:'content';
        /*********Start: get the feature image and page name details**************/
        $strPageFeatureimg        = ($strPluginre["vchFeaturedImage"]!='')?APP_URL.'uploadDocuments/featuredImage/'.$strPluginre["vchFeaturedImage"]:'';
        $strPageSnippet           = ($_SESSION['lang']=='O' && $strPluginre['vchSnippetO']!='')?$strPluginre['vchSnippetO']:htmlspecialchars_decode($strPluginre['vchSnippet'],ENT_QUOTES);
        $strPageSnptcls           = ($_SESSION['lang']=='O' && $strPluginre['vchSnippetO']!='')?'odia':'';

        $strPageTitle             = ($_SESSION['lang']=='O' && $strPluginre['vchTitleH']!='')?$strPluginre['vchTitleH']:htmlspecialchars_decode($strPluginre['vchTitle'],ENT_QUOTES);
        $strPageTtlcls            = ($_SESSION['lang']=='O' && $strPluginre['vchTitleH']!='')?'odia':'';
        
        if($webNid!='' && $page!=''){
            $strnavigationres     = $objHomePages->getPlugindetails($page,'');

            $strGlPageTitle       = ($_SESSION['lang']=='O' && $strnavigationres['vchTitleH']!='')?$strnavigationres['vchTitleH']:htmlspecialchars_decode($strnavigationres['vchTitle'],ENT_QUOTES);
            $strGlPageTtlcls      = ($_SESSION['lang']=='O' && $strnavigationres['vchTitleH']!='')?'odia':'';

        }  
       /*********End: get the feature image and page name details**************/ 
       // echo $strpgname.' '.$_REQUEST['PG'];
		 if ($_REQUEST['PG'] == 'index-or') {
          include('view/indexInner.php');
          include('includes/doctype.php');
	    //include('includes/header.php');
            include 'view/index-or.php';
            
        }else if ($page == 'home') {
            //include('view/indexInner.php');
          include('includes/doctype.php');
	    //include('includes/header.php');
            include 'view/index.php';
            
        }
        else if (file_exists("view/" . $page . ".php")) 
	{ 
            if (file_exists("view/" . $page . "Inner.php")) {
                include 'view/' . $page . 'Inner.php';
            }
            include('includes/doctype.php');
            include 'view/' . $page . '.php';
        }else if($strpgname!='' && file_exists("view/" . $strpgname . ".php")){
            
            
            if (file_exists("view/" . $strpgname . "Inner.php")) {
                include 'view/' . $strpgname . 'Inner.php';
            }
             
            include('includes/doctype.php');
            include 'view/' . $strpgname . '.php';
        }
	else if ($page == 'proxy')
            include ('proxy.php');
        else {
            include('includes/doctype.php');
            //include('includes/header.php');
            //include 'view/error.php';
            //include('includes/footer.php');
        }
    }
   
   }
   
	