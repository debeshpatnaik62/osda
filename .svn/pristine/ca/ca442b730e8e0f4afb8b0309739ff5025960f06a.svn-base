<?php

/* * ****Class to manage GAllery Category ********************
'By                     : T Ketaki Debadarshini	'
'On                     : 17-Feb-2016       '
' Procedure Used        : USP_GALLERY_CATEGORY       '
* ************************************************** */

class clsGalleryCategory extends Model {
    
    // Function To Manage Category By::T Ketaki Debadarshini   :: On:: 17-Feb-2016 
    public function manageGalleryCategory($action, $catId,$intcatType, $category, $categoryO, $description,$descriptionO,$pubStatus ,$createdBy) {
        $categorySql = "CALL USP_GALLERY_CATEGORY('$action', $catId,$intcatType,'$category','$categoryO', '$description','$descriptionO','$pubStatus', '$createdBy',@OUT);";
  //echo $categorySql;exit;
        $errAction          = Model::isSpclChar($action);
        $errCatId           = Model::isSpclChar($catId);
        $errCatType         = Model::isSpclChar($intcatType);
        $errCategory        = Model::isSpclChar($category);
        $errDescription     = Model::isSpclChar($description);
        
        if ($errAction > 0 || $errCategory > 0 || $errDescription > 0 || $errCatId>0 || $errCatType>0)
            header("Location:" . APP_URL . "error");
        else {
            $categoryResult = Model::executeQry($categorySql);
            return $categoryResult;
        }
    }

// Function To Add Upadate Gallery Category By::T Ketaki Debadarshini   :: On:: 17-Feb-2016 
    public function addUpdateGalleryCategory($catId) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
        $userId                 = $_SESSION['adminConsole_userID'];        
        
       
        $selCattype            = $_POST['ddlType'];
        
        $txtCategory           = htmlspecialchars(addslashes($_POST['txtCategory']), ENT_QUOTES);
        $blankCategory         = Model::isBlank($txtCategory);
        $errCategory           = Model::isSpclChar($_POST['txtCategory']);
        $lenCategory           = Model::chkLength('max', $txtCategory,100);
        
        $txtCategory_O           = htmlspecialchars($_POST['txtCategory_O'], ENT_QUOTES, 'UTF-8');
        $errCategoryO            = Model::isSpclChar($txtCategory_O);
      
        $txtDescription          = htmlspecialchars(addslashes($_POST['txtDescription']), ENT_QUOTES);
        $errDescription          = Model::isSpclChar($_POST['txtDescription']); 
        
        $txtDescriptionO         = htmlspecialchars($_POST['txtDescriptionO'], ENT_QUOTES, 'UTF-8');
        $errDescriptionO         = Model::isSpclChar($txtDescriptionO); 
        
        $radStatus              = $_POST['radStatus'];
        
        $outMsg                 = '';
        $flag                   = ($catId != 0) ? 1 : 0;
        $action                 = ($catId == 0) ? 'A' : 'U';
        $errFlag                = 0 ;
        if(($blankCategory >0) || ($selCattype==0))
        {
                $errFlag		= 1;
                $outMsg			= "Mandatory Fields should not be blank";
        }
        else if($lenCategory>0)
        {
                $errFlag		= 1;
                $outMsg			= "Length should not excided maxlength";
        }
        else if(($errCategory>0) || ($errDescription>0 || $errDescriptionO>0 || $errCategoryO>0))
        {
                $errFlag		= 1;
                $outMsg			= "Special Characters are not allowed";
        }
       
        $dupResult = $this->manageGalleryCategory('CD', $catId,$selCattype,$txtCategory,'','','',0,$userId);
        if($errFlag==0 ){
        if ($dupResult) {
            $numRows = $dupResult->fetch_array();

            if ($numRows > 0) {
                $outMsg = 'Media Category with this name already exists';
                $errFlag = 1;
                  $flag   = 1;
            } else {
                $result = $this->manageGalleryCategory($action, $catId,$selCattype,$txtCategory,$txtCategory_O,$txtDescription,$txtDescriptionO,$radStatus,$userId);
                if ($result)
                    $outMsg = ($action == 'A') ? 'Category added successfully ' : 'Category updated successfully';
               
                }
            }
        }
       }else{
                header("Location:".APP_URL."error");
           }     
        $strCategory        = ($errFlag == 1) ? htmlentities($txtCategory) : '';
        $strDescription     = ($errFlag == 1) ? htmlentities($txtDescription) : '';       
        $intStatus          = ($errFlag == 1) ? $radStatus : '2';  
        $arrResult = array('msg' => $outMsg, 'flag' => $flag, 'strCategory' => $strCategory, 'strDescription' => $strDescription, 'intStatus' => $intStatus);
        return $arrResult;
    }

