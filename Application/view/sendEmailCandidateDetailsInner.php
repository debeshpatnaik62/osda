<?php
    /* ================================================
    File Name         	: sendEmailCandidateDetailsInner.php
    Description		: This page is used to view  Venue Tag details.
    Author Name		: Rahul Kumar saw
    Date Created	: 21-April-2021
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsVenueTagged
    Functions Used	: manageVenueTag
    ==================================================*/
   
    include_once( CLASS_PATH.'clsVenueTagged.php');
    $objVenueTag         = new clsVenueTagged;	
    
   
    //======================= Permission ===========================*/
    $glId          = $_REQUEST['GL'];
    $plId          = $_REQUEST['PL'];
    $userId        = $_SESSION['adminConsole_userID'];
    $pageName      = $_REQUEST['PAGE'].'.php';
    $explPriv      = $objVenueTag->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
    $editPriv      = $explPriv['edit'];
    $deletePriv    = $explPriv['delete'];
    $noAdd         = $explPriv['add'];
    $noActive      = $explPriv['active'];
    $noPublish     = $explPriv['publish'];
    //======================= Pagination ===========================*/
	
	
        
       $intDistid          = (isset($_REQUEST['ddlDistrict']) && $_REQUEST['ddlDistrict'] != '')?$_REQUEST['ddlDistrict']:0;
       $venueId            = (isset($_REQUEST['ddlVenue']) && $_REQUEST['ddlVenue'] != '')?$_REQUEST['ddlVenue']:0;
       //$intSkill                = (isset($_REQUEST['selSkill']) && $_REQUEST['selSkill'] != '')?$_REQUEST['selSkill']:0;
       $regdType           = (isset($_POST['selRegdType']) && $_POST['selRegdType']!= '')?$_POST['selRegdType']:REGD_PHASE;
       $strStartDt         = (isset($_REQUEST['txtStartDt'])&& $_REQUEST['txtStartDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtStartDt'])):'0000-00-00';
       $strEndDate         = (isset($_REQUEST['txtEndDt'])&& $_REQUEST['txtEndDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtEndDt'])):'0000-00-00';
       //============ Search Function ========================//
        if(isset($_REQUEST['btnSearch']))
        {

            $intPgno            = 1;
            $intRecno           = 0;
          
        }
    
        
         //============= Delete/Active/Inactive function =================
            /*if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
            {
                $qs                     = $_REQUEST['hdn_qs'];
                $ids                    = $_REQUEST['hdn_ids'];
                $outMsg                 = $objVenueTag->deleteEmpDirectory($qs,$ids);
            }*/
           
        $result                 = $objVenueTag->manageVenueTagged('EV',0,'',0,0,$intDistid,$venueId,'1000-01-01','00:00:00',$regdType,$strStartDt,$strEndDate,0);
           
      
        
        
    
?>