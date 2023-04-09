<?php
/* ================================================
	File Name         	  : contentInner.php
	Description		  : This page is  mange for content	
	Date Created		  : 18-Feb-2016
	Created By		  : T Ketaki Debadarshini
	Update History		  :
	<Updated by>				<Updated On>		<Remarks>
	T Ketaki Debadarshini                   29-Mach-2016            Featured Image is displayed and sharing option for the content page
 *      T Ketaki Debadarshini                   25-April-2016          Option to Show/hide right panel
	Include Class		  : clsManagePortal
	==================================================*/
	
	$objManagePortal     = new clsPages;
	
        $menuAlias          =  (isset($_REQUEST['ID']))?$_REQUEST['ID']:'';    
        
       /* $contentResult       = $objManagePortal->viewPageDetails('PA',0,$menuAlias);
        $menuRows            = mysqli_fetch_array($contentResult);
        $intPageId           = htmlspecialchars_decode($menuRows['intPageId'], ENT_NOQUOTES);
       // $pageTitle           = htmlspecialchars_decode($menuRows['vchTitle'], ENT_NOQUOTES);
        
        $pageTitleE           = htmlspecialchars_decode($menuRows['vchTitle'], ENT_NOQUOTES);
        $pageTitleO           = ($menuRows['vchTitleH']);        
        $tinShowpanel       = $menuRows['tinShowpanel'];

        $pageTitle          = ($_SESSION['languageType']=='O')?$pageTitleO:$pageTitleE;
        $pageTitlecls       = ($_SESSION['languageType']=='O')?'odia':'';
        
        $strPageAliasName    = htmlspecialchars_decode($menuRows['vchPageAlias'], ENT_NOQUOTES);

        $featuredImage       = $menuRows['vchFeaturedImage'];
        $metaImage           = ($menuRows['vchMetaImage']!='')? SITE_PATH.'Application/uploadDocuments/Banner/'.$menuRows['vchMetaImage']:SITE_PATH.'images/logo.png';
*/
       
   
      /*  $strTagline           = ($_SESSION['lang']=='O' && $menuRows['vchTaglineO']!='')?$menuRows['vchTaglineO']:htmlspecialchars_decode($menuRows['vchTagline'],ENT_QUOTES);
        $strTagTtlcls         = ($_SESSION['lang']=='O' && $menuRows['vchTaglineO']!='')?'odia':'';
        $strmetatitle	      = htmlspecialchars_decode($menuRows['vchMetaTitle'],ENT_NOQUOTES);
        $strmetakeywords	   = htmlspecialchars_decode($menuRows['vchMetaKeyword'],ENT_NOQUOTES);
        $strmetadescription	= htmlspecialchars_decode($menuRows['vchMetaDescription'],ENT_NOQUOTES);*/
       
       
        $hdnPgNo = ($_POST['hdnPgNo'] != '')?$_POST['hdnPgNo']:1;

        //$action          = "V4";
        if($_SESSION['lang']=='O')
        {
            $action          = "V3";  

        }
        else if($_SESSION['lang']=='E' || $_SESSION['lang'] == '')
        {
            $action          = "V4";
        }

        $conResult           = $objManagePortal->managePageContent($action,0,$intContentPgid,0,'', '',$hdnPgNo); 
        $conResPg            = $objManagePortal->managePageContent($action,0,$intContentPgid,0,'', '',''); 

        $totalCount = mysqli_num_rows($conResult); 
        //echo $totalCount;
        if($totalCount > 0)            
        {
           $conRows = mysqli_fetch_array($conResult);

            $contPagedtailsE= htmlspecialchars_decode(str_replace('&quot;','"',$conRows['vchContentE']),ENT_NOQUOTES); 
            //$contPagedtailsH= htmlspecialchars_decode(str_replace('&quot;','"',$conRows ['vchContentH']),ENT_NOQUOTES); 
             $contPagedtailsH= urldecode($conRows['vchContentH']); 

            $contPagedtails	    = ($_SESSION['lang']=='O' && $contPagedtailsH!='')?$contPagedtailsH:$contPagedtailsE;

            $contstrPageNav            = $conRows['pageNavigation'];
            $contexpPageNav            = explode("_",$contstrPageNav);
            
             //Sharing Details
            $strHeadLine        = $pageTitle;
            $strMetaDescription = htmlspecialchars_decode($menuRows['vchSnippet'], ENT_NOQUOTES);
            if($strmetadescription=='')
                $strmetadescription = $strMetaDescription;
            $strShareDescription = $strMetaDescription;
            $shareImage         = URL.'uploadDocuments/featuredImage/'.$featuredImage;
            $menustr='';
            if($glmenu!='')  
                $menustr.= $glmenu.'/';
            if($plmenu!='')
                 $menustr.= $plmenu.'/';
            if($menuAlias!='')
                $menustr.= $menuAlias.'/';
            
         }
         
        
         
   
?>