// Function To read Gallery Category  By::T Ketaki Debadarshini   :: On:: 17-Feb-2016 
    public function readGalleryCategory($id) {

        $result = $this->manageGalleryCategory('R', $id,0,'','','','',0 ,0);
        if (mysqli_num_rows($result) > 0) {

            $row               = mysqli_fetch_array($result);
            $strCategory       = $row['VCH_CATEGORY_NAME'];
            $intCattype        = $row['INT_TYPE'];
            $strDescription    = htmlspecialchars_decode($row['VCH_DESCRIPTION'],ENT_QUOTES);
            
            $strCategoryO       = $row['VCH_CATEGORY_NAME_O'];
            $strDescriptionO    = $row['VCH_DESCRIPTION_O'];
            
            $intStatus        = $row['INT_PUBLISH_STATUS'];            
        }

        $arrResult = array( 'intCattype' => $intCattype,'strCategory' => $strCategory, 'strDescription' => $strDescription,'strCategoryO' => $strCategoryO, 'strDescriptionO' => $strDescriptionO,'intStatus'=>$intStatus);
        return $arrResult;
    }




// Function To Delete Gallery Category  By::T Ketaki Debadarshini   :: On:: 17-Feb-2016 
    public function deleteGalleryCategory($action, $ids) {
        $newSessionId           = session_id();
        $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
        if($newSessionId == $hdnPrevSessionId) {   
                $ctr = 0;
                $userId = $_SESSION['adminConsole_userID'];
                $explIds = explode(',', $ids);
                $delRec = 0;
                foreach ($explIds as $indIds) {
                    $result = $this->manageGalleryCategory($action,$explIds[$ctr],0,'','','','', 0 ,$userId); 
                   // print_r($result);exit;
                    $row = mysqli_fetch_array($result);
                   // print_r($row);exit;
                    if ($row[0] == 0)
                        $delRec++;
                    $ctr++;
                    //   print_r($row);exit;
                }

                if ($action == 'D') {
                    if ($delRec > 0)
                        $outMsg .= 'Category(s) deleted successfully';
                    else
                        $outMsg .= 'Dependency record exist. Category(s) can not be deleted';
                }
                else if ($action == 'AC')
                    $outMsg = 'Category(s) activated successfully';
                else if ($action == 'IN')
                    $outMsg = 'Category(s) unpublished successfully';

                return $outMsg;
         }else{
                header("Location:".APP_URL."error");
           }   
    }


}


/* * ****Class to manage Gallery ********************
'By                     : T Ketaki Debadarshini '
'On                     : 17-Feb-2016       '
' Procedure Used        : USP_GALLERY       '
* ************************************************** */

