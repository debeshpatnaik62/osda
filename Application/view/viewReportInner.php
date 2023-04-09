<?php
    /* ================================================
 
    ==================================================*/
    include_once( CLASS_PATH.'clsReport.php');
    $objReport      = new clsReport;	
    $isPaging      = 0;
    $pgFlag	   = 0;
    $intPgno	   = 1;
    $intRecno	   = 0;
    $ctr	   = 0;
    //======================= Permission ===========================*/
    $glId           = $_REQUEST['GL'];
    $plId           = $_REQUEST['PL'];
    $pageName       = $_REQUEST['PAGE'].'.php';
    $userId         = $_SESSION['adminConsole_userID'];
    $explPriv       = $objReport->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
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
    
        $intReportCategoryId	= (isset($_REQUEST['ddlCategory'])&& $_REQUEST['ddlCategory']!='')?htmlspecialchars($_REQUEST['ddlCategory'],ENT_QUOTES):'0';
        $strPublishDate     = (isset($_REQUEST['txtPublishDate'])&& $_REQUEST['txtPublishDate']!='')?date('Y-m-d',strtotime($_REQUEST['txtPublishDate'])):'1000-01-01';
        $selReport        = (isset($_REQUEST['selReport']) )?$_REQUEST['selReport']:0;

       $strStartDt     = (isset($_REQUEST['txtStartDt'])&& $_REQUEST['txtStartDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtStartDt'])):'1000-01-01';
       $strEndDate     = (isset($_REQUEST['txtEndDt'])&& $_REQUEST['txtEndDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtEndDt'])):'1000-01-01';
         //============= search function =================
         if(isset($_REQUEST['btnSearch']))
	{ 
		$intPgno	= 1;
                $intRecno	= 0;
                $intReportCategoryId	= (isset($_REQUEST['ddlCategory'])&& $_REQUEST['ddlCategory']!='')?htmlspecialchars($_REQUEST['ddlCategory'],ENT_QUOTES):'0';
		$strPublishDate     = (isset($_REQUEST['txtPublishDate'])&& $_REQUEST['txtPublishDate']!='')?date('Y-m-d',strtotime($_REQUEST['txtPublishDate'])):'1000-01-01';
                $strEndDate     = (isset($_REQUEST['txtEndDt'])&& $_REQUEST['txtEndDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtEndDt'])):'1000-01-01';
	}
        
       try{

            $reportId=0;
            $reportId=!empty($_REQUEST['ID'])?$_REQUEST['ID']:$reportId;
                //============= Delete/Active/Inactive function =================
               if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
               {//echo("hello");exit;
                       $qs	= $_REQUEST['hdn_qs'];
                       $ids	= $_REQUEST['hdn_ids'];

                       $outMsg	= $objReport->deleteReport($qs,$ids);
               }
               if($isPaging==0)	
                   $result		= $objReport->manageReport('PG', $intRecno,$intReportCategoryId,'','','', '1000-01-01',0,0,$userId,$strStartDt,$strEndDate);

               else
               {
                   $intPgno	= 1;
                   $intRecno	= 0;
                   $result                 = $objReport->manageReport('V',$reportId,$intReportCategoryId,'','','', '1000-01-01',0,0,$userId,$strStartDt,$strEndDate);
                  //print_r( $result);exit; 
               }
              $totalResult                 = $objReport->manageReport('V',$reportId,$intReportCategoryId,'','','', '1000-01-01',0,0,$userId,$strStartDt,$strEndDate);
              $intTotalRec                 = mysqli_num_rows($totalResult); 
              
        }catch (Exception $e) { 
          echo  $e->getMessage();exit;
            $outMsg =  'Some error occured. Please try again'; 
            $errFlag = 1;
        }     
       $intCurrPage                 = $intPgno;
       $intPgSize                   = 20;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>