<?php
    /* ================================================
    File Name         	: viewInstituteCourse.php
    Description		: This page is used to  view sector details.
    Author Name		: T Ketaki Debadarshini
    Date Created	: 22-March-2017
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

   Class Used		:  clsInstituteCourse
    Functions Used	:  readSector, addUpdateSector 
     
    ==================================================*/
    include_once( CLASS_PATH.'clsInstituteCourse.php');
    $objCourse          = new clsInstituteCourse;		
    $isPaging      = 0;
    $pgFlag	   = 0;
    $intPgno	   = 1;
    $intRecno	   = 0;
    $ctr	   = 0;
    $intCattype    = 0 ;
    $intDist       =  0;
    $intInst       =  0;
    //======================= Permission ===========================*/
    $glId          = $_REQUEST['GL'];
    $plId          = $_REQUEST['PL'];
    $pageName      = $_REQUEST['PAGE'].'.php';
    $userId        = USER_ID;
    $adminConsole_Privilege = ADMIN_PRIVILEGE;
    /*$explPriv      = $objCourse->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
    $noAdd         = $explPriv['add'];*/
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
           $intDist = (isset($_REQUEST['ddlDist']) && $_REQUEST['ddlDist'] != '')?$_REQUEST['ddlDist']:'0';
	   $intInst = (isset($_REQUEST['ddlInst']) && $_REQUEST['ddlInst'] != '')?$_REQUEST['ddlInst']:'0';
           
  //============ Search Function ========================//
             if(isset($_REQUEST['btnSearch']))
             {
                 $intPgno        = 1;
                 $intRecno       = 0;
                 $intDist        = $_REQUEST['ddlDist'];
                 $intInst        = $_REQUEST['ddlInst'];                 
             }            

    
    try{
       
        //============= Delete/Active/Inactive function =================
	if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
	{
		$qs	= $_REQUEST['hdn_qs'];
		$ids	= $_REQUEST['hdn_ids'];
		$outMsg	= $objCourse->deleteInstituteCourse($qs,$ids);
	}

       if($isPaging==0)	
           $result                 = $objCourse->manageInstituteCourse('PG',$intRecno,$intDist,$intInst,0,0,0,0,0,'');                
       else
       {
           $intPgno                = 1;
           $intRecno               = 0;
           $result                 = $objCourse->manageInstituteCourse('V',0,$intDist,$intInst,0,0,0,0,0,'');                
       }
      $totalResult                 = $objCourse->manageInstituteCourse('CT',0,$intDist,$intInst,0,0,0,0,0,'');                
      $numRow                      = $totalResult->fetch_array();
      $intTotalRec                 = $numRow[0]; 
      
    }catch (Exception $e) { 
            $outMsg =  'Some error occured. Please try again'; 
            $errFlag = 1;
        } 
   $intCurrPage                 = $intPgno;
   $intPgSize                   = 20;
   $_SESSION['paging']['recNo'] = $intRecno;
   $_SESSION['paging']['pageNo']= $intPgno;
      
        
      
    
?>