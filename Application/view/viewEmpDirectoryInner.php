<?php
    /* ================================================
    File Name         	: viewEmpDirectoryInner.php
    Description		: This page is used to view  EMp Directory details.
    Author Name		: T Ketaki Debadarshini
    Date Created	: 15-July-2017
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsEmpDirectory
    Functions Used	: manageEmpDirectory,deleteInstitute
    ==================================================*/
   
    include_once( CLASS_PATH.'clsEmpDirectory.php');
    $objEmpDirectory        = new clsEmpDirectory;	
    $isPaging               =  0;
    $pgFlag                 =  0;
    $intPgno                =  1;
    $intRecno               =  0;
    $ctr                    =  0;
    $intPgSize              =  20;

    //======================= Permission ===========================*/
    $glId          = $_REQUEST['GL'];
    $plId          = $_REQUEST['PL'];
    $userId        = $_SESSION['adminConsole_userID'];
    $pageName      = $_REQUEST['PAGE'].'.php';
    $explPriv      = $objEmpDirectory->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
    $editPriv      = $explPriv['edit'];
    $deletePriv    = $explPriv['delete'];
    $noAdd         = $explPriv['add'];
    $noActive      = $explPriv['active'];
    $noPublish     = $explPriv['publish'];
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
        
       $intDistid               = (isset($_REQUEST['ddlDistrict']) && $_REQUEST['ddlDistrict'] != '')?$_REQUEST['ddlDistrict']:0;
       $intType                 = (isset($_REQUEST['ddlType']) && $_REQUEST['ddlType'] != '')?$_REQUEST['ddlType']:0;
       $strEmployeeName         = (isset($_REQUEST['txtEmployeeName']) && $_REQUEST['txtEmployeeName'] != '')?htmlspecialchars(addslashes(trim($_REQUEST['txtEmployeeName'])),ENT_QUOTES):'';
      
       //============ Search Function ========================//
        if(isset($_REQUEST['btnSearch']))
        {

            $intPgno            = 1;
            $intRecno           = 0;
          
        }
    
        
        try{
         //============= Delete/Active/Inactive function =================
            if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
            {
                $qs                     = $_REQUEST['hdn_qs'];
                $ids                    = $_REQUEST['hdn_ids'];
                $outMsg                 = $objEmpDirectory->deleteEmpDirectory($qs,$ids);
            }
            if($isPaging==0)	
                $result                 = $objEmpDirectory->manageEmpDirectory('PG',$intRecno,$intType,$intDistid,$strEmployeeName,'','','','','',0,0,0,$intPgSize);
            else                                    
            {
                $intPgno                = 1;
                $intRecno               = 0;
                $result                 = $objEmpDirectory->manageEmpDirectory('V',0,$intType,$intDistid,$strEmployeeName,'','','','','',0,0,0,$intPgSize);
            }
            $totalResult                = $objEmpDirectory->manageEmpDirectory('CT',0,$intType,$intDistid,$strEmployeeName,'','','','','',0,0,0,$intPgSize);
            $numRow                     = $totalResult->fetch_array();
            $intTotalRec                = $numRow[0]; 
         }catch (Exception $e) { 
                $outMsg                 =  'Some error occured. Please try again'; 
                $errFlag                = 1;
        }
       $intCurrPage                     = $intPgno;
       $_SESSION['paging']['recNo']     = $intRecno;
       $_SESSION['paging']['pageNo']    = $intPgno;
      
        
        
    
?>