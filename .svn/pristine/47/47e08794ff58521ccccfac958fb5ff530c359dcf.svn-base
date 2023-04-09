<?php

//========== create object of clsSkillDevelopment class=============== 
include_once( CLASS_PATH . 'clsSkillDevelopment.php');


$objDevelopment = new clsSkillDevelopment;
//========== Default variable ===============       

$flag = 0;
$errFlag = 0;
$outMsg = '';

//============ Get OTP Form Registraed number ===================
if (isset($_POST['btnOTP'])) 
{ 
    $nid = $_POST['txtRegdNo'];
    $arrConditions=array('regdNo'=>$nid);
    $encId = $objDevelopment->encrypt($nid);
    $resultOTP     = $objDevelopment->manageskillDevelopment('OTP', $arrConditions); 

        if ($resultOTP->num_rows > 0) {
            $num        = $resultOTP->fetch_array();
            //$mobileNo   = $num[0];
            $mobileNo   = $num['vchMobile'];
            $emailID    = $num['vchEmail'];
            if(!empty($mobileNo))
            { 
                $randomNumber = rand(1000,9999);
                $arrConditionOTP=array('regdNo'=>$nid,'mobileNo'=>$mobileNo,'otp'=>$randomNumber);
                $resultSend   = $objDevelopment->manageskillDevelopment('ATP', $arrConditionOTP);
                $outMsg = 'Your OTP send in your registraed mobile number.'.'('.$randomNumber.')';

                if (SEND_MAIL == "Y")
                    {       
                        $strUserTo[] = $emailID;
                        $strUserFrom = DEVELOP_EMAIL;
                        $strsubject = "OSDA :: Digital Skill Student Login OTP" ;

                        $strUserMessage = 'Your OTP to log in to your account is '.$randomNumber.'. Do not share your OTP with anyone. Team OSDA';

                        $userdata['from'] = $strUserFrom;
                        $userdata['to'] = $strUserTo;
                        $userdata['name'] = 'Odisha Skill Development Authority';
                        $userdata['sub'] = $strsubject;
                        $userdata['message'] = $strUserMessage;
                        $jsUserData = json_encode($userdata);
                        $mailUserRes = Model::sendAuthMailSkillDevelop($jsUserData);
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

//============ Login Form Submit ===================
if (isset($_POST['btnSubmit'])) 
{ 
    $nid = $_POST['txtRegdNo'];
    $otp = $_POST['txtVerify'];
    $arrConditions=array('regdNo'=>$nid);
    $encId = $objDevelopment->encrypt($nid);
    $resultSend   = $objDevelopment->manageskillDevelopment('VVS', $arrConditions);
    if ($resultSend) {
        $row              = $resultSend->fetch_array();
        //$verifiedStatus   = $row[0];
        $validOtp   = $row[0];
    }

    if ($_SESSION['captcha'] == $_POST['txtCaptcha']) {

        if($otp==$validOtp){
        $result     = $objDevelopment->manageskillDevelopment('LD', $arrConditions); 

        if ($result->num_rows > 0) {
            $numRow = $result->fetch_array();
            $status = $numRow['tinApproveStatus'];
            
            $outMsg = '';
            header("Location: ".SITE_URL."digital-skill-dashboard/".$encId);
            //$redirectLoc  =  SITE_URL."digital-skill-dashboard/".$encId;
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



/************Get Banner Data************/
     include_once(CLASS_PATH.'clsSkillBanner.php');
     $objSkillBanner    =  new clsSkillBanner;
     $bannerResul       = $objSkillBanner->manageSkillBanner('VD',0,1,0,0,'','','','','','','',2,0,1,''); 
     $intTotalBanner    = $bannerResul->num_rows; 

/************Get Partners Data************/
include_once( CLASS_PATH.'clsSkillPartner.php');
    $objPartner         = new clsSkillPartner;
    $partnerResult      = $objPartner->manageSkillPartner('V',0,1,'','','', '0000-00-00 00:00:00','0000-00-00 00:00:00','','',2,0,0,'0000-00-00','0000-00-00','','','');
    $intTotalPartner    = $partnerResult->num_rows;


 /************Get News Data************/
include_once( CLASS_PATH.'clsSkillNews.php');
    $objNews            = new clsSkillNews;
    $newsResult         = $objNews->manageSkillNews('V',0,1,'','','', '0000-00-00 00:00:00','0000-00-00 00:00:00','','',2,0,0,'0000-00-00','0000-00-00','','','','','');
    $intTotalNews       = $newsResult->num_rows;


/************Get Gallery Data************/
     include_once(CLASS_PATH.'clsSkillBanner.php');
     $objSkillBanner    =  new clsSkillBanner;
     $galleryResult     = $objSkillBanner->manageSkillBanner('VD',0,2,0,0,'','','','','','','',2,0,1,''); 
     $intTotalGallery   = $galleryResult->num_rows; 


/************Get Testimonial Data************/
     include_once(CLASS_PATH.'clsTestimonial.php');
     $objTestimonial    =  new clsTestimonial;
     $arrConditions     = array( 'category'=>1,'pubStatus'=>2);
     $testimonialResult = $objTestimonial->manageTestimonial('VT',$arrConditions);
     $intTotalMonial    = $testimonialResult->num_rows; 

?>