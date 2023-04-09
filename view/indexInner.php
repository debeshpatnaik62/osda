<?php
/* ================================================
	File Name       : indexInner.php
	Description		  : This is the Home page .	
	Date Created		: 03-April-2017
	Created By		  : 
  Developed by    :  T Ketaki Debadarshini  
  Developed on    : 03-April-2017
	Update History  :
	<Updated by>				<Updated On>		<Remarks>
	T Ketaki Debadarshini                   23-March-2016           Party President's tweet implemented and Selfi details removed.
	Include Functions	  : 
	==================================================*/
///echo $_SESSION['lang']; exit;
       
       
        //Index page labels in English
        $strSkilllable          =   'Sectors and Courses';
        $strSkillDtllable       =   'Browse the complete list of sectors, courses and colleges of Odisha. Select the course, most suited to your interest and skill sets and colleges of your preference.';
        //$strLangcls             = '';
        $strViewlbl             =   'View All';
        $strTestimoniallable    =   'Employer Speak';
        $intTestimonialpgsize   =   12;
        
     
        
        if($_SESSION['lang']=='O')
        {  
            $strSkilllable       =   '&#2837;&#2893;&#2871;&#2887;&#2852;&#2893;&#2864;  &#2835; &#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;';
            $strSkillDtllable    =   '&#2860;&#2893;&#2864;&#2878;&#2825;&#2844;&#2837;&#2864;&#2879; &#2835;&#2849;&#2879;&#2870;&#2878;&#2864;&#2887; &#2853;&#2879;&#2860;&#2878; &#2872;&#2862;&#2872;&#2893;&#2852; &#2837;&#2893;&#2871;&#2887;&#2852;&#2893;&#2864;&#40;&#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2893;&#2864;&#2852;&#2879;&#2871;&#2893;&#2848;&#2878;&#2856;&#41; &#2864; &#2856;&#2878;&#2862;&#44; &#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#2831;&#2860;&#2818; &#2837;&#2866;&#2887;&#2844; &#2839;&#2881;&#2849;&#2879;&#2837; &#2854;&#2887;&#2838;&#2856;&#2893;&#2852;&#2881;&#2404; &#2852;&#2881;&#2862; &#2822;&#2839;&#2893;&#2864;&#2873;&#2837;&#2881; &#2842;&#2878;&#2873;&#2879;&#2817; &#2837;&#2887;&#2825;&#2817; &#2860;&#2879;&#2861;&#2878;&#2839;&#2864;&#2887; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862; &#2856;&#2887;&#2860;&#2887; &#2852;&#2878;&#2873;&#2878; &#2872;&#2893;&#2852;&#2879;&#2864; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881; &#2831;&#2860;&#2818; &#2862;&#2856;&#2858;&#2872;&#2856;&#2893;&#2854;&#2864; &#2837;&#2866;&#2887;&#2844;&#2847;&#2879;&#2831; &#2860;&#2878;&#2843;&#2856;&#2893;&#2852;&#2881;&#2404;';
            $strViewlbl          =   '&#2872;&#2860;&#2881; &#2854;&#2887;&#2838;&#2856;&#2893;&#2852;&#2881;';
            $strTestimoniallable =   '&#2837;&#8217;&#2851; &#2837;&#2881;&#2873;&#2856;&#2893;&#2852;&#2879; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879;&#2854;&#2878;&#2852;&#2878;';           
        }
        
        /************Get Philosophy Data************/
        include(CLASS_PATH.'clsPhilosophy.php');
        $objPhilosophy       = new clsPhilosophy; 
        $arrConditions=array( 'Id'=>0,'pubStatus'=>2);
        $philoResult                 = $objPhilosophy->managePhilosophy('HD',$arrConditions);
        $intPhilCount                = $philoResult->num_rows; 
        /*=========Philosophy End==========*/
        
        /************Get News Data************/
         include_once(CLASS_PATH.'clsNews.php');
         $objNews       =  new clsNews;
         $newsResultData    = $objNews->manageNews('HD',0,1,'','','','0000-00-00' ,'0000-00-00','','',2,0,0,'0000-00-00','0000-00-00','','','','','');
         $intTotalNews      = $newsResultData->num_rows; 
     
        /*=========News End==========*/
         
         //========== create object of clsInfocus class===============	
        include_once( CLASS_PATH.'clsInfocus.php');
        $objInfocus  = new clsInfocus;	
         $arrConditions=array(
                            'reportID'=>0 ,
                            'pubStatus'=>2,
                            'pageCount'=>4);
         $inFocusresult      = $objInfocus->manageInfocus('V',$arrConditions);
         
         //======Banner Data=====//
         include_once(CLASS_PATH.'clsBanner.php');
         //for home page banner 
            $objBnr         = new clsBanner;
            $bannerResult   = $objBnr->viewBanner('VI',0,'',2,0,0) ; 
            // $banres=$bannerResult->fetch_array();
           // print_r( $banres);exit;
            $totalbannerCnt = ($bannerResult->num_rows);  
            //print_r($bannerResult);exit;
          // echo $totalbannerCnt;exit;
         
         //======Ticker Message=====//
         include_once(CLASS_PATH.'clsTicker.php');
         //for home page ticker 
            $objTicker         = new clsTicker;
            $tickerResult      = $objTicker->manageTicker('V',0,'','','',2,0,0,0); 

            $totaltickerCnt = ($tickerResult->num_rows);


    //======Ticker Message Of Tender By Rahul ON::03-02-2022=====//
         include_once(CLASS_PATH.'clsTender.php');
         //for home page ticker 
            $objTender         = new clsTender;
            $tenderResult      = $objTender->manageTender('V',0,0,'','','','','',BLANK_DATE,BLANK_DATE,'','',2,0,1,0,BLANK_DATE,BLANK_DATE,BLANK_DATE,'','',0,0,'',''); 

            $totaltenderCnt    = ($tenderResult->num_rows);

            include_once( CLASS_PATH.'clsCareer.php');
            $objCareer     = new clsCareer;
            $arrConditionsC=array('pubStatus'=>2,'archiveStatus'=>1,'tinTicker'=>1);
            $careerResult  = $objCareer->manageCareer('V',$arrConditionsC);
            $totalCareerCnt = ($careerResult->num_rows);
 ?>