<?php

/* * ****Class to manage VIsion/Philosophy ********************
    'By                     : Ashis kumar Patra'
    'On                     : 14-Feb-2019'
    ' Procedure Used        : USP_PHILOSOPHY       '
    * ************************************************** */

class clsPhilosophy extends Model {

    //Function to manage Philosophy 
    
    public function managePhilosophy($action,$arrConditions)
    { 
        try
        {

           $result = Model::callProc('USP_PHILOSOPHY',$action,$arrConditions);
           return $result;
//echo $result;exit;
        }//
        catch(Exception $e)
        {
           echo 'Error:'.$e->getMessage();
           exit();
        }
    }

    //Function to Add addUpdate Philosophy 
    public function addUpdatePhilosophy($philosophyId) {

        $userId  = $_SESSION['adminConsole_userID'];
            $philosophyId             = (isset($philosophyId))?$philosophyId:0;

        $vchTitle           = $_POST['vchTitle'];

        $blankTitle = Model::isBlank($_POST['vchTitle']);

        $lenTitle   = Model::chkLength('max', $vchTitle,60);

         $vchTitleO           = $_POST['vchTitleO'];

        $lenTitleO   = Model::chkLength('max', $vchTitleO,100);

        $vchTagline           = $_POST['vchTagline'];

         $blankTagline = Model::isBlank($_POST['vchTagline']);

        $lenTagline          = Model::chkLength('max', $vchTagline,100);

        $vchTaglineO           = $_POST['vchTaglineO'];
        $lenTaglineO          = Model::chkLength('max', $vchTaglineO,200);


        //$vchImage = $_FILES['vchImage']['name'];
         $blankvchImage = Model::isBlank($_FILES['vchImage']['name']);
        $vchImage = $_FILES['vchImage']['name'];

        $prevImage = $_POST['hdnImage'];
        $vchImageSize = $_FILES['vchImage']['size'];
        $vchImageTemp = $_FILES['vchImage']['tmp_name'];
        $ext = pathinfo($vchImage, PATHINFO_EXTENSION);


        
       $vchImage = ($vchImage != '') ? 'Philosophy' . date("Ymd_His") . '.' . $ext : '';

        $allowMimeType=array('image/png','image/jpg','image/gif','image/jpeg');
        $errImageType=$this->check_file_mime( $vchImageTemp ,$allowMimeType);




       $vchDescription            = $_POST['vchDescription'];
        $vchDescription   = htmlspecialchars(addslashes($_POST['vchDescription']), ENT_QUOTES);
        $blankDescription = Model::isBlank($_POST['vchDescription']);
        $pregDescription        = preg_replace('/\s+/', '', $_POST['vchDescription']);
        //$chkTags                = '<button,<form,<iframe,<input,<script,<select,<textarea,alert';
        $checkTagsStatus        = $this->isSpclTags($pregDescription); 


         $vchDescriptionO            = $_POST['vchDescriptionO'];
        $vchDescriptionO   = htmlspecialchars(addslashes($_POST['vchDescriptionO']), ENT_QUOTES);
         $blankDescriptionO = Model::isBlank($_POST['vchDescriptionO']);
        $pregDescription        = preg_replace('/\s+/', '', $_POST['vchDescriptionO']);
        $checkTagsStatusO        = $this->isSpclTags($pregDescriptionO);
        $outMsg = '';
        $flag = ($philosophyId != 0) ? 1 : 0;
        $action = ($philosophyId == 0) ? 'A' : 'U';
        $errFlag = 0;

        if ($vchImage == '' && $philosophyId != 0)
            $vchImage = $prevImage;
//echo $prevImage."====".$vchImage;exit;

       if ($blankTitle > 0) {
            $errFlag = 1;
            $outMsg = "Title should not be blank";
        } else if($blankTagline>0){
             $errFlag = 1;
             $outMsg = "Tagline should not be blank";
         }else if ($vchImage > 0) {
            $errFlag = 1;
            $outMsg = "Image should not be blank";
        }else if ($vchDescription > 0) {
            $errFlag = 1;
            $outMsg = "Description should not be blank";
        } else if ($checkTagsStatus > 0 || $checkTagsStatusO>0) {

            $outMsg                 = "HTML Special Tags Are Not Allowed";
            $errFlag                = 1;
        }
       
      
          $arrConditions=array('intPhilosophyId'=>$philosophyId,
                                            'title'=>$vchTitle,
                                            'titleO'=>$vchTitleO,
                                            'tagline'=>$vchTagline,
                                            'taglineO'=>$vchTaglineO,
                                           'image'=>$vchImage,
                                            'desc'=>$vchDescription,
                                            'descO'=>$vchDescriptionO,
                                           'pubStatus'=>0,
                                            'userid'=>$userId);
                //print_r($arrConditions); exit;
          $arrCDConditions=array('intId'=>$philosophyId,'title'=>$vchTitle);
///////////////
          $dupResult = $this->managePhilosophy('CD',$arrCDConditions);
         // print_r( $dupResult);exit;
            
              if ($dupResult) {
                $numRows = $dupResult->fetch_array();
                $pCount = count($numRows);
                if ($pCount > 0) {
                    $outMsg = 'Philosophy with this title already exists';
                    $errFlag = 1;
                    $flag   = 1;
                } else {
////////////

               $result         = $this->managePhilosophy($action,$arrConditions);
                    if ($result) {
                        $outMsg = ($action == 'A') ? 'Philosophy added successfully ' : 'Philosophy updated successfully';
                        if ($vchImageTemp != '') {
                            
                            if (file_exists(APP_PATH."uploadDocuments/Philosophy/" . $prevImage) && $prevImage != '' && $vchImage != '') {
                                unlink(APP_PATH."uploadDocuments/Philosophy/" . $prevImage);
                            }                          
                          
                            $this->GetResizeImage($this,APP_PATH . 'uploadDocuments/Philosophy/', 1100, 0, $vchImage, $vchImageTemp);
                        }
                    }
                
                 }
        
        $strTitle = ($errFlag == 1) ? htmlentities($vchTitle) : '';
         $strTitleO = ($errFlag == 1) ? htmlentities($vchTitleO) : '';
        $strTagline = ($errFlag == 1) ? htmlentities($vchTagline) : '';
        $strTaglineO = ($errFlag == 1) ? htmlentities($vchTaglineO) : '';
        $strImage = ($errFlag == 1) ? htmlentities($vchImage) : '';
        $strDescription = ($errFlag == 1) ? htmlentities($vchDescription) : '';
        $strDescriptionO = ($errFlag == 1) ? htmlentities($vchDescriptionO) : '';

        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag,'returnParams' => $arrConditions);
        return $arrResult;
       
    }
}
    //Function to Read Philosophy 

    public function readPhilosophy($intPhilosophyId) {
          $arrConditions=array( 'Id'=>$intPhilosophyId);
        $result = $this->managePhilosophy('R',$arrConditions);
        if ($result->num_rows > 0) {

            $row = $result->fetch_array();
            $strTitle = $row['vchTitle'];
            $strTitleO = $row['vchTitleO'];
            $strTagline = $row['vchTagline'];
            $strTaglineO = $row['vchTaglineO'];
          $strImage       =  $row['vchImage'];   

            //$strImage = $row['vchImage'];
            $strDescription = htmlspecialchars_decode(stripslashes($row['vchDescription']),ENT_QUOTES);
             $strDescriptionO = $row['vchDescriptionO'];
        }

        $arrResult = array('strTitle' => $strTitle,'strTitleO' => $strTitleO,'strTagline' => $strTagline,'strTaglineO' => $strTaglineO,'strImage' => $strImage, 'strDescription' => $strDescription,'strDescriptionO'=>$strDescriptionO);
 
        return $arrResult;
    }


    // Function to Delete Philosophy 

    public function deletePhilosophy($action, $ids) {

        $ctr = 0;
        $userId = $_SESSION['adminConsole_userID'];
        $explIds = explode(',', $ids);
        $delRec = 0;
        foreach ($explIds as $indIds) {

             $arrConditions=array( 'Id'=>$explIds[$ctr]
                                          /*  'userid'=>$userId*/);
            $result1 = $this->managePhilosophy('R', $arrConditions);
 //print_r( $result1);exit;
            $row = $result1->fetch_array();
            $strImage= $row['vchImage'];

            $result = $this->managePhilosophy($action, $arrConditions);
      //  print_r( $result);exit;
                $row = $result->fetch_array();
                if ($row[0] == 0)
                    $delRec++;
                $ctr++;
            }

            if ($action == 'D' && $strImage != '') 
            {
                if (file_exists("uploadDocuments/Philosophy/" . $strImage)) {
                    unlink("uploadDocuments/Philosophy/" . $strImage);
                }
            }
        

        if ($action == 'D') {
            if ($delRec > 0)
                $outMsg .= 'Philosophy(s) deleted successfully';
        }

        else if ($action == 'IN')
            $outMsg = 'Philosophy(s) unpublished successfully';
        else if ($action == 'P')
            $outMsg = 'Philosophy(s) published successfully';
        
        return $outMsg;
    }

}

?>



























