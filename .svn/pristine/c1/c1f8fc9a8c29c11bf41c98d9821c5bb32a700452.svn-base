<?php
 /* ================================================
    File Name             : addMultiResultInner.php
    Description           : This is used for view skill competiton details
    Date Created          : 02-Aug-2021 
    Devloped By           : Rahul Kumar Saw
    Devloped On           : 02-Aug-20121
    Update History    :
    <Updated by>    <Updated On>    <Remarks>
    Include Functions       : manageQuery(), deleteQuery()
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
        $distId        = (isset($_POST['ddlDist']) && $_POST['ddlDist']!= '')?$_POST['ddlDist']:0;
         $level            = (isset($_POST['selLevel']) && $_POST['selLevel']!= '')?$_POST['selLevel']:'L1';
         $marks            = (isset($_POST['intMarks']) && $_POST['intMarks']!= '')?$_POST['intMarks']:0;
         $qualify          = (isset($_POST['selQualify']) && $_POST['selQualify']!= '')?$_POST['selQualify']:'0';
         $regdType           = (isset($_POST['selRegdType']) && $_POST['selRegdType']!= '')?$_POST['selRegdType']:REGD_PHASE;
         $gender             = (isset($_POST['selGender']) && $_POST['selGender']!= '')?$_POST['selGender']:0;
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
                $outMsg     = $objResult->updateQualify($qs,$ids,$level);
        }   

//=================== View skill records ================================
        if ($isPaging==0) {
            $result   = $objResult->manageResult('PGR',$intRecno,$distId,$skillId,'','','','','','',$marks,$level,0,$qualify,0,$intPgSize,'','',$gender,$regdType);
        } else {
            $intPgno            = 1;
            $intRecno           = 0;
            $result   = $objResult->manageResult('VR',0,$distId,$skillId,'','','','','','',$marks,$level,0,$qualify,0,0,'','',$gender,$regdType);
        }

        $totalResult            = $objResult->manageResult('CR',0,$distId,$skillId,'','','','','','',$marks,$level,0,$qualify,0,0,'','',$gender,$regdType);
        $numRow                 = $totalResult->fetch_array();
        $intTotalRec            = $numRow[0]; 
        $intCurrPage            = $intPgno;    
        $_SESSION['paging']['recNo']  = $intRecno;
        $_SESSION['paging']['pageNo'] = $intPgno;

?>