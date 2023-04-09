<?php
 /* ================================================
	File Name         	  : proxy.php
	Description		  : Manage Classbind in proxy	
	Date Created		  : 29-Dec-2015
	Designed By		  : 
	Update History		  :
	<Updated by>		<Updated On>		<Remarks>

	Javscript Functions   : 
	includes              : classBind.php

	==================================================*/


require ("classBind.php");
$objClassBind	= new clsClassPortal;

    $data 	= json_decode(file_get_contents('php://input'));
    $mobCase	=(!empty($data))? $data->{'method'}:'';
    $dataTranslate      = json_decode(json_encode($data), True);
    
   //print_r($dataTranslate);
    $newSessionId           = session_id();
    $hdnPrevSessionId       = $_POST['hdnPrevSessionId'];
     if(($hdnPrevSessionId!='' && $newSessionId == $hdnPrevSessionId)){

        $method=isset($_POST['method'])?$_POST['method']:$dataTranslate['method'];
      switch($method){	
        case "generateRandomcode":            
                $objClassBind->generateRandomcode();
        break; 
        case "verifyOtp":            
                $objClassBind->verifyOtp();
        break; 

        case "validCaptcha":            
                $objClassBind->validCaptcha();
        break; 

        case "loadCourses":            
                $objClassBind->loadCourses();
        break; 
        case "fillEligibility":            
                $objClassBind->fillEligibility();
        break; 
        case "loadEligibility":            
                $objClassBind->loadEligibility();
        break; 
        case "fillDistricts":            
                $objClassBind->fillDistricts();
        break;
        case "changeLanguage":  
                $objClassBind->changeLanguage();
        break;
        case "getHomepageStory":  
                //$objClassBind->getHomepageStory();
            $objClassBind->getSuccessStoryData();
        break;

        case "getHomepageSectors":  
                $objClassBind->getHomepageSectors();
        break;

        case "fillSector":
            $objClassBind->fillSector();
        break;
        case "fillCourse":
            $objClassBind->fillCourse();
        break;    

        case "getLatestNews":
            $objClassBind->getLatestNews();
        break;

        case "getLatestBlog":
            $objClassBind->getLatestBlog();
        break;

        case "getHomepageTestimonial":
            $objClassBind->getHomepageTestimonial();
        break;

        case "loadStories":
            $objClassBind->loadStories();
        break;

        //========= case for submit Query By :: Arpita Rath On :: 31-03-2017=====//
        case "addQuery1":
            $action         = $_REQUEST['action'];
            $name           = $_REQUEST['name'];
            $email          = $_REQUEST['email'];
            $phone          = $_REQUEST['phone'];
            $message        = $_REQUEST['message'];
            $captchaCode    = $_REQUEST['recaptcha'];
            $objClassBind->addQuery1($action,$name,$email,$phone,$message,$captchaCode);
        break;

        case "loadInstituteStories":
            $objClassBind->loadInstituteStories();
        break;

        case "getRecruiterdetails":
            $objClassBind->getRecruiterdetails();
        break;

        case "getCategory":
            $SelVal	= $_REQUEST['SelVal'];
            $objClassBind->getCategory($SelVal);
        break;

        case "getRightpanelStory":
            $objClassBind->getRightpanelStory();
        break;
        case "getRightpanelBlog":
            $objClassBind->getRightpanelBlog();
        break;

        case "getRightpanelNews":
            $objClassBind->getRightpanelNews();
        break;

        case "getRightpanelAllNews":
            $objClassBind->getRightpanelAllNews();
        break;

    //    case "getHomepagePhoto":
    //        $objClassBind->getHomepagePhoto();
    //    break;
        case "getHomepageGallery":

            //$objClassBind->getHomepageGallery();
            $objClassBind->getHomeGallery();
        break;

        case "getHomepageVideo":
            $objClassBind->getHomepageVideo();
        break;
       case "loadFilterCourses":            
                $objClassBind->loadFilterCourses();
        break;
       case "loadVideoGallery":            
                $objClassBind->getVideoGallery();
        break;

        case "loadDistwiseInstitute":            
                $objClassBind->loadDistwiseInstitute();
        break;

        case "searchbyPincode":            
                $objClassBind->searchbyPincode();
        break;

        case "fillDistwiseInstituteLists":            
                $objClassBind->fillDistwiseInstituteLists();
        break;

        case "fillInstwiseCourseLists":            
                $objClassBind->fillInstwiseCourseLists();
        break;

        case "fillDistrictLists":            
                $objClassBind->fillDistrictLists();
        break;
    
        case "getFacebooklatestfeed":            
                $objClassBind->getFacebooklatestfeed();
        break;
    
        case "fillIndiaStates":            
                $objClassBind->fillIndiaStates();
        break;
    
        case "fillIndiaDistricts":            
                $objClassBind->fillIndiaDistricts();
        break;
    
        case "fillQualification":            
                $objClassBind->fillQualification();
        break;
    
         case "uploadToTemp":        
                $objClassBind->uploadFileToTemp();
            break;
        case "uploadToTempRegd":        
                $objClassBind->uploadFileToTempRegd();
            break;
        
        case "loadVenueDetails":        
                $objClassBind->loadVenueDetails();
            break;
       case "translatePage":  
               
                $objClassBind->translatePage($dataTranslate);
        break;
        case "getEmployerSpeak":
            $objClassBind->getEmployerSpeak();
        break;
        case "getHomeFocusDetails":
            $objClassBind->getHomeFocusDetails();
        break;
       case "fillBlocks":            
                $objClassBind->fillBlocks();
        break;
        case "fillSkillInstitute":
        $objClassBind->fillSkillInstitute();
        break;
        case "fillSkillQualification":            
                $objClassBind->fillSkillQualification();
        break;
        case "loadPopularPages":            
                $objClassBind->loadPopularPages();
        break;
        // View graph data by Rahul On::31-10-2019
        case "maintenanceStatusPai":  
                $objClassBind->maintenanceStatusPai();
        break;
        case "sectorWiseCourses":  
                $objClassBind->sectorWiseCourses();
        break;

        case "districtWiseITIInstitute":  
                $objClassBind->districtWiseITIInstitute();
        break;

        case "fillITI":
            $objClassBind->fillITI();
        break;
        case "fillTrainingCenter":
            $objClassBind->fillTrainingCenter();
        break; 
        case "fillTrade":
            $objClassBind->fillTrade();
        break;   
      
    }
   }else if($newSessionId != $hdnPrevSessionId){

            echo json_encode(array('error'=>"Operation failed due to session mismatch"));
        }
?>
