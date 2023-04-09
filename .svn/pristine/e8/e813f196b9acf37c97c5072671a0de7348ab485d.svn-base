<?php 
/* * ****Class to manage Skill Master ********************
'By                     : Rahul Kumar Saw	'
'On                     : 20-Aug-2020       '
' Procedure Used        : USP_SKILL_MASTER       '
* ************************************************** */

class clsSkillMaster extends Model {
    
    // Function To Manage Institute By::Rahul Kumar Saw   :: On:: 20-Aug-2020
    public function manageSkillMaster($action, $instituteId,$distId, $instituteName,$instituteName_h, $description,$createdBy) {
        $skillInstituteSql = "CALL USP_SKILL_MASTER('$action',$instituteId,$distId,'$instituteName','$instituteName_h','$description',$createdBy,@OUT);";
       // echo $skillInstituteSql;
        $errAction          = Model::isSpclChar($action);
        $errCategory        = Model::isSpclChar($instituteName);
        $errDescription     = Model::isSpclChar($description);
        
        if ($errAction > 0 || $errCategory > 0 || $errDescription > 0)
            header("Location:" . APP_URL . "error");
        else {
            $locResult = Model::executeQry($skillInstituteSql);
            return $locResult;
        }
    }

// Function To Add Upadate Institute By::Rahul Kumar Saw   :: On:: 20-Aug-2020
    public function addUpdateSkillInstitute($instituteId) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
            $userId                = $_SESSION['adminConsole_userID'];

            $ddlDistrict            = $_POST['ddlDistrict'];
            $txtInstitute           = htmlspecialchars(addslashes($_POST['txtInstitute']), ENT_QUOTES);
            $blankInstitute         = Model::isBlank($txtInstitute);
            $errInstitute           = Model::isSpclChar($_POST['txtInstitute']);

            $lenInstitute           = Model::chkLength('max', $txtInstitute,200);
            $txtDescription        = htmlspecialchars(addslashes($_POST['txtDescription']), ENT_QUOTES);
            $errDescription        = Model::isSpclChar($_POST['txtDescription']); 
           // $radStatus             = $_POST['radStatus'];

            $outMsg                 = '';
            $flag                   = ($instituteId != 0) ? 1 : 0;
            $action                 = ($instituteId == 0) ? 'AI' : 'UI';
            $errFlag                = 0 ;
            if($blankInstitute >0)
            {
                    $errFlag		= 1;
                    $outMsg			= "Mandatory Fields should not be blank";
            }
            else if($lenInstitute>0)
            {
                    $errFlag		= 1;
                    $outMsg			= "Length should not excided maxlength";
            }
            else if($errInstitute>0 || $errDescription>0)
            {
                    $errFlag		= 1;
                    $outMsg			= "Special Characters are not allowed";
            }

            if($errFlag==0){
                  $dupResult = $this->manageSkillMaster('C',$instituteId,0,$txtInstitute,'','',$userId);

                if ($dupResult) {
                    $numRows = $dupResult->fetch_array();
                    if ($numRows > 0) {
                        $outMsg = 'Institute with this name already exists';
                        $errFlag = 1;
                    } else {
                        $result = $this->manageSkillMaster($action,$instituteId,$ddlDistrict,$txtInstitute,'',$txtDescription,$userId);
                        if ($result)
                            $outMsg = ($action == 'AI') ? 'Institute added successfully ' : 'Institute updated successfully';

                        }
                    }
            }
         }else{
                header("Location:" . APP_URL . "error");
           }    
        $strDistrict          = ($errFlag == 1) ? $ddlDistrict : 0;
        $strInstitute         = ($errFlag == 1) ? $txtInstitute : '';
        $strDescription       = ($errFlag == 1) ? htmlentities($txtDescription) : '';       
        
        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag, 'strDistrict' => $strDistrict, 'strInstitute' => $strInstitute, 'strDescription' => $strDescription);
        return $arrResult;
    }

