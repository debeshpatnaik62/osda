<?php

/* ================================================
  File Name           : clsTimeline.php
  Description         : This is used for manage all Timeline class.
  Devloped By         : Ashis kumar Patra
  Devloped On         : 04-12-2018
  Update History      : <Updated by>        <Updated On>        <Remarks>

  Procedure Used      : USP_TIMELINE
  ================================================== */

class clsTimeline extends Model {

    //Function to manage Timeline By ::  Ashis kumar Patra ::   On ::  04-12-2018
    
    public function manageTimeline($action,$arrConditions)
    {
        try
        {
           $result = Model::callProc('USP_TIMELINE',$action,$arrConditions);
           return $result;

        }
        catch(Exception $e)
        {
           echo 'Error:'.$e->getMessage();
           exit();
        }
    }

    //Function to Add Update Timeline By :: Ashis kumar Patra ::  On ::  04-12-2018
    public function addUpdateTimeline($timelineId) {

        $userId  = $_SESSION['adminConsole_userID'];
        $txtDate =   (isset($_REQUEST['txtDate'])&& $_REQUEST['txtDate']!='')?date('Y-m-d',strtotime($_REQUEST['txtDate'])):'0000-00-00';

        $blankDate = Model::isBlank($_POST['txtDate']);
        $errDate = Model::isSpclChar($_POST['txtDate']);

        $fileDocument = $_FILES['fileDocument']['name'];
        $fileDocumentName = $_FILES['fileDocument']['name'];

        $prevFile = $_POST['hdnImageFile'];
        $fileSize = $_FILES['fileDocument']['size'];
        $fileTemp = $_FILES['fileDocument']['tmp_name'];
        $ext = pathinfo($fileDocument, PATHINFO_EXTENSION);
        $fileDocument = ($fileDocument != '') ? 'Timeline' . date("Ymd_His") . '.' . $ext : '';
        
        $allowMimeType=array('image/jpg','image/gif','image/jpeg');
        $errFileType=$this->check_file_mime( $fileTemp ,$allowMimeType);
        
        
        $txtDescription   = htmlspecialchars(addslashes($_POST['txtDescriptionE']), ENT_QUOTES);
        $blankDescription = Model::isBlank($_POST['txtDescriptionE']);
        $pregDescription        = preg_replace('/\s+/', '', $_POST['txtDescriptionE']);
        $chkTags                = '<button,<form,<iframe,<input,<script,<select,<textarea,alert';
        $checkTagsStatus        = $this->isSpclTags($pregDescription); 
        
        $txtDescriptionO   = htmlspecialchars(addslashes($_POST['txtDescriptionO']), ENT_QUOTES);
        $pregDescription        = preg_replace('/\s+/', '', $_POST['txtDescriptionO']);
        $checkTagsStatusO        = $this->isSpclTags($pregDescriptionO);
    
        $outMsg = '';
        $flag = ($timelineId != 0) ? 1 : 0;
        $action = ($timelineId == 0) ? 'A' : 'U';
        $errFlag = 0;
     if ($fileDocumentName == '' && $timelineId != 0)
            $fileDocument = $prevFile;
       if ($blankDate > 0) {
            $errFlag = 1;
            $outMsg = "Date should not be blank";
        } else if($errFileType>0){
             $errFlag = 1;
             $outMsg = "Date should not be blank";
        }else if ($txtDescription > 0) {
            $errFlag = 1;
            $outMsg = "Description should not be blank";
        } else if ($checkTagsStatus > 0 || $checkTagsStatusO>0) {

                $outMsg                 = "HTML Special Tags Are Not Allowed";
                $errFlag                = 1;
                $flag                   = 1;
            }
       /* else if ($image_width < 450 || $image_height <450) {
            $errFlag = 1;
            $outMsg = "Please upload 450 X 450 Px Image";

        } */
        
             
          $arrConditions=array( 'timelineId'=>$timelineId,
                                           'txtDate'=>$txtDate,
                                           'fileDoc'=>$fileDocument,
                                            'txtDesc'=>$txtDescription,
                                            'txtDescO'=>$txtDescriptionO,
                                           'pubStatus'=>0,
                                            'userid'=>$userId);
                 
               $result         = $this->manageTimeline($action,$arrConditions);
                    if ($result) {
                        $outMsg = ($action == 'A') ? 'Timeline added successfully ' : 'Timeline updated successfully';
                        if ($fileTemp != '') {
                            
                            if (file_exists(APP_PATH."uploadDocuments/Timeline/" . $prevFile) && $prevFile != '' && $fileDocumentName != '') {
                                unlink(APP_PATH."uploadDocuments/Timeline/" . $prevFile);
                            }                          
                            
                            $this->GetResizeImage($this,APP_PATH . 'uploadDocuments/Timeline/', 410, 0, $fileDocument, $fileTemp);
                        }
                    }
                
       
        
        $strDate = ($errFlag == 1) ? htmlentities($txtDate) : '';
        $strFileName = ($errFlag == 1) ? htmlentities($fileDocument) : '';
        $strDescription = ($errFlag == 1) ? htmlentities($txtDescription) : '';

        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag,'returnParams' => $arrConditions);
        return $arrResult;
    }

    //Function to Read Timeline By ::  puja kumari ::   On ::  12-11-2018

    public function readTimeline($timelineId) {
          $arrConditions=array( 'timelineId'=>$timelineId);
        $result = $this->manageTimeline('R',$arrConditions);
        if ($result->num_rows > 0) {

            $row = $result->fetch_array();
             $strDate = date('d M Y ',strtotime($row["DTM_PUBLISHDATE"]));
            $strFileName = $row['VCH_IMAGE'];
            $strDescription = $row['VCH_DESCRIPTION'];
             $strDescriptionO = $row['VCH_DESCRIPTION_O'];
        }

        $arrResult = array('strDate' => $strDate,'strFileName' => $strFileName, 'strDescriptionE' => $strDescription,'strDescriptionO'=>$strDescriptionO);
 
        return $arrResult;
    }


    // Function to Delete Timeline By ::  puja kumari ::   On ::  12-11-2018

    public function deleteTimeline($action, $ids) {

        $ctr = 0;
        $userId = $_SESSION['adminConsole_userID'];
        $explIds = explode(',', $ids);
        $delRec = 0;
        foreach ($explIds as $indIds) {

             $arrConditions=array( 'timelineId'=>$explIds[$ctr],
                                            'userid'=>$userId);
            $result1 = $this->manageTimeline('R', $arrConditions);
            $row = $result1->fetch_array();
            $strImageFile = $row['VCH_IMAGE'];

            $result = $this->manageTimeline($action, $arrConditions);
                $row = $result->fetch_array();
                if ($row[0] == 0)
                    $delRec++;
                $ctr++;
            }

            if ($action == 'D' && $strImageFile != '') 
            {
                if (file_exists("uploadDocuments/Timeline/" . $strImageFile)) {
                    unlink("uploadDocuments/Timeline/" . $strImageFile);
                }
            }
        

        if ($action == 'D') {
            if ($delRec > 0)
                $outMsg .= 'Timeline(s) deleted successfully';
        }

        else if ($action == 'IN')
            $outMsg = 'Timeline(s) unpublished successfully';
        else if ($action == 'P')
            $outMsg = 'Timeline(s) published successfully';
        
        return $outMsg;
    }

}

?>