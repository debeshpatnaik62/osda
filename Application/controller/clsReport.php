<?php

/* * ****Class to manage Report ********************
  'By                     :Raviteja Peri	'
  '
  ' Procedure Used        : USP_REPORT       '
 * ************************************************** */

class clsReport extends Model {

// Function To Manage Report 
    public function manageReport($action, $reportId, $SelectCategory, $ReportHeadline, $ReportImage, $ReportFile, $PublishDate, $pubStatus, $archiveStatus, $createdBy, $startDate, $endDate,$vchDescE='',$vchDescO='',$vcReportHeadO='') {

        $startDate = ($startDate == '0000-00-00') ? BLANK_DATE : $startDate;
        $endDate   = ($endDate == '0000-00-00') ? BLANK_DATE : $endDate;

        $PublishDate = ($PublishDate == '0000-00-00') ? BLANK_DATE : $PublishDate;


        $reportId       = htmlspecialchars(addslashes($reportId), ENT_QUOTES);
        $ReportHeadline = htmlspecialchars(addslashes($ReportHeadline), ENT_QUOTES);
        $ReportImage    = htmlspecialchars(addslashes($ReportImage), ENT_QUOTES);
        $ReportFile     = htmlspecialchars(addslashes($ReportFile), ENT_QUOTES);



        $ReportSql = "CALL USP_REPORT('$action', '$reportId', '$SelectCategory','$ReportHeadline','$ReportImage', '$ReportFile', '$PublishDate', $pubStatus,$archiveStatus, $createdBy,'$startDate','$endDate','$vchDescE','$vchDescO','$vcReportHeadO');";

      // echo $ReportSql;//exit;
        $errAction = Model::isSpclChar($action);
        $errReportHeadline = Model::isSpclChar($ReportHeadline);
        $errfetReportImage = Model::isSpclChar($ReportImage);
        $errfetReportFile = Model::isSpclChar($ReportFile);
        //$errReportPageTitleE      =Model::isSpclChar($errReportPageTitleE); 
        if ($errAction > 0 || $errfetReportImage > 0 || $errfetReportFile > 0)
            header("Location:" . APP_URL . "error");
        else {
            $ReportResult = Model::executeQry($ReportSql);

            return $ReportResult;
        }
    }

