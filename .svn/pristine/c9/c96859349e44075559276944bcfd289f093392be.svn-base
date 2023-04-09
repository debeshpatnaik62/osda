<?php



class clsInfocus extends Model {

    //Function to manage Infocus 
    
    public function manageInfocus($action,$arrConditions)
    { 
        try
        {

           $result = Model::callProc('USP_INFOCUS',$action,$arrConditions);
           return $result;
//echo $result;exit;
        }//
        catch(Exception $e)
        {
           echo 'Error:'.$e->getMessage();
           exit();
        }
    }

    //Function to Add addUpdate Infocus 
    public function addUpdateInfocus($Id) {

        $userId  = $_SESSION['adminConsole_userID'];
            $Id             = (isset($Id))?$Id:0;

        $txtName           = $_POST['txtName'];

        $blankName = Model::isBlank($_POST['txtName']);

        $lenName   = Model::chkLength('max', $txtName,60);

        $txtNameO           = $_POST['txtNameO'];

         $blankNameO = Model::isBlank($_POST['txtNameO']);

        $lenNameO          = Model::chkLength('max', $txtNameO,100);

         $vchTitle           = $_POST['vchTitle'];

        $blankTitle = Model::isBlank($_POST['vchTitle']);

        $lenTitle   = Model::chkLength('max', $vchTitle,60);

         $vchTitleO           = $_POST['vchTitleO'];

        $lenTitleO   = Model::chkLength('max', $vchTitleO,100);


        //$vchImage = $_FILES['vchImage']['name'];
         $blankvchImage = Model::isBlank($_FILES['vchImage']['name']);
        $vchImage = $_FILES['vchImage']['name'];

        $prevImage = $_POST['hdnImage'];
        $vchImageSize = $_FILES['vchImage']['size'];
        $vchImageTemp = $_FILES['vchImage']['tmp_name'];
        $ext = pathinfo($vchImage, PATHINFO_EXTENSION);
       $vchImage = ($vchImage != '') ? 'Infocus' . date("Ymd_His") . '.' . $ext : '';
        $allowMimeType=array('image/png','image/jpg','image/gif','image/jpeg');
        $errImageType=$this->check_file_mime( $vchImageTemp ,$allowMimeType);


      /* $txtDate              = ($_POST['txtDate']!='')?model::dbDateFormat($_POST['txtDate']):'0000-00-00';
        */

        $txtDescription            = htmlspecialchars($_POST['txtDescription'], ENT_QUOTES);
        $blankDescription = Model::isBlank($_POST['txtDescription']);
        $pregDescription        = preg_replace('/\s+/', '', $_POST['txtDescription']);
        $chkTags                = '<button,<form,<iframe,<input,<script,<select,<textarea,alert';
        $checkTagsStatus        = $this->isSpclTags($pregDescription);  
            
        $txtDescriptionO            = $_POST['txtDescriptionO'];
        $pregDescriptionO           = preg_replace('/\s+/', '', $_POST['txtDescriptionO']);
        $checkTagsStatusO           = $this->isSpclTags($pregDescriptionO);
        
        $outMsg = '';
        $flag = ($Id != 0) ? 1 : 0;
        $action = ($Id == 0) ? 'A' : 'U';
        $errFlag = 0;

        if ($vchImage == '' && $Id != 0)
            $vchImage = $prevImage;
//echo $prevImage."====".$vchImage;exit;

       if ($blankName > 0) {
            $errFlag = 1;
            $outMsg = "Name should not be blank";
        } else if($blankNameO>0){
             $errFlag = 1;
             $outMsg = "Name in Odia should not be blank";
        } else if ($blankTitle > 0) {
            $errFlag = 1;
            $outMsg = "Title should not be blank";
         
         }else if ($vchImage > 0) {
            $errFlag = 1;
            $outMsg = "Image should not be blank";
          }else if ($txtDescription > 0) {
            $errFlag = 1;
            $outMsg = "Description should not be blank";
        }else if ($txtDescriptionO > 0) {
            $errFlag = 1;
            $outMsg = "Description in Odia should not be blank";
        } else if ($checkTagsStatus > 0 || $checkTagsStatusO>0) {

                $outMsg                 = "HTML Special Tags Are Not Allowed";
                $errFlag                = 1;
                $flag                   = 1;
            }
       
      
          $arrConditions=array('intId'=>$Id,
                                            'name'=>$txtName,
                                            'nameO'=>$txtNameO,
                                            'title'=>$vchTitle,
                                            'titleO'=>$vchTitleO,
                                           'image'=>$vchImage,
                                            'desc'=>$txtDescription,
                                            'descO'=>$txtDescriptionO,
                                           'pubStatus'=>0,
                                            'userid'=>$userId);
                //print_r($arrConditions); exit;
          $arrCDConditions=array('intId'=>$Id,'name'=>$txtName);
///////////////
          $dupResult = $this->manageInfocus('CD',$arrCDConditions);
         // print_r( $dupResult);exit;
            
              if ($dupResult) {
                $numRows = $dupResult->fetch_array();
                $pCount = count($numRows);
                if ($pCount > 0) {
                    $outMsg = 'Infocus with this name already exists';
                    $errFlag = 1;
                    $flag   = 1;
                } else {
               $result         = $this->manageInfocus($action,$arrConditions);
                    if ($result) {
                        $outMsg = ($action == 'A') ? 'Infocus added successfully ' : 'Infocus updated successfully';
                        if ($vchImageTemp != '') {
                            
                            if (file_exists(APP_PATH."uploadDocuments/Infocus/" . $prevImage) && $prevImage != '' && $vchImage != '') {
                                unlink(APP_PATH."uploadDocuments/Infocus/" . $prevImage);
                            }                          
                          
                            $this->GetResizeImage($this,APP_PATH . 'uploadDocuments/Infocus/', 410, 0, $vchImage, $vchImageTemp);
                        }
                    }
                }
       
        
        $strName = ($errFlag == 1) ? htmlentities($txtName) : '';

        $strNameO = ($errFlag == 1) ? htmlentities($txtNameO) : '';
        $strTitle = ($errFlag == 1) ? htmlentities($vchTitle) : '';
         $strTitleO = ($errFlag == 1) ? htmlentities($vchTitleO) : '';

        $strImage = ($errFlag == 1) ? htmlentities($vchImage) : '';

         /* $strDate        = ($errFlag == 1) ? $txtDate : ''; */

        $strDescription = ($errFlag == 1) ? htmlentities($txtDescription) : '';
        $strDescriptionO = ($errFlag == 1) ? htmlentities($txtDescriptionO) : '';

        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag,'returnParams' => $arrConditions);
        return $arrResult;
    }
}
 //Function to Read Infocus 


    public function readInfocus($intId) {
          $arrConditions=array( 'Id'=>$intId);
        $result = $this->manageInfocus('R',$arrConditions);
        if ($result->num_rows > 0) {

            $row = $result->fetch_array();
            $strName = $row['vchName'];
            $strNameO = $row['vchNameO'];
            $strTitle = $row['vchTitle'];
            $strTitleO = $row['vchTitleO'];
          $strImage       =  htmlspecialchars_decode($row['vchImage'],ENT_QUOTES);   
          /* $strDate        = date ('d-m-Y',strtotime($row['dtmDate'])); */
            if($txtDate=='01-01-1970' || $txtDate=='' || strtotime($txtDate)<=0)
                $txtDate    =''; 
            $strDescription = $row['vchDescription'];
             $strDescriptionO = $row['vchDescriptionO'];
        }

        $arrResult = array('strName' => $strName,'strNameO' => $strNameO,'strTitle' => $strTitle,'strTitleO' => $strTitleO,'strImage' => $strImage,'strDescription' => $strDescription,'strDescriptionO'=>$strDescriptionO);
 
        return $arrResult;
    }
 // Function to Delete Infocus 

    public function deleteInfocus($action, $ids) {

        $ctr = 0;
        $userId = $_SESSION['adminConsole_userID'];
        $explIds = explode(',', $ids);
        $delRec = 0;
        foreach ($explIds as $indIds) {

             $arrConditions=array( 'Id'=>$explIds[$ctr]
                                          /*  'userid'=>$userId*/);
            $result1 = $this->manageInfocus('R', $arrConditions);
 //print_r( $result1);exit;
            $row = $result1->fetch_array();
            $strImage= $row['vchImage'];

            $result = $this->manageInfocus($action, $arrConditions);
      //  print_r( $result);exit;
                $row = $result->fetch_array();
                if ($row[0] == 0)
                    $delRec++;
                $ctr++;
               // print_r($row);exit;
            }

            if ($action == 'D' && $strImage != '') 
            {
                if (file_exists("uploadDocuments/Infocus/" . $strImage)) {
                    unlink("uploadDocuments/Infocus/" . $strImage);
                }
            }
        

        if ($action == 'D') {
            if ($delRec > 0)
                $outMsg .= 'Infocus(s) deleted successfully';
        }

        else if ($action == 'IN')
            $outMsg = 'Infocus(s) unpublished successfully';
        else if ($action == 'P')
            $outMsg = 'Infocus(s) published successfully';
        
        return $outMsg;
    }

}

?>