<?php



class clsTestimonial extends Model {

    //Function to manage Testimonial 
    
    public function manageTestimonial($action,$arrConditions)
    { 
        try
        {

           $result = Model::callProc('USP_TESTIMONIAL',$action,$arrConditions);
           return $result;
//echo $result;exit;
        }//
        catch(Exception $e)
        {
           echo 'Error:'.$e->getMessage();
           exit();
        }
    }

    //Function to addUpdate Testimonial 
    public function addUpdateTestimonial($Id) {
        $newSessionId           = session_id();
        $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) { 
        $userId             = $_SESSION['adminConsole_userID'];
        $Id                 = (isset($Id))?$Id:0;

        $catId              = $_POST['selNewsType'];
        $txtName            = $_POST['txtName'];

        $blankName          = Model::isBlank($_POST['txtName']);
        $errName           = Model::isSpclChar($_POST['txtName']);

        $lenName            = Model::chkLength('max', $txtName,100);

        $txtNameO           = $_POST['txtNameO'];

        $blankNameO         = Model::isBlank($_POST['txtNameO']);
        $errNameO            = Model::isSpclChar($_POST['txtNameO']);
        $lenNameO           = Model::chkLength('max', $txtNameO,100);

        $txtDesignation     = $_POST['txtDesignation'];

        $blankTitle         = Model::isBlank($_POST['txtDesignation']);
        $errDesig            = Model::isSpclChar($_POST['txtDesignation']);
        $lenTitle           = Model::chkLength('max', $txtDesignation,100);

         $txtDesignationO   = $_POST['txtDesignationO'];
         $errDesigO           = Model::isSpclChar($_POST['txtDesignationO']);
        $lenTitleO          = Model::chkLength('max', $txtDesignationO,200);


        //$vchImage = $_FILES['vchImage']['name'];
         $blankvchImage     = Model::isBlank($_FILES['vchImage']['name']);
         $errImage           = Model::isSpclChar($_FILES['vchImage']['name']);
        $vchImage           = $_FILES['vchImage']['name'];

        $prevImage          = $_POST['hdnImage'];
        $vchImageSize       = $_FILES['vchImage']['size'];
        $vchImageTemp       = $_FILES['vchImage']['tmp_name'];
        $ext                = pathinfo($vchImage, PATHINFO_EXTENSION);
        $vchImage           = ($vchImage != '') ? 'Testimonial' . date("Ymd_His") . '.' . $ext : '';
        //$allowMimeType      =array('image/png','image/jpg','image/gif','image/jpeg');
        //$errImageType       =$this->check_file_mime($vchImageTemp ,$allowMimeType);

       $filePictureMimetype = ($vchImage != '')?mime_content_type($vchImageTemp):'';
       $allowedImg        = array('png' ,'jpg','jpeg','gif');
       $allowedImgMime    = array('image/jpeg','image/jpg', 'image/png','image/gif');




        $txtDescription     = htmlspecialchars($_POST['txtDescription'], ENT_QUOTES);
        $blankDescription   = Model::isBlank($_POST['txtDescription']);
        $pregDescription    = preg_replace('/\s+/', '', $_POST['txtDescription']);
        $chkTags            = '<button,<form,<iframe,<input,<script,<select,<textarea,alert';
        $checkTagsStatus    = $this->isSpclTags($pregDescription);  
            
        $txtDescriptionO    = $_POST['txtDescriptionO'];
        $pregDescriptionO   = preg_replace('/\s+/', '', $_POST['txtDescriptionO']);
        $checkTagsStatusO   = $this->isSpclTags($pregDescriptionO);
        
        $outMsg             = '';
        $flag               = ($Id != 0) ? 1 : 0;
        $action             = ($Id == 0) ? 'A' : 'U';
        $errFlag            = 0;

        if ($vchImage == '' && $Id != 0)
            $vchImage = $prevImage;

       if ($blankName > 0) {
            $errFlag = 1;
            $outMsg = "Name should not be blank";
        } else if($blankNameO>0){
             $errFlag = 1;
             $outMsg = "Name in Odia should not be blank";
        } else if ($blankTitle > 0) {
            $errFlag = 1;
            $outMsg = "Designation should not be blank";
         
         }else if ($errName > 0 || $errNameO>0 || $errDesig>0 || $errDesigO>0 || $errImage>0) {

                $outMsg                 = "Special Characters Are Not Allowed";
                $errFlag                = 1;
                $flag                   = 1;
            }
            else if($ext!='' && !in_array($ext,$allowedImg) )
               {
                   $errFlag   = 1;
                   $flag      = 1;
                   $outMsg    = "Not a valid file Upload (.jpg,jpeg,png,gif) file only";
               }
               else if($ext!='' && !in_array($filePictureMimetype,$allowedImgMime)) {
                   $errFlag   = 1;
                   $flag      = 1;
                   $outMsg    = "Not a valid file Upload (.jpg,jpeg,png,gif) file only";
               }
               else if ($checkTagsStatus > 0 || $checkTagsStatusO>0) {

                $outMsg                 = "HTML Special Tags Are Not Allowed";
                $errFlag                = 1;
                $flag                   = 1;
            }
       
      
          $arrConditions=array('intId'=>$Id,'catId'=>$catId,
                                'name'=>$txtName,
                                'nameO'=>$txtNameO,
                                'title'=>$txtDesignation,
                                'titleO'=>$txtDesignationO,
                                'image'=>$vchImage,
                                'desc'=>$txtDescription,
                                'descO'=>$txtDescriptionO,
                                'pubStatus'=>0,
                                'userid'=>$userId);
                //print_r($arrConditions); exit;
          $arrCDConditions=array('intId'=>$Id,'name'=>$txtName);

          $dupResult = $this->manageTestimonial('CD',$arrCDConditions);
         // print_r( $dupResult);exit;
            
              if ($dupResult) {
                $numRows = $dupResult->fetch_array();
                $pCount = count($numRows);
                if($errFlag==0)
                {
                if ($pCount > 0) {
                    $outMsg = 'Testimonial with this name already exists';
                    $errFlag = 1;
                    $flag   = 1;
                } else {
               $result         = $this->manageTestimonial($action,$arrConditions);
                    if ($result) {
                        $outMsg = ($action == 'A') ? 'Testimonial added successfully ' : 'Testimonial updated successfully';
                        if ($vchImageTemp != '') {
                            
                            if (file_exists(APP_PATH."uploadDocuments/Testimonial/" . $prevImage) && $prevImage != '' && $vchImage != '') {
                                unlink(APP_PATH."uploadDocuments/Testimonial/" . $prevImage);
                            }                          
                          
                            $this->GetResizeImage($this,APP_PATH . 'uploadDocuments/Testimonial/', 410, 0, $vchImage, $vchImageTemp);
                        }
                    }
                }
            }
            else
            {
                $errFlag = 1 ;
            }
       
        
        $strName = ($errFlag == 1) ? htmlentities($txtName) : '';

        $strNameO = ($errFlag == 1) ? htmlentities($txtNameO) : '';
        $strTitle = ($errFlag == 1) ? htmlentities($txtDesignation) : '';
        $strTitleO = ($errFlag == 1) ? htmlentities($txtDesignationO) : '';
        $strImage = ($errFlag == 1) ? htmlentities($vchImage) : '';
        $strDescription = ($errFlag == 1) ? htmlentities($txtDescription) : '';
        $strDescriptionO = ($errFlag == 1) ? htmlentities($txtDescriptionO) : '';
        $catId = ($errFlag == 1) ? htmlentities($catId) : '';

        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag,'returnParams' => $arrConditions,'catId'=>$catId);
        return $arrResult;
        }else{
                header("Location:" . APP_URL . "error");
           }
    }
}
 //Function to Read Testimonial 


    public function readTestimonial($intId) {
          $arrConditions=array( 'Id'=>$intId);
        $result = $this->manageTestimonial('R',$arrConditions);
        if ($result->num_rows > 0) {

            $row = $result->fetch_array();
            $strName = $row['vchName'];
            $catId   = $row['intCategoryId'];
            $strNameO = $row['vchNameO'];
            $strTitle = $row['vchDesignation'];
            $strTitleO = $row['vchDesignationO'];
            $strImage       =  htmlspecialchars_decode($row['vchImage'],ENT_QUOTES);
            $strDescription = $row['vchDescription'];
            $strDescriptionO = $row['vchDescriptionO'];
        }

        $arrResult = array('strName' => $strName,'strNameO' => $strNameO,'strTitle' => $strTitle,'strTitleO' => $strTitleO,'strImage' => $strImage,'strDescription' => $strDescription,'strDescriptionO'=>$strDescriptionO,'catId'=>$catId);
 
        return $arrResult;
    }
 // Function to Delete Testimonial 

    public function deleteTestimonial($action, $ids) {

        $ctr = 0;
        $userId = $_SESSION['adminConsole_userID'];
        $explIds = explode(',', $ids);
        $delRec = 0;
        foreach ($explIds as $indIds) {

             $arrConditions=array( 'Id'=>$explIds[$ctr]
                                        );
            $result1 = $this->manageTestimonial('R', $arrConditions);

            $row = $result1->fetch_array();
            $strImage= $row['vchImage'];

            $result = $this->manageTestimonial($action, $arrConditions);
                $row = $result->fetch_array();
                if ($row[0] == 0)
                    $delRec++;
                $ctr++;
               // print_r($row);exit;
            }

            if ($action == 'D' && $strImage != '') 
            {
                if (file_exists("uploadDocuments/Testimonial/" . $strImage)) {
                    unlink("uploadDocuments/Testimonial/" . $strImage);
                }
            }
        

        if ($action == 'D') {
            if ($delRec > 0)
                $outMsg .= 'Testimonial(s) deleted successfully';
        }

        else if ($action == 'IN')
            $outMsg = 'Testimonial(s) unpublished successfully';
        else if ($action == 'P')
            $outMsg = 'Testimonial(s) published successfully';
        
        return $outMsg;
    }

}

?>