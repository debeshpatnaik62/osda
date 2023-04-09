<?php
/* * ****Class to manage Question ********************
'By                     : Rahul Kumar Saw'
'On                     : 26-Aug-2021       '
' Procedure Used        : USP_QUESTION      '
* ************************************************** */
//ob_clean();
class clsQuestion extends Model { 

// Function To Manage Question By:: Rahul Kumar Saw:: On:: 26-AUG-2021
    public function manageQuestion($action,$QuestionId,$skillId,$strQuestion,$status,$intLevel,$intMarks,$createdBy,$query,$queryDetails,$attr1,$attr2,$attr3,$attr4) { 
       
        $QuestionSql        = "CALL USP_QUESTION('$action',$QuestionId,$skillId,'$strQuestion',$status,'$intLevel',$intMarks,$createdBy,'$query','$queryDetails',$attr1,$attr2,'$attr3','$attr4',@out);";
 //echo  $QuestionSql ;
        
        $errAction          = Model::isSpclChar($action); 

        if ($errAction>0)
        {    
            echo '<script>window.location.href="'.APPURL.'error";</script>';
        }    
        else 
        {
            $QuestionResult = Model::executeQry($QuestionSql);
               return $QuestionResult;
        }
    }

// Function To Add Upadate Question By:: Rahul Kumar Saw:: On:: 26-Aug-2021
    public function addUpdateQuestion($QuestionId) 
    { 
            $QuestionId        = (isset($QuestionId))?$QuestionId:0; 

            $selSkill          = $_POST['selSkill'];
            $txtQuestion       = $_POST['txtQuestion']; 
            $errQuestion       = Model::isSpclChar($txtQuestion);      
            $blankQuestion     = Model::isBlank($txtQuestion);
            $lenQuestion       = Model::chkLength('max', $txtQuestion, 500);
            $totalQues         = count($txtQuestion);
            
            $query                  = '';
            $cntr                   = 1;               
            
               for ($i = 0; $i < $totalQues; $i++) {
                         
                    $strQuestion    = $_POST['txtQuestion'][$i];                         
                       
                    $query  .='('.$selSkill .',"'.$strQuestion.'"),';                  
                       $cntr++;                    
                    }
                    $query  = substr($query,0,-1); 

            $outMsg 				= '';
            $flag 					= ($QuestionId != 0) ? 1 : 0;
            $action 				= ($QuestionId == 0) ? 'A' : 'U';
            $errFlag            	= 0 ;
            
        if( ($blankQuestion >0))
            {
    			$errFlag		= 1;
    			$flag           = 1;
    			$outMsg			= "Mandatory Fields should not be blank";
            }
            else if(($errQuestion>0))
            {
    			$errFlag		= 1;
    			$flag           = 1;
    			$outMsg			= "Special Characters are not allowed";
            }   
           else if($lenQuestion>0 )
           {
               $errFlag        = 1;
               $flag           = 1;
               $outMsg         = "Length should not exceeded maxlength";
           }              

            if($errFlag==0)
            {
             $result = $this->manageQuestion($action,$QuestionId,$selSkill,$txtQuestion,0,'',0,USER_ID,$query,'',0,0,'','');  

                        if ($result) {
                            $outMsg = ($action == 'A') ? 'Question added successfully ' : 'Question updated successfully';
                     }  
            }          
		
		$intSkillId        = ($errFlag == 1) ? $selSkill      : '0';
		$strQuestion       = ($errFlag == 1) ? $txtQuestion      : ''; 
        
        $arrResult          = array('msg' => $outMsg, 'flag' => $flag,'intSkillId' => $intSkillId,'strQuestion' => $strQuestion);
                  return $arrResult;
    }

    
// Function To read Question  By:: Rahul Kumar Saw:: On:: 26-AUG-2021  
    public function readQuestion($id) {

        $result = $this->manageQuestion('R',$id,0,'',0,'',0,0,'','',0,0,'','');

        if ($result->num_rows> 0) 
        {
            $row                = $result->fetch_array();    
            $intQuestionId      = $row['intQuesId'];
            $intSkillId         = $row['intSkillId'];        
            $strQuestion		= htmlspecialchars_decode($row['vchQuestion'],ENT_QUOTES);
            $intStatus          = $row['intStatus'];
        }

        $arrResult = array('intQuestionId'=>$intQuestionId,'intSkillId' => $intSkillId, 'strQuestion' => $strQuestion,'intStatus' => $intStatus);      
        return $arrResult;
    }


// Function To Delete Question  By:: Rahul Kumar Saw:: On:: 26-AUG-2021 
    public function deleteQuestion($action, $ids) 
    {  
            $ctr = 0;
            $msg=0;
            $explIds = explode(',', $ids);
            $delRec = 0;
            foreach ($explIds as $indIds) { 

                $result = $this->manageQuestion($action,$indIds,0,'',0,'',0,0,'','',0,0,'',''); 
                  
                $row = $result->fetch_array();
                if ($row[0] == 0)
                    $delRec++;
                $ctr++;
            }

            if ($action == 'D') {
                if ($delRec > 0)
                    $outMsg .= 'Question(s) deleted successfully';
                else
                    $outMsg .= 'Dependency record exist Question(s) can not be  deleted';
            }
            else if ($action == 'IN')
                $outMsg = 'Question(s) unpublished successfully';
            else if($action == 'P')
                $outMsg = 'Question(s) Published successfully';  
            return $outMsg;
    }

    
}	