// Function To read Institute  By::Rahul Kumar Saw   :: On:: 20-Aug-2020
    public function readSkillInstitute($id) {

        $result = $this->manageSkillMaster('RI',$id,0,'','','',0);
        if (mysqli_num_rows($result) > 0) {

            $row               = mysqli_fetch_array($result);
            $strDistrict       = $row['INT_DIST_ID'];
            $strInstitute       = $row['VCH_INSTITUTE_NAME'];
            $strDescription    = htmlspecialchars_decode($row['VCH_DESCRIPTION'],ENT_QUOTES);
           // $intStatus        = $row['INT_PUBLISH_STATUS'];            
        }
        $arrResult = array( 'strInstitute' => $strInstitute,'strDistrict' => $strDistrict, 'strDescription' => $strDescription);
        return $arrResult;
    }

    // Function To Add Upadate Branch By::Rahul Kumar Saw   :: On:: 20-Aug-2020
    public function addUpdateSkillBranch($branchId) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
            $userId                = $_SESSION['adminConsole_userID'];
            $txtBranch           = htmlspecialchars(addslashes($_POST['txtBranch']), ENT_QUOTES);
            $blankBranch         = Model::isBlank($txtBranch);
            $errBranch           = Model::isSpclChar($_POST['txtBranch']);

            $lenBranch           = Model::chkLength('max', $txtBranch,200);
            $txtDescription        = htmlspecialchars(addslashes($_POST['txtDescription']), ENT_QUOTES);
            $errDescription        = Model::isSpclChar($_POST['txtDescription']); 
           // $radStatus             = $_POST['radStatus'];

            $outMsg                 = '';
            $flag                   = ($branchId != 0) ? 1 : 0;
            $action                 = ($branchId == 0) ? 'AB' : 'UB';
            $errFlag                = 0 ;
            if($blankBranch >0)
            {
                    $errFlag		= 1;
                    $outMsg			= "Mandatory Fields should not be blank";
            }
            else if($lenBranch>0)
            {
                    $errFlag		= 1;
                    $outMsg			= "Length should not excided maxlength";
            }
            else if($errBranch>0 || $errDescription>0)
            {
                    $errFlag		= 1;
                    $outMsg			= "Special Characters are not allowed";
            }

            if($errFlag==0){
                  $dupResult = $this->manageSkillMaster('CB',$branchId,0,$txtBranch,'','',$userId);

                if ($dupResult) {
                    $numRows = $dupResult->fetch_array();
                    if ($numRows > 0) {
                        $outMsg = 'Branch with this name already exists';
                        $errFlag = 1;
                    } else {
                        $result = $this->manageSkillMaster($action,$branchId,0,$txtBranch,'',$txtDescription,$userId);
                        if ($result)
                            $outMsg = ($action == 'AB') ? 'Branch added successfully ' : 'Branch updated successfully';

                        }
                    }
            }
         }else{
                header("Location:" . APP_URL . "error");
           }    
        $strBranch            = ($errFlag == 1) ? $txtBranch : '';
        $strDescription       = ($errFlag == 1) ? htmlentities($txtDescription) : '';       
        
        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag,  'strBranch' => $strBranch, 'strDescription' => $strDescription);
        return $arrResult;
    }

