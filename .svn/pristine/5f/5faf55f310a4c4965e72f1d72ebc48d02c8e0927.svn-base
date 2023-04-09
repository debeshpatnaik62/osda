<?php 
/* * ****Class to manage Panel Master ********************
'By                     : Rahul Kumar Saw	'
'On                     : 04-Aug-2021      '
' Procedure Used        : USP_PANEL       '
* ************************************************** */

class clsPanel extends Model {
    
    // Function To Manage Panel By::Rahul Kumar Saw   :: On:: 04-Aug-2021
    public function managePanel($action,$resultId,$distId,$skillId,$name,$strAckNo,$adharNumber,$mobile,$emailId,$qualifyStatus,$marks,$level,$pubStatus,$status,$createdBy,$pgSize,$attr1,$attr2,$attr3,$attr4) {
        $panelSql = "CALL USP_PANEL('$action',$resultId,$distId,$skillId,'$name','$strAckNo','$adharNumber','$mobile','$emailId','$qualifyStatus','$marks','$level',$pubStatus,$status,$createdBy,$pgSize,'$attr1','$attr2',$attr3,$attr4);";
       // echo $panelSql;//exit;
        $errAction          = $this->isSpclChar($action);
            if ($errAction > 0)
                header("Location:" . URL . "error");
            else {
                $result = $this->executeQry($panelSql);  
                return $result;
            }
    }

// Function To Add Upadate Panel By::Rahul Kumar Saw   :: On:: 04-Aug-2021
    public function addUpdatePanel($panelId) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
            $userId                = $_SESSION['adminConsole_userID'];

            $txtPanel               = htmlspecialchars(addslashes($_POST['txtPanel']), ENT_QUOTES);
            $blankPanel             = Model::isBlank($txtPanel);
            $errPanel               = Model::isSpclChar($_POST['txtPanel']);

            $lenPanel               = Model::chkLength('max', $txtPanel,200);
            $txtAddress             = htmlspecialchars(addslashes($_POST['txtAddress']), ENT_QUOTES);
            $errAddress             = Model::isSpclChar($_POST['txtAddress']); 
            $venue                  = $_POST['selVenue'];
            $level                  = $_POST['selLevel'];
            $blankVenue             = Model::isBlank($venue);
            $blankLevel             = Model::isBlank($level);
            $outMsg                 = '';
            $flag                   = ($panelId != 0) ? 1 : 0;
            $action                 = ($panelId == 0) ? 'AI' : 'UI';
            $errFlag                = 0 ;
            if($blankPanel >0 || $blankVenue >0 || $blankLevel >0)
            {
                    $errFlag		= 1;
                    $outMsg			= "Mandatory Fields should not be blank";
            }
            else if($lenPanel>0)
            {
                    $errFlag		= 1;
                    $outMsg			= "Length should not excided maxlength";
            }
            else if($errPanel>0 || $errAddress>0)
            {
                    $errFlag		= 1;
                    $outMsg			= "Special Characters are not allowed";
            }

            if($errFlag==0){
                  $dupResult = $this->managePanel('DU',$panelId,$level,$venue,$txtPanel,'','','','','',$txtAddress,'',0,0,$userId,0,'','',0,0);

                if ($dupResult) {
                    $numRows = $dupResult->fetch_array();
                    if ($numRows > 0) {
                        $outMsg = 'Panel with this name already exists';
                        $errFlag = 1;
                    } else {
                        $result = $this->managePanel($action,$panelId,$level,$venue,$txtPanel,'','','','',$txtAddress,'','',0,0,$userId,0,'','',0,0);
                        if ($result)
                            $outMsg = ($action == 'AI') ? 'Panel added successfully ' : 'Panel updated successfully';

                        }
                    }
            }
         }else{
                header("Location:" . APP_URL . "error");
           }    
        $txtPanel         = ($errFlag == 1) ? $txtPanel : '';
        $intLevel         = ($errFlag == 1) ? $level : '0';
        $venue            = ($errFlag == 1) ? $venue : '0';
        $txtAddress       = ($errFlag == 1) ? htmlentities($txtAddress) : '';       
        
        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag, 'strPanel' => $txtPanel, 'strAddress' => $txtAddress,'intLevel'=>$intLevel,'intVenue'=>$venue);
        return $arrResult;
    }

