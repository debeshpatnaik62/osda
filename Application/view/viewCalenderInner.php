<?php
    /* ================================================
    File Name       : viewCalenderInner.php
    Description		: This page is used to view Calender Details.
    Developed By	: Rahul Kumar Saw
    Developed On	: 03-04-2023
    Update History	:
    <Updated by>		<Updated On>		<Remarks>
    Class Used		: clsCalender
    Functions Used	: 
    ==================================================*/	
	//========== create object of clsEvent class===============	
        include_once(CLASS_PATH.'clsCalender.php');
        $objEvents        = new clsCalender;	
         
        $id=(isset($_REQUEST['ID']))?$objEvents->decrypt($_REQUEST['ID']):0;
        $glId = $_REQUEST['GL'];
        $plId = $_REQUEST['PL'];
        $userId   = USER_ID;
        //========== Default variable ===============
        $isPaging       = 0;
        $pgFlag	        = 0;
        $intPgno	    = 1;
        $intRecno	    = 0;
        $ctr	        = 0;
        $intPgSize      = 10;
        $intPubStatus   = 0;      
         //======================= Pagination ===========================*/

     if($_REQUEST['hdn_IsPaging'] !="" && $_REQUEST['hdn_IsPaging'] >0)
		$isPaging     = 1;

	if($_REQUEST['hdn_PageNo'] !="")
	{
		$errPgNo    = $objEvents->isSpclChar($_REQUEST['hdn_PageNo']);
		if($errPgNo == 0)
		{
			$intPgno  = htmlspecialchars($_REQUEST['hdn_PageNo'],ENT_QUOTES);
		    $pgFlag	  = 1;
		} else {
			header("Location:" . APP_URL . "error");
		}
	}
        
  // print_r($_POST);exit;
      if($_REQUEST['hdn_RecNo'] !="")
	{	
		$errRecNo     = $objEvents->isSpclChar($_REQUEST['hdn_RecNo']);
		if($errRecNo == 0)
		{
			$intRecno     = htmlspecialchars($_REQUEST['hdn_RecNo'],ENT_QUOTES);
		    $pgFlag	      = 1;
		} else {
			header("Location:" .APP_URL. "error");
		}		
	}
        $_REQUEST['ID']=$objEvents->decrypt($_REQUEST['ID']);
       
	if($isPaging==0 && $_REQUEST['hdn_PageNo']=='' && $_REQUEST['ID']>0)
	{
           
		$intRecno	  = (isset($_SESSION['paging']['recNo']) && $_SESSION['paging']['recNo']>0)?$_SESSION['paging']['recNo']:$intRecno;
        $intPgno	  = (isset($_SESSION['paging']['pageNo']) && $_SESSION['paging']['pageNo']>0)?$_SESSION['paging']['pageNo']:$intPgno;		
	}
	else	
	unset($_SESSION['paging']);


 //============= Delete/Active function =================
    
    if(isset($_REQUEST['hdn_qs']) && $_REQUEST['hdn_qs']=='D' )
     {
       // echo "Working";exit;
        $qs	    = $_REQUEST['hdn_qs'];
        $ids        = $_REQUEST['hdn_ids'];
        $outMsg     = $objEvents->deleteHoliday($qs,$ids);
     
        $redirectLoc = APP_URL .'viewCalender';
    }

    if($isPaging==0){	
       $result = $objEvents->viewCalander('PG', $intRecno, '0000-00-00', '0000-00-00','','', 0, '');
    } else {
        $intPgno	     = 1;
        $intRecno	     = 0;
        $result = $objEvents->viewCalander('VPG', 0, '0000-00-00', '0000-00-00','','', 0, '');
    }
       $intPgSize                      = 10;
   $totalResult = $objEvents->viewCalander('CT', 0, '0000-00-00', '0000-00-00','', '', 0, '');
   $fetchRec = $totalResult->fetch_array();
    $intTotalRec = $fetchRec['total'];

   $intCurrPage                 = $intPgno;
    //$intPgSize                   = 10;
    $_SESSION['paging']['recNo']    = $intRecno;
    $_SESSION['paging']['pageNo']   = $intPgno;

	
 ?>