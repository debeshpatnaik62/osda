<?php
 /* ================================================
	  File Name         	  : viewpublishResultsInner.php
	  Description	          : This is used for update competition results
	  Author Name	          : Ashis kumar Patra
	  Date Created		  : 16-April-2018 
	  Devloped By		  : Ashis kumar Patra
	  Devloped On		  : 16-April-2018
	  Update History		  :
	  <Updated by>		<Updated On>		<Remarks>
	  Include Functions	      : manageEvent(), deleteQuery()
================================================== */
//============= include class path ======================//
     include_once(CLASS_PATH.'clsEventDetails.php');

//============= create object ===================//
     $objCompete             = new  clsEventDetails;

//============ Default Value =================//
     $isPaging   =  0;
     $pgFlag     =  0;
     $intPgno    =  1;   
     $intRecno   =  0;
     $ctr        =  0;
     $intPgSize  =  20;

//============ Permission =====================//
     $glId       = $_REQUEST['GL'];
     $plId       = $_REQUEST['PL'];
     $pageName   = $_REQUEST['PAGE'];
     $userId     = $_SESSION['adminConsole_userID'];
     $explPriv   = $objCompete->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
     $deletePriv = $explPriv['delete'];

 //======================= Pagination ===========================*/
		
        if ($_REQUEST['hdn_IsPaging']!="" && $_REQUEST['hdn_IsPaging'] >0)
            $isPaging   = 1;
        if ($_REQUEST['hdn_PageNo']!=""  && $_REQUEST['hdn_PageNo'] >0) {
            $intPgno    = $_REQUEST['hdn_PageNo'];
            $pgFlag     = 1;
        }
        if ($_REQUEST['hdn_RecNo']!=""  && $_REQUEST['hdn_RecNo'] >0) {	
            $intRecno   = $_REQUEST['hdn_RecNo'];
            $pgFlag     = 1;
        }
        if ($isPaging==0 && $_REQUEST['hdn_PageNo']=='' && $_REQUEST['ID']>0) {
            $intRecno	= (isset($_SESSION['paging']['recNo']) && $_SESSION['paging']['recNo']>0)?$_SESSION['paging']['recNo']:$intRecno;
            $intPgno	= (isset($_SESSION['paging']['pageNo']) && $_SESSION['paging']['pageNo']>0)?$_SESSION['paging']['pageNo']:$intPgno;		
        } else {
            unset($_SESSION['paging']);
        }	

        $strName            = (isset($_POST['txtSearch']) && $_POST['txtSearch']!= '')?$_POST['txtSearch']:'';   
        $intEventId         = (isset($_POST['selSkill']) && $_POST['selSkill']!= '')?$_POST['selSkill']:0;
       // $strAckNo            = (isset($_POST['txtAcklNo']) && $_REQUEST['txtAcklNo']!= '')?$_POST['txtAcklNo']:'';  
       

//============ Search Function ==============================//
        if(isset($_REQUEST['btnSearch']))
        {
            $intPgno        = 1;
            $intRecno       = 0;

        }
    
 //============= Delete Records ================================	
        if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
        {
                $qs         = $_REQUEST['hdn_qs'];
                $ids        = $_REQUEST['hdn_ids'];
                $outMsg     = $objCompete->deleteEventDetails($qs,$ids);
        }		

//=================== View skill records ================================
        if ($isPaging==0) {
            $result		= $objCompete->manageEventDetails('PG', $intRecno, '', $strName, '0', $intEventId,0,'0000-00-00','0000-00-00');
        } else {
            $intPgno            = 1;
            $intRecno           = 0;
            $result		= $objCompete->manageEventDetails('V', 0, '', $strName, '0', $intEventId,0,'0000-00-00','0000-00-00');
        }

        $totalResult            = $objCompete->manageEventDetails('CT', 0, '', $strName, '0', $intEventId,0,'0000-00-00','0000-00-00');
        $numRow                 = $totalResult->fetch_array();
        $intTotalRec            = $numRow[0]; 
        $intCurrPage            = $intPgno;    
        $_SESSION['paging']['recNo']  = $intRecno;
        $_SESSION['paging']['pageNo'] = $intPgno;

?>