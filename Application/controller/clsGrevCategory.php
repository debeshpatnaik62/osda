<?php

/* * ****Class to manage Grev Category ********************
'By                     : Rahul Kumar Saw	'
'On                     : 03-Apr-2023       '
' Procedure Used        : USP_GREV_CATEGORY       '
* ************************************************** */

class clsGrevCategory extends Model {
    
    // Function To Manage Category By::Rahul Kumar Saw   :: On:: 03-Apr-2023 
    public function manageGrevCategory($action, $catId,$intcatType, $category, $categoryO, $description,$descriptionO,$pubStatus ,$createdBy) {
        $categorySql = "CALL USP_GREV_CATEGORY('$action', $catId,$intcatType,'$category','$categoryO', '$description','$descriptionO','$pubStatus', '$createdBy',@OUT);";
  //echo $categorySql;exit;
        $errAction          = Model::isSpclChar($action);
        $errCatId           = Model::isSpclChar($catId);
        $errCategory        = Model::isSpclChar($category);
        $errDescription     = Model::isSpclChar($description);
        
        if ($errAction > 0 || $errCategory > 0 || $errDescription > 0 || $errCatId>0)
            header("Location:" . APP_URL . "error");
        else {
            $categoryResult = Model::executeQry($categorySql);
            return $categoryResult;
        }
    }

// Function To Add Upadate Grev Category By::Rahul Kumar Saw   :: On:: 03-Apr-2023 
    public function addUpdateGrevCategory($catId) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
        $userId                 = $_SESSION['adminConsole_userID'];        
        
        
        $txtCategory           = htmlspecialchars(addslashes($_POST['txtCategory']), ENT_QUOTES);
        $blankCategory         = Model::isBlank($txtCategory);
        $errCategory           = Model::isSpclChar($_POST['txtCategory']);
        $lenCategory           = Model::chkLength('max', $txtCategory,200);
        
        $txtCategory_O           = htmlspecialchars($_POST['txtCategory_O'], ENT_QUOTES, 'UTF-8');
        $errCategoryO            = Model::isSpclChar($txtCategory_O);
      
        $txtDescription          = htmlspecialchars(addslashes($_POST['txtDescription']), ENT_QUOTES);
        $errDescription          = Model::isSpclChar($_POST['txtDescription']); 
        
        $txtDescriptionO         = htmlspecialchars($_POST['txtDescriptionO'], ENT_QUOTES, 'UTF-8');
        $errDescriptionO         = Model::isSpclChar($txtDescriptionO); 
        
        $radStatus              = !empty($_POST['radStatus'])?$_POST['radStatus']:0;
        
        $outMsg                 = '';
        $flag                   = ($catId != 0) ? 1 : 0;
        $action                 = ($catId == 0) ? 'A' : 'U';
        $errFlag                = 0 ;
        if(($blankCategory >0))
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
       
        $dupResult = $this->manageGrevCategory('CD', $catId,0,$txtCategory,'','','',0,$userId);
        if($errFlag==0 ){
        if ($dupResult) {
            $numRows = $dupResult->fetch_array();

            if ($numRows > 0) {
                $outMsg = 'Category with this name already exists';
                $errFlag = 1;
                  $flag   = 1;
            } else {
                $result = $this->manageGrevCategory($action, $catId,0,$txtCategory,$txtCategory_O,$txtDescription,$txtDescriptionO,$radStatus,$userId);
                if ($result)
                    $outMsg = ($action == 'A') ? 'Category added successfully ' : 'Category updated successfully';
               
                }
            }
        }
       }else{
                header("Location:".APP_URL."error");
           }     
        $strCategory        = ($errFlag == 1) ? htmlentities($txtCategory) : '';
        $strCategoryO       = ($errFlag == 1) ? htmlentities($txtCategory_O) : '';
        $strDescription     = ($errFlag == 1) ? htmlentities($txtDescription) : '';       
        $strDescriptionO    = ($errFlag == 1) ? htmlentities($txtDescriptionO) : '';       
        $intStatus          = ($errFlag == 1) ? $radStatus : '0';  
        $arrResult = array('msg' => $outMsg, 'flag' => $flag, 'strCategory' => $strCategory,'strCategoryO' => $strCategoryO, 'strDescription' => $strDescription,'strDescriptionO' => $strDescriptionO, 'intStatus' => $intStatus);
        return $arrResult;
    }

