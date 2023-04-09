<?php

/* ================================================
  File Name           : mobile-service-classBind.php
  Description		  : Page to manage mobile web services.
  Date Created		  : 20-Jan-2022
  Developed By		  : Rahul Kumar Saw
  Update History      :
  <Updated by>		    <Updated On>		<Remarks>

  includes            : customModel.php
  ================================================== */
//error_reporting(0);
//include_once("model/customModel.php");
error_reporting(E_ALL-E_NOTICE-E_WARNING);
ini_set("display_errors", 0);

class clsServiceClassBind extends Model {

  public function verifyToken() {

            $headers  = array('alg' => 'SHA256');
            $key    = BASIC_AUTH_PWD;
            $payload = array('UserName' => BASIC_AUTH_ID, 'time' => time(), 'random' => rand(111111, 999999));

            $headers_encoded = $this->base64url_encode(json_encode($headers));
            $payload_encoded = $this->base64url_encode(json_encode($payload));
            $signature = hash_hmac('SHA256', $headers_encoded . $payload_encoded, $key, true);
            $signature_encoded = $this->base64url_encode($signature);
            $token = "$headers_encoded.$payload_encoded.$signature_encoded";
            $_SESSION["token"] = $token;
            echo json_encode(array('statusCode' => '200','status' => 'Token generated successfully','token'=>$token));

        }
    
    public function generateOTP($userId,$authToken) {
		
            $token = $_SESSION["token"];
            if($authToken==$token)
            {
            include_once( CLASS_PATH.'clsVenue.php');
		        $objVenue     = new clsVenue;
            if($userId == '')
            {
                echo json_encode(array('status'=>'Please enter registered mobile number'));
            }
            else
            {
              $resultUser = $objVenue->manageVenue('VVU',0,0,'','','',$userId,'',0,'','',0,0,0,0);
              if($resultUser->num_rows>0)
              {
              $randomNumber = rand(1000,9999);
              $result = $objVenue->manageVenue('ATP',0,$randomNumber,'','','',$userId,'',0,'','',0,0,0,0);
              if(SEND_MESSAGE=='N')
                { 
                        $templateId  = '1007214636510605231';
                        
                        $mobileMessage = 'Your OTP to log in to your account is '.$randomNumber.'. Do not share your OTP with anyone. Team OSDA';
                         $mobileNo=$mobileNo.",";
                         $sms = Model::sendSkillSMS($mobileNo,$mobileMessage,$templateId);                                  
                        echo json_encode(array('statusCode' => '200','status' => 'Your OTP send in your registraed mobile number.','OTP'=>$randomNumber));
                }
                else
                {
                   echo json_encode(array('statusCode' => '400','status' => 'Please enter registered mobile number'));
                }
              }
              else
              {
                echo json_encode(array('statusCode' => '202','status'=>'Please enter registered mobile number'));exit;
              }
            }
            }
            else
            {
              echo json_encode(array('statusCode' =>'402' ,'status'=>'Invalid token'));exit;
            }
        }

