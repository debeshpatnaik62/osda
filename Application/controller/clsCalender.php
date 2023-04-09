<?php
/******Class to manage Events ********************
    'By                     : Rahul Kumar Saw    '
    'On                     : 03-Apr-2023        '
    'Procedure Used        : USP_CALENDAR       '
    * ************************************************** */

    class clsCalender extends Model {

        // function to manage Event Calender
        private function manageEventCalender($action,$eventid,$eventfdt,$eventtdt,$eventdesc,$holidaytype,$createdby,$eventflag)
        {
            $glSql= "CALL USP_CALENDAR('$action',$eventid,'$eventfdt','$eventtdt','$eventdesc','$holidaytype',$createdby,'$eventflag');";
           //echo $glSql;//exit;
            //if($action=='DV'){ echo $glSql;exit; } 

            $fillResult  = Model::executeQry($glSql);
            return $fillResult;
        } 
        public function addEventCalender($action)
        {
           $holidaytype='';
           $fillResult=$this->manageEventCalender($action,0,'0000-00-00','0000-00-00','',$holidaytype,1,0);
           $rows = array();
            while($r=mysqli_fetch_assoc($fillResult)) {
              $eventArr=array();
              $eventArr["id"]=$r["intEventId"];
              $eventArr["name"]=$r["txtDescription"];
              $eventArr["holidaytype"]=$r["vchHolidayType"];
              $eventArr["sdate_year"]=date('Y',strtotime($r["vchFromDate"]));
              $eventArr["sdate_month"]=date('m',strtotime($r["vchFromDate"]))-1;
              $eventArr["sdate_date"]=date('d',strtotime($r["vchFromDate"]));
              $eventArr["edate_year"]=date('Y',strtotime($r["vchToDate"]));
              $eventArr["edate_month"]=date('m',strtotime($r["vchToDate"]))-1;
              $eventArr["edate_date"]=date('d',strtotime($r["vchToDate"]));
              $rows[] = $eventArr;
            }
            return json_encode($rows);
        }        
        public function saveEventCalender($action,$eventid,$eventfdt,$eventtdt,$eventdesc,$holidaytype,$createdby,$eventflag)
        {
            $dupRes = $this->manageEventCalender('CD',$eventid,$eventfdt,$eventtdt,$eventdesc,$holidaytype,$createdby,$eventflag);
            if($dupRes) 
            {
                $numRows = $dupRes->fetch_array();
                if($numRows > 0)
              	{
              	      	     	$data = 'Holiday Name Already Exist!';  
                                return json_encode(array('result'=>$data));
              	} 
                else 
                {
                
                    $fillResult=$this->manageEventCalender($action,$eventid,$eventfdt,$eventtdt,$eventdesc,$holidaytype,$createdby,$eventflag);
                    if($fillResult)
                    {
                        $data = 'Holiday submitted successfully!!';  
                        return json_encode(array('result'=>$data));
                    }
                    else
                    {
                        $data = 'Error!!';  
                        return json_encode(array('result'=>$data));
                    }
                }
                
            }   
        }
            

        public function updateEventCalender($action,$eventid,$eventfdt,$eventtdt,$eventdesc,$holidaytype,$createdby,$eventflag)
        {
           
            $fillResult=$this->manageEventCalender($action,$eventid,$eventfdt,$eventtdt,$eventdesc,$holidaytype,$createdby,$eventflag);
                if($fillResult)
                {
                     $data = 'Holiday updated successfully!!';  
                     return json_encode(array('result'=>$data));
                }
                else
                {
                    $data = 'Error!!';  
                    return json_encode(array('result'=>$data));
                }
        }        

        public function deleteEventCalender($action,$eventid,$eventfdt,$eventtdt,$eventdesc,$holidaytype,$createdby,$eventflag)
        {
           
            $fillResult=$this->manageEventCalender($action,$eventid,$eventfdt,$eventtdt,$eventdesc,$holidaytype,$createdby,$eventflag);
                if($fillResult)
                {
                     $data = 'Holiday deleted successfully!!';  
                     return json_encode(array('result'=>$data));
                }
                else
                {
                    $data = 'Error!!';  
                    return json_encode(array('result'=>$data));
                }
        }

         public function addUserEventCalender($action)
        {
           $fillResult=$this->manageEventCalender($action,0,'0000-00-00','0000-00-00','','',0,0);
           $rows = array();
            while($r=mysqli_fetch_assoc($fillResult)) {
              $eventArr=array();
              $eventArr["id"]=$r["intEventId"];
              $eventArr["name"]=$r["txtDescription"];
              $eventArr["holidaytype"]=$r["vchHolidayType"];
              $eventArr["sdate_year"]=date('Y',strtotime($r["vchFromDate"]));
              $eventArr["sdate_month"]=date('m',strtotime($r["vchFromDate"]));
              $eventArr["sdate_date"]=date('d',strtotime($r["vchFromDate"]));
              $eventArr["edate_year"]=date('Y',strtotime($r["vchToDate"]));
              $eventArr["edate_month"]=date('m',strtotime($r["vchToDate"]));
              $eventArr["edate_date"]=date('d',strtotime($r["vchToDate"]));
              $rows[] = $eventArr;
            }
            return json_encode($rows);
        }

         public function mobUserEventCalender($action,$month,$year,$aitl_id=0)
        {
          $month=(!empty($month))?$month:0;
          $year = (!empty($year)  && $year>0)?$year.'-00-00':'0000-00-00';
           $fillResult=$this->manageEventCalender($action,$month,$year,'0000-00-00','','',0,0,$aitl_id);
           $rows = array();
            while($r=$fillResult->fetch_assoc()) 
            {
                $eventArr=array();
                $eventArr["id"]           = $r["intEventId"];
                $splitdesc                = explode(',', $r["txtDescription"]);
                $eventArr["name"]         = $splitdesc;
                $eventArr["holidaytype"]  = $r["vchHolidayType"];
                $eventArr["from_date"]    = date('d-m-Y',strtotime($r["vchFromDate"]));
                $eventArr["to_date"]      = date('d-m-Y',strtotime($r["vchToDate"]));
                $eventArr["sdate_year"]   =date('Y',strtotime($r["vchFromDate"]));
                $eventArr["sdate_month"]  =date('m',strtotime($r["vchFromDate"]));
                $eventArr["sdate_date"]   =date('d',strtotime($r["vchFromDate"]));
                $eventArr["edate_year"]   =date('Y',strtotime($r["vchToDate"]));
                $eventArr["edate_month"]  =date('m',strtotime($r["vchToDate"]));
                $eventArr["edate_date"]   =date('d',strtotime($r["vchToDate"]));
                $rows[] = $eventArr;
            }
            return ($rows);
        }         
    
        
        
        
        /****For Add Calender added by:shweta choudhury on 25-05-2018**/
        public function saveWorkingCalander($action) 
        {
           // print_r($_POST);exit;
            $flag = 0;
            $hdnAddData = $_POST['hdnAddData'];
            $hdnAddData = json_decode($hdnAddData, true);
      
                //print_r( $hdnAddData);exit;
            $txtCalandarName = $_POST['txtCalandarName'];
            $txtTmFrom = $_POST['txtTmFrom'];
            $txtTmTo = $_POST['txtTmTo'];
            $vendorId=$_POST['selVendorName'];
            $holidayListArr=$_POST['txtChk'];
            //echo $holidayListArr;exit;
            if($holidayListArr!=''){
             foreach($holidayListArr as $holidayListData){
                $holidayQuery.= $holidayListData.',';
                
            }
            $holidayQuery = substr($holidayQuery,0,-1);
            }else{
             
                
                $holidayQuery = '@blankQery';
                //echo $holidayQuery;exit;
            }
            
            //echo $holidayQuery;exit;
            $calander = $vendorId.'~::~'.$txtCalandarName.'~::~'.$txtTmFrom.'~::~'.$txtTmTo.'~::~'.$holidayQuery;  
            //echo $calander;exit;
            $userId=$_SESSION['adminConsole_userID'];
            
            foreach($hdnAddData as $data){
                $startDate = date('Y-m-d',strtotime($data['startDate']));
                $endDate =   date('Y-m-d',strtotime($data['endDate']));
                $query .=   '(@last_id,"'.$startDate.'","'.$endDate.'","'.$data['name'].'","'.$data['holidaytype'].'","'.$userId.'"),';
            }
            $query = substr($query,0,-1);
            $chkDuplicate =$this->manageEventCalender('CA',$vendorId, '0000-00-00', '0000-00-00', '', '', 0,'');
            if($chkDuplicate->num_rows>0){
            $resDuplicate = $chkDuplicate->fetch_array();
            $cnt=$resDuplicate['total'];
            if($cnt==0){
            $result = $this->manageEventCalender($action, 0, '0000-00-00', '0000-00-00', $calander, '', $userId,$query);
           $row = $result->fetch_array();
            //print_r($row);exit;
            $db_status = $row['@db_status'];
            if($db_status == 1){
                $flag = 1;
                $msg = 'Working calender already exists with given name.';
            }else{
                $msg = 'Working calender created successfully.';
            }
            }else{
                $msg = 'Working calender already exists for this vendor.';
            }
            }
           // echo $msg;exit;
            return array('msg'=>$msg);
        }
    
    
    
         /****For view vendor Details added by:shweta choudhury on 25-05-2018**/
        public function viewVendorDetails($action,$eventid,$eventfdt,$eventtdt,$eventdesc,$holidaytype,$createdby,$eventflag) 
        {
            $result = $this->manageEventCalender($action,$eventid,$eventfdt,$eventtdt,$eventdesc,$holidaytype,$createdby,$eventflag);
            return $result;
            
        }
        
       public function viewCalander($action,$intRecno,$eventfdt, $eventtdt, $eventdesc, $holidaytype,$id, $eventflag) {

        $result = $this->manageEventCalender($action,$intRecno,$eventfdt, $eventtdt, $eventdesc, $holidaytype,$id, $eventflag);
        //$row = $result->fetch_array();
        return $result;
       }
       
       public function readWorkingCalander($id) {
        $result = $this->manageEventCalender('WR', $id, '0000-00-00', '0000-00-00', '', '', 0,'');
        $row = $result->fetch_array();
        return $row;
        }
        
        public function updateWorkingCalander($action,$id) {
        $flag = 0;
        $hdnAddData = $_POST['hdnAddData'];
        $hdnAddData = json_decode($hdnAddData, true);
 
        $txtCalandarName = $_POST['txtCalandarName'];
        $txtTmFrom = $_POST['txtTmFrom'];
        $txtTmTo = $_POST['txtTmTo'];
        $vendorId=$_POST['selVendorName'];
        $userId=$_SESSION['adminConsole_userID'];
         $holidayListArr=$_POST['txtChk'];
            
         if($holidayListArr!=''){
             foreach($holidayListArr as $holidayListData){
                $holidayQuery.= $holidayListData.',';
                
            }
            $holidayQuery = substr($holidayQuery,0,-1);
         }else{
              $holidayQuery = '@blankQery';
         }
           //echo $holidayQuery;exit;
        $calander = $vendorId.'~::~'.$txtCalandarName.'~::~'.$txtTmFrom.'~::~'.$txtTmTo.'~::~'.$holidayQuery;  
          //print_r($hdnAddData);exit;  
        foreach($hdnAddData as $data){
            $startDate = date('Y-m-d',strtotime($data['startDate']));
            $endDate = date('Y-m-d',strtotime($data['endDate']));
            $query .= '(@last_id,"'.$startDate.'","'.$endDate.'","'.$data['name'].'","'.$data['holidaytype'].'","'.$userId.'"),';
        }
        $query = substr($query,0,-1);
        $result = $this->manageEventCalender($action, $id, '0000-00-00', '0000-00-00', $calander, '', $userId,$query);
        $row = $result->fetch_array();
        $db_status = $row['@db_status'];
        if($db_status == 1){
            $flag = 1;
            $msg = 'Working calender already exists with given name.';
        }else{
            $msg = 'Working calender updated successfully.';
        }
        return array('msg'=>$msg,'flag'=>$flag,'vchName'=>$txtCalandarName,'timeFrom'=>$txtTmFrom,'timeTo'=>$txtTmTo);
    }
    
    public function addEventCalendersNew($action,$id)
        {
        $holidaytype='';
           $fillResult=$this->manageEventCalender($action,$id,'0000-00-00','0000-00-00','',$holidaytype,1,0);
           $rows = array();
            while($r=mysqli_fetch_assoc($fillResult)) {
               //print_r($r);
            $eventArr = array();
            $eventArr["id"] = $r["intEventId"];
            $eventArr["name"] = $r["txtDescription"];
            $eventArr["holidaytype"] = $r["vchHolidayType"];
            $eventArr["sdate_year"] = date('Y', strtotime($r["vchFromDate"]));
            $eventArr["sdate_month"] = date('m', strtotime($r["vchFromDate"]));
            $eventArr["sdate_month_real"] = date('m', strtotime($r["vchFromDate"]));
            $eventArr["sdate_date"] = date('d', strtotime($r["vchFromDate"]));
            $eventArr["edate_year"] = date('Y', strtotime($r["vchToDate"]));
            $eventArr["edate_month"] = date('m', strtotime($r["vchToDate"]));
            $eventArr["edate_month_real"] = date('m', strtotime($r["vchToDate"]));
            $eventArr["edate_date"] = date('d', strtotime($r["vchToDate"]));
            $rows[] = $eventArr;
            }
           // print_r($rows);
            return json_encode($rows);
        }
    
    
    public function addEventCalenders($action,$id)
        {
        $holidaytype='';
           $fillResult=$this->manageEventCalender($action,$id,'0000-00-00','0000-00-00','',$holidaytype,1,0);
           $rows = array();
            while($r=mysqli_fetch_assoc($fillResult)) {
             //  print_r($r);
            $eventArr = array();
			   $event_from 	= (strtotime($r["vchFromDate"])>0)?date('Y-m-d',strtotime($r['vchFromDate'])):'';
			   $event_to 	= (strtotime($r["vchToDate"])>0)?date('Y-m-d',strtotime($r['vchToDate'])):'';
				if($action == 'S')
				{
					while(strtotime($event_from) <= strtotime($event_to))
					{
					$eventArr["id"] 	= $r["intEventId"];
					$eventArr["name"] 	= $r["txtDescription"];
					$eventArr["holidaytype"] = $r["vchHolidayType"];
					$eventArr["sdate_year"] = date('Y', strtotime($event_from));
					$eventArr["sdate_month"] = date('m', strtotime($event_from)) - 1;
					$eventArr["sdate_month_real"] = date('m', strtotime($event_from));
					$eventArr["sdate_date"] = date('d', strtotime($event_from));
					$eventArr["edate_year"] = date('Y', strtotime($r["vchToDate"]));
					$eventArr["edate_month"] = date('m', strtotime($r["vchToDate"])) - 1;
					$eventArr["edate_month_real"] = date('m', strtotime($r["vchToDate"]));
					$eventArr["edate_date"] = date('d', strtotime($r["vchToDate"]));
					$rows[] = $eventArr;
					$event_from = date ("Y-m-d", strtotime("+1 day", strtotime($event_from)));
					}
				}
				else
				{
					$eventArr["id"] = $r["intEventId"];
					$eventArr["name"] = $r["txtDescription"];
					$eventArr["holidaytype"] = $r["vchHolidayType"];
					$eventArr["sdate_year"] = date('Y', strtotime($r["vchFromDate"]));
					$eventArr["sdate_month"] = date('m', strtotime($r["vchFromDate"])) - 1;
					$eventArr["sdate_month_real"] = date('m', strtotime($r["vchFromDate"]));
					$eventArr["sdate_date"] = date('d', strtotime($r["vchFromDate"]));
					$eventArr["edate_year"] = date('Y', strtotime($r["vchToDate"]));
					$eventArr["edate_month"] = date('m', strtotime($r["vchToDate"])) - 1;
					$eventArr["edate_month_real"] = date('m', strtotime($r["vchToDate"]));
					$eventArr["edate_date"] = date('d', strtotime($r["vchToDate"]));
					$rows[] = $eventArr;				
				}
            }
           // print_r($rows);
            return json_encode($rows);
        } 
        
         public function addEventHoliday($action,$id)
        {
             $holidaytype='';
           $fillResult=$this->manageEventCalender($action,$id,'0000-00-00','0000-00-00','',$holidaytype,1,0);
           $rows = array();
           $query ='';
           $list=[1,2,3,4,5,6,0];
            while($r=mysqli_fetch_assoc($fillResult)) {
             // print_r($arraLis[0]);
            $eventArr = array();
            $eventArr["id"] = $r["intId"];
            $eventArr["name"] = $r["vchName"];
            $eventArr["holidaytypes"] = $r["vchHolidayWeek"];
            $arrdata=explode(',', $eventArr["holidaytypes"]);
           if(count($arrdata)>0){
            foreach($arrdata as $arrdata){
                //echo $arrdata;
               $query .= $list[$arrdata].',';
               //echo $query;
            }
            $query = substr($query,0,-1);
           }else{
               $query='';
           }
           // echo $query;
            $eventArr["holidaytype"] = $query;
            $rows[] = $eventArr;
            }
            
            //print_r($rows);
            return json_encode($rows);
        }
        
        
        // Function To Delete Holiday  By::Shweta Choudhury   :: On:: 29-05-2018
    public function deleteHoliday($action, $ids) {
        $action='DH';
        $userId                   = (isset($_SESSION['adminConsole_userID']))?$_SESSION['adminConsole_userID']:0;
        $ctr = 0;
        $explIds = explode(',', $ids);
        $delRec = 0;
        foreach ($explIds as $indIds) 
        {
            $result = $this->manageEventCalender('DH',$indIds,'0000-00-00','0000-00-00','',0,0,0);
            $row = $result->fetch_array();
           // print_r($row);exit;
            if ($row[0] =='0')
                $delRec++;
                $ctr++;
        }

        if ($action == 'DH') {
            
            if ($delRec > 0)
                $outMsg .= 'Calender(s) deleted successfully';
            else
                $outMsg .= 'Dependency record exist. Calender(s) can not be deleted';
        }
        
        return $outMsg;
    }
        // Function to get the working date By Sunil On 10-Jun-2019
		public function getWorkingDate($paramArr)
		{			
			$startingDate		= $paramArr['startingDate'];
			$noOfDays			= $paramArr['noOfDays'];
			$dateBeforeAfter 	= $paramArr['dateBeforeAfter'];
			$vendorType			= 2;
			$weekendHolidays	= '6,5';
			$weekendHolidaysRes	= $this->viewCalander('WP',$vendorType,'0000-00-00', '0000-00-00', '', '',0, '');
			if($weekendHolidaysRes->num_rows>0)
			{
				$weekendHolidaysRow	= $weekendHolidaysRes->fetch_array();
				$weekendHolidays	= $weekendHolidaysRow['vchHolidayWeek'];
			}
			$results			= $this->manageEventCalender('GL',$noOfDays,$startingDate,'0000-00-00','','',$vendorType,$dateBeforeAfter);
			$allHolidays		= '';
			if($results->num_rows>0)
			{
				$holidayRow		= $results->fetch_array();
				$allHolidays	= $holidayRow['allHolidays'];
			}
			$explWeekends		= explode(',',$weekendHolidays);
			$explHolidays		= explode(',',$allHolidays);
			$workingDayCtr		= 0;
			$finalWorkingDay	= $startingDate;
			$daysToCheck		= ($noOfDays<=3)?8:($noOfDays*2);
			if(strtoupper($dateBeforeAfter) == 'B')
			{
				$startDtm		= strtotime($startingDate);
				$endDtm			= strtotime("-".($daysToCheck)." day", $startDtm);
				$endDate		= date('Y-m-d', $endDtm);
				
				while($startDtm >= $endDtm) 
				{
					$weekDays	= date('w', $startDtm);
					if(in_array($weekDays,$explWeekends) || in_array($startingDate,$explHolidays))
					{
						//print_r($explHolidays);
						//echo 'Holiday:'.date("Y-m-d",$startDtm).'<br/>';
					}
					else
					{
						$finalWorkingDay	= $startingDate;
						$workingDayCtr++;//echo 'Working:'.date("Y-m-d",$startDtm).'<br/>';
					}
					if($workingDayCtr == $noOfDays)
					{
						break;
					}
					$startDtm =  strtotime("-1 day", $startDtm);
					$startingDate	= date('Y-m-d',$startDtm);
				}
			}
			else
			{
				$startDtm		= strtotime($startingDate);
				$endDtm			= strtotime(($daysToCheck)." day", $startDtm);
				$endDate		= date('Y-m-d', $endDtm);
				
				while($startDtm <= $endDtm) 
				{
					$weekDays	= date('w', $startDtm);
					if(in_array($weekDays,$explWeekends) || in_array($startingDate,$explHolidays))
					{
						//print_r($explHolidays);
						//echo 'Holiday:'.date("Y-m-d",$startDtm).'<br/>';
					}
					else
					{
						$finalWorkingDay	= $startingDate;
						$workingDayCtr++;//echo 'Working:'.date("Y-m-d",$startDtm).'<br/>';
					}
					if($workingDayCtr == $noOfDays)
					{
						break;
					}
					$startDtm =  strtotime("1 day", $startDtm);
					$startingDate	= date('Y-m-d',$startDtm);
				}
			}
			return $finalWorkingDay;
		}
		public function getEventCalender($action,$id,$yr){
		   $fillResult=$this->manageEventCalender($action,$id,'0000-00-00','0000-00-00',$yr,'',1,$yr);
			return $fillResult;
		} 
		
    }// end Class

?>