    // Function To Add Upadate Page 
    public function addReport($ReportId) {
        $newSessionId = session_id();
        $hdnPrevSessionId = $_POST['hdnPrevSessionId'];
        if ($newSessionId == $hdnPrevSessionId) {

            //$userId                 = $_SESSION['adminConsole_userID'];
            $userId = (isset($_SESSION['adminConsole_userID'])) ? $_SESSION['adminConsole_userID'] : 0;
            $reportId = (isset($ReportId)) ? $ReportId : 0;


            $msgTitle = 'Report ';
            $intSelectCategory = htmlspecialchars($_POST['ddlCategory'], ENT_QUOTES);
            $blankSelectCategory = Model::isBlank($intSelectCategory);

            $txtReportHeadline = htmlspecialchars($_POST['txtReportHeadline'], ENT_QUOTES);
            $blankReportHeadline = Model::isBlank($txtReportHeadline);
            $errReportHeadline = Model::isSpclChar($_POST['txtReportHeadline']);
            $lenReportHeadline = Model::chkLength('max', $txtReportHeadline, 250);

            $txtReportHeadlineO = htmlspecialchars($_POST['txtReportHeadlineO'], ENT_QUOTES);
            $blankReportHeadlineO = Model::isBlank($txtReportHeadlineO);
            $errReportHeadlineO = Model::isSpclChar($_POST['txtReportHeadlineO']);
            $lenReportHeadlineO = Model::chkLength('max', $txtReportHeadlineO, 250);

            $PublishDate = ($_POST['strPublishDate'] != '') ? model::dbDateFormat($_POST['strPublishDate']) : '1000-01-01';
          
            $ReportImage = $_FILES['strReportImage']['name'];

            $prevReportImage = $_POST['hdnReportImage'];

            $fileReportImageSize = $_FILES['strReportImage']['size'];
            $fileReportImageTemp = $_FILES['strReportImage']['tmp_name'];
            $extReportImage = pathinfo($ReportImage, PATHINFO_EXTENSION);

            $ReportImage = ($ReportImage != '') ? 'ReportImg_' . time() . '.' . $extReportImage : '';
            $fileReportImageMimetyp = mime_content_type($fileReportImageTemp);


            $ReportFile = $_FILES['strReportFile']['name'];

            $prevFile = $_POST['hdnReportFile'];
            $fileSize = $_FILES['strReportFile']['size'];
            $fileTemp = $_FILES['strReportFile']['tmp_name'];
            $ext = pathinfo($ReportFile, PATHINFO_EXTENSION);
            $ReportFile = ($ReportFile != '') ? 'ReportFile_' . time() . '.' . $ext : '';
            $fileMimetype = mime_content_type($fileTemp);


            $txtDetailsE            = htmlspecialchars($_POST['txtDescription'], ENT_QUOTES);
            $pregDescription        = preg_replace('/\s+/', '', $_POST['txtDescription']);
            $chkTags                = '<button,<form,<iframe,<input,<script,<select,<textarea,alert';
            $checkTagsStatus        = $this->isSpclTags($pregDescription);  
                
            $txtDetailsO            = htmlspecialchars($_POST['txtDescriptionO']);
            $pregDescriptionO       = preg_replace('/\s+/', '', $_POST['txtDescriptionO']);
            $checkTagsStatusO       = $this->isSpclTags($pregDescriptionO);

            // $txtPlace               = $_POST['txtPlace'];
            $txtPlace = '';
            $outMsg = '';
            $flag = ($reportId != 0) ? 1 : 0;
            $action = ($reportId == 0) ? 'A' : 'U';
            $errFlag = 0;


            if($blankSelectCategory >0)
            {
                $errFlag        = 1;
                $flag               = 1;
                $outMsg     = "Mandatory Fields should not be blank";
            }
            else if($lenReportHeadline>0 || $lenReportHeadlineO>0)
            {
                $errFlag        = 1;
                $flag               = 1;
                $outMsg     = "Length should not excided maxlength";
            }
            else if($errReportHeadline>0)
            {
                $errFlag        = 1;
                $flag               = 1;
                $outMsg     = "Special Characters are not allowed";
            }/*else if($fileReportImageMimetyp!='image/gif' && $fileReportImageMimetyp!='image/jpeg' && $fileReportImageMimetyp!='image/jpg' && $fileReportImageMimetyp!='image/png' && $ReportFile!='') {
                    $errFlag               = 1;
                    $flag                  = 1;
                    $outMsg                = 'Invalid file types. Upload only jpg,jpeg,png';
            }*/else if ($fileReportImageSize > SIZE1MB) {
                $errFlag                = 1;
                $flag                   = 1;
                $outMsg                 = 'File size can not more than 1 MB';
            }else if ($checkTagsStatus > 0 || $checkTagsStatusO > 0) {

                $outMsg                 = "HTML Special Tags Are Not Allowed";
                $errFlag                = 1;
                $flag                   = 1;
            }

            if ($ReportImage == '' && $reportId != 0)
                $ReportImage = $prevReportImage;

            if ($ReportFile == '' && $reportId != 0)
                $ReportFile = $prevFile;


            if ($errFlag == 0 && $userId > 0) {

                //echo "hello";exit;
                $dupResult = $this->manageReport('CD', $reportId, $intSelectCategory, $txtReportHeadline, '', '', '1000-01-01', 0, 0, $userId, '1000-01-01', '1000-01-01','','','');

                //print_r($dupResult);exit;

                if ($dupResult) {
                    $numRows = $dupResult->num_rows;
                    //echo  $numRows."=====" ;exit;
                    if ($numRows > 0) {
                        $outMsg = $msgTitle . ' with this headline already exists';
                        $errFlag = 1;
                        $flag = 1;
                    } else {
                        $result = $this->manageReport($action, $reportId, $intSelectCategory, $txtReportHeadline, $ReportImage, $ReportFile, $PublishDate, 0, 0, $userId, '1000-01-01', '1000-01-01',$txtDetailsE,$txtDetailsO,$txtReportHeadlineO);
                        $resultData=($result->num_rows>0)?$result->fetch_array():array();

                        if ($resultData['@P_STATUS']>0) {
                            $outMsg = ($action == 'A') ? $msgTitle . ' added successfully ' : $msgTitle . ' updated successfully';

                            if ($ReportImage != '') {
                                if (file_exists("uploadDocuments/Report/" . $prevReportImage) && $prevReportImage != '' && $_FILES['ReportImage']['name'] != '') {
                                    unlink("uploadDocuments/Report/" . $prevReportImage);
                                }

                                if ($_FILES['ReportImage']['name'] != '' && $ext != 'jpg') {
                                    $this->GetResizeReportImage($this, 'uploadDocuments/Report/', 550, 0, $ReportImage, $fileReportImageTemp); //223,138
                                } else
                                    move_uploaded_file($fileReportImageTemp, "uploadDocuments/Report/" . $ReportImage);
############
                                if ($ReportFile != '') {
                                    if (file_exists("uploadDocuments/Report/" . $prevFile) && $prevFile != '' && $_FILES['ReportFile']['name'] != '') {
                                        unlink("uploadDocuments/Report/" . $prevFile);
                                    }

                                    if ($_FILES['ReportFile']['name'] != '' && $ext != 'pdf') {

                                        $this->GetResizeReportImage($this, 'uploadDocuments/Report/', 550, 0, $ReportFile, $fileTemp); //223,138
                                    } else
                                        move_uploaded_file($fileTemp, "uploadDocuments/Report/" . $ReportFile);
                                }
                            }
                        }else{
                               $outMsg = ($resultData['@CATEGORY_COUNT']==0)?'Selected Report Category not exist.':'Error in Operation';
                                $errFlag = 1;
                                $flag = 1;
                        }
                    }
                }
            }

            else {
                header("Location:" . APP_URL . "error");
            }

            $intSelectCategory = ($errFlag == 1) ? $intSelectCategory : '';
            $strReportHeadline = ($errFlag == 1) ? htmlentities($txtReportHeadline) : '';
            $strReportHeadlineO = ($errFlag == 1) ? htmlentities($txtReportHeadlineO) : '';
            $strReportImage = ($errFlag == 1) ? htmlentities($ReportImage) : '';
            $strReportFile = ($errFlag == 1) ? htmlentities($ReportFile) : '';
            $strPublishDate = ($errFlag == 1) ? htmlentities($PublishDate) : '';
            $strCaption = ($errFlag == 1) ? htmlentities($txtCaption) : '';
            $strPlace = ($errFlag == 1) ? htmlentities($txtPlace) : '';
            $strDescE = ($errFlag == 1) ? htmlentities($txtDetailsE) : '';
            $strDescO = ($errFlag == 1) ? htmlentities($txtDetailsO) : '';


            $arrResult = array('strPublishDate' => $PublishDate, 'strCaption' => $strCaption, 'strPlace' => $strPlace, 'msg' => $outMsg, 'flag' => $errFlag, 'strReportHeadline' => $strReportHeadline, 'strReportHeadlineO' => $strReportHeadlineO,'strReportImage' => $ReportImage, 'strReportFile' => $ReportFile, 'intSelectCategory' => $intSelectCategory,'strDescE' => $strDescE, 'strDescO' => $strDescO);
            return $arrResult;
        }
    }

// Function To read Report  

