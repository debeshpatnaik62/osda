<?php
    
  //========== create object of clsEmployer class=============== 
        include_once( CLASS_PATH.'clsEmployer.php');
        include_once(CLASS_PATH.'clsSkillCompetition.php');
       // print_r($_REQUEST);exit;
  $objEmployer  = new clsEmployer; 
  $objCompete             = new  clsSkillCompetition;
     

   $strSubmit      = ($id>0)?'Update':'Submit';
  $strReset       = ($id>0)?'Cancel':'Reset';
  $strTab         = ($id>0)?'Edit':'Add';
  $strclick       = ($id>0)?"window.location.href='". SITE_URL."employer/".$glId."/".$plId. "';":"";

  $skillResults = $objCompete->manageSkillCompetition('SK',0,0,0,'','','','',0,BLANK_DATE,'','','','','','',0,'','','',0,'',0,'',0,'','',0,0,0,BLANK_DATE,BLANK_DATE);    
  
  //========== Default variable ===============       
  
  $flag            = 0;  
        $errFlag         = 0;
  $outMsg          = '';  
   

  //============ Button Submit ===================
  if (isset($_POST['btnSubmit'])) {
       //   echo "sddghh";exit;
           $result        = $objEmployer->addUpdateEmployer($id);
         
           //print_r($result);exit;
           $outMsg        =  $result['msg']; 
           $flag          =  $result['flag']; 
          $formdata      =  $result['returnParams'];

          $strCompanyName       = htmlspecialchars_decode($formdata['compname'], ENT_QUOTES);
          $strName       = htmlspecialchars_decode($formdata['name'], ENT_QUOTES);
        /* $strName = $formdata['txtName'];*/
           $strMobile     =htmlspecialchars_decode($formdata['mobile'], ENT_QUOTES);
           $strEmail      =htmlspecialchars_decode($formdata['email'], ENT_QUOTES);
           $strDesignation  =htmlspecialchars_decode($formdata['desig'], ENT_QUOTES);
           $strSkills   =htmlspecialchars_decode($formdata['skills'], ENT_QUOTES);
           $strCandidates    =htmlspecialchars_decode($formdata['candidates'], ENT_QUOTES);
           $strMessage    =htmlspecialchars_decode($formdata['message'], ENT_QUOTES);
          $errFlag    = $result['flag'];
           if($flag==0 && $id>0)
              $redirectLoc  =  SITE_URL."employer";
            else if($flag==0 && $id==0)  
              $redirectLoc  =  SITE_URL."employer";
           
  }
        ?>