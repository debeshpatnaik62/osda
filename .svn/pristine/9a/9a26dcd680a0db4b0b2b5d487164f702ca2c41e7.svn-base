<?php

  //print_r($_REQUEST);exit;
    include_once( CLASS_PATH.'clsVenueTagged.php');
    $objVenueTag         = new clsVenueTagged;
    $id            = (isset($_REQUEST['ID']) && is_numeric($_REQUEST['ID']))?htmlspecialchars($_REQUEST['ID'],ENT_QUOTES):0;  
    $intLevel      = (isset($_REQUEST['RC']) && is_numeric($_REQUEST['RC']))?htmlspecialchars($_REQUEST['RC'],ENT_QUOTES):0;  
    $isPaging      = 0;
    $pgFlag    = 0;
    $intPgno       = 1;
    $intRecno      = 0;
    $ctr       = 0;
    $intPgSize  = 20;
    //======================= Permission ===========================*/
    $glId           = $_REQUEST['GL'];
    $plId           = $_REQUEST['PL'];
    $pageName       = $_REQUEST['PAGE'].'.php';
    $userId         = $_SESSION['adminConsole_userID'];
    $explPriv       = $objVenueTag->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
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
        
   
         //============= search function =================
         if(isset($_REQUEST['btnSearch']))
            {
                $intPgno    = 1;
                $intRecno   = 0;
            }
        
     try{
         //============= Delete/Active/Inactive function =================
           
            if($isPaging==0)    
                $result                 = $objVenueTag->manageVenueTagged('PVT',$intRecno,'',0,$id,0,0,'1000-01-01','00:00:00',0,'',$intLevel,$intPgSize);
            else                                    
            {
                $intPgno                = 1;
                $intRecno               = 0;
                $result                 = $objVenueTag->manageVenueTagged('VVT',0,'',0,$id,0,0,'1000-01-01','00:00:00',0,'',$intLevel,$intPgSize);
            }
            $totalResult                = $objVenueTag->manageVenueTagged('CVT',0,'',0,$id,0,0,'1000-01-01','00:00:00',0,'',$intLevel,$intPgSize);
            $numRow                     = $totalResult->fetch_array();
            $intTotalRec                = $numRow[0]; 
         }catch (Exception $e) { 
                $outMsg                 =  'Some error occured. Please try again'; 
                $errFlag                = 1;
        }
       $intCurrPage                     = $intPgno;
       $_SESSION['paging']['recNo']     = $intRecno;
       $_SESSION['paging']['pageNo']    = $intPgno;    
    
?>