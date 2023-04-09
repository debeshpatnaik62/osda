<?php
 /* * ****Class to manage Become a member details ********************
'By                     : Arpita Rath   '
'On                     : 30-03-2017       '
' Procedure Used        : USP_MEMBER '
* ************************************************** */
   class clsMember extends Model {
   	  //======== Function to manage Member By :: Arpita Rath On :: 30-03-2017===========//
   	         public function manageMember($action,$memberId,$name,$email,$phone,$sectorId,$courseId,$description,$pubStatus,$intPgSize,$updatedBy,$date) {
                     
                     
                      $date=($date=='0000-00-00')?BLANK_DATE:$date;
                     
                     
   	         	 $memberSql = "CALL USP_MEMBER('$action',$memberId,'$name','$email','$phone',$sectorId,$courseId,'$description',$pubStatus,$intPgSize,$updatedBy,'$date');";
                        //  echo $memberSql;
                         $errAction     = Model::isSpclChar($action);
                         $errName       = Model::isSpclChar($name);
                         $errMail       = Model::isSpclChar($email);
                         $errDesc       = Model::isSpclChar($description);
                         $errPhone      = Model::isSpclChar($phone);
                         
                         $errSectorId   = Model::isSpclChar($sectorId);
                         $errCourseId   = Model::isSpclChar($courseId);
                         
                          if($errAction > 0 || $errName > 0 || $errMail > 0 || $errDesc > 0 || $errSectorId > 0 || $errCourseId > 0 || $errPhone > 0)
                              header("Location:" . APP_URL . "error");
                          else {
                                $memberRes = Model::executeQry($memberSql);
                                  return $memberRes;
                          }    
   	         } 

   	 //========= Function to add Become a Member By :: Arpita Rath On :: 30-03-2017==========//
   	         public function addMember() {

                    $newSessionId           = session_id();
                    $hdnPrevSessionId       = $_POST['hdnPrevSessionId'];
                    if($newSessionId == $hdnPrevSessionId) {

                        //session_regenerate_id(); 
                        
   	         	$userId         =  $_SESSION['adminConsole_userID'];

   	         	$txtName        =  htmlspecialchars($_POST['txtName'], ENT_QUOTES);
   	         	$blankName      =  Model::isBlank($txtName);
   	         	$errName        =  Model::isSpclChar($_POST['txtName']);
   	         	$lenName        =  Model::chkLength('max', $txtName, 100);

   	         	$txtEmail       =  htmlspecialchars($_POST['txtEmail'], ENT_QUOTES);
   	         	$blankEmail     =  Model::isBlank($txtEmail);
   	         	$errEmail       =  Model::isSpclChar($_POST['txtEmail']);
   	         	$lenEmail       =  Model::chkLength('max', $txtEmail, 100);

   	         	$txtPhone       =  htmlspecialchars($_POST['txtPhone'], ENT_QUOTES);
   	         	$errPhone       =  Model::isSpclChar($_POST['txtPhone']);
   	         	$lenPhone       =  Model::chkLength('max', $txtPhone, 10);

   	         	$selSector      =  $_POST['ddlSector'];
   	         	$selCourse      =  $_POST['ddlCourse'];
                        
                        $strCaptcha     = $_POST["txtCaptcha"];
                        

   	         	$txtDesc        =  htmlspecialchars($_POST['txtDesc'], ENT_QUOTES);
   	         	$blankDesc      =  Model::isBlank($txtDesc);
   	         	$errDesc        =  Model::isSpclChar($_POST['txtDesc']);
   	         	$lenDesc        =  Model::chkLength('max', $txtDesc, 1000);

   	         	$outMsg         =  '';
   	         	$flag           =  ($memberId != 0) ? 1 : 0;
   	         	$action         =  'A';
   	         	$errFlag        =   0;

   	         	//$recaptcha      = new \ReCaptcha\ReCaptcha(RE_CAPTHA_SCRTKEY);

   	        if(isset($_POST['txtCaptcha']) && !empty($_POST['txtCaptcha'])){


   	            //get verify response data
                   //$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

                    if ($_SESSION['captcha']==$strCaptcha)
                     {
                     	 if(($blankName > 0) || ($blankEmail > 0) || ($blankDesc > 0))
                     	 {
                     	 	    $errFlag  = 1;
                     	 	    $flag     = 1;
                     	 	    $outMsg   = "Mandatory field should not be left blank";
                     	 }
                     	else if(($errName > 0) || ($errEmail > 0) || ($errPhone > 0) || ($errDesc >0))
                     	 {
                     	 	    $errFlag  = 1;
                     	 	    $flag     = 1;
                     	 	    $outMsg   = "Special characters are not allowed";
                     	 }  
                     	else if(($lenName > 0) || ($lenEmail > 0) || ($lenPhone > 0) || ($lenDesc >0))
                     	 {
                     	 	    $errFlag  = 1;
                     	 	    $flag     = 1;
                     	 	    $outMsg   = "Length should not exceded maxlength";
                     	 } 

                     	 if($errFlag == 0  && $userId>0){
                     	 	 $result = $this->manageMember($action,0,$txtName,$txtEmail,$txtPhone,$selSector,$selCourse,$txtDesc,0,0,0,'0000-00-00');

                     	 	 if($result) {
                     	 	 	$outMsg = 'Thank you for your interest to become a member';
                                        
                                        //send mail to osda
                                        if(SEND_MAIL == "Y") {
                                                $strsubject         = "OSDA :: Become a Member ";
                                                //send mail to osda
                                                $strTo[]             = PORTAL_EMAIL;
                                                $strFrom           = $txtEmail;
                                                $MailMessage         = "Below are Details of Mr./Mrs. <strong>" . $txtName . "</strong></br>";
                                                $MailMessage        .= "<div>";
                                                $MailMessage        .= "<strong>Name &nbsp; &nbsp; &nbsp; : </strong>";
                                                $MailMessage        .= $txtName . "<br/>";
                                                $MailMessage        .= "<strong>Message : </strong>";
                                                $MailMessage        .= $txtDesc;
                                                $MailMessage        .= "</div>";    

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
                                                $strUserMessage      = "<strong>Thank you for your interest in becoming a member.</strong></br>";
                                                $strUserMessage      .= "<div> <br>";
                                                $strUserMessage      .= " We will get back to you soon.";
                                                $strUserMessage      .= "</div>";    

                                                $userdata['from']       = $strUserFrom;
                                                $userdata['to']         = $strUserTo;
                                                $userdata['name']       = 'Odisha Skill Development Authority';
                                                $userdata['sub']        = $strsubject;
                                                $userdata['message']    = $strUserMessage;
                                                $jsUserData             = json_encode($userdata);
                                                $mailUserRes            = $this->sendAuthMail($jsUserData);
                                        }
                                                                                
                                        
                     	 	 } else {
                     	 	 	 $errFlag  = 1;
                     	 	 	 $outMsg   = 'Error in operation please try again';
                     	 	 }
                     	 }
                        }	else {
		                     	$errFlag = 1;
		                        $outMsg  = "The captcha code is invalid ! Please try it again";
                             }
   	         	  } else {
	   	         		  $outMsg = 'Please enter captcha code.'; 
                                          $errFlag = 1;
   	         	       }
                         }else{
                                $outMsg     = 'Transaction failed due to session mismatch';
                                $errFlag    = 1;
                                $flag       = 1;
                            }         

   	         	     $strName    =  ($errFlag == 1) ? $txtName   : '';
   	         	     $strEmail   =  ($errFlag == 1) ? $txtEmail  : ''; 
   	         	     $strPhone   =  ($errFlag == 1) ? $txtPhone  : '';
   	         	     $intSector  =  ($errFlag == 1) ? $selSector :  0;
   	         	     $intCourse  =  ($errFlag == 1) ? $selCourse :  0;
   	         	     $strDesc    =  ($errFlag == 1) ? $txtDesc   : '';

   	         	     $arrResult  =  array('msg' => $outMsg, 'errFlag' => $errFlag, 'strName' => $strName, 'strEmail' => $strEmail, 'strPhone' => $strPhone, 'intSector' => $intSector, 'intCourse' => $intCourse, 'strDesc' => $strDesc);
   	         	     return $arrResult;
   	         }  

 //========= Function to read Member Details By :: Arpita Rath On :: 30-03-2017================//
               public function deleteMember($action, $ids) {
			        $ctr = 0;
			        $explIds = explode(',', $ids);
			        $delRec = 0;
			        foreach ($explIds as $indIds) {
			            $result = $this->manageMember('D',$explIds[$ctr],'','','',0,0,'',0,0,0,'0000-00-00');
			                   
			            if ($result)
			                $delRec++;
			            $ctr++;
			        }
			        if ($delRec > 0)
			            $outMsg = 'Selected Record(s) Deleted Successfully';
			        else
			            $outMsg = 'Operation Failed. Transaction Aborted';
			        return $outMsg;
			 }	         



   }
?>