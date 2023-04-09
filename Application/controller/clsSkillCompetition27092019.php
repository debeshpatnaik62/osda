<?php

/* * ****Class to manage Submited Skill Competition ********************
  'By                     :T Ketaki Debadarshini   '
  'On                     : 20-01-2018       '
  ' Procedure Used        : USP_SKILL_COMPETITION '
 * ************************************************** */

class clsSkillCompetition extends Model {

    public $idproof; //     

    function __construct() {
        $this->idproof = json_encode(array("1" => 'Birth Certificate', "2" => 'Voter Id', "3" => 'Aadhar Id', "4" => 'Passport'));
        $this->idproofod = json_encode(array("1" => '&#2860;&#2878;&#2864;&#2893;&#2853; &#2872;&#2878;&#2864;&#2893;&#2847;&#2879;&#2859;&#2879;&#2837;&#2887;&#2847;&#2893;', "2" => '&#2861;&#2891;&#2847;&#2864; &#2822;&#2823;&#2849;&#2879;', "3" => '&#2822;&#2855;&#2878;&#2864; &#2822;&#2823;&#2849;&#2879;', "4" => '&#2858;&#2878;&#2872;&#2858;&#2891;&#2864;&#2893;&#2847;'));
    }

    //============ Function to manage Skill Competition ================//
    public function manageSkillCompetition($action, $intCompetitionId, $stateId, $districtId, $strFirstName, $strMiddleName, $strLastName, $strProfilePic, $intGender, $dtmDob, $strEmail, $strMobileno, $strBirthPlace, $strPresentCity, $strAddress1, $strAddress2, $intAddressState, $strAddressCity, $strPincode, $strSchoolName, $intQualification, $strAcademicInst, $intJobstatus, $strWorkplace, $intIdproof, $strIdFile, $strQuery, $intPgSize, $createdBy, $pubStatus, $frmDate, $toDate) {
        $frmDate = ($frmDate == '0000-00-00') ? BLANK_DATE : $frmDate;
        $toDate = ($toDate == '0000-00-00') ? BLANK_DATE : $toDate;
        $dtmDob = ($dtmDob == '0000-00-00') ? BLANK_DATE : $dtmDob;


        $querySql = "CALL USP_SKILL_COMPETITION('$action',$intCompetitionId,$stateId,$districtId,'$strFirstName','$strMiddleName','$strLastName','$strProfilePic',$intGender,'$dtmDob','$strEmail','$strMobileno','$strBirthPlace','$strPresentCity','$strAddress1','$strAddress2',$intAddressState,'$strAddressCity','$strPincode','$strSchoolName',$intQualification,'$strAcademicInst',$intJobstatus,'$strWorkplace',$intIdproof,'$strIdFile','$strQuery',$intPgSize,$createdBy,$pubStatus,'$frmDate','$toDate');";
        //  echo $querySql; //exit;
        $errAction = Model::isSpclChar($action);
        $errName = Model::isSpclChar($stateId);
        $errDist = Model::isSpclChar($districtId);
        $errMsg = Model::isSpclChar($strFirstName);
        $errPhone = Model::isSpclChar($strMiddleName);
        $errProfilePic = Model::isSpclChar($strProfilePic);

        $errFrmdt = Model::isSpclChar($frmDate);
        $errTodate = Model::isSpclChar($toDate);

        if ($errAction > 0 || $errName > 0 || $errDist > 0 || $errMsg > 0 || $errPhone > 0 || $errFrmdt > 0 || $errTodate > 0 || $errProfilePic > 0)
            header("Location:" . APP_URL . "error");
        else {
            $queryResult = Model::executeQry($querySql);
            return $queryResult;
        }
    }

