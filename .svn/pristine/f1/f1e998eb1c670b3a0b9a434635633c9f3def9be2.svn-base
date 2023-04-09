<?php

  
    include_once( CLASS_PATH.'clsPhilosophy.php');
    $objPhilosophy        = new clsPhilosophy;  
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
    $explPriv       = $objPhilosophy->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
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
        
        $strTitle   = (isset($_REQUEST['vchTitle'])&& $_REQUEST['vchTitle']!='')?($_REQUEST['vchTitle']):'';
   
         //============= search function =================
         if(isset($_REQUEST['btnSearch']))
    {
        $intPgno    = 1;
                $intRecno   = 0;
                $strTitle = trim($_REQUEST['vchTitle']);

                // $strTitle   = (isset($_REQUEST['vchTitle'])&& $_REQUEST['vchTitle']!='')?($_REQUEST['vchTitle']):'';
    }

         //============= Delete/Active/Inactive function =================
     
    if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
    {
        $qs = $_REQUEST['hdn_qs'];
        $ids    = $_REQUEST['hdn_ids'];
        $outMsg = $objPhilosophy->deletePhilosophy($qs,$ids);
    }

                
        if($isPaging==0){
           
            $arrConditions=array(
                                            'reportID'=>$intRecno ,
                                            'title'=> $strTitle ,
                                            'pubStatus'=>0,
                                           'pageCount'=>10
                                            );

            $result     = $objPhilosophy->managePhilosophy('PG', $arrConditions); 
    }
                
    else
    {
            $intPgno    = 1;
            $intRecno   = 0;
            $arrConditions=array(
                                            'reportID'=>$intRecno ,
                                            'title'=> $strTitle ,
                                            'pubStatus'=>0,
                                            'pageCount'=>10
                                           
                                            );
            $result                 = $objPhilosophy->managePhilosophy('V',$arrConditions);
          //  print_r($result);exit;
    }
           $intPgSize                   = 10;

       $totalResult                 = $objPhilosophy->managePhilosophy('V',$arrConditions);
       $intTotalRec                 = mysqli_num_rows($totalResult); 
       $intCurrPage                 = $intPgno;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>