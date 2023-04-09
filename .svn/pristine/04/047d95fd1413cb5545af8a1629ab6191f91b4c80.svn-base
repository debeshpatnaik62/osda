<?php
    /* ================================================
    File Name         	: viewInstitutesInner.php
    Description		: This page is used to view institute details.
    Author Name		: T Ketaki Debadarshini
    Date Created	: 23-March-2017
   Update History   :	
   <Updated by>      :   Rajesh parida
   <Updated On>          : 10-oct-2017 <Remarks>

    Class Used		: clsInstitute
    Functions Used	: manageInstitute,deleteInstitute
    ==================================================*/
        //$requestUrl= $_SERVER['HTTP_REFERER'];
        //$addUrl = SITE_URL.'addInstitute/'.$glId.'/'.$plId;
        include_once( CLASS_PATH.'clsInstitute.php');
        $objInstitute       = new clsInstitute;	
        $isPaging     =  0;
        $pgFlag	  =  0;
        $intPgno	  =  1;
        $intRecno	  =  0;
        $ctr	  =  0;
        $intPgSize    =  20;


        $intDistid      = 0;
        $intType        = 0;
        $intPIAstatus   = 0;
        //======================= Permission ===========================*/
        $glId          = $_REQUEST['GL'];
        $plId          = $_REQUEST['PL'];
        $userId        = $_SESSION['adminConsole_userID'];
        $pageName      = $_REQUEST['PAGE'].'.php';
        $explPriv      = $objInstitute->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
        $editPriv      = $explPriv['edit'];
        $deletePriv    = $explPriv['delete'];
        $noAdd         = $explPriv['add'];
        $noActive      = $explPriv['active'];
        $noPublish     = $explPriv['publish'];
        //======================= Pagination ===========================*/

        if($_REQUEST['hdn_IsPaging']!="" && $_REQUEST['hdn_IsPaging'] >0)
                $isPaging=1;
        if($_REQUEST['hdn_PageNo']!=""  && $_REQUEST['hdn_PageNo'] >0)
        {
                $intPgno=$_REQUEST['hdn_PageNo'];
                $pgFlag	= 1;
        }
        if($_REQUEST['hdn_RecNo']!=""  && $_REQUEST['hdn_RecNo'] >0)
        {	
                $intRecno=$_REQUEST['hdn_RecNo'];
                $pgFlag	= 1;
        }
        if($isPaging==0 && $_REQUEST['hdn_PageNo']=='' && $_REQUEST['ID']>0)
        {
                $intRecno	= (isset($_SESSION['paging']['recNo']) && $_SESSION['paging']['recNo']>0)?$_SESSION['paging']['recNo']:$intRecno;
                $intPgno	= (isset($_SESSION['paging']['pageNo']) && $_SESSION['paging']['pageNo']>0)?$_SESSION['paging']['pageNo']:$intPgno;		
        }
        else	
                unset($_SESSION['paging']);

       $intDistid       = (isset($_REQUEST['ddlDistrict']) && $_REQUEST['ddlDistrict'] != '')?$_REQUEST['ddlDistrict']:'0';
       
       $strInstName     = (isset($_REQUEST['txtInstName']) && $_REQUEST['txtInstName'] != '')?$_REQUEST['txtInstName']:'';
       $intStatus       = (isset($_REQUEST['selStatus']) && $_REQUEST['selStatus'] != '')?$_REQUEST['selStatus']:'0';
       $intScheme       = (isset($_REQUEST['selScheme']) && $_REQUEST['selScheme'] != '')?$_REQUEST['selScheme']:'0';
       
     //  $intPIAstatus = (isset($_REQUEST['selPrivatetype']) && $_REQUEST['selPrivatetype'] != '' && $intType==2)?$_REQUEST['selPrivatetype']:'0';

   /* This condition is valid for all scheme login only */
        if(PORTAL_TYPE==1 || PORTAL_TYPE==2 || PORTAL_TYPE==3 || PORTAL_TYPE==4)
        {
            $intPIAstatus    = '3';
        }
        else
        {
            $intPIAstatus    = (isset($_REQUEST['selType']) && $_REQUEST['selType'] != '')?$_REQUEST['selType']:'0';
        }
        if(PORTAL_TYPE==1)
        {
            $intScheme    = '1';
        }
        else if(PORTAL_TYPE==2)
        {
            $intScheme    = '2';
        } else if(PORTAL_TYPE==3)
        {
            $intScheme    = '3';
        }else if(PORTAL_TYPE==4)
        {
            $intScheme    = '4';
        }
        else
        {
            $intScheme =0;
        }
       //============ Search Function ========================//
        if(isset($_REQUEST['btnSearch']))
        {

            $intPgno        = 1;
            $intRecno       = 0;

        }
    
        
        try{
         //============= Delete/Active/Inactive function =================
            if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
            {
                $qs                 = $_REQUEST['hdn_qs'];
                $ids                = $_REQUEST['hdn_ids'];
                $outMsg             = $objInstitute->deleteInstitute($qs,$ids);
            }
            
            if($isPaging==0)	
                $result                 = $objInstitute->manageInstitute('PG',$intRecno,$intDistid,$strInstName,'',0,0,'','','','','','','','','','',$intStatus,0,0,$intPgSize,'','',$intPIAstatus,'',0,0,$intScheme,'');
            else                                    
            {
                $intPgno                = 1;
                $intRecno               = 0;
                $result                 = $objInstitute->manageInstitute('V',0,$intDistid,$strInstName,'',0,0,'','','','','','','','','','',$intStatus,0,0,0,'','',$intPIAstatus,'',0,0,$intScheme,'');
            }
            $totalResult                 = $objInstitute->manageInstitute('V',0,$intDistid,$strInstName,'',0,0,'','','','','','','','','','',$intStatus,0,0,0,'','',$intPIAstatus,'',0,0,$intScheme,'');

            $intTotalRec                 = $totalResult->num_rows;
            
            /*$numRow                      = $totalResult->fetch_array();
            $intTotalRec                 = $numRow[0];*/ 
         }catch (Exception $e) { 
                $outMsg =  'Some error occured. Please try again'; 
                $errFlag = 1;
        }
       $intCurrPage                 = $intPgno;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>