<?php

/* * ****Class to manage INstitute ********************
'By                     : T Ketaki Debadarshini	'
'On                     : 23-March-2017       '
Update History        :	
  <Updated by>          :   Rajesh parida
  <Updated On>          : 10-oct-2017  <Remarks>
' Procedure Used        : USP_INSTITUTE_DETAILS       '
* ************************************************** */

class clsInstitute extends Model {
    
    // Function To Manage Institute By::T Ketaki Debadarshini   :: On:: 23-March-2017
    public function manageInstitute($action,$intInstituteId,$intDistId,$strInstituteName,$strInstituteNameO,$intInstituteType,$intEstyear,$strMail,$strPhone,$strWebsite,$strImage,$strAddress,$strAddressO,$strdescription,$strdescriptionO,$strPrinciple,$strPrincipleO,$pubStatus,$intArcstatus,$createdBy,$intPgsize,$strAlias,$strMobile,$piaStatus,$strPincode,$strLat,$strLong,$intParentId,$strQuery,$strMappingCode=null) {
        $categorySql = "CALL USP_INSTITUTE_DETAILS('$action',$intInstituteId,$intDistId,'$strInstituteName','$strInstituteNameO',$intInstituteType,$intEstyear,'$strMail','$strPhone','$strWebsite','$strImage','$strAddress','$strAddressO','$strdescription','$strdescriptionO','$strPrinciple','$strPrincipleO',$pubStatus,$intArcstatus,$createdBy,$intPgsize,'$strAlias','$strMobile',$piaStatus,'$strPincode','$strLat','$strLong',$intParentId,'$strQuery','$strMappingCode');";
    //echo $categorySql;//exit;
        $errAction        = Model::isSpclChar($action);
        $errCategory      = Model::isSpclChar($strInstituteName);
        $errDescription   = Model::isSpclChar($strdescription);
        
        $errAddress       = Model::isSpclChar($strAddress);
        $errPrinciple     = Model::isSpclChar($strPrinciple);

        $errMappingCode   = Model::isSpclChar($strMappingCode);
        
        if ($errAction > 0 || $errCategory > 0 || $errDescription > 0 || $errAddress > 0 || $errPrinciple > 0 ||   $errMappingCode>0)
            header("Location:" . APP_URL . "error");
        else {
            $categoryResult = Model::executeQry($categorySql);
            return $categoryResult;
        }
    }

// Function To Add Upadate Institute By::T Ketaki Debadarshini   :: On:: 23-March-2017
    public function addUpdateInstitute($intinstituteId) {
        
		$newSessionId           = session_id();
                $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
        
		if($newSessionId == $hdnPrevSessionId) {  
            
			$userId                = $_SESSION['adminConsole_userID'];        
			$intInstType           = $_POST['radStatus'];
			$intPiaType            = $_POST['ddlType'];
                        if($_POST['radPIAStatus'])
                        $radPIAStatusArray     = implode(',',$_POST['radPIAStatus']);
			
			$errPIAStatus          = Model::isSpclChar($intPIAStatus);
			
			$ddlDistrict           = empty($_POST['ddlDistrict'])?0:$_POST['ddlDistrict'];
			$txtName               = htmlspecialchars(addslashes($_POST['txtName']), ENT_QUOTES);
			$blankCategory         = Model::isBlank($_POST['txtName']);
			$errCategory           = Model::isSpclChar($_POST['txtName']);
			$lenCategory           = Model::chkLength('max', $_POST['txtName'],100);
			
			$txtNameO              = htmlspecialchars($_POST['txtNameO'], ENT_QUOTES, 'UTF-8'); 
			$lenNameO              = Model::chkLength('max', $_POST['txtNameO'],100);
			
			$txtAlias              = htmlspecialchars(trim($_POST['txtAlias']), ENT_QUOTES);
			$blankAlias            = Model::isBlank($_POST['txtAlias']);
			$errAlias              = Model::isSpclChar($_POST['txtAlias']);
			$lenAlias              = Model::chkLength('max', $_POST['txtAlias'],100);
			
			$txtYear                = ($_POST['txtYear']!='')?trim($_POST['txtYear']):0;
			$txtDescription         = htmlspecialchars(addslashes($_POST['txtSnippet']), ENT_QUOTES);
			
			$lenYear                = Model::chkLength('max', $_POST['txtYear'],4);
			if($intInstType != 5) {
                            
                            $blankDescription      = Model::isBlank($_POST['txtSnippet']);
			    $errDescription        = Model::isSpclChar($_POST['txtSnippet']); 
				
			}
		    			
			$txtPrincpleName        = htmlspecialchars(addslashes($_POST['txtPrincpleName']), ENT_QUOTES);
			$blankPrincpleName      = Model::isBlank($_POST['txtPrincpleName']);
			$errPrincpleName        = Model::isSpclChar($_POST['txtPrincpleName']); 
			$lenPrincpleName        = Model::chkLength('max', $_POST['txtPrincpleName'],100);

                        $txtPrincpleNameO       = htmlspecialchars($_POST['txtPrincpleNameO'], ENT_QUOTES, 'UTF-8'); 
			$lenPrincpleNameO       = Model::chkLength('max', $_POST['txtPrincpleNameO'],100);
			
			$txtDescriptionO        = htmlspecialchars($_POST['txtSnippetO'], ENT_QUOTES, 'UTF-8'); 
			
			$fileDocumentnm         = $_FILES['fileDocument']['name'];
			$prevFile               = $_POST['hdnImageFile'];
			$fileSize               = $_FILES['fileDocument']['size'];
			$fileTemp               = $_FILES['fileDocument']['tmp_name'];
			$ext                    = pathinfo($fileDocumentnm , PATHINFO_EXTENSION);
			$fileDocument           = ($fileDocumentnm != '') ? 'sector' . date("Ymd_His") . '.' . $ext : '';
			$fileMimetype           = mime_content_type($fileTemp);
			$filewidth              = 640;
					
			
			/****rajesh*****/
			
			$txtEmail               = htmlspecialchars(addslashes($_POST['txtEmail']), ENT_QUOTES);
			$blankMail              = Model::isBlank($_POST['txtEmail']);
			$errMail                = Model::isSpclChar($_POST['txtEmail']);
			$lenMail                = Model::chkLength('max', $_POST['txtEmail'],70);
			
			$txtPhoneno             = htmlspecialchars(addslashes($_POST['txtPhoneno']), ENT_QUOTES);
			//$blankPhoneno           = Model::isBlank($_POST['txtPhoneno']);
			$errPhoneno             = Model::isSpclChar($_POST['txtPhoneno']);
			$lenPhoneno             = Model::chkLength('max', $_POST['txtPhoneno'],12);
			
			$txtWebsite             = htmlspecialchars(addslashes($_POST['txtWebsite']), ENT_QUOTES);
			//$blankWebsite           = Model::isBlank($_POST['txtWebsite']);
			$errWebsite             = Model::isSpclChar($_POST['txtWebsite']);
			$lenWebsite             = Model::chkLength('max', $_POST['txtWebsite'],100);
			
			$txtPincode             = htmlspecialchars(addslashes($_POST['txtPincode']), ENT_QUOTES);
                        $errPincode             = Model::isSpclChar($_POST['txtPincode']);
			$lenPincode             = Model::chkLength('max', $_POST['txtPincode'],6);
		  
                        $txtAddress             = htmlspecialchars(addslashes($_POST['txtAddress']), ENT_QUOTES);
			$blankAddress           = Model::isBlank($_POST['txtAddress']);
			$errAddress             = Model::isSpclChar($_POST['txtAddress']); 
			
			$lenAddress             = Model::chkLength('max', $_POST['txtAddress'],500);
			
			$txtAddressO            = htmlspecialchars($_POST['txtAddressO'], ENT_QUOTES, 'UTF-8');
			
			$txtMobileNo            = htmlspecialchars($_POST['txtMobileNo'], ENT_QUOTES);
			//$blankMobileNo          = Model::isBlank($txtMobileNo);
			$errMobileNo            = Model::isSpclChar($txtMobileNo);
			$lenMobileNo            = Model::chkLength('max', $txtMobileNo, 10);
			
			$txtLat                 = htmlspecialchars(addslashes($_POST['txtLat']), ENT_QUOTES);
			//$blankLat               = Model::isBlank($_POST['txtLat']);
			$errLat                 = Model::isSpclChar($_POST['txtLat']);
			$lenLat                 = Model::chkLength('max', $_POST['txtLat'],40);
			$txtLat                 = empty($_POST['txtLat'])?0:htmlspecialchars(addslashes($_POST['txtLat']), ENT_QUOTES);
			
			$txtLong                = empty($_POST['txtLong'])?0:htmlspecialchars(addslashes($_POST['txtLong']), ENT_QUOTES);
			$blankLong              = Model::isBlank($_POST['txtLong']);
			$errLong                = Model::isSpclChar($_POST['txtLong']);
            $lenLong                = Model::chkLength('max', $_POST['txtLong'],40);
            
            $strMappingCode         = empty($_POST['ddlMappingData'])?'':htmlspecialchars($_POST['ddlMappingData'], ENT_QUOTES);

            /*New updated field as InstituteMapping code added BY Ashis kumar Patra on 11-June-2019*/
                        
                        if($intInstType==3){
                            $strSchemes         = $_POST['radPIAStatus']; 
                            $noOfScheme         = count($strSchemes);
                            $sqlTagging         = '';
                            for ($i = 0; $i < $noOfScheme; $i++) {
                               
                                 $sqlTagging    .= '(@P_INST_ID,'.trim($strSchemes[$i]).',NOW(),'.$userId.','.$intInstType.'),';
                                 
                            }
                            $sqlTagging         =  rtrim($sqlTagging,',');
                        }
                        
                        $intParentId            = empty($_POST['ddlPartner'])?0:$_POST['ddlPartner'];
                        
			$outMsg                 = '';
			$flag                   = ($intinstituteId != 0) ? 1 : 0;
			$action                 = 'AU';
			$errFlag                = 0 ; //
			
			if(($blankCategory >0) || $blankAlias>0 || ($intInstType != 5 && ($blankDescription >0 ||  $blankAddress>0)) || ($intInstType==3 && $noOfScheme==0))
			{
				$errFlag		= 1;
				$flag                   = 1;
                                $outMsg			= "Mandatory Fields should not be blank";
			}
			else if($lenCategory>0 || $lenYear>0 || $lenAlias>0 || $lenMail>0 || $lenPhoneno>0 || $lenWebsite>0 || $lenPrincpleName>0 || $lenAddress>0 || $lenMobileNo>0 || $lenPincode || $lenLat || $lenLong)
			{
				$errFlag		= 1;
				$flag                   = 1;
				$outMsg			= "Length should not exceed maxlength";
			}
			else if(($errCategory>0) || ($errDescription>0) || $errAlias>0 || $errMail>0 || $errPhoneno>0 || $errPrincpleName>0 || $errAddress>0 || $errMobileNo>0 || $errPincode>0 || $errPIAStatus >0 || $errLat >0 || $errLong>0)
			{
				$errFlag		= 1;
				$flag                   = 1;
				$outMsg			= "Special Characters are not allowed";
			}
			else if($fileMimetype!='image/gif' && $fileMimetype!='image/jpeg' && $fileMimetype!='image/jpg' && $fileDocumentnm!='') {
				$errFlag               = 1;
				$flag                  = 1;
				$outMsg                = 'Invalid file types. Upload only jpg,jpeg,gif';
			}
		  
                        if ($fileDocumentnm == '' && $intinstituteId != 0) {
				$fileDocument = $prevFile;    
			}
			
			if($errFlag==0  && $userId>0) {
                            try { 


                                $result         = $this->manageInstitute($action,$intinstituteId,$ddlDistrict,$txtName,$txtNameO,$intPiaType,$txtYear,$txtEmail,$txtPhoneno,$txtWebsite,$fileDocument,$txtAddress,$txtAddressO,$txtDescription,$txtDescriptionO,$txtPrincpleName,$txtPrincpleNameO,0,0,$userId,0,$txtAlias,$txtMobileNo,$intInstType,$txtPincode,$txtLat,$txtLong,$intParentId,$sqlTagging,$strMappingCode);


                                if($result) {

                                        $numRow     = $result-> fetch_array();
                                        $statusflag = $numRow['@P_STATUS']; 

                                        if($statusflag =='0') {
                                          $outMsg   = 'Institute Details already exists';
                                          $errFlag  = 1;
                                          $flag     = 1;

                                        } else {

                                                $outMsg = ($intinstituteId != 0) ?'Institute Details updated successfully':'Institute Details added successfully';
                                                if ($fileDocument != '') {

                                                        if (file_exists("uploadDocuments/institute/" . $prevFile) && $prevFile != '' && $fileDocumentnm!= '') {                                  
                                                                 unlink("uploadDocuments/institute/" . $prevFile);  

                                                    }
                                                    if($fileDocumentnm != '') {
                                                                $this->GetResizeImage($this,'uploadDocuments/institute/',$filewidth,0,$fileDocument,$fileTemp);
                                                            //move_uploaded_file($fileTemp, "uploadDocuments/messageBoard/" . $fileDocument);
                                                        }
                                                }
                                        }
                                }

                            } catch (Exception $e) { 
                               $outMsg      =  'Some error occured. Please try again'; 
                               $errFlag     = 1;
                            } 
			}
        
		} else {
            header("Location:".APP_URL."error");
        }  
        $ddlDistrict         = ($errFlag == 1) ? $ddlDistrict : 0; 
        $strHeadline         = ($errFlag == 1) ? htmlentities($txtName) : ''; 
        $strAlias            = ($errFlag == 1) ? htmlentities($txtAlias) : '';
        $strHeadlineO        = ($errFlag == 1) ? htmlentities($txtNameO) : '';
         
        $intPIAStatus        = ($errFlag == 1) ? $intInstType : 0;  
        
        $intParentId         = ($errFlag == 1) ? $intParentId : 0;  
        $intYear             = ($errFlag == 1) ? htmlentities($txtYear) : '';  
        $strEmail            = ($errFlag == 1) ? htmlentities($txtEmail) : '';
        $strPhoneno          = ($errFlag == 1) ? htmlentities($txtPhoneno) : '';
        $strPincode          = ($errFlag == 1) ? htmlentities($txtPincode) : ''; 
        $strWebsite          = ($errFlag == 1) ? htmlentities($txtWebsite) : '';
        $strAddress          = ($errFlag == 1) ? htmlentities($txtAddress) : '';    
        $strAddressO         = ($errFlag == 1) ? htmlentities($txtAddressO) : ''; 
        $strMobileno         = ($errFlag == 1) ? htmlentities($txtMobileNo) : '';
        $strDescription      = ($errFlag == 1) ? htmlentities($txtDescription) : '';
        $strDescriptionO     = ($errFlag == 1) ? htmlentities($txtDescriptionO) : '';    
        $strPrincpleName     = ($errFlag == 1) ? htmlentities($txtPrincpleName) : '';
        $strPrincpleNameO    = ($errFlag == 1) ? htmlentities($txtPrincpleNameO) : ''; 
        $strLat              = ($errFlag == 1) ? htmlentities($txtLat): '';   
        $strLong             = ($errFlag == 1) ?htmlentities( $txtLong) : ''; 
        $intInstitute_id     = ($statusflag == 0) ? '' : $statusflag; 
        $intInstType         = ($statusflag == 0) ? '' : $intInstType;	
        $strMappingCode      = 	($statusflag == 0) ? '' : $strMappingCode ;	
		
        $arrResult = array('msg' =>$outMsg, 'flag' =>$errFlag,'intParentId' =>$intParentId, 'strAlias' =>$strAlias, 'ddlDistrict' =>$ddlDistrict, 'strHeadline' =>$strHeadline, 'strDescription' =>$strDescription,'strHeadlineO' =>$strHeadlineO,'strDescriptionO' =>$strDescriptionO, 'intInstType' =>$intInstType, 'intYear' =>$intYear, 'strEmail' =>$strEmail,'strPhoneno' =>$strPhoneno,'strWebsite' =>$strWebsite, 'strAddress' =>$strAddress, 'strAddressO' =>$strAddressO, 'strPrincpleName' =>$strPrincpleName,'strPrincpleNameO' =>$strPrincpleNameO, 'strMobileno' => $strMobileno,'strPincode'=>$strPincode,'intPIAStatus'=>$intPIAStatus,'strLat'=>$strLat,'strLong'=>$strLong,'mappingCOde'=>$strMappingCode ,'last_insert_id'=>$intInstitute_id);
        return $arrResult;
    }

// Function To read Institute By::T Ketaki Debadarshini   :: On:: 23-March-2017
    public function readInstitute($id) {

        $result = $this->manageInstitute('R',$id,0,'','',0,0,'','','','','','','','','','',0,0,0,0,'','',0,'',0,0,0,'');
        if (mysqli_num_rows($result) > 0) {

            $row               = mysqli_fetch_array($result);
                
        }
        return $row; 
		
    }
	
	
    // Function To read Institute By::T Ketaki Debadarshini   :: On:: 23-March-2017
    public function readInstitutePia($id) {

        $result = $this->manageInstitute('RS',$id,0,'','',0,0,'','','','','','','','','','',0,0,0,0,'','',0,'',0,0,0,'');
       
        return $result; 
		
		
    }
	 
    
    // Function To read Institute by alias By::T Ketaki Debadarshini   :: On:: 23-March-2017
    public function readInstituteByAlias($strAlias) {

        $result = $this->manageInstitute('RA',0,0,'','',0,0,'','','','','','','','','','',0,0,0,0,$strAlias,'',0,'',0,0,0,'');
        if (mysqli_num_rows($result) > 0) {

            $row               = mysqli_fetch_array($result);
                 
        }
        return $row;
    }

// Function To Delete Institute By::T Ketaki Debadarshini   :: On:: 23-March-2017
    public function deleteInstitute($action, $ids) {
        $newSessionId           = session_id();
       $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
       if($newSessionId == $hdnPrevSessionId) {   
            $ctr        = 0;
            $userId     = $_SESSION['adminConsole_userID'];
            $explIds    = explode(',', $ids);
            $delRec     = 0;
            foreach ($explIds as $indIds) {
                $result = $this->manageInstitute($action,$explIds[$ctr],0,'','',0,0,'','','','','','','','','','',0,0,$userId,0,'','',0,'',0,0,0,'');
                $row    = mysqli_fetch_array($result);
                if ($row[0] == 0)
                    $delRec++;
                $ctr++;
            }

            if ($action == 'D') {
                if ($delRec > 0)
                    $outMsg .= 'Institute(s) deleted successfully';
                else
                    $outMsg .= 'Dependency record exist. One or More Institute(s) could not be deleted';
            }
            else if ($action == 'AC')
                $outMsg = 'Institute Details activated successfully';
            else if ($action == 'IN')
                $outMsg = 'Institute Details unpublished successfully';
            else if ($action == 'AR')
                $outMsg =  'Institute Details archieved successfully';
            else if($action == 'P')
                $outMsg =  'Institute Details Published successfully';

            return $outMsg;
         }else{
                header("Location:".APP_URL."error");
           }
    }



