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
        
        $strNumber            = (isset($_REQUEST['txtRegdNumber']) && $_REQUEST['txtRegdNumber']!= '')?$_REQUEST['txtRegdNumber']:'';   
        $strStartDt         = (isset($_REQUEST['txtStartDt'])&& $_REQUEST['txtStartDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtStartDt'])):'0000-00-00';
        $strEndDate         = (isset($_REQUEST['txtEndDt'])&& $_REQUEST['txtEndDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtEndDt'])):'0000-00-00';
        $intcourse          = (isset($_POST['coursera']) && $_POST['coursera']!= '')?$_POST['coursera']:'';
        $paymentStatus      = (isset($_POST['paymentStatus']) && $_POST['paymentStatus']!= '')?$_POST['paymentStatus']:0;
        $eligibleStatus      = (isset($_POST['eligibleStatus']) && $_POST['eligibleStatus']!= '')?$_POST['eligibleStatus']:'';
        $assignStatus      = (isset($_POST['assignStatus']) && $_POST['assignStatus']!= '')?$_POST['assignStatus']:'';
        $instituteName      = (isset($_POST['selInstituteName']) && $_POST['selInstituteName']!= '')?$_POST['selInstituteName']:0;

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

         //============= Delete/Active/Inactive function =================
     
    if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
    {
        $qs = $_REQUEST['hdn_qs'];
        $ids    = $_REQUEST['hdn_ids'];
        $outMsg = $objDevelop->deleteskillDevelopment($qs,$ids);
    }
        $instituteId = $_SESSION['institute_id'];
        if($instituteId!=9)
        {
            $sessinstituteId =$instituteId;
        }
        else
        {
            $sessinstituteId = 0;
        }
        $intcourse ='SAP ERP';        
        if($isPaging==0){
           
            $arrConditions=array('reportID'=>$intRecno , 'number'=> $strNumber , 'startDate'=> $strStartDt , 'endDate'=> $strEndDate , 'courseType'=> $intcourse , 'pubStatus'=>0, 'pageCount'=>20,'instituteId' =>$sessinstituteId,'paymentStatus'=> $paymentStatus ,'eligibleStatus'=>$eligibleStatus,'assignStatus' =>$assignStatus,'instituteName' =>$instituteName);

            $result     = $objDevelop->manageskillDevelopment('PG', $arrConditions); 
    }
                
    else
    {
            $intPgno    = 1;
            $intRecno   = 0;
            $arrConditions=array('reportID'=>$intRecno , 'number'=> $strNumber , 'startDate'=> $strStartDt , 'endDate'=> $strEndDate , 'courseType'=> $intcourse , 'pubStatus'=>0, 'pageCount'=>20,'instituteId' =>$sessinstituteId,'paymentStatus'=> $paymentStatus ,'eligibleStatus'=>$eligibleStatus ,'assignStatus' =>$assignStatus,'instituteName' =>$instituteName);
            $result                 = $objDevelop->manageskillDevelopment('V',$arrConditions);
          //  print_r($result);exit;
    }
           $intPgSize                   = 20;

       $totalResult                 = $objDevelop->manageskillDevelopment('V',$arrConditions);
       $intTotalRec                 = mysqli_num_rows($totalResult); 
       $intCurrPage                 = $intPgno;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>