// Function To read Grev Category  By::Rahul Kumar Saw   :: On:: 03-Apr-2023 
    public function readGrevCategory($id) {

        $result = $this->manageGrevCategory('R', $id,0,'','','','',0 ,0);
        if (mysqli_num_rows($result) > 0) {

            $row               = mysqli_fetch_array($result);
            $strCategory       = $row['VCH_CATEGORY_NAME'];
            $strDescription    = htmlspecialchars_decode($row['VCH_DESCRIPTION'],ENT_QUOTES);
            
            $strCategoryO       = $row['VCH_CATEGORY_NAME_O'];
            $strDescriptionO    = htmlspecialchars_decode($row['VCH_DESCRIPTION_O'],ENT_QUOTES);
            
            $intStatus        = $row['INT_PUBLISH_STATUS'];            
        }

        $arrResult = array( 'strCategory' => $strCategory, 'strDescription' => $strDescription,'strCategoryO' => $strCategoryO, 'strDescriptionO' => $strDescriptionO,'intStatus'=>$intStatus);
        return $arrResult;
    }




// Function To Delete Grev Category  By::Rahul Kumar Saw   :: On:: 03-Apr-2023 
    public function deleteGrevCategory($action, $ids) {
        $newSessionId           = session_id();
        $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
        if($newSessionId == $hdnPrevSessionId) {   
                $ctr = 0;
                $userId = $_SESSION['adminConsole_userID'];
                $explIds = explode(',', $ids);
                $delRec = 0;
                foreach ($explIds as $indIds) {
                    $result = $this->manageGrevCategory($action,$explIds[$ctr],0,'','','','', 0 ,$userId); 
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
                else if ($action == 'P')
                    $outMsg = 'Category(s) published successfully';
                else if ($action == 'IN')
                    $outMsg = 'Category(s) unpublished successfully';

                return $outMsg;
         }else{
                header("Location:".APP_URL."error");
           }   
    }


}


/* * ****Class to manage Grev ********************
'By                     : Rahul Kumar Saw '
'On                     : 03-Apr-2023       '
' Procedure Used        : USP_Grev       '
* ************************************************** */

class clsGrevSubCategory extends Model {

// Function To Manage Grev By::Rahul Kumar Saw   :: On:: 03-Apr-2023 
    public function manageGrevSubCategory($action,$GrevId,$categoryId,$caption,$captionH,$description,$descriptionO,$catE,$catO,$pubStatus,$archiveStatus,$createdBy) {
       
        $GrevId        = htmlspecialchars(addslashes($GrevId),ENT_QUOTES);
        $caption          = htmlspecialchars(addslashes($caption),ENT_QUOTES);    
        $description      = addslashes($description);
        
        $GrevSql       = "CALL USP_GREV_SUB_CATEGORY('$action',$GrevId,$categoryId,'$caption','$captionH','$description','$descriptionO','$catE','$catO',$pubStatus,$archiveStatus,$createdBy,@OUT);";
       //echo   $GrevSql;   
        $errAction        = Model::isSpclChar($action);
        $errGrevId        = Model::isSpclChar($GrevId);
        $errCaption       = Model::isSpclChar($caption);
        $errcategoryId    = Model::isSpclChar($categoryId);    
        if ($errAction > 0 || $errCaption > 0 || $errcategoryId>0 || $errGrevId>0)
            header("Location:" . APP_URL . "error");
        else {
            $GrevResult = Model::executeQry($GrevSql); 
            return $GrevResult;
            
        }
    }

// Function To Add Upadate Grev By::Rahul Kumar Saw   :: On:: 03-Apr-2023
    public function addUpdateGrev($GrevId) { 
       $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {    
      
        $userId         = (isset($_SESSION['adminConsole_userID']))?$_SESSION['adminConsole_userID']:0;
        $GrevId        = (isset($GrevId))?$GrevId:0;
        
        $numcategoryId  = $_POST['selCategory'];
        $txtHeadline    = htmlspecialchars($_POST['txtCaption'], ENT_QUOTES);
        $blankCaption   = Model::isBlank($txtHeadline);
        $errCaption     = Model::isSpclChar($txtHeadline);
        
        $txtDescription  = htmlspecialchars($_POST['txtDescription'], ENT_QUOTES);
        $errDescription  = Model::isSpclChar($txtDescription);
        $txtDescriptionH = addslashes($_POST['txtDescriptionH']);
        $errDescriptionH  = Model::isSpclChar($txtDescriptionH);
        
        $txtHeadlineH   = addslashes($_POST['txtCaptionH']);
        $errHeadlineH   = Model::isSpclChar($txtHeadlineH);
        
      
        $outMsg             = '';
        $flag               = ($GrevId != 0) ? 1 : 0;
        $action             = ($GrevId == 0) ? 'A' : 'U';
        $errFlag            = 0 ;
      
        if(($numcategoryId==0) || $blankCaption >0) 
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
        }
        
       // $dupResult = $this->manageGrev('CD',$GrevId,$numcategoryId,$setType,0,$txtHeadline,'','','','','','',0,0,0,'');
      // 
        if($errFlag==0 && $userId>0){
            /* if ($dupResult) {
                $numRows = $dupResult->fetch_array();
                if ($numRows > 0) {
                    $outMsg = 'Media Details already exists';
                    $errFlag = 1;
                    $flag   = 1;
                } else {*/
                    $result = $this->manageGrev($action,$GrevId,$numcategoryId,$txtHeadline,$txtHeadlineH,$txtDescription,$txtDescriptionH,'','',0,0,$userId);
                   if ($result)
                    $outMsg = ($action == 'A') ? 'Grev added successfully ' : 'Grev updated successfully';                    
                
            }
        }else{
                header("Location:".APP_URL."error");
           } 
        $intCategory       = ($errFlag == 1) ? $numcategoryId : '0';              
        $strCaption        = ($errFlag == 1) ? htmlentities($txtHeadline) : '';
        $strCaptionH       = ($errFlag == 1) ? htmlentities($txtHeadlineH) : '';
        $strDescription    = ($errFlag == 1) ? htmlentities($txtDescription) : ''; 
        $strDescriptionH   = ($errFlag == 1) ? htmlentities($txtDescriptionH) : ''; 
       
