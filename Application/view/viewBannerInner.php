<?php
  /* ================================================
	File Name        : viewBannerInner.php
	Description	 : This page is used to view banner.
	Developed By	 : Rahul Kumar Saw
	Developed On	 : 11-06-2018
	Update History :
	<Updated by>		<Updated On>		<Remarks>

	Class Used		 : clsBanner
	Functions Used : viewBanner(),deleteBanner(),
==================================================*/
//----- include class path for banner -------//
    //include_once(CLASS_PATH . 'clsBanner.php');

    include_once(CLASS_PATH."clsBanner.php"); 
//---- Create object --- //
    $objBanner      = new clsBanner;	
    $id             = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
    $strTab         ='View';
//========== Default variable ===============
    $isPaging           = 0;
    $pgFlag	        = 0;
    $intPgno	        = 1;
    $intRecno	        = 0;
    $ctr	        = 0;
    $intPgSize          = 10;
        
    //======================= Pagination ===========================*/
	
    if($_REQUEST['hdn_IsPaging']!="" && $_REQUEST['hdn_IsPaging'] >0)
      $isPaging=1;
    if($_REQUEST['hdn_PageNo']!="") 
    {
       $errPgNo    = $objBanner->isSpclChar($_REQUEST['hdn_PageNo']);
       if($errPgNo==0)
       {
           $intPgno = htmlspecialchars($_REQUEST['hdn_PageNo'],ENT_QUOTES);
           $pgFlag = 1;
       } else {
          header("Location:" . APP_URL . "error");
       }         
    }

    if($_REQUEST['hdn_RecNo']!="") 
    {	
       $errRecNo     = $objBanner->isSpclChar($_REQUEST['hdn_RecNo']);  
       if($errRecNo==0)
       {
          $intRecno=htmlspecialchars($_REQUEST['hdn_RecNo'],ENT_QUOTES);
          $pgFlag = 1;
       } else {
          header("Location:" . APP_URL . "error");
       }          
    }
    $_REQUEST['ID']=$_REQUEST['ID'];
    if($isPaging==0 && $_REQUEST['hdn_PageNo']=='' && $_REQUEST['ID']>0) {
        $intRecno	= (isset($_SESSION['paging']['recNo']) && $_SESSION['paging']['recNo']>0)?$_SESSION['paging']['recNo']:$intRecno;
        $intPgno	= (isset($_SESSION['paging']['pageNo']) && $_SESSION['paging']['pageNo']>0)?$_SESSION['paging']['pageNo']:$intPgno;		
    }
    else	
    unset($_SESSION['paging']);        
    $txtCapName	= (isset($_REQUEST['txtCapName'])&& $_REQUEST['txtCapName']!='')?$_REQUEST['txtCapName']:'';
    $openFlag = (isset($txtCapName) && $txtCapName != '') ? 'S':'';   
  //============= search function =================
    if(isset($_REQUEST['btnSearch'])) 
    {
        $txtCapName	 = trim($_REQUEST['txtCapName']);
        $intPgno	   = 1;
        $intRecno	   = 0;
    }    
 //============= Delete/Active function =================
    
    if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!=''&& $_REQUEST['hdn_qs']!='') {
        $qs	= $_REQUEST['hdn_qs'];
        $ids	= $_REQUEST['hdn_ids'];
        $outMsg	= $objBanner->deleteBanner($qs,$ids);
        $redirectLoc  =  APP_URL."viewBanner/".$glId."/".$plId;
    }

    if($isPaging==0){	
        $result		     = $objBanner->viewBanner('PG', $intRecno,$txtCapName, 0 ,$intPgSize,0);
    } else {
        $intPgno	     = 1;
        $intRecno	     = 0;
        $result        = $objBanner->viewBanner('V', 0,$txtCapName, 0 ,$intPgSize,0);
    }

    $totalResult                 = $objBanner->viewBanner('V', 0,$txtCapName, 0 ,$intPgSize,0);
    $intTotalRec                 = $totalResult->num_rows;   
    $intCurrPage                 = $intPgno;    
    $_SESSION['paging']['recNo'] = $intRecno;
    $_SESSION['paging']['pageNo']= $intPgno;
?>