    //========= Function to add competition details ========================//
    public function addCompetitionSkill($strQuerystring, $strLang) {

        $selState = $_POST['selState'];
        $selDistrict = $_POST['selDistrict'];

        $txtFirstName = htmlspecialchars(addslashes($_POST['txtFirstName']), ENT_QUOTES);
        $blankFirstName = Model::isBlank($_POST['txtFirstName']);
        $errFirstName = Model::isSpclChar($_POST['txtFirstName']);
        $lenFirstName = Model::chkLength('max', $_POST['txtFirstName'], 30);

        $txtMiddleName = htmlspecialchars(addslashes($_POST['txtMiddleName']), ENT_QUOTES);
        $errMiddleName = Model::isSpclChar($_POST['txtMiddleName']);
        $lenMiddleName = Model::chkLength('max', $_POST['txtMiddleName'], 30);

        $txtLastName = htmlspecialchars(addslashes($_POST['txtLastName']), ENT_QUOTES);
        $blankLastName = Model::isBlank($_POST['txtLastName']);
        $errLastName = Model::isSpclChar($_POST['txtLastName']);
        $lenLastName = Model::chkLength('max', $_POST['txtLastName'], 30);

        $rdoGender = $_POST['rdoGender'];

        $txtDob = ($_POST['txtDob'] != '') ? model::dbDateFormat($_POST['txtDob']) : '0000-00-00';
        $blankDob = Model::isBlank($_POST['txtDob']);
        $errDob = Model::isSpclChar($_POST['txtDob']);

        $txtEmail = htmlspecialchars(addslashes($_POST['txtEmail']), ENT_QUOTES);
        $blankEmail = Model::isBlank($_POST['txtEmail']);
        $errEmail = Model::isSpclChar($_POST['txtEmail']);
        $lenEmail = Model::chkLength('max', $_POST['txtEmail'], 50);

        $txtPhone = htmlspecialchars(addslashes($_POST['txtPhone']), ENT_QUOTES);
        $blankPhone = Model::isBlank($_POST['txtPhone']);
        $errPhone = Model::isSpclChar($_POST['txtPhone']);
        $lenPhone = Model::chkLength('max', $_POST['txtPhone'], 10);

        $txtBirthPlace = htmlspecialchars(trim($_POST['txtBirthPlace']), ENT_QUOTES);
        $blankBirthPlace = Model::isBlank($_POST['txtBirthPlace']);
        $errBirthPlace = Model::isSpclChar($_POST['txtBirthPlace']);
        $lenBirthPlace = Model::chkLength('max', $_POST['txtBirthPlace'], 50);

        $txtPresentCity = htmlspecialchars(trim($_POST['txtPresentCity']), ENT_QUOTES);
        $blankPresentCity = Model::isBlank($_POST['txtPresentCity']);
        $errPresentCity = Model::isSpclChar($_POST['txtPresentCity']);
        $lenPresentCity = Model::chkLength('max', $_POST['txtPresentCity'], 50);


        $txaAddress1 = htmlspecialchars(addslashes($_POST['txaAddress1']), ENT_QUOTES);
        $blankAddress1 = Model::isBlank($_POST['txaAddress1']);
        $errAddress1 = Model::isSpclChar($_POST['txaAddress1']);
        $lenAddress1 = Model::chkLength('max', $_POST['txaAddress1'], 500);

        $txaAddress2 = htmlspecialchars(addslashes($_POST['txaAddress2']), ENT_QUOTES);
        $errAddress2 = Model::isSpclChar($_POST['txaAddress2']);
        $lenAddress2 = Model::chkLength('max', $_POST['txaAddress2'], 500);


        $selAddressState = $_POST['selAddressState'];
        $txtAddressCity = htmlspecialchars(addslashes($_POST['txtAddressCity']), ENT_QUOTES);
        $blankAddressCity = Model::isBlank($_POST['txtAddressCity']);
        $errAddressCity = Model::isSpclChar($_POST['txtAddressCity']);
        $lenAddressCity = Model::chkLength('max', $_POST['txtAddressCity'], 50);

        $txtPincode = htmlspecialchars(addslashes($_POST['txtPincode']), ENT_QUOTES);
        $blankPincode = Model::isBlank($_POST['txtPincode']);
        $errPincode = Model::isSpclChar($_POST['txtPincode']);
        $lenPincode = Model::chkLength('max', $_POST['txtPincode'], 6);

        $txtSchoolName = htmlspecialchars(addslashes($_POST['txtSchoolName']), ENT_QUOTES);
        $blankSchoolName = Model::isBlank($_POST['txtSchoolName']);
        $errSchoolName = Model::isSpclChar($_POST['txtSchoolName']);
        $lenSchoolName = Model::chkLength('max', $_POST['txtSchoolName'], 100);

        $selQualification = $_POST['selQualification'];

        $txtAcademicInstitute = htmlspecialchars(addslashes($_POST['txtAcademicInstitute']), ENT_QUOTES);
        $blankAcademicInstitute = Model::isBlank($_POST['txtAcademicInstitute']);
        $errAcademicInstitute = Model::isSpclChar($_POST['txtAcademicInstitute']);
        $lenAcademicInstitute = Model::chkLength('max', $_POST['txtAcademicInstitute'], 100);

        $rdoWorkSatus = $_POST['rdoWorkSatus'];
        if ($rdoWorkSatus == 1) {
            $txtWorkPlace = htmlspecialchars(addslashes($_POST['txtWorkPlace']), ENT_QUOTES);
            $blankWorkPlace = Model::isBlank($_POST['txtWorkPlace']);
            $errWorkPlace = Model::isSpclChar($_POST['txtWorkPlace']);
        }

        $selIdProof = $_POST['selIdProof'];

        /* $fileDocumentnm         = $_FILES['fileDocument']['name'];
          $fileSize               = $_FILES['fileDocument']['size'];
          $fileTemp               = $_FILES['fileDocument']['tmp_name'];
          $ext                    = pathinfo($fileDocumentnm , PATHINFO_EXTENSION);
          $fileDocument           = ($fileDocumentnm != '') ? 'skillcomp_idproof_' . time() . '.' . $ext : '';
          $fileMimetype           = mime_content_type($fileTemp); */

        $fileDocument = $_POST['hdnIdProofPic'];
        $errfileDocument = Model::isSpclChar($_POST['hdnIdProofPic']);

        $ProfileDocument = $_POST['hdnProfilePic'];
        $errProfileDocument = Model::isSpclChar($_POST['hdnProfilePic']);


        $strSkills = $_POST['chkSkillset'];
        $noOfSkills = count($strSkills);
        $sqlTagging = '';
        for ($i = 0; $i < $noOfSkills; $i++) {

            $sqlTagging .= '(@P_COMP_ID,' . trim($strSkills[$i]) . ',NOW()),';
        }
        $sqlTagging = rtrim($sqlTagging, ',');





        if (in_array(18, $strSkills)) {

            $txtFirstNamepop = htmlspecialchars(addslashes($_POST['txtFirstNamepop']), ENT_QUOTES);
            $blankFirstNamepop = Model::isBlank($_POST['txtFirstNamepop']);
            $errFirstNamepop = Model::isSpclChar($_POST['txtFirstNamepop']);
            $lenFirstNamepop = Model::chkLength('max', $_POST['txtFirstNamepop'], 30);

            $txtMiddleNamepop = htmlspecialchars(addslashes($_POST['txtMiddleNamepop']), ENT_QUOTES);
            $errMiddleNamepop = Model::isSpclChar($_POST['txtMiddleNamepop']);
            $lenMiddleNamepop = Model::chkLength('max', $_POST['txtMiddleNamepop'], 30);

            $txtLastNamepop = htmlspecialchars(addslashes($_POST['txtLastNamepop']), ENT_QUOTES);
            $blankLastNamepop = Model::isBlank($_POST['txtLastNamepop']);
            $errLastNamepop = Model::isSpclChar($_POST['txtLastNamepop']);
            $lenLastNamepop = Model::chkLength('max', $_POST['txtLastNamepop'], 30);

            $rdoGenderpop = $_POST['rdoGenderpop'];

            $txtDobpop = ($_POST['txtDobpop'] != '') ? model::dbDateFormat($_POST['txtDobpop']) : '0000-00-00';
            $blankDobpop = Model::isBlank($_POST['txtDobpop']);
            $errDobpop = Model::isSpclChar($_POST['txtDobpop']);

            $txtEmailpop = htmlspecialchars(addslashes($_POST['txtEmailpop']), ENT_QUOTES);
            $blankEmailpop = Model::isBlank($_POST['txtEmailpop']);
            $errEmailpop = Model::isSpclChar($_POST['txtEmailpop']);
            $lenEmailpop = Model::chkLength('max', $_POST['txtEmailpop'], 50);

            $txtPhonepop = htmlspecialchars(addslashes($_POST['txtPhonepop']), ENT_QUOTES);
            $blankPhonepop = Model::isBlank($_POST['txtPhonepop']);
            $errPhonepop = Model::isSpclChar($_POST['txtPhonepop']);
            $lenPhonepop = Model::chkLength('max', $_POST['txtPhonepop'], 10);

            $txtBirthPlacepop = htmlspecialchars(trim($_POST['txtBirthPlacepop']), ENT_QUOTES);
            $blankBirthPlacepop = Model::isBlank($_POST['txtBirthPlacepop']);
            $errBirthPlacepop = Model::isSpclChar($_POST['txtBirthPlacepop']);
            $lenBirthPlacepop = Model::chkLength('max', $_POST['txtBirthPlacepop'], 50);

            $txtPresentCitypop = htmlspecialchars(trim($_POST['txtPresentCitypop']), ENT_QUOTES);
            $blankPresentCitypop = Model::isBlank($_POST['txtPresentCitypop']);
            $errPresentCitypop = Model::isSpclChar($_POST['txtPresentCitypop']);
            $lenPresentCitypop = Model::chkLength('max', $_POST['txtPresentCitypop'], 50);


            $txaAddress1pop = htmlspecialchars(addslashes($_POST['txaAddress1pop']), ENT_QUOTES);
            $blankAddress1pop = Model::isBlank($_POST['txaAddress1pop']);
            $errAddress1pop = Model::isSpclChar($_POST['txaAddress1pop']);
            $lenAddress1pop = Model::chkLength('max', $_POST['txaAddress1pop'], 500);

            $txaAddress2pop = htmlspecialchars(addslashes($_POST['txaAddress2pop']), ENT_QUOTES);
            $errAddress2pop = Model::isSpclChar($_POST['txaAddress2pop']);
            $lenAddress2pop = Model::chkLength('max', $_POST['txaAddress2pop'], 500);


            $selAddressStatepop = $_POST['selAddressStatepop'];
            $txtAddressCitypop = htmlspecialchars(addslashes($_POST['txtAddressCitypop']), ENT_QUOTES);
            $blankAddressCitypop = Model::isBlank($_POST['txtAddressCitypop']);
            $errAddressCitypop = Model::isSpclChar($_POST['txtAddressCitypop']);
            $lenAddressCitypop = Model::chkLength('max', $_POST['txtAddressCitypop'], 50);

            $txtPincodepop = htmlspecialchars(addslashes($_POST['txtPincodepop']), ENT_QUOTES);
            $blankPincodepop = Model::isBlank($_POST['txtPincodepop']);
            $errPincodepop = Model::isSpclChar($_POST['txtPincodepop']);
            $lenPincodepop = Model::chkLength('max', $_POST['txtPincodepop'], 6);

            $txtSchoolNamepop = htmlspecialchars(addslashes($_POST['txtSchoolNamepop']), ENT_QUOTES);
            $blankSchoolNamepop = Model::isBlank($_POST['txtSchoolNamepop']);
            $errSchoolNamepop = Model::isSpclChar($_POST['txtSchoolNamepop']);
            $lenSchoolNamepop = Model::chkLength('max', $_POST['txtSchoolNamepop'], 100);

            $selQualificationpop = $_POST['selQualificationpop'];

            $txtAcademicInstitutepop = htmlspecialchars(addslashes($_POST['txtAcademicInstitutepop']), ENT_QUOTES);
            $blankAcademicInstitutepop = Model::isBlank($_POST['txtAcademicInstitutepop']);
            $errAcademicInstitutepop = Model::isSpclChar($_POST['txtAcademicInstitutepop']);
            $lenAcademicInstitutepop = Model::chkLength('max', $_POST['txtAcademicInstitutepop'], 100);

            $rdoWorkSatuspop = $_POST['rdoWorkSatuspop'];
            if ($rdoWorkSatuspop == 1) {
                $txtWorkPlacepop = htmlspecialchars(addslashes($_POST['txtWorkPlacepop']), ENT_QUOTES);
                $blankWorkPlacepop = Model::isBlank($_POST['txtWorkPlacepop']);
                $errWorkPlacepop = Model::isSpclChar($_POST['txtWorkPlacepop']);
            }

            $selIdProofpop = $_POST['selIdProofpop'];


            $fileDocumentpop = $_POST['hdnIdProofPicpop'];
            $errfileDocumentpop = Model::isSpclChar($_POST['hdnIdProofPicpop']);

            $ProfileDocumentpop = $_POST['hdnProfilePic1'];
            $errProfileDocumentpop = Model::isSpclChar($_POST['hdnProfilePic1']);
        }







        $outMsg = '';
        $action = 'AU';
        $errFlag = 0;
        $strCaptcha = $_POST["txtSkillCaptcha"];

        if (isset($_POST['txtSkillCaptcha']) && !empty($_POST['txtSkillCaptcha'])) {
            // echo $_POST['txtNanoCaptcha'].' aa'.$_SESSION['captcha'];

            if ($_SESSION['captcha'] == $strCaptcha) {
                if ($selState == 0 || $selDistrict == 0 || ($blankFirstName > 0) || $blankLastName > 0 || $blankDob > 0 || ($rdoGender == '') || ($blankDob > 0) || $blankEmail > 0 || $blankPhone > 0 || $blankBirthPlace > 0 || $blankPresentCity > 0 || $blankAddress1 > 0 || $blankAddressCity > 0 || $selAddressState == 0 || $blankPincode > 0 || $blankAddressCity > 0 || $blankPincode > 0 || $blankSchoolName > 0 || $blankAcademicInstitute > 0 || $rdoWorkSatus == 0 || $selIdProof == 0 || $noOfSkills == 0 || $fileDocument == '' || $ProfileDocument == '') {
                    $errFlag = 1;
                    $outMsg = "Mandatory fields should not be left blank";
                } else if (($errFirstName > 0) || ($errMiddleName > 0) || ($errLastName > 0) || $errDob > 0 || ($errEmail > 0) || $errPhone > 0 || $errBirthPlace > 0 || $errPresentCity > 0 || $errAddress1 > 0 || $errAddress2 > 0 || $errAddressCity > 0 || $errPincode > 0 || $errSchoolName > 0 || $errAcademicInstitute > 0 || $errWorkPlace > 0 || $errfileDocument > 0 || $errProfileDocument > 0) {
                    $errFlag = 1;
                    $outMsg = "Special characters are not allowed";
                } else if (($lenFirstName > 0) || ($lenMiddleName > 0) || ($lenLastName > 0) || $lenEmail > 0 || ($lenAcademicInstitute > 0) || $lenSchoolName > 0 || $lenPincode > 0 || $lenAddressCity > 0 || $lenAddress2 > 0 || $lenAddress1 > 0 || $lenPresentCity > 0 || $lenBirthPlace > 0 || $lenPhone > 0) {
                    $errFlag = 1;
                    $outMsg = "Length should not exceed maxlength";
                }/* else if($fileMimetype!='image/jpg' && $fileMimetype!='image/jpeg' && $fileMimetype!='application/pdf' && $fileDocumentnm!='') {
                  $errFlag               = 1;
                  $outMsg                = 'Invalid file types. Upload only jpg,jpeg,pdf';
                  }else if ($fileSize > SIZE1MB) {
                  $errFlag                = 1;
                  $outMsg                 = 'File size can not more than 1 MB';
                  } */



                if (in_array(18, $strSkills)) {
                    if (($txtFirstNamepop > 0) || $blankLastNamepop > 0 || $blankDobpop > 0 || ($rdoGenderpop == '') || ($blankDobpop > 0) || $blankEmailpop > 0 || $blankPhonepop > 0 || $blankBirthPlacepop > 0 || $blankPresentCitypop > 0 || $blankAddress1pop > 0 || $blankAddressCitypop > 0 || $selAddressStatepop == 0 || $blankPincodepop > 0 || $blankAddressCitypop > 0 || $blankPincodepop > 0 || $blankSchoolNamepop > 0 || $blankAcademicInstitutepop > 0 || $rdoWorkSatuspop == 0 || $selIdProofpop == 0 || $fileDocumentpop == '' || $ProfileDocumentpop == '') {
                        $errFlag = 1;
                        $outMsg = "Mandatory fields should not be left blank";
                    } else if (($errFirstNamepop > 0) || ($errMiddleNamepop > 0) || ($errLastNamepop > 0) || $errDobpop > 0 || ($errEmailpop > 0) || $errPhonepop > 0 || $errBirthPlacepop > 0 || $errPresentCitypop > 0 || $errAddress1pop > 0 || $errAddress2pop > 0 || $errAddressCitypop > 0 || $errPincodepop > 0 || $errSchoolNamepop > 0 || $errAcademicInstitutepop > 0 || $errWorkPlacepop > 0 || $errfileDocumentpop > 0 || $errProfileDocumentpop > 0) {
                        $errFlag = 1;
                        $outMsg = "Special characters are not allowed";
                    } else if (($lenFirstNamepop > 0) || ($lenMiddleNamepop > 0) || ($lenLastNamepop > 0) || $lenEmailpop > 0 || ($lenAcademicInstitutepop > 0) || $lenSchoolNamepop > 0 || $lenPincodepop > 0 || $lenAddressCitypop > 0 || $lenAddress2pop > 0 || $lenAddress1pop > 0 || $lenPresentCitypop > 0 || $lenBirthPlacepop > 0 || $lenPhonepop > 0) {
                        $errFlag = 1;
                        $outMsg = "Length should not exceed maxlength";
                    }
                }



                if ($errFlag == 0) {
                    $result = $this->manageSkillCompetition('AU', 0, $selState, $selDistrict, $txtFirstName, $txtMiddleName, $txtLastName, $ProfileDocument, $rdoGender, $txtDob, $txtEmail, $txtPhone, $txtBirthPlace, $txtPresentCity, $txaAddress1, $txaAddress2, $selAddressState, $txtAddressCity, $txtPincode, $txtSchoolName, $selQualification, $txtAcademicInstitute, $rdoWorkSatus, $txtWorkPlace, $selIdProof, $fileDocument, $sqlTagging, 0, 0, 0, '0000-00-00', '0000-00-00');
                    if ($result) {

                        $numRow = $result->fetch_array();
                        $intStatus = $numRow[0];
                        $strAckno = $numRow[1];
                        if ($intStatus > 0) {
                            if (in_array(18, $strSkills)) {
                                $result = $this->manageSkillCompetition('AU', $intStatus, $selState, $selDistrict, $txtFirstNamepop, $txtMiddleNamepop, $txtLastNamepop, $ProfileDocumentpop, $rdoGenderpop, $txtDobpop, $txtEmailpop, $txtPhonepop, $txtBirthPlacepop, $txtPresentCitypop, $txaAddress1pop, $txaAddress2pop, $selAddressStatepop, $txtAddressCitypop, $txtPincodepop, $txtSchoolNamepop, $selQualificationpop, $txtAcademicInstitutepop, $rdoWorkSatuspop, $txtWorkPlacepop, $selIdProofpop, $fileDocumentpop, $sqlTagging, 0, 0, 0, '0000-00-00', '0000-00-00');
                                $numRow = $result->fetch_array();
                                $intStatus = $numRow[0];
                                $strAckno = $numRow[1];
                            }
                            //  $outMsg = 'Thank you for your details. We will get back to you soon';

                            if (!file_exists(APP_PATH . 'uploadDocuments/skillCompetition/' . $strAckno) && !is_dir(APP_PATH . 'uploadDocuments/skillCompetition/' . $strAckno)) {

                                mkdir(APP_PATH . 'uploadDocuments/skillCompetition/' . $strAckno, 0777, true);
                            }

                            if (isset($_POST['hdnIdProofPic']) && $_POST['hdnIdProofPic'] != '' && file_exists(APP_PATH . 'temp/' . $fileDocument)) {

                                rename(APP_PATH . 'temp/' . $fileDocument, APP_PATH . 'uploadDocuments/skillCompetition/' . $strAckno . '/' . $fileDocument);
                            }
                            if (isset($_POST['hdnProfilePic']) && $_POST['hdnProfilePic'] != '' && file_exists(APP_PATH . 'temp/' . $ProfileDocument)) {

                                rename(APP_PATH . 'temp/' . $ProfileDocument, APP_PATH . 'uploadDocuments/skillCompetition/' . $strAckno . '/' . $ProfileDocument);
                            }


                            /* for robotics */
                            if (in_array(18, $strSkills)) {
                                if (isset($_POST['hdnIdProofPicpop']) && $_POST['hdnIdProofPicpop'] != '' && file_exists(APP_PATH . 'temp/' . $fileDocumentpop)) {

                                    rename(APP_PATH . 'temp/' . $fileDocumentpop, APP_PATH . 'uploadDocuments/skillCompetition/' . $strAckno . '/' . $fileDocumentpop);
                                }
                                if (isset($_POST['hdnProfilePic1']) && $_POST['hdnProfilePic1'] != '' && file_exists(APP_PATH . 'temp/' . $ProfileDocumentpop)) {

                                    rename(APP_PATH . 'temp/' . $ProfileDocumentpop, APP_PATH . 'uploadDocuments/skillCompetition/' . $strAckno . '/' . $ProfileDocumentpop);
                                }
                            }
                            /* robotics file upload end */


                            //send mail to osda
                            if (SEND_MAIL == "Y") {
                                $strsubject = "OSDA :: India Skill Competition - Odisha 2018";
                                //send mail to osda
                                //$strTo[]               = $txtEmail;
                                if (in_array(18, $strSkills)) {
                                    // $strTo[]               = $txtEmail.','.$txtEmailpop;
                                    $strTo = array($txtEmail, $txtEmailpop);
                                } else {
                                    $strTo[] = $txtEmail;
                                }

                                $strFrom = PORTAL_EMAIL;
                                $strUserMessage = "<strong>Thank you for your registration in India Skill Competition - Odisha 2018.</strong></br>";
                                $strUserMessage .= "<div> <br>";
                                $strUserMessage .= " We will get back to you soon.";
                                $strUserMessage .= "</div>";

                                $strUserMessage .= "<div> <br> Your Acknowledgement No : <strong>" . $strAckno . "</strong> <br> Please keep this for future communication. </div>";

                                $strUserMessage .= "<div><br><br>Best Regards,<br>Odisha Skill Development Authority<br>Government of Odisha</div>";

                                $data['from'] = $strFrom;
                                $data['to'] = $strTo;
                                $data['name'] = 'Odisha Skill Development Authority';
                                $data['sub'] = $strsubject;
                                $data['message'] = $strUserMessage;
                                $jsData = json_encode($data);
                                $mailRes = $this->sendAuthMail($jsData);
                                //  print_r($mailRes);
                            }

                            header("Location:" . SITE_URL . "register-success/" . $this->encrypt($intStatus . '/' . $strAckno . '/' . $strQuerystring . '/' . $strLang));
                        } else {
                            $errFlag = 1;
                            $outMsg = 'The Email-Id is adlready registered with us. <br> Pleaset try again with another Email-Id';
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
            // $outMsg = 'Please click on the reCAPTCHA box.'; 
            $outMsg = 'Please enter captcha code.';
            $errFlag = 1;
        }

        $selState = ($errFlag == 1) ? $selState : 0;
        $selDistrict = ($errFlag == 1) ? $selDistrict : 0;
        $txtFirstName = ($errFlag == 1) ? $txtFirstName : '';
        $txtMiddleName = ($errFlag == 1) ? $txtMiddleName : '';
        $txtLastName = ($errFlag == 1) ? $txtLastName : '';
        $rdoGender = ($errFlag == 1) ? $rdoGender : '';
        $txtDob = ($errFlag == 1) ? $txtDob : '';
        $txtEmail = ($errFlag == 1) ? $txtEmail : '';
        $txtPhone = ($errFlag == 1) ? $txtPhone : '';
        $txtBirthPlace = ($errFlag == 1) ? $txtBirthPlace : '';
        $txtPresentCity = ($errFlag == 1) ? $txtPresentCity : '';
        $txaAddress1 = ($errFlag == 1) ? $txaAddress1 : '';
        $txaAddress2 = ($errFlag == 1) ? $txaAddress2 : '';
        $selAddressState = ($errFlag == 1) ? $selAddressState : '';
        $txtAddressCity = ($errFlag == 1) ? $txtAddressCity : '';
        $txtPincode = ($errFlag == 1) ? $txtPincode : '';
        $txtSchoolName = ($errFlag == 1) ? $txtSchoolName : '';
        $selQualification = ($errFlag == 1) ? $selQualification : '';
        $txtAcademicInstitute = ($errFlag == 1) ? $txtAcademicInstitute : '';
        $rdoWorkSatus = ($errFlag == 1) ? $rdoWorkSatus : '';
        $txtWorkPlace = ($errFlag == 1) ? $txtWorkPlace : '';
        $selIdProof = ($errFlag == 1) ? $selIdProof : '';
        $fileDocument = ($errFlag == 1) ? $fileDocument : '';


        /* for robotic */
        if (in_array(18, $strSkills)) {
            $txtFirstNamepop = ($errFlag == 1) ? $txtFirstNamepop : '';
            $txtMiddleNamepop = ($errFlag == 1) ? $txtMiddleNamepop : '';
            $txtLastNamepop = ($errFlag == 1) ? $txtLastNamepop : '';
            $rdoGenderpop = ($errFlag == 1) ? $rdoGenderpop : '';
            $txtDobpop = ($errFlag == 1) ? $txtDobpop : '';
            $txtEmailpop = ($errFlag == 1) ? $txtEmailpop : '';
            $txtPhonepop = ($errFlag == 1) ? $txtPhonepop : '';
            $txtBirthPlacepop = ($errFlag == 1) ? $txtBirthPlacepop : '';
            $txtPresentCitypop = ($errFlag == 1) ? $txtPresentCitypop : '';
            $txaAddress1pop = ($errFlag == 1) ? $txaAddress1pop : '';
            $txaAddress2pop = ($errFlag == 1) ? $txaAddress2pop : '';
            $selAddressStatepop = ($errFlag == 1) ? $selAddressStatepop : '';

            $txtAddressCitypop = ($errFlag == 1) ? $txtAddressCitypop : '';
            $txtPincodepop = ($errFlag == 1) ? $txtPincodepop : '';
            $txtSchoolNamepop = ($errFlag == 1) ? $txtSchoolNamepop : '';
            $selQualificationpop = ($errFlag == 1) ? $selQualificationpop : '';
            $txtAcademicInstitutepop = ($errFlag == 1) ? $txtAcademicInstitutepop : '';
            $rdoWorkSatuspop = ($errFlag == 1) ? $rdoWorkSatuspop : '';
            $txtWorkPlacepop = ($errFlag == 1) ? $txtWorkPlacepop : '';
            $selIdProofpop = ($errFlag == 1) ? $selIdProofpop : '';
            $fileDocumentpop = ($errFlag == 1) ? $fileDocumentpop : '';
        }


        /* robotics end */
        if (in_array(18, $strSkills)) {
            $arrResult = array('msg' => $outMsg, 'errFlag' => $errFlag, 'selState' => $selState, 'selDistrict' => $selDistrict, 'txtFirstName' => $txtFirstName, 'txtMiddleName' => $txtMiddleName
                , 'txtLastName' => $txtLastName, 'rdoGender' => $rdoGender, 'txtDob' => $txtDob, 'txtEmail' => $txtEmail
                , 'txtPhone' => $txtPhone, 'txtBirthPlace' => $txtBirthPlace, 'txtPresentCity' => $txtPresentCity, 'txaAddress1' => $txaAddress1
                , 'txaAddress2' => $txaAddress2, 'selAddressState' => $selAddressState, 'txtAddressCity' => $txtAddressCity, 'txtPincode' => $txtPincode
                , 'txtWorkPlace' => $txtWorkPlace, 'selIdProof' => $selIdProof, 'strSkills' => $strSkills
                , 'txtSchoolName' => $txtSchoolName, 'selQualification' => $selQualification, 'txtAcademicInstitute' => $txtAcademicInstitute, 'rdoWorkSatus' => $rdoWorkSatus);
        } else {
            $arrResult = array('msg' => $outMsg, 'errFlag' => $errFlag, 'selState' => $selState, 'selDistrict' => $selDistrict, 'txtFirstName' => $txtFirstName, 'txtMiddleName' => $txtMiddleName
                , 'txtLastName' => $txtLastName, 'rdoGender' => $rdoGender, 'txtDob' => $txtDob, 'txtEmail' => $txtEmail
                , 'txtPhone' => $txtPhone, 'txtBirthPlace' => $txtBirthPlace, 'txtPresentCity' => $txtPresentCity, 'txaAddress1' => $txaAddress1
                , 'txaAddress2' => $txaAddress2, 'selAddressState' => $selAddressState, 'txtAddressCity' => $txtAddressCity, 'txtPincode' => $txtPincode
                , 'txtWorkPlace' => $txtWorkPlace, 'selIdProof' => $selIdProof, 'strSkills' => $strSkills
                , 'txtSchoolName' => $txtSchoolName, 'selQualification' => $selQualification, 'txtAcademicInstitute' => $txtAcademicInstitute, 'rdoWorkSatus' => $rdoWorkSatus, 'txtFirstNamepop' => $txtFirstNamepop, 'txtMiddleNamepop' => $txtMiddleNamepop
                , 'txtLastNamepop' => $txtLastNamepop, 'rdoGenderpop' => $rdoGenderpop, 'txtDobpop' => $txtDobpop, 'txtEmailpop' => $txtEmailpop
                , 'txtPhonepop' => $txtPhonepop, 'txtBirthPlacepop' => $txtBirthPlacepop, 'txtPresentCitypop' => $txtPresentCitypop, 'txaAddress1pop' => $txaAddress1pop
                , 'txaAddress2pop' => $txaAddress2pop, 'selAddressStatepop' => $selAddressStatepop, 'txtAddressCitypop' => $txtAddressCitypop, 'txtPincodepop' => $txtPincodepop
                , 'txtWorkPlacepop' => $txtWorkPlacepop, 'selIdProofpop' => $selIdProofpop, 'strSkillspop' => $strSkillspop
                , 'txtSchoolNamepop' => $txtSchoolNamepop, 'selQualificationpop' => $selQualificationpop, 'txtAcademicInstitutepop' => $txtAcademicInstitutepop, 'rdoWorkSatuspop' => $rdoWorkSatuspop);
        }
        return $arrResult;
    }

    //============ Function to delete Query ===================//
    public function deleteSkillCompetition($action, $ids) {
        $newSessionId = session_id();
        $hdnPrevSessionId = $_POST['hdnPrevSessionId'];
        if ($newSessionId == $hdnPrevSessionId) {

            $ctr = 0;
            $explIds = explode(',', $ids);
            $delRec = 0;
            foreach ($explIds as $indIds) {
                $result = $this->manageSkillCompetition('D', $explIds[$ctr], 0, 0, '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00');
                if ($result)
                    $delRec++;
                $ctr++;
            }
            if ($delRec > 0)
                $outMsg = 'Selected Record(s) Deleted Successfully';
            else
                $outMsg = 'Operation Failed. Transaction Aborted';
            return $outMsg;
        }else {
            header("Location:" . APP_URL . "error");
        }
    }

}

?>