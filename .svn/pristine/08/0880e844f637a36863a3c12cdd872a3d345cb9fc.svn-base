<?php
 /* ================================================
	  File Name           : careerInner.php
	  Description		      : This page is to view career
	  Date Created		    : 15-01-2020
	  Created By		      : Rahul Kumar Saw
	  Update History              :
	  <Updated by>				<Updated On>		<Remarks>         
	
  ================================================== */
  //============= include class path ==================//
      include_once( CLASS_PATH.'clsCareer.php');
            $objCareer  = new clsCareer;


 //======================= Pagination ===========================*/	
        $intPgno       = 1;
        $intRecno      = 0;
        $intPgSize     = 10;	
        
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

//Current Job===============================================
	 if($isPaging==0){
           
            $arrConditions=array('intId'=>$intRecno,'pubStatus'=>2,'pageCount'=>10,'archiveStatus'=>1);

            $result     = $objCareer->manageCareer('PG', $arrConditions); 
    }
                
    else
    {
            $intPgno    = 1;
            $intRecno   = 0;
            $arrConditions=array('intId'=>$intRecno ,'pubStatus'=>2,'pageCount'=>10,'archiveStatus'=>1);
            $result                 = $objCareer->manageCareer('V',$arrConditions);
          //  print_r($result);exit;
    }
       $totalResult                 = $objCareer->manageCareer('V',$arrConditions);
       $intTotalRec                 = mysqli_num_rows($totalResult); 
       $intCurrPage                 = $intPgno;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;


       //Expired Job===============================================
  
            $arrConditionsExp = array('intId'=>$intRecno ,'archiveStatus'=>2);
            $resultExpire     = $objCareer->manageCareer('V',$arrConditionsExp);
            $intTotalExpRec   = mysqli_num_rows($resultExpire);
       
       
       
?>