<?php

/* * ****Class to manage Advertisement  ********************
'By                     : T Ketaki Debadarshini	'
'On                     : 16-Jan-2018       '
' Procedure Used        : USP_MOB_ADVERTISEMENT       '
* ************************************************** */



         class clsAdvertisement extends Model {
    
            // Function To Manage Advertisement details By::T Ketaki Debadarshini   :: On:: 16-Jan-2018 
            public function manageAdvertisement($action,$intAdvertisementId,$intType,$strFrmdate,$strTodate,$strDuration,$strFile,$publishStatus,$createdBy,$intPgsize,$strSource,$attr2) 
            {  
                $strFrmdate=($strFrmdate=='0000-00-00')?BLANK_DATE:$strFrmdate;
                $strTodate  =($strTodate=='0000-00-00')?BLANK_DATE:$strTodate;
                
                $advtSql      = "CALL USP_MOB_ADVERTISEMENT('$action',$intAdvertisementId,$intType,'$strFrmdate','$strTodate','$strDuration','$strFile',$publishStatus,$createdBy,$intPgsize,'$strSource','$attr2');";
               
                // echo $advtSql; 
                $errFrmdate          = Model::isSpclChar($strFrmdate);
                $errTodate           = Model::isSpclChar($strTodate);
                $errDuration         = Model::isSpclChar($strDuration);
                $errFile             = Model::isSpclChar($strFile);
                $errType             = Model::isSpclChar($intType);
                $errAction           = Model::isSpclChar($action);
                
                 $errSource           = Model::isSpclChar($strSource);
                
                if ($errFrmdate > 0 || $errTodate > 0 || $errDuration>0 || $errFile>0 || $errType>0 || $errAction>0 || $errSource>0)
                    header("Location:" . APP_URL . "error");
                else {
                  
                        $advtResult = Model::executeQry($advtSql);                        
                        return $advtResult;
                  }
            }
            
         
             
              /*************Function to add/update Advertisement ***********************
	 		BY      : T Ketaki Debadarshini
			On	: 16-Jan-2018 
            ****************************************************************/
            public function addUpdateAdvertisement($intAdvtId)
             { 
                $newSessionId           = session_id();
                $hdnPrevSessionId       = $_POST['hdnPrevSessionId'];
                if ($newSessionId == $hdnPrevSessionId) {
                $createdBy               = USER_ID;
                
                    $radType            = $_POST['radType'];
                    $txtFrmDate         = htmlspecialchars($_POST['txtFrmDate'], ENT_QUOTES);        
                    $txtToDate          = htmlspecialchars($_POST['txtToDate'], ENT_QUOTES);  
                    
                    $strFrmDate         = $this->dbDateFormat($txtFrmDate);
                    $strToDate          = $this->dbDateFormat($txtToDate);
                    
                    $txtDuration        = htmlspecialchars($_POST['txtDuration'], ENT_QUOTES);        
                    
                    $errFrmDate             = Model::isSpclChar($_POST["txtFrmDate"]);
                    $errToDate              = Model::isSpclChar($_POST["txtToDate"]);
                    $errDuration            = Model::isSpclChar($_POST["txtDuration"]);
                    $errType                = Model::isSpclChar($_POST["radType"]);
                    
                    $txtSource             = htmlspecialchars($_POST['txtSource'], ENT_QUOTES);
                    $errSource             = Model::isSpclChar($_POST['txtSource']);
                    
                    $filevideonm              = $_FILES['filevideo']['name'];
                    $prevVideoFile          = $_POST['hdnvideoFile'];
                    $videoextension         = pathinfo($filevideonm, PATHINFO_EXTENSION);
                    $videoFileSize          = $_FILES['filevideo']['size'];
                    $videoTempName          = $_FILES['filevideo']['tmp_name'];
                    $videoFileName          = 'Video_'.time(). '.' . $videoextension;
                    $fileMimetypeVdo           = mime_content_type($videoTempName);
                    
                    $txtLargeimagenm          = $_FILES['fileDocument']['name'];
                    $prevLargeImage         = $_POST['hdnImageFile'];
                    $extension              = pathinfo($txtLargeimagenm, PATHINFO_EXTENSION);
                    $txtFileSize            = $_FILES['fileDocument']['size'];
                    $txtTempName            = $_FILES['fileDocument']['tmp_name'];
                    $formattedFileName      = 'Image_' . time() . '.' . $extension;
                    $fileMimetype           = mime_content_type($txtTempName);
                    
                    $errLenFrmDate          = Model::chkLength('max', $txtFrmDate, 50);
                    $errLenToDate           = Model::chkLength('max', $txtToDate, 50);
                    $errLenDuration         = Model::chkLength('max', $txtDuration, 10);
                    
                    $errFlag                = 0 ;
                    
                   if(($txtFrmDate =='') || ($txtToDate=='') || $txtDuration=='' || $radType=='') 
                    {
                        $errFlag		= 1;
                        $msg                    = "Mandatory Fields should not be blank";
                    }
                   else if(($errFrmDate >0) || ($errToDate >0) || $errDuration>0 || $errType>0 || $errSource>0)
                    {
                        $msg                    = "Error: Special Characters(<,>,',%,=) Are Not Allowed ";
                        $errFlag                = 1; 
                    }else if(($errLenFrmDate >0) || ($errLenToDate >0) || $errLenDuration>0)
                    {
                        $msg                    = "Length should not exceed maxlength";
                        $errFlag                = 1; 
                    } else if(($fileMimetype!='image/gif' && $fileMimetype!='image/jpeg' && $fileMimetype!='image/jpg' && $txtTempName!='') ) {
                        $errFlag               = 1;
                        $flag                  = 1;
                        $outMsg                = 'Invalid file types. Upload only jpg,jpeg,gif ';
                    }else if ($txtFileSize > 1048576  && $txtLargeimagenm != '') {
                        $outMsg                 = "Image File size can not more than 1 MB.";
                        $errorFlag              = 1;
                        $flag                   = 1;
                    }else if (($fileMimetypeVdo!='video/mp4' && $videoTempName!='')){
                        $outMsg                 = "Upload only mp4 files.";
                        $errorFlag              = 1;
                        $flag                   = 1;
                    }else if ($videoFileSize > 3145728  && $filevideonm != '') {
                        $outMsg                 = "Video File size can not more than 3 MB.";
                        $errorFlag              = 1;
                        $flag                   = 1;
                    }
                    
                    
                    if ($txtLargeimagenm == '' && $intAdvtId != '')
                        $formattedFileName  = $prevLargeImage;
                    if ($filevideonm == '' && $intAdvtId != '')
                        $videoFileName      = $prevVideoFile;
                   
                    $strFile        = ($radType==1)?$formattedFileName:$videoFileName;
                    
                    if($errFlag==0){

                        $advtresult             = $this->manageAdvertisement('AU',$intAdvtId,$radType,$strFrmDate,$strToDate,$txtDuration,$strFile,0,$createdBy,0,$txtSource,'');                   
                        if($advtresult)
                        {
                            $getRows            = $advtresult->fetch_array();
                            $intAdvtid          = $getRows[0];
                            
                            if($intAdvtid>0){
                                $msg            = ($intAdvtId==0)?"Advertisement details added successfully":"Advertisement details updated successfully"; 
                                $errFlag        = 0;
                                
                                $imgfolderPath     = "uploadDocuments/mobAds/image/";
                                $vidfolderPath     = "uploadDocuments/mobAds/video/";
                                  
                                    if ($txtLargeimagenm != '') {
                                        if (file_exists($imgfolderPath . $prevLargeImage) && $prevLargeImage != '')
                                            unlink($imgfolderPath . $prevLargeImage);
                                   
                                        $this->GetResizeImage($this,$imgfolderPath,0,0,$formattedFileName, $txtTempName);
                                      
                                    }

                                    if ($filevideonm != '') {
                                        if (file_exists($vidfolderPath . $prevVideoFile) && $prevVideoFile != '') {
                                            unlink($vidfolderPath . $prevVideoFile);
                                        }
                                        move_uploaded_file($videoTempName, $vidfolderPath . $videoFileName);
                                    }
                
                
                            }else{
                                $msg            = 'Advertisement details already exist for the selected period. ';
                                $errFlag        = 1;
                            }
                        }else{
                             $msg		= "Some error occured. Please try again.";
                             $errFlag           = 1;
                        }


                    } //ENd of if
                    
                    
                    $radType                = $radType ;
                    $txtFrmDate             = $txtFrmDate;
                    $txtToDate              = $txtToDate ;
                    $txtDuration            = $txtDuration;        
                    $strFile                = $strFile; 
                    
                    $arrResult      = array('msg' => $msg,'radType' => $radType, 'flag' => $errFlag, 'txtFrmDate' => $txtFrmDate, 'txtToDate' => $txtToDate, 'txtDuration' => $txtDuration, 'strFile' => $strFile);
                    return $arrResult;
                   
               
             }else{
                header("Location:" . APP_URL . "error"); 
            }
                 
             

           }
          
       // Function To read advertisement details By::T Ketaki Debadarshini   :: On:: 16-Jan-2018 
        public function readAdvertisement($id) {
            $result         = $this->manageAdvertisement('R',$id,0,'0000-00-00','0000-00-00','','',0,0,0,'','');;
            $row            = mysqli_fetch_array($result);
            return $row;
        }        
           
            
      // Function To Delete advertisement details By::T Ketaki Debadarshini   :: On:: 16-Jan-2018 
        public function deleteAdvertisement($action, $ids) {
            $ctr        = 0;
            $userId     = $_SESSION['sessID'];
            $explIds    = explode(',', $ids);
            $delRec     = 0;
            foreach ($explIds as $indIds) {
                $result = $this->manageAdvertisement($action,$explIds[$ctr],0,'0000-00-00','0000-00-00','','',0,$userId,0,'','');
                $row    = $result->fetch_array();

                if ($row[0] == 0)
                    $delRec++;
                $ctr++;
            }

            if ($action == 'D') {
                if ($delRec > 0)
                    $outMsg .= '<div class="success">Advertisement Detail(s) deleted successfully</div>';
                else
                    $outMsg .= '<div class="error">Dependency record exist. Advertisement Detail(s) can not be deleted</div>';
            }
            else if ($action == 'AC')
                $outMsg = 'Advertisement Detail(s) activated successfully';
            else if ($action == 'IN')
                $outMsg = 'Advertisement Detail(s) unpublished successfully';
             else if ($action == 'P')
                $outMsg = 'Advertisement Detail(s) published successfully';
            return $outMsg;
        }       
          
}



?>
