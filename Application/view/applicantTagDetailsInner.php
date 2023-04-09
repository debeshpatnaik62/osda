<?php
    /* ================================================
    File Name           : applicantTagDetailsInner.php
    Description			: This page is used to view Applicant Details.
    Author Name			: Rahul Kumar Saw
    Date Created		: 27-April-2021	
    Update History		:
    <Updated by>		<Updated On>		<Remarks>

    Class Used			: clsAnganwadiDetails
    Functions Used		: manageAnganwadiDetails,deleteCorse
    ==================================================*/
     include_once( CLASS_PATH.'clsVenueTagged.php');
        //print_r($_SESSION);exit;
    $objVenueTag        = new clsVenueTagged;   

    //$language		= (isset($_COOKIE['language']) && $_COOKIE['language']!='')?$_COOKIE['language']:'E';
    $skillId          	= (isset($_SESSION['skillId']))?$_SESSION['skillId']:0;
    $distId          	= (isset($_SESSION['distId']))?$_SESSION['distId']:0;
    $venueId          	= (isset($_SESSION['venueId']))?$_SESSION['venueId']:0;
    $regdType           = (isset($_SESSION['regdType']))?$_SESSION['regdType']:0;
    
    if($skillId>0 && $distId>0 && $venueId>0)
    {
        //$selVal 	= $_REQUEST['selVal'];
        /*$skillId 	= $_REQUEST['skillId'];
        $distId 	= $_REQUEST['distId'];
        $venueId 	= $_REQUEST['venueId'];*/
       	$result     = $objVenueTag->manageVenueTagged('VT',0,'',$regdType,$skillId,$distId,$venueId,'1000-01-01','00:00:00',0,'','',0);
       
        //$trainingResult         = $objassignment->manageAssignment("V",0,0,0,$traingid,$batchid,0,$centerid,1,0,'');   
    }
?>