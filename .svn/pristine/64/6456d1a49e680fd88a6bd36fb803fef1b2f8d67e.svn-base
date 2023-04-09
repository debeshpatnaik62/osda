<?php
 /* ================================================
	  File Name         	  : viewAdvertisementInner.php
	  Description		  : This is used for view skill competiton details
	  Date Created            : 24-Jan-2018 
	  Devloped By		  : T Ketaki Debadarshini
	  Devloped On		  : 24-Jan-2018 
	  Update History	  :
	  <Updated by>		<Updated On>		<Remarks>
	  Include Functions	      : manageQuery(), deleteQuery()
================================================== */
//============= include class path ======================//
     include_once(CLASS_PATH.'clsAdvertisement.php');

//============= create object ===================//
     $objAdvt             = new  clsAdvertisement;

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
     $explPriv   = $objAdvt->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
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

        $strName            = (isset($_REQUEST['txtSearch']) && $_REQUEST['txtSearch']!= '')?$_REQUEST['txtSearch']:'';   
        $strStartDt         = (isset($_REQUEST['txtStartDt'])&& $_REQUEST['txtStartDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtStartDt'])):'0000-00-00';
        $strEndDate         = (isset($_REQUEST['txtEndDt'])&& $_REQUEST['txtEndDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtEndDt'])):'0000-00-00';

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
                $outMsg     = $objAdvt->deleteAdvertisement($qs,$ids);
        }		

//=================== View skill records ================================
        if ($isPaging==0) {
            $result		= $objAdvt->manageAdvertisement('PG',$intRecno,0,'0000-00-00','0000-00-00','','',0,0,$intPgSize,'','');
        } else {
            $intPgno            = 1;
            $intRecno           = 0;
            $result		= $objAdvt->manageAdvertisement('V',0,0,'0000-00-00','0000-00-00','','',0,0,$intPgSize,'','');
        }

        $totalResult            = $objAdvt->manageAdvertisement('CT',0,0,'0000-00-00','0000-00-00','','',0,0,$intPgSize,'','');
        $numRow                 = $totalResult->fetch_array();
        $intTotalRec            = $numRow[0]; 
        $intCurrPage            = $intPgno;    
        $_SESSION['paging']['recNo']  = $intRecno;
        $_SESSION['paging']['pageNo'] = $intPgno;

?>