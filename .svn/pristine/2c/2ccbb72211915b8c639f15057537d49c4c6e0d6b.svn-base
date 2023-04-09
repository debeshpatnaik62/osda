<?php
	/* ================================================
	File Name              : viewQuestionDetailsInner.php
	Description	           : This is used to view the question details.
	Developed By		   : Rahul Kumar Saw
	Developed On		   : 27-Aug-2021
	Update History		   :
	      
        <Updated by>		           <Updated On>		<Remarks>
       
	Class Used		   : 
	Functions Used		   : 
	==================================================*/

    include_once(CLASS_PATH.'clsQuestion.php');
    include_once(CLASS_PATH.'clsSkillCompetition.php');
    $obj                = new clsQuestion;
    $objSkill           = new clsSkillCompetition;
    
    
    $idArr                 = (isset($_REQUEST['PARAM']) && ($_REQUEST['PARAM']!=''))?$obj->decrypt($_REQUEST['PARAM']):0;
    $dir            = explode("/",$idArr);
    $applicantId    = $dir[0];
    $skillId        = $dir[1];

    //print_r($id);exit;
 
    if($skillId>0)
    {   

         $result = $obj->manageQuestion('V',0,$skillId,'',0,'',0,0,'','',0,0,'','');
        //============ Read value for updation ===========	
       
        //Fetch Skill wise question
        $applicantresult      = $objSkill->manageSkillCompetition('R',$applicantId,0,0,'','','','',0,'0000-00-00','','','','','','',0,'','','',0,'',0,'',0,'','',0,0,0,'0000-00-00','0000-00-00');
        if($applicantresult){
            
            $resultStud      = $applicantresult->fetch_array();
        }
        
    }

       
?>