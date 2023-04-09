<?php
	/* ================================================
	File Name                  : instituteDetailsInner.php
	Description	           : This is used to view the selected institute details.
	Developed By		   : Rahul Kumar Saw
	Developed On		   : 14-June-2022
	Update History		   :
	      
	==================================================*/

    include_once( CLASS_PATH . 'clsSkillInsRegd.php');
    $objIns = new clsSkillInsRegd;
    
    
    $id                 = (isset($_REQUEST['PARAM']) && ($_REQUEST['PARAM']!=''))?$objIns->decrypt($_REQUEST['PARAM']):0;
 //echo $id."hii";exit;
    if($id>0)
    {   
        //============ Read value for updation ===========	
       
        $arrSConditions=array('Id'=>$id);

        $instituteresult     = $objIns->manageSkillInsRegd('R', $arrSConditions);
        if($instituteresult){
            
            $result      = $instituteresult->fetch_array();
        }
      //  print_r($result);
        
    }
       
?>