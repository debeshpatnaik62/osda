<?php

class clsStudent extends Model {

    //Function to manage Student

    public function manageStudent($action, $arrConditions) {
        try {

            $result = Model::callProc('USP_STUDENT', $action, $arrConditions);
            return $result;
//echo $result;exit;
        }//
        catch (Exception $e) {
            echo 'Error:' . $e->getMessage();
            exit();
        }
    }

    public function addUpdateStudent($Id) {

        $userId = !empty($_SESSION['adminConsole_userID'])?$_SESSION['adminConsole_userID']:1;
        $Id = (isset($Id)) ? $Id : 0;

        $txtName = $_POST['txtName'];

        $blankName = Model::isBlank($_POST['txtName']);

        $lenName = Model::chkLength('max', $txtName, 60);

        $txtMobile = $_POST['txtMobile'];

        $blankMobile = Model::isBlank($_POST['txtMobile']);

        $lenMobile = Model::chkLength('max', $txtMobile, 10);
        $errMobile = preg_match('/^[6-9][0-9]{9}$/',$txtMobile);

        $txtEmail = $_POST['txtEmail'];
        $lenEmail = Model::chkLength('max', $txtEmail, 60);

        $selDistrict = $_POST['selDistrict'];
        $blankDistrict = Model::isBlank($_POST['selDistrict']);

        $txtMessage = htmlspecialchars($_POST['txtMessage'], ENT_QUOTES);
        $pregMessage = preg_replace('/\s+/', '', $_POST['txtMessage']);
        $chkTags = '<button,<form,<iframe,<input,<script,<select,<textarea,alert';
        $checkTagsStatus = $this->checkHtmlTags($pregMessage, $chkTags);
        $lenMessage = Model::chkLength('max', $txtMessage, 500);

        $strCaptcha = $_POST["txtCaptcha"];


        $outMsg = '';
        $flag   = ($Id != 0) ? 1 : 0;
        $action = ($Id == 0) ? 'A' : 'U';
        $errFlag = 0;

        $arrConditions = array('intId' => $Id,
            'name' => $txtName,
            'mobile' => $txtMobile,
            'email' => $txtEmail,
            'district' => $selDistrict,
            'message' => $txtMessage,
            'pubStatus' => 0,
            'userid' => $userId);
        if (isset($_POST['txtCaptcha']) && !empty($_POST['txtCaptcha'])) 
        {

            if ($_SESSION['captcha'] == $strCaptcha) {
                if ($blankName > 0) {
                    $errFlag = 1;
                    $outMsg = "Name should not be blank";
                } else if ($blankMobile > 0) {
                    $errFlag = 1;
                    $outMsg = "Mobile should not be blank";
                }  else if ($blankDistrict > 0) {
                    $errFlag = 1;
                    $outMsg = "District should not be blank";
                } else if ($checkTagsStatus > 0 || $checkTagsStatusO > 0) {

                    $outMsg = "HTML Special Tags Are Not Allowed";
                    $errFlag = 1;
                    $flag = 1;
                } else if ($errMobile <1) {

                    $outMsg = "Enter Valid mobile number";
                    $errFlag = 1;
                    $flag = 1;
                }

                $arrCDConditions = array('intId' => $Id, 'name' => $txtName);
///////////////
                $dupResult = $this->manageStudent('CD', $arrCDConditions);
//                 print_r( $dupResult);exit;

                if ($dupResult) {
                    $numRows = $dupResult->fetch_array();
                    $pCount = count($numRows);
                    if ($pCount > 0) {
                        $outMsg = 'Student Details with this name already exists';
                        $errFlag = 1;
                        $flag = 1;
                    }
                }

                if ($errFlag == 0) {
                    $result = $this->manageStudent($action, $arrConditions);
                    if ($result) {
                        if($_SESSION['lang']!='O')
                        {
                        $outMsg = ($action == 'A') ? 'Thank You for contacting us. We will get back to you with the information you asked for. ' : 'Student Details updated successfully';
                        }
                        else
                        {
                        $outMsg = ($action == 'A') ? 'ଆମ ସହ ଯୋଗାଯୋଗ କରିଥିବାରୁ ଧନ୍ୟବାଦ। ଆପଣ ଜାଣିବାକୁ ଚାହୁଁଥିବା ପ୍ରସଙ୍ଗର ସମାଧାନ ସହ ଖୁବଶୀଘ୍ର ଫେରୁଛୁ ଆପଣଙ୍କ ନିକଟକୁ। ' : 'ଆମ ସହ ଯୋଗାଯୋଗ କରିଥିବାରୁ ଧନ୍ୟବାଦ। ଆପଣ ଜାଣିବାକୁ ଚାହୁଁଥିବା ପ୍ରସଙ୍ଗର ସମାଧାନ ସହ ଖୁବଶୀଘ୍ର ଫେରୁଛୁ ଆପଣଙ୍କ ନିକଟକୁ।';
                        }

                        //send mail to osda
                        if (SEND_MAIL == "Y") {
                            $strsubject = "OSDA :: Contact : Student from OSDA portal ";

                            //$strTo[] = PORTAL_EMAIL;
                            $strFrom = CONTACT_EMAIL;//$txtEmail;
                            $strTo       = array('rahul.saw@csm.co.in','dipti.barisal@csm.co.in');
                            $MailMessage = "The Student Details of Mr./Mrs. <strong>" . $txtName . "</strong> are below </br>";

                            $MailMessage .= "<table cellspacing='0' cellpadding='2' border='0' bgcolor='#cccccc'>";
                            $MailMessage .= "<tr bgcolor='#FFFFFF'>";
                            $MailMessage .= "<td>Name</td>";
                            $MailMessage .= "<td>: " . $txtName . "</td>";
                            $MailMessage .= "</tr>";
                            if($txtEmail != '') {
                            $MailMessage .= "<tr bgcolor='#FFFFFF'>";
                            $MailMessage .= "<td>Email Id</td>";
                            $MailMessage .= "<td>: " . $txtEmail . "</td>";
                            $MailMessage .= "</tr>";
                             }
                             if($selDistrict != '') {
                            $MailMessage .= "<tr bgcolor='#FFFFFF'>";
                            $MailMessage .= "<td>District</td>";
                            $MailMessage .= "<td>: " . $selDistrict . "</td>";
                            $MailMessage .= "</tr>";
                             }
                                $MailMessage .= "<tr bgcolor='#FFFFFF'>";
                                $MailMessage .= "<td>Mobile No</td>";
                                $MailMessage .= "<td>: " . $txtMobile . "</td>";
                                $MailMessage .= "</tr>";
                           if($txtMessage != '') {
                            $MailMessage .= "<tr bgcolor='#FFFFFF'>";
                            $MailMessage .= "<td>Message </td>";
                            $MailMessage .= "<td>: " . $txtMessage . "</td>";
                            $MailMessage .= "</tr>";
                            $MailMessage .= "</table>";
                           }

                            $data['from'] = $strFrom;
                            $data['to'] = $strTo;

                            // $data['cc']         = $totalCcMembers;

                            $data['name'] = 'Odisha Skill Development Authority';
                            $data['sub'] = $strsubject;
                            $data['message'] = $MailMessage;
                            $jsData = json_encode($data);
                            $mailRes = $this->sendAuthMailContact($jsData);
                            // print_r($mailRes);
                            //mail to the user
                            $strUserTo[] = $txtEmail;
                            $strUserFrom = CONTACT_EMAIL;
                            $strUserMessage = "<strong>Thank you for sharing your details.</strong></br>";
                            $strUserMessage .= "<div> <br>";
                            $strUserMessage .= "</div>";
                            $strUserMessage .= "<div><br><br>Best Regards,<br>Odisha Skill Development Authority<br>Government of Odisha</div>";


                            $userdata['from'] = $strUserFrom;
                            $userdata['to'] = $strUserTo;
                            $userdata['name'] = 'Odisha Skill Development Authority';
                            $userdata['sub'] = $strsubject;
                            $userdata['message'] = $strUserMessage;
                            $jsUserData = json_encode($userdata);
                            $mailUserRes = $this->sendAuthMailContact($jsUserData);
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


        $strName = ($errFlag == 1) ? $txtName : '';
        $strMobile = ($errFlag == 1) ? $txtMobile : '';
        $strEmail = ($errFlag == 1) ? $txtEmail : '';
        $strDistrict = ($errFlag == 1) ? $selDistrict : '';
        $strMessage = ($errFlag == 1) ? $txtMessage : '';
        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag, 'returnParams' => $arrConditions);
        return $arrResult;
    }

    public function readStudent($intId) {
        $arrConditions = array('Id' => $intId);
        $result = $this->manageStudent('R', $arrConditions);
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

    // Function to Delete Student Details 

    public function deleteStudent($action, $ids) {

        $ctr = 0;
        $userId = $_SESSION['adminConsole_userID'];
        $explIds = explode(',', $ids);
        $delRec = 0;
        foreach ($explIds as $indIds) {

            $arrConditions = array('Id' => $explIds[$ctr]
                    /*  'userid'=>$userId */                    );
            $result1 = $this->manageStudent('R', $arrConditions);
            //print_r( $result1);exit;
            $row = $result1->fetch_array();

            $result = $this->manageStudent($action, $arrConditions);
            //  print_r( $result);exit;
            $row = $result->fetch_array();
            if ($row[0] == 0)
                $delRec++;
            $ctr++;
        }

        if ($action == 'D') {
            if ($delRec > 0)
                $outMsg .= 'Student Detail(s) deleted successfully';
        }

        else if ($action == 'IN')
            $outMsg = 'Student Detail(s) unpublished successfully';
        else if ($action == 'P')
            $outMsg = 'Student Detail(s) published successfully';

        return $outMsg;
    }

}

?>