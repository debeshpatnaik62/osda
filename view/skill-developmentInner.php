<?php

//========== create object of clsSkillDevelopment class=============== 
include_once( CLASS_PATH . 'clsSkillDevelopment.php');


$objDevelopment = new clsSkillDevelopment;


$nid      = $_REQUEST['NID'];
$strSubmit = ($id > 0) ? 'Update' : 'Submit';
$strReset = ($id > 0) ? 'Cancel' : 'Reset';
$strTab = ($id > 0) ? 'Edit' : 'Add';
//$strclick = ($id > 0) ? "window.location.href='" . SITE_URL . "contact/" . $glId . "/" . $plId . "';" : "";


//========== Default variable ===============       

$flag = 0;
$errFlag = 0;
$outMsg = '';

//============ Student Form Submit ===================
if (isset($_POST['btnSubmit'])) 
{
     
    $result = $objDevelopment->addUpdateskillDevelopment($id);

    //print_r($result);exit;
    $outMsg = $result['msg'];
    $flag = $result['flag'];
    $formdata = $result['returnParams'];
    $strName     = ($flag==1)?htmlspecialchars_decode($formdata['strName'], ENT_QUOTES):'';
    $coursera   = ($flag==1)?htmlspecialchars_decode($formdata['coursera'], ENT_QUOTES):'';
    $strEmail    = ($flag==1)?htmlspecialchars_decode($formdata['strEmail'], ENT_QUOTES):'';
    $txtInterested = ($flag==1)?htmlspecialchars_decode($formdata['txtInterested'], ENT_QUOTES):'';
    $strMessage  = ($flag==1)?htmlspecialchars_decode($formdata['strMessage'], ENT_QUOTES):'';
    $txtPhone   = ($flag==1)?htmlspecialchars_decode($formdata['txtPhone'], ENT_QUOTES):'';
    $selDocumentType    = ($flag==1)?htmlspecialchars_decode($formdata['selDocumentType'], ENT_QUOTES):'';
    $txtDocumentName = ($flag==1)?htmlspecialchars_decode($formdata['txtDocumentName'], ENT_QUOTES):'';
    $txtDocumentNumber  = ($flag==1)?htmlspecialchars_decode($formdata['txtDocumentNumber'], ENT_QUOTES):'';
    $txtRegdNumber   = ($flag==1)?htmlspecialchars_decode($formdata['txtRegdNumber'], ENT_QUOTES):'';
    $selCourse    = ($flag==1)?htmlspecialchars_decode($formdata['selCourse'], ENT_QUOTES):'';
    $txtOtherCourseName = ($flag==1)?htmlspecialchars_decode($formdata['txtOtherCourseName'], ENT_QUOTES):'';
    $selBranch  = ($flag==1)?htmlspecialchars_decode($formdata['selBranch'], ENT_QUOTES):'';
    $selSemester    = ($flag==1)?htmlspecialchars_decode($formdata['selSemester'], ENT_QUOTES):'';
    $selInterestCourse = ($flag==1)?htmlspecialchars_decode($formdata['selInterestCourse'], ENT_QUOTES):'';
    $selInstituteName  = ($flag==1)?htmlspecialchars_decode($formdata['selInstituteName'], ENT_QUOTES):'';
    $txtOtherInstName  = ($flag==1)?htmlspecialchars_decode($formdata['txtOtherInstName'], ENT_QUOTES):'';
    $ReportFile  = ($flag==1)?htmlspecialchars_decode($formdata['ReportFile'], ENT_QUOTES):'';
    $errFlag = $result['flag'];
    if($errFlag!=1)
    {
        $redirectLoc        =  SITE_URL."digitall-skill";
    }
    
}


//echo "<pre>";print_r($_COOKIE);exit;
if(empty($_COOKIE[$page])){
    setcookie($page,1,time() + (10 * 365 * 24 * 60 * 60));

    $resultVisitor = $objDevelopment->updatecount();
    
}

$visitor = $objDevelopment->fetchVisiotcount();


$odiaClass=($_SESSION['lang'] == 'O')?'odia':'';

$strPageTitle  ='Digital Skill Program';
$regdMsg = 'Registration for Digital Skill Program';
$lastDateReg='Last Date for Registration';
$courseEndDate='Course End Date';
$lastRDate = '29th September 2020';
$coEndDate = '30th December 2020';
$sought = 'Type of courses sought for';
$skillName1 ='Name';
$skiEmail  ='Email Address';
$interSkill = 'Interested Skill/ Sector/ Course';
$selectIdentity = 'Select Identity Document Type';
$documentType = 'Enter Identity Document Type';
$anyDocu = 'Any Identity Document';
$docNumber = 'Enter Identity Document Number';

