<?php
  /* ================================================
    File Name       : milestoneInner.php
    Description     : This page is used to view Timeline.
    Devloped By     : Ashis kumar Patra
    Devloped On     : 04-12-2018
    Update History  :
    <Updated by>    <Updated On>    <Remarks>

    Class Used    : clsTimeline
    Functions Used  : 
    ==================================================*/
    include(CLASS_PATH.'clsTimeline.php');

    $objTimeline       = new clsTimeline; 
   
    $arrConditions=array( 'timelineId'=>0,'pubStatus'=>2);
  
   $totalResult                 = $objTimeline->manageTimeline('VN',$arrConditions);
   $intTotalRec                 = $totalResult->num_rows; 
   $milestoneResult             = array(); 
   $yearArray                   = array();
    
   
   $odiaMonthAry=array($strMJan,$strMFeb,$strMMar,$strMApr,$strMMay,$strMJun,$strMJul,$strMAug,$strMSep,$strMOct,$strMNov,$strMDec);
   
   
//        if($intTotalRec>0){
//            while($row=$totalResult->fetch_array()){
//                $publishYear=date('Y',strtotime($row['DTM_PUBLISHDATE']));
//               if(!in_array($publishYear,$yearArray))
//                    array_push($yearArray,$publishYear);
//        }
////        /print_r($yearArray);exit;
//                    
//                              
//    }
?>