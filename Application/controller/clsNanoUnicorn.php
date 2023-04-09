<?php
 /* * ****Class to manage Submited Nano Unicorn ********************
'By                     :T Ketaki Debadarshini   '
'On                     : 04-01-2017       '
' Procedure Used        : USP_NANO_UNICORN '
* ************************************************** */
    class clsNanoUnicorn extends Model {
    	 //============ Function to manage Unicorn ================//
    	        public function manageNanoUnicorn($action,$nanoId,$name,$districtId,$phone,$strBusiness,$intPgSize,$createdBy,$pubStatus,$frmDate,$toDate,$intTrainStatus,$dob,$intAge) {
                    
                      $frmDate=($frmDate=='0000-00-00')?BLANK_DATE:$frmDate;
                      $toDate  =($toDate=='0000-00-00')?BLANK_DATE:$toDate;
                      $dob  =($dob=='0000-00-00')?BLANK_DATE:$dob;
                      
                    
                    $querySql = "CALL USP_NANO_UNICORN('$action',$nanoId,'$name',$districtId,'$phone','$strBusiness',$intPgSize,$createdBy,$pubStatus,'$frmDate','$toDate',$intTrainStatus,'$dob',$intAge);";
                  //echo $querySql; exit;
                    $errAction   =   Model::isSpclChar($action);
                    $errName     =   Model::isSpclChar($name);
                    $errDist     =   Model::isSpclChar($districtId);
                    $errMsg      =   Model::isSpclChar($strBusiness);
                    $errPhone    =   Model::isSpclChar($phone);

                    $errFrmdt    =   Model::isSpclChar($frmDate);
                    $errTodate   =   Model::isSpclChar($toDate);
                    $errDOB      =   Model::isSpclChar($dob);
                    $errAge      =   Model::isSpclChar($intAge);
                    $errStatus   =   Model::isSpclChar($intTrainStatus);

                    if($errAction > 0 || $errName > 0 || $errDist > 0 || $errMsg > 0 || $errPhone>0 || $errFrmdt > 0 || $errTodate>0 || $errDOB>0 || $errAge>0 || $errStatus>0)
                        header("Location:" . APP_URL . "error");
                    else {
                        $queryResult = Model::executeQry($querySql);
                        return  $queryResult;
                    }      
    	        }
                
       //========= Function to add Query ========================//
              public function addNanoUnicorn($intNanoId) {
                 
              	  $txtName          =  htmlspecialchars($_POST['txtName'], ENT_QUOTES);
                 // print_r($txtName);exit;
              	  $blankName        =  Model::isBlank($txtName);
              	  $errName          =  Model::isSpclChar($_POST['txtName']);
              	  $lenName          =  Model::chkLength('max', $txtName, 100);

              	  $selDistrict      =  htmlspecialchars($_POST['selDistrict'], ENT_QUOTES);
              	 // $blankEmail       =  Model::isBlank($selDistrict);
              	 // $errEmail         =  Model::isSpclChar($_POST['selDistrict']);
              	 //  $lenDist         =  Model::chkLength('max', $selDistrict, 9);

              	  $txtPhone         =  htmlspecialchars($_POST['txtPhone'], ENT_QUOTES);
              	  $errPhone         =  Model::isSpclChar($_POST['txtPhone']);
              	  $lenPhone         =  Model::chkLength('max', $txtPhone, 10); 
               //   print_r($txtPhone);exit;
              	  $txtBusiness      =  htmlspecialchars($_POST['txtBusiness'], ENT_QUOTES);
              	  $blankMsg         =  Model::isBlank($txtBusiness);
              	  $errMsg           =  Model::isSpclChar($_POST['txtBusiness']);
              	  $lenMsg           =  Model::chkLength('max', $txtBusiness, 1000);
                  
                  $strDOB           = (!empty($_POST['txtDOB']))?date('Y-m-d',strtotime($_POST['txtDOB'])):'0000-00-00';
                  //$errDOB           = (strtotime($strDOB)>time())?1:0;
               //   print_r($strDOB);exit;
                  $intAge           = date_diff(date_create($strDOB), date_create('today'))->y;
                
                  $validAge         = ($intAge<=40)?0:1;
                 
                  $inttrainStatus   =  $_POST['radCourseType'];
                  $blankStatus      =  Model::isBlank($inttrainStatus);

                  $intInstitute     =  (!empty($_POST['selITI']))?$_POST['selITI']:$_POST['selCenter'];
                  $blankInstitute   =  Model::isBlank($intInstitute);

                  $intTrade         =  $_POST['selCourse'];
                  $blankTrade       =  Model::isBlank($intTrade);
              	  $outMsg      = '';
              	  $action      = 'A';
              	  $flag        = ($intNanoId != 0) ? 1 : 0;
              	  $errFlag     =  0;
                   $strCaptcha     = $_POST["txtNanoCaptcha"];

              	  if(isset($_POST['txtNanoCaptcha']) && !empty($_POST['txtNanoCaptcha'])){
                     // echo $_POST['txtNanoCaptcha'].' aa'.$_SESSION['captcha'];
                     
                      if($_SESSION['captcha']==$strCaptcha)
                      {
                      	 if(($blankName > 0) || ($selDistrict == 0) || ($blankMsg > 0) || ($blankStatus > 0) || ($blankTrade > 0) || ($blankInstitute > 0))
                      	 {
                      	 	  $errFlag = 1;
                      	 	  $flag    = 1;
                      	 	  $outMsg  = "Mandatory fields should not be left blank";
                      	 }
                      	else if(($errName > 0) || ($errPhone > 0) || ($errMsg > 0))
                      	 {
                      	 	  $errFlag = 1;
                      	 	  $flag    = 1;
                      	 	  $outMsg  = "Special characters are not allowed"; 
                      	 } 
                      	else if(($lenName > 0) || ($lenEmail > 0) || ($lenPhone > 0))
                      	 {
                      	 	  $errFlag = 1;
                      	 	  $flag    = 1;
                      	 	  $outMsg  = "Length should not exceed maxlength";
                      	 }else if($validAge>0){
                             
                                $errFlag = 1;
                                $flag    = 1;
                      	 	$outMsg  = "Age should not more than 40 years";
                             
                         } 

                      	 if($errFlag == 0) {
                      	 	 $result = $this->manageNanoUnicorn($action,0,$txtName,$selDistrict,$txtPhone,$txtBusiness,0,$intInstitute,$intTrade,'0000-00-00','0000-00-00',$inttrainStatus,$strDOB,$intAge);//print_r($result);exit;
                      	 	  if($result) {
                                if($_SESSION['lang']!='O')
                                      {
                                     $outMsg = 'Thank you for your details. We will get back to you soon';
                                      }
                                      else
                                      {
                                      $outMsg = 'ଆପଣଙ୍କର ସବିଶେଷ ବିବରଣୀ ପ୍ରଦାନ କରିଥିବାରୁ ଧନ୍ୟବାଦ। ଆମେ ଖୁବ ଶୀଘ୍ର ଯୋଗାଯୋଗ କରିବୁ।';
                                      }
                                      
                      	 	  	  
                                           $numRow     = $result-> fetch_array();
                                           $strDistrict = $numRow[0]; 
                                          //send mail to osda
                                        if(SEND_MAIL == "Y") {
                                                $strsubject         = "OSDA :: Nano Unicorn Registration ";
                                                //send mail to osda
                                               // $strTo               = array('gitanjali.osda@gmail.com','pinaki.patnaik@gov.in','rajeshpatilias@gmail.com');
                                               //$strTo               = array('t.debadarshini@csmpl.com','ashishkumar.patra20@gmail.com');
                                                $strTo       = array('rahul.saw@csm.co.in','dipti.barisal@csm.co.in');
                                                $strFrom             = SMTP_NANO_USER;
                                                $MailMessage         = "Details of Nano Unicorn Registration </br>";
                                               
                                                $MailMessage        .="<table cellspacing='0' cellpadding='2' border='0' bgcolor='#cccccc'>";
                                                $MailMessage        .="<tr bgcolor='#FFFFFF'>";
                                                $MailMessage        .= "<td>Name</td>";
                                                $MailMessage        .= "<td>: ".$txtName . "</td>";
                                                $MailMessage        .="</tr>";
                                                $MailMessage        .="<tr bgcolor='#FFFFFF'>";
                                                $MailMessage        .= "<td>District</td>";
                                                $MailMessage        .= "<td>: ".$strDistrict . "</td>";                                                
                                                $MailMessage        .="</tr>";
                                               
                                                $MailMessage        .="<tr bgcolor='#FFFFFF'>";
                                                $MailMessage        .= "<td>Mobile No</td>";
                                                $MailMessage        .= "<td>: ".$txtPhone . "</td>";   
                                                $MailMessage        .="</tr>";
                                               
                                                /*$MailMessage        .="<tr bgcolor='#FFFFFF'>";
                                                $MailMessage        .= "<td>Mobile No</td>";
                                                $MailMessage        .= "<td>: ".$txtPhone . "</td>";   
                                                $MailMessage        .="</tr>";*/
                                                
                                                $MailMessage        .="<tr bgcolor='#FFFFFF'>";
                                                $MailMessage        .= "<td>Age</td>";
                                                $MailMessage        .= "<td>: ".$intAge. "</td>";   
                                                $MailMessage        .="</tr>";
                                                $MailMessage        .= "</table>";
                                                
                                               // $MailMessage        .="<tr bgcolor='#FFFFFF'>";
                                               // $MailMessage        .= "<td>Any Training at ITI under PMKVY, DDU-GKY ,OSEM approved short-term trainings or any technical Diploma courses</td>";
                                                //$MailMessage        .= "<td>: ".$intAge. "</td>";   
                                                //$MailMessage        .="</tr>";
                                                $MailMessage        .= "</table>";

                                                $data['from']       = $strFrom;
                                                $data['to']         = $strTo;
                                                $data['name']       = 'Odisha Skill Development Authority';
                                                $data['sub']        = $strsubject;
                                                $data['message']    = $MailMessage;
                                                $jsData             = json_encode($data);
                                                $mailRes            = $this->sendAuthMailNanoUnicorn($jsData);
                                               // print_r($mailRes);
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
              	  } else {
	                   // $outMsg = 'Please click on the reCAPTCHA box.'; 
                            $outMsg = 'Please enter captcha code.';
	                    $errFlag = 1;
                  } 
                    $arrResult = array('msg' => $outMsg, 'errFlag' => $errFlag, 'txtName' => $txtName, 'selDistrict' => $selDistrict,'txtPhone' => $txtPhone, 'txtBusiness' => $txtBusiness,'strDOB'=>$strDOB,'isTrainStatus'=>$inttrainStatus,'intInstitute'=>$intInstitute,'intTrade'=>$intTrade);
                      return  $arrResult;
              } 

    //============ Function to delete Query ===================//
          public function deleteNanoUnicorn($action, $ids) {
             $newSessionId           = session_id();
            $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
            if($newSessionId == $hdnPrevSessionId) {   
              
		        $ctr = 0;
		        $explIds = explode(',', $ids);
		        $delRec = 0;
		        foreach ($explIds as $indIds) {
		            $result = $this->manageNanoUnicorn('D',$explIds[$ctr],'',0,'','',0,0,0,'0000-00-00','0000-00-00',0,'0000-00-00',0);
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
    
    /*==========Manage Nano Unicorn Details============*/
    /*=================================================*/
        
     //Function to manage Nano unicorn Details 
    
    public function manageNanoUnicornDetail($action,$arrConditions)
    { 
        try
        {

           $result = Model::callProc('USP_NANO_UNICORN_DETAILS',$action,$arrConditions);
           return $result;
        //echo $result;exit;
        }//
        catch(Exception $e)
        {
           echo 'Error:'.$e->getMessage();
           exit();
        }
    }
    
    //Function to Add addUpdate Philosophy 
    public function addUpdateNanoUnicornDetails($naoUnicornId) {

        $userId             = $_SESSION['adminConsole_userID'];
        $naoUnicornId       = (isset($naoUnicornId))?$naoUnicornId:0;

        $vchTitle           = htmlspecialchars($_POST['vchTitle'],ENT_QUOTES);
        $blankTitle         = Model::isBlank($_POST['vchTitle']);
        $lenTitle           = Model::chkLength('max', $vchTitle,100);
        $vchTitleO          = htmlspecialchars($_POST['vchTitleO'],ENT_QUOTES,'UTF-8');
        $lenTitleO          = Model::chkLength('max', $vchTitleO,160);
        
        //$blankvchImage      = Model::isBlank($_FILES['vchImage']['name']);
        $vchImage           = $_FILES['vchImage']['name'];
        $prevImage          = $_POST['hdnImage'];
        $vchImageSize       = $_FILES['vchImage']['size'];
        $vchImageTemp       = $_FILES['vchImage']['tmp_name'];
        $ext                = pathinfo($vchImage, PATHINFO_EXTENSION);
        
        $vchImage           = ($vchImage != '') ? 'NU' . date("Ymd_His") . '.' . $ext : '';

        $vchAudio           = $_FILES['vchAudio']['name'];
        $prevAudio          = $_POST['hdnAudio'];
        $vchAudioSize       = $_FILES['vchAudio']['size'];
        $vchAudioTemp       = $_FILES['vchAudio']['tmp_name'];
        $extAudio           = pathinfo($vchAudio, PATHINFO_EXTENSION);
//echo $vchAudio."==".$vchAudioTemp."===".$extAudio;exit;
        $vchAudio           = ($vchAudio != '') ? 'NUA' . date("Ymd_His") . '.' . $extAudio : '';

        $allowMimeType      = array('image/png','image/jpg','image/gif','image/jpeg','audio/mp3','audio/mpeg');
        $allowMimeTypeAudio = array('audio/mpeg');
        $errImageType       = $this->check_file_mime( $vchImageTemp ,$allowMimeType);

        $errAudioType       = $this->check_file_mime( $vchAudioTemp ,$allowMimeTypeAudio);
       $vchDescription            = $_POST['vchDescription'];
       $vchDescription            = htmlspecialchars(addslashes($_POST['vchDescription']), ENT_QUOTES);
       $pregDescription           = preg_replace('/\s+/', '', $_POST['vchDescription']);
       //$chkTags                   = '<button,<form,<iframe,<input,<script,<select,<textarea,alert,prompt';
       $checkTagsStatus           = $this->isSpclTags($pregDescription);


       $blankDescription          = Model::isBlank($_POST['vchDescription']);

       $vchDescriptionO           = $_POST['vchDescriptionO'];
       $pregDescriptionO           = preg_replace('/\s+/', '', $_POST['txtDescriptionO']);
       $checkTagsStatusO           = $this->isSpclTags($pregDescriptionO);
       $vchDescriptionO           = htmlspecialchars(addslashes($_POST['vchDescriptionO']), ENT_QUOTES);
       $blankDescriptionO         = Model::isBlank($_POST['vchDescriptionO']);
       
        $outMsg = '';
        $flag = ($naoUnicornId != 0) ? 1 : 0;
        $action = ($naoUnicornId == 0) ? 'A' : 'U';
        $errFlag = 0;

        if ($vchImage == '' && $naoUnicornId != 0)
            $vchImage = $prevImage;
        if ($vchAudio == '' && $naoUnicornId != 0)
            $vchAudio = $prevAudio;  
            //echo $prevImage."====".$vchImage;exit;

       if ($blankTitle > 0) {
            $errFlag = 1;
            $outMsg = "Name should not be blank";
        }else if ($vchImage > 0) {
            $errFlag = 1;
            $outMsg = "Image should not be blank";
        }else if ($vchDescription > 0) {
            $errFlag = 1;
            $outMsg = "Description should not be blank";
        } else if ($checkTagsStatus > 0 || $checkTagsStatusO>0) {

            $outMsg                 = "HTML Special Tags Are Not Allowed";
            $errFlag                = 1;
        } /*else if ($errAudioType > 0) {
            $errFlag = 1;
            $outMsg = "Invalid file type. Upload .mp3/.mpeg file only"; 
        }*/
       
      else
      {
        $arrConditions=array('intNanoUnicornId'=>$naoUnicornId,
                                            'title'=>$vchTitle,
                                            'titleO'=>$vchTitleO,
                                           'image'=>$vchImage,
                                           'audio'=>$vchAudio,
                                           'desc'=>$vchDescription,
                                           'descO'=>$vchDescriptionO,
                                           'pubStatus'=>0,
                                           'userid'=>$userId);
                //print_r($arrConditions); exit;
          $arrCDConditions=array('intId'=>$naoUnicornId,'title'=>$vchTitle);
          $dupResult = $this->manageNanoUnicornDetail('CD',$arrCDConditions);
         
            
              if ($dupResult) {
                $numRows = $dupResult->fetch_array();
                $pCount = count($numRows);
                if ($pCount > 0) {
                    $outMsg = 'Nano Unicorn with this name already exists';
                    $errFlag = 1;
                    $flag   = 1;
                } else {

               $result         = $this->manageNanoUnicornDetail($action,$arrConditions);
                    if ($result) {
                        $outMsg = ($action == 'A') ? 'Nano Unicorn added successfully ' : 'Nano Unicorn updated successfully';
                        if ($vchImageTemp != '') {
                            
                            if (file_exists(APP_PATH."uploadDocuments/NanoUnicorn/" . $prevImage) && $prevImage != '' && $vchImage != '') {
                                unlink(APP_PATH."uploadDocuments/NanoUnicorn/" . $prevImage);
                            }                          
                          
                            $this->GetResizeImage($this,APP_PATH . 'uploadDocuments/NanoUnicorn/', 400, 210, $vchImage, $vchImageTemp);
                        }
                        if($vchAudio!='') {
                                    move_uploaded_file($vchAudioTemp, APP_PATH . 'uploadDocuments/NanoUnicorn/' . $vchAudio);
                                }
                    }
                
                 }
        }
      }
        $strTitle = ($errFlag == 1) ? htmlentities($vchTitle) : '';
        $strTitleO = ($errFlag == 1) ? htmlentities($vchTitleO) : '';
        $strImage = ($errFlag == 1) ? htmlentities($vchImage) : '';
        $strAudio = ($errFlag == 1) ? htmlentities($vchAudio) : '';
        $strDescription = ($errFlag == 1) ? htmlentities($vchDescription) : '';
        $strDescriptionO = ($errFlag == 1) ? htmlentities($vchDescriptionO) : '';

        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag,'returnParams' => $arrConditions);
        return $arrResult;
       
}
    //Function to Read Philosophy 

    public function readNanoUnicornDetails($intNanoUnicornId) {
          $arrConditions=array( 'Id'=>$intNanoUnicornId);
        $result = $this->manageNanoUnicornDetail('R',$arrConditions);
        if ($result->num_rows > 0) {

            $row      = $result->fetch_array();
            $strTitle = $row['vchName'];
            $strTitleO= $row['vchNameO'];
            $strImage =  $row['vchImage'];
            $strAudio =  $row['vchAudio'];   
            $strDescription = htmlspecialchars_decode(stripslashes($row['vchDescription']),ENT_QUOTES);
            $strDescriptionO = $row['vchDescriptionO'];
        }

        $arrResult = array('strTitle' => $strTitle,'strTitleO' => $strTitleO,'strImage' => $strImage,'strAudio' =>$strAudio, 'strDescription' => $strDescription,'strDescriptionO'=>$strDescriptionO);
 
        return $arrResult;
    }


    // Function to Delete Philosophy 

    public function deleteNanoUnicornDetail($action, $ids) {

        $ctr = 0;
        $userId = $_SESSION['adminConsole_userID'];
        $explIds = explode(',', $ids);
        $delRec = 0;
        foreach ($explIds as $indIds) {

             $arrConditions=array( 'Id'=>$explIds[$ctr]
                                          /*  'userid'=>$userId*/);
            $result1 = $this->manageNanoUnicornDetail('R', $arrConditions);
            //print_r( $result1);exit;
            $row = $result1->fetch_array();
            $strImage= $row['vchImage'];

            $result = $this->manageNanoUnicornDetail($action, $arrConditions);
            //  print_r( $result);exit;
            $row = $result->fetch_array();
                if ($row[0] == 0)
                    $delRec++;
                    $ctr++;
            }

            if ($action == 'D' && $strImage != '') 
            {
                if (file_exists("uploadDocuments/Philosophy/" . $strImage)) {
                    unlink("uploadDocuments/Philosophy/" . $strImage);
                }
            }
        

        if ($action == 'D') {
            if ($delRec > 0)
                $outMsg .= 'Nano Unicorn Record(s) deleted successfully';
        }

        else if ($action == 'IN')
            $outMsg = 'Nano Unicorn Record(s) unpublished successfully';
        else if ($action == 'P')
            $outMsg = 'Nano Unicorn Record(s) published successfully';
        
        return $outMsg;
    }
        
        

  }
?>