// Function To read Institute  By::Rahul Kumar Saw   :: On:: 20-Aug-2020
    public function readSkillBranch($id) {

        $result = $this->manageSkillMaster('RB',$id,0,'','','',0);
        if (mysqli_num_rows($result) > 0) {

            $row               = mysqli_fetch_array($result);
            $strBranch         = $row['VCH_BRANCH_NAME'];
            $strDescription    = htmlspecialchars_decode($row['VCH_DESCRIPTION'],ENT_QUOTES);
           // $intStatus        = $row['INT_PUBLISH_STATUS'];            
        }
        $arrResult = array( 'strBranch' => $strBranch, 'strDescription' => $strDescription);
        return $arrResult;
    }

    // Function To Add Upadate Ineested Course By::Rahul Kumar Saw   :: On:: 20-Aug-2020
    public function addUpdateSkillInterestedCourse($interestedCourseId) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
            $userId                = $_SESSION['adminConsole_userID'];
            $txtInterestedCourse = htmlspecialchars(addslashes($_POST['txtInterestedCourse']), ENT_QUOTES);
            $blankInterestedCourse= Model::isBlank($txtInterestedCourse);
            $errInterestedCourse  = Model::isSpclChar($_POST['txtInterestedCourse']);

            $lenInterestedCourse   = Model::chkLength('max', $txtInterestedCourse,200);
            $txtDescription        = htmlspecialchars(addslashes($_POST['txtDescription']), ENT_QUOTES);
            $errDescription        = Model::isSpclChar($_POST['txtDescription']); 
           // $radStatus             = $_POST['radStatus'];

            $outMsg                 = '';
            $flag                   = ($interestedCourseId != 0) ? 1 : 0;
            $action                 = ($interestedCourseId == 0) ? 'AIC' : 'UIC';
            $errFlag                = 0 ;
            if($blankInterestedCourse >0)
            {
                    $errFlag		= 1;
                    $outMsg			= "Mandatory Fields should not be blank";
            }
            else if($lenInterestedCourse>0)
            {
                    $errFlag		= 1;
                    $outMsg			= "Length should not excided maxlength";
            }
            else if($errInterestedCourse>0 || $errDescription>0)
            {
                    $errFlag		= 1;
                    $outMsg			= "Special Characters are not allowed";
            }

            if($errFlag==0){
                  $dupResult = $this->manageSkillMaster('CIC',$interestedCourseId,0,$txtInterestedCourse,'','',$userId);

                if ($dupResult) {
                    $numRows = $dupResult->fetch_array();
                    if ($numRows > 0) {
                        $outMsg = 'Interested Course with this name already exists';
                        $errFlag = 1;
                    } else {
                        $result = $this->manageSkillMaster($action,$interestedCourseId,0,$txtInterestedCourse,'',$txtDescription,$userId);
                        if ($result)
                            $outMsg = ($action == 'AIC') ? 'Interested Course added successfully ' : 'Interested Course updated successfully';

                        }
                    }
            }
         }else{
                header("Location:" . APP_URL . "error");
           }    
        $strInterestedCourse  = ($errFlag == 1) ? $txtInterestedCourse : '';
        $strDescription       = ($errFlag == 1) ? htmlentities($txtDescription) : '';       
        
        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag,  'strInterestedCourse' => $strInterestedCourse, 'strDescription' => $strDescription);
        return $arrResult;
    }

