<?php
 /* ================================================
	  File Name         	  : viewMemberInner.php
	  Description		      : This page is to view Become a member details.
	  Date Created            : 30-03-2017
	  Devloped By		      : Arpita Rath
	  Devloped On		      : 30-03-2017
	  Update History	      :
	  <Updated by>		        <Updated On>		<Remarks>
	  Include Functions	      : manageMember(), deleteMember()
================================================== */
//=========== include class path =======================//
         include_once(CLASS_PATH.'clsMember.php');

//========== create Object =================//
    	 $objMember   =   new   clsMember;

//======= default value for paging ==============//
	     $isPaging    =   0;
	     $pgFlag      =   0;
	     $intPgno     =   1;
	     $intRecno    =   0;
	     $ctr         =   0;
	     $intPgSize   =   20;
             $intSector   =   0;
//============= Permission =====================//
	     $glId        =   $_REQUEST['GL'];
	     $plId        =   $_REQUEST['PL'];
	     $pageName    =   $_REQUEST['PAGE'].'.php';
	     $userId      =   $_SESSION['adminConsole_userID'];
	     $explPriv    =   $objMember->checkPrivilege($userId, $glId, $plId, $pageName, 'V');  
	     $deletePriv  =   $explPriv['delete'];
	     $noActive    =   $explPriv['active'];
	     $noPublish   =   $explPriv['publish'];

//============== Pagination ===================//
        if($_REQUEST['hdn_IsPaging']!="" && $_REQUEST['hdn_IsPaging'] >0)
	            $isPaging=1;
	    if($_REQUEST['hdn_PageNo']!=""  && $_REQUEST['hdn_PageNo'] >0)
	    {
	            $intPgno=$_REQUEST['hdn_PageNo'];
	            $pgFlag	= 1;
	    }
	    if($_REQUEST['hdn_RecNo']!=""  && $_REQUEST['hdn_RecNo'] >0)
	    {	
	            $intRecno=$_REQUEST['hdn_RecNo'];
	            $pgFlag	= 1;
	    }
	    if($isPaging==0 && $_REQUEST['hdn_PageNo']=='' && $_REQUEST['ID']>0)
	    {
	            $intRecno	= (isset($_SESSION['paging']['recNo']) && $_SESSION['paging']['recNo']>0)?$_SESSION['paging']['recNo']:$intRecno;
	            $intPgno	= (isset($_SESSION['paging']['pageNo']) && $_SESSION['paging']['pageNo']>0)?$_SESSION['paging']['pageNo']:$intPgno;		
	    }
	    else	
	            unset($_SESSION['paging']); 

	   	   $strName    = (isset($_REQUEST['txtSearch']) && $_REQUEST['txtSearch'] != '')?$_REQUEST['txtSearch']:'';
	   	   $intSector  = (isset($_REQUEST['ddlSector']) && $_REQUEST['ddlSector'] != '')?$_REQUEST['ddlSector']:'0';
	   	   $strStartDt = (isset($_REQUEST['txtStartDt']) && $_REQUEST['txtStartDt'] != '')?date(strtotime($_REQUEST['txtStartDt'])):'0000-00-00';

//============ Serach Function =====================//
    if(isset($_REQUEST['btnSearch'])) {
    	 $intPgno        = 1;
         $intRecno       = 0;
    	 $strName        = trim($_REQUEST['txtSearch']);
    	 $intSector      = $_REQUEST['ddlSector'];
    	 $strStartDt     = (isset($_REQUEST['txtStartDt']) && $_REQUEST['txtStartDt'] != '')?date('Y-m-d',strtotime($_REQUEST['txtStartDt'])):'0000-00-00';
    }	   	   

//======================= Delete Record =======================//
       if(isset($_REQUEST['hdn_qs']) && $_REQUEST['hdn_qs']!='') 
       {
       	    $qs       =   $_REQUEST['hdn_qs'];
       	    $ids      =   $_REQUEST['hdn_ids'];
       	    $outMsg   =   $objMember->deleteMember($qs,$ids);    
       }

//================= View Become a Member Record =============//
        if($isPaging == 0)
         {
         	 $result    = $objMember->manageMember('PG',$intRecno,$strName,'','',$intSector,0,'',0,$intPgSize,0,$strStartDt); 
         }	else {
         	 $intPgno   = 1;
         	 $intRecno  = 1;
         	 $result    = $objMember->manageMember('V',0,$strName,'','',$intSector,0,'',0,0,0,$strStartDt);
         }
        $totalResult	= $objMember->manageMember('V',0,$strName,'','',$intSector,0,'',0,0,0,$strStartDt);
        $intTotalRec	= mysqli_num_rows($totalResult); 
        $intCurrPage	= $intPgno;    
        $_SESSION['paging']['recNo']  = $intRecno;
        $_SESSION['paging']['pageNo'] = $intPgno; 
?>