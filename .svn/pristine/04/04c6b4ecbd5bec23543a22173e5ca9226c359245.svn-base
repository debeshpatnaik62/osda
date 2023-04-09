<?php

  
    include_once( CLASS_PATH.'clsInfocus.php');
    $objInfocus        = new clsInfocus;  
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
    $explPriv       = $objInfocus->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
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
        
        $strName   = (isset($_REQUEST['txtName'])&& $_REQUEST['txtName']!='')?($_REQUEST['txtName']):'';
/*
        $strPublishDate     = (isset($_REQUEST['txtDate'])&& $_REQUEST['txtDate']!='')?date('Y-m-d',strtotime($_REQUEST['txtDate'])):'0000-00-00';*/
   
         //============= search function =================
         if(isset($_REQUEST['btnSearch']))
    {
        $intPgno    = 1;
                $intRecno   = 0;
                $strName = trim($_REQUEST['txtName']);

                // $strName   = (isset($_REQUEST['txtName'])&& $_REQUEST['txtName']!='')?($_REQUEST['txtName']):'';
    }

         //============= Delete/Active/Inactive function =================
     
    if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
    {
        $qs = $_REQUEST['hdn_qs'];
        $ids    = $_REQUEST['hdn_ids'];
        $outMsg = $objInfocus->deleteInfocus($qs,$ids);
    }

                
        if($isPaging==0){
           
            $arrConditions=array(
                                            'reportID'=>$intRecno ,
                                            'Name'=> $strName ,
                                            'pubStatus'=>0,
                                           'pageCount'=>10
                                            );

            $result     = $objInfocus->manageInfocus('PG', $arrConditions); 
    }
                
    else
    {
            $intPgno    = 1;
            $intRecno   = 0;
            $arrConditions=array(
                                            'reportID'=>$intRecno ,
                                             'Name'=> $strName ,
                                            'pubStatus'=>0,
                                            'pageCount'=>10
                                           
                                            );
            $result                 = $objInfocus->manageInfocus('V',$arrConditions);
          //  print_r($result);exit;
    }
           $intPgSize                   = 10;

       $totalResult                 = $objInfocus->manageInfocus('V',$arrConditions);
       $intTotalRec                 = mysqli_num_rows($totalResult); 
       $intCurrPage                 = $intPgno;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>