$currentAdre ='Enter Current Address';
$decration ='Declaration';
$decrationRule1 ='I hereby confirm that all the above information furnished by me is correct.';
$decrationRule2 = 'I hereby declare that I am willing to undertake this upskilling program to improve the employability.';
$decrationRule3 = 'I hereby agree that my access to the course will start only after activating the access in the Coursera platform. The activation link to the platform will be available to me in my email. ';
$decrationRule4 ='I am responsible to activate my access once I get the activation link.';
$decrationRule5 ='I understand that my access to the platform ends on 30th December 2020 irrespective of the date of access granted.  ';
$decrationRule6 ='I agree to complete the course and related certification (if any) by 30st December 2020 after that period I will not claim for access to the platform or course.';
$decrationRule7 ='I hereby declare that, I have passed out from Odisha or I am currently staying in Odisha or I am aresident of Odisha currently located outside.';
$decrationRule8 ='I agree and certify to all the above declaration are true to the best of my knowledge.';
$decrationRule9 = 'Please note in this limited promotional offer certifications to some of the courses may not be complimentary and the payment if any will have to be borne by the candidate for accessing such certifications.';

$terms = 'Accept & Agree ?';
$enterhere ='Enter here';

$information = 'Information';

$information1 = 'The registration is based on first-cum-first serve basis only till the free registration logins lasts.';
$information2 = 'Last Date for registering your access to Coursera Platform is 30th October 2020. No further registration will be allowed after 30th October 2020 .';
$information3 = 'Please make sure your information furnished are correct and your contact (phone and email) will be the one which you will access regularly. ';
$information4 = 'Once you submit your details in this portal, please check your email address regularly to expect an activation link from Coursera.';
$information5 = 'Once you get the activation link in your email, please click on that and follow the steps to activate your access to the platform. They you are ready to start the course.';
$information6 = 'Please note your access to the platform is complimentary till 30th December 2020 after which your access will be revoked. You are required to complete all your courses and available certifications by 30th December 2020  .';
$information7 = 'The top-notch course list in the platform as suggested by Coursera can be accessed from here .';
$totalRegistered = 'Total Page Visitors';

$mobileNo = 'Mobile Number';
$colRedgId = 'College / Institute Roll / Registration Number';
$strCourses = 'Courses';
$otherCourse = 'Other Course';
$branch = 'Branch / Discipline';
$semester = 'Semester';
$interestedCourse = 'Interested For Courses';
$colInstitue = 'College / Institution Name';
$otherInstitute = 'Other Institute Name';
$select = 'Select';

$declarationSap1 = 'I hereby confirm that all the above information furnished by me is correct';
$declarationSap2 = 'I hereby declare that I am willing to undertake this upskilling program to improve the employability.';
$declarationSap3 = 'I am giving my consent to evaluate my application for selection process if any.';
$declarationSap4 = 'I agree to pay a subsidized fee towards the course applied in case my application is approved for upskilling program. The details of the fee collection will be intimated by respective colleges.';
$declarationSap5 = 'I hereby agree that my access to the SAP ERP course will start only after activating the access as indicated next steps. The activation link to the platform will be available to me in my email.';
$declarationSap6 = 'I am responsible to activate my access once I get the activation link.';
$declarationSap7 = 'I understand that my access to the platform within 6 months of activation or date specified by my institute or OSDA whichever is earlier. I am responsible to complete the course within that timeline.';
$declarationSap8 = 'I agree to complete the course and related certification (if any) within the activation period after that period I will not claim for access to the platform or course.';
$declarationSap9 = 'I hereby declare that I am studying in Odisha in the proposed Technical / Professional Institutes as mentioned in the registration page. I understand if I choose Others in the Institution name, then I may not be considered for the program.';

$informationSap1 = 'The registration is based on first-cum-first serve basis only till the registration logins lasts.';
$informationSap2 = 'Last Date for registering your free access to SAP is 29th August 2020. No further registration will be allowed after 29th August 2020.';
$informationSap3 = 'The modules available for skilling is ABAP, SD, MM, HCM, FI etc. You are required to complete your training program as per the schedule and appear for the certification as per the module opted.';
$informationSap4 = 'You can choose one module for skilling only.';
$informationSap5 = 'Please note that this is only applicable to select colleges initially. Based on the response we may include additional colleges.';
$informationSap6 = 'Please make sure that the information furnished you are correct and your contact (phone and email) will be the one which you will be accessing regularly.';
$informationSap7 = 'Your application will be sent to your college which you have given in the form and validated.';
$informationSap8 = 'Once you submit your details in this portal, please contact your institute and check your email address regularly for the next steps.  ';
$informationSap9 = 'Post submission of application, there could be an evaluation test to select students for this program.';
$informationSap10 = 'After selection of your application for the program, you may expect to receive an activation link from SAP.';
$informationSap11 = 'Once you get the activation link in your email, please click on that and follow the steps to activate your access to the platform.';
$informationSap12 = 'The details of the courses available can be accessed here.';