    public function readReport($id) {

        $result = $this->manageReport('R', $id, '0', '', '', '', '1000-01-01', 0, 0, 0, '1000-01-01', '1000-01-01','','','');
        // print_r ($result);exit;
        if ($result->num_rows > 0) {
            $row = $result->fetch_array();
            $intCategoryId = $row['intSelectCategory'];
            $strReportHeadline = htmlspecialchars_decode($row['vchReportHeadline'], ENT_QUOTES);
            $strReportHeadlineO = htmlspecialchars_decode($row['vchReportHeadlineO'], ENT_QUOTES);
            $strReportImage = $row['vchReportImage'];
            $strReportFile = !empty($row['vchReportFile']) ? $row['vchReportFile'] : '';
            $strPublishDate = date('d-m-Y', strtotime($row['dtmPublishDate']));
            if ($strPublishDate == '01-01-1970' || $strPublishDate == '' || strtotime($strPublishDate) <= 0)
                $strPublishDate = '';

            $stmCreatedOn = date('d-m-Y', strtotime($row['stmCreatedOn']));
            $strDescE         = htmlspecialchars_decode($row['vchDescriptionE'],ENT_QUOTES); 
            $strDescO         = htmlspecialchars_decode($row['vchDescriptionO'],ENT_QUOTES);
        }

        $arrResult = array('stmCreatedOn' => $stmCreatedOn, 'intSelectCategoryId' => $intCategoryId, 'strPublishDate' => $strPublishDate, 'strReportHeadline' => $strReportHeadline , 'strReportHeadlineO' => $strReportHeadlineO, 'strReportImage' => $strReportImage, 'strReportFile' => $strReportFile,'strDescE'=>$strDescE,'strDescO'=>$strDescO);
        return $arrResult;
    }

