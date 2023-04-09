<?php
    /* ================================================
    File Name       : addCalenderInner.php
    Description		: This page is used to add Calender Details.
    Developed By	: Pusparani Mandal
    Developed On	: 13-07-2017
    Update History	:
    <Updated by>		<Updated On>		<Remarks>
    

    Class Used		: clsCalender
    Functions Used	: 
    ==================================================*/	
	//========== create object of clsEvent class===============	
	//print_r($_REQUEST);
       include_once(CLASS_PATH.'clsCalender.php');
        $objEvents        = new clsCalender;	
        $id             = (isset($_REQUEST['ID']))?$_REQUEST['ID']: 0;
        $viewData         = (isset($_REQUEST['ML']) && $_REQUEST['ML'] == 'view')?$_REQUEST['ML']: '';
        //$strHolidayWeek  =" ";
        $strSubmit      = ($id>0)?'Update':'Submit';
        $strReset       = ($id>0)?'Cancel':'Reset';
		
        $strTab         = 'Add';
		if($viewData == 'view')
		{
			$strTab         = 'View Details';
		}
		else if($id>0)
		{
			$strTab         = 'Edit';
		}
        $strclick       = ($id>0)?"window.location.href='". APP_URL."viewEvents/".$id."';":"";
       //echo $id;exit;
    //========== Permission ===============	
      // print_r($_POST);exit;
        $glId = $_REQUEST['GL'];
        $plId = $_REQUEST['PL'];
        $userId          = USER_ID;
        $strHolidayWeek=6;
    if (isset($id) && !empty($id)) 
    {
        $result   = $objEvents->readWorkingCalander($id);
        //print_r($result);
        $vendorId   =$result['intOrgId'];
        $vchName    = $result['vchName'];
        $strTmFrom  = $result['timeFrom'];
        $strTmTo    = $result['timeTo'];
        $strHolidayWeek=$result['vchHolidayWeek'];
        if($strHolidayWeek!='')
        {
            $strHolidayWeek=$strHolidayWeek;
        }else{
            $strHolidayWeek=1;
        }
      
    }
       
        /**For Add Update Holiday Calender***/
        if (isset($_POST['hdnQs']) && $_POST['hdnQs'] == 'U') {  
        if($id > 0){
            $result = $objEvents->updateWorkingCalander('WU',$id);
        }else{
             //print_r($_POST);exit;
            $result = $objEvents->saveWorkingCalander('WA');
        }
        //print_r($result);exit;
        $outMsg = $result['msg'];
        $flag = $result['flag'];
        $vchName = $result['vchName'];
        $strTmFrom = $result['timeFrom'];
        $strTmTo = $result['timeTo'];
        if($flag == 0){
            $redirectLoc = APP_URL . "viewCalender/";
        }
    }

	
 ?>