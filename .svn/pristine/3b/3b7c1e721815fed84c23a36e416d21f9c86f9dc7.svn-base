<?php
  /* ================================================
	  File Name                   : register-successInner.php
	  Description		      : This page is to addskill competetion form
	  Date Created		      : 20-Jan-2018	
	  Created By		      : T Ketaki Debadarshini
	  Update History	      :
	  <Updated by>				<Updated On>		<Remarks>
  ================================================== */
  //============= include class path ============ //
    include_once(CLASS_PATH.'clsSkillCompetition.php');

  //=========== create object ================= //
    $objCompete             = new  clsSkillCompetition;

    $strPageTtlcls          = $strLangCls; 
    $strRegisterForlbl      = $strSkillComplbl;
    /********************start : get skill details***************/
 
   
    $strParams               = (isset($_REQUEST['NID']) && $_REQUEST['NID']!='')?$objCompete->decrypt($_REQUEST['NID']):'';
    if($_REQUEST['NID']=='')
     $strParams               = (isset($_REQUEST['PARAM']) && $_REQUEST['PARAM']!='')?$objCompete->decrypt($_REQUEST['PARAM']):'';
    //print_r($strParams);exit;

   
    $aryParams               = explode('/', $strParams);
    

    $intRegNo                = ($aryParams[0]!='')?$aryParams[0]:0;
    $strAckid                = ($aryParams[1]!='')?$aryParams[1]:'';   
    $strUserData             = ($aryParams[2]!='')?$aryParams[2]:'';
    $strUserData          = ($strUserData!='')?explode(':~:',$strUserData):array();
    //exit;
    $strSecondName    = $strUserData[0];
    $strSecondCompId  = $strUserData[1];
    $strFirstName     = $strUserData[2];
    $strFirstCompId   = $strUserData[3];
   // print_r($strUserData);exit;
   
    $strLang                 = ($aryParams[3]!='')?$aryParams[3]:'';   
   // echo $intRegNo;
//    if($strType=='mob')
           //$_SESSION['lang']      = ($strLang =='eng')?'E':'O';
     
    
    $strThankyoulbl             = 'Thank you for registration .';
    $strAcknolbl                = 'Your Acknowledgement No :';
    $strFuturelbl               = 'Please keep this for future communication.';
   
    
     if($_SESSION['lang']=='O'){
        $strThankyoulbl         = '&#2858;&#2846;&#2893;&#2844;&#2880;&#2837;&#2864;&#2851; &#2858;&#2878;&#2823;&#2817; &#2855;&#2856;&#2893;&#2911;&#2860;&#2878;&#2854; ';
        $strAcknolbl            = '&#2822;&#2858;&#2851;&#2841;&#2893;&#2837; &#2872;&#2893;&#2869;&#2880;&#2837;&#2883;&#2852;&#2879;&#2858;&#2852;&#2893;&#2864;&#2864; &#2856;&#2862;&#2893;&#2860;&#2864; :';
        $strFuturelbl           = '&#2861;&#2860;&#2879;&#2871;&#2893;&#2911;&#2852; &#2863;&#2891;&#2839;&#2878;&#2863;&#2891;&#2839; &#2858;&#2878;&#2823;&#2817; &#2854;&#2911;&#2878;&#2837;&#2864;&#2879; &#2831;&#2873;&#2878;&#2837;&#2881; &#2864;&#2838;&#2856;&#2893;&#2852;&#2881;';
     }
     
     if(isset($_SERVER['HTTPS']) &&  
            $_SERVER['HTTPS'] === 'on') 
                $link = "https"; 
                else
                    $link = "http"; 
            $link .= "://"; 
            $link .= $_SERVER['HTTP_HOST']; 
            $link .= $_SERVER['REQUEST_URI']; 
            $url= $link; 
            $shareMsg=" I have participated in Odisha's largest Skill Competition. If you think you got skills then join me now and show your skills to the world.";
     
?>
