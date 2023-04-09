<?php
  /* ================================================
    File Name       : viewTimelineInner.php
    Description   : This page is used to view Timeline.
    Devloped By         : Ashis kumar Patra
    Devloped On         : 04-12-2018
    Update History  :
    <Updated by>    <Updated On>    <Remarks>

    Class Used    : clsNews
    Functions Used  : 
    ==================================================*/
    include(CLASS_PATH.'clsTimeline.php');

    $objTimeline       = new clsTimeline; 
    $isPaging          = 0;
    $pgFlag            = 0;
    $intPgno           = 1;
    $intRecno          = 0;
    $ctr               = 0;
    $intNewsBy         = 0;
    
  //======================= Permission ===========================*/
    $glId              = $_REQUEST['GL'];
    $plId              = $_REQUEST['PL'];
    $pageName          = $_REQUEST['PAGE'].'.php';
    $userId            = $_SESSION['adminConsole_userID'];
   
    $explPriv          = $objTimeline->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
    $editPriv          = $explPriv['edit'];
    $deletePriv        = $explPriv['delete'];
    $noAdd             = $explPriv['add'];
    $noPublish         = $explPriv['publish'];

  //======================= Pagination ===========================*/
    
  
  if($_REQUEST['hdn_IsPaging']!="" && $_REQUEST['hdn_IsPaging'] >0)
    $isPaging=1;
  if($_REQUEST['hdn_PageNo']!=""  && $_REQUEST['hdn_PageNo'] >0)
  {
    $intPgno=$_REQUEST['hdn_PageNo'];
    $pgFlag = 1;
  }
  if($_REQUEST['hdn_RecNo']!=""  && $_REQUEST['hdn_RecNo'] >0)
  { 
    $intRecno=$_REQUEST['hdn_RecNo'];
    $pgFlag = 1;
  }
  if($isPaging==0 && $_REQUEST['hdn_PageNo']=='' && $_REQUEST['ID']>0)
  {
    $intRecno = (isset($_SESSION['paging']['recNo']) && $_SESSION['paging']['recNo']>0)?$_SESSION['paging']['recNo']:$intRecno;
    $intPgno  = (isset($_SESSION['paging']['pageNo']) && $_SESSION['paging']['pageNo']>0)?$_SESSION['paging']['pageNo']:$intPgno;   
  }
  else  
    unset($_SESSION['paging']);

  $strStartDt     = (isset($_REQUEST['txtStartDt'])&& $_REQUEST['txtStartDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtStartDt'])):'';
  $strEndDate     = (isset($_REQUEST['txtEndDt'])&& $_REQUEST['txtEndDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtEndDt'])):'';
//============= search function =================
         if(isset($_REQUEST['btnSearch']))
	{
		$intPgno	= 1;
                $intRecno	= 0;
                $strStartDt     = (isset($_REQUEST['txtStartDt'])&& $_REQUEST['txtStartDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtStartDt'])):'';
  $strEndDate     = (isset($_REQUEST['txtEndDt'])&& $_REQUEST['txtEndDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtEndDt'])):'';
	}
//============= Delete/Active/Inactive function =================
  //print_r($_REQUEST);//EXIT;
  if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
  {
    $qs = $_REQUEST['hdn_qs'];
    $ids  = $_REQUEST['hdn_ids'];
    $outMsg = $objTimeline->deleteTimeline($qs,$ids);
  }
    $arrConditions=array( 'timelineId'=>0,
                                           'txtStartDate'=>$strStartDt,
                                           'txtEndDate'=>$strEndDate,
                                           'pubStatus'=>0);
  
        if($isPaging==0){ 
           $arrConditions['timelineId']=$intRecno;
            
            $result   = $objTimeline->manageTimeline('PG',$arrConditions);
        }
  else                                    
  {
            $intPgno  = 1;
            $intRecno = 0;
            $result                 = $objTimeline->manageTimeline('V',$arrConditions);
  }
       $totalResult                 = $objTimeline->manageTimeline('V',$arrConditions);
       $intTotalRec                 = mysqli_num_rows($totalResult); 
       $intCurrPage                 = $intPgno;
       $intPgSize                   = 10;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
       

?>