    // Function To fill Institute name By::Rahul Kumar Saw:: On:: 21-August-2019

        public function fillInstituteITIOSDA($intInsType) 
          {
          
                   //$intInsType           = 1;  
                   $result              = $this->manageInstitute('V',0,0,'','',0,0,'','','','','','','','','','',0,0,0,0,'','',$intInsType,'',0,0,0,'');
                   $opt                 = '<option value="0">--Select--</option>';
                   $instituteArray         = array();
                   if(mysqli_num_rows($result)>0)
                   {     $ctr =0;          
                       while($row = mysqli_fetch_array($result))
                       {
                           $instituteArray[$ctr]['intInstituteId']   = $row["intInstituteId"];
                           $instituteArray[$ctr]['strInstituteName'] = htmlspecialchars_decode($row["vchInstituteName"],ENT_QUOTES);
                          $ctr++; 
                       }

                       $arrResult = array('instituteArray' => $instituteArray);
                        return $arrResult;
                   }
                      
           } 

         /*   public function fillNICCourse($selVal) {
            $result              = $this->manageCourse('CMD',0,0,'','','',0,0,'','',0,0,0,0,'','0.0', 0);
           
            $opt                 = '<option value="0">--Select--</option>';
            $nicCourseArray      = array();
           // $aryInstituteType          = array('1'=>'I.T.I','2'=>'Polytechnic','3'=>'Training Center','4'=>'ASTI'); 
            if(mysqli_num_rows($result)>0)
            { 
                $ctr =0;            
                while($row           = mysqli_fetch_array($result))
                {
                     
                    $nicCourseArray[$ctr]['intInstituteId']      = $row["vchCourseCode"];
                    $nicCourseArray[$ctr]['intSectorId']         = $row["vchSectorId"];
                    
                    $nicCourseArray[$ctr]['strInsNameE']         = htmlspecialchars_decode(htmlspecialchars(str_replace('–','-', $row["vchCourseNameE"]),ENT_QUOTES),ENT_QUOTES);
                    $ctr++;
                }
                $arrResult = array('nicCourseArray' => $nicCourseArray);
                return $arrResult;
            }
           
         }*/


