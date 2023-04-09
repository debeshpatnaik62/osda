<?php
//print_r($_REQUEST);
/* ================================================
	File Name        : addBannerInner.php
	Description	 : This page is used to add banner.
	Developed By	 : Rahul Kumar Saw
	Developed On	 : 08-06-2018
	Update History :
	<Updated by>		<Updated On>		<Remarks>

	Class Used		 : clsBanner
	Functions Used : readBanner(),addUpdateBanner(),
==================================================*/
//----- include class path for banner -------//
    //include_once(CLASS_PATH . 'clsBanner.php');
    include_once(CLASS_PATH."clsBanner.php");
//---- Create object --- //
    $objBanner       =  new  clsBanner;

    //$id            = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
    $id              = (isset($_REQUEST['ID']) && $_REQUEST['ID'] != '') ? $_REQUEST['ID']:0;
    $strSubmit       = ($id>0)?'Update':'Submit';
    $strReset        = ($id>0)?'Cancel':'Reset';
    $strTab          = ($id>0)?'Edit':'Add';

//========== Default variable ===============
    $flag               = 0;
    $errFlag            = 0;
    $intLinkType        = 1;
    $intWebLinkType     = 1;
    $tinShowpanel       = 1;
    $outMsg             = '';
    $strAlignment       = 0;
    $redirectLoc        = '';
    $glId          = $_REQUEST['GL'];
    $plId          = $_REQUEST['PL'];
 //=========== For Permission======================
    $strClick           = ($id>0)?"window.location='". APP_URL."viewBanner/".$glId."/".$plId."/".$id."'":"";

 //============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
            try {
                   $result             =  $objBanner->addUpdateBanner($id);
                   $outMsg             =  $result['msg'];
                   $errFlag            =  $result['errFlag'];
                   $strBnCpEng         =  $result['strBnCpEng'];
                   $strBnCpOdia        =  $result['strBnCpOdia'];
                   $strDescpEng        =  $result['strDescpEng'];
                   $strDescpOdia       =  $result['strDescpOdia'];
                   $intLinkType        =  $result['intLinkType'];
                   $strLink            =  $result['strLink'];
                   $intWebLinkType     =  $result['intWebLinkType'];
                   $intPgName          =  $result['intPgName'];
                   $strUrlName         =  $result['strUrlName'];
                   $strWebUrl          =  $result['strWebUrl'];
                   $strAlignment       =  $result['strAlignment'];
                   $strImageFile       =  $result['strImageFile'];
                   $intWinStatus       =  $result['intWinStatus'];
                   if($flag==0 && $id>0)
                    $redirectLoc	=  APP_URL."viewBanner/".$glId."/".$plId;
                   else if($flag==0 && $id==0)
                      $redirectLoc	=  APP_URL."viewBanner/".$glId."/".$plId;
             }
             catch(Exception $e) {
                 $outMsg = 'Something got wrong. Please try again..';
             }
	}

  //=========== For editing ======================

	if(isset($_REQUEST['ID']))
	{
            try {
             //============ Read value for updation ===========
                $result             =   $objBanner->readBanner($id);
                $strBnCpEng          =  $result['strBnCpEng'];
                $strBnCpOdia         =  $result['strBnCpOdia'];
                $strDescpEng         =  $result['strDescpEng'];
                $strDescpOdia        =  $result['strDescpOdia'];
                $intLinkType         =  $result['intLinkType'];
                $strLink             =  $result['strLink'];
                $intWebLinkType      =  $result['intWebLinkType'];
                $intPgName           =  $result['intPgName'];
                $strUrlName          =  $result['strUrlName'];
                $strWebUrl           =  $result['strWebUrl'];
                $strAlignment        =  $result['strAlignment'];
                $strImageFile        =  $result['strImageFile'];
                $intSlNo             =  $result['intSlNo'];
                $intWinStatus        =  $result['intWinStatus'];
                $vchMobileImage        =  $result['vchMobileImage'];
                $redirectLoc         =  ($errFlag==0)?APP_URL."viewBanner/".$glId."/".$plId."/".$id:'';
            }
           catch(Exception $e) {
                $outMsg = 'Something got wrong. Please try again..';
           }
	}
?>
