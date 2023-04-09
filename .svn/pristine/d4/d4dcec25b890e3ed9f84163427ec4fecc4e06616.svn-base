<?php
 /* ------------------------------------------------------------------------
      File Name           : bloginfoInner.php
      Description         : This page is to view Blog Info .
      Author Name         : Ashis kumar Patra.
      Date Created        : 09-01-2018
      Update History      :
      <Updated by>           <Updated On>       <Remarks>
 
 -------------------------------------------------------------------------- */
  //===============include class path for Blogs =============//
       include_once(CLASS_PATH.'clsNews.php');

     
        //print_r($_REQUEST);exit;
         $objNews       =  new clsNews;
        $newsId       = (isset($_REQUEST['NID']) && $_REQUEST['NID']!='' && is_numeric($_REQUEST['NID']))?htmlspecialchars($_REQUEST['NID'],ENT_QUOTES):0; //echo $blogId;exit;
        
       if($newsId>0){ 
        $blogInfoRes  = $objNews->manageNews('R',$newsId,0,'','','', '0000-00-00','0000-00-00','','',2,0,0,'0000-00-00','0000-00-00','','','','','');

           if($blogInfoRes->num_rows > 0)
           {
           	$blogInfoRow = $blogInfoRes->fetch_array();
           	  
                $headlineE      = htmlspecialchars_decode($blogInfoRow['vchHeadLineE'], ENT_QUOTES);
                $headlineO      = $blogInfoRow['vchHeadLineH'];
                $headline       = ($_SESSION['lang']=='O' && $headlineO != '')?$headlineO:$headlineO;
                $headlineCls    = ($_SESSION['lang']=='O' && $headlineO != '')?'odia':'odia';
               // $date           = ($_SESSION['lang']=='O')?date('d',strtotime($blogInfoRow['DTM_CREATED_ON'])).' '.$objNews->getOdiaMonths(date('n',strtotime($blogInfoRow['DTM_CREATED_ON']))).' '.date('Y',strtotime($blogInfoRow['DTM_CREATED_ON'])):date('dS M Y', strtotime($blogInfoRow['DTM_CREATED_ON']));
                $dateClass='odianum';
                $date    = date('d',strtotime($blogInfoRow['dtmNewsDate'])).' '.$objNews->getOdiaMonths(date('n',strtotime($blogInfoRow['dtmNewsDate']))).' '.date('Y',strtotime($blogInfoRow['dtmNewsDate']));
                  
                $desE           = htmlspecialchars_decode($blogInfoRow['vchDescriptionE'], ENT_QUOTES);
                $desO           = urldecode($blogInfoRow['vchDescriptionH']);
                $des            = ($_SESSION['lang']=='O' && $desO != '')?$desO:$desE;
                $desCls         = ($_SESSION['lang']=='O' && $desO != '')?'odia':'odia';
                $image          = ($blogInfoRow['vchImageFile']!='')?APP_URL.'uploadDocuments/news/'.$blogInfoRow['vchImageFile']:SITE_URL.'images/bb_default1.jpg';
                
                $strSnippet     = htmlspecialchars_decode($blogInfoRow['vchSnippet'], ENT_QUOTES);
           	$strHeadLine    =  $headlineE;
                
                $strAuthor      = ($_SESSION['lang']=='O' && $blogInfoRow['vchSourcenameO']!= '')?addslashes($blogInfoRow['vchSourcenameO']):htmlspecialchars_decode($blogInfoRow['vchSourcename'], ENT_QUOTES);
                $strAuthorCls   = ($_SESSION['lang']=='O' && $blogInfoRow['vchSourcenameO']!= '')?'odia':'odia';
           }
           
             //get tag line of my story  
            $strPluginInneres         = $objHomePages->getPlugindetailsbyPlugName('Articles');
            /*********Start: get the feature image and page name details**************/
            $strGlPageTitle           = ($_SESSION['lang']=='O' && $strPluginInneres['vchTitleH']!='')?$strPluginInneres['vchTitleH']:htmlspecialchars_decode($strPluginInneres['vchTitle'],ENT_QUOTES);          
           
         
            $strGlPageTtlcls          = ($_SESSION['lang']=='O')?'odia':''; 
            
            $strPageTtlcls            = ($strPageTtlcls=='' && $_SESSION['lang']=='O')?'odia':''; 
            $strPageTitle             = ($strPageTitle==''&& $_SESSION['lang']=='O')?'&#2860;&#2879;&#2870;&#2893;&#2869; &#2860;&#2879;&#2844;&#2911;&#2880; ':'Biswa Bijayee';
            
            $strTagline               = ($_SESSION['lang']=='O' && $strPluginInneres['vchTaglineO']!='')?$strPluginInneres['vchTaglineO']:htmlspecialchars_decode($strPluginInneres['vchTagline'],ENT_QUOTES);
            $strTagTtlcls             = ($_SESSION['lang']=='O' && $strPluginInneres['vchTaglineO']!='')?'odia':'';
            $strmetatitle             = $strPluginInneres['vchMetaTitle'];
            $strPageAlias             = $strPluginInneres['vchPageAlias'];
             //$strPlPageTitle           = ($_SESSION['lang']=='O')?'&#2860;&#2893;&#2866;&#2839;&#2893;':'Articles';
            //$strPlPageHref            = ($_SESSION['lang']=='O')?SITE_URL.'media/blog-or':SITE_URL.'media/blog';
            $strmetakeywords          = ($strPluginInneres['vchMetaKeyword']!='')?$strPluginInneres['vchMetaKeyword']:'Odisha Skill Development Authority, Goverment of Odisha, OSDA';
            $strmetadescription       = ($strPluginInneres['vchMetaDescription']!='')?$strPluginInneres['vchMetaDescription']:'Odisha Skill Development Authority, Goverment of Odisha';
            
            $strPageFeatureimg        = ($strPluginInneres["vchFeaturedImage"]!='')?APP_URL.'uploadDocuments/featuredImage/'.$strPluginInneres["vchFeaturedImage"]:'';
       }else{
           
             header("Location:".SITE_URL.'error');
             exit();
        }   
           
           /********************************/
           
            
          
            $strGlPageHref            = ($_SESSION['lang']=='O')?SITE_URL.'resources/'.$strPageAlias.'-or':SITE_URL.'resources/'.$strPageAlias;
            $strGlPageTtlcls          = ($_SESSION['lang']=='O')?'odia':''; 
            
            $strPageTtlcls            = ($strPageTtlcls=='' && $_SESSION['lang']=='O')?'odia':''; 
            //$strPageTitle             = ($strPageTitle==''&& $_SESSION['lang']=='O')?'&#2860;&#2879;&#2870;&#2893;&#2869; &#2860;&#2879;&#2844;&#2911;&#2880; ':'Biswa Bijayee';
           
            $strPageHeading           = ($_SESSION['lang']=='O')?'&#2860;&#2879;&#2870;&#2893;&#2869; &#2860;&#2879;&#2844;&#2911;&#2880; ':'Biswa Bijayee';
            $strPagecls               = ($_SESSION['lang']=='O')?'':''; 
             
            $strtweetCard             = 'summary';
            $strShareDescription      = $strSnippet;
            $shareUrl                 = SITE_URL.'biswabijayee/'.$blogId;
            $shareImage               = $image;  
?>