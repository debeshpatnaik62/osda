<?php
    /* ================================================
    File Name         	: viewStoriesInner.php
    Description		: This page is used to view success story details.
    Author Name		: T Ketaki Debadarshini
    Date Created	: 20-Sep-2016
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsStory
    Functions Used	: manageStory,deleteStory
    ==================================================*/
    include_once( CLASS_PATH.'clsStory.php');
    $objStory           = new clsStory;
    $isPaging           = 0;
    $pgFlag             = 0;
    $intPgno            = 1;
    $intRecno           = 0;
    $ctr                = 0;
    $intPgSize          = 20;
    $intDist            = 0;
    $intInst            = 0;
    //======================= Permission ===========================*/
    $glId               = $_REQUEST['GL'];
    $plId               = $_REQUEST['PL'];
    $pageName           = $_REQUEST['PAGE'].'.php';
    $userId             = $_SESSION['adminConsole_userID'];
    $explPriv           = $objStory->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
    $editPriv           = $explPriv['edit'];
    $deletePriv         = $explPriv['delete'];
    $noAdd              = $explPriv['add'];
    $noActive           = $explPriv['active'];
    $noPublish          = $explPriv['publish'];
    //======================= Pagination ===========================*/
	
	if($_REQUEST['hdn_IsPaging']!="" && $_REQUEST['hdn_IsPaging'] >0)
		$isPaging = 1;
	if($_REQUEST['hdn_PageNo']!=""  && $_REQUEST['hdn_PageNo'] >0)
	{
		$intPgno  = $_REQUEST['hdn_PageNo'];
		$pgFlag   = 1;
	}
	if($_REQUEST['hdn_RecNo']!=""  && $_REQUEST['hdn_RecNo'] >0)
	{	
		$intRecno = $_REQUEST['hdn_RecNo'];
		$pgFlag	  = 1;
	}
	if($isPaging==0 && $_REQUEST['hdn_PageNo']=='' && $_REQUEST['ID']>0)
	{
		$intRecno = (isset($_SESSION['paging']['recNo']) && $_SESSION['paging']['recNo']>0)?$_SESSION['paging']['recNo']:$intRecno;
		$intPgno  = (isset($_SESSION['paging']['pageNo']) && $_SESSION['paging']['pageNo']>0)?$_SESSION['paging']['pageNo']:$intPgno;		
	}
	else	
		unset($_SESSION['paging']);    
    $intInst  = (isset($_REQUEST['ddlInst']) && $_REQUEST['ddlInst'] != '')?$_REQUEST['ddlInst']:'0';
    $strName  = (isset($_REQUEST['txtName']) && $_REQUEST['txtName'] != '')?$_REQUEST['txtName']:'';
    
    //============ Search Function ========================//
             if(isset($_REQUEST['btnSearch']))
             {
                 $intPgno        = 1;
                 $intRecno       = 0;                 
                 $intInst        = $_REQUEST['ddlInst'];  
                 $strName        = trim($_REQUEST['txtName']);
             }
        
        try{
            //============= Delete/Active/Inactive function =================
            if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
            {
                    $qs                 = $_REQUEST['hdn_qs'];
                    $ids                = $_REQUEST['hdn_ids'];
                    $outMsg             = $objStory->deleteStory($qs,$ids);
            }
            if($isPaging==0)	
                $result                 = $objStory->manageStory('PG',$intRecno,$strName,'','','','','','','','',$intInst,'','','','','',0,0,0,$intPgSize,0);
            else                                    
            {
                $intPgno                = 1;
                $intRecno               = 0;
                $result                 = $objStory->manageStory('V',0,$strName,'','','','','','','','',$intInst,'','','','','',0,0,0,0,0);
            }
           $totalResult                 = $objStory->manageStory('CT',0,$strName,'','','','','','','','',$intInst,'','','','','',0,0,0,0,0);
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