// Function To read Institute  By::Rahul Kumar Saw   :: On:: 04-Aug-2021
    public function readPanel($id) {

        $result = $this->managePanel('RI',$id,0,0,'','','','','','','','',0,0,0,0,'','',0,0);
        if (mysqli_num_rows($result) > 0) {

            $row               = mysqli_fetch_array($result);
            $intId             = $row['intId'];
            $strPanel          = $row['vchPanelName'];
            $intLevel          = $row['intLevel'];
            $intVenue          = $row['intVenueId'];
            $strAddress        = htmlspecialchars_decode($row['vchAddress'],ENT_QUOTES);         
        }
        $arrResult = array( 'intId' => $intId,'strPanel' => $strPanel, 'strAddress' => $strAddress,'intLevel'=>$intLevel,'intVenue'=>$intVenue);
        return $arrResult;
    }

    // Function To Add Upadate Panel Member Info By::Rahul Kumar Saw :: On:: 04-Aug-2021
    public function addUpdatePanelMember($panelMemberId) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
            $userId                = $_SESSION['adminConsole_userID'];
            $level                  = $_POST['selLevel'];
            $selVenue               = $_POST['selVenue'];
            $selPanel               = $_POST['ddlPanel'];
            $txtPanelMember         = htmlspecialchars(addslashes($_POST['txtPanelMember']), ENT_QUOTES);
            $blankPanelMember       = Model::isBlank($txtPanelMember);
            $errPanelMember         = Model::isSpclChar($_POST['txtPanelMember']);
            $lenPanelMember         = Model::chkLength('max', $txtPanelMember,200);


            $txtPanelMobile         = htmlspecialchars(addslashes($_POST['txtPanelMobile']), ENT_QUOTES);
            $blankPanelMobile       = Model::isBlank($txtPanelMobile);
            $errPanelMobile         = Model::isSpclChar($_POST['txtPanelMobile']);
            $lenPanelMobile         = Model::chkLength('max', $txtPanelMobile,16);

            $txtPanelEmail          = htmlspecialchars(addslashes($_POST['txtPanelEmail']), ENT_QUOTES);
            $blankPanelEmail        = Model::isBlank($txtPanelEmail);
            $errPanelEmail          = Model::isSpclChar($_POST['txtPanelEmail']);
            $lenPanelEmail          = Model::chkLength('max', $txtPanelEmail,100);

            $txtPanelCollege        = htmlspecialchars(addslashes($_POST['txtPanelCollege']), ENT_QUOTES);
            $blankPanelCollege      = Model::isBlank($txtPanelCollege);

            $txtYoexperience        = htmlspecialchars(addslashes($_POST['txtYoexperience']), ENT_QUOTES);
            $blankYoExperience      = Model::isBlank($txtYoexperience);

            $txtLocation            = htmlspecialchars(addslashes($_POST['txtLocation']), ENT_QUOTES);
            $blankPanelLocation      = Model::isBlank($txtLocation);

            $txtPanelTrade          = htmlspecialchars(addslashes($_POST['txtPanelTrade']), ENT_QUOTES);
            $txtWeightage           = $_POST['txtWeightage'];
            
            $txtDescription         = htmlspecialchars(addslashes($_POST['txtDescription']), ENT_QUOTES);


            $totalSkill             = $_POST['hdnTotalSkill'];
                for ($i = 1; $i <= $totalSkill; $i++) {
                    $selSkill = $_POST['selSkill' . $i];
                    $queryQulification .='(@Panel_member_ID,'.$selPanel .',' . $selSkill . '),';
                }
                $queryQulification            = substr($queryQulification, 0, -1);
                //print_r($queryQulification);exit; 
          
            $outMsg                 = '';
            $flag                   = ($panelMemberId != 0) ? 1 : 0;
            $action                 = ($panelMemberId == 0) ? 'AM' : 'UM';
            $errFlag                = 0 ;
            if($blankPanelMember >0 || $blankPanelMobile >0 || $blankPanelEmail >0 ||$blankPanelCollege >0)
            {
                    $errFlag        = 1;
                    $outMsg         = "Mandatory Fields should not be blank";
            }
            else if($lenPanelMember>0 || $lenPanelMobile >0 || $lenPanelEmail)
            {
                    $errFlag        = 1;
                    $outMsg         = "Length should not excided maxlength";
            }
            else if($errPanelMember>0 || $errPanelMobile>0 || $errPanelEmail >0)
            {
                    $errFlag        = 1;
                    $outMsg         = "Special Characters are not allowed";
            }

            $weigtResult = $this->managePanel('WC',0,$selPanel,0,'','','','','','','','',0,0,$userId,0,'','',0,0);
            if (mysqli_num_rows($weigtResult) > 0) {
                $rowW               = mysqli_fetch_array($weigtResult);

                $weightage          = $rowW['totalWeightage'];
                $totWihage = $weightage+$txtWeightage;
                }
            if($totWihage>100)
            {
                $errFlag        = 1;
                $outMsg         = "Total weightage in a panel can not exceed 100 %";
            }
            include_once("clsSkillCompetition.php");
            $objCompete   = new  clsSkillCompetition;
            $resultStatus = $objCompete->manageSkillCompetition('REE',0, 0, 0, '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00');
                if (mysqli_num_rows($resultStatus) > 0) {

                    $rowS              = mysqli_fetch_array($resultStatus);
                    $intPhaseId        = $rowS['intId'];        
                    $phaseYear         = $rowS['vchPhaseYear'];        
                }

            if($errFlag==0 && $intPhaseId>0){
                  $dupResult = $this->managePanel('CU',$panelMemberId,0,0,'','','',$txtPanelMobile,$txtPanelEmail,'','','',0,0,$userId,0,'','',0,$intPhaseId);

                if ($dupResult) {
                    $numRows = $dupResult->fetch_array();
                    if ($numRows > 0) {
                        $outMsg = 'Member with this email or mobile already exists';
                        $errFlag = 1;
                    } else {
                        $result = $this->managePanel($action,$panelMemberId,$selPanel,$selVenue,$txtPanelMember,$txtYoexperience,$txtWeightage,$txtPanelMobile,$txtPanelEmail,$txtDescription,$txtPanelTrade,$txtPanelCollege,0,0,$userId,0,$queryQulification,$txtLocation,$level,$intPhaseId);
                        if ($result)
                            $outMsg = ($action == 'AM') ? 'Panel Member added successfully .' : 'Panel Member updated successfully';
                        }
                    }
            }
            else {
                $errFlag = 1;
                $outMsg = 'No Registration phase enabled.';
            }
         }else{
                header("Location:" . APP_URL . "error");
           }    
        $intVenue         = ($errFlag == 1) ? $selVenue : 0;
        $intPanel         = ($errFlag == 1) ? $selPanel : 0;
        $level            = ($errFlag == 1) ? $level : 0;
        $txtPanelMember   = ($errFlag == 1) ? $txtPanelMember : '';
        $txtPanelMobile   = ($errFlag == 1) ? $txtPanelMobile : '';
        $txtPanelEmail    = ($errFlag == 1) ? $txtPanelEmail : '';
        $txtPanelCollege  = ($errFlag == 1) ? $txtPanelCollege : '';
        $txtPanelTrade    = ($errFlag == 1) ? $txtPanelTrade : '';
        $txtYoexperience  = ($errFlag == 1) ? $txtYoexperience : '';
        $txtWeightage     = ($errFlag == 1) ? $txtWeightage : '';
        $txtLocation      = ($errFlag == 1) ? $txtLocation : '';
        $txtDescription   = ($errFlag == 1) ? htmlentities($txtDescription) : '';       
        
        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag, 'intPanel' => $intPanel, 'txtPanelMember' => $txtPanelMember, 'txtPanelMobile' => $txtPanelMobile, 'txtPanelEmail' => $txtPanelEmail, 'txtPanelCollege' => $txtPanelCollege, 'txtPanelTrade' => $txtPanelTrade, 'txtDescription' => $txtDescription,'txtYoexperience'=>$txtYoexperience,'txtWeightage'=>$txtWeightage,'txtLocation'=>$txtLocation,'level'=>$level,'intVenue'=>$intVenue);
        return $arrResult;
    }

