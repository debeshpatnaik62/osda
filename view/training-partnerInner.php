<?php
    
  //========== create object of clsTraining class=============== 
        include_once( CLASS_PATH.'clsTraining.php');
       // print_r($_REQUEST);exit;
        $objTraining  = new clsTraining;  
     

  $strSubmit      = ($id>0)?'Update':'Submit';
  $strReset       = ($id>0)?'Cancel':'Reset';
  $strTab         = ($id>0)?'Edit':'Add';
    $strclick       = ($id>0)?"window.location.href='". SITE_URL."training-partner/".$glId."/".$plId. "';":"";

       
  
  //========== Default variable ===============       
  
  $flag            = 0;  
        $errFlag         = 0;
  $outMsg          = '';  
   

  //============ Button Submit ===================
  if (isset($_POST['btnSubmit'])) {
       //   echo "sddghh";exit;
           $result        = $objTraining->addUpdateTraining($id);
         
           //print_r($result);exit;
           $outMsg        =  $result['msg']; 
           $flag          =  $result['flag']; 
          $formdata      =  $result['returnParams'];
          $strName       = htmlspecialchars_decode($formdata['name'], ENT_QUOTES);
        /* $strName = $formdata['txtName'];*/
           $strMobile     =htmlspecialchars_decode($formdata['mobile'], ENT_QUOTES);
           $strEmail      =htmlspecialchars_decode($formdata['email'], ENT_QUOTES);
           $strInstitute  =htmlspecialchars_decode($formdata['institute'], ENT_QUOTES);
           $strMessage    =htmlspecialchars_decode($formdata['message'], ENT_QUOTES);
          $errFlag    = $result['flag'];
           if($flag==0 && $id>0)
              $redirectLoc  =  SITE_URL."training-partner/".$glId."/".$plId."/".$id;  
            else if($flag==0 && $id==0)  
                $redirectLoc  =  SITE_URL."training-partner/".$glId."/".$plId;
           
  }
        ?>