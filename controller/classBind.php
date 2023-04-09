<?php

/* ================================================
  File Name           : classBind.php
  Description		  : Page to manage class bind.
  Date Created		  : 12-July-2015
  Designed By		  : Rasmi ranjan Swain
  Update History	  :
  <Updated by>		<Updated On>		<Remarks>

  Javscript Functions   :
  includes              :

  ================================================== */
include_once(APP_PATH."model/customModel.php");
ini_set('max_input_vars', '20000');

class clsClassPortal extends Model {
    /*
      Function to gGenerate Random Code
      By: T Ketaki Debadarshini
      On: 29-Dec-2015
     */

    public function generateRandomcode() {

        $mediaType = $_REQUEST['mediaType']; //1-Email-id, 2- Mobile No

        $strKey = $this->randomKey(5);
        $_SESSION['strOtp'] = $strKey;

        if ($mediaType == 1) {
            
        } else {
            
        }

        echo json_encode(array('strOtp' => $strKey));
    }

    /*
      Function to Verify the OTP
      By: T Ketaki Debadarshini
      On: 29-Dec-2015
     */

    public function verifyOtp() {

        $enteredOtp = $_REQUEST['enteredOtp'];

        if ($enteredOtp == $_SESSION['strOtp'])
            $flag = 1;
        else
            $flag = 0;
        echo json_encode(array('flag' => $flag));
    }

    /*
      Function to Verify the the capcha
      By: T Ketaki Debadarshini
      On: 29-Dec-2015
     */

    public function validCaptcha() {

        $controlVal = $_REQUEST['controlVal'];

        if ($_SESSION['captcha'] == $controlVal)
            $flag = 0;
        else
            $flag = 1;
        echo json_encode(array('flag' => $flag));
    }

    /* Function to show all course/sector details
      By: T Ketaki Debadarshini
      On: 24-March-2017
     */

    public function loadCourses() {

        /* $newSessionId           = session_id();
          $hdnPrevSessionId       = $_POST['hdnPrevSessionId'];
          if($newSessionId == $hdnPrevSessionId) { */

        // session_regenerate_id(); 
        $intRecno = $_POST['intRecno'];
        $intPagesize = ($_POST['intPagesize'] > 0 && $_POST['intPagesize'] != '') ? $_POST['intPagesize'] : 0;

        $selEligibility = ($_POST['selEligibility'] > 0 && $_POST['selEligibility'] != '') ? $_POST['selEligibility'] : '';
        if ($selEligibility != '') {
            $aryEligibility = explode(',', $selEligibility);

            foreach ($aryEligibility as $intEligibility) {
                if ($intEligibility <= 10)
                    $strArySearch[] = ' intEligibility<=10 ';
                else
                    $strArySearch[] = ' intEligibility IN (' . $selEligibility . ') ';
            }
            $strSearchEligibility = implode(' OR ', $strArySearch);
        }
        $strSearchEligibility = ($strSearchEligibility != '') ? 'AND (' . $strSearchEligibility . ') ' : '';

        $strSearchCourse = ($_POST['txtSearchCourse'] != '') ? trim($_POST['txtSearchCourse']) : '';
        $intDuration = ($_POST['intDuration'] > 0 && $_POST['intDuration'] != '') ? $_POST['intDuration'] : 0;

        include('view/langConverter.php');
        include_once( CLASS_PATH . 'clsCourse.php');
        $objCourse = new clsCourse;

        /* $totalResult                 = $objCourse->viewCourse('CTC',0,0,$strSearchCourse,'','',0,$selEligibility,'','',0,0,0,0,'');            
          $numRow                      = $totalResult->fetch_array();
          $totalResultrec              = $numRow[0]; */

        $totalcourseRes = $objCourse->viewCourse('PGC', $intRecno, 0, '', '', '', $intDuration, 0, '', '', 0, 0, 0, $intPagesize, $strSearchEligibility);
        $intTotalRec = mysqli_num_rows($totalcourseRes);
        $arrList = array();
        if ($totalcourseRes->num_rows > 0) {
            while ($row = mysqli_fetch_array($totalcourseRes)) {
                $pageArr['intCategoryId'] = $row["intCategoryId"];
                $pageArr['strSecotrAlias'] = $row["vchSecotrAlias"];
                $pageArr['strImage'] = $row["vchImage"];
                $pageArr['courseCount'] = $row["courseCount"];

                $pageArr['shortCount'] = $row["shortCount"];
                $pageArr['longCount'] = $row["longCount"];

                $pageArr['below10Count'] = $row["below10Count"];
                $pageArr['int10Count'] = $row["int10Count"];
                $pageArr['int12Count'] = $row["int12Count"];
                $pageArr['int15Count'] = $row["int15Count"];
                $pageArr['int17Count'] = $row["int17Count"];

                $strSecotrNameE = htmlspecialchars_decode($row["vchSecotrName"], ENT_QUOTES);
                $strSecotrNameO = $row["vchSecotrNameO"];

                $strSecotrName = ($_SESSION['lang'] == 'O' && $strSecotrNameO != '') ? $strSecotrNameO : $strSecotrNameE;
                $strcls = ($_SESSION['lang'] == 'O' && $strSecotrNameO != '') ? 'odia' : '';

                $pageArr['strSecotrName'] = $strSecotrName;
                $pageArr['totalResultrec'] = $totalResultrec;
                $pageArr['strClass'] = $strcls;
                $pageArr['strNumClass'] = $strNumLangCls;
                $pageArr['strDtlClass'] = $strLangCls;
                $pageArr['strDtlabl'] = $strDetailslbl;
                $pageArr['strCourselbl'] = $strCourselbl;
                $pageArr['strMorelbl'] = $strLoadMorelbl;
                array_push($arrList, $pageArr);
            }
            echo json_encode(array('sectorDtls' => $arrList));
        } else {
            $pageArr['strNorecordlbl'] = $strNorecordlbl;
            $pageArr['strLangCls'] = $strLangCls;

            echo(json_encode(array('noRecord' => $pageArr)));
        }


        /* }else{

          echo json_encode(array('sectorDtls'=>"Operation failed due to session mismatch"));
          } */
    }

    /* Function to show eligibility details 
      By: T Ketaki Debadarshini
      On: 24-March-2017
     */

    public function fillEligibility() {

        $strAll = ($_SESSION['lang'] == 'O') ? '&#2872;&#2860;&#2881;' : 'All';
        $str10th = ($_SESSION['lang'] == 'O') ? '&#2854;&#2870;&#2862;  &#47;&#49;&#48;' : '10th';
        $str12th = ($_SESSION['lang'] == 'O') ? '&#2854;&#2893;&#2860;&#2878;&#2854;&#2870;&#47;&#49;&#50;' : '12th';
        $strBelow = ($_SESSION['lang'] == 'O') ? '&#2919;&#2918;&#2862; &#2852;&#2867;&#2837;&#2881;' : 'Below 10';
        $strGrad = ($_SESSION['lang'] == 'O') ? '&#2872;&#2893;&#2856;&#2878;&#2852;&#2837;' : 'Graduation';
        $strPostGrad = ($_SESSION['lang'] == 'O') ? '&#2872;&#2893;&#2856;&#2878;&#2852;&#2837;&#2891;&#2852;&#2893;&#2852;&#2864;' : 'Post Graduation';

        $intSelval = $_POST['selval'];
        $errSelVal = $this->isSpclChar($intSelval);
        if ($errSelVal == 0) {
            $opt = '<option value="0" ' . (($intSelval == 0) ? 'selected="selected"' : '') . '>--' . $strAll . '--</option>';
            $opt .= '<option value="9" ' . (($intSelval == 9) ? 'selected="selected"' : '') . '>' . $strBelow . '</option>';
            $opt .= '<option value="10" ' . (($intSelval == 10) ? 'selected="selected"' : '') . '>' . $str10th . '</option>';
            $opt .= '<option value="12" ' . (($intSelval == 12) ? 'selected="selected"' : '') . '>' . $str12th . '</option>';
            $opt .= '<option value="15" ' . (($intSelval == 15) ? 'selected="selected"' : '') . '>' . $strGrad . '</option>';
            $opt .= '<option value="17" ' . (($intSelval == 17) ? 'selected="selected"' : '') . '>' . $strPostGrad . '</option>';

            echo json_encode(array('eligibility' => $opt));
        } else {
            echo json_encode(array('error' => 'Remove Special Characters'));
        }
    }

    /* Function to show eligibility details 
      By: T Ketaki Debadarshini
      On: 24-March-2017
     */

    public function loadEligibility() {
        $arr = array();

        $intDuration = ($_POST['intDuration'] > 0 && $_POST['intDuration'] != '') ? $_POST['intDuration'] : 0;

        include_once( CLASS_PATH . 'clsCourse.php');
        $objCourse = new clsCourse;

        //get all eligibility in database
        $totalResult = $objCourse->viewCourse('GDE', 0, 0, '', '', '', $intDuration, 0, '', '', 0, 0, 0, 0, '');
        $numRow = $totalResult->fetch_array();
        $allEligibility = $numRow[0];

        $aryEligibility = ($allEligibility != '') ? explode(',', $allEligibility) : array();

        $arr['strCls'] = ($_SESSION['lang'] == 'O') ? 'odia' : '';
        // $arr['strAll'] = ($_SESSION['lang']=='O')?'&#2872;&#2860;&#2881;':'All';
        //$arr['intVal1'] = 0;
        $arr['intBelow10Count'] = 0;
        $arr['int10thCount'] = 0;
        $arr['int12thCount'] = 0;
        $arr['intVal5Count'] = 0;
        $arr['intVal6Count'] = 0;
        foreach ($aryEligibility as $key => $value) {
            if ($value <= 9)
                $arr['intBelow10Count'] = 1;
            else if ($value == 10)
                $arr['int10thCount'] = 1;
            else if ($value == 12)
                $arr['int12thCount'] = 1;
            else if ($value == 15)
                $arr['intVal5Count'] = 1;
            else if ($value == 16)
                $arr['intVal6Count'] = 1;
        }

        $arr['intBelow10'] = 9;
        $arr['int10th'] = 10;
        $arr['int12th'] = 12;
        $arr['intVal5'] = 15;
        $arr['intVal6'] = 17;

        $arr['str10th'] = ($_SESSION['lang'] == 'O') ? '&#2862;&#2878;&#2847;&#2893;&#2864;&#2879;&#2837;' : 'Matric';
        $arr['str12th'] = ($_SESSION['lang'] == 'O') ? '&#2854;&#2893;&#2860;&#2878;&#2854;&#2870;&#47;&#2919;&#2920;' : '12th';
        $arr['strBelow'] = ($_SESSION['lang'] == 'O') ? '&#2821;&#2851; &#2862;&#2878;&#2847;&#2893;&#2864;&#2879;&#2837;' : 'Non-Matric';
        $arr['strGrad'] = ($_SESSION['lang'] == 'O') ? '&#2872;&#2893;&#2856;&#2878;&#2852;&#2837;' : 'Graduation';
        $arr['strPostGrad'] = ($_SESSION['lang'] == 'O') ? '&#2872;&#2893;&#2856;&#2878;&#2852;&#2837;&#2891;&#2852;&#2893;&#2852;&#2864;' : 'Post Graduation';

        echo json_encode(array('eligibility' => $arr));
    }

    /* Function to fill District details
      By: T Ketaki Debadarshini
      On:  24-March-2017
     */

