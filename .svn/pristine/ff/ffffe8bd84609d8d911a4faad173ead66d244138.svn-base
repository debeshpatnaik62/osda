<?php

//========== create object of clsSkillDevelopment class=============== 
include_once( CLASS_PATH . 'clsSkillCompetition.php');


$objComp = new clsSkillCompetition;
//========== Default variable ===============       

$flag = 0;
$errFlag = 0;
$outMsg = '';


//============ Get OTP Form Registraed number ===================
if (isset($_POST['btnOTP'])) 
{ 
    $nid = $_POST['txtRegdNo'];
    $resultOTP     = $objComp->manageSkillCompetition('OTP', 0,0, 0, $nid, '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00'); 

        if ($resultOTP->num_rows > 0) {
            $num        = $resultOTP->fetch_array();
            $mobileNo   = $num['vchPhoneno'];
            $aadharID   = $num['vchAadharId'];
            $emailID    = $num['vchEmailId'];
            $encId = $objComp->encrypt($aadharID);
            if(!empty($mobileNo))
            { 
                $randomNumber = rand(1000,9999);
                //$arrConditionOTP=array('regdNo'=>$nid,'mobileNo'=>$mobileNo,'otp'=>$randomNumber);
                $resultSend   = $objComp->manageSkillCompetition('ATP', 0,0, $randomNumber, $nid, $mobileNo, '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00');
                $outMsg = 'Your OTP send in your registraed mobile number.'.'('.$randomNumber.')';

                if (SEND_MAIL == "Y")
                    {       
                        $strUserTo[] = $emailID;
                        $strUserFrom = SKILLCOM_EMAIL;
                        $strsubject = "OSDA :: Skill Competition Login" ;

                        $strUserMessage = 'Your OTP to log in to your account is '.$randomNumber.'. Do not share your OTP with anyone. Team OSDA';

                        $userdata['from'] = $strUserFrom;
                        $userdata['to'] = $strUserTo;
                        $userdata['name'] = 'Odisha Skill Development Authority';
                        $userdata['sub'] = $strsubject;
                        $userdata['message'] = $strUserMessage;
                        $jsUserData = json_encode($userdata);
                        $mailUserRes = Model::sendAuthMailSkillComp($jsUserData);
                    }

                if(SEND_MESSAGE=='Y')
                { 
                        $templateId  = '1007214636510605231';
                        
                        $mobileMessage = 'Your OTP to log in to your account is '.$randomNumber.'. Do not share your OTP with anyone. Team OSDA';
                         $mobileNo=$mobileNo.",";
                         $sms = Model::sendSkillSMS($mobileNo,$mobileMessage,$templateId);                                  
                        
                }

            } 
            else
            { 
                $outMsg = 'Please enter valid registration No. / mobile No.';
            }
        }
        else
            { 
                $outMsg = 'Please enter valid registration No. / mobile No.';
            }
        
    
}

//============ Verify OTP Form Registraed number ===================
/*if (isset($_POST['btnVerifyOTP'])) 
{ 
    $nid = $_POST['txtRegdNo'];
    $otp = $_POST['txtVerify'];
    $arrConditionVerify=array('regdNo'=>$nid);

    $resultVerify     = $objComp->manageSkillCompetition('VTP', 0,0, $otp, $nid, '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00'); 

        if ($resultVerify->num_rows > 0) {
            $num           = $resultVerify->fetch_array();
            $verifiedOtp   = $num[0];
            $aadharID      = $num[1];
            $encId = $objComp->encrypt($aadharID);
            if($otp==$verifiedOtp)
            {
                $verifyStatus = 1;
                $resultSend   = $objComp->manageSkillCompetition('UTP', 0,0, $verifyStatus, $nid, '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00');
                if ($resultSend) {
                    $row              = $resultSend->fetch_array();
                    $verifiedStatus   = $row[0];
                }
            }
            else
            {
                $verifyStatus = 2;
                $resultSend   = $objComp->manageSkillCompetition('UTP', 0,0, $verifyStatus, $nid, '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00');
                if ($resultSend) {
                    $row              = $resultSend->fetch_array();
                    $verifiedStatus   = $row[0];
                }
            }
            
            
            
        }
        else
        {
            $outMsg = 'Please enter valid registration No. / mobile No.';
        }
    
}*/

//============ Login Form Submit ===================
if (isset($_POST['btnSubmit'])) 
{ 
    $nid = $_POST['txtRegdNo'];
    $otp = $_POST['txtVerify'];
    //$encId = $objComp->encrypt($nid);
    $resultSend   = $objComp->manageSkillCompetition('VVS',0,0,0, $nid, '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00');
    if ($resultSend) {
        $row        = $resultSend->fetch_array();
        $validOtp   = $row[0];
    }

    if ($_SESSION['captcha'] == $_POST['txtCaptcha']) {

        if($validOtp==$otp){
        $result     = $objComp->manageSkillCompetition('LD', 0,0,0, $nid, '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00'); 

        if ($result->num_rows > 0) {
            $numRow = $result->fetch_array();
            $aadharID = $numRow['vchAadharId'];
            $status = $numRow['tinApproveStatus'];
            $outMsg = '';
            $encId = $objComp->encrypt($aadharID);
            header("Location: ".SITE_URL."skill-competition-dashboard/".$encId);
            }
            else
            {
                $outMsg = 'Please enter valid registration No. / mobile No.';
            }
        }
        else
        {
            $outMsg = 'Please enter valid OTP.';
        }
    }
    else
    {
        $outMsg = 'The captcha code is invalid ! Please try it again';
    }
}
?>