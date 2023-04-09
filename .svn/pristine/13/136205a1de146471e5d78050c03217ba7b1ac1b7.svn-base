<?php

/* * ****Class to manage Venue details ********************
    'By                     : Rahul Kumar Saw	'
    'On                     : 22-March-2021      '
    ' Procedure Used        : USP_SKILL_VENUE       '
    * ************************************************** */

    class clsPanelVenue extends Model {

         // Function To manage Employee Directory details By::Rahul Kumar Saw   :: On:: 15-July-2017 
        public function managePanelVenue($action,$intVenueId,$intDistId,$strVenuename,$strVenuenameO,$strOfficerName,$strOfficerMobile,$strOfficerEmail,$intCapacity,$strAddress,$strMapAddress,$pubStatus,$intArcStatus,$createdBy,$intPagesize) {
           
             
            $empSql             = "CALL USP_SKILL_PANEL_VENUE('$action',$intVenueId,$intDistId,'$strVenuename','$strVenuenameO','$strOfficerName','$strOfficerMobile','$strOfficerEmail',$intCapacity,'$strAddress','$strMapAddress',$pubStatus,$intArcStatus,$createdBy,$intPagesize);";
          //echo $empSql;             
            $errAction          = Model::isSpclChar($action);
            $errVenname         = Model::isSpclChar($strVenuename);
            $errCapacity        = Model::isSpclChar($intCapacity); 
            
            if ($errAction > 0 || $errVenname > 0 || $errCapacity > 0)
                header("Location:" . APP_URL . "error");
            else {
                $empResult = Model::executeQry($empSql);
                return $empResult;
            }
        }
         // Function To Add Upadate Panel Venue details By::Rahul Kumar Saw   :: On:: 13-June-2022
        public function addUpdatePanelVenue($intVenueId) { 
            $newSessionId           = session_id();
            $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
            if($newSessionId == $hdnPrevSessionId) {   
            
                $userId                 = (isset($_SESSION['adminConsole_userID']))?$_SESSION['adminConsole_userID']:0;
                $intVenueId             = (isset($intVenueId))?$intVenueId:0;

                $selDist                = $_POST['ddlDist'];
                $level                  = $_POST['selLevel'];
                $txtName                = htmlspecialchars(addslashes(trim($_POST['txtName'])),ENT_QUOTES);
                $blankName              = Model::isBlank($txtName);
                $errName                = Model::isSpclChar($_POST['txtName']);
                $lenName                = Model::chkLength('max', $txtName,200);

                $txtNameO               = htmlspecialchars($_POST['txtNameO'],ENT_QUOTES,'UTF-8');

                $txtOfficerName                = htmlspecialchars(addslashes(trim($_POST['txtOfficerName'])),ENT_QUOTES);
                $blankOfficerName              = Model::isBlank($txtOfficerName);
                $errOfficerName                = Model::isSpclChar($_POST['txtOfficerName']);
                $lenOfficerName                = Model::chkLength('max', $txtOfficerName,200);

                $txtMobile                = htmlspecialchars(addslashes(trim($_POST['txtMobile'])),ENT_QUOTES);
                $blankMobile              = Model::isBlank($txtMobile);
                $errMobile                = Model::isSpclChar($_POST['txtMobile']);
                

                $txtEmailId              = htmlspecialchars(addslashes(trim($_POST['txtEmailId'])),ENT_QUOTES);
                $blankEmail              = Model::isBlank($txtEmailId);
                $errEmail                = Model::isSpclChar($_POST['txtEmailId']);
                


                $txtCapacity            = !empty($_POST['txtCapacity'])?$_POST['txtCapacity']:0;
                $blankCapac             = Model::isBlank($txtCapacity);
                $errCapacity                = Model::isSpclChar($_POST['txtCapacity']);
            
                $txtAddress             = htmlspecialchars(addslashes(trim($_POST['txtAddress'])),ENT_QUOTES);
                $errAddr                = Model::isSpclChar($_POST['txtAddress']);
                $lenAddr                = Model::chkLength('max', $txtAddress,200);

                $txtMapAddress          = htmlspecialchars(addslashes(trim($_POST['txtMapAddress'])),ENT_QUOTES);
                $errMapAddress                = Model::isSpclChar($_POST['txtMapAddress']);

                $txtCity                = $_POST['txtCity'];
                $errCity                = Model::isSpclChar($_POST['txtCity']);
                $intPinCode             = !empty($_POST['intPinCode'])?$_POST['intPinCode']:0;
               

                $outMsg                 = '';
                $flag                   = ($intVenueId != 0) ? 1 : 0;

                $errFlag                = 0 ;
                 if(($blankName >0) || ($selDist==0) || ($blankOfficerName >0) || ($blankMobile > 0) || ($blankEmail > 0))
                {
                    $errFlag        = 1;
                    $flag                   = 1;
                    $outMsg                 = "Mandatory Fields should not be blank";
                }
                else if(($lenName>0) || ($lenOfficerName >0))
                {
                    $errFlag        = 1;
                    $flag                   = 1;
                    $outMsg                 = "Length should not exceed maxlength";
                }
                else if(($errName>0) || ($errAddr >0) || ($errOfficerName >0) || ($errMobile >0) || ($errEmail >0) || ($errCapacity >0) || ($errMapAddress >0) || ($errCity >0))
                {
                    $errFlag        = 1;
                    $flag                   = 1;
                    $outMsg                 = "Special Characters are not allowed";
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

                    try {   
                        $result         = $this->managePanelVenue('PAU',$intVenueId,$selDist,$txtName,$txtCity,$txtOfficerName,$txtMobile,$txtEmailId,$txtCapacity,$txtAddress,$txtMapAddress,$level,$intPhaseId,$userId,$intPinCode);
                        if($result)
                        {
                            $numRow     = $result-> fetch_array();
                            $statusflag = $numRow[0]; 

                            if($statusflag =='0'){
                              $outMsg   = 'Panel Venue Details already exists';
                              $errFlag  = 1;
                              $flag     = 1;
                            }else{
                                $outMsg = ($intVenueId != 0) ?'Venue Details updated successfully':'Venue Details added successfully.';
                           }
                        }
                     } catch (Exception $e) { 
                       $outMsg      =  'Some error occured. Please try again'; 
                    } 
                }
                else {
                        $errFlag = 1;
                        $outMsg = 'No Registration phase enabled.';
                    }
            }else{
                header("Location:".APP_URL."error");
            }  
             $intDist           = ($errFlag == 1) ? $selDist : 0;
             $strName           = ($errFlag == 1) ? htmlentities($txtName) : '';
             $strNameO          = ($errFlag == 1) ? htmlentities($txtNameO) : '';
             $txtOfficerName    = ($errFlag == 1) ? htmlentities($txtOfficerName) : '';
             $txtMobile         = ($errFlag == 1) ? htmlentities($txtMobile) : '';
             $txtEmailId        = ($errFlag == 1) ? htmlentities($txtEmailId) : '';
             $txtMapAddress     = ($errFlag == 1) ? htmlentities($txtMapAddress) : '';
             $intCapacity       = ($errFlag == 1) ? htmlentities($txtCapacity) : 0;
             $strAddress        = ($errFlag == 1) ? htmlentities($txtAddress) : '';
             $level             = ($errFlag == 1) ? htmlentities($level) : 0;
             
            $arrResult = array('msg' => $outMsg, 'flag' => $errFlag,'intDist' => $intDist, 'strName' => $strName, 'strNameO' => $strNameO, 'intCapacity' => $intCapacity, 'strAddress' => $strAddress,'txtOfficerName'=>$txtOfficerName,'txtMobile'=>$txtMobile,'txtEmailId'=>$txtEmailId,'txtMapAddress'=>$txtMapAddress,'level'=>$level);
            return $arrResult;
        }


         // Function To read panel Venue details By::Rahul Kumar Saw   :: On:: 13-June-2022 
        public function readPanelVenue($id) {

            $result = $this->managePanelVenue('R',$id,0,'','','','','',0,'','',0,0,0,0);
            if ($result->num_rows > 0) {
                $row                = $result->fetch_array();
            }

            return $row;
        }
         
   
         // Function To delete/publish/uppublish Employee Directory details By::Rahul Kumar Saw   :: On:: 15-July-2017 
        public function deleteVenue($action, $ids) {
          $newSessionId           = session_id();
          $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
          if($newSessionId == $hdnPrevSessionId) {   
                $ctr            = 0;
                $userId         = $_SESSION['adminConsole_userID'];
                $explIds        = explode(',', $ids);
                $delRec         = 0;
                foreach ($explIds as $indIds) {

                    $result     = $this->managePanelVenue($action,$explIds[$ctr],0,'','','','','',0,'','',0,0,0,0);           
                    $row        = $result->fetch_array();
                    if ($row[0] == 0)
                        $delRec++;

                    
                    // send email
                    if($action == 'P'){
                    $resultEmail = $this->managePanelVenue('R',$explIds[$ctr],0,'','','','','',0,'','',0,0,0,0);
                    $rowE        = $resultEmail->fetch_array();
                    $officerName = $rowE['vchOfficerName'];
                    $officerEmail = $rowE['vchEmailId'];
                    $officerMobile = $rowE['vchOfficerMobile'];

                    if (SEND_MAIL == "Y")
                    {       
                        $strUserTo[] = $officerEmail;
                        $strUserFrom = SKILLCOM_EMAIL;
                        $strsubject = "OSDA :: Skill Competition Mobile Login For Attendance" ;

                        $strUserMessage = "Dear <strong>" . $officerName . "</strong></br>";
                        $strUserMessage .= "<div> <br>";
                        $strUserMessage .= "</div>";
                        
                        $strUserMessage .= 'You can login the mobile application by providing the registered mobile number.</br>';
                        
                        $strUserMessage .= "<div> <br>";
                        $strUserMessage .= "</div>";
                        $strUserMessage .= "<div><br><br>Regards <br>Skill Development Team <br>OSDA</div>";

                        $userdata['from'] = $strUserFrom;
                        $userdata['to'] = $strUserTo;
                        $userdata['name'] = 'Odisha Skill Development Authority';
                        $userdata['sub'] = $strsubject;
                        $userdata['message'] = $strUserMessage;
                        $jsUserData = json_encode($userdata);
                        $mailUserRes = Model::sendAuthMailSkillComp($jsUserData);
                    }
                    if(SEND_MESSAGE=='Y')
                    {
                          $templateId  = '1007083541954212363';
                          $mobileMessage='Dear '.ucfirst(strtolower($officerName)).'You can login the mobile application by providing the registered mobile number.'; 
                           $mobileNo=$officerMobile.",";
                           Model::sendSkillSMS($mobileNo,$mobileMessage,$templateId);                         
                          
                   }

                  }
                  $ctr++;
                }

                


                if ($action == 'D') {
                    if ($delRec > 0)
                        $outMsg .= 'Panel Venue Detail(s) deleted successfully';
                    else
                        $outMsg .= 'Dependency record exist. Panel Venue Detail(s) can not be deleted';
                }
                else if ($action == 'AC')
                    $outMsg = 'Panel Venue Detail(s) activated successfully';
                else if ($action == 'IN')
                    $outMsg = 'Panel Venue Detail(s) unpublished successfully';
                else if ($action == 'AR')
                    $outMsg = 'Panel Venue Detail(s) archieved successfully';
                else if($action == 'P')
                    $outMsg = 'Panel Venue Detail(s) Published successfully';
                return $outMsg;
             }else{
                header("Location:".APP_URL."error");
           }  
        }

   

    }

?>