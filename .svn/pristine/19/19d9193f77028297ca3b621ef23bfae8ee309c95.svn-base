<?php

 /* * ****Class to manage FAQ ********************
    'By                     : T Ketaki Debadarshini	'
    'On                     : 30-Nov-2015        '
    ' Procedure Used        : USP_FAQ       '
    * ************************************************** */

    class clsFaq extends Model {
        // Function To Manage Faq By::T Ketaki Debadarshini   :: On:: 30-Nov-2015    
        public function manageFaq($action,$faqId, $headLineE, $headLineH,$descriptionE, $descriptionH, $pubStatus,$archiveStatus ,$createdBy)
        {
            $faqId              = htmlspecialchars(addslashes($faqId),ENT_QUOTES);
            $headLineE          = htmlspecialchars(addslashes($headLineE),ENT_QUOTES);
            $headLineH          = htmlspecialchars($headLineH,ENT_QUOTES,'UTF-8');
          
            $faqSql             = "CALL USP_FAQ('$action', $faqId, '$headLineE', '$headLineH','$descriptionE', '$descriptionH',$pubStatus,$archiveStatus, $createdBy,@OUT);";
//            /echo $faqSql;             
            $errAction          = Model::isSpclChar($action);
            $errHeadlineE       = Model::isSpclChar($headLineE);
           
            if ($errAction > 0 || $errPageTitleE > 0 )
                header("Location:" . APP_URL . "error");
            else {
                $faqResult = Model::executeQry($faqSql);
                return $faqResult;
            }
        }
        // Function To Add/Update Faq By::T Ketaki Debadarshini   :: On:: 30-Nov-2015    
         public function addUpdateFaq($faqId) {
            $newSessionId           = session_id();
            $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
            if($newSessionId == $hdnPrevSessionId) {  
                $userId                 = (isset($_SESSION['adminConsole_userID']))?$_SESSION['adminConsole_userID']:0;
                $faqId                  = (isset($faqId))?$faqId:0;
                $txtHeadlineE           = $_POST['txtHeadlineE'];
                $blankHeadlineE         = Model::isBlank($txtHeadlineE);
                $errHeadlineE           = Model::isSpclChar($_POST['txtHeadlineE']);
                $lenHeadlineE           = Model::chkLength('max', $txtHeadlineE,300);
                $txtHeadlineH           = $_POST['txtHeadlineH'];
                $errHeadlineH           = Model::isSpclChar($txtHeadlineH);

                $txtDetailsE            = htmlspecialchars(addslashes($_POST['txtDetailsE']), ENT_QUOTES);
                $pregDescription        = preg_replace('/\s+/', '', $_POST['txtDetailsE']);
                $chkTags                = '<button,<form,<iframe,<input,<script,<select,<textarea,alert';
                $checkTagsStatus        = $this->isSpclTags($pregDescription);       

                $txtDetailsE            = $_POST['txtDetailsE'];
                $blankDetailsE          = Model::isBlank($txtDetailsE);

                $txtDetailsH            = urlencode($_POST['txtDetailsH']);
                $pregDescriptionH        = preg_replace('/\s+/', '', $_POST['txtDetailsH']);
                $checkTagsStatusH        = $this->isSpclTags($pregDescriptionH);     

                $outMsg = '';
                $flag   = ($faqId != 0) ? 1 : 0;
                $action = ($faqId == 0) ? 'A' : 'U';
                $errFlag            = 0 ;
                if(($blankHeadlineE >0) || ($blankDetailsE > 0))
                {
                        $errFlag	 = 1;
                        $flag        = 1;
                        $outMsg		 = "Mandatory Fields should not be blank";
                }
                else if($lenHeadlineE>0) 
                {
                        $errFlag	  = 1;
                        $flag         = 1;
                        $outMsg		  = "Length should not excided maxlength";
                }
                else if($errHeadlineE>0)
                {
                        $errFlag	 = 1;
                        $flag        = 1;
                        $outMsg		 = "Special Characters are not allowed";
                }else if ($checkTagsStatus > 0 || $checkTagsStatusH > 0) {

                    $outMsg                 = "HTML Special Tags Are Not Allowed";
                    $errFlag                = 1;
                    $flag                   = 1;
                }

                $dupResult = $this->manageFaq('CD',$faqId,$txtHeadlineE,'','','',0,0,$userId);

                if($errFlag==0){
                        if ($dupResult) {
                        $numRows = $dupResult->fetch_array();
                        if ($numRows > 0) {
                            $outMsg = 'Question already exists';
                            $errFlag = 1;
                            $flag   = 1;
                        } else {
                            $result = $this->manageFaq($action,$faqId,$txtHeadlineE,$txtHeadlineH,$txtDetailsE,$txtDetailsH,0,0,$userId);

                            if ($result)
                                $outMsg = ($action == 'A') ? 'Faq details added successfully ' : 'Faq details updated successfully';

                        }
                    }
                }
            }else{
                header("Location:".APP_URL."error");
           }    
            $strHeadLineE       = ($errFlag == 1) ? htmlentities($txtHeadlineE) : '';
            $strHeadLineH       = ($errFlag == 1) ? htmlentities($txtHeadlineH) : ''; 
         
            $arrResult          = array('msg' => $outMsg, 'flag' => $flag);
            return $arrResult;
        }
        
        // Function To read Faq By::T Ketaki Debadarshini   :: On:: 30-Nov-2015    
    public function readFaq($id) {
        
         $result = $this->manageFaq('R',$id,'','','',0,0,0,0);
        if (mysqli_num_rows($result) > 0) {
            $row                = mysqli_fetch_array($result);
            $strHeadLineE       =  htmlspecialchars_decode($row['vchQuestionE'],ENT_QUOTES);   
            $strHeadLineH       =  htmlspecialchars_decode($row['vchQuestionH'],ENT_QUOTES); 
            
            $strDetailE         = htmlspecialchars_decode($row['vchAnswerE'],ENT_NOQUOTES);   
            $strDetailH         = urldecode($row['vchAnswerH']);        
            $intShowHome        = $row['intShowHome'];
        }

        $arrResult = array( 'strHeadLineE' => $strHeadLineE,'strHeadLineH' => $strHeadLineH,'strDetailE' => htmlspecialchars_decode($strDetailE,ENT_NOQUOTES), 'strDetailH' =>$strDetailH);
        return $arrResult;
    }
     // Function To Action Faq By::T Ketaki Debadarshini   :: On:: 30-Nov-2015    
        public function deleteFaq($action, $ids) {
            $newSessionId           = session_id();
            $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
            if($newSessionId == $hdnPrevSessionId) {  
                    $ctr = 0;
                    $msg=0;
                    $userId = $_SESSION['adminConsole_userID'];
                    $explIds = explode(',', $ids);
                    $delRec = 0;
                    $slNumber=0;
                    foreach ($explIds as $indIds) {
                        
                       
                        if ($action == 'US') {
                            $slNumber = $_POST['txtSLNo' . $explIds[$ctr]];
                            //echo $indvidualID;		
                        }

                        $result = $this->manageFaq($action,$explIds[$ctr],'','','','',$slNumber,0,0);                   
                        $row = mysqli_fetch_array($result);
                        if ($row[0] == 0)
                            $delRec++;

                        $ctr++;

                    }

                    if ($action == 'D') {
                        if ($delRec > 0)
                            $outMsg .= 'Faq(s) deleted successfully';
                        else
                            $outMsg .= 'Dependency record exist. Faq(s) can not be  deleted';
                    }
                    else if ($action == 'AC')
                        $outMsg = 'Faq(s) activated successfully';
                    else if ($action == 'IN')
                        $outMsg = 'Faq(s) unpublished successfully';
                    else if ($action == 'AR')
                        $outMsg = 'Faq(s) archieved successfully';
                    else if($action == 'P')
                        $outMsg = 'Faq(s) Published successfully';
                    else if($action=='US')		
                    $outMsg	= 'Serial number updated successfully';	

                    return $outMsg;
            }else{
                 header("Location:".APP_URL."error");
            }   
        }
   
    }
    


?>
