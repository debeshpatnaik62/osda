<?php

  //print_r($_SESSION);exit;
    include_once( CLASS_PATH.'clsSkillDevelopment.php');
    $objDevelop        = new clsSkillDevelopment;  
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
        $paymentStatus      = (isset($_POST['paymentStatus']) && $_POST['paymentStatus']!= '')?$_POST['paymentStatus']:0;
        $insPaymentStatus   = (isset($_POST['insPaymentStatus']) && $_POST['insPaymentStatus']!= '')?$_POST['insPaymentStatus']:0;
        $eligibleStatus     = (isset($_POST['eligibleStatus']) && $_POST['eligibleStatus']!= '')?$_POST['eligibleStatus']:'';
        $assignStatus       = (isset($_POST['assignStatus']) && $_POST['assignStatus']!= '')?$_POST['assignStatus']:'';
        $instituteName      = (isset($_REQUEST['selInstituteName']) && $_REQUEST['selInstituteName']!= '')?$_REQUEST['selInstituteName']:0;
        $program            = (isset($_REQUEST['selInterestCourse']) && $_REQUEST['selInterestCourse']!= '')?$_REQUEST['selInterestCourse']:0;
        $regStatus          = (isset($_REQUEST['regStatus']) && $_REQUEST['regStatus']!= '')?$_REQUEST['regStatus']:'';
        $tpId               = $id;
//echo $instituteName;exit;
/*
        $strPublishDate     = (isset($_REQUEST['txtDate'])&& $_REQUEST['txtDate']!='')?date('Y-m-d',strtotime($_REQUEST['txtDate'])):'0000-00-00';*/
   
         //============= search function =================
         if(isset($_REQUEST['btnSearch']))
        {
            $intPgno    = 1;
            $intRecno   = 0;
        }

        // ============= update assign status=========By::Rahul ON::06-11-2020

         if(isset($_REQUEST['btnUpdate']) && $_POST['assStatusId']>0)
        {
        $userId = !empty($_SESSION['adminConsole_userID'])?$_SESSION['adminConsole_userID']:1;
        $assignedStatus   = (isset($_POST['assignedStatus']) && $_POST['assignedStatus']!= '')?$_POST['assignedStatus']:0;
        $intId   = (isset($_POST['assStatusId']) && $_POST['assStatusId']!= '')?$_POST['assStatusId']:0;

        $arrSConditions=array('intId'=>$intId ,'assignedStatus'=>$assignedStatus,'userId'=>$userId);

            $result     = $objDevelop->manageskillDevelopment('AS', $arrSConditions);

            if ($result)
             {
                $numRow = $result->fetch_array();
                $msg = $numRow[0];
             }
           
        }


         // ============= update student registration request status=========By::Rahul ON::07-04-2022

         if(isset($_REQUEST['hdnAction']) && ($_REQUEST['hdnAction']=='U' || $_REQUEST['hdnAction']=='R'))
        {
        
        $intAppId   = (isset($_POST['proStatusId']) && $_POST['proStatusId']!= '')?$_POST['proStatusId']:0;
        $intRejId   = (isset($_POST['proRejectId']) && $_POST['proRejectId']!= '')?$_POST['proRejectId']:0;
        $remark     = (isset($_POST['txtRemark']) && $_POST['txtRemark']!= '')?$_POST['txtRemark']:'';
        if($intAppId>0)
        {
            $programStatus   = 1;
            $intId           = $intAppId;
        } else if($intRejId >0)
        {
            $programStatus   = 2;
            $intId           = $intRejId;
        }
        
        $arrSConditions=array('intId'=>$intId ,'programStatus'=>$programStatus,'userId'=>$userId,'remark'=>$remark);

        $resultT     = $objDevelop->manageskillDevelopment('S', $arrSConditions);

        if ($resultT)
             {
                $numRowT = $resultT->fetch_array();
                $msg = $numRowT[0];
             }
           
        }
         //============= Delete/Active/Inactive function =================
     
    if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
    {
        $qs = $_REQUEST['hdn_qs'];
        $ids    = $_REQUEST['hdn_ids'];
        $outMsg = $objDevelop->deleteskillDevelopment($qs,$ids);
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
           
            

            $result     = $objDevelop->manageskillDevelopment('PGR', $arrConditions); 
    }
                
    else
    {
            $intPgno    = 1;
            $intRecno   = 0;
            //$arrConditions=array('reportID'=>$intRecno , 'number'=> $strNumber , 'startDate'=> $strStartDt , 'endDate'=> $strEndDate  , 'pubStatus'=>0, 'pageCount'=>20,'paymentStatus'=> $paymentStatus ,'eligibleStatus'=>$eligibleStatus ,'assignStatus' =>$assignStatus,'instituteName' =>$instituteName,'instituteId'=>$sessinstituteId);
            $result                 = $objDevelop->manageskillDevelopment('VR',$arrConditions);
          //  print_r($result);exit;
    }
           $intPgSize                   = 20;

       $totalResult                 = $objDevelop->manageskillDevelopment('VR',$arrConditions);
       $intTotalRec                 = mysqli_num_rows($totalResult); 
       $intCurrPage                 = $intPgno;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        if($program >0 && isset($_REQUEST['btnSearch']))
        {
        $resultIns     = $objDevelop->manageskillDevelopment('IP', $arrConditions); 
        if ($resultIns->num_rows > 0) {
        $numRow = $resultIns->fetch_array();  
        $totStudent = $numRow['toStudent'];
        $insFee     = $numRow['instituteFee'];
        $programFee = $numRow['programFee'];
        $studentFee = $numRow['intStudentFee'];
        $appStudFee = $numRow['intAppStudFee'];
        if($appStudFee>0)
        {
           $programFee =  $appStudFee;
        }
        else
        {
            $programFee = $studentFee;
        }

        $payFee     = $totStudent*($programFee)/(100/$insFee);

        }
    }
    
?>