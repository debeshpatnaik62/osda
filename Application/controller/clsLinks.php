<?php

/* * ****Class to manage Page ********************
  '	By	 	 : T Ketaki Debadarshini	'
  '	On	 	 : 28-Aug-2015          '
  ' Procedure Used       : USP_PAGES            '
 * ************************************************** */

class clsPages extends Model {

// Function To Manage Page By::Ajit Kumar Sahoo  :: On:: 23-Nov-2015
    public function managePage($action,$pageId, $pageTitleE, $pageTitleH, $fetImage, $linkType, $url, $templetType, $contentE, $contentH, $pluginName, $windowType, $pubStatus, $createdBy,$arcStatus,$arcStartDate,$arcEndDate,$pageAlias,$metaTitle,$metaType,$metaKey,$metaDesc,$metaImage,$attr1,$attr2,$snippetO,$taglineE,$taglineO)
    {
        $pageId         = htmlspecialchars($pageId,ENT_QUOTES);
        $pageTitleE     = htmlspecialchars(addslashes($pageTitleE),ENT_QUOTES);
        $pageTitleH     = $pageTitleH;
        $fetImage       = htmlspecialchars(addslashes($fetImage),ENT_QUOTES);
        $linkType       = htmlspecialchars(addslashes($linkType),ENT_QUOTES);
        $url            = htmlspecialchars(addslashes($url),ENT_QUOTES);
        $templetType    = htmlspecialchars(addslashes($templetType),ENT_QUOTES);
        $pluginName     = htmlspecialchars(addslashes($pluginName),ENT_QUOTES);       
        $pageSql        = "CALL USP_PAGES('$action','$pageId','$pageTitleE','$pageTitleH','$pageAlias','$metaTitle','$metaKey','$metaDesc','$metaType','$metaImage','$fetImage','$linkType','$url','$templetType','$pluginName','$windowType','$pubStatus','$createdBy','$attr1','$attr2','$snippetO','$taglineE','$taglineO');";
        //echo $pageSql;//exit;
        $errAction          = Model::isSpclChar($action);
        $errPageTitleE      = Model::isSpclChar($pageTitleE);
        $errfetImage        = Model::isSpclChar($fetImage); 
        $errMetaImage       = Model::isSpclChar($metaImage); 
      
        if ($errAction > 0 || $errPageTitleE > 0 || $errfetImage > 0 || $errMetaImage>0)
            header("Location:" . APP_URL . "error");
        else { //echo $pageSql;
            $pageResult = Model::executeQry($pageSql);
            return $pageResult;
        }
    }

    // Function To Manage Page Content By::T Ketaki Debadarshini   :: On:: 28-Aug-2015
    public function managePageContent($action,$contentId,$pageId,$pageNo, $contentE, $contentH,$text) {
        $contentId      = htmlspecialchars($contentId,ENT_QUOTES);
        $pageId         = htmlspecialchars($pageId,ENT_QUOTES); 
        $pageNo         = htmlspecialchars($pageNo,ENT_QUOTES);
       
        $pageSql        = "CALL USP_PAGE_CONTENT('$action','$text','$pageId','$pageNo');";        
        //echo $pageSql; 
        $errAction      = Model::isSpclChar($action);
        $errContentId   = Model::isSpclChar($contentId);
        $errPageId      = Model::isSpclChar($pageId); 
      
        if ($errAction > 0 || $errContentId > 0 || $errPageId > 0)
            header("Location:" . APP_URL . "error");
        else {
            $pageResult = Model::executeQry($pageSql);
            return $pageResult;
        }
    }
    function getMaxPage($pageId)
    {
        $maxRes= $this->managePageContent('MP',0, $pageId,0,'','','');
        if($maxRes->num_rows>0)
        {
            $row        = $maxRes->fetch_array();
            $maxPageno  = $row['maxPageNo'];
        }
            return $maxPageno;
    }
    
