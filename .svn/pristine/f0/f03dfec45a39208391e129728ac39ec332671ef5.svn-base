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
    public function manageSkillCompetition($action, $intCompetitionId, $districtId, $blockId, $strFirstName, $strMiddleName, $strLastName, $strProfilePic, $intGender, $dtmDob, $strEmail, $strMobileno, $strBirthPlace, $strPresentCity, $strAddress1, $strAddress2, $intAddressState, $strAddressCity, $strPincode, $strSchoolName, $intQualification, $strAcademicInst, $intJobstatus, $strWorkplace, $intIdproof, $strIdFile, $strQuery, $intPgSize, $createdBy, $pubStatus, $frmDate, $toDate) {
        $frmDate = ($frmDate == '0000-00-00') ? BLANK_DATE : $frmDate;
        $toDate = ($toDate == '0000-00-00') ? BLANK_DATE : $toDate;
        $dtmDob = ($dtmDob == '0000-00-00') ? BLANK_DATE : $dtmDob;


        $querySql = "CALL USP_SKILL_COMPETITION('$action',$intCompetitionId,$districtId,$blockId,'$strFirstName','$strMiddleName','$strLastName','$strProfilePic',$intGender,'$dtmDob','$strEmail','$strMobileno','$strBirthPlace','$strPresentCity','$strAddress1','$strAddress2',$intAddressState,'$strAddressCity','$strPincode','$strSchoolName',$intQualification,'$strAcademicInst',$intJobstatus,'$strWorkplace',$intIdproof,'$strIdFile','$strQuery',$intPgSize,$createdBy,$pubStatus,'$frmDate','$toDate');";
  //echo $querySql; //exit;
        $errAction = Model::isSpclChar($action);
        $errBlock = Model::isSpclChar($blockId);
        $errDist = Model::isSpclChar($districtId);
        $errMsg = Model::isSpclChar($strFirstName);
        $errPhone = Model::isSpclChar($strMiddleName);
        $errProfilePic = Model::isSpclChar($strProfilePic);

        $errFrmdt = Model::isSpclChar($frmDate);
        $errTodate = Model::isSpclChar($toDate);

        if ($errAction > 0 || $errBlock > 0 || $errDist > 0 || $errMsg > 0 || $errPhone > 0 || $errFrmdt > 0 || $errTodate > 0 || $errProfilePic > 0)
            header("Location:" . APP_URL . "error");
        else {
            $queryResult = Model::executeQry($querySql);
            return $queryResult;
        }
    }

    //========= Function to add competition details ========================//
    public function addCompetitionSkill($strQuerystring, $strLang,$compId) {
        
        $chkArray=array(12,26,28,23,47,52);

        $selBlock    = $_POST['selBlock'];
        $selDistrict = $_POST['selDistrict'];
        
        $txtFirstName   = htmlspecialchars(addslashes($_POST['txtFirstName']), ENT_QUOTES);
        $blankFirstName = Model::isBlank($_POST['txtFirstName']);
        $errFirstName   = Model::isSpclChar($_POST['txtFirstName']);
        $lenFirstName   = Model::chkLength('max', $_POST['txtFirstName'], 30);


        $txtLastName = htmlspecialchars(addslashes($_POST['txtLastName']), ENT_QUOTES);
        //$blankLastName = Model::isBlank($_POST['txtLastName']);
        $errLastName = Model::isSpclChar($_POST['txtLastName']);
        $lenLastName = Model::chkLength('max', $_POST['txtLastName'], 30);

        $rdoGender = ($_POST['rdoGender']!='')?$_POST['rdoGender']:0;

        $txtDob = ($_POST['txtDob'] != '') ? Model::dbDateFormat($_POST['txtDob']) : '0000-00-00';
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
        $errMobile = preg_match('/^[6-9][0-9]{9}$/',$txtPhone);

        $txtBirthPlace='';
        $txtPresentCity='';
        $txaAddress1='';
        $txaAddress2='';

        $selAddressState=0;
        $txtPincode='';
 
        $txtSchoolName='';
        
        $selQualification = !empty($_POST['selQualification'])?$_POST['selQualification']:0;

        $txtAcademicInstitute   = htmlspecialchars($_POST['hidInsId'], ENT_QUOTES);
        $blankAcademicInstitute = Model::chkDropdown($_POST['hidInsId']);
        $errAcademicInstitute   = Model::isSpclChar($_POST['hidInsId']);
        $acadamicInsName=htmlspecialchars($_POST['txtAcademicInstitute'], ENT_QUOTES);
       /*===Academic Institute Name used in $txtWorkPlace variable when Instittute is manually typed==*/ 
        if($txtAcademicInstitute==0){
            $txtWorkPlace =   htmlspecialchars($_POST['txtAcademicInstitute'], ENT_QUOTES);
            $blankAcademicInstitute = Model::isBlank($txtWorkPlace);
            $errAcademicInstitute   = Model::isSpclChar($txtWorkPlace);
            $txtAcademicInstitute='';
        }
        $rdoWorkSatus = isset($_POST['agreeCheck'])?$_POST['agreeCheck']:0;
       
       
        
        $selIdProof   = $_POST['txtAadharNo'];
        
        $blankIdProof = Model::isBlank($selIdProof);
        $errIdProof   = Model::isSpclChar($selIdProof);
        $lenIdProof   = Model::chkLength('max', $selIdProof, 12);



        $fileDocument = $_POST['hdnIdProofPic'];
        $errfileDocument = Model::isSpclChar($_POST['hdnIdProofPic']);

        $ProfileDocument = $_POST['hdnProfilePic'];
        $errProfileDocument = Model::isSpclChar($_POST['hdnProfilePic']);

        $txtSelectedSkillName=htmlspecialchars($_POST['hdnSkill'], ENT_QUOTES,'UTF-8');

        $strSkills = $_POST['chkSkillset'];

        $noOfSkills = count($strSkills);
        $sqlTagging = '';
        for ($i = 0; $i < $noOfSkills; $i++) {
            if($compId=='') {
                $sqlTagging .= '(@P_COMP_ID,' . trim($strSkills[$i]) . ',NOW()),';
                $sqlTagging = rtrim($sqlTagging, ',');
                $skillId = trim($strSkills[$i]);
            }
            else
            {
                $sqlTagging = trim($strSkills[$i]);
            }
        }       
     
       $featuredImage    = $_FILES['fileUploadPhoto']['name'];
       $fileSize         = $_FILES['fileUploadPhoto']['size'];
       $fileTemp         = $_FILES['fileUploadPhoto']['tmp_name'];
       $ext              = pathinfo($featuredImage, PATHINFO_EXTENSION);
       $filePictureMimetype = ($featuredImage != '')?mime_content_type($fileTemp):'';
       $allowedImg        = array('png' ,'jpg','jpeg');
       $allowedImgMime    = array('image/jpeg','image/jpg', 'image/png');

       $featuredDoc         = $_FILES['fileDocument']['name'];
       $fileDocSize         = $_FILES['fileDocument']['size'];
       $fileDocTemp         = $_FILES['fileDocument']['tmp_name'];
       $docExt              = pathinfo($featuredDoc, PATHINFO_EXTENSION);
       $fileDocumentMimetype = ($featuredDoc != '')?mime_content_type($fileDocTemp):'';

       $allowedDoc        = array('png' ,'jpg','jpeg','pdf');
       $allowedDocMime    = array('image/jpeg','image/jpg', 'image/png','application/pdf');

        if (count(array_intersect($strSkills, $chkArray))>0) {

            $txtFirstNamepop = htmlspecialchars(addslashes($_POST['txtFirstNamepop']), ENT_QUOTES);
            $blankFirstNamepop = Model::isBlank($_POST['txtFirstNamepop']);
            $errFirstNamepop = Model::isSpclChar($_POST['txtFirstNamepop']);
            $lenFirstNamepop = Model::chkLength('max', $_POST['txtFirstNamepop'], 30);

          
            $txtLastNamepop = htmlspecialchars(addslashes($_POST['txtLastNamepop']), ENT_QUOTES);
            //$blankLastNamepop = Model::isBlank($_POST['txtLastNamepop']);
            $errLastNamepop = Model::isSpclChar($_POST['txtLastNamepop']);
            $lenLastNamepop = Model::chkLength('max', $_POST['txtLastNamepop'], 30);

            $rdoGenderpop = ($_POST['rdoGenderpop']!= '')?$_POST['rdoGenderpop']:0;
              //$rdoGenderpop              = $_POST['rdoGenderpop'];
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

       
            $selQualificationpop = $_POST['selQualificationpop'];

            $txtAcademicInstitutepop   = htmlspecialchars($_POST['hidInsIdpop'], ENT_QUOTES);
            $blankAcademicInstitutepop = Model::chkDropdown($_POST['hidInsIdpop']);
            $errAcademicInstitutepop   = Model::isSpclChar($_POST['hidInsIdpop']);
            $lenAcademicInstitutepop   = 0;
             $acadamicInsNamepop = htmlspecialchars($_POST['txtAcademicInstitute'], ENT_QUOTES);
            /*===Academic Institute Name used in $txtWorkPlace variable when Instittute is manually typed==*/ 
            if($txtAcademicInstitutepop==0){
                $txtWorkPlacepop =   htmlspecialchars($_POST['txtAcademicInstitutepop'], ENT_QUOTES);
                $blankAcademicInstitutepop = Model::isBlank($txtWorkPlace);
                $errAcademicInstitutepop   = Model::isSpclChar($txtWorkPlace);
                $txtAcademicInstitutepop='';
            }
            $rdoWorkSatuspop = isset($_POST['agreeCheck'])?1:0;
            $selIdProofpop   = ($_POST['txtAadharNopop']!='')?$_POST['txtAadharNopop']:0;
            $fileDocumentpop = $_POST['hdnIdProofPicpop'];
            $errfileDocumentpop = Model::isSpclChar($_POST['hdnIdProofPicpop']);
            $ProfileDocumentpop = $_POST['hdnProfilePic1'];
            $errProfileDocumentpop = Model::isSpclChar($_POST['hdnProfilePic1']);
            $txtBirthPlacepop='';
            $txtPresentCitypop='';
            $txaAddress1pop='';
            $txaAddress2pop='';
            $selAddressStatepop=0;
            $txtPincodepop='';
            $txtSchoolNamepop='';
       }
        
        $outMsg = '';
        $action = !empty($compId)?'US':'AU';
        $errFlag = 0;
        $strCaptcha = $_POST['txtSkillCaptcha'];

        if (isset($_POST['txtSkillCaptcha']) && !empty($_POST['txtSkillCaptcha'])) {
         

            if ($_SESSION['captcha'] == $strCaptcha) {
                if ( ($selDistrict == 0 || $selBlock == 0 || ($blankFirstName > 0) || $blankDob > 0 || ($rdoGender == '') ||  $blankEmail > 0 || $blankPhone > 0 || $blankAcademicInstitute > 0  || $selIdProof == 0 || $noOfSkills == 0 || $fileDocument == '' || $ProfileDocument == '') && $compId=='') {
                    $errFlag = 1;
                    $outMsg = "Mandatory fields should not be left blank";
                } else if ((($errFirstName > 0) || ($errLastName > 0) || $errDob > 0 || ($errEmail > 0) || $errPhone > 0  || $errAcademicInstitute > 0  || $errfileDocument > 0 || $errProfileDocument > 0) && $compId=='') {
                    $errFlag = 1;
                    $outMsg = "Special characters are not allowed";
                } else if ((($lenFirstName > 0) ||  ($lenLastName > 0) || $lenEmail > 0 || $lenPhone > 0 || $lenIdProof>0) && $compId=='') {
                    $errFlag = 1;
                    $outMsg = "Length should not exceed maxlength";
                } else if ($errMobile <1 && $compId=='') {

                    $outMsg = "Enter Valid mobile number";
                    $errFlag = 1;
                }
                else if($ext!='' && !in_array($ext,$allowedImg) )
               {
                   $errFlag   = 1;
                   $outMsg    = "Not a valid file Upload (.jpg,jpeg,png) file only";
               }
               else if($ext!='' && !in_array($filePictureMimetype,$allowedImgMime)) {
                   $errFlag   = 1;
                   $outMsg    = "Not a valid file Upload (.jpg,jpeg,png) file only";
               }
               else if($docExt!='' && !in_array($docExt,$allowedDoc) )
               {
                   $errFlag   = 1;
                   $outMsg    = "Not a valid file Upload (.jpg,jpeg,png,pdf) file only";
               }
               else if($docExt!='' && !in_array($fileDocumentMimetype,$allowedDocMime)) {
                   $errFlag   = 1;
                   $outMsg    = "Not a valid file Upload (.jpg,jpeg,png,pdf) file only";
               }

                $resultStatus = $this->manageSkillCompetition('REE',0, 0, 0, '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00');
                    if (mysqli_num_rows($resultStatus) > 0) {

                        $rowS              = mysqli_fetch_array($resultStatus);
                        $intPhaseId        = $rowS['intId'];        
                        $phaseYear         = $rowS['vchPhaseYear'];        
                    }

                if ($errFlag == 0 && $intPhaseId >0) {

                    $result = $this->manageSkillCompetition('AU', $compId, $selDistrict, $selBlock, $txtFirstName, $txtMiddleName, $txtLastName, $ProfileDocument, $rdoGender, $txtDob, $txtEmail, $txtPhone, $txtBirthPlace, $txtPresentCity, $txaAddress1, $txaAddress2, $selAddressState, $txtAddressCity, $txtPincode, $txtSchoolName, $selQualification, $txtAcademicInstitute, $rdoWorkSatus, $txtWorkPlace, $selIdProof, $fileDocument, $sqlTagging, $phaseYear, $skillId, $intPhaseId, '0000-00-00', '0000-00-00');
            
                    $allowPicType=array('image/gif','image/jpeg' ,'image/png','image/jpg');
                    $allowDocType=array('image/gif','image/jpeg' ,'image/png','image/jpg','application/pdf');
               
              

                    if ($result) {

                        $numRow = $result->fetch_array();
                        $intStatus = $numRow[0];
                        $strAckno = $numRow[1];
                       
                        if ($intStatus > 0) {
                            
                            if (count(array_intersect($strSkills, $chkArray))>0) {
                               
                                $result = $this->manageSkillCompetition('AU', $intStatus, $selDistrict, $selBlock, $txtFirstNamepop, $txtMiddleNamepop, $txtLastNamepop, $ProfileDocumentpop, $rdoGenderpop, $txtDobpop, $txtEmailpop, $txtPhonepop, $txtBirthPlacepop, $txtPresentCitypop, $txaAddress1pop, $txaAddress2pop, $skillId, $txtAddressCitypop, $txtPincodepop, $txtSchoolNamepop, $selQualificationpop, $txtAcademicInstitutepop, $rdoWorkSatuspop, $txtWorkPlacepop, $selIdProofpop, $fileDocumentpop, $sqlTagging, $phaseYear, $skillId, $intPhaseId, '0000-00-00', '0000-00-00');
                                $numRow = $result->fetch_array();
                                $intStatus = $numRow[0];
                                $strTeamno = $numRow[1];
                            }
                          
                            /*1st Applicant Documents(image & Id proof)*/
                            $profilePicMimeType=mime_content_type(APP_PATH . 'temp/' . $ProfileDocument);
                            $docMimeType=mime_content_type(APP_PATH . 'temp/' .  $fileDocument);



                            //  $outMsg = 'Thank you for your details. We will get back to you soon';

                            if (!file_exists(APP_PATH . 'uploadDocuments/skillCompetition/' . $strAckno) && !is_dir(APP_PATH . 'uploadDocuments/skillCompetition/' . $strAckno)) {
                                
                                mkdir(APP_PATH . 'uploadDocuments/skillCompetition/' . $strAckno, 0777, true);
                            }

                            if (isset($_POST['hdnIdProofPic']) && $_POST['hdnIdProofPic'] != '' && file_exists(APP_PATH . 'temp/' . $fileDocument)) {

                                if(in_array($docMimeType,$allowDocType)){
                                        rename(APP_PATH . 'temp/' . $fileDocument, APP_PATH . 'uploadDocuments/skillCompetition/' . $strAckno . '/' . $fileDocument);
                                }                
                            }
                            if (isset($_POST['hdnProfilePic']) && $_POST['hdnProfilePic'] != '' && file_exists(APP_PATH . 'temp/' . $ProfileDocument)) {
                                if(in_array($profilePicMimeType,$allowPicType)){
                                    rename(APP_PATH . 'temp/' . $ProfileDocument, APP_PATH . 'uploadDocuments/skillCompetition/' . $strAckno . '/' . $ProfileDocument);
                                }
                            }
                            
                            /* for robotics */
                            if (count(array_intersect($strSkills, $chkArray))>0) {
                                /*2nd Applicant Documents(image & Id proof)*/

                            $profilePicMimeTypePop=mime_content_type(APP_PATH . 'temp/' . $ProfileDocumentpop);
                            $docMimeTypePop=mime_content_type(APP_PATH . 'temp/' . $fileDocumentpop);
                            // 2nd participant folder creation start
                            if (!file_exists(APP_PATH . 'uploadDocuments/skillCompetition/' . $strTeamno) && !is_dir(APP_PATH . 'uploadDocuments/skillCompetition/' . $strTeamno)) {
                                
                                mkdir(APP_PATH . 'uploadDocuments/skillCompetition/' . $strTeamno, 0777, true);
                            }
                            // 2nd participant folder creation END
                                if (isset($_POST['hdnIdProofPicpop']) && $_POST['hdnIdProofPicpop'] != '' && file_exists(APP_PATH . 'temp/' . $fileDocumentpop)) {

                                    if(in_array($docMimeTypePop,$allowDocType)){
                                        rename(APP_PATH . 'temp/' . $fileDocumentpop, APP_PATH . 'uploadDocuments/skillCompetition/' . $strTeamno . '/' . $fileDocumentpop);
                                     }  

                                    
                                }
                                if (isset($_POST['hdnProfilePic1']) && $_POST['hdnProfilePic1'] != '' && file_exists(APP_PATH . 'temp/' . $ProfileDocumentpop)) {
                                    if(in_array($profilePicMimeTypePop,$allowPicType)){
                                        rename(APP_PATH . 'temp/' . $ProfileDocumentpop, APP_PATH . 'uploadDocuments/skillCompetition/' . $strTeamno . '/' . $ProfileDocumentpop);
                                    }
                                    
                                }
                            }
                            /* robotics file upload end */


                            //send mail to osda
                            if (SEND_MAIL == "Y") {
                                $strsubject = "OSDA :: Skill Competition : Odisha Skill Competition - 2022";
                                //send mail to osda
                                //$strTo[]               = $txtEmail;
                                if (count(array_intersect($strSkills, $chkArray))>0) {
                                    // $strTo[]               = $txtEmail.','.$txtEmailpop;
                                    $strTo = array($txtEmail, $txtEmailpop);
                                    $strQuerystring= ucwords($txtFirstNamepop).":~:".$strTeamno.":~:".ucwords($txtFirstName).":~:".$strAckno;
                                    //$strAckno = $strTeamno;
                                } else {
                                    $strTo = array($txtEmail);
                                    $$txtFirstNamepop = '';
                                    $strTeamno        = 0;
                                    $strQuerystring= ucwords($txtFirstNamepop).":~:".$strTeamno.":~:".ucwords($txtFirstName).":~:".$strAckno;
                                    //$strAckno = $strAckno;
                                }
                               
                                /*=================================First applicant email Data=============*/
                                $table1='<table class="table mt-3" style="width:100%">
                                        <thead class="thead-dark">
                                          <tr>
                                            <th style="background:#f1f1f1;color:#9a3987;font-size: 20px;border:1px solid #e4e4e4;" colspan="4">First Applicant Information</th>
                                          </tr>
                                        </thead>
                                        <tbody style="text-align: left; border: 1px solid #e4e4e4; font-size: 15px;">
                                          <tr>
                                            <td style="border-top:none">Name</td>
                                            <td style="border-top:none">: '.$txtFirstName.'</td>
                                            <td style="border-top:none">Trade Selected</td>
                                            <td style="border-top:none">: '. $txtSelectedSkillName.'</td>
                                          </tr>

                                          <tr>
                                            <td style="border-top:none">Email ID</td>
                                            <td style="border-top:none">: '.$txtEmail.'</td>
                                            <td style="border-top:none">Mobile No</td>
                                            <td style="border-top:none">: '.$txtPhone.'</td>
                                          </tr>

                                          <tr>
                                            <td style="border-top:none">Date of Birth :</td>
                                            <td style="border-top:none">: '.date('d-M-Y',strtotime($txtDob)).'</td>
                                            <td style="border-top:none">Adhaar Number :  </td>
                                            <td style="border-top:none">: '.$selIdProof.'</td>
                                          </tr>
                                        </tbody>
                                      </table>';
                               /*=================================Second applicant email Data=============*/
                                if (count(array_intersect($strSkills, $chkArray))>0) {
                                $table1.='<table class="table mt-3" style="width:100%">
                                        <thead class="thead-dark">
                                          <tr>
                                            <th style="background:#f1f1f1;color:#9a3987;font-size: 20px;border:1px solid #e4e4e4;" colspan="4">Second Applicant Information</th>
                                          </tr>
                                        </thead>
                                        <tbody style="text-align: left; border: 1px solid #e4e4e4; font-size: 15px;">
                                          <tr>
                                            <td style="border-top:none">Name</td>
                                            <td style="border-top:none">: '.$txtFirstNamepop.'</td>
                                            <td style="border-top:none">Trade Selected</td>
                                            <td style="border-top:none">: '. htmlspecialchars_decode($txtSelectedSkillName, ENT_QUOTES).'</td>
                                          </tr>

                                          <tr>
                                            <td style="border-top:none">Email ID</td>
                                            <td style="border-top:none">: '.$txtEmailpop.'</td>
                                            <td style="border-top:none">Mobile No</td>
                                            <td style="border-top:none">: '.$txtPhonepop.'</td>
                                          </tr>

                                          <tr>
                                            <td style="border-top:none">Date of Birth :</td>
                                            <td style="border-top:none">: '.date('d-M-Y',strtotime($txtDobpop)).'</td>
                                            <td style="border-top:none">Adhaar Number :  </td>
                                            <td style="border-top:none">: '.$selIdProofpop.'</td>
                                          </tr>
                                        </tbody>
                                      </table>';
                                }

                                $strFrom = SKILLCOM_EMAIL;
                                $strTemplate    = file_get_contents(SITE_PATH . 'view/template.php');
                                $searchAry      = array('@FIRSTNAME', '@COMPID','@URL','@DATA');
                                $replaceAry     = array(ucfirst(strtolower($txtFirstName)), $strAckno,SITE_URL,$table1);
                                $strTemplate    = str_replace($searchAry, $replaceAry, $strTemplate);
                                $strUserMessage = $strTemplate;
         
                                $data['from'] = $strFrom;
                                $data['to'] = $strTo;
                                $data['name'] = 'Odisha Skill Development Authority';
                                $data['sub'] = $strsubject;
                                $data['message'] = $strUserMessage;
                                $jsData = json_encode($data);
                                $mailRes = $this->sendAuthMailSkillComp($jsData);
                                //$mailRes = $this->sendAuthMail($jsData);
                                
                                  //print_r($mailRes);
                            }
                            if(SEND_MESSAGE=='Y'){
                                    $templateId  = '1007083541954212363';
                                    $mobileMessage='Thank you '.ucfirst(strtolower($txtFirstName)).', for registering at Odisha Skills 2022. Your Competition ID is '.$strAckno.'. For more details check your email. Team OSDA'; 
                                     $mobileNo=$txtPhone.",";
                                     $this->sendSkillSMS($mobileNo,$mobileMessage,$templateId);
                                     if (count(array_intersect($strSkills, $chkArray))>0) {
                                          //$mobileNo=$txtPhone.",".$txtPhonepop.",";
                                        $mobileMessage='Thank you '.ucfirst(strtolower($txtFirstNamepop)).', for registering at Odisha Skills 2022. Your Competition ID is '.$strTeamno.'. For more details check your email. Team OSDA'; 
                                        $mobileNo=$txtPhonepop.",";
                                        $this->sendSkillSMS($mobileNo,$mobileMessage,$templateId);
                                     }
                                    
                                    
                             }
                            
                            //echo ($this->encrypt($intStatus . '/' . $strAckno . '/' . $strQuerystring . '/' . $strLang));exit;
                            header("Location:" . SITE_URL . "register-success/" . $this->encrypt($intStatus . '/' . $strAckno . '/' . $strQuerystring . '/' . $strLang));
                        }
                        else {
                            $errFlag = 1;
                            $outMsg = 'The Email-Id /Mobile No. /Aadhar ID is already registered with us for this skill <br> Please try again with another contact details';
                        }
                        } else {
                        $errFlag = 1;
                        $outMsg = 'Error in opertaion please try again';
                        }
                }
                else {
                        $errFlag = 1;
                        $outMsg = 'No Registration phase enabled.';
                    }
            } else {
                $errFlag = 1;
                $outMsg = "The captcha code is invalid ! Please try it again";
            }
        } else {
            $outMsg = 'Please enter captcha code.';
            $errFlag = 1;
        }

        $selBlock = ($errFlag == 1) ? $selBlock : 0;
        $selDistrict = ($errFlag == 1) ? $selDistrict : 0;
        $txtFirstName = ($errFlag == 1) ? htmlentities($txtFirstName) : '';
        $txtMiddleName = ($errFlag == 1) ? htmlentities($txtMiddleName) : '';
        $txtLastName = ($errFlag == 1) ? htmlentities($txtLastName) : '';
        $rdoGender = ($errFlag == 1) ? htmlentities($rdoGender) : '';
        $txtDob = ($errFlag == 1) ? htmlentities($txtDob) : '';
        $txtEmail = ($errFlag == 1) ? htmlentities($txtEmail) : '';
        $txtPhone = ($errFlag == 1) ? htmlentities($txtPhone) : '';
        $txtBirthPlace = ($errFlag == 1) ? htmlentities($txtBirthPlace) : '';
        $txtPresentCity = ($errFlag == 1) ? htmlentities($txtPresentCity) : '';
        $txaAddress1 = ($errFlag == 1) ? htmlentities($txaAddress1) : '';
        $txaAddress2 = ($errFlag == 1) ? htmlentities($txaAddress2) : '';
        $selAddressState = ($errFlag == 1) ? htmlentities($selAddressState) : '';
        $txtAddressCity = ($errFlag == 1) ? htmlentities($txtAddressCity) : '';
        $txtPincode = ($errFlag == 1) ? htmlentities($txtPincode) : '';
        $txtSchoolName = ($errFlag == 1) ? htmlentities($txtSchoolName): '';
        $selQualification = ($errFlag == 1) ? htmlentities($selQualification) : '';
        $txtAcademicInstitute = ($errFlag == 1) ? htmlentities($txtAcademicInstitute): '';
        $rdoWorkSatus = ($errFlag == 1) ? htmlentities($rdoWorkSatus) : '';
        $txtWorkPlace = ($errFlag == 1) ? htmlentities($acadamicInsName) : '';
        $selIdProof = ($errFlag == 1) ? htmlentities($selIdProof) : '';
        $fileDocument = ($errFlag == 1) ? htmlentities($fileDocument) : '';
        $strSkills = ($errFlag == 1) ? htmlentities($skillId) : '';
        $hdnSkill=($errFlag == 1) ? htmlspecialchars_decode($txtSelectedSkillName, ENT_QUOTES) : '';

        /* for robotic */
        if (count(array_intersect($strSkills, $chkArray))>0) {
            $txtFirstNamepop = ($errFlag == 1) ? $txtFirstNamepop : '';
            $txtLastNamepop = ($errFlag == 1) ? $txtLastNamepop : '';
            $rdoGenderpop = ($errFlag == 1) ? $rdoGenderpop : '';
            $txtDobpop = ($errFlag == 1) ? $txtDobpop : '';
            $txtEmailpop = ($errFlag == 1) ? $txtEmailpop : '';
            $txtPhonepop = ($errFlag == 1) ? $txtPhonepop : '';
            $selQualificationpop = ($errFlag == 1) ? $selQualificationpop : '';
            $txtAcademicInstitutepop = ($errFlag == 1) ? $txtAcademicInstitutepop : '';
            $rdoWorkSatuspop = ($errFlag == 1) ? $rdoWorkSatuspop : '';
            $txtWorkPlacepop = ($errFlag == 1) ? $acadamicInsNamepop : '';
            $selIdProofpop = ($errFlag == 1) ? $selIdProofpop : '';
            $fileDocumentpop = ($errFlag == 1) ? $fileDocumentpop : '';
            $strSkillspop = ($errFlag == 1) ? $strSkillspop : '';
        }
       
         /* robotics end */
        if (count(array_intersect($strSkills, $chkArray))>0) {
            $arrResult = array('msg' => $outMsg, 'errFlag' => $errFlag, 'selState' => $selState,'selBlock' => $selBlock, 'selDistrict' => $selDistrict, 'txtFirstName' => $txtFirstName, 'txtMiddleName' => $txtMiddleName
                , 'txtLastName' => $txtLastName, 'rdoGender' => $rdoGender, 'txtDob' => $txtDob, 'txtEmail' => $txtEmail
                , 'txtPhone' => $txtPhone, 'selIdProof' => $selIdProof, 'strSkills' => $strSkills
                , 'txtSchoolName' => $txtSchoolName, 'selQualification' => $selQualification, 'txtAcademicInstitute' => $txtAcademicInstitute, 'rdoWorkSatus' => $rdoWorkSatus,'hdnStrSkill'=>$hdnSkill,'ridrectUrl'=>$ridrectUrl);
        } else {
        
        $arrResult = array('msg' => $outMsg, 'errFlag' => $errFlag, 'selState' => $selState,'selBlock' => $selBlock, 'selDistrict' => $selDistrict, 'txtFirstName' => $txtFirstName, 
                'txtLastName' => $txtLastName, 'rdoGender' => $rdoGender, 'txtDob' => $txtDob, 'txtEmail' => $txtEmail
                , 'txtPhone' => $txtPhone, 'selIdProof' => $selIdProof, 'strSkills' => $strSkills
                , 'txtSchoolName' => $txtSchoolName, 'selQualification' => $selQualification, 'txtAcademicInstitute' => $txtAcademicInstitute, 'rdoWorkSatus' => $rdoWorkSatus,'txtWorkPlace'=>$txtWorkPlace, 'txtFirstNamepop' => $txtFirstNamepop, 
                'txtLastNamepop' => $txtLastNamepop, 'rdoGenderpop' => $rdoGenderpop, 'txtDobpop' => $txtDobpop, 'txtEmailpop' => $txtEmailpop
                , 'txtPhonepop' => $txtPhonepop, 'selIdProofpop' => $selIdProofpop, 'strSkillspop' => $strSkillspop
                ,  'selQualificationpop' => $selQualificationpop, 'txtAcademicInstitutepop' => $txtAcademicInstitutepop, 'rdoWorkSatuspop' => $rdoWorkSatuspop,'txtWorkPlacepop'=>$txtWorkPlacepop,'hdnStrSkill'=>$hdnSkill,'ridrectUrl'=>$ridrectUrl);
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

 # Check registration status By Rahul ON::17-03-2021
    public function getRegistartionStatus($regdNo) {

        $outMsg = '';
        $ridrectUrl = '';
        $result = $this->manageSkillCompetition('QUA', 0, 0, 0, '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, $regdNo, '', 0, 0, 0, '0000-00-00', '0000-00-00');
        //print_r($result);exit;
        if ($result->num_rows > 0) 
        {

            $row = $result->fetch_array();

            $status        = $row['@P_STATUS'];
            $qualifyStatus = $row['@intQualify'];
            $comptId       = $row['@intCompetitionId'];
            $intType       = $row['@intType'];
            $strSkills     = $row['@strSkills'];
            $strUpdatedSkills     = $row['@strUpdatedSkills'];
            $updatedSkill   = $row['@updatedSkill'];
            $name           = $row['@vchFirstName'];
            $aadharId       = $row['@vchAadharId'];
            $teamId         = $row['@vchTeamId'];
            $regdType       = $row['@vchRegistrationType'];
            if($status==0)
            {
                $outMsg = 'Please enter valid registration no. / aadhar no. / mobile no.';
            }

        }
        else
            {
                $outMsg = 'Please enter valid registration no. / aadhar no. / mobile no.';
            }

        $arrResult = array('msg' => $outMsg,'redirect'=>$ridrectUrl,'qualifyStatus' =>$qualifyStatus,'comptId' =>$comptId,'intType'=>$intType,'strSkills'=>$strSkills,'strUpdatedSkills'=>$strUpdatedSkills,'updatedSkill'=>$updatedSkill,'name'=>$name,'aadharId'=>$aadharId,'teamId'=>$teamId,'regdType'=>$regdType);

        return $arrResult;
    }

    # Availability confirmation for  registration status By Rahul ON::17-03-2021
    public function updateskillConfirmation($compId,$accept,$intType) {

        $outMsg = '';
        $ridrectUrl = '';
        $result = $this->manageSkillCompetition('UC', 0, 0, 0, $compId, '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, $intType, $accept, '0000-00-00', '0000-00-00');
        
        if ($result) 
        {

            $numRow = $result->fetch_array();
            $intStatus = $numRow[0];
            $ackNo = $numRow[1];
            $userName = $numRow[2];
            $skiiId = $numRow[3];
            
            if($skiiId==23 || $skiiId==12 || $skiiId==26 || $skiiId==28)
            { 
               $outMsg = 'Thank you for your confirmation to participate in the next round of Odisha Skills Competition. The competition is a team event. Hence, you are requested to be present at the venue with your partner only. The detailed program and venue of the next round will be intimated to you shortly.'; 
            }
            else
            { 
                
                $outMsg = 'Thank you '.$userName.' '.'('.$ackNo.')'.' for your confirmation to participate in next round of Odisha Skills Competition. The detailed program and venue of the next round will be intimated to you shortly.';
            }
        }
        else
            {
                $outMsg = 'Some error occured.';
            }

        $arrResult = array('msg' => $outMsg);

        return $arrResult;
    }

     # Skill updation at the time of result check By Rahul ON::23-03-2021

    public function readSkillUpdation($compId)
    {
        $result = $this->manageSkillCompetition('RS', $compId, 0, 0, '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00');
        return $result;
    }


    // Function To Add Upadate Registration Phase By::Rahul Kumar Saw   :: On:: 31-May-2022
    public function addUpdateRegistartionPhase($regdId) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
            $userId                = $_SESSION['adminConsole_userID'];

            $txtPhase               = htmlspecialchars(addslashes($_POST['txtPhase']), ENT_QUOTES);
            $blankPhase             = Model::isBlank($txtPhase);
            $errPhase               = Model::isSpclChar($_POST['txtPhase']);
            $lenPhase               = Model::chkLength('max', $txtPhase,50);

            $txtYear                = $_POST['ddlYear'];
            $errYear                = Model::isSpclChar($_POST['ddlYear']); 
          
            $outMsg                 = '';
            $flag                   = ($regdId != 0) ? 1 : 0;
            $action                 = ($regdId == 0) ? 'AI' : 'UI';
            $errFlag                = 0 ;
            if($blankPhase >0)
            {
                    $errFlag        = 1;
                    $outMsg         = "Mandatory Fields should not be blank";
            }
            else if($lenPhase>0)
            {
                    $errFlag        = 1;
                    $outMsg         = "Length should not excided maxlength";
            }
            else if($errPhase>0 || $errYear>0)
            {
                    $errFlag        = 1;
                    $outMsg         = "Special Characters are not allowed";
            }

            if($errFlag==0){
                  $dupResult = $this->manageSkillCompetition('DU',$regdId, 0, 0, $txtPhase, '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00');

                if ($dupResult) {
                    $numRows = $dupResult->fetch_array();
                    if ($numRows > 0) {
                        $outMsg = 'Phase with this name already exists';
                        $errFlag = 1;
                    } else {
                        $result = $this->manageSkillCompetition($action,$regdId, $txtYear, 0, $txtPhase, '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, $userId, 0, '0000-00-00', '0000-00-00');
                        if ($result)
                            $outMsg = ($action == 'AI') ? 'Phase name added successfully ' : 'Phase name updated successfully';

                        }
                    }
            }
         }else{
                header("Location:" . APP_URL . "error");
           }    
        $txtPhase         = ($errFlag == 1) ? $txtPhase : '';
        $txtYear          = ($errFlag == 1) ? htmlentities($txtYear) : '';       
        
        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag, 'strPhase' => $txtPhase, 'txtYear' => $txtYear);
        return $arrResult;
    }

// Function To read Registration Phase  By::Rahul Kumar Saw   :: On:: 31-May-2022
    public function readRegistrationPhase($id) {

        $result = $this->manageSkillCompetition('RI',$id, 0, 0, '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00');
        if (mysqli_num_rows($result) > 0) {

            $row               = mysqli_fetch_array($result);
            $intId             = $row['intId'];
            $strPhase          = $row['vchPhaseName'];
            $txtYear           = $row['vchPhaseYear'];         
        }
        $arrResult = array( 'intId' => $intId,'strPhase' => $strPhase, 'txtYear' => $txtYear);
        return $arrResult;
    }

    // Function To Update enabled status By::Rahul Kumar Saw   :: On:: 31-May-2022
    public function updateStatus($action, $ids) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
            $ctr = 0;
            $ctr1 = 0;
            $userId = $_SESSION['adminConsole_userID'];
            $explIds = explode(',', $ids);
            $delRec = 0;
            $delRec1 = 0;
            $resultStatus = $this->manageSkillCompetition('REE',0, 0, 0, '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00');
            if (mysqli_num_rows($resultStatus) > 0) {

                $rowS              = mysqli_fetch_array($resultStatus);
                $intStatus         = $rowS['intStatus'];        
            }
            //echo $intStatus;exit;
            if($intStatus!=1){
            foreach ($explIds as $indIds) {
                $result = $this->manageSkillCompetition($action, $explIds[$ctr], 0, 0, '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00'); 
                $row = mysqli_fetch_array($result);

                if ($row[0] == 0)
                    $delRec++;

                $ctr++;

            } 
              if($action == 'ES')
              {
                $outMsg = 'Phase enabled Successfully';
              }
              else if ($action == 'DS')
              {
                $outMsg = 'Phase disabled Successfully';
              }
          }
          else
          {
            $outMsg = 'Only one registration phase enabled at a time so disabled the enabled status.';
          }

          if($intStatus==1){
          foreach ($explIds as $indIds) {
                $result = $this->manageSkillCompetition('DS', $explIds[$ctr1], 0, 0, '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00'); 
                $row = mysqli_fetch_array($result);

                if ($row[0] == 0)
                    $delRec1++;

                $ctr1++;

            } 
              if ($action == 'DS')
              {
                $outMsg = 'Phase disabled Successfully';
              }
          }


            return $outMsg;
         }else{
                header("Location:" . APP_URL . "error");
           }  
    }

}

?>