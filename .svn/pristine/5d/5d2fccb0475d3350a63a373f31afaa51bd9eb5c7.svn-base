<?php
	/* ================================================
	File Name         	: addPageInner.php
	Description		: This page is used to add pages.
	Developed By		: T Ketaki Debadarshini
	Developed On		: 23-Nov-2015
	Update History		:
	<Updated by>		<Updated On>		<Remarks>

	Class Used		: clsPages
	Functions Used		: readPage(),addUpdatePages(),
	==================================================*/	
	include_once( CLASS_PATH.'clsLinks.php');
	$objPages       = new clsPages;	
        $id             = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
        $strSubmit      =($id>0)?'Update':'Submit';
	$strReset       =($id>0)?'Cancel':'Reset';
	$strTab         =($id>0)?'Edit':'Add';
        $abs_Path       = SITE_PATH; 
         //$intPageNo      = $objPages->getMaxPage($id);
	//========== Default variable ===============				
	$intWinStatus       = 1;
	$flag               = 0;  
        $errFlag            = 0;
        $intLinkType        = 1;
        $tinShowpanel        = 1;
        $intTempletType      = 1;
	$outMsg             = '';	
        $strURL             = 'http://';
        //=========== For Permission======================
        $glId               = $_REQUEST['GL'];
        $plId               = $_REQUEST['PL'];
        $strclick           =($id>0)?"window.location.href='". APP_URL."viewPage/".$glId."/".$plId."';":"$('#imageFile').hide();$('#imagemetaFile').hide();";
        $userId             = $_SESSION['adminConsole_userID'];
        $explPriv           = $objPages->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
        $noAdd              = $explPriv['add'];
        
         if($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewPage/".$glId."/".$plId. "'</script>"; 

	//=========== For editing ======================
	if(isset($_REQUEST['ID']))
	{   
            //============ Read value for updation ===========	
            $result          = $objPages->readPage($id);
            $strTitleE       =  $result['strTitleE']; 
            $strTitleO       =  $result['strTitleH']; 
            $strTagline      =  $result['strTagline'];
            $strTaglineO      =  $result['strTaglineO'];
            $intLinkType     =  $result['intLinkType'];
            $strFileName     =  $result['strFileName'];
            $strURL          =  $result['strUrl'];
            $intTempletType  =  $result['intTempletType'];
            $strContentE     =  $result['strContentE'];
            $strContentH     = $result['strContentH'];
            $strPluginName   =  $result['strPluginName'];
            $intWinStatus    =  $result['intWinStatus'];
            $strPageAlias    =  $result['strPageAlias'];
            $strMetaKeyword  =  $result['strMetaKeyword'];
            $strMetaDescription  =  $result['strMetaDescription'];
            $strMetaType     =  $result['strMetaType'];            
            $strMetaImage    =  $result['strMetaImage'];
            $strMetaTitle    =  $result['strMetaTitle'];
            $strSnippet    =  $result['strSnippet'];
            $strSnippetO    =  $result['strSnippetH'];
            $tinShowpanel    =  $result['tinShowpanel'];
            
            $redirectLoc	=  APP_URL."viewPage/".$glId."/".$plId;
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
          // exit("++++++++++++++++");
           
           $result          = $objPages->addUpdatePages($id);
           $outMsg          =  $result['msg']; 
           $flag            =  $result['flag'];
           $strTitleE       =  $result['strTitleE'];
           $strTagline      =  $result['strTagline'];
           $strTaglineO      =  $result['strTaglineO'];
           $intLinkType     =  $result['intLinkType'];
           $strFileName     =  $result['strFileName'];
           $strURL          =  $result['strUrl'];
           $intTempletType  =  $result['intTempletType'];
           $strContentE     =  $result['strContentE'];          
           $strPluginName   =  $result['strPluginName'];
           $intWinStatus    =  $result['intWinStatus'];
           $strSnippet      =  $result['strSnippet'];
            if(($flag==0) && ($id >0))
               $redirectLoc	=  APP_URL."viewPage/".$glId."/".$plId;  
            else if($flag==0 && $id==0)  
                $redirectLoc	=  APP_URL."viewPage/".$glId."/".$plId;
           
	}
       
?>