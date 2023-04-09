<?php
 /* * ****Class to manage feedback details ********************
'By                     : T Ketaki Debadarshini   '
'On                     : 08-Sep-2016       '
' Procedure Used        : USP_W_DISTRICTS '
* ************************************************** */

class clsFeedback extends Model {

// Function To Manage feedback By::T Ketaki Debadarshini   :: On:: 08-Sep-2016
    public function manageFeedback($action,$feedbackId,$intType,$strName,$strMail,$strMobile,$strSubject,$strMessage,$dtmFrmdate,$dtmTodate,$intUpdatedby,$intPgsize) {
        
        $dtmFrmdate=($dtmFrmdate=='0000-00-00')?BLANK_DATE:$dtmFrmdate;
        $dtmTodate  =($dtmTodate=='0000-00-00')?BLANK_DATE:$dtmTodate;
        
        $feedbackSql = "CALL USP_FEEDBACK('$action',$feedbackId,$intType,'$strName','$strMail','$strMobile','$strSubject','$strMessage','$dtmFrmdate','$dtmTodate',$intUpdatedby,$intPgsize);";
       //echo $feedbackSql; //exit;
        $errName      = Model::isSpclChar($strName);
        $errMail      = Model::isSpclChar($strMail);
        $errMessage   = Model::isSpclChar($strMessage);
        
        $errMobile    = Model::isSpclChar($strMobile);
        $errSub       = Model::isSpclChar($strSubject);
        $errFrmdt     = Model::isSpclChar($dtmFrmdate);
        $errTodt      = Model::isSpclChar($dtmTodate);
        
        if ($errName > 0 || $errMail > 0 || $errMobile>0 || $errSub>0 || $errFrmdt>0 || $errTodt>0 )
            header("Location:" . APP_URL . "error");
        else {
            $feedbackResult = Model::executeQry($feedbackSql);
            return $feedbackResult;
        }
    }
    
     /************ Function to delete feedBack Record *****************
         By	 	 : T Ketaki Debadarshini					
        On	 	 : 08-Sep-2016
    *************************************************** */

    public function deleteFeedBack($action, $ids) {
        $newSessionId           = session_id();
        $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
        if($newSessionId == $hdnPrevSessionId) {  
        
            $ctr = 0;
            $explIds = explode(',', $ids);
            $delRec = 0;
            foreach ($explIds as $indIds) {
                $feedBackResult = $this->manageFeedback('D',$explIds[$ctr],0,'','','','','','0000-00-00','0000-00-00',USER_ID,0);
                       // manageFeedBack('D', $explIds[$ctr],'', '', '', '', '', '', '0000-00-00', '0000-00-00',USER_ID);
                if ($feedBackResult)
                    $delRec++;
                $ctr++;
            }
            if ($delRec > 0)
                $msg = 'Selected Record(s) Deleted Successfully';
            else
                $msg = 'Operation Failed. Transaction Aborted';
            return $msg;
        }else{
                 header("Location:".APP_URL."error");
            } 
    }