    //function to get the plugin details
    function getPlugindetails($page,$webid)
    {
       
        $strAlias           = ($webid=='')?$page:$webid;
        $plugRes            = $this->managePage('GP',0,'','','',0,'',0,'','','',0,0,0,0,'0000-00-00','0000-00-00',$strAlias,'','','','','','0','',0,'','');
        if($plugRes->num_rows>0)
        {
            $row            = $plugRes->fetch_array();
            $strpgname      =($row['intTemplateType']==2)?$row['vchPluginName']:'content';
        }
        return $row;
    }
    
    //functuin to get the plugin details by plugin name
    function getPlugindetailsbyPlugName($pluginName)
    {
       
        $plugRes            = $this->managePage('PA',0,'','','',0,'',0,'','',$pluginName,0,0,0,0,'0000-00-00','0000-00-00','','','','','','','0','',0,'','');
        if($plugRes->num_rows>0)
        {
            $row            = $plugRes->fetch_array();
            
        }
        return $row;
    }
    
    
// Function To Add Upadate Page By::Ajit Kumar Sahoo   :: On:: 23-Nov-2015
    public function addUpdatePages($pageId) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {
            $userId             = ($_SESSION['adminConsole_userID']!='')?$_SESSION['adminConsole_userID']:0;

            $txtTitle_e         = htmlspecialchars(addslashes($_POST['txtTitle_e']), ENT_QUOTES);
            $blankTitleE        = Model::isBlank($txtTitle_e);
            $errTitleE          = Model::isSpclChar($_POST['txtTitle_e']);
            $lenTitleE          = Model::chkLength('max', $txtTitle_e, 30);
            $txtTitle_h         = htmlspecialchars($_POST['txtTitle_H'], ENT_QUOTES, 'UTF-8'); 

            $pageAlias          = htmlspecialchars(addslashes($_POST['txtPageAlias']), ENT_QUOTES);
            $blankAlias         = Model::isBlank($pageAlias);
            $txtTagline         = htmlspecialchars(addslashes($_POST['txtTagline']), ENT_QUOTES);
            $blankTagline       = Model::isBlank($txtTagline);
            $lenTagline         = Model::chkLength('max', $txtTagline, 64);

            $txtTaglineO         = htmlspecialchars($_POST['txtTaglineO'], ENT_QUOTES, 'UTF-8'); 
            $blankTaglineO       = Model::isBlank($txtTaglineO);
            $lenTaglineO         = Model::chkLength('max', $txtTaglineO, 100);

            $metaTitle          = htmlspecialchars(addslashes($_POST['txtMetaTitle']), ENT_QUOTES);
            $metaType           = htmlspecialchars(addslashes($_POST['txtMetaType']), ENT_QUOTES);
            $metaKey            = htmlspecialchars(addslashes($_POST['txtMetaKey']), ENT_QUOTES);
            $metaDesc           = htmlspecialchars(addslashes($_POST['txtMetaDescription']), ENT_QUOTES);        

            $errPagealias       = Model::isSpclChar($_POST['txtPageAlias']);
            $errTagline         = Model::isSpclChar($_POST['txtTagline']);

            $errMetatitle       = Model::isSpclChar($_POST['txtMetaTitle']);
            $errMetatype        = Model::isSpclChar($_POST['txtMetaType']);
            $errMetakey         = Model::isSpclChar($_POST['txtMetaKey']);
            $errMetaDes         = Model::isSpclChar($_POST['txtMetaDescription']);
            $errUrl             = Model::isSpclChar($_POST['txtURL']);

            $txtSnippet          = htmlspecialchars(addslashes($_POST['txtSnippet']), ENT_QUOTES);
           // $blankSnippet        = Model::isBlank($txtSnippet);
            $errSnippet          = Model::isSpclChar($txtSnippet);

            $txtSnippetO         = htmlspecialchars($_POST['txtSnippetH'], ENT_QUOTES, 'UTF-8'); 
            $radPanelStatus      = $_POST['radPanelStatus'];

            $metaImage          = $_FILES['fileMetaImage']['name'];
            $prevMetaFile       = $_POST['hdnMetaImageFile'];
            $fileMetaSize       = $_FILES['fileMetaImage']['size'];
            $fileMetaTemp       = $_FILES['fileMetaImage']['tmp_name'];
            $extMeta            = pathinfo($metaImage, PATHINFO_EXTENSION);
            $metaImage          = ($metaImage != '') ? 'MetaImage' . date("Ymd_His") . '.' . $extMeta : '';
            $fileMetaMimetype   = mime_content_type($fileMetaTemp);

            $fileFeaturedImage  = $_FILES['fileFeaturedImage']['name'];
            $prevFile           = $_POST['hdnImageFile'];
            $fileSize           = $_FILES['fileFeaturedImage']['size'];
            $fileTemp           = $_FILES['fileFeaturedImage']['tmp_name'];
            $ext                = pathinfo($fileFeaturedImage, PATHINFO_EXTENSION);
            $fileFeaturedImage  = ($fileFeaturedImage != '') ? 'FeaturedImage' . date("Ymd_His") . '.' . $ext : '';
            $fileMimetype       = mime_content_type($fileTemp);

            $rbtLnkType         = $_POST['rbtLnkType'];
            if ($rbtLnkType == 2) {
                $txtURL = htmlspecialchars(addslashes($_POST['txtURL']), ENT_QUOTES);

                $txtContentE = '';
                $txtContentH = '';
            } else
                $txtURL = '';
            $radTemplateType = $_POST['radTemplateType'];
            if ($radTemplateType == 1) {
                $txtContentE    = htmlspecialchars(addslashes($_POST['txtContentE']), ENT_QUOTES);
                $txtContentH    = '';
                $selPluginName  = 0;
            } else if ($radTemplateType == 2) {
                $txtContentE    = '';
                $txtContentH = '';
                $selPluginName  = $_POST['selPluginName'];
            } else if ($radTemplateType == 3) {
                $txtContentE    = '';
                $txtContentH    = '';
                $selPluginName  = 0;
            }
            $radWinStatus       = $_POST['radWinStatus'];

            $totalRowNum        = count($_POST['hdnPagevalue']);
            $totalRowNumH       = count($_POST['hdnPagevalueH']);

            $totalRowNum        = count($_POST['hdnPagevalue']);  
            $errPageFlag        = 0; $errPageFlagH        = 0;
            $chkTags            = '<button,<form,<iframe,<input,<script,<select,<textarea,alert';
            for($rowNum=0;$rowNum<$totalRowNum;$rowNum++)
            {
                $pgContent       = $_POST['hdnPagevalue'][$rowNum];
                $pregContent     = preg_replace('/\s+/', '', $pgContent);                   
                $checkTagsStatus = $this->isSpclTags($pregContent);
                if($checkTagsStatus>0)
                    $errPageFlag++;	
            }

            for($rowNum=0;$rowNum<$totalRowNumH;$rowNum++)
            {
                $pgContentH       = $_POST['hdnPagevalueH'][$rowNum];
                $pregContentH     = preg_replace('/\s+/', '', $pgContentH);                   
                $checkTagsStatusH = $this->checkHtmlTags($pregContentH, $chkTags);
                if($checkTagsStatusH>0)
                    $errPageFlagH++;	
            }

            $outMsg             = '';
            $flag               = ($pageId != 0) ? 1 : 0;
            $action             = ($pageId == 0) ? 'A' : 'U';
            $errFlag            = 0 ;
            $query              = '';  $queryH              = '';
            if($blankTitleE >0 || $blankAlias>0 || $blankTagline >0 || $blankTaglineO >0)
            {
                    $errFlag		= 1;
                    $flag                   = 1;
                    $outMsg			= "Mandatory Fields should not be blank";
            }
            else if($lenTitleE>0 || $lenTagline >0 || $lenTaglineO >0)
            {
                    $errFlag		= 1;
                    $flag                   = 1;
                    $outMsg			= "Length should not exceed maxlength";
            }
           else if(($errTitleE>0) || ($errSnippet>0) || $errPagealias>0 || $errMetatitle>0 || $errMetatype>0 || $errMetakey>0 || $errMetaDes>0 || $errUrl>0 || $errTagline >0)
            {
                    $errFlag		= 1;
                    $flag                   = 1;
                    $outMsg			= "Special Characters are not allowed";
            }else if(($fileMetaMimetype!='image/gif' && $fileMetaMimetype!='image/jpeg' && $fileMetaMimetype!='image/jpg' && $fileMetaMimetype!='image/png' && $metaImage!='') || ($fileMimetype!='image/gif' && $fileMimetype!='image/jpeg' && $fileMimetype!='image/png' && $fileFeaturedImage!='')) {
                    $errFlag               = 1;
                    $flag                  = 1;
                    $outMsg                = 'Invalid file types. Upload only jpg,jpeg,gif,png';
                }
            else if ($fileSize > SIZE1MB) {
                $errFlag                     = 1;
                $flag                        = 1;
                $outMsg                      = 'File size can not more than 1 MB';
            }       
            else if ($fileMetaSize > SIZE1MB) {
                $flag                        = 1;
                $errFlag                     = 1;
                $outMsg                      = 'File size can not more than 1 MB';
            } 
            else if ($errPageFlag > 0 || $errPageFlagH > 0) {
                $flag           = 1;
                $errFlag        = 1;
                $outMsg         = 'HTML Special Tags Are Not Allowed';
            }


            if ($fileFeaturedImage == '' && $pageId != 0)
                $fileFeaturedImage = $prevFile;
            if ($metaImage == '' && $pageId != 0)
                $metaImage = $prevMetaFile;


            if($errFlag==0  && $userId>0){
                $dupResult          = $this->managePage('CD', $pageId, $txtTitle_e, '', '', 0, '', 0, '', '', '', 0, 0, 0,0,'0000-00-00','0000-00-00',$pageAlias,'','','','','','0','','','','');
               if ($dupResult) {
                   $numRows = mysqli_num_rows($dupResult);  
                   if ($numRows > 0) {
                       $outMsg = 'Page with this name already exists';
                       $flag = 1;
                   } else {
                       $result = $this->managePage($action, $pageId, $txtTitle_e, $txtTitle_h, $fileFeaturedImage, $rbtLnkType, $txtURL, $radTemplateType, $txtContentE, $txtContentH, $selPluginName, $radWinStatus, 1, $userId,0,'0000-00-00','0000-00-00',$pageAlias,$metaTitle,$metaType,$metaKey,$metaDesc,$metaImage,$radPanelStatus,$txtSnippet,$txtSnippetO,$txtTagline,$txtTaglineO);
                       if($action == 'A')
                       $row = mysqli_fetch_array($result);
                       $conPageId=($action == 'A') ? $row[0] :$pageId;
                       for($rowNum=0;$rowNum<$totalRowNum;$rowNum++)
                        {
                            $strContent          = $_POST['hdnPagevalue'][$rowNum];
                            $intPageNo           = $_POST['hdnPageId'][$rowNum];
                            $intContentId        = $_POST['hdnContentId'][$rowNum];  
                            $query	.='('.$conPageId.','.$intPageNo.',"'.htmlspecialchars(addslashes($strContent), ENT_QUOTES).'",0),';	
                        }
                        $query	= substr($query,0,-1);

                        for($rowNumH=0;$rowNumH<$totalRowNumH;$rowNumH++)
                        {
                            $strContentH          = str_replace("\'",'%5C',$_POST['hdnPagevalueH'][$rowNumH]);
                            $intPageNoH           = $_POST['hdnPageIdH'][$rowNumH];
                            $intContentIdH        = $_POST['hdnContentIdH'][$rowNumH];   
                            $queryH	.='('.$conPageId.','.$intPageNoH.',"'.urlencode($strContentH).'",0),';	
                        }
                        $queryH	= substr($queryH,0,-1);

                        if($action == 'U')
                        {                
                            $this->managePageContent('D1',0,$conPageId,0,'','',''); 
                            $this->managePageContent('D2',0,$conPageId,0,'','',''); 
                        }
                        $pageResult = $this->managePageContent('A1',0,$conPageId, 0, $txtContentE,'',$query);
                        $pageResult2 = $this->managePageContent('A2',0,$conPageId, 0, $txtContentH,'',$queryH);
                       if ($pageResult)
                           $outMsg = ($action == 'A') ? 'Page added successfully ' : 'Page updated successfully';
                       if ($fileFeaturedImage != '') {
                           if (file_exists("uploadDocuments/featuredImage/" . $prevFile) && $prevFile != '') {

                           }
                           //move_uploaded_file($fileTemp, "uploadDocuments/featuredImage/" . $fileFeaturedImage);
                           if($_FILES['fileFeaturedImage']['name'] != '') 
                            $this->GetResizeImage($this,'uploadDocuments/featuredImage/',1920,0,$fileFeaturedImage,$fileTemp);
                       }
                        if ($metaImage != '') {
                           if (file_exists("uploadDocuments/banner/" . $prevMetaFile) && $prevMetaFile != '') {

                           }
                           move_uploaded_file($fileMetaTemp, "uploadDocuments/banner/" . $metaImage);

                       }
                   }
               }
            }
         }else{
                header("Location:".APP_URL."error");
           }  
        $strTitleE          = ($flag == 1) ? htmlentities($txtTitle_e) : '';
        $strTagline         = ($flag == 1) ? htmlentities($txtTagline) : '';
        $strTaglineO        = ($flag == 1) ? htmlentities($txtTaglineO) : '';
        $strSnippet         = ($flag == 1) ? htmlentities($txtSnippet) : '';
        $strTitleH          = ($flag == 1) ? htmlentities($txtTitle_h) : '';
        $intLinkType        = ($flag == 1) ? htmlentities($rbtLnkType) : '1';
        $strFileName        = ($flag == 1) ? htmlentities($fileBanner) : '';
        $strUrl             = ($flag == 1) ? htmlentities($txtURL) : '';
        $intTempletType     = ($flag == 1) ? htmlentities($radTemplateType) : '1';
        $strContentE        = ($flag == 1) ? htmlentities($txtContentE) : '';
        $strContentH        = ($flag == 1) ? htmlentities($txtContentH) : '';
        $strPluginName      = ($flag == 1) ? $selPluginName : '0';
        $intWinStatus       = ($flag == 1) ? $radWinStatus : '1';
        $arrResult = array('msg' => $outMsg, 'flag' => $flag, 'strTitleE' => $strTitleE,'strTagline'=>$strTagline,'strTaglineO'=>$strTaglineO,'strSnippet' => $strSnippet, 'strTitleH' => $strTitleH, 'intLinkType' => $intLinkType, 'strFileName' => $strFileName, 'strUrl' => $strUrl, 'intTempletType' => $intTempletType, 'strContentE' => $strContentE, 'strContentH' => $strContentH, 'strPluginName' => $strPluginName, 'intWinStatus' => $intWinStatus);
        return $arrResult;
    }

  // Function To read Page  By::T Ketaki Debadarshini   :: On:: 28-Aug-2015
    //Updated by::T Ketaki Debadarshini   :: On:: 25-April-2016
    public function readPage($id) {

        $result = $this->managePage('R', $id, '', '', '', 0, '', 0, '', '', '', 0, 0, 0,0,'0000-00-00','0000-00-00','','','','','','','0','',0,'','');
        if (mysqli_num_rows($result) > 0) {

            $row            = mysqli_fetch_array($result);
            $strTitleE      = htmlspecialchars_decode($row['vchTitle'],ENT_QUOTES);
            $strTitleH      = $row['vchTitleH'];
            $strSnippet      = htmlspecialchars_decode($row['vchSnippet'],ENT_QUOTES);
            $strSnippetH      = htmlspecialchars_decode($row['vchSnippetO'],ENT_QUOTES);
            $strName        = htmlspecialchars_decode($row['vchName'],ENT_QUOTES);
            $intLinkType    = $row['intLinkType'];
            $strFileName    = $row['vchFeaturedImage'];
            $strUrl         = $row['vchUrl'];
            $strPageAlias   = htmlspecialchars_decode($row['vchPageAlias'],ENT_QUOTES);
            $strTagline     = htmlspecialchars_decode($row['vchTagline'],ENT_QUOTES);
            $strTaglineO     = $row['vchTaglineO'];
            $strMetaTitle   = $row['vchMetaTitle'];
            $strMetaKeyword = $row['vchMetaKeyword'];
            $strMetaDescription   = htmlspecialchars_decode($row['vchMetaDescription'],ENT_QUOTES);
            $strMetaType    = $row['vchMetaType'];
            $strMetaImage   = $row['vchMetaImage'];
            $intTempletType = $row['intTemplateType'];
            $strContentE    = $row['vchPageContentE'];
            $strContentH    = urldecode($row['vchPageContent_H']);
            //$strPluginName  = $row['vchPluginName'];
            $intWinStatus   = $row['intWindowStatus'];
            $tinShowpanel    =  $row['tinShowpanel'];
            $strPluginName    = $row['vchPluginName'];
            $intFunctionid    = $row['INT_FUNCTION_ID'];
        }

        $arrResult = array('tinShowpanel' => $tinShowpanel,'strPageAlias' => $strPageAlias,'strTagline'=>$strTagline,'strTaglineO'=>$strTaglineO,'strSnippet' => $strSnippet,'strSnippetH'=>$strSnippetH,'strMetaTitle' => $strMetaTitle,'strMetaKeyword' => $strMetaKeyword,'strMetaDescription' => $strMetaDescription,'strMetaType' => $strMetaType,'strMetaImage' => $strMetaImage,'strTitleE' => $strTitleE, 'strTitleH'=>$strTitleH,'strName' => $strName, 'intLinkType' => $intLinkType, 'strFileName' => $strFileName, 'strUrl' => $strUrl, 'intTempletType' => $intTempletType, 'strContentE' => $strContentE, 'strContentH' => $strContentH, 'strPluginName' => $strPluginName, 'intWinStatus' => $intWinStatus,'intPlid' => $intPlid,'intFunctionid' => $intFunctionid);
        return $arrResult;
    }
