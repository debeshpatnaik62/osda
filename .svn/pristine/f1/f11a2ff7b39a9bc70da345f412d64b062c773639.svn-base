<?php
 /* ================================================
	  File Name                   : district-employment-officerInner.php
	  Description		      : This page is to view district wise employment officer list
	  Date Created		      : 31-12-2018
	  Created By		      : Ashis kumar Patra
	  Update History		  :
	  <Updated by>				<Updated On>		<Remarks>         
	
  ================================================== */
  //============= include class path ==================//
       include_once(CLASS_PATH.'clsEmpDirectory.php');

 //============== create object ======================//
       $objEmp    =  new  clsEmpDirectory;

 //======================= Pagination ===========================*/	
        $intPgno       = 1;
        $intRecno      = 0;
        $intPgSize     = 50;
        $isPaging      = 0;
        $pgFlag        = 0;
       
         
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

//===============================================
        if($isPaging==0)	
           $result                 = $objEmp->manageEmpDirectory('PGP',$intRecno,1,0,'','','','','','',0,0,0,$intPgSize);
        else
         {
               $intPgno             = 1;
               $intRecno	    = 0;
               $result              = $objEmp->manageEmpDirectory('VP',0,1,0,'','','','','','',0,0,0,0);
         }	
         $totalResult               = $objEmp->manageEmpDirectory('CTP',0,1,0,'','','','','','',0,0,0,0);
         $numRow                    = $totalResult->fetch_array();
         $intTotalRec               = $numRow[0]; 
      
       $intCurrPage                 = $intPgno;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;					       
?>