        public function mobileLogin($userId,$otp,$authToken) {
    //echo "hii123";exit;
            $token = $_SESSION["token"];
            if($authToken==$token)
            {
            $p_arr  = array();
            include_once( CLASS_PATH.'clsVenue.php');
            $objVenue     = new clsVenue;
            if($userId == '' && $otp == '')
            {
                echo json_encode(array('status'=>'Some inputs are missing. Please check.'));
            }
            else
            {
              $result = $objVenue->manageVenue('L',0,0,'','','',$userId,'',0,'','',0,0,0,0);
               
                    if($result->num_rows>0)
                    { 
                        $row            = $result->fetch_array();
                       
                        $venueId        = $row["intVenueId"];
                        $strVenueName   = $row["vchVenueName"]; 
                        $strFullname    = $row['vchOfficerName'];
                        $emaiId         = $row['vchEmailId'];   
                        $strMobileNo    = $row['vchOfficerMobile']; 
                        $strotp         = $row['intOtp'];
                        $pubstatus      = $row['tinPublishStatus']; 
                        $level          = $row['intLevel']; 

                      
                        if($otp ==$strotp )   
                         {
                         if($pubstatus ==2)
                         {  
                            $p_arr['officer_id']            = $venueId;
                            $p_arr['officer_name']          = $strFullname;
                            $p_arr['officer_phone']         = $strMobileNo;
                            $p_arr['officer_level']         = $level;
                           echo json_encode(array('statusCode' => '200','status' => 'Login successfully','officerDetails' => $p_arr));
                        }
                        else 
                        {
                          $out_msg = 'You are not Authorised User';
                          echo json_encode(array('statusCode' => '400','status' => 'failed','officerDetails' => $out_msg));
                        }
                      }
                        else
                        {
                          $out_msg = 'Please enter valid otp';
                            echo json_encode(array('statusCode' => '500','status' => 'failed','officerDetails' => $out_msg));
                        }
                    }
                    else
                    { 
                      $resultLevel  = $objVenue->manageVenue('LL',0,0,'','','',$userId,'',0,'','',0,0,0,0);
                      if($resultLevel->num_rows>0)
                      { 
                        $rowlevel       = $resultLevel->fetch_array();
                       
                        //$panelId    = $rowlevel["intPanelId"];
                        $venueId        = $rowlevel["intVenueId"];
                        $strVenueName   = $rowlevel["vchVenueName"]; 
                        $strFullname    = $rowlevel['vchOfficerName'];
                        $emaiId         = $rowlevel['vchEmailId'];   
                        $strMobileNo    = $rowlevel['vchOfficerMobile']; 
                        $strotp         = $rowlevel['intOtp'];
                        $pubstatus      = $rowlevel['tinPublishStatus']; 
                        $level          = $rowlevel['intLevel']; 

                        /*$panelId        = $rowlevel["intId"]; 
                        $strFullname    = $rowlevel['vchMemberName'];
                        $emaiId         = $rowlevel['vchMemberEmail'];    
                        $strMobileNo    = $rowlevel['vchMemberMobile']; 
                        $strotp         = $rowlevel['intOtp']; 
                        $level          = $rowlevel['intLevel'];  */

                      //echo $otp.' =='.$strotp;exit;
                        if($otp ==$strotp )   
                         {
                           
                            $p_arr['officer_id']            = $venueId;
                            $p_arr['officer_name']          = $strFullname;
                            $p_arr['officer_phone']         = $strMobileNo;
                            $p_arr['officer_level']         = $level;
                           echo json_encode(array('statusCode' => '200','status' => 'Login successfully','officerDetails' => $p_arr));
                      }
                        else
                        {
                          $out_msg = 'Please enter valid otp';
                            echo json_encode(array('statusCode' => '400','status' => 'failed','officerDetails' => $out_msg));
                        }
                    }
                    else{

                      $out_msg = 'Invalid Authentication.';
                            echo json_encode(array('statusCode' => '500','status' => 'failed','officerDetails' => $out_msg));
                        }
                    }
              }
            }
            else
            {
              echo json_encode(array('statusCode' =>'402' ,'status'=>'Invalid token'));exit;
            }
        }

    public function approvedCandidate($officerId,$level, $regdNo,$authToken ){ 
	     
       $token = $_SESSION["token"];
          if($authToken==$token)
          {
	 
      		if ($officerId == '' && $regdNo == '') {

      		    echo json_encode(array('error' => 'Some inputs are missing. Please check.'));
             
      	    } else {
      			
      			include_once( CLASS_PATH . 'clsVenueTagged.php');
      			$objVenue = new clsVenueTagged;
                 	$approveStatus = 1;
                  $result   = $objVenue->manageVenueTagged('UA',0,$regdNo,$approveStatus,0,0,0,'1000-01-01','00:00:00',$officerId,'','',0); 
      			
      			if ($result) {

              $numRow = $result->fetch_array();
              $intStatus = $numRow[0];	

              if($intStatus==0){
      				echo json_encode(array('statusCode' => '200','message'=>'Success'));		
      				}
      				else
      				{
      					echo json_encode(array('statusCode' => '400','status'=>'Failed'));
      				}		
      				
      			}
      		  }

          }
            else
            {
              echo json_encode(array('statusCode' =>'402' ,'status'=>'Invalid token'));exit;
            }
    }

