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

    include_once(CLASS_PATH.'clsSkillCompetition.php');
    $obj                = new clsSkillCompetition;
    
    
    $id                 = (isset($_REQUEST['PARAM']) && ($_REQUEST['PARAM']!=''))?$obj->decrypt($_REQUEST['PARAM']):0;
    $idproofary         = json_decode($obj->idproof);
 
    if($id>0)
    {   
        //============ Read value for updation ===========	
       
        //Fetch Land Related and Other operational unit data
        $applicantresult      = $obj->manageSkillCompetition('R',$id,0,0,'','','','',0,'0000-00-00','','','','','','',0,'','','',0,'',0,'',0,'','',0,0,0,'0000-00-00','0000-00-00');
        if($applicantresult){
            
            $result      = $applicantresult->fetch_array();
        }
      //  print_r($result);
          if($result['vchProfilePic']!='')
                $strImage = URL.'uploadDocuments/'.$result['vchUniqueId'].'/'.$result['vchProfilePic'];
         else
           $strImage = APP_URL.'/img/noPhoto.jpg';
        
        
        if($result['tinOperationalUnit']==1)
        {
            //$opUnitresult = $obj->viewCommonprofile('OU',$id,0,'','','',0,'0000-00-00','0000-00-00',0,$result['intLandAppId'],'',0,0,0);
        }
        
    }
       
?>