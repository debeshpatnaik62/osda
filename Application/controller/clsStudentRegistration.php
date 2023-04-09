<?php

/* * ****Class to manage studentreg details ********************
' By                     : Rajesh Parida  '
' On                     : 10-Oct-2016     '
' Procedure Used         : USP_STUDENT_REGISTRATION '
* ************************************************** */

class clsStudentRegistration extends Model {

// Function To Manage studentreg details By::Rajesh Parida    :: On:: 10-Oct-2016
   public function manageStudentReg($action,$intSRId,$strSname,$intSage,$intSgender,$intSlocality,$intSdistrict,$intSadmissiondistrict,$intScourseType,$intSsector,$strSemail,$strSphone,$strSadharno,$intScreatedby,$intSpublish) {                  
        
        $studentregSql = "CALL USP_STUDENT_REGISTRATION('$action',$intSRId,'$strSname',$intSage,$intSgender,'$intSlocality',$intSdistrict,'$intSadmissiondistrict','$intScourseType','$intSsector','$strSemail','$strSphone','$strSadharno',$intScreatedby,$intSpublish)";
        // echo $studentregSql; 
 
        $studentregResult = Model::executeQry($studentregSql);
        return $studentregResult;
        
    }

    
 
// Function To Delete District details By::Rajesh Parida    :: On:: 10-Oct-2016
    public function deleteStudent($action, $ids) {
      $newSessionId           = session_id();
    $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
                $ctr        = 0;        
                $explIds    = explode(',', $ids);
                $delRec     = 0;

                $msgTitle           = 'Student Registration Details(s)';
                foreach ($explIds as $indIds) {

                   $result = $this->manageStudentReg($action,$explIds[$ctr],'',0,0,0,0,0,0,0,'','','',0,0);
					
                    $row = $result->fetch_array();

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
                else if ($action == 'AC')
                    $outMsg = $msgTitle.' activated successfully';
                else if ($action == 'IN')
                    $outMsg =  $msgTitle.' unpublished successfully';
                else if ($action == 'AR')
                    $outMsg =  $msgTitle.' archieved successfully';
                else if($action == 'P'){
                    $outMsg =  $msgTitle.' Published successfully';
                }
                return $outMsg;
          }else{
                header("Location:" . APP_URL . "error");
           }    
    }

}

?>
