<?php
    /* ================================================
    File Name         	: viewDistrictInner.php
    Description		: This page is used to view district Details.
    Author Name		: T Ketaki Debadarshini
    Date Created	: 21-Sept-2016
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsDistrict
    Functions Used	: manageDistrict,deleteDistrict
    ==================================================*/
    include_once( CLASS_PATH.'clsDistrict.php');
    $objDist       = new clsDistrict;	
    $isPaging      = 0;
    $pgFlag	   = 0;
    $intPgno	   = 1;
    $intRecno	   = 0;
    $ctr	   = 0;
    $intPgSize     = 20;
    //======================= Permission ===========================*/
    $glId          = $_REQUEST['GL'];
    $plId           = $_REQUEST['PL'];
    $pageName       = $_REQUEST['PAGE'].'.php';
    $userId         = $_SESSION['adminConsole_userID'];
    $explPriv       = $objDist->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
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
        
        try{                
            //============= Delete/Active/Inactive function =================
            if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
            {
                    $qs                 = $_REQUEST['hdn_qs'];
                    $ids                = $_REQUEST['hdn_ids'];
                    $outMsg             = $objDist->deleteDistrict($qs,$ids);
            }
            if($isPaging==0)	
                $result                 = $objDist->manageDistrict('PG',$intRecno,'','','','',0,0,$intPgSize);
            else                                    
            {
                $intPgno	= 1;
                $intRecno	= 0;
                $result                 = $objDist->manageDistrict('V',0,'','','','',0,0,$intPgSize);
            }
           $totalResult                 = $objDist->manageDistrict('CT',0,'','','','',0,0,$intPgSize);
           if($totalResult->num_rows >0){
                $resTotalRec            = $totalResult->fetch_array(); 
                $intTotalRec            = $resTotalRec['0']; 
            }
         }catch (Exception $e) { 
            //$outMsg                 =  'Some error occured. Please try again'; 
            $errFlag                = 1;
        }    
       $intCurrPage                 = $intPgno;
      
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
    
?>