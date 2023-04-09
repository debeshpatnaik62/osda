<?php
   /* * ****Class to manage Recruitment Details ********************
	'By                     : Arpita Rath	'
	'On                     : 29-03-2017       '
	' Procedure Used        : USP_RECRUITMENT_DTLS       '
* ************************************************** */
    class clsRecruitmentDtls extends Model {
    	 //====== Function to manage Recruitment Details By :: Arpita Rath On :: 29-03-2017======//
    	      public function manageDtls($action,$dtlsId,$distId,$instId,$nameE,$nameO,$image,$link,$pubStatus,$arcStatus,$createdBy) {

    	      	 $dtlsSql  = "CALL USP_RECRUITMENT_DTLS('$action',$dtlsId,$distId,$instId,'$nameE','$nameO','$image','$link',$pubStatus,$arcStatus,$createdBy);";
    	      	  // echo $dtlsSql;
                 $errAction  =   Model::isSpclChar($action);
                 $errNameE   =   Model::isSpclChar($nameE);
                 $errLink    =   Model::isSpclChar($link);
                 
                 $errDistId  =   Model::isSpclChar($distId);
                 $errInstid  =   Model::isSpclChar($instId);
                 $errImage   =   Model::isSpclChar($image);
                  
                if($errAction > 0 || $errNameE > 0 || $errLink > 0 || $errDistId > 0 || $errInstid > 0 || $errImage > 0)
                    header("Location:" . APP_URL . "error");
                else {
                         $dtlsResult = Model::executeQry($dtlsSql);
                         return $dtlsResult;
                }        
    	    } 

   //======= Function to add/update  Recruitment Details By :: Arpita Rath On :: 29-03-2017======//
           public function addUpdateDtls($dtlsId) {
              $newSessionId           = session_id();
              $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
              if($newSessionId == $hdnPrevSessionId) {  

           	  $userId        = $_SESSION['adminConsole_userID'];
           	  $dtlsId        = ($dtlsId != '') ? $dtlsId : 0;

           	  $selDist       = $_POST['ddlDist'];
          	  $selInst       = $_POST['ddlInst'];

          	  $txtNameE      = htmlspecialchars($_POST['txtNameE'], ENT_QUOTES);
          	  $blankNameE    = Model::isBlank($txtNameE);
          	  $errNameE      = Model::isSpclChar($txtNameE);
          	  $lenNameE      = Model::chkLength('max', $txtNameE, 100);

          	  $txtNameO      = htmlspecialchars($_POST['txtNameO'], ENT_QUOTES, 'UTF-8');     	  
          	  $lenNameO      = Model::chkLength('max', $txtNameO, 120);

          	  $fileDocumentnm  = $_FILES['fileDocument']['name'];
                    $prevFile        = $_POST['hdnImageFile'];
                    $fileSize        = $_FILES['fileDocument']['size'];
                    $fileTemp        = $_FILES['fileDocument']['tmp_name'];
                    $ext             = pathinfo($fileDocumentnm, PATHINFO_EXTENSION);
                    $fileDocument    = ($fileDocumentnm != '') ? 'RecrutDtls' . date("Ymd_His") . '.' . $ext : '';
                    $fileMimetype           = mime_content_type($fileTemp);
                    
                    $txtLink         = ($action == 'A') ? htmlspecialchars('http://'.$_POST['txtLink'], ENT_QUOTES) : htmlspecialchars($_POST['txtLink'], ENT_QUOTES);;
                    $lenLink         = Model::chkLength('max', $txtLink, 100);

                    $outMsg   = '';
                    $flag     = ($dtlsId != 0) ? 1 : 0;
                    $action   = ($dtlsId == 0) ? 'A' : 'U';
                    $errFlag  =  0;

                    if($blankNameE > 0)
                      {
                              $errFlag =  1;
                              $flag    =  1;
                              $outMsg  =  "Mandatory field should not be left blank";
                      }	
                    else if($errNameE > 0)
                      {
                              $errFlag =  1;
                              $flag    =  1;
                              $outMsg  =  "Special characters are not allowed"; 
                      }  
                    else if(($lenNameE > 0) || ($lenNameO > 0) || ($lenLink > 0))
                      {
                              $errFlag =  1;
                              $flag    =  1;
                              $outMsg  =  "Length should not excided max length";
                      }
                   else if($fileMimetype!='image/gif' && $fileMimetype!='image/jpeg' && $fileMimetype!='image/jpg' && $fileDocumentnm!='') {
                    $errFlag               = 1;
                    $flag                  = 1;
                    $outMsg                = 'Invalid file types. Upload only jpg,jpeg,gif';
                   }   
                    else if($fileSize > SIZE1MB)
                      {
                              $errFlag =  1;
                              $flag    =  1;
                              $outMsg  =  "File size can not more than 1 MB";
                      }  

                    if($errFlag == 0 && $userId>0){
                       $dupResult = $this->manageDtls('CD',$dtlsId,0,$selInst,$txtNameE,'','','',0,0,$userId);
                          if ($fileDocument == '' && $dtlsId != 0)
                            $fileDocument = $prevFile;  

                             if($dupResult->num_rows > 0) {
                                 $numRows = $dupResult->fetch_array();
                                   if($numRows > 0)
                                   {
                                        $errFlag  = 1;
                                        $flag     = 1;
                                        $outMsg   = "Recruiter Name with this name already exist";
                                   }
                             } else {
                                $result = $this->manageDtls($action,$dtlsId,$selDist,$selInst,$txtNameE,$txtNameO,$fileDocument,$txtLink,0,0,$userId);
                                 if($result)
                                        $outMsg = ($action == 'A') ? 'Recruitment Details added successfully' : 'Recruitment Details updated successfully';
                                       if ($fileDocument != '') {
                                          if (file_exists(APP_PATH. "uploadDocuments/recruitmentDetails/" . $prevFile) && $prevFile != '' && $fileDocumentnm != '') {
                                                unlink(APP_PATH. "uploadDocuments/recruitmentDetails/".$prevFile);   
                                          }

                                   if($fileDocumentnm != '') 
                                       $this->GetResizeImage($this, APP_PATH. 'uploadDocuments/recruitmentDetails/',0,60,$fileDocument,$fileTemp);
                                }
                             }  
                        } 
                     }else{
                            header("Location:".APP_URL."error");
                       }
                    $intDist      = ($errFlag == 1) ? $selDist     : 0;
                    $intInst      = ($errFlag == 1) ? $selInst     : 0;
                    $strNameE     = ($errFlag == 1) ? $txtNameE    : '';
                    $strNameO     = ($errFlag == 1) ? $txtNameO    : '';
                    $strFileDocument =  ($errFlag == 1) ? $fileDocument : '';
                    $strLink      =  ($errFlag == 1) ? $txtLink    : '';                              

                  $arrResult = array('msg' => $outMsg, 'flag' => $flag, 'intDist' => $intDist, 'intInst' => $intInst, 'strNameE' => $strNameE, 'strNameO' => $strNameO, 'strFileDocument' => $strFileDocument, 'strLink' => $strLink);
                    return $arrResult;      
           }

//============ Function to read Recruitment Details  By :: Arpita Rath On :: 29-03-2017 ===========//
            public function readDtls($id) {

            	 $result = $this->manageDtls('R',$id,0,0,'','','','',0,0,0);
            	    if($result->num_rows > 0) {

            	    	$row          = mysqli_fetch_array($result);
                        $dtlsId       = $row['intRecruitmentId'];
                        $intDist      = $row['intDistId'];
           	       	    $intInst      = $row['intInstId'];
           	       	    $strNameE     = $row['vchNameE'];
           	       	    $strNameO     = $row['vchNameO'];
           	       	    $strFileDocument= $row['vchImage'];
           	       	    $strLink      = $row['vchLink'];
            	    }

            	$arrResult = array('dtlsId' => $dtlsId, 'intDist' => $intDist, 'intInst' => $intInst, 'strNameE' => $strNameE, 'strNameO' => $strNameO, 'strFileDocument' => $strFileDocument, 'strLink' => $strLink);//print_r($arrResult);exit;
            	  return $arrResult;    
            }

  //============ Function to delete Recruitment Details By :: Arpita Rath ======================== //
         public function deleteDtls($action, $ids) {
            $newSessionId           = session_id();
            $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
            if($newSessionId == $hdnPrevSessionId) {       
         	  $ctr = 0;
	          $userId = $_SESSION['adminConsole_userID'];
	          $explIds = explode(',', $ids);
	          $delRec = 0;
		        foreach ($explIds as $indIds) {
		            $result = $this->manageDtls($action,$explIds[$ctr],0,0,'','','','',0,0,$userId);                  
			            $row = mysqli_fetch_array($result);
			            if ($row[0] == 0)
			                $delRec++;
			            $ctr++;
		        }

	        if ($action == 'D') {
	            if ($delRec > 0)
	                $outMsg .= 'Recruitment Details(s) deleted successfully';
	           
	        }
	        else if ($action == 'AC')
	            $outMsg = 'Recruitment Details(s) activated successfully';
	        else if ($action == 'IN')
	            $outMsg = 'Recruitment Details(s) unpublished successfully';
	        else if ($action == 'AR')
	            $outMsg = 'Recruitment Details(s) archived successfully';
	        else if ($action == 'P')
	            $outMsg = 'Recruitment Details(s) published successfully';

	        return $outMsg;
             }else{
                header("Location:".APP_URL."error");
           }  
         }            


    }
?>