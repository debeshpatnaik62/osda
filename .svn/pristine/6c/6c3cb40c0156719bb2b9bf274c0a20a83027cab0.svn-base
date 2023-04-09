<?php

    /******Class to manage course Details ********************
    ' By                     : T Ketaki Debadarshini	'
    ' On                     : 21-March-2017            '
    ' Procedure Used         : USP_COURSE_DETAILS       '
    *****************************************************************/

    class clsCourse extends Model {

     
        // Function To Manage course Details By::T Ketaki Debadarshini   :: On:: 21-March-2017
            public function manageCourse($action,$intCourseId,$intSectorId,$strCourseName,$strCourseNameO,$strCourseid,$intDuation,$intEligibility,$strDescription,$strDescriptionO,$pubStatus,$intArchiveStatus,$createdBy,$intPagesize,$attr1,$decDurationHr, $radCourseType, $strMappingCOde=null) {
          
		  $courseSql = "CALL USP_COURSE_DETAILS('$action',$intCourseId,$intSectorId,'$strCourseName','$strCourseNameO','$strCourseid',$intDuation,$intEligibility,'$strDescription','$strDescriptionO',$pubStatus,$intArchiveStatus,$createdBy,$intPagesize,'$attr1',$decDurationHr,$radCourseType,'$strMappingCOde');";
		  
		    
          //echo $courseSql; //die;
            
			$errAction          = Model::isSpclChar($action);
            $errName            = Model::isSpclChar($strCourseName);
            $errNameO           = Model::isSpclChar($strCourseNameO);
            $errDescription     = Model::isSpclChar($strDescription);
            $errDescriptionO    = Model::isSpclChar($strDescriptionO);
            //$errDuation         = Model::isSpclChar($strDuation);
            //$errDuationO        = Model::isSpclChar($strDuationO);
            $errCourseid        = Model::isSpclChar($strCourseid);
            //$errCourseType      = Model::isSpclChar($intCourseType);
           
            $errEligibity        = Model::isSpclChar($intEligibility);
            $errSectorid        = Model::isSpclChar($intSectorId);

            if ($errAction > 0 || $errName > 0 || $errDescription > 0 ||  $errCourseid > 0 || $errEligibity>0 || $errSectorid>0)
                header("Location:" . APP_URL . "error");
            else{
                $courseResult = Model::executeQry($courseSql);
                return $courseResult;
            }
        }

        //Function to view course Details By::T Ketaki Debadarshini   :: On:: 21-March-2017
          public function viewCourse($action,$intCourseId,$intSectorId,$strCourseName,$strCourseNameO,$strCourseid,$intDuation,$intEligibility,$strDescription,$strDescriptionO,$pubStatus,$intArchiveStatus,$createdBy,$intPagesize,$attr1)
          {
                  $result	= $this->manageCourse($action,$intCourseId,$intSectorId,$strCourseName,$strCourseNameO,$strCourseid,$intDuation,$intEligibility,$strDescription,$strDescriptionO,$pubStatus,$intArchiveStatus,$createdBy,$intPagesize,$attr1,0,0);
                  return $result;
          }
        
    // Function To Add Upadate course Details By::T Ketaki Debadarshini   :: On:: 21-March-2017
        public function addUpdateCourse($intCourseId) {
         $newSessionId           = session_id();
         $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
         if($newSessionId == $hdnPrevSessionId) {     
            
            //$userId                  = USER_ID;
			$userId = $_SESSION['adminConsole_userID'];
            
            $intType                 = $_POST['ddlType'];
            
            $txtCourseName           = htmlspecialchars(addslashes($_POST['txtCourseName']), ENT_QUOTES);
            $blankName               = Model::isBlank($_POST['txtCourseName']);
            $errName                 = Model::isSpclChar($_POST['txtCourseName']);
            $lenName                 = Model::chkLength('max',$txtCourseName,100);            
            $txtNameO                = htmlspecialchars($_POST['txtCourseNameO'], ENT_QUOTES, 'UTF-8');
           
            $txtCourseAlias          = htmlspecialchars(trim($_POST['txtCourseAlias']), ENT_QUOTES);
            $blankCourseAlias        = Model::isBlank($_POST['txtCourseAlias']);
            $errCourseAlias          = Model::isSpclChar($_POST['txtCourseAlias']);
            $lenCourseAlias          = Model::chkLength('max',$txtCourseAlias,100);    
            
            $txtDuration             = $_POST['txtDuration'];
            $blankDuration           = Model::isBlank($_POST['txtDuration']);
            $errDuration             = Model::isSpclChar($_POST['txtDuration']);
            $lenDuration             = Model::chkLength('max',$txtDuration,5);   
            
            $txtDurationHr             = !empty($_POST['txtDurationHr'])?$_POST['txtDurationHr']:0;
            //$blankDurationHr           = Model::isBlank($_POST['txtDurationHr']);
            $errDurationHr             = Model::isSpclChar($_POST['txtDurationHr']);
            $lenDurationHr             = Model::chkLength('max',$txtDuration,10);
            
            $intEligibility          = $_POST['ddlEligibility'];

            $strMappingCOde          = (!empty(htmlspecialchars($_POST['ddlMappingData'], ENT_QUOTES)))?htmlspecialchars($_POST['ddlMappingData'], ENT_QUOTES):'0';
            
            $txtSnippet              = htmlspecialchars(addslashes($_POST['txtSnippet']), ENT_QUOTES);
            $blankSnippet            = Model::isBlank($_POST['txtSnippet']);
            $errSnippet              = Model::isSpclChar($_POST['txtSnippet']);
            $lenSnippet              = Model::chkLength('max',$txtSnippet,500);            
            $txtSnippetO             = htmlspecialchars($_POST['txtSnippetO'], ENT_QUOTES, 'UTF-8');
			
			$radCourseType           = $_POST['radCourseType']; 
			
			///echo '<pre>'; print_r($_POST);  die;
            
           
            $outMsg                  = '';
            $flag                    = ($intCourseId != 0) ? 1 : 0;
            $action                  = 'AU';
            $errFlag                 = 0 ;
            if($blankName >0 ||  $blankDuration >0 || $blankCourseAlias>0) //$blankSnippet >0 || 
            {
                $errFlag             = 1;
                $outMsg              = "Mandatory Fields should not be blank";
            }
            else if($lenName>0 || $lenDuration >0 || $lenDurationHr>0 || $lenSnippet >0 || $lenCourseAlias>0)
            {
                $errFlag             = 1;
                $outMsg              = "Length should not exceed maxlength";
            }
            else if($errName>0 || $errDuration>0 || $errDurationHr >0 || $errSnippet>0  || $errCourseAlias>0)
            {
                $errFlag             = 1;
                $outMsg              = "Special Characters are not allowed";
            }
         
            
            if($errFlag==0 && $userId>0){
                try {   
                    $result         = $this->manageCourse($action,$intCourseId,$intType,$txtCourseName,$txtNameO,$txtCourseAlias,$txtDuration,$intEligibility,$txtSnippet,$txtSnippetO,0,0,$userId,0,'',$txtDurationHr, $radCourseType, $strMappingCOde);
                    if($result)
                    {
                        $numRow     = $result-> fetch_array();
                        $statusflag = $numRow['@P_STATUS']; 

                        if($statusflag =='0'){
                          $outMsg   = 'Course Details already exists';
                          $errFlag  = 1;
                          $flag     = 1;
                        }else{
                            $outMsg = ($intCourseId != 0) ?'Course Details updated successfully':'Course Details added successfully';
                       }
                    }
                 } catch (Exception $e) { 
                   $outMsg =  'Some error occured. Please try again'; 
                 } 
             }
            }else{
                header("Location:" . APP_URL . "error");
           }   
            $strName            = ($errFlag == 1) ? htmlentities($txtCourseName) : '';
            $strNameO           = ($errFlag == 1) ? htmlentities($txtNameO) : '';   
            $strCourseId        = ($errFlag == 1) ? htmlentities($txtCourseAlias) : ''; 
            $strSnippet         = ($errFlag == 1) ? htmlentities($txtSnippet) : ''; 
            $strSnippetO        = ($errFlag == 1) ? htmlentities($txtSnippetO) : ''; 
            $strDuration        = ($errFlag == 1) ? htmlentities($txtDuration) : ''; 
            $strDurationHr        = ($errFlag == 1) ? htmlentities($txtDurationHr) : ''; 
            $strDurationO       = ($errFlag == 1) ? htmlentities($txtDurationO): '';            
            $intEligibility     = ($errFlag == 1) ? $intEligibility : 0;
            $intType            = ($errFlag == 1) ? $intType : 0;
            $strMappingCOde     = ($errFlag == 1) ? htmlentities($strMappingCOde) : '';

            $arrResult = array('strName' => $strName,'strNameO' => $strNameO,'strCourseId' => $strCourseId,'strSnippet' => $strSnippet,'intType' => $intType,
                'strSnippetO' => $strSnippetO,'strDuration' => $strDuration,'strDurationHr' => $strDurationHr,'strDurationO' => $strDurationO,'intEligibility' => $intEligibility,'msg' => $outMsg, 'flag' => $errFlag,'mappingCode'=>$strMappingCOde);
            return $arrResult;
        }
      
        
    // Function To read course Details By::T Ketaki Debadarshini   :: On:: 21-March-2017
        public function readCourse($id) {

            $result = $this->manageCourse('R',$id,0,'','','',0,0,'','',0,0,0,0,'',0,0);
            if (mysqli_num_rows($result) > 0) {

                $row                = mysqli_fetch_array($result);
              
            }

            $arrResult = $row;
            return $arrResult;
        }
        
        // Function To read course Details by alias  By::T Ketaki Debadarshini   :: On:: 21-March-2017
        public function readCourseByAlias($strAlias) {

            $result = $this->manageCourse('RA',0,0,'','',$strAlias,0,0,'','',0,0,0,0,'',0,0);
            if (mysqli_num_rows($result) > 0) {

                $row                = mysqli_fetch_array($result);
              
            }

            $arrResult = $row;
            return $arrResult;
        }


    // Function To Delete course Details By::T Ketaki Debadarshini   :: On:: 21-March-2017
        public function deleteCourse($action, $ids) {
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

                    $result = $this->manageCourse($action,$indvidualID,0,'','','',0,0,'','',0,0,0,0,'',0,0);
                    $row = mysqli_fetch_array($result);
                    if ($row[0] == 0)
                        $delRec++;
                    $ctr++;

                }

                if ($action == 'D') {
                    if ($delRec > 0)
                        $outMsg .= 'Course Details deleted successfully';
                    else
                        $outMsg .= 'Dependency record exist. Course Details can not be deleted';
                }
                else if ($action == 'AC')
                    $outMsg = 'Course Details activated successfully';
                else if ($action == 'IN')
                    $outMsg = 'Course Details unpublished successfully';
                else if ($action == 'AR')
                    $outMsg =  'Course Details archieved successfully';
                else if($action == 'P')
                    $outMsg =  'Course Details Published successfully';
                else if($action=='HH')	
                    $outMsg	=  'Course Details hide at home page Successfully';	
                else if($action=='SH')	
                   $outMsg	=  'Course Details displayed at home page Successfully';  

                return $outMsg;
             }else{
                header("Location:" . APP_URL . "error");
           }   
        }


 // Function To fill course name By::Rahul Kumar Saw:: On:: 5-August-2019

        public function fillCourseTagged($intSector) 
          {
          
                   $intSector           = 0;  
                   $result              = $this->viewCourse('V',0,$intSector,'','','',0,0,'','',0,0,0,0,'');
                   $opt                 = '<option value="0">--Select--</option>';
                   $courseArray         = array();
                   if(mysqli_num_rows($result)>0)
                   {     $ctr =0;          
                       while($row = mysqli_fetch_array($result))
                       {
                           $courseArray[$ctr]['intCourseId']   = $row["intCourseId"];
                           $courseArray[$ctr]['strCourseName'] = htmlspecialchars_decode($row["vchCourseNameE"],ENT_QUOTES);
                          $ctr++; 
                       }

                       $arrResult = array('courseArray' => $courseArray);
                        return $arrResult;
                   }
                      
           } 

            public function fillNICCourse($selVal) {
            $result              = $this->manageCourse('CMD',0,0,'','','',0,0,'','',0,0,0,0,'','0.0', 0);
           
            $opt                 = '<option value="0">--Select--</option>';
            $nicCourseArray      = array();
           // $aryInstituteType          = array('1'=>'I.T.I','2'=>'Polytechnic','3'=>'Training Center','4'=>'ASTI'); 
            if(mysqli_num_rows($result)>0)
            { 
                $ctr =0;            
                while($row           = mysqli_fetch_array($result))
                {
                     
                    $nicCourseArray[$ctr]['intInstituteId']      = $row["vchCourseCode"];
                    $nicCourseArray[$ctr]['intSectorId']         = $row["vchSectorId"];
                    
                    $nicCourseArray[$ctr]['strInsNameE']         = htmlspecialchars_decode(htmlspecialchars(str_replace('–','-', $row["vchCourseNameE"]),ENT_QUOTES),ENT_QUOTES);
                    $ctr++;
                }
                $arrResult = array('nicCourseArray' => $nicCourseArray);
                return $arrResult;
            }
           
         }


         public function fillSamsCourse($selVal,$type) {
            $result              = $this->manageCourse('SV',0,0,'','','',0,0,'','',0,0,0,$type,'','0.0', 0);
           
            $opt                 = '<option value="0">--Select--</option>';
            $samsCourseArray      = array();
           // $aryInstituteType          = array('1'=>'I.T.I','2'=>'Polytechnic','3'=>'Training Center','4'=>'ASTI'); 
            if(mysqli_num_rows($result)>0)
            { 
                $ctr =0;            
                while($row           = mysqli_fetch_array($result))
                {
                     
                    $samsCourseArray[$ctr]['intCourseId']      = $row["intCourseId"];
                    $samsCourseArray[$ctr]['intSamsCourseId']  = $row["intSamsCourseId"];
                    
                    $samsCourseArray[$ctr]['strInsNameE']         = htmlspecialchars_decode(htmlspecialchars(str_replace('–','-', $row["vchCourseNameE"]),ENT_QUOTES),ENT_QUOTES);
                    $ctr++;
                }
                $arrResult = array('samsCourseArray' => $samsCourseArray);
                return $arrResult;
            }
           
         }


        // Function To Add Tagged course Details By::Rahul Kumar Saw:: On:: 2-August-2019
        public function addCourseTagged($intCourseTaggedId) {
         $newSessionId           = session_id();
         $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
         if($newSessionId == $hdnPrevSessionId) {     
            
            //$userId                  = USER_ID;
            $userId = $_SESSION['adminConsole_userID'];
            $hiddenFlag = $_POST['hiddenITI'];
            $samsITI  = $_POST['ddlSams'];
            $osdaVal  = $_POST['ddlOsda'];
            
            $outMsg                  = '';
            $flag                    = ($intCourseTaggedId != 0) ? 1 : 0;
            $action                  = 'ATD';
            $errFlag                 = 0 ;
            $querySamsITICourse      = '';
            $querySamsPOLCourse      = '';
            $queryNICCourse          = '';
            $queryCourse             = '';
            $queryID                = '';

            $samsCourseArray  =  $this->fillSamsCourse($selVal,'11');
            $samsCourseName   =  $samsCourseArray['samsCourseArray'];
            $noOfSamsCourse   = count($samsCourseName);
//echo $noOfSamsCourse;exit;
           // foreach($_POST['ddlOsda'] as $key=>$val)


            for ($i = 0; $i < $noOfSamsCourse; $i++) {
                        
                        if($_POST['ddlSams'][$i]>0)
                        {
                        $samsIti            = (!empty($_POST['ddlSams'][$i]))?$_POST['ddlSams'][$i]:'';
                        $intOsda            = (!empty($_POST['ddlOsda'][$i]))?$_POST['ddlOsda'][$i]:'';
                        $intNICCourse       = 0;
                        $intSAMSPOLCourseId = 0;
                      
                        
                      if($intOsda!="")
                        {
                        $querySamsITICourse.='("'.$samsIti.'","'.$intOsda .'","'.$intNICCourse .'","'.$intSAMSPOLCourseId .'",111),';
                        $queryID.=''.$intOsda .',';
                        }
                        
                   
                       }
              } 
              $querySamsITICourse = rtrim($querySamsITICourse,',');
              


            $samsCourseArray     =  $this->fillSamsCourse($selVal,'12');
            $samsPolCourseName   =  $samsCourseArray['samsCourseArray'];
            $noOfSamsPolCourse   = count($samsPolCourseName);

            for ($j = 0; $j < $noOfSamsPolCourse; $j++) {
                        
                        if($_POST['ddlSams'][$j]>0)
                        { 
                        $intSAMSPOLCourseId = (!empty($_POST['ddlSams'][$j]))?$_POST['ddlSams'][$j]:'';
                        $intOsda            = (!empty($_POST['ddlOsda'][$j]))?$_POST['ddlOsda'][$j]:'';
                        $intNICCourse       = 0;
                        $samsIti            = 0;
                        if($intOsda!="")
                        {
                        $querySamsPOLCourse.='("'.$samsIti.'","'.$intOsda .'","'.$intNICCourse .'","'.$intSAMSPOLCourseId .'",111),';
                        }
                    }

              } 
              $querySamsPOLCourse = rtrim($querySamsPOLCourse,',');
//print_r ($querySamsITICourse."hii");exit;
             $osdaCourseName =  $this->fillCourseTagged('0');
             $courseArray    = $osdaCourseName['courseArray'];
             $osdaCourse    = count($courseArray); 
//echo $osdaCourse;exit;
             for ($k = 0; $k < $osdaCourse; $k++) {
                        
                        if($_POST['ddlOsda'][$k]>0)
                        {
                        $intNICCourseId     = (!empty($_POST['ddlMappingData'][$k]))?$_POST['ddlMappingData'][$k]:'';
                        $intOsda            = (!empty($_POST['ddlOsda'][$k]))?$_POST['ddlOsda'][$k]:'';
                        $intSAMSPOLCourseId = 0;
                        $samsIti            = 0;
                        if($intNICCourseId!="")
                        {
                        $queryNICCourse.='("'.$samsIti.'","'.$intOsda .'","'.$intNICCourseId .'","'.$intSAMSPOLCourseId .'",111),';
                        }
                        }
              } 
              $queryNICCourse = rtrim($queryNICCourse,',');
              if($hiddenFlag==1)
              {
                $queryCourse = $querySamsITICourse;
              }
              else if ($hiddenFlag==2)
              {
                $queryCourse = $querySamsPOLCourse;
              }
              else if ($hiddenFlag==3)
              {
                $queryCourse = $queryNICCourse;
              }
              $queryID            = rtrim($queryID,',');

            if($errFlag==0 && $userId>0){
                try {   
                    $result         = $this->manageCourse($action,0,0,'','','',0,0,$queryCourse,'',0,0,0,0,'',0,$hiddenFlag,$queryID);
                    if($result)
                    {
                        $numRow     = $result-> fetch_array();
                        $statusflag = $numRow['@P_STATUS']; 

                        if($statusflag =='0'){
                          $outMsg   = 'Course Details already Tagged';
                          $errFlag  = 1;
                          $flag     = 1;
                        }else{
                            $outMsg = 'Course Details tagged successfully';
                       }
                    }
                 } catch (Exception $e) { 
                   $outMsg =  'Some error occured. Please try again'; 
                 } 
             }


            }else{
                header("Location:" . APP_URL . "error");
           }   
            /*$intOsda            = ($errFlag == 1) ? $intOsda : 0;
            $intSAMS            = ($errFlag == 1) ? $intSAMS : 0;   
            $ddlMappingData     = ($errFlag == 1) ? $ddlMappingData : 0; */

            $arrResult = array('msg' => $outMsg, 'flag' => $errFlag);
            return $arrResult;
        }

    } 
    

?>