// Function To view page content  By::T Ketaki Debadarshini   :: On:: 28-Aug-2015
    public function viewPageContent($id,$pageNo) {

        $result = $this->managePageContent('VC',0,$id, $pageNo,'','','');
        if (mysqli_num_rows($result) > 0) {

            $row            = mysqli_fetch_array($result);
            $strContentE    = htmlspecialchars_decode(str_replace('&quot;','"',$row ['vchContentE']),ENT_NOQUOTES);
            $pageTitle      = htmlspecialchars_decode(str_replace('&quot;','"',$row ['pageTitle']),ENT_NOQUOTES);
            
        }

        $arrResult = array('strContentE' => $strContentE,pageTitle=>$pageTitle);
        return $arrResult;
    }
    
    //function to Read page content By T Ketaki Debadarshini On:28-Aug-2015
	public function readPageContent($pageId)
	{
		$result	= $this->managePageContent('VR',0,$pageId,0,'','','');
		$arrRow		= array();
		if($result->num_rows>0)
		{
			$ctr	= 0;
			while($row=$result->fetch_array())
			{
				//$arrRow[$ctr]['intContentId']		= $row['intContentId'];
				$arrRow[$ctr]['intPageId']		= $row['intPageId'];
				$arrRow[$ctr]['intPageNo']		= $row['intPageNo'];
				$arrRow[$ctr]['strContent']		= htmlspecialchars_decode(str_replace('&quot;','"',$row ['vchContentE']),ENT_NOQUOTES);
                                      
				$ctr++;
			}
		}
		return $arrRow;
	}