$noticeMsg  = "Notice Board";
$sucssMsg   = "Thank you for showing interest in the Special Skill Development Program!
At this point of time the registrations for the program is completed. Kindly keep visiting the Special Skill Development Page for further details.";//Thank you for the overwhelming response to SAP ERP Skilling Program for the students of Government Engineering and Professional Institutes. We are pleased to share that due to overwhelming response to the registration process, we are conducting an online test to select the top 2000 students for the program.";
$suggestionMsg = "Kindly note the following related to the next steps and the exams:";
$msgpoint1 = "Date of the Test: 22nd September 2020 to 23rd September 2020";
$msgpoint2 = "The Student from Government Engineering and Professional Instituteswho has applied earlier in the 
";
$msgpoint3 = " www.skillodisha.gov.in/skill-development";
$msgpoint4 = " portal has to complete his/her registration on ";
$msgpoint5 = " https://intune.timestsw.com/register/10243";
$msgpoint6 = " to get access to dummy link";
$msgpoint7 = " https://intune.timestsw.com/";
$msgpoint8 = "It is compulsory for all students to register on above given link ";
$msgpoint9 = " https://intune.timestsw.com/register/10243";
$msgpoint10 = "to appear for 22nd September 2020 test. The link for selection test would be directly sent to students registered email ID.";
$msgpoint11 = "Actual test link would be shared with students by 21st Sept EOD.";
$msgpoint12 = "Test modules will be assigned to students as per the module/course selected during this test registration process and subsequent discussion with your college Spocs. ";
$msgpoint13 = "Student must use only one email ID for registration";
$msgpoint14 = " Students with registrations through multiple email Id’s will be disqualified.";
$msgpoint15 = "Students must compulsorily mention their unique college ID no. while registering.";
$msgpoint16 = "Students will have to strictly follow the below mentioned slots as per the modules.";
$msgpoint17 = "•    HCM     –       09:00 AM to 11:00 AM";
$msgpoint18 = "•    FI      –       11:00 AM to 01:00 PM";
$msgpoint19 = "•    ABAP    –       01:00 PM to 04:00 PM";
$msgpoint20 = "•    MM      –       04:00 PM to 07:00 PM";
$msgpoint21 = "•    SD      –       07:00 PM to 09:00 PM";
$msgpoint22 = "The first cut-off list would be shared with colleges on 23rd September 2020. Please get in touch with College Spoc for further details. ";
$msgpoint23 = "There will be a security deposit (caution money) in order to bring in seriousness amongst students for the program which will be with the Colleges and the same will be refunded back after completing the Global SAP Certification. The caution fees deposit process will be shared soon. ";
$msgpoint24 = "Classes to commence from 28th September and training to be completed on or before 20th November 2020.";
$msgpoint25 = "Students to appear for SAP Global Certification from 23rd November 2020 to 28th November 2020.";


