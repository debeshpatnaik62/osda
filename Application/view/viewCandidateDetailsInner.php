<?php
 /* ================================================
	  File Name         	  : viewSkillCompetitionDetailsInner.php
	  Description		  : This is used for view skill competiton details
	  Date Created            : 24-Jan-2018 
	  Devloped By		  : T Ketaki Debadarshini
	  Devloped On		  : 24-Jan-2018 
	  Update History	  :
	  <Updated by>		<Updated On>		<Remarks>
	  Include Functions	      : manageQuery(), deleteQuery()
================================================== */
//============= include class path ======================//
     include_once(CLASS_PATH.'clsSkillCompetition.php');

//============= create object ===================//
     $objCompete             = new  clsSkillCompetition;
//print_r($_REQUEST);exit;
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
     $genderId   = $_REQUEST['ID'];
     $pageName   = $_REQUEST['PAGE'];
     $userId     = $_SESSION['adminConsole_userID'];


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
        
        $intSkill            = (isset($_POST['selSkill']) && $_POST['selSkill']!= '')?$_POST['selSkill']:0;
        $intUpdateSkill      = (isset($_POST['selUpdateSkill']) && $_POST['selUpdateSkill']!= '')?$_POST['selUpdateSkill']:0;
        $intDistrict         = (isset($_POST['selDistrict']) && $_POST['selDistrict']!= '')?$_POST['selDistrict']:$glId;
         $intBlock            = (isset($_POST['selBlock']) && $_POST['selBlock']!= '')?$_POST['selBlock']:0;
         $qualify            = (isset($_POST['selQualify']) && $_POST['selQualify']!= '')?$_POST['selQualify']:'';
         $confirm            = (isset($_POST['selConfirmation']) && $_POST['selConfirmation']!= '')?$_POST['selConfirmation']:'';
         $regdType           = (isset($_POST['selRegdType']) && $_POST['selRegdType']!= '')?$_POST['selRegdType']:$plId;
         $gender             = (isset($_POST['selGender']) && $_POST['selGender']!= '')?$_POST['selGender']:$genderId;

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
            $result		= $objCompete->manageSkillCompetition('PG',$intRecno,$intDistrict,$intBlock,'','','','',0,'0000-00-00','','','','','','',0,'','','',0,'',$gender,$confirm,$regdType,$qualify,$strName,$intPgSize,$intUpdateSkill,$intSkill,$strStartDt,$strEndDate);
        } else {
            $intPgno            = 1;
            $intRecno           = 0;
            $result		= $objCompete->manageSkillCompetition('V',0,$intDistrict,$intBlock,'','','','',0,'0000-00-00','','','','','','',0,'','','',0,'',$gender,$confirm,$regdType,$qualify,$strName,0,$intUpdateSkill,$intSkill,$strStartDt,$strEndDate);
        }

        $totalResult            = $objCompete->manageSkillCompetition('CT',0,$intDistrict,$intBlock,'','','','',0,'0000-00-00','','','','','','',0,'','','',0,'',$gender,$confirm,$regdType,$qualify,$strName,0,$intUpdateSkill,$intSkill,$strStartDt,$strEndDate);
        $numRow                 = $totalResult->fetch_array();
        $intTotalRec            = $numRow[0]; 
        $intCurrPage            = $intPgno;    
        $_SESSION['paging']['recNo']  = $intRecno;
        $_SESSION['paging']['pageNo'] = $intPgno;

?>