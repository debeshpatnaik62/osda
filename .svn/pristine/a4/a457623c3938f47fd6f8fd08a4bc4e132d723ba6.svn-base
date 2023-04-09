<?php
 /* ================================================
	  File Name           : viewSkillWSIDDetailsInner.php
	  Description		  : This is used for view World skill competiton details
	  Date Created        : 23-Mar-2021 
	  Devloped By		  : Rahul Kumar Saw
	  Devloped On		  : 23-Mar-2021 
	  Update History	  :
	  <Updated by>		<Updated On>		<Remarks>
	  Include Functions	      :
================================================== */
//============= include class path ======================//
     include_once(CLASS_PATH.'clsSkillCompetition.php');

//============= create object ===================//
     $objCompete             = new  clsSkillCompetition;

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

        $strName            = (isset($_REQUEST['txtSearch']) && $_REQUEST['txtSearch']!= '')?$_REQUEST['txtSearch']:'';   
        
        $intSkill            = (isset($_POST['selSkill']) && $_POST['selSkill']!= '')?$_POST['selSkill']:0;
        $intDistrict         = (isset($_POST['selDistrict']) && $_POST['selDistrict']!= '')?$_POST['selDistrict']:0;
        $qualify            = (isset($_POST['selQualify']) && $_POST['selQualify']!= '')?$_POST['selQualify']:'';
        $confirm            = (isset($_POST['selConfirmation']) && $_POST['selConfirmation']!= '')?$_POST['selConfirmation']:'';
        $regType            = (isset($_POST['selRegType']) && $_POST['selRegType']!= '')?$_POST['selRegType']:'';


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
                $outMsg     = $objCompete->deleteSkillCompetition($qs,$ids);
        }		

//=================== View skill records ================================
        if ($isPaging==0) {
            $result		= $objCompete->manageSkillCompetition('WPG',$intRecno,$intDistrict,0,'','','','',0,'0000-00-00','','','','','','',0,'','','',0,$regType,0,$confirm,0,$qualify,$strName,$intPgSize,0,$intSkill,'0000-00-00','0000-00-00');
        } else {
            $intPgno            = 1;
            $intRecno           = 0;
            $result		= $objCompete->manageSkillCompetition('WV',0,$intDistrict,0,'','','','',0,'0000-00-00','','','','','','',0,'','','',0,$regType,0,$confirm,0,$qualify,$strName,0,0,$intSkill,'0000-00-00','0000-00-00');
        }

        $totalResult            = $objCompete->manageSkillCompetition('WCT',0,$intDistrict,0,'','','','',0,'0000-00-00','','','','','','',0,'','','',0,$regType,0,$confirm,0,$qualify,$strName,0,0,$intSkill,'0000-00-00','0000-00-00');
        $numRow                 = $totalResult->fetch_array();
        $intTotalRec            = $numRow[0]; 
        $intCurrPage            = $intPgno;    
        $_SESSION['paging']['recNo']  = $intRecno;
        $_SESSION['paging']['pageNo'] = $intPgno;

?>