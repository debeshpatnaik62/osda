<?php 
    /* ================================================
    File Name     : clsVenueTagged.php
    Description		: This is used for manage venue tagged. 
    Developed By	: Rahul Kumar Saw
    Developed On	: 21-Apr-2021    
    Update History	:
    <Updated by>	<Updated On>		<Remarks>

    Class Used		: clsVenueTagged
    Procedure Used      : USP_SKILL_VENUE_TAGGED
    Functions Used	: manageVenueTagged(),addUpdateVenueTagged()
    ==================================================*/	
    class clsVenueTagged extends Model {

        // Function To Manage Assignment By::Rahul Kumar Saw   :: On:: 21-April-2021
        public function manageVenueTagged($action,$taggedId,$strAckNo,$applicantId,$skillId,$distId,$venueId,$examDate,$examTime,$createdBy,$attr1,$attr2,$pgSize) {
           
            $sql = "CALL USP_SKILL_VENUE_TAGGED('$action',$taggedId,'$strAckNo',$applicantId,$skillId,$distId,$venueId,'$examDate','$examTime',$createdBy,'$attr1','$attr2',$pgSize);";
            //echo $sql;//exit;
            $errAction          = $this->isSpclChar($action);
            if ($errAction > 0)
                header("Location:" . URL . "error");
            else {
                $result = $this->executeQry($sql);  
                return $result;
            }
        }
        // Function To Add Upadate Venue Tagged By::Rahul Kumar Saw   :: On:: 19-April-2015
        public function addUpdateVenueTagged($taggedId) {
            //print_r($_POST);exit;
            $intDistId	= $_POST['ddlDist'];
             $blankDistId    = $this->isBlank($intDistId);
             $errDistId      = $this->isSpclChar($intDistId);
             $intVenueId     = $_POST['ddlVenue'];
             $blankVenueId   = $this->isBlank($intVenueId);
             $errVenueId     = $this->isSpclChar($intVenueId);
            $intSkillId      = $_POST['selSkill'];
            $blankSkillId    = $this->isBlank($intSkillId);
            $errSkillId      = $this->isSpclChar($intSkillId);

            $intRegdType     = $_POST['selRegdType'];
            $intLevel        = 'L1';//$_POST['selLevel'];
            
            $txtExamDate     = $_POST['txtExamDate']; 
            $txtExamTime     = $_POST['txtExamTime']; 
            $examDate        =  Model::dbDateFormat($txtExamDate);
            //$examTime        = date("H:i:s",strtotime($txtExamTime));
            $totalApplicantCount  = count($_POST['ddlCourseName1']); 
            $errtotalApplicantCount  = $this->isSpclChar($totalApplicantCount);
           
            $outMsg 		= '';
            $flag 		= ($taggedId != 0) ? 1 : 0;
            $action 		= ($taggedId == 0) ? 'A' : 'U';
            $errFlag            = 0 ;
            
            $query1             = '';
            $query2             = '';
            $dUserId            = $_SESSION['adminConsole_userID'];
            $applicantId        = $_POST['ddlCourseName1'];
            //print_r($applicantId);exit;

            //$appresult          = $this->manageVenueTagged('GA',0,'',0,0,0,0,'1000-01-01','00:00:00',0,$applicantId,'',0);

            include_once("clsSkillCompetition.php");
            $objCompete   = new  clsSkillCompetition;
            $resultStatus = $objCompete->manageSkillCompetition('REE',0, 0, 0, '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00');
                if (mysqli_num_rows($resultStatus) > 0) {

                    $rowS              = mysqli_fetch_array($resultStatus);
                    $intPhaseId        = $rowS['intId'];        
                    $phaseYear         = $rowS['vchPhaseYear'];        
                }
            for ($rowApp = 0; $rowApp < $totalApplicantCount; $rowApp++) {
                    $ddlApplicantName1  = $_POST['ddlCourseName1'][$rowApp];
                    $blankapplicant     = $this->isBlank($ddlApplicantName1);
                    $errapplicant     = $this->isSpclChar($ddlApplicantName1);
                    
                    $query1         .='( '.$ddlApplicantName1.','.$intSkillId.',' . $intDistId . ',' . $intVenueId . ',"'.$examDate.'","'.$txtExamTime.'",'.$dUserId.','.$intRegdType.',"'.$intLevel.'",'.$intPhaseId.'),';
                    $query2         .= $ddlApplicantName1.',';
                    }
            $query1             = substr($query1, 0, -1);
            $query2             = substr($query2, 0, -1);
        $newSessionId           = session_id();
        $hdnPrevSessionId       = $_POST['hdnPrevSessionId'];
        if ($newSessionId != $hdnPrevSessionId) 
        {
                $flag           = 1;
                $errFlag        = 1;
                $outMsg         = "Invalid due to session mismatch!";
        }
        else  if($blankDistId >0 || $blankVenueId>0 || $blankSkillId>0 || $blankapplicant>0 )
        {
                $errFlag    = 1;
                $flag       = 1;
                $outMsg     = "Mandatory Fields should not be blank";
        }
        else if($errDistId>0 || $errVenueId>0 || $errSkillId>0 || $errapplicant >0)
        {
                    $errFlag   = 1;
                    $flag      = 1;
                    $outMsg    = "Special Characters are not allowed";
        }
        

            if($errFlag==0 && $intPhaseId>0){
                 $appresult          = $this->manageVenueTagged('A',$taggedId,'',0,$intSkillId,$intDistId,$intVenueId,'1000-01-01','00:00:00',$intPhaseId,$query1,$query2,0);
                 if($appresult){
                        $outMsg      = 'Venue Tagged successfully';
                 }
            } 
            else {
                $errFlag = 1;
                $outMsg = 'No Registration phase enabled.';
            }     
            $intDistId   = ($errFlag == 1) ? $intDistId : 0;
            $intVenueId  = ($errFlag == 1) ? $intVenueId : 0;
            $intSkillId  = ($errFlag == 1) ? $intSkillId : 0; 
            $arrResult          = array('msg' => $outMsg, 'flag' => $flag, 'intDistId' => $intDistId, 'intVenueId' => $intVenueId, 'intSkillId' => $intSkillId);
            return $arrResult;
        }
		
		
		// Function To Delete Trainee ::Rahul Kumar Saw:: On::  21-Apr-2021 
	public function deleteVenueTagged($action,$ids) {
        $ctr 	 = 0;       
        $explIds = explode(',', $ids);
        $delRec = 0;
        foreach ($explIds as $indIds) {
			$explVal 		= explode('_',$explIds[$ctr]);
			$ticode	 		= $explVal[0];
			$batchcode	 	= $explVal[1];
            $result = $this->manageVenueTagged($action,0,0,0,$ticode,$batchcode,0,0,ADMIN_UID,0,0);			
            $row 	= $result->fetch_array();
            if ($row[0] == 0)
                $delRec++;
            $ctr++;
        }

           // Added for CSRF prevention Added by : Rahul Saw
        $newSessionId           = session_id();
        $hdnPrevSessionId       = $_POST['hdnPrevSessionId'];
        if ($newSessionId != $hdnPrevSessionId) 
        {
                $flag           = 1;
                $errFlag        = 1;
                $outMsg         = "Invalid due to session mismatch!";
        }
        else if ($action == 'D') {
            if ($delRec > 0)
                $outMsg .= 'Trainee details(s) deleted successfully';
            else
                $outMsg .= 'Dependency record exist Trainee profile details(s) cannot be  deleted';
        }
        return $outMsg;
    }


    public function getVenueDetails($regdNo) {
        
        $result = $this->manageVenueTagged('GV',0,$regdNo,0,0,0,0,'1000-01-01','00:00:00',0,'','',0);
        //return $result;
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
            //$row = $result->fetch_array();
            $strMemberName  = htmlspecialchars_decode($row['vchFirstName'], ENT_QUOTES).' '.htmlspecialchars_decode($row['vchLastName'], ENT_QUOTES);
            $firstName = htmlspecialchars_decode($row['vchFirstName'], ENT_QUOTES);
            $strMobile = $row['vchPhoneno'];
            $strEmail = $row['vchEmailId'];
            $strVenueName = ucwords($row['venueName']);
            $strPanelName = !empty($row['panelName'])?ucwords($row['panelName']):'';
            $strAckNo     = $row['vchAckNo'];
            $strAadharno  = $row['vchAadharId'];
            $strSkill = $row['strSkills'];
            $strUpdatedSkills = $row['strUpdatedSkills'];
            $strDistName = $row['vchDistrictname'];
            $examDate = date("d-M-Y",strtotime($row['stmExamDate']));
            $examTime = $row['stmExamTime'];
            $profilePhoto = $row['vchProfilePhoto'];
            $serverCode = $row['vchServerCode'];
            $address    = $row['address'];
            $panelAddress    = !empty($row['panelAddress'])?$row['panelAddress']:'';
            $tagId      = $row['intTagId'];
            $level1      = $row['@level1'];
            $level2      = $row['@level2'];
            $level3      = $row['@level3'];
            $level      = $row['intLevel'];

            
            $outMsg = '';
            $flag   = 0;
            
            /*if($eligibleStatus==0)
            {
                $outMsg = 'You are not eligible for further process.';
            }
            elseif($payStatus==1)
            {
                $outMsg = 'You have already completed your payment';
            }*/
        }
        }
        else
            {
                $outMsg = '';
                $flag   = 1;
            }

        $arrResult = array('msg' => $outMsg,'strMemberName' => $strMemberName, 'strMobile' => $strMobile, 'strEmail' => $strEmail, 'strVenueName' => $strVenueName, 'strSkill' => $strSkill, 'strDistName' => $strDistName, 'examDate'=>$examDate,'examTime' =>$examTime,'strAckNo'=>$strAckNo,'strAadharno'=>$strAadharno,'profilePhoto'=>$profilePhoto,'firstName'=>$firstName,'serverCode'=>$serverCode,'address'=>$address,'flag'=>$flag,'strUpdatedSkills'=>$strUpdatedSkills,'level1'=>$level1,'level2'=>$level2,'level3'=>$level3,'level'=>$level,'strPanelName'=>$strPanelName,'panelAddress'=>$panelAddress);

        return $arrResult;
    }
     
    }
?>