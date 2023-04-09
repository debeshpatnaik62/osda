<?php

/* * ****Class to manage Setor ********************
'By                     : T Ketaki Debadarshini	'
'On                     : 22-March-2017       '
' Procedure Used        : USP_SECTOR       '
* ************************************************** */

class clsSector extends Model {
    
    // Function To Manage Sector By::T Ketaki Debadarshini   :: On:: 22-March-2017
    public function manageSector($action,$intsectorId,$strSectorName,$strSectorNameO,$strSectorAlias,$strImage,$strdescription,$strdescriptionO,$pubStatus,$createdBy,$strmappingCOde=null) {
        $categorySql = "CALL USP_SECTOR('$action',$intsectorId,'$strSectorName','$strSectorNameO','$strSectorAlias','$strImage','$strdescription','$strdescriptionO',$pubStatus,$createdBy,'$strmappingCOde');";
    // echo $categorySql;exit;
        $errAction        = Model::isSpclChar($action);
        $errCategory      = Model::isSpclChar($strSectorName);
        $errAlias         = Model::isSpclChar($strSectorAlias);
        $errDescription   = Model::isSpclChar($strdescription);
        $errImage         = Model::isSpclChar($strImage);
        $errSectorid      = Model::isSpclChar($intsectorId);
        
        if ($errAction > 0 || $errCategory > 0 || $errDescription > 0 || $errAlias>0 || $errImage>0 || $errSectorid>0)
            header("Location:" . APP_URL . "error");
        else {
            $categoryResult = Model::executeQry($categorySql);
            return $categoryResult;
        }
    }

// Function To Add Upadate Sector By::T Ketaki Debadarshini   :: On:: 22-March-2017
    public function addUpdateSector($intsectorId) {
        
       $newSessionId           = session_id();
       $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if ($newSessionId == $hdnPrevSessionId) {  
        $userId                = $_SESSION['adminConsole_userID'];        
        
        $txtHeadlineE          = htmlspecialchars(addslashes($_POST['txtHeadlineE']), ENT_QUOTES);
        $blankCategory         = Model::isBlank($_POST['txtHeadlineE']);
        $errCategory           = Model::isSpclChar($_POST['txtHeadlineE']);
        $lenCategory           = Model::chkLength('max', $_POST['txtHeadlineE'],80);
        
        $txtHeadlineO          = htmlspecialchars($_POST['txtHeadlineO'], ENT_QUOTES, 'UTF-8');
      
        $txtAlias              = htmlspecialchars(trim($_POST['txtAlias']), ENT_QUOTES);
        $blankAlias            = Model::isBlank($_POST['txtAlias']);
        $errAlias              = Model::isSpclChar($_POST['txtAlias']);
        $lenAlias              = Model::chkLength('max', $_POST['txtAlias'],80);
        
        $txtDescription        = htmlspecialchars(addslashes($_POST['txtDescription']), ENT_QUOTES);
        $errDescription        = Model::isSpclChar($_POST['txtDescription']); 
        
        $txtDescriptionO       = htmlspecialchars($_POST['txtDescriptionO'], ENT_QUOTES, 'UTF-8'); //addslashes($_POST['txtDescriptionO']);
        
        $fileDocumentnm         = $_FILES['fileDocument']['name'];
        $prevFile               = $_POST['hdnImageFile'];
        $fileSize               = $_FILES['fileDocument']['size'];
        $fileTemp               = $_FILES['fileDocument']['tmp_name'];
        $ext                    = pathinfo($fileDocumentnm , PATHINFO_EXTENSION);
        $fileDocument           = ($fileDocumentnm != '') ? 'sector' . date("Ymd_His") . '.' . $ext : '';
        $fileMimetype           = mime_content_type($fileTemp);
       
        $radStatus              = $_POST['radStatus'];

        $strmappingCOde         = htmlspecialchars($_POST['ddlMappingData'],ENT_QUOTES);
        
        $outMsg                 = '';
        $flag                   = ($intsectorId != 0) ? 1 : 0;
        $action                 = 'AU';
        $errFlag                = 0 ;
        if(($blankCategory >0) || ($fileDocumentnm=='' && $intsectorId==0) || $blankAlias>0)
        {
                $errFlag		= 1;
                $outMsg			= "Mandatory Fields should not be blank";
        }
        else if($lenCategory>0 || $lenAlias>0)
        {
                $errFlag		= 1;
                $outMsg			= "Length should not excided maxlength";
        }
        else if(($errCategory>0) || ($errDescription>0) || $errAlias>0)
        {
                $errFlag		= 1;
                $outMsg			= "Special Characters are not allowed";
        }
        else if ($fileSize > SIZE1MB) {
                $errFlag               = 1;
                $flag                  = 1;
                $outMsg                = 'File size can not more than 1 MB';
         }
        else if($fileMimetype!='image/gif' && $fileMimetype!='image/jpeg' && $fileMimetype!='image/jpg' && $fileDocumentnm!='') {
                $errFlag               = 1;
                $flag                  = 1;
                $outMsg                = 'Invalid file types. Upload only jpg,jpeg,gif';
            }
      
         if ($fileDocumentnm == '' && $intsectorId != 0)
                $fileDocument = $prevFile;    
            
        if($errFlag==0 && $userId>0){
            try {   
                $result         = $this->manageSector($action,$intsectorId,$txtHeadlineE,$txtHeadlineO,$txtAlias,$fileDocument,$txtDescription,$txtDescriptionO,$radStatus,$userId, $strmappingCOde );
                if($result)
                {
                    $numRow     = $result-> fetch_array();
                    $statusflag = $numRow['@P_STATUS']; 

                    if($statusflag =='0'){
                      $outMsg   = 'Sector Details already exists';
                      $errFlag  = 1;
                      $flag     = 1;
                    }else{
                        $outMsg = ($intsectorId != 0) ?'Sector Details updated successfully':'Sector Details added successfully';
                        
                         if ($fileDocument != '') {

                            if (file_exists("uploadDocuments/sector/" . $prevFile) && $prevFile != '' && $fileDocumentnm!= '') {                                  
                                 unlink("uploadDocuments/sector/" . $prevFile);  

                           }
                           if($fileDocumentnm != '') 
                            {
                                //$this->GetResizeImage($this,'uploadDocuments/sector/',70,70,$fileDocument,$fileTemp);
                               move_uploaded_file($fileTemp, "uploadDocuments/sector/" . $fileDocument);
                            }
                           
                        }
                   }
                }
             } catch (Exception $e) { 
               $outMsg =  'Some error occured. Please try again'; 
             } 
        }
      }else{
           header("Location:" . APP_URL . "error");
      }
          
        $strHeadlineE        = ($errFlag == 1) ? htmlentities($txtHeadlineE) : ''; 
        $strDescription      = ($errFlag == 1) ? htmlentities($txtDescription) : '';   
        $strAlias            = ($errFlag == 1) ? htmlentities($txtAlias) : '';    
        $strHeadlineO        = ($errFlag == 1) ? htmlentities($txtHeadlineO) : '';
        $strDescriptionO     = ($errFlag == 1) ? htmlentities($txtDescriptionO) : '';    
        $intStatus           = ($errFlag == 1) ? $radStatus : '2'; 
        $strmappingCOde      =  ($errFlag == 1) ? htmlentities($strmappingCOde) : ''; 
        $arrResult           = array('msg' =>$outMsg, 'flag' =>$flag, 'strAlias' =>$strAlias,'strHeadlineE' =>$strHeadlineE, 'strDescription' =>$strDescription,'strHeadlineO' =>$strHeadlineO,'strDescriptionO' =>$strDescriptionO, 'intStatus' =>$intStatus,'mappingCode'=> $strmappingCOde );
        return $arrResult;
    }

// Function To read Sector By::T Ketaki Debadarshini   :: On:: 22-March-2017
    public function readSector($id) {

        $result = $this->manageSector('R',$id,'','','','','','',0,0);
        if (mysqli_num_rows($result) > 0) {

            $row               = mysqli_fetch_array($result);
                 
        }
        return $row;
    }
    
