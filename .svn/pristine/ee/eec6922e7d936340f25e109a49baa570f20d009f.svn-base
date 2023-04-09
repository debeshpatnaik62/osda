<?php
	/* ================================================
	File Name         	: addGLInner.php
	Description		: This page is used to assign menus to global link.
	Author Name		: T Ketaki Debadarshini 
	Date Created		: 29-Aug-2015
	Update History		:
	<Updated by>		<Updated On>		<Remarks>

	Class Used		: 
	Functions Used		: webPath()
	==================================================*/
        include_once( CLASS_PATH.'clsLinks.php');
	$objGl          = new clsGlobalLink;       
        $parentId       = 0;
        $linkType       = 'globalLink';
        $pageNavigation = '';
        
        $glId		= $_REQUEST['GL'];
	$plId		= $_REQUEST['PL'];
	$pageName	= $_REQUEST['PAGE'].'.php';
	$userId       	    = USER_ID;
        $adminConsole_Privilege = ADMIN_PRIVILEGE;
        
        /* For main menu */
        if(isset($_POST['chkMainMenu']))
        {            
            $menuType = 1;
            $outMsg  = $objGl->saveMenuItems($parentId,$menuType,$linkType,$pageNavigation);            
        }
        
        /* For bottom menu */
         if(isset($_POST['chkBottomMenu']))
        {                        
            $menuType = 2;
            $outMsg  = $objGl->saveMenuItems($parentId,$menuType,$linkType,$pageNavigation);            
        }
        
        /* For top menu */
        if(isset($_POST['chkTopMenu']))
        {                        
            $menuType = 3;
            $outMsg  = $objGl->saveMenuItems($parentId,$menuType,$linkType,$pageNavigation);            
        }
        
        /* For home portlet */
       if(isset($_POST['chkHomePortlet']))
        {                         
            $menuType = 4;
            $outMsg  = $objGl->saveMenuItems($parentId,$menuType,$linkType,$pageNavigation);           
        }

?>
 