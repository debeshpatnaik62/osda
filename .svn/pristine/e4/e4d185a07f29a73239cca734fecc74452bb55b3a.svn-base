<?php
set_time_limit(0);
	/* ================================================
	File Name         	: addBulkDataInner.php
	Description			: This page is used to add bulk sap data.
	Developed By		: Rahul Kumar Saw
	Developed On		: 10-11-2020
	Update History		:
	<Updated by>		<Updated On>		<Remarks>

	Class Used		    : 
	Functions Used		: importTrainee(),insertTraineeDetails(),
	==================================================*/
	include_once(CLASS_PATH."clsSapBulk.php");
	$objBulk         		= new clsSapBulk;	
	$id 				    = (isset($_REQUEST['ID'])) ? $_REQUEST['ID'] : 0;
	
	$readOnly 			= '';
	$strSubmit 			= ($id > 0) ? 'Update' : 'Submit';
	$strReset 			= ($id > 0) ? 'Cancel' : 'Reset';
	$strTab 			= ($id > 0) ? 'Edit' : 'Add';
	$strclick 			= ($id > 0) ? "window.location.href='" . APP_URL."addBulkData/".$glId."/".$plId. "';":"$('#userImage').hide();";
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
           $result          		= $objBulk->importData();
           $outMsg          		=  $result['msg']; 
           $flag            		=  $result['flag'];
           $excel_data        		=  $result['excel_data'];
           $arrRow                  =  $result['arrRow'];
	}

//============ Button Submit ===================

	if(isset($_POST['btnSubmit1']))
	{
           $result          		= $objBulk->insertRegistrationData();
           $outMsg          		=  $result['msg']; 
           $flag            		=  $result['flag'];
           $redirectLoc             =  APP_URL."addBulkData/".$glId."/".$plId;
           /*$dupDistrict             =  $result['dupDistrict'];
           $dupBlock                 =  $result['dupBlock'];
           $dupGp          			=  $result['dupGp'];
           $dupVillage                 =  $result['dupVillage'];
           $dupSex1          		=  $result['dupSex1'];
           $dupName                 =  $result['dupName'];
           $dupHusband          	=  $result['dupHusband'];
           $dupPhnNo                 =  $result['dupPhnNo'];
           $dupAdhar          		=  $result['dupAdhar'];
           $dupEmail                 =  $result['dupEmail'];
           $dupDob1          		=  $result['dupDob1'];
           $dupDoj1                 =  $result['dupDoj1'];
           $dupCategory          	=  $result['dupCategory'];
           $dupExpInMonth                 =  $result['dupExpInMonth'];
           $dupQualification          =  $result['dupQualification'];
           $dupAddress                 =  $result['dupAddress'];
           $dupPinCode          	=  $result['dupPinCode'];
           $dupType                 =  $result['dupType'];
           $dupInstName          	=  $result['dupInstName'];
           $dupStartDate                 =  $result['dupStartDate'];
           $dupEndDate          	=  $result['dupEndDate'];*/
	}


	

	

?>