    public function rejectCandidate($officerId,$level, $regdNo ,$reason,$authToken){ 
	   
	   $token = $_SESSION["token"];
          if($authToken==$token)
          {
      		if ($officerId == '' && $regdNo == '' && $reason=='') {

      		    echo json_encode(array('error' => 'Some inputs are missing. Please check.'));
             
      	    } else {
      			
      			include_once( CLASS_PATH . 'clsVenueTagged.php');
      			$objVenue = new clsVenueTagged;
                 	$approveStatus = 2;
                  $result   = $objVenue->manageVenueTagged('UA',0,$regdNo,$approveStatus,0,0,0,'1000-01-01','00:00:00',$officerId,$reason,'',0); 
      			
      			if ($result) {

                              $numRow = $result->fetch_array();
                              $intStatus = $numRow[0];	

                      if($intStatus==0){
      				echo json_encode(array('statusCode' => '200','message'=>'Success'));		
      				}
      				else
      				{
      					echo json_encode(array('statusCode' => '400','status'=>'Failed'));
      				}		
      				
      			}
      		}

          }
            else
            {
              echo json_encode(array('statusCode' =>'402' ,'status'=>'Invalid token'));exit;
            }
    }


    public function viewAttandanceList($officerId,$level,$authToken){ 
	   
     $token = $_SESSION["token"];
          if($authToken==$token)
          {
	 
    		if ($officerId == '' && $level=='') {

    		    echo json_encode(array('error' => 'Some inputs are missing. Please check.'));
           
    	    } else {
    			$p_arr  = array();
    			$q_arr  = array();
    			include_once( CLASS_PATH . 'clsVenueTagged.php');
    			$objVenue = new clsVenueTagged;
          $userId = $officerId;
               	/*if($level=='L1')
               	{
               		$userId = $officerId;
               	} else if($level=='L2')
               	{	
               		$resultP   = $objVenue->manageVenueTagged('FPA',$officerId,'',0,0,0,0,'1000-01-01','00:00:00',0,'','',0);
               		$numRow = $resultP->fetch_array();
                    $userId = $numRow[0];

               	}*/
                include_once(CLASS_PATH . 'clsSkillCompetition.php');
                $objCompete   = new  clsSkillCompetition;
                $resultStatus = $objCompete->manageSkillCompetition('REE',0, 0, 0, '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00');
                    if (mysqli_num_rows($resultStatus) > 0) {

                        $rowS              = mysqli_fetch_array($resultStatus);
                        $intPhaseId        = $rowS['intId'];        
                        $phaseYear         = $rowS['vchPhaseYear'];        
                    }
              $result   = $objVenue->manageVenueTagged('FA',0,'',0,0,0,0,'1000-01-01','00:00:00',$userId,$level,'',$intPhaseId); 
    			
    			if ($result->num_rows > 0) 
    	        {
    	        	while ($row = mysqli_fetch_array($result)) {

    	        	$p_arr['regNo'] = $row['vchAckNo'];
    	        	$p_arr['candidateName'] = htmlspecialchars_decode($row['vchFirstName'], ENT_QUOTES).' '.htmlspecialchars_decode($row['vchLastName'], ENT_QUOTES);
    	        	$p_arr['examinationDate'] = $row['stmExamDate'];
    	        	$p_arr['examinationTime'] = $row['stmExamTime'];
    	        	$p_arr['level'] = $row['intLevel'];
    	        	if(empty($row['vchRejectRemark']))
    	        	{
    	        		$p_arr['remark'] = '';
    	        	}
    	        	else
    	        	{
    	        		$p_arr['remark'] = $row['vchRejectRemark'];
    	        	}
    	        	$profilePhoto= $row['vchProfilePhoto'];
    	        	$p_arr['candidateProfilePic']= APP_URL.'uploadDocuments/skillCompetition/'.$row['vchAckNo'].'/'.$profilePhoto;
                if($row['intLevel']=='L1' )
                  {
                      $attendance = $row['tinLevelIStatus'];
                  } else if($row['intLevel']=='L2')
                  {
                      $attendance = $row['tinLevelIIStatus'];
                  }
                  else if($row['intLevel']=='L3')
                  {
                      $attendance = $row['tinLevel3Status'];
                  }
                  else
                  {
                     $attendance = ''; 
                  }

                 if($attendance==1)
                  {
                      $p_arr['status'] = 'Present';
                  } else if($attendance==2)
                  {
                      $p_arr['status'] = 'Not allowed';
                  }
                  else
                  {
                      $p_arr['status'] = 'Absent';
                  }
    	            
                    array_push($q_arr, $p_arr);
    						
    				}
    				echo json_encode(array('statusCode' => '200','status'=>'Successful','attendanceList'=>$q_arr));		
    				
    			}
    			else
    			{
    				echo json_encode(array('statusCode' => '204','status'=>'No record found'));
    			}
    		}

        }
            else
            {
              echo json_encode(array('statusCode' =>'402' ,'status'=>'Invalid token'));exit;
            }
    }



