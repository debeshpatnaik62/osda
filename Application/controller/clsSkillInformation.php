<?php

class clsSkillInformation extends Model {

    //Function to manage skillDevelopment

    public function manageskillInformation($action, $arrConditions) {
        try {

            $result = Model::callProc('USP_SKILLINFORMATION', $action, $arrConditions);
            return $result;
//echo $result;exit;
        }//
        catch (Exception $e) {
            echo 'Error:' . $e->getMessage();
            exit();
        }
    }

    public function addUpdateskillInformation($Id) {
       
        $userId = !empty($_SESSION['adminConsole_userID'])?$_SESSION['adminConsole_userID']:1;
        $Id = (isset($Id)) ? $Id : 0;

        $txtName = $_POST['txtName'];

        $blankName = Model::isBlank($_POST['txtName']);
        $lenName = Model::chkLength('max', $txtName, 200);
        $txtAge  = $_POST['intAge'];

        $txtGender         = !empty($_POST['intGender'])?$_POST['intGender']:'0';
        $txtAddress         = !empty($_POST['txtAddress'])?htmlspecialchars($_POST['txtAddress'], ENT_QUOTES):'';
        $txtQualification   = !empty($_POST['intQualification'])?$_POST['intQualification']:'0';
        $txtJob             = !empty($_POST['intJob'])?$_POST['intJob']:0;
        $txtJobTrained      = !empty($_POST['intTrained'])?$_POST['intTrained']:'';
        $txtPhone           = !empty($_POST['txtPhone'])?$_POST['txtPhone']:'';
        $moveOut            = $_POST['selMoveOut'];
        $yearOfExp          = $_POST['ddlYearOfExp'];
        $txtExperience      = !empty($_POST['txtExperience'])?htmlspecialchars($_POST['txtExperience'], ENT_QUOTES):'';
        $txtInformation     = !empty($_POST['txtInformation'])?htmlspecialchars($_POST['txtInformation'], ENT_QUOTES):'';
        $lenInformation     = Model::chkLength('max', $txtInformation, 100);

        $txtEmail = $_POST['txtEmail'];
        $lenEmail = Model::chkLength('max', $txtEmail, 60);
        $blankEmail = Model::isBlank($_POST['txtEmail']);
        $blankPhone = Model::isBlank($_POST['txtPhone']);

        $instituteType      = !empty($_POST['instituteType'])?$_POST['instituteType']:'0';
        $instituteName      = !empty($_POST['selInstituteName'])?$_POST['selInstituteName']:'';
        $otherInstituteName = !empty($_POST['otherInstituteName'])?htmlspecialchars($_POST['otherInstituteName'], ENT_QUOTES):'';
        $validCertificate   = !empty($_POST['selCertificate'])?$_POST['selCertificate']:'0';
        $skillDetails1      = !empty($_POST['skillDetails1'])?$_POST['skillDetails1']:'';
        $skillDetails2      = !empty($_POST['skillDetails2'])?$_POST['skillDetails2']:'';
        $fromOdisha         = !empty($_POST['rbtnstate'])?$_POST['rbtnstate']:'0';
        $stateName          = !empty($_POST['stateName'])?htmlspecialchars($_POST['stateName'], ENT_QUOTES):'';
        $districtName       = !empty($_POST['txtDistrict'])?htmlspecialchars($_POST['txtDistrict'], ENT_QUOTES):'';
        $blockName          = !empty($_POST['txtBlock'])?htmlspecialchars($_POST['txtBlock'], ENT_QUOTES):'';
        $panchayatName      = !empty($_POST['txtPanchayat'])?htmlspecialchars($_POST['txtPanchayat'], ENT_QUOTES):'';
        $villageName        = !empty($_POST['txtVillage'])?htmlspecialchars($_POST['txtVillage'], ENT_QUOTES):'';
        $chkLanguage        = !empty($_POST['chkLanguage'])?implode(',', $_POST['chkLanguage']):'';
        $language1          = !empty($_POST['txtLang1'])?htmlspecialchars($_POST['txtLang1'], ENT_QUOTES):'';
        $language2          = !empty($_POST['txtLang2'])?htmlspecialchars($_POST['txtLang2'], ENT_QUOTES):'';

        $districtId       = !empty($_POST['selDistrict'])?htmlspecialchars($_POST['selDistrict'], ENT_QUOTES):'0';
        $blockId          = !empty($_POST['selBlock'])?htmlspecialchars($_POST['selBlock'], ENT_QUOTES):'0';
        $panchayatId      = !empty($_POST['selPanchayat'])?htmlspecialchars($_POST['selPanchayat'], ENT_QUOTES):'0';
        $villageId        = !empty($_POST['selVillage'])?htmlspecialchars($_POST['selVillage'], ENT_QUOTES):'0';

        $txtDob           = $_POST['txtDob'];
        $dateofBirth      =  Model::dbDateFormat($txtDob);

        $totalReg = date('ymd').time();

        $outMsg = '';
        $flag   = ($Id != 0) ? 1 : 0;
        $action = ($Id == 0) ? 'A' : 'U';
        $errFlag = 0;

        $arrConditions = array('intId' => $Id,
            'name' => $txtName,
            'email' => $txtEmail,
            'age' => $txtAge,
            'gender' => $txtGender,
            'address' => $txtAddress,
            'qualification' => $txtQualification,
            'jobrole' => $txtJob,
            'jobtrained' =>$txtJobTrained,
            'txtPhone' =>$txtPhone,
            'txtRegdNumber' =>$totalReg,
            'moveout' =>$moveOut,
            'expYear' =>$yearOfExp,
            'experience' =>$txtExperience,
            'information' =>$txtInformation,
            'instituteType' => $instituteType,
            'instituteName' => $instituteName,
            'otherInstituteName' => $otherInstituteName,
            'validCertificate' => $validCertificate,
            'skillDetails1' => $skillDetails1,
            'skillDetails2' => $skillDetails2,
            'fromOdisha' => $fromOdisha,
            'stateName' => $stateName,
            'district' => $districtName,
            'blockName' =>$blockName,
            'panchayatName' =>$panchayatName,
            'villageName' =>$villageName,
            'language1' =>$language1,
            'language2' =>$language2,
            'txtDob' =>$dateofBirth,
            'chkLanguage' =>$chkLanguage,
            'districtId' => $districtId,
            'blockId' =>$blockId,
            'panchayatId' =>$panchayatId,
            'villageId' =>$villageId,);
        
                if ($blankName > 0  || $blankPhone>0) {
                    $errFlag = 1;
                    $outMsg = "Mandatory field should not be blank";
                }
                else if ($lenInformation > 0) {

                    $outMsg = "Length should not exceed max length";
                    $errFlag = 1;
                    $flag = 1;
                } 

                $arrCDConditions = array('intId' => $Id, 'mobile' => $txtPhone);

                $dupResult = $this->manageskillInformation('CD', $arrCDConditions);
//                 print_r( $dupResult);exit;

                if ($dupResult) {
                    $numRows = $dupResult->fetch_array();
                    $pCount = count($numRows);
                    if ($pCount > 0) {
                        $outMsg = 'This mobile number is already exist.';
                        $errFlag = 1;
                        $flag = 1;
                    }
                }

                if ($errFlag == 0) {
                    $result = $this->manageskillInformation($action, $arrConditions);
                    if ($result) {                       

                        if($_SESSION['lang']!='O')
                        {
                        $outMsg = 'Thank You for your registration. Your Application Id is '. $totalReg;
                        }
                        else
                        {
                        $outMsg = 'Thank You for your registration. Your Application Id is '. $totalReg;
                        }

                    } else {
                        $errFlag = 1;
                        $outMsg = 'Error in opertaion please try again';
                    }
                }       


        $strName = ($errFlag == 1) ? $txtName : '';
        $strEmail = ($errFlag == 1) ? $txtEmail : '';
        
        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag);
        return $arrResult;
    }

    public function readskillInformation($intId) {
        $arrConditions = array('Id' => $intId);
        $result = $this->manageskillInformation('R', $arrConditions);
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

    /*public function deleteskillInformation($action, $ids) {

        $ctr = 0;
        $userId = $_SESSION['adminConsole_userID'];
        $explIds = explode(',', $ids);
        $delRec = 0;
        foreach ($explIds as $indIds) {

            $arrConditions = array('Id' => $explIds[$ctr]
            $result = $this->manageskillInformation($action, $arrConditions);
            //  print_r( $result);exit;
            $row = $result->fetch_array();
            if ($row[0] == 0)
                $delRec++;
            $ctr++;
        }

        if ($action == 'D') {
            if ($delRec > 0)
                $outMsg .= 'skill Information Detail(s) deleted successfully';
        }

        else if ($action == 'IN')
            $outMsg = 'skill Development Detail(s) unpublished successfully';
        else if ($action == 'P')
            $outMsg = 'skill Development Detail(s) published successfully';

        return $outMsg;
    }*/


}

?>