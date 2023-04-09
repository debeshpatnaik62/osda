<?php
/* * ****Class to manage Tender ********************
'By                     : Rahul Kumar Saw'
'On                     : 14-OCT-2019        '
' Procedure Used        : USP_TENDER_DETAILS       '
* ************************************************** */
//ob_clean();
class clsTender extends Model { 

// Function To Manage Tender By:: Rahul Kumar Saw:: On:: 14-OCT-2019
    public function manageTender($action,$tenderId,$tenderType,$tenderNo,$title,$title_O,$headline,$headline_O,$openingDate,$closingDate,$description,$description_O,$publishStatus,$archiveStatus,$approval,$createdBy,$publishDt,$announceDt,$purchaseDt,$query,$queryDetails,$attr1,$attr2,$attr3,$attr4) { 
       
        $tenderId         = htmlspecialchars(addslashes($tenderId),ENT_QUOTES);  

        $tenderSql        = "CALL USP_TENDER_DETAILS('$action',$tenderId,$tenderType,'$tenderNo','$title','$title_O','$headline','$headline_O','$openingDate','$closingDate','$description','$description_O',$publishStatus,$archiveStatus,$approval,$createdBy,'$publishDt','$announceDt','$purchaseDt','$query','$queryDetails',$attr1,$attr2,'$attr3','$attr4',@out);";
 //echo  $tenderSql ;
        
        $errAction          = Model::isSpclChar($action);
        $errTenderId        = Model::isSpclChar($tenderId);
        $errTendorNo       	= Model::isSpclChar($tenderNo);
        $errHeadLine        = Model::isSpclChar($title);
        $errTenderTyp       = Model::isSpclChar($tenderType);  

        if ($errAction>0 || $errTendorNo>0 || $errHeadLine>0 || $errTenderId>0 || $errTenderTyp>0)
        {    
            echo '<script>window.location.href="'.APPURL.'error";</script>';
        }    
        else 
        {
            $tenderResult = Model::executeQry($tenderSql);
               return $tenderResult;
        }
    }

// Function To Add Upadate Tender By:: Rahul Kumar Saw:: On:: 14-OCT-2019
    public function addUpdateTender($tenderId) 
    { 
            $tenderId           = (isset($tenderId))?$tenderId:0; 

            $intTenderType      = $_POST['intTenderType'];
            $txtTenderNo		= htmlspecialchars($_POST['txtTenderNo'],ENT_QUOTES); 
            $errTenderNo        = Model::isSpclChar($txtTenderNo);      
            $txtTenderTitle         = htmlspecialchars($_POST['txtTenderTitle'], ENT_QUOTES);
            $blankTenderTitle       = Model::isBlank($txtTenderTitle);
            $errTenderTitle         = Model::isSpclChar($txtTenderTitle);
            $lenTenderTitle         = Model::chkLength('max', $txtTenderTitle, 500);


            $txtTenderTitle_O       = htmlspecialchars($_POST['txtTenderTitle_O'], ENT_QUOTES);
            $errTenderTitle_O       = Model::isSpclChar($txtTenderTitle_O);
            $lenTenderTitle_O       = Model::chkLength('max', $txtTenderTitle_O, 500);

            $radShowTicker      = $_POST['radShowTicker'];

            $txtOpenDate		= $_POST['txtOpeningDate']; 
            $txtCloseDate		= $_POST['txtClosingDate'];
            $txtOpenTime		= ($_POST['txtOpeningTime']!='')?htmlspecialchars($_POST['txtOpeningTime'],ENT_QUOTES):htmlspecialchars($_POST['hdnOpeningTime'],ENT_QUOTES);
            $txtCloseTime		= htmlspecialchars($_POST['txtClosingTime'],ENT_QUOTES);        
            $openingDateTime	=  Model::dbDateFormat($txtOpenDate).' '.date("H:i:s",strtotime($txtOpenTime));
            $closingDateTime	=  Model::dbDateFormat($txtCloseDate).' '.date("H:i:s",strtotime($txtCloseTime));        
                    
            $txtDescription		= htmlspecialchars($_POST['txtDetails'],ENT_QUOTES); 
            $txtDescriptionH	= htmlspecialchars($_POST['txtDetailsH'],ENT_QUOTES);        
            
            
            $blankDescription  = Model::isBlank($txtDescription);
            $errDescription    = Model::isSpclChar($txtDescription);     
            $errDescriptionH   = Model::isSpclChar($txtDescriptionH); 

            $fileDoc                = $_FILES['fileDoc']['name'];                   
            
            $docFile                = count($fileDoc); 
            $query                  = '';
            $cntr                   = 1;
            $docTypeId              = 1;
               
            
               for ($i = 0; $i < $docFile; $i++) {
                         
                         $prevFile      = $_POST['hdnDocFile'][$i];                         
                         $ext           = pathinfo($_FILES['fileDoc']['name'][$i], PATHINFO_EXTENSION);
                        
                         if($ext!='pdf' && $ext!='doc' && $ext!='docx' && $ext!='rar' && $_FILES['fileDoc']['name'][$i]!='') 
                         $fileErr                = 1;                       
                         $uploadfile             = $_FILES['fileDoc']['name'][$i];
                         $fileTemp               = $_FILES['fileDoc']['tmp_name'][$i];

                          if($uploadfile=='' && $tenderId!='')
                             $uploadfile=$prevFile; 

                         if($_FILES['fileDoc']['name'][$i]!='')
                        {
                                if(file_exists("uploadDocuments/tender/".$prevFile) && $prevFile!='')
                                {
                                        unlink("uploadDocuments/tender/".$prevFile);
                                }
                                move_uploaded_file($fileTemp,"uploadDocuments/tender/".$uploadfile);
                        }
                       
                        $query  .='(@TENDER_ID,'.$docTypeId .',"'.$uploadfile.'"),';                  
                       $cntr++;                    
                    }
                    $query  = substr($query,0,-1); 

            $outMsg 				= '';
            $flag 					= ($tenderId != 0) ? 1 : 0;
            $action 				= ($tenderId == 0) ? 'A' : 'U';
            $errFlag            	= 0 ;
            
        if($action=='A')
            {
            $intSlNo       = ($this->getMaxVal('intSlNo','t_tender_details','BIT_DELETED_FLAG')=='')?1:$this->getMaxVal('intSlNo','t_tender_details','BIT_DELETED_FLAG');

            } else {
            $intSlNo       = $_POST['hdnSlNo'];
            }
        if( ($blankTenderTitle >0))
            {
    			$errFlag		= 1;
    			$flag           = 1;
    			$outMsg			= "Mandatory Fields should not be blank";
            }
            else if(($errTenderNo>0)|| ($errTenderTitle >0)|| ($errDescription >0) ||($errDescriptionH >0))
            {
    			$errFlag		= 1;
    			$flag           = 1;
    			$outMsg			= "Special Characters are not allowed";
            }   
           else if($lenTenderTitle>0 )
           {
               $errFlag        = 1;
               $flag           = 1;
               $outMsg         = "Length should not exceeded maxlength";
           }              

            //$dupResult = $this->manageTender('CD',$tenderId,'','',DEFAULTDATE,DEFAULTDATE,'','','','','','',0,$radPortalType,0,$ddlPortalDepartment,0,'','','','','','',$chkOgp,$txtTenderTitle,0,0,DEFAULTDATE,DEFAULTDATE,'','','','','','','','');

            if($errFlag==0)
            {
             $result = $this->manageTender($action,$tenderId,$intTenderType,$txtTenderNo,$txtTenderTitle,$txtTenderTitle_O,'','',$openingDateTime,$closingDateTime,$txtDescription,$txtDescriptionH,1,0,$radShowTicker,USER_ID,BLANK_DATE,BLANK_DATE,BLANK_DATE,$query,'',$intSlNo,0,'','');  

                        if ($result) {
                            $outMsg = ($action == 'A') ? 'Tender details added successfully ' : 'Tender details updated successfully';                     
                       
                                         
                        /*if($_FILES['fileDoc']['name']!='')
                        {
                                if(file_exists("uploadDocuments/tender/".$prevFile) && $prevFile!='')
                                {
                                        unlink("uploadDocuments/tender/".$prevFile);
                                }
                                move_uploaded_file($fileTemp,"uploadDocuments/tender/".$fileDoc[$i]);
                        } */
                     }  
            }          
		
		$strTenderNo        = ($errFlag == 1) ? $txtTenderNo      : '';
		$strOpeningDate     = ($errFlag == 1) ? $txtOpenDate      : ''; 
		$strClosingDate     = ($errFlag == 1) ? $txtCloseDate     : ''; 
		$strOpeningTime     = ($errFlag == 1) ? $txtOpenTime      : ''; 
		$strClosingTime     = ($errFlag == 1) ? $txtCloseTime     : ''; 
		$strDescription     = ($errFlag == 1) ? $txtDescription   : '';
		$strDescriptionH    = ($errFlag == 1) ? $txtDescriptionH  : '';
        $strTenderTitle     = ($errFlag == 1) ? $txtTenderTitle   : '';
        $strTenderTitle_O   = ($errFlag == 1) ? $txtTenderTitle_O : '';
        $strTenderType      = ($errFlag == 1) ? $intTenderType    : '0';
        $strfileDoc         = ($errFlag == 1) ? $fileDoc          : ''; 
        $radShowTicker      = ($errFlag == 1) ? $radShowTicker    : '0'; 

        
        $arrResult          = array('msg' => $outMsg, 'flag' => $flag,'strTenderNo' => $strTenderNo,'strOpeningDate' => $strOpeningDate,'strClosingDate' => $strClosingDate, 'strOpeningTime' => $strOpeningTime, 'strClosingTime' => $strClosingTime,  'strDescription' => $strDescription,'strDescriptionH' => $strDescriptionH,'strTenderTitle' => $strTenderTitle, 'strTenderTitle_O' => $strTenderTitle_O,'strfileDoc' => $strfileDoc,'radShowTicker'=>$radShowTicker);
                  return $arrResult;
    }

    
// Function To read Tender  By:: Rahul Kumar Saw:: On:: 14-OCT-2019  
    public function readTender($id) {

        $result = $this->manageTender('R',$id,0,'','','','','',BLANK_DATE,BLANK_DATE,'','',1,0,0,0,BLANK_DATE,BLANK_DATE,BLANK_DATE,'','',0,0,'','');

        if ($result->num_rows> 0) 
        {
            $row                = $result->fetch_array();    
            $intTenderId        = $row['INT_TENDER_ID'];
            $strTenderType      = $row['INT_TENDER_TYPE'];        
            $strTenderNo		= htmlspecialchars_decode($row['VCH_TENDER_NUMBER'],ENT_QUOTES);
            $strTenderTitle     = htmlspecialchars_decode($row['VCH_TENDER_TITLE'], ENT_QUOTES);
            $strTenderTitle_O   = htmlspecialchars_decode($row['VCH_TENDER_TITLE_O'], ENT_QUOTES);
            $strHeadLine		= htmlspecialchars_decode($row['VCH_HEAD_LINE_E'],ENT_QUOTES);
            $strHeadLineH		= htmlspecialchars_decode($row['VCH_HEAD_LINE_O'],ENT_QUOTES);
            $strOpeningDate		= date("d-m-Y",strtotime(htmlspecialchars_decode($row['DTM_OPENING_DATETIME'],ENT_QUOTES)));
            $strClosingDate		= date("d-m-Y",strtotime(htmlspecialchars_decode($row['DTM_CLOSING_DATETIME'],ENT_QUOTES)));
            $strOpeningTime		= date("h:i A",strtotime(htmlspecialchars_decode($row['DTM_OPENING_DATETIME'],ENT_QUOTES)));
            $strClosingTime		= date("h:i A",strtotime(htmlspecialchars_decode($row['DTM_CLOSING_DATETIME'],ENT_QUOTES)));           
            $strDescription		= htmlspecialchars_decode($row['VCH_DESCRIPTION_E'],ENT_QUOTES);
            $strDescriptionH	= htmlspecialchars_decode($row['VCH_DESCRIPTION_O'],ENT_QUOTES);
            $intStatus          = $row['INT_PUBLISH_STATUS'];
            $intSlNo            = $row['intSlNo'];
            $radShowTicker      = $row['INT_APPROVAL_STATUS'];
        }

        $arrResult = array('strTenderType'=>$strTenderType,'strTenderTitle' => $strTenderTitle, 'strTenderTitle_O' => $strTenderTitle_O,'strTenderNo' => $strTenderNo,'strHeadLine' => $strHeadLine,'strHeadLineH' => $strHeadLineH,'strOpeningDate' => $strOpeningDate,'strClosingDate' => $strClosingDate, 'strOpeningTime' => $strOpeningTime, 'strClosingTime' => $strClosingTime, 'strDescription' => $strDescription,'strDescriptionH' => $strDescriptionH,'intSlNo' =>$intSlNo,'radShowTicker'=>$radShowTicker);      
        return $arrResult;
    }

