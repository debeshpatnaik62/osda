<?php

/* * ****Class to manage employer registration details ********************
' By                     : T KEtaki Debadarshini      '
' On                     : 09-Jan-2018     '
' Procedure Used         : USP_EMPLOYER_REGISTRATION '
* ************************************************** */

class clsEmployerRegistration extends Model {

// Function To Manage employer registration details By::T Ketaki Debadarshini     :: On:: 09-Jan-2018
   public function manageEmployerReg($action,$intEmployerId,$strOrganization,$intSectorId,$intCourseId,$strOtherCourse,$intCandidateNo,$strMessage,$strContactno,$strEmail,$frmDate,$toDate,$intCreatedBy,$intPgsize) {                  
     
        $employerSql        = "CALL USP_EMPLOYER_REGISTRATION('$action',$intEmployerId,'$strOrganization',$intSectorId,$intCourseId,'$strOtherCourse',$intCandidateNo,'$strMessage','$strContactno','$strEmail','$frmDate','$toDate',$intCreatedBy,$intPgsize)";
        // echo $employerSql; 
        
        $errAction          = Model::isSpclChar($action);
        $errOrg             = Model::isSpclChar($strOrganization);
        $errOtherCourse     = Model::isSpclChar($strOtherCourse);
        $errMsg             = Model::isSpclChar($strMessage);
        $errContactNo       = Model::isSpclChar($strContactno);
        $errEmail           = Model::isSpclChar($strEmail);
        $errFrmDate         = Model::isSpclChar($frmDate);
        $errToDate          = Model::isSpclChar($toDate);
        $errSectorId        = Model::isSpclChar($intSectorId);
        $errCourseId        = Model::isSpclChar($intCourseId);
        $errCandidateNo     = Model::isSpclChar($intCandidateNo);

        if ($errAction > 0 || $errOrg > 0 || $errOtherCourse > 0 ||  $errMsg > 0 ||  $errContactNo > 0 || $errEmail>0 || $errFrmDate>0 ||  $errToDate > 0 ||  $errSectorId > 0 || $errCourseId>0 || $errCandidateNo>0)
            header("Location:" . APP_URL . "error");
        else{
            $employerResult = Model::executeQry($employerSql);
            return $employerResult;
        } 
       
    }

 
// Function To Delete employer registration details By::T Ketaki Debadarshini     :: On:: 09-Jan-2018
    public function deleteEmployer($action, $ids) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {
          
                $ctr                = 0;        
                $explIds            = explode(',', $ids);
                $delRec             = 0;
                $userId             = $_SESSION['adminConsole_userID'];
                $msgTitle           = 'Employer Registration Details(s)';
                foreach ($explIds as $indIds) {

                   $result          = $this->manageEmployerReg($action,$explIds[$ctr],'',0,0,'',0,'','','','0000-00-00','0000-00-00',$userId,0);
                   $row             = $result->fetch_array();

                   if ($row[0] == 0)   
                       $delRec++;

                   $ctr++;
                }

                if ($action == 'D') {
                    
                    if ($delRec > 0)
                        $outMsg .= $msgTitle.' deleted successfully';
                    else
                        $outMsg .= 'Dependency record exist. '.$msgTitle.' can not be deleted';
                }
               
                return $outMsg;
          }else{
                header("Location:" . APP_URL . "error");
           }    
    }

}

?>