 //========== Function to add Feedback By :: Arpita Rath On :: 24-03-2017=====================//
       public function addFeedback() {

        
          
          $txtName     = htmlspecialchars($_POST['txtName'], ENT_QUOTES);
          $blankName   = Model::isBlank($txtName);
          $errName     = Model::isSpclChar($_POST['txtName']);
          $lenName     = Model::chkLength('max', $txtName, 100);

          $txtEmail    = htmlspecialchars($_POST['txtEmail'], ENT_QUOTES);
          $blankEmail  = Model::isBlank($txtEmail);
          $errEmail    = Model::isSpclChar($_POST['txtEmail']);
          $lenEmail    = Model::chkLength('max', $txtEmail, 100);

          $txtPhone    = htmlspecialchars($_POST['txtPhone'], ENT_QUOTES);         
          $errPhone    = Model::isSpclChar($_POST['txtPhone']);
          $lenPhone    = Model::chkLength('max', $txtPhone, 10);

          $txtMsg      = htmlspecialchars($_POST['txtMsg'], ENT_QUOTES);
          $blankMsg    = Model::isBlank($txtMsg);
          $errMsg      = Model::isSpclChar($_POST['txtMsg']);
          $strCaptcha     = $_POST["txtCaptcha"];
          $outMsg      = '';
          $flag        = ($feedbackId != 0) ? 1 : 0;
          $action      = 'A';
          $errFlag     =  0;

          //$strCaptcha  = $_POST["txtCaptcha"];
         
         //$recaptcha     = new \ReCaptcha\ReCaptcha(RE_CAPTHA_SCRTKEY);
         
         //if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
          
          if(isset($_POST['txtCaptcha']) && !empty($_POST['txtCaptcha'])){
            //get verify response data
            //$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
         
             if ($_SESSION['captcha']==$strCaptcha)
                 {
                   if(($blankName > 0) || ($blankMsg > 0))
                   {
                       $outMsg    = "Mandatory field should not be left blank";
                       $errFlag   =  1;
                       $flag      =  1;
                   }
                  else if(($errName > 0) || ($errEmail > 0) || ($errPhone > 0) || ($errMsg > 0))
                   {
                       $outMsg    = "Special characters are not allowed";
                       $errFlag   =  1;
                       $flag      =  1;
                   } 
                  else if(($lenName > 0) || ($lenEmail > 0) || ($lenPhone > 0))
                   {
                        $outMsg   = "Length should not excided maxlength";
                        $errFlag  =  1;
                        $flag     =  1;
                   } 
                  else
                   {
                        $errFlag  =  0;
                   } 

                  if($errFlag == 0) {
                       $result = $this->manageFeedback($action,0,0,$txtName,$txtEmail,$txtPhone,'',$txtMsg,'0000-00-00','0000-00-00',0,0);
                       if($result) {
                           $outMsg = 'Thanks for your feedback';
                           
                           //send mail to osda
                            if(SEND_MAIL == "Y") {
                                    $strsubject         = "OSDA :: Feedback from OSDA portal ";
                                 
                                    //$strTo[]             = PORTAL_EMAIL;
                                    $strTo       = array('rahul.saw@csm.co.in');
                                    $strFrom             = FEEDBACK_EMAIL;//$txtEmail;
                                    $MailMessage         = "The feedback details of Mr./Mrs. <strong>" . $txtName . "</strong> are below </br>";
                                    
                                    $MailMessage        .="<table cellspacing='0' cellpadding='2' border='0' bgcolor='#cccccc'>";
                                    $MailMessage        .="<tr bgcolor='#FFFFFF'>";
                                    $MailMessage        .= "<td>Name</td>";
                                    $MailMessage        .= "<td>: ".$txtName . "</td>";
                                    $MailMessage        .="</tr>";
                                    $MailMessage        .="<tr bgcolor='#FFFFFF'>";
                                    $MailMessage        .= "<td>Email Id</td>";
                                    $MailMessage        .= "<td>: ".$txtEmail . "</td>";                                                
                                    $MailMessage        .="</tr>";
                                    if($txtPhone!=''){
                                        $MailMessage        .="<tr bgcolor='#FFFFFF'>";
                                        $MailMessage        .= "<td>Mobile No</td>";
                                        $MailMessage        .= "<td>: ".$txtPhone . "</td>";   
                                        $MailMessage        .="</tr>";
                                    }
                                    $MailMessage        .="<tr bgcolor='#FFFFFF'>";
                                    $MailMessage        .= "<td>Feedback </td>";
                                    $MailMessage        .= "<td>: ".$txtMsg. "</td>";   
                                    $MailMessage        .="</tr>";
                                    $MailMessage        .= "</table>"; 
                                                                     
                                    $data['from']       = $strFrom;
                                    $data['to']         = $strTo;

                                   // $data['cc']         = $totalCcMembers;

                                    $data['name']       = 'Odisha Skill Development Authority';
                                    $data['sub']        = $strsubject;
                                    $data['message']    = $MailMessage;
                                    $jsData             = json_encode($data);
                                    $mailRes            = $this->sendAuthMailFeedback($jsData);
                                    //print_r($mailRes);exit;
                                    
                                    //mail to the user
                                    $strUserTo[]         = $txtEmail;
                                    $strUserFrom         = FEEDBACK_EMAIL;
                                    $strUserMessage      = "<strong>Thank you for sharing your feedback.</strong></br>";
                                    $strUserMessage      .= "<div> <br>";
                                    $strUserMessage      .= "</div>";    
                                    $strUserMessage         .="<div><br><br>Best Regards,<br>Odisha Skill Development Authority<br>Government of Odisha</div>";		
                                  
                                    
                                    $userdata['from']       = $strUserFrom;
                                    $userdata['to']         = $strUserTo;
                                    $userdata['name']       = 'Odisha Skill Development Authority';
                                    $userdata['sub']        = $strsubject;
                                    $userdata['message']    = $strUserMessage;
                                    $jsUserData             = json_encode($userdata);
                                    $mailUserRes            = $this->sendAuthMailFeedback($jsUserData);
                            }

                           
                           
                       } else {
                           $errFlag = 1;
                           $outMsg  = 'Error in opertaion please try again';
                       }
                    } 
                  } else {
                       $errFlag = 1;
                       $outMsg  = "The captcha code is invalid ! Please try it again";
                  }
            }else{
                    $outMsg = 'Please enter captcha code.'; 
                    $errFlag = 1;
            } 
        
            $strName     = ($errFlag == 1)  ?  $txtName   : '';
            $strEmail    = ($errFlag == 1)  ?  $txtEmail  : '';
            $strPhone    = ($errFlag == 1)  ?  $txtPhone  : '';
            $strMessage  = ($errFlag == 1)  ?  $txtMsg    : '';

            $arrResult   = array('msg' => $outMsg, 'errFlag' => $errFlag, 'strName' => $strName, 'strEmail' => $strEmail, 'strPhone' => $strPhone, 'strMessage' => $strMessage);
                   return $arrResult;
         
       }

}

?>