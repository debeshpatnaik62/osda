<?php



class clsCareer extends Model {

    //Function to manage Career 
    
    public function manageCareer($action,$arrConditions)
    { 
        try
        {

           $result = Model::callProc('USP_CAREER',$action,$arrConditions);
           return $result;
//echo $result;exit;
        }//
        catch(Exception $e)
        {
           echo 'Error:'.$e->getMessage();
           exit();
        }
    }

    //Function to Add addUpdate Career 
    public function addUpdateCareer($Id) {

        $userId         = $_SESSION['adminConsole_userID'];
        $Id             = (isset($Id))?$Id:0;

        $txtCareerName  = $_POST['txtCareerName'];

        $blankName      = Model::isBlank($_POST['txtCareerName']);

        $lenName        = Model::chkLength('max', $txtCareerName,200);

        $txtCareerNameO = $_POST['txtCareerNameO'];

        $blankNameO     = Model::isBlank($_POST['txtCareerNameO']);

        $lenNameO       = Model::chkLength('max', $txtCareerNameO,500);
        $txtTickerName  = $_POST['txtTickerName'];
        $txtTickerNameO  = $_POST['txtTickerNameO'];
        $txtExternalLink = $_POST['txtExternalLink'];
        if(!empty($txtTickerName))
        {
            $tinTicker = 1;
        }
        else
        {
            $tinTicker = 0;
        }
        $lenExtName     = Model::chkLength('max', $txtExternalLink,200);

        $ReportFile     = $_FILES['strReportFile']['name'];

        $prevFile       = $_POST['hdnReportFile'];
        $fileSize       = $_FILES['strReportFile']['size'];
        $fileTemp       = $_FILES['strReportFile']['tmp_name'];
        $ext            = pathinfo($ReportFile, PATHINFO_EXTENSION);
        $ReportFile     = ($ReportFile != '') ? 'Career_' . time() . '.' . $ext : '';
        $fileMimetype   = mime_content_type($fileTemp);


        $txtOpenDate    =   (isset($_REQUEST['txtOpeningDate'])&& $_REQUEST['txtOpeningDate']!='')?date('Y-m-d',strtotime($_REQUEST['txtOpeningDate'])):'0000-00-00';

        $blankOpenDate  = Model::isBlank($_POST['txtOpeningDate']);
        $errOpenDate    = Model::isSpclChar($_POST['txtOpeningDate']);

        $txtEndDate     =   (isset($_REQUEST['txtClosingDate'])&& $_REQUEST['txtClosingDate']!='')?date('Y-m-d',strtotime($_REQUEST['txtClosingDate'])):'0000-00-00';

        $blankEndDate   = Model::isBlank($_POST['txtClosingDate']);
        $errEndDate     = Model::isSpclChar($_POST['txtClosingDate']);
        
        $outMsg = '';
        $flag = ($Id != 0) ? 1 : 0;
        $action = ($Id == 0) ? 'A' : 'U';
        $errFlag = 0;

        /*if ($ReportFile == '' && $Id != 0)
            $ReportFile = $prevFile;
*/
        if($action=='A')
        {
        $intSlNo       = ($this->getMaxVal('intSlNo','t_career','biDeletedFlag')=='')?1:$this->getMaxVal('intSlNo','t_career','biDeletedFlag');

        } else {
        $intSlNo       = !empty($_POST['hdnSlNo'])?$_POST['hdnSlNo']:0;
        }

       if ($blankName > 0) {
            $errFlag  = 1;
            $outMsg   = "Career Name should not be blank";
        } else if($blankNameO>0){
             $errFlag = 1;
             $outMsg  = "Career Name in Odia should not be blank";
        } else if($errOpenDate>0 || $errEndDate>0){
             $errFlag = 1;
             $outMsg = "Enter valid date";
        } else if ($fileSize > SIZE1MB) {
            $errFlag  = 1;
            $flag     = 1;
            $outMsg   = 'File size can not more than 1 MB';
            }
       

          $arrConditions=array('intId'=>$Id,
                                            'name'=>$txtCareerName,
                                            'nameO'=>$txtCareerNameO,
                                            'tickername'=>$txtTickerName,
                                            'tickernameO'=>$txtTickerNameO,
                                            'url'=>$txtExternalLink,
                                            'file'=>($ReportFile == '' && $Id != 0)?$prevFile:$ReportFile,
                                            'pubStatus'=>1,
                                            'userid'=>$userId,
                                            'intSlNo'=>$intSlNo,
                                            'startDate'=>$txtOpenDate,
                                            'endDate'=>$txtEndDate,
                                            'tinTicker'=>$tinTicker);
                //print_r($arrConditions); exit;
          $arrCDConditions=array('intId'=>$Id,'name'=>$txtCareerName);

          $dupResult = $this->manageCareer('CD',$arrCDConditions);
          // print_r($_REQUEST);//exit;
              if ($dupResult) {
                $numRows = $dupResult->fetch_array();
                $pCount = count($numRows);
                if ($pCount > 0) {
                    $outMsg = 'Career with this name already exists';
                    $errFlag = 1;
                    $flag   = 1;
                } else {
               $result         = $this->manageCareer($action,$arrConditions);
                    if ($result) {
                        $outMsg = ($action == 'A') ? 'Career added successfully ' : 'Career updated successfully';
                        if ($ReportFile != '') {
                            
                            if (file_exists(APP_PATH."uploadDocuments/Career/" . $prevFile) && $prevFile != '') 
                            {
                                unlink(APP_PATH."uploadDocuments/Career/" . $prevFile);
                            } 
                            move_uploaded_file($fileTemp, "uploadDocuments/Career/" . $ReportFile);
                          }
                    }
                }
       
        
        $strName = ($errFlag == 1) ? htmlentities($txtCareerName) : '';

        $strNameO = ($errFlag == 1) ? htmlentities($txtCareerNameO) : '';

        $strDocument = ($errFlag == 1) ? htmlentities($ReportFile) : '';

        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag,'returnParams' => $arrConditions);
        return $arrResult;
    }
}
 //Function to Read Career 


    public function readCareer($intId) {
          $arrConditions=array( 'Id'=>$intId);
        $result = $this->manageCareer('R',$arrConditions);
        if ($result->num_rows > 0) {

            $row            = $result->fetch_array();
            $strName        = $row['vchCareerName'];
            $strNameO       = $row['vchCareerNameO'];
            $strTickerName  = $row['vchTickerName'];
            $strTickerNameO = $row['vchTickerNameO'];
            $strExternal    = $row['vchExternalLink'];
            $strOpenDate    = ($row['dtmStartDate']=='0000-00-00 00:00:00')?'':date('d-m-Y ',strtotime($row['dtmStartDate']));
            $strEndDate     = ($row['dtmEndDate']=='0000-00-00 00:00:00')?'':date('d-m-Y ',strtotime($row['dtmEndDate']));
            $strDocument    =  htmlspecialchars_decode($row['vchDocument'],ENT_QUOTES);   
        }

        $arrResult = array('strName' => $strName,'strNameO' => $strNameO,'strDocument' => $strDocument,'strOpenDate' =>$strOpenDate,'strEndDate' => $strEndDate,'strTickerName'=>$strTickerName,'strTickerNameO'=>$strTickerNameO,'strExternal'=>$strExternal);
 
        return $arrResult;
    }
 // Function to Delete Career 

    public function deleteCareer($action, $ids) {

        $ctr = 0;
        $userId = $_SESSION['adminConsole_userID'];
        $explIds = explode(',', $ids);
        $delRec = 0;
        foreach ($explIds as $indIds) {
             if($action=='US')
                $slNumber = $_POST['txtSLNo'.$indIds];
            else
                $slNumber = 0;

             $arrConditions=array( 'Id'=>$explIds[$ctr],'val'=>$slNumber);
            $result1 = $this->manageCareer('R', $arrConditions);
            $row = $result1->fetch_array();
            $strImage= $row['vchImage'];
            $strCareerName= $row['vchCareerName'];
//print_r( $arrConditions);exit;
            $result = $this->manageCareer($action, $arrConditions);
        
                $row = $result->fetch_array();
                if ($row[0] == 0)
                    $delRec++;
                $ctr++;
               // print_r($row);exit;
            }

            if ($action == 'D' && $strImage != '') 
            {
                if (file_exists("uploadDocuments/Career/" . $strImage)) {
                    unlink("uploadDocuments/Career/" . $strImage);
                }
            }


        /*if ($action == 'P' && SEND_MAIL == "Y")
            {                        
            $strUserTo[] = 'rahul.saw@csm.co.in';
            $strUserFrom = DEVELOP_EMAIL;

            $strsubject = "OSDA :: Career Publish in website" ;
            $team       = 'Team';
            $strUserMessage = "Dear <strong>" . $team . "</strong></br>";
            $strUserMessage .= "<div> <br>";
            $strUserMessage .= "</div>";
            
            $strUserMessage .= '<strong>' . $strCareerName . '</strong> this career is published in website </br></br>';
            
            $strUserMessage .= "<div> <br>";
            $strUserMessage .= "</div>";
            $strUserMessage .= "<div><br><br>Regards <br>OSDA Team </div>";

            $userdata['from'] = $strUserFrom;
            $userdata['to'] = $strUserTo;
            $userdata['name'] = 'Odisha Skill Development Authority';
            $userdata['sub'] = $strsubject;
            $userdata['message'] = $strUserMessage;
            $jsUserData = json_encode($userdata);
            $mailUserRes = $this->sendAuthMailSkillDevelop($jsUserData);
            //print_r($jsUserData);//exit;
            }

             if($action == 'P' && SEND_MESSAGE=='Y')
                { 
                        $templateId  = '1007083541954212363';
                        $orgName = 'Rahul';
                        $pwd = '12345';
                        $perMobile = '7978879846';
                        $mobileMessage='Thank you '.ucfirst(strtolower($orgName)).', for registering at Odisha Skills 2021. Your Competition ID is '.$pwd.'. For more details check your email. Team OSDA';
                         $mobileNo=$perMobile.",";
                         $this->sendSkillSMS($mobileNo,$mobileMessage,$templateId);                                
                        
                }*/

        

        if ($action == 'D') {
            if ($delRec > 0)
                $outMsg .= 'Career(s) deleted successfully';
        }

        else if ($action == 'IN')
            $outMsg = 'Career(s) unpublished successfully';
        else if ($action == 'P')
            $outMsg = 'Career(s) published successfully';
        else if ($action == 'US')
            $outMsg = 'Serial number updated successfully';
        else if ($action == 'AC')
                $outMsg = 'Career(s) activated successfully';
        else if ($action == 'AR')
                $outMsg = 'Career(s) archieved successfully';
        return $outMsg;
    }

}

?>