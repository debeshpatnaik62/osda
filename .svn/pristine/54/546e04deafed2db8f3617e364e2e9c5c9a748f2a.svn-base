<?php
/* ================================================
	File Name         	  	: institution-profileInner.php
	Description		  	: This is the institute details 
	Date Created		  	: 24-March-2017	
	Created By		  	: T Ketaki Debadarshini
	Developed by                    : T Ketaki Debadarshini 
	Developed on                    : 24-March-2017	
	Update History		  	:
	<Updated by>				<Updated On>		<Remarks>
	
	 Class Used                     : clsInstitute
         Functions Used                 : manageInstitute,deleteInstitute
==================================================*/

    $strCourseAlias   = (isset($_REQUEST['NID']))?htmlspecialchars(trim($_REQUEST['NID']), ENT_QUOTES):'';
    
   // $intDistrict      = (isset($_REQUEST['NID']) && $_REQUEST['NID']>0 && is_numeric ($_REQUEST['NID']))?$_REQUEST['NID']:0;
  //echo $strCourseAlias.'gg '.$intDistrict;
    include_once( CLASS_PATH.'clsInstitute.php');
    $objInstitute       = new clsInstitute;
    
    include_once( CLASS_PATH.'clsCourse.php');
    $objCourse     = new clsCourse;
    
     include_once( CLASS_PATH.'clsDistrict.php');
    $objDist		= new clsDistrict;
    
    $isPaging      = 0;
    $pgFlag	   = 0;
    $intPgno	   = 1;
    $intRecno      = 0;
    $intPgSize     = 20;
    $intPIAStatus  = 2;

	

    //*******************get course details**************/
    if($strCourseAlias!='')
	{
            $secresult          = $objCourse->readCourseByAlias($strCourseAlias);
            if($secresult){
                $intCourseId        =  $secresult['intCourseId'];
                $strCourseTag       = ($_SESSION['lang']=='O' && $secresult['vchCourseNameO']!='')?$secresult['vchCourseNameO']:htmlspecialchars_decode($secresult['vchCourseNameE'],ENT_QUOTES);
                $strCourseClass     = ($_SESSION['lang']=='O' && $secresult['vchCourseNameO']!='')?'odia':''; 
            }else{
               // header("Location:".SITE_URL.'error');
              //  exit();
            }
            
	}
      
     $intCourseId               = ($intCourseId>0 && $intCourseId!='')?$intCourseId:0;     
     $intViewId                 = (isset($_REQUEST['hdnViewtype'])&& $_REQUEST['hdnViewtype']!='')?$_REQUEST['hdnViewtype']:1; 

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
        
        $strInstitute       = (isset($_REQUEST['txtInstitute'])&& $_REQUEST['txtInstitute']!='')?trim($_REQUEST['txtInstitute']):'';
        
        $intHidDistrict     = (isset($_REQUEST['hdnDdlDistrict'])&& $_REQUEST['hdnDdlDistrict']!='')?$_REQUEST['hdnDdlDistrict']:'0'; 
        //$intDistrict        = (isset($_REQUEST['ddlDistrict'])&& $_REQUEST['ddlDistrict']!='')?$_REQUEST['ddlDistrict']:'0'; 
        
        $intDistrict        = $intHidDistrict;
        
        $activeAry[]        = $intHidDistrict;
        //============= search function =================
        if(isset($_REQUEST['btnSearch']))
	{
            $intPgno            = 1;
            $intRecno           = 0;
            
            $strSearchTag       = $strInstitute;
            $strSearchClass     ='';
	}
	
     
        
        //get district wise count details
        try{
                $mapresult		= $objDist->manageDistrict('GMP',$intCourseId,'','','','',1,0,0);
                $mapcount               = $mapresult->num_rows;
              
                /************view listing for mobile*********/
                if($isPaging==0)	
                    $result                     = $objInstitute->manageInstitute('PPG',$intRecno,$intDistrict,$strInstitute,'',0,0,'','','','','','','','','','',$intCourseId,0,0,$intPgSize,'','',2,'',0,0,0,'');
                else                                    
                {
                    $intPgno                = 1;
                    $intRecno               = 0;
                    $result                 = $objInstitute->manageInstitute('VP',0,$intDistrict,$strInstitute,'',0,0,'','','','','','','','','','',$intCourseId,0,0,0,'','',2,'',0,0,0,'');
                }
                $totalResult                 = $objInstitute->manageInstitute('CTP',0,$intDistrict,$strInstitute,'',0,0,'','','','','','','','','','',$intCourseId,0,0,0,'','',2,'',0,0,0,'');
                $numRow                      = $totalResult->fetch_array();
                $intTotalRec                 = $numRow[0]; 
                
                $intCurrPage                 = $intPgno;
                $_SESSION['paging']['recNo'] = $intRecno;
                $_SESSION['paging']['pageNo']= $intPgno;
                

         }catch (Exception $e) { 
                 $outMsg =  'Some error occured. Please try again'; 
                 $errFlag = 1;
         }
       
         $strPageTitle           = ($_SESSION['lang']=='O')?'&#2858;&#2866;&#2879;&#2847;&#2887;&#2837;&#2893;&#2856;&#2879;&#2837;&#2893;&#2858;&#2893;&#2864;&#2891; &#2859;&#2878;&#2823;&#2866;':'Polytechnic-profile';

         $strPageTtlcls            = ($strPageTtlcls=='')?$strcls:$strPageTtlcls;
         $strGlPageTitle           = ($_SESSION['lang']=='O' && $strGlPageTitle!='')?'&#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;':'Course';

 ?>