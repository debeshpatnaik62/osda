<?php
   /* ================================================
	  ' File Name		  	: in-newsInner.php
	  ' Description 	  	: Website News Updates Inner Page
	  ' Developed by          	: Ashis kumar Patra
	  ' Developed on          	: 04-12-2018
	  ' Modification History  	: 
	  ' Modified by             : 
	  ' <Updated By>           	  <Date>                  <Updated Summary>'  
  ================================================== */
//print_r($_POST);

     include_once(CLASS_PATH.'clsNews.php');

     
//print_r($_POST);exit;
     $objNews       =  new clsNews;
 //======================= Pagination ===========================*/	
    $intPgno       = 1;
    $intRecno      = 0;
    $intPgSize     = 20;
    $isPaging      = 0;
    $pgFlag        = 0;
		
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


    if($_SESSION['hdn_IsPaging']!="" &&  $_SESSION['hdn_IsPaging'] >0){
        $isPaging=1;
        unset($_SESSION['hdn_IsPaging']);
    }
            

    if($_SESSION['hdn_PageNo']!=""  && $_SESSION['hdn_PageNo'] >0)
    {
            $intPgno=$_SESSION['hdn_PageNo'];
            unset($_SESSION['hdn_PageNo']);
            $pgFlag = 1;
    }
    if($_SESSION['hdn_RecNo']!=""  && $_SESSION['hdn_RecNo'] >0)
    {   
            $intRecno=$_SESSION['hdn_RecNo'];
            unset($_SESSION['hdn_RecNo']);
            $pgFlag = 1;
    }

    

    if($isPaging==0 && $_REQUEST['hdn_PageNo']=='' && $_REQUEST['ID']>0)
    {
            $intRecno	= (isset($_SESSION['paging']['recNo']) && $_SESSION['paging']['recNo']>0)?$_SESSION['paging']['recNo']:$intRecno;
            $intPgno	= (isset($_SESSION['paging']['pageNo']) && $_SESSION['paging']['pageNo']>0)?$_SESSION['paging']['pageNo']:$intPgno;		
    }
    else	
            unset($_SESSION['paging']);

         $strHeadline   = (isset($_REQUEST['txtHeadline'])&& $_REQUEST['txtHeadline']!='')?($_REQUEST['txtHeadline']):'';

//===============================================
   
     $strHeadline          = (isset($_REQUEST['txtHeadline'])&& $_REQUEST['txtHeadline']!='')?trim(htmlspecialchars($_REQUEST['txtHeadline'],ENT_QUOTES)):'';
     $strFromDate          = (isset($_REQUEST['txtFromDate'])&& $_REQUEST['txtFromDate']!='')?date('Y-m-d',strtotime($_REQUEST['txtFromDate'])):'0000-00-00';
     $strToDate            = (isset($_REQUEST['txtToDate'])&& $_REQUEST['txtToDate']!='')?date('Y-m-d',strtotime($_REQUEST['txtToDate'])):'0000-00-00';
     if($isPaging==0)
     if($_POST['btnSearch']=='btnSearch')	
     {
       $result		= $objNews->manageNews('PPG',0,0,$strHeadline,'','', '0000-00-00','0000-00-00','','',2,0,0,$strFromDate,$strToDate,'','','','','');
   }
   else
   {
     $result        = $objNews->manageNews('PPG',$intRecno,0,$strHeadline,'','', '0000-00-00','0000-00-00','','',2,0,0,$strFromDate,$strToDate,'','','','','');
   }
    else
     {
        $intPgno	= 1;
        $intRecno	= 0;
        $result         = $objNews->manageNews('V',0,0,$strHeadline,'','', '0000-00-00','0000-00-00','','',2,0,0,$strFromDate,$strToDate,'','','','','');
     }	
    $totalResult        = $objNews->manageNews('V',0,0,$strHeadline,'','','0000-00-00' ,'0000-00-00','','',2,0,0,$strFromDate,$strToDate,'','','','','');
    $intTotalRec                 = mysqli_num_rows($totalResult); 
    $intCurrPage                 = $intPgno;
    $_SESSION['paging']['recNo'] = $intRecno;
    $_SESSION['paging']['pageNo']= $intPgno;		
?>