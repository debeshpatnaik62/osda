<?php

/* ================================================
File Name               : share-your-storyInner.php
Description              : This page is to add Share your story
Date Created              : 27-03-2017
Created By              : Arpita Rath
Update History          :
<Updated by>                <Updated On>        <Remarks>
================================================== */
//============= include class path ============ //
include_once CLASS_PATH . 'clsNanoUnicorn.php';
include_once 'nano-unicornContent.php';

    
//=========== create object ================= //
$objNano = new clsNanoUnicorn;

$selDistrict = 0;
$errFlag = 0;
$strPageTtlcls = $strLangCls;

$strDOBLevel = 'Date Of Birth';
$strTrainingLevel = ' Have you undertaken any skill training at ITI under PMKVY, DDU-GKY ,OSEM approved  short-term trainings or any technical Diploma courses ?';

if ($_SESSION['lang'] == 'O') {

    $strDOBLevel = '&#2844;&#2856;&#2893;&#2862; &#2852;&#2878;&#2864;&#2879;&#2838;';
    $strTrainingLevel = '  &#2822;&#2858;&#2851; &#2837;&#2892;&#2851;&#2872;&#2879; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823;&#2864;&#2881; &#2858;&#2879;&#2831;&#2862;&#2837;&#2887;&#2861;&#2879;&#2929;&#2878;&#2823;&#44; &#2849;&#2879;&#2849;&#2879;&#2911;&#2881;&#45;&#2844;&#2879;&#2837;&#2887;&#2929;&#2878;&#2823; &#2821;&#2855;&#2880;&#2856;&#2864;&#2887; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862;&#44; &#2835;&#2831;&#2872;&#2823;&#2831;&#2862; &#2854;&#2893;&#2869;&#2878;&#2864;&#2878; &#2821;&#2856;&#2881;&#2862;&#2891;&#2854;&#2879;&#2852; &#2872;&#2893;&#2929;&#2867;&#2893;&#2858; &#2821;&#2860;&#2855;&#2879; &#2852;&#2878;&#2866;&#2879;&#2862; &#2837;&#2879;&#2862;&#2893;&#2860;&#2878; &#2837;&#2892;&#2851;&#2872;&#2879; &#2860;&#2888;&#2871;&#2911;&#2879;&#2837; &#2849;&#2879;&#2858;&#2893;&#2866;&#2891;&#2862;&#2878; &#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;&#2864;&#2887; &#2870;&#2879;&#2837;&#2893;&#2871;&#2878;&#2866;&#2878;&#2861; &#2837;&#2864;&#2879;&#2843;&#2856;&#2893;&#2852;&#2879; &#2837;&#2879; &#63;<br/>';

}
//============ Button Submit ===================
if (isset($_POST['btnSubmitNano'])) {
    //echo "xsacdcd";
    //print_r($_POST);exit;
    $result = $objNano->addNanoUnicorn(0);
    // echo $result;exit;
    $outMsg = $result['msg'];
    $errFlag = $result['errFlag'];
//echo $errFlag;exit;
    $strName = htmlspecialchars_decode($result['txtName'], ENT_QUOTES);
    $selDistrict = htmlspecialchars_decode($result['selDistrict'], ENT_QUOTES);
    $strPhone = $result['txtPhone'];
    $strBusiness = htmlspecialchars_decode($result['txtBusiness'], ENT_QUOTES);
    $strDOB = (isset($result['strDOB'])) ? date('d-M-Y', strtotime($result['strDOB'])) : '0000-00-00';
    $isTrainStatus = $result['isTrainStatus'];
    $selITI = $result['intInstitute'];
    $selTrade = $result['intTrade'];
    $redirectLoc = ($errFlag == 0) ? SITE_URL . (($_REQUEST['PG'] != '' ? $_REQUEST['PG'] : '')) . (($_REQUEST['GL'] != '' ? '/' . $_REQUEST['GL'] : '')) . (($_REQUEST['PL'] != '' ? '/' . $_REQUEST['PL'] : '')) . (($_REQUEST['NID'] != '' ? '/' . $_REQUEST['NID'] : '')) : "";
}

$arrConditions = array(

    'pubStatus' => 2,
    'pageCount' => 30,

);

$nanoResult = $objNano->manageNanoUnicornDetail('V', $arrConditions);
