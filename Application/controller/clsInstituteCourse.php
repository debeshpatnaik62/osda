<?php

    /******Class to manage institute/course Details ********************
    ' By                     : T Ketaki Debadarshini	'
    ' On                     : 23-March-2017            '
    ' Procedure Used         : USP_INSTITUTE_COURSE       '
    *****************************************************************/

    class clsInstituteCourse extends Model {

        // Function To Manage institute/course Details By::T Ketaki Debadarshini   :: On:: 23-March-2017
        public function manageInstituteCourse($action,$intId,$intDistId,$intInstituteId,$intSectorId,$intCourseId,$intBatchNo,$intBatchstrength,$createdBy,$strQuery) {
            $courseSql = "CALL USP_INSTITUTE_COURSE('$action',$intId,$intDistId,$intInstituteId,$intSectorId,$intCourseId,$intBatchNo,$intBatchstrength,$createdBy,'$strQuery');";
          //echo $courseSql;
            $errAction          = Model::isSpclChar($action);
            $errDistId          = Model::isSpclChar($intDistId);
            $errInstituteId     = Model::isSpclChar($intInstituteId);
            $errId              = Model::isSpclChar($intId);

            if ($errAction > 0 || $errDistId>0 || $errInstituteId>0 || $errId>0)
                header("Location:" . APP_URL . "error");
            else{
                $courseResult = Model::executeQry($courseSql);
                return $courseResult;
            }
        }

        
    // Function To Add Upadate institute/course Details By::T Ketaki Debadarshini   :: On:: 23-March-2017
        public function addUpdateInstituteCourse($intInstituteId) {
         $newSessionId           = session_id();
        $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
        if($newSessionId == $hdnPrevSessionId) {      
                $userId                = USER_ID;

                $courseArr             = array();
                $batchArr              = array();
                $batchStrengthArr      = array();
                $hidIdArr              = array();
                $errFlag               = 0;

                $ddlDistrict            = $_POST['ddlDistrict']; 

                $ddlInstitute           = $_POST['ddlInstitute'];
                $ddlSector              = 0;

                $selCourse              = $_POST['selCourse']; 
                $txtBatch               = $_POST['txtBatch'];
                $txtBatchStrength       = $_POST['txtBatchStrength'];
                $txtHidId               = $_POST['txtHidId'];

                $batchErr               = 0; 
                $batchstrengthErr       = 0; 
                $selCourseErr           = 0;
                $hidIdErr               = 0;

                $noOfCourse             = count($selCourse);
                $sqlTagging             = '';
                for ($i = 0; $i < $noOfCourse; $i++) {

                     array_push($courseArr, $selCourse[$i]);
                     array_push($batchArr, $txtBatch[$i]);
                     array_push($batchStrengthArr, $txtBatchStrength[$i]);
                     array_push($hidIdArr, $txtHidId[$i]);

                     if(Model::isSpclChar($selCourse[$i])>0)
                             $selCourseErr            = 1;
                     else if(Model::isSpclChar($txtBatch[$i])>0)
                             $batchErr                = 1;
                     else if(Model::isSpclChar($txtBatchStrength[$i])>0)
                             $batchstrengthErr        = 1;
                     else if(Model::isSpclChar($txtHidId[$i])>0)
                             $hidIdErr                = 1;

                     $txtBatchNo             = ($txtBatch[$i]!='')?$txtBatch[$i]:0;
                     $txtBatchStrengthNo     = ($txtBatchStrength[$i]!='')?$txtBatchStrength[$i]:0;

                    $sqlTagging            .= '('.$txtHidId[$i].','.$ddlInstitute.','.$selCourse[$i].','.$txtBatchNo.','.$txtBatchStrengthNo.','.$userId.'),';
                }
                $sqlTagging              =  rtrim($sqlTagging,',');

                $sqlCoursedup            = implode(',', $courseArr);

                $outMsg                  = '';
                $flag                    =  0;
                $action                  = 'AU';
                $errFlag                 = 0 ;

                if($ddlInstitute==0)
                {
                    $errFlag            = 1;
                    $outMsg             = "Mandatory Fields should not be blank";
                }
                else if($noOfCourse !== count(array_unique($selCourse)))
                {
                    $errFlag            = 1;
                    $outMsg             = "Please remove duplicate Courses";
                }
                else if($selCourseErr > 0 || $batchErr>0 || $batchstrengthErr>0 || $hidIdErr>0)
                {
                    $errFlag  =  1;
                    $flag     =  1;
                    $outMsg   =  "Special characters are not allowed";
                }

                $duprows   = 0;
                if($errFlag==0){
                    try {

                        $result         = $this->manageInstituteCourse($action,0,$ddlDistrict,$ddlInstitute,$ddlSector,0,0,0,$userId,$sqlTagging);
                        if($result)
                        {
                            $outMsg = ($intInstituteId != 0) ?'Institute wise courses details updated successfully':'Institute wise courses details added successfully';

                        } 

                     } catch (Exception $e) { 
                       $outMsg =  'Some error occured. Please try again'; 
                       $errFlag  =  1;
                     } 
                }
             }else{
                header("Location:".APP_URL."error");
             }  
           

            $arrResult = array('msg' => $outMsg, 'flag' => $errFlag);
            return $arrResult;
        }
      
        
    // Function To read course Details By::T Ketaki Debadarshini   :: On:: 21-March-2017
        public function readInstituteCourse($id) {

            $result = $this->manageInstituteCourse('VA',0,0,$id,0,0,0,0,0,''); 
            $arraylist = array();
            if ($result->num_rows > 0) {
                while($row  = $result->fetch_array()){

                    array_push($arraylist, $row);
                }
            }
            //$arrResult = $row;
            return $arraylist;
        }

    // Function To Delete course Details By::T Ketaki Debadarshini   :: On:: 21-March-2017
        public function deleteInstituteCourse($action, $ids) {
            $newSessionId           = session_id();
            $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
            if($newSessionId == $hdnPrevSessionId) {   
                    $ctr        = 0;
                    $userId     = USER_ID;
                    $explIds    = explode(',', $ids);
                    $delRec     = 0;
                    foreach ($explIds as $indIds) {
                        $slNumber = 0;
                        $indvidualID = $explIds[$ctr];

                        $result = $this->manageInstituteCourse($action,$indvidualID,0,0,0,0,0,0,0,''); 
                        $row = mysqli_fetch_array($result);
                        if ($row[0] == 0)
                            $delRec++;
                        $ctr++;

                    }

                    if ($action == 'D') {
                        if ($delRec > 0)
                            $outMsg .= ' Institute Courses deleted successfully';
                        else
                            $outMsg .= 'Dependency record exist.  Institute Courses can not be deleted';
                    }
                    else if ($action == 'AC')
                        $outMsg = ' Institute Courses activated successfully';

                    return $outMsg;
            }else{
                header("Location:".APP_URL."error");
            }   
        }


    } 
    

?>
