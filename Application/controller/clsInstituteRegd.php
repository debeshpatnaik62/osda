<?php

class clsInstituteRegd extends Model {

    //Function to manage institute regd

    public function manageInstituteRegd($action, $arrConditions) {
        try {

            $result = Model::callProc('USP_INSTITUTE_REGD', $action, $arrConditions);
            return $result;
//echo $result;exit;
        }
        catch (Exception $e) {
            echo 'Error:' . $e->getMessage();
            exit();
        }
    }

    public function addUpdateInstituteRegd($Id) {

        $userId = !empty($_SESSION['adminConsole_userID'])?$_SESSION['adminConsole_userID']:1;
        $Id = (isset($Id)) ? $Id : 0;


        $txtInstituteName = $_POST['instituteName'];
        $txtPersonName    = $_POST['txtPersonName'];

        $blankInsName = Model::isBlank($_POST['instituteName']);
        $blankName    = Model::isBlank($_POST['txtPersonName']);

        $lenName = Model::chkLength('max', $txtPersonName, 200);
        $txtPhone      = !empty($_POST['txtPersonNumber'])?$_POST['txtPersonNumber']:'';

        $txtPersonEmail = $_POST['txtPersonEmail'];
        $lenEmail = Model::chkLength('max', $txtPersonEmail, 60);

        $txtUserId     = !empty($_POST['txtUserId'])?$_POST['txtUserId']:'';

        $txtinsAddress = htmlspecialchars($_POST['txtinsAddress'], ENT_QUOTES);
        $lenMessage = Model::chkLength('max', $txtMessage, 500);

        $strCaptcha = $_POST["txtInsCaptcha"];

        $declaration = $_POST["intInsAccept"];

        $outMsg = '';
        $flag   = ($Id != 0) ? 1 : 0;
        $action = ($Id == 0) ? 'A' : 'U';
        $errFlag = 0;
        $registrationType = 1;
        $arrConditions = array('intId' => $Id,
            'name' => $txtPersonName,
            'email' => $txtPersonEmail,
            'instituteName' => $txtInstituteName,
            'registrationType' => $registrationType,
            'address' => $txtinsAddress,
            'createdBy' => $userId,
            'userid' => $txtUserId,
            'txtPhone' =>$txtPhone);
        if (isset($_POST['txtInsCaptcha']) && !empty($_POST['txtInsCaptcha'])) 
        {

            if ($_SESSION['captcha'] == $strCaptcha) {
                if ($blankInsName > 0 || $blankName > 0) {
                    $errFlag = 1;
                    $outMsg = "Mandatory field should not be black";
                }  else if ($declaration <1) {

                    $outMsg = "Please accept declaration";
                    $errFlag = 1;
                    $flag = 1;
                }

                $arrCDConditions = array('intId' => $Id, 'instituteName' => $txtInstituteName);
///////////////
                $dupResult = $this->manageInstituteRegd('CD', $arrCDConditions);
//                 print_r( $dupResult);exit;

                if ($dupResult) {
                    $numRows = $dupResult->fetch_array();
                    $pCount = count($numRows);
                    if ($pCount > 0) {
                        $outMsg = 'Institute name already exists.';
                        $errFlag = 1;
                        $flag = 1;
                    }
                }

                if ($errFlag == 0) {
                    $result = $this->manageInstituteRegd($action, $arrConditions);
                    if ($result) {

                        /*$numRow = $result->fetch_array();
                        $strregdNo = $numRow[0];
                       // $strAckno = $numRow[1];*/

                        if($_SESSION['lang']!='O')
                        {
                        $outMsg = ($action == 'A') ? 'Thank You !!! You have successfully registered.' : 'Thank You !!! You have successfully registered.';
                        }
                        else
                        {
                        $outMsg = ($action == 'A') ? 'Thank You !!! You have successfully registered.' : 'Thank You !!! You have successfully Registered.';
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


        $strName = ($errFlag == 1) ? $txtPersonName : '';
        $strInstName = ($errFlag == 1) ? $txtInstituteName : '';
        $strPhone = ($errFlag == 1) ? $txtPhone : '';
        $strEmail = ($errFlag == 1) ? $txtPersonEmail : '';
        $strMessage = ($errFlag == 1) ? $txtinsAddress : '';
        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag);
        return $arrResult;
    }

    public function readskillDevelopment($intId) {
        $arrConditions = array('Id' => $intId);
        $result = $this->manageInstituteRegd('R', $arrConditions);
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

    // Function to Delete skillDevelopment Details 

    public function deleteskillDevelopment($action, $ids) {

        $ctr = 0;
        $userId = $_SESSION['adminConsole_userID'];
        $explIds = explode(',', $ids);
        $delRec = 0;
        foreach ($explIds as $indIds) {

            $arrConditions = array('Id' => $explIds[$ctr]
                    /*  'userid'=>$userId */                    );
            $result1 = $this->manageInstituteRegd('R', $arrConditions);
            //print_r( $result1);exit;
            $row = $result1->fetch_array();

            $result = $this->manageInstituteRegd($action, $arrConditions);
            //  print_r( $result);exit;
            $row = $result->fetch_array();
            if ($row[0] == 0)
                $delRec++;
            $ctr++;
        }

        if ($action == 'D') {
            if ($delRec > 0)
                $outMsg .= 'skillDevelopment Detail(s) deleted successfully';
        }

        else if ($action == 'IN')
            $outMsg = 'skill Development Detail(s) unpublished successfully';
        else if ($action == 'P')
            $outMsg = 'skill Development Detail(s) published successfully';

        return $outMsg;
    }

}

?>