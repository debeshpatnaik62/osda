<?php
 /* * ****Class to manage Submited Query ********************
'By                     : Arpita Rath    '
'On                     : 31-03-2017       '
' Procedure Used        : USP_QUERY '
* ************************************************** */
    class clsQuery extends Model {
    	 //============ Function to manage Query ================//
    	        public function manageQuery($action,$queryId,$name,$email,$phone,$message,$intPgSize,$createdBy,$pubStatus,$frmDate,$toDate) {

                     $frmDate=($frmDate=='0000-00-00')?BLANK_DATE:$frmDate;
                    $toDate  =($toDate=='0000-00-00')?BLANK_DATE:$toDate;
                    
                    $querySql = "CALL USP_QUERY('$action',$queryId,'$name','$email','$phone','$message',$intPgSize,$createdBy,$pubStatus,'$frmDate','$toDate');";
                    //echo $querySql;exit;
                    
                    $errAction   =   Model::isSpclChar($action);
                    $errName     =   Model::isSpclChar($name);
                    $errEmail    =   Model::isSpclChar($email);
                    $errMsg      =   Model::isSpclChar($message);
                    $errPhone    =   Model::isSpclChar($phone);

                    $errFrmdt    =   Model::isSpclChar($frmDate);
                    $errTodate   =   Model::isSpclChar($toDate);

                    if($errAction > 0 || $errName > 0 || $errEmail > 0 || $errMsg > 0 || $errPhone>0 || $errFrmdt > 0 || $errTodate>0)
                        header("Location:" . APP_URL . "error");
                    else {
                        $queryResult = Model::executeQry($querySql);
                        return  $queryResult;
                    }      
    	        }
       //========= Function to add Query ========================//
              public function addQuery($action,$name,$email,$phone,$message,$captcha) {
                 
              	  $txtQueryName     =  htmlspecialchars($_POST['txtQueryName'], ENT_QUOTES);
              	  $blankName   =  Model::isBlank($txtQueryName);
              	  $errName     =  Model::isSpclChar($_POST['txtQueryName']);
              	  $lenName     =  Model::chkLength('max', $txtQueryName, 100);

              	  $txtQueryEmail    =  htmlspecialchars($_POST['txtQueryEmail'], ENT_QUOTES);
              	  $blankEmail  =  Model::isBlank($txtQueryEmail);
              	  $errEmail    =  Model::isSpclChar($_POST['txtQueryEmail']);
              	  $lenEmail    =  Model::chkLength('max', $txtQueryEmail, 50);

              	  $txtQueryPhone =  htmlspecialchars($_POST['txtQueryPhone'], ENT_QUOTES);
              	  $errPhone    =  Model::isSpclChar($_POST['txtQueryPhone']);
              	  $lenPhone    =  Model::chkLength('max', $txtQueryPhone, 10); 

              	  $txtQueryMsg =  htmlspecialchars($_POST['txtQueryMsg'], ENT_QUOTES);
              	  $blankMsg    =  Model::isBlank($txtQueryMsg);
              	  $errMsg      =  Model::isSpclChar($_POST['txtQueryMsg']);
              	  $lenMsg      =  Model::chkLength('max', $txtQueryMsg, 500);

              	  $outMsg      = '';
              	  $action      = 'A';
              	  $flag        = ($queryId != 0) ? 1 : 0;
              	  $errFlag     =  0;
              
                // require_once SITE_PATH. 'controller/autoload.php'; 
                // echo \ReCaptcha\ReCaptcha;exit;
              	// $recaptcha     = new \ReCaptcha\ReCaptcha(RE_CAPTHA_SCRTKEY);

              	  if(isset($captcha) && !empty($captcha)){

              	 //get verify response data
                      //$resp = $recaptcha->verify($_POST['recaptcha'], $_SERVER['REMOTE_ADDR']);

                      //if ($resp->isSuccess())
                    
                      if($_SESSION['captcha']==$captcha)
                      {
                      	 if(($blankName > 0) || ($blankEmail > 0) || ($blankMsg > 0))
                      	 {
                      	 	  $errFlag = 1;
                      	 	  $flag    = 1;
                      	 	  $outMsg  = "Mandatory fields should not be left blank";
                      	 }
                      	else if(($errName > 0) || ($errEmail > 0) || ($errPhone > 0) || ($errMsg > 0))
                      	 {
                      	 	  $errFlag = 1;
                      	 	  $flag    = 1;
                      	 	  $outMsg  = "Special characters are not allowed"; 
                      	 } 
                      	else if(($lenName > 0) || ($lenEmail > 0) || ($lenPhone > 0) || ($lenMsg > 0))
                      	 {
                      	 	  $errFlag = 1;
                      	 	  $flag    = 1;
                      	 	  $outMsg  = "Length should not exceed maxlength";
                      	 } 

                      	 if($errFlag == 0) {
                      	 	 $result = $this->manageQuery($action,0,$txtQueryName,$txtQueryEmail,$txtQueryPhone,$txtQueryMsg,0,0,0,'0000-00-00','0000-00-00');//print_r($result);exit;
                      	 	  if($result) {
                      	 	  	  $outMsg = 'Thank you for your query. We will get back to you soon';
                                          
                                          //send mail to osda
                                        if(SEND_MAIL == "Y") {
                                                $strsubject         = "OSDA :: Enquiry : User asked questions ";
                                                //send mail to osda
                                                //$strTo[]             = PORTAL_EMAIL;
                                                $strTo               = array('dipti.barisal@csm.co.in','rahul.saw@csm.co.in');
                                                $strFrom             = ENQUIRE_EMAIL;//$txtQueryEmail;
                                                $MailMessage         = "Details of the visitor's submitted query are below </br>";
                                               
                                                $MailMessage        .="<table cellspacing='0' cellpadding='2' border='0' bgcolor='#cccccc'>";
                                                $MailMessage        .="<tr bgcolor='#FFFFFF'>";
                                                $MailMessage        .= "<td>Name</td>";
                                                $MailMessage        .= "<td>: ".$txtQueryName . "</td>";
                                                $MailMessage        .="</tr>";
                                                $MailMessage        .="<tr bgcolor='#FFFFFF'>";
                                                $MailMessage        .= "<td>Email Id</td>";
                                                $MailMessage        .= "<td>: ".$txtQueryEmail . "</td>";                                                
                                                $MailMessage        .="</tr>";
                                                if($txtQueryPhone!=''){
                                                    $MailMessage        .="<tr bgcolor='#FFFFFF'>";
                                                    $MailMessage        .= "<td>Mobile No</td>";
                                                    $MailMessage        .= "<td>: ".$txtQueryPhone . "</td>";   
                                                    $MailMessage        .="</tr>";
                                                }
                                                $MailMessage        .="<tr bgcolor='#FFFFFF'>";
                                                $MailMessage        .= "<td>Query </td>";
                                                $MailMessage        .= "<td>: ".$txtQueryMsg. "</td>";   
                                                $MailMessage        .="</tr>";
                                                $MailMessage        .= "</table>";    

                                                $data['from']       = $strFrom;
                                                $data['to']         = $strTo;
                                                $data['name']       = 'Odisha Skill Development Authority';
                                                $data['sub']        = $strsubject;
                                                $data['message']    = $MailMessage;
                                                $jsData             = json_encode($data);
                                                $mailRes            = $this->sendAuthMailEnquire($jsData);
                                               // print_r($mailRes);
                                                
                                                 //mail to the user
                                                $strUserTo[]         = $txtQueryEmail;
                                                $strUserFrom         = ENQUIRE_EMAIL;
                                                $strUserMessage      = "<strong>Thank you for sharing your query with us.</strong></br>";
                                                $strUserMessage      .= "<div> <br>";
                                                $strUserMessage      .= " We will get back to you soon.";
                                                $strUserMessage      .= "</div>";     
                                                $strUserMessage       .="<div><br><br>Best Regards,<br>Odisha Skill Development Authority<br>Government of Odisha</div>";
                                                
                                                $userdata['from']       = $strUserFrom;
                                                $userdata['to']         = $strUserTo;
                                                $userdata['name']       = 'Odisha Skill Development Authority';
                                                $userdata['sub']        = $strsubject;
                                                $userdata['message']    = $strUserMessage;
                                                $jsUserData             = json_encode($userdata);
                                                $mailUserRes            = $this->sendAuthMailEnquire($jsUserData);
                                             
                                        }
                                    echo        
                                          
                                        $_SESSION["captcha"] ='';      
                                      
                                          
                      	 	  } else {
                      	 	  	 $errFlag = 1;
                                 $outMsg  = 'Error in opertaion please try again';
                      	 	  }
                      	 }
                      } else {
                      	  $errFlag = 1;
                          $outMsg  = "The captcha code is invalid ! Please try it again";
                      }
              	  } else {
	                   // $outMsg = 'Please click on the reCAPTCHA box.'; 
                            $outMsg = 'Please enter captcha code.';
	                    $errFlag = 1;
                  } 
                    $arrResult = array('msg' => $outMsg, 'errFlag' => $errFlag);
                      return  $arrResult;
              } 

    //============ Function to delete Query ===================//
          public function deleteQuery($action, $ids) {
             $newSessionId           = session_id();
            $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
            if($newSessionId == $hdnPrevSessionId) {   
              
		        $ctr = 0;
		        $explIds = explode(',', $ids);
		        $delRec = 0;
		        foreach ($explIds as $indIds) {
		            $result = $this->manageQuery('D',$explIds[$ctr],'','','','',0,0,0,'0000-00-00','0000-00-00');
		            if ($result)
		                $delRec++;
		            $ctr++;
		        }
		        if ($delRec > 0)
		            $outMsg = 'Selected Record(s) Deleted Successfully';
		        else
		            $outMsg = 'Operation Failed. Transaction Aborted';
		        return $outMsg;
                 }else{
                header("Location:".APP_URL."error");
                } 
	}     

  }
?>