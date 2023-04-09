<?php
  /* * ****Class to manage Institute Gallery ********************
	'By                     : Arpita Rath	'
	'On                     : 28-03-2017       '
	' Procedure Used        : USP_INST_GALLERY       '
* ************************************************** */
   class clsInstGallery extends Model {
    // ======== Function to manage Institute Gallery By :: Arpita Rath On :: 28-03-2017
         public function manageInstGal($action,$instGalId,$distId,$instId,$captionE,$captionO,$image,$descE,$descO,$pubStatus,$arcStatus,$createdBy) {

         	  $instGalSql = "CALL USP_INST_GALLERY('$action',$instGalId,$distId,$instId,'$captionE','$captionO','$image','$descE','$descO',$pubStatus,$arcStatus,$createdBy,@OUT);";
         		// echo $instGalSql;
                  $errAction   =  Model::isSpclChar($action);
                  $errDistid   =  Model::isSpclChar($distId);
                   $errInstid   =  Model::isSpclChar($instId);
                  $errCaptionE =  Model::isSpclChar($captionE);
                  $errDescE    =  Model::isSpclChar($descE);
                  
                  $errImg    =  Model::isSpclChar($image);
                    
                if($errAction > 0 || $errCaptionE > 0 || $errDescE > 0 || $errDistid>0 || $errInstid>0 || $errImg>0)
                    header("Location:" . APP_URL . "error");
                else {
                       $instGalRes = Model::executeQry($instGalSql);
                         return $instGalRes;
                     }     
         } 

   //===== Function to add/update Institute Gallery By :: Arpita Rath On :: 28-03-2017
          public function addUpdateInstGal($instGalId) {
             $newSessionId           = session_id();
            $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
            if($newSessionId == $hdnPrevSessionId) {     
          	 $userId           = $_SESSION['adminConsole_userID'];
          	 $instGalId        = ($instGalId != '') ? $instGalId : 0;

          	 $selDist          = $_POST['ddlDist'];
          	 $selInst          = $_POST['ddlInst'];
                  
                 $txtHidId         = $_POST['txtHidId']; 
                 $txtCaption       = $_POST['txtCaption'];
                 $txtCaptionO      = $_POST['txtCaptionO'];
                 $hdnImageFile     = $_POST['hdnImageFile'];
             
                 $fileErr           = 0; 
                 $blankfileErr      = 0; 
                 $captionErr        = 0; 
                 $captionLengthErr  = 0; 

                $noOfCaptionid      = count($txtHidId);
                $sqlTagging         = '';
                for ($i = 0; $i < $noOfCaptionid; $i++) {
                        
                    $ext                        = pathinfo($hdnImageFile[$i], PATHINFO_EXTENSION);
                    if($hdnImageFile[$i]=='') 
                         $blankfileErr          = 1;
                    else if($ext!='jpg' && $ext!='jpeg' && $ext!='JPG' && $ext!='JPEG' && $ext!='gif' && $hdnImageFile[$i]!='') 
                         $fileErr               = 1;
                    else if(Model::isSpclChar($txtCaption[$i])>0)
                         $captionErr            = 1;
                    else if(Model::chkLength('max', $txtCaption[$i], 100)>0)
                         $captionLengthErr      = 1;

                    $sqlTagging            .= '('.$txtHidId[$i].','.$selDist.','.$selInst.',"'.trim($txtCaption[$i]).'","'.htmlspecialchars($txtCaptionO[$i], ENT_QUOTES, 'UTF-8').'","'.$hdnImageFile[$i].'",'.$userId.'),';


                }
                $sqlTagging      =  rtrim($sqlTagging,',');

                $outMsg          = '';
                $flag            = ($instGalId != 0) ? 1 : 0;
                $action          = 'AU';
                $errFlag         =  0;

                 if(($selDist == 0) || ($selInst == 0) || $blankfileErr>0) // || ($blankCaptionE > 0)
                  {
                  	   $errFlag  =  1;
                  	   $flag     =  1;
                  	   $outMsg   =  "Mandatory field should not be left blank";
                  }           
                 else if($captionErr > 0)
                  {
                  	   $errFlag  =  1;
                  	   $flag     =  1;
                  	   $outMsg   =  "Special characters are not allowed";
                  }  
                else if($captionLengthErr > 0)
                  {
                  	   $errFlag  =  1;
                  	   $flag     =  1;
                  	   $outMsg   =  "Length should not exceeded maxlength";
                  }  
                else if($fileErr > 0)
                  {
                  	   $errFlag  =  1;
                  	   $flag     =  1;
                  	   $outMsg   = 'Invalid file types. Upload only jpg,jpeg,gif';
                  } 
                
                if($errFlag == 0  && $userId>0){

                       	 $result = $this->manageInstGal($action,$instGalId,$selDist,$selInst,'','','',$sqlTagging,$txtDescO,0,0,$userId);
                               
                       	   if($result){
                       	   	  $outMsg = ($action == 'A') ? 'Institute Images added successfully' : 'Institute Images updated successfully';
                                  
                                  for ($j = 0; $j < $noOfCaptionid; $j++) {
                
                                        if(file_exists('temp/'.$hdnImageFile[$j])) {
                                            rename('temp/'.$hdnImageFile[$j],'uploadDocuments/instGallery/'.$hdnImageFile[$j]);
                                        }

                                    }
                       	   	 
                           }      
                     } 
                 }else{
                        header("Location:".APP_URL."error");
                   }      
                    $intDist      = ($errFlag == 1) ? $selDist     : 0;
                    $intInst      = ($errFlag == 1) ? $selInst     : 0;
                    $strCaptionE  = ($errFlag == 1) ? htmlentities($txtCaptionE) : '';
                    $strCaptionO  = ($errFlag == 1) ? htmlentities($txtCaptionO) : '';
                    $strFileDocument =  ($errFlag == 1) ? htmlentities($fileDocument) : '';
                    $strDescE     =  ($errFlag == 1) ? htmlentities($txtDescE) : '';
                    $strDescO     =  ($errFlag == 1) ? htmlentities($txtDescO) : '';           

                    $arrResult = array('msg' => $outMsg, 'errFlag' => $errFlag, 'intDist' => $intDist, 'intInst' => $intInst, 'strCaptionE' => $strCaptionE, 'strCaptionO' => $strCaptionO, 'strFileDocument' => $strFileDocument, 'strDescE' => $strDescE, 'strDescO' => $strDescO);
                    return $arrResult;     
          } 

//============= Function to read Institute Gallery By :: Arpita Rath On :: 28-03-2017 =============//
           public function readInstGal($id) {

           	    $result = $this->manageInstGal('R',$id,0,0,'','','','','',0,0,0);
           	       if ($result->num_rows > 0) {

           	       	     $row = mysqli_fetch_array($result);
           	       	     $intInstGalid   = $row['intInstGalId'];
           	       	     $intDist        = $row['intDistId'];
           	       	     $intInst        = $row['tinInstId'];
           	       	     $strCaptionE    = $row['vchCaptionE'];
           	       	     $strCaptionO    = $row['vchCaptionO'];
           	       	     $strFileDocument= $row['vchImage'];
           	       	     $strDescE       = $row['vchDescriptionE'];
           	       	     $strDescO       = $row['vchDescriptionO']; 
           	       }
           	     $arrResult = array('intInstGalid' => $intInstGalid, 'intDist' => $intDist, 'intInst' => $intInst, 'strCaptionE' => $strCaptionE, 'strCaptionO' => $strCaptionO, 'strFileDocument' => $strFileDocument, 'strDescE' => $strDescE, 'strDescO' => $strDescO);
           	       return $arrResult;  
           }

//============ Function to delete Institute Gallery By :: Arpita Rath ======================== //
         public function deleteInstGal($action, $ids) {
            $newSessionId           = session_id();
            $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
            if($newSessionId == $hdnPrevSessionId) {    
                $ctr = 0;
                $userId = $_SESSION['adminConsole_userID'];
                $explIds = explode(',', $ids);
                $delRec = 0;
                    foreach ($explIds as $indIds) {
                        $result = $this->manageInstGal($action,$explIds[$ctr],0,0,'','','','','',0,0,$userId);                  
                                $row = mysqli_fetch_array($result);
                                if ($row[0] == 0)
                                    $delRec++;
                                $ctr++;
                    }

	        if ($action == 'D') {
	            if ($delRec > 0)
	                $outMsg .= 'Institute Image(s) deleted successfully';
	           
	        }
	        else if ($action == 'AC')
	            $outMsg = 'Institute Image(s) activated successfully';
	        else if ($action == 'IN')
	            $outMsg = 'Institute Image(s) unpublished successfully';
	        else if ($action == 'AR')
	            $outMsg = 'Institute Image(s) archived successfully';
	        else if ($action == 'P')
	            $outMsg = 'Institute Image(s) published successfully';

	        return $outMsg;
             }else{
                header("Location:".APP_URL."error");
            }   
         }  
   }
?>