    public function fillDistricts() {
        include('view/langConverter.php');
        include_once( CLASS_PATH . 'clsDistrict.php');

        $intDistId = (isset($_POST['intDistId']) && $_POST['intDistId'] != '') ? $_POST['intDistId'] : 0;
        $strSearchtxt = (isset($_POST['strSearchtxt']) && $_POST['strSearchtxt'] != '') ? trim($_POST['strSearchtxt']) : '';
        $intCourseId = (isset($_POST['intCourseId']) && $_POST['intCourseId'] != '') ? $_POST['intCourseId'] : 0;
        $piaStatus = (isset($_POST['piaStatus']) && $_POST['piaStatus'] != '') ? $_POST['piaStatus'] : 0;

        $distVal = (isset($_POST['distVal']) && $_POST['distVal'] != '') ? htmlspecialchars(trim($_POST['distVal'])) : '';

        $objDist = new clsDistrict;
        if ($distVal != '') {
            $errDistval = $objDist->isSpclChar($_POST['distVal']);
            if ($errDistval > 0) {
                echo json_encode(array('error' => 'Please remove special characters'));
                exit();
            } else
                $result = $objDist->manageDistrict('VP', 0, $distVal, '', '', '', 0, 0, 0);
        } else
            $result = $objDist->manageDistrict('F', $intDistId, $strSearchtxt, '', '', '', 0, $intCourseId, $piaStatus);
        $count = $result->num_rows;
        $arrList = array();
        $pageArr = array();
        if ($count > 0) {
            while ($row = $result->fetch_array()) {

                $pageArr['intDistId'] = $row['intDistrictid'];
                $pageArr['instCount'] = $row['instCount'];
                $pageArr['strAllDistlbl'] = $strAllDistlbl;
                $pageArr['strNumLangCls'] = $strNumLangCls;
                $pageArr['strAllDistcls'] = $strLangCls;

                $pageArr['strDistName'] = ($_SESSION['lang'] == 'O' && $row['vchDistrictnameO'] != '') ? $row['vchDistrictnameO'] : htmlspecialchars_decode($row['vchDistrictname'], ENT_QUOTES);
                $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $row['vchDistrictnameO'] != '') ? 'odia' : '';
                array_push($arrList, $pageArr);
            }
            echo(json_encode(array('result' => $arrList)));
        } else {

            $pageArr['strNorecordlbl'] = $strNorecordlbl;
            $pageArr['strLangCls'] = $strLangCls;

            echo(json_encode(array('noRecord' => $pageArr)));
        }
    }

    /* Function to change the language
      By: T Ketaki Debadarshini
      On:  28-March-2017
     */

    public function changeLanguage() {

        $language = $_POST['language'];
        $page = $_POST['page'];
        $plPage = ($_POST['plPage'] != '') ? "/" . $_POST['plPage'] : "";
        $glPage = ($_POST['glPage'] != '') ? "/" . $_POST['glPage'] : "";
        $idPage = $_POST['idPage'];
        $isPaging = $_POST['isPaging'];
        $intPgno = $_POST['intPgno'];
        $intRecno = $_POST['intRecno'];
        $_SESSION['lang'] = $language;
        $_SESSION['hdn_IsPaging']    = $isPaging;
        $_SESSION['hdn_PageNo']      = $intPgno;
        $_SESSION['hdn_RecNo']       = $intRecno;
         //print_r($_POST);
         //echo $_SESSION['lang'];exit;
        if ($_SESSION['lang'] == 'O') {
            if (file_exists("view/" . $page . ".php"))
                $strActualpg = $page . '-or' . $glPage . $plPage . (($idPage != '') ? "/" . $idPage : '');
            else if ($idPage != '')
                $strActualpg = $page . $glPage . $plPage . "/" . $idPage . '-or';
            else
                $strActualpg = $page . '-or' . $glPage . $plPage . (($idPage != '') ? "/" . $idPage : '');
        } else
            $strActualpg = $page . $glPage . $plPage . (($idPage != '') ? "/" . $idPage : '');

        $strActualpg = ($strActualpg == '') ? 'home' : $strActualpg;

        // $page                  = ($_SESSION['lang']=='O')?$strActualpg.'-or':$strActualpg;

        echo json_encode(array('result' => $strActualpg));
    }

    /* Function to get home page stories
      By: T Ketaki Debadarshini
      On:  30-March-2017
     */

    public function getHomepageStory() {
        include('view/langConverter.php');
        /* $newSessionId           = session_id();
          $hdnPrevSessionId       = $_POST['hdnPrevSessionId'];
          if($newSessionId == $hdnPrevSessionId) { */
        include_once( CLASS_PATH . 'clsStory.php');
        $objStory = new clsStory;
        $result = $objStory->manageStory('VH', 0, '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 2, 0, 0, 0, 0);
        $count = $result->num_rows;
        $arrList = array();
        $pageArr = array();
        if ($count > 0) {
            while ($row = $result->fetch_array()) {

                $pageArr['intStoryId'] = $row['intStoryId'];

                $pageArr['strAlias'] = $row['vchAlias'];
                $pageArr['strImageFile'] = $row['vchImageFile'];

                if ($row['vchImageFile'] != '') {
                    if (!file_exists(APP_PATH . "uploadDocuments/home_resize_img/" . $row['vchImageFile'])) {
                        $objStory->GetResizeImage($objStory, APP_PATH . 'uploadDocuments/home_resize_img/', 305, 0, $row['vchImageFile'], APP_PATH . "uploadDocuments/successStory/" . $row['vchImageFile']);
                    }
                }

                $pageArr['strName'] = ($_SESSION['lang'] == 'O' && $row['vchNameO'] != '') ? $row['vchNameO'] : htmlspecialchars_decode($row['vchNameE'], ENT_QUOTES);
                $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $row['vchNameO'] != '') ? 'odia' : '';

                $pageArr['strDesc'] = ($_SESSION['lang'] == 'O' && $row['vchSnippetO'] != '') ? $row['vchSnippetO'] : htmlspecialchars_decode($row['vchSnippet'], ENT_QUOTES);
                $counter = ($_SESSION['lang'] == 'O') ? 150 : 100;

                if ($pageArr['strDesc'] != '') {
                    $string = strip_tags($pageArr['strDesc']);
                    if (strlen($string) > $counter) {
                        // truncate string
                        $stringCut = substr($string, 0, $counter);
                        // make sure it ends in a word so assassinate doesn't become ass...
                        $string = substr($stringCut, 0, strrpos($stringCut, ' '));
                    }
                    $pageArr['strDesc'] = $string . "...";
                } else
                    $pageArr['strDesc'] = $pageArr['strDesc'];
                $pageArr['strDesClass'] = ($_SESSION['lang'] == 'O' && $row['vchSnippetO'] != '') ? 'odia' : '';

                $pageArr['strHeading'] = $strSuccessStorylbl;
                $pageArr['strHeadClass'] = ($_SESSION['lang'] == 'O') ? 'odia' : '';
               
                
                $pageArr['strPageredir'] = ($_POST['navPage'] != '') ? $_POST['navPage'] : 'my-story';

                array_push($arrList, $pageArr);
            }
        }
       // echo(json_encode(array('result' => $arrList)));

        /* }else{
          echo json_encode(array('result'=>"Operation failed due to session mismatch"));
          } */
    }

    /* Function to show sector details 
      By: Arpita Rath
      On: 30-March-2017
     */

    public function fillSector() {

        include_once(CLASS_PATH . 'clsSector.php');
        $intSelval = $_POST['selval'];
        $objSector = new clsSector;

        $result = $objSector->manageSector('V', 0, '', '', '', '', '', '', 0, 0);
        $opt = '<option value="0">--Select Sector--</option>';

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $intCatId = $row["intSectorId"];
                $strCatNameE = htmlspecialchars_decode($row["vchSecotrName"], ENT_QUOTES);
                $strCatNameO = $row['vchSecotrNameO'];
                $strCatName = ($_SESSION['lang'] == 'O' && $strCatNameO != '') ? $strCatNameO : $strCatNameE;

                $select = ($intCatId == $intSelval) ? 'selected="selected"' : '';
                $opt .= '<option value="' . $intCatId . '" title="' . $strCatName . '" ' . $select;
                $opt .= '>' . $strCatName . '</option>';
            }
        }

        echo json_encode(array('category' => $opt));
    }

    /* Function to show course details 
      By: Arpita Rath
      On: 30-March-2017
     */

    public function fillCourse() {

        include_once( CLASS_PATH . 'clsCourse.php');
        $objCourse = new clsCourse;

        $intSelval = $_POST['selval'];
        $intSector = ($_POST['selSector'] != '') ? $_POST['selSector'] : 0;

        $strCoursetxt = ($_POST['courseVal'] != '') ? htmlspecialchars(trim($_POST['courseVal']), ENT_QUOTES, 'UTF-8') : '';
        $errCoursetxt = $objCourse->isSpclChar($_POST['courseVal']);
        if ($errCoursetxt > 0) {
            echo json_encode(array('error' => 'Please remove special characters'));
        } else {
            $result = $objCourse->viewCourse('V', 0, $intSector, $strCoursetxt, '', '', 0, 0, '', '', 2, 0, 0, 0, '');
            $opt = '<option value="0">--Select Course--</option>';
            $pageArr = array();
            $arrList = array();
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $intCourseId = $row["intCourseId"];
                    $strCourseNameE = htmlspecialchars_decode($row["vchCourseNameE"], ENT_QUOTES);
                    $strCourseNameO = $row['vchCourseNameO'];
                    $strCourseName = ($_SESSION['lang'] == 'O' && $strCourseNameO != '') ? $strCourseNameO : $strCourseNameE;

                    $pageArr['intCourseId'] = $intCourseId;

                    $pageArr['strCourseName'] = $strCourseName;
                    $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $row['vchCourseNameO'] != '') ? 'odia' : '';
                    array_push($arrList, $pageArr);

                    $select = ($intCourseId == $intSelval) ? 'selected="selected"' : '';
                    $opt .= '<option value="' . $intCourseId . '" title="' . $strCourseName . '" ' . $select;
                    $opt .= '>' . $strCourseName . '</option>';
                }
            }
            if ($strCoursetxt == '' && $intSector > 0)
                echo json_encode(array('course' => $opt));
            else
                echo json_encode(array('result' => $arrList));
        }
    }

    /* Function to get home page sectors.
      By: T Ketaki Debadarshini
      On:  30-March-2017
     */

    public function getHomepageSectors() {
        include('view/langConverter.php');
        include_once( CLASS_PATH . 'clsSector.php');
        $objSector = new clsSector;
        $result = $objSector->manageSector('RH', 0, '', '', '', '', '', '', 2, 0);
        $count = $result->num_rows;
        $arrList = array();
        $pageArr = array();
        if ($count > 0) {
            while ($row = $result->fetch_array()) {

                $pageArr['intSectorId'] = $row['intSectorId'];
                $pageArr['intCoursecount'] = $row['intCoursecount'];
                $pageArr['strAlias'] = $row['vchSecotrAlias'];
                $pageArr['strImageFile'] = $row['vchImage'];

//                    $strNameO                   = $row['vchSecotrNameO'];
//                   // echo $objSector->wardWrap($strNameO,70);
//                    $pageArr['intCount']        = ($_SESSION['lang']=='O' && $row['vchSecotrNameO']!='')?$objSector->wardWrap($strNameO,70):$objSector->wardWrap(htmlspecialchars_decode($row['vchSecotrName'], ENT_QUOTES),50);
//                    $pageArr['strName']         = ($_SESSION['lang']=='O' && $row['vchSecotrNameO']!='')?$row['vchSecotrNameO']:htmlspecialchars_decode($row['vchSecotrName'], ENT_QUOTES); 


                $counter = ($_SESSION['lang'] == 'O') ? 100 : 50;


                $pageArr['strName'] = ($_SESSION['lang'] == 'O' && $row['vchSecotrNameO'] != '') ? $row['vchSecotrNameO'] : htmlspecialchars_decode($row['vchSecotrName'], ENT_QUOTES);

                if ($pageArr['strName'] != '') {
                    $string = strip_tags($pageArr['strName']);
                    if (strlen($string) > $counter) {
                        // truncate string
                        $stringCut = substr($string, 0, $counter);
                        // make sure it ends in a word so assassinate doesn't become ass...
                        $string = substr($stringCut, 0, strrpos($stringCut, ' '));
                        $pageArr['strName'] = $string . " ...";
                    } else {
                        $pageArr['strName'] = $pageArr['strName'];
                    }
                }
                $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $row['vchSecotrNameO'] != '') ? 'odia' : '';

                $pageArr['strSecotrNameE'] = htmlspecialchars_decode($row['vchSecotrName'], ENT_QUOTES);

                $pageArr['strCourselbl'] = $strCourselbl;
                $pageArr['strHeadClass'] = ($_SESSION['lang'] == 'O') ? 'odia' : '';
                $pageArr['strNumClass'] = ($_SESSION['lang'] == 'O') ? $strNumLangCls : '';

                array_push($arrList, $pageArr);
            }
        }
        echo(json_encode(array('result' => $arrList)));
    }

    /* Function to get latest news details.
      By: T Ketaki Debadarshini
      On:  30-March-2017
     */

    public function getLatestNews() {
        include('view/langConverter.php');
        include_once( CLASS_PATH . 'clsNews.php');
        $objNews = new clsNews;

        $result = $objNews->manageNews('LN', 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', 0, 0, 0, '0000-00-00', '0000-00-00', '', '', '');
        $pageArr = array();
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);

            $pageArr['intNewsId'] = $row["intNewsId"];
            $pageArr['strHeadLineE'] = htmlspecialchars_decode($row["vchHeadLineE"], ENT_QUOTES);
            $strvchHeadLineH = $row["vchHeadLineH"];

            $pageArr['strImageFile'] = $row['vchImageFile'];
            $pageArr['dtmNewsDate'] = ($_SESSION['lang'] == 'O') ? $objNews->getOdiaWeekdays(date('w', strtotime($row['dtmNewsDate']))) . ', <span class="' . $strNumLangCls . '">' . date('d', strtotime($row['dtmNewsDate'])) . '</span> ' . $objNews->getOdiaMonths(date('n', strtotime($row['dtmNewsDate']))) . ' <span class="' . $strNumLangCls . '">' . date('Y', strtotime($row['dtmNewsDate'])) . '</span> ' : date('l ,jS F Y ', strtotime($row['dtmNewsDate']));

            // $pageArr['dtmNewsDate']             = ($_SESSION['lang']=='O')?date('l ,jS F Y ',strtotime($row['dtmNewsDate'])):$row['stmCreatedOn']; 

            $pageArr['strHeadLine'] = ($_SESSION['lang'] == 'O' && $strvchHeadLineH != '') ? $strvchHeadLineH : htmlspecialchars_decode($row['vchHeadLineE'], ENT_QUOTES);
            $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $strvchHeadLineH != '') ? 'odia' : '';

            $pageArr['strDesc'] = ($_SESSION['lang'] == 'O' && $row['vchDescriptionH'] != '') ? strip_tags(urldecode($row['vchDescriptionH'])) : strip_tags(htmlspecialchars_decode($row['vchDescriptionE'], ENT_QUOTES));
            $pageArr['strDescClass'] = ($_SESSION['lang'] == 'O' && $row['vchDescriptionH'] != '') ? 'odia' : '';

            $pageArr['strHeading'] = $strNewUpdateslbl;
            $vchSourcename = ($_SESSION['lang'] == 'O' && $row['vchSourcenameO'] != '') ? $row['vchSourcenameO'] : htmlspecialchars_decode($row['vchSourcename'], ENT_QUOTES);
            $strReadMore = ($_SESSION['lang'] == 'O' && $vchSourcename != '') ? $vchSourcename . '&#2864;&#2887; ' . $strReadMorelbl : $strReadMorelbl . ' at ' . $vchSourcename;

            $pageArr['strMore'] = ($vchSourcename != '') ? $strReadMore : $strReadMorelbl;
            // $pageArr['strMore']                 = $strReadMorelbl;  
            $pageArr['strHeadClass'] = ($_SESSION['lang'] == 'O') ? 'odia' : '';

            $pageArr['vchSourcename'] = $vchSourcename;
            $pageArr['sourcenameCls'] = ($_SESSION['lang'] == 'O' && $row['vchSourcenameO'] != '') ? 'odia' : '';
            $pageArr['vchSource'] = $row['vchSource'];
        }

        echo json_encode(array('newsRes' => $pageArr));
    }

    /* Function to get latest blog details.
      By: T Ketaki Debadarshini
      On:  30-March-2017
     * Modified by T Ketaki Debadarshini On:  05-Sep-2017 : odia class added
     */

    public function getLatestBlog() {
        include('view/langConverter.php');
        include_once(CLASS_PATH . 'clsNews.php');
        $objNews = new clsNews;
        $newsResultData = $objNews->manageNews('HDB', 0, 2, '', '', '', '0000-00-00', '0000-00-00', '', '', 2, 0, 0, '0000-00-00', '0000-00-00', '', '', '', '', '');
        $intTotalNews = $newsResultData->num_rows;

        $pageArr = array();
        if ($intTotalNews > 0) {
            $newsRow = mysqli_fetch_array($newsResultData);
            $pageArr['strLangCls'] = ($_SESSION['lang'] == 'O') ? 'odia' : '';

            $pageArr['intNewsId'] = $newsRow['intNewsId'];

            $headlineE = htmlspecialchars_decode($newsRow['vchHeadLineE'], ENT_QUOTES);
            $headlineO = $newsRow['vchHeadLineH'];
            $pageArr['strHeadline'] = ($_SESSION['lang'] == 'O' && $headlineO != '') ? $headlineO : $headlineE;
            $pageArr['strHeadlineCls'] = ($_SESSION['lang'] == 'O' && $headlineO != '') ? 'odia' : '';

            $descE = htmlspecialchars_decode($newsRow['vchSnippet'], ENT_QUOTES);
            $descO = urldecode($newsRow['vchSnippetO']);

            $pageArr['strDesc'] = ($_SESSION['lang'] == 'O' && $descO != '') ? $descO : $descO;
            $pageArr['strDescClass'] = ($_SESSION['lang'] == 'O' && $descO != '') ? 'odia' : '';


            $pageArr['strNewsDate'] = ($_SESSION['lang'] == 'O') ? date('d', strtotime($newsRow['dtmNewsDate'])) . ' ' . $objNews->getOdiaMonths(date('n', strtotime($newsRow['dtmNewsDate']))) : date('jS F', strtotime($newsRow['dtmNewsDate']));

            $imgArray = array('bb_default1.jpg', 'bb_default2.jpg', 'bb_default3.jpg');
            $k = array_rand($imgArray);
            $randImage = $imgArray[$k];


            $pageArr['strImageFile'] = (!empty($newsRow['vchImageFile'])) ? SITE_URL . 'images/' . $randImage : SITE_URL . 'images/' . $randImage;

            $pageArr['strHeading'] = ($_SESSION['lang'] == 'O') ? '&#2860;&#2879;&#2870;&#2893;&#2869; &#2860;&#2879;&#2844;&#2911;&#2880; ' : 'Biswa Bijayee';
            ;
            $pageArr['strHeadClass'] = ($_SESSION['lang'] == 'O') ? 'odia' : 'odia';
             $pageArr['readMoreLbl'] = $strReadMorelbl;
        }

        echo json_encode(array('blogRes' => $pageArr));
    }

    /* Function to get latest testimonial details.
      By: T Ketaki Debadarshini
      On:  30-March-2017
     */

    public function getHomepageTestimonial() {

        $intInstituteId = ($_POST['intInstituteId'] && $_POST['intInstituteId'] != '') ? $_POST['intInstituteId'] : 0;
        $intPgsize = ($_POST['intPgsize'] && $_POST['intPgsize'] != '') ? $_POST['intPgsize'] : 12;
        $action = ($intInstituteId > 0) ? 'V' : 'PG';

        include_once( CLASS_PATH . 'clsMsgBoard.php');
        $objMsg = new clsMsgBoard;

        $result = $objMsg->manageMsgboard($action, 0, '', '', '', '', '', '', '', 2, 0, 0, $intInstituteId, '', '');
        $pageArr = array();
        $arrList = array();
        if (mysqli_num_rows($result) > 0) {
            $intCounter = 0;
            while ($row = $result->fetch_array()) {
                $intCounter++;
                $pageArr['intMessageId'] = $row["INT_MSG_ID"];
                $pageArr['strNameE'] = (!empty($row["VCH_NAME"])) ? htmlspecialchars_decode($row["VCH_NAME"], ENT_QUOTES) : '';
                $strvchHeadLineH = $row["VCH_NAME_O"];

                $pageArr['strImageFile'] = $row['VCH_IMAGE'];

                $pageArr['strName'] = ($_SESSION['lang'] == 'O' && $strvchHeadLineH != '') ? $strvchHeadLineH : $pageArr['strNameE'];
                $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $strvchHeadLineH != '') ? 'odia' : '';
                $vchOrg = (!empty($row['VCH_ORG'])) ? htmlspecialchars_decode($row['VCH_ORG'], ENT_QUOTES) : '';
                $pageArr['strOrg'] = ($_SESSION['lang'] == 'O' && $row['VCH_ORG_O'] != '') ? $row['VCH_ORG_O'] : $vchOrg;
                $pageArr['strOrgClass'] = ($_SESSION['lang'] == 'O' && $row['VCH_ORG_O'] != '') ? 'odia' : '';

                $vchDesignation = (!empty($row['VCH_DESIGNATION'])) ? htmlspecialchars_decode($row['VCH_DESIGNATION'], ENT_QUOTES) : '';
                $pageArr['strDesig'] = ($_SESSION['lang'] == 'O' && $row['VCH_DESIGNATION_O'] != '') ? $row['VCH_DESIGNATION_O'] : $vchDesignation;
                $pageArr['strDsClass'] = ($_SESSION['lang'] == 'O' && $row['VCH_DESIGNATION_O'] != '') ? 'odia' : '';

                $pageArr['strDesc'] = ($_SESSION['lang'] == 'O' && $row['VCH_DESCRIPTION_O'] != '') ? $row['VCH_DESCRIPTION_O'] : htmlspecialchars_decode($row['VCH_DESCRIPTION'], ENT_QUOTES);
                $pageArr['strDescClass'] = ($_SESSION['lang'] == 'O' && $row['VCH_DESCRIPTION_O'] != '') ? 'odia' : '';


                array_push($arrList, $pageArr);

                if ($intCounter == $intPgsize && $intInstituteId == 0)
                    break;
            }
        }

        echo json_encode(array('messageRes' => $arrList));
    }

    /* Function to show all success story details
      By: T Ketaki Debadarshini
      On: 24-March-2017
     */

    public function loadStories() {

        $intRecno = $_POST['intRecno'];
        $intPagesize = $_POST['intPagesize'];

        include_once( CLASS_PATH . 'clsStory.php');
        include('view/langConverter.php');

        $objStory = new clsStory;

        /* $totalResult                 = $objStory->manageStory('CT',0,'','','','','','','','','',0,'','','','','',2,0,0,0,'');       
          $numRow                      = $totalResult->fetch_array();
          $totalResultrec              = $numRow[0];
         */

        $totalStoryRes = $objStory->manageStory('V', 0, '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 2, 0, 0, 0, 0);
        $intTotalRec = $totalStoryRes->num_rows;
        $arrList = array();
        if ($intTotalRec > 0) {

            while ($row = $totalStoryRes->fetch_array()) {

                $pageArr['intStoryId'] = $row['intStoryId'];
                $pageArr['totalResultrec'] = $totalResultrec;
                $pageArr['strAlias'] = $row['vchAlias'];
                $pageArr['strImage'] = $row['vchImageFile'];
                $pageArr['strName'] = ($_SESSION['lang'] == 'O' && $row['vchNameO'] != '') ? $row['vchNameO'] : htmlspecialchars_decode($row['vchNameE'], ENT_QUOTES);
                $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $row['vchNameO'] != '') ? 'odia' : '';

                $pageArr['strSnippet'] = ($_SESSION['lang'] == 'O' && $row['vchSnippetO'] != '') ? $row['vchSnippetO'] : htmlspecialchars_decode($row['vchSnippet'], ENT_QUOTES);
                $pageArr['strSnippetClass'] = ($_SESSION['lang'] == 'O' && $row['vchSnippetO'] != '') ? 'odia' : '';

                $pageArr['strDesc'] = ($_SESSION['lang'] == 'O' && $row['vchDescriptionO'] != '') ? urldecode($row['vchDescriptionO']) : htmlspecialchars_decode($row['vchDescriptionE'], ENT_QUOTES);
                $pageArr['strDesClass'] = ($_SESSION['lang'] == 'O' && $row['vchDescriptionO'] != '') ? 'odia' : '';

                $pageArr['strDesignation'] = ($_SESSION['lang'] == 'O' && $row['vchDesignationO'] != '') ? urldecode($row['vchDesignationO']) : htmlspecialchars_decode($row['vchDesignation'], ENT_QUOTES);
                $pageArr['strDesigClass'] = ($_SESSION['lang'] == 'O' && $row['vchDesignationO'] != '') ? 'odia' : '';

                $pageArr['strHeading'] = $strStoryViewDetailslbl;
                $pageArr['strMoreHeading'] = $strMoreStorylbl;
                $pageArr['strHeadClass'] = ($_SESSION['lang'] == 'O') ? 'odia' : '';

                $pageArr['strNameE'] = htmlspecialchars_decode($row['vchNameE'], ENT_QUOTES);

                $pageArr['strPageredir'] = ($_POST['navPage'] != '') ? $_POST['navPage'] : 'my-story';

                array_push($arrList, $pageArr);
            }
            echo json_encode(array('storyDtls' => $arrList));
        } else {
            $pageArr['strNorecordlbl'] = $strNorecordlbl;
            $pageArr['strLangCls'] = $strLangCls;

            echo(json_encode(array('noRecord' => $pageArr)));
        }
    }

    /*
      Function to submit Query
      By: Arpita Rath
      On: 31-03-2017
     */

    public function addQuery1($action, $name, $email, $phone, $message, $captcha) {

        /*  $newSessionId           = session_id();
          $hdnPrevSessionId         = $_POST['hdnPrevSessionId'];
          if($newSessionId == $hdnPrevSessionId) { */

        // session_regenerate_id();

        include_once(CLASS_PATH . 'clsQuery.php');
        $objQuery = new clsQuery;

        $outMsg = '';
        $errFlag = 0;
        $action = 'A';

        $txtQueryName = htmlspecialchars($name);
        $txtQueryEmail = htmlspecialchars($email);
        $txtQueryPhone = htmlspecialchars($phone);
        $txtQueryMsg = htmlspecialchars($message);
        if ($errFlag == 0) {
            $result = $objQuery->addQuery($action, $txtQueryName, $txtQueryEmail, $txtQueryPhone, $txtQueryMsg, $captcha);
        }
        
        echo json_encode(array('errFlag' => $result['errFlag'], 'outMsg' => $result['msg']));

        /* }else{

          echo json_encode(array('errFlag'=>"1",'outMsg'=>"Transaction failed due to session mismatch"));
          } */
    }

    /* Function to show all success story details for the selected institute
      By: T Ketaki Debadarshini
      On: 04-April-2017
     */

    public function loadInstituteStories() {

        $intInstituteId = ($_POST['intInstituteId'] && $_POST['intInstituteId'] != '') ? $_POST['intInstituteId'] : 0;

        include_once( CLASS_PATH . 'clsStory.php');
        $objStory = new clsStory;

        $totalStoryRes = $objStory->manageStory('V', 0, '', '', '', '', '', '', '', '', '', $intInstituteId, '', '', '', '', '', 2, 0, 0, 0, 0);
        $intTotalRec = mysqli_num_rows($totalStoryRes);
        $arrList = array();
        if (mysqli_num_rows($totalStoryRes) > 0) {
            while ($row = mysqli_fetch_array($totalStoryRes)) {

                $pageArr['intStoryId'] = $row['intStoryId'];
                $pageArr['strAlias'] = $row['vchAlias'];
                $pageArr['strImage'] = $row['vchImageFile'];
                $pageArr['strName'] = ($_SESSION['lang'] == 'O' && $row['vchNameO'] != '') ? $row['vchNameO'] : htmlspecialchars_decode($row['vchNameE'], ENT_QUOTES);
                $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $row['vchNameO'] != '') ? 'odia' : '';

                $pageArr['strDesc'] = ($_SESSION['lang'] == 'O' && $row['vchSnippetO'] != '') ? $row['vchSnippetO'] : htmlspecialchars_decode($row['vchSnippet'], ENT_QUOTES);
                $pageArr['strDesClass'] = ($_SESSION['lang'] == 'O' && $row['vchSnippetO'] != '') ? 'odia' : '';

                $pageArr['strHeading'] = ($_SESSION['lang'] == 'O') ? 'i`kZûe KûjûYú' : 'Details';
                $pageArr['strHeadClass'] = ($_SESSION['lang'] == 'O') ? 'odia' : '';

                $pageArr['strNameE'] = htmlspecialchars_decode($row['vchNameE'], ENT_QUOTES);
                $pageArr['strPageredir'] = ($_POST['navPage'] != '') ? $_POST['navPage'] : 'my-story-details';

                array_push($arrList, $pageArr);
            }
        }

        echo json_encode(array('storyDtls' => $arrList));
    }

    /*
      Function to show all institute recruiter details
      By: T Ketaki Debadarshini
      On: 04-April-2017
     */

    public function getRecruiterdetails() {

        $intInstituteId = ($_POST['intInstituteId'] && $_POST['intInstituteId'] != '') ? $_POST['intInstituteId'] : 0;

        include('view/langConverter.php');
        include_once( CLASS_PATH . 'clsRecruitmentDtls.php');
        $objDtls = new clsRecruitmentDtls;

        $result = $objDtls->manageDtls('V', 0, 0, $intInstituteId, '', '', '', '', 2, 0, 0);
        $intTotalRec = mysqli_num_rows($result);
        $arrList = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {

                $pageArr['intRecruitmentId'] = $row['intRecruitmentId'];
                $pageArr['strLink'] = ($row['vchLink'] != '') ? $row['vchLink'] : 'javascript:void(0);';
                $pageArr['strImage'] = $row['vchImage'];
                $pageArr['strName'] = ($_SESSION['lang'] == 'O' && $row['vchNameO'] != '') ? $row['vchNameO'] : htmlspecialchars_decode($row['vchNameE'], ENT_QUOTES);
                $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $row['vchNameO'] != '') ? 'odia' : '';

                $pageArr['strNameE'] = htmlspecialchars_decode($row['vchNameE'], ENT_QUOTES);

                array_push($arrList, $pageArr);
            }
            echo json_encode(array('recruiterDtls' => $arrList));
        } else {
            $pageArr['strNorecordlbl'] = $strNorecordlbl;
            $pageArr['strLangCls'] = $strLangCls;

            echo(json_encode(array('noRecord' => $pageArr)));
        }
    }

    /* Function to show Category details 
      By: Arpita Rath
      On: 05-04-2017
     */

    public function getCategory($selVal) {
        include('view/langConverter.php');
        include_once(CLASS_PATH . 'clsGallery.php');
        $intType = $_REQUEST['selType'];
        $objGallerycat = new clsGalleryCategory;


        $result = $objGallerycat->manageGalleryCategory('FM', 0, $intType, '', '', '', '', 0, 0);
        // $opt	= ' <option value="0">-Select Album-</option>';

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $intCatId = $row["INT_CATEGORY_ID"];
                $strCatNameE = (htmlspecialchars_decode($row["VCH_CATEGORY_NAME"], ENT_QUOTES));
                $strCatNameO = $row["VCH_CATEGORY_NAME_O"];
                $strCatName = ($_SESSION['lang'] == 'O' && $strCatNameO != '') ? $strCatNameO : $strCatNameE;

                $select = ($intCatId == $selVal) ? 'selected="selected"' : '';
                $opt .= '<option class="' . $strLangCls . '" value="' . $intCatId . '" title="' . $strCatName . '" ' . $select;
                $opt .= '>' . $strCatName . '</option>';
            }
            $opt .= '<option value="0" title="All" class="' . $strLangCls . '">' . $strAlllbl . '</option>';
        }
        echo json_encode(array('category' => $opt));
    }

    /* Function to get right panel stories
      By: T Ketaki Debadarshini
      On:  05-April-2017
     */

    public function getRightpanelStory() {
        include('view/langConverter.php');
        include_once( CLASS_PATH . 'clsStory.php');
        $objStory = new clsStory;
        $result = $objStory->manageStory('VR', 0, '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 2, 0, 0, 0, 0);
        $count = $result->num_rows;
        $pageArr = array();

        if ($count > 0) {

            $row = $result->fetch_array();

            $pageArr['intStoryId'] = $row['intStoryId'];

            $pageArr['strAlias'] = $row['vchAlias'];
            $pageArr['strImageFile'] = $row['vchImageFile'];
            $pageArr['strNameE'] = htmlspecialchars_decode($row['vchNameE'], ENT_QUOTES);
            $pageArr['strName'] = ($_SESSION['lang'] == 'O' && $row['vchNameO'] != '') ? $row['vchNameO'] : htmlspecialchars_decode($row['vchNameE'], ENT_QUOTES);
            $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $row['vchNameO'] != '') ? 'odia' : '';

            $pageArr['strDesc'] = ($_SESSION['lang'] == 'O' && $row['vchSnippetO'] != '') ? $row['vchSnippetO'] : htmlspecialchars_decode($row['vchSnippet'], ENT_QUOTES);
            $pageArr['strDesClass'] = ($_SESSION['lang'] == 'O' && $row['vchSnippetO'] != '') ? 'odia' : '';

            $pageArr['strMore'] = $strStoryViewDetailslbl;
            $pageArr['strHeadClass'] = $strLangCls;
            $pageArr['strHeading'] = ($_SESSION['lang'] == 'O') ? '&#2872;&#2859;&#2867;&#2852;&#2878;&#2864; &#2837;&#2878;&#2873;&#2878;&#2851;&#2880;' : 'Success Story';
        }
        echo(json_encode(array('result' => $pageArr)));
    }

    /* Function to get right panel blog details.
      By: T Ketaki Debadarshini
      On:  06-April-2017
     */

    public function getRightpanelBlog() {
        include('view/langConverter.php');
        include_once( CLASS_PATH . 'clsBlog.php');
        $objTopic = new clsTopic;

        $result = $objTopic->manageTopic('VR', 0, '', '', '', '', '', '', '', 2, 0, 0, '', '', '0000-00-00', '0000-00-00');
        $pageArr = array();
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);

            $pageArr['intBlogId'] = $row["INT_TOPIC_ID"];
            $pageArr['strHeadLineE'] = htmlspecialchars_decode($row["VCH_TOPIC_NAME"], ENT_QUOTES);
            $strvchHeadLineH = $row["VCH_TOPIC_NAME_O"];

            $pageArr['strImageFile'] = ($row['VCH_TOPIC_ICON'] != '') ? APP_URL . 'uploadDocuments/forumTopics/' . $row['VCH_TOPIC_ICON'] : SITE_URL . 'images/dafault-blog.jpeg';
