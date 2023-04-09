<?php
    /* ================================================
    File Name       : viewPanelTagInner.php
    Description     : This page is used to view  candidate Tag details.
    Author Name     : Rahul Kumar saw
    Date Created    : 05-Aug-2021
    Update History  :
    <Updated by>        <Updated On>        <Remarks>

    Class Used      : clsPanel
    Functions Used  : managePanel
    ==================================================*/
   
    include_once( CLASS_PATH.'clsPanel.php');
    $objPanel               = new clsPanel; 
    
    //======================= Permission ===========================*/
    $glId          = $_REQUEST['GL'];
    $plId          = $_REQUEST['PL'];
    $userId        = $_SESSION['adminConsole_userID'];
    $pageName      = $_REQUEST['PAGE'].'.php';
    $explPriv      = $objPanel->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
    $editPriv      = $explPriv['edit'];
    $deletePriv    = $explPriv['delete'];
    $noAdd         = $explPriv['add'];
    $noActive      = $explPriv['active'];
    $noPublish     = $explPriv['publish'];
   
      $intLevel           = (isset($_REQUEST['ddlLevel']) && $_REQUEST['ddlLevel'] != '')?$_REQUEST['ddlLevel']:2;
      $regdType           = (isset($_POST['selRegdType']) && $_POST['selRegdType']!= '')?$_POST['selRegdType']:REGD_PHASE;
      $strStartDt         = (isset($_REQUEST['txtStartDt'])&& $_REQUEST['txtStartDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtStartDt'])):'0000-00-00';
      $strEndDate         = (isset($_REQUEST['txtEndDt'])&& $_REQUEST['txtEndDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtEndDt'])):'0000-00-00';
       //============ Search Function ========================//
        if(isset($_REQUEST['btnSearch']))
        {

            $intPgno            = 1;
            $intRecno           = 0;
          
        }
    
        
       
        $result                 = $objPanel->managePanel('VE',0,0,0,'','','','','','','','',0,0,0,0,$strStartDt,$strEndDate,$intLevel,$regdType);
           
        
        
    
?>