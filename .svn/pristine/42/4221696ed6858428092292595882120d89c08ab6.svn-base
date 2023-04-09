<?php
    /* ================================================
    File Name         	: viewSkillEventInner.php
    Description		: This page is used to view Skill News Details.
    Author Name		: Rahul Kumar Saw 
    Date Created	: 29-Dec-2021
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsSkillEvent
    Functions Used	: 
    ==================================================*/
    include_once( CLASS_PATH.'clsSkillEvent.php');
    $objNews      = new clsSkillEvent;	
    $isPaging     = 0;
    $pgFlag	      = 0;
    $intPgno	    = 1;
    $intRecno	    = 0;
    $ctr	        = 0;
    //======================= Permission ===========================*/
    $glId           = $_REQUEST['GL'];
    $plId           = $_REQUEST['PL'];
    $pageName       = $_REQUEST['PAGE'].'.php';
    $userId         = $_SESSION['adminConsole_userID'];
    $explPriv       = $objNews->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
    $editPriv       = $explPriv['edit'];
    $deletePriv     = $explPriv['delete'];
    $noAdd          = $explPriv['add'];
    $noActive       = $explPriv['active'];
    $noPublish      = $explPriv['publish'];
    //======================= Pagination ===========================*/
	
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
        //$newsCat	= 1;
        $strHeadlineE	= (isset($_REQUEST['txtHeadLineE'])&& $_REQUEST['txtHeadLineE']!='')?$_REQUEST['txtHeadLineE']:'';
        $strStartDt     = (isset($_REQUEST['txtStartDt'])&& $_REQUEST['txtStartDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtStartDt'])):'0000-00-00';
        $strEndDate     = (isset($_REQUEST['txtEndDt'])&& $_REQUEST['txtEndDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtEndDt'])):'0000-00-00';
        $selnews        = (isset($_REQUEST['selnews']) )?$_REQUEST['selnews']:0;
         //============= search function =================
         if(isset($_REQUEST['btnSearch']))
        	{
        		$intPgno	= 1;
            $intRecno	= 0;
            $strHeadlineE	= trim($_REQUEST['txtHeadLineE']);
            $strStartDt     = (isset($_REQUEST['txtStartDt'])&& $_REQUEST['txtStartDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtStartDt'])):'0000-00-00';
            $strEndDate     = (isset($_REQUEST['txtEndDt'])&& $_REQUEST['txtEndDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtEndDt'])):'0000-00-00';
        	}
        
        try{
                //============= Delete/Active/Inactive function =================
               if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
               {
                       $qs	= $_REQUEST['hdn_qs'];
                       $ids	= $_REQUEST['hdn_ids'];
                       $outMsg	= $objNews->deleteSkillEvent($qs,$ids);
               }
               if($isPaging==0){	
                 $result		= $objNews->manageSkillEvent('PG',$intRecno,'','','','0000-00-00','0000-00-00','','',0,0,0,'0000-00-00','0000-00-00');
                }else
                 {
                     $intPgno	= 1;
                     $intRecno	= 0;
                     $result                 = $objNews->manageSkillEvent('V',0,'','','','0000-00-00','0000-00-00','','',0,0,0,'0000-00-00','0000-00-00');
                 }
              $totalResult                 = $objNews->manageSkillEvent('V',0,'','','','0000-00-00','0000-00-00','','',0,0,0,'0000-00-00','0000-00-00');
              $intTotalRec                 = mysqli_num_rows($totalResult); 
              
          }catch (Exception $e) { 
              $outMsg =  'Some error occured. Please try again'; 
              $errFlag = 1;
          } 
        
       $intCurrPage                 = $intPgno;
       $intPgSize                   = 20;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>