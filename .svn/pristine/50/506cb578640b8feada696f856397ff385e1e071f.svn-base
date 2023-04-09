<?php

  //print_r($_SESSION);exit;
    include_once( CLASS_PATH.'clsSkillTP.php');
    $objTP        = new clsSkillTP;  
    $id           = (isset($_REQUEST['ID']) && is_numeric($_REQUEST['ID']))?htmlspecialchars($_REQUEST['ID'],ENT_QUOTES):0;  
    $isPaging      = 0;
    $pgFlag    = 0;
    $intPgno       = 1;
    $intRecno      = 0;
    $ctr       = 0;
    $msg   = '';
    $outMsg = '';
    //======================= Permission ===========================*/
    $glId           = $_REQUEST['GL'];
    $plId           = $_REQUEST['PL'];
    $pageName       = $_REQUEST['PAGE'].'.php';
    $userId         = $_SESSION['adminConsole_userID'];
    $explPriv       = $objTP->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
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
        
        $vchOrgName          = (isset($_REQUEST['intPartnerName']) && $_REQUEST['intPartnerName']!= '')?$_REQUEST['intPartnerName']:'0';   
        $tinApproveStatus    = (isset($_REQUEST['tinApproveStatus']) && $_REQUEST['tinApproveStatus']!= '')?$_REQUEST['tinApproveStatus']:'';  
   
         //============= search function =================
         if(isset($_REQUEST['btnSearch']))
        {
            $intPgno    = 1;
            $intRecno   = 0;
        }
        
        // ============= update fee Structure request status=========By::Rahul ON::16-06-2022

        if(isset($_REQUEST['hdnAction']) && ($_REQUEST['hdnAction']=='F'))
        {
        $approveStatus = $_POST['hdnappStatus'];
        $intAppId   = (isset($_POST['proStatusId']) && $_POST['proStatusId']!= '')?$_POST['proStatusId']:0;
        
        $studFee      = (isset($_POST['txtStudFee']) && $_POST['txtStudFee']!= '')?$_POST['txtStudFee']:'0';
        $studQty      = (isset($_POST['txtStudentQty']) && $_POST['txtStudentQty']!= '')?$_POST['txtStudentQty']:'0';
        $trainFee     = (isset($_POST['txtTrainFee']) && $_POST['txtTrainFee']!= '')?$_POST['txtTrainFee']:'0';
        $trainQty     = (isset($_POST['txtTrainQty']) && $_POST['txtTrainQty']!= '')?$_POST['txtTrainQty']:'0';
        $insFee       = (isset($_POST['txtInsFee']) && $_POST['txtInsFee']!= '')?$_POST['txtInsFee']:'0';
        $insQty       = (isset($_POST['txtInsQty']) && $_POST['txtInsQty']!= '')?$_POST['txtInsQty']:'0';
        
        $totAmount      = ($studFee*$studQty)+($trainFee*$trainQty)+($insFee*$insQty);

        
        $arrFConditions=array('intId'=>$intAppId ,'studFee'=>$studFee,'studQty'=>$studQty,'updatedBy'=>$userId,'trainFee'=>$trainFee,'trainQty'=>$trainQty,'insFee'=>$insFee,'insQty'=>$insQty,'approveStatus'=>$approveStatus);
           
        $result     = $objTP->manageskillTP('FS', $arrFConditions);

        if ($result)
         {
            $numRow = $result->fetch_array();
            $msg = $numRow[0];
         }
       
       
        }

        // ============= update program request status=========By::Rahul ON::30-11-2021

        if(isset($_REQUEST['hdnAction']) && ($_REQUEST['hdnAction']=='U' || $_REQUEST['hdnAction']=='R'))
        {
       
        $intAppId   = (isset($_POST['proStatusId']) && $_POST['proStatusId']!= '')?$_POST['proStatusId']:0;
        $intRejId   = (isset($_POST['proRejectId']) && $_POST['proRejectId']!= '')?$_POST['proRejectId']:0;
        $remark     = (isset($_POST['txtRemark']) && $_POST['txtRemark']!= '')?$_POST['txtRemark']:'';
        $free       = $_POST['txtCheck'];
        if($free==1)
        {
            $feeProgram = 1;
        }
        else
        {   
            $tpFee      = (isset($_POST['txtProgramFee']) && $_POST['txtProgramFee']!= '')?$_POST['txtProgramFee']:'0';
            $osdaFee    = (isset($_POST['txtOSDAFee']) && $_POST['txtOSDAFee']!= '')?$_POST['txtOSDAFee']:'0';
            $instituteFee = (isset($_POST['txtInstituteFee']) && $_POST['txtInstituteFee']!= '')?$_POST['txtInstituteFee']:'0';
            $feeProgram = 0;
        }
        $totPer = $tpFee+$osdaFee+$instituteFee;

        if($intAppId>0)
        {
            $programStatus   = 1;
            $intId           = $intAppId;
        } else if($intRejId >0)
        {
            $programStatus   = 2;
            $intId           = $intRejId;
        }
        
        $arrSConditions=array('intId'=>$intId ,'programStatus'=>$programStatus,'remark'=>$remark,'updatedBy'=>$userId,'free'=>$feeProgram,'tpFee'=>$tpFee,'osdaFee'=>$osdaFee,'instituteFee'=>$instituteFee);
            if($totPer>100)
            {
                $outMsg = 'Total Percentage should be 100 %';
            }
            else
            {
            $result     = $objTP->manageskillTP('PS', $arrSConditions);

            if ($result)
             {
                $numRow = $result->fetch_array();
                $msg = $numRow[0];
             }
            }
           
        }

         //============= Delete/Active/Inactive function =================
     
   /* if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
    {
        $qs = $_REQUEST['hdn_qs'];
        $ids    = $_REQUEST['hdn_ids'];
        $outMsg = $objTP->deleteskillTP($qs,$ids);
    } */       
        if($isPaging==0){
           
            $arrConditions=array('reportID'=>$intRecno ,'pageCount'=>20,'vchOrgName'=>$vchOrgName,'tinApproveStatus'=>$tinApproveStatus);

            $result     = $objTP->manageskillTP('DPP', $arrConditions); 
    }
                
    else
    {
            $intPgno    = 1;
            $intRecno   = 0;
            $arrConditions=array('reportID'=>$intRecno ,'pageCount'=>0,'vchOrgName'=>$vchOrgName,'tinApproveStatus'=>$tinApproveStatus);
            $result                 = $objTP->manageskillTP('DP',$arrConditions);
          //  print_r($result);exit;
    }
           $intPgSize                   = 20;

       $totalResult                 = $objTP->manageskillTP('DP',$arrConditions);
       $intTotalRec                 = mysqli_num_rows($totalResult); 
       $intCurrPage                 = $intPgno;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>