   // Function To read Tender Doc  By:: Rahul Kumar Saw:: On:: 14-OCT-2019  
      public function readDoc($id) 
      {
         $result = $this->manageTender('REC',$id,0,'','','','','',BLANK_DATE,BLANK_DATE,'','',1,0,0,0,BLANK_DATE,BLANK_DATE,BLANK_DATE,'','',0,0,'','');
          return $result;
      }


// Function To Delete Tender  By:: Rahul Kumar Saw:: On:: 14-OCT-2019 
    public function deleteTender($action, $ids) 
    {  
            $ctr = 0;
            $msg=0;
            $explIds = explode(',', $ids);
            $delRec = 0;
            foreach ($explIds as $indIds) { 

                if($action=='US')
                $slNumber = $_POST['txtSLNo'.$indIds];
                else
                $slNumber = 0;


                $result = $this->manageTender($action,$indIds,0,'','','','','',BLANK_DATE,BLANK_DATE,'','',0,0,0,0,BLANK_DATE,BLANK_DATE,BLANK_DATE,'','',$slNumber,0,'',''); 
                  
                $row = $result->fetch_array();
                if ($row[0] == 0)
                    $delRec++;
                $ctr++;
            }

            if ($action == 'D') {
                if ($delRec > 0)
                    $outMsg .= 'Tender(s) deleted successfully';
                else
                    $outMsg .= 'Dependency record exist tender(s) can not be  deleted';
            }
            else if ($action == 'AC')
                $outMsg = 'Tender(s) activated successfully';
            else if ($action == 'IN')
                $outMsg = 'Tender(s) unpublished successfully';
            else if ($action == 'AR')
                $outMsg = 'Tender(s) archieved successfully';
            else if($action == 'P')
                $outMsg = 'Tender(s) Published successfully';
            else if ($action == 'US')
            $outMsg = 'Serial number updated successfully';   
            return $outMsg;
    }

   /*//===== Function for view Tender at Home page By :: Rahul Kumar Saw:: On:: 14-OCT-2019 
       public function viewTender($action,$tenderId,$portalId,$deptId) 
       {
          $result = $this->manageTender($action,$tenderId,'','',DEFAULTDATE,DEFAULTDATE,'','','','','','',2,$portalId,0,$deptId,0,'','','','','','',0,'',0,0,DEFAULTDATE,DEFAULTDATE,'','','','','','','','');
            return $result;
       } */	
}	
?>