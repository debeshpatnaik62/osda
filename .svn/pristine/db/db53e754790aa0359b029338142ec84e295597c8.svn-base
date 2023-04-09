<?php
set_time_limit(0);
	/* ================================================
	File Name       : addOfflineResultInner.php
	Description			: This page is used to add bulk result data.
	Developed By		: Rahul Kumar Saw
	Developed On		: 28-07-2021
	Update History		:
	<Updated by>		<Updated On>		<Remarks>

	Class Used		    : 
	Functions Used		: 
	==================================================*/
	include_once(CLASS_PATH."clsResult.php");
	$objResult       = new clsResult;	
	$id 				    = (isset($_REQUEST['ID'])) ? $_REQUEST['ID'] : 0;
	
	$readOnly 			= '';
	$strSubmit 			= ($id > 0) ? 'Update' : 'Submit';
	$strReset 			= ($id > 0) ? 'Cancel' : 'Reset';
	$strTab 			  = ($id > 0) ? 'Edit' : 'Add Offline Result';
	$strclick 			= ($id > 0) ? "window.location.href='" . APP_URL."addOfflineResult/".$glId."/".$plId. "';":"$('#userImage').hide();";
	$flag 				= 0;
	$errFlag 			= 0;
	$outMsg 			= '';
	$redirectLoc		= '';
    //========== Permission ===============	
    $glId          = $_REQUEST['GL'];
    $plId          = $_REQUEST['PL'];
    $pageName      = $_REQUEST['PAGE'].'.php';
    $userId        = $_SESSION['adminConsole_userID'];   
    $explPriv      = $objResult->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
    $noAdd         = $explPriv['add'];

	//============ Import excel file ===================
	if(isset($_POST['btnSubmit']))
	{
           $result          		= $objResult->importData();
           $outMsg          		=  $result['msg']; 
           $flag            		=  $result['flag'];
           $excel_data        	=  $result['excel_data'];
           $arrRow              =  $result['arrRow'];
	}

//============ Button Submit ===================

	if(isset($_POST['btnSubmit1']))
	{
           $result          		= $objResult->insertResultData();
           $outMsg          		=  $result['msg']; 
           $flag            		=  $result['flag'];
          // $redirectLoc             =  APP_URL."viewVenue/".$glId."/".$plId;
	}	

?>