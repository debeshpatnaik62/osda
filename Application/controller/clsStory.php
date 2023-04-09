<?php

    /******Class to manage Success story Details ********************
    ' By                     : T Ketaki Debadarshini	'
    ' On                     : 17-Sep-2016              '
    ' Procedure Used         : USP_SUCESS_STORY         '
    *****************************************************************/

    class clsStory extends Model {

        // Function To Manage Success story Details By::T Ketaki Debadarshini   :: On:: 17-Sep-2016 
        public function manageStory($action,$intStoryId,$strName,$strNameO,$strImage,$strSnippet,$strSnippetO,$strDescription,$strDescriptionO,$strPlace,$strPlaceO,$intInstitute,$strAlias,$strDesignation,$strDesignationO,$strEmployer,$strEmployerO,$pubStatus,$intArchiveStatus,$createdBy,$intPagesize,$intSlno) {
            $storySql = "CALL USP_SUCESS_STORY('$action',$intStoryId,'$strName','$strNameO','$strImage','$strSnippet','$strSnippetO','$strDescription','$strDescriptionO','$strPlace','$strPlaceO',$intInstitute,'$strAlias','$strDesignation','$strDesignationO','$strEmployer','$strEmployerO',$pubStatus,$intArchiveStatus,$createdBy,$intPagesize,$intSlno);";
           // echo $storySql;
            $errAction         = Model::isSpclChar($action);
            $errName           = Model::isSpclChar($strName);
           // $errNameO          = Model::isSpclChar($strNameO);
            $errDescription    = Model::isSpclChar($strDescription);
          //  $errDescriptionO   = Model::isSpclChar($strDescriptionO);
            
            $errPlace           = Model::isSpclChar($strPlace);
           // $errPlaceO          = Model::isSpclChar($strPlaceO);
           //  $errInstituteO      = Model::isSpclChar($strAlias);
            $errDesignation     = Model::isSpclChar($strDesignation);
           // $errDesignationO    = Model::isSpclChar($strDesignationO);
            $errEmployer        = Model::isSpclChar($strEmployer);
            $errInstitute       = Model::isSpclChar($intInstitute);

            if ($errAction > 0 || $errName > 0 || $errPlace > 0 || $errInstitute > 0 || $errDesignation > 0 || $errEmployer > 0)
                header("Location:" . APP_URL . "error");
            else {
                $storyResult = Model::executeQry($storySql);
                return $storyResult;
            }
        }

    // Function To Add Upadate Success story Details By::T Ketaki Debadarshini   :: On:: 17-Sep-2016 
        public function addUpdateStory($intStoryId) {
           $newSessionId           = session_id();
            $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
            if($newSessionId == $hdnPrevSessionId) {     
           
                    $userId                  = USER_ID;

                    $txtName                 = htmlspecialchars(addslashes($_POST['txtName']), ENT_QUOTES);
                    $blankName               = Model::isBlank($_POST['txtName']);
                    $errName                 = Model::isSpclChar($_POST['txtName']);
                    $lenName                 = Model::chkLength('max',$txtName,100);            
                    $txtNameO                = htmlspecialchars($_POST['txtNameO'], ENT_QUOTES, 'UTF-8');

                    $txtNameAlias            = htmlspecialchars(addslashes($_POST['txtNameAlias']), ENT_QUOTES);
                    $blankNameAlias          = Model::isBlank($_POST['txtNameAlias']);
                    $errNameAlias            = Model::isSpclChar($_POST['txtNameAlias']);
                    $lenNameAlias            = Model::chkLength('max',$txtNameAlias,100);     

                    $txtPlace                = htmlspecialchars(addslashes($_POST['txtPlace']), ENT_QUOTES);
                    $blankPlace              = Model::isBlank($_POST['txtPlace']);
                    $errPlace                = Model::isSpclChar($_POST['txtPlace']);
                    $lenPlace                = Model::chkLength('max',$txtPlace,100);            
                    $txtPlaceO               = htmlspecialchars($_POST['txtPlaceO'], ENT_QUOTES, 'UTF-8');

                    $intDistrict             = $_POST['ddlDistrict'];
                    $intInstitute            = $_POST['ddlInstitute'];

                    $txtDesignation          = htmlspecialchars(addslashes($_POST['txtDesignation']), ENT_QUOTES);
                    $blankDesignation        = Model::isBlank($_POST['txtDesignation']);
                    $errDesignation          = Model::isSpclChar($_POST['txtDesignation']);
                    $lenDesignation          = Model::chkLength('max',$txtDesignation,100);            
                    $txtDesignationO         = htmlspecialchars($_POST['txtDesignationO'], ENT_QUOTES, 'UTF-8');

                    $txtEmployer             = htmlspecialchars(addslashes($_POST['txtEmployer']), ENT_QUOTES);
                    $blankEmployer           = Model::isBlank($_POST['txtEmployer']);
                    $errEmployer             = Model::isSpclChar($_POST['txtEmployer']);
                    $lenEmployer             = Model::chkLength('max',$txtEmployer,100);            
                    $txtEmployerO            = htmlspecialchars($_POST['txtEmployerO'], ENT_QUOTES, 'UTF-8');

                    $txtSnippet             = htmlspecialchars(addslashes($_POST['txtSnippet']), ENT_QUOTES);
                    $blankSnippet           = Model::isBlank($_POST['txtSnippet']);
                    $errSnippet             = Model::isSpclChar($_POST['txtSnippet']);
                    $lenSnippet             = Model::chkLength('max',$txtSnippet,500);            
                    $txtSnippetO            = htmlspecialchars($_POST['txtSnippetO'], ENT_QUOTES, 'UTF-8');

                    $fileDocumentnm         = $_FILES['fileDocument']['name'];
                    $prevFile               = $_POST['hdnImageFile'];
                    $fileSize               = $_FILES['fileDocument']['size'];
                    $fileTemp               = $_FILES['fileDocument']['tmp_name'];
                    $ext                    = pathinfo($fileDocumentnm , PATHINFO_EXTENSION);
                    $fileDocument           = ($fileDocumentnm != '') ? 'Story' . date("Ymd_His") . '.' . $ext : '';    
                    $fileMimetype           = mime_content_type($fileTemp);

                    $txtDescription         = htmlspecialchars(addslashes($_POST['txtDetailsE']), ENT_QUOTES);
                    $pregDescription        = preg_replace('/\s+/', '', $_POST['txtDetailsE']);
                    $chkTags                = '<button,<form,<iframe,<input,<script,<select,<textarea,alert';
                    $checkTagsStatus        = $this->isSpclTags($pregDescription);     

                    $txtDescriptionO        = urlencode($_POST['txtDetailsO']);
                    $pregDescriptionH       = preg_replace('/\s+/','', $_POST['txtDetailsO']);
                    $checkTagsStatusH       = $this->isSpclTags($pregDescriptionH);     

                    $outMsg                 = '';
                    $flag                   = ($intStoryId != 0) ? 1 : 0;
                    $action                 = 'AU';
                    $errFlag                = 0 ;
                    if($blankName >0 || $blankPlace >0 || $blankDesignation >0 || $blankEmployer >0 || $blankSnippet >0 || $intInstitute==0 || $blankNameAlias>0)
                    {
                            $errFlag		= 1;
                            $outMsg		= "Mandatory Fields should not be blank";
                    }
                    else if($lenName>0 || $lenPlace >0 || $lenNameAlias >0 || $lenDesignation >0 || $lenEmployer >0 || $lenSnippet >0)
                    {
                            $errFlag		= 1;
                            $outMsg		= "Length should not exceed maxlength";
                    }
                    else if($errName>0 || $errPlace>0|| $errInstitute>0 || $errEmployer>0 || $errDesignation>0 || $errSnippet>0 || $errNameAlias>0)
                    {
                            $errFlag		= 1;
                            $outMsg             = "Special Characters are not allowed";
                    }
                   else if ($fileSize > SIZE1MB) {
                        $errFlag                = 1;
                        $flag                   = 1;
                        $outMsg                 = 'File size can not more than 1 MB';
                    }
                   else if($fileMimetype!='image/gif' && $fileMimetype!='image/jpeg' && $fileMimetype!='image/jpg' && $fileMimetype!='image/png' && $fileDocumentnm!='') {
                        $errFlag               = 1;
                        $flag                  = 1;
                        $outMsg                = 'Invalid file types. Upload only jpg,jpeg,gif,png';
                    }
                  else if($checkTagsStatus > 0 || $checkTagsStatusH > 0) {

                        $outMsg                 = "HTML Special Tags Are Not Allowed";
                        $errFlag                = 1;
                        $flag                   = 1;
                    }

                    if ($fileDocument == '' && $intStoryId != 0)
                        $fileDocument = $prevFile;

                    if($errFlag==0 && $userId>0){           
                        $result         = $this->manageStory($action,$intStoryId,$txtName,$txtNameO,$fileDocument,$txtSnippet,$txtSnippetO,$txtDescription,$txtDescriptionO,$txtPlace,$txtPlaceO,$intInstitute,$txtNameAlias,$txtDesignation,$txtDesignationO,$txtEmployer,$txtEmployerO,0,0,$userId,0,0);

                        if($result)
                        {
                            $numRow     = $result-> fetch_array();
                            $statusflag = $numRow['@P_STATUS']; 

                            if($statusflag =='0'){
                              $outMsg   = 'Success Story already exists';
                              $errFlag  = 1;
                              $flag     = 1;
                            }else{
                                $outMsg = ($intStoryId != 0) ?'Success Story details updated successfully':'Success Story details added successfully';

                                 if($fileDocument != ''){
                                    if(file_exists("uploadDocuments/successStory/" . $prevFile) && $prevFile != '' && $fileDocumentnm != '') {
                                          unlink("uploadDocuments/successStory/".$prevFile);   
                                    }
                                   
                                    if($fileDocumentnm != ''){ 
                                        $this->GetResizeImage($this,'uploadDocuments/ThumbImage/Stories/',290,0,$fileDocument,$fileTemp);
                                       
                                        $this->GetResizeImage($this,'uploadDocuments/successStory/',700,0,$fileDocument,$fileTemp);
                                    }
                                }

                           }
                        }
                    }
            }else{
                header("Location:".APP_URL."error");
           } 
            $strName            = ($errFlag == 1) ? htmlentities($txtName) : '';
            $strNameO           = ($errFlag == 1) ? htmlentities($txtNameO) : '';   
            $strFileName        = ($errFlag == 1) ? htmlentities($fileDocument) : ''; 
            $strSnippet         = ($errFlag == 1) ? htmlentities($txtSnippet) : ''; 
            $strSnippetO        = ($errFlag == 1) ? htmlentities($txtSnippetO) : ''; 
            $strDescription     = ($errFlag == 1) ? htmlentities($txtDescription) : ''; 
            $strDescriptionO    = ($errFlag == 1) ? urldecode($txtDescriptionO): '';            
            $strPlace           = ($errFlag == 1) ? htmlentities($txtPlace) : '';
            $strPlaceO          = ($errFlag == 1) ? htmlentities($txtPlaceO) : ''; 
            $intInstitute       = ($errFlag == 1) ? htmlentities($intInstitute) : 0; 
            $intDistrict        = ($errFlag == 1) ? htmlentities($intDistrict) : 0; 
            $strNameAlias       = ($errFlag == 1) ? htmlentities($txtNameAlias) : ''; 
            $strDesignation     = ($errFlag == 1) ? htmlentities($txtDesignation) : ''; 
            $strDesignationO    = ($errFlag == 1) ? htmlentities($txtDesignationO) : ''; 
            $strEmployer        = ($errFlag == 1) ? htmlentities($txtEmployer) : ''; 
            $strEmployerO       = ($errFlag == 1) ? htmlentities($txtEmployerO) : ''; 

            $arrResult = array('strName' => $strName,'strNameO' => $strNameO,'strFileName' => $strFileName,'strSnippet' => $strSnippet,
                'strSnippetO' => $strSnippetO,'strDescription' => $strDescription,'strDescriptionO' => $strDescriptionO,'strPlace' => $strPlace,
                'strPlaceO' => $strPlaceO,'intInstitute' => $intInstitute,'intDistrict' => $intDistrict,'strNameAlias' => $strNameAlias,'strDesignation' => $strDesignation,
                'strDesignationO' => $strDesignationO,'strEmployer' => $strEmployer,'strEmployerO' => $strEmployerO,'msg' => $outMsg, 'flag' => $errFlag);
            
            
            return $arrResult;
        }
      
        
    // Function To read story details  By::T Ketaki Debadarshini   :: On:: 21-Sept-2016
        public function readStory($id) {

            $result = $this->manageStory('R',$id,'','','','','','','','','',0,'','','','','',0,0,0,0,0);
            if (mysqli_num_rows($result) > 0) {

                $row                = mysqli_fetch_array($result);
                $strName            = htmlspecialchars_decode($row['vchNameE'],ENT_QUOTES);
                $strNameO           = $row['vchNameO'];
                $strFileName        = $row['vchImageFile'];
                
                $intInstituteId     = $row['intInstituteId'];
                $intDistrictId      = $row['intDistrictId'];
                $strNameAlias       = htmlspecialchars_decode($row['vchAlias'],ENT_QUOTES);
                
                $strSnippetO        = $row['vchSnippetO'];
                $strSnippet         = htmlspecialchars_decode($row['vchSnippet'],ENT_QUOTES);
                $strDescription     = htmlspecialchars_decode($row['vchDescriptionE'],ENT_QUOTES);
                $strDescriptionO    = urldecode($row['vchDescriptionO']);
                $strPlaceO          = $row['vchPlaceO'];  
                $strPlace           = htmlspecialchars_decode($row['vchPlace'],ENT_QUOTES);                
                
                $strDesignation     = htmlspecialchars_decode($row['vchDesignation'],ENT_QUOTES);
                $strDesignationO    = $row['vchDesignationO'];
                $strEmployer        = htmlspecialchars_decode($row['vchEmployer'],ENT_QUOTES);
                $strEmployerO       = $row['vchEmployerO'];
                $intStatus          = $row['tinPublishStatus']; 
            }

            $arrResult = array('strName' => $strName,'strNameO' => $strNameO,'strFileName' => $strFileName,'strSnippet' => $strSnippet,
                'strSnippetO' => $strSnippetO,'strDescription' => $strDescription,'strDescriptionO' => $strDescriptionO,'strPlace' => $strPlace,
                'strPlaceO' => $strPlaceO,'intDistrictId' => $intDistrictId,'intInstituteId' => $intInstituteId,'strNameAlias' => $strNameAlias,'strDesignation' => $strDesignation,
                'strDesignationO' => $strDesignationO,'strEmployer' => $strEmployer,'strEmployerO' => $strEmployerO,'intStatus' => $intStatus);
                        
            return $arrResult;
        }
        
         
        // Function To read story by alias By::T Ketaki Debadarshini   :: On:: 31-March-2017
        public function readStorybyAlias($strAlias) {

            $result = $this->manageStory('RA',0,'','','','','','','','','',0,$strAlias,'','','','',0,0,0,0,0);
            if (mysqli_num_rows($result) > 0) {

                $row               = mysqli_fetch_array($result);

            }
            return $row;
        }

    // Function To Delete story details  By::T Ketaki Debadarshini   :: On:: 21-Sept-2016
        public function deleteStory($action, $ids) {
            $newSessionId           = session_id();
            $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
            if($newSessionId == $hdnPrevSessionId) {   
                $ctr        = 0;
                $userId     = USER_ID;
                $explIds    = explode(',', $ids);
                $delRec     = 0;
                foreach ($explIds as $indIds) {
                    $slNumber = 0;
                    $indvidualID = $explIds[$ctr];

                     if ($action == 'US') {
                        $slNumber = $_POST['txtSLNo'.$indvidualID];
                        //echo $indvidualID;		
                    }

                    $result = $this->manageStory($action,$indvidualID,'','','','','','','','','',0,'','','','','',0,0,$userId,0,$slNumber);
                    $row = mysqli_fetch_array($result);
                    
                    if ($row[0] == 0)
                        $delRec++;
                    $ctr++;

                }

                if ($action == 'D') {
                    if ($delRec > 0)
                        $outMsg .= 'Success Story(s) deleted successfully';
                    else
                        $outMsg .= 'Dependency record exist. Success Story(s) can not be deleted';
                }
                else if ($action == 'AC')
                    $outMsg = 'Success Story(s) activated successfully';
                else if ($action == 'IN')
                    $outMsg = 'Success Story(s) unpublished successfully';
                else if($action=='US')		
                    $outMsg	= 'Serial number updated successfully';	
                else if ($action == 'AR')
                    $outMsg =  'Success Story(s) archieved successfully';
                else if($action == 'P')
                    $outMsg =  'Success Story(s) Published successfully';
                else if($action=='HH')	
                    $outMsg	=  'Success Story(s) Hide on home page Successfully';	
                else if($action=='SH' && $msg==0)	
                   $outMsg	=  'Success Story(s) Displayed on home page Successfully';  
                else if($action=='US')		
                  $outMsg	= 'Serial number updated successfully';	

                return $outMsg;
            }else{
                header("Location:".APP_URL."error");
           }
        }


    } 
    

?>
