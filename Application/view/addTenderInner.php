<?php
    /* ================================================
    File Name       : addTenderInner.php
    Description		: This page is used to add Tender Details.
    Developed By	: Rasmi Ranjan Swain
    Developed On	: 02-JUN-2016
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsTender
    Functions Used	: readTender(),addUpdateTender(),
    ==================================================*/	
	//========== create object of clsTender class===============
	   include_once(CLASS_PATH.'clsTender.php'); 	
		$objTender      = new clsTender;	
        $id             = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
        $strSubmit      = ($id>0)?'Update':'Submit';
		$strReset       = ($id>0)?'Cancel':'Reset';
		$strTab         = ($id>0)?'Edit':'Add';
        $strclick       = ($id>0)?"window.location.href='". APP_URL."viewTender/".$glId."/".$plId."';":"";
        $intOfcId       =  0;

		$chk_Privilege   = ADMIN_PRIVILEGE;
	    $intPortalType   = (isset($chk_Privilege) && $chk_Privilege!=1) ? PORTAL_TYPE : 0;        
	    $intPortalDeptId = (isset($chk_Privilege) && $chk_Privilege!=1) ?  PORTAL_DEPT_ID : 0;
	    $intDeptId       = 0;
	    $strStyle        = (isset($chk_Privilege) && $chk_Privilege!=1 )?'style="display:none;"' :'';
        //========== Permission ===============	
        $glId          	 = $_REQUEST['GL'];
        $plId            = $_REQUEST['PL'];
        $pageName        = $_REQUEST['PAGE'].'.php';
        $userId          = USER_ID;
        $explPriv        = $objTender->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
        $noAdd           = $explPriv['add'];
        
        if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewTender/".$glId."/".$plId."'</script>";                     
               
	//========== Default variable ===============	
        $intPrivilege    = 0;
	    $intDepartId     = 0;	
	    $intOfcId        = 0;		
		$intWinStatus    = 1;
		$flag            = 0;  
		$errFlag         = 0;
		$intLinkType     = 1;
		$intTempletType  = 1;	
		$outMsg          = '&nbsp;';	
	//=========== For editing ======================
	if(isset($_REQUEST['ID']))
	{
        $btnValue	= 'Update';
        $strTab	 	= 'Edit';
        //============ Read value for updation ===========	
        $result          	=  $objTender->readTender($id);
        $docRes             =  $objTender->readDoc($id);
        $strTenderNo     	=  $result['strTenderNo']; 
        $intTenderType      =  $result['strTenderType'];
        $strOpeningDate 	=  $result['strOpeningDate'];
        $strClosingDate  	=  $result['strClosingDate']; 
        $strOpeningTime     =  $result['strOpeningTime'];
        $strClosingTime     =  $result['strClosingTime']; 	
        $strDescription     =  $result['strDescription'];
        $strDescriptionH    =  $result['strDescriptionH'];
		$strTenderTitle     =  $result['strTenderTitle'];
		$strTenderTitle_O   =  $result['strTenderTitle_O'];
		$intSlNo            =  $result['intSlNo'];
		$intSlNo            =  $result['intSlNo'];
		$radShowTicker      = $result['radShowTicker'];
		$redirectLoc	 	=  APP_URL."viewTender/".$glId."/".$plId."/".$id;	
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
	    $result        		=  $objTender->addUpdateTender($id);
	    $outMsg        		=  $result['msg']; 
	    $flag          		=  $result['flag'];
	    $strTenderNo     	=  $result['strTenderNo'];
	    $intTenderType      =  $result['strTenderType'];   		
		$strOpeningDate 	=  $result['strOpeningDate'];
		$strClosingDate  	=  $result['strClosingDate']; 
		$strOpeningTime     =  $result['strOpeningTime'];
		$strClosingTime     =  $result['strClosingTime']; 	
		$strDescription     =  $result['strDescription'];
		$strDescriptionH    =  $result['strDescriptionH'];	
		$strTenderTitle     =  $result['strTenderTitle'];
		$strTenderTitle_O   =  $result['strTenderTitle_O'];
        $strfileDoc         =  $result['strfileDoc']; 
        $radShowTicker      =  $result['radShowTicker'];
        $redirectLoc	 	=  APP_URL."viewTender/".$glId."/".$plId."/".$id;
	}
        ?>