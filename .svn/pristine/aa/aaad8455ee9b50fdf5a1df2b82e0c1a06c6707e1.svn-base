<?php 
/* * ****Class to manage Skill Master ********************
'By                     : Rahul Kumar Saw	'
'On                     : 20-Aug-2020       '
' Procedure Used        : USP_SKILL_MASTER       '
* ************************************************** */

class clsTicker extends Model {
    
    // Function To Manage Ticker By::Rahul Kumar Saw   :: On:: 20-Aug-2020
    public function manageTicker($action, $tickerId, $tickerName,$tickerName_o, $url,$pubStatus,$slNo,$createdBy,$pgSize) {
        $skillTickerSql = "CALL USP_TICKER('$action',$tickerId,'$tickerName','$tickerName_o','$url',$pubStatus,$slNo,$createdBy,$pgSize,@OUT);";
       // echo $skillTickerSql;
        $errAction          = Model::isSpclChar($action);
        $errTicker          = Model::isSpclChar($tickerName);
        
        if ($errAction > 0 || $errTicker > 0)
            header("Location:" . APP_URL . "error");
        else {
            $locResult = Model::executeQry($skillTickerSql);
            return $locResult;
        }
    }

// Function To Add Upadate Ticker By::Rahul Kumar Saw   :: On:: 20-Apr-2021
    public function addUpdateTicker($tickerId) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      //if($newSessionId == $hdnPrevSessionId) {   
            $userId                = $_SESSION['adminConsole_userID'];

            $txtMessage           = htmlspecialchars(addslashes($_POST['txtMessage']), ENT_QUOTES);
            $blankTicker         = Model::isBlank($txtMessage);
            $errTicker           = Model::isSpclChar($_POST['txtMessage']);
            $lenTicker           = Model::chkLength('max', $txtMessage,200);

            $txtMessageO           = htmlspecialchars(addslashes($_POST['txtMessageO']), ENT_QUOTES);
           

            $txtUrl                 = htmlspecialchars(addslashes($_POST['txtUrl']), ENT_QUOTES);
           
            $outMsg                 = '';
            $flag                   = ($tickerId != 0) ? 1 : 0;
            $action                 = ($tickerId == 0) ? 'A' : 'U';
            $errFlag                = 0 ;
            if($blankTicker >0)
            {
                    $errFlag		= 1;
                    $outMsg			= "Mandatory Fields should not be blank";
            }
            else if($lenTicker>0)
            {
                    $errFlag		= 1;
                    $outMsg			= "Length should not excided maxlength";
            }
            else if($errTicker>0)
            {
                    $errFlag		= 1;
                    $outMsg			= "Special Characters are not allowed";
            }

            if($errFlag==0){
               
                  $result = $this->manageTicker($action,$tickerId,$txtMessage,$txtMessageO,$txtUrl,0,0,$userId,0);
                        if ($result)
                            $outMsg = ($action == 'A') ? 'Ticker added successfully ' : 'Ticker updated successfully';

            }
            else{
                header("Location:" . APP_URL . "error");
           }    
        $strMessage        = ($errFlag == 1) ? $txtMessage : '';
        $strMessageO       = ($errFlag == 1) ? $txtMessageO : '';
        $strUrl            = ($errFlag == 1) ? htmlentities($txtUrl) : '';       
        
        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag, 'strMessage' => $strMessage, 'strMessageO' => $strMessageO, 'strUrl' => $strUrl);
        return $arrResult;
    }


// Function To read Ticker  By::Rahul Kumar Saw   :: On:: 20-Aug-2020
    public function readTicker($id) {

        $result = $this->manageTicker('R',$id,'','','',0,0,0,0);
        if (mysqli_num_rows($result) > 0) {

            $row               = mysqli_fetch_array($result);
            $vchTickerName     = $row['vchTickerName'];
            $vchTickerNameO    = htmlspecialchars_decode($row['vchTickerNameO'],ENT_QUOTES);
            $vchTickerUrl      = htmlspecialchars_decode($row['vchTickerUrl'],ENT_QUOTES);
        }
        $arrResult = array( 'strMessage' => $vchTickerName, 'strMessageO' => $vchTickerNameO, 'strUrl' => $vchTickerUrl);
        return $arrResult;
    }

// Function To Delete Ticker  By::Rahul Kumar Saw   :: On:: 20-Aug-2020
    public function deleteTicker($action, $ids) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
            $ctr = 0;
            $userId = $_SESSION['adminConsole_userID'];
            $explIds = explode(',', $ids);
            $delRec = 0;
            foreach ($explIds as $indIds) {

                if($action=='US')
                   $slNumber = $_POST['txtSLNo'.$indIds];
                else
                   $slNumber = 0;

                $result = $this->manageTicker($action,$explIds[$ctr],'','','',0,$slNumber,$userId,0); 
                $row = mysqli_fetch_array($result);

                if ($row[0] == 0)
                    $delRec++;

                $ctr++;

            }

            if ($action == 'D') {
                if ($delRec > 0)
                    $outMsg .= 'Ticker(s) deleted successfully';
                else
                    $outMsg .= 'Dependency record exist. Ticker(s) can not be deleted';
            }
            else if ($action == 'P')
                $outMsg = 'Ticker(s) published successfully';
            else if ($action == 'IN')
                $outMsg = 'Ticker(s) unpublished successfully';
            else if ($action == 'US')
                $outMsg = 'Serial number updated successfully';

            return $outMsg;
         }else{
                header("Location:" . APP_URL . "error");
           }  
    }
    
}
?>