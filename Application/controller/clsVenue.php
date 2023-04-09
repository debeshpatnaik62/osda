<?php

/* * ****Class to manage Venue details ********************
    'By                     : Rahul Kumar Saw	'
    'On                     : 22-March-2021      '
    ' Procedure Used        : USP_SKILL_VENUE       '
    * ************************************************** */

    class clsVenue extends Model {

         // Function To manage Employee Directory details By::Rahul Kumar Saw   :: On:: 15-July-2017 
        public function manageVenue($action,$intVenueId,$intDistId,$strVenuename,$strVenuenameO,$strOfficerName,$strOfficerMobile,$strOfficerEmail,$intCapacity,$strAddress,$strMapAddress,$pubStatus,$intArcStatus,$createdBy,$intPagesize) {
           
             
            $empSql             = "CALL USP_SKILL_VENUE('$action',$intVenueId,$intDistId,'$strVenuename','$strVenuenameO','$strOfficerName','$strOfficerMobile','$strOfficerEmail',$intCapacity,'$strAddress','$strMapAddress',$pubStatus,$intArcStatus,$createdBy,$intPagesize);";
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

    // Function To Add Upadate Venue details By::Rahul Kumar Saw   :: On:: 22-March-2021 
        public function addUpdateVenue($intVenueId) { 
            $newSessionId           = session_id();
            $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
            if($newSessionId == $hdnPrevSessionId) {   
            
                $userId                 = (isset($_SESSION['adminConsole_userID']))?$_SESSION['adminConsole_userID']:0;
                $intVenueId             = (isset($intVenueId))?$intVenueId:0;

                $selDist                = $_POST['ddlDist'];

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
                    $errFlag		= 1;
                    $flag                   = 1;
                    $outMsg                 = "Mandatory Fields should not be blank";
                }
                else if(($lenName>0) || ($lenOfficerName >0))
                {
                    $errFlag		= 1;
                    $flag                   = 1;
                    $outMsg                 = "Length should not exceed maxlength";
                }
                else if(($errName>0) || ($errAddr >0) || ($errOfficerName >0) || ($errMobile >0) || ($errEmail >0) || ($errCapacity >0) || ($errMapAddress >0) || ($errCity >0))
                {
                    $errFlag		= 1;
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
                        $result         = $this->manageVenue('AU',$intVenueId,$selDist,$txtName,$txtCity,$txtOfficerName,$txtMobile,$txtEmailId,$txtCapacity,$txtAddress,$txtMapAddress,0,$intPhaseId,$userId,$intPinCode);
                        if($result)
                        {
                            $numRow     = $result-> fetch_array();
                            $statusflag = $numRow[0]; 

                            if($statusflag =='0'){
                              $outMsg   = 'Venue Details already exists';
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
             
            $arrResult = array('msg' => $outMsg, 'flag' => $errFlag,'intDist' => $intDist, 'strName' => $strName, 'strNameO' => $strNameO, 'intCapacity' => $intCapacity, 'strAddress' => $strAddress,'txtOfficerName'=>$txtOfficerName,'txtMobile'=>$txtMobile,'txtEmailId'=>$txtEmailId,'txtMapAddress'=>$txtMapAddress);
            return $arrResult;
        }

         // Function To read Skill Venue details By::Rahul Kumar Saw   :: On:: 20-April-2021 
        public function readSkillVenue($id) {

            $result = $this->manageVenue('R',$id,0,'','','','','',0,'','',0,0,0,0);
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

                    $result     = $this->manageVenue($action,$explIds[$ctr],0,'','','','','',0,'','',0,0,0,0);           
                    $row        = $result->fetch_array();
                    if ($row[0] == 0)
                        $delRec++;

                    
                    // send email
                    if($action == 'P'){
                    $resultEmail = $this->manageVenue('R',$explIds[$ctr],0,'','','','','',0,'','',0,0,0,0);
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
                        $outMsg .= 'Venue Detail(s) deleted successfully';
                    else
                        $outMsg .= 'Dependency record exist. Venue Detail(s) can not be deleted';
                }
                else if ($action == 'AC')
                    $outMsg = 'Venue Detail(s) activated successfully';
                else if ($action == 'IN')
                    $outMsg = 'Venue Detail(s) unpublished successfully';
                else if ($action == 'AR')
                    $outMsg = 'Venue Detail(s) archieved successfully';
                else if($action == 'P')
                    $outMsg = 'Venue Detail(s) Published successfully';
                return $outMsg;
             }else{
                header("Location:".APP_URL."error");
           }  
        }


    // Function To addUpdate bulk venue data By::Rahul Kumar Saw  :: On:: 06-may-2021
    public function importData()
    { 
        
        $userId = !empty($_SESSION['adminConsole_userID'])?$_SESSION['adminConsole_userID']:1;
        $dataStr                = array();
        $query                  = '';
        //$selType                = $_POST['selType'];
        $uploadPath             = APP_PATH.'temp/';
        $fileProgress           = $_FILES['excelfile']['name']; 
        $fileSize               = $_FILES['excelfile']['size'];
        $fileTemp               = $_FILES['excelfile']['tmp_name']; 
        $ext                    = pathinfo($fileProgress, PATHINFO_EXTENSION);
        $fileProgress           = ($fileProgress != '')?'VenueMasterDetails'.date("Ymd_His").'.'.$ext:'';
        $fileMimetype           = ($fileProgress != '')?mime_content_type($fileTemp):'';
        if(move_uploaded_file($fileTemp,$uploadPath.$fileProgress))
        {
                include (APP_PATH.'spreadSheetReader/excel_reader.php');     // include the class

                // creates an object instance of the class, and read the excel file data
            $excel = new PhpExcelReader; 
            $excel->read($uploadPath.$fileProgress); 
            $nr_sheets = count($excel->sheets);       // gets the number of sheets
            $excel_data = ''; 
            $arrRow  = array();                         // to store the the html tables with data of each sheet
            // traverses the number of sheets and sets html table with each sheet data in $excel_data
            for($i=0; $i<$nr_sheets; $i++) 
            {
              $flag        =1;
              array_push($arrRow, $excel->sheets[$i]);
              $arrRow       =  json_encode(($arrRow)); //print_r($arrRow);exit;
              $excel_data .=$this->sheetData($excel->sheets[$i],$arrRow) .'<br/>';
            }
        }
        else
        {
            $excel_data= "Error : ". "file could not be uploaded";
            $flag=0;
        }
        
              $arrResult = array('msg' => $outMsg,'flag'=>$flag,'excel_data'=>$excel_data,'arrRow'=>$arrRow);

         return $arrResult;
}

    // Function To addUpdate bulk data By::Rahul Kumar Saw  
    public function insertVenueData()
    {   
                $userId = !empty($_SESSION['adminConsole_userID'])?$_SESSION['adminConsole_userID']:1;
                //$selType                = $_POST['selType'];
                $chkbox                 = $_POST['chkbx']; 
                //print_r($chkbox);echo "<br>";exit;

                $totalVenueRow            = $_POST['hdnVenueRow'];
                $query1                  = '';
                $totalrow                = json_decode($totalVenueRow,true);

               $firstRow=array();
               $queryRow=array();
               
                $ctr=1;
                foreach ($chkbox as $value) {
                  array_push($firstRow,$totalrow[0]['cells'][$value]); 
                }
                //print_r($firstRow);exit;
               if(count($totalrow)>0) 
               {
                
                 
                    foreach ($firstRow as $row11) 
                    {
                    
                    if($ctr>0)
                    {
                           $district          = (!empty($row11[1]))?$row11[1]:'';
                           $venueName         = (!empty($row11[2]))?$row11[2]:'';
                           $venueOfficerName  = (!empty($row11[3]))?$row11[3]:'';
                           $mobileNumber      = (!empty($row11[4]))?$row11[4]:'';
                           $emailId           = (!empty($row11[5]))?$row11[5]:'';
                           $capacity          = (!empty($row11[6]))?$row11[6]:0;
                           $venueAddress      = (!empty($row11[7]))?$row11[7]:'';
                           $mapAddress        = (!empty($row11[8]))?$row11[8]:'';
                           $city              = (!empty($row11[8]))?$row11[8]:'';
                           $pinCode           = (!empty($row11[9]))?$row11[9]:0;
                           $landMark          = (!empty($row11[10]))?$row11[10]:'';

                           $districtId             = $this->showDistrictId($district);
                           include_once("clsSkillCompetition.php");
                            $objCompete   = new  clsSkillCompetition;
                            $resultStatus = $objCompete->manageSkillCompetition('REE',0, 0, 0, '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00');
                                if (mysqli_num_rows($resultStatus) > 0) {

                                    $rowS              = mysqli_fetch_array($resultStatus);
                                    $intPhaseId        = $rowS['intId'];        
                                    $phaseYear         = $rowS['vchPhaseYear'];        
                                }
                           if($districtId>0)
                           {
                           $result         = $this->manageVenue('AU',0,$districtId,$venueName,$city,$venueOfficerName,$mobileNumber,$emailId,$capacity,$venueAddress,$landMark,0,$intPhaseId,$userId,$pinCode);

                           if($result)
                            {
                                $numRow     = $result-> fetch_array();
                                $statusflag = $numRow[0]; 

                                if($statusflag =='0'){
                                  $outMsg   = 'Venue Details already exists';
                                  $errFlag  = 1;
                                  $flag     = 1;
                                }else{
                                    $outMsg = 'Venue Details added successfully';
                               }
                            }
                           }
                           else
                           {
                            $outMsg="Please enter district name as per the application.";
                           }

                       }
                        
                    }
                           /* $ctr1 = $ctr-1;
                            $chkbox1 = count($chkbox)-1;
                           if($result)
                                  $outMsg="Login id assigned successfully.";*/

                        $arrResult = array('msg' => $outMsg,'districtId'=>$districtId,'venueName'=>$venueName,'venueOfficerName'=>$venueOfficerName,'mobileNumber'=>$mobileNumber,'emailId'=>$emailId,'capacity'=>$capacity,'venueAddress'=>$venueAddress,'landMark'=>$landMark,'city'=>$city,'pinCode'=>$pinCode);
                        return $arrResult;           
                }      
    }    
    
    // this function creates and returns a HTML table with excel rows and columns data
// Parameter - array with excel worksheet data
    public function sheetData($sheet,$arrRow) 
    {
      //$mebereType             = "Choose all chekbox then click on submit button";//$this->showMember($selType);
      //$re = '<p style="font-weight:bold;text-decoration:underline;">'.$mebereType.'</p>';
      $re .= '<table class="table table-striped table-bordered table-hover">';
      $totalrow1                = json_decode($arrRow,true);
      $firstRow1=array();
               $queryRow1=array();
                $ctr1=1;
               if(count($totalrow1)>0) 
               {
                $firstRow1=$totalrow1[0]['cells'];  
                    foreach ($firstRow1 as $row22) 
                    {
                    
                    if($ctr1>=1)
                    {
                           $district          = (!empty($row22[1]))?$row22[1]:'';
                           $venueName         = (!empty($row22[2]))?$row22[2]:'';
                           $venueOfficerName  = (!empty($row22[3]))?$row22[3]:'';
                           $mobileNumber      = (!empty($row22[4]))?$row22[4]:'';
                           $emailId           = (!empty($row22[5]))?$row22[5]:'';
                           $capacity          = (!empty($row22[6]))?$row22[6]:0;
                           $venueAddress      = (!empty($row22[7]))?$row22[7]:'';
                           $city              = (!empty($row22[8]))?$row22[8]:'';
                           $pinCode           = (!empty($row22[9]))?$row22[9]:'';
                           $landMark          = (!empty($row22[10]))?$row22[10]:'';


                           //$districtId             = $this->showDistrictId($district);
                           //$blockId                = $this->showBlockId($block);
                           


                          /* if($regdNo != "Registration Number")
                           {
                            $disable = "disabled";
                            $color = "color:red;";
                           }else{
                            $disable = "";
                            $color = "";
                           }*/
        
                           $re     .= "<tr>\n";
                           if($district == "District Name" || $venueName == "Venue Name" || $venueOfficerName == "Venue Officer Name"  || $mobileNumber == "Mobile Number" || $emailId == "Email Id" || $capacity == "Capacity" || $venueAddress == "Venue Address" || $city == "City" || $pinCode == "Pin Code" || $landMark == "Landmark"){
                            $fontWeight = "font-weight:bold;";
                            $re .= '<th width="70px"><input type="checkbox" value="'.($ctr1).'" name="chkbx[]" id="chkbxAll"> All </th>';
                           }/*else if($disable != ""){
                            echo "2";//exit;

                              $re .= '<td></td>';
                           }*/else{
                            $fontWeight = "";
                            $re .= '<td><input type="checkbox" value="'.($ctr1).'" name="chkbx[]" '.$disable.' class="chkbxSelected"></td>';
                           }

                            $re .= '<td style="'.$fontWeight.''.$color.'"">'.$district.'</td>';
                            $re .= '<td style="'.$fontWeight.''.$color.'"">'.$venueName.'</td>';
                            $re .= '<td style="'.$fontWeight.''.$color.'"">'.$venueOfficerName.'</td>';
                            $re .= '<td style="'.$fontWeight.''.$color.'"">'.$mobileNumber.'</td>';
                            $re .= '<td style="'.$fontWeight.''.$color.'"">'.$emailId.'</td>';
                            $re .= '<td style="'.$fontWeight.''.$color.'"">'.$capacity.'</td>';
                            $re .= '<td style="'.$fontWeight.''.$color.'"">'.$venueAddress.'</td>';
                            $re .= '<td style="'.$fontWeight.''.$color.'"">'.$city.'</td>';
                            $re .= '<td style="'.$fontWeight.''.$color.'"">'.$pinCode.'</td>';
                            $re .= '<td style="'.$fontWeight.''.$color.'"">'.$landMark.'</td>';
                            $re .= "</tr>";                          
                            
                    }
                    $ctr1++;
                  }
                }
                //$re .= "<input type='hidden' name='selType' id='selType' value='".$selType."'>";
                return $re .'</table>';     // ends and returns the html table
      
    }

    }

?>