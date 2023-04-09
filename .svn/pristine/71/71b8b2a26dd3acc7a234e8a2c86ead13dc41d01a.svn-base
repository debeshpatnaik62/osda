<?php
    /* ================================================
    File Name         	: panelTagDataInner.php
    Description		: This page is used to view  Venue Tag details.
    Author Name		: Rahul Kumar saw
    Date Created	: 21-April-2021
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsVenueTagged
    Functions Used	: manageVenueTag
    ==================================================*/
   
    include_once( CLASS_PATH.'clsVenueTagged.php');
    $objVenueTag         = new clsVenueTagged;	
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
    $explPriv      = $objVenueTag->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
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
        
       $intLevel               = (isset($_REQUEST['ddlLevel']) && $_REQUEST['ddlLevel'] != '')?$_REQUEST['ddlLevel']:'2';
       $regdType               = (isset($_POST['selRegdType']) && $_POST['selRegdType']!= '')?$_POST['selRegdType']:REGD_PHASE;
       
       //============ Search Function ========================//
        if(isset($_REQUEST['btnSearch']))
        {

            $intPgno            = 1;
            $intRecno           = 0;
          
        }
    
        
        try{
         //============= Delete/Active/Inactive function =================
           
            if($isPaging==0)	
                $result                 = $objVenueTag->manageVenueTagged('PFT',$intRecno,'',0,0,0,0,'1000-01-01','00:00:00',$regdType,'',$intLevel,$intPgSize);
            else                                    
            {
                $intPgno                = 1;
                $intRecno               = 0;
                $result                 = $objVenueTag->manageVenueTagged('FPT',0,'',0,0,0,0,'1000-01-01','00:00:00',$regdType,'',$intLevel,$intPgSize);
            }
            $totalResult                = $objVenueTag->manageVenueTagged('FPT',0,'',0,0,0,0,'1000-01-01','00:00:00',$regdType,'',$intLevel,$intPgSize);
            $intTotalRec                = mysqli_num_rows($totalResult); 
         }catch (Exception $e) { 
                $outMsg                 =  'Some error occured. Please try again'; 
                $errFlag                = 1;
        }
       $intCurrPage                     = $intPgno;
       $_SESSION['paging']['recNo']     = $intRecno;
       $_SESSION['paging']['pageNo']    = $intPgno;
      
        
        
    
?>