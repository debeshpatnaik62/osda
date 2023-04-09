<?php
  /* ------------------------------------------------------------------------
      File Name           : faqInner.php
      Description         : This page is to view FAQ .
      Author Name         : Ashis kumar Patra.
      Date Created        : 12-12-2018
      Update History      :
      <Updated by>           <Updated On>       <Remarks>
 -------------------------------------------------------------------------- */
  //========== include class path for FAQ ====================//
      include_once(CLASS_PATH.'clsFaq.php');
  //========== create object for FAQ =====================//
      $objFaq    = new  clsFaq;

 //======================= Pagination ===========================*/	
        $intPgno       = 1;
        $intRecno      = 0;
        $intPgSize     = 20;	

	if($_REQUEST['hdn_IsPaging']!="" && $_REQUEST['hdn_IsPaging'] >0)
		$isPaging   = 1;
	if($_REQUEST['hdn_PageNo']!=""  && $_REQUEST['hdn_PageNo'] >0)
	{
		$intPgno    = $_REQUEST['hdn_PageNo'];
		$pgFlag     = 1;
	}
	if($_REQUEST['hdn_RecNo']!=""  && $_REQUEST['hdn_RecNo'] >0)
	{	
		$intRecno   = $_REQUEST['hdn_RecNo'];
		$pgFlag     = 1;
	}
	if($isPaging==0 && $_REQUEST['hdn_PageNo']=='' && $_REQUEST['ID']>0)
	{
		$intRecno   = (isset($_SESSION['paging']['recNo']) && $_SESSION['paging']['recNo']>0)?$_SESSION['paging']['recNo']:$intRecno;
		$intPgno    = (isset($_SESSION['paging']['pageNo']) && $_SESSION['paging']['pageNo']>0)?$_SESSION['paging']['pageNo']:$intPgno;		
	}
	else	
		unset($_SESSION['paging']);       

//===============================================
	 if($isPaging==0)	
            $result		= $objFaq->manageFaq('PPG',$intRecno,'','','','',2,0,0);
	 else
	  {
	  	$intPgno	= 1;
                $intRecno	= 0;
                $result         = $objFaq->manageFaq('VP',0,'','','','',2,0,0);
	  }	
       $totalResult                 = $objFaq->manageFaq('CT',0,'','','','',2,0,0);
       $numRow                      = $totalResult->fetch_array();
       $intTotalRec                 = $numRow[0]; 
      
       $intCurrPage                 = $intPgno;
       $intPgSize                   = 20;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;	

?>