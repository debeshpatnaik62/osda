<?php
 /* ================================================
    File Name             : .php
    Description           : This is used for view qualify panel result
    Date Created          : 07-Aug-2021 
    Devloped By           : Rahul Kumar Saw
    Devloped On           : 07-Aug-20121
    Update History    :
    <Updated by>    <Updated On>    <Remarks>
================================================== */
//============= include class path ======================//
     include_once(CLASS_PATH.'clsPanel.php');

//============= create object ===================//
     $objPanel            = new  clsPanel;

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
     $explPriv   = $objPanel->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
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
         $level            = (isset($_POST['selLevel']) && $_POST['selLevel']!= '')?$_POST['selLevel']:'';
         $marks            = (isset($_POST['intMarks']) && $_POST['intMarks']!= '')?$_POST['intMarks']:0;
         $qualify          = (isset($_POST['selQualify']) && $_POST['selQualify']!= '')?$_POST['selQualify']:'0';

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
                $outMsg     = $objPanel->updateQualify($qs,$ids);
        }   

//=================== View skill records ================================
        if($_SESSION['adminConsole_userID']==1)
        {
            $userId     = 0;
        }
        else
        {
            $userId     = $_SESSION['adminConsole_userID'];
        }
        if ($isPaging==0) {
            $result   = $objPanel->managePanel('PGQ',$intRecno,$marks,$skillId,'','','','','','','','',$distId,0,$userId,$intPgSize,'','',0,0);
        } else {
            $intPgno            = 1;
            $intRecno           = 0;
            $result   = $objPanel->managePanel('VQ',0,$marks,$skillId,'','','','','','','','',$distId,0,$userId,0,'','',0,0);
        }

        $totalResult            = $objPanel->managePanel('CQ',0,$marks,$skillId,'','','','','','','','',$distId,0,$userId,0,'','',0,0);
        $numRow                 = $totalResult->fetch_array();
        $intTotalRec            = $numRow[0]; 
        $intCurrPage            = $intPgno;    
        $_SESSION['paging']['recNo']  = $intRecno;
        $_SESSION['paging']['pageNo'] = $intPgno;

?>