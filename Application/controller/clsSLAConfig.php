<?php
/* * ****Class to manage Escalation ********************
'By                     : Rahul Kumar Saw'
'On                     : 05-04-2023
'Procedure Used         : USP_ESCALATION       '
* ************************************************** */

class clsSLAConfig extends Model {
    
    // Function To Manage Escalation level  By::Rahul Kumar Saw   :: On:: 05-04-2023

    public function manageSLAConfig($action, $id,$catId,$subCatId, $priority, $slaUnit, $slaPeriod,$pubStatus ,$createdBy,$attr1) {
        $escalationSql = "CALL USP_SLA_CONFIGURATION('$action',$id, $catId,$subCatId,$priority,$slaUnit, $slaPeriod,$pubStatus, $createdBy,'$attr1',@OUT);";
    // echo $escalationSql ;
        
        $errAction        = Model::isSpclChar($action);
        if ($errAction > 0 )
            header("Location:" . APP_URL . "error");
        else {
            $escalationResult = Model::executeQry($escalationSql);
            return $escalationResult;
        }
    }
// Function To Add Upadate SLA Configuration By::Rahul Kumar Saw   :: On:: 05-04-2023
    
    public function addUpdateSLAConfig($configId) 
    {
       //print_r($_REQUEST);exit;
        
        $newSessionId       = session_id();
        $hdnPrevSessionId   = $_POST['hdnPrevSessionId'];
        if ($newSessionId == $hdnPrevSessionId) 
        {
            
            $userId             = $_SESSION['adminConsole_userID'];
        
            $catId              = (isset($_POST['selectCategory']))?$_POST['selectCategory']:0;
            $blankCatId         =  $this->isBlank($catId);
            $priority           = (isset($_POST['slaPriority']))?$_POST['slaPriority']:0;

            $txtSlaPeriod       = $_POST['txtSlaPeriod'];
            $blankSlaPeriod     =  $this->isBlank($txtSlaPeriod);

            $slaPeriodUnit        = $_POST['slaPeriodUnit'];
            $blankPeriodUnit      = $this->isBlank($slaPeriodUnit);
           
              
            $outMsg           =  '';
            $flag             =  ($configId != 0) ? 1 : 0;
            $errFlag          =   0;
            $action           =  ($configId == 0) ? 'A' : 'U';
      
            if( $blankCatId || $blankSlaPeriod>0 || $blankPeriodUnit>0) 
            {
                    $errFlag      = 1;
                    $flag         = 1;
                    $outMsg       = "Mandatory Fields Should Not Be Blank";
            }
            
            if($action=='A')
            {
                $dupResult = $this->manageSLAConfig('CD',$configId,$catId,0, $priority, 0, 0,0 ,$userId,'');
                $totalrows=$dupResult->fetch_array();
                $numrows=$totalrows['totalRecord'];
            }
			/*if($action=='U'){

                $dupResultCE = $this->manageSLAConfig('CE',$configId,$catId,$priority,0,0,0,$userId,'');
                $totalrowsCE=$dupResultCE->fetch_array();
                $numrowsCE=$totalrowsCE['totalRecord'];
                $categoryCE=$totalrowsCE['VCH_CATEGORY_E'];
                $subcategoryCE=$totalrowsCE['VCH_SUB_CATEGORY_E'];
            }*/
			
			if (($action=='A') && ($numrows>0)) {
               $outMsg = 'SLA Already Configured';
                $errFlag = 1;
                $flag   = 1;
            }
            /*elseif (($action=='U') && ($numrowsCE>0)) {
                $outMsg = 'Escalation Matrix Already Configured Against Category name: '.$categoryCE.' & Subcategory name: '.$subcategoryCE;
                $errFlag = 1;
                $flag   = 1;
            }*/            
            else 
            {            
            if($errFlag == 0)
            {
             
                $result = $this->manageSLAConfig($action, $configId,$catId,0,$priority,$slaPeriodUnit,$txtSlaPeriod,0,$userId,'');
               // print_r($result);exit();
                if($result)
                {
                      $outMsg = ($action == 'A') ? 'SLA Configuration added successfully ' : 'SLA Configuration updated successfully';        
                
                }
          }
        }
        $catId          = ($errFlag == 1) ? $catId : 0;
        $priority       = ($errFlag == 1) ? $priority : 0; 
        $slaPeriodUnit  = ($errFlag == 1) ? $slaPeriodUnit : '';
        $txtSlaPeriod   = ($errFlag == 1) ? $txtSlaPeriod : '';
        $arrResult = array('msg' => $outMsg, 'flag' => $flag,'catId' => $catId, 'priority' => $priority,'slaPeriodUnit'=>$slaPeriodUnit,'txtSlaPeriod'=>$txtSlaPeriod);
        return $arrResult;
        }
        else
        {
            header("Location:" . APP_URL . "error"); 
        }
    }

   // Function To read SLA Configuration  By::Rahul Kumar Saw   :: On:: 05-04-2023
    public function readSLAConfig($Id) {
       
      
        
        $result = $this->manageSLAConfig('R',$Id,0,0,0,0,0,0,0,'');
        if ($result->num_rows > 0) {

            while($row          = $result->fetch_array())
            {
            $indId              = $row["intId"];
            $intCategoryId      = $row['intCategoryId'];
            $intPriority        = $row["intPriority"];
            $intSLAPeriodUnit   = $row["intSLAPeriodUnit"];
            $intSLAPeriod       = $row["intSLAPeriod"];
            }
        }

        $arrResult = array('indId'=>$indId,'catId'=>$intCategoryId,'priority'=>$intPriority,'slaPeriodUnit'=>$intSLAPeriodUnit ,'txtSlaPeriod'=>$intSLAPeriod);
        return $arrResult;
    }
  
    
// Function To view escalation level By::Rahul Kumar Saw    :: On:: 18-12-2016
    public function viewSLAConfig($action, $configId,$typeId,$catId,$subCatId,$deptId,$levelId,$designationId,$uid,$standardDay,$query,$approvalLevel,$userId,$pageSize,$vchParam1,$vchParam2,$intParam1,$intParam2) 
    {
        
      $result = $this->manageSLAConfig($action, $configId,$typeId,$catId,$subCatId,$deptId,$levelId,$designationId,$uid,$standardDay,$query,$approvalLevel,$userId,$pageSize,$vchParam1,$vchParam2,$intParam1,$intParam2);  
    
      return $result;
    }
}