// Function To Delete Page  By::T Ketaki Debadarshini   :: On:: 28-Aug-2015
    public function deletePage($action, $ids) {
        $newSessionId           = session_id();
        $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
        if($newSessionId == $hdnPrevSessionId) {   
                $ctr = 0; 
                $userId = ($_SESSION['adminConsole_userID']!='')?$_SESSION['adminConsole_userID']:0;
                $explIds = explode(',', $ids);
                $delRec = 0;
                $fail	= '';
                foreach ($explIds as $indIds) {

                    $result1 = $this->managePage('R',$explIds[$ctr],'', '', '', 0, '', 0, '', '', '', 0, 0, $userId,0,'0000-00-00','0000-00-00','','','','','','','0','',0,'','');
                    $delrow = mysqli_fetch_array($result1);
                    $strFImageFile = $delrow['vchFeaturedImage'];
                    $strMImageFile = $delrow['vchMetaImage'];

                    $result = $this->managePage($action, $explIds[$ctr], '', '', '', 0, '', 0, '', '', '', 0, 0, $userId,0,'0000-00-00','0000-00-00','','','','','','','0','',0,'','');
                    $row = mysqli_fetch_array($result);
                    if ($row[0]=='0')
                        $delRec++;
                    else
                        $fail	.= $row[0].',';

                    if ($action == 'D' && ($strFImageFile != '' || $strMImageFile != '')) {
                        if (file_exists("uploadDocuments/banner/" . $strMImageFile)) {
                           // unlink("uploadDocuments/banner/" . $strMImageFile);
                        }
                        if (file_exists("uploadDocuments/featuredImage/" . $strFImageFile)) {
                           // unlink("uploadDocuments/featuredImage/" . $strFImageFile);
                        }
                     }

                    $ctr++;

                }
                $msgFail    = '';
                $msgSuccess = '';
                if ($action == 'D') {
                    if ($delRec > 0)
                        $msgSuccess .= 'Page(s) deleted successfully';
                    if($fail !='')
                        $msgFail .=  $fail.' Page(s) used in menu can not be  deleted';

                    $outMsg	= $msgFail.' '.$msgSuccess;
                }
                else if ($action == 'AC')
                    $outMsg = 'Page(s) activated successfully';
                else if ($action == 'IN')
                    $outMsg = 'Page(s) unpublished successfully';
                else if ($action == 'P')
                    $outMsg = 'Page(s) published successfully';
                else if ($action == 'AR')
                {
                    if ($delRec > 0)
                        $msgSuccess .= 'Page(s) archived successfully';
                    if($fail !='')
                        $msgFail .= $fail.' Page(s) used in menu can not be  archived';
                        $outMsg = $msgFail.' '.$msgSuccess;
                }

                return $outMsg;
         }else{
                header("Location:".APP_URL."error");
           }
    }
    

}

 /* * ****Class to manage Global link ********************
  '	By	 	 : T Ketaki Debadarshini	'
  '	On	 	 : 28-Aug-2015        '
  ' Procedure Used       : USP_MENUS            '
 * ************************************************** */
