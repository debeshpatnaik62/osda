<?php
 /* ================================================
	  File Name           : viewQualifyStatusInner.php
	  Description		  : This is used for view skill competiton details
	  Date Created        : 24-Jan-2018 
	  Devloped By		  : Rahul Kumar Saw
	  Devloped On		  : 24-Jan-2018 
	  Update History	  :
	  <Updated by>		<Updated On>		<Remarks>
	  Include Functions	  : manageQuery(), deleteQuery()
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
        
        $qualify            = (isset($_POST['selQualify']) && $_POST['selQualify']!= '')?$_POST['selQualify']:'';

//============ Search Function ==============================//
        if(isset($_REQUEST['btnSearch']))
        {
            $intPgno        = 1;
            $intRecno       = 0;

        }

// ============= update assign status=========By::Rahul ON::22-03-2021

        if(isset($_REQUEST['btnUpdate']) && !empty($_POST['applicantId']))
        { 
        //$userId       = !empty($_SESSION['adminConsole_userID'])?$_SESSION['adminConsole_userID']:1;
        $mark         = (isset($_POST['mark']) && $_POST['mark']!= '')?$_POST['mark']:0;
        $applicantId  = (isset($_POST['applicantId']) && $_POST['applicantId']!= '')?$_POST['applicantId']:'';
        $regType      = substr($applicantId,0,2);

            $result     = $objCompete->manageSkillCompetition('AS',0,$mark,0,$applicantId,$regType,'','',0,'0000-00-00','','','','','','',0,'','','',0,'',0,'',0,0,'',0,0,0,'0000-00-00','0000-00-00');

            if ($result)
             {
                $numRow = $result->fetch_array();
                $msg = $numRow[0];
             }
           
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
            $result		= $objCompete->manageSkillCompetition('PGQ',$intRecno,0,0,'','','','',0,'0000-00-00','','','','','','',0,'','','',0,'',0,'',0,$intQualify,$strName,$intPgSize,0,0,'0000-00-00','0000-00-00');
        } else {
            $intPgno            = 1;
            $intRecno           = 0;
            $result		= $objCompete->manageSkillCompetition('VQ',0,0,0,'','','','',0,'0000-00-00','','','','','','',0,'','','',0,'',0,'',0,$intQualify,$strName,0,0,0,'0000-00-00','0000-00-00');
        }

        $totalResult            = $objCompete->manageSkillCompetition('CTQ',0,0,0,'','','','',0,'0000-00-00','','','','','','',0,'','','',0,'',0,'',0,$intQualify,$strName,0,0,0,'0000-00-00','0000-00-00');
        $numRow                 = $totalResult->fetch_array();
        $intTotalRec            = $numRow[0]; 
        $intCurrPage            = $intPgno;    
        $_SESSION['paging']['recNo']  = $intRecno;
        $_SESSION['paging']['pageNo'] = $intPgno;

?>