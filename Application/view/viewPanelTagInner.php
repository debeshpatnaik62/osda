<?php
    /* ================================================
    File Name       : viewPanelTagInner.php
    Description		: This page is used to view  candidate Tag details.
    Author Name		: Rahul Kumar saw
    Date Created	: 05-Aug-2021
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsPanel
    Functions Used	: managePanel
    ==================================================*/
   
    include_once( CLASS_PATH.'clsPanel.php');
    $objPanel               = new clsPanel;	
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
    $explPriv      = $objPanel->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
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
       $strEmployeeName         = (isset($_REQUEST['txtEmployeeName']) && $_REQUEST['txtEmployeeName'] != '')?htmlspecialchars(addslashes(trim($_REQUEST['txtEmployeeName'])),ENT_QUOTES):'';
       $regdType                = (isset($_POST['selRegdType']) && $_POST['selRegdType']!= '')?$_POST['selRegdType']:REGD_PHASE;
       $strPanel                = (isset($_REQUEST['ddlPanel']) && $_REQUEST['ddlPanel'] != '')?$_REQUEST['ddlPanel']:0;
       $strVenue                = (isset($_REQUEST['selVenue']) && $_REQUEST['selVenue'] != '')?$_REQUEST['selVenue']:0;
       $level                   = (isset($_REQUEST['selLevel']) && $_REQUEST['selLevel'] != '')?$_REQUEST['selLevel']:0;
      
       //============ Search Function ========================//
        if(isset($_REQUEST['btnSearch']))
        {

            $intPgno            = 1;
            $intRecno           = 0;
          
        }
    
        
        try{
         //============= Delete/Active/Inactive function =================
            /*if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
            {
                $qs                     = $_REQUEST['hdn_qs'];
                $ids                    = $_REQUEST['hdn_ids'];
                $outMsg                 = $objPanel->deleteEmpDirectory($qs,$ids);
            }*/
            if($isPaging==0)	
                $result                 = $objPanel->managePanel('PG',$intRecno,$strPanel,$strVenue,'','','','','','','','',$intDistid,0,0,$intPgSize,'','',$level,$regdType);
            else                                    
            {
                $intPgno                = 1;
                $intRecno               = 0;
                $result                 = $objPanel->managePanel('V',0,$strPanel,$strVenue,'','','','','','','','',$intDistid,0,0,0,'','',$level,$regdType);
            }
            $totalResult                = $objPanel->managePanel('CT',0,$strPanel,$strVenue,'','','','','','','','',$intDistid,0,0,0,'','',$level,$regdType);
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