<?php
/* * ****Class to manage Logo ********************
        'By                     :T Ketaki Dabadarshini	'
        'On                     : 28-Aug-2015        '
        ' Procedure Used        : USP_MANAGE_LOGO       '
        * ************************************************** */

        class clsLogo extends Model {
        // Function To Manage logo By::T Ketaki Dabadarshini   :: On:: 28-AUG-2015
            public function manageLogo($action, $logoId, $Title, $TitleH, $Image,$ImageH,$ImageH2,$ImageInner,$ImageInnerO,$pubStatus, $previlige, $createdBy, $approval) {
                $logoId         = htmlspecialchars($logoId,ENT_QUOTES);
                $Title          = htmlspecialchars(addslashes($Title),ENT_QUOTES);
                $TitleH         = $TitleH;
                $description    = htmlspecialchars(addslashes($description),ENT_QUOTES);  
                $logoSql = "CALL USP_MANAGE_LOGO('$action', $logoId, '$Title', '$TitleH', '$Image', '$ImageH','$ImageH2','$ImageInner','$ImageInnerO',$pubStatus,$previlige,$createdBy,$approval,@OUT);";
           // echo $logoSql;          
                $errAction          = Model::isSpclChar($action);
                $errTitle           = Model::isSpclChar($Title);
                $errfetImage        = Model::isSpclChar($Image); 
                $errfetImageH       = Model::isSpclChar($ImageH);
                if ($errAction > 0 || $errTitle > 0 || $errfetImage > 0 || $errfetImageH > 0)
                    header("Location:" . APP_URL . "error");
                else {
                    $result = Model::executeQry($logoSql);
                    return $result;
                }
            }

        // Function To Add Upadate Page By::T Ketaki Dabadarshini :: On:: 29-Aug-2015
            public function  addUpdateLogo($LogoId) 
            {
                $newSessionId           = session_id();
                $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
                if($newSessionId == $hdnPrevSessionId) {   
                    $userId             = (isset($_SESSION['adminConsole_userID']))?$_SESSION['adminConsole_userID']:0;
                    $logoId             = (isset($LogoId))?$LogoId:0;
                    $txtTitle           = $_POST['txtTitle'];  
                    $blankTitle         = Model::isBlank($txtTitle);
                    $errTitle           = Model::isSpclChar($_POST['txtTitle']);
                    $lenTitle           = Model::chkLength('max', $txtTitle,100);

                   // $txtTitle           = '';
                    $txtTitleO           = htmlspecialchars($_POST['txtTitleO'], ENT_QUOTES, 'UTF-8');
                    $errTitleO           = Model::isSpclChar($txtTitleO);
                    $fileDocumentnm      = $_FILES['fileDocument']['name'];
    /*logo Admin*/
                    $prevFile               = $_POST['hdnfileLogo'];
                    $fileSize               = $_FILES['fileDocument']['size'];
                    $fileTemp               = $_FILES['fileDocument']['tmp_name'];
                    $ext                    = pathinfo($fileDocumentnm , PATHINFO_EXTENSION);
                    $fileDocument           = ($fileDocumentnm != '') ? 'Logo' . date("Ymd_His") . '.' . $ext : '';
                    $fileMimetype           = mime_content_type($fileTemp);
                /*Logo Home English*/
                    $fileDocumentHnm           = $_FILES['fileDocumentH']['name'];
                    $prevFileH               = $_POST['hdnfileLogoH'];
                    $fileSizeH               = $_FILES['fileDocumentH']['size'];
                    $fileTempH               = $_FILES['fileDocumentH']['tmp_name'];
                    $extH                    = pathinfo($fileDocumentHnm , PATHINFO_EXTENSION);
                    $fileDocumentH           = ($fileDocumentHnm != '') ? 'LogoH' . date("Ymd_His") . '.' . $extH : '';
                    $fileMimetypeH           = mime_content_type($fileTempH);
                /*Logo Home Odia*/               
                    $fileDocumentOnm           = $_FILES['fileDocumentO']['name'];
                    $prevFileO                 = $_POST['hdnfileLogoO'];
                    $fileSizeO                 = $_FILES['fileDocumentO']['size'];
                    $fileTempO                 = $_FILES['fileDocumentO']['tmp_name'];
                    $extO                      = pathinfo($fileDocumentOnm , PATHINFO_EXTENSION);
                    $fileDocumentO             = ($fileDocumentOnm != '') ? 'LogoO' . date("Ymd_His") . '.' . $extO : '';
                    $fileMimetypeO             = mime_content_type($fileTempO);

                /*Logo Home INNER English*/
                  /*  $fileDocumentHInm         = $_FILES['fileDocumentInner']['name'];
                    $prevFileHI               = $_POST['hdnfileLogoInner'];
                    $fileSizeHI               = $_FILES['fileDocumentInner']['size'];
                    $fileTempHI               = $_FILES['fileDocumentInner']['tmp_name'];
                    $extHI                    = pathinfo($fileDocumentHInm , PATHINFO_EXTENSION);
                    $fileDocumentHI           = ($fileDocumentHInm != '') ? 'LogoI' . date("Ymd_His") . '.' . $extHI : '';
                /*Logo Home INNER Odia*/               
                   /* $fileDocumentIOnm           = $_FILES['fileDocumentInnerO']['name'];
                    $prevFileIO                 = $_POST['hdnfileLogoInnerO'];
                    $fileSizeIO                 = $_FILES['fileDocumentInnerO']['size'];
                    $fileTempIO                 = $_FILES['fileDocumentInnerO']['tmp_name'];
                    $extIO                      = pathinfo($fileDocumentIOnm , PATHINFO_EXTENSION);
                    $fileDocumentIO             = ($fileDocumentIOnm != '') ? 'LogoIO' . date("Ymd_His") . '.' . $extIO : '';*/

                    $outMsg                     = '';
                    $flag                       = ($logoId != 0) ? 1 : 0;
                    $action                     = ($logoId == 0) ? 'A' : 'U';
                    $errFlag                    = 0 ;
                    if($blankTitle >0 )
                    {
                            $errFlag		= 1;
                            $flag                   = 1;
                            $outMsg			= "Mandatory Fields should not be blank";  
                    }
                    else if($lenTitle>0)
                    {
                            $errFlag		= 1;
                            $flag                   = 1;
                            $outMsg			= "Length should not excided maxlength";
                    }
                    else if($errTitle>0 || $errTitleO>0)
                    {
                            $errFlag		= 1;
                            $flag                   = 1;
                            $outMsg			= "Special Characters are not allowed";
                    }
                   else if(($fileMimetype!='image/gif' && $fileMimetype!='image/jpeg' && $fileMimetype!='image/png' && $fileTemp!='') || ($fileMimetypeH!='image/gif' && $fileMimetypeH!='image/jpeg' && $fileMimetypeH!='image/png' && $fileDocumentHnm!='') || ($fileMimetypeO!='image/gif' && $fileMimetypeO!='image/jpeg' && $fileMimetypeO!='image/png' && $fileDocumentOnm!='')) {
                        $errFlag               = 1;
                        $flag                  = 1;
                        $outMsg                = 'Invalid file types. Upload only jpg,jpeg,gif,png';
                    }
                    else if (($fileSize > SIZE2MB) ||($fileSizeH > SIZE2MB) ||($fileSizeO > SIZE2MB))
                    {
                        $errFlag               = 1;
                        $flag                  = 1;
                        $outMsg                = 'File size can not more than 2 MB';
                    }


                     if(($fileDocument == '') && ($logoId != 0))
                        $fileDocument       = $prevFile;

                     if(($fileDocumentH == '') && ($logoId != 0))
                        $fileDocumentH      = $prevFileH;

                     if(($fileDocumentO == '') && ($logoId != 0))
                        $fileDocumentO      = $prevFileO;

                     if(($fileDocumentHInm == '') && ($logoId != 0))
                        $fileDocumentHI     = $prevFileHI;

                     if(($fileDocumentIOnm == '') && ($logoId != 0))
                        $fileDocumentIO     = $prevFileIO;

                    if($errFlag==0 && $userId>0){

                                $result = $this->manageLogo($action, $logoId, $txtTitle,$txtTitleO,$fileDocument,$fileDocumentH,$fileDocumentO,'','', 0,0,0,0,$userId);
                             // echo $result;
                                if ($result)
                                    $outMsg = ($action == 'A') ? 'Logo added successfully ' : 'Logo updated successfully';
                                if ($fileDocumentnm != '') {
                                    if (file_exists("uploadDocuments/Logo/" . $prevFile) && $prevFile != '') {
                                       unlink("uploadDocuments/Logo/" . $prevFile); 
                                    }
                                    move_uploaded_file($fileTemp, "uploadDocuments/Logo/" . $fileDocument);
                                }
                               if($fileDocumentHnm != '') {
                                    if (file_exists("uploadDocuments/Logo/" . $prevFileH) && $prevFileH != '') {
                                      unlink("uploadDocuments/Logo/" . $prevFileH);   
                                    }
                                    move_uploaded_file($fileTempH, "uploadDocuments/Logo/" . $fileDocumentH);
                                }
                                 if($fileDocumentOnm != '') {
                                    if (file_exists("uploadDocuments/Logo/" . $prevFileO) && $prevFileO != '') {
                                      unlink("uploadDocuments/Logo/" . $prevFileO);   
                                    }
                                    move_uploaded_file($fileTempO, "uploadDocuments/Logo/" . $fileDocumentO);
                                } 

                               /* if($fileDocumentHInm != '') {
                                    if (file_exists("uploadDocuments/Logo/" . $prevFileHI) && $prevFileHI != '') {
                                      unlink("uploadDocuments/Logo/" . $prevFileHI);   
                                    }
                                    move_uploaded_file($fileTempHI, "uploadDocuments/Logo/" . $fileDocumentHI);
                                }
                                 if($fileDocumentIOnm != '') {
                                    if (file_exists("uploadDocuments/Logo/" . $prevFileIO) && $prevFileIO != '') {
                                      unlink("uploadDocuments/Logo/" . $prevFileIO);   
                                    }
                                    move_uploaded_file($fileTempIO, "uploadDocuments/Logo/" . $fileDocumentIO);
                                } */

                            }

                   // return $result;
                }else{
                        header("Location:".APP_URL."error");
                   }             
                $strTitle   = ($errFlag == 1) ? htmlentities($txtTitle) : '';
                $strFileName   = ($errFlag == 1) ? htmlentities($fileDocument) : '';
                $strFileNameH   = ($errFlag == 1) ? htmlentities($fileDocumentH) : '';
                $strFileNameO   = ($errFlag == 1) ? htmlentities($fileDocumentO): '';
                
                $strFileDocumentInner    = ($errFlag == 1) ? htmlentities($fileDocumentHI) : '';
                $strFileDocumentInnerO   = ($errFlag == 1) ? htmlentities($fileDocumentIO): '';
                
                $arrResult = array('strTitle' => $strTitle,'strFileName' => $strFileName,'strFileNameH' => $strFileNameH,'strFileNameO' => $strFileNameO,'strFileDocumentInner' => $strFileDocumentInner,'strFileDocumentInnerO' => $strFileDocumentInnerO,'msg' => $outMsg, 'flag' => $flag );
                return $arrResult;

            }

            // Function To Delete Logo  By::Chinmayee  :: On:: 14-Aug-2015
            public function deleteLogo($action, $ids) {
                 $newSessionId           = session_id();
                $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
                if($newSessionId == $hdnPrevSessionId) {   
                    $ctr = 0;
                    $msg=0;
                     $userId = ($_SESSION['adminConsole_userID']!='')?$_SESSION['adminConsole_userID']:0;
                    $explIds = explode(',', $ids);
                    $delRec = 0;
                    $fail	= '';
                    foreach ($explIds as $indIds) {
                        $result1 = $this->manageLogo('R', $explIds[$ctr],'','','','','','','',1, 0, 0, 0,$userId);
                        $row2 = mysqli_fetch_array($result1);
                        $strImageFile = $row2['VCH_IMAGE'];
                        $strImageFileH = $row2['VCH_IMAGE_H'];
                        $strImageFileO = $row2['VCH_IMAGE_O'];

                        $result = $this->manageLogo($action, $explIds[$ctr],'', '','','','','','',1, 0, 0, 0,$userId);
                        $row = mysqli_fetch_array($result);
                         if ($row[0] == 0)
                             $delRec++;
                         $ctr++;

                         if ($action == 'D' && $strImageFile != '' &&  $strImageFileH != '') {
                            if (file_exists("uploadDocuments/Logo/" . $strImageFile)) {
                               // unlink("uploadDocuments/Logo/" . $strImageFile);
                            }
                            if (file_exists("uploadDocuments/Logo/" . $strImageFileH)) {
                                //unlink("uploadDocuments/Logo/" . $strImageFileH);
                            }
                             if (file_exists("uploadDocuments/Logo/" . $strImageFileO)) {
                                //unlink("uploadDocuments/Logo/" . $strImageFileH);
                            }

                        }
                    }
                    if ($action == 'D') {
                        if ($delRec > 0)
                            $outMsg .= 'Logo Detail(s) deleted successfully';
            //            else
            //                $outMsg .= 'Logo can not be  deleted';
                    }

                      else if ($action == 'P')
                        $outMsg = 'Logo published successfully';
                      return $outMsg;
                }else{
                        header("Location:".APP_URL."error");
                 }      
            }



        }   

?>
