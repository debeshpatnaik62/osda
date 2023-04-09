<?php
    /* ================================================
    File Name       : viewQuestionInner.php
    Description		: This page is used to view Question Details.
    Author Name		: Rahul Kumar Saw
    Date Created	: 26-Aug-2021
    Update History	:
    <Updated by>		<Updated On>		<Remarks>
    
    Class Used		: clsQuestion
    Functions Used	: checkPrivilege(),manageQuestion(),deleteQuestion()
    ==================================================*/
    include_once(CLASS_PATH.'clsQuestion.php'); 
    $objQuestion      = new clsQuestion;	
    $isPaging       = 0;
    $pgFlag	   		= 0;
    $intPgno	   	= 1;
    $intRecno	   	= 0;
    $ctr	   		= 0;
   
    //======================= Permission ===========================*/
    $glId          	= $_REQUEST['GL'];
    $plId          	= $_REQUEST['PL'];
    $pageName      	= $_REQUEST['PAGE'].'.php';   
    $explPriv       = $objQuestion->checkPrivilege(USER_ID, $glId, $plId, $pageName, 'V');
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
        
         $intSkillId	= (isset($_REQUEST['selSkill'])&& $_REQUEST['selSkill']!='')?$_REQUEST['selSkill']:0;
       
       
    //============= search function =================
    if(isset($_REQUEST['btnSearch']))
	{
		$intPgno	= 1;
		$intRecno	= 0;
	}
    //============= Delete/Active/Inactive function =================
	if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
	{
        $qs	= $_REQUEST['hdn_qs'];
        $ids	= $_REQUEST['hdn_ids'];
        $outMsg	= $objQuestion->deleteQuestion($qs,$ids);
	}
        if($isPaging==0)	
        $result		= $objQuestion->manageQuestion('PG',$intRecno,$intSkillId,'',0,'',0,0,'','',0,0,'','');
	else
	{
        $intPgno	= 1;
        $intRecno	= 0;
        $result     = $objQuestion->manageQuestion('V',0,$intSkillId,'',0,'',0,0,'','',0,0,'','');
	}
       $totalResult     = $objQuestion->manageQuestion('V',0,$intSkillId,'',0,'',0,0,'','',0,0,'','');
       $intTotalRec                 = mysqli_num_rows($totalResult); 
       $intCurrPage                 = $intPgno;
       $intPgSize                   = 20;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>