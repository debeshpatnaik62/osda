<?php

/* * ****Class to manage News ********************
'By                     : T Ketaki Debadarshini	'
'On                     : 13-Aug-2015        '
' Procedure Used        : USP_NEWS_DETAILS       '
* ************************************************** */

class clsNews extends Model {

// Function To Manage News By::T Ketaki Debadarshini   :: On:: 25-May-2015
    public function manageNews($action, $newsId, $newsCat,$headLineE, $headLineH, $image, $expdate, $newsDate, $descriptionE, $descriptionH, $pubStatus,$archiveStatus ,$createdBy,$startDate,$endDate,$txtSource,$txtSourcenameE,$txtSourcenameO,$txtSnippet,$txtSnippetO) {
        
         $startDate=($startDate=='0000-00-00')?BLANK_DATE:$startDate;
         $endDate  =($endDate=='0000-00-00')?BLANK_DATE:$endDate;
        
         $expdate=($expdate=='0000-00-00 00:00:00' || $expdate=='0000-00-00')?BLANK_DATE_TIME:$expdate;
         $newsDate=($newsDate=='0000-00-00 00:00:00' || $newsDate=='0000-00-00')?BLANK_DATE_TIME:$newsDate;
        
        $newsId             = htmlspecialchars(addslashes($newsId),ENT_QUOTES);
        $headLineE          = htmlspecialchars(addslashes($headLineE),ENT_QUOTES);
       // $headLineH          = addslashes($headLineH);
        $descriptionE       = addslashes($descriptionE);  
        $newsSql            = "CALL USP_NEWS_DETAILS('$action', $newsId, $newsCat,'$headLineE', '$headLineH', '$image', '$expdate', '$newsDate', '$descriptionE', '$descriptionH', $pubStatus,$archiveStatus, $createdBy,'$startDate','$endDate','$txtSource','$txtSourcenameE','$txtSourcenameO','$txtSnippet','$txtSnippetO',@OUT);";
 //echo $newsSql;             
        $errAction          = Model::isSpclChar($action);
        $errHeadlineE       = Model::isSpclChar($headLineE);
        $errfetImage        = Model::isSpclChar($image);       
        if ($errAction > 0 || $errHeadlineE > 0 || $errfetImage > 0)
            header("Location:" . APP_URL . "error");
        else {
            $newsResult = Model::executeQry($newsSql);
            return $newsResult;
        }
    }

// Function To Add Upadate Page By::T Ketaki Debadarshini   :: On:: 18-Nov-2015
    public function addUpdateNews($newId) { 
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if ($newSessionId == $hdnPrevSessionId) {    
        
        $userId                 = $_SESSION['adminConsole_userID'];
        $newsId                 = (isset($newId))?$newId:0;
        $newsCat                = htmlspecialchars($_POST['selNewsType'], ENT_QUOTES);
      
       
        
        $msgTitle               = 'News ';
        $txtHeadlineE           = htmlspecialchars($_POST['txtHeadlineE'], ENT_QUOTES);
        $blankHeadlineE         = Model::isBlank($txtHeadlineE);
        $errHeadlineE           = Model::isSpclChar($_POST['txtHeadlineE']);
        $lenHeadlineE           = Model::chkLength('max', $txtHeadlineE,250);
        
        $txtHeadlineH           = htmlspecialchars($_POST['txtHeadlineH'], ENT_QUOTES, 'UTF-8');
        $errHeadlineH           = Model::isSpclChar($txtHeadlineH);
        
        $txtSourceNameE         = htmlspecialchars($_POST['txtSourceNameE'], ENT_QUOTES);
        $errSourcename          = Model::isSpclChar($_POST['txtSourceNameE']);
        $txtSourceNameO         = htmlspecialchars($_POST['txtSourceNameO'], ENT_QUOTES, 'UTF-8');
        
        $expDate                = ($_POST['txtExparyDate']!='')?model::dbDateFormat($_POST['txtExparyDate']):'0000-00-00';
        $newsDate               = ($_POST['txtNewsDate']!='')?model::dbDateFormat($_POST['txtNewsDate']):'0000-00-00';
        $fileDocument           = $_FILES['fileDocument']['name'];
        $prevFile               = $_POST['hdnImageFile'];
        $fileSize               = $_FILES['fileDocument']['size'];
        $fileTemp               = $_FILES['fileDocument']['tmp_name'];
        $ext                    = pathinfo($fileDocument , PATHINFO_EXTENSION);
        $fileDocument           = ($fileDocument != '') ? 'News' . date("Ymd_His") . '.' . $ext : '';
        $fileMimetype           = mime_content_type($fileTemp);
        
        $txtDetailsE            = htmlspecialchars($_POST['txtDetailsE'], ENT_QUOTES);
        $pregDescription        = preg_replace('/\s+/', '', $_POST['txtDetailsE']);
        //$chkTags                = '<button,<form,<iframe,<input,<script,<select,<textarea,alert';
        $checkTagsStatus        = $this->isSpclTags($pregDescription);  
            
        $txtDetailsH            = urlencode($_POST['txtDetailsH']);
        $pregDescriptionH       = preg_replace('/\s+/', '', $_POST['txtDetailsH']);
        $checkTagsStatusH       = $this->isSpclTags($pregDescriptionH); 
        
        if($newsCat==1){
            $txtSource              = htmlspecialchars($_POST['txtSource'], ENT_QUOTES);
            $errSource              = Model::isSpclChar($_POST['txtSource']);
            $txtSnippet             ='';
            $txtSnippetO            = '';
            $errSnippet             = 0;
        }else{
            $txtSource=='';
            $errSource=0;
            $txtSnippet             = htmlspecialchars(addslashes($_POST['txtSnippet']), ENT_QUOTES);
            $txtSnippetO            = htmlspecialchars($_POST['txtSnippetO'], ENT_QUOTES, 'UTF-8');
            $errSnippet             = 0;
        }
        
        
       // $txtPlace               = $_POST['txtPlace'];
        $txtPlace               = '';
        $outMsg                 = '';
        $flag                   = ($newsId != 0) ? 1 : 0;
        $action                 = ($newsId == 0) ? 'A' : 'U';
        $errFlag                = 0 ;
       
        if($blankHeadlineE >0)
        {
            $errFlag		= 1;
            $flag               = 1;
            $outMsg		= "Mandatory Fields should not be blank";
        }
        else if($lenHeadlineE>0)
        {
            $errFlag		= 1;
            $flag               = 1;
            $outMsg		= "Length should not excided maxlength";
        }
        else if($errHeadlineE>0 || $errSourcename>0 || $errSource>0 || $errSnippet>0)
        {
            $errFlag		= 1;
            $flag               = 1;
            $outMsg		= "Special Characters are not allowed";
        }else if($fileMimetype!='image/gif' && $fileMimetype!='image/jpeg' && $fileMimetype!='application/pdf' && $fileDocument!='') {
                $errFlag               = 1;
                $flag                  = 1;
                $outMsg                = 'Invalid file types. Upload only jpg,jpeg,pdf';
        }else if ($fileSize > SIZE10MB) {
            $errFlag                = 1;
            $flag                   = 1;
            $outMsg                 = 'File size can not more than 10 MB';
        }else if ($checkTagsStatus > 0 || $checkTagsStatusH > 0) {

            $outMsg                 = "HTML Special Tags Are Not Allowed";
            $errFlag                = 1;
            $flag                   = 1;
        }
        
        if ($fileDocument == '' && $newsId != 0)
            $fileDocument = $prevFile;
        if($errFlag==0 && $userId>0){
            
            $dupResult = $this->manageNews('CD', $newsId,$newsCat,$txtHeadlineE,'','', '0000-00-00','0000-00-00','','',0,0,$userId,'0000-00-00','0000-00-00','','','','','');
            
              if ($dupResult) {
                $numRows = $dupResult->fetch_array();
                if ($numRows > 0) {
                    $outMsg = $msgTitle.' with this headline already exists';
                    $errFlag = 1;
                    $flag   = 1;
                } else {
                    $result = $this->manageNews($action, $newsId,$newsCat, $txtHeadlineE,$txtHeadlineH,$fileDocument, $expDate,$newsDate,$txtDetailsE,$txtDetailsH, 0,0 ,$userId,'0000-00-00','0000-00-00',$txtSource,$txtSourceNameE,$txtSourceNameO,$txtSnippet,$txtSnippetO);
                    if($result)
                    {
                        $outMsg = ($action == 'A') ? $msgTitle.' added successfully ' : $msgTitle.' updated successfully';
                        
                        if($fileDocument != '') {
                            if(file_exists("uploadDocuments/news/" . $prevFile) && $prevFile != '' && $_FILES['fileDocument']['name']!= '') {
                                 unlink("uploadDocuments/news/" . $prevFile);
                            }
                          
                             if($_FILES['fileDocument']['name'] != '' && $ext!='pdf') 
                             {
                                 
                                $this->GetResizeImage($this,'uploadDocuments/ThumbImage/News/',290,0,$fileDocument,$fileTemp);
                              
                                $this->GetResizeImage($this,'uploadDocuments/news/',550,0,$fileDocument,$fileTemp); //223,138
                             }
                             else
                               move_uploaded_file($fileTemp, "uploadDocuments/news/" . $fileDocument);
                        }
                    }
                }
            }
        }
       }else{
            header("Location:" . APP_URL . "error");
        } 
        if($expDate=='0000-00-00')
            $expDate ='';
        else 
            $expDate =  $_POST['txtExparyDate'];
        
        $strHeadLineE       = ($errFlag == 1) ? htmlentities($txtHeadlineE) : '';              
        $strFileName        = ($errFlag == 1) ? htmlentities($fileDocument) : '';
        $strExpDate         = ($errFlag == 1) ? htmlentities($expDate) : '';
        $strDetailE         = ($errFlag == 1) ? htmlentities($txtDetailsE) : ''; 
        $strNewsDate        = ($errFlag == 1) ? htmlentities($newsDate) : ''; 
        $strCaption         = ($errFlag == 1) ? htmlentities($txtCaption) : '';
        $strPlace           = ($errFlag == 1) ? htmlentities($txtPlace) : '';
        $strSourceNameE     = ($errFlag == 1) ? htmlentities($txtSourceNameE) : '';
        $strSourceNameO     = ($errFlag == 1) ? htmlentities($txtSourceNameO) : '';
        $strSnippetE        = ($errFlag == 1) ? htmlentities($txtSnippet) : '';
        $strSnippetO        = ($errFlag == 1) ? htmlentities($txtSnippetO) : '';
        $intNewsCat         =  ($errFlag == 1) ?$newsCat:0;
        
        $arrResult = array('strSourceNameE' => $strSourceNameE,'strSourceNameO' => $strSourceNameO,'strNewsDate' => $strNewsDate,'strCaption' => $strCaption,'strPlace' => $strPlace,'msg' => $outMsg, 'flag' => $errFlag, 'strHeadLineE' => $strHeadLineE,  'strFileName' => $strFileName, 'strExpDate' => $strExpDate, 'strDetailE' => $strDetailE,'strSnippet'=>$strSnipptE,'strSnippetO'=>$strSnipptO,'intCategoryId'=>$intNewsCat);
        return $arrResult;
    }

// Function To read News  By::T Ketaki Debadarshini  :: On:: 18-Nov-2015
    public function readNews($id) {

        $result = $this->manageNews('R',$id,0,'','','', '0000-00-00','0000-00-00','','',0,0,0,'0000-00-00','0000-00-00','','','','','');
        if ($result->num_rows > 0) {
            $row                = $result->fetch_array();
            $intCategoryId      = $row['intCategoryId'];
            $strHeadLineE       =  htmlspecialchars_decode($row['vchHeadLineE'],ENT_QUOTES);   
            $strHeadLineH       =  $row['vchHeadLineH'];        
            
            $strFileName        = $row['vchImageFile'];
            $strExpDate         = date ('d-m-Y',strtotime($row['dtmExparyDate'])); 
            if($strExpDate=='01-01-1970' || $strExpDate=='' || strtotime($strExpDate)<=0)
                $strExpDate     ='';            
            $strDetailE         = htmlspecialchars_decode($row['vchDescriptionE'],ENT_NOQUOTES);   
            $strDetailH         = urldecode($row['vchDescriptionH']);      
            $strNewsDate        = date ('d-m-Y',strtotime($row['dtmNewsDate'])); 
            if($strNewsDate=='01-01-1970' || $strNewsDate=='' || strtotime($strNewsDate)<=0)
                $strNewsDate    ='';    
            $strSource          = $row['vchSource'];            
            $strSource          = htmlspecialchars_decode($row['vchSource'],ENT_QUOTES);
            $stmCreatedOn       = date ('d-m-Y',strtotime($row['stmCreatedOn'])); 
            
            $strSourceNameE     =  htmlspecialchars_decode($row['vchSourcename'],ENT_QUOTES);   
            $strSourceNameO     =  $row['vchSourcenameO']; 
            
            $strSnipptE         = htmlspecialchars_decode($row['vchSnippet'],ENT_QUOTES); 
            $strSnipptO         = $row['vchSnippetO'];
        }

        $arrResult = array('strSourceNameE' => $strSourceNameE,'strSourceNameO' => $strSourceNameO,'strSource'=>$strSource,'stmCreatedOn'=>$stmCreatedOn,'commentNos'=>$commentNos,'likeNos'=>$likeNos,'unlikeNos' => $unlikeNos,'intCategoryId'=>$intCategoryId,'strHeadLineH' => $strHeadLineH,'strDetailH' => $strDetailH,'strNewsDate' => $strNewsDate,'strSource' => $strSource,'strHeadLineE' => $strHeadLineE, 'strFileName' => $strFileName, 'strExpDate' => $strExpDate, 'strDetailE' => htmlspecialchars_decode($strDetailE,ENT_NOQUOTES),'strSnippet'=>$strSnipptE,'strSnippetO'=>$strSnipptO);
        return $arrResult;
    }
	// Function To read News  By::T Ketaki Debadarshini   :: On:: 18-Nov-2015
    public function updateExpary() {
        $newSessionId           = session_id();
        $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
        if ($newSessionId == $hdnPrevSessionId) {  
                $userId                 = $_SESSION['adminConsole_userID'];
                $id			= $_POST['hdnNID'];
                $txtExparyDate          = model::dbDateFormat($_POST['txtFBDate'.$id]);
                                            
                $result = $this->manageNews('UE', $id, '','','', $txtExparyDate,'0000-00-00','','', '','',0,0,0,'0000-00-00','0000-00-00','','','','','');
                if ($result)
                        $outMsg = 'Expary Date Updated successfully ' ;


               return $outMsg;
        }else{
                header("Location:" . APP_URL . "error");
            }  
    }

// Function To Delete News  By::T Ketaki Debadarshini   :: On:: 18-Nov-2015
    public function deleteNews($action, $ids) {
      
        $newSessionId           = session_id();
        $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
        if ($newSessionId == $hdnPrevSessionId) {  
                $ctr            = 0;
                $msg            = 0;
                $userId         = USER_ID;
                $explIds        = explode(',', $ids);
                $delRec         = 0;
                $catid          = $_REQUEST['hdn_catid'];

                $msgTitle       = 'News ';

                foreach ($explIds as $indIds) {

                    $result = $this->manageNews($action,$explIds[$ctr],0,'','','', '0000-00-00','0000-00-00','','',0,0,0,'0000-00-00','0000-00-00','','','','','');                   
                    $row = mysqli_fetch_array($result);
                    if ($row[0] == 0)
                        $delRec++;

                    $ctr++;

                }

                if ($action == 'D') {
                    if ($delRec > 0)
                        $outMsg .= $msgTitle.' deleted successfully';
                    else
                        $outMsg .= 'Dependency record exist. New(s) can not be  deleted';
                }
                else if ($action == 'AC')
                    $outMsg = $msgTitle.' activated successfully';
                else if ($action == 'IN')
                    $outMsg =  $msgTitle.' unpublished successfully';
                else if ($action == 'AR')
                    $outMsg =  $msgTitle.' archieved successfully';
                else if($action == 'P')
                    $outMsg =  $msgTitle.' Published successfully';
                else if($action=='HH')	
                    $outMsg	=  $msgTitle.' Hide on home page Successfully';	
                else if($action=='SH' && $msg==0)	
                   $outMsg	=  $msgTitle.' Displayed on home page Successfully';  

                return $outMsg;
        }else{
                header("Location:".APP_URL."error");
            }  
    }

}

?>
