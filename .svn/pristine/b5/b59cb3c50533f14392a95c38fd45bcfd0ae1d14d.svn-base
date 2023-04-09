<?php

  //print_r($_SESSION);exit;
    include_once( CLASS_PATH.'clsTotRegistration.php');
    $objDevelop        = new clsTotRegistration;  
    $id                 = (isset($_REQUEST['ID']) && is_numeric($_REQUEST['ID']))?htmlspecialchars($_REQUEST['ID'],ENT_QUOTES):0;  
    $isPaging      = 0;
    $pgFlag    = 0;
    $intPgno       = 1;
    $intRecno      = 0;
    $ctr       = 0;
    //======================= Permission ===========================*/
    $glId           = $_REQUEST['GL'];
    $plId           = $_REQUEST['PL'];
    $pageName       = $_REQUEST['PAGE'].'.php';
    $userId         = $_SESSION['adminConsole_userID'];
    $privilege      = $_SESSION['userPrivilege'];
    $explPriv       = $objDevelop->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
    $editPriv       = $explPriv['edit'];
    $deletePriv     = $explPriv['delete'];
    $noAdd          = $explPriv['add'];
    $noActive       = $explPriv['active'];
     $noPublish      = $explPriv['publish'];
    //======================= Pagination ===========================*/
    
    if($_REQUEST['hdn_IsPaging']!="" && $_REQUEST['hdn_IsPaging'] >0)
        $isPaging=1;
    if($_REQUEST['hdn_PageNo']!=""  && $_REQUEST['hdn_PageNo'] >0)
    {
        $intPgno=$_REQUEST['hdn_PageNo'];
        $pgFlag = 1;
    }
    if($_REQUEST['hdn_RecNo']!=""  && $_REQUEST['hdn_RecNo'] >0)
    {   
        $intRecno=$_REQUEST['hdn_RecNo'];
        $pgFlag = 1;
    }
    if($isPaging==0 && $_REQUEST['hdn_PageNo']=='' && $_REQUEST['ID']>0)
    {
        $intRecno   = (isset($_SESSION['paging']['recNo']) && $_SESSION['paging']['recNo']>0)?$_SESSION['paging']['recNo']:$intRecno;
        $intPgno    = (isset($_SESSION['paging']['pageNo']) && $_SESSION['paging']['pageNo']>0)?$_SESSION['paging']['pageNo']:$intPgno;     
    }
    else    
        unset($_SESSION['paging']);
        
        $strNumber          = (isset($_REQUEST['txtRegdNumber']) && $_REQUEST['txtRegdNumber']!= '')?$_REQUEST['txtRegdNumber']:'';   
        $strStartDt         = (isset($_REQUEST['txtStartDt'])&& $_REQUEST['txtStartDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtStartDt'])):'0000-00-00';
        $strEndDate         = (isset($_REQUEST['txtEndDt'])&& $_REQUEST['txtEndDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtEndDt'])):'0000-00-00';
        $instituteName      = (isset($_REQUEST['selInstituteName']) && $_REQUEST['selInstituteName']!= '')?$_REQUEST['selInstituteName']:0;
        $program            = (isset($_REQUEST['selInterestCourse']) && $_REQUEST['selInterestCourse']!= '')?$_REQUEST['selInterestCourse']:0;
        //$regStatus          = (isset($_REQUEST['regStatus']) && $_REQUEST['regStatus']!= '')?$_REQUEST['regStatus']:'';
        $tpId               = $id;

         //============= search function =================
         if(isset($_REQUEST['btnSearch']))
        {
            $intPgno    = 1;
            $intRecno   = 0;
        }

        
         //============= Delete/Active/Inactive function =================
     
    if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
    {
        $qs = $_REQUEST['hdn_qs'];
        $ids    = $_REQUEST['hdn_ids'];
        $outMsg = $objDevelop->deleteTotRegistration($qs,$ids);
    }
    
        $instituteId = $_SESSION['institute_id'];
        if($privilege==3)
        {
            $arrConditions=array('reportID'=>$intRecno , 'number'=> $strNumber , 'startDate'=> $strStartDt , 'endDate'=> $strEndDate  , 'pubStatus'=>0, 'pageCount'=>20,'paymentStatus'=> $paymentStatus ,'eligibleStatus'=>$eligibleStatus,'assignStatus' =>$assignStatus,'instituteName' =>$instituteName,'tpId'=>$instituteId,'insPaymentStatus'=>$insPaymentStatus,'program'=>$program,'regStatus'=>$regStatus,'tppId'=>$tpId);
        }
        else if($privilege ==4)
        {
            $arrConditions=array('reportID'=>$intRecno , 'number'=> $strNumber , 'startDate'=> $strStartDt , 'endDate'=> $strEndDate  , 'pubStatus'=>0, 'pageCount'=>20,'paymentStatus'=> $paymentStatus ,'eligibleStatus'=>$eligibleStatus,'assignStatus' =>$assignStatus,'instituteName' =>$instituteName,'instituteId'=>$instituteId,'insPaymentStatus'=>$insPaymentStatus,'program'=>$program,'regStatus'=>$regStatus,'tppId'=>$tpId);
        }
        else
        {
             $arrConditions=array('reportID'=>$intRecno , 'number'=> $strNumber , 'startDate'=> $strStartDt , 'endDate'=> $strEndDate  , 'pubStatus'=>0, 'pageCount'=>20,'paymentStatus'=> $paymentStatus ,'eligibleStatus'=>$eligibleStatus,'assignStatus' =>$assignStatus,'instituteName' =>$instituteName,'insPaymentStatus'=>$insPaymentStatus,'program'=>$program,'regStatus'=>$regStatus,'tppId'=>$tpId);
        }

        
        if($isPaging==0){
           
            

            $result     = $objDevelop->manageTotRegistration('PG', $arrConditions); 
    }
                
    else
    {
            $intPgno    = 1;
            $intRecno   = 0;
            //$arrConditions=array('reportID'=>$intRecno , 'number'=> $strNumber , 'startDate'=> $strStartDt , 'endDate'=> $strEndDate  , 'pubStatus'=>0, 'pageCount'=>20,'paymentStatus'=> $paymentStatus ,'eligibleStatus'=>$eligibleStatus ,'assignStatus' =>$assignStatus,'instituteName' =>$instituteName,'instituteId'=>$sessinstituteId);
            $result                 = $objDevelop->manageTotRegistration('V',$arrConditions);
          //  print_r($result);exit;
    }
           $intPgSize                   = 20;

       $totalResult                 = $objDevelop->manageTotRegistration('V',$arrConditions);
       $intTotalRec                 = mysqli_num_rows($totalResult); 
       $intCurrPage                 = $intPgno;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
    
?>