class clsGlobalLink extends Model {

// Function To Manage Globallink By::T Ketaki Debadarshini   :: On::13-Aug-2015    
    public function manageGL($action, $pId, $pageId, $parentId, $menuType, $menuOrder, $linkType, $pageNavigation) {

        $glSql = "CALL USP_MENUS('$action','$pId','$pageId','$parentId','$menuType','$menuOrder','$linkType','$pageNavigation');";
//echo $glSql; 
        $glResult = Model::executeQry($glSql);
        return $glResult;
    }
	
	//========= Function to view global link By::T Ketaki Debadarshini   :: On::28-Aug-2015 ==========
	public function viewGL($action, $pId, $menuType)
	{
		$result	= $this->manageGL($action, $pId, 0, 0, $menuType, 0, 'globalLink', '');
		$glArr	= array();
		$ctr	= 0;
		if($result->num_rows > 0)
		{
			while($row	= $result->fetch_array())
			{				
				$glArr[$ctr]['pageId']          = $row['intPageId'];
				$glArr[$ctr]['menuName']	= $row['vchTitle'];
                                $glArr[$ctr]['tinMenuType']	= $row['tinMenuType'];
				$ctr++;
			}
		}
		return $glArr;
	}

// Function To Manage Menu item By::T Ketaki Debadarshini   :: On::28-Aug-2015
    public function saveMenuItems($parentId, $menuType, $linkType, $pageNavigation) {
         $newSessionId           = session_id();
        $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
        if($newSessionId == $hdnPrevSessionId) {  
                /* For main menu */
                if ($menuType == 1)
                        {
                                if ($linkType == 'globalLink')
                                    $rows = $_POST['mainMenuArr'];
                                else
                                    $rows = $_POST['mainMenuArr'.$parentId.'_'.$menuType];
                        }
                /* For bottom menu */
                else if ($menuType == 2){
                    if ($linkType == 'globalLink')
                        $rows = $_POST['bottomMenuArr'];
                    else
                        $rows = $_POST['mainMenuArr'.$parentId.'_'.$menuType];

                }    
                /* For top menu */
                else if ($menuType == 3)
                    $rows = $_POST['topMenuArr'];
                /* For home portlet */
                else if ($menuType == 4)
                    $rows = $_POST['homePortletArr'];


                $delResult = $this->manageGL('DL', 0, 0, $parentId, $menuType, '0', $linkType, '');
                if ($delResult) {
                    $counter = 0;
                    foreach ($rows as $row) {
                        $counter++;
                        $pageNavigation .= '_' . $row;
                        if ($linkType == 'globalLink')
                            $pageNavigationVal = $row;
                        else
                            $pageNavigationVal = $pageNavigation;


                        $result = $this->manageGL('A', 0, $row, $parentId, $menuType, $counter, $linkType, $pageNavigationVal);

                        $lastIndex = strrpos($pageNavigation, '_');
                        $pageNavigation = substr($pageNavigation, 0, $lastIndex);
                    }
                    return $outMsg = 'Selected Menu(s) Published successfully.';
                }
                else {
                    return $outMsg = 'Error in operation please try again.';
                }
           }else{
                header("Location:".APP_URL."error");
           } 
    }
    
