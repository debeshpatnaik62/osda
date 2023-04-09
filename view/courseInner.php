<?php
/* ================================================
	File Name         	  	: courses-detailsInner.php
	Description		  	: This is the course details 
	Date Created		  	: 24-March-2017	
	Created By		  	: T Ketaki Debadarshini
	Developed by                    : T Ketaki Debadarshini 
	Developed on                    : 24-March-2017	
	Update History		  	:
	<Updated by>				<Updated On>		<Remarks>
	
	 Class Used                     : clsCourse,clsSector
         Functions Used                 : 
==================================================*/

    $strSectorAlias   = (isset($_REQUEST['NID']))?htmlspecialchars(trim($_REQUEST['NID']), ENT_QUOTES):'';
    
    $strCourseAlias   = (isset($_REQUEST['txtCourseAlias']))?htmlspecialchars(trim($_REQUEST['txtCourseAlias']), ENT_QUOTES):'';

   
    include_once( CLASS_PATH.'clsSector.php');
    $objSector         = new clsSector;
    

    
    $intShorttermDuration   = 11;
    $intLongtermDuration    = 12;
    $intAllDuration         = 0;
    //*******************get category details**************/
      if($strSectorAlias!='')
	{
            $secresult          = $objSector->readSectorbyAlias($strSectorAlias);
            $strHeadLineE       =  htmlspecialchars_decode($secresult['vchSecotrName'],ENT_QUOTES);  
            $strHeadLineO       =  $secresult['vchSecotrNameO'];
            $intSectorId        =  $secresult['intSectorId'];
            $intSectorDuration  =  $secresult['intDuration'];
            
            $strSector          = ($_SESSION['lang']=='O' && $strHeadLineO!='')?$strHeadLineO:$strHeadLineE;
            $strcls             = ($_SESSION['lang']=='O' && $strHeadLineO!='')?'odia':'';
            
            
            $strmetatitle       = 'Search by Courses | '.$strHeadLineE;
            $strmetadescription = 'Search by Courses | '.$strHeadLineE;
	}
    
    //======================= Pagination ===========================*/
        
        $intSectorId      = ($intSectorId!='' && $intSectorId>0)?$intSectorId:0;
        
        $strCourse          = (isset($_POST['txtCourse'])&& $_POST['txtCourse']!='')?trim($_POST['txtCourse']):'';        
        $intCourse          = (isset($_POST['hidCourseId'])&& $_POST['hidCourseId']>0)?trim($_POST['hidCourseId']):0;
        
        $strCourse          = ($intCourse>0)?'':$strCourse;
        
        $strviewmorelbl     = ($_SESSION['lang']=='O')?'&#2821;&#2855;&#2879;&#2837; &#2854;&#2887;&#2838;&#2856;&#2893;&#2852;&#2881;':'View More';
        $strviewmorecls     = ($_SESSION['lang']=='O')?'odia':'';
      
        //$strGlPageTitle     = ($_SESSION['lang']=='O')?'&#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;':'Courses';
        
 ?>