// Function To read Institute  By::Rahul Kumar Saw   :: On:: 20-Aug-2020
    public function readSkillInterestedCourse($id) {

        $result = $this->manageSkillMaster('RIC',$id,0,'','','',0);
        if (mysqli_num_rows($result) > 0) {

            $row               = mysqli_fetch_array($result); 
            $strInterestedCourse= $row['VCH_INTERESTED_COURSE_NAME'];
            $strDescription    = htmlspecialchars_decode($row['VCH_DESCRIPTION'],ENT_QUOTES);
           // $intStatus        = $row['INT_PUBLISH_STATUS'];            
        }
        $arrResult = array( 'strInterestedCourse' => $strInterestedCourse, 'strDescription' => $strDescription);
        return $arrResult;
    }

    // Function To Add Upadate Course By::Rahul Kumar Saw   :: On:: 20-Aug-2020
    public function addUpdateSkillCourse($courseId) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
            $userId               = $_SESSION['adminConsole_userID'];
            $txtCourse            = htmlspecialchars(addslashes($_POST['txtCourse']), ENT_QUOTES);
            $blankCourse          = Model::isBlank($txtCourse);
            $errCourse            = Model::isSpclChar($_POST['txtCourse']);

            $lenCourse             = Model::chkLength('max', $txtCourse,200);
            $txtDescription        = htmlspecialchars(addslashes($_POST['txtDescription']), ENT_QUOTES);
            $errDescription        = Model::isSpclChar($_POST['txtDescription']); 
           // $radStatus             = $_POST['radStatus'];

            $outMsg                 = '';
            $flag                   = ($courseId != 0) ? 1 : 0;
            $action                 = ($courseId == 0) ? 'AC' : 'UC';
            $errFlag                = 0 ;
            if($blankCourse >0)
            {
                    $errFlag		= 1;
                    $outMsg			= "Mandatory Fields should not be blank";
            }
            else if($lenCourse>0)
            {
                    $errFlag		= 1;
                    $outMsg			= "Length should not excided maxlength";
            }
            else if($errCourse>0 || $errDescription>0)
            {
                    $errFlag		= 1;
                    $outMsg			= "Special Characters are not allowed";
            }

            if($errFlag==0){
                  $dupResult = $this->manageSkillMaster('CC',$courseId,0,$txtCourse,'','',$userId);

                if ($dupResult) {
                    $numRows = $dupResult->fetch_array();
                    if ($numRows > 0) {
                        $outMsg = 'Course with this name already exists.';
                        $errFlag = 1;
                    } else {
                        $result = $this->manageSkillMaster($action,$courseId,0,$txtCourse,'',$txtDescription,$userId);
                        if ($result)
                            $outMsg = ($action == 'AC') ? 'Course added successfully ' : 'Course updated successfully';

                        }
                    }
            }
         }else{
                header("Location:" . APP_URL . "error");
           }    
        $strCourse            = ($errFlag == 1) ? $txtCourse : '';
        $strDescription       = ($errFlag == 1) ? htmlentities($txtDescription) : '';       
        
        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag,  'strCourse' => $strCourse, 'strDescription' => $strDescription);
        return $arrResult;
    }

// Function To read Course / Degree  By::Rahul Kumar Saw   :: On:: 20-Aug-2020
    public function readSkillCourse($id) {

        $result = $this->manageSkillMaster('RC',$id,0,'','','',0);
        if (mysqli_num_rows($result) > 0) {

            $row               = mysqli_fetch_array($result); 
            $strInterestedCourse= $row['VCH_COURSE_NAME'];
            $strDescription    = htmlspecialchars_decode($row['VCH_DESCRIPTION'],ENT_QUOTES);
           // $intStatus        = $row['INT_PUBLISH_STATUS'];            
        }
        $arrResult = array( 'strCourse' => $strCourse, 'strDescription' => $strDescription);
        return $arrResult;
    }
// Function To Delete Institute  By::Rahul Kumar Saw   :: On:: 20-Aug-2020
    public function deleteInstitute($action, $ids) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
            $ctr = 0;
            $userId = $_SESSION['adminConsole_userID'];
            $explIds = explode(',', $ids);
            $delRec = 0;
            foreach ($explIds as $indIds) {
                $result = $this->manageSkillMaster($action,$explIds[$ctr],'','','',$userId); 
                $row = mysqli_fetch_array($result);

                if ($row[0] == 0)
                    $delRec++;

                $ctr++;

            }

            if ($action == 'D') {
                if ($delRec > 0)
                    $outMsg .= 'Institute(s) deleted successfully';
                else
                    $outMsg .= 'Dependency record exist. Institute(s) can not be deleted';
            }
            else if ($action == 'AC')
                $outMsg = 'Institute(s) activated successfully';
            else if ($action == 'IN')
                $outMsg = 'Institute(s) unpublished successfully';

            return $outMsg;
         }else{
                header("Location:" . APP_URL . "error");
           }  
    }
    
}
?>