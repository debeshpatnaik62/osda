<?php

/* * ****Class to manage Employee Directory details ********************
    'By                     : T Ketaki Debadarshini	'
    'On                     : 15-July-2017      '
    ' Procedure Used        : USP_DISTEMPLOYEE_DETAILS       '
    * ************************************************** */

    class clsEmpDirectory extends Model {

         // Function To manage Employee Directory details By::T Ketaki Debadarshini   :: On:: 15-July-2017 
        public function manageEmpDirectory($action,$intEmpId,$intEmpType,$intDistId,$strEmpname,$strEmpnameO,$strEmail,$strPhone,$strMobileNo,$strImage,$pubStatus,$intArcStatus,$createdBy,$intPagesize) {
           
             
            $empSql             = "CALL USP_DISTEMPLOYEE_DETAILS('$action',$intEmpId,$intEmpType,$intDistId,'$strEmpname','$strEmpnameO','$strEmail','$strPhone','$strMobileNo','$strImage',$pubStatus,$intArcStatus,$createdBy,$intPagesize);";
//echo $empSql;             
            $errAction          = Model::isSpclChar($action);
            $errEmpname         = Model::isSpclChar($strEmpname);
            $errEmail           = Model::isSpclChar($strEmail);            
            $errPhone           = Model::isSpclChar($strPhone);
            $errMobileNo        = Model::isSpclChar($strMobileNo);
            $errImage           = Model::isSpclChar($strImage);
            
            if ($errAction > 0 || $errEmpname > 0 || $errEmail > 0 || $errPhone>0 || $errMobileNo>0 || $errImage>0)
                header("Location:" . APP_URL . "error");
            else {
                $empResult = Model::executeQry($empSql);
                return $empResult;
            }
        }

    // Function To Add Upadate Employee Directory details By::T Ketaki Debadarshini   :: On:: 15-July-2017 
        public function addUpdateEmpDirectory($intEmpId) { 
            $newSessionId           = session_id();
            $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
            if($newSessionId == $hdnPrevSessionId) {   
            
                $userId                 = (isset($_SESSION['adminConsole_userID']))?$_SESSION['adminConsole_userID']:0;
                $intEmpId               = (isset($intEmpId))?$intEmpId:0;

                $selDist                = $_POST['ddlDist'];
                $intType                = $_POST['ddlType'];

                $txtName                = htmlspecialchars(addslashes(trim($_POST['txtName'])),ENT_QUOTES);
                $blankName              = Model::isBlank($txtName);
                $errName                = Model::isSpclChar($_POST['txtName']);
                $lenName                = Model::chkLength('max', $txtName,100);

                $txtNameO               = htmlspecialchars($_POST['txtNameO'],ENT_QUOTES,'UTF-8');

                $txtEmail               = htmlspecialchars(addslashes(trim($_POST['txtEmail'])),ENT_QUOTES);
                $blankEmail              = Model::isBlank($txtEmail);
                $errEmail               = Model::isSpclChar($_POST['txtEmail']);
                $lenEmail               = Model::chkLength('max', $txtEmail,100);

                $txtMobileNo            = trim($_POST['txtMobileNo']);
                $errMobileNo            = Model::isSpclChar($_POST['txtMobileNo']);
                $lenMobileNo            = Model::chkLength('max', $txtMobileNo,10);

                $txtPhoneno             = trim($_POST['txtPhoneno']);
                $errPhoneno             = Model::isSpclChar($_POST['txtPhoneno']);
                $lenPhoneno             = Model::chkLength('max', $txtPhoneno,16);

                $outMsg                 = '';
                $flag                   = ($intEmpId != 0) ? 1 : 0;

                $errFlag                = 0 ;
                if(($blankName >0) || ($blankEmail >0) || ($selDist==0) || $intType==0)
                {
                    $errFlag		= 1;
                    $flag                   = 1;
                    $outMsg                 = "Mandatory Fields should not be blank";
                }
                else if(($lenName>0) || ($lenEmail >0) || ($lenMobileNo > 0) || $lenEmail>0)
                {
                    $errFlag		= 1;
                    $flag                   = 1;
                    $outMsg                 = "Length should not exceed maxlength";
                }
                else if(($errName>0) || ($errEmail >0) ||  ($errMobileNo >0) || ($errPhoneno >0))
                {
                    $errFlag		= 1;
                    $flag                   = 1;
                    $outMsg                 = "Special Characters are not allowed";
                }


                if($errFlag==0){

                    try {   
                        $result         = $this->manageEmpDirectory('AU',$intEmpId,$intType,$selDist,$txtName,$txtNameO,$txtEmail,$txtPhoneno,$txtMobileNo,'',0,0,$userId,0);
                        if($result)
                        {
                            $numRow     = $result-> fetch_array();
                            $statusflag = $numRow[0]; 

                            if($statusflag =='0'){
                              $outMsg   = 'Employee Details already exists';
                              $errFlag  = 1;
                              $flag     = 1;
                            }else{
                                $outMsg = ($intEmpId != 0) ?'Employee Details updated successfully':'Employee Details added successfully';
                           }
                        }
                     } catch (Exception $e) { 
                       $outMsg      =  'Some error occured. Please try again'; 
                    } 
                }
            }else{
                header("Location:".APP_URL."error");
            }  
             $intDist           = ($errFlag == 1) ? $selDist : 0;
             $intType           = ($errFlag == 1) ? $intType : 0;
             $strName           = ($errFlag == 1) ? htmlentities($txtName) : 0;
             $strNameO          = ($errFlag == 1) ? htmlentities($txtNameO) : 0;
             $strEmail          = ($errFlag == 1) ? htmlentities($txtEmail) : 0;
             $strPhoneno        = ($errFlag == 1) ? htmlentities($txtPhoneno) : 0;
             $strMobileno       = ($errFlag == 1) ? htmlentities($txtMobileNo) : 0;
             
            $arrResult = array('msg' => $outMsg, 'flag' => $errFlag, 'intType' => $intType,'intDist' => $intDist, 'strName' => $strName, 'strNameO' => $strNameO, 'strEmail' => $strEmail, 'strPhoneno' => $strPhoneno, 'strMobileno' => $strMobileno);
            return $arrResult;
        }

         // Function To read Employee Directory details By::T Ketaki Debadarshini   :: On:: 15-July-2017 
        public function readEmpDirectory($id) {

            $result = $this->manageEmpDirectory('R',$id,0,0,'','','','','','',0,0,0,0);
            if ($result->num_rows > 0) {
                $row                = $result->fetch_array();
            }

            return $row;
        }

         // Function To delete/publish/uppublish Employee Directory details By::T Ketaki Debadarshini   :: On:: 15-July-2017 
        public function deleteEmpDirectory($action, $ids) {
          $newSessionId           = session_id();
          $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
          if($newSessionId == $hdnPrevSessionId) {   
                $ctr            = 0;
                $userId         = $_SESSION['adminConsole_userID'];
                $explIds        = explode(',', $ids);
                $delRec         = 0;
                foreach ($explIds as $indIds) {

                    $result     = $this->manageEmpDirectory($action,$explIds[$ctr],0,0,'','','','','','',0,0,0,0);           
                    $row        = $result->fetch_array();
                    if ($row[0] == 0)
                        $delRec++;

                    $ctr++;

                }

                if ($action == 'D') {
                    if ($delRec > 0)
                        $outMsg .= 'Employee Detail(s) deleted successfully';
                    else
                        $outMsg .= 'Dependency record exist. Employee Detail(s) can not be deleted';
                }
                else if ($action == 'AC')
                    $outMsg = 'Employee Detail(s) activated successfully';
                else if ($action == 'IN')
                    $outMsg = 'Employee Detail(s) unpublished successfully';
                else if ($action == 'AR')
                    $outMsg = 'Employee Detail(s) archieved successfully';
                else if($action == 'P')
                    $outMsg = 'Employee Detail(s) Published successfully';
                return $outMsg;
             }else{
                header("Location:".APP_URL."error");
           }  
        }
        
         

    }

?>