    public function syncAttendanceList($officerId,$level,$attendanceList,$authToken){ 
	   
	     $token = $_SESSION["token"];
      if($authToken==$token)
      {
    		if ($officerId == '' && $attendanceList=='') {

    		    echo json_encode(array('error' => 'Some inputs are missing. Please check.'));
           
    	    } else {
    			$p_arr  = array();
    			$q_arr  = array();
    			include_once( CLASS_PATH . 'clsVenueTagged.php');
    			$objVenue = new clsVenueTagged;
    			$noOfAtten = count($attendanceList);
               
               for ($i = 0; $i < $noOfAtten; $i++) {
               		$regNo = $attendanceList[$i]->regNo;
               		$level = $attendanceList[$i]->level;
               		$status = $attendanceList[$i]->status;
               		$reason = $attendanceList[$i]->remark;
               		if($status=='Present')
               		{
               			$approveStatus = 1;
               		}else if($status=='Not allowed')
               		{
               			$approveStatus = 2;
               		} else 
               		{
               			$approveStatus = 0;
               		}
               		$result   = $objVenue->manageVenueTagged('UA',0,$regNo,$approveStatus,0,0,0,'1000-01-01','00:00:00',$officerId,$reason,'',0);
               		//print"<pre>";print_r($attendanceList[$i]->regNo); 
               }//exit;
                 
    			
    			if ($result) {

                    $numRow = $result->fetch_array();
                    $intStatus = $numRow[0];

    				echo json_encode(array('statusCode' => '200','message'=>'Success'));		
    				
    			}
    			else
    			{
    				echo json_encode(array('statusCode' => '400','status'=>'Failed'));
    			}
    		}

      }
            else
            {
              echo json_encode(array('statusCode' =>'402' ,'status'=>'Invalid token'));exit;
            }
    }


    public function changePassword($officerId,$level,$oldPwd,$newPwd,$authToken)
    {
    	if($officerId == '' && $oldPwd == '' && $newPwd=='')
            {
               echo json_encode(array('status'=>'Some inputs are missing. Please check.'));
            }
            else
            {
	    	$txtOldotp     = md5($oldPwd);
	        $txtNewotp     = md5($newPwd);
            include_once( CLASS_PATH.'clsVenue.php');
		    $objVenue     = new clsVenue; 
            $vbResult = $objVenue->manageVenue('VP',$officerId,0,$level,'',$txtOldotp,'','',0,'','',0,0,0,0);
            if (mysqli_num_rows($vbResult) == 0) {
                $outMsg  = 'Incorrect Old otp';
                echo json_encode(array('statusCode' => '400','status'=>$outMsg));
            } else {
               
                $cpResult  = $objVenue->manageVenue('CP',$officerId,0,$level,'',$txtNewotp,'','',0,'','',0,0,0,0);
                if ($cpResult) {
                    $cpRow = mysqli_fetch_row($cpResult);

                       $outMsg	= "otp Changed Successfully"; 
                        echo json_encode(array('statusCode' => '200','status'=>$outMsg));
                    
                }
            }
	                   	
		}
    }
        
}
?>