//
            $pageArr['dtmBlogDate'] = ($_SESSION['lang'] == 'O') ? date('d', strtotime($row['DTM_CREATED_ON'])) . ' ' . $objTopic->getOdiaMonths(date('n', strtotime($row['DTM_CREATED_ON']))) . ' ' . date('Y', strtotime($row['DTM_CREATED_ON'])) : date('jS M Y ', strtotime($row['DTM_CREATED_ON']));

            $pageArr['strHeadLine'] = ($_SESSION['lang'] == 'O' && $strvchHeadLineH != '') ? $strvchHeadLineH : htmlspecialchars_decode($row['VCH_TOPIC_NAME'], ENT_QUOTES);
            $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $strvchHeadLineH != '') ? 'odia' : '';

            $pageArr['strAuthor'] = ($_SESSION['lang'] == 'O' && $row['VCH_NAME_O'] != '') ? $row['VCH_NAME_O'] : htmlspecialchars_decode($row['VCH_NAME'], ENT_QUOTES);
            $pageArr['strAuClass'] = ($_SESSION['lang'] == 'O' && $row['VCH_NAME_O'] != '') ? 'odia' : '';

            $pageArr['strDesc'] = ($_SESSION['lang'] == 'O' && $row['VCH_SNIPPET_O'] != '') ? $row['VCH_SNIPPET_O'] : htmlspecialchars_decode($row['VCH_SNIPPET_O'], ENT_QUOTES);
            $pageArr['strDescClass'] = ($_SESSION['lang'] == 'O' && $row['VCH_SNIPPET_O'] != '') ? 'odia' : '';

            $pageArr['strSnippet'] = htmlspecialchars_decode($row["VCH_SNIPPET"], ENT_QUOTES);

            $pageArr['strHeading'] = ($_SESSION['lang'] == 'O') ? '&#2860;&#2879;&#2870;&#2893;&#2869; &#2860;&#2879;&#2844;&#2911;&#2880; ' : '&#2860;&#2879;&#2870;&#2893;&#2869; &#2860;&#2879;&#2844;&#2911;&#2880; ';
            $pageArr['strMore'] = $strReadMorelbl;
            $pageArr['strHeadClass'] = $strLangCls;
            $pageArr['strNumLangCls'] = $strNumLangCls;
            $pageArr['strShareOn'] = ($_SESSION['lang'] == 'O') ? '&#2870;&#2887;&#2911;&#2878;&#2864; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;' : 'Share On';
            $pageArr['strBy'] = ($_SESSION['lang'] == 'O') ? '&#2854;&#2893;&#2860;&#2878;&#2864;&#2878;' : 'By';
        }

        echo json_encode(array('blogRes' => $pageArr));
    }

    /* Function to get right panel news details.
      By: T Ketaki Debadarshini
      On:  30-March-2017'
     * Modified by T Ketaki Debadrashini on 08-Sept-2017 : Weekdays odia issue resolved
     */

    public function getRightpanelNews() {

        include_once( CLASS_PATH . 'clsNews.php');
        include('view/langConverter.php');
        $objNews = new clsNews;

        $result = $objNews->manageNews('VR', 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', 0, 0, 0, '0000-00-00', '0000-00-00', '', '', '');
        $pageArr = array();
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);

            $pageArr['intNewsId'] = $row["intNewsId"];
            $pageArr['strHeadLineE'] = htmlspecialchars_decode($row["vchHeadLineE"], ENT_QUOTES);
            $strvchHeadLineH = $row["vchHeadLineH"];

            $pageArr['strImageFile'] = $row['vchImageFile'];
            $pageArr['dtmNewsDate'] = ($_SESSION['lang'] == 'O') ? $objNews->getOdiaWeekdays(date('w', strtotime($row['dtmNewsDate']))) . ', <span class="' . $strNumLangCls . '">' . date('d', strtotime($row['dtmNewsDate'])) . '</span> ' . $objNews->getOdiaMonths(date('n', strtotime($row['dtmNewsDate']))) . ' <span class="' . $strNumLangCls . '">' . date('Y', strtotime($row['dtmNewsDate'])) . '</span>' : date('l ,jS F Y ', strtotime($row['dtmNewsDate']));

            $pageArr['strHeadLine'] = ($_SESSION['lang'] == 'O' && $strvchHeadLineH != '') ? $strvchHeadLineH : htmlspecialchars_decode($row['vchHeadLineE'], ENT_QUOTES);
            $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $strvchHeadLineH != '') ? 'odia' : '';

            $pageArr['strDesc'] = ($_SESSION['lang'] == 'O' && $row['vchDescriptionH'] != '') ? strip_tags(urldecode($row['vchDescriptionH'])) : strip_tags(htmlspecialchars_decode($row['vchDescriptionE'], ENT_QUOTES));
            $pageArr['strDescClass'] = ($_SESSION['lang'] == 'O' && $row['vchDescriptionH'] != '') ? 'odia' : '';
            $pageArr['strHeading'] = $strNewUpdateslbl;
            $pageArr['strMore'] = $strReadMorelbl;
            $pageArr['strHeadClass'] = ($_SESSION['lang'] == 'O') ? 'odia' : '';
            $pageArr['vchSourcename'] = ($_SESSION['lang'] == 'O' && $row['vchSourcenameO'] != '') ? $row['vchSourcenameO'] : htmlspecialchars_decode($row['vchSourcename'], ENT_QUOTES);
            $pageArr['vchSourcenameCls'] = ($_SESSION['lang'] == 'O' && $row['vchSourcenameO'] != '') ? 'odia' : '';
            $pageArr['vchSource'] = $row['vchSource'];
            $pageArr['strNewsSourcelbl'] = $strNewsSourcelbl;
            $pageArr['strLangcls'] = $strLangCls;
        }

        echo json_encode(array('newsRes' => $pageArr));
    }

    /* Function to get right panel all news details.
      By: T Ketaki Debadarshini
      On:  07-April-2017
     */

    public function getRightpanelAllNews() {

        include('view/langConverter.php');
        include_once( CLASS_PATH . 'clsNews.php');
        $objNews = new clsNews;

        $intRecno = $_POST['intRecno'];
        $intPagesize = $_POST['intPagesize'];
        $intNewsId = ($_POST['intNewsId'] && $_POST['intNewsId'] != '') ? $_POST['intNewsId'] : 0;

        $totalResult = $objNews->manageNews('CT', 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', 0, 0, 0, '0000-00-00', '0000-00-00', '', '', '');
        $numRow = $totalResult->fetch_array();
        $totalResultrec = $numRow[0];


        $result = $objNews->manageNews('RPG', $intNewsId, $intRecno, '', '', '', '0000-00-00', '0000-00-00', '', '', $intPagesize, 0, 0, '0000-00-00', '0000-00-00', '', '', '');
        $pageArr = array();
        $arrList = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {

                $pageArr['intNewsId'] = $row["intNewsId"];
                $pageArr['strHeadLineE'] = htmlspecialchars_decode($row["vchHeadLineE"], ENT_QUOTES);
                $strHeadLineH = $row["vchHeadLineH"];

                $pageArr['totalResultrec'] = $totalResultrec;

                $pageArr['strImageFile'] = $row['vchImageFile'];

                $pageArr['dtmNewsDate'] = ($row['dtmNewsDate'] != '') ? date('jS F Y ', strtotime($row['dtmNewsDate'])) : $row['stmCreatedOn'];

                $pageArr['strHeadLine'] = ($_SESSION['lang'] == 'O' && $strHeadLineH != '') ? $strHeadLineH : htmlspecialchars_decode($row['vchHeadLineE'], ENT_QUOTES);
                $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $strHeadLineH != '') ? 'odia' : '';

                $pageArr['strDesc'] = ($_SESSION['lang'] == 'O' && $row['vchDescriptionH'] != '') ? $row['vchDescriptionH'] : htmlspecialchars_decode($row['vchDescriptionE'], ENT_QUOTES);
                $pageArr['strDescClass'] = ($_SESSION['lang'] == 'O' && $row['vchDescriptionH'] != '') ? 'odia' : '';

                $pageArr['strHeading'] = ($_SESSION['lang'] == 'O') ? '&#2872;&#2862;&#2893;&#2860;&#2878;&#2854; &#2831;&#2860;&#2818; &#2872;&#2854;&#2893;&#2911; &#2872;&#2882;&#2842;&#2856;&#2878;' : 'News & Updates';
                $pageArr['strMore'] = ($_SESSION['lang'] == 'O') ? '&#2821;&#2855;&#2879;&#2837; &#2854;&#2887;&#2838;&#2856;&#2893;&#2852;&#2881;' : 'Load More';
                $pageArr['strHeadClass'] = ($_SESSION['lang'] == 'O') ? 'odia' : '';

                array_push($arrList, $pageArr);
            }
            echo json_encode(array('newsRes' => $arrList));
        } else {
            $pageArr['strNorecordlbl'] = $strNorecordlbl;
            $pageArr['strLangCls'] = $strLangCls;

            echo(json_encode(array('noRecord' => $pageArr)));
        }
    }

    /* Function to get home page photoes
      By: T Ketaki Debadarshini
      On:  28-April-2017
     */

