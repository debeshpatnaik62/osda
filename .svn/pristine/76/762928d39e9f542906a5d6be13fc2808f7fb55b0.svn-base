<?php

//========== create object of clsStudent class=============== 
include_once( CLASS_PATH . 'clsStudent.php');
include_once( CLASS_PATH . 'clsEmployer.php');
include_once(CLASS_PATH  . 'clsSkillCompetition.php');
include_once( CLASS_PATH . 'clsTraining.php');
 
$objEmployer = new clsEmployer;
$objCompete = new clsSkillCompetition;
$objStudent = new clsStudent;
$objTraining = new clsTraining;

$strSubmit = ($id > 0) ? 'Update' : 'Submit';
$strReset = ($id > 0) ? 'Cancel' : 'Reset';
$strTab = ($id > 0) ? 'Edit' : 'Add';
$strclick = ($id > 0) ? "window.location.href='" . SITE_URL . "student/" . $glId . "/" . $plId . "';" : "";

$skillResults = $objCompete->manageSkillCompetition('SK', 0, 0, 0, '', '', '', '', 0, BLANK_DATE, '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, '', '', 0, 0, 0, BLANK_DATE, BLANK_DATE);

//========== Default variable ===============       

$flag = 0;
$errFlag = 0;
$outMsgD = '';
$activeTab='student';

//============ Student Form Submit ===================
if (!empty($_POST['student-submit'])) {
     // echo "sddghh";exit;
    
    $activeTab='student';
    $result = $objStudent->addUpdateStudent($id);

    //print_r($result);exit;
    $outMsgD = $result['msg'];
    $flag = $result['flag'];
    $formdata = $result['returnParams'];
    $strName     = ($flag==1)?htmlspecialchars_decode($formdata['name'], ENT_QUOTES):'';
    /* $strName = $formdata['txtName']; */
    $strMobile   = ($flag==1)?htmlspecialchars_decode($formdata['mobile'], ENT_QUOTES):'';
    $strEmail    = ($flag==1)?htmlspecialchars_decode($formdata['email'], ENT_QUOTES):'';
    $selDistrict = ($flag==1)?htmlspecialchars_decode($formdata['district'], ENT_QUOTES):'';
    $strMessage  = ($flag==1)?htmlspecialchars_decode($formdata['message'], ENT_QUOTES):'';
    $errFlag = $result['flag'];
    $redirectLoc = '';
    /*if ($flag == 0 && $id > 0)
        $redirectLoc = SITE_URL . "student/" . $glId . "/" . $plId . "/" . $id;
    else if ($flag == 0 && $id == 0)
        $redirectLoc = SITE_URL . "student/" . $glId . "/" . $plId;*/
}



//============Training Form Submit ===================
if (!empty($_POST['training-submit'])) {
      // echo "Tarining-form";exit;
    $activeTab='training';
    $result = $objTraining->addUpdateTraining($id);

    //print_r($result);exit;
   $outMsgD = $result['msg'];
    $flag = $result['flag'];
    $formdata = $result['returnParams'];
    $strNameTrn = ($flag==1)?htmlspecialchars_decode($formdata['name'], ENT_QUOTES):'';
    /* $strName = $formdata['txtName']; */
    $strMobileTrn  = ($flag==1)?htmlspecialchars_decode($formdata['mobile'], ENT_QUOTES):'';
    $strEmailTrn   = ($flag==1)?htmlspecialchars_decode($formdata['email'], ENT_QUOTES):'';
    $strInstitute  = ($flag==1)?htmlspecialchars_decode($formdata['institute'], ENT_QUOTES):'';
    $strMessageTrn = ($flag==1)?htmlspecialchars_decode($formdata['message'], ENT_QUOTES):'';
    $errFlag = $result['flag'];
    $redirectLoc = '';
  
}


//============ Employer Form Submit ===================
if (isset($_POST['employer-submit'])) {
    //echo "sddghh";exit;
    $activeTab='employer';
    $result = $objEmployer->addUpdateEmployer($id);
    //print_r($result);exit;
    $outMsgD = $result['msg'];
    $flag = $result['flag'];
    $formdata = $result['returnParams'];

    $strCompanyName = ($flag==1)?htmlspecialchars_decode($formdata['compname'], ENT_QUOTES):'';
    $strNameEmp = ($flag==1)?htmlspecialchars_decode($formdata['name'], ENT_QUOTES):'';
    /* $strName = $formdata['txtName']; */
    $strMobileEmp = ($flag==1)?htmlspecialchars_decode($formdata['mobile'], ENT_QUOTES):'';
    $strEmailEmp = ($flag==1)?htmlspecialchars_decode($formdata['email'], ENT_QUOTES):'';
    $strDesignation = ($flag==1)?htmlspecialchars_decode($formdata['desig'], ENT_QUOTES):'';
    $strSkills = ($flag==1)?htmlspecialchars_decode($formdata['skills'], ENT_QUOTES):'';
    $skillAry= explode('::', $strSkills);
    $strCandidates = ($flag==1)?htmlspecialchars_decode($formdata['candidates'], ENT_QUOTES):'';
    $strMessageEmp = ($flag==1)?htmlspecialchars_decode($formdata['message'], ENT_QUOTES):'';
    $errFlag = $result['flag'];
  
     $redirectLoc = "";
   
}

?>