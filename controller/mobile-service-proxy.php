<?php
    /* ================================================
	File Name         : mobile-service-proxy.php
	Description		  : Page to manage mobile web services.
	Date Created	  : 20-Jan-2022
	Developed By	  : Rahul Kumar Saw    
	Update History	  :
	<Updated by>		    <Updated On>		<Remarks>
	includes          : mobile-service-classBind.php
    ==================================================*/
	
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: X-Requested-With");
    header("Cache-Control: max-age=2592000");
   
    $data 	    = json_decode(file_get_contents('php://input'));
    $basicAuthUser    = $_SERVER['PHP_AUTH_USER'];
    $basicAuthPass    = $_SERVER['PHP_AUTH_PW'];
    $authToken        = $_SERVER['HTTP_AUTH_TOKEN'];
    //print_r($_SERVER['HTTP_AUTH_TOKEN']);exit;
    $mobCase	= $data->{'method'};

    if (BASIC_AUTH_ID == $basicAuthUser && BASIC_AUTH_PWD == $basicAuthPass) {

	require ("mobile-service-classBind.php");
    $objClassBind	= new clsServiceClassBind;
  //print_r($data->mobileNumber);exit;
    switch($mobCase){
          
        case "getToken":
            //$token        = $data->{'auth_token'};
            $objClassBind->verifyToken(); 
        break;
        case "generateOTP":
            $userId        = $data->{'user_name'};
            $objClassBind->generateOTP($userId,$authToken); 
        break;

        case "makeLogin":
            $userId        = $data->{'user_name'};
            $password      = $data->{'otp'};
            $objClassBind->mobileLogin($userId,$password,$authToken); 
        break;

        case "approvedCandidate":
            $officerId     = $data->{'officer_id'};
            $level         = $data->{'officer_level'};
            $regdNo        = $data->{'candidate_reg_no'};
            $objClassBind->approvedCandidate($officerId,$level,$regdNo,$authToken);	
        break;	

        case "rejectCandidate":
            $officerId     = $data->{'officer_id'};
            $level         = $data->{'officer_level'};
            $regdNo        = $data->{'candidate_reg_no'};
            $reason        = $data->{'reject_reason'};
            $objClassBind->rejectCandidate($officerId,$level,$regdNo,$reason,$authToken);   
        break; 

        case "viewAttandanceList":
            $officerId     = $data->{'officer_id'};
            $level         = $data->{'officer_level'};
            $objClassBind->viewAttandanceList($officerId,$level,$authToken);   
        break;

        case "submitAttendanceList":
            $officerId      = $data->{'officer_id'};
            $level          = $data->{'officer_level'};
            $attendanceList = $data->{'attendanceList'};
            $objClassBind->syncAttendanceList($officerId,$level,$attendanceList,$authToken);   
        break;

        case "changePassword":
            $officerId      = $data->{'officer_id'};
            $level          = $data->{'officer_level'};
            $oldPwd         = $data->{'old_password'};
            $newPwd         = $data->{'new_password'};
            //$confirmPwd     = $data->{'confirm_password'};
            $objClassBind->changePassword($officerId,$level,$oldPwd,$newPwd,$authToken);   
        break;  
	
        }
    
    }
    else
    {
        echo json_encode(array('statusCode' => '409','status' => 'Invalid Authentication.'));exit;
    }

?>