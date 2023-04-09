<?php

class clsSkillTP extends Model {

    //Function to manage skillDevelopment

    public function manageskillTP($action, $arrConditions) {
        try {

            $result = Model::callProc('USP_SKILLTP', $action, $arrConditions);
            return $result;
//echo $result;exit;
        }//
        catch (Exception $e) {
            echo 'Error:' . $e->getMessage();
            exit();
        }
    }

    public function addUpdateskillTP($Id) {

        $userId = !empty($_SESSION['adminConsole_userID'])?$_SESSION['adminConsole_userID']:1;
        $Id = (isset($Id)) ? $Id : 0;

        $txtOrgName = $_POST['txtOrgName'];

        $blankOrgName = Model::isBlank($_POST['txtOrgName']);

        $lenOrgName = Model::chkLength('max', $txtOrgName, 200);

        $txtOrgEmail = $_POST['txtOrgEmail'];
        $lenEmail = Model::chkLength('max', $txtOrgEmail, 60);
        $txtOrgMobile          = !empty($_POST['txtOrgMobile'])?$_POST['txtOrgMobile']:'';
        $txtOrgPan     = !empty($_POST['txtOrgPan'])?$_POST['txtOrgPan']:'';
        $txtOrgRegd         = !empty($_POST['txtOrgRegd'])?$_POST['txtOrgRegd']:'';

        $txtAdress = htmlspecialchars($_POST['txtOrgAddress'], ENT_QUOTES);
        $pregMessage = preg_replace('/\s+/', '', $_POST['txtOrgAddress']);
        $chkTags = '<button,<form,<iframe,<input,<script,<select,<textarea,alert';
        $checkTagsStatus = $this->checkHtmlTags($pregMessage, $chkTags);
        $lenAdress = Model::chkLength('max', $txtAdress, 500);

        $txtOrgRemark = htmlspecialchars($_POST['txtOrgRemark'], ENT_QUOTES);
        $pregRemark = preg_replace('/\s+/', '', $_POST['txtOrgRemark']);
        $chkTagsR = '<button,<form,<iframe,<input,<script,<select,<textarea,alert';
        $checkTagsStatusRe = $this->checkHtmlTags($pregRemark, $chkTagsR);
        $lenReAdress = Model::chkLength('max', $txtOrgRemark, 250);

        $txtPersonName = !empty($_POST['txtPersonName'])?$_POST['txtPersonName']:'';
        $txtPersonEmail          = !empty($_POST['txtPersonEmail'])?$_POST['txtPersonEmail']:'';
        $txtPersonNumber        = !empty($_POST['txtPersonNumber'])?$_POST['txtPersonNumber']:'';
        $txtUserId  = !empty($_POST['txtUserId'])?$_POST['txtUserId']:'';

        $txtAccName     = $_POST['txtAccName'];
        $txtAccNumber   = $_POST['txtAccNumber'];
        $txtIfscCode    = $_POST['txtIfscCode'];
        $txtBranchName  = $_POST['txtBranchName'];

        $strCaptcha = $_POST["txtCaptcha"];

        $errtxtOrgName       = $this->isSpclChar($txtOrgName);
        $errtxtOrgEmail      = $this->isSpclChar($txtOrgEmail);
        $errtxtOrgMobile     = $this->isSpclChar($txtOrgMobile);
        $errtxtOrgPan        = $this->isSpclChar($txtOrgPan);
        $errtxtOrgRegd       = $this->isSpclChar($txtOrgRegd);
        $errtxtPersonName    = $this->isSpclChar($txtPersonName);
        $errtxtPersonEmail   = $this->isSpclChar($txtPersonEmail);
        $errtxtPersonNumber  = $this->isSpclChar($txtPersonNumber);
        $errtxtAccName       = $this->isSpclChar($txtAccName);
        $errtxtAccNumber     = $this->isSpclChar($txtAccNumber);
        $errtxtIfscCode      = $this->isSpclChar($txtIfscCode);

        $bnktxtOrgEmail      = $this->isBlank($txtOrgEmail);
        $bnktxtOrgMobile     = $this->isBlank($txtOrgMobile);
        $bnktxtOrgPan        = $this->isBlank($txtOrgPan);
        $bnktxtOrgRegd       = $this->isBlank($txtOrgRegd);
        $bnktxtPersonName   = $this->isBlank($txtPersonName);
        $bnktxtPersonEmail  = $this->isBlank($txtPersonEmail);
        $bnktxtPersonNumber = $this->isBlank($txtPersonNumber);
        $bnktxtAccName      = $this->isBlank($txtAccName);
        $bnktxtAccNumber     = $this->isBlank($txtAccNumber);
        $bnktxtIfscCode     = $this->isBlank($txtIfscCode);

       //$totalReg =  $this->getMaxVal('intId','t_skill_development','biDeletedFlag'); 

        $refNumber = 'SDTPR'.date('ymd').time();

        $outMsg = '';
        $flag   = ($Id != 0) ? 1 : 0;
        $action = ($Id == 0) ? 'A' : 'U';
        $errFlag = 0;

        $arrConditions = array('intId' => $Id,
            'vchOrgName' => $txtOrgName,
            'vchOrgEmail' => $txtOrgEmail,
            'vchOrgMobile' => $txtOrgMobile,
            'vchPan' => $txtOrgPan,
            'vchRegdNo' => $txtOrgRegd,
            'vchAddress' => $txtAdress,
            'vchRemark' => $txtOrgRemark,
            'vchConName' => $txtPersonName,
            'vchConEmail' => $txtPersonEmail,
            'vchConMobile' =>$txtPersonNumber,
            'vchUserId' =>$txtOrgEmail,
            'vchAccountName' =>$txtAccName,
            'vchAccountNumber' =>$txtAccNumber,
            'vchIFSCCode' =>$txtIfscCode,
            'vchBranchName' =>$txtBranchName,
            'vchRefNumber'=>$refNumber);
        if (isset($_POST['txtCaptcha']) && !empty($_POST['txtCaptcha'])) 
        {

            if ($_SESSION['captcha'] == $strCaptcha) {
                if ($blankOrgName > 0 || $bnktxtOrgEmail > 0 ||  $bnktxtOrgMobile > 0 || $bnktxtOrgPan > 0 || $bnktxtOrgRegd > 0|| $bnktxtPersonName > 0 || $bnktxtPersonEmail > 0 || $bnktxtPersonNumber > 0 || $bnktxtAccName > 0 || $bnktxtAccNumber > 0 || $bnktxtIfscCode > 0 ) {
                    $errFlag = 1;
                    $outMsg = "Mandatory field should not be blank";
                }  else if ($errtxtOrgName > 0 || $errtxtOrgEmail > 0 ||  $errtxtOrgMobile > 0 || $errtxtOrgPan > 0 || $errtxtOrgRegd > 0|| $errtxtPersonName > 0 || $errtxtPersonEmail > 0 || $errtxtPersonNumber > 0 || $errtxtAccName > 0 || $errtxtAccNumber > 0 || $errtxtIfscCode > 0) {

                    $outMsg = "Special Characters Are Not Allowed";
                    $errFlag = 1;
                    $flag = 1;
                } 
                else if ($checkTagsStatus > 0 || $checkTagsStatusRe > 0) {

                    $outMsg = "HTML Special Tags Are Not Allowed";
                    $errFlag = 1;
                    $flag = 1;
                } 

                $arrCDConditions = array('intId' => $Id, 'vchOrgEmail' => $txtOrgEmail , 'vchOrgName' =>$txtOrgName);

                $dupResult = $this->manageskillTP('CD', $arrCDConditions);
//                 print_r( $dupResult);exit;

                if ($dupResult) {
                    $numRows = $dupResult->fetch_array();
                    $pCount = count($numRows);
                    if ($pCount > 0) {
                        $outMsg = 'Organisation Name with this email already exists.';
                        $errFlag = 1;
                        $flag = 1;
                    }
                }

                if ($errFlag == 0) {
                    $result = $this->manageskillTP($action, $arrConditions);
                    if ($result) {
                        $numRow = $result->fetch_array();
                        //print_r($numRow);exit;
                        $referenceNumber = $numRow[0];
                        
                        $outMsg = ($action == 'A') ? 'Thank you for the registration. Your reference number is '.$referenceNumber.'. User id and password will be shared once it is approved by OSDA authority' : 'Thank You !!! You have successfully registered and Your Reference number is '.$referenceNumber;    
                        //send mail to osda
                        if (SEND_MAIL == "Y") { 
                          
                            $strUserTo[] = $txtPersonEmail;
                            $strUserFrom = DEVELOP_EMAIL;

                            $strsubject = "Registration for training partner " ;

                            $strUserMessage = "Dear <strong>" . $txtPersonName . "</strong></br>";
                            $strUserMessage .= "<div> <br>";
                            $strUserMessage .= "</div>";
                            $strUserMessage .= "Thank you for the registration. Your reference number is ".$referenceNumber. "</br></br>";

                            $strUserMessage .= " User id and password will be shared once it is approved by OSDA authority.</br></br>";

                            $strUserMessage .= "<div> <br>";
                            $strUserMessage .= "</div>";

                            $strUserMessage .= "<div><br><br>Regards OSDA</div>";

                            $userdata['from'] = $strUserFrom;
                            $userdata['to'] = $strUserTo;
                            $userdata['name'] = 'Odisha Skill Development Authority';
                            $userdata['sub'] = $strsubject;
                            $userdata['message'] = $strUserMessage;
                            $jsUserData = json_encode($userdata);
                            $mailUserRes = $this->sendAuthMailSkillDevelop($jsUserData);
                        }

                    } else {
                        $errFlag = 1;
                        $outMsg = 'Error in operation please try again';
                    }
                }
            } else {
                $errFlag = 1;
                $outMsg = "The captcha code is invalid ! Please try it again";
            }
        } else {
            $outMsg = 'Please enter captcha code.';
            $errFlag = 1;
        }


        $strName = ($errFlag == 1) ? $txtOrgName : '';
        $txtOrgEmail = ($errFlag == 1) ? $txtOrgEmail : '';
        $txtOrgMobile = ($errFlag == 1) ? $txtOrgMobile : '';
        $txtOrgPan = ($errFlag == 1) ? $txtOrgPan : '';
        $txtOrgRegd = ($errFlag == 1) ? $txtOrgRegd : '';
        $txtAdress = ($errFlag ==1) ? $txtAdress : '';
        $txtOrgRemark = ($errFlag ==1) ? $txtOrgRemark : '';
        $txtPersonName = ($errFlag ==1) ? $txtPersonName : '';
        $txtPersonEmail = ($errFlag ==1) ? $txtPersonEmail : '';
        $txtPersonNumber = ($errFlag ==1) ? $txtPersonNumber : '';
        $txtAccName = ($errFlag ==1) ? $txtAccName : '';
        $txtAccNumber = ($errFlag ==1) ? $txtAccNumber : '';
        $txtIfscCode = ($errFlag ==1) ? $txtIfscCode : '';
        $txtBranchName = ($errFlag ==1) ? $txtBranchName : '';
        $arrConditions = array('strOrgName' =>$strName,'txtOrgEmail'=>$txtOrgEmail,'txtOrgMobile'=>$txtOrgMobile,'txtOrgPan' =>$txtOrgPan,'txtOrgRegd'=>$txtOrgRegd,'txtAdress'=>$txtAdress,'txtOrgRemark'=>$txtOrgRemark,'txtPersonName' =>$txtPersonName,'txtPersonEmail'=>$txtPersonEmail,'txtPersonNumber'=>$txtPersonNumber,'txtAccName'=>$txtAccName,'txtAccNumber'=>$txtAccNumber,'txtIfscCode'=>$txtIfscCode,'txtBranchName'=>$txtBranchName);
        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag, 'returnParams' => $arrConditions);
        return $arrResult;
    }

    public function readskillDevelopment($intId) {
        $arrConditions = array('Id' => $intId);
        $result = $this->manageskillTP('R', $arrConditions);
        if ($result->num_rows > 0) {

            $row = $result->fetch_array();
            $strName = $row['vchName'];
            $strMobile = $row['vchMobile'];
            $strEmail = $row['vchEmail'];
            $strDistrict = $row['vchDistrict'];

            $strMessage = $row['vchMessage'];
        }

        $arrResult = array('strName' => $strName, 'strMobile' => $strMobile, 'strEmail' => $strEmail, 'strDistrict' => $strDistrict, 'strImage' => $strImage, 'strMessage' => $strMessage);

        return $arrResult;
    }

    // Function to Delete skillTP Details 

    public function deleteskillTP($action, $ids) {

        $ctr = 0;
        $userId = $_SESSION['adminConsole_userID'];
        $explIds = explode(',', $ids);
        $delRec = 0;
        foreach ($explIds as $indIds) {

            $arrConditions = array('Id' => $explIds[$ctr]);

            $result = $this->manageskillTP($action, $arrConditions);
            //  print_r( $result);exit;
            $row = $result->fetch_array();
            if ($row[0] == 0)
                $delRec++;
            $ctr++;
        }

        if ($action == 'D') {
            if ($delRec > 0)
                $outMsg .= 'Registration Detail(s) deleted successfully';
        }

        else if ($action == 'IN')
            $outMsg = 'skill Development Detail(s) unpublished successfully';
        else if ($action == 'P')
            $outMsg = 'skill Development Detail(s) published successfully';

        return $outMsg;
    }


    # add training partner program
    public function addUpdateTPProgram($Id,$partnerId) {

        $userId = !empty($_SESSION['adminConsole_userID'])?$_SESSION['adminConsole_userID']:1;
        $Id = (isset($Id)) ? $Id : 0;

        $newSessionId           = session_id();
        $hdnPrevSessionId       = $_POST['hdnPrevSessionId'];
        if ($newSessionId == $hdnPrevSessionId) {
        $errFlag = 0;
        $tPId             = !empty($_POST['ddlTP'])?$_POST['ddlTP']:$partnerId;                   
        $programName      = $_POST['txtProgram'];                   
        $startDate        = date('Y-m-d',strtotime($_POST['txtStartDate']));                   
        $endDate          = date('Y-m-d',strtotime($_POST['txtEndDate']));                    
        $programFee       = !empty($_POST['txtPFee'])?$_POST['txtPFee']:'0';  
        $openProgram      = !empty($_POST['rdoOpen'])?$_POST['rdoOpen']:'0';  
        $txtStudentFee    = !empty($_POST['txtStudentFee'])?$_POST['txtStudentFee']:'0';  
        $txtStudentQty    = !empty($_POST['txtStudentQty'])?$_POST['txtStudentQty']:'0';  
        $txtTrainFee      = !empty($_POST['txtTrainFee'])?$_POST['txtTrainFee']:'0';  
        $txtTrainQty      = !empty($_POST['txtTrainQty'])?$_POST['txtTrainQty']:'0';  
        $txtInstituteFee  = !empty($_POST['txtInstituteFee'])?$_POST['txtInstituteFee']:'0';  
        $txtInsQty        = !empty($_POST['txtInsQty'])?$_POST['txtInsQty']:'0';  

        $errPName         = $this->isSpclChar($programName);
        $errPartName      = $this->isSpclChar($tPId);
        $errstartDate     = $this->isSpclChar($startDate);
        $errendDate       = $this->isSpclChar($endDate);
        $errtxtStudentFee = $this->isSpclChar($txtStudentFee);
        $errtxtStudentQty = $this->isSpclChar($txtStudentQty);
        $errtxtTrainFee   = $this->isSpclChar($txtTrainFee);
        $errtxtTrainQty   = $this->isSpclChar($txtTrainQty);
        $errtxtInstituteFee = $this->isSpclChar($txtInstituteFee);
        $errtxtInsQty     = $this->isSpclChar($txtInsQty);
        $errProName       = $this->isSpclTags($programName);

        $blankprogramName  = $this->isBlank($programName);
        $blanktPId         = $this->isBlank($tPId);
        $blankstartDate    = $this->isBlank($startDate);
        $blankendDate      = $this->isBlank($endDate);
        $blanktxtStudentFee= $this->isBlank($txtStudentFee);
        $blanktxtStudentQty= $this->isBlank($txtStudentQty);
        $blanktxtTrainFee  = $this->isBlank($txtTrainFee);
        $blanktxtTrainQty  = $this->isBlank($txtTrainQty);
        $blanktxtInstituteFee  = $this->isBlank($txtInstituteFee);
        $blanktxtInsQty     = $this->isBlank($txtInsQty);


        $outMsg = '';
        $flag   = ($Id != 0) ? 1 : 0;
        $action = ($Id != 0) ? 'UP' : 'AP';
        
        if($blankprogramName>0 || $blankstartDate>0 || $blankendDate>0 || $blanktxtStudentFee>0 || $blanktxtStudentQty>0 || $blanktxtTrainFee>0 || $blanktxtTrainQty>0 || $blanktxtInstituteFee>0 || $blanktxtInsQty>0)
       {
           $errFlag   = 1;
           $outMsg    = "Mandatory fields should not be left blank";
       }
        else if($errPName>0 || $errPartName>0 || $errstartDate>0 || $errendDate>0 || $errtxtStudentFee>0 || $errtxtStudentQty>0 || $errtxtTrainFee>0 || $errtxtTrainQty>0 || $errtxtInstituteFee>0 || $errtxtInsQty>0 || $errProName>0)
       {
           $errFlag   = 1;
           $outMsg    = "Special characters are not allowed";
       }

        $arrConditions = array('tpId'=>$tPId,'programName' => $programName,'startDate'=>$startDate,'endDate'=>$endDate,'programFee'=>$programFee,'userId'=>$userId,'id'=>$Id,'openProgram'=>$openProgram,'txtStudentFee'=>$txtStudentFee,'txtStudentQty'=>$txtStudentQty,'txtTrainFee'=>$txtTrainFee,'txtTrainQty'=>$txtTrainQty,'txtInstituteFee'=>$txtInstituteFee,'txtInsQty'=>$txtInsQty);
       

        $dupResult = $this->manageskillTP('DU', $arrConditions);
        if ($dupResult) {
            $numRows = $dupResult->fetch_array();
            $pCount = count($numRows);
            if ($pCount > 0) {
                $outMsg = 'This Program name already exist.';
                $errFlag = 1;
                $flag = 1;
            }
        }

        if ($errFlag == 0) {
            $result = $this->manageskillTP($action, $arrConditions);
            if ($result) {
                 
                $outMsg = ($action == 'AP') ? 'Thank You !!! You have successfully registered your program' : 'Thank You !!! You have successfully updated your program.';  


            } else {
                $errFlag = 1;
                $outMsg = 'Error in operation please try again';
            }
        }
        /*else
        {
            $errFlag = 1;
            $outMsg = 'Above program is already approved please try again';
        }*/


        $programName = ($errFlag == 1) ? $programName : '';
        $startDate   = ($errFlag == 1) ? $startDate : '';
        $endDate     = ($errFlag == 1) ? $endDate : '';
        $programFee  = ($errFlag == 1) ? $programFee : '';
        $openProgram  = ($errFlag == 1) ? $openProgram : '0';
        $txtStudentFee  = ($errFlag == 1) ? $txtStudentFee : '0';
        $txtStudentQty  = ($errFlag == 1) ? $txtStudentQty : '0';
        $txtTrainFee  = ($errFlag == 1) ? $txtTrainFee : '0';
        $txtTrainQty  = ($errFlag == 1) ? $txtTrainQty : '0';
        $txtInstituteFee  = ($errFlag == 1) ? $txtInstituteFee : '0';
        $txtInsQty  = ($errFlag == 1) ? $txtInsQty : '0';

        $arrConditions = array('programName' => $programName,'startDate'=>$startDate,'endDate'=>$endDate,'programFee'=>$programFee,'openProgram'=>$openProgram,'txtStudentFee'=>$txtStudentFee,'txtStudentQty'=>$txtStudentQty,'txtTrainFee'=>$txtTrainFee,'txtTrainQty'=>$txtTrainQty,'txtInstituteFee'=>$txtInstituteFee,'txtInsQty'=>$txtInsQty);
        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag, 'returnParams' => $arrConditions);
        return $arrResult;

        }
        else{
                header("Location:" . APP_URL . "error"); 
            }
    }

   

}

?>