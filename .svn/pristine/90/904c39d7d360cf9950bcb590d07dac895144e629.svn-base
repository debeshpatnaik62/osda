<?php
set_time_limit(0);
	/* ================================================
	File Name       : addBulkMarksInner.php
	Description			: This page is used to add bulk mark entry data.
	Developed By		: Rahul Kumar Saw
	Developed On		: 13-05-2022
	Update History		:
	<Updated by>		<Updated On>		<Remarks>

	Class Used		    : 
	Functions Used		: importTrainee(),insertTraineeDetails(),
	==================================================*/
	include_once(CLASS_PATH."clsBulk.php");
	$objBulk         		= new clsBulk;	
	$id 				    = (isset($_REQUEST['ID'])) ? $_REQUEST['ID'] : 0;
	
	$readOnly 			= '';
	$strSubmit 			= ($id > 0) ? 'Update' : 'Submit';
	$strReset 			= ($id > 0) ? 'Cancel' : 'Reset';
	$strTab 			= ($id > 0) ? 'Edit' : 'Update Bulk Marks';
	$strclick 			= ($id > 0) ? "window.location.href='" . APP_URL."updateSkillMarks/".$glId."/".$plId. "';":"$('#userImage').hide();";
	$flag 				= 0;
	$errFlag 			= 0;
	$outMsg 			= '';
	$redirectLoc		= '';
    //========== Permission ===============	
    $glId          = $_REQUEST['GL'];
    $plId          = $_REQUEST['PL'];
    $pageName      = $_REQUEST['PAGE'].'.php';
    $userId        = $_SESSION['adminConsole_userID'];   
    $explPriv      = $objBulk->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
    $noAdd         = $explPriv['add'];

	//============ Import excel file ===================
	if(isset($_POST['btnSubmit']))
	{
           $result          		= $objBulk->importBulkMarks();
           $outMsg          		=  $result['msg']; 
           $flag            		=  $result['flag'];
           $excel_data        		=  $result['excel_data'];
           $arrRow                  =  $result['arrRow'];
	}

//============ Button Submit ===================

	if(isset($_POST['btnSubmit1']))
	{
           $result          		= $objBulk->insertBulkMarksData();
           $outMsg          		=  $result['msg']; 
           $flag            		=  $result['flag'];
           $redirectLoc         =  APP_URL."updateSkillMarks/".$glId."/".$plId;
	}


	

	

?>