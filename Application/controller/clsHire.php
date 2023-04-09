<?php



class clsHire extends Model {

    
    
    public function manageHire($action,$arrConditions)
    { 
        try
        {

           $result = Model::callProc('USP_HIRE',$action,$arrConditions);
           return $result;
//echo $result;exit;
        }//
        catch(Exception $e)
        {
           echo 'Error:'.$e->getMessage();
           exit();
        }
    }

    public function addUpdateHire($Id) {

        $userId  = $_SESSION['adminConsole_userID'];
        $Id             = (isset($Id))?$Id:0;

       // $txtName           = $_POST['txtName'];
         $txtName     =  htmlspecialchars($_POST['txtName'], ENT_QUOTES);
        $blankName    = Model::isBlank($_POST['txtName']);
         $lenName     = Model::chkLength('max', $txtName,60);
        


       // $txtCompanyName           = $_POST['txtCompanyName'];
         $txtCompanyName     =  htmlspecialchars($_POST['txtCompanyName'], ENT_QUOTES);
        $blankCompanyName    =  Model::isBlank($_POST['txtCompanyName']);
        $lenCompanyName      =  Model::chkLength('max', $txtCompanyName,100);
       



        $selSkills     =  $_POST['selSkills'];
        $txtSkills     =  (count($selSkills)>0)?implode('::',$selSkills):'';
        
     //  $selSkills      = str_replace('::',',',$selSkills);
            

        $blankSkills   = (count($selSkills)>0)?0:1;
         


       $chkQualification    = $_POST['chkQualification'];
       $txtQualification    =  (count($chkQualification)>0)?implode('::',$chkQualification):'';
       $blankQuali          = (count($chkQualification)>0)?0:1;
         
       
      
        $rdoNoCandidates            = $_POST['optCandidate'];
        $blankNoCandidates = Model::isBlank( $rdoNoCandidates );
 
         $txtMessage           = $_POST['txtMessage'];
         $blankMessage         = Model::isBlank($_POST['txtMessage']);
         $lenMessage           = Model::chkLength('max', $txtMessage ,500);


        $outMsg = '';
        $flag = ($Id != 0) ? 1 : 0;
        $action = ($Id == 0) ? 'A' : 'U';
        $errFlag = 0;


       if ($blankName > 0) {
            $errFlag = 1;
            $outMsg = "Name should not be blank";
        } else if($blankCompanyName>0){
             $errFlag = 1;
             $outMsg = "CompanyName should not be blank";
        } else if($blankSkills>0){
           $errFlag = 1;
             $outMsg = "Please Choose your Skills";
         /*} else if ($blankQualification > 0) {
            $errFlag = 1;
            $outMsg = "Qualification should not be blank";*/
        } else if ($blankNoCandidates >0){

           $errFlag = 1;
             $outMsg = "Please choose Number of Candidates";

       } else if ($blankMessage >0){

           $errFlag = 1;
             $outMsg = "Message should not be blank";

        } else if ($checkTagsStatus > 0 || $checkTagsStatusO>0) {

                $outMsg                 = "HTML Special Tags Are Not Allowed";
                $errFlag                = 1;
                $flag                   = 1;
            }
       
      
          $arrConditions=array('intId'=>$Id,
                                            'name'=>$txtName,
                                            'companyname'=>$txtCompanyName,
                                            'skills'=>$txtSkills,
                                            'qualification'=>$txtQualification,
                                            'nocandidates'=> $rdoNoCandidates,
                                            'message'=>$txtMessage,
                                            'pubStatus'=>0,
                                            'userid'=>$userId);
                //print_r($arrConditions); exit;
               $result         = $this->manageHire($action,$arrConditions);
                    if ($result) {
                        $outMsg = ($action == 'A') ? 'Application added successfully ' : 'Application updated successfully';
                    }
                
       
        
        $strName = ($errFlag == 1) ? $txtName : '';

        $strCompanyName = ($errFlag == 1) ? $txtCompanyName : '';

        $strSkills = ($errFlag == 1) ? $selSkills : '';
        $strQualification = ($errFlag == 1) ? $chkQualification : '';
        $strNoCandidates = ($errFlag == 1) ? $rdoNoCandidates : '';
        $strMessage = ($errFlag == 1) ? $txtMessage : '';

        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag,'returnParams' => $arrConditions);
        return $arrResult;
    }

    //Function to Read Philosophy 

    public function readHire($intId) {
          $arrConditions=array( 'Id'=>$intId);
        $result = $this->manageHire('R',$arrConditions);
      
        if ($result->num_rows > 0) {

            $row = $result->fetch_array();
            //$strName = $row['vchName'];
            $strName           =  htmlspecialchars_decode($row['vchName'],ENT_QUOTES); 
            $strCompanyName    =  htmlspecialchars_decode($row['vchCompanyName'],ENT_QUOTES);   
            //$strCompanyName = $row['strCompanyName'];
            $strSkills         =$row['vchSkills'];
            $strQualification  = $row['vchQualification'];
             $strNoCandidates  = $row['intNoCandidates'];
             $strMessage       = $row['vchMessage'];
        }

        $arrResult = array('strName' => $strName,'strCompanyName' => $strCompanyName,'strSkills' => $strSkills, 'strQualification' => $strQualification,'strNoCandidates'=>$strNoCandidates,'strMessage'=>$strMessage);
 
        return $arrResult;
    }


    // Function to Delete Philosophy 

    public function deleteHire($action, $ids) {

        $ctr = 0;
        $userId = $_SESSION['adminConsole_userID'];
        $explIds = explode(',', $ids);
        $delRec = 0;
        foreach ($explIds as $indIds) {

             $arrConditions=array( 'Id'=>$explIds[$ctr]
                                          /*  'userid'=>$userId*/);
          /*  $result1 = $this->manageHire('R', $arrConditions);
 
            $row = $result1->fetch_array();
          */

            $result = $this->manageHire($action, $arrConditions);
       //  print_r( $result);exit;
                $row = $result->fetch_array();
                if ($row[0] == 0)
                    $delRec++;
                $ctr++;
            }

            

        if ($action == 'D') {
            if ($delRec > 0)
                $outMsg .= 'Application(s) deleted successfully';
        }

        else if ($action == 'IN')
            $outMsg = 'Application(s) unpublished successfully';
        else if ($action == 'P')
            $outMsg = 'Application(s) published successfully';
        
        return $outMsg;
    }

}

?>



























