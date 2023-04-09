<?php
/* ================================================
	File Name         	  : dashboardInner.php
	Description		  	  : This is for Dashboard.	
	Date Created		  : 23-JUL-2016
	Created By	          : Ashok Kumar Samal
	Update History		  :	<Updated by>				<Updated On>		<Remarks>
							Rahul Kumar Saw 			23-02-2022          Skill competition and skill development dashboard and graph
	Includes	  		  : clsSkillCompetition.php, clsSkillDevelopment.php
	Class Used 			  : clsSkillCompetition,clsSkillDevelopment
	==================================================*/


	$userType		   = $_SESSION['adminConsole_UserType'];
	$userId			   = USER_ID;
	$userPrivilege     = $_SESSION['adminConsole_Privilege'];
    $loginPrivilege    = $_SESSION['userPrivilege'];

        
    //============= include class path ======================//
     include_once(CLASS_PATH.'clsSkillCompetition.php');

//============= create object ===================//
     $objCompete      = new  clsSkillCompetition;
     $regdType           = (isset($_POST['selRegdType']) && $_POST['selRegdType']!= '')?$_POST['selRegdType']:REGD_PHASE;
     $totalCandidate  = $objCompete->manageSkillCompetition('TC',0,0,0,'','','','',0,'0000-00-00','','','','','','',0,'','','',0,'',0,'',0,'','',0,0,$regdType,'0000-00-00','0000-00-00');
     $totalCandidateCnt = ($totalCandidate->num_rows);

     $totalSkill      = $objCompete->manageSkillCompetition('TS',0,0,0,'','','','',0,'0000-00-00','','','','','','',0,'','','',0,'',0,'',0,'','',0,0,0,'0000-00-00','0000-00-00');
     $totalSkillCnt   = ($totalSkill->num_rows);

     $level1Qualified = $objCompete->manageSkillCompetition('TQ1',0,0,0,'','','','',0,'0000-00-00','','','','','','',0,'','','',0,'',0,'',0,'','',0,0,$regdType,'0000-00-00','0000-00-00');
     $level1QualifiedCnt = ($level1Qualified->num_rows);

     $level2Qualified = $objCompete->manageSkillCompetition('TQ2',0,0,0,'','','','',0,'0000-00-00','','','','','','',0,'','','',0,'',0,'',0,'','',0,0,$regdType,'0000-00-00','0000-00-00');
     $level2QualifiedCnt = ($level2Qualified->num_rows);

     $distResult 	  = $objCompete->manageSkillCompetition('DW',0,0,0,'','','','',0,'0000-00-00','','','','','','',0,'','','',0,'',0,'',0,'','',0,0,$regdType,'0000-00-00','0000-00-00');

     $skillResult     = $objCompete->manageSkillCompetition('SW',0,0,0,'','','','',0,'0000-00-00','','','','','','',0,'','','',0,'',0,'',0,'','',0,0,$regdType,'0000-00-00','0000-00-00');

     $venueResult     = $objCompete->manageSkillCompetition('VT',0,0,0,'','','','',0,'0000-00-00','','','','','','',0,'','','',0,'',0,'',0,'','',0,0,0,'0000-00-00','0000-00-00');



        $totalMaxValue  = $objCompete->manageSkillCompetition('MC',0,0,0,'','','','',0,'0000-00-00','','','','','','',0,'','','',0,'',0,'',0,'','',0,0,$regdType,'0000-00-00','0000-00-00');
        $maxRows 		= $totalMaxValue->fetch_array();
        /*For Total*/
        $maxColVal 		= $maxRows['maxTotal'];
	 	
	 	$arrRange 		= array();
	 	$arrRangeVal 	= array();
	 	$digcnt 		= (!empty($maxColVal))?strlen($maxColVal):0;
	 	$rangfdig 		= substr($maxColVal, 0, 1);
	 	$totLimit 		= str_pad($rangfdig+1, $digcnt, "0", STR_PAD_RIGHT);
	 	$brRange 		= $totLimit/4;
	 	foreach (range(0, $totLimit, $brRange) as $number) {
   			array_push($arrRangeVal, (int)$number);
		}

	 	/*$brRange = round($maxColVal/4);
	 	foreach (range(0, $maxColVal, $brRange) as $number) {
   			array_push($arrRangeVal, $number);
		}*/
		$cnt=0;
		foreach ($arrRangeVal as $range) 
		{
			if($cnt<count($arrRangeVal)-1)
   			array_push($arrRange, (($arrRangeVal[$cnt]=='0')?$arrRangeVal[$cnt]:$arrRangeVal[$cnt]+1).(( ($cnt+1)==(count($arrRangeVal)-1) )?' + ':' - '.$arrRangeVal[++$cnt]));
		}
		$cnt=0;
		$totCountLegend =  '<div class="legend legend--purple"> <span class="legend-text">'.$arrRange[$cnt++].'</span></div>       	<div class="legend legend--yellow"> <span class="legend-text">'.$arrRange[$cnt++].'</span></div>    	<div class="legend legend--grey"> <span class="legend-text">'.$arrRange[$cnt++].'</span></div>       	<div class="legend legend--brown"><span class="legend-text">'.$arrRange[$cnt++].' </span></div>';


		/*For Col1*/
		$maxColVal1 	= $maxRows['maxLv1'];
	 	
		$arrRange1 		= array();
	 	$arrRangeVal1 	= array();

	 	$digcnt1 		= (!empty($maxColVal1))?strlen($maxColVal1):0;
	 	$rangfdig1 		= substr($maxColVal1, 0, 1);
	 	$totLimit1 		= str_pad($rangfdig1+1, $digcnt1, "0", STR_PAD_RIGHT);
	 	$brRange1 		= $totLimit1/4;
	 	foreach (range(0, $totLimit1, $brRange1) as $number1) {
   			array_push($arrRangeVal1, (int)$number1);
		}

		$cnt1=0;
		foreach ($arrRangeVal1 as $range1) 
		{
			if($cnt1<count($arrRangeVal1)-1)
				array_push($arrRange1, (($arrRangeVal1[$cnt1]=='0')?$arrRangeVal1[$cnt1]:$arrRangeVal1[$cnt1]+1).(( ($cnt1+1)==(count($arrRangeVal1)-1) )?' + ':' - '.$arrRangeVal1[++$cnt1]));
		}
		$cnt1=0;
		$totCountLegend1 =  '<div class="legend legend--purple"> <span class="legend-text">'.$arrRange1[$cnt1++].'</span></div>       	<div class="legend legend--yellow"> <span class="legend-text">'.$arrRange1[$cnt1++].'</span></div>    	<div class="legend legend--grey"> <span class="legend-text">'.$arrRange1[$cnt1++].'</span></div>       	<div class="legend legend--brown"><span class="legend-text">'.$arrRange1[$cnt1++].' </span></div>';



		/*For Col2*/
		$maxColVal2 	= $maxRows['maxLv2'];
	 	
	 	$arrRange2 		= array();
	 	$arrRangeVal2 	= array();
	 	$digcnt2 		= (!empty($maxColVal2))?strlen($maxColVal2):0;
	 	$rangfdig2 		= substr($maxColVal2, 0, 1);
	 	$totLimit2 		= str_pad($rangfdig2+1, $digcnt2, "0", STR_PAD_RIGHT);
	 	$brRange2 		= $totLimit2/4;
	 	foreach (range(0, $totLimit2, $brRange2) as $number2) {
   			array_push($arrRangeVal2, (int)$number2);
		}

		$cnt2=0;
		foreach ($arrRangeVal2 as $range2) 
		{
			if($cnt2<count($arrRangeVal2)-1)
				array_push($arrRange2, (($arrRangeVal2[$cnt2]=='0')?$arrRangeVal2[$cnt2]:$arrRangeVal2[$cnt2]+1).(( ($cnt2+1)==(count($arrRangeVal2)-1) )?' + ':' - '.$arrRangeVal2[++$cnt2]));
		}

		$cnt2=0;
		$totCountLegend2 =  '<div class="legend legend--purple"> <span class="legend-text">'.$arrRange2[$cnt2++].'</span></div>       	<div class="legend legend--yellow"> <span class="legend-text">'.$arrRange2[$cnt2++].'</span></div>    	<div class="legend legend--grey"> <span class="legend-text">'.$arrRange2[$cnt2++].'</span></div>       	<div class="legend legend--brown"><span class="legend-text">'.$arrRange2[$cnt2++].' </span></div>';



		//============= include class path ======================//
     	include_once(CLASS_PATH.'clsSkillDevelopment.php');

	  //============= create object ===================//
	     $objDevelop      = new  clsSkillDevelopment;

	     $arrConditions 	= array();
	     $totalCanResult 	= $objDevelop->manageskillDevelopment('TC', $arrConditions);
	     $totalSkillCandidateCnt = ($totalCanResult->num_rows);

	     $approveTPResult 	= $objDevelop->manageskillDevelopment('TPW', $arrConditions);

	     $pendingTPResult 	= $objDevelop->manageskillDevelopment('PTP', $arrConditions);

	     $approveInsResult 	= $objDevelop->manageskillDevelopment('IWR', $arrConditions);

	     $pendingInsResult 	= $objDevelop->manageskillDevelopment('PIR', $arrConditions);

	     $programResult 	= $objDevelop->manageskillDevelopment('PWR', $arrConditions);

	     $pendingProgResult = $objDevelop->manageskillDevelopment('PPR', $arrConditions);

		$tpResult 	= $objDevelop->manageskillDevelopment('TPC', $arrConditions);
		$tpRow    	= $tpResult->fetch_array();
		$tpApproved = $tpRow['approved'];
		$tpPending 	= $tpRow['pending'];
		$tpReject 	= $tpRow['rejected'];

		$insResult 	= $objDevelop->manageskillDevelopment('IPC', $arrConditions);
		$insRow    	= $insResult->fetch_array();
		$insApproved= $insRow['insApproved'];
		$insPending = $insRow['insPending'];
		$insReject 	= $insRow['insRejected'];

		$proResult 	= $objDevelop->manageskillDevelopment('PPC', $arrConditions);
		$proRow    	= $proResult->fetch_array();
		$proApproved= $proRow['proApproved'];
		$proPending = $proRow['proPending'];
		$proReject 	= $proRow['proRejected'];
?>