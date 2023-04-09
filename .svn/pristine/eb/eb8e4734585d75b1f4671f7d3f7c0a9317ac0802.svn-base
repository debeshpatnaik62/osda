<?php

//========== create object of clsSkillDevelopment class=============== 
include_once( CLASS_PATH . 'clsSkillInformation.php');


$objInformation = new clsSkillInformation;


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
     
    $result = $objInformation->addUpdateskillInformation($id);

    //print_r($result);exit;
    $outMsg = $result['msg'];
    $flag = $result['flag'];
    //$redirectLoc        =  SITE_URL."skill-payment";
    $redirect   = ($errFlag==0)?SITE_URL."job-seeker-registration":'';
}
 


$odiaClass=($_SESSION['lang'] == 'O')?'odia':'';


$skillName ='Full Name';
$strAge  ='Age';
$strGender = 'Gender';
$strDistrict = 'District';
$strAddress = 'Address';
$qualification = 'Highest Qualification';
$applyingFor = 'Job Role Applying For ?';
$trainedRole ='Whether Trained in the job role ?';
$mobileNo = 'Mobile Number';
$skiEmail = 'Email Id';
$enterhere ='Enter here';
$moveOut = 'Ready to move out of the State?';
$select = 'Select';
$title = 'Job Seeker Registration Form';
$experience = 'Year(s) of experience';
$briefExperience = 'Brief about your previous experience';
$otherInfo = 'Any Other Information';

if ($_SESSION['lang'] == 'O') {
$strLangCls = 'odia';
$strNumLangCls = 'odianum';
$skillName ='&#2858;&#2881;&#2864;&#2878; &#2856;&#2878;&#2862;';
$skiEmail  ='&#2823;&#2862;&#2887;&#2866;';
$strAge  ='&#2860;&#2911;&#2872;';
$strGender = '&#2866;&#2879;&#2841;&#2893;&#2839;';
$strDistrict = '&#2850;&#2879;&#2872;&#2893;&#2847;&#2893;&#2864;&#2879;&#99;&#2847;&#2893;';
$strAddress = '&#2860;&#2864;&#2893;&#2852;&#2893;&#2852;&#2862;&#2878;&#2856; &#2848;&#2879;&#2837;&#2851;&#2878;';
$qualification = '&#2872;&#2864;&#2893;&#2860;&#2891;&#2842;&#2893;&#2842; &#2870;&#2879;&#2837;&#2893;&#2871;&#2878;&#2839;&#2852; &#2863;&#2891;&#2839;&#2893;&#2911;&#2852;&#2878;';
$applyingFor = '&#2837;&#2887;&#2825;&#2817; &#2842;&#2878;&#2837;&#2879;&#2864;&#2879;  &#2858;&#2878;&#2823;&#2817; &#2822;&#2860;&#2887;&#2854;&#2856; &#2837;&#2864;&#2881;&#2843;&#2856;&#2893;&#2852;&#2879; &#63;';
$trainedRole ='&#2872;&#2887; &#2858;&#2893;&#2864;&#2837;&#2878;&#2864; &#2842;&#2878;&#2837;&#2879;&#2864;&#2879;&#2864;&#2887; &#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2893;&#2864;&#2878;&#2858;&#2893;&#2852; &#2837;&#2879;&#63;';
$mobileNo = '&#2862;&#2891;&#2860;&#2878;&#2823;&#2866; &#2856;&#2862;&#2893;&#2860;&#2864;&#2893;';

$moveOut = '&#2864;&#2878;&#2844;&#2893;&#2911; &#2860;&#2878;&#2873;&#2878;&#2864;&#2837;&#2881; &#2863;&#2879;&#2860;&#2878;&#2837;&#2881; &#2858;&#2893;&#2864;&#2872;&#2893;&#2852;&#2881;&#2852; &#124;';

$enterhere ='&#2831;&#2848;&#2878;&#2864;&#2887; &#2831;&#2851;&#2893;&#2847;&#2864; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;';


$select = '&#2842;&#2911;&#2856; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;';
$title = '&#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879; &#2822;&#2870;&#2878;&#2911;&#2880;&#2841;&#2893;&#2837; &#2858;&#2846;&#2893;&#2844;&#2880;&#2837;&#2864;&#2851; &#2859;&#2864;&#2893;&#2862;';

$experience = '&#2821;&#2861;&#2879;&#2844;&#2893;&#2846;&#2852;&#2878; &#2860;&#2864;&#2893;&#2871;';
$briefExperience = '&#2858;&#2882;&#2864;&#2893;&#2860; &#2821;&#2861;&#2879;&#2844;&#2893;&#2846;&#2852;&#2878;';
$otherInfo = '&#2821;&#2856;&#2893;&#2911; &#2837;&#2879;&#2843;&#2879; &#2872;&#2882;&#2842;&#2856;&#2878;';

  }  
?>