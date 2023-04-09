<?php

class clsSkillDevelopment extends Model {

    //Function to manage skillDevelopment

    public function manageskillDevelopment($action, $arrConditions) {
        try {

            $result = Model::callProc('USP_SKILLDEVELOPMENT', $action, $arrConditions);
            return $result;
//echo $result;exit;
        }//
        catch (Exception $e) {
            echo 'Error:' . $e->getMessage();
            exit();
        }
    }

    public function addUpdateskillDevelopment($Id) {

        $userId = !empty($_SESSION['adminConsole_userID'])?$_SESSION['adminConsole_userID']:1;
        $Id = (isset($Id)) ? $Id : 0;
        include_once("clsSkillTP.php");
        $objTP = new clsSkillTP;
        $coursera = $_POST['coursera'];
        $blankcoursera = Model::isBlank($_POST['coursera']);


        $txtName = $_POST['txtName'];

        $blankName = Model::isBlank($_POST['txtName']);

        $lenName = Model::chkLength('max', $txtName, 100);

        $txtEmail = $_POST['txtEmail'];
        $lenEmail = Model::chkLength('max', $txtEmail, 60);

        $txtInterested = !empty($_POST['txtSkill'])?$_POST['txtSkill']:'';

        $blankInterested = Model::isBlank($_POST['txtSkill']);


        $txtPhone          = !empty($_POST['txtMobile'])?$_POST['txtMobile']:'';
        $txtRegdNumber     = !empty($_POST['txtRegdNumber'])?$_POST['txtRegdNumber']:'';
        $selCourse         = !empty($_POST['selCourse'])?$_POST['selCourse']:'';
        $txtOtherCourseName = !empty($_POST['txtOtherCourseName'])?$_POST['txtOtherCourseName']:'';
        $selBranch          = !empty($_POST['selBranch'])?$_POST['selBranch']:0;
        $selSemester        = !empty($_POST['selSemester'])?$_POST['selSemester']:'';
        $selInterestCourse  = !empty($_POST['selInterestCourse'])?$_POST['selInterestCourse']:'';
        $selInstituteName   = !empty($_POST['selInstituteName'])?$_POST['selInstituteName']:0;
        $txtOtherInstName   = !empty($_POST['txtOtherInstName'])?$_POST['txtOtherInstName']:'';

        $selDocumentType = $_POST['selDocumentType'];
        $blankDocType = Model::isBlank($_POST['selDocumentType']);

        $txtDocumentName = $_POST['txtDocumentName'];

        $txtDocumentNumber = $_POST['txtDocumentNumber'];
        $blankDocNumber = Model::isBlank($_POST['txtDocumentNumber']);

        $ReportFile = $_FILES['fileFeaturedImage']['name'];

        $prevFile = $_POST['hdnImageFile'];
        $fileSize = $_FILES['fileFeaturedImage']['size'];
        $fileTemp = $_FILES['fileFeaturedImage']['tmp_name'];
        $ext = pathinfo($ReportFile, PATHINFO_EXTENSION);
        $ReportFile = ($ReportFile != '') ? 'Identity_' . time() . '.' . $ext : '';
        $fileMimetype = mime_content_type($fileTemp);

        $allowDocType=array('image/png','image/jpg','application/pdf');

        //$lenMobile = Model::chkLength('max', $txtMobile, 10);
        //$errMobile = preg_match('/^[6-9][0-9]{9}$/',$txtMobile);

        $txtMessage = htmlspecialchars($_POST['txtMessage'], ENT_QUOTES);
        $pregMessage = preg_replace('/\s+/', '', $_POST['txtMessage']);
        $chkTags = '<button,<form,<iframe,<input,<script,<select,<textarea,alert';
        $checkTagsStatus = $this->checkHtmlTags($pregMessage, $chkTags);
        $lenMessage = Model::chkLength('max', $txtMessage, 500);

        $strCaptcha = $_POST["txtCaptcha"];

        $declaration = $_POST["intAccept"];

        /*$totalReg = date('ymd').time();

        $courseNameForRegd = str_replace(' ', '', $coursera);
        $regdNo = strtoupper($courseNameForRegd).$totalReg;*/

        
        $arrSConditions=array('intTpId'=>$coursera);

        $resultTP     = $objTP->manageskillTP('FTP', $arrSConditions);

        if ($resultTP)
         {
            $numRow = $resultTP->fetch_array();
            $tpName = $numRow['vchOrgName'];
            
         }
         else
         {
            $tpName = str_replace(' ', '', $coursera);
         }

        $totalReg = date('ymd').time();
        $regdNo = strtoupper(substr($tpName,0,3)).$totalReg;

        $outMsg = '';
        $flag   = ($Id != 0) ? 1 : 0;
        $action = ($Id == 0) ? 'A' : 'U';
        $errFlag = 0;

        $arrDConditions=array('instituteId'=>$selInstituteName,'programId'=>$selInterestCourse);

        $resultCount    = $objTP->manageskillTP('CC', $arrDConditions);
        $numRow         = $resultCount->fetch_array();
        $allottedSeat   = $numRow['intBookedSeat'];
        $totalRecord    = $numRow['INT_COUNT'];
        if ($allottedSeat == $totalRecord)
         {
            $outMsg = "Seat is not available for this program.";
            $errFlag = 1;
            $flag = 1;
            
         }
         else
         {
            $errFlag = 0;
            $flag = 0;
         }


        $arrConditions = array('intId' => $Id,
            'name' => $txtName,
            'email' => $txtEmail,
            'courseType' => $coursera,
            'interested' => $txtInterested,
            'identity' => $ReportFile,
            'address' => $txtMessage,
            'userid' => $userId,
            'documentType' => $selDocumentType,
            'documentName' =>$txtDocumentName,
            'documentNumber' =>$txtDocumentNumber,
            'txtPhone' =>$txtPhone,
            'txtRegdNumber' =>$txtRegdNumber,
            'selCourse' =>$selCourse,
            'txtOtherCourseName' =>$txtOtherCourseName,
            'selBranch' =>$selBranch,
            'selSemester' =>$selSemester,
            'selInterestCourse' =>$selInterestCourse,
            'selInstituteName' =>$selInstituteName,
            'txtOtherInstName' =>$txtOtherInstName,
            'regdNumber' =>$regdNo);
        if (isset($_POST['txtCaptcha']) && !empty($_POST['txtCaptcha'])) 
        {

            if ($_SESSION['captcha'] == $strCaptcha) {
                if ($blankcoursera > 0 || $blankName > 0 || $blankDocType>0 || $blankDocNumber>0) {
                    $errFlag = 1;
                    $outMsg = "Mandatory field should not be blank";
                } else if(!in_array($fileMimetype,$allowDocType))
                {
                    $errFlag = 1;
                    $outMsg = "This type of file not allowed";
                }  else if ($checkTagsStatus > 0) {

                    $outMsg = "HTML Special Tags Are Not Allowed";
                    $errFlag = 1;
                    $flag = 1;
                } else if ($declaration <1) {

                    $outMsg = "Please accept declaration";
                    $errFlag = 1;
                    $flag = 1;
                }

                if($ReportFile != '')
                {
                 move_uploaded_file($fileTemp,APP_PATH. "uploadDocuments/Development/" . $ReportFile);

                }

                /*$arrCDConditions = array('intId' => $Id, 'email' => $txtEmail , 'course' =>$coursera);

                $dupResult = $this->manageskillDevelopment('CD', $arrCDConditions);
                //print_r( $dupResult);exit;

                if ($dupResult) {
                    $numRows = $dupResult->fetch_array();
                    $pCount = count($numRows);
                    if ($pCount > 0) {
                        $outMsg = 'Course with this email already exists.';
                        $errFlag = 1;
                        $flag = 1;
                    }
                }*/

                if ($errFlag == 0) {
                    $result = $this->manageskillDevelopment($action, $arrConditions);
                    if ($result) {
                        $numRow = $result->fetch_array();
                        //print_r($numRow);exit;
                        $p_status = $numRow[0];
                        $lastId = $numRow[1];
                        $payStatus = $numRow[2];
                        /*$_SESSION["regdNo"] = $lastId;
                        $_SESSION["extStatus"] = $p_status;
                        $_SESSION["payStatus"] = $payStatus;*/
                      
                        /*if($coursera=='Coursera')
                        {*/

                       

                         if($_SESSION['lang']!='O')
                        {
                        $outMsg = ($action == 'A') ? 'Thank You !!! You have successfully registered. Your Registration No. is <strong> '.$regdNo.'</strong>.' : 'Thank You !!! You have successfully registered.';
                        }
                        else
                        {
                        $outMsg = ($action == 'A') ? 'Thank You !!! You have successfully registered. Your Registration No. is <strong> '.$regdNo.'</strong>.' : 'Thank You !!! You have successfully Registered.';
                        }

                        //send mail to osda
                        if (SEND_MAIL == "Y") { // && $p_status==1
                          
                            $strUserTo[] = $txtEmail;
                            $strUserFrom = DEVELOP_EMAIL;

                            $strsubject = "Registration for "  . $tpName ;

                            $strUserMessage = "Dear <strong>" . $txtName . "</strong></br>";
                            $strUserMessage .= "<div> <br>";
                            $strUserMessage .= "</div>";
                            $strUserMessage .= "Thank you for your interest shown in Digital Skilling Program of OSDA.</br></br>";

                            $strUserMessage .= "Your application for the program  <strong>"  . $tpName . " </strong>  is successfully submitted with registration id <strong>" . $regdNo ." </strong></br></br>";


                            $strUserMessage .= "Once we review your application, we will enrol your application for the said course subject to meeting the guidelines of program. </br></br>";

                            $strUserMessage .= "For any clarifications you can reach out to <strong> <a href='mailto:skilldev.osda@gmail.com '>skilldev.osda@gmail.com </a></strong> with your registration number. </br>";
                            $strUserMessage .= "<div> <br>";
                            $strUserMessage .= "</div>";

                            $strUserMessage .= "All the Best! </br>";

                            //$strUserMessage .= "<div> <br>";
                            //$strUserMessage .= "</div>";
                            $strUserMessage .= "<div><br><br>Regards <br>Skill Development Team <br>OSDA</div>";

                            $userdata['from'] = $strUserFrom;
                            $userdata['to'] = $strUserTo;
                            $userdata['name'] = 'Odisha Skill Development Authority';
                            $userdata['sub'] = $strsubject;
                            $userdata['message'] = $strUserMessage;
                            $jsUserData = json_encode($userdata);
                            $mailUserRes = $this->sendAuthMailSkillDevelop($jsUserData);
                            //print_r($mailUserRes);exit;
                        }

                        

                        /*if(!empty($lastId))
                        {
                        $transactionId = date('dmYhms');
                        $order_status = 'Pending';
                        if($coursera=='Coursera')
                        {
                            $fees = COURSERA_FEE;
                            $fees = str_replace( ',', '', $fees );
                        }
                        else if($coursera=='SAP ERP')
                        {
                            $fees = SAP_FEE;
                            $fees = str_replace( ',', '', $fees );
                        }
                        $arrPConditions = array('transaction_id' => $transactionId,'order_id' => $lastId,'order_status' => $order_status,'amount' => $fees);

                        $result = $this->manageskillDevelopment('SP', $arrPConditions);    
                        header("Location:" . SITE_URL . "payment-process");
                           exit; 
                        }*/
                        
                       /*} 
                       else
                       {
                        $outMsg = 'Thank You for your interest in the program. However the last date for entries to this program is closed. The registered students for this program will be intimated on the next steps through their registered email address by the institute and training provider';
                       }*/ 
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


        $strName = ($errFlag == 1) ? $txtName : '';
        $coursera = ($errFlag == 1) ? $coursera : '';
        $strEmail = ($errFlag == 1) ? $txtEmail : '';
        $txtInterested = ($errFlag == 1) ? $txtInterested : '';
        $strMessage = ($errFlag == 1) ? $txtMessage : '';
        $txtPhone = ($errFlag ==1) ? $txtPhone : '';
        $selDocumentType = ($errFlag == 1) ? $selDocumentType : '';
        $txtDocumentName = ($errFlag == 1) ? $txtDocumentName : '';
        $txtDocumentNumber = ($errFlag == 1) ? $txtDocumentNumber : '';
        $txtRegdNumber = ($errFlag == 1) ? $txtRegdNumber : '';
        $selCourse = ($errFlag == 1) ? $selCourse : '';
        $txtOtherCourseName = ($errFlag ==1) ? $txtOtherCourseName : '';
        $selBranch = ($errFlag == 1) ? $selBranch : '';
        $selSemester = ($errFlag == 1) ? $selSemester : '';
        $selInterestCourse = ($errFlag == 1) ? $selInterestCourse : '';
        $selInstituteName = ($errFlag == 1) ? $selInstituteName : '';
        $txtOtherInstName = ($errFlag == 1) ? $txtOtherInstName : '';
        $ReportFile = ($errFlag ==1) ? $ReportFile : '';
        $arrConditions = array('strName' =>$strName,'coursera' =>$coursera,'strEmail' =>$strEmail,'txtInterested' =>$txtInterested,'strMessage' =>$strMessage,'txtPhone' =>$txtPhone,'selDocumentType' =>$selDocumentType,'txtDocumentName' =>$txtDocumentName,'txtDocumentNumber' =>$txtDocumentNumber,'txtRegdNumber' =>$txtRegdNumber,'selCourse' =>$selCourse,'txtOtherCourseName' =>$txtOtherCourseName,'selBranch' =>$selBranch,'selSemester' =>$selSemester,'selInterestCourse' =>$selInterestCourse,'selInstituteName' =>$selInstituteName,'txtOtherInstName' =>$txtOtherInstName,'ReportFile'=>$ReportFile);
        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag, 'returnParams' => $arrConditions);
        return $arrResult;
    }

    public function readskillDevelopment($intId) {
        $arrConditions = array('Id' => $intId);
        $result = $this->manageskillDevelopment('R', $arrConditions);
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

            if($action=='UM')
                {
                   $marks  = $_POST['intMarks'.$indIds];
                }
                else
                {
                   $marks  = 0;
                }

            $arrConditions = array('Id' => $explIds[$ctr],'marks'=>$marks,'userId'=>$userId);
            $result = $this->manageskillDevelopment($action, $arrConditions);
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
        else if($action == 'QS')
          {
            $outMsg = 'Candidate Qualified Successfully';
          }
        else if ($action == 'UM')
              {
                $outMsg = 'Marks Updated Successfully';
              }
        else if ($action == 'IN')
            $outMsg = 'skill Development Detail(s) unpublished successfully';
        else if ($action == 'P')
            $outMsg = 'skill Development Detail(s) published successfully';

        return $outMsg;
    }

    public function updatecount()
    {

     $resultCount = $this->manageskillDevelopment('UC', array());

    }

    public function fetchVisiotcount()
    {
     $resultCount = $this->manageskillDevelopment('UG', array());
      $numRow = $resultCount->fetch_array();
     $totalVisitor = $numRow['INT_COUNT'];

     return $totalVisitor;

    }


    public function getRegistartionDetails($regdNo) {
        $arrConditions = array('regdNo' => $regdNo);
        $result = $this->manageskillDevelopment('RR', $arrConditions);
        //return $result;
        if ($result->num_rows > 0) {

            $row = $result->fetch_array();
            $strName = $row['vchName'];
            $strMobile = $row['vchMobile'];
            $strEmail = $row['vchEmail'];
            $strCourseType = $row['vchCourseType'];
            $strSkill = $row['vchSkill'];
            $strCoursesFor = $row['vchCoursesFor'];
            $strBranch = $row['branchName'];
            $strInterestedCourse = $row['interestedCourseName'];
            $payStatus =$row['tinPayStatus'];
            $testMark = $row['intTestMark'];
            $regdNumber = $row['vchRegdNumber'];
            $eligibleStatus = $row['tinEligibleStatus'];
            $intInstituteId = $row['intInstituteId'];
            $strCourseCode = $row['vchCoursesFor'];

            if($intInstituteId==9)
            {
                $strInstituteName = $row['vchOtherInstituteName'];
            }
            else
            {
                $strInstituteName = $row['instituteName'];
            }

            if($row['vchCoursesFor']=='Others')
            {
                $strCourseName = $row['vchOtherCourseName'];
            }
            else
            {
                $strCourseName = $row['vchCoursesFor'];
            }
            
            $outMsg = '';
            
            if($eligibleStatus==0)
            {
                $outMsg = 'You are not eligible for further process.';
            }
            elseif($payStatus==1)
            {
                $outMsg = 'You have already completed your payment';
            }

        }
        else
            {
                $outMsg = 'Please enter valid registration number.';
            }
       
        //echo $outMsg;exit;

        $arrResult = array('msg' => $outMsg,'strName' => $strName, 'strMobile' => $strMobile, 'strEmail' => $strEmail, 'strCourseType' => $strCourseType, 'strSkill' => $strSkill, 'strCoursesFor' => $strCoursesFor, 'strBranch'=>$strBranch,'strInterestedCourse' =>$strInterestedCourse,'strInstituteName'=>$strInstituteName,'payStatus'=>$payStatus,'testMark'=>$testMark,'eligibleStatus'=>$eligibleStatus,'strCourseName' =>$strCourseName,'intInstituteId'=>$intInstituteId,'strCourseCode' =>$strCourseCode);

        return $arrResult;
    }

    // Add edit for institute user of student registration for skill development  BY :: Rahul Kumar Saw ON :: 02-12-2021

    public function addUpdateInstituteskillDevelopment($Id) {

        $userId = !empty($_SESSION['adminConsole_userID'])?$_SESSION['adminConsole_userID']:1;
        $Id = (isset($Id)) ? $Id : 0;
//print_r($_POST);exit;
        $coursera = $_POST['selectedCourse'];
        $blankcoursera = Model::isBlank($_POST['selectedCourse']);


        $txtName = $_POST['txtName'];

        $blankName = Model::isBlank($_POST['txtName']);

        $lenName = Model::chkLength('max', $txtName, 200);

        $txtEmail = $_POST['txtEmail'];
        $lenEmail = Model::chkLength('max', $txtEmail, 60);

        $txtInterested = !empty($_POST['txtSkill'])?$_POST['txtSkill']:'';

        $blankInterested = Model::isBlank($_POST['txtSkill']);


        $txtPhone          = !empty($_POST['txtMobile'])?$_POST['txtMobile']:'';
        $txtRegdNumber     = !empty($_POST['txtRegdNumber'])?$_POST['txtRegdNumber']:'';
        $selCourse         = !empty($_POST['selCourse'])?$_POST['selCourse']:'';
        $txtOtherCourseName = !empty($_POST['txtOtherCourseName'])?$_POST['txtOtherCourseName']:'';
        $selBranch          = !empty($_POST['selBranch'])?$_POST['selBranch']:0;
        $selSemester        = !empty($_POST['selSemester'])?$_POST['selSemester']:'';
        $selInterestCourse  = !empty($_POST['selInterestCourse'])?$_POST['selInterestCourse']:'';
        $selInstituteName   = !empty($_POST['selInstituteName'])?$_POST['selInstituteName']:0;
        $txtOtherInstName   = !empty($_POST['txtOtherInstName'])?$_POST['txtOtherInstName']:'';

        $selDocumentType = $_POST['selDocumentType'];
        $blankDocType = Model::isBlank($_POST['selDocumentType']);

        $txtDocumentName = $_POST['txtDocumentName'];

        $txtDocumentNumber = $_POST['txtDocumentNumber'];
        $blankDocNumber = Model::isBlank($_POST['txtDocumentNumber']);

        $ReportFile = $_FILES['fileFeaturedImage']['name'];

        $prevFile = $_POST['hdnImageFile'];
        $fileSize = $_FILES['fileFeaturedImage']['size'];
        $fileTemp = $_FILES['fileFeaturedImage']['tmp_name'];
        $ext = pathinfo($ReportFile, PATHINFO_EXTENSION);
        $ReportFile = ($ReportFile != '') ? 'Identity_' . time() . '.' . $ext : '';
        $fileMimetype = mime_content_type($fileTemp);

        $allowDocType=array('image/png','image/jpg','application/pdf');

        //$lenMobile = Model::chkLength('max', $txtMobile, 10);
        //$errMobile = preg_match('/^[6-9][0-9]{9}$/',$txtMobile);

        $txtMessage = htmlspecialchars($_POST['txtMessage'], ENT_QUOTES);
        $pregMessage = preg_replace('/\s+/', '', $_POST['txtMessage']);
        $chkTags = '<button,<form,<iframe,<input,<script,<select,<textarea,alert';
        $checkTagsStatus = $this->checkHtmlTags($pregMessage, $chkTags);
        $lenMessage = Model::chkLength('max', $txtMessage, 500);


        include_once("clsSkillTP.php");
        $objTP = new clsSkillTP;
        $arrSConditions=array('intTpId'=>$coursera);

        $resultTP     = $objTP->manageskillTP('FTP', $arrSConditions);

        if ($resultTP)
         {
            $numRow = $resultTP->fetch_array();
            $tpName = $numRow['vchOrgName'];
            
         }
         else
         {
            $tpName = str_replace(' ', '', $coursera);
         }

        $totalReg = date('ymd').time();
        $regdNo = strtoupper(substr($tpName,0,3)).$totalReg;

        $outMsg = '';
        $flag   = ($Id != 0) ? 1 : 0;
        $action = ($Id == 0) ? 'A' : 'U';
        $errFlag = 0;

        $arrDConditions=array('instituteId'=>$selInstituteName,'programId'=>$selInterestCourse);

        $resultCount    = $objTP->manageskillTP('CC', $arrDConditions);
        $numRow         = $resultCount->fetch_array();
        $allottedSeat   = $numRow['intBookedSeat'];
        $totalRecord    = $numRow['INT_COUNT'];
        if ($allottedSeat == $totalRecord)
         {
            $outMsg = "Seat is not available for this program.";
            $errFlag = 1;
            $flag = 1;
            
         }
         else
         {
            $errFlag = 0;
            $flag = 0;
         }
         
        $arrConditions = array('intId' => $Id,
            'name' => $txtName,
            'email' => $txtEmail,
            'courseType' => $coursera,
            'interested' => $txtInterested,
            'identity' => $ReportFile,
            'address' => $txtMessage,
            'userid' => $userId,
            'documentType' => $selDocumentType,
            'documentName' =>$txtDocumentName,
            'documentNumber' =>$txtDocumentNumber,
            'txtPhone' =>$txtPhone,
            'txtRegdNumber' =>$txtRegdNumber,
            'selCourse' =>$selCourse,
            'txtOtherCourseName' =>$txtOtherCourseName,
            'selBranch' =>$selBranch,
            'selSemester' =>$selSemester,
            'selInterestCourse' =>$selInterestCourse,
            'selInstituteName' =>$selInstituteName,
            'txtOtherInstName' =>$txtOtherInstName,
            'regdNumber' =>$regdNo);

                if ($blankcoursera > 0 || $blankName > 0 || $blankDocType>0 || $blankDocNumber>0) {
                    $errFlag = 1;
                    $outMsg = "Mandatory field should not be blank";
                } else if(!in_array($fileMimetype,$allowDocType))
                {
                    $errFlag = 1;
                    $outMsg = "This type of file not allowed";
                }  else if ($checkTagsStatus > 0) {

                    $outMsg = "HTML Special Tags Are Not Allowed";
                    $errFlag = 1;
                    $flag = 1;
                } 

                

                /*$arrCDConditions = array('intId' => $Id, 'email' => $txtEmail , 'course' =>$coursera);
                $dupResult = $this->manageskillDevelopment('CD', $arrCDConditions);
//                 print_r( $dupResult);exit;

                if ($dupResult) {
                    $numRows = $dupResult->fetch_array();
                    $pCount = count($numRows);
                    if ($pCount > 0) {
                        $outMsg = 'Course with this email already exists.';
                        $errFlag = 1;
                        $flag = 1;
                    }
                }*/
                if($ReportFile != '')
                {
                 move_uploaded_file($fileTemp,APP_PATH. "uploadDocuments/Development/" . $ReportFile);

                }
                if ($errFlag == 0) {
                    $result = $this->manageskillDevelopment($action, $arrConditions);
                    if ($result) {
                        $numRow = $result->fetch_array();
                        //print_r($numRow);exit;
                        $p_status = $numRow[0];
                        $lastId = $numRow[1];
                        $payStatus = $numRow[2];                         
                        $outMsg = ($action == 'A') ? 'Thank You !!! You have successfully registered. Your Registration No. is <strong> '.$regdNo.'</strong>.' : 'Thank You !!! You have successfully registered.';
                

                        //send mail to osda
                        if (SEND_MAIL == "Y") { // && $p_status==1
                          
                            $strUserTo[] = $txtEmail;
                            $strUserFrom = DEVELOP_EMAIL;

                            $strsubject = "Registration for "  . $tpName ;

                            $strUserMessage = "Dear <strong>" . $txtName . "</strong></br>";
                            $strUserMessage .= "<div> <br>";
                            $strUserMessage .= "</div>";
                            $strUserMessage .= "Thank you for your interest shown in Digital Skilling Program of OSDA.</br></br>";

                            $strUserMessage .= "Your application for the program  <strong>"  . $tpName . " </strong>  is successfully submitted with registration id <strong>" . $regdNo ." </strong></br></br>";


                            $strUserMessage .= "Once we review your application, we will enrol your application for the said course subject to meeting the guidelines of program. </br></br>";

                            $strUserMessage .= "For any clarifications you can reach out to <strong> <a href='mailto:skilldev.osda@gmail.com '>skilldev.osda@gmail.com </a></strong> with your registration number. </br>";
                            $strUserMessage .= "<div> <br>";
                            $strUserMessage .= "</div>";

                            $strUserMessage .= "All the Best! </br>";

                            //$strUserMessage .= "<div> <br>";
                            //$strUserMessage .= "</div>";
                            $strUserMessage .= "<div><br><br>Regards <br>Skill Development Team <br>OSDA</div>";

                            $userdata['from'] = $strUserFrom;
                            $userdata['to'] = $strUserTo;
                            $userdata['name'] = 'Odisha Skill Development Authority';
                            $userdata['sub'] = $strsubject;
                            $userdata['message'] = $strUserMessage;
                            $jsUserData = json_encode($userdata);
                            $mailUserRes = $this->sendAuthMailSkillDevelop($jsUserData);
                            //print_r($mailUserRes);exit;
                        }
                    } else {
                        $errFlag = 1;
                        $outMsg = 'Error in opertaion please try again';
                    }
                }


                $strName = ($errFlag == 1) ? $txtName : '';
                $coursera = ($errFlag == 1) ? $coursera : '';
                $strEmail = ($errFlag == 1) ? $txtEmail : '';
                $txtInterested = ($errFlag == 1) ? $txtInterested : '';
                $strMessage = ($errFlag == 1) ? $txtMessage : '';
                $ReportFile = ($ReportFile ==1) ? $ReportFile : '';
                $arrConditions = array('strName' =>$strName);
                $arrResult = array('msg' => $outMsg, 'flag' => $errFlag, 'returnParams' => $arrConditions);
                return $arrResult;
        }

}

?>