//        public function getHomepagePhoto()
//	{
//            include_once(CLASS_PATH.'clsGallery.php');
//            $objGal             = new clsGallery;
//            
//            $result             = $objGal->manageGallery('HG',0,0,2,0,'','','','','','','',2,0,0,'');
//            $count              = $result->num_rows;
//            $arrList            = array();
//            $pageArr            = array();
//            if ($count > 0) {
//                while ($row = $result->fetch_array()) {
//
//                    $pageArr['intGalleryId']  = $row['INT_GALLERY_ID']; 
//                    
//                    $pageArr['intCategoryId'] = $row['INT_CATEGORY_ID']; 
//                    $pageArr['strImageFile']  = $row['VCH_LARGE_IMAGE']; 
//                    
//                    $pageArr['strCaption']    = ($_SESSION['lang']=='O' && $row['VCH_HEADLINE_O']!='')?$row['VCH_HEADLINE_O']:htmlspecialchars_decode($row['VCH_HEADLINE_E'],ENT_QUOTES);
//                    $pageArr['strClass']      = ($_SESSION['lang']=='O' && $row['VCH_HEADLINE_O']!='')?'odia':''; 
//                    $pageArr['strCaptionE']   = htmlspecialchars_decode($row['VCH_HEADLINE_E'],ENT_QUOTES);
//                    
//                    $pageArr['strCatgory']    = ($_SESSION['lang']=='O' && $row['VCH_CATEGORY_NAME_O']!='')?$row['VCH_CATEGORY_NAME_O']:htmlspecialchars_decode($row['VCH_CATEGORY_NAME'],ENT_QUOTES);
//                    $pageArr['strCatClass']   = ($_SESSION['lang']=='O' && $row['VCH_CATEGORY_NAME_O']!='')?'odia':'';
//                    $pageArr['strCatgoryE']   = htmlspecialchars_decode($row['VCH_CATEGORY_NAME'],ENT_QUOTES);
//                   
//                    
//                    array_push($arrList,$pageArr);
//                }
//            } 
//            echo(json_encode(array('result'=>$arrList)));
//		
//	}

    /* Function to get home page videos
      By: T Ketaki Debadarshini
      On:  28-April-2017
     */
    public function getHomepageVideo() {
        include('view/langConverter.php');
        include_once(CLASS_PATH . 'clsGallery.php');
        $objGal = new clsGallery;

        $result = $objGal->manageGallery('HG', 0, 0, 3, 0, '', '', '', '', '', '', '', 2, 0, 0, '');
        $count = $result->num_rows;
        $arrList = array();
        $pageArr = array();
        if ($count > 0) {
            while ($row = $result->fetch_array()) {

                $pageArr['intGalleryId'] = $row['INT_GALLERY_ID'];

                $pageArr['intCategoryId'] = $row['INT_CATEGORY_ID'];
                $pageArr['strImageFile'] = $row['VCH_LARGE_IMAGE'];

                $pageArr['strCaption'] = ($_SESSION['lang'] == 'O' && $row['VCH_HEADLINE_O'] != '') ? $row['VCH_HEADLINE_O'] : htmlspecialchars_decode($row['VCH_HEADLINE_E'], ENT_QUOTES);
                $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $row['VCH_HEADLINE_O'] != '') ? 'odia' : '';
                $pageArr['strCaptionE'] = htmlspecialchars_decode($row['VCH_HEADLINE_E'], ENT_QUOTES);

                $pageArr['strCatgory'] = ($_SESSION['lang'] == 'O' && $row['VCH_CATEGORY_NAME_O'] != '') ? $row['VCH_CATEGORY_NAME_O'] : htmlspecialchars_decode($row['VCH_CATEGORY_NAME'], ENT_QUOTES);
                $pageArr['strCatClass'] = ($_SESSION['lang'] == 'O' && $row['VCH_CATEGORY_NAME_O'] != '') ? 'odia' : '';
                $pageArr['strCatgoryE'] = htmlspecialchars_decode($row['VCH_CATEGORY_NAME'], ENT_QUOTES);


                $video = $row['VCH_THUMB_IMAGE'];
                $linkType = $row['INT_VIDEO_LINK_TYPE'];
                $url = $row['VCH_URL'];
                // 
                $pageArr['strDate'] = ($_SESSION['lang'] == 'O') ? '<span class="' . $strNumLangCls . '">' . date('d', strtotime($row['DTM_CREATED_ON'])) . '</span> ' . $objGal->getOdiaMonths(date('n', strtotime($row['DTM_CREATED_ON']))) . ' <span class="' . $strNumLangCls . '">' . date('Y', strtotime($row['DTM_CREATED_ON'])) . '</span>' : date('jS F Y ', strtotime($row['DTM_CREATED_ON']));

                $pageArr['videourl'] = ($linkType == 1) ? APP_URL . "uploadDocuments/Video/VideoFile/" . $video : $url;


                array_push($arrList, $pageArr);
            }
            echo(json_encode(array('result' => $arrList)));
        } else {
            $pageArr['strNorecordlbl'] = $strNorecordlbl;
            $pageArr['strLangCls'] = $strLangCls;

            echo(json_encode(array('noRecord' => $pageArr)));
        }
    }

    /* Function to get home page Gallery category
      By: Ashis kumar Patra
      On:  05-June-2017
     */

    public function getHomepageGallery() {
        include('view/langConverter.php');
        include_once(CLASS_PATH . 'clsGallery.php');
        $objGalery = new clsGalleryCategory;
        $result = $objGalery->manageGalleryCategory('VH', 0, 0, '', '', '', '', 2, 0);

        $count = $result->num_rows;
        $arrList = array();
        $pageArr = array();
        if ($count > 0) {
            while ($row = $result->fetch_array()) {

                //$pageArr['intGalleryId']  = $row['INT_GALLERY_ID']; 

                $pageArr['intCategoryId'] = !empty($row['INT_CATEGORY_ID']) ? $row['INT_CATEGORY_ID'] : '';
                $strImageFile = !empty($row['VCH_HOME_IMAGE']) ? $row['VCH_HOME_IMAGE'] : $row['VCH_FRONT_IMAGE'];

                $pageArr['strImageFile'] = $strImageFile;
                if ($strImageFile != '') {

                    if (!file_exists(APP_PATH . "uploadDocuments/home_resize_img/" . $strImageFile)) {
                        $objGalery->GetResizeImage($objGalery, APP_PATH . 'uploadDocuments/home_resize_img/', 624, 0, $strImageFile, APP_PATH . "uploadDocuments/gallery/" . $strImageFile);
                    }
                }

                $strCategoryE = !empty($row['VCH_CATEGORY_NAME']) ? htmlspecialchars_decode(ucfirst($row['VCH_CATEGORY_NAME']), ENT_QUOTES) : '';
                $strDescriptionE = !empty($row['VCH_DESCRIPTION']) ? htmlspecialchars_decode(ucfirst($row['VCH_DESCRIPTION']), ENT_QUOTES) : '';
                $pageArr['strCatgory'] = ($_SESSION['lang'] == 'O' && $row['VCH_CATEGORY_NAME_O'] != '') ? $row['VCH_CATEGORY_NAME_O'] : $strCategoryE;
                $pageArr['strCatClass'] = ($_SESSION['lang'] == 'O' && $row['VCH_CATEGORY_NAME_O'] != '') ? 'odia' : '';
                $pageArr['strCatgoryE'] = !empty($row['VCH_CATEGORY_NAME']) ? htmlspecialchars_decode(ucfirst($row['VCH_CATEGORY_NAME']), ENT_QUOTES) : '';

                $pageArr['strDescription'] = ($_SESSION['lang'] == 'O' && $row['VCH_DESCRIPTION_O'] != '') ? ucfirst($row['VCH_DESCRIPTION_O']) : $strDescriptionE;
                $pageArr['strCatDescClass'] = ($_SESSION['lang'] == 'O' && $row['VCH_DESCRIPTION_O'] != '') ? 'odia' : '';


                $descCount = ($_SESSION['lang'] == 'O' && $row['VCH_DESCRIPTION_O'] != '') ? 150 : 60;
                $pageArr['strDescription'] = ($_SESSION['lang'] == 'O' && $row['VCH_DESCRIPTION_O'] != '') ?  $objGalery->wardWrap(strip_tags(urldecode($row['VCH_DESCRIPTION_O'])), $descCount): $objGalery->wardWrap(strip_tags(htmlspecialchars_decode($row['VCH_DESCRIPTION']),ENT_QUOTES), $descCount);
                
                // $pageArr['strDescriptionE']= !empty($row['VCH_DESCRIPTION'])?htmlspecialchars_decode(ucfirst($row['VCH_DESCRIPTION']),ENT_QUOTES):'';

                $pageArr['strLblClass'] = $strLangCls;
                $pageArr['strViewlabl'] = $strViewalbumlbl;
                array_push($arrList, $pageArr);
            }
            echo(json_encode(array('galleryCatresult' => $arrList)));
        } else {
            $pageArr['strNorecordlbl'] = $strNorecordlbl;
            $pageArr['strLangCls'] = $strLangCls;

            echo(json_encode(array('noRecord' => $pageArr)));
        }
    }

    /* Function to show filter course details
      By: Ashis kumar Patra
      On: 06-Jun-2017
     */

    public function loadFilterCourses() {

        $intRecno = $_POST['intRecno'];
        $intPagesize = $_POST['intPagesize'];
        $intSectorId = $_POST['sectorId'];

        $intCourseId = ($_POST['intCourseId'] != '' && $_POST['intCourseId'] > 0) ? $_POST['intCourseId'] : 0;

        $strCourseName = trim(htmlspecialchars($_POST['course'], ENT_QUOTES));

        $selEligibility = '';
        $selSectorids = '';
        $selDuration = '';
        $durationAry = '';
        $selEligibility = (!empty($_POST['selEligibility']) && count($_POST['selEligibility']) > 0) ? trim($_POST['selEligibility'], ',') : '';

        // print_r(implode(',',json_decode($_POST['selSectors'])));
        $selSectorids = (!empty($_POST['selSectors']) && count($_POST['selSectors']) > 0) ? trim($_POST['selSectors'], ',') : '';

        $intDuration = ($_POST['selDuration'] != '' && $_POST['selDuration'] > 0) ? $_POST['selDuration'] : 0;
        $query = '';

        if ($intDuration == 11) {
            $query .= ' AND intDuration BETWEEN 0 AND 11';
        }
        if ($intDuration == 12) {
            $query .= ' AND intDuration > 11';
        }

        //  echo $intRecno.','.$intSectorId.','.$strCourseName.','.$selSectorids.','.$selEligibility.','.$query;
        include('view/langConverter.php');
        include_once( CLASS_PATH . 'clsCourse.php');
        $objCourse = new clsCourse;

        $errCoursetxt = $objCourse->isSpclChar($_POST['course']);
        if ($errCoursetxt > 0) {
            echo json_encode(array('error' => 'Please remove special characters'));
        } else {


            $totalResult = $objCourse->viewCourse('CT', 0, $intSectorId, $strCourseName, $selSectorids, '', 0, 0, $selEligibility, $query, 2, 0, $intCourseId, 0, '');
            $numRow = $totalResult->fetch_array();
            $totalResultrec = $numRow[0];


            $totalcourseRes = $objCourse->viewCourse('PGF', $intRecno, $intSectorId, $strCourseName, $selSectorids, '', 0, 0, $selEligibility, $query, 2, 0, $intCourseId, $intPagesize, '');
            $intTotalRec = mysqli_num_rows($totalcourseRes);
            $arrList = array();
            if ($totalcourseRes->num_rows > 0) {
                while ($row = mysqli_fetch_array($totalcourseRes)) {
                    $pageArr['intCategoryId'] = $row["intCategoryId"];
                    $pageArr['courseCount'] = $row["courseCount"];
                    $pageArr['vchSectorImage'] = $row["vchSectorImage"];
                    $strCourseNameE = htmlspecialchars_decode($row["vchCourseNameE"], ENT_QUOTES);
                    $strCourseNameO = $row["vchCourseNameO"];
                    $strCourseName = ($_SESSION['lang'] == 'O' && $strCourseNameO != '') ? $strCourseNameO : $strCourseNameE;
                    $strCoursecls = ($_SESSION['lang'] == 'O' && $strCourseNameO != '') ? 'odia' : '';

                    $pageArr['courseAlias'] = $row["vchCourseAlias"];
                    $pageArr['courseDurationHr'] = ($row["decDurationHr"] > 0) ? floatval($row["decDurationHr"]) : '';
                    $pageArr['courseDuration'] = floatval($row["intDuration"]);
                    if ($row["intEligibility"] == 0 || $row["intEligibility"] >= 10)
                        $pageArr['strQual'] = ($_SESSION['lang'] == 'O' && $row["vchQualificationO"] != '') ? $row["vchQualificationO"] : $row["vchQualification"];
                    else
                        $pageArr['strQual'] = $strNonmatric;


                    //$pageArr['strQual']= ($pageArr['strQual']==0 || $pageArr['strQual']=='')?'--':$pageArr['strQual'];

                    $strSecotrNameE = htmlspecialchars_decode($row["vchSecotrName"], ENT_QUOTES);
                    $strSecotrNameO = $row["vchSecotrNameO"];
                    $pageArr['intOfferedByITI'] = !empty($row["intOfferedByITI"]) ? $row["intOfferedByITI"] : 0;
                    $pageArr['intOfferedByPOL'] = !empty($row["intOfferedByPOL"]) ? $row["intOfferedByPOL"] : 0;

                    $strSecotrName = ($_SESSION['lang'] == 'O' && $strSecotrNameO != '') ? $strSecotrNameO : $strSecotrNameE;
                    $strcls = ($_SESSION['lang'] == 'O' && $strSecotrNameO != '') ? 'odia' : '';

                    $pageArr['strSecotrName'] = $strSecotrName;
                    $pageArr['totalResultrec'] = $totalResultrec;
                    $pageArr['strClass'] = $strcls;
                    $pageArr['strCoursecls'] = $strCoursecls;
                    $pageArr['strCourseName'] = $strCourseName;

                    $pageArr['strDtlClass'] = $strLangCls;
                    $pageArr['strDtlabl'] = $strDurationlbl;
                    $pageArr['strCourselbl'] = $strCourselbl;
                    $pageArr['strNumclass'] = $strNumLangCls;

                    $strMonthVallbl = ($row["intDuration"] > 0) ? floatval($pageArr['courseDuration']) . $strMonthlbl : $strNALevel;

                    $strMonthVallblE = ($row["intDuration"] > 0 && $_SESSION['lang'] != 'O') ? ' in ' . floatval($row["intDuration"]) . ' ' . $strMonthlbl : '';
                    $strMonthVallblO = ($row["intDuration"] > 0 && $_SESSION['lang'] == 'O') ? ' ' . floatval($row["intDuration"]) . ' ' . $strMonthInlbl : '';

                    if ($_SESSION['lang'] == 'O') {
                        $strDurationLvl = ($row["decDurationHr"] > 0) ? $strMonthVallblO . ' ' . floatval($pageArr['courseDurationHr']) . ' ' . $strHourlbl : $strMonthVallbl;
                    } else {
                        $strDurationLvl = ($row["decDurationHr"] > 0) ? '' . floatval($pageArr['courseDurationHr']) . ' ' . $strHourlbl . ' ' . $strMonthVallblE : $strMonthVallbl;
                    }

                    $pageArr['strDurationLvl'] = ($row["intDuration"] > 0 || $row["decDurationHr"] > 0) ? $strDurationLvl : $strNALevel;

                    $pageArr['strEligLvl'] = $strEligibilitylbl;
                    $pageArr['strInstituteITI'] = ($row["intOfferedByITI"] == 1 && $_SESSION['lang'] != 'O') ? $strITI : $strITI;
                    $pageArr['strInstitutePOL'] = ($row["intOfferedByPOL"] == 1 && $_SESSION['lang'] != 'O') ? $strPolitechnic : $strPolitechnic;
                    $pageArr['strMorelbl'] = $strLoadMorelbl;
                    $pageArr['total'] = $totalResultrec;

                    $pageArr['strOfferedbylbl'] = $strOfferedbylbl;

                    $pageArr['strCourseSearchReslbl1'] = $strCourseSearchReslbl1;
                    $pageArr['strCourseSearchReslbl2'] = $strCourseSearchReslbl2;
                    $pageArr['intOfferedPIABy'] = !empty($row["intOfferedPIABy"]) ? $row["intOfferedPIABy"] : 0;
                    $pageArr['strPIALvl'] = ($row["intOfferedPIABy"] == 1 && $_SESSION['lang'] != 'O') ? $strTrainCentersmllbl : $strTrainCentersmllbl; //$strTrainCentersmllbl ; 

                    array_push($arrList, $pageArr);
                }

                echo json_encode(array('sectorDtls' => $arrList));
            } else {
                $arrList['strNoRecordlbl'] = $strNoRecordlbl;
                $arrList['strNoRecordcls'] = ($_SESSION['lang'] == 'O') ? 'odia' : '';

                echo json_encode(array('noRecord' => $arrList));
            }
        }
    }

    /* Function to get media Gallery page videos
      By: Ashis kumar Patra
      On: 13-June-2017
     */

    public function getVideoGallery() {
        include('view/langConverter.php');
        include_once(CLASS_PATH . 'clsGallery.php');
        $objGal = new clsGallery;
        $intAlbumId = $_REQUEST['albumId'];
        $intTypeId = $_REQUEST['typeid'];
        $result = $objGal->manageGallery('V', 0, $intAlbumId, $intTypeId, 0, '', '', '', '', '', '', '', 2, 0, 0, '');
        $count = $result->num_rows;
        $arrList = array();
        $pageArr = array();
        if ($count > 0) {
            while ($row = $result->fetch_array()) {

                $pageArr['intGalleryId'] = $row['INT_GALLERY_ID'];

                $pageArr['intCategoryId'] = $row['INT_CATEGORY_ID'];
                $pageArr['strImageFile'] = $row['VCH_LARGE_IMAGE'];

                $pageArr['strCaption'] = ($_SESSION['lang'] == 'O' && $row['VCH_HEADLINE_O'] != '') ? $row['VCH_HEADLINE_O'] : htmlspecialchars_decode($row['VCH_HEADLINE_E'], ENT_QUOTES);
                $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $row['VCH_HEADLINE_O'] != '') ? 'odia' : '';
                $pageArr['strCaptionE'] = htmlspecialchars_decode($row['VCH_HEADLINE_E'], ENT_QUOTES);

                $pageArr['strCatgory'] = ($_SESSION['lang'] == 'O' && $row['VCH_CATEGORY_NAME_O'] != '') ? $row['VCH_CATEGORY_NAME_O'] : htmlspecialchars_decode($row['VCH_CATEGORY_NAME'], ENT_QUOTES);
                $pageArr['strCatClass'] = ($_SESSION['lang'] == 'O' && $row['VCH_CATEGORY_NAME_O'] != '') ? 'odia' : '';
                $pageArr['strCatgoryE'] = htmlspecialchars_decode($row['VCH_CATEGORY_NAME'], ENT_QUOTES);


                $pageArr['strCatgoryDesc'] = ($_SESSION['lang'] == 'O' && $row['VCH_CAT_DESCRIPTION_O'] != '') ? $row['VCH_CAT_DESCRIPTION_O'] : htmlspecialchars_decode($row['VCH_CAT_DESCRIPTION'], ENT_QUOTES);
                $pageArr['strCatDescClass'] = ($_SESSION['lang'] == 'O' && $row['VCH_CAT_DESCRIPTION_O'] != '') ? 'odia' : '';


                if ($intAlbumId == 0) {
                    $pageArr['strCatgory'] = ($intTypeId == 3) ? $strAlllbl . ' ' . $strVideolbl : $strAlllbl . ' ' . $strPhotolbl;
                    $pageArr['strCatgoryDesc'] = '';
                    $pageArr['strCatDescClass'] = ($_SESSION['lang'] == 'O') ? 'odia' : '';
                }
                $video = $row['VCH_THUMB_IMAGE'];
                $linkType = $row['INT_VIDEO_LINK_TYPE'];
                $url = $row['VCH_URL'];
                $pageArr['strVideoNumCls'] = $strNumLangCls;
                $pageArr['strVideolbl'] = ($intTypeId == 3) ? $strVideolbl : $strPhotolbl;
                $pageArr['strVideoCls'] = ($_SESSION['lang'] == 'O') ? 'odia' : '';



                $pageArr['strDate'] = ($_SESSION['lang'] == 'O') ? '<span class="' . $strNumLangCls . '">' . date('d', strtotime($row['DTM_CREATED_ON'])) . '</span> ' . $objGal->getOdiaMonths(date('n', strtotime($row['DTM_CREATED_ON']))) . ' <span class="' . $strNumLangCls . '">' . date('Y', strtotime($row['DTM_CREATED_ON'])) . '</span>' : date('jS F Y ', strtotime($row['DTM_CREATED_ON']));
                $pageArr['videourl'] = ($linkType == 1) ? APP_URL . "uploadDocuments/Video/VideoFile/" . $video : $url;


                array_push($arrList, $pageArr);
            }

            echo(json_encode(array('result' => $arrList)));
        } else {
            $arrList['strNoRecordlbl'] = $strNoRecordlbl;
            $arrList['strNoRecordcls'] = ($_SESSION['lang'] == 'O') ? 'odia' : '';

            echo json_encode(array('noRecord' => $arrList));
        }
    }

    /* Function to get district wise institute details
      By: T Ketaki Debadarshini
      On: 29-june-2017
     */

    public function loadDistwiseInstitute() {
        include('view/langConverter.php');
        include_once( CLASS_PATH . 'clsInstitute.php');
        $objInstitute = new clsInstitute;

        $intDistrict = $_REQUEST['intDistrict'];
        $strInstitute = $_REQUEST['strInstitute'];

        $intCourseId = $_REQUEST['intCourseId'];
        $intPIAStatus = $_REQUEST['intPIAStatus'];

        $result = $objInstitute->manageInstitute('IMP', 0, $intDistrict, $strInstitute, '', 0, 0, '', '', '', '', '', '', '', '', '', '', $intCourseId, 0, 0, 0, '', '', $intPIAStatus, '', 0, 0, 0, '');
        $count = $result->num_rows;

        $arrList = array();
        $pageArr = array();

        if ($count > 0) {
            while ($row = $result->fetch_array()) {

                $pageArr['intDistrictid'] = $row['intDistrictid'];
                $pageArr['strDistrictname'] = ($_SESSION['lang'] == 'O' && $row['vchDistrictnameO'] != '') ? $row['vchDistrictnameO'] : htmlspecialchars_decode($row['vchDistrictname'], ENT_QUOTES);
                $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $row['vchDistrictnameO'] != '') ? 'odia' : '';

                $pageArr['intInstituteId'] = $row['intInstituteId'];

                $pageArr['vchInstituteName'] = ($_SESSION['lang'] == 'O' && $row['vchInstituteNameO'] != '') ? $row['vchInstituteNameO'] : htmlspecialchars_decode($row['vchInstituteName'], ENT_QUOTES);
                $pageArr['strInstituteClass'] = ($_SESSION['lang'] == 'O' && $row['vchInstituteNameO'] != '') ? 'odia' : '';

                $pageArr['vchInstituteAlias'] = htmlspecialchars_decode($row['vchInstituteAlias'], ENT_QUOTES);

                $pageArr['txtAddress'] = ($_SESSION['lang'] == 'O' && $row['txtAddressO'] != '') ? $row['txtAddressO'] : htmlspecialchars_decode($row['vchAddress'], ENT_QUOTES);
                $pageArr['txtAddressClass'] = ($_SESSION['lang'] == 'O' && $row['txtAddressO'] != '') ? 'odia' : '';

                //$pageArr['txtAddress']         = htmlspecialchars_decode($row['vchAddress'],ENT_QUOTES);
                $strSeparator = ($row['vchPhoneno'] != '' && $row['vchMobileNo'] != '') ? '/' : '';
                $pageArr['vchPhoneno'] = $row['vchMobileNo'] . (($row['vchPhoneno'] != '') ? $strSeparator . $row['vchPhoneno'] : '');
                $pageArr['vchWebsite'] = htmlspecialchars_decode($row['vchWebsite'], ENT_QUOTES);
                $pageArr['vchEmailId'] = ($row['vchEmailId'] != '') ? htmlspecialchars_decode($row['vchEmailId'], ENT_QUOTES) : '--';

                $strCourseAryE = array();
                $strCourseAryO = array();
                $strCourseAryE = !empty($row['vchCourseNames']) ? explode('~~', $row['vchCourseNames']) : $strCourseAryE;
                $strCourseAryO = !empty($row['vchCourseNamesO']) ? explode('~~', $row['vchCourseNamesO']) : $strCourseAryE;
                $pageArr['strCourseStr'] = ($_SESSION['lang'] == 'O') ? implode(' ,', $strCourseAryO) : implode(' ,', $strCourseAryE);


                $pageArr['strNorecordlbl'] = $strNorecordlbl;
                $pageArr['strWebsitelbl'] = $strWebsitelbl;
                $pageArr['strEmaillbl'] = $strEmaillbl;
                $pageArr['strCourselbl'] = $strCourselbl;
                $pageArr['strPhonelbl'] = $strPhonelbl . '/' . $strMobileNolbl;
                $pageArr['strViewCourselbl'] = $strViewCourselbl;
                $pageArr['strLangCls'] = $strLangCls;
                $pageArr['strNumLangCls'] = $strNumLangCls;

                array_push($arrList, $pageArr);
            }
            echo(json_encode(array('result' => $arrList)));
        } else {

            $pageArr['strNorecordlbl'] = $strNorecordlbl;
            $pageArr['strLangCls'] = $strLangCls;

            echo(json_encode(array('noRecord' => $pageArr)));
        }
    }

    /* Function to get pincode wise institute details
      By: T Ketaki Debadarshini
      On: 30-june-2017
     */

    public function searchbyPincode() {
        include('view/langConverter.php');
        include_once( CLASS_PATH . 'clsInstitute.php');
        $objInstitute = new clsInstitute;

        $strPincode = $_POST['pincode'];
        $distid = (isset($_POST['distid']) && $_POST['distid'] > 0) ? $_POST['distid'] : 0;

        $errPincode = $objInstitute->isSpclChar($_POST['pincode']);
        $errDistid = $objInstitute->isSpclChar($distid);
        if ($errPincode > 0 || $errDistid > 0) {
            echo json_encode(array('error' => 'Please remove special characters'));
        } else {
            $result = $objInstitute->manageInstitute('FIP', 0, $distid, 0, '', 0, 0, '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', 1, $strPincode, 0, 0, 0, '');
            $count = $result->num_rows;

            $distarrList = array();
            $distList = array();
            $distpageArr = array();
            $arrList = array();
            $pageArr = array();
            if ($count > 0) {
                while ($Instrow = $result->fetch_array()) {

                    $pageArr['strInstituteAlias'] = !empty($Instrow['vchInstituteAlias']) ? $Instrow['vchInstituteAlias'] : '';
                    $pageArr['strInstituteName'] = ($_SESSION['lang'] == 'O' && $Instrow['vchInstituteNameO'] != '') ? $Instrow['vchInstituteNameO'] : htmlspecialchars_decode($Instrow['vchInstituteName'], ENT_QUOTES);
                    $pageArr['strAddress'] = ($_SESSION['lang'] == 'O' && $Instrow['txtAddressO'] != '') ? $Instrow['txtAddressO'] : htmlspecialchars_decode($Instrow['vchAddress'], ENT_QUOTES);

                    $pageArr['strInstituteCls'] = ($_SESSION['lang'] == 'O' && $Instrow['vchInstituteNameO'] != '') ? 'odia' : '';
                    $pageArr['strAddressCls'] = ($_SESSION['lang'] == 'O' && $Instrow['txtAddressO'] != '') ? 'odia' : '';

                    $pageArr['intDistrictid'] = $Instrow['intDistrictId'];
                    $pageArr['tinIsPIA'] = $Instrow['tinIsPIA'];
                    $pageArr['vchWebsite'] = !empty($Instrow['vchWebsite']) ? $Instrow['vchWebsite'] : '';
                    $pageArr['intInstituteId'] = $Instrow['intInstituteId'];

                    $pageArr['strNorecordlbl'] = $strNorecordlbl;
                    $pageArr['strLangCls'] = $strLangCls;

                    array_push($arrList, $pageArr);
                }
                echo(json_encode(array('result' => $arrList)));
            } else {
                $pageArr['strNorecordlbl'] = $strNorecordlbl;
                $pageArr['strLangCls'] = $strLangCls;

                echo(json_encode(array('noRecord' => $pageArr)));
            }
        }
    }

    /* Function to get district wise institute details list view
      By: T Ketaki Debadarshini
      On: 01-July-2017
     */

    public function fillDistwiseInstituteLists() {
        include('view/langConverter.php');
        include_once( CLASS_PATH . 'clsInstitute.php');
        $objInstitute = new clsInstitute;

        $intDistrict = 0;
        $selDistids = (!empty($_POST['intDistIdS']) && count($_POST['intDistIdS']) > 0) ? trim($_POST['intDistIdS'], ',') : '';
        $strSearchtxt = $_POST['strSearchtxt'];
        $piaStatus = $_POST['piaStatus'];
        $intCourseId = $_POST['intCourseId'];

        $result = $objInstitute->manageInstitute('VDI', 0, $intDistrict, $strSearchtxt, $selDistids, 0, 0, '', '', '', '', '', '', '', '', '', '', $intCourseId, 0, 0, 0, '', '', $piaStatus, '', 0, 0, 0, '');
        $count = $result->num_rows;

        $arrList = array();
        $pageArr = array();
        if ($count > 0) {
            while ($row = $result->fetch_array()) {


                $pageArr['intDistrictid'] = $row['intDistrictId'];
                $pageArr['strDistrictname'] = ($_SESSION['lang'] == 'O' && $row['vchDistrictnameO'] != '') ? $row['vchDistrictnameO'] : htmlspecialchars_decode($row['vchDistrictname'], ENT_QUOTES);
                $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $row['vchDistrictnameO'] != '') ? 'odia' : '';

                $pageArr['intInstituteId'] = $row['intInstituteId'];

                $pageArr['vchInstituteName'] = ($_SESSION['lang'] == 'O' && $row['vchInstituteNameO'] != '') ? $row['vchInstituteNameO'] : htmlspecialchars_decode($row['vchInstituteName'], ENT_QUOTES);
                $pageArr['strInstituteClass'] = ($_SESSION['lang'] == 'O' && $row['vchInstituteNameO'] != '') ? 'odia' : '';

                $pageArr['vchInstituteAlias'] = htmlspecialchars_decode($row['vchInstituteAlias'], ENT_QUOTES);


                $pageArr['txtAddress'] = ($_SESSION['lang'] == 'O' && $row['txtAddressO'] != '') ? $row['txtAddressO'] : htmlspecialchars_decode($row['vchAddress'], ENT_QUOTES);
                $pageArr['txtAddressClass'] = ($_SESSION['lang'] == 'O' && $row['txtAddressO'] != '') ? 'odia' : '';

                $pageArr['vchPhoneno'] = $row['vchMobileNo'] . (($row['vchPhoneno'] != '') ? '/' . $row['vchPhoneno'] : '');
                $pageArr['vchWebsite'] = htmlspecialchars_decode($row['vchWebsite'], ENT_QUOTES);
                $pageArr['vchEmailId'] = ($row['vchEmailId'] != '') ? htmlspecialchars_decode($row['vchEmailId'], ENT_QUOTES) : '--';
                $pageArr['vchImage'] = ($row['vchImage'] != '' || !empty($row['vchImage'])) ? APP_URL . 'uploadDocuments/institute/' . $row['vchImage'] : '';

                $strCourseAryE = array();
                $strCourseAryO = array();
                $strCourseAryE = !empty($row['vchCourseNames']) ? explode('~~', $row['vchCourseNames']) : $strCourseAryE;
                $strCourseAryO = !empty($row['vchCourseNamesO']) ? explode('~~', $row['vchCourseNamesO']) : $strCourseAryE;
                $pageArr['strCourseStr'] = ($_SESSION['lang'] == 'O') ? implode(' ,', $strCourseAryO) : implode(' ,', $strCourseAryE);

                $pageArr['strNumLangCls'] = $strNumLangCls;
                $pageArr['strNorecordlbl'] = $strNorecordlbl;
                $pageArr['strWebsitelbl'] = $strWebsitelbl;
                $pageArr['strEmaillbl']       = $strEmaillbl;
                $pageArr['strCourselbl']      = $strCourselbl;
                $pageArr['strAvailCourselbl'] = $strAvailCourse;
                $pageArr['strInstitutelbl'] = $strInstituteProfile;
                $pageArr['strOdiaCls'] = $odiaClass;
                $pageArr['strPhonelbl'] = $strPhonelbl . '/' . $strMobileNolbl;


                array_push($arrList, $pageArr);
            }
            echo(json_encode(array('result' => $arrList)));
        } else {
            $pageArr['strNorecordlbl'] = $strNorecordlbl;
            $pageArr['strLangCls'] = $strLangCls;

            echo(json_encode(array('noRecord' => $pageArr)));
        }
    }

    /*     * ********* Function for all get INSTITUE/COURSE List ***************** 
      By: T Ketaki Debadarshini
      On: 01-July-2017
     * updated on 14-Sept-2017 by T Ketaki Debadarshini , qualification changed as matric and non-matric
     * ******************************************************** */

    public function fillInstwiseCourseLists() {

        include('view/langConverter.php');
        include_once( CLASS_PATH . 'clsInstituteCourse.php');
        $objCourse = new clsInstituteCourse;
        $intInstituteid = $_POST['intInstituteId'];
        $intCourseId = $_POST['intCourseId'];

        $result = $objCourse->manageInstituteCourse('VP', 0, 0, $intInstituteid, 0, 0, 0, 0, 0, '');
        $arrList = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {

                    $intCourseType  = $row['intCourseType'];
                    if($intCourseType==12)
                    {
                      $courseType = '(Fresh)';
                      $courseType1 = '(&#2859;&#2893;&#2864;&#2887;&#2870;)';
                    }
                    else if($intCourseType==13)
                    {
                      $courseType  = '(Lateral Entry)';
                      $courseType1 = '(&#2866;&#2878;&#2847;&#2887;&#2864;&#2878;&#2866; &#2831;&#2851;&#2893;&#2847;&#2893;&#2864;&#2879;)';
                    }
                    else
                    {
                      $courseType  ='';
                      $courseType1 = '';
                    }

                $pageArr['strLangClass'] = ($_SESSION['lang'] == 'O') ? 'odia' : '';
                $pageArr['intInstituteId'] = $row['intInstituteId'];
                $pageArr['intInstCourseid'] = $row['intInstCourseid'];
                $pageArr['vchCourseNameE'] = htmlspecialchars_decode($row['vchCourseNameE'], ENT_QUOTES);

                $pageArr['strCoursename'] = ($_SESSION['lang'] == 'O' && $row['vchCourseNameO'] != '') ? $row['vchCourseNameO'].' '.$courseType1 : htmlspecialchars_decode($row['vchCourseNameE'], ENT_QUOTES).' '.$courseType;
                $pageArr['strCourseClass'] = ($_SESSION['lang'] == 'O' && $row['vchCourseNameO'] != '') ? 'odia' : '';

                if ($row["intEligibility"] == 0 || $row["intEligibility"] >= 10) {
                    $pageArr['strQual'] = ($_SESSION['lang'] == 'O' && $row["vchQualificationO"] != '') ? $row["vchQualificationO"] : htmlspecialchars_decode($row["vchQualification"], ENT_QUOTES);
                    $pageArr['strQualClass'] = ($_SESSION['lang'] == 'O' && $row['vchQualificationO'] != '') ? 'odia' : '';
                } else {
                    $pageArr['strQual'] = $strNonmatric;
                    $pageArr['strQualClass'] = $strLangCls;
                }

                // $pageArr['strQual']             = ($_SESSION['lang']=='O' && $row["vchQualificationO"]!='')?$row["vchQualificationO"]:$row["vchQualification"];;
                // $pageArr['strQualClass']        = ($_SESSION['lang']=='O' && $row['vchQualificationO']!='')?'odia':''; 

                $pageArr['intCourseId'] = $row['intCourseId'];
                $durationHour = ($row['decDurationHr'] > 0) ? floatval($row["decDurationHr"]) : '';
                $intDuration = ($row['intDuration'] > 0) ? floatval($row["intDuration"]) : '';  //$row['intDuration'];
                if ($_SESSION['lang'] == 'O') {
                    $pageArr['strDuration'] = (!empty($durationHour)) ? '<span class="' . $strNumLangCls . '">' . $intDuration . '</span> ' . $strMonthInlbl . ' <span class="' . $strNumLangCls . '">' . $durationHour . '</span> ' . $strHourlbl : $intDuration . ' ' . $strMonthlbl;
                } else {
                    $pageArr['strDuration'] = (!empty($durationHour)) ? $durationHour . ' ' . $strHourlbl . ' in ' . $intDuration . ' ' . $strMonthlbl : $intDuration . ' ' . $strMonthlbl;
                }
                $pageArr['intBatchStrength'] = $row['intBatchStrength'];

                $pageArr['strDtlClass'] = $strLangCls;
                $pageArr['strDtlabl'] = $strDurationlbl;
                $pageArr['strCourselbl'] = $strCourselbl;
                $pageArr['strMonthlbl'] = ($row['intDuration'] > 0) ? $strMonthlbl : 'NA';
                $pageArr['strEligLvl'] = $strEligibilitylbl;

                array_push($arrList, $pageArr);
            }

            echo json_encode(array('result' => $arrList));
        } else {
            $pageArr['strNorecordlbl'] = $strNorecordlbl;
            $pageArr['strLangCls'] = $strLangCls;

            echo(json_encode(array('noRecord' => $pageArr)));
        }
    }

    /*     * ********* Function for all get latest facebook feed ***************** 
      By: T Ketaki Debadarshini
      On: 12-Sept-2017
     * ******************************************************** */

    public function getFacebooklatestfeed() {
        include('view/langConverter.php');
        //facebook latest post app id used for csm tool
        include_once(CLASS_PATH . 'fbsrc/facebook.php');
        $objGetfacebook = new Facebook(array(
            'appId' => '349691678798385',
            'secret' => 'e5748d26b8a259d3d43a20f619c3dfba'
        ));

        $postpageId = '359419377823349';
        $facebookArr = $objGetfacebook->api('/' . $postpageId . '/posts?fields=created_time,from,permalink_url,link,message,full_picture,source,story,likes.summary(true),comments.summary(true)&limit=3');
        //echo '<pre>';print_r($facebookArr);  //exit; ,shares,likes.summary(true),comments.summary(true)


        if (count($facebookArr) > 0) {

            $pageArr['fb_post_photo'] = (!empty($facebookArr['data'][0]['full_picture'])) ? $facebookArr['data'][0]['full_picture'] : '';
            $pageArr['fb_page_photo'] = 'http://graph.facebook.com/' . $postpageId . '/picture?type=large&redirect=true';
            $pageArr['fb_post_link'] = $facebookArr['data'][0]['link'];
            $pageArr['fb_post_permalink_url'] = $facebookArr['data'][0]['permalink_url'];
            $pageArr['fb_text'] = (!empty($facebookArr['data'][0]['message'])) ? Model::wardWrap($facebookArr['data'][0]['message'], 120) : Model::wardWrap($facebookArr['data'][0]['story'], 120);
            // $pageArr['fbDate']                 = ($_SESSION['lang']=='O' && !empty($facebookArr['data'][0]['created_time']))?'<span class="odianum">'.date('d',strtotime($facebookArr['data'][0]['created_time'])).'</span> '.$objGal->getOdiaMonths(date('n',strtotime($facebookArr['data'][0]['created_time']))).' <span class="odianum">'.date('Y',strtotime($facebookArr['data'][0]['created_time'])).'</span>':date('jS F Y ',strtotime($facebookArr['data'][0]['created_time'])); 

            $pageArr['fbDate'] = (!empty($facebookArr['data'][0]['created_time'])) ? date('jS F Y ', strtotime($facebookArr['data'][0]['created_time'])) : '';
            $pageArr['fb_page_link'] = 'https://www.facebook.com/pg/' . $postpageId . '/posts/';
            $pageArr['fb_from_name'] = $facebookArr['data'][0]['from']['name'];
            $pageArr['fb_post_likes'] = $facebookArr['data'][0]['likes']['summary']['total_count'];
            $pageArr['fb_post_comments'] = $facebookArr['data'][0]['comments']['summary']['total_count'];
            // echo '<pre>';
            //print_r($pageArr);
            echo json_encode(array('result' => $pageArr));
        } else {
            $pageArr['strNorecordlbl'] = $strNorecordlbl;
            $pageArr['strLangCls'] = $strLangCls;

            echo(json_encode(array('noRecord' => $pageArr)));
        }
    }

    /* Function to fill state details
      By: T Ketaki Debadarshini
      On:  22-Jan-2018
     */

    public function fillIndiaStates() {
        include('view/langConverter.php');
        include_once( CLASS_PATH . 'clsSkillCompetition.php');
        $objCompete = new clsSkillCompetition;


        $result = $objCompete->manageSkillCompetition('ST', 0, 0, 0, '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00');
        $count = $result->num_rows;
        $arrList = array();
        $pageArr = array();
        if ($count > 0) {
            while ($row = $result->fetch_array()) {

                $pageArr['intStateId'] = $row['intStateId'];
                $pageArr['strAlllbl'] = $strSelectlbl;
                $pageArr['strAllcls'] = $strLangCls;

                $pageArr['strStateName'] = ($_SESSION['lang'] == 'O' && $row['vchStateName'] != '') ? $row['vchStateName'] : htmlspecialchars_decode($row['vchStateName'], ENT_QUOTES);
                $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $row['vchDistrictnameO'] != '') ? 'odia' : '';
                array_push($arrList, $pageArr);
            }
            echo(json_encode(array('result' => $arrList)));
        } else {

            $pageArr['strNorecordlbl'] = $strNorecordlbl;
            $pageArr['strLangCls'] = $strLangCls;

            echo(json_encode(array('noRecord' => $pageArr)));
        }
    }

    /* Function to fill District details
      By: T Ketaki Debadarshini
      On:  24-March-2017
     */

    public function fillIndiaDistricts() {
        include('view/langConverter.php');
        include_once( CLASS_PATH . 'clsSkillCompetition.php');
        $objCompete = new clsSkillCompetition;

        $intStateId = (isset($_POST['intStateId']) && $_POST['intStateId'] != '') ? $_POST['intStateId'] : 0;


        $errSateval = $objCompete->isSpclChar($_POST['intStateId']);
        if ($errSateval > 0) {
            echo json_encode(array('error' => 'Please remove special characters'));
            exit();
        } else
            $result = $objCompete->manageSkillCompetition('DST', 0, $intStateId, 0, '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00');

        $count = $result->num_rows;
        $arrList = array();
        $pageArr = array();
        if ($count > 0) {
            while ($row = $result->fetch_array()) {

                $pageArr['intDistId'] = $row['intDistrictId'];

                $pageArr['strAlllbl'] = $strSelectlbl;
                $pageArr['strAllcls'] = $strLangCls;

                $pageArr['strDistName'] = htmlspecialchars_decode($row['vchDistrictName'], ENT_QUOTES);
                $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $row['vchDistrictnameO'] != '') ? 'odia' : '';
                array_push($arrList, $pageArr);
            }
            echo(json_encode(array('result' => $arrList)));
        } else {

            $pageArr['strNorecordlbl'] = $strNorecordlbl;
            $pageArr['strLangCls'] = $strLangCls;

            echo(json_encode(array('noRecord' => $pageArr)));
        }
    }

    /* Function to fill qualification details
      By: T Ketaki Debadarshini
      On:  22-Jan-2018
     */

    public function fillQualification() {
        include('view/langConverter.php');
        include_once( CLASS_PATH . 'clsSkillCompetition.php');
        $objCompete = new clsSkillCompetition;


        $result = $objCompete->manageSkillCompetition('QL', 0, 0, 0, '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00');

        $count = $result->num_rows;
        $arrList = array();
        $pageArr = array();
        if ($count > 0) {
            while ($row = $result->fetch_array()) {

                $pageArr['intQualifyValue'] = $row['intQualifyValue'];

                $pageArr['strAlllbl'] = $strSelectlbl;
                $pageArr['strAllcls'] = $strLangCls;

                $pageArr['strQualification'] = ($_SESSION['lang'] == 'O' && $row['vchQualificationO'] != '') ? $row['vchQualificationO'] : htmlspecialchars_decode($row['vchQualification'], ENT_QUOTES);
                $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $row['vchQualificationO'] != '') ? 'odia' : '';
                array_push($arrList, $pageArr);
            }
            echo(json_encode(array('result' => $arrList)));
        } else {

            $pageArr['strNorecordlbl'] = $strNorecordlbl;
            $pageArr['strLangCls'] = $strLangCls;

            echo(json_encode(array('noRecord' => $pageArr)));
        }
    }

    /*
     * Function to upload files to temporary folder
     * By : T Ketaki Debadarshini
     * On : 19-April-2015
     */

    public function uploadFileToTemp() {
        $error = "";
        $msg = "";
        $url = 'Application/temp/';
        $formatedFileName = $_POST["fName"];
        $hdnVal = $_POST["hdnVal"];
        $filename = $_POST["filename"];
        $fileNewName = $_FILES[$filename]['name'];
        $fileTemp = $_FILES[$filename]['tmp_name'];
        $txtFileSize  = $_FILES[$filename]['size'];
        $extension = pathinfo($fileNewName, PATHINFO_EXTENSION);
        $formattedFileName = $formatedFileName . '_' . date("Ymd_His") . '.' . $extension;
        $fileMimetype = mime_content_type($fileTemp);

       // echo $txtFileSize."===".$extension;exit;

        $errFlag = 0;



        if ($fileMimetype != 'image/gif' && $fileMimetype != 'image/jpeg' && $fileMimetype != 'image/png' && $fileMimetype != 'application/pdf' && $fileMimetype != 'image/jpg' && $fileTemp != '') {
            $errFlag = 1;
            $outMsg = 'Invalid file types. Upload only jpg,jpeg,gif,png,pdf';

        } 
        else if ($txtFileSize > SIZE1MB)
        {
            $errFlag               = 1;
            $outMsg = 'File size cannot more than 1 MB';
        }
        else {
            if ($hdnVal != '' && file_exists($url . $hdnVal)) {
                unlink($url . $hdnVal);
            }
            if (move_uploaded_file($fileTemp, $url . $formattedFileName)) // $this->GetResizeImage($this,$url,650,0,$formattedFileName,$fileTemp)
                $formattedFileName = $formattedFileName;
            else
                $formattedFileName = '';

        }
        echo json_encode(array("status" => $errFlag, "savedFileName" => $formattedFileName, "filePath" => SITE_URL . $url, "msg" => $outMsg));
    }

    /*
     * Function to upload files to temporary folder
     * By : T Ketaki Debadarshini
     * On : 19-April-2015
     */

    public function uploadFileToTempRegd() {
        $error = "";
        $msg = "";
        $url = 'Application/temp/';
        $formatedFileName = $_POST["fName"];
        $hdnVal = $_POST["hdnVal"];
        $filename = $_POST["filename"];
        $fileNewName = $_FILES[$filename]['name'];
        $fileTemp = $_FILES[$filename]['tmp_name'];
        $txtFileSize  = $_FILES[$filename]['size'];
        $extension = pathinfo($fileNewName, PATHINFO_EXTENSION);
        $formattedFileName = $formatedFileName . '_' . date("Ymd_His") . '.' . $extension;
        $fileMimetype = mime_content_type($fileTemp);

       // echo $txtFileSize."===".$extension;exit;

        $errFlag = 0;
        /*if ($fileMimetype != 'image/gif' && $fileMimetype != 'image/jpeg' && $fileMimetype != 'image/png'  && $fileMimetype != 'image/jpg' && $fileTemp != '' && $fileMimetype != 'application/php') {
            $errFlag = 1;
            $outMsg = 'Invalid file types. Upload only jpg,jpeg,gif,png,php';

        }*/ 

        $allowedImg        = array('png' ,'jpg','jpeg');
        $allowedImgMime    = array('image/jpeg','image/jpg', 'image/png');
        if($extension!='' && !in_array($extension,$allowedImg) )
       {
           $errFlag   = 1;
           $outMsg    = "Not a valid file Upload (.jpg,jpeg,png) file only";
       }
       else if($extension!='' && !in_array($fileMimetype,$allowedImgMime)) {
           $errFlag   = 1;
           $outMsg    = "Not a valid file Upload (.jpg,jpeg,png) file only";
       }
        else if ($txtFileSize > SIZE1MB)
        {
            $errFlag               = 1;
            $outMsg = 'File size cannot more than 1 MB';
        }
        else {
            if ($hdnVal != '' && file_exists($url . $hdnVal)) {
                unlink($url . $hdnVal);
            }
            if (move_uploaded_file($fileTemp, $url . $formattedFileName)) // $this->GetResizeImage($this,$url,650,0,$formattedFileName,$fileTemp)
                $formattedFileName = $formattedFileName;
            else
                $formattedFileName = '';

        }
        echo json_encode(array("status" => $errFlag, "savedFileName" => $formattedFileName, "filePath" => SITE_URL . $url, "msg" => $outMsg));
    }

    /* Function to fill venue details
      By: T Ketaki Debadarshini
      On:  22-March-2018
     */

    public function loadVenueDetails() {
        include('view/langConverter.php');
        include_once( CLASS_PATH . 'clsSkillCompetition.php');
        $objCompete = new clsSkillCompetition;


        $strAckNo = (isset($_POST['strAckNo']) && $_POST['strAckNo'] != '') ? $_POST['strAckNo'] : '';


        $errAckno = $objCompete->isSpclChar($_POST['strAckNo']);
        if ($errAckno > 0) {
            echo json_encode(array('error' => 'Please remove special characters'));
            exit();
        } else
            $result = $objCompete->manageSkillCompetition('LV', 0, 0, 0, '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', $strAckNo, 0, 0, 0, '0000-00-00', '0000-00-00');

            $resultPre = $objCompete->manageSkillCompetition('V', 0, 0, 0, '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', $strAckNo, 0, 0, 0, '0000-00-00', '0000-00-00');

        $count = $result->num_rows;
        $arrList = array();
        $pageArr = array();
        if ($count > 0) {
            while ($row = $result->fetch_array()) {
                //intVenueId, vchAckNo, tinType, vchName, vchSkill, dist, tinGender, vchDOB, vchMailID, vchMobileNo, vchLocation, vchInstName, stmExamDate, vchVenueAddress, bitDeletedFlag
                $pageArr['strAckNo'] = $row['vchAckNo'];
                $pageArr['tinType'] = $row['tinType'];
                $pageArr['strAlllbl'] = $strSelectlbl;
                $pageArr['strAllcls'] = $strLangCls;

                $pageArr['strName'] = ucwords(strtolower(htmlspecialchars_decode($row['vchName'], ENT_QUOTES)));
                $pageArr['strSkill'] = htmlspecialchars_decode($row['vchSkill'], ENT_QUOTES);

                $pageArr['strMailId'] = htmlspecialchars_decode($row['vchMailID'], ENT_QUOTES);
                $pageArr['strMobileNo'] = htmlspecialchars_decode($row['vchMobileNo'], ENT_QUOTES);

                $pageArr['strVenueAddress'] = htmlspecialchars_decode($row['vchVenueAddress'], ENT_QUOTES);
                $pageArr['strExamdate'] = date('dS M Y', strtotime($row['stmExamDate']));
                $pageArr['strExamtime'] = date('H:i A', strtotime($row['stmExamTime']));

                array_push($arrList, $pageArr);

            }
            echo(json_encode(array('result' => $arrList)));
        } else if($count = $resultPre->num_rows>0) {

            $pageArr['strNorecordlbl'] = $exmination;
            $pageArr['strLangCls'] = $strLangCls;

            echo(json_encode(array('noRecord' => $pageArr)));
        }
        else {

            $pageArr['strNorecordlbl'] = $strNorecordlbl;
            $pageArr['strLangCls'] = $strLangCls;

            echo(json_encode(array('noRecord' => $pageArr)));
        }
    }



 


    public function translatePage($data) {
        //$req = json_decode($request,true);
        //print_r($_POST['words')[0]);

        $finalTranslatedstring = array();

        $arrVal['l_from'] = $data['l_from'];
        $arrVal['l_to'] = $data['l_to'];
        $arrVal['title'] = $data['title'];
        $arrVal['request_url'] = $data['request_url'];
        $arrVal['bot'] = 0;
        $arrVal['from_words'] = array();
        for ($i = 0; $i < count($data['words']); $i++) {
            array_push($arrVal['from_words'], str_replace('~::~', ' ', $data['words'][$i]['w']));
        }
        // $provideData = json_encode(array("method" => 'getTranslaionData', 'fromArr' => $arrVal['from_words'], 'url' => $arrVal['request_url'], 'lang' => $arrVal['l_to']));
        $getNewArr = $this->getTranslaionData($arrVal['from_words'], $arrVal['request_url'], $arrVal['l_to']);


        $arrVal['to_words'] = $getNewArr;
        //print_r($arrVal['to_words']);exit;
        echo json_encode($arrVal);
    }

    #########function to get all organization from new tables by :: samir kumar muduli on :: 23-08-2018##############################

    public function getTranslaionData($fromArr, $url, $lang) {

        $query = "CALL USP_TRANSLATE('V',0,'" . $url . "','','','','','','','','',@out)";

        $result = Model::executeQry($query);
        if ($result->num_rows > 0) {
            $arrRet = array();
            while ($res = $result->fetch_array()) {
                $needle = htmlspecialchars_decode($res['vchEnglish'], ENT_QUOTES);
                //$replacement = ($lang == 'hi')?$res['vchHindi']:(($lang == 'od')?$res['vchOdia']:$res['vchEnglish']);
                if ($lang == 'od') {
                    $replacement = ($res['vchOdia'] != '') ? $res['vchOdia'] : htmlspecialchars_decode($res['vchEnglish'], ENT_QUOTES);
                }
                for ($i = 0; $i < count($fromArr); $i++) {
                    if ($fromArr[$i] == $needle) {
                        $fromArr[$i] = $replacement;
                    }
                }
                //array_push($arrRet, $res['vchHindi']);
                //print_r($res);
                // $var['eng'] = $res['vchEnglish'];
                // $var['hin'] = $res['vchHindi'];
                // $var['keyVal'] = array_search($res['vchEnglish'], $fromArr);
                // array_push($arrRet, $var);
            }
            //print_r(array_reverse($arrRet));
            // $newArr = array_reverse($arrRet);
            // $newFinalArr = array();
            // for($j = 0; $j<count($newArr);$j++){
            //     array_push($newFinalArr, $newArr[$j]['hin']);
            // }


            return $fromArr;
        } else {
            $status = 400;
            echo json_encode(array('status' => $status, 'result' => [], 'msg' => 'No Record Found'));
        }
    }

    /*
      Function to get Employer Speak Data
      By: Ravi Teja
      On: 29-Dec-2018
     */

    public function getEmployerSpeak() {
        include('view/langConverter.php');
        include_once( CLASS_PATH . 'clsMsgBoard.php');
        $objMsg = new clsMsgBoard;

        $result = $objMsg->manageMsgboard('HD', 0, 0, '', '', '', '', '', '', '0', '0000-00-00', 0, 0, '', '');
        $pageArr = array();
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);

            $pageArr['intemployerId'] = $row["INT_MSG_ID"];
            $pageArr['strEmpSpeakLevel'] = $strTestimoniallable;
            $pageArr['strName'] = htmlspecialchars_decode($row["VCH_NAME"], ENT_QUOTES);
            $strNameO = $row["VCH_NAME_O"];

            $pageArr['strImageFile'] = $row['VCH_IMAGE'];

            $pageArr['strName'] = ($_SESSION['lang'] == 'O' && $strNameO != '') ? $strNameO : htmlspecialchars_decode($row['VCH_NAME'], ENT_QUOTES);
            $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $strNameO != '') ? 'odia' : '';


            $strDesignation = ($_SESSION['lang'] == 'O' && $row['VCH_DESIGNATION_O'] != '') ? strip_tags(urldecode($row['VCH_DESIGNATION_O'])) : strip_tags(htmlspecialchars_decode($row['VCH_DESIGNATION'], ENT_QUOTES));
            $pageArr['strDesigClass'] = ($_SESSION['lang'] == 'O' && $row['VCH_DESIGNATION_O'] != '') ? 'odia' : '';

            $strOrganization = ($_SESSION['lang'] == 'O' && $row['VCH_ORG_O'] != '') ? strip_tags(urldecode($row['VCH_ORG_O'])) : strip_tags(htmlspecialchars_decode($row['VCH_ORG'], ENT_QUOTES));
            $pageArr['strOrgClass'] = ($_SESSION['lang'] == 'O' && $row['VCH_DESIGNATION_O'] != '') ? 'odia' : '';

            $pageArr['strDesig'] = ($strOrganization != '' && $strDesignation != '') ? $strDesignation . ', ' . $strOrganization : $strOrganization;
            $descCount = ($_SESSION['lang'] == 'O' && $row['VCH_DESCRIPTION_O'] != '') ? 130 :100;
            
                                                                                                   
            $pageArr['strDesc'] = ($_SESSION['lang'] == 'O' && $row['VCH_DESCRIPTION_O'] != '') ?  $objMsg->wardWrap(strip_tags(urldecode($row['VCH_DESCRIPTION_O'])), $descCount): $objMsg->wardWrap(strip_tags(urldecode($row['VCH_DESCRIPTION'])), $descCount);
            $pageArr['strDescClass'] = ($_SESSION['lang'] == 'O' && $row['VCH_DESCRIPTION_O'] != '') ? 'odia' : '';
            $pageArr['readMoreLblCls'] = $odiaClass;
            $pageArr['readMoreLbl'] = $strReadMorelbl;
        }
