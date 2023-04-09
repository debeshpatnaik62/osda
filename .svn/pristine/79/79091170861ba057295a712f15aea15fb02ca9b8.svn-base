<?php
 /* ================================================
    File Name             : viewAttandanceInner.php
    Description           : This is used for view skill competiton attandance details
    Date Created          : 26-May-2022
    Devloped By           : Rahul Kumar Saw
    Devloped On           : 26-May-2022
    Update History    :
    <Updated by>    <Updated On>    <Remarks>
================================================== */
//============= include class path ======================//
     include_once(CLASS_PATH.'clsResult.php');

//============= create object ===================//
     $objResult            = new  clsResult;

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
     $explPriv   = $objResult->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
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
            $intRecno = (isset($_SESSION['paging']['recNo']) && $_SESSION['paging']['recNo']>0)?$_SESSION['paging']['recNo']:$intRecno;
            $intPgno  = (isset($_SESSION['paging']['pageNo']) && $_SESSION['paging']['pageNo']>0)?$_SESSION['paging']['pageNo']:$intPgno;   
        } else 
        {
            unset($_SESSION['paging']);
        } 
        
        $skillId         = (isset($_POST['selSkill']) && $_POST['selSkill']!= '')?$_POST['selSkill']:0;
        $distId          = (isset($_POST['ddlDist']) && $_POST['ddlDist']!= '')?$_POST['ddlDist']:0;
        $level           = (isset($_POST['selLevel']) && $_POST['selLevel']!= '')?$_POST['selLevel']:'L1';
        $marks           = (isset($_POST['intMarks']) && $_POST['intMarks']!= '')?$_POST['intMarks']:0;
        $attandance      = (isset($_POST['selAttandance']) && $_POST['selAttandance']!= '')?$_POST['selAttandance']:'';
        $regdType        = (isset($_POST['selRegdType']) && $_POST['selRegdType']!= '')?$_POST['selRegdType']:REGD_PHASE;

//============ Search Function ==============================//
        if(isset($_REQUEST['btnSearch']))
        {
            $intPgno        = 1;
            $intRecno       = 0;

        }

//=================== View skill records ================================
        if ($isPaging==0) {
            $result   = $objResult->manageResult('PGA',$intRecno,$distId,$skillId,'','','','','','',$attandance,$level,0,0,0,$intPgSize,'','',0,$regdType);
        } else {
            $intPgno            = 1;
            $intRecno           = 0;
            $result   = $objResult->manageResult('VRA',0,$distId,$skillId,'','','','','','',$attandance,$level,0,0,0,0,'','',0,$regdType);
        }

        $totalResult            = $objResult->manageResult('CRA',0,$distId,$skillId,'','','','','','',$attandance,$level,0,0,0,0,'','',0,$regdType);
        $numRow                 = $totalResult->fetch_array();
        $intTotalRec            = $numRow[0]; 
        $intCurrPage            = $intPgno;    
        $_SESSION['paging']['recNo']  = $intRecno;
        $_SESSION['paging']['pageNo'] = $intPgno;

?>