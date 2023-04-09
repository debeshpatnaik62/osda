<?php

class clsSkillInsRegd extends Model {

    //Function to manage skillDevelopment

    public function manageSkillInsRegd($action, $arrConditions) {
        try {

            $result = Model::callProc('USP_SKILL_INSTITUTE_REGD', $action, $arrConditions);
            return $result;
//echo $result;exit;
        }//
        catch (Exception $e) {
            echo 'Error:' . $e->getMessage();
            exit();
        }
    }

    public function addUpdateskillInsRegd($Id) {

        $userId = !empty($_SESSION['adminConsole_userID'])?$_SESSION['adminConsole_userID']:1;
        $Id = (isset($Id)) ? $Id : 0;

        $txtInsName = $_POST['txtInsName'];

        $blankInsName = Model::isBlank($_POST['txtInsName']);

        $lenInsName = Model::chkLength('max', $txtInsName, 200);

        $txtInsEmail = $_POST['txtInsEmail'];
        $lenEmail = Model::chkLength('max', $txtInsEmail, 60);
        $txtInsNumber          = !empty($_POST['txtInsNumber'])?$_POST['txtInsNumber']:'';
        $txtInsPan     = !empty($_POST['txtPanNumber'])?$_POST['txtPanNumber']:'';
        $txtInsRegd         = !empty($_POST['txtRegdNumber'])?$_POST['txtRegdNumber']:'';
        $selProgramId = !empty($_POST['selProgramName'])?$_POST['selProgramName']:'0';
        $selSeat      = !empty($_POST['selSeat'])?$_POST['selSeat']:'0';

        $txtAdress = htmlspecialchars($_POST['txtInsAddress'], ENT_QUOTES);
        $pregMessage = preg_replace('/\s+/', '', $_POST['txtInsAddress']);
        $chkTags = '<button,<form,<iframe,<input,<script,<select,<textarea,alert';
        $checkTagsStatus = $this->checkHtmlTags($pregMessage, $chkTags);
        $lenAdress = Model::chkLength('max', $txtAdress, 500);

        $txtInsRemark = htmlspecialchars($_POST['txtInsRemark'], ENT_QUOTES);
        $pregReMessage = preg_replace('/\s+/', '', $_POST['txtInsRemark']);
        $chkReTags = '<button,<form,<iframe,<input,<script,<select,<textarea,alert';
        $checkTagsReStatus = $this->checkHtmlTags($pregReMessage, $chkReTags);
        $lenReAdress = Model::chkLength('max', $txtInsRemark, 250);

        $txtPersonName = !empty($_POST['txtPersonName'])?$_POST['txtPersonName']:'';
        $txtPersonEmail          = !empty($_POST['txtPersonEmail'])?$_POST['txtPersonEmail']:'';
        $txtPersonNumber        = !empty($_POST['txtPersonNumber'])?$_POST['txtPersonNumber']:'';
        $txtUserId  = !empty($_POST['txtUserId'])?$_POST['txtUserId']:'';

        $txtAccName     = $_POST['txtAccName'];
        $txtAccNumber   = $_POST['txtAccNumber'];
        $txtIfscCode    = $_POST['txtIfscCode'];
        $txtBranchName  = $_POST['txtBranchName'];

        $txtCellPersonName          = !empty($_POST['txtCellPersonName'])?$_POST['txtCellPersonName']:'';
        $txtCellPersonEmail         = !empty($_POST['txtCellPersonEmail'])?$_POST['txtCellPersonEmail']:'';
        $txtCellPersonNumber        = !empty($_POST['txtCellPersonNumber'])?$_POST['txtCellPersonNumber']:'';

        $txtPrincipleName           = !empty($_POST['txtPrincipleName'])?$_POST['txtPrincipleName']:'';
        $txtPrincipleEmail          = !empty($_POST['txtPrincipleEmail'])?$_POST['txtPrincipleEmail']:'';
        $txtPrincipleNumber         = !empty($_POST['txtPrincipleNumber'])?$_POST['txtPrincipleNumber']:'';



        $strCaptcha = $_POST["txtInsCaptcha"];

        $refNumber = 'SDIR'.date('ymd').time();

        $errtxtInsName       = $this->isSpclChar($txtInsName);
        $errtxtInsEmail      = $this->isSpclChar($txtInsEmail);
        $errtxtInsNumber     = $this->isSpclChar($txtInsNumber);
        $errtxtInsPan        = $this->isSpclChar($txtInsPan);
        $errtxtInsRegd       = $this->isSpclChar($txtInsRegd);
        $errselProgramId     = $this->isSpclChar($selProgramId);
        $errtxtPersonName    = $this->isSpclChar($txtPersonName);
        $errtxtPersonEmail   = $this->isSpclChar($txtPersonEmail);
        $errtxtPersonNumber  = $this->isSpclChar($txtPersonNumber);
        $errtxtAccName       = $this->isSpclChar($txtAccName);
        $errtxtAccNumber     = $this->isSpclChar($txtAccNumber);

        $blnktxtIfscCode     = $this->isBlank($txtIfscCode);
        $blnktxtInsEmail     = $this->isBlank($txtInsEmail);
        $blnktxtInsNumber    = $this->isBlank($txtInsNumber);
        $blnktxtInsPan       = $this->isBlank($txtInsPan);
        $blnktxtInsRegd      = $this->isBlank($txtInsRegd);
        $blnkselProgramId    = $this->isBlank($selProgramId);
        $blnktxtPersonName   = $this->isBlank($txtPersonName);
        $blnktxtPersonEmail  = $this->isBlank($txtPersonEmail);
        $blnktxtPersonNumber = $this->isBlank($txtPersonNumber);
        $blnktxtAccName      = $this->isBlank($txtAccName);
        $blnktxtAccNumber    = $this->isBlank($txtAccNumber);

        $outMsg = '';
        $flag   = ($Id != 0) ? 1 : 0;
        $action = ($Id == 0) ? 'A' : 'U';
        $errFlag = 0;

        $arrConditions = array('intId' => $Id,
            'vchInsName' => $txtInsName,
            'vchInsEmail' => $txtInsEmail,
            'vchInsMobile' => $txtInsNumber,
            'vchPan' => $txtInsPan,
            'vchRegdNo' => $txtInsRegd,
            'intProgramId' => $selProgramId,
            'vchAddress' => $txtAdress,
            'vchRemark' => $txtInsRemark,
            'vchConName' => $txtPersonName,
            'vchConEmail' => $txtPersonEmail,
            'vchConMobile' =>$txtPersonNumber,
            'vchUserId' =>$txtInsEmail,
            'vchRefNumber'=>$refNumber,
            'vchAccountName' =>$txtAccName,
            'vchAccountNumber' =>$txtAccNumber,
            'vchIFSCCode' =>$txtIfscCode,
            'vchBranchName' =>$txtBranchName,
            'vchCellName' =>$txtCellPersonName,
            'vchCellEmail' =>$txtCellPersonEmail,
            'vchCellMobile' =>$txtCellPersonNumber,
            'vchPrincipleName' =>$txtPrincipleName,
            'vchPrincipleEmail' =>$txtPrincipleEmail,
            'vchPrincipleMobile' =>$txtPrincipleNumber,
            'takenSeat'=>$selSeat);
        if (isset($_POST['txtInsCaptcha']) && !empty($_POST['txtInsCaptcha'])) 
        {

            if ($_SESSION['captcha'] == $strCaptcha) {
                if ($blankInsName > 0  || $blnktxtIfscCode > 0 || $blnktxtInsEmail > 0 || $blnktxtInsNumber > 0 || $blnktxtInsPan > 0 || $blnktxtInsRegd > 0 || $blnkselProgramId > 0 || $blnktxtPersonName > 0 || $blnktxtPersonEmail > 0 || $blnktxtPersonNumber > 0 || $blnktxtAccName > 0 || $blnktxtAccNumber > 0 ) {
                    $errFlag = 1;
                    $outMsg = "Mandatory field should not be blank";
                } else if ($errtxtInsName > 0 || $errtxtInsEmail > 0 ||  $errtxtInsNumber > 0 || $errtxtInsPan > 0 || $errtxtInsRegd > 0|| $errselProgramId > 0 || $errtxtPersonName > 0 || $errtxtPersonEmail > 0 || $errtxtPersonNumber > 0 || $errtxtAccName > 0 || $errtxtAccNumber > 0) {

                    $outMsg = "Special Characters Are Not Allowed";
                    $errFlag = 1;
                    $flag = 1;
                } else if ($checkTagsStatus > 0 || $checkTagsReStatus > 0) {

                    $outMsg = "HTML Special Tags Are Not Allowed";
                    $errFlag = 1;
                    $flag = 1;
                } 

                $arrCDConditions = array('intId' => $Id, 'vchInsEmail' => $txtInsEmail , 'vchInsName' =>$txtInsName);

                $dupResult = $this->manageSkillInsRegd('CD', $arrCDConditions);
//                 print_r( $dupResult);exit;

                if ($dupResult) {
                    $numRows = $dupResult->fetch_array();
                    $pCount = count($numRows);
                    if ($pCount > 0) {
                        $outMsg = 'Institution Name with this email already exists.';
                        $errFlag = 1;
                        $flag = 1;
                    }
                }

                if ($errFlag == 0) {
                    $result = $this->manageSkillInsRegd($action, $arrConditions);
                    if ($result) {
                        $numRow = $result->fetch_array();
                        //print_r($numRow);exit;
                        $referenceNumber = $numRow[0];
                         
                        $outMsg = ($action == 'A') ? 'Thank you for the registration. Your reference number is '.$referenceNumber.'. User id and password will be shared once it is approved by OSDA authority' : 'Thank You !!! You have successfully registered and Your Reference number is '.$referenceNumber;    
                        //send mail to osda
                        if (SEND_MAIL == "Y") { 
                          
                            $strUserTo[] = $txtPersonEmail;
                            $strUserFrom = DEVELOP_EMAIL;

                            $strsubject = "Registration for institute " ;

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
                        $outMsg = 'Error in opertaion please try again';
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


        $strName = ($errFlag == 1) ? $txtInsName : '';
        $txtInsEmail = ($errFlag == 1) ? $txtInsEmail : '';
        $txtInsNumber = ($errFlag == 1) ? $txtInsNumber : '';
        $txtInsPan = ($errFlag == 1) ? $txtInsPan : '';
        $txtInsRegd = ($errFlag == 1) ? $txtInsRegd : '';
        $selProgramId = ($errFlag == 1) ? $selProgramId : '';
        $txtAdress = ($errFlag == 1) ? $txtAdress : '';
        $txtInsRemark = ($errFlag == 1) ? $txtInsRemark : '';
        $txtPersonName = ($errFlag == 1) ? $txtPersonName : '';
        $txtPersonEmail = ($errFlag == 1) ? $txtPersonEmail : '';
        $txtPersonNumber = ($errFlag == 1) ? $txtPersonNumber : '';
        $txtAccName = ($errFlag == 1) ? $txtAccName : '';
        $txtAccNumber = ($errFlag == 1) ? $txtAccNumber : '';
        $txtIfscCode = ($errFlag == 1) ? $txtIfscCode : '';
        $txtBranchName = ($errFlag == 1) ? $txtBranchName : '';
        $txtCellPersonName = ($errFlag == 1) ? $txtCellPersonName : '';
        $txtCellPersonEmail = ($errFlag == 1) ? $txtCellPersonEmail : '';
        $txtCellPersonNumber = ($errFlag == 1) ? $txtCellPersonNumber : '';
        $txtPrincipleName = ($errFlag == 1) ? $txtPrincipleName : '';
        $txtPrincipleEmail = ($errFlag == 1) ? $txtPrincipleEmail : '';
        $txtPrincipleNumber = ($errFlag == 1) ? $txtPrincipleNumber : '';
        $selSeat = ($errFlag == 1) ? $selSeat : '0';
        $arrConditions = array('strName' =>$strName,'txtInsEmail'=>$txtInsEmail,'txtInsNumber'=>$txtInsNumber,'txtInsPan'=>$txtInsPan,'txtInsRegd'=>$txtInsRegd,'selProgramId'=>$selProgramId,'txtAdress'=>$txtAdress,'txtInsRemark'=>$txtInsRemark,'txtPersonName'=>$txtPersonName,'txtPersonEmail'=>$txtPersonEmail,'txtPersonNumber'=>$txtPersonNumber,'txtAccName'=>$txtAccName,'txtAccNumber'=>$txtAccNumber,'txtIfscCode'=>$txtIfscCode,'txtBranchName'=>$txtBranchName,'txtCellPersonName'=>$txtCellPersonName,'txtCellPersonEmail'=>$txtCellPersonEmail,'txtCellPersonNumber'=>$txtCellPersonNumber,'txtPrincipleName'=>$txtPrincipleName,'txtPrincipleEmail'=>$txtPrincipleEmail,'txtPrincipleNumber'=>$txtPrincipleNumber,'takenSeat'=>$selSeat);
        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag, 'returnParams' => $arrConditions);
        return $arrResult;
    }

    public function readskillDevelopment($intId) {
        $arrConditions = array('Id' => $intId);
        $result = $this->manageSkillInsRegd('R', $arrConditions);
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

    public function deleteskillInsRegd($action, $ids) {

        $ctr = 0;
        $userId = $_SESSION['adminConsole_userID'];
        $explIds = explode(',', $ids);
        $delRec = 0;
        foreach ($explIds as $indIds) {

            $arrConditions = array('Id' => $explIds[$ctr]);

            $result = $this->manageSkillInsRegd($action, $arrConditions);
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
            $outMsg = 'Skill Development Detail(s) unpublished successfully';
        else if ($action == 'P')
            $outMsg = 'Skill Development Detail(s) published successfully';

        return $outMsg;
    }

    # Tag training partner program for institute regd
    public function addUpdateTagProgram($Id,$insId) {

        $userId = !empty($_SESSION['adminConsole_userID'])?$_SESSION['adminConsole_userID']:1;
        $Id = (isset($Id)) ? $Id : 0;
        $newSessionId           = session_id();
        $hdnPrevSessionId       = $_POST['hdnPrevSessionId'];
        if ($newSessionId == $hdnPrevSessionId) {
            $totProgram                = $_POST['hdnTotalProgram'];                  
            $query                     = '';
            $pid = '';
            $takenSeat = '';
          
             $errFlag = 0;
              $status = $_POST['hdnStatus'];
           for ($i = 1; $i <= $totProgram; $i++) {
               if($status[$i-1] !=1)
                {     
                $programname      = $_POST['ddlProgram'.$i];                                 
                $proposedSeat     = $_POST['txtNeedSeat'.$i];                                 
                $errFlag = 1;

                $arrConditions = array('insId'=>$insId,'pid'=>$programname,'takenSeat'=>$proposedSeat);
                $result = $this->manageSkillInsRegd('APP', $arrConditions);

                $query  .='('.$insId.','.$programname .','.$userId.','.$proposedSeat.'),'; 
                //$pid  .='('.$programname .'),';                                   
                //$takenSeat  .='('.$proposedSeat .'),';                                   
                $pid  .=$programname.',';                                   
                $takenSeat  .= $proposedSeat.',';                                   
                }
            }
                $query  = substr($query,0,-1); 
                $pid  = substr($pid,0,-1); 
                $takenSeat  = substr($takenSeat,0,-1);

                //print_r($pid);exit;
        $outMsg = '';

        $arrConditions = array('insId'=>$insId,'query' => $query,'pid'=>$pid,'takenSeat'=>$takenSeat);

        if (strlen($pid) > 0) {
            $result = $this->manageSkillInsRegd('AP', $arrConditions);
            if ($result) {
                //$numRow = $result->fetch_array();
                //print_r($numRow);exit;
                //$p_status = $numRow[0];
                 
                $outMsg = 'Thank You !!! You have successfully tagged your program';  


            } else {
                $errFlag = 1;
                $outMsg = 'Error in operation please try again';
            }
        }
         else
        {
            $errFlag = 1;
            $outMsg = 'Please do some operation';
        }


        $programname = $programname;
        $arrConditions = array('strName' =>$programname);
        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag, 'returnParams' => $arrConditions);
        return $arrResult;

        }
        else{
                header("Location:" . APP_URL . "error"); 
            }
    }

   


   

}

?>