//       / print_r($pageArr);
        echo json_encode(array('empRes' => $pageArr));
    }

    /*
      Function to get Success story Data
      By: Ravi Teja
      On: 29-Dec-2018
     */

    public function getSuccessStoryData() {
        include('view/langConverter.php');
        include_once( CLASS_PATH . 'clsStory.php');
        $objStory = new clsStory;
        /* intStoryId,vchNameE,vchNameO,vchImageFile,vchSnippet,vchSnippetO,vchDescriptionE,vchDescriptionO,vchPlace,vchPlaceO,intInstituteId,vchAlias,vchDesignation,vchDesignationO,vchEmployer,vchEmployerO,tinPublishStatus,tinArcStatus,intCreatedBy,intSlno */

        $result = $objStory->manageStory('HD', 0, '', '', '0', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, 0, 0);
        // print_r($result);exit;
        $pageArr = array();
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);

            $pageArr['intStoryId'] = $row['intStoryId'];

            $pageArr['strAlias'] = $row['vchAlias'];

            $pageArr['strImageFile'] = $row['vchImageFile'];
//                        if($row['vchImageFile'] != ''){
//                            if(!file_exists(APP_PATH."uploadDocuments/home_resize_img/" . $row['vchImageFile'])) {
//                                $objStory->GetResizeImage($objStory,APP_PATH.'uploadDocuments/home_resize_img/',305,0,$row['vchImageFile'],APP_PATH."uploadDocuments/successStory/".$row['vchImageFile']);
//                            }
//                        }

            $pageArr['strName'] = ($_SESSION['lang'] == 'O' && $row['vchNameO'] != '') ? $row['vchNameO'] : htmlspecialchars_decode($row['vchNameE'], ENT_QUOTES);
            $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $row['vchNameO'] != '') ? 'odia' : '';

            $pageArr['strDesc'] = ($_SESSION['lang'] == 'O' && $row['vchDescriptionO'] != '') ? urldecode($row['vchDescriptionO']) : htmlspecialchars_decode($row['vchDescriptionE'], ENT_QUOTES);
            $counter = ($_SESSION['lang'] == 'O') ? 310 : 120;

            if ($pageArr['strDesc'] != '') {
                $string = strip_tags($pageArr['strDesc']);
                if (strlen($string) > $counter) {
                    // truncate string
                    $stringCut = substr($string, 0, $counter);
                    // make sure it ends in a word so assassinate doesn't become ass...
                    $string = substr($stringCut, 0, strrpos($stringCut, ' '));
                }
                $pageArr['strDesc'] = $string . "...";
            } else
                $pageArr['strDesc'] = $pageArr['strDesc'];
            $pageArr['strDesClass'] = ($_SESSION['lang'] == 'O' && $row['vchDescriptionO'] != '') ? 'odia' : '';
            $pageArr['strDesigClass'] = ($_SESSION['lang'] == 'O' && $row['vchDesignationO'] != '') ? 'odia' : '';
            $pageArr['strDesig'] = ($_SESSION['lang'] == 'O' && $row['vchDesignationO'] != '') ? $row['vchDesignationO'] : htmlspecialchars_decode($row['vchDesignation'], ENT_QUOTES);

            $pageArr['strHeading'] = $strSuccessStorylbl;
            $pageArr['strHeadClass'] = ($_SESSION['lang'] == 'O') ? 'odia' : '';
            $pageArr['strPageredir'] = ($_POST['navPage'] != '') ? $_POST['navPage'] : 'my-story';
            $pageArr['langCls'] = $odiaClass;
            $pageArr['readMoreLbl'] = $strReadMorelbl;
        }