// Function To read Panel Member By::Rahul Kumar Saw   :: On:: 04-Aug-2021
    public function readPanelMember($id) {

        $result = $this->managePanel('RM',$id,0,0,'','','','','','','','',0,0,0,0,'','',0,0);
        if (mysqli_num_rows($result) > 0) {

            $row               = mysqli_fetch_array($result);
            $intId             = $row['intId'];
            $strPanel          = $row['intPanelId'];
            $experience        = $row['tinExperience'];
            $weightage         = $row['intWeightage'];
            $strLocation       = htmlspecialchars_decode($row['vchLocation'],ENT_QUOTES);
            $strPanelMember    = htmlspecialchars_decode($row['vchMemberName'],ENT_QUOTES);
            $strMobile         = htmlspecialchars_decode($row['vchMemberMobile'],ENT_QUOTES);
            $strEmailId        = htmlspecialchars_decode($row['vchMemberEmail'],ENT_QUOTES);
            $strCollege        = htmlspecialchars_decode($row['vchMemberCollege'],ENT_QUOTES);
            $strTrade          = htmlspecialchars_decode($row['vchMemberTrade'],ENT_QUOTES);
            $strDescription    = htmlspecialchars_decode($row['vchDescription'],ENT_QUOTES);         
            $strLevel          = htmlspecialchars_decode($row['intLevel'],ENT_QUOTES);         
            $intVenue          = htmlspecialchars_decode($row['intVenueId'],ENT_QUOTES);         
        }
        $arrResult = array('strPanel' => $strPanel,'strPanelMember' => $strPanelMember, 'strMobile' => $strMobile,'strEmailId'=>$strEmailId,'strCollege'=>$strCollege,'strTrade'=>$strTrade,'strDescription'=>$strDescription,'experience'=>$experience,'weightage'=>$weightage,'strLocation'=>$strLocation,'level'=>$strLevel,'intVenue'=>$intVenue);
        return $arrResult;
    }

     // Function To read member skill  By:: Rahul Kumar Saw:: On:: 09-May-2022 
      public function readSkill($id) 
      {
         $result = $this->managePanel('RS',$id,0,0,'','','','','','','','',0,0,0,0,'','',0,0);
          return $result;
      }

    
    // Function To Add Upadate Candidate Tag By::Rahul Kumar Saw :: On:: 05-Aug-2021
        public function addUpdateCandidateTag($taggedId) {
            //print_r($_POST);exit;
            $intDistId  = $_POST['ddlDist'];
             $blankDistId    = $this->isBlank($intDistId);
             $errDistId      = $this->isSpclChar($intDistId);
             $intPanelId     = $_POST['ddlPanel'];
             $blankPanelId   = $this->isBlank($intPanelId);
             $errPanelId     = $this->isSpclChar($intPanelId);
            $intSkillId      = $_POST['selSkill'];
            $blankSkillId    = $this->isBlank($intSkillId);
            $errSkillId      = $this->isSpclChar($intSkillId);
            $venueId         = $_POST['selVenue'];
            $qualifiedLevel  = $_POST['selLevelType'];
            $totalApplicantCount  = count($_POST['ddlCourseName1']); 
            $errtotalApplicantCount  = $this->isSpclChar($totalApplicantCount);
            $txtExamDate     = $_POST['txtExamDate']; 
            $txtExamTime     = $_POST['txtExamTime']; 
            $examDate        =  Model::dbDateFormat($txtExamDate);
           
            $outMsg         = '';
            $flag       = ($taggedId != 0) ? 1 : 0;
            $action         = ($taggedId == 0) ? 'A' : 'U';
            $errFlag            = 0 ;
            
            $query1             = '';
            $query2             = '';
            $dUserId            = $_SESSION['adminConsole_userID'];
            $applicantId        = $_POST['ddlCourseName1'];
            if($qualifiedLevel==2)
            {
                $intLevel           = 'L2';
            }
            else
            {
                $intLevel           = 'L3';
            }

            include_once("clsSkillCompetition.php");
            $objCompete   = new  clsSkillCompetition;
            $resultStatus = $objCompete->manageSkillCompetition('REE',0, 0, 0, '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00');
                if (mysqli_num_rows($resultStatus) > 0) {

                    $rowS              = mysqli_fetch_array($resultStatus);
                    $intPhaseId        = $rowS['intId'];        
                    $phaseYear         = $rowS['vchPhaseYear'];        
                }
            /*$resultId = $this->managePanel('GI',$taggedId,0,0,$intLevel,'','','','','','','',0,0,0,$intPanelId,'','',0,0);
                if ($resultId->num_rows > 0) {
                    $num       = $resultId->fetch_array();
                    $venueId   = $num[0];      
                }*/

            for ($rowApp = 0; $rowApp < $totalApplicantCount; $rowApp++) {
                    $ddlApplicantName1  = $_POST['ddlCourseName1'][$rowApp];
                    $blankapplicant     = $this->isBlank($ddlApplicantName1);
                    
                    $query1         .='( '.$ddlApplicantName1.','.$intSkillId.',' . $intDistId . ',' . $intPanelId . ','.$dUserId.',"'.$examDate.'","'.$txtExamTime.'","'.$intLevel.'",'.$intPhaseId.','.$venueId.'),';
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
        else  if($blankDistId >0 || $blankPanelId>0 || $blankSkillId>0 || $blankapplicant>0 )
        {
                $errFlag    = 1;
                $flag       = 1;
                $outMsg     = "Mandatory Fields should not be blank";
        }
        else if($errDistId>0 || $errPanelId>0 || $errSkillId>0)
        {
                    $errFlag   = 1;
                    $flag      = 1;
                    $outMsg    = "Special Characters are not allowed";
        }           
            if($errFlag==0){
                 $appresult    = $this->managePanel('A',$taggedId,0,0,$intLevel,'','','','','','','',0,0,0,$intPanelId,$query1,$query2,0,0);
                 if($appresult){
                        $outMsg      = 'Candidate Tagged successfully';
                 }
            }      
            $intDistId   = ($errFlag == 1) ? $intDistId : 0;
            $intPanelId  = ($errFlag == 1) ? $intPanelId : 0;
            $intSkillId  = ($errFlag == 1) ? $intSkillId : 0; 
            $arrResult          = array('msg' => $outMsg, 'flag' => $flag, 'intDistId' => $intDistId, 'intPanelId' => $intPanelId, 'intSkillId' => $intSkillId);
            return $arrResult;
        }
        
// Function To Delete Panel Name  By::Rahul Kumar Saw   :: On:: 05-Aug-2020
    public function deletePanelName($action, $ids) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
            $ctr = 0;
            $userId = $_SESSION['adminConsole_userID'];
            $explIds = explode(',', $ids);
            $delRec = 0;
            foreach ($explIds as $indIds) {
                $result = $this->managePanel($action,$explIds[$ctr],0,0,'','','','','','','','',0,0,$userId,0,'','',0,0); 
                $row = mysqli_fetch_array($result);

                if ($row[0] == 0)
                    $delRec++;

                $ctr++;

            }

            if ($action == 'D') {
                if ($delRec > 0)
                    $outMsg .= 'Panel(s) deleted successfully';
                else
                    $outMsg .= 'Dependency record exist. Panel(s) can not be deleted';
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

    // Function To Delete Panel Member Name  By::Rahul Kumar Saw   :: On:: 05-Aug-2020
    public function deletePanelMember($action, $ids) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
            $ctr = 0;
            $userId = $_SESSION['adminConsole_userID'];
            $explIds = explode(',', $ids);
            $delRec = 0;
            foreach ($explIds as $indIds) {
                $result = $this->managePanel('DD',$explIds[$ctr],0,0,'','','','','','','','',0,0,$userId,0,'','',0,0); 
                $row = mysqli_fetch_array($result);
                $ctr++;

            }
            $outMsg = 'Panel Member(s) deleted successfully';
            
            return $outMsg;
         }else{
                header("Location:" . APP_URL . "error");
           }  
    }



    // Function To Update qualify By::Rahul Kumar Saw   :: On:: 03-Aug-2021
    public function updateQualify($action, $ids) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
            $ctr = 0;
            $userId = $_SESSION['adminConsole_userID'];
            $explIds = explode(',', $ids);
            $delRec = 0;
            foreach ($explIds as $indIds) {

                if($action=='EM')
                {
                   $status = 1;
                   $marks  = $_POST['intMarks'.$indIds];
                }
                else
                {
                   $status = 0;
                   $marks  = 0;
                }
                $result = $this->managePanel($action,$explIds[$ctr],$marks,0,'','','','','','','','',0,0,$userId,0,'','',0,0); 
                $row = mysqli_fetch_array($result);

                if ($row[0] == 0)
                    $delRec++;

                $ctr++;

            } 
              if($action == 'QS')
              {
                $outMsg = 'Candidate Qualified Successfully';
              }
              else if ($action == 'EM')
              {
                $outMsg = 'Marks Updated Successfully';
              }
              else if ($action == 'DQ')
              {
                $outMsg = 'Candidate Dis-qualified Successfully';
              }

            return $outMsg;
         }else{
                header("Location:" . APP_URL . "error");
           }  
    }

    public function addUpdateMarks($applicantId)
    {
        $hdnTotQuos     = (!empty($_POST['hdnTotalQuestion']))?$_POST['hdnTotalQuestion']:0;
        $corCnt         = 0;
        $userId = $_SESSION['adminConsole_userID'];
        for($i=1;$i<=$hdnTotQuos;$i++)
        {            
            if($_POST['rbtnType'.$i]==1)
                $corCnt++;
        }
        $correct = $corCnt;
        $incorrect = $hdnTotQuos-$corCnt;

        $result = $this->managePanel('EM',$applicantId,$correct,0,'','','','','','','','',0,0,$userId,0,'','',0,0); 

        $row = mysqli_fetch_array($result);
        $outMsgMark = 'Marks Updated Successfully';

        return $outMsgMark;
    }

    
}
?>