<?php

 /* * ****Class to manage  Forum Topic Details ********************
    'By                     : T Ketaki Debadarshini	'
    'On                     : 27-Oct-2015       '
    ' Procedure Used        : USP_FORUM_TOPICS       '
    * ************************************************** */

    class clsTopic extends Model {

        // Function To Manage Topics By::T Ketaki Debadarshini   :: On:: 27-Oct-2015
        public function manageTopic($action, $topicId, $strTopicName,$strTopicNameO,$strDescription,$strDescriptionO,$strIcon,$intSnippetO,$intSnippet,$pubStatus,$intArchiveStatus ,$createdBy,$name,$nameO,$strDtFrom,$strDtTo) {
            $topicSql = "CALL USP_FORUM_TOPICS('$action',$topicId,'$strTopicName','$strTopicNameO','$strDescription','$strDescriptionO','$strIcon','$intSnippetO','$intSnippet',$pubStatus,$intArchiveStatus,$createdBy,'$name','$nameO','$strDtFrom','$strDtTo',@OUT);";
           // echo $topicSql;
            $errAction          = Model::isSpclChar($action);
            $errTopic           = Model::isSpclChar($strTopicName);
           // $errTopicO          = Model::isSpclChar($strTopicNameO);
            $errDescription     = Model::isSpclChar($strDescription);
           // $errDescriptionO    = Model::isSpclChar($strDescriptionO);
            
            $errId              = Model::isSpclChar($topicId);
            $errIcon            = Model::isSpclChar($strIcon);
            $errSnippet         = Model::isSpclChar($intSnippet);
            $errName            = Model::isSpclChar($name);
            $errDtfrm           = Model::isSpclChar($strDtFrom);
            $errDtto            = Model::isSpclChar($strDtTo);

            if ($errAction > 0 || $errTopic > 0 || $errId > 0 || $errIcon > 0 || $errSnippet > 0 || $errName > 0 || $errDtfrm > 0 || $errDtto > 0){
                header("Location:" . APP_URL . "error");
            }else {
                $topicResult = Model::executeQry($topicSql);
                
                return $topicResult;
            }
        }

    // Function To Add Upadate Topics By::T Ketaki Debadarshini   :: On:: 27-Oct-2015
        public function addUpdateTopic($topicId) {
        $newSessionId           = session_id();
        $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
        if($newSessionId == $hdnPrevSessionId){ 
            $userId                 = $_SESSION['adminConsole_userID'];
            $topicId                = ($topicId != '') ? $topicId : 0;
            $txtTopic               = htmlspecialchars(addslashes($_POST['txtTopic']), ENT_QUOTES);
            $blankTopic             = Model::isBlank($_POST['txtTopic']);
            $errTopic               = Model::isSpclChar($_POST['txtTopic']);
            $lenTopic               = Model::chkLength('max', $txtTopic,100);

            $txtSnippet             = htmlspecialchars(addslashes($_POST['txtSnippet']), ENT_QUOTES);
            $txtSnippetO            = htmlspecialchars($_POST['txtSnippetO'], ENT_QUOTES, 'UTF-8');
            $errClass               = Model::isSpclChar($_POST['txtSnippet']);

            $txtName                = htmlspecialchars_decode($_POST['txtName'], ENT_QUOTES);
            $blankName              = Model::isBlank($txtName);
            $errName                = Model::isSpclChar($_POST['txtName']);
            $lenName                = Model::chkLength('max', $txtName, 80);

            $txtNameO               = htmlspecialchars($_POST['txtNameO'], ENT_QUOTES, 'UTF-8');  
            $lenNameO               = Model::chkLength('max', $txtNameO, 100);
            
            $txtTopicO              = htmlspecialchars($_POST['txtTopicO'], ENT_QUOTES, 'UTF-8');
            $errTopicO              = Model::isSpclChar($txtTopicO);
           
            $fileDocumentnm         = $_FILES['fileDocument']['name'];
            $prevFile               = $_POST['hdnImageFile'];
            $fileSize               = $_FILES['fileDocument']['size'];
            $fileTemp               = $_FILES['fileDocument']['tmp_name'];
            $ext                    = pathinfo($fileDocumentnm , PATHINFO_EXTENSION);
            $fileDocument           = ($fileDocumentnm != '') ? 'Topic' . date("Ymd_His") . '.' . $ext : ''; 
            $fileMimetype           = mime_content_type($fileTemp);
            
            $txtPublishedDate       = ($_POST['txtPublishedDate']!='')?model::dbDateFormat($_POST['txtPublishedDate']):'0000-00-00';

            $txtDescription         = htmlspecialchars(addslashes($_POST['txtDetailsE']), ENT_QUOTES);
            $pregDescription        = preg_replace('/\s+/', '', $_POST['txtDetailsE']);
            $chkTags                = '<button,<form,<iframe,<input,<script,<select,<textarea,alert';
            $checkTagsStatus        = $this->checkHtmlTags($pregDescription, $chkTags); 
            
            $txtDescriptionO        = urlencode($_POST['txtDetailsO']);
            $pregDescriptionH       = preg_replace('/\s+/', '', $_POST['txtDetailsO']);
            $chkTagsH               = '<button,<form,<iframe,<input,<script,<select,<textarea,alert';
            $checkTagsStatusH       = $this->checkHtmlTags($pregDescriptionH, $chkTagsH); 
            
            $radStatus              = $_POST['radStatus'];
            $intSlno                = $_POST['hdnSLNo'];
            $outMsg                 = '';
            $flag                   = ($topicId != 0) ? 1 : 0;
            $action                 = ($topicId == 0) ? 'A' : 'U';
            $errFlag                = 0 ;
            if(($blankTopic >0) || ($blankName > 0))
            {
                    $errFlag		= 1;
                    $outMsg		= "Mandatory Fields should not be blank";
            }
            else if(($lenTopic>0) || ($lenName > 0) || ($lenNameO > 0))
            {
                    $errFlag		= 1;
                    $outMsg		= "Length should not excided maxlength";
            }
            else if(($errTopic>0) || ($errDescription>0)|| ($errClass>0) || ($errName > 0) )
            {
                    $errFlag		= 1;
                    $outMsg		= "Special Characters are not allowed";
            }else if($fileMimetype!='image/gif' && $fileMimetype!='image/jpeg' && $fileMimetype!='image/jpg' && $fileDocumentnm!='') {
                $errFlag               = 1;
                $flag                  = 1;
                $outMsg                = 'Invalid file types. Upload only jpg,jpeg,gif';
            }
           else if ($fileSize > SIZE1MB) {
                $errFlag               = 1;
                $flag                  = 1;
                $outMsg                = 'File size can not more than 1 MB';
            }else if ($checkTagsStatus > 0 || $checkTagsStatusH > 0) {

                $outMsg                 = "HTML Special Tags Are Not Allowed";
                $errFlag                = 1;
                $flag                   = 1;
            }
            
                 
             if ($fileDocument == '' && $topicId != 0)
                 $fileDocument = $prevFile;
 
          if($errFlag==0 && $userId>0){
               $dupResult = $this->manageTopic('CD',$topicId,$txtTopic,'','','','','','',0,0,0,'','','0000-00-00','0000-00-00');
             
            if ($dupResult) {
                $numRows = $dupResult->fetch_array();
                if ($numRows > 0) {
                    $outMsg = 'Biswa Bijayee details with this headline already exists';
                    $errFlag = 1;
                } else {
                       $result = $this->manageTopic($action, $topicId, $txtTopic,$txtTopicO,$txtDescription,$txtDescriptionO,$fileDocument,$txtSnippetO,$txtSnippet,$radStatus,0,$userId,$txtName,$txtNameO,$txtPublishedDate,'0000-00-00');
                   
                    if ($result){
                        $outMsg = ($action == 'A') ? 'Biswa Bijayee Details added successfully ' : 'Biswa Bijayee Details updated successfully';
                   
                         if ($fileDocument != '') {
                            if (file_exists("uploadDocuments/forumTopics/" . $prevFile) && $prevFile != '' && $fileDocumentnm != '') {
                                  unlink("uploadDocuments/forumTopics/".$prevFile);   
                            }
                           
                             if($fileDocumentnm != '') 
                                 $this->GetResizeImage($this,'uploadDocuments/forumTopics/',316,0,$fileDocument,$fileTemp);
                        }
                      }
                    }
                }
          }
           
        }else{
            header("Location:".APP_URL."error");
        }  
            $arrResult = array('msg' => $outMsg, 'flag' => $flag);
            return $arrResult;
        }
        
      // Function To get topic serial no By::T Ketaki Debadarshini   :: On::27-Oct-2015    
        function getTopicSlNo()
        {
                $maxSLResult	= $this->manageTopic('CM',0,'','','','','',0,'',0,0,'','','0000-00-00','0000-00-00');
                $maxSLRow	= mysqli_fetch_array($maxSLResult);
                $maxSlNo	= ($maxSLRow['MAX_SL']>0)?$maxSLRow['MAX_SL']:1;
                return $maxSlNo;
        } 
        
    // Function To read Topic details  By::T Ketaki Debadarshini   :: On:: 27-Oct-2015
        public function readTopic($id) {

            $result = $this->manageTopic('R',$id,'','','','','','','',0,0,0,'','','0000-00-00','0000-00-00');
            if (mysqli_num_rows($result) > 0) {

                $row                = mysqli_fetch_array($result);
                //$topicId            = $row['INT_TOPIC_ID'];
                $strTopic           = htmlspecialchars_decode($row['VCH_TOPIC_NAME'],ENT_QUOTES);
                $strTopicO          = htmlspecialchars_decode($row['VCH_TOPIC_NAME_O'],ENT_QUOTES);
                $strName            = htmlspecialchars_decode($row['VCH_NAME'], ENT_QUOTES);
                $strNameO           = $row['VCH_NAME_O'];
                $strFileName        = $row['VCH_TOPIC_ICON'];
                $intTopicid         = $row['INT_TOPIC_ID'];
                $strDescription     = htmlspecialchars_decode($row['VCH_DESCRIPTION'],ENT_QUOTES);
                $strDescriptionO    = urldecode($row['VCH_DESCRIPTION_O']);
                $intStatus          = $row['INT_PUBLISH_STATUS'];  
                $intSlno            = $row['INT_SLNO'];  
                $strSnippetO        = $row['VCH_SNIPPET_O'];  
                $strSnippet         = htmlspecialchars_decode($row['VCH_SNIPPET'],ENT_QUOTES);
                
                $strPublishDate         = date ('d-m-Y',strtotime($row['DTM_PUBLISHED_ON'])); 
                if($strPublishDate=='01-01-1970' || $strPublishDate=='' || strtotime($strPublishDate)<=0)
                    $strPublishDate     ='';            
            }

            $arrResult = array( 'intSlno' => $intSlno,'strPublishDate'=>$strPublishDate,'strSnippet' => $strSnippet,'strSnippetO' => $strSnippetO,'intTopicid' => $intTopicid,'strTopic' => $strTopic, 'strTopicO' => $strTopicO,'strFileName' => $strFileName,'strDescription' => $strDescription,'strDescriptionO' => $strDescriptionO,'intStatus'=>$intStatus, 'strName' => $strName, 'strNameO' => $strNameO);
            return $arrResult;
        }

    // Function To Delete Topic  By::T Ketaki Debadarshini   :: On:: 27-Oct-2015
        public function deleteTopic($action, $ids) {
            $newSessionId           = session_id();
            $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
            if($newSessionId == $hdnPrevSessionId) { 
                    $ctr = 0;
                    $userId = USER_ID;
                    $explIds = explode(',', $ids);
                    $delRec = 0;
                    foreach ($explIds as $indIds) {
                        $slNumber = 0;
                        $indvidualID = $explIds[$ctr];
                        if ($action == 'US') {
                            $slNumber = $_POST['txtSLNo' . $indvidualID];
                            //echo $indvidualID;		
                        }

                        $result = $this->manageTopic($action,$indvidualID,'','','','','','','',0,0,0,'','','0000-00-00','0000-00-00'); 
                        $row = mysqli_fetch_array($result);
                        if ($row[0] == 0)
                            $delRec++;
                        $ctr++;

                    }

                    if ($action == 'D') {
                        if ($delRec > 0)
                            $outMsg .= 'Biswa Bijayee(s) deleted successfully';
                        else
                            $outMsg .= 'Dependency record exist. Biswa Bijayee(s) can not be deleted';
                    }
                    else if ($action == 'AC')
                        $outMsg = 'Biswa Bijayee(s) activated successfully';
                    else if ($action == 'IN')
                        $outMsg = 'Biswa Bijayee(s) unpublished successfully';
                    else if($action=='US')		
                        $outMsg	= 'Serial number updated successfully';	
                    else if ($action == 'AR')
                        $outMsg =  'Biswa Bijayee(s) archieved successfully';
                    else if($action == 'P')
                        $outMsg =  'Biswa Bijayee(s) Published successfully';
                    else if($action=='HH')	
                        $outMsg	=  'Biswa Bijayee(s) Hide on home page Successfully';	
                    else if($action=='SH' && $msg==0)	
                       $outMsg	=  'Biswa Bijayee(s) Displayed on home page Successfully';  

                    return $outMsg;
             }else{
                header("Location:" . APP_URL . "error");
           } 
        }


    } 
    

?>