//       / print_r($pageArr);
        echo json_encode(array('successStory' => $pageArr));
    }

    /*
      Function to get Gallery Data
      By: Ravi Teja
      On: 29-Dec-2018
     */

    public function getHomeGallery() {
        include('view/langConverter.php');
        include_once( CLASS_PATH . 'clsGallery.php');
        //echo CLASS_PATH.'clsGalleryCategory.php';exit;
        $objGalleryCat = new clsGalleryCategory;
        /*   $action, $catId,$intcatType, $category, $categoryO, $description,$descriptionO,$pubStatus ,$createdBy */

        $result = $objGalleryCat->manageGalleryCategory('HD', 0, '0', '', '', '', '', '0', '0');
        // print_r($result);exit;
        $pageArr = array();
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);

            $pageArr['intCategoryId'] = $row["INT_CATEGORY_ID"];
            $strNameO = $row["VCH_CATEGORY_NAME_O"];
            $pageArr['txtName'] = ($_SESSION['lang'] == 'O' && $strNameO != '') ? $strNameO : htmlspecialchars_decode($row['VCH_CATEGORY_NAME'], ENT_QUOTES);
            $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $strNameO != '') ? 'odia' : '';
            $pageArr['strImageFile'] = APP_URL . "uploadDocuments/gallery/" . $row['VCH_LARGE_IMAGE'];
            $descCount = ($_SESSION['lang'] == 'O' && $row['VCH_DESCRIPTION_O'] != '') ? 150 : 140;
              $pageArr['strDesc'] = ($_SESSION['lang'] == 'O' && $row['VCH_DESCRIPTION_O'] != '') ?  $objGalleryCat->wardWrap(strip_tags(urldecode($row['VCH_DESCRIPTION_O'])), $descCount): $objGalleryCat->wardWrap(strip_tags(htmlspecialchars_decode($row['VCH_DESCRIPTION']),ENT_QUOTES), $descCount);
          
            $pageArr['strDescClass'] = ($_SESSION['lang'] == 'O' && $row['VCH_DESCRIPTION_O'] != '') ? 'odia' : '';
            $pageArr['strHeading'] = $strPhotoEssaylbl;
            $pageArr['strHeadClass'] = ($_SESSION['lang'] == 'O') ? 'odia' : '';
            $pageArr['strViewAlbumlbl'] =$strViewalbumlbl;
        }
