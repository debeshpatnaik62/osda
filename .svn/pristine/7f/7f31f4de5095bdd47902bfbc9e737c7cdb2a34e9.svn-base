<?php

/* * ****Class to manage News for skill events Only ********************
'By                     : Rahul Kumar Saw	'
'On                     : 13-Dec-2021        '
' Procedure Used        : USP_SKILL_EVENT     '
* ************************************************** */

class clsSkillEvent extends Model {

// Function To Manage Skill event News By::Rahul Kumar Saw   :: On:: 13-Dec-2021
    public function manageSkillEvent($action, $newsId, $headLineE, $headLineH, $image, $eventstartDate,$eventendDate, $descriptionE, $descriptionH, $pubStatus,$archiveStatus ,$createdBy,$startDate,$endDate) {
        $newsId             = htmlspecialchars(addslashes($newsId),ENT_QUOTES);
        $headLineE          = htmlspecialchars(addslashes($headLineE),ENT_QUOTES);
       // $headLineH          = addslashes($headLineH);
        $descriptionE       = addslashes($descriptionE);
        //$eventstartDate=($eventstartDate=='0000-00-00' || $eventstartDate=='0000-00-00 00:00:00')?BLANK_DATE:$eventstartDate;
        $eventstartDate=($eventstartDate=='0000-00-00')?BLANK_DATE:$eventstartDate;
        $eventendDate  =($eventendDate=='0000-00-00')?BLANK_DATE:$eventendDate;
        
        $eventSql            = "CALL USP_SKILL_EVENT('$action', $newsId,'$headLineE', '$headLineH', '$image',  '$eventstartDate', '$eventendDate','$descriptionE', '$descriptionH', $pubStatus,$archiveStatus, $createdBy,'$startDate','$endDate',@OUT);";
    //echo $eventSql;             
        $errAction          = Model::isSpclChar($action);
        $errHeadlineE       = Model::isSpclChar($headLineE);
        $errfetImage        = Model::isSpclChar($image);       
        if ($errAction > 0 || $errPageTitleE > 0 || $errfetImage > 0)
            header("Location:" . APP_URL . "error");
        else {
            $newsResult = Model::executeQry($eventSql);
            return $newsResult;
        }
    }

// Function To Add Upadate skill event Page By::Rahul Kumar Saw   :: On:: 13-Dec-2021
    public function addUpdateSkillEvent($newId) { 
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if ($newSessionId == $hdnPrevSessionId) {    
        
        $userId                 = $_SESSION['adminConsole_userID'];
        $newsId                 = (isset($newId))?$newId:0;
       
        $msgTitle               = 'Event ';
        $txtHeadlineE           = htmlspecialchars($_POST['txtHeadlineE'], ENT_QUOTES);
        $blankHeadlineE         = Model::isBlank($txtHeadlineE);
        $errHeadlineE           = Model::isSpclChar($_POST['txtHeadlineE']);
        $lenHeadlineE           = Model::chkLength('max', $txtHeadlineE,250);
        
        $txtHeadlineH           = htmlspecialchars($_POST['txtHeadlineH'], ENT_QUOTES, 'UTF-8');
        $errHeadlineH           = Model::isSpclChar($txtHeadlineH);
        
       
        $startDate              = ($_POST['txtStartDate']!='')?model::dbDateFormat($_POST['txtStartDate']):'0000-00-00';
        $endDate                = ($_POST['txtEndDate']!='')?model::dbDateFormat($_POST['txtEndDate']):'0000-00-00';
        $fileDocument           = $_FILES['fileDocument']['name'];
        $prevFile               = $_POST['hdnImageFile'];
        $fileSize               = $_FILES['fileDocument']['size'];
        $fileTemp               = $_FILES['fileDocument']['tmp_name'];
        $ext                    = pathinfo($fileDocument , PATHINFO_EXTENSION);
        $fileDocument           = ($fileDocument != '') ? 'Event' . date("Ymd_His") . '.' . $ext : '';
        $fileMimetype           = mime_content_type($fileTemp);
        
        $txtDetailsE            = htmlspecialchars($_POST['txtDetailsE'], ENT_QUOTES);
        $pregDescription        = preg_replace('/\s+/', '', $_POST['txtDetailsE']);
        $chkTags                = '<button,<form,<iframe,<input,<script,<select,<textarea,alert';
        $checkTagsStatus        = $this->isSpclTags($pregDescription);  
            
        $txtDetailsH            = urlencode($_POST['txtDetailsH']);
        $pregDescriptionH       = preg_replace('/\s+/', '', $_POST['txtDetailsH']);
        $checkTagsStatusH       = $this->isSpclTags($pregDescriptionH); 
        
     
       // $txtPlace               = $_POST['txtPlace'];
        $txtPlace               = '';
        $outMsg                 = '';
        $flag                   = ($newsId != 0) ? 1 : 0;
        $action                 = ($newsId == 0) ? 'A' : 'U';
        $errFlag                = 0 ;
       
        if($blankHeadlineE >0)
        {
            $errFlag		= 1;
            $flag               = 1;
            $outMsg		= "Mandatory Fields should not be blank";
        }
        else if($lenHeadlineE>0)
        {
            $errFlag		= 1;
            $flag               = 1;
            $outMsg		= "Length should not excided maxlength";
        }
        else if($errHeadlineE>0)
        {
            $errFlag		= 1;
            $flag               = 1;
            $outMsg		= "Special Characters are not allowed";
        }else if($fileMimetype!='image/gif' && $fileMimetype!='image/jpeg'  && $fileDocument!='') {
                $errFlag               = 1;
                $flag                  = 1;
                $outMsg                = 'Invalid file types. Upload only jpg,jpeg';
        }else if ($fileSize > SIZE10MB) {
            $errFlag                = 1;
            $flag                   = 1;
            $outMsg                 = 'File size can not more than 10 MB';
        }else if ($checkTagsStatus > 0 || $checkTagsStatusH > 0) {

            $outMsg                 = "HTML Special Tags Are Not Allowed";
            $errFlag                = 1;
            $flag                   = 1;
        }
        
        if ($fileDocument == '' && $newsId != 0)
            $fileDocument = $prevFile;
        if($errFlag==0 && $userId>0){
            
           $dupResult = $this->manageSkillEvent('CD', $newsId,$txtHeadlineE,'','','0000-00-00','0000-00-00','','',0,0,$userId,'0000-00-00','0000-00-00');
                                            
              if ($dupResult) {
                $numRows = $dupResult->fetch_array();
                if ($numRows > 0) {
                    $outMsg = $msgTitle.' with this headline already exists';
                    $errFlag = 1;
                    $flag   = 1;
                } else {
                    $result = $this->manageSkillEvent($action, $newsId, $txtHeadlineE,$txtHeadlineH,$fileDocument,$startDate,$endDate,$txtDetailsE,$txtDetailsH, 0,0 ,$userId,'0000-00-00','0000-00-00');
                    if($result)
                    {
                        $outMsg = ($action == 'A') ? $msgTitle.' added successfully ' : $msgTitle.' updated successfully';
                        
                        if($fileDocument != '') {
                            if(file_exists(APP_PATH."uploadDocuments/event/" . $prevFile) && $prevFile != '' && $_FILES['fileDocument']['name']!= '') {
                                 unlink(APP_PATH."uploadDocuments/event/" . $prevFile);
                            }
                          
                             if($_FILES['fileDocument']['name'] != '' && $ext!='pdf') 
                             {
                              
                                $this->GetResizeImage($this,APP_PATH.'uploadDocuments/event/',550,0,$fileDocument,$fileTemp); //223,138
                             }
                             else
                               move_uploaded_file($fileTemp, APP_PATH."uploadDocuments/event/" . $fileDocument);
                        }
                    }
                }
            }
        }
       }else{
            header("Location:" . APP_URL . "error");
        } 
       
        
        $strHeadLineE       = ($errFlag == 1) ? htmlentities($txtHeadlineE) : '';              
        $strHeadLineH       = ($errFlag == 1) ? htmlentities($txtHeadlineH) : '';              
        $strFileName        = ($errFlag == 1) ? htmlentities($fileDocument) : '';
        $strDetailE         = ($errFlag == 1) ? htmlentities($txtDetailsE) : ''; 
        $strstartDate       = ($errFlag == 1) ? htmlentities($startDate) : ''; 
        $strendDate         = ($errFlag == 1) ? htmlentities($endDate) : ''; 
        $strDetailH         = ($errFlag == 1) ? htmlentities($txtDetailsH) : '';
        
        $arrResult = array('strstartDate' => $strstartDate,'strendDate' => $strendDate,'msg' => $outMsg, 'flag' => $errFlag, 'strHeadLineE' => $strHeadLineE,  'strFileName' => $strFileName,'strDetailE' => $strDetailE,'strHeadLineH'=>$strHeadLineH,'strDetailH'=>$strDetailH);
        return $arrResult;
    }

// Function To read News  By::Rahul Kumar Saw  :: On:: 13-Dec-2021
    public function readSkillEvent($id) {

        $result = $this->manageSkillEvent('R',$id,'','','','0000-00-00','0000-00-00','','',0,0,0,'0000-00-00','0000-00-00');
        if ($result->num_rows > 0) {
            $row                = $result->fetch_array();
            $strHeadLineE       =  htmlspecialchars_decode($row['vchHeadLineE'],ENT_QUOTES);   
            $strHeadLineH       =  $row['vchHeadLineH'];        
            
            $strFileName        = $row['vchImageFile'];
                      
            $strDetailE         = htmlspecialchars_decode($row['vchDescriptionE'],ENT_NOQUOTES);   
            $strDetailH         = urldecode($row['vchDescriptionH']);      
            $strstartDate       = date ('d-m-Y',strtotime($row['dtmStartDate'])); 
            $strendDate         = date ('d-m-Y',strtotime($row['dtmEndDate'])); 
            if($strstartDate=='01-01-1970' || $strstartDate=='' || strtotime($strstartDate)<=0)
                $strstartDate    ='';
            if($strendDate=='01-01-1970' || $strendDate=='' || strtotime($strendDate)<=0)
                $strendDate    ='';     
           
            $stmCreatedOn       = date ('d-m-Y',strtotime($row['stmCreatedOn']));
        }

        $arrResult = array('stmCreatedOn'=>$stmCreatedOn,'strHeadLineH' => $strHeadLineH,'strDetailH' => $strDetailH,'strstartDate' => $strstartDate,'strHeadLineE' => $strHeadLineE, 'strFileName' => $strFileName, 'strDetailE' => htmlspecialchars_decode($strDetailE,ENT_NOQUOTES),'strendDate'=>$strendDate);
        return $arrResult;
    }
	

// Function To Delete Skill  By::Rahul Kumar Saw   :: On:: 13-Dec-2021
    public function deleteSkillEvent($action, $ids) {
      
        $newSessionId           = session_id();
        $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
        if ($newSessionId == $hdnPrevSessionId) {  
                $ctr            = 0;
                $msg            = 0;
                $userId         = USER_ID;
                $explIds        = explode(',', $ids);
                $delRec         = 0;
                $msgTitle       = 'Event ';

                foreach ($explIds as $indIds) {

                    $result = $this->manageSkillEvent($action,$explIds[$ctr],'','','','0000-00-00','0000-00-00','','',0,0,0,'0000-00-00','0000-00-00');                   
                    $row = mysqli_fetch_array($result);
                    if ($row[0] == 0)
                        $delRec++;

                    $ctr++;

                }

                if ($action == 'D') {
                    if ($delRec > 0)
                        $outMsg .= $msgTitle.' deleted successfully';
                    else
                        $outMsg .= 'Dependency record exist. New(s) can not be  deleted';
                }
                else if ($action == 'AC')
                    $outMsg = $msgTitle.' activated successfully';
                else if ($action == 'IN')
                    $outMsg =  $msgTitle.' unpublished successfully';
                else if ($action == 'AR')
                    $outMsg =  $msgTitle.' archieved successfully';
                else if($action == 'P')
                    $outMsg =  $msgTitle.' Published successfully';  

                return $outMsg;
        }else{
                header("Location:".APP_URL."error");
            }  
    }

}

?>
