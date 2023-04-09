<?php
    /* ================================================
    File Name         	: viewCourseInner.php
    Description		: This page is used to view course details.
    Author Name		: T Ketaki Debadarshini
    Date Created	: 21-March-2017
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsCourse
    Functions Used	: viewCourse(),deleteCourse()
    ==================================================*/
    include_once( CLASS_PATH.'clsCourse.php');
    $objCourse     = new clsCourse;	
    $isPaging      = 0;
    $pgFlag	   = 0;
    $intPgno	   = 1;
    $intRecno	   = 0;
    $ctr	   = 0;
    $intPgSize                   = 20;
    $intSectorId    = 0;
    //======================= Permission ===========================*/
    $glId          = $_REQUEST['GL'];
    $plId          = $_REQUEST['PL'];
    $userId        = $_SESSION['adminConsole_userID'];
    $pageName      = $_REQUEST['PAGE']. '.php';
    $explPriv      = $objCourse->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
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
        $intSectorId = (isset($_REQUEST['ddlSector']) && $_REQUEST['ddlSector'] != '')?$_REQUEST['ddlSector']:'0';
        $strCourseName = (isset($_REQUEST['txtCourseName']) && $_REQUEST['txtCourseName'] != '')?$_REQUEST['txtCourseName']:'';
        
        //============ Serach Function =====================//
            if(isset($_REQUEST['btnSearch'])) {
                 $intPgno           = 1;
                 $intRecno          = 0;
                 $strCourseName     = trim($_REQUEST['txtCourseName']);
                 $intSectorId       = $_REQUEST['ddlSector'];         
            }   
       
         //============= Delete/Active/Inactive function =================
	if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
	{
		$qs                 = $_REQUEST['hdn_qs'];
		$ids                = $_REQUEST['hdn_ids'];
		$outMsg             = $objCourse->deleteCourse($qs,$ids);
	}
        
        try{
                if($isPaging==0)	
                    $result                 = $objCourse->viewCourse('PG',$intRecno,$intSectorId,$strCourseName,'','',0,0,'','',0,1,0,$intPgSize,'');
                else                                    
                {
                    $intPgno	= 1;
                    $intRecno	= 0;
                    $result                 = $objCourse->viewCourse('V',0,$intSectorId,$strCourseName,'','',0,0,'','',0,1,0,0,'');
                }
               $totalResult                 = $objCourse->viewCourse('CT',0,$intSectorId,$strCourseName,'','',0,0,'','',0,1,0,0,'');
               $numRow                      = $totalResult->fetch_array();
               $intTotalRec                 = $numRow[0]; 
            }catch (Exception $e) { 
                $outMsg =  'Some error occured. Please try again'; 
                $errFlag = 1;
        }
       $intCurrPage                 = $intPgno;
       
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>