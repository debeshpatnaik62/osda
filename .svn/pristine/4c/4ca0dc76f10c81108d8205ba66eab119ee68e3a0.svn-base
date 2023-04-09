<?php

/* * ****Class to manage Employer Speaks ********************
    'By                     : T Ketaki Debadarshini	'
    'On                     : 17-Sept-2016      '
    ' Procedure Used        : USP_MSG_BOARD       '
    * ************************************************** */

    class clsMsgBoard extends Model {

         // Function To manage Employer Speaks By::T Ketaki Debadarshini   :: On:: 17-Sept-2016
        public function manageMsgboard($action, $intmsgId,$headLineE,$headLineH,$desgE,$desgO,$image,$descriptionE,$descriptionH,$pubStatus,$archiveStatus ,$createdBy,$instId,$orgE,$orgO) {
            $intmsgId           = htmlspecialchars(addslashes($intmsgId),ENT_QUOTES);
            $headLineE          = htmlspecialchars(addslashes($headLineE),ENT_QUOTES);
            //$headLineH          = htmlspecialchars(addslashes($headLineH),ENT_QUOTES);
            $descriptionE       = addslashes($descriptionE);  
            $msgSql             = "CALL USP_MSG_BOARD('$action',$intmsgId,'$headLineE','$headLineH','$desgE','$desgO','$image','$descriptionE','$descriptionH',$pubStatus,$archiveStatus,$createdBy,$instId,'$orgE','$orgO',@OUT);";
///echo $msgSql;             
            $errAction          = Model::isSpclChar($action);
            $errHeadlineE       = Model::isSpclChar($headLineE);
            $errfetImage        = Model::isSpclChar($image);
            
            $errInstId          = Model::isSpclChar($instId);
            $errDesgE           = Model::isSpclChar($desgE);
            
            if ($errAction > 0 || $errHeadlineE > 0 || $errfetImage > 0 || $errInstId>0 || $errDesgE>0)
                header("Location:" . APP_URL . "error");
            else {
                $msgResult = Model::executeQry($msgSql);
                return $msgResult;
            }
        }

    // Function To Add Upadate Employer Speaks details By::T Ketaki Debadarshini   :: On:: 17-Sept-2016
        public function addUpdateMessage($intmsgId) { 
           $newSessionId           = session_id();
            $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
            if($newSessionId == $hdnPrevSessionId) {    
            
                //print_r($_POST);
                $userId                 = (isset($_SESSION['adminConsole_userID']))?$_SESSION['adminConsole_userID']:0;
                $intmsgId               = (isset($intmsgId))?$intmsgId:0;

                $selDist                = $_POST['ddlDist'];
                $selInst                = $_POST['ddlInst'];

                $txtHeadlineE           = htmlspecialchars(addslashes($_POST['txtHeadlineE']),ENT_QUOTES);
                $blankHeadlineE         = Model::isBlank($txtHeadlineE);
                $errHeadlineE           = Model::isSpclChar($_POST['txtHeadlineE']);
                $lenHeadlineE           = Model::chkLength('max', $txtHeadlineE,100);

                $txtHeadlineH           = htmlspecialchars($_POST['txtHeadlineO'], ENT_QUOTES, 'UTF-8');
                $errHeadlineH           = Model::isSpclChar($txtHeadlineH);

                $txtDesignationE        = htmlspecialchars(addslashes($_POST['txtDesignationE']),ENT_QUOTES);
                $errDesignationE        = Model::isSpclChar($_POST['txtDesignationE']);

                $txtDesignationO        = htmlspecialchars($_POST['txtDesignationO'],ENT_QUOTES, 'UTF-8');
                $errDesignationO        = Model::isSpclChar($txtDesignationO);

                $txtOrgE                = htmlspecialchars_decode($_POST['txtOrgE'], ENT_QUOTES);
                $blankOrgE              = Model::isBlank($txtOrgE);
                $errOrgE                = Model::isSpclChar($_POST['txtOrgE']);

                $txtOrgO                = htmlspecialchars($_POST['txtOrgO'],ENT_QUOTES, 'UTF-8');
                $errOrgO                = Model::isSpclChar($txtOrgO);

                $fileDocumentnm         = $_FILES['fileDocument']['name'];
                $prevFile               = $_POST['hdnImageFile'];
                $fileSize               = $_FILES['fileDocument']['size'];
                $fileTemp               = $_FILES['fileDocument']['tmp_name'];
                $ext                    = pathinfo($fileDocumentnm , PATHINFO_EXTENSION);
                $fileDocument           = ($fileDocumentnm != '') ? 'message' . date("Ymd_His") . '.' . $ext : '';
                $fileMimetype           = mime_content_type($fileTemp);

                $txtDetailsE            = htmlspecialchars($_POST['txtDetailsE'], ENT_QUOTES);
                $blankDetailsE          = Model::isBlank($txtDetailsE);
                $errDetailsE            = Model::isSpclChar($_POST['txtDetailsE']);
                $lenDetailsE            = Model::chkLength('max', $txtDetailsE,2000);

                $txtDetailsH            =  htmlspecialchars($_POST['txtDetailsO'],ENT_QUOTES, 'UTF-8');
                $errDetailsH            =  Model::isSpclChar($txtDetailsH);
                $lenDetailsH            =  Model::chkLength('max', $txtDetailsH,2500);

                $outMsg                 = '';
                $flag                   = ($intmsgId != 0) ? 1 : 0;
                $action                 = ($intmsgId == 0) ? 'A' : 'U';
                $errFlag                = 0 ;
                if(($blankHeadlineE >0) || ($blankDetailsE >0) || ($blankOrgE >0))
                {
                    $errFlag		= 1;
                    $flag                   = 1;
                    $outMsg                 = "Mandatory Fields should not be blank";
                }
                else if(($lenHeadlineE>0) || ($lenDetailsE >0))
                {
                    $errFlag		= 1;
                    $flag                   = 1;
                    $outMsg                 = "Length should not excided maxlength";
                }
                else if(($errHeadlineE>0) || ($errHeadlineH >0) ||($errDetailsE >0) ||  ($errOrgE >0) || ($errDesignationE >0) ||($errDesignationO>0) || ($errOrgO>0) || ($errDetailsH>0))
                {
                    $errFlag		= 1;
                    $flag                   = 1;
                    $outMsg                 = "Special Characters are not allowed";
                }
                else if ($fileSize > SIZE1MB) {
                    $errFlag               = 1;
                    $flag                  = 1;
                    $outMsg                = 'File size can not more than 1 MB';
                } else if($fileMimetype!='image/gif' && $fileMimetype!='image/jpeg' && $fileMimetype!='image/jpg' && $fileDocumentnm!='') {
                    $errFlag               = 1;
                    $flag                  = 1;
                    $outMsg                = 'Invalid file types. Upload only jpg,jpeg,gif';
                }

                if ($fileDocumentnm == '' && $intmsgId != 0)
                    $fileDocument = $prevFile;
                if($errFlag==0 && $userId>0){
                         $dupResult = $this->manageMsgboard('CD',$intmsgId,$txtHeadlineE,'','','','','','',0,0 ,$userId,0,'','');

                        if ($dupResult) {
                        $numRows = $dupResult->fetch_array();
                        if ($numRows > 0) {
                            $outMsg = 'Employer with this name already exists';
                            $errFlag = 1;
                            $flag   = 1;
                        } else {
                            $result = $this->manageMsgboard($action, $intmsgId, $txtHeadlineE, $txtHeadlineH,$txtDesignationE,$txtDesignationO,$fileDocument,$txtDetailsE,$txtDetailsH,0,0,$userId,$selInst,$txtOrgE,$txtOrgO);
                         if($result->num_rows>0){
                                $row= $result->fetch_array();
                                $message = $row[0];
                            }else{
                                $message = '';
                            }
                            if ($message==1){
                                $outMsg = ($action == 'A') ? 'Employer Speak Details added successfully ' : 'Employer Speak Details updated successfully';

                                if ($fileDocument != '') {

                                if (file_exists("uploadDocuments/messageBoard/" . $prevFile) && $prevFile != '' && $fileDocumentnm!= '') {                                  
                                     unlink("uploadDocuments/messageBoard/" . $prevFile);  

                               }
                               if($fileDocumentnm != '') 
                                {
                                    $this->GetResizeImage($this,'uploadDocuments/messageBoard/',450,0,$fileDocument,$fileTemp);
                                   //move_uploaded_file($fileTemp, "uploadDocuments/messageBoard/" . $fileDocument);
                                }

                            }
                          }
                        }
                    }
                }
              }else{
                header("Location:".APP_URL."error");
            }  
            //echo $outMsg;exit;
             $distId   = ($errFlag == 1) ? $selDist : 0;
             $instId   = ($errFlag == 1) ? $selInst : 0;
            $arrResult = array('msg' => $outMsg, 'flag' => $flag, 'distId' => $distId, 'instId' => $instId);
            return $arrResult;
        }

         // Function To read Employer Speaks details By::T Ketaki Debadarshini   :: On:: 17-Sept-2016
        public function readMsgBoard($id) {

            $result = $this->manageMsgboard('R',$id,'','','','','','','',0,0,0,0,'','');
            if (mysqli_num_rows($result) > 0) {
                $row                = mysqli_fetch_array($result);
                $distId             =  $row['dist_id'];
                $instId             =  $row['intInstId'];
                $strHeadLineE       =  htmlspecialchars_decode($row['VCH_NAME'],ENT_QUOTES);
                $strHeadLineO       =  htmlspecialchars_decode($row['VCH_NAME_O'],ENT_QUOTES); 
                
                $strDesignationE       =  htmlspecialchars_decode($row['VCH_DESIGNATION'],ENT_QUOTES);
                $strDesignationO       =  htmlspecialchars_decode($row['VCH_DESIGNATION_O'],ENT_QUOTES); 
                $strOrgE               = htmlspecialchars_decode($row['VCH_ORG'], ENT_QUOTES);
                $strOrgO               = htmlspecialchars_decode($row['VCH_ORG_O'], ENT_QUOTES); 
                $strFileName        = $row['VCH_IMAGE'];
                     
                $strDetailE         = htmlspecialchars_decode($row['VCH_DESCRIPTION'],ENT_NOQUOTES);  
                $strDetailO         = htmlspecialchars_decode($row['VCH_DESCRIPTION_O'],ENT_NOQUOTES);

               
            }

            $arrResult = array('distId' => $distId,'instId' => $instId, 'strDesignationE' => $strDesignationE,'strDesignationO' => $strDesignationO,'strFileName' => $strFileName,'strHeadLineE' => $strHeadLineE,'strHeadLineO' => $strHeadLineO, 'strDetailE' => $strDetailE, 'strDetailO' => $strDetailO, 'strOrgE' => $strOrgE, 'strOrgO' => $strOrgO);
            //print_r($arrResult);exit;
            return $arrResult;
        }

         // Function To delete/publish/uppublish Employer Speaks details By::T Ketaki Debadarshini   :: On:: 17-Sept-2016
        public function deleteMsgBoard($action, $ids) {
            $newSessionId           = session_id();
            $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
            if($newSessionId == $hdnPrevSessionId) {   
                $ctr = 0;
                $msg=0;
                $userId = $_SESSION['adminConsole_userID'];
                $explIds = explode(',', $ids);
                $delRec = 0;
                foreach ($explIds as $indIds) {

                    $result = $this->manageMsgboard($action,$explIds[$ctr],'','','','','','','',0,0,0,0,'','');            
                    $row = mysqli_fetch_array($result);
                    if ($row[0] == 0)
                        $delRec++;
                    $ctr++;

                }

                if ($action == 'D') {
                    if ($delRec > 0)
                        $outMsg .= 'Employer Speak Detail(s) deleted successfully';
                    else
                        $outMsg .= 'Dependency record exist. Employer Speak Detail(s) can not be  deleted';
                }
                else if ($action == 'AC')
                    $outMsg = 'Employer Speak Detail(s) activated successfully';
                else if ($action == 'IN')
                    $outMsg = 'Employer Speak Detail(s) unpublished successfully';
                else if ($action == 'AR')
                    $outMsg = 'Employer Speak Detail(s) archieved successfully';
                else if($action == 'P')
                    $outMsg = 'Employer Speak Detail(s) Published successfully';
                return $outMsg;
             }else{
                header("Location:".APP_URL."error");
            }  
        }
        
         

    }

?>
