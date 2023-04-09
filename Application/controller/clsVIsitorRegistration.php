<?php
  /* * ****Class to manage Share Story ********************
  'By                     : Ashis kumar Patra'
  'On                     : 11-04-2018       '
  ' Procedure Used        : USP_VISITOR_REGISTRATION       '
 * ************************************************** */
    class clsVisitorRegistration extends Model {

    //====Function to manage Share Story By :: Arpita Rath On :: 27-03-2017==============//
          public function manageVisitorRegistration($action, $visitorId, $name, $email, $phone, $attachment, $message, $createdBy,$pubStatus,$dtFrom,$dtTo) {
                
                    $dtFrom=($dtFrom=='0000-00-00')?BLANK_DATE:$dtFrom;
                    $dtTo  =($dtTo=='0000-00-00')?BLANK_DATE:$dtTo;
                   
                    
              
          	  $storySql = "CALL USP_VISITOR_REGISTER('$action', $visitorId, '$name', '$email', '$phone', '$attachment', '$message',$createdBy,$pubStatus,'$dtFrom','$dtTo',@OUT);";
          	 // echo $storySql;//exit;
                  $errAction    =   Model::isSpclChar($action);
                  $errName      =   Model::isSpclChar($name);
                  $errMail      =   Model::isSpclChar($email);
                  $errPhone     =   Model::isSpclChar($phone);
                
                  
                     if($errAction > 0 || $errName > 0 || $errMail > 0  || $errPhone>0)
                         header("Location:" . APP_URL . "error");
                     else {
                                $storyResult = Model::executeQry($storySql);
                                  return $storyResult;
                          }         
          }
    //======== Function to add Visitor By :: Ashis kumar Patra On :: 27-03-2017==============// 
         public function addVisitor($ID) {         	
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

//         	 $fileDocument     = $_FILES['fileDocument']['name'];
//         	 $fileDocumentName = $_FILES['fileDocument']['name'];
//	         $prevFile         = $_POST['hdnImageFile'];
//	         $fileSize         = $_FILES['fileDocument']['size'];
//	         $fileTemp         = $_FILES['fileDocument']['tmp_name'];
//	         $ext              = pathinfo($fileDocument , PATHINFO_EXTENSION);
//	         $fileDocument     = ($fileDocument != '') ? 'story' . date("Ymd_His") . '.' . $ext : '';
//                 $fileMimetype     = mime_content_type($fileTemp);
                 
//	         $txtMessage       = htmlspecialchars_decode($_POST['txtMessage'], ENT_QUOTES);   
//	         $blankMessage     = Model::isBlank($txtMessage);
//	         $errMessage       = Model::isSpclChar($_POST['txtMessage']);
//	         $lenMessage       = Model::isSpclChar('max', $txtMessage, 1000);
                  $strCaptcha     = $_POST["txtCaptcha"];
	         $outMsg    = '';
	         $action    = 'A';
	         $flag      = ($ID != 0) ? 1 : 0;
	         $errFlag   = 0;
	         //$recaptcha     = new \ReCaptcha\ReCaptcha(RE_CAPTHA_SCRTKEY);
	         //if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
               
                 if(isset($_POST['txtCaptcha']) && !empty($_POST['txtCaptcha']))
	          {
	          	
                    if ($_SESSION['captcha']==$strCaptcha) 
                    {
                          
                        if (($blankName > 0) || ($blankEmail > 0))
                        {
                            $outMsg    = "Mandatory field should not be left blank";
                            $flag      =  1;
                            $errFlag   =  1;
                        }else if (($errName > 0) || ($errEmail > 0) || ($errPhone > 0))
                        {
                            $outMsg    = "Special characters are not allowed";
                            $flag      =  1;
                            $errFlag   =  1;
                        }else if (($lenName > 0) || ($lenEmail > 0) || ($lenPhone > 0) )
                        {
                            $outMsg    = "Length should not  excided max length";
                            $flag      =  1;
                            $errFlag   =  1;
                        }/*else if($ext!='pdf' && $ext!='doc' && $ext!='docx' && $ext!='ppt' && $ext!='zip' && $fileDocumentName!='') {
                            $errFlag               = 1;
                            $flag                  = 1;
                            $outMsg                = 'Invalid file types. Upload only pdf,doc,docx,ppt,zip';
                        } */ 
	       
                      $dpResult=$this->manageVisitorRegistration('CD',0,'',$txtEmail,$txtPhone,'','',0,0,'0000-00-00','0000-00-00');
                      if($dpResult->num_rows>0){
                           $errFlag=1;
                           $outMsg ='Email Id or Mobile No. is already registered.';
                       } 
	              if($errFlag == 0)  {
                          $strREFNO = Model::generateRandomString(6);
                          
                          $strREFNO = "OSD".$strREFNO;
                          
	              	  $result = $this->manageVisitorRegistration($action,0,$txtName,$txtEmail,$txtPhone,'',$strREFNO,0,0,'0000-00-00','0000-00-00');
                   
	              	   if($result) {
	              	   	  $outMsg    = "Your entry to the Odisha Skill Competition ".date('Y')." is confirmed. Your visitor identity No. is <strong>".$strREFNO."</strong/>";
                                 
                                 //send mail to osda
                                if(SEND_MAIL == "Y") {
                                       
                                        //mail to the user
                                        $strUserTo[]         = $txtEmail;
                                        $strUserFrom         = PORTAL_EMAIL;
                                        $strUserMessage      = "<strong>".$outMsg."</strong></br>";
                                        $strUserMessage      .= "<div> <br>";
                                        $strUserMessage      .= " Kindly show the Visitor Identity No. at entry gate to get your entry badge.";
                                        $strUserMessage      .= "</div>";    
                                        $strUserMessage      .="<div><br><br>Best Regards,<br>Odisha Skill Development Authority<br>Government of Odisha</div>";		

                                        $userdata['from']       = $strUserFrom;
                                        $userdata['to']         = $strUserTo;
                                        $userdata['name']       = 'Odisha Skill Development Authority';
                                        $userdata['sub']        = 'SkillOdisha-2018 Participation';
                                        $userdata['message']    = $strUserMessage;
                                        $jsUserData             = json_encode($userdata);
                                        $mailUserRes            = $this->sendAuthMail($jsUserData);
                                }
//                                if(SEND_MESSAGE=='Y'){
//                                    $mobileMessage=$outMsg.' Kindly show the Visitor Identity No. at entry gate to get your entry badge.'; 
//                                    $this->sendSMS($txtPhone,$mobileMessage);
//                                }
                                  
                                  
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
	           $strMessage   =  ($errFlag == 1) ?  $strREFNO    : '';

	           $arrResult    = array('msg' => $outMsg, 'errFlag' => $errFlag, 'strName' => $strName, 'strEmail' => $strEmail, 'strPhone' => $strPhone, 'strFileName' => $strFileName, 'strMessage' => $strMessage);   
                   return $arrResult;
         }

   //====== Function to delete share story By :: Arpita Rath On :: 27-03-2017 ============== //

         public function deleteVisitors($action, $ids) {
            $newSessionId           = session_id();
            $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
            if($newSessionId == $hdnPrevSessionId){  
                $ctr = 0;
                $explIds = explode(',', $ids);

                $delRec = 0;
                foreach ($explIds as $indIds) {

                   $result = $this->manageVisitorRegistration('D',$explIds[$ctr],'','','','','',USER_ID,0,'0000-00-00','0000-00-00');		                   
                    if ($result)
                        $delRec++;
                    $ctr++;
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