class clsGallery extends Model {

// Function To Manage Gallery By::T Ketaki Debadarshini   :: On:: 17-Feb-2016 
    public function manageGallery($action,$galleryId,$categoryId,$typeId,$videotypeId,$caption,$captionH,$thumbImage,$largeImage,$description,$descriptionO,$strUrl,$pubStatus,$archiveStatus,$createdBy,$portalType) {
       
        $galleryId        = htmlspecialchars(addslashes($galleryId),ENT_QUOTES);
        $caption          = htmlspecialchars(addslashes($caption),ENT_QUOTES);    
        $description      = addslashes($description);
        
        $gallerySql       = "CALL USP_GALLERY('$action',$galleryId,$categoryId,$typeId,$videotypeId,'$caption','$captionH','$thumbImage','$largeImage','$description','$descriptionO','$strUrl',$pubStatus,$archiveStatus,$createdBy,'$portalType',@OUT);";
       //echo   $gallerySql;   
        $errAction        = Model::isSpclChar($action);
        $errGalleryId        = Model::isSpclChar($galleryId);
        $errCaption       = Model::isSpclChar($caption);
        $errcategoryId    = Model::isSpclChar($categoryId);
        $errfetImage      = Model::isSpclChar($largeImage);       
        if ($errAction > 0 || $errCaption > 0 || $errfetImage > 0 || $errcategoryId>0 || $errGalleryId>0)
            header("Location:" . APP_URL . "error");
        else {
            $galleryResult = Model::executeQry($gallerySql); 
            return $galleryResult;
            
        }
    }

// Function To Add Upadate Gallery By::T Ketaki Debadarshini   :: On:: 28-Aug-2015
    public function addUpdateGallery($galleryId) { 
       $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {    
      
        $userId         = (isset($_SESSION['adminConsole_userID']))?$_SESSION['adminConsole_userID']:0;
        $galleryId      = (isset($galleryId))?$galleryId:0;
        
        $numcategoryId  = $_POST['selCategory'];
        $setType        = $_POST['selType'];
        $rbtLnkType     = $_POST['rbtLnkType'];
        $txtHeadline    = htmlspecialchars($_POST['txtCaption'], ENT_QUOTES);
        $blankCaption   = Model::isBlank($txtHeadline);
        $errCaption     = Model::isSpclChar($txtHeadline);
        
        $txtDescription  = htmlspecialchars($_POST['txtDescription'], ENT_QUOTES);
        $errDescription  = Model::isSpclChar($txtDescription);
        $txtDescriptionH = addslashes($_POST['txtDescriptionH']);
        $errDescriptionH  = Model::isSpclChar($txtDescriptionH);
        
        $txtHeadlineH   = addslashes($_POST['txtCaptionH']);
        $errHeadlineH   = Model::isSpclChar($txtHeadlineH);
        
        $fileAudio      = $_FILES['fileAudio']['name'];
        $prevAudio      = $_POST['hdnAudioFile'];
        $auDioextension = pathinfo($fileAudio, PATHINFO_EXTENSION);
        $audioFileSize  = $_FILES['fileAudio']['size'];
        $AudioTempName  = $_FILES['fileAudio']['tmp_name'];
        $audioFileName  = ($fileAudio != '') ? 'Audio_' . time() . '.' . $auDioextension : '';

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
        $formattedFileName = ($txtLargeimage != '') ? 'UP_Gallery_' . time() . '.' . $extension: '';
        $fileMimetype           = mime_content_type($txtTempName);
        
        if ($txtLargeimage == '' && $galleryId != 0)
            $formattedFileName = $prevLargeImage;
        if ($fileAudio == '' && $galleryId != 0)
            $audioFileName = $prevAudio;
        if ($filevideo == '' && $galleryId != 0)
            $videoFileName = $prevVideoFile;

        if ($setType == 1) {
            $txtUrl = '';
            $videoFileName = $audioFileName;
            $rbtLnkType = 0;
            $formattedFileName = '';
        }
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
        $flag               = ($galleryId != 0) ? 1 : 0;
        $action             = ($galleryId == 0) ? 'A' : 'U';
        $errFlag            = 0 ;
      
        if(($setType==0)) // ($blankCaption >0) || 
        {
                $errFlag        = 1;
                $flag                   = 1;
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
        else if ($audioFileSize > SIZE10MB) {
            $errFlag               = 1;
            $flag                  = 1;
            $outMsg = 'Video File size can not more than 10 MB';
        }
       // $dupResult = $this->manageGallery('CD',$galleryId,$numcategoryId,$setType,0,$txtHeadline,'','','','','','',0,0,0,'');
      // 
        if($errFlag==0 && $userId>0){
            /* if ($dupResult) {
                $numRows = $dupResult->fetch_array();
                if ($numRows > 0) {
                    $outMsg = 'Media Details already exists';
                    $errFlag = 1;
                    $flag   = 1;
                } else {*/
                    $result = $this->manageGallery($action,$galleryId,$numcategoryId,$setType,$rbtLnkType,$txtHeadline,$txtHeadlineH,$videoFileName,$formattedFileName,$txtDescription,$txtDescriptionH,$txtUrl,0,0,$userId,'');
                 // echo $result; 
                   $insertCheck=$result->fetch_array();
                    
                  if ($insertCheck['@P_STATUS']>0){
                        $outMsg = ($action == 'A') ? 'Media Details added successfully ' : 'Media Details updated successfully';
                   
                    if ($_FILES['fileDocument']['name'] != '') {
                        if (file_exists("uploadDocuments/gallery/".$prevLargeImage) && $prevLargeImage != '')
                            unlink("uploadDocuments/gallery/"  . $prevLargeImage);

                        $this->GetResizeImage($this,'uploadDocuments/Video/ThumbImage/',350,0,$formattedFileName,$txtTempName);
                        // move_uploaded_file($txtTempName, "uploadDocuments/gallery/" . $formattedFileName);
                        $this->GetResizeImage($this,'uploadDocuments/gallery/',0,0,$formattedFileName,$txtTempName);
                    }

                    if ($_FILES['filevideo']['name'] != '') {
                        if (file_exists("uploadDocuments/Video/VideoFile/" . $prevVideoFile) && $prevVideoFile != '') {
                            unlink("uploadDocuments/Video/VideoFile/" . $prevVideoFile);
                        }
                        move_uploaded_file($videoTempName, "uploadDocuments/Video/VideoFile/" . $videoFileName);
                    }
                    if ($_FILES['fileAudio']['name'] != '') {
                        if (file_exists("uploadDocuments/Video/AudioFile/" . $prevAudio) && $prevAudio != '') {
                            unlink("uploadDocuments/Video/AudioFile/" . $prevAudio);
                        }
                        move_uploaded_file($AudioTempName, "uploadDocuments/Video/AudioFile/" . $audioFileName);
                    }  
                    
                }else{
                    
                    $outMsg = ($insertCheck['@CATEGORY_COUNT']==0)?'Selected Gallery Category not exist.':'Error in Operation';
                    $errFlag = 1;
                    $flag   = 1;
                }
            //}
            }
        }else{
                header("Location:".APP_URL."error");
           } 
        $intCategory       = ($errFlag == 1) ? $selCategory : '0';              
        $strFileName        = ($errFlag == 1) ? htmlentities($fileDocument) : '';
        $strCaption         = ($errFlag == 1) ? htmlentities($txtCaption) : '';
        $strDescription         = ($errFlag == 1) ? htmlentities($txtDescription) : ''; 
       
        $arrResult = array('intCategory' => $intCategory,'strFileName' => $strFileName,'strPlace' => $strPlace,'msg' => $outMsg, 'flag' => $flag, 'strCaption' => $strCaption, 'strDescription' => $strDescription);
        return $arrResult;
    }

// Function To read Gallery  By::T Ketaki Debadarshini   :: On:: 28-Aug-2015
    public function readGallery($id) {

        $result = $this->manageGallery('R',$id,0,0,0,'','','','','','','',0,0,0,''); 
        if (mysqli_num_rows($result) > 0) {
            $row                = mysqli_fetch_array($result);
            $strCaption        =  htmlspecialchars_decode($row['VCH_HEADLINE_E'],ENT_QUOTES);
            $strCaptionH       =  $row['VCH_HEADLINE_O'];
            $strThumbFileName   = $row['VCH_THUMB_IMAGE'];
            $strFileName        = $row['VCH_LARGE_IMAGE'];
            $strDescription         = htmlspecialchars_decode($row['VCH_DESCRIPTION_E'],ENT_NOQUOTES);  
            $strDescriptionH         = $row['VCH_DESCRIPTION_O'];  
            $intCategory           = $row['INT_CATEGORY_ID'];
            $intType          = $row['INT_TYPE_ID'];
            $strEmbedurl        = $row['VCH_URL'];
            $intVideolinktype         = $row['INT_VIDEO_LINK_TYPE'];
            $strPortaltype        = $row['VCH_PORTAL_TYPE'];
        }

        $arrResult = array('strPortaltype'=>$strPortaltype,'intVideolinktype'=>$intVideolinktype,'strEmbedurl'=>$strEmbedurl,'strThumbFileName'=>$strThumbFileName,'intType'=>$intType,'strCaptionH'=>$strCaptionH,'strDescriptionH'=>$strDescriptionH,'strCaption' => $strCaption, 'strFileName' => $strFileName, 'intCategory' => $intCategory, 'strDescription' => htmlspecialchars_decode($strDescription,ENT_NOQUOTES));
        return $arrResult;
    }
    

// Function To Delete Gallery  By::T Ketaki Debadarshini  :: On:: 28-Aug-2015
    public function deleteGallery($action, $ids) {
       $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
            $ctr = 0;
            $msg=0;
            $userId = $_SESSION['adminConsole_userID'];
            $explIds = explode(',', $ids);
            $delRec = 0;
            foreach ($explIds as $indIds) {

                $result = $this->manageGallery($action,$explIds[$ctr],0,0,0,'','','','','','','',0,0,0,'');                              
                $row = mysqli_fetch_array($result);
                if ($row[0] == 0)
                    $delRec++;
                $ctr++;

            }

            if ($action == 'D') {
                if ($delRec > 0)
                    $outMsg .= 'Gallery Detail(s) deleted successfully';
                else
                    $outMsg .= 'Dependency record exist. Gallery Detail(s) can not be  deleted';
            }
            else if ($action == 'AC')
                $outMsg = 'Gallery(s) activated successfully';
            else if ($action == 'IN')
                $outMsg = 'Gallery(s) unpublished successfully';
            else if ($action == 'AR')
                $outMsg = 'Gallery(s) archieved successfully';
            else if($action == 'P')
                $outMsg = 'Gallery(s) Published successfully';
            if($action=='HH')   
                $outMsg = 'Gallery(s) Hide on home page Successfully';  
            if($action=='SH' && $msg==0)    
               $outMsg  = 'Gallery(s) Displayed on home page Successfully';  

            return $outMsg;
         }else{
                header("Location:".APP_URL."error");
           }   
    }

}