    // Function To read Report 
    public function updateExpary() {
        $newSessionId = session_id();
        $hdnPrevSessionId = $_POST['hdnPrevSessionId'];
        if ($newSessionId == $hdnPrevSessionId) {
            $userId = $_SESSION['adminConsole_userID'];
            $id = $_POST['hdnNID'];

            $result = $this->manageReport('UE', 0, 0, $txtReportHeadline, '', '', '1000-01-01', 0, 0, $userId, '1000-01-01', '1000-01-01','','','');
            if ($result)
                $outMsg = ' Date Updated successfully ';


            return $outMsg;
        }else {
            header("Location:" . APP_URL . "error");
        }
    }

// Function To Delete Report  
    public function deleteReport($action, $ids) {

        $newSessionId = session_id();
        $hdnPrevSessionId = $_POST['hdnPrevSessionId'];
        $slNumber = 0;
        if ($newSessionId == $hdnPrevSessionId) {
            $ctr = 0;
            $msg = 0;
            //$userId         = USER_ID;
            $userId = $_SESSION['adminConsole_userID'];
            $explIds = explode(',', $ids);
            $delRec = 0;
            //  $catid          = $_REQUEST['hdn_catid'];

            $msgTitle = 'Report ';

            foreach ($explIds as $indIds) {
                if ($action == 'US') {
                    $slNumber = $_POST['txtSLNo' . $explIds[$ctr]];
                    //echo $indvidualID;        
                }

                /* $result = $this->manageReport($action,$id,'','','','','1000-01-01',0,0,0,'1000-01-01','1000-01-01'); */
                $result = $this->manageReport($action, $explIds[$ctr], 0, '', '', '', '1000-01-01', 0, 0, 0, '1000-01-01', '1000-01-01','','','');
                //   print_r( $result);exit;         
                $row = mysqli_fetch_array($result);
                if ($row[0] == 0)
                    $delRec++;

                $ctr++;
            }

            if ($action == 'D') {
                if ($delRec > 0)
                    $outMsg .= $msgTitle . ' deleted successfully';
                else
                    $outMsg .= 'Dependency record exist. New(s) can not be  deleted';
            }
            else if ($action == 'AC')
                $outMsg = $msgTitle . ' activated successfully';
            else if ($action == 'IN')
                $outMsg = $msgTitle . ' unpublished successfully';
            else if ($action == 'AR')
                $outMsg = $msgTitle . ' archieved successfully';
            else if ($action == 'P')
                $outMsg = $msgTitle . ' Published successfully';
            else if ($action == 'HH')
                $outMsg = $msgTitle . ' Hide on home page Successfully';
            else if ($action == 'SH' && $msg == 0)
                $outMsg = $msgTitle . ' Displayed on home page Successfully';

            return $outMsg;
        }else {
            header("Location:" . APP_URL . "error");
        }
    }

}

?>