         public function fillSamsITIInstitute($insType) {

            $result              = $this->manageInstitute('IV',0,0,'','',0,0,'','','','','','','','','','',0,0,0,0,'','',$insType,'',0,0,0,'');
           
            $opt                 = '<option value="0">--Select--</option>';
            $samsInstituteArray      = array();
           // $aryInstituteType          = array('1'=>'I.T.I','2'=>'Polytechnic','3'=>'Training Center','4'=>'ASTI'); 
            if(mysqli_num_rows($result)>0)
            { 
                $ctr =0;            
                while($row           = mysqli_fetch_array($result))
                {
                     
                    $samsInstituteArray[$ctr]['intInstituteId']      = $row["intInstituteId"];
                    $samsInstituteArray[$ctr]['intInstituteSamsCode']  = $row["intInstituteSamsCode"];
                    
                    $samsInstituteArray[$ctr]['strInsNameE']         = htmlspecialchars_decode(htmlspecialchars(str_replace('–','-', $row["vchInstituteName"]),ENT_QUOTES),ENT_QUOTES);
                    $ctr++;
                }
                $arrResult = array('samsInstituteArray' => $samsInstituteArray);
                return $arrResult;
            }
           
         }



         // Function To Add Institute Details By::Rahul Kumar Saw:: On:: 21-August-2019
        public function addInstituteTagged($intInstituteTaggedId) {
         $newSessionId           = session_id();
         $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
         if($newSessionId == $hdnPrevSessionId) {     
            
            //$userId                  = USER_ID;
            $userId = $_SESSION['adminConsole_userID'];
            $hiddenFlag = $_POST['hiddenITI'];
            $samsITI  = $_POST['ddlSams'];
            $osdaVal  = $_POST['ddlOsda'];
            
            $outMsg                  = '';
            $flag                    = ($intInstituteTaggedId != 0) ? 1 : 0;
            $action                  = 'ATD';
            $errFlag                 = 0 ;
            $querySamsITIInstitute   = '';
            $querySamsPOLInstitute   = '';
            //$queryNICCourse          = '';
            $queryInstitute          = '';
            $queryID                 = '';

            $samsInstituteArray  =  $this->fillSamsITIInstitute('1');
            $samsInstituteName   =  $samsInstituteArray['samsInstituteArray'];
            $noOfSamsInstitute   = count($samsInstituteName);
//echo $noOfSamsCourse;exit;
           // foreach($_POST['ddlOsda'] as $key=>$val)


            for ($i = 0; $i < $noOfSamsInstitute; $i++) {
                        
                        if($_POST['ddlSams'][$i]>0)
                        {
                        $samsIti            = (!empty($_POST['ddlSams'][$i]))?$_POST['ddlSams'][$i]:'';
                        $intOsda            = (!empty($_POST['ddlOsda'][$i]))?$_POST['ddlOsda'][$i]:'';
                        $intNICCourse       = 0;
                        $intSAMSPOLCourseId = 0;
                      
                        
                      if($intOsda!="")
                        {
                        $querySamsITIInstitute.='("'.$samsIti.'","'.$intOsda .'","'.$intNICCourse .'","'.$intSAMSPOLCourseId .'",111),';
                        $queryID.=''.$intOsda .',';
                        }
                        
                   
                       }
              } 
              $querySamsITIInstitute = rtrim($querySamsITIInstitute,',');
              


            $samsCourseArray     =  $this->fillSamsITIInstitute('2');
            $samsPolInsName   =  $samsCourseArray['samsInstituteArray'];
            $noOfSamsPolIns   = count($samsPolInsName);

            for ($j = 0; $j < $noOfSamsPolIns; $j++) {
                        
                        if($_POST['ddlSams'][$j]>0)
                        { 
                        $intSAMSPOLCourseId = (!empty($_POST['ddlSams'][$j]))?$_POST['ddlSams'][$j]:'';
                        $intOsda            = (!empty($_POST['ddlOsda'][$j]))?$_POST['ddlOsda'][$j]:'';
                        $intNICCourse       = 0;
                        $samsIti            = 0;
                        if($intOsda!="")
                        {
                        $querySamsPOLInstitute.='("'.$samsIti.'","'.$intOsda .'","'.$intNICCourse .'","'.$intSAMSPOLCourseId .'",111),';
                        }
                    }

              } 
              $querySamsPOLInstitute = rtrim($querySamsPOLInstitute,',');

             /*$osdaCourseName =  $this->fillCourseTagged('0');
             $courseArray    = $osdaCourseName['courseArray'];
             $osdaCourse    = count($courseArray); 

             for ($k = 0; $k < $osdaCourse; $k++) {
                        
                        if($_POST['ddlOsda'][$k]>0)
                        {
                        $intNICCourseId     = (!empty($_POST['ddlMappingData'][$k]))?$_POST['ddlMappingData'][$k]:'';
                        $intOsda            = (!empty($_POST['ddlOsda'][$k]))?$_POST['ddlOsda'][$k]:'';
                        $intSAMSPOLCourseId = 0;
                        $samsIti            = 0;
                        if($intNICCourseId!="")
                        {
                        $queryNICCourse.='("'.$samsIti.'","'.$intOsda .'","'.$intNICCourseId .'","'.$intSAMSPOLCourseId .'",111),';
                        }
                        }
              } 
              $queryNICCourse = rtrim($queryNICCourse,',');*/
              if($hiddenFlag==1)
              {
                $queryInstitute = $querySamsITIInstitute;
              }
              else if ($hiddenFlag==2)
              {
                $queryInstitute = $querySamsPOLInstitute;
              }
              /*else if ($hiddenFlag==3)
              {
                $queryCourse = $queryNICCourse;
              }*/
              $queryID            = rtrim($queryID,',');
//print_r ($querySamsPOLInstitute."h11ii");exit;
            if($errFlag==0 && $userId>0){
                try {   
                    $result         = $this->manageInstitute($action,0,0,'','',0,0,'','','','','','',$queryInstitute,'','','',0,0,0,0,'','',0,'',0,0,0,$queryID);
                    if($result)
                    {
                        $numRow     = $result-> fetch_array();
                        $statusflag = $numRow['@P_STATUS']; 

                        if($statusflag =='0'){
                          $outMsg   = 'Institute Details already Tagged';
                          $errFlag  = 1;
                          $flag     = 1;
                        }else{
                            $outMsg = 'Institute Details tagged successfully';
                       }
                    }
                 } catch (Exception $e) { 
                   $outMsg =  'Some error occured. Please try again'; 
                 } 
             }


            }else{
                header("Location:" . APP_URL . "error");
           }   
            /*$intOsda            = ($errFlag == 1) ? $intOsda : 0;
            $intSAMS            = ($errFlag == 1) ? $intSAMS : 0;   
            $ddlMappingData     = ($errFlag == 1) ? $ddlMappingData : 0; */

            $arrResult = array('msg' => $outMsg, 'flag' => $errFlag);
            return $arrResult;
        }


}



?>