    // Function To read Sector by alias By::T Ketaki Debadarshini   :: On:: 28-March-2017
    public function readSectorbyAlias($strAlias) {

        $result = $this->manageSector('RA',0,'','',$strAlias,'','','',0,0);
        if (mysqli_num_rows($result) > 0) {

            $row               = mysqli_fetch_array($result);
                 
        }
        return $row;
    }

// Function To Delete Sector By::T Ketaki Debadarshini   :: On:: 22-March-2017
    public function deleteSector($action, $ids) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
            $ctr        = 0;
            $userId     = $_SESSION['adminConsole_userID'];
            $explIds    = explode(',', $ids);
            $delRec     = 0;
            foreach ($explIds as $indIds) {
                $result = $this->manageSector($action,$explIds[$ctr],'','','','','','',0,$userId);
                $row    = mysqli_fetch_array($result);
                if ($row[0] == 0)
                    $delRec++;
                $ctr++;
            }

            if ($action == 'D') {
                if ($delRec > 0)
                    $outMsg .= 'Sector(s) deleted successfully';
                else
                    $outMsg .= 'Dependency record exist. Sector(s) can not be deleted';
            }
            else if ($action == 'AC')
                $outMsg = 'Sector(s) activated successfully';
            else if ($action == 'IN')
                $outMsg = 'Sector(s) unpublished successfully';
            else if($action=='HH')	
                $outMsg	=  'Sector(s) hide at home page Successfully';	
            else if($action=='SH')	
               $outMsg	=  'Sector(s) displayed at home page Successfully';  

            return $outMsg;
         }else{
                header("Location:".APP_URL."error");
           }    
    }


}



?>
