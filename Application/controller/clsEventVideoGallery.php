<?php
  /* * ****Class to manage Event Gallery ********************
	'By                     : Ashis kumar Patra
	'On                     : 16-04-2018       '
	' Procedure Used        : USP_EVENT_GALLERY       '
* ************************************************** */
   class clsEventGallery extends Model {
    // ======== Function to manage Event Gallery By :: Ashis kumar Patra On :: 16-04-2018
         public function manageEventGal($action,$instGalId,$distId,$captionE,$captionO,$image,$descE,$descO,$pubStatus,$arcStatus,$createdBy) {

         	  $instGalSql = "CALL USP_EVENT_GALLERY('$action',$instGalId,$distId,'$captionE','$captionO','$image','$descE','$descO',$pubStatus,$arcStatus,$createdBy,@OUT);";
 //echo $instGalSql;
                  $errAction   =  Model::isSpclChar($action);
                  $errDistid   =  Model::isSpclChar($distId);
                  $errCaptionE =  Model::isSpclChar($captionE);
                  $errDescE    =  Model::isSpclChar($descE);
                  
                  $errImg    =  Model::isSpclChar($image);
                    
                if($errAction > 0 || $errCaptionE > 0 || $errDescE > 0 || $errDistid>0  || $errImg>0)
                    header("Location:" . APP_URL . "error");
                else {
                       $instGalRes = Model::executeQry($instGalSql);
                         return $instGalRes;
                     }     
         } 

   //===== Function to add/update Institute Gallery By :: Arpita Rath On :: 28-03-2017
          public function addUpdateEventGal($instGalId) {
             $newSessionId           = session_id();
          
            $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
            if($newSessionId == $hdnPrevSessionId) {     
          	 $userId           = $_SESSION['adminConsole_userID'];
                 //echo $instGalId;exit;
          	 $instGalId        = ($instGalId != '') ? $instGalId : 0;

          	// $selDist          = $_POST['ddlDist'];
                  
                 $txtHidId         = $_POST['txtHidId']; 
                 $txtCaption       = $_POST['txtCaption'];
                 $txtCaptionO      = $_POST['txtCaptionO'];
                 $videoURL         = $_POST['videoURL'];
          
                 $fileErr           = 0; 
                 $blankfileErr      = 0; 
                 $captionErr        = 0; 
                 $captionLengthErr  = 0; 
                 $validUrlErr       = 0;
           
                $noOfCaptionid      = count($txtHidId);
                $sqlTagging         = '';
                $rx = '~
                      ^(?:https?://)?                           # Optional protocol
                       (?:www[.])?                              # Optional sub-domain
                       (?:youtube[.]com/watch[?]v=|youtu[.]be/) # Mandatory domain name (w/ query string in .com)
                       ([^&]{11})                               # Video id of 11 characters as capture group 1
                        ~x';

                //$has_match = preg_match($rx, $url, $matches);        
                for ($i = 0; $i < $noOfCaptionid; $i++) {
                    $matches = end(explode('/',$videoURL[$i]));
                    if(Model::isSpclChar($txtCaption[$i])>0)
                         $captionErr            = 1;
                    else if(Model::chkLength('max', $txtCaption[$i], 200)>0)
                         $captionLengthErr      = 1;
                    else if (!(filter_var($videoURL[$i], FILTER_VALIDATE_URL)))
                            $validUrlErr=1;
                    else if(!preg_match($rx, $videoURL[$i], $matches))  {
                            $validUrlErr=1;
                    }    
                       
                    $selDists=0;
                    $sqlTagging            .= '('.$txtHidId[$i].','.$selDists.',"'.trim($txtCaption[$i]).'","'.htmlspecialchars($txtCaptionO[$i], ENT_QUOTES, 'UTF-8').'","'.$videoURL[$i].'",'.$userId.'),';


                }
                $sqlTagging      =  rtrim($sqlTagging,',');

                $outMsg          = '';
                $flag            = ($instGalId != 0) ? 1 : 0;
                $action          = 'AU';
                
                $errFlag         =  0;
                 if ($validUrlErr>0) {
                    $errFlag  =  1;
                    $flag     =  1;
                    $outMsg   =  "Input a valid URL";
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
                  
//                else if($fileErr > 0)
//                  {
//                  	   $errFlag  =  1;
//                  	   $flag     =  1;
//                  	   $outMsg   = 'Invalid file types. Upload only jpg,jpeg,gif';
//                  } 
                
                if($errFlag == 0  && $userId>0){
                    
                       	 $result = $this->manageEventGal($action,$instGalId,0,'','','',$sqlTagging,'',0,0,$userId);
                          // echo "iii222444i";exit;          
                       	   if($result){
                       	   	 $outMsg = ($action == 'A') ? 'Event Videos added successfully' : 'Event Videos updated successfully';
//                                  
//                                  for ($j = 0; $j < $noOfCaptionid; $j++) {
//                
//                                        if(file_exists('temp/'.$hdnImageFile[$j])) {
//                                            rename('temp/'.$hdnImageFile[$j],'uploadDocuments/instGallery/'.$hdnImageFile[$j]);
//                                        }
//
//                                    }
                       	   	 
                           }      
                     } 
                 }  
                
                 else{
                        header("Location:".APP_URL."error");
                   } 
                    
                    $strCaption  = ($errFlag == 1) ? htmlentities($txtCaption) : '';
                    $strCaptionO  = ($errFlag == 1) ? htmlentities($txtCaptionO) : '';
                    //$strFileDocument =  ($errFlag == 1) ? $fileDocument : '';
                    //$strDescE     =  ($errFlag == 1) ? $txtDescE : '';
                    //$strDescO     =  ($errFlag == 1) ? $txtDescO : '';           

                    $arrResult = array('msg' => $outMsg, 'errFlag' => $errFlag,'strCaption' => $strCaption, 'strCaptionO' => $strCaptionO);
                    //, 'strFileDocument' => $strFileDocument, 'strDescE' => $strDescE, 'strDescO' => $strDescO);
                    return $arrResult;     
          } 

//============= Function to read Institute Gallery By :: Arpita Rath On :: 28-03-2017 =============//
           public function readEventGal($id) {

           	    $result = $this->manageEventGal('R',$id,0,0,'','','','','',0,0,0);
           	       if ($result->num_rows > 0) {
                           
           	       	     $row = mysqli_fetch_array($result);
           	       	     $intInstGalid   = $row['intEventGalId'];
           	       	     $intDist        = $row['intEventId'];
           	       	     $strCaptionE    = $row['vchCaptionE'];
           	       	     $strCaptionO    = $row['vchCaptionO'];
           	       	     $strFileDocument= $row['vchImage'];
           	       	     $strDescE       = $row['vchDescriptionE'];
           	       	     $strDescO       = $row['vchDescriptionO']; 
           	       }
           	     $arrResult = array('intEventGalid' => $intInstGalid, 'intEventId' => $intDist,  'strCaptionE' => $strCaptionE, 'strCaptionO' => $strCaptionO, 'strFileDocument' => $strFileDocument, 'strDescE' => $strDescE, 'strDescO' => $strDescO);
           	       return $arrResult;  
           }

//============ Function to delete Institute Gallery By :: Arpita Rath ======================== //
         public function deleteEventGal($action, $ids) {
            
            $newSessionId           = session_id();
            $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
            if($newSessionId == $hdnPrevSessionId) {    
                $ctr = 0;
                $userId = $_SESSION['adminConsole_userID'];
                $explIds = explode(',', $ids);
                $delRec = 0;
                    foreach ($explIds as $indIds) {
                        $result = $this->manageEventGal($action,$explIds[$ctr],0,0,'','','','',0,0,$userId);                  
                                $row = mysqli_fetch_array($result);
                                if ($row[0] == 0)
                                    $delRec++;
                                $ctr++;
                    }

	        if ($action == 'D') {
	            if ($delRec > 0)
	                $outMsg .= 'Event Video(s) deleted successfully';
	           
	        }
	        else if ($action == 'AC')
	            $outMsg = 'Event Video(s) activated successfully';
	        else if ($action == 'IN')
	            $outMsg = 'Event Video(s) unpublished successfully';
	        else if ($action == 'AR')
	            $outMsg = 'Event Video(s) archived successfully';
	        else if ($action == 'P')
	            $outMsg = 'Event Video(s) published successfully';

	        return $outMsg;
             }else{
                header("Location:".APP_URL."error");
            }   
         }  
   }
?>