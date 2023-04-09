<?php
/* ================================================
	File Name         	  	: profile-detailsInner.php
	Description		  	: This is the institute profile details 
	Date Created		  	: 24-DEC-2018	
	Created By		  	: Ashis kumar Patra
	Developed by                    : Ashis kumar Patra
	Developed on                    : 26-DEC-2018	
	Update History		  	:
	<Updated by>				<Updated On>		<Remarks>
	
	 Class Used                     : clsInstituteCourse
         Functions Used                 : manageInstitute,deleteInstitute
==================================================*/

    $strInstAlias     = (isset($_REQUEST['NID']))?htmlspecialchars(trim($_REQUEST['NID']), ENT_QUOTES):'';
    
    include_once( CLASS_PATH.'clsInstitute.php');
    $objInstitute       = new clsInstitute;	
    
    include_once( CLASS_PATH.'clsInstituteCourse.php');
    $objInstituteCrs    = new clsInstituteCourse;
    
    include_once(CLASS_PATH.'clsInstGallery.php');
    $objInstGal         = new clsInstGallery;
    
    $isPaging      = 0;
    $pgFlag	   = 0;
    $intPgno	   = 1;
    $intRecno      = 0;
    $intPgSize     = 30;
   
     //============ Read value for viewing institute details ===========	
    if($strInstAlias!='')
    {
       $instresult              = $objInstitute->readInstituteByAlias($strInstAlias);
       $intInstituteId          =  $instresult['intInstituteId'];
       
       if($intInstituteId>0){           
            $galresult          = $objInstGal->manageInstGal('V',0,0,$intInstituteId,'','','','','',2,0,0);
        }else{  
            header("Location:".SITE_URL.'error');
            exit();
        }
        
        //get tag line of my story  
        $strPluginInneres         = $objHomePages->getPlugindetailsbyPlugName('institution-profile');
        /*********Start: get the feature image and page name details**************/
        $strGlPageTitle           = ($_SESSION['lang']=='O' && $strPluginInneres['vchTitleH']!='')?$strPluginInneres['vchTitleH']:htmlspecialchars_decode($strPluginInneres['vchTitle'],ENT_QUOTES); 
        $strGlPageTtlcls          = ($_SESSION['lang']=='O' && $strPluginInneres['vchTitleH']!='')?'odia':'';        
        
        $strTagline               = ($_SESSION['lang']=='O' && $strPluginInneres['vchTaglineO']!='')?$strPluginInneres['vchTaglineO']:htmlspecialchars_decode($strPluginInneres['vchTagline'],ENT_QUOTES);
        $strTagTtlcls             = ($_SESSION['lang']=='O' && $strPluginInneres['vchTaglineO']!='')?'odia':'';
        $strmetatitle             = $strPluginInneres['vchMetaTitle'];
        $strPageAlias             = $strPluginInneres['vchPageAlias'];
        $strGlPageHref            = ($_SESSION['lang']=='O')?SITE_URL.$strPageAlias.'-or':SITE_URL.$strPageAlias;
         
        $strmetakeywords          = ($strPluginInneres['vchMetaKeyword']!='')?$strPluginInneres['vchMetaKeyword']:'Odisha Skill Development Authority, Goverment of Odisha, OSDA';
        $strmetadescription       = ($strPluginInneres['vchMetaDescription']!='')?$strPluginInneres['vchMetaDescription']:'Odisha Skill Development Authority, Goverment of Odisha';
        $strPageFeatureimg        = ($strPluginInneres["vchFeaturedImage"]!='')?APP_URL.'uploadDocuments/featuredImage/'.$strPluginInneres["vchFeaturedImage"]:'';
    }else{  
            header("Location:".SITE_URL.'error');
            exit();
        }
    $intInstituteId             = ($intInstituteId>0 && $intInstituteId!='')?$intInstituteId:0;

    //======================= Pagination ===========================*/
        
        
	if($_REQUEST['hdn_IsPaging']!="" && $_REQUEST['hdn_IsPaging'] >0)
		$isPaging   = 1;
	if($_REQUEST['hdn_PageNo']!=""  && $_REQUEST['hdn_PageNo'] >0)
	{
		$intPgno    = $_REQUEST['hdn_PageNo'];
		$pgFlag     = 1;
	}
	if($_REQUEST['hdn_RecNo']!=""  && $_REQUEST['hdn_RecNo'] >0)
	{	
		$intRecno   = $_REQUEST['hdn_RecNo'];
		$pgFlag     = 1;
	}
	if($isPaging==0 && $_REQUEST['hdn_PageNo']=='' && $_REQUEST['ID']>0)
	{
		$intRecno	= (isset($_SESSION['paging']['recNo']) && $_SESSION['paging']['recNo']>0)?$_SESSION['paging']['recNo']:$intRecno;
		$intPgno	= (isset($_SESSION['paging']['pageNo']) && $_SESSION['paging']['pageNo']>0)?$_SESSION['paging']['pageNo']:$intPgno;		
	}
	else	
		unset($_SESSION['paging']);
        
        $strInstitute       = (isset($_REQUEST['txtInstitute'])&& $_REQUEST['txtInstitute']!='')?trim($_REQUEST['txtInstitute']):'';
        $intDistrict        = (isset($_REQUEST['ddlDistrict'])&& $_REQUEST['ddlDistrict']!='')?$_REQUEST['ddlDistrict']:'0';
        //============= search function =================
        if(isset($_REQUEST['btnSearch']))
	{
            $intPgno	= 1;
            $intRecno	= 0;
	}
	
         
        try{
                if($isPaging==0)	
                $result                     = $objInstituteCrs->manageInstituteCourse('PPG',$intRecno,0,$intInstituteId,0,0,0,$intPgSize,0,'');      
                else                                    
                {
                    $intPgno                = 1;
                    $intRecno               = 0;
                    $result                 = $objInstituteCrs->manageInstituteCourse('VP',0,0,$intInstituteId,0,0,0,$intPgSize,0,'');
                }
                $totalResult                 = $objInstituteCrs->manageInstituteCourse('CTP',0,0,$intInstituteId,0,0,0,$intPgSize,0,'');
                $numRow                      = $totalResult->fetch_array();
                $intTotalRec                 = $numRow[0]; 
               
        }catch (Exception $e) { 
                $outMsg =  'Some error occured. Please try again'; 
                $errFlag = 1;
        }
        
       $intCurrPage                 = $intPgno;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
       
      
       $strviewmorelbl     = ($_SESSION['lang']=='O')?'@]òK ù\L«ê':'View More';
       $strviewmorecls     = ($_SESSION['lang']=='O')?'odia':'';
        
 ?>