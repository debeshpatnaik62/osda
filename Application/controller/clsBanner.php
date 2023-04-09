<?php
/* * **** Class to manage Banner ********************
  '	By	 	         : Rahul Kumar Saw	'
  '	On	 	         : 08-06-2018   '
  ' Procedure Used : USP_BANNER    '
* ************************************************** */
        class clsBanner extends Model
        {
          //
          //-- Function to manage banner By:: Rahul Kumar Saw On:: 08-06-2018
             private function manageBanner($action,$bannerId,$txtBnCpEng,$txtBnCpOdia,$txtBnCpHindi,$txtBnCpMarathi,$txtDescpEng,$txtDescpOdia,$txtDescpHindi,$txtDescpMarathi,$rbtLnkType,$txtLink,$rbtWebLnkType,$selPgNm,$txtUrlName,$txtWebUrl,$selAlignment,$featuredImage,$publishStatus,$createdBy,$attr1,$attr2,$winStatus)
             {
             	  $bannerSql  = "CALL USP_BANNER('$action',$bannerId,'$txtBnCpEng','$txtBnCpOdia','$txtBnCpHindi','$txtBnCpMarathi','$txtDescpEng','$txtDescpOdia','$txtDescpHindi','$txtDescpMarathi',$rbtLnkType,'$txtLink',$rbtWebLnkType,'$selPgNm','$txtUrlName','$txtWebUrl','$selAlignment','$featuredImage',$publishStatus,$createdBy,$attr1,'$attr2',$winStatus);";
              //echo $bannerSql; //exit;
               	$errAction    = $this->isSpclChar($action);
               	$errBannerId  = $this->isSpclChar($bannerId);
               	if($errAction>0 || $errBannerId>0)
               	{
               		 header("Location:" . APP_URL . "error");
               	 } else {
               		  $bannerResult = $this->executeQry($bannerSql,'utf8');
               		     return $bannerResult;
               	 }
             }

          //------ Function to add/update function By:: Rahul Kumar Saw On:: 08-06-2018
               public function addUpdateBanner($bannerId)
               {
                 
                        $txtBnCpEng       = htmlspecialchars(addslashes($_POST['txtBnCpEng']),ENT_QUOTES);
                       //$txtBnCpEng       = $this->mysqliEscapeString($_POST['txtBnCpEng']);
                       $blankBnCpEng     = $this->isBlank($txtBnCpEng);
                       $errBnCpEng       = $this->isSpclChar($txtBnCpEng);
                       $lenBnCpEng       = $this->chkLength('max', $txtBnCpEng, 350);

                         $txtBnCpOdia       = htmlspecialchars(addslashes($_POST['txtBnCpOdia']),ENT_QUOTES,'UTF-8');
                       //$txtBnCpOdia       = $this->mysqliEscapeString($_POST['txtBnCpOdia']);
                       $blankBnCpOdia     = $this->isBlank($txtBnCpOdia);
                       $errBnCpOdia       = $this->isSpclChar($txtBnCpOdia);
                       $lenBnCpOdia      = $this->chkLength('max', $txtBnCpOdia, 1024);


                       
                       // $txtBnCpHindi     = htmlspecialchars($_POST['txtBnCpHindi'],ENT_QUOTES);
                       //$txtBnCpHindi     = $this->mysqliEscapeString($_POST['txtBnCpHindi']);
                       //$lenBnCpHindi     = $this->chkLength('max', $txtBnCpHindi, 100);
                       $txtDescpEng      = htmlspecialchars($_POST['txtDescpEng'],ENT_QUOTES);
                       //$txtDescpEng      = $this->mysqliEscapeString($_POST['txtDescpEng']);
                       $blankDescpEng    = $this->isBlank($txtDescpEng);
                       $errDescpEng      = $this->isSpclChar($txtDescpEng);
                       $lenDescpEng      = $this->chkLength('max', $txtDescpEng, 1024);


                         $txtDescpOdia      = htmlspecialchars($_POST['txtDescpOdia'],ENT_QUOTES,'UTF-8');
                       //$txtDescpOdia      = $this->mysqliEscapeString($_POST['txtDescpOdia']);
                       $blankDescpOdia    = $this->isBlank($txtDescpOdia);
                       $errDescpOdia     = $this->isSpclChar($txtDescpOdia);
                       $lenDescpOdia      = $this->chkLength('max', $txtDescpOdia, 4048);


                       // $txtDescpHindi      = htmlspecialchars($_POST['txtDescpHindi'],ENT_QUOTES);
                       //$txtDescpHindi      = $this->mysqliEscapeString($_POST['txtDescpHindi']);
                      // $lenDescpHindi      = $this->chkLength('max', $txtDescpHindi, 750);
                       $rbtLnkType       = $_POST['rbtLnkType'];
                       $rbtWinStatus     = $_POST['rbtWinStatus'];

                       if($rbtLnkType == 1)
                       {
                            $txtLink      = htmlspecialchars($_POST['txtLink'],ENT_QUOTES);
                            //$txtLink      = $this->mysqliEscapeString($_POST['txtLink']);
                            $blankLink    = $this->isBlank($txtLink);
                            $errLink      = $this->isSpclChar($txtLink);
                            $lenLink      = $this->chkLength('max', $txtLink, 64);
                       } else {
                            $txtLink      = '';
                            $blankLink    = 0;
                       }
                       $rbtWebLnkType       = $_POST['rbtWebLnkType'];
                       if($rbtWebLnkType == 1 && $rbtLnkType==1)
                       {
                            $selPgNm     = ($_POST['selPluginName']>0)?$_POST['selPluginName']:0;
                            $blankPgNm    = $this->chkDropdown($selPgNm);
                            $lenPgNm      = $this->chkLength('max', $selPgNm, 3);
                           // }
                            $txtWebUrl    = '';
                            $blankWebUrl  =0;
                       }
                       else if($rbtWebLnkType == 2 && $rbtLnkType==1)
                       {
                             $txtWebUrl    = htmlspecialchars($_POST['txtWebUrl'],ENT_QUOTES);
                            //$txtWebUrl    = $this->mysqliEscapeString($_POST['txtWebUrl']);
                            $blankWebUrl  = $this->isBlank($txtWebUrl);
                            $errWebUrl    = $this->isSpclChar($txtWebUrl);
                            $lenWebUrl    = $this->chkLength('max', $txtWebUrl, 250);
                            $selPgNm      = 0;
                            //$txtUrlName   = '';
                            $blankPgNm    =0;
                       }
                       else {
                            $selPgNm      = 0;
                            $txtWebUrl    = '';
                            //$txtUrlName   = '';
                            $blankWebUrl  =0;
                            $blankPgNm    =0;
                       }

                       $selAlignment     = $_POST['selAlignment'];
                       $blankAlignment   = $this->isBlank($selAlignment);

                       $featuredImage    = $_FILES['fileFeaturedImage']['name'];
                       $featuredImgNm    = $_FILES['fileFeaturedImage']['name'];
                       $prevFile         = $_POST['hdnImageFile'];
                       $fileSize         = $_FILES['fileFeaturedImage']['size'];
                       $fileTemp         = $_FILES['fileFeaturedImage']['tmp_name'];
                       $ext              = pathinfo($featuredImage, PATHINFO_EXTENSION);
                       $featuredImage    = ($featuredImage != '')?'BannerImage'.date("Ymd_His").'.'.$ext:'';
                       $filePictureMimetype = ($featuredImage != '')?mime_content_type($_FILES['fileFeaturedImage']['tmp_name']):'';

                       $mobileImage    = $_FILES['fileMobileImage']['name'];
                       $mobileImgNm    = $_FILES['fileMobileImage']['name'];
                       $prevMobileImg  = $_POST['hdnMobileImage'];
                       $mobileTemp     = $_FILES['fileMobileImage']['tmp_name'];
                       $mobileExt      = pathinfo($mobileImage, PATHINFO_EXTENSION);
                       $mobileImage    = ($mobileImage != '')?'MobileImage'.date("Ymd_His").'.'.$mobileExt:'';
                       $mobilePictureMimetype = ($mobileImage != '')?mime_content_type($_FILES['fileMobileImage']['tmp_name']):'';


                       $outMsg            = '';
                       $flag              = ($bannerId != 0) ? 1 : 0;
                       $action            = ($bannerId == 0) ? 'A' : 'U';
                       $errFlag           = 0 ;

                       if($action=='U' && $createdBy==4)
                       {
                          $createdBy = 0;
                       } else {
                          $createdBy = 1;
                       }

                       $allowedImg        = array('png' ,'jpg','jpeg');
                       $allowedImgMime    = array('image/jpeg','image/jpg', 'image/png');

                       if($action=='A')
                       {
                           $intSlNo       = ($this->getMaxVal('intSlNo','t_banner','bitDeletedFlag')=='')?1:$this->getMaxVal('intSlNo','t_banner','bitDeletedFlag');

                       } else {
                           $intSlNo       = $_POST['hdnSlNo'];
                       }

                       if($blankLink>0 || $blankWebUrl>0)
                       {
                           $errFlag   = 1;
                           $flag      = 1;
                           $outMsg    = "Mandatory fields should not be left blank";
                       }
                      else if($errWebUrl>0)
                       {
                           $errFlag   = 1;
                           $flag      = 1;
                           $outMsg    = "Special characters are not allowed";
                       }
                      else if($lenWebUrl>0 )
                       {
                           $errFlag   = 1;
                           $flag      = 1;
                           $outMsg    = "Length should not exceed maxlength";
                       }

                       else if($ext!='' && !in_array($ext,$allowedImg) )
                       {
                           $errFlag   = 1;
                           $flag      = 1;
                           $outMsg    = "Not a valid file Upload (.jpg,jpeg,png) file only";
                       }
                       else if($ext!='' && !in_array($filePictureMimetype,$allowedImgMime)) {
                           $errFlag   = 1;
                           $flag      = 1;
                           $outMsg    = "Not a valid file Upload (.jpg,jpeg,png) file only";
                       }

                       if ($featuredImage == '' && $bannerId != 0)
                           $featuredImage = $prevFile;
                           $txtUrlName='';

                       if ($mobileImage == '' && $bannerId != 0){
                           $mobileImage = $prevMobileImg;
                           // $txtUrlName='';

                       }
                         if($errFlag == 0)
                         {
                             $result = $this->manageBanner($action,$bannerId,$txtBnCpEng,$txtBnCpOdia,'','',$txtDescpEng,$txtDescpOdia,'','',$rbtLnkType,$txtLink,$rbtWebLnkType,$selPgNm,$txtUrlName,$txtWebUrl,$selAlignment,$featuredImage,0,0,$intSlNo,$mobileImage,$rbtWinStatus);

                                if($result)
                                {
                                    if($action == 'A')
                                    {
                                        $outMsg   = "Banner details added successfully";
                                        $errFlag  = 0;
                                    } else if($action == 'U') {
                                        $outMsg   = "Banner details updated successfully";
                                        $errFlag  = 0;
                                    }
                                }

                                if($featuredImage != '')
                                {
                                    if(file_exists("uploadDocuments/banner/" . $prevFile) && $prevFile != '' && $featuredImgNm != '')
                                    {
                                        unlink("uploadDocuments/banner/" . $prevFile);
                                    }
                                   move_uploaded_file($fileTemp, "uploadDocuments/banner/" . $featuredImage);

                                }

                                if($mobileImage != '')
                                {
                                    if(file_exists("uploadDocuments/banner/" . $prevMobileImg) && $prevMobileImg != '' && $mobileImgNm != '')
                                    {
                                        unlink("uploadDocuments/banner/" . $prevMobileImg);
                                    }
                                   move_uploaded_file($mobileTemp, "uploadDocuments/banner/" . $mobileImage);

                                }
                          }

                          $strBnCpEng        = ($errFlag == 1) ? htmlentities($txtBnCpEng)      : '';
                          $strBnCpOdia       = ($errFlag == 1) ? htmlentities($txtBnCpOdia)     : '';
                          $strDescpEng       = ($errFlag == 1) ? htmlentities($txtDescpEng)     : '';
                           $strDescpOdia       = ($errFlag == 1) ? htmlentities($txtDescpOdia)  : '';
                          $intLinkType       = ($errFlag == 1) ? $rbtLnkType      : 0;
                          $strLink           = ($errFlag == 1) ? htmlentities($txtLink)         : '';
                          $intWebLinkType    = ($errFlag == 1) ? $rbtWebLnkType   : 0;
                          $intPgName         = ($errFlag == 1) ? htmlentities($selPgNm)         : '';
                          $strUrlName        = ($errFlag == 1) ? htmlentities($txtUrlName)      : '';
                          $strWebUrl         = ($errFlag == 1) ? htmlentities($txtWebUrl)       : '';
                          $strAlignment      = ($errFlag == 1) ? htmlentities($selAlignment)    : '';
                          $strImageFile      = ($errFlag == 1) ? htmlentities($featuredImage)   : '';
                          $intWinStatus      = ($errFlag == 1) ? $rbtWinStatus    : 1;

                          $arrResult         = array('msg' => $outMsg, 'errFlag' => $errFlag, 'strBnCpEng' => $strBnCpEng,'strBnCpOdia' => $strBnCpOdia, 'strDescpEng' => $strDescpEng,'strDescpOdia' => $strDescpOdia,'intLinkType' => $intLinkType, 'strLink' => $strLink, 'intWebLinkType' => $intWebLinkType,'intPgName' => $intPgName, 'strUrlName' => $strUrlName, 'strWebUrl' => $strWebUrl, 'strAlignment' => $strAlignment, 'strImageFile' => $strImageFile, 'intWinStatus' => $intWinStatus);
                              return $arrResult;
                   {
                   	   header("Location:".APP_URL."error");
                   }
               }

               // Function To view Banner list, By:: Rahul Kumar Saw On:: 08-06-2018

                public function viewBanner($action,$intRecno,$txtBnCpEng,$publish,$intPgSize,$createdBy=1)
                {
                    try
                    {
                        $result = $this->manageBanner($action,$intRecno,'',$txtBnCpEng,'','','','','','',0,'',0,$intPgSize,'','','','',$publish,$createdBy,0,'',0);
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
                }

                // Function To read Banner for edit, By:: Rahul Kumar Saw On:: 08-06-2018

                public function readBanner($id) {
                    $createdBy              = 1;
                    $result = $this->manageBanner('R',$id,'','','','','','','','',0,'',0,0,'','','','',0,$createdBy,0,'',0);
                    if ($result->num_rows > 0) {
                        $row                =  $result ->fetch_array();
                        $strBnCpEng         =  htmlspecialchars_decode(stripslashes($row['vchBcNmEng']),ENT_QUOTES);
                        $strBnCpOdia         =  htmlspecialchars_decode(stripslashes($row['vchBcNmOdia']),ENT_QUOTES);
                        $strDescpEng        =  htmlspecialchars_decode($row['vchDescpEng'],ENT_QUOTES);
                         $strDescpOdia        =  htmlspecialchars_decode($row['vchDescpOdia'],ENT_QUOTES);
                        $intLinkType        =  $row['tinLinkType'];
                        $strLink            =  $row['vchLinkTitle'];
                        $intWebLinkType     =  $row['tinLinkWebType'];
                        $intPgName          =  htmlspecialchars_decode($row['tinPageName'],ENT_QUOTES);
                        $strUrlName         =  htmlspecialchars_decode($row['vchUrl'],ENT_QUOTES);
                        $strWebUrl          =  htmlspecialchars_decode($row['vchWebUrl'],ENT_QUOTES);
                        $strAlignment       =  $row['vchAlignment'];
                        $strImageFile       =  $row['vchFeaturedImage'];
                        $intSlNo            =  $row['intSlNo'];
                        $intWinStatus       =  $row['tinWinStatus'];
                        $vchMobileImage       =  $row['vchMobileImage'];
                    }
                        $arrResult          = array('errFlag' => $errFlag,'strBnCpEng' => $strBnCpEng,'strBnCpOdia' => $strBnCpOdia,'strDescpEng'=>$strDescpEng,'strDescpOdia'=>$strDescpOdia,'intLinkType' => $intLinkType,'strLink' => $strLink,'intWebLinkType' => $intWebLinkType,'intPgName'=>$intPgName,'strUrlName'=>$strUrlName,'strWebUrl'=>$strWebUrl,'strAlignment'=>$strAlignment,'strImageFile'=>$strImageFile,'intSlNo'=>$intSlNo, 'intWinStatus' => $intWinStatus,'vchMobileImage' => $vchMobileImage);
                             return $arrResult;
                }

             //----- Function to read Banner Details By:: Rahul Kumar Saw On:: 08-06-2018
             public function readBannerDetails($action,$bannerId)
             {
                 $result = $this->manageBanner($action,$bannerId,'','','','','','','','',0,'',0,0,'','','','',0,0,0,'',0);
                   return $result;
             }

             //------ Delete/Active/InActive function for Banner By:: Rahul Kumar Saw On:: 08-06-2018
               public function deleteBanner($action, $ids)
               {
                        $ctr     = 0;
                        $explIds = explode(',', $ids);
                        $userId  = 1;
                         foreach($explIds as $indIds)
                         {
                            if($action=='US')
                               $slNumber = $_POST['txtSLNo'.$indIds];
                            else
                               $slNumber = 0;

                             $result1 = $this->manageBanner('V',$indIds,'','','','','','','','',0,'',0,0,'','','','',0,0,0,'',0);
                             $row = $result1 ->fetch_array();
                             $strImageFile = $row['vchFeaturedImage'];
                             $result = $this->manageBanner($action,$indIds,'','','','','','','','',0,'',0,0,'','','','',0,$userId,$slNumber,'',0);

                             $row     = $result->fetch_array();
                             $ctr++;
                              if ($action == 'D' && $strImageFile != '') {
                                    if (file_exists("uploadDocuments/banner/" . $strImageFile)) {
                                        unlink("uploadDocuments/banner/" . $strImageFile);
                                       }
                                }
                          }
                        if($action == 'D')
                          //echo "hii"; exit;
                            $outMsg = 'Banner(s) deleted successfully';
                          else if ($action == 'P')
                            $outMsg = 'Banner(s) published successfully';
                        else if ($action == 'IN')
                            $outMsg = 'Banner(s) unpublished successfully';

                        else if ($action == 'US')
                            $outMsg = 'Serial number updated successfully';

                        return $outMsg;
                  //  } else
                   // {
                   //     header("Location" .APPURL. "error");
                   //  }
               }


        }  //--- end of class
?>
