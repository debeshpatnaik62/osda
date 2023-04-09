<?php
 /* ================================================
    File Name             : updateSkillMarksInner.php
    Description           : This is used for view skill development marks details
    Date Created          : 07-Dec-2021 
    Devloped By           : Rahul Kumar Saw
    Devloped On           : 07-Dec-20121
    Update History    :
    <Updated by>    <Updated On>    <Remarks>
    Include Functions       : clsSkillDevelopment()
================================================== */
//============= include class path ======================//
   include_once( CLASS_PATH.'clsSkillDevelopment.php');
    $objDevelop        = new clsSkillDevelopment;

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
     $privilege      = $_SESSION['userPrivilege'];
     $explPriv   = $objDevelop->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
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
        
        $soughtFor         = (isset($_POST['selectedCourse']) && $_POST['selectedCourse']!= '')?$_POST['selectedCourse']:0;
        $instituteName     = (isset($_POST['selInstituteName']) && $_POST['selInstituteName']!= '')?$_POST['selInstituteName']:0;

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
                $outMsg     = $objDevelop->deleteskillDevelopment($qs,$ids);
        }   

//=================== View skill records ================================
        $instituteId = $_SESSION['institute_id'];
        if ($isPaging==0) {

            $arrConditions=array('reportID'=>$intRecno , 'pageCount'=>20,'instituteName' =>$instituteName,'tpId'=>$soughtFor,'instituteId'=>$instituteId);
            $result     = $objDevelop->manageskillDevelopment('PGR', $arrConditions); 
        } else {
            $intPgno            = 1;
            $intRecno           = 0;
            $arrConditions=array('reportID'=>$intRecno , 'pageCount'=>20,'instituteName' =>$instituteName,'tpId'=>$soughtFor,'instituteId'=>$instituteId);
            $result     = $objDevelop->manageskillDevelopment('VR', $arrConditions); 
        }

        $totalResult                 = $objDevelop->manageskillDevelopment('VR',$arrConditions);
       $intTotalRec                 = mysqli_num_rows($totalResult); 
       $intCurrPage                 = $intPgno;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;

?>