<?php
    /* ================================================
 
    ==================================================*/
    include_once( CLASS_PATH.'clsReport.php');
    $objReport  = new clsReport;	
    $isPaging   = 0;
    $pgFlag	    = 0;
    $intPgno	= 1;
    $intRecno	= 0;
    $ctr	    = 0;
    $strType    = 0;
    $intQualification    = 0;
    $reportId   = 0;


    //======================= Permission ===========================*/
    $glId           = $_REQUEST['GL'];
    $plId           = $_REQUEST['PL'];
    $pageName       = $_REQUEST['PAGE'].'.php';
    $userId         = $_SESSION['adminConsole_userID'];
    
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

   
   $regdType           = (isset($_POST['selRegdType']) && $_POST['selRegdType']!= '')?$_POST['selRegdType']:REGD_PHASE;
   $gender             = (isset($_POST['selGender']) && $_POST['selGender']!= '')?$_POST['selGender']:0;

     //============= Delete/Active/Inactive function =================
               if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
               {//echo("hello");exit;
                       $qs  = $_REQUEST['hdn_qs'];
                       $ids = $_REQUEST['hdn_ids'];

                       $outMsg  = $objReport->deleteReport($qs,$ids);
               }

               if($isPaging==0)	
                   $result		= $objReport->manageReport('DWG', $intRecno, $regdType,'','','', '1000-01-01',0,$gender,$userId,'1000-01-01','1000-01-01');

               else
               {
                   $intPgno	= 1;
                   $intRecno	= 0;
                   $result                 = $objReport->manageReport('DW',$reportId, $regdType,'','','', '1000-01-01',0,$gender,$userId,'1000-01-01','1000-01-01'); 
               }
              $totalResult                 = $objReport->manageReport('DW',$reportId, $regdType,'','','', '1000-01-01',0,$gender,$userId,'1000-01-01','1000-01-01');
              $toalNumber = 0;
              while ($rownn = mysqli_fetch_array($totalResult)) {
                  $total = $rownn['totalCandidate'];
                  $toalNumber += $total;
              }
              $intTotalRec                 = mysqli_num_rows($totalResult); 
                   
       $intCurrPage                 = $intPgno;
       $intPgSize                   = 50;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>