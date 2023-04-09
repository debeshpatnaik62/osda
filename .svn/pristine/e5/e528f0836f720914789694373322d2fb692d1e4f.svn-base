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
    //======================= Permission ===========================*/
    $glId           = $_REQUEST['GL'];
    $plId           = $_REQUEST['PL'];
    $pageName       = $_REQUEST['PAGE'].'.php';
    $userId         = $_SESSION['adminConsole_userID'];
    $privilege      = $_SESSION['userPrivilege'];
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
        
        /*$strNumber            = (isset($_REQUEST['txtRegdNumber']) && $_REQUEST['txtRegdNumber']!= '')?$_REQUEST['txtRegdNumber']:'';   
        $strStartDt         = (isset($_REQUEST['txtStartDt'])&& $_REQUEST['txtStartDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtStartDt'])):'0000-00-00';
        $strEndDate         = (isset($_REQUEST['txtEndDt'])&& $_REQUEST['txtEndDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtEndDt'])):'0000-00-00';
        $intcourse          = (isset($_POST['coursera']) && $_POST['coursera']!= '')?$_POST['coursera']:'';
        $paymentStatus      = (isset($_POST['paymentStatus']) && $_POST['paymentStatus']!= '')?$_POST['paymentStatus']:0;
        $eligibleStatus      = (isset($_POST['eligibleStatus']) && $_POST['eligibleStatus']!= '')?$_POST['eligibleStatus']:'';
        $assignStatus      = (isset($_POST['assignStatus']) && $_POST['assignStatus']!= '')?$_POST['assignStatus']:'';
        $instituteName      = (isset($_POST['selInstituteName']) && $_POST['selInstituteName']!= '')?$_POST['selInstituteName']:0;*/
   
         //============= search function =================
         if(isset($_REQUEST['btnSearch']))
            {
                $intPgno    = 1;
                $intRecno   = 0;
            }

         //============= Delete/Active/Inactive function =================
       if($privilege>2)
        {
            $arrConditions=array('reportID'=>$intRecno ,'pageCount'=>20,'userId'=>$userId);
        }
        else
        {
            $arrConditions=array('reportID'=>$intRecno ,'pageCount'=>20);
        }
         
        if($isPaging==0){

            $result     = $objTP->manageskillTP('PGA', $arrConditions); 
    }
                
    else
    {
            $intPgno    = 1;
            $intRecno   = 0;
            
            $result                 = $objTP->manageskillTP('VA',$arrConditions);
          //  print_r($result);exit;
    }
           $intPgSize                   = 20;

       $totalResult                 = $objTP->manageskillTP('VA',$arrConditions);
       $intTotalRec                 = mysqli_num_rows($totalResult); 
       $intCurrPage                 = $intPgno;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>