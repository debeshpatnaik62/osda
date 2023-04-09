<?php
set_time_limit(0);
	/* ================================================
	File Name       : addOfflineVenueInner.php
	Description			: This page is used to add bulk venue data.
	Developed By		: Rahul Kumar Saw
	Developed On		: 06-05-2021
	Update History		:
	<Updated by>		<Updated On>		<Remarks>

	Class Used		    : 
	Functions Used		: 
	==================================================*/
	include_once(CLASS_PATH."clsVenue.php");
	$objVenue       = new clsVenue;	
	$id 				    = (isset($_REQUEST['ID'])) ? $_REQUEST['ID'] : 0;
	
	$readOnly 			= '';
	$strSubmit 			= ($id > 0) ? 'Update' : 'Submit';
	$strReset 			= ($id > 0) ? 'Cancel' : 'Reset';
	$strTab 			  = ($id > 0) ? 'Edit' : 'Add Offline Venue';
	$strclick 			= ($id > 0) ? "window.location.href='" . APP_URL."addOfflineVenue/".$glId."/".$plId. "';":"$('#userImage').hide();";
	$flag 				= 0;
	$errFlag 			= 0;
	$outMsg 			= '';
	$redirectLoc		= '';
    //========== Permission ===============	
    $glId          = $_REQUEST['GL'];
    $plId          = $_REQUEST['PL'];
    $pageName      = $_REQUEST['PAGE'].'.php';
    $userId        = $_SESSION['adminConsole_userID'];   
    $explPriv      = $objVenue->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
    $noAdd         = $explPriv['add'];

	//============ Import excel file ===================
	if(isset($_POST['btnSubmit']))
	{
           $result          		= $objVenue->importData();
           $outMsg          		=  $result['msg']; 
           $flag            		=  $result['flag'];
           $excel_data        	=  $result['excel_data'];
           $arrRow              =  $result['arrRow'];
	}

//============ Button Submit ===================

	if(isset($_POST['btnSubmit1']))
	{
           $result          		= $objVenue->insertVenueData();
           $outMsg          		=  $result['msg']; 
           $flag            		=  $result['flag'];
           $redirectLoc             =  APP_URL."addOfflineVenue/".$glId."/".$plId;
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