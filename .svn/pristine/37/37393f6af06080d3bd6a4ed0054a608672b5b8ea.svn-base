<?php
 /* ================================================
	  File Name                   : in-focusInner.php
	  Description		      : This page is to view Employeer Speaks
	  Date Created		      : 18-12-2018
	  Created By		      : Ashis kumar Patra
	  Update History              :
	  <Updated by>				<Updated On>		<Remarks>         
	
  ================================================== */
  //============= include class path ==================//
      include_once( CLASS_PATH.'clsInfocus.php');
            $objInfocus  = new clsInfocus;


 //======================= Pagination ===========================*/	
        $intPgno       = 1;
        $intRecno      = 0;
        $intPgSize     = 20;	
        
       
        $activeId=(isset($_POST['focusId']) && !empty($_POST['focusId']))?htmlspecialchars($_POST['focusId'],ENT_QUOTES):0;
      
         /*********Start: get the feature image and page name details**************/
              //get tag line of my story  
            $strPluginInneres         = $objHomePages->getPlugindetailsbyPlugName('in-focus');
            $strPageTitle             = ($_SESSION['lang']=='O' && $strPluginInneres['vchTitleH']!='')?$strPluginInneres['vchTitleH']:htmlspecialchars_decode($strPluginInneres['vchTitle'],ENT_QUOTES);  
            $strPageTtlcls            = ($_SESSION['lang']=='O' && $strPluginInneres['vchTitleH']!='')?'odia':'';  
            $strTagline               = ($_SESSION['lang']=='O' && $strPluginInneres['vchTaglineO']!='')?$strPluginInneres['vchTaglineO']:htmlspecialchars_decode($strPluginInneres['vchTagline'],ENT_QUOTES);
            $strTagTtlcls             = ($_SESSION['lang']=='O' && $strPluginInneres['vchTaglineO']!='')?'odia':'';
            $strmetatitle             = $strPluginInneres['vchMetaTitle'];
            $strPageAlias             = $strPluginInneres['vchPageAlias'];
             
            $strmetakeywords          = ($strPluginInneres['vchMetaKeyword']!='')?$strPluginInneres['vchMetaKeyword']:'Odisha Skill Development Authority, Goverment of Odisha, OSDA';
            $strmetadescription       = ($strPluginInneres['vchMetaDescription']!='')?$strPluginInneres['vchMetaDescription']:'Odisha Skill Development Authority, Goverment of Odisha';
            $strPageFeatureimg        = ($strPluginInneres['vchFeaturedImage']!='')?APP_URL.'uploadDocuments/featuredImage/'.$strPluginInneres['vchFeaturedImage']:SITE_URL.'images/aboutbanner.jpg';

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
	 if($isPaging==0){
           
            $arrConditions=array(
                                            'reportID'=>$intRecno,
                                            'pubStatus'=>2,
                                           'pageCount'=>4
                                            );

            $result     = $objInfocus->manageInfocus('PG', $arrConditions); 
    }
                
    else
    {
            $intPgno    = 1;
            $intRecno   = 0;
            $arrConditions=array(
                                            'reportID'=>$intRecno ,
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