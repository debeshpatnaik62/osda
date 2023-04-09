<?php
	/* ================================================
	File Name         	: addPLInner.php
	Description		: This page is used to assign menus to Primary link.
	Author Name		: T Ketaki Debadarshini
	Date Created		: 21-Nov-2015
	Update History		:
	<Updated by>		<Updated On>		<Remarks>
	 1       T KEtaki Debadarshini   29-March-2017       Modifications to add the rimary links for the footer links
	Class Used		: clsLinks
	Functions Used		: saveMenuItems()
	==================================================*/
        include_once( CLASS_PATH.'clsLinks.php');
	$objGl              = new clsGlobalLink;  
        $linkType           = 'primaryLink';
        $menuType           = 1;
        
        $glId               = $_REQUEST['GL'];
	$plId               = $_REQUEST['PL'];
	$pageName           = $_REQUEST['PAGE'].'.php';
	$userId       	    = USER_ID;
        $adminConsole_Privilege = ADMIN_PRIVILEGE;
        
        
        if(isset($_POST['btnSaveMainMenu']))
        {
            /* For main menu */            
            $parentIds      = $_REQUEST['chkGLId'];
          
            foreach($parentIds as $glIds)
            {  
                $aryIds     = explode("_", $glIds);
             // echo '<br>'.$aryIds[0].' '.$aryIds[1];
                $outMsg     = $objGl->saveMenuItems($aryIds[0],$aryIds[1],$linkType,$aryIds[0]);
                
            }			
          		
        }  
        
	$viewGl             = $objGl->viewGL('VA', 0, 1);		
?>
 