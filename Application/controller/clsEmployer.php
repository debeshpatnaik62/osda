<?php



class clsEmployer extends Model {

    //Function to manage Employer
    
    public function manageEmployer($action,$arrConditions)
    { 
        try
        {

           $result = Model::callProc('USP_EMPLOYER',$action,$arrConditions);
           return $result;
//echo $result;exit;
        }//
        catch(Exception $e)
        {
           echo 'Error:'.$e->getMessage();
           exit();
        }
    }
    public function addUpdateEmployer($Id) {
        
        $userId  = isset($_SESSION['adminConsole_userID'])?$_SESSION['adminConsole_userID']:0;
        $Id             = (isset($Id))?$Id:0;

        $txtCompanyName           = $_POST['txtCompanyName'];

        $blankCompanyName = Model::isBlank($_POST['txtCompanyName']);

        $lenCompanyName   = Model::chkLength('max', $txtCompanyName,100);



        $txtName           = $_POST['txtNameEmp'];

        $blankName = Model::isBlank($_POST['txtNameEmp']);

        $lenName   = Model::chkLength('max', $txtName,60);


         $txtEmail           = $_POST['txtEmailEmp'];

        $blankEmail = Model::isBlank($_POST['txtEmailEmp']);

        $lenEmail   = Model::chkLength('max', $txtEmail,60);


         $txtMobile           = $_POST['txtMobileEmp'];

         $blankMobile = Model::isBlank($_POST['txtMobileEmp']);

         $lenMobile          = Model::chkLength('max', $txtMobile,10);
         $errMobile = preg_match('/^[6-9][0-9]{9}$/',$txtMobile);

         $txtDesignation          = $_POST['txtDesignation'];
         $lenDesignation          = Model::chkLength('max', $txtDesignation,50);

         $selSkills     =  $_POST['selSkills'];
        $txtSkills     =  (count($selSkills)>0)?implode('::',$selSkills):'';
//         $blankSkills   = (count($selSkills)>0)?0:1;
         //echo $selSkills;exit;

         $selCandidates   = $_POST['selCandidates'];
//         $blankCandidates = Model::isBlank($_POST['selCandidates']);



        $txtMessage             = htmlspecialchars($_POST['txtMessageEmp'], ENT_QUOTES);
       
        $pregMessage            = preg_replace('/\s+/', '', $_POST['txtMessageEmp']);
        $chkTags                = '<button,<form,<iframe,<input,<script,<select,<textarea,alert';
        $checkTagsStatus        = $this->checkHtmlTags($pregMessage, $chkTags); 
        $lenMessage             = Model::chkLength('max', $txtMessage,500); 
        
       $strCaptcha     = $_POST["txtCaptchaEmp"];
            
     
        $outMsg = '';
        $flag = ($Id != 0) ? 1 : 0;
        $action = ($Id == 0) ? 'A' : 'U';
        $errFlag = 0;

       $arrConditions=array('intId'=>$Id,
                                            'compname'=>$txtCompanyName,
                                            'name'=>$txtName,
                                            'mobile'=>$txtMobile,
                                            'email'=>$txtEmail,
                                            'desig'=>$txtDesignation,
                                            'skills'=>$txtSkills,
                                            'candidates'=>$selCandidates,
                                            'message'=>$txtMessage,
                                           'pubStatus'=>0,
                                            'userid'=>$userId);
       
 if(isset($_POST['txtCaptchaEmp']) && !empty($_POST['txtCaptchaEmp']))
 {
     
     if ($_SESSION['captcha']==$strCaptcha) {
              if ($blankCompanyName > 0) {
                      $errFlag = 1;
                      $outMsg = "Company Name should not be blank";
                 } else if ($blankName > 0) {
                      $errFlag = 1;
                      $outMsg = "Name should not be blank";
                 } else if ($blankEmail > 0) {
                      $errFlag = 1;
                      $outMsg = "Email should not be blank";
                  } else if($blankMobile>0){
                       $errFlag = 1;
                       $outMsg = "Mobile should not be blank";
                  
                  }else if ($checkTagsStatus > 0 || $checkTagsStatusO>0) {

                          $outMsg                 = "HTML Special Tags Are Not Allowed";
                          $errFlag                = 1;
                          $flag                   = 1;
                      } else if ($errMobile <1) {

                    $outMsg = "Enter Valid mobile number";
                    $errFlag = 1;
                    $flag = 1;
                }
                 
                    $arrCDConditions=array('intId'=>$Id,'name'=>$txtName);
          ///////////////
                    $dupResult = $this->manageEmployer('CD',$arrCDConditions);
                   // print_r( $dupResult);exit;
                      
                                  if ($dupResult) {
                                    $numRows = $dupResult->fetch_array();
                                    $pCount = count($numRows);
                                    if ($pCount > 0) {
                                        $outMsg = 'Employer Details with this name already exists';
                                        $errFlag = 1;
                                        $flag   = 1;
                                    }
                                  }
                                  
                                  if($errFlag == 0) {
                                      $result         = $this->manageEmployer($action,$arrConditions);
                                     if ($result) {
                                       
                                       if($_SESSION['lang']!='O')
                                      {
                                     $outMsg = ($action == 'A') ? 'Thank You for contacting us. We will get back to you with the information you asked for. ' : 'Employer Details updated successfully';
                                      }
                                      else
                                      {
                                      $outMsg = ($action == 'A') ? 'ଆମ ସହ ଯୋଗାଯୋଗ କରିଥିବାରୁ ଧନ୍ୟବାଦ। ଆପଣ ଜାଣିବାକୁ ଚାହୁଁଥିବା ପ୍ରସଙ୍ଗର ସମାଧାନ ସହ ଖୁବଶୀଘ୍ର ଫେରୁଛୁ ଆପଣଙ୍କ ନିକଟକୁ। ' : 'ଆମ ସହ ଯୋଗାଯୋଗ କରିଥିବାରୁ ଧନ୍ୟବାଦ। ଆପଣ ଜାଣିବାକୁ ଚାହୁଁଥିବା ପ୍ରସଙ୍ଗର ସମାଧାନ ସହ ଖୁବଶୀଘ୍ର ଫେରୁଛୁ ଆପଣଙ୍କ ନିକଟକୁ।';
                                      }
                                        

                                    //send mail to osda
                                      if(SEND_MAIL == "Y") {
                                              $strsubject         = "OSDA :: Contact : Employer from OSDA portal ";
                                           
                                              //$strTo[]             = PORTAL_EMAIL;
                                              $strTo       = array('rahul.saw@csm.co.in','dipti.barisal@csm.co.in');
                                              $strFrom             = SMTP_CONTACT_USER;//$txtEmail;
                                              $MailMessage         = "The Employer  Employer Details of Mr./Mrs. <strong>" . $txtName . "</strong> are below </br>";
                                              
                                              $MailMessage        .="<table cellspacing='0' cellpadding='2' border='0' bgcolor='#cccccc'>";
                                              $MailMessage        .="<tr bgcolor='#FFFFFF'>";
                                              $MailMessage        .= "<td>Company Name</td>";
                                              $MailMessage        .= "<td>: ".$txtCompanyName . "</td>";
                                              $MailMessage        .="</tr>";
                                              $MailMessage        .="<tr bgcolor='#FFFFFF'>";
                                              $MailMessage        .= "<td> Name</td>";
                                              $MailMessage        .= "<td>: ".$txtName . "</td>";
                                              $MailMessage        .="</tr>";
                                              $MailMessage        .="<tr bgcolor='#FFFFFF'>";
                                              $MailMessage        .= "<td>Company Email Id</td>";
                                              $MailMessage        .= "<td>: ".$txtEmail . "</td>";                                                
                                              $MailMessage        .="</tr>";
                                              if($txtMobile!=''){
                                                  $MailMessage        .="<tr bgcolor='#FFFFFF'>";
                                                  $MailMessage        .= "<td>Mobile No</td>";
                                                  $MailMessage        .= "<td>: ".$txtMobile . "</td>";   
                                                  $MailMessage        .="</tr>";
                                              }
                                              $MailMessage        .="<tr bgcolor='#FFFFFF'>";
                                              $MailMessage        .= "<td>Message </td>";
                                              $MailMessage        .= "<td>: ".$txtMessage. "</td>";   
                                              $MailMessage        .="</tr>";
                                              $MailMessage        .= "</table>"; 
                                                                               
                                              $data['from']       = $strFrom;
                                              $data['to']         = $strTo;

                                             // $data['cc']         = $totalCcMembers;

                                              $data['name']       = 'Odisha Skill Development Authority';
                                              $data['sub']        = $strsubject;
                                              $data['message']    = $MailMessage;
                                              $jsData             = json_encode($data);
                                              $mailRes            = $this->sendAuthMailContact($jsData);
                                             // print_r($mailRes);
                                              
                                              //mail to the user
                                              $strUserTo[]         = $txtEmail;
                                              $strUserFrom         = SMTP_CONTACT_USER;
                                              $strUserMessage      = "<strong>Thank you for sharing your Details.</strong></br>";
                                              $strUserMessage      .= "<div> <br>";
                                              $strUserMessage      .= "</div>";    
                                              $strUserMessage         .="<div><br><br>Best Regards,<br>Odisha Skill Development Authority<br>Government of Odisha</div>";   
                                            
                                              
                                              $userdata['from']       = $strUserFrom;
                                              $userdata['to']         = $strUserTo;
                                              $userdata['name']       = 'Odisha Skill Development Authority';
                                              $userdata['sub']        = $strsubject;
                                              $userdata['message']    = $strUserMessage;
                                              $jsUserData             = json_encode($userdata);
                                              $mailUserRes            = $this->sendAuthMailContact($jsUserData);
                         
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
        
                  $strCompanyName = ($errFlag == 1) ? htmlentities($txtCompanyName) : '';
                  $strName = ($errFlag == 1) ? htmlentities($txtName) : '';

                  $strMobile = ($errFlag == 1) ? htmlentities($txtMobile) : '';
                  $strEmail = ($errFlag == 1) ? htmlentities($txtEmail) : '';
                   $strDesignation= ($errFlag == 1) ? htmlentities($txtDesignation): '';
                   $strSkills = ($errFlag == 1) ? htmlentities($selSkills): '';
                 //  echo $selSkills;exit;
                   $strCandidates = ($errFlag == 1) ? htmlentities($selCandidates): '';
                  $strMessage = ($errFlag == 1) ? htmlentities($txtMessage) : '';

                  $arrResult = array('msg' => $outMsg, 'flag' => $errFlag,'returnParams' => $arrConditions);
                  return $arrResult;

        
}
   public function readEmployer($intId) {
          $arrConditions=array( 'Id'=>$intId);
        $result = $this->manageEmployer('R',$arrConditions);
        if ($result->num_rows > 0) {

            $row = $result->fetch_array();
            $strCompanyName = $row['vchCompanyName'];
            $strName = $row['vchName'];
            $strMobile = $row['vchMobile'];
            $strEmail = $row['vchEmail'];
            $strDesignation = $row['vchDesignation'];
            $strSkills = $row['vchSkills'];
            $strCandidates = $row['vchCandidates'];
            $strMessage = $row['vchMessage'];
             
        }

        $arrResult = array('strCompanyName' => $strCompanyName,'strName' => $strName,'strMobile' => $strMobile,'strEmail' => $strEmail,'strDesignation' => $strDesignation,'strSkills' => $strSkills,'strCandidates' => $strCandidates,'strImage' => $strImage,'strMessage' => $strMessage);
 
        return $arrResult;
    }
 // Function to Delete Employer Details 

    public function deleteEmployer($action, $ids) {

        $ctr = 0;
        $userId = $_SESSION['adminConsole_userID'];
        $explIds = explode(',', $ids);
        $delRec = 0;
        foreach ($explIds as $indIds) {

             $arrConditions=array( 'Id'=>$explIds[$ctr]
                                          /*  'userid'=>$userId*/);
            $result1 = $this->manageEmployer('R', $arrConditions);
 //print_r( $result1);exit;
            $row = $result1->fetch_array();
            
            $result = $this->manageEmployer($action, $arrConditions);
      //  print_r( $result);exit;
                $row = $result->fetch_array();
                if ($row[0] == 0)
                    $delRec++;
                $ctr++;
            }

        if ($action == 'D') {
            if ($delRec > 0)
                $outMsg .= 'Employer Detail(s) deleted successfully';
        }

        else if ($action == 'IN')
            $outMsg = 'Employer Detail(s) unpublished successfully';
        else if ($action == 'P')
            $outMsg = 'Employer Detail(s) published successfully';
        
        return $outMsg;
    }

}

?>