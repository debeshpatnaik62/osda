<?php
    /* ================================================
    File Name         	: viewMessagedetailsInner.php
    Description		: This page is used to view Employer Speaks details.
    Author Name		: T Ketaki Debadarshini
    Date Created	: 17-Sept-2016
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsMsgBoard
    Functions Used	: manageMsgboard,deleteMsgBoard
     
    ==================================================*/
    include_once( CLASS_PATH.'clsMsgBoard.php');
    $objMsg        = new clsMsgBoard;	
    $isPaging      = 0;
    $pgFlag	   = 0;
    $intPgno	   = 1;
    $intRecno	   = 0;
    $ctr	   = 0;
    $intCattype    =0 ;
    $intDist      = 0; 
    //======================= Permission ===========================*/
    $glId           = $_REQUEST['GL'];
    $plId           = $_REQUEST['PL'];
    $pageName       = $_REQUEST['PAGE'].'.php';
    $userId         = $_SESSION['adminConsole_userID'];
    $explPriv       = $objMsg->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
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
           $qs	= $_REQUEST['hdn_qs'];
           $ids	= $_REQUEST['hdn_ids'];
           $outMsg	= $objMsg->deleteMsgBoard($qs,$ids);
       }

       if($isPaging==0)	
           $result		= $objMsg->manageMsgboard('PG',$intRecno,$strName,'','','','','','',0,0,0,$intInst,'','');                        
       else
       {
           $intPgno	= 1;
           $intRecno	= 0;
           $result                 = $objMsg->manageMsgboard('V',0,$strName,'','','','','','',0,0,0,$intInst,'','');           
       }
      $totalResult                 = $objMsg->manageMsgboard('V',0,$strName,'','','','','','',0,0,0,$intInst,'','');           
      $intTotalRec                 = mysqli_num_rows($totalResult); 
      
    }catch (Exception $e) { 
            $outMsg =  'Some error occured. Please try again'; 
            $errFlag = 1;
        } 
   $intCurrPage                 = $intPgno;
   $intPgSize                   = 20;
   $_SESSION['paging']['recNo'] = $intRecno;
   $_SESSION['paging']['pageNo']= $intPgno;
      
        
      
    
?>