<?php

 /* * ****Class to manage ReportCategory ********************
    'By                     : Raviteja Peri	'
    'On                     : 06-Dec-2018        '
    ' Procedure Used        : USP_REPORTCATEGORY      '
    * ************************************************** */

    class clsReportCategory extends Model {
        // Function To Manage ReportCategory     
        public function manageReportCategory($action,$ReportCategoryId, $CategoryName, $Description,$pubStatus,$archiveStatus ,$createdBy)
        {
            $ReportCategoryId              = htmlspecialchars(addslashes($ReportCategoryId),ENT_QUOTES);
            $CategoryName          = htmlspecialchars(addslashes($CategoryName),ENT_QUOTES);
            $Description          = htmlspecialchars($Description,ENT_QUOTES,'UTF-8');
          
            $ReportCategorySql             = "CALL USP_REPORTCATEGORY('$action', '$ReportCategoryId', '$CategoryName', '$Description',$pubStatus,$archiveStatus, $createdBy,@OUT);";
           // echo $ReportCategorySql;exit;
            //echo $ReportCategorySql;             
            $errAction          = Model::isSpclChar($action);
            $errCategoryName       = Model::isSpclChar($CategoryName);
           
            if ($errAction > 0 || $errPageTitleE > 0 )
                header("Location:" . APP_URL . "error");
            else {
                $ReportCategoryResult = Model::executeQry($ReportCategorySql);
                return $ReportCategoryResult;
            }
        }
        // Function To Add/Update ReportCategory 
         public function addUpdateReportCategory($ReportCategoryId) {
            $newSessionId           = session_id();
            $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
            if($newSessionId == $hdnPrevSessionId) {  
                $userId                 = (isset($_SESSION['adminConsole_userID']))?$_SESSION['adminConsole_userID']:0;
                $ReportCategoryId                  = (isset($ReportCategoryId))?$ReportCategoryId:0;
                $txtCategoryName           = $_POST['txtCategoryName'];
                $blankCategoryName         = Model::isBlank($txtCategoryName);
                $errCategoryName           = Model::isSpclChar($_POST['txtCategoryName']);
                $lenCategoryName           = Model::chkLength('max', $txtCategoryName,30);
                $txtDescription           = $_POST['txtDescription'];
                $errDescription           = Model::isSpclChar($txtDescription);
                $lenDescription           = Model::chkLength('max', $txtDescription,120);
                $chkTags                = '<button,<form,<iframe,<input,<script,<select,<textarea,alert';
                $checkTagsStatus        = $this->checkHtmlTags($pregDescription, $chkTags);       

                 

                $outMsg = '';
                $flag   = ($ReportCategoryId != 0) ? 1 : 0;
                $action = ($ReportCategoryId == 0) ? 'A' : 'U';
                $errFlag            = 0 ;
                if(($blankCategoryName >0) || ($Description > 0))
                {
                        $errFlag	 = 1;
                        $flag        = 1;
                        $outMsg		 = "Mandatory Fields should not be blank";
                }
                else if(($lenCategoryName>0) || ($Description > 0))
                {
                        $errFlag	  = 1;
                        $flag         = 1;
                        $outMsg		  = "Length should not excided maxlength";
                }
                else if($errCategoryName>0)
                {
                        $errFlag	 = 1;
                        $flag        = 1;
                        $outMsg		 = "Special Characters are not allowed";
                }else if ($checkTagsStatus > 0) {

                    $outMsg                 = "HTML Special Tags Are Not Allowed";
                    $errFlag                = 1;
                    $flag                   = 1;
                }

                $dupResult = $this->manageReportCategory('CD',$ReportCategoryId,$txtCategoryName,$txtDescription,0,0,$userId);

                if($errFlag==0){
                        if ($dupResult) {
                        $numRows = $dupResult->fetch_array();
                        if ($numRows > 0) {
                            $outMsg = 'Category Name already exists';
                            $errFlag = 1;
                            $flag   = 1;
                        } else {
                            $result = $this->manageReportCategory($action,$ReportCategoryId,$txtCategoryName,$txtDescription,0,0,$userId);

                            if ($result)
                                $outMsg = ($action == 'A') ? 'Category details added successfully ' : 'Category details updated successfully';

                        }
                    }
                }
            }else{
                header("Location:".APP_URL."error");
           }    
            $strCategoryName       = ($errFlag == 1) ? htmlentities($txtCategoryName) : '';
            $strDescription       = ($errFlag == 1) ? htmlentities($txtDescription) : ''; 
         
            $arrResult          = array('msg' => $outMsg, 'flag' => $flag);
            return $arrResult;
        }
        /*
        public function viewnewpage($action,$intReportCategory,$vchCategoryName,$vchDescription,$pubStatus,$archiveStatus ,$createdBy) {
            try{   

              
                                  
                 $result = $this->t_newpage('V',$id,'','',0,0,0);

                 if (!$result)
                  {
                         throw new Exception();
                   }
                        return $result;
                }
                catch (Exception $e) 
                { 
                       return "Something got wrong! Please try again.";

                }
            }*/

        // Function To read ReportCategory 
    public function readReportCategory($id) {
        
         $result = $this->manageReportCategory('R',$id,'','',0,0,0);
        if (mysqli_num_rows($result) > 0) {
            $row                = mysqli_fetch_array($result);
            $strCategoryName       =  htmlspecialchars_decode($row['vchCategoryName'],ENT_QUOTES);   
            $strDescription       =  htmlspecialchars_decode($row['vchDescription'],ENT_QUOTES); 
            
               
            $intShowHome        = $row['intShowHome'];
        }

        $arrResult = array( 'strCategoryName' => $strCategoryName,'strDescription' => $strDescription);
        return $arrResult;
    }
     // Function To Action ReportCategory    
        public function deleteReportCategory($action, $ids) {
            $newSessionId           = session_id();
            $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
            $slNumber=0;
            if($newSessionId == $hdnPrevSessionId) {  
                    $ctr = 0;
                    $msg=0;
                    $userId = $_SESSION['adminConsole_userID'];
                    $explIds = explode(',', $ids);
                    $delRec = 0;
                    foreach ($explIds as $indIds) {

                        if ($action == 'US') {
                            $slNumber = $_POST['txtSLNo' . $explIds[$ctr]];
                            //echo $indvidualID;		
                        }

                        $result = $this->manageReportCategory($action,$explIds[$ctr],'','',$slNumber,0,0);                   
                        $row = mysqli_fetch_array($result);
                        if ($row[0] == 0)
                            $delRec++;

                        $ctr++;

                    }

                    if ($action == 'D') {
                        if ($delRec > 0)
                            $outMsg .= 'ReportCategory(s) deleted successfully';
                        else
                            $outMsg .= 'Dependency record exist. ReportCategory(s) can not be  deleted';
                    }
                    else if ($action == 'AC')
                        $outMsg = 'ReportCategory(s) activated successfully';
                    else if ($action == 'IN')
                        $outMsg = 'ReportCategory(s) unpublished successfully';
                    else if ($action == 'AR')
                        $outMsg = 'ReportCategory(s) archieved successfully';
                    else if($action == 'P')
                        $outMsg = 'ReportCategory(s) Published successfully';
                    else if($action=='US')		
                    $outMsg	= 'Serial number updated successfully';	

                    return $outMsg;
            }else{
                 header("Location:".APP_URL."error");
            }   
        }
   
    }
    


?>
