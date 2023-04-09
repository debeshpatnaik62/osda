<?php
  /* * ****Class to manage Share Story ********************
  'By                     : Arpita Rath'
  'On                     : 27-03-2017       '
  ' Procedure Used        : USP_SHARE_STORY       '
 * ************************************************** */
    class clsShareStory extends Model {

    //====Function to manage Share Story By :: Arpita Rath On :: 27-03-2017==============//
          public function manageShareStory($action, $storyId, $name, $email, $phone, $attachment, $message, $createdBy,$pubStatus,$dtFrom,$dtTo) {

          	  $storySql = "CALL USP_SHARE_STORY('$action', $storyId, '$name', '$email', '$phone', '$attachment', '$message',$createdBy,$pubStatus,'$dtFrom','$dtTo',@OUT);";
          	  //echo $storySql;exit;
                  $errAction    =   Model::isSpclChar($action);
                  $errName      =   Model::isSpclChar($name);
                  $errMail      =   Model::isSpclChar($email);
                  $errPhone     =   Model::isSpclChar($phone);
                  $errMsg       =   Model::isSpclCHar($message);
                  $errAttachment       =   Model::isSpclCHar($attachment);
                  
                     if($errAction > 0 || $errName > 0 || $errMail > 0 || $errMsg || $errPhone>0 || $errAttachment>0)
                         header("Location:" . APP_URL . "error");
                     else {
                                $storyResult = Model::executeQry($storySql);
                                  return $storyResult;
                          }         
          }
    //======== Function to add Share Story By :: Arpita Rath On :: 27-03-2017==============// 
         public function addStory() {         	
                //print_r($_POST);exit;
         	 $txtName          = htmlspecialchars_decode($_POST['txtName'], ENT_QUOTES);
         	 $blankName        = Model::isBlank($txtName);
         	 $errName          = Model::isSpclChar($_POST['txtName']);
         	 $lenName          = Model::chkLength('max', $txtName, 100);

         	 $txtEmail         = htmlspecialchars_decode($_POST['txtEmail'], ENT_QUOTES);
         	 $blankEmail       = Model::isBlank($txtEmail);
         	 $errEmail         = Model::isSpclChar($_POST['txtEmail']);
         	 $lenEmail         = Model::chkLength('max', $txtEmail, 50);

         	 $txtPhone         = htmlspecialchars_decode($_POST['txtPhone'], ENT_QUOTES);
         	 $blankPhone       = Model::isBlank($txtPhone);
         	 $errPhone         = Model::isSpclChar($_POST['txtPhone']);
         	 $lenPhone         = Model::chkLength('max', $txtPhone, 10);

         	 $fileDocument     = $_FILES['fileDocument']['name'];
         	 $fileDocumentName = $_FILES['fileDocument']['name'];
	         $prevFile         = $_POST['hdnImageFile'];
	         $fileSize         = $_FILES['fileDocument']['size'];
	         $fileTemp         = $_FILES['fileDocument']['tmp_name'];
	         $ext              = pathinfo($fileDocument , PATHINFO_EXTENSION);
	         $fileDocument     = ($fileDocument != '') ? 'story' . date("Ymd_His") . '.' . $ext : '';
                 $fileMimetype     = mime_content_type($fileTemp);
                 
	         $txtMessage       = htmlspecialchars_decode($_POST['txtMessage'], ENT_QUOTES);   
	         $blankMessage     = Model::isBlank($txtMessage);
	         $errMessage       = Model::isSpclChar($_POST['txtMessage']);
	         $lenMessage       = Model::isSpclChar('max', $txtMessage, 1000);
                  $strCaptcha     = $_POST["txtCaptcha"];
	         $outMsg    = '';
	         $action    = 'A';
	         $flag      = ($storyId != 0) ? 1 : 0;
	         $errFlag   = 0;
	         //$recaptcha     = new \ReCaptcha\ReCaptcha(RE_CAPTHA_SCRTKEY);
	         //if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
                 if(isset($_POST['txtCaptcha']) && !empty($_POST['txtCaptcha']))
	          {
	          	//get verify response data
                    //$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
                    //if ($resp->isSuccess())
                    if ($_SESSION['captcha']==$strCaptcha) 
                    {    
                        if (($blankName > 0) || ($blankEmail > 0) || ($blankMessage > 0))
                        {
                            $outMsg    = "Mandatory field should not be left blank";
                            $flag      =  1;
                            $errFlag   =  1;
                        }else if (($errName > 0) || ($errEmail > 0) || ($errPhone > 0) || ($errMessage > 0))
                        {
                            $outMsg    = "Special characters are not allowed";
                            $flag      =  1;
                            $errFlag   =  1;
                        }else if (($lenName > 0) || ($lenEmail > 0) || ($lenPhone > 0) || ($lenMessage > 0))
                        {
                            $outMsg    = "Length should not  excided max length";
                            $flag      =  1;
                            $errFlag   =  1;
                        }else if($fileSize > SIZE5MB)
                        {
                            $outMsg    = "File size can not be more than 5 MB";
                            $flag      =  1;
                            $errFlag   =  1;
                        }else if($fileMimetype!='application/zip' && $fileMimetype!='application/vnd.ms-office' && $fileMimetype!='application/pdf' && $fileDocumentName!='') {
                                $errFlag               = 1;
                                $flag                  = 1;
                                $outMsg                = 'Invalid file types. Upload only pdf,doc,docx,ppt,zip';
                        }/*else if($ext!='pdf' && $ext!='doc' && $ext!='docx' && $ext!='ppt' && $ext!='zip' && $fileDocumentName!='') {
                            $errFlag               = 1;
                            $flag                  = 1;
                            $outMsg                = 'Invalid file types. Upload only pdf,doc,docx,ppt,zip';
                        } */ 
	             
	              if($errFlag == 0)  {

	              	  $result = $this->manageShareStory($action,0,$txtName,$txtEmail,$txtPhone,$fileDocument,$txtMessage,0,0,'1000-01-01','1000-01-01');

	              	   if($result) {
	              	   	  $outMsg    = "Thanks for sharing your story with us";
                                  
                                  if ($fileDocument != '') {
                    
                                        if (file_exists(APP_PATH."uploadDocuments/Story/" . $prevFile) && $prevFile != '' && $fileDocumentName!= '') {                       
                                            unlink(APP_PATH."uploadDocuments/Story/" . $prevFile);               
                                        }
                                        move_uploaded_file($fileTemp, APP_PATH."uploadDocuments/Story/" . $fileDocument);

                                  }
                                  
                                 //send mail to osda
                                if(SEND_MAIL == "Y") {
                                        $strsubject          = "OSDA :: Share your story ";
                                        //send mail to osda
                                        $strTo[]             = PORTAL_EMAIL;
                                        $strFrom             = $txtEmail;
                                        $MailMessage         = "Details of the shared story of Mr./Mrs. <strong>" . $txtName . "</strong> are below </br>";
                                        
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
                                        $MailMessage        .= "<td>Message </td>";
                                        $MailMessage        .= "<td>: ".$txtMessage. "</td>";   
                                        $MailMessage        .="</tr>";
                                        $MailMessage        .= "</table>";  
                                          
                                        if ($fileDocument != '') 
                                        $data['FileName']       = APP_PATH."uploadDocuments/Story/" . $fileDocument;
                                        
                                        $data['from']       = $strFrom;
                                        $data['to']         = $strTo;
                                        $data['name']       = 'Odisha Skill Development Authority';
                                        $data['sub']        = $strsubject;
                                        $data['message']    = $MailMessage;
                                        $jsData             = json_encode($data);
                                        $mailRes            = $this->sendAuthMail($jsData);
                                       // print_r($mailRes);

                                        //mail to the user
                                        $strUserTo[]         = $txtEmail;
                                        $strUserFrom         = PORTAL_EMAIL;
                                        $strUserMessage      = "<strong>Thank you for sharing your story with us.</strong></br>";
                                        $strUserMessage      .= "<div> <br>";
                                        $strUserMessage      .= " We will get back to you soon.";
                                        $strUserMessage      .= "</div>";    
                                        $strUserMessage      .="<div><br><br>Best Regards,<br>Odisha Skill Development Authority<br>Government of Odisha</div>";		

                                        $userdata['from']       = $strUserFrom;
                                        $userdata['to']         = $strUserTo;
                                        $userdata['name']       = 'Odisha Skill Development Authority';
                                        $userdata['sub']        = $strsubject;
                                        $userdata['message']    = $strUserMessage;
                                        $jsUserData             = json_encode($userdata);
                                        $mailUserRes            = $this->sendAuthMail($jsUserData);
                                }

                                  
                                  
	              	   } else {
	              	   	   $errFlag  =  1;
	              	   	   $outMsg   = "Error in operation please try again";
	              	   }

                      
                    }
	          }else {
	               $errFlag = 1;
                       $outMsg   = "The captcha code is invalid ! Please try it again";
	            }  
                  }else {
	          	   $errFlag   =  1;
	          	   $outMsg    = "Please enter captcha code.";
	          }

	           $strName      =  ($errFlag == 1) ?  $txtName       : '';
	           $strEmail     =  ($errFlag == 1) ?  $txtEmail      : '';
	           $strPhone     =  ($errFlag == 1) ?  $txtPhone      : '';
	           $strFileName  =  ($errFlag == 1) ?  $fileDocument  : '';
	           $strMessage   =  ($errFlag == 1) ?  $txtMessage    : '';

	           $arrResult    = array('msg' => $outMsg, 'errFlag' => $errFlag, 'strName' => $strName, 'strEmail' => $strEmail, 'strPhone' => $strPhone, 'strFileName' => $strFileName, 'strMessage' => $strMessage);   
                   return $arrResult;
         }

   //====== Function to delete share story By :: Arpita Rath On :: 27-03-2017 ============== //

         public function deleteStory($action, $ids) {
            $newSessionId           = session_id();
            $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
            if($newSessionId == $hdnPrevSessionId){  
                $ctr = 0;
                $explIds = explode(',', $ids);

                $delRec = 0;
                foreach ($explIds as $indIds) {

                   $result = $this->manageShareStory('D',$explIds[$ctr],'','','','','',USER_ID,0,'1000-01-01','1000-01-01');		                   
                    if ($result)
                        $delRec++;
                    $ctr++;
                }

                if ($action == 'D' && $strFileName != '') {
                         if (file_exists(APP_PATH. "uploadDocuments/Story/" . $strFileName)) {
                       // unlink(APP_PATH. "uploadDocuments/Story/" . $strFileName);
                    }
                 }
                if ($delRec > 0)
                    $outMsg = 'Selected Record(s) deleted Successfully';
                else
                    $outMsg = 'Operation Failed. Transaction Aborted';
                return $outMsg;
            }else{
                header("Location:".APP_URL."error");
            }     
        }       
    }
?>