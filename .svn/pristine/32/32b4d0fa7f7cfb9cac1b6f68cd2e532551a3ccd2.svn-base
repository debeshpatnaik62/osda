<?php
  /* ================================================
    File Name       : annual-reportInner.php
    Description     : This page is used to view Annual Reports.
    Devloped By     : Ashis kumar Patra
    Devloped On     : 12-12-2018
    Update History  :
    <Updated by>        <Updated On>    <Remarks>

    Class Used      : clsTimeline
    Functions Used  : 
    ==================================================*/
    include_once( CLASS_PATH.'clsReport.php');
    $objReport      = new clsReport;
    $isPaging      = 0;
    $pgFlag	   = 0;
    $intPgno	   = 1;
    $intRecno	   = 0;
    $ctr	   = 0;
   
  
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
    
       
        $selReport        = (isset($_REQUEST['selReport']) )?$_REQUEST['selReport']:1;

         //============= search function =================
         if(isset($_REQUEST['btnSearch']))
	{ 
		$intPgno	= 1;
                $intRecno	= 0;
                $selReport        = (isset($_REQUEST['selReport']) )?$_REQUEST['selReport']:1;
	}
        
       try{

            $reportId=0;
            $reportId=isset($_REQUEST['ID'])?$_REQUEST['ID']:$reportId;
                //============= Delete/Active/Inactive function =================
               if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
               {//echo("hello");exit;
                       $qs	= $_REQUEST['hdn_qs'];
                       $ids	= $_REQUEST['hdn_ids'];

                       $outMsg	= $objReport->deleteReport($qs,$ids);
               }
               if($isPaging==0)	
                   $result		= $objReport->manageReport('PG', $intRecno,$selReport,'','','', '0000-00-00',2,0,0,'0000-00-00','0000-00-00');

               else
               {
                   $intPgno	= 1;
                   $intRecno	= 0;
                   $result                 = $objReport->manageReport('V',$reportId,$selReport,'','','', '0000-00-00',2,0,0,'0000-00-00','0000-00-00');
                  //print_r( $result);exit; 
               }
              $totalResult                 = $objReport->manageReport('V',$reportId,$selReport,'','','', '0000-00-00',2,0,0,'0000-00-00','0000-00-00');
              $intTotalRec                 = mysqli_num_rows($totalResult); 
              
        }catch (Exception $e) { 
            //echo  $e->getMessage();exit;
            $outMsg =  'Some error occured. Please try again'; 
            $errFlag = 1;
        }     
       $intCurrPage                 = $intPgno;
       $intPgSize                   = 20;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
?>