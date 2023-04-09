<?php
    /* ================================================
    File Name           : candidateTagDetailsInner.php
    Description			: This page is used to view Applicant Details.
    Author Name			: Rahul Kumar Saw
    Date Created		: 05-Aug-2021	
    Update History		:
    <Updated by>		<Updated On>		<Remarks>

    Class Used			: clsAnganwadiDetails
    Functions Used		: manageAnganwadiDetails,deleteCorse
    ==================================================*/
     include_once( CLASS_PATH.'clsPanel.php');
        //print_r($_SESSION);exit;
    $objPanel        = new clsPanel;   

    //$language		= (isset($_COOKIE['language']) && $_COOKIE['language']!='')?$_COOKIE['language']:'E';
    $skillId          	= (isset($_SESSION['skillId']))?$_SESSION['skillId']:0;
    $distId          	= (isset($_SESSION['distId']))?$_SESSION['distId']:0;
    $panelId            = (isset($_SESSION['panelId']))?$_SESSION['panelId']:0;
    $levelId            = (isset($_SESSION['levelId']))?$_SESSION['levelId']:0;
    $regdType          	= (isset($_SESSION['regdType']))?$_SESSION['regdType']:0;
    
    if($skillId>0)
    {
        //$selVal 	= $_REQUEST['selVal'];
        /*$skillId 	= $_REQUEST['skillId'];
        $distId 	= $_REQUEST['distId'];
        $venueId 	= $_REQUEST['venueId'];*/
       	$result     = $objPanel->managePanel('VT',0,$panelId,$skillId,'','','','','','','','',$distId,0,0,0,'',$levelId,0,$regdType);
       
        //$trainingResult         = $objassignment->manageAssignment("V",0,0,0,$traingid,$batchid,0,$centerid,1,0,'');   
    }
?>