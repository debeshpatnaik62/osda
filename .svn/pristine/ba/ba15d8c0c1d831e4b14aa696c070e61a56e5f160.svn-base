<?php
	/* ================================================
	File Name                  : draftApplicationInner.php
	Description	           : This is used to view the selected applicant details.
	Developed By		   : T Ketaki Debadarshini
	Developed On		   : 19-Oct-2016
	Update History		   :
	      
        <Updated by>		           <Updated On>		<Remarks>
       
	Class Used		   : clsCommonprofile
	Functions Used		   : viewCommonprofile()
	==================================================*/

    include_once( CLASS_PATH.'clsSkillTP.php');
    $objTP        = new clsSkillTP; 
    
    
    $id                 = (isset($_REQUEST['PARAM']) && ($_REQUEST['PARAM']!=''))?$objTP->decrypt($_REQUEST['PARAM']):0;
 //echo $id."hii";exit;
    if($id>0)
    {   
        //============ Read value for updation ===========	
       
        $arrSConditions=array('Id'=>$id);

        $tpresult     = $objTP->manageskillTP('R', $arrSConditions);
        if($tpresult){
            
            $result      = $tpresult->fetch_array();
        }
      //  print_r($result);
        
    }
       
?>