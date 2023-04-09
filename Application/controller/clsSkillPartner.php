<?php

/* * ****Class to manage Skill Partner ********************
'By                     : Rahul Kumar Saw'
'On                     : 25-July-2022        '
' Procedure Used        : USP_SKILL_PARTNER       '
* ************************************************** */

class clsSkillPartner extends Model {

// Function To Manage Skill Partner By::Rahul Kumar Saw   :: On:: 25-July-2022
    public function manageSkillPartner($action, $newsId, $partnerCat,$headLineE, $headLineH, $image, $expdate, $newsDate, $descriptionE, $descriptionH, $pubStatus,$archiveStatus ,$createdBy,$startDate,$endDate,$txtSource,$txtSourcenameE,$txtSourcenameO) {
        
         $startDate=($startDate=='0000-00-00')?BLANK_DATE:$startDate;
         $endDate  =($endDate=='0000-00-00')?BLANK_DATE:$endDate;
        
         $expdate=($expdate=='0000-00-00 00:00:00' || $expdate=='0000-00-00')?BLANK_DATE_TIME:$expdate;
         $newsDate=($newsDate=='0000-00-00 00:00:00' || $newsDate=='0000-00-00')?BLANK_DATE_TIME:$newsDate;
        
        $newsId             = htmlspecialchars(addslashes($newsId),ENT_QUOTES);
        $headLineE          = htmlspecialchars(addslashes($headLineE),ENT_QUOTES);
       // $headLineH          = addslashes($headLineH);
        $descriptionE       = addslashes($descriptionE);  
        $newsSql            = "CALL USP_SKILL_PARTNER('$action', $newsId, $partnerCat,'$headLineE', '$headLineH', '$image', '$expdate', '$newsDate', '$descriptionE', '$descriptionH', $pubStatus,$archiveStatus, $createdBy,'$startDate','$endDate','$txtSource','$txtSourcenameE','$txtSourcenameO',@OUT);";
 //echo $newsSql;             
        $errAction          = Model::isSpclChar($action);
        $errHeadlineE       = Model::isSpclChar($headLineE);
        $errfetImage        = Model::isSpclChar($image);       
        if ($errAction > 0 || $errHeadlineE > 0 || $errfetImage > 0)
            header("Location:" . APP_URL . "error");
        else {
            $newsResult = Model::executeQry($newsSql);
            return $newsResult;
        }
    }

// Function To Add Upadate Page By::Rahul Kumar Saw   :: On:: 25-July-2022
    public function addUpdateSkillPartner($newId) { 
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if ($newSessionId == $hdnPrevSessionId) {    
        
        $userId                 = $_SESSION['adminConsole_userID'];
        $newsId                 = (isset($newId))?$newId:0;
        $partnerCat             = htmlspecialchars($_POST['selNewsType'], ENT_QUOTES);       
        
        $msgTitle               = 'Partner Information ';
        $txtHeadlineE           = htmlspecialchars($_POST['txtHeadlineE'], ENT_QUOTES);
        $blankHeadlineE         = Model::isBlank($txtHeadlineE);
        $errHeadlineE           = Model::isSpclChar($_POST['txtHeadlineE']);
        $lenHeadlineE           = Model::chkLength('max', $txtHeadlineE,250);
        
        $txtHeadlineH           = htmlspecialchars($_POST['txtHeadlineH'], ENT_QUOTES, 'UTF-8');
        $errHeadlineH           = Model::isSpclChar($txtHeadlineH);
        
       
        $fileDocument           = $_FILES['fileDocument']['name'];
        $prevFile               = $_POST['hdnImageFile'];
        $fileSize               = $_FILES['fileDocument']['size'];
        $fileTemp               = $_FILES['fileDocument']['tmp_name'];
        $ext                    = pathinfo($fileDocument , PATHINFO_EXTENSION);
        $fileDocument           = ($fileDocument != '') ? 'Partner' . date("Ymd_His") . '.' . $ext : '';
        $fileMimetype           = mime_content_type($fileTemp);
        
        $txtDetailsE            = htmlspecialchars($_POST['txtDetailsE'], ENT_QUOTES);
        $pregDescription        = preg_replace('/\s+/', '', $_POST['txtDetailsE']);
        //$chkTags                = '<button,<form,<iframe,<input,<script,<select,<textarea,alert';
        $checkTagsStatus        = $this->isSpclTags($pregDescription);  
            
        $txtDetailsH            = urlencode($_POST['txtDetailsH']);
        $pregDescriptionH       = preg_replace('/\s+/', '', $_POST['txtDetailsH']);
        $checkTagsStatusH       = $this->isSpclTags($pregDescriptionH); 
        
        
        $txtSource              = htmlspecialchars($_POST['txtSource'], ENT_QUOTES);
        $errSource              = Model::isSpclChar($txtSource);

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
        else if($errHeadlineE>0 || $errSourcename>0 || $errHeadlineH >0 || $errSource >0)
        {
            $errFlag		= 1;
            $flag               = 1;
            $outMsg		= "Special Characters are not allowed";
        }else if($fileMimetype!='image/jpg' && $fileMimetype!='image/jpeg' && $fileMimetype!='image/png' && $fileDocument!='') {
                $errFlag               = 1;
                $flag                  = 1;
                $outMsg                = 'Invalid file types. Upload only jpg,jpeg,png';
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
            
            $dupResult = $this->manageSkillPartner('CD', $newsId,$partnerCat,$txtHeadlineE,'','', '0000-00-00','0000-00-00','','',0,0,$userId,'0000-00-00','0000-00-00','','','');
            
              if ($dupResult) {
                $numRows = $dupResult->fetch_array();
                if ($numRows > 0) {
                    $outMsg = $msgTitle.' with this headline already exists';
                    $errFlag = 1;
                    $flag   = 1;
                } else {
                    $result = $this->manageSkillPartner($action, $newsId,$partnerCat, $txtHeadlineE,$txtHeadlineH,$fileDocument,'0000-00-00' ,'0000-00-00',$txtDetailsE,$txtDetailsH, 0,0 ,$userId,'0000-00-00','0000-00-00',$txtSource,'','');
                    if($result)
                    {
                        $outMsg = ($action == 'A') ? $msgTitle.' added successfully ' : $msgTitle.' updated successfully';
                        
                        if($fileDocument != '') {
                            if(file_exists("uploadDocuments/Partner/" . $prevFile) && $prevFile != '' && $_FILES['fileDocument']['name']!= '') {
                                 unlink("uploadDocuments/Partner/" . $prevFile);
                            }
                          
                             /*if($_FILES['fileDocument']['name'] != '' && $ext!='pdf') 
                             {
                                 
                                $this->GetResizeImage($this,'uploadDocuments/ThumbImage/Partner/',290,0,$fileDocument,$fileTemp);
                              
                                $this->GetResizeImage($this,'uploadDocuments/Partner/',550,0,$fileDocument,$fileTemp); //223,138
                             }
                             else*/
                               move_uploaded_file($fileTemp, "uploadDocuments/Partner/" . $fileDocument);
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
        $strSource          = ($errFlag == 1) ? htmlentities($txtSource) : '';
        $strDetailE         = ($errFlag == 1) ? htmlentities($txtDetailsE) : ''; 
        $strDetailH         = ($errFlag == 1) ? htmlentities($txtDetailsH) : ''; 
        $intpartnerCat      =  ($errFlag == 1) ?$partnerCat:0;
        
        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag, 'strHeadLineE' => $strHeadLineE,'strHeadLineH' => $strHeadLineH,  'strFileName' => $strFileName, 'strDetailE' => $strDetailE,'intCategoryId'=>$intpartnerCat,'strDetailH'=>$strDetailH);
        return $arrResult;
    }

// Function To read partner  By::Rahul Kumar Saw  :: On:: 26-July-2022
    public function readSkillPartner($id) {

        $result = $this->manageSkillPartner('R',$id,0,'','','', '0000-00-00','0000-00-00','','',0,0,0,'0000-00-00','0000-00-00','','','');
        if ($result->num_rows > 0) {
            $row                = $result->fetch_array();
            $intCategoryId      = $row['intCategoryId'];
            $strHeadLineE       =  htmlspecialchars_decode($row['vchHeadLineE'],ENT_QUOTES);   
            $strHeadLineH       =  htmlspecialchars_decode($row['vchHeadLineH'],ENT_QUOTES);   
          
            $strFileName        = $row['vchImageFile'];           
            $strDetailE         = htmlspecialchars_decode($row['vchDescriptionE'],ENT_NOQUOTES);   
            $strDetailH         = urldecode($row['vchDescriptionH']);         
            $strSource          = $row['vchSource'];            
            $strSource          = htmlspecialchars_decode($row['vchSource'],ENT_QUOTES);
            $stmCreatedOn       = date ('d-m-Y',strtotime($row['stmCreatedOn'])); 
            
        }

        $arrResult = array('strSource'=>$strSource,'stmCreatedOn'=>$stmCreatedOn,'intCategoryId'=>$intCategoryId,'strHeadLineH' => $strHeadLineH,'strDetailH' => $strDetailH,'strHeadLineE' => $strHeadLineE, 'strFileName' => $strFileName,  'strDetailE' => htmlspecialchars_decode($strDetailE,ENT_NOQUOTES));
        return $arrResult;
    }
	// Function To read News  By::Rahul Kumar Saw   :: On:: 18-Nov-2015
    public function updateExpary() {
        $newSessionId           = session_id();
        $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
        if ($newSessionId == $hdnPrevSessionId) {  
                $userId                 = $_SESSION['adminConsole_userID'];
                $id			= $_POST['hdnNID'];
                $txtExparyDate          = model::dbDateFormat($_POST['txtFBDate'.$id]);
                                            
                $result = $this->manageSkillPartner('UE', $id, '','','', $txtExparyDate,'0000-00-00','','', '','',0,0,0,'0000-00-00','0000-00-00','','','','','');
                if ($result)
                        $outMsg = 'Expary Date Updated successfully ' ;


               return $outMsg;
        }else{
                header("Location:" . APP_URL . "error");
            }  
    }

// Function To Delete News  By::Rahul Kumar Saw   :: On:: 18-Nov-2015
    public function deleteSkillPartner($action, $ids) {
      
        $newSessionId           = session_id();
        $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
        if ($newSessionId == $hdnPrevSessionId) {  
                $ctr            = 0;
                $msg            = 0;
                $userId         = USER_ID;
                $explIds        = explode(',', $ids);
                $delRec         = 0;
                $catid          = $_REQUEST['hdn_catid'];

                $msgTitle       = 'Partner Information ';

                foreach ($explIds as $indIds) {

                    $result = $this->manageSkillPartner($action,$explIds[$ctr],0,'','','', '0000-00-00','0000-00-00','','',0,0,0,'0000-00-00','0000-00-00','','','');                   
                    $row = mysqli_fetch_array($result);
                    if ($row[0] == 0)
                        $delRec++;

                    $ctr++;

                }

                if ($action == 'D') {
                    if ($delRec > 0)
                        $outMsg .= $msgTitle.' deleted successfully';
                    else
                        $outMsg .= 'Dependency record exist. Partner(s) can not be  deleted';
                }
                else if ($action == 'AC')
                    $outMsg = $msgTitle.' activated successfully';
                else if ($action == 'IN')
                    $outMsg =  $msgTitle.' unpublished successfully';
                else if ($action == 'AR')
                    $outMsg =  $msgTitle.' archieved successfully';
                else if($action == 'P')
                    $outMsg =  $msgTitle.' Published successfully';
                else if($action=='HH')	
                    $outMsg	=  $msgTitle.' Hide on home page Successfully';	
                else if($action=='SH' && $msg==0)	
                   $outMsg	=  $msgTitle.' Displayed on home page Successfully';  

                return $outMsg;
        }else{
                header("Location:".APP_URL."error");
            }  
    }

}

?>