     // Function To fill Primary Link By::T Ketaki Debadarshini   :: On:: 28-Aug-2015
    function fillPrimaryLink($glId,$selVal)
    {
        $conResult      = $this->manageGL('F',0,0,$glId,0,0,'primaryLink','');
        $selOptions	= model::FillDropdown($conResult,$selVal);
	return $selOptions;
    }
    
    //========= Function to view global link By::T Ketaki Debadarshini   :: On:: 28-Aug-2015==========
	public function viewPL($glid)
	{
		$result	= $this->manageGL('F',0,0, $glid,0,0,'primaryLink','');
		$glArr	= array();
		$ctr	= 0;
		if($result->num_rows > 0)
		{
			while($row	= $result->fetch_array())
			{				
				$glArr[$ctr]['pageId']          = $row['intPageId'];
				$glArr[$ctr]['menuName']	= $row['vchTitle'];
				$ctr++;
			}
		}
		return $glArr;
	}
        
     //========= Function to view primary link By::T Ketaki Debadarshini   :: On:: 28-Aug-2015==========
	public function viewPLDetails($action,$parentid)
	{
		$result	= $this->manageGL($action,0,0,$parentid,0,0,'primaryLink','');
		$glArr	= array();
		$ctr	= 0;
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_array())
			{				
				$glArr[$ctr]['pageId']          = $row['intPageId'];
				$glArr[$ctr]['menuName']	= $row['vchTitle'];
				$ctr++;
			}
		}
		return $glArr;
	}


}  
   