//       / print_r($pageArr);
        echo json_encode(array('galleryCat' => $pageArr));
    }

    /*
      Function to get InFcous Data
      By: Ashis kumar Patra
      On: 31-Dec-2018
     */

    public function getHomeFocusDetails() {
        include_once( CLASS_PATH . 'clsInfocus.php');
        $objInfocus = new clsInfocus;

        $intFocusId = is_numeric($_POST['focusId']) ? urlencode($_POST['focusId']) : 0;
        $arrConditions = array(
            'Id' => $intFocusId);
        $inFocusresult = $objInfocus->manageInfocus('R', $arrConditions);

        // print_r($result);exit;
        $pageArr = array();
        if (mysqli_num_rows($inFocusresult) > 0) {
            $focusRow = mysqli_fetch_array($inFocusresult);

//           / print_r($focusRow);
            $pageArr['intFocusId'] = $focusRow["intId"];
            $strFocTitleE = ($focusRow['vchTitle'] != '') ? htmlspecialchars_decode($focusRow['vchTitle'], ENT_QUOTES) : '';
            $pageArr['txtTitle'] = ($_SESSION['lang'] == 'O' && $focusRow['vchTitleO'] != '') ? $focusRow['vchTitleO'] : $strFocTitleE;
            $pageArr['txtTitleCls'] = ($_SESSION['lang'] == 'O' && $focusRow['vchTitleO'] != '') ? 'odia' : '';

            $strFocNameE = ($focusRow['vchName'] != '') ? htmlspecialchars_decode($focusRow['vchName'], ENT_QUOTES) : '';

            $pageArr['txtName'] = ($_SESSION['lang'] == 'O' && $focusRow['vchNameO'] != '') ? $focusRow['vchNameO'] : $strFocNameE;
            $pageArr['txtNamecls'] = ($_SESSION['lang'] == 'O' && $focusRow['vchNameO'] != '') ? 'odia' : '';

            $pageArr['strImageFile'] = ($focusRow['vchImage'] != '') ? APP_URL . 'uploadDocuments/Infocus/' . $focusRow['vchImage'] : '';
            $pageArr['strDesccls'] = ($_SESSION['lang'] == 'O' && $focusRow['vchDescriptionO'] != '') ? 'odia' : '';
            $strFocDescE = ($focusRow['vchDescription'] != '') ? htmlspecialchars_decode($focusRow['vchDescription'], ENT_QUOTES) : '';

            $pageArr['strDesc'] = ($_SESSION['lang'] == 'O' && $focusRow['vchDescriptionO'] != '') ? $focusRow['vchDescriptionO'] : $strFocDescE;
        }

        echo json_encode(array('FocusDetail' => $pageArr));
    }
    
    
    /* Function to fill District details
      By: T Ketaki Debadarshini
      On:  24-March-2017
     */

    public function fillBlocks() {
        include('view/langConverter.php');
        include_once( CLASS_PATH . 'clsSkillCompetition.php');
        $objCompete = new clsSkillCompetition;

        $intDisId   = (isset($_POST['intDistId']) && $_POST['intDistId'] != '') ? $_POST['intDistId'] : 0;

        $errSateval = $objCompete->isSpclChar($intDisId);
        if ($errSateval > 0) {
            echo json_encode(array('error' => 'Please remove special characters'));
            exit();
        } else
            $result = $objCompete->manageSkillCompetition('GDB', 0, $intDisId, 0, '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00');

        $count = $result->num_rows;
        $arrList = array();
        $pageArr = array();
        if ($count > 0) {
            while ($row = $result->fetch_array()) {

                $pageArr['intBlockId'] = $row['intBlockId'];
                $pageArr['strAlllbl'] = $strSelectlbl;
                $pageArr['strAllcls'] = $strLangCls;
                $pageArr['strBlockName'] = htmlspecialchars_decode(ucfirst(strtolower($row['vchBlockName'])), ENT_QUOTES);
                $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $row['vchBlocknameO'] != '') ? 'odia' : '';
                array_push($arrList, $pageArr);
            }
            echo(json_encode(array('result' => $arrList)));
        } else {

            $pageArr['strNorecordlbl'] = $strNorecordlbl;
            $pageArr['strLangCls'] = $strLangCls;

            echo(json_encode(array('noRecord' => $pageArr)));
        }
    }
    
    
    
   /* Function to show Institute Data for skill compeitition 
      By: Ashis kumar Patra
      On: 4-March-2019
     */

    public function fillSkillInstitute() {
        include('view/langConverter.php');
        include_once(CLASS_PATH . 'clsSkillCompetition.php');
        $objCompete = new clsSkillCompetition;
        $intSelval  = (isset($_POST['selVal']))?$_POST['selVal']:0;
        $intSelval  = is_numeric($intSelval)?$intSelval:0;
        
        $intQualId  = isset($_POST['qualId'])?$_POST['qualId']:'0';
        $ddType     = isset($_POST['type'])?$_POST['type']:'';
        $strCoursetxt = ($_POST['instituteName'] != '') ? htmlspecialchars(trim($_POST['instituteName']), ENT_QUOTES, 'UTF-8') : '';
        $errCoursetxt = $objCompete->isSpclChar($_POST['instituteName']);
        if ($errCoursetxt > 0) {
            echo json_encode(array('error' => 'Please remove special characters'));
        } else {
             
        $result = $objCompete->manageSkillCompetition('SKD', $intQualId, 0, 0, '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, $strCoursetxt, 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00');
        $count = $result->num_rows;
        $arrList = array();
        $pageArr = array();
            $opt = '<option value="0">--Select Institute--</option>';
           
            if ($count > 0) {
                while ($row = mysqli_fetch_array($result)) {
                   
                   // print_r($row);
                    $intInstituteId = $row["intInstituteId"];
                    $strInstituteNameE = utf8_encode(htmlspecialchars_decode($row["vchInstituteName"], ENT_QUOTES));
                    $pageArr['intInsId'] = $intInstituteId;
                    $pageArr['strInsName'] = $strInstituteNameE;
                    $pageArr['strClass'] = ($_SESSION['lang'] == 'O') ? 'odia' : '';
                    array_push($arrList, $pageArr);

                    $select = ($intInstituteId == $intSelval) ? 'selected="selected"' : '';
                    $opt .= '<option value="' . $intInstituteId . '" title="' . $strInstituteNameE . '" ' . $select;
                    $opt .= '>' . $strInstituteNameE . '</option>';
                }
            }
               
            if ($strCoursetxt == '' && $ddType!='cssSelect'){
                 echo json_encode(array('institute' => $opt));}
            else{
                echo json_encode(array('result' => $arrList));
              
            }
        }
    }
    
    public function utf8Code($d)
    { 
        if (is_array($d) || is_object($d))
            foreach ($d as &$v) $v = utf8Code($v);
        else
            return utf8_encode($d);

        return $d;
    }
    
    /* Function to fill Skill Competition related Qualifications
      By: Ashis kumar Patra
      On:  13-March-2019
     */

    public function fillSkillQualification() {
        include('view/langConverter.php');
        include_once( CLASS_PATH . 'clsSkillCompetition.php');
        $objCompete = new clsSkillCompetition;


        $result = $objCompete->manageSkillCompetition('SKQ', 0, 0, 0, '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, '0000-00-00', '0000-00-00');

        $count = $result->num_rows;
        $arrList = array();
        $pageArr = array();
        $pageArr1 = array();
        if ($count > 0) {
            while ($row = $result->fetch_array()) {

                $pageArr['intQualifyValue'] = $row['intQualifyValue'];

                $pageArr['strAlllbl'] = $strSelectlbl;
                $pageArr['strAllcls'] = $strLangCls;

                $pageArr['strQualification'] = ($_SESSION['lang'] == 'O' && $row['vchQualificationO'] != '') ? $row['vchQualificationO'] : htmlspecialchars_decode($row['vchQualification'], ENT_QUOTES);
                $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $row['vchQualificationO'] != '') ? 'odia' : '';
                array_push($arrList, $pageArr);
            }
                $pageArr1['intQualifyValue'] ='101';
                $pageArr1['strAlllbl'] = $strSelectlbl;
                $pageArr1['strAllcls'] = $strLangCls;
                $pageArr1['strQualification'] = $strOtherlbl ;
                $pageArr1['strClass'] = $strLangCls;
                array_push($arrList, $pageArr1);
            
            echo(json_encode(array('result' => $arrList)));
        } else {

            $pageArr['strNorecordlbl'] = $strNorecordlbl;
            $pageArr['strLangCls'] = $strLangCls;

            echo(json_encode(array('noRecord' => $pageArr)));
        }
    }
    
    /*Function to show all popular pages
      By: Ashis kumar Patra
      On: 20-March-2019
     */

    public function loadPopularPages() {

        include_once( CLASS_PATH . 'clsLinks.php');
        $objPages = new clsPages;

        $totalPageRes = $objPages->managePage('PC',0,'','','',0,'',0,'','','',0,0,0,0,'0000-00-00','0000-00-00','','','','','','','0','',0,'','');
        $intTotalRec   = mysqli_num_rows($totalPageRes);
         $html='<ul class="list-unstyled"> ';
         $intCount=0;
        if (mysqli_num_rows($totalPageRes) > 0) {
            while ($row = mysqli_fetch_array($totalPageRes)) {

                 $intCount++;
                 $pageTitle        = ($_SESSION['lang'] == 'O' && $row['vchTitleH'] != '') ? $row['vchTitleH'] : htmlspecialchars_decode($row['vchTitle'], ENT_QUOTES);
                 $description      = ($_SESSION['lang'] == 'O' && $row['vchSnippetO'] != '') ? $row['vchSnippetO'] : htmlspecialchars_decode($row['vchSnippet'], ENT_QUOTES);
                 $intSearchId      = $row['intPageId'];
                 $intLinkType      = $row['intLinkType'];
                 $intTemplateType  = $row['intTemplateType'];
                 $pluginName       = $row['vchPluginName'];
                 $pageRedirectUrl     = ($intLinkType==2)?$row['vchUrl']:'javascript:void(0);';
                 $href=($intLinkType==2)?$pageRedirectUrl:SITE_URL.$pluginName;
                  $intPL            = $row['PL_ID'];
                  $srchUrl          = $row['URL'];
                  $intWindowType     = $row['intWindowStatus'];
                  $target=($intWindowType==2)?'target="_blank"':'';
                  $description=($description!='')?'<span>('.$description.')</span>':'';
                  $html.='<li class="media">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1"><strong>'.$intCount.' .</strong> <a href="'.$href.'" '.$target.'>'.ucwords($pageTitle).''.$description.'</a></h5>
                                            </div>
                                        </li>';
                
            }
            $html.=' </ul>';
        }

        echo json_encode(array('PagesHTML' => $html));
    }

    /*Function to call API from NIC  & SAMS to  record Update for Institutes
      By: Ashis kumar Patra
      On: 20-March-2019
     */

     public function updateAPIData($type){
        include_once(CLASS_PATH . 'clsInstitute.php');
        $objInstitute = new clsInstitute;
        include_once(CLASS_PATH.'clsCourse.php');
        $courseObj = new clsCourse();
        switch($type){
            
            case 'NIC':
                $apiURL='https://empmissionodisha.gov.in/Mission/rs/api';
                $method1='getInstituteInformation';
                $method2='getDistrictBlockData';
            //  $method3='getQualificationData';
                $method4='getSectorCourseData';
                // try{
                // for($i=1;$i<4;$i++){
                
                     $this->callAPI( $apiURL,${'method'.$i});
                //      echo "<br/>"."====================".${'method'.$i}."======================";
                // }

                /*====================For District Data Update===================*/ 

                //   try{
                //     $districtResult=file_get_contents(SITE_PATH.'nic_response/distBlockData.json');
                //     $distResult=json_decode($districtResult,true);
                //     $distResult=(!empty($distResult['district_info']))?$distResult['district_info']:array();
                //     if(count($distResult)>0){
                //         foreach($distResult as $row){
                           
                //             $district_id=$row['district_id'];
                //             $district_name=ucwords(strtolower($row['district_name']));
                //             echo $row['district_id']."====". $district_name.'<br/>';
                //         }
                //     }


                //   }catch(Exception $e){
                //     echo $e->getMessage();
                //   }  

                // exit;
                /*====================For District Data Update===================*/ 


                
               /*====================For Institute Data Update===================*/ 
               try{
                $instituteResult=file_get_contents(SITE_PATH.'nic_response/instituteInfo.json');
                // echo "<pre>"; print_r(json_decode($instituteResult,true));
                $instituteResult=json_decode($instituteResult,true);
                $instituteData=(!empty($instituteResult['Institute_info']))?$instituteResult['Institute_info']:array();
             
               if(count($instituteData)>0){
                $query1='';
                $query2='';
                    foreach($instituteData as $row){
                        $distId            = $row['district_id'];
                        $blockId           = $row['block_id'];    
                        $strInstituteName  = htmlspecialchars(addslashes($row['institute_name']), ENT_QUOTES,'UTF-8');
                        $strInstituteName  = ($row['institute_id']=='OD016C004')?'TOUCH_IN_ASSOCIATES':$strInstituteName;
                        $strInstituteCode  = htmlspecialchars(trim($row['institute_id']),ENT_QUOTES);
                        $insType           = 2;
                        $strEmailId        = $row['email_id'];
                        $contactNo         = $row['mobile_no'];
                        $strAddress        = htmlspecialchars(addslashes($row['address'],ENT_QUOTES));
                        $courses           = (count($row['courses_providing'])>0)?explode(',',$row['courses_providing']['courseids']):array();
                        $query1.='('.$distId.',"'. $strInstituteCode.'","'.$strInstituteName.'","'.$strInstituteNameO.'",'.$insType.',"0","'.$strEmailId.'","'. $contactNo.'","","","'.$strAddress.'","","","","","","'.date('Y-m-d H:i:s').'","1","","'. $contactNo.'",3,"","0.0","0.0",0),';
                    //(P_DISTRICT_ID,P_INSTITUTE_NAME,P_INSTITUTE_NAME_O,P_INSTITUTE_TYPE,P_EST_YEAR,P_EMAIL,P_PHONE_NO,P_WEBSITE,P_IMAGE,P_ADDRESS,P_ADDRESS_O,P_DETAILS,P_DETAILS_O,P_PRINCIPLE,P_PRINCIPLE_O,NOW(),P_CREATED_BY,P_INSTITUTE_ALIAS,P_MOBILE_NO,P_PIA_STATUS,P_PIN_CODE,P_LAT,P_LONG,P_PARENT_ID);
                      
                      
                       foreach($courses as $courseVal){
                            $query2.='("'.$strInstituteCode.'","0","'.$courseVal.'"),';
                       }
                       
                      
                    }
                    $query1 = rtrim($query1,',');
                    $query2 = rtrim($query2,',');
                    // echo   $query2."<br/>";exit;
                $result = $objInstitute->manageInstitute('ULI', 0, 0,'', '', 0, 0, '', '', '', '', '', '', $query2, '', '', '', 0, 0, 0, 0, '', '', 0, '', 0, 0, 0,$query1);
                $count = $result->num_rows; 
                $insertResult= $result->fetch_array();
                if($insertResult['@P_STATUS']>0){
                    echo "===========Institute Data inserted==========<br/>";
                 }else{
                    echo "===========Some error occured inserting Institute Data=========="; 
                 }
               }
            }catch(Exception $e){
                echo $e->getMessage();  
            }
               
            /*====================Institute Data Update End===================*/ 

            /*====================For Sector_COurse Data Update===================*/ 
             include_once( CLASS_PATH . 'clsSector.php');
             try{
             $objSector = new clsSector;
             $sectorResult=file_get_contents(SITE_PATH.'nic_response/courseData.json');
            // echo "<pre>"; print_r(json_decode( $sectorResult,true));
             $sectorResult=json_decode($sectorResult,true);
            //$sectorResult=array();
             $sectorData=(!empty($sectorResult['sector_info']))?$sectorResult['sector_info']:array();
             //echo "<pre>";
             if(count($sectorData)>0){
                $query1='';
                $query2='';
                $courseAry=array();
                $uniqueCourse=array();
                    foreach($sectorData as $row){
                       // print_r($row);
                        $sectorId            = $row['sector_id'];
                        $strSectorName       = ucwords(htmlspecialchars(strtolower($row['sector_name']),ENT_QUOTES));  
                        $query1.='("'.$strSectorName.'","'.$sectorId .'",1),'; 

                        $courses=(count($row['courses'])>0)?$row['courses']:array();
                        foreach($courses as $courseVal){
                           
                            if(!in_array($courseVal['course_id'],$courseAry)){
                                array_push($uniqueCourse,$courseVal['course_id']);
                            $duration=(empty($courseVal['duration_hour']) || $courseVal['duration_hour']=='' )?0.0:$courseVal['duration_hour'];
                            $qualificationId=(empty($courseVal['qualification_id']))?NULL:$courseVal['qualification_id'];
                            $courseName=htmlentities(trim($courseVal['course_name']));
                            $query2.='("'.$sectorId.'","'.$courseVal['course_id'].'","'.$courseName.'","'.$qualificationId.'",'.$duration.'),';
                            }
                            array_push($courseAry,$courseVal['course_id']);
                        }
                        
                    }
                    $query2 = rtrim($query2,',');
                    $query1 = rtrim($query1,','); 
                $sectorResult =  $objSector->manageSector('ASD',0,'','' ,'','',$query1, $query2 ,0,1);
                $count        =  $sectorResult->num_rows; 
                $sectorResult =  $sectorResult->fetch_array();
                if($sectorResult['@P_STATUS']>0){
                    echo "===========Sector Data inserted==========";
                 }else{
                    echo "===========Some error occured inserting Sector Data=========="; 
                 }

                }
             }catch(Exception $e){
                echo $e->getMessage();
             }
               
             /*====================For Sector_COurse Data Update===================*/ 

             /*====================For Institute COurse data Update===================*/ 
               try{
                $action='UID';
                $resultUpdateCourse = $objInstitute->manageInstitute('UID', 0, 0,'', '', 0, 0, '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', 0, '', 0, 0, 0,'');
                if($resultUpdateCourse){
                    echo "============Institute Courses Updated============";
                }

               }catch(Exception $e){
                   echo $e->getMessage();
               }

             /*====================Institute COurse Data Update End===================*/
            break;
            case 'SAMS':
            $apiURL = SAMS_URL;
            $method1 = 'getSectorCourseData';
            $method2 = 'getInstituteInfo';
            $resArr  = array();
            $errFlag=0;
            /*====================For SAMS Course Data Update ===================*/
            $result    =  $this->callAPI($apiURL,$method1);
            $response_status=$result['status'];
            $resultCOurses=isset($result['courses'])?$result['courses']:array();
            //$result=file_get_contents(SITE_PATH.'sams_responce/courseTagged.json');
            // echo "<pre>" ; print_r($result);//exit;
            //$sectorResult=json_decode($result,true);
           
            if((count($resultCOurses)>0)  &&  $response_status=='200' ){
                $queryCourse='';
                $ctr =0;
                foreach($resultCOurses as $row){
                       
                    /*if($ctr <10 )
                    {*/
                        $courseId            = $row['course_id'];
                        $strCourseName       = ucwords(htmlspecialchars(strtolower($row['course_name']),ENT_QUOTES));  
                        $courseDuration      = (!empty($row['duration_month']))?$row['duration_month']:'';
                        $instType            = (!empty($row['instituteType']))?$row['instituteType']:'';
                        $qualification       = (!empty($row['qualification']))?htmlspecialchars(trim($row['qualification']),ENT_QUOTES):'';

                      if($qualification=='Under Matric')
                        {
                            $qualificationId = '9';
                        }
                        else if ($qualification=='Matric')
                        {
                            $qualificationId = '10';
                        }
                        else
                        {
                            $qualificationId = '0';
                        }
                        
                        $queryCourse.='("'.$courseId.'","'.$strCourseName .'","'.$qualificationId.'",  "'.$qualification .'","'.$courseDuration .'","'.$instType .'",111,0.0),'; 
                       
                  /* }   
                         $ctr++; */                  
                    }

                $queryCourse = rtrim($queryCourse,',');

                $courseResult =  $courseObj->manageCourse('SAM',0,0,'','','',0,0,'','',0,0,0,0,$queryCourse,0,0,'');
                $count        =  $courseResult->num_rows; 
                $courseResult =  $courseResult->fetch_array();
                if($courseResult['@P_STATUS_ERR']!=4){
                    $msg='Course Data Updated ON:-'.date('Y-m-d h:i:s');
                    $errFlag=1;
                    //echo "===========Course Data inserted==========";
                 }else{
                    $msg='===========Some error occured inserting Course Data==========ON:-'.date('Y-m-d h:i:s'); 
                 }
                 $resArr[1]['msg'] =$msg;
                 $resArr[1]['vchUserName'] = 'SAMS CRON';
                 $resArr[1]['count'] = count($resultCOurses);
                 $resArr[1]['jobName'] = 'SAMS Course Data Update';
                $encData = json_encode(array('result' => $resArr));
                 

        }

         /*==================== SAMS Course Data Update End===================*/



          /*====================For SAMS Institute Data Update===================*/ 
               try{
                $instituteResult    =  $this->callAPI($apiURL,$method2);
                $status   = $instituteResult['status'];
                $instituteData=(!empty($instituteResult['lstInstituteInfo']))?$instituteResult['lstInstituteInfo']:array();
                //echo "<pre>" ; print_r($instituteResult);exit;
                 $errFlag =0;   
               if(count($instituteData)>0 && $status=='200' ){
                $query1='';
                $query2='';
                $ctr =0;
                //throw new Exception("Value must be 1 or below");
                    foreach($instituteData as $row){
                        /*if($ctr <20 )
                    {*/
                       // echo "<pre>" ; print_r($row);exit;
                        $distId            = $row['district_id'];
                        $blockId           = $row['block_id'];
                        $estYear           = $row['established_year'];
                        $estType           = (!empty($row['establishment_type']))?$row['establishment_type']:'';    
                        $strInstituteName  = htmlspecialchars(addslashes($row['institute_name']), ENT_QUOTES,'UTF-8');
                        //$strInstituteName  = ($row['institute_id']=='OD016C004')?'TOUCH_IN_ASSOCIATES':$strInstituteName;
                        $strInstituteCode  = htmlspecialchars(trim($row['institute_id']),ENT_QUOTES);
                        $type           = 1;
                        $insType           = htmlspecialchars(trim($row['institute_type']),ENT_QUOTES);
                        $strPrincipalName  = (!empty($row['principal_name']))?htmlspecialchars(addslashes($row['principal_name']), ENT_QUOTES,'UTF-8'):'';
                        $strWebsite        = (!empty($row['website']))?htmlspecialchars(addslashes($row['website']), ENT_QUOTES,'UTF-8'):'';
                        //echo $insType."<br/>";
                        if($insType=='ITI')
                        {
                            $typeId  ='1';
                        }
                        else if($insType=='Polytechnic')
                        {
                            $typeId  ='2';
                        }
                        $strInstituteNameO = '';
                        $strEmailId        = (!empty($row['email_id']))?$row['email_id']:'';
                        $phoneNumber         = (!empty($row['mobile_no']))?$row['mobile_no']:''; 
                        $strAddress        = (!empty(htmlspecialchars(addslashes($row['address']),ENT_QUOTES)))?htmlspecialchars(addslashes($row['address']),ENT_QUOTES):'';
                        $contactNo       = (!empty($row['phone_no']))?$row['phone_no']:'';
                        $pinCode           = (!empty($row['pincode']))?$row['pincode']:''; 
                        $latitude          = (!empty($row['latitude']))?$row['latitude']:'0.0';
                        $longitude         = (!empty($row['longitude']))?$row['longitude']:'0.0';
                        //$courses           = (count($instituteResult['lstCoursesProviding'])>0)?explode(',',$instituteResult['lstCoursesProviding']['courseId']):array();
                        
                       

                        $query1.='('.$distId.',"'. $strInstituteCode.'","'.$strInstituteName.'","'.$strInstituteNameO.'",'.$type.',"0","'.$strEmailId.'","'. $contactNo.'","'. $strWebsite.'","","'.$strAddress.'","","","","'.$strPrincipalName.'","","'.date('Y-m-d H:i:s').'","111","","'. $phoneNumber.'",'.$typeId.',"'. $pinCode.'","'.$latitude.'","'.$longitude.'",0),';
                /*}   
                         $ctr++;*/
                       foreach($row['lstCoursesProviding'] as $courseVal){
//echo "<pre>" ;print_r($courseVal);exit;       
                   /*if($ctr <20 )
                    { */ 
                        $courseType      = $courseVal['Course_Type'];
                        $courseId        = $courseVal['courseId'];
                        $batchStrength   = $courseVal['available_seats'];
                        $batchShiftNo    = $courseVal['batch_shift_no'];
                 $query2.='("'.$strInstituteCode.'","0","'.$courseId.'","'.$batchStrength.'","'.$batchShiftNo.'","'.$typeId.'","'.$courseType.'","'.date('Y-m-d H:i:s').'"),';
                       }
                       
                       /*}   
                         $ctr++;*/
                    }
                     //exit;
                    $query1 = rtrim($query1,',');
                    $query2 = rtrim($query2,',');
                     //echo   $query2."<br/>";exit;
                $result = $objInstitute->manageInstitute('SID', 0, 0,'', '', 0, 0, '', '', '', '', '', '', $query2, '', '', '', 0, 0, 0, 0, '', '', 0, '', 0, 0, 0,$query1);
                $count = $result->num_rows; 
                $insertResult= $result->fetch_array();




                if($insertResult['@P_STATUS_ERR']!=4){

                    $errFlag=2;
                    $msg='===========SAMS Institute Data inserted==========ON:-.'.date('Y:m:d h:i:s').'<br/>';
                 }else{
                    $msg='===========Some error occured inserting SAMS Institute Data=========='.date('Y:m:d h:i:s'); 
                 }
                 $resArr[2]['msg'] =$msg;
                 $resArr[2]['vchUserName'] = 'SAMS CRON';
                 $resArr[2]['count'] = count($instituteData);
                 $resArr[2]['jobName'] = 'SAMS Institute Data  Updated';
                $encData = json_encode(array('result' => $resArr));
               }
            }catch(Exception $e){
                
                Model::writeException($e,'SAMS Institute Data');
            //echo $e->getMessage();  
            }
               
            /*====================Institute Data Update End===================*/ 


            /*====================For SAMS Institute COurse data Update===================*/ 
               try{
                $action='AID';
                $resultUpdateCourse = $objInstitute->manageInstitute('AID', 0, 0,'', '', 0, 0, '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', 0, '', 0, 0, 0,'');
                if($resultUpdateCourse){
                  
                    $msg= "============SAMS Institute Courses Updated============On:-".date('Y-m-d h:i:s');
                }

               }catch(Exception $e){
                        $msg= $e->getMessage()." Dated On:-".date('Y-m-d h:i:s');
               }

                 $resArr[3]['msg'] =$msg;
                 $resArr[3]['vchUserName'] = 'SAMS Institute Course';
                 $resArr[3]['count'] = 1;
                 $resArr[3]['jobName'] = 'SAMS Institute Data  Updated';
                $encData = json_encode(array('result' => $resArr));

             /*====================SAMS Institute COurse Data Update End===================*/
             $this->writeToLog(json_decode($encData));
            break;

        }
        return  $errFlag;

     }
 /*Function to write Log for Crons by Ashis kumar Patra*/

     public function writeToLog($logData) 
    {
        $ctrl       = 0;        
        foreach($logData->result as $res)
        { 
            $msg        = "";
                     
            $msg    .='Job Name :'.$res->jobName.";";
            $msg     .='Message :'.$res->msg.";";
            $msg     .='Total count :'.$res->count.";";
            $msg     .='End Time :'.date('d-M-Y h:i:s',time()).";";

            $msg     .= "============================="."===============================";

           
            $ctrl++;  // counter 
            $filename = '_'.date('Ymd').'.txt';
                // WRITE TEXTFILE START///
            $myfile     = fopen(SITE_PATH.'cronLog/'.$filename, "a") or die("Unable to open file!");
          
            $txt        = $msg;
            fwrite($myfile, "\r\n". $txt);
            fclose($myfile);
            // WRITE TEXTFILE END///
        }
       
    }// Write to log function End
    

      //=====Function to show Scheme wise data, By Rahul Kumar Saw on 30-OCT-2019  =========
        public function maintenanceStatusPai()
        {           include_once(CLASS_PATH . 'clsInstitute.php');
                    $objMaintenance             = new clsInstitute();           
                    $result                     = $objMaintenance->manageInstitute('NOI',0,0,'','',0,0,'','','','','','','','','','',0,0,0,0,'','',0,'',0,0,0,'');

                    $count = $result->num_rows;
                    $arrList = array();
                    $pageArr = array();
                    if ($count > 0) {
                        while ($row = $result->fetch_array()) {

                            $pageArr['institute'] = $row['institute'];
                            $pageArr['intIspia']  = $row['intIspia'];
                            array_push($arrList, $pageArr);
                        } 
                    }
                     echo(json_encode(array('StatusPai' => $arrList)));
        }

        //=====Function to show Sector wise data, By Rahul Kumar Saw on 31-OCT-2019  =========
        public function sectorWiseCourses()
        {           include_once(CLASS_PATH . 'clsCourse.php');
                    $objCourse             = new clsCourse();           
                    $result                = $objCourse->viewCourse('PGC', 0, 0, '', '', '', 0, 0, '', '', 0, 0, 0, 0,'');

                    $count = $result->num_rows;
                    $arrCount = [];
                    $arrList = [];
                    $pageArr = [];
                    if ($count > 0) 
                    {
                        while ($row = $result->fetch_array()) 
                        {   
                        $pageArr['vchSecotrName'] = ($_SESSION['lang'] == 'O' && $row['vchSecotrNameO'] != '') ? $row['vchSecotrNameO'] : htmlspecialchars_decode($row['vchSecotrName'], ENT_QUOTES);
                        $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $row['vchSecotrNameO'] != '') ? 'odia' : '';
                            array_push($arrList, $pageArr['vchSecotrName']);
                            array_push($arrCount, $row['courseCount']);
                        } 
                    }
                
                    $secName    = json_encode($arrList);
                    $secCount   = str_replace('"', '', json_encode($arrCount));
                  

                     echo(json_encode(array('SectorName' => $secName, 'SectorCount'=>$secCount)));
        }


        //=====Function to show District wise ITI Institute, By Rahul Kumar Saw on 31-OCT-2019  =========
        public function districtWiseITIInstitute()
        {     
                    include_once(CLASS_PATH . 'clsInstitute.php');    
                    $objInstitute             = new clsInstitute();           
                    $result                = $objInstitute->manageInstitute('ITI',0,0,'','',0,0,'','','','','','','','','','',0,0,0,0,'','',0,'',0,0,0,'');

                    $count = $result->num_rows;
                    $arrCount = [];
                    $arrList = [];
                    $pageArr = [];
                    $mainArr = array();
                    if ($count > 0) 
                    {
                        while ($row = $result->fetch_array()) 
                        {                    
                            $pageArr['districtName'] = ($_SESSION['lang'] == 'O' && $row['districtNameO'] != '') ? $row['districtNameO'] : htmlspecialchars_decode($row['districtName'], ENT_QUOTES);
                            $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $row['districtNameO'] != '') ? 'odia' : '';
                            $arrList[0] = $pageArr['districtName'];
                            $arrList[1] = (int)$row['ITIinstitute'];
                            array_push($mainArr, $arrList);
                        } 
                    }
                    $distName    = json_encode($mainArr);
                  

                     echo(json_encode(array('DistrictName' => $distName, 'InstituteCount'=>$instCount)));
        }


        /*Function to fill govt ITI
        By: Rahul Kumar Saw
        On: 28-Nov-2019
     */
    public function fillITI()
    {
            include_once( CLASS_PATH . 'clsInstitute.php');
            $objInstitute = new clsInstitute;
            $result             = $objInstitute->manageInstitute('NUI', 0, 0,'', '', 0, 0, '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', 0, '', 0, 0, 0,'');
            $count              = $result->num_rows;
            $arrList            = array();
            $pageArr            = array();
            if ($count > 0) {
                    while ($row = $result->fetch_array()) {

                            $pageArr['intInstituteId']    = $row['intInstituteId']; 
                            $pageArr['strInstituteName']  = ($_SESSION['lang'] == 'O' && $row['vchInstituteNameO'] != '') ? $row['vchInstituteNameO'] : htmlspecialchars_decode($row['vchInstituteName'], ENT_QUOTES);
                            $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $row['vchInstituteNameO'] != '') ? 'odia' : '';
                            $pageArr['strAlllbl'] = $strSelectlbl;
                            $pageArr['strClass'] = $strcls;                   
                            array_push($arrList,$pageArr);
                    }
            } 
            echo(json_encode(array('result'=>$arrList)));
        
    }

    /*Function to fill Training Center Name
        By: Rahul Kumar Saw
        On: 28-Nov-2019
     */
    public function fillTrainingCenter()
    {
            include_once( CLASS_PATH . 'clsInstitute.php');
            $objInstitute = new clsInstitute;
            $result             = $objInstitute->manageInstitute('NUT', 0, 0,'', '', 0, 0, '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', 0, '', 0, 0, 0,'');
            $count              = $result->num_rows;
            $arrList            = array();
            $pageArr            = array();
            if ($count > 0) {
                    while ($row = $result->fetch_array()) {

                            $pageArr['intInstituteId']    = $row['intInstituteId']; 
                            //$pageArr['strInstituteName']  = htmlspecialchars_decode($row['vchInstituteName'], ENT_QUOTES);
                            $pageArr['strInstituteName']  = ($_SESSION['lang'] == 'O' && $row['vchInstituteNameO'] != '') ? $row['vchInstituteNameO'] : htmlspecialchars_decode($row['vchInstituteName'], ENT_QUOTES);
                            $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $row['vchInstituteNameO'] != '') ? 'odia' : '';
                            $pageArr['strAlllbl'] = $strSelectlbl;
                            $pageArr['strClass'] = $strcls;                   
                            array_push($arrList,$pageArr);
                    }
            } 
            echo(json_encode(array('result'=>$arrList)));
        
    }


    /*Function to fill Training Center Name
        By: Rahul Kumar Saw
        On: 28-Nov-2019
     */
    public function fillTrade()
    {
            include_once( CLASS_PATH . 'clsInstituteCourse.php');
            $objCourse = new clsInstituteCourse;
            $instituteId  = $_POST['instituteId'];
            $result = $objCourse->manageInstituteCourse('TRI',0,0,$instituteId,0,0,0,0,0,'');
            $count              = $result->num_rows;
            $arrList            = array();
            $pageArr            = array();
            if ($count > 0) {
                    while ($row = $result->fetch_array()) {

                            $pageArr['intCourseId']    = $row['intCourseId']; 
                            $pageArr['strCourseName']  = ($_SESSION['lang'] == 'O' && $row['vchCourseNameO'] != '') ? $row['vchCourseNameO'] : htmlspecialchars_decode($row['vchCourseNameE'], ENT_QUOTES);
                            $pageArr['strClass'] = ($_SESSION['lang'] == 'O' && $row['vchCourseNameO'] != '') ? 'odia' : '';
                            $pageArr['strAlllbl'] = $strSelectlbl;
                            $pageArr['strClass'] = $strcls;                   
                            array_push($arrList,$pageArr);
                    }
            } 
            echo(json_encode(array('result'=>$arrList)));
        
    }


    /*Function to send email and update status
      By: Rahul Kumar Saw
      On: 24-May-2022
     */

     public function updateSkillEmail($venueID,$examDate){
        /*include_once( CLASS_PATH.'clsVenueTagged.php');
        $objVenueTag         = new clsVenueTagged;
        $resArr  = array();
        $result              = $objVenueTag->manageVenueTagged('E',0,'',0,0,0,$venueID,$examDate,'00:00:00',0,'','',0);
        $count               = $result->num_rows;
        try {
        if ($count > 0) {
           $query1      = '';         
            while ($row = $result->fetch_array()) {
                $applicantname = $row['applicantName'];
                $emailId       = $row['vchEmailId'];
                $mobileNo      = $row['vchPhoneno'];
                $tagId         = $row['intTagId'];
                $applicantId   = $row['intApplicantId'];

                if (SEND_MAIL == "Y")
                {       
                            $strUserTo[] = $emailId;
                            $strUserFrom = SKILLCOM_EMAIL;
                            $url         = SITE_URL."skill-competition-login";
                            $strsubject = "OSDA :: Skill Competition Venue Details" ;

                            $strUserMessage = "Dear <strong>" . $applicantname . "</strong></br>";
                            $strUserMessage .= "<div> <br>";
                            $strUserMessage .= "</div>";
                            
                            $strUserMessage .= 'Your exam center allocated now you can login the application by clicking on this <a href='.$url.' </a></br></br>';
                            
                            $strUserMessage .= "<div> <br>";
                            $strUserMessage .= "</div>";
                            $strUserMessage .= "<div><br><br>Regards <br>Skill Development Team <br>OSDA</div>";

                            $userdata['from'] = $strUserFrom;
                            $userdata['to'] = $strUserTo;
                            $userdata['name'] = 'Odisha Skill Development Authority';
                            $userdata['sub'] = $strsubject;
                            $userdata['message'] = $strUserMessage;
                            $jsUserData = json_encode($userdata);
                            $mailUserRes = Model::sendAuthMailSkillComp($jsUserData);

                            $query1.='("'.$applicantId.'"),';

                }
            }
            $query1 = rtrim($query1,',');

            $resultUpdate = $objVenueTag->manageVenueTagged('UE',0,'',0,0,0,$venueID,$examDate,'00:00:00',0,'',$query1,0);
            $count        =  $resultUpdate->num_rows; 
            $resultUpdate =  $resultUpdate->fetch_array();
            if($resultUpdate['@P_STATUS']>0){
                 $msg="Email Status updated";
             }else{
                 $msg="Some error occured updating the email status"; 
             }
             $resArr[4]['msg'] =$msg;
             $resArr[4]['vchUserName'] = 'Email Sent';
             $resArr[4]['count'] = $count;
             $resArr[4]['jobName'] = 'Email sent for venue tagged';
             $encData = json_encode(array('result' => $resArr));
             // $classBindObj->updateSkillEmailLevel($panelID,$examDate,$levelId);
             print_r($encData);exit;

        }
        }catch(Exception $e){
                echo $e->getMessage();
             }

*/
    }

    /*Function to send email and update status for level 2 and level 3
      By: Rahul Kumar Saw
      On: 24-May-2022
     */

     /*public function updateSkillEmailLevel($panelID,$examDate,$levelId){
        include_once( CLASS_PATH.'clsPanel.php');
        $objPanel               = new clsPanel;
        $resArr  = array();
        $result                 = $objPanel->managePanel('E',0,$panelID,0,$examDate,$levelId,'','','','','','',0,0,0,0,'','',0,0);
        $count                  = $result->num_rows;
        try {
        if ($count > 0) {
           $query1      = '';         
            while ($row = $result->fetch_array()) {
                $applicantname = $row['applicantName'];
                $emailId       = $row['vchEmailId'];
                $mobileNo      = $row['vchPhoneno'];
                $tagId         = $row['intCanTagId'];
                $applicantId   = $row['intApplicantId'];

                if (SEND_MAIL == "Y")
                {       
                            $strUserTo[] = $emailId;
                            $strUserFrom = SKILLCOM_EMAIL;
                            $url         = SITE_URL."skill-competition-login";
                            $strsubject = "OSDA :: Skill Competition Venue Details" ;

                            $strUserMessage = "Dear <strong>" . $applicantname . "</strong></br>";
                            $strUserMessage .= "<div> <br>";
                            $strUserMessage .= "</div>";
                            
                            $strUserMessage .= 'Your exam center allocated now you can login the application by clicking on this <a href='.$url.' </a></br></br>';
                            
                            $strUserMessage .= "<div> <br>";
                            $strUserMessage .= "</div>";
                            $strUserMessage .= "<div><br><br>Regards <br>Skill Development Team <br>OSDA</div>";

                            $userdata['from'] = $strUserFrom;
                            $userdata['to'] = $strUserTo;
                            $userdata['name'] = 'Odisha Skill Development Authority';
                            $userdata['sub'] = $strsubject;
                            $userdata['message'] = $strUserMessage;
                            $jsUserData = json_encode($userdata);
                            $mailUserRes = Model::sendAuthMailSkillComp($jsUserData);

                            $query1.='("'.$applicantId.'"),';

                }
            }
            $query1 = rtrim($query1,',');

            $resultUpdate = $objPanel->managePanel('UE',0,$panelID,0,$examDate,$levelId,'','','','','','',0,0,0,0,'',$query1,0,0);
            $count        =  $resultUpdate->num_rows; 
            $resultUpdate =  $resultUpdate->fetch_array();
            if($resultUpdate['@P_STATUS']>0){
                 $msg="Email Status updated";
             }else{
                 $msg="Some error occured updating the email status"; 
             }
             $resArr[4]['msg'] =$msg;
             $resArr[4]['vchUserName'] = 'Email Sent';
             $resArr[4]['count'] = $count;
             $resArr[4]['jobName'] = 'Email sent for venue tagged';
             $encData = json_encode(array('result' => $resArr));
             //print_r($encData);exit;

        }
        }catch(Exception $e){
                echo $e->getMessage();
             }


    }*/


}

//comment10
?>