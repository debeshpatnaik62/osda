<?php

  /* * ****Class to manage  Important Links ********************
    'By                     : Arpita Rath	'
    'On                     : 27-03-2017       '
    ' Procedure Used        : USP_IMP_LINK       '
    * ************************************************** */
   class clsLink extends Model {

// Function To Manage Link  By:: Arpita Rath   :: On:: 27-03-2017
    public function manageLink($action, $linkId, $headLineE, $headLineH,$document, $url, $pubStatus,$archiveStatus ,$createdBy) {
        $linkSql = "CALL USP_IMP_LINK('$action', $linkId, '$headLineE', '$headLineH','$document', '$url', $pubStatus, $archiveStatus, $createdBy,@OUT);";
// echo $linkSql;  
        
            $errAction          = Model::isSpclChar($action);
            $errHeadLineE       = Model::isSpclChar($headLineE);
            $errUrl             = Model::isSpclChar($url);
            $errDocument        = Model::isSpclChar($document);
            
              if($errAction > 0 || $errHeadLineE > 0 || $errUrl > 0 || $errDocument>0)
                  header("Location:" . APP_URL . "error");
             else {
                $linkResult = Model::executeQry($linkSql);
                   return $linkResult;
             }    
        
    }

// Function To Add Upadate Link By:: Arpita Rath   :: On:: 27-03-2017
    public function addUpdateLink($linkId) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
        $userId                 = $_SESSION['adminConsole_userID'];
        $linkId                 = ($linkId != '') ? $linkId : 0; 

        $txtHeadlineE           = trim(htmlspecialchars($_POST['txtHeadlineE'], ENT_QUOTES));       
        $blankHeadlineE         = Model::isBlank($txtHeadlineE);
        $errHeadlineE           = Model::isSpclChar($_POST['txtHeadlineE']);
        $lenHeadlineE           = Model::chkLength('max', $txtHeadlineE,120);
        
        $txtHeadlineH           = htmlspecialchars($_POST['txtHeadlineH'], ENT_QUOTES, 'UTF-8');
        $lenHeadineH            = Model::chkLength('max' , $txtHeadlineH, 150);       

        $txtURL                 = ($action == 'A') ? 'http://'.$_POST['txtURL'] : $_POST['txtURL'];

        $outMsg   = '';
        $flag     = ($linkId != 0) ? 1 : 0;
        $action   = ($linkId == 0) ? 'A' : 'U';
        $errFlag            = 0 ;
        if($blankHeadlineE >0)
        {
                $errFlag		= 1;
                $flag           = 1;
                $outMsg			= "Mandatory Fields should not be blank";
        }
        else if(($lenHeadlineE>0) || ($lenHeadineH>0))
        {
                $errFlag		= 1;
                $flag           = 1;
                $outMsg			= "Length should not excided maxlength";
        }
        else if($errHeadlineE>0)
        {
                $errFlag		= 1;
                $flag           = 1;
                $outMsg			= "Special Characters are not allowed";
        }
        
       
         //print_r($dupResult);exit; 
        if($errFlag==0){ 
             $dupResult = $this->manageLink('CD', $linkId,$txtHeadlineE,'','','', 0,0,$userId);   
            if ($dupResult) {
                $numRows = $dupResult->fetch_array();
                if ($numRows > 0) {
                    $outMsg = 'Important Links wih this name already exists';
                    $errFlag = 1;
                } else {
                    $result = $this->manageLink($action, $linkId, $txtHeadlineE,$txtHeadlineH,$txtURL,'', 0,0 ,$userId);
                    if ($result)
                        $outMsg = ($action == 'A') ? 'Important Links added successfully ' : 'Important Links updated successfully';                   
                }
            }
        }
      }else{
                header("Location:".APP_URL."error");
           }  
        $strHeadLineE       = ($errFlag == 1) ? htmlentities($txtHeadlineE) : '';
        $strHeadLineH       = ($errFlag == 1) ? htmlentities($txtHeadlineH) : '';       
        $strURL             = ($errFlag == 1) ? htmlentities($txtURL) : '';     
               
        $arrResult = array('msg' => $outMsg, 'flag' => $flag, 'strHeadLineE' => $strHeadLineE, 'strHeadLineH' => $strHeadLineH, 'strURL' => $strURL);
        return $arrResult;
    }

// Function To read Link   By::Arpita Rath   :: On:: 27-03-2017
    public function readLink($id) {

        $result = $this->manageLink('R', $id,'','','','', 0,0 ,0);//print_r($result);exit;
        if (mysqli_num_rows($result) > 0) {

            $row                = mysqli_fetch_array($result);
            $intLinkId          = $row['intLinkId'];
            $strHeadLineE       = $row['vchLinkNameE'];
            $strHeadLineH       = htmlspecialchars_decode($row['VchLinknameH'],ENT_QUOTES);
            $strURL             = $row['vchUrl'];  
        
        }

        $arrResult = array('intLinkId' => $intLinkId ,'strHeadLineE' => $strHeadLineE, 'strHeadLineH' => $strHeadLineH, 'strURL' => $strURL);
                return $arrResult;
    }

// Function To Delete External Link(  By::Chinmayee   :: On:: 14-Jun-2016
    public function deleteLink($action, $ids) {
        $newSessionId           = session_id();
        $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
        if($newSessionId == $hdnPrevSessionId) {  
            $ctr = 0;
            $userId = $_SESSION['adminConsole_userID'];
            $explIds = explode(',', $ids);
            $delRec = 0;
            foreach ($explIds as $indIds) {
                $result = $this->manageLink($action,$explIds[$ctr],'','', '','', 0,0 ,$userId);                   
                $row = mysqli_fetch_array($result);
                if ($row[0] == 0)
                    $delRec++;
                $ctr++;
            }

            if ($action == 'D') {
                if ($delRec > 0)
                    $outMsg .= 'Important Link(s) deleted successfully';
                else
                    $outMsg .= 'Dependency record exist.Important Link(s) can not be  deleted';
            }
            else if ($action == 'AC')
                $outMsg = 'Important Link(s) activated successfully';
            else if ($action == 'IN')
                $outMsg = 'Important Link(s) unpublished successfully';
            else if ($action == 'AR')
                $outMsg = 'Important Link(s) archived successfully';
            else if ($action == 'P')
                $outMsg = 'Important Link(s) published successfully';

            return $outMsg;
         }else{
                header("Location:".APP_URL."error");
           }   
    }

}



?>