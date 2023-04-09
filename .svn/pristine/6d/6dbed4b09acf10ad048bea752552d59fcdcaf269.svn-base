<?php

/* * ****Class to manage Details events Only ********************
'By                     : Ashis kumar Patra	'
'On                     : 13-April-2018        '
' Procedure Used        : USP_EVENT_DETAILS     '
* ************************************************** */

class clsEventDetails extends Model {

// Function To Manage News By::T Ketaki Debadarshini   :: On:: 25-May-2015
    public function manageEventDetails($action, $eventId, $eventName, $eventQuery, $result, $createdBy,$pubStatus,$startDate,$endDate) {
        $newsId             = htmlspecialchars(addslashes($eventId),ENT_QUOTES);
        $headLineE          = htmlspecialchars(addslashes($eventName),ENT_QUOTES);
         $startDate=($startDate=='0000-00-00')?BLANK_DATE:$startDate;
         $endDate  =($endDate=='0000-00-00')?BLANK_DATE:$endDate; 
        
        $newsSql            = "CALL USP_EVENT_DETAILS('$action', $eventId,'$eventName', '$eventQuery', '$result', $createdBy,$pubStatus,'$startDate','$endDate');";
        //echo $newsSql;   //exit;          
        $errAction          = Model::isSpclChar($action);
        $errHeadlineE       = Model::isSpclChar($eventName);  
        if ($errAction > 0 || $errHeadlineE > 0)
            header("Location:" . APP_URL . "error");
        else {
            $newsResult = Model::executeQry($newsSql);
            return $newsResult;
        }
    }



    // Function To read News  By::T Ketaki Debadarshini  :: On:: 18-Nov-2015
    public function getEventList($fromDate,$toDate,$rowNo) {

        $result = $this->manageEventDetails('EPG',$rowNo, '', '', '0.0', 1,0,$fromDate,$toDate);
        
        return $result;
    }
    

// Function To Delete News  By::T Ketaki Debadarshini   :: On:: 18-Nov-2015
    public function deleteEventDetails($action, $ids) {
      
        $newSessionId           = session_id();
        $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
        if ($newSessionId == $hdnPrevSessionId) {  
                $ctr            = 0;
                $msg            = 0;
                $userId         = USER_ID;
                $explIds        = explode(',', $ids);
                $delRec         = 0;
               

                $msgTitle       = 'Result details ';

                $resultIds='';
                foreach ($explIds as $indIds) {
                     $slNumber = 0;
                     $indvidualID = $explIds[$ctr];
                    if ($action == 'UR') {
                        $resultData = $_POST['txtSLNo' . $indvidualID];
                        $result = $this->manageEventDetails($action,$explIds[$ctr],'','',$resultData,0,0,'0000-00-00','0000-00-00');                   
                        $row    = mysqli_fetch_array($result);
                        $resultIds.=$row[0];
                        if ($row[0] == 0)
                            $delRec++;
                            $ctr++;
                        //echo $indvidualID;		
                    }else{
                          $result = $this->manageEventDetails($action,$explIds[$ctr],'','',$resultData,0,0,'0000-00-00','0000-00-00');                   
                          $row    = mysqli_fetch_array($result);
                         
                         $resultIds.= $row['@ID'];
                         $eventName = $row['@ENAME'];
                        if ($resultIds !='' )
                            $ctr++;
                    } 

                }
              
                if ($action == 'D') {
                    if ($delRec > 0)
                        $outMsg .= $msgTitle.' deleted successfully';
                    else
                        $outMsg .= 'Dependency record exist. New(s) can not be  deleted';
                }
                else if ($action == 'AC')
                    $outMsg = $msgTitle.' activated successfully';
                else if ($action == 'IN')
                    $outMsg =  $msgTitle.' unpublished successfully';
                else if ($action == 'AR')
                    $outMsg =  $msgTitle.' archieved successfully';
                else if($action == 'P')
                    $outMsg =  $msgTitle.' Published successfully';
                else if($action=='HH')	
                    $outMsg	=  $msgTitle.' Hide on home page Successfully';	
                else if($action=='SH' && $msg==0)	
                   $outMsg	=  $msgTitle.' Displayed on home page Successfully';  
                 else if($action=='UR' && $row[0]>0){
                     $deviceAry=$this->getDeviceDetails();
                     $message='OdishaSkill-2018, Result of '.$eventName.' event is published.';
                     $this->sendAndroidNotify($deviceAry, $message, 2);
                   $outMsg	=  $msgTitle.' Results Published Successfully'; 
                   
                 }
                return $outMsg;
        }else{
                header("Location:".APP_URL."error");
            }  
    }
    
    public function getDeviceDetails(){
        
        $sql="CALL USP_DEVICE_INFO('V',0,'','','','','',0)";
        $results= $this->executeQry($sql);
        if($results!=''){
            $rows=$results->fetch_array();
            $deviceIds=explode('~::~',$rows['deviceIDs']);
        }
        return $deviceIds;
    }
    
    

}

?>
