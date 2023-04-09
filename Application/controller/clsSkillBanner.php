<?php 
/* * ****Class to manage SkillBanner ********************
'By                     : Rahul Kumar Saw '
'On                     : 17-Feb-2016       '
' Procedure Used        : USP_SkillBanner       '
* ************************************************** */

class clsSkillBanner extends Model {

// Function To Manage Skill Banner By::Rahul Kumar Saw   :: On:: 27-July-2022 
    public function manageSkillBanner($action,$SkillBannerId,$categoryId,$typeId,$videotypeId,$caption,$captionH,$thumbImage,$largeImage,$description,$descriptionO,$strUrl,$pubStatus,$archiveStatus,$createdBy,$portalType) {
       
        $SkillBannerId    = htmlspecialchars(addslashes($SkillBannerId),ENT_QUOTES);
        $caption          = htmlspecialchars(addslashes($caption),ENT_QUOTES);    
        $description      = addslashes($description);
        
        $SkillBannerSql   = "CALL USP_SKILL_BANNER('$action',$SkillBannerId,$categoryId,$typeId,$videotypeId,'$caption','$captionH','$thumbImage','$largeImage','$description','$descriptionO','$strUrl',$pubStatus,$archiveStatus,$createdBy,'$portalType',@OUT);";
       //echo   $SkillBannerSql;   
        $errAction        = Model::isSpclChar($action);
        $errSkillBannerId        = Model::isSpclChar($SkillBannerId);
        $errCaption       = Model::isSpclChar($caption);
        $errcategoryId    = Model::isSpclChar($categoryId);
        $errfetImage      = Model::isSpclChar($largeImage);       
        if ($errAction > 0 || $errCaption > 0 || $errfetImage > 0 || $errcategoryId>0 || $errSkillBannerId>0)
            header("Location:" . APP_URL . "error");
        else {
            $SkillBannerResult = Model::executeQry($SkillBannerSql); 
            return $SkillBannerResult;
            
        }
    }

// Function To Add Upadate SkillBanner By::Rahul Kumar Saw   :: On:: 27-July-2022 
    public function addUpdateSkillBanner($SkillBannerId) { 
       $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {    
      
        $userId         = (isset($_SESSION['adminConsole_userID']))?$_SESSION['adminConsole_userID']:0;
        $SkillBannerId      = (isset($SkillBannerId))?$SkillBannerId:0;
        
        $moduleId       = $_POST['selModule'];
        $numcategoryId  = $_POST['selCategory'];
        $setType        = $_POST['selType'];
        $rbtLnkType     = $_POST['rbtLnkType'];
        $txtHeadline    = htmlspecialchars($_POST['txtCaption'], ENT_QUOTES);
        $blankCaption   = Model::isBlank($txtHeadline);
        $errCaption     = Model::isSpclChar($txtHeadline);
        if($numcategoryId==1)
        {
            $msgTitle = 'Banner';
        }
        else
        {
            $msgTitle = 'Gallery';
        }
        $txtDescription  = htmlspecialchars($_POST['txtDescription'], ENT_QUOTES);
        $errDescription  = Model::isSpclChar($txtDescription);
        $txtDescriptionH = addslashes($_POST['txtDescriptionH']);
        $errDescriptionH  = Model::isSpclChar($txtDescriptionH);
        
        $txtHeadlineH   = addslashes($_POST['txtCaptionH']);
        $errHeadlineH   = Model::isSpclChar($txtHeadlineH);
        

        $filevideo      = $_FILES['filevideo']['name'];
        $prevVideoFile  = $_POST['hdnvideoFile'];
        $videoextension = pathinfo($filevideo, PATHINFO_EXTENSION);
        $videoFileSize  = $_FILES['filevideo']['size'];
        $videoTempName  = $_FILES['filevideo']['tmp_name'];
        $videoFileName  = ($filevideo != '') ? 'Video_' . time() . '.' . $videoextension : '';
        $fileMimetypeVdo           = mime_content_type($videoTempName);
       

        $txtEmbedCode   = $_POST['txtEmbedCode'];       
        $txtLargeimage  = $_FILES['fileDocument']['name'];
        $prevLargeImage = $_POST['hdnImageFile'];
        $extension      = pathinfo($txtLargeimage, PATHINFO_EXTENSION);
        $txtFileSize    = $_FILES['fileDocument']['size'];
        $txtTempName    = $_FILES['fileDocument']['tmp_name'];
        $formattedFileName = ($txtLargeimage != '') ? 'UP_SkillBanner_' . time() . '.' . $extension: '';
        $fileMimetype           = mime_content_type($txtTempName);
        
        if ($txtLargeimage == '' && $SkillBannerId != 0)
            $formattedFileName = $prevLargeImage;
        if ($filevideo == '' && $SkillBannerId != 0)
            $videoFileName = $prevVideoFile;

        if ($setType == 2) {
            $txtUrl = '';
            $videoFileName = '';
            $rbtLnkType = 0;
        }
        if ($setType == 3) {
            $txtUrl = '';
            $rbtLnkType = $rbtLnkType;
            if ($rbtLnkType == 1)
                $videoFileName = $videoFileName;
            else
                $txtUrl = $txtEmbedCode;
        }
       
        $outMsg             = '';
        $flag               = ($SkillBannerId != 0) ? 1 : 0;
        $action             = ($SkillBannerId == 0) ? 'A' : 'U';
        $errFlag            = 0 ;
      
        if(($setType==0)) 
        {
                $errFlag        = 1;
                $flag           = 1;
                $outMsg         = "Mandatory Fields should not be blank";
        }
        else if(($errCaption>0) || ($errDescription>0 || $errHeadlineH>0 || $errDescriptionH>0))
        {
                $errFlag        = 1;
                $flag                   = 1;
                $outMsg         = "Special Characters are not allowed";
        }else if(($fileMimetype!='image/gif' && $fileMimetype!='image/jpeg' && $fileMimetype!='image/jpg' && $txtTempName!='') || ($fileMimetypeVdo!='video/mp4' && $filevideo!='')) {
                $errFlag               = 1;
                $flag                  = 1;
                $outMsg                = 'Invalid file types. Upload only jpg,jpeg,gif';
            }
        else if ($txtFileSize > SIZE1MB) {
            $errFlag               = 1;
            $flag                  = 1;
            $outMsg = 'Image File size can not more than 1 MB';
        }
        else if ($videoFileSize > SIZE10MB) {
            $errFlag               = 1;
            $flag                  = 1;
            $outMsg = 'Video File size can not more than 10 MB';
        }
        
       // $dupResult = $this->manageSkillBanner('CD',$SkillBannerId,$numcategoryId,$setType,0,$txtHeadline,'','','','','','',0,0,0,'');
      // 
        if($errFlag==0 && $userId>0){
            /* if ($dupResult) {
                $numRows = $dupResult->fetch_array();
                if ($numRows > 0) {
                    $outMsg = 'Media Details already exists';
                    $errFlag = 1;
                    $flag   = 1;
                } else {*/
                    $result = $this->manageSkillBanner($action,$SkillBannerId,$numcategoryId,$setType,$rbtLnkType,$txtHeadline,$txtHeadlineH,$videoFileName,$formattedFileName,$txtDescription,$txtDescriptionH,$txtUrl,0,$moduleId,$userId,'');
                 // echo $result; 
                   $insertCheck=$result->fetch_array();
                    
                  if ($insertCheck['@P_STATUS']>0){
                        $outMsg = ($action == 'A') ? $msgTitle.' Details added successfully ' : $msgTitle.' Details updated successfully';
                   
                    if ($_FILES['fileDocument']['name'] != '') {
                        if (file_exists("uploadDocuments/banner/".$prevLargeImage) && $prevLargeImage != '')
                            unlink("uploadDocuments/banner/"  . $prevLargeImage);

                        $this->GetResizeImage($this,'uploadDocuments/Video/ThumbImage/',350,0,$formattedFileName,$txtTempName);
                        // move_uploaded_file($txtTempName, "uploadDocuments/SkillBanner/" . $formattedFileName);
                        $this->GetResizeImage($this,'uploadDocuments/banner/',0,0,$formattedFileName,$txtTempName);
                    }

                    if ($_FILES['filevideo']['name'] != '') {
                        if (file_exists("uploadDocuments/Video/VideoFile/" . $prevVideoFile) && $prevVideoFile != '') {
                            unlink("uploadDocuments/Video/VideoFile/" . $prevVideoFile);
                        }
                        move_uploaded_file($videoTempName, "uploadDocuments/Video/VideoFile/" . $videoFileName);
                    } 
                    
                }else{
                    
                    $outMsg = ($insertCheck['@CATEGORY_COUNT']==0)?'Selected Banner Category not exist.':'Error in Operation';
                    $errFlag = 1;
                    $flag   = 1;
                }
            //}
            }
        }else{
                header("Location:".APP_URL."error");
           } 
        $intModule         = ($errFlag == 1) ? $moduleId : '0';              
        $intCategory       = ($errFlag == 1) ? $numcategoryId : '0';              
        $strFileName        = ($errFlag == 1) ? htmlentities($fileDocument) : '';
        $strCaption         = ($errFlag == 1) ? htmlentities($txtCaption) : '';
        $strDescription         = ($errFlag == 1) ? htmlentities($txtDescription) : ''; 
       
        $arrResult = array('intCategory' => $intCategory,'strFileName' => $strFileName,'msg' => $outMsg, 'flag' => $flag, 'strCaption' => $strCaption, 'strDescription' => $strDescription,'intModule'=>$intModule);
        return $arrResult;
    }

// Function To read SkillBanner  By::Rahul Kumar Saw   :: On:: 27-July-2022
    public function readSkillBanner($id) {

        $result = $this->manageSkillBanner('R',$id,0,0,0,'','','','','','','',0,0,0,''); 
        if (mysqli_num_rows($result) > 0) {
            $row               = mysqli_fetch_array($result);
            $strCaption        =  htmlspecialchars_decode($row['VCH_HEADLINE_E'],ENT_QUOTES);
            $strCaptionH       =  $row['VCH_HEADLINE_O'];
            $strThumbFileName  = $row['VCH_THUMB_IMAGE'];
            $strFileName       = $row['VCH_LARGE_IMAGE'];
            $strDescription    = htmlspecialchars_decode($row['VCH_DESCRIPTION_E'],ENT_NOQUOTES);  
            $strDescriptionH   = $row['VCH_DESCRIPTION_O'];  
            $intCategory       = $row['INT_CATEGORY_ID'];
            $intType           = $row['INT_TYPE_ID'];
            $strEmbedurl       = $row['VCH_URL'];
            $intVideolinktype  = $row['INT_VIDEO_LINK_TYPE'];
            $strPortaltype     = $row['VCH_PORTAL_TYPE'];
            $intModule         = $row['INT_MODULE'];
        }

        $arrResult = array('strPortaltype'=>$strPortaltype,'intVideolinktype'=>$intVideolinktype,'strEmbedurl'=>$strEmbedurl,'strThumbFileName'=>$strThumbFileName,'intType'=>$intType,'strCaptionH'=>$strCaptionH,'strDescriptionH'=>$strDescriptionH,'strCaption' => $strCaption, 'strFileName' => $strFileName, 'intCategory' => $intCategory, 'strDescription' => htmlspecialchars_decode($strDescription,ENT_NOQUOTES),'intModule'=>$intModule);
        return $arrResult;
    }
    

// Function To Delete SkillBanner  By::Rahul Kumar Saw  :: On:: 27-July-2022
    public function deleteSkillBanner($action, $ids) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
            $ctr = 0;
            $msg=0;
            $userId = $_SESSION['adminConsole_userID'];
            $explIds = explode(',', $ids);
            $delRec = 0;
            foreach ($explIds as $indIds) {

                $result = $this->manageSkillBanner($action,$explIds[$ctr],0,0,0,'','','','','','','',0,0,0,'');                              
                $row = mysqli_fetch_array($result);
                if ($row[0] == 0)
                    $delRec++;
                $ctr++;

            }

            if ($action == 'D') {
                if ($delRec > 0)
                    $outMsg .= 'Banner Detail(s) deleted successfully';
                else
                    $outMsg .= 'Dependency record exist. Banner Detail(s) can not be  deleted';
            }
            else if ($action == 'AC')
                $outMsg = 'Banner(s) activated successfully';
            else if ($action == 'IN')
                $outMsg = 'Banner(s) unpublished successfully';
            else if ($action == 'AR')
                $outMsg = 'Banner(s) archieved successfully';
            else if($action == 'P')
                $outMsg = 'Banner(s) Published successfully';
            if($action=='HH')   
                $outMsg = 'Banner(s) Hide on home page Successfully';  
            if($action=='SH' && $msg==0)    
               $outMsg  = 'Banner(s) Displayed on home page Successfully';  

            return $outMsg;
         }else{
                header("Location:".APP_URL."error");
           }   
    }

}
?>