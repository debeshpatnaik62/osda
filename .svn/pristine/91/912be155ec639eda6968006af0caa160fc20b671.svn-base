<?php
    /* ================================================
    File Name       : viewPanelMemberInner.php
    Description		: This page is used to view panel member Details.
    Author Name		: Rahul Kumar Saw
    Date Created	: 05-Aug-2021
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsPanel
    Functions Used	: 
    INSERT INTO `m_admin_global_menu` (`VCH_GL_NAME`, `INT_DELETED_FLAG`, `VCH_IMAGE`) VALUES ('Manage Skill Competition', '0', 'fa-file');
INSERT INTO `m_admin_primary_menu` (`INT_ADMIN_GL_ID`, `VCH_PL_NAME`, `VCH_URL`, `INT_ADMIN_PL_ID`, `VCH_RELATED_PAGES`, `INT_FUNCTION_ID`, `TIN_TYPE`) VALUES ('12', 'Manage Panel', 'viewPanel', '98', 'viewPanel.php,addPanel.php', '0', '0');
INSERT INTO `m_admin_primary_menu` (`INT_ADMIN_GL_ID`, `VCH_PL_NAME`, `VCH_URL`, `INT_ADMIN_PL_ID`, `VCH_RELATED_PAGES`, `INT_FUNCTION_ID`, `TIN_TYPE`) VALUES ('12', 'Manage Panel Member', 'viewPanelMember', '99', 'viewPanelMember.php,addPanelMember.php', '0', '0');
    ==================================================*/
    include(CLASS_PATH."clsPanel.php");
    $objPanel           = new clsPanel;
    $isPaging           = 0;
    $pgFlag             = 0;
    $intPgno            = 1;
    $intRecno           = 0;
    $ctr                = 0;
    //======================= Permission ===========================*/
    $glId               = $_REQUEST['GL'];
    $plId               = $_REQUEST['PL'];
    $pageName           = $_REQUEST['PAGE'].'.php';
    $userId             = $_SESSION['adminConsole_userID'];
    $explPriv           = $objPanel->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
    $editPriv           = $explPriv['edit'];
    $deletePriv         = $explPriv['delete'];
    $noAdd              = $explPriv['add'];
    $noActive           = $explPriv['active'];
    $noPublish          = $explPriv['publish'];
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
        
       $strPanel      = (isset($_REQUEST['ddlPanel']) && $_REQUEST['ddlPanel'] != '')?$_REQUEST['ddlPanel']:0;
       $strVenue      = (isset($_REQUEST['selVenue']) && $_REQUEST['selVenue'] != '')?$_REQUEST['selVenue']:0;
       $strMemberName         = (isset($_REQUEST['txtMemberName']) && $_REQUEST['txtMemberName'] != '')?htmlspecialchars(addslashes(trim($_REQUEST['txtMemberName'])),ENT_QUOTES):'';
       $skillId         = (isset($_POST['selSkill']) && $_POST['selSkill']!= '')?$_POST['selSkill']:0;
       $level             = (isset($_REQUEST['selLevel']) && $_REQUEST['selLevel'] != '')?$_REQUEST['selLevel']:0;
      
       //============ Search Function ========================//
        if(isset($_REQUEST['btnSearch']))
        {

            $intPgno            = 1;
            $intRecno           = 0;
          
        }
       
         //============= Delete/Active/Inactive function =================
	if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
	{
		$qs	= $_REQUEST['hdn_qs'];
		$ids	= $_REQUEST['hdn_ids'];
		$outMsg	= $objPanel->deletePanelMember($qs,$ids);
	}
    if($isPaging==0)	
            $result		= $objPanel->managePanel('PGM',$intRecno,$strPanel,$skillId,$strMemberName,'','','','','','','',0,0,$userId,0,'','',$strVenue,$level);		  
	else                                    
	{
            $intPgno	= 1;
            $intRecno	= 0;
            $result                 = $objPanel->managePanel('VM',0,$strPanel,$skillId,$strMemberName,'','','','','','','',0,0,$userId,0,'','',$strVenue,$level);
	}
       $totalResult                 = $objPanel->managePanel('VM',0,$strPanel,$skillId,$strMemberName,'','','','','','','',0,0,$userId,0,'','',$strVenue,$level);
       $intTotalRec                 = mysqli_num_rows($totalResult); 
       $intCurrPage                 = $intPgno;
       $intPgSize                   = 20;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>