        $arrResult = array('intCategory' => $intCategory,'strCaptionH' => $strCaptionH,'strDescriptionH' => $strDescriptionH,'msg' => $outMsg, 'flag' => $flag, 'strCaption' => $strCaption, 'strDescription' => $strDescription);
        return $arrResult;
    }

// Function To read Grev  By::Rahul Kumar Saw   :: On:: 03-Apr-2023
    public function readGrev($id) {

        $result = $this->manageGrev('R',$id,0,'','','','','','',0,0,0); 
        if (mysqli_num_rows($result) > 0) {
            $row               = mysqli_fetch_array($result);
            $strCaption        = htmlspecialchars_decode($row['vchGrevName'],ENT_QUOTES);
            $strCaptionH       = $row['vchGrevNameO'];
            $strDescription    = htmlspecialchars_decode($row['vchDescription'],ENT_NOQUOTES);  
            $strDescriptionH   = $row['vchDescriptionO'];  
            $intCategory       = $row['intGrevCategory'];
        }

        $arrResult = array('strCaptionH'=>$strCaptionH,'strDescriptionH'=>$strDescriptionH,'strCaption' => $strCaption, 'intCategory' => $intCategory, 'strDescription' => $strDescription);
        return $arrResult;
    }
    

// Function To Delete Grev  By::Rahul Kumar Saw  :: On:: 03-Apr-2023
    public function deleteGrev($action, $ids) {
       $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
            $ctr = 0;
            $msg=0;
            $userId = $_SESSION['adminConsole_userID'];
            $explIds = explode(',', $ids);
            $delRec = 0;
            foreach ($explIds as $indIds) {

                $result = $this->manageGrev($action,$explIds[$ctr],0,'','','','','','',0,0,0);                              
                $row = mysqli_fetch_array($result);
                if ($row[0] == 0)
                    $delRec++;
                $ctr++;

            }

            if ($action == 'D') {
                if ($delRec > 0)
                    $outMsg .= 'Grev Detail(s) deleted successfully';
                else
                    $outMsg .= 'Dependency record exist. Grev Detail(s) can not be  deleted';
            }
            else if ($action == 'IN')
                $outMsg = 'Grev(s) unpublished successfully';
            else if($action == 'P')
                $outMsg = 'Grev(s) Published successfully';
            if($action=='HH')   
                $outMsg = 'Grev(s) Hide on home page Successfully';  
            if($action=='SH' && $msg==0)    
               $outMsg  = 'Grev(s) Displayed on home page Successfully';  

            return $outMsg;
         }else{
                header("Location:".APP_URL."error");
           }   
    }

}