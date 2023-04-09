<?php
 /* ================================================
	  File Name               : employer-speakInner.php
	  Description		      : This page is to view Employeer Speaks
	  Date Created		      : 18-12-2018
	  Created By		      : Ashis kumar Patra
	  Update History              :
	  <Updated by>				<Updated On>		<Remarks>         
	
  ================================================== */
  //============= include class path ==================//
       include_once(CLASS_PATH.'clsMsgBoard.php');

 //============== create object ======================//
       $objMsg    =  new  clsMsgBoard;

 //======================= Pagination ===========================*/	
        $intPgno       = 1;
        $intRecno      = 0;
        $intPgSize     = 20;	
        
       
        $empActiveId=(isset($_POST['emp-no']) && !empty($_POST['emp-no']))?htmlspecialchars($_POST['emp-no'],ENT_QUOTES):0;
      
         /*********Start: get the feature image and page name details**************/
              //get tag line of my story  
            

        if($_REQUEST['hdn_IsPaging']!="" && $_REQUEST['hdn_IsPaging'] >0)
                $isPaging               =   1;
        if($_REQUEST['hdn_PageNo']!=""  && $_REQUEST['hdn_PageNo'] >0)
        {
                $intPgno            = $_REQUEST['hdn_PageNo'];
                $pgFlag             = 1;
        }
        if($_REQUEST['hdn_RecNo']!=""  && $_REQUEST['hdn_RecNo'] >0)
        {	
                $intRecno           = $_REQUEST['hdn_RecNo'];
                $pgFlag             = 1;
        }
        if($isPaging==0 && $_REQUEST['hdn_PageNo']=='' && $_REQUEST['ID']>0)
        {
                $intRecno           = (isset($_SESSION['paging']['recNo']) && $_SESSION['paging']['recNo']>0)?$_SESSION['paging']['recNo']:$intRecno;
                $intPgno            = (isset($_SESSION['paging']['pageNo']) && $_SESSION['paging']['pageNo']>0)?$_SESSION['paging']['pageNo']:$intPgno;		
        }
        else	
                unset($_SESSION['paging']);     

//===============================================
	 if($isPaging==0)	
            $result                 = $objMsg->manageMsgboard('PPG',$intRecno,'','','','','','','',2,0,0,0,'','');
	 else
	  {
	  	$intPgno            = 1;
                $intRecno           = 0;
                $result             = $objMsg->manageMsgboard('V',0,'','','','','','','',2,0,0,0,'','');
	  }	
	  $totalResult              = $objMsg->manageMsgboard('V',0,'','','','','','','',2,0,0,0,'','');

       $intTotalRec                 = mysqli_num_rows($totalResult); 
       $intCurrPage                 = $intPgno;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;	
       
?>