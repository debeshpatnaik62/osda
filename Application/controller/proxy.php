<?php

/* ================================================
  File Name         	  : proxy.php
  Description		  	  : This page is to manage AJAX requests
  Author Name		  	  : Rasmi Ranjan Swain
  Date Created		  : 16-MAY-2016
  Update History		  :
  <Updated by>		<Updated On>		<Remarks>

  Javscript Functions   :
  includes              : classBind.php

  ================================================== */

    header('Access-Control-Allow-Origin: same-origin');
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: X-Requested-With");
    header("Cache-Control: max-age=2592000");
    $data 	= json_decode(file_get_contents('php://input'));
   $mobCase	=(!empty($data))? $data->{'method'}:'';

require ("classBind.php");
$objClassBind = new clsClassBind;
 
 $newSessionId           = session_id();
  $hdnPrevSessionId       = $_POST['hdnPrevSessionId'];
  //if(($hdnPrevSessionId!='' && $newSessionId == $hdnPrevSessionId)){ 

switch ($_REQUEST['method']) {

    case "checkDuplicateLocation":
        $objClassBind->checkDuplicateLocation();
        break;

    case "getAllUsers":

        $userId = (isset($_REQUEST['userId'])) ? $_REQUEST['userId'] : 0;
        $objClassBind->getAllUsers($userId, 0);
        break;
    case "getPermission":
        $objClassBind->getPermissions();
        break;

    case "getPublishedPage":
        $objClassBind->getPublishedPage();
        break;
    case "getAssignedMenuList":
        $parentId = $_REQUEST['parentId'];
        $menuType = $_REQUEST['menuType'];
        $linkType = $_REQUEST['linkType'];
        $objClassBind->getAssignedMenuList($parentId, $menuType, $linkType);
        break;
    case "getGlobalMenuList":
        $menuType = $_REQUEST['menuType'];
        $linkType = $_REQUEST['linkType'];
        $objClassBind->getGlobalMenuList($menuType, $linkType);
        break;
    case "getPageContent":
        $pageId = $_REQUEST['PID'];
        $objClassBind->getPageContent($pageId);
        break;
    case "deleteMenu":
        $pageId = $_REQUEST['PID'];
        $objClassBind->deleteMenu($pageId);
        break;
    case "fillLocation":
        $objClassBind->fillLocation();
        break;
    case "deleteFromMainMenu":
        $menuId = $_REQUEST['menuId'];
        $pageId = $_REQUEST['pageId'];
        $objClassBind->deleteFromMainMenu($menuId, $pageId);
        break;
    case "userVal":
        $objClassBind->fillUserDeatils();
        break;
    case "userProfile":
        $objClassBind->showUserDeatils();
        break;
    case "getTotalMenuRecords":
        $objClassBind->getTotalMenuRecords();
        break;
    case "content":
        $objClassBind->showContent();
        break;
    case "redContent":
        $objClassBind->readPageContent();
        break;
    case "redContentH":
        $objClassBind->readPageContentH();
        break;
    case "getPage":
        $SelVal = $_REQUEST['SelVal'];
        $objClassBind->getPage($SelVal);
        break;
    case "getPrimary":
        $objClassBind->fillPrimaryLink();
        break;
    case "viewPrimary":
        $objClassBind->viewPrimaryLink();
        break;
//===================Case for showing feedBack Details By Rasmi Ranjan Swain On 13-Aug-2015=================
    case "viewFeedBackDetails":
        $objClassBind->viewFeedBackDetail();
        break;
//===================Case for showing Logo By Chinmayee On 18-Aug-2015=================
    case "getLogo":
        $objClassBind->getLogo();
        break;
    case "getCategoryname":
        $SelVal = $_REQUEST['SelVal'];
        $objClassBind->getCategoryname($SelVal);
        break;
    case "resetPassword":
        $userId = $_REQUEST['userId'];
        $objClassBind->resetPassword($userId);
        break;

    case "checkDuplicateUser":
        $userId = $_REQUEST['userId'];
        $controlVal = $_REQUEST['controlVal'];
        $flag = $_REQUEST['flag'];

        $objClassBind->checkDuplicateUser($userId, $controlVal, $flag);
        break;
    case "fillPlugins":
        //$SelVal	= $_REQUEST['SelVal'];
        $objClassBind->fillPlugins();
        break;
    case "getPluginTypes":
        $funcId = $_REQUEST['funcId'];
        $objClassBind->getPluginTypes($funcId);
        break;

    case "getDepartments":
        $intLocid = $_REQUEST['intLocid'];
        $objClassBind->getDepartments($intLocid);
        break;
    case "getDesignation":
        $intDeptid = $_REQUEST['intDeptid'];
        $objClassBind->getDesignation($intDeptid);
        break;

    case "BugDetails":
        $objClassBind->getBugDetails();
        break;

    case "getLocationDetails":
        $objClassBind->getLocationDetails();
        break;

    case "getLocation":
        $SelVal = $_REQUEST['SelVal'];
        $objClassBind->getLocation($SelVal);
        break;

    case "fillDistricts":
        $objClassBind->fillDistricts();
        break;

    case "news":
        $objClassBind->getNews();
        break;
    case "gelCat":
        $objClassBind->getGalCatDetails();
        break;
    case "GalleryDetails":
        $objClassBind->getGalleryDetails();
        break;
    case "getCategory":
        $SelVal = $_REQUEST['SelVal'];
        $objClassBind->getCategory($SelVal);
        break;
    case "getFaqDetails":
        $objClassBind->getFaqDetails();
        break;
    case "fillEducation":
        $objClassBind->fillEducation();
        break;
    case "fillSector":
        $objClassBind->fillSector();
        break;

    case "fillInstitute":
        $objClassBind->fillInstitute();
        break;

    case "fillCourse":
        $objClassBind->fillCourse();
        break;

    case "getCoursesDetails":

        $objClassBind->getCoursesDetails();
        break;

    case "uploadToTemp":
        $objClassBind->uploadFileToTemp();
        break;

    case "getInstGalleryDetails":
        $objClassBind->getInstGalleryDetails();
        break;

    case "fillInstitutePartner":
        $objClassBind->fillInstitutePartner();
        break;
    case "fillIndiaSkill":
        $objClassBind->fillIndiaSkill();
        break;
    case "getEventGalleryDetails":
        $objClassBind->getEventGalleryDetails();
        break;
    case "fillEventList":
        $objClassBind->fillEventList();
        break;
    case "getlangDataUrl":
        $objClassBind->getlangDataUrl();
        break;
    case "getWebURL":
        $objClassBind->getWebURL();
        break;
    case "checkdbPage":
        $objClassBind->checkdbPage();
        break;
    case "getContentfromDb":
        $objClassBind->getContentfromDb();
        break;

    case "deletePagedata":
        $objClassBind->deletePagedata();
        break;
    case "translateSubmit":
        $objClassBind->translateSubmit();
        break;
    case "getPagepercent":
        $objClassBind->getPagepercent();
        break;
    case "getNewsCategory":
        $objClassBind->getNewsCategory();
        break;
    case "getReport":
        $SelVal = $_REQUEST['SelVal'];
        $objClassBind->getReport($SelVal);
        break;;
    case "fillMappingData":
        $SelVal = $_REQUEST['selval'];
        $dataType = $_REQUEST['dataType'];
        $instituteType = $_REQUEST['instituteType'];
        $objClassBind->fillMappingData($SelVal,$dataType,$instituteType);
        break;
    case "fillMappingSector":
        $SelVal = $_REQUEST['selval'];
        $dataType = $_REQUEST['dataType'];
        $objClassBind->fillMappingSector($SelVal,$dataType);
        break; 
    case "fillMappingCourse":
        $SelVal   = $_REQUEST['selval'];
        $dataType = $_REQUEST['dataType'];
      
        $objClassBind->fillMappingCourse($SelVal,$dataType);
        break;

        case "fillSAMSCourse":
        $SelVal   = $_REQUEST['selval'];
        
        $objClassBind->fillSAMSCourse($SelVal);
        break;

        case "fillSkillInstituteName":
        $selVal   = $_REQUEST['selVal'];
        $objClassBind->fillSkillInstituteName($selVal);
        break;

        case "fillDegreeName":
        $selVal   = $_REQUEST['selVal'];
        $objClassBind->fillDegreeName($selVal);
        break;

        case "fillBranchName":
        $selVal   = $_REQUEST['selVal'];
        $objClassBind->fillBranchName($selVal);
        break;

        case "fillSkillDevelopInstituteName":
        $selVal   = $_REQUEST['selVal'];
        $objClassBind->fillSkillDevelopInstituteName($selVal);
        break;

        case "fillInterestedCourseName":
        $selVal   = $_REQUEST['selVal'];
        $objClassBind->fillInterestedCourseName($selVal);
        break;

        case "fillSkillDistrict":
        $objClassBind->fillSkillDistrict();
        break;

        case "fillSkillBlock":
        $distId   = $_REQUEST['distId'];
        $objClassBind->fillSkillBlock($distId);
        break;

        case "fillSkillGp":
        $blockId   = $_REQUEST['blockId'];
        $objClassBind->fillSkillGp($blockId);
        break;

        case "fillSkillVillage":
        $gpId   = $_REQUEST['gpId'];
        $objClassBind->fillSkillVillage($gpId);
        break;

        case "fillJobInstituteName":
        $instituteType   = $_REQUEST['instituteType'];
        $objClassBind->fillJobInstituteName($instituteType);
        break;

        case "fillJobTraining":
        $objClassBind->fillJobTraining();
        break;

        case "fillVenueName":
        $distId   = $_REQUEST['distId'];
        $objClassBind->fillVenueName($distId);
        break;

        case "fillMembers":
        $objClassBind->fillMembers();
        break;

        case "fillResultMembers":
        $objClassBind->fillResultMembers();
        break;

        case "gotoAssignment":            
            $objClassBind->gotoAssignment();
        break;
        case "gotoCandidate":            
            $objClassBind->gotoCandidate();
        break;
        

        case "fillAssignedMembers":            
            $objClassBind->fillAssignedMembers();
        break;

        case "countAssignedMembers":
            $objClassBind->countAssignedMembers();
        break;

        case "fillPanel":
            $selVal   = $_REQUEST['selVal'];
            $levelId   = $_REQUEST['levelId'];
            $venueId   = $_REQUEST['venueId'];
            $objClassBind->fillPanel($selVal,$levelId,$venueId);
        break;

        case "fillCandidate":
            $objClassBind->fillCandidate();
        break;

        case "fillProgramName":
            $selVal = $_REQUEST['selVal'];
            $objClassBind->fillProgramName($selVal);
        break;

        case "fillApproveInstituteName":
        $selVal   = $_REQUEST['selVal'];
        $objClassBind->fillApproveInstituteName($selVal);
        break;

        case "fillInstituteProgram":
        $objClassBind->fillInstituteProgram();
        break;

        case "fillTPName":
            $selVal = $_REQUEST['selVal'];
            $objClassBind->fillTPName($selVal);
        break;

        case "fillPaymentData":
            $regdNo = $_REQUEST['regdNo'];
            $payableFee = $_REQUEST['payableFee'];
            $strMobile = $_REQUEST['strMobile'];
            $strEmail = $_REQUEST['strEmail'];
            $instituteCode = $_REQUEST['instituteCode'];
            $strInstitute = $_REQUEST['strInstitute'];
            $strCourseCode = $_REQUEST['strCourseCode'];
            $strTPName = $_REQUEST['strTPName'];
            $objClassBind->fillPaymentData($regdNo,$payableFee,$strMobile,$strEmail,$instituteCode,$strInstitute,$strCourseCode,$strTPName);
        break;

        case "fillTPDetails":
            $intId = $_REQUEST['intId'];
            $objClassBind->fillTPDetails($intId);
        break;

        case "fillTPFeeDetails":
            $intId = $_REQUEST['intId'];
            $objClassBind->fillTPFeeDetails($intId);
        break;

        case "fillRegistrationPhase":
            $selVal = $_REQUEST['selVal'];
            $objClassBind->fillRegistrationPhase($selVal);
        break;

        case "fillSkillCategory":
        $SelVal = $_REQUEST['SelVal'];
        $objClassBind->fillSkillCategory($SelVal);
        break;

        case "fillVenue":
        $levelId   = $_REQUEST['levelId'];
        $objClassBind->fillVenue($levelId);
        break;

        case "resetOTP":
        $mobileNum = $_REQUEST['mobileNum'];
        $objClassBind->resetOTP($mobileNum);
        break;

        case "resetSkillOTP":
        $mobileNum = $_REQUEST['mobileNum'];
        $objClassBind->resetSkillOTP($mobileNum);
        break;

        case "fillProgramSeatDetails":
            $intId = $_REQUEST['intId'];
            $proId = $_REQUEST['programId'];
            $objClassBind->fillProgramSeatDetails($proId,$intId);
        break;

        case "getCalenderDetails":
            $objClassBind->getCalenderDetails();   
        break;

        case "fetchCalenderEvent":                    
            $objClassBind->getCalenderEvent();
        break;

        }
    // }else if($newSessionId != $hdnPrevSessionId){

    //     echo json_encode(array('error'=>"Operation failed due to session mismatch"));
    // }
?>