if ($_SESSION['lang'] == 'O') {
$strLangCls = 'odia';
$strNumLangCls = 'odianum';
$strPageTitle  ='&#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;';
$regdMsg = '&#2872;&#2893;&#2929;&#2852;&#2856;&#2893;&#2852;&#2893;&#2864; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#2858;&#2878;&#2823;&#2817; &#2858;&#2846;&#2893;&#2844;&#2879;&#2837;&#2864;&#2851;';
$lastDateReg='&#2858;&#2846;&#2893;&#2844;&#2879;&#2837;&#2864;&#2851; &#2837;&#2864;&#2879;&#2860;&#2878;&#2864; &#2870;&#2887;&#2871; &#2852;&#2878;&#2864;&#2879;&#2838;';
$courseEndDate='&#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#2870;&#2887;&#2871; &#2852;&#2878;&#2864;&#2879;&#2838; ';
$lastRDate = '&#2920;&#2927; &#2872;&#2887;&#2858;&#2893;&#2847;&#2887;&#2862;&#2893;&#2860;&#2864; &#2920;&#2918;&#2920;&#2918;';
$coEndDate = '&#2921;&#2918; &#2849;&#2879;&#2872;&#2887;&#2862;&#2893;&#2860;&#2864; &#2920;&#2918;&#2920;&#2918;';
$sought = '&#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#2852;&#2878;&#2866;&#2879;&#2837;&#2878;';
$skillName1 ='&#2856;&#2878;&#2862;';
$skiEmail  ='&#2823;&#2862;&#2887;&#2866;';
$interSkill = '&#2822;&#2839;&#2893;&#2864;&#2873; &#2853;&#2879;&#2860;&#2878; &#2860;&#2879;&#2861;&#2878;&#2839;&#47;&#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; ';
$selectIdentity = '&#2858;&#2864;&#2879;&#2842;&#2911; &#2858;&#2852;&#2893;&#2864;&#2864; &#2858;&#2893;&#2864;&#2837;&#2878;&#2864; &#2860;&#2878;&#2843;&#2856;&#2893;&#2852;&#2881;';
$documentType = '&#2858;&#2864;&#2879;&#2842;&#2911; &#2858;&#2852;&#2893;&#2864;&#2864; &#2858;&#2893;&#2864;&#2837;&#2878;&#2864; &#2866;&#2887;&#2838;&#2856;&#2893;&#2852;&#2881;';
$anyDocu = '&#2837;&#2892;&#2851;&#2872;&#2879; &#2831;&#2837; &#2858;&#2864;&#2879;&#2842;&#2911; &#2858;&#2852;&#2893;&#2864;';
$docNumber = '&#2858;&#2864;&#2879;&#2842;&#2911; &#2858;&#2852;&#2893;&#2864;&#2864; &#2856;&#2862;&#2893;&#2860;&#2864; &#2866;&#2887;&#2838;&#2856;&#2893;&#2852;&#2881;';
$currentAdre ='&#2860;&#2864;&#2893;&#2852;&#2893;&#2852;&#2862;&#2878;&#2856; &#2848;&#2879;&#2837;&#2851;&#2878;';
$decration ='&#2840;&#2891;&#2871;&#2851;&#2878;';
$decrationRule1 ='&#2862;&#2881;&#2817; &#2831;&#2852;&#2854;&#2893;&#2929;&#2878;&#2864;&#2878; &#2872;&#2893;&#2860;&#2880;&#2837;&#2878;&#2864; &#2837;&#2864;&#2881;&#2843;&#2879; &#2863;&#2887; &#2862;&#2891; &#2854;&#2893;&#2929;&#2878;&#2864;&#2878; &#2858;&#2893;&#2864;&#2854;&#2852;&#2893;&#2852; &#2825;&#2858;&#2864;&#2891;&#2837;&#2893;&#2852; &#2872;&#2882;&#2842;&#2856;&#2878; &#2872;&#2848;&#2879;&#2837; &#2821;&#2847;&#2887;&#2404;';
$decrationRule2 = '&#2862;&#2891;&#2864; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879; &#2858;&#2864;&#2879;&#2872;&#2864; &#2860;&#2883;&#2854;&#2893;&#2855;&#2879; &#2837;&#2864;&#2879;&#2860;&#2878;&#2837;&#2881; &#2862;&#2881;&#2817; &#2831;&#2873;&#2879; &#2821;&#2858; &#2872;&#2893;&#2837;&#2879;&#2866;&#2879;&#2841;&#2893;&#2839;  &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;&#2864;&#2887; &#2858;&#2846;&#2893;&#2844;&#2879;&#2837;&#2883;&#2852;  &#2873;&#2887;&#2860;&#2878;&#2837;&#2881; &#2840;&#2891;&#2871;&#2851;&#2878; &#2837;&#2864;&#2881;&#2843;&#2879;&#2404;';
$decrationRule3 = '&#2837;&#2891;&#2864;&#2872;&#2887;&#2864;&#2878; &#2858;&#2893;&#2866;&#2878;&#2847;&#2859;&#2864;&#2893;&#2862;&#2864;&#2887; &#2858;&#2846;&#2893;&#2844;&#2879;&#2837;&#2883;&#2852; &#2873;&#2887;&#2860;&#2878;&#2858;&#2864;&#2887; &#2862;&#2891;&#2864; &#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#2822;&#2864;&#2862;&#2893;&#2861; &#2873;&#2887;&#2860;&#2878; &#2872;&#2862;&#2893;&#2860;&#2856;&#2893;&#2855;&#2864;&#2887; &#2862;&#2881;&#2817; &#2872;&#2893;&#2929;&#2880;&#2837;&#2883;&#2852;&#2879; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856; &#2837;&#2864;&#2881;&#2843;&#2879;&#2404; &#2831;&#2873;&#2879; &#2858;&#2893;&#2866;&#2878;&#2847;&#2859;&#2864;&#2893;&#2862;&#2837;&#2881; &#2860;&#2893;&#2911;&#2860;&#2873;&#2878;&#2864; &#2837;&#2864;&#2879;&#2860;&#2878;&#2837;&#2881; &#2821;&#2856;&#2881;&#2862;&#2852;&#2879; &#2823;&#2862;&#2887;&#2866; &#2862;&#2878;&#2855;&#2893;&#2911;&#2862;&#2864;&#2887; &#2862;&#2891; &#2858;&#2878;&#2838;&#2837;&#2881; &#2822;&#2872;&#2879;&#2860;&#2404; ';

$decrationRule4 ='&#2822;&#2837;&#2893;&#2847;&#2879;&#2861;&#2887;&#2872;&#2856; &#2866;&#2879;&#2841;&#2893;&#2837; &#2858;&#2878;&#2823;&#2860;&#2878;&#2858;&#2864;&#2887; &#2831;&#2873;&#2878;&#2837;&#2881; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2837;&#2893;&#2871;&#2862; &#2837;&#2864;&#2878;&#2823;&#2860;&#2878; &#2862;&#2891; &#2854;&#2878;&#2911;&#2879;&#2852;&#2893;&#2929;&#2404;';

$decrationRule5 ='&#2862;&#2881;&#2817; &#2872;&#2893;&#2860;&#2880;&#2837;&#2878;&#2864; &#2837;&#2864;&#2881;&#2843;&#2879; &#2863;&#2887; &#2863;&#2887;&#2837;&#2892;&#2851;&#2872;&#2879; &#2852;&#2878;&#2864;&#2879;&#2838;&#2864;&#2887; &#2862;&#2852;&#2887; &#2823;&#2862;&#2887;&#2866; &#2822;&#2872;&#2879;&#2866;&#2887; &#2872;&#2881;&#2854;&#2893;&#2855;&#2878; &#2831;&#2873;&#2879; &#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#2872;&#2878;&#2864;&#2879;&#2860;&#2878;&#2864; &#2870;&#2887;&#2871; &#2852;&#2878;&#2864;&#2879;&#2838; &#2921;&#2918; &#2849;&#2879;&#2872;&#2887;&#2862;&#2893;&#2860;&#2864;&#44; &#2920;&#2918;&#2920;&#2918;&#2404;';
$decrationRule6 ='&#2921;&#2918; &#2849;&#2876;&#2879;&#2872;&#2887;&#2862;&#2893;&#2860;&#2864;&#44; &#2920;&#2918;&#2920;&#2918; &#2852;&#2878;&#2864;&#2879;&#2838; &#2872;&#2881;&#2854;&#2893;&#2855;&#2878; &#2862;&#2881;&#2817; &#2863;&#2854;&#2879; &#2831;&#2873;&#2879; &#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#2872;&#2878;&#2864;&#2879;&#2858;&#2878;&#2864;&#2879;&#2856;&#2853;&#2879;&#2860;&#2879;&#44;&#2852;&#2887;&#2860;&#2887; &#2858;&#2881;&#2851;&#2879;&#2853;&#2864;&#2887; &#2822;&#2837;&#2893;&#2872;&#2887;&#2872; &#2858;&#2878;&#2823;&#2817; &#2862;&#2881;&#2817; &#2854;&#2878;&#2860;&#2879; &#2837;&#2864;&#2879;&#2858;&#2878;&#2864;&#2879;&#2860;&#2879;&#2856;&#2879;&#2404;';
$decrationRule7 ='&#2862;&#2881;&#2817; &#2831;&#2852;&#2854;&#2893;&#2929;&#2878;&#2864;&#2878; &#2840;&#2891;&#2871;&#2851;&#2878; &#2837;&#2864;&#2881;&#2843;&#2879;&#2863;&#2887; &#2862;&#2881;&#2817; &#2835;&#2849;&#2876;&#2879;&#2870;&#2878;&#2864;&#2887; &#2858;&#2878;&#2848; &#2858;&#2850;&#2876;&#2879;&#2843;&#2879;&#47;&#2860;&#2864;&#2893;&#2852;&#2893;&#2852;&#2862;&#2878;&#2856; &#2835;&#2849;&#2876;&#2879;&#2870;&#2878;&#2864;&#2887; &#2860;&#2872;&#2860;&#2878;&#2872; &#2837;&#2864;&#2881;&#2843;&#2879; &#2831;&#2860;&#2818; &#2860;&#2864;&#2893;&#2852;&#2893;&#2852;&#2862;&#2878;&#2856; &#2837;&#2892;&#2851;&#2872;&#2879; &#2842;&#2878;&#2837;&#2879;&#2864;&#2879; &#2837;&#2864;&#2881;&#2856;&#2878;&#2873;&#2879;&#2817;&#2404;';
$decrationRule8 ='&#2862;&#2881;&#2817; &#2872;&#2893;&#2860;&#2880;&#2837;&#2883;&#2852;&#2879; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856; &#2837;&#2864;&#2881;&#2843;&#2879; &#2863;&#2887; &#2825;&#2858;&#2864;&#2891;&#2837;&#2893;&#2852; &#2840;&#2891;&#2871;&#2851;&#2878; &#2858;&#2852;&#2893;&#2864; &#2862;&#2891; &#2844;&#2893;&#2846;&#2878;&#2852;&#2872;&#2878;&#2864;&#2864;&#2887; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856; &#2837;&#2864;&#2878;&#2863;&#2878;&#2823;&#2843;&#2879;&#2404;';
$decrationRule9 = '&#2844;&#2878;&#2851;&#2879; &#2864;&#2838;&#2856;&#2893;&#2852;&#2881; &#2831;&#2873;&#2879; &#2872;&#2880;&#2862;&#2879;&#2852; &#2821;&#2860;&#2855;&#2879; &#2858;&#2893;&#2864;&#2862;&#2891;&#2872;&#2856;&#2878;&#2866; &#2872;&#2881;&#2863;&#2891;&#2839;&#2864;&#2887; &#2837;&#2887;&#2852;&#2887;&#2837; &#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;&#2864; &#2872;&#2878;&#2864;&#2893;&#2847;&#2879;&#2859;&#2879;&#2837;&#2887;&#2872;&#2856; &#2837;&#2862;&#2858;&#2893;&#2866;&#2879;&#2862;&#2887;&#2851;&#2893;&#2847;&#2878;&#2864;&#2880; &#2856;&#2881;&#2873;&#2887;&#2817;&#44; &#2831;&#2873;&#2879; &#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;&#2864;&#2887; &#2872;&#2878;&#2864;&#2893;&#2847;&#2879;&#2859;&#2879;&#2837;&#2887;&#2847; &#2858;&#2878;&#2823;&#2860;&#2878;&#2858;&#2878;&#2823;&#2817; &#2822;&#2860;&#2870;&#2893;&#2911;&#2837; &#2859;&#2879; &#2858;&#2893;&#2864;&#2878;&#2864;&#2893;&#2853;&#2880;&#2841;&#2893;&#2837;&#2881; &#2856;&#2879;&#2844;&#2887; &#2858;&#2888;&#2848; &#2837;&#2864;&#2879;&#2860;&#2878;&#2837;&#2881; &#2858;&#2849;&#2879;&#2860;&#2404;';

$enterhere ='&#2831;&#2848;&#2878;&#2864;&#2887; &#2831;&#2851;&#2893;&#2847;&#2864; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;';

$information = '&#2872;&#2882;&#2842;&#2856;&#2878;';

$information1 = '&#2831;&#2873;&#2879; &#2837;&#2891;&#2864;&#2893;&#2872; &#2858;&#2878;&#2823;&#2817; &#2858;&#2846;&#2893;&#2844;&#2879;&#2837;&#2864;&#2851; &#39;&#2859;&#2878;&#2871;&#2893;&#2847; &#2837;&#2862;&#2893; &#2859;&#2878;&#2871;&#2893;&#2847; &#2872;&#2864;&#2893;&#2861;&#39; &#2856;&#2880;&#2852;&#2879;&#2864;&#2887; &#2837;&#2864;&#2878;&#2863;&#2879;&#2860;&#2404; &#2863;&#2887;&#2825;&#2817; &#2858;&#2864;&#2893;&#2863;&#2893;&#2911;&#2856;&#2893;&#2852; &#2862;&#2878;&#2839;&#2851;&#2878; &#2858;&#2846;&#2893;&#2844;&#2879;&#2837;&#2864;&#2851; &#2866;&#2839;&#2879;&#2856; &#2860;&#2893;&#2911;&#2860;&#2872;&#2893;&#2853;&#2878; &#2842;&#2878;&#2866;&#2881; &#2821;&#2843;&#2879;&#44; &#2872;&#2887; &#2858;&#2864;&#2893;&#2863;&#2893;&#2911;&#2856;&#2893;&#2852; &#2858;&#2846;&#2893;&#2844;&#2879;&#2837;&#2864;&#2851; &#2837;&#2864;&#2879;&#2873;&#2887;&#2860;&#2404;';
$information2 = '&#2837;&#2891;&#2864;&#2872;&#2887;&#2864;&#2878; &#2858;&#2893;&#2866;&#2878;&#2847;&#2859;&#2864;&#2893;&#2862;&#2864;&#2887; &#2858;&#2846;&#2893;&#2844;&#2879;&#2837;&#2864;&#2851; &#2837;&#2864;&#2879;&#2860;&#2878;&#2864; &#2870;&#2887;&#2871; &#2852;&#2878;&#2864;&#2879;&#2838; &#2921;&#2918; &#2821;&#2837;&#2893;&#2847;&#2891;&#2860;&#2864; &#2920;&#2918;&#2920;&#2918;&#46;&#2831;&#2873;&#2879; &#2852;&#2878;&#2864;&#2879;&#2838; &#2858;&#2864;&#2887; &#2822;&#2825; &#2858;&#2846;&#2893;&#2844;&#2879;&#2837;&#2864;&#2851; &#2837;&#2864;&#2878;&#2863;&#2878;&#2823;&#2858;&#2878;&#2864;&#2879;&#2860; &#2856;&#2878;&#2873;&#2879;&#2817;&#2404;';
$information3 = '&#2822;&#2858;&#2851; &#2854;&#2887;&#2823;&#2853;&#2879;&#2860;&#2878; &#2859;&#2891;&#2856; &#2856;&#2862;&#2893;&#2860;&#2864; &#2831;&#2860;&#2818; &#2823; &#2862;&#2887;&#2866; &#2848;&#2879;&#2837;&#2851;&#2878; &#2872;&#2862;&#2893;&#2858;&#2882;&#2864;&#2893;&#2851; &#2872;&#2848;&#2879;&#2837; &#2873;&#2891;&#2823;&#2853;&#2879;&#2860;&#2878; &#2825;&#2842;&#2879;&#2852; &#2831;&#2860;&#2818; &#2872;&#2887;&#2839;&#2881;&#2849;&#2879;&#2837;&#2881; &#2822;&#2858;&#2851; &#2856;&#2879;&#2911;&#2862;&#2879;&#2852; &#2860;&#2893;&#2911;&#2860;&#2873;&#2878;&#2864; &#2837;&#2864;&#2881;&#2853;&#2879;&#2860;&#2878; &#2822;&#2860;&#2870;&#2893;&#2911;&#2837;&#2404;';
$information4 = '&#2822;&#2858;&#2851; &#2831;&#2873;&#2879; &#2858;&#2891;&#2864;&#2893;&#2847;&#2878;&#2866;&#2864;&#2887; &#2858;&#2846;&#2893;&#2844;&#2879;&#2837;&#2864;&#2851; &#2837;&#2864;&#2879;&#2860;&#2878; &#2858;&#2864;&#2887; &#2856;&#2879;&#2911;&#2862;&#2879;&#2852; &#2860;&#2893;&#2911;&#2860;&#2855;&#2878;&#2856;&#2864;&#2887; &#2856;&#2879;&#2844; &#2823;&#45;&#2862;&#2887;&#2866;&#2837;&#2881; &#2837;&#2891;&#2864;&#2872;&#2887;&#2864;&#2878;&#2864;&#2881; &#2831;&#2837; &#2822;&#2837;&#2893;&#2847;&#2879;&#2861;&#2887;&#2872;&#2856; &#2866;&#2879;&#2841;&#2893;&#2837; &#2858;&#2878;&#2823;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2854;&#2887;&#2838;&#2881; &#2853;&#2878;&#2822;&#2856;&#2893;&#2852;&#2881;&#2404;';
$information5 = '&#2822;&#2858;&#2851; &#2825;&#2837;&#2893;&#2852; &#2822;&#2837;&#2893;&#2847;&#2879;&#2861;&#2887;&#2872;&#2856; &#2866;&#2879;&#2841;&#2893;&#2837; &#2858;&#2878;&#2823;&#2860;&#2878; &#2858;&#2864;&#2887;&#44; &#2854;&#2879;&#2822;&#2863;&#2878;&#2823;&#2853;&#2879;&#2860;&#2878; &#2858;&#2854;&#2893;&#2855;&#2852;&#2879; &#2862;&#2878;&#2855;&#2893;&#2911;&#2862;&#2864;&#2887; &#2837;&#2891;&#2864;&#2872;&#2887;&#2864;&#2878; &#2858;&#2891;&#2864;&#2893;&#2847;&#2878;&#2866;&#2837;&#2881; &#2858;&#2893;&#2864;&#2860;&#2887;&#2870; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;&#2404;&#2831;&#2873;&#2878;&#2858;&#2864;&#2887; &#2822;&#2858;&#2851; &#2856;&#2879;&#2844; &#2837;&#2891;&#2864;&#2893;&#2872; &#2837;&#2864;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2858;&#2893;&#2864;&#2872;&#2893;&#2852;&#2881;&#2852; &#2873;&#2891;&#2823;&#2858;&#2878;&#2864;&#2879;&#2860;&#2887;&#2404;';
$information6 = '&#2862;&#2856;&#2887; &#2864;&#2838;&#2856;&#2893;&#2852;&#2881;&#44; &#2831;&#2873;&#2879; &#2858;&#2891;&#2864;&#2893;&#2847;&#2878;&#2866;&#2404;&#2860;&#2893;&#2911;&#2860;&#2873;&#2878;&#2864; &#2837;&#2864;&#2879; &#2858;&#2850;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2822;&#2858;&#2851;&#2841;&#2893;&#2837;&#2864; &#2870;&#2887;&#2871; &#2852;&#2878;&#2864;&#2879;&#2838; &#2921;&#2918; &#2849;&#2879;&#2872;&#2887;&#2862;&#2893;&#2860;&#2864; &#44;&#2920;&#2918;&#2920;&#2918;&#2404; &#2831;&#2873;&#2879; &#2852;&#2878;&#2864;&#2879;&#2838; &#2858;&#2864;&#2887; &#2822;&#2858;&#2851; &#2861;&#2879; &#2858;&#2891;&#2864;&#2893;&#2847;&#2878;&#2866;&#2837;&#2881; &#2822;&#2825; &#2860;&#2893;&#2911;&#2860;&#2873;&#2878;&#2864; &#2837;&#2864;&#2879;&#2858;&#2864;&#2860;&#2887; &#2856;&#2878;&#2873;&#2879;&#2817;&#44; &#2852;&#2887;&#2851;&#2881; &#2825;&#2858;&#2864;&#2891;&#2837;&#2893;&#2852; &#2872;&#2862;&#2911;&#2872;&#2880;&#2862;&#2878; &#2862;&#2855;&#2893;&#2911;&#2864;&#2887; &#2822;&#2858;&#2851; &#2842;&#2911;&#2856; &#2837;&#2864;&#2879;&#2853;&#2879;&#2860;&#2878; &#2837;&#2891;&#2864;&#2893;&#2872; &#2831;&#2860;&#2818; &#2872;&#2878;&#2864;&#2893;&#2847;&#2879;&#2859;&#2879;&#2837;&#2887;&#2872;&#2856;&#2837;&#2881; &#2872;&#2862;&#2878;&#2858;&#2893;&#2852; &#2837;&#2864;&#2879;&#2860;&#2878;&#2837;&#2881; &#2842;&#2887;&#2871;&#2893;&#2847;&#2878; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;&#2404;';
$information7 = '&#2837;&#2891;&#2864;&#2872;&#2887;&#2864;&#2878; &#2854;&#2893;&#2929;&#2878;&#2864;&#2878; &#2858;&#2893;&#2864;&#2854;&#2852;&#2893;&#2852; &#2872;&#2862;&#2872;&#2893;&#2852; &#2825;&#2856;&#2893;&#2856;&#2852; &#2862;&#2878;&#2856;&#2864; &#2837;&#2891;&#2864;&#2893;&#2872;&#2864; &#2852;&#2878;&#2866;&#2879;&#2837;&#2878; &#2831;&#2848;&#2878;&#2864;&#2881; &#2854;&#2887;&#2838;&#2879;&#2873;&#2887;&#2860;&#2404;';

$totalRegistered = '&#2862;&#2891;&#2847; &#2858;&#2887;&#2844;&#2893; &#2861;&#2879;&#2844;&#2879;&#2847;&#2864;&#2841;&#2893;&#2837; &#2872;&#2818;&#2838;&#2893;&#2911;&#2878;';

$mobileNo = '&#2862;&#2891;&#2860;&#2878;&#2823;&#2866; &#2856;&#2862;&#2893;&#2860;&#2864;&#2893;';
$colRedgId = '&#2837;&#2866;&#2887;&#2844;&#47;&#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856;&#2864; &#2864;&#2891;&#2866; &#47; &#2858;&#2846;&#2893;&#2844;&#2879;&#2837;&#2883;&#2852; &#2856;&#2862;&#2893;&#2860;&#2864;';
$strCourses = '&#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;';
$otherCourse = '&#2821;&#2856;&#2893;&#2911;&#2878;&#2856;&#2893;&#2911; &#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;';
$branch = '&#2860;&#2879;&#2861;&#2878;&#2839;&#47; &#2849;&#2879;&#2872;&#2879;&#2858;&#2893;&#2866;&#2880;&#2856;';
$semester = '&#2872;&#2887;&#2862;&#2879;&#2871;&#2893;&#2847;&#2864;';
$interestedCourse = '&#2822;&#2839;&#2893;&#2864;&#2873; &#2853;&#2879;&#2860;&#2878; &#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;';
$colInstitue = '&#2837;&#2866;&#2887;&#2844;&#47; &#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856;&#2864; &#2856;&#2878;&#2862;';
$otherInstitute = '&#2821;&#2856;&#2893;&#2911; &#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856;&#2864; &#2856;&#2878;&#2862;';
$select = '&#2842;&#2911;&#2856; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;';
$declarationSap1 = 'I hereby confirm that all the above information furnished by me is correct.';
$declarationSap2 = 'I hereby declare that I am willing to undertake this upskilling program to improve the employability.';
$declarationSap3 = 'I am giving my consent to evaluate my application for selection process if any.';
$declarationSap4 = 'I agree to pay a subsidized fee towards the course applied in case my application is approved for upskilling program. The details of the fee collection will be intimated by respective colleges.';
$declarationSap5 = 'I hereby agree that my access to the SAP ERP course will start only after activating the access as indicated next steps. The activation link to the platform will be available to me in my email.';
$declarationSap6 = 'I am responsible to activate my access once I get the activation link.';
$declarationSap7 = 'I understand that my access to the platform within 6 months of activation or date specified by my institute or OSDA whichever is earlier. I am responsible to complete the course within that timeline.';
$declarationSap8 = 'I agree to complete the course and related certification (if any) within the activation period after that period I will not claim for access to the platform or course.';
$declarationSap9 = 'I hereby declare that I am studying in Odisha in the proposed Technical / Professional Institutes as mentioned in the registration page. I understand if I choose Others in the Institution name, then I may not be considered for the program.';

$informationSap1 = 'The registration is based on first-cum-first serve basis only till the registration logins lasts';
$informationSap2 = 'Last Date for registering your free access to SAP is 29th August 2020. No further registration will be allowed after 29th August 2020.';
$informationSap3 = 'The modules available for skilling is ABAP, SD, MM, HCM, FI etc. You are required to complete your training program as per the schedule and appear for the certification as per the module opted.';
$informationSap4 = 'You can choose one module for skilling only.';
$informationSap5 = 'Please note that this is only applicable to select colleges initially. Based on the response we may include additional colleges.';
$informationSap6 = 'Please make sure that the information furnished you are correct and your contact (phone and email) will be the one which you will be accessing regularly.';
$informationSap7 = 'Your application will be sent to your college which you have given in the form and validated';
$informationSap8 = 'Once you submit your details in this portal, please contact your institute and check your email address regularly for the next steps.  ';
$informationSap9 = 'Post submission of application, there could be an evaluation test to select students for this program. ';
$informationSap10 = 'After selection of your application for the program, you may expect to receive an activation link from SAP.';
$informationSap11 = 'Once you get the activation link in your email, please click on that and follow the steps to activate your access to the platform.';
$informationSap12 = 'The details of the courses available can be accessed here.';
$terms = '&#2862;&#2881;&#2817; &#2831;&#2853;&#2879;&#2864;&#2887; &#2872;&#2873;&#2862;&#2852;&#2404;';
$sucssMsg   = "Thank you for showing interest in the Special Skill Development Program!
At this point of time the registrations for the program is completed. Kindly keep visiting the Special Skill Development Page for further details.";
  }  
?>