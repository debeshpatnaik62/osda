<?php

/* * ****Class to manage Skill Category ********************
'By                     : Rahul Kumar Saw	'
'On                     : 22-June-2022       '
' Procedure Used        : USP_SKILL_CATEGORY       '
* ************************************************** */

class clsSkillCategory extends Model {
    
    // Function To Manage Category By::Rahul Kumar Saw   :: On:: 22-June-2022 
    public function manageSkillCategory($action, $catId,$intcatType, $category, $categoryO, $description,$descriptionO,$pubStatus ,$createdBy) {
        $categorySql = "CALL USP_SKILL_CATEGORY('$action', $catId,$intcatType,'$category','$categoryO', '$description','$descriptionO','$pubStatus', '$createdBy',@OUT);";
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

// Function To Add Upadate Skill Category By::Rahul Kumar Saw   :: On:: 22-June-2022 
    public function addUpdateSkillCategory($catId) {
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
        
        $radStatus              = $_POST['radStatus'];
        
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
       
        $dupResult = $this->manageSkillCategory('CD', $catId,0,$txtCategory,'','','',0,$userId);
        if($errFlag==0 ){
        if ($dupResult) {
            $numRows = $dupResult->fetch_array();

            if ($numRows > 0) {
                $outMsg = 'Skill Category with this name already exists';
                $errFlag = 1;
                  $flag   = 1;
            } else {
                $result = $this->manageSkillCategory($action, $catId,0,$txtCategory,$txtCategory_O,$txtDescription,$txtDescriptionO,$radStatus,$userId);
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

// Function To read Skill Category  By::Rahul Kumar Saw   :: On:: 22-June-2022 
    public function readSkillCategory($id) {

        $result = $this->manageSkillCategory('R', $id,0,'','','','',0 ,0);
        if (mysqli_num_rows($result) > 0) {

            $row               = mysqli_fetch_array($result);
            $strCategory       = $row['VCH_CATEGORY_NAME'];
            $strDescription    = htmlspecialchars_decode($row['VCH_DESCRIPTION'],ENT_QUOTES);
            
            $strCategoryO       = $row['VCH_CATEGORY_NAME_O'];
            $strDescriptionO    = $row['VCH_DESCRIPTION_O'];
            
            $intStatus        = $row['INT_PUBLISH_STATUS'];            
        }

        $arrResult = array( 'strCategory' => $strCategory, 'strDescription' => $strDescription,'strCategoryO' => $strCategoryO, 'strDescriptionO' => $strDescriptionO,'intStatus'=>$intStatus);
        return $arrResult;
    }




// Function To Delete Skill Category  By::Rahul Kumar Saw   :: On:: 22-June-2022 
    public function deleteSkillCategory($action, $ids) {
        $newSessionId           = session_id();
        $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
        if($newSessionId == $hdnPrevSessionId) {   
                $ctr = 0;
                $userId = $_SESSION['adminConsole_userID'];
                $explIds = explode(',', $ids);
                $delRec = 0;
                foreach ($explIds as $indIds) {
                    $result = $this->manageSkillCategory($action,$explIds[$ctr],0,'','','','', 0 ,$userId); 
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


/* * ****Class to manage Skill ********************
'By                     : Rahul Kumar Saw '
'On                     : 22-June-2022       '
' Procedure Used        : USP_Skill       '
* ************************************************** */

class clsSkill extends Model {

// Function To Manage Skill By::Rahul Kumar Saw   :: On:: 22-June-2022 
    public function manageSkill($action,$skillId,$categoryId,$caption,$captionH,$description,$descriptionO,$catE,$catO,$pubStatus,$archiveStatus,$createdBy) {
       
        $skillId        = htmlspecialchars(addslashes($skillId),ENT_QUOTES);
        $caption          = htmlspecialchars(addslashes($caption),ENT_QUOTES);    
        $description      = addslashes($description);
        
        $SkillSql       = "CALL USP_SKILL('$action',$skillId,$categoryId,'$caption','$captionH','$description','$descriptionO','$catE','$catO',$pubStatus,$archiveStatus,$createdBy,@OUT);";
       //echo   $SkillSql;   
        $errAction        = Model::isSpclChar($action);
        $errSkillId        = Model::isSpclChar($skillId);
        $errCaption       = Model::isSpclChar($caption);
        $errcategoryId    = Model::isSpclChar($categoryId);    
        if ($errAction > 0 || $errCaption > 0 || $errcategoryId>0 || $errSkillId>0)
            header("Location:" . APP_URL . "error");
        else {
            $SkillResult = Model::executeQry($SkillSql); 
            return $SkillResult;
            
        }
    }

// Function To Add Upadate Skill By::Rahul Kumar Saw   :: On:: 22-June-2022
    public function addUpdateSkill($skillId) { 
       $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {    
      
        $userId         = (isset($_SESSION['adminConsole_userID']))?$_SESSION['adminConsole_userID']:0;
        $skillId        = (isset($skillId))?$skillId:0;
        
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
        $flag               = ($skillId != 0) ? 1 : 0;
        $action             = ($skillId == 0) ? 'A' : 'U';
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
        
       // $dupResult = $this->manageSkill('CD',$SkillId,$numcategoryId,$setType,0,$txtHeadline,'','','','','','',0,0,0,'');
      // 
        if($errFlag==0 && $userId>0){
            /* if ($dupResult) {
                $numRows = $dupResult->fetch_array();
                if ($numRows > 0) {
                    $outMsg = 'Media Details already exists';
                    $errFlag = 1;
                    $flag   = 1;
                } else {*/
                    $result = $this->manageSkill($action,$skillId,$numcategoryId,$txtHeadline,$txtHeadlineH,$txtDescription,$txtDescriptionH,'','',0,0,$userId);
                   if ($result)
                    $outMsg = ($action == 'A') ? 'Skill added successfully ' : 'Skill updated successfully';                    
                
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

// Function To read Skill  By::Rahul Kumar Saw   :: On:: 22-June-2022
    public function readSkill($id) {

        $result = $this->manageSkill('R',$id,0,'','','','','','',0,0,0); 
        if (mysqli_num_rows($result) > 0) {
            $row               = mysqli_fetch_array($result);
            $strCaption        = htmlspecialchars_decode($row['vchSkillName'],ENT_QUOTES);
            $strCaptionH       = $row['vchSkillNameO'];
            $strDescription    = htmlspecialchars_decode($row['vchDescription'],ENT_NOQUOTES);  
            $strDescriptionH   = $row['vchDescriptionO'];  
            $intCategory       = $row['intSkillCategory'];
        }

        $arrResult = array('strCaptionH'=>$strCaptionH,'strDescriptionH'=>$strDescriptionH,'strCaption' => $strCaption, 'intCategory' => $intCategory, 'strDescription' => $strDescription);
        return $arrResult;
    }
    

// Function To Delete Skill  By::Rahul Kumar Saw  :: On:: 22-June-2022
    public function deleteSkill($action, $ids) {
       $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
            $ctr = 0;
            $msg=0;
            $userId = $_SESSION['adminConsole_userID'];
            $explIds = explode(',', $ids);
            $delRec = 0;
            foreach ($explIds as $indIds) {

                $result = $this->manageSkill($action,$explIds[$ctr],0,'','','','','','',0,0,0);                              
                $row = mysqli_fetch_array($result);
                if ($row[0] == 0)
                    $delRec++;
                $ctr++;

            }

            if ($action == 'D') {
                if ($delRec > 0)
                    $outMsg .= 'Skill Detail(s) deleted successfully';
                else
                    $outMsg .= 'Dependency record exist. Skill Detail(s) can not be  deleted';
            }
            else if ($action == 'IN')
                $outMsg = 'Skill(s) unpublished successfully';
            else if($action == 'P')
                $outMsg = 'Skill(s) Published successfully';
            if($action=='HH')   
                $outMsg = 'Skill(s) Hide on home page Successfully';  
            if($action=='SH' && $msg==0)    
               $outMsg  = 'Skill(s) Displayed on home page Successfully';  

            return $outMsg;
         }else{
                header("Location:".APP_URL."error");
           }   
    }

}