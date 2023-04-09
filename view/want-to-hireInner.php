<?php
  
    include(CLASS_PATH.'clsHire.php');
    $objHire       = new clsHire; 
    $arrConditions=array( 'Id'=>0,'pubStatus'=>2);
  
  
   //============ Button Submit ===================
      if (isset($_POST['btnSubmit'])) {

            $result=$objHire->addUpdateHire(0);
            $outMsg     = $result['msg'];     
            $errFlag    = $result['flag'];
            $vchName    = htmlspecialchars_decode($result['vchName'], ENT_QUOTES);
            $vchCompanyName   = htmlspecialchars_decode($result['vchCompanyName'], ENT_QUOTES);
            $vchSkills   = htmlspecialchars_decode($result['vchSkills'], ENT_QUOTES);
            $vchQualification   = htmlspecialchars_decode($result['vchQualification'], ENT_QUOTES); 
             $intNoCandidates   = htmlspecialchars_decode($result['intNoCandidates'], ENT_QUOTES);        
            $vchMessage = htmlspecialchars_decode($result['vchMessage'], ENT_QUOTES);
        }    
   
?>