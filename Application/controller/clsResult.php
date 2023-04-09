<?php 
    /* ================================================
    File Name     : clsResult.php
    Description		: This is used for manage result updation. 
    Developed By	: Rahul Kumar Saw
    Developed On	: 30-July-2021    
    Update History	:
    <Updated by>	<Updated On>		<Remarks>

    Class Used		: clsResult
    Procedure Used      : USP_SKILL_RESULT
    Functions Used	: manageResult(),addUpdateVenueTagged()
    ==================================================*/	
    class clsResult extends Model {

        // Function To Manage Result By::Rahul Kumar Saw   :: On:: 30-July-2021
        public function manageResult($action,$resultId,$distId,$skillId,$name,$strAckNo,$adharNumber,$mobile,$emailId,$qualifyStatus,$marks,$level,$pubStatus,$status,$createdBy,$pgSize,$attr1,$attr2,$attr3,$attr4) {
           
            $sql = "CALL USP_SKILL_RESULT('$action',$resultId,$distId,$skillId,'$name','$strAckNo','$adharNumber','$mobile','$emailId','$qualifyStatus','$marks','$level',$pubStatus,$status,$createdBy,$pgSize,'$attr1','$attr2',$attr3,$attr4);";
            //echo $sql;//exit;
            $errAction          = $this->isSpclChar($action);
            if ($errAction > 0)
                header("Location:" . URL . "error");
            else {
                $result = $this->executeQry($sql);  
                return $result;
            }
        }
  
    // Function To addUpdate bulk result data By::Rahul Kumar Saw  :: On:: 30-july-2021
    public function importData()
    { 
        
        $userId = !empty($_SESSION['adminConsole_userID'])?$_SESSION['adminConsole_userID']:1;
        $dataStr                = array();
        $query                  = '';
        $uploadPath             = APP_PATH.'temp/';
        $fileProgress           = $_FILES['excelfile']['name']; 
        $fileSize               = $_FILES['excelfile']['size'];
        $fileTemp               = $_FILES['excelfile']['tmp_name']; 
        $ext                    = pathinfo($fileProgress, PATHINFO_EXTENSION);
        $fileProgress           = ($fileProgress != '')?'ResultDetails'.date("Ymd_His").'.'.$ext:'';
        $fileMimetype           = ($fileProgress != '')?mime_content_type($fileTemp):'';
        if(move_uploaded_file($fileTemp,$uploadPath.$fileProgress))
        {
                include (APP_PATH.'spreadSheetReader/excel_reader.php');     // include the class

                // creates an object instance of the class, and read the excel file data
            $excel = new PhpExcelReader; 
            $excel->read($uploadPath.$fileProgress); 
            $nr_sheets = count($excel->sheets);       // gets the number of sheets
            $excel_data = ''; 
            $arrRow  = array();                         // to store the the html tables 
            for($i=0; $i<$nr_sheets; $i++) 
            {
              $flag        =1;
              array_push($arrRow, $excel->sheets[$i]);
              $arrRow       =  json_encode(($arrRow)); //print_r($arrRow);exit;
              $excel_data .=$this->sheetData($excel->sheets[$i],$arrRow) .'<br/>';
            }
        }
        else
        {
            $excel_data= "Error : ". "file could not be uploaded";
            $flag=0;
        }
        
              $arrResult = array('msg' => $outMsg,'flag'=>$flag,'excel_data'=>$excel_data,'arrRow'=>$arrRow);

         return $arrResult;
}

    // Function To addUpdate bulk data By::Rahul Kumar Saw  
    public function insertResultData()
    {   
                $userId = !empty($_SESSION['adminConsole_userID'])?$_SESSION['adminConsole_userID']:1;
                //$selType                = $_POST['selType'];
                $chkbox                 = $_POST['chkbx']; 
                //print_r($chkbox);echo "<br>";exit;

                $totalResultRow            = $_POST['hdnResultRow'];
                $query1                  = '';
                $totalrow                = json_decode($totalResultRow,true);

               $firstRow=array();
               $queryRow=array();
               
                $ctr=1;
                foreach ($chkbox as $value) {
                  array_push($firstRow,$totalrow[0]['cells'][$value]); 
                }
                //print_r($firstRow);exit;
               if(count($totalrow)>0) 
               {
                
                 
                    foreach ($firstRow as $row11) 
                    {
                    
                    if($ctr>0)
                    {
                           $district          = (!empty($row11[1]))?$row11[1]:'';
                           $skillName         = (!empty($row11[2]))?$row11[2]:'';
                           $applicantName     = (!empty($row11[3]))?$row11[3]:'';
                           $aadharNumber      = (!empty($row11[4]))?$row11[4]:'';
                           $regdNo            = (!empty($row11[5]))?$row11[5]:'';
                           $marks             = (!empty($row11[6]))?$row11[6]:0;
                           $qualifyStatus     = (!empty($row11[7]))?$row11[7]:'';
                           $level             = (!empty($row11[8]))?$row11[8]:'';

                           $districtId        = $this->showDistrictId($district);
                           $skillId           = $this->showSkillId($skillName);
                           
                           if($districtId>0)
                           {
                           $result         = $this->manageResult('AU',0,$districtId,$skillId,$applicantName,$regdNo,$aadharNumber,'','',$qualifyStatus,$marks,$level,0,0,0,0,'','',0,0);

                           if($result)
                            {
                                $numRow     = $result-> fetch_array();
                                $statusflag = $numRow[0]; 
                                $outMsg = 'Result added successfully';
                               
                            }
                           }
                           else
                           {
                            $outMsg="Please enter valid data.";
                           }

                       }
                        
                    }

                        $arrResult = array('msg' => $outMsg,'districtId'=>$districtId,'skillId'=>$skillId,'applicantName'=>$applicantName,'regdNo'=>$regdNo,'aadharNumber'=>$aadharNumber,'qualifyStatus'=>$qualifyStatus,'marks'=>$marks,'level'=>$level);
                        return $arrResult;           
                }      
    }    
    
    // this function creates and returns a HTML table with excel rows and columns data
// Parameter - array with excel worksheet data
    public function sheetData($sheet,$arrRow) 
    {
      //$mebereType             = "Choose all chekbox then click on submit button";//$this->showMember($selType);
      //$re = '<p style="font-weight:bold;text-decoration:underline;">'.$mebereType.'</p>';
      $re .= '<table class="table table-striped table-bordered table-hover">';
      $totalrow1                = json_decode($arrRow,true);
      $firstRow1=array();
               $queryRow1=array();
                $ctr1=1;
               if(count($totalrow1)>0) 
               {
                $firstRow1=$totalrow1[0]['cells'];  
                    foreach ($firstRow1 as $row22) 
                    {
                    
                    if($ctr1>=1)
                    {
                           $district          = (!empty($row22[1]))?$row22[1]:'';
                           $skillName         = (!empty($row22[2]))?$row22[2]:'';
                           $applicantName     = (!empty($row22[3]))?$row22[3]:'';
                           $aadharNumber      = (!empty($row22[4]))?$row22[4]:'';
                           $regdNo            = (!empty($row22[5]))?$row22[5]:'';
                           $marks             = (!empty($row22[6]))?$row22[6]:0;
                           $qualifyStatus     = (!empty($row22[7]))?$row22[7]:'';
                           $level             = (!empty($row22[8]))?$row22[8]:'';
                           
        
                           $re     .= "<tr>\n";
                           if($district == "District Name" || $skillName == "Skill Name" || $applicantName == "Applicant Name"  || $aadharNumber == "Aadhaar Number" || $regdNo == "Registration Number" || $marks == "Marks Secured" || $qualifyStatus == "Qualify Status" || $level == "Level Name"){
                            $fontWeight = "font-weight:bold;";
                            $re .= '<th width="70px"><input type="checkbox" value="'.($ctr1).'" name="chkbx[]" id="chkbxAll"> All </th>';
                           }/*else if($disable != ""){
                            echo "2";//exit;

                              $re .= '<td></td>';
                           }*/else{
                            $fontWeight = "";
                            $re .= '<td><input type="checkbox" value="'.($ctr1).'" name="chkbx[]" '.$disable.' class="chkbxSelected"></td>';
                           }

                            $re .= '<td style="'.$fontWeight.''.$color.'"">'.$district.'</td>';
                            $re .= '<td style="'.$fontWeight.''.$color.'"">'.$skillName.'</td>';
                            $re .= '<td style="'.$fontWeight.''.$color.'"">'.$applicantName.'</td>';
                            $re .= '<td style="'.$fontWeight.''.$color.'"">'.$aadharNumber.'</td>';
                            $re .= '<td style="'.$fontWeight.''.$color.'"">'.$regdNo.'</td>';
                            $re .= '<td style="'.$fontWeight.''.$color.'"">'.$marks.'</td>';
                            $re .= '<td style="'.$fontWeight.''.$color.'"">'.$qualifyStatus.'</td>';
                            $re .= '<td style="'.$fontWeight.''.$color.'"">'.$level.'</td>';
                            $re .= "</tr>";                          
                            
                    }
                    $ctr1++;
                  }
                }
                //$re .= "<input type='hidden' name='selType' id='selType' value='".$selType."'>";
                return $re .'</table>';     // ends and returns the html table
      
    }
     

     // Function To Update qualify By::Rahul Kumar Saw   :: On:: 03-Aug-2021
    public function updateQualify($action, $ids,$level) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
            $ctr = 0;
            $userId = $_SESSION['adminConsole_userID'];
            $explIds = explode(',', $ids);
            $delRec = 0;
            foreach ($explIds as $indIds) {

                if($action=='UM')
                {
                   $status = 1;
                   $marks  = $_POST['intMarks'.$indIds];
                }
                else
                {
                   $status = 0;
                   $marks  = 0;
                }
                $result = $this->manageResult($action,$explIds[$ctr],0,0,'','','','','','',$marks,$level,0,0,$userId,0,'','',0,0); 
                $row = mysqli_fetch_array($result);

                if ($row[0] == 0)
                    $delRec++;

                $ctr++;

            } 
              if($action == 'QS')
              {
                $outMsg = 'Candidate Qualified Successfully';
              }
              else if ($action == 'UM')
              {
                $outMsg = 'Marks Updated Successfully';
              }
              else if ($action == 'DQS')
              {
                $outMsg = 'Candidate Disqualified Successfully';
              }

            return $outMsg;
         }else{
                header("Location:" . APP_URL . "error");
           }  
    }


    # Check result status By Rahul ON::08-08-2021
    public function getResultStatus($regdNo) {

        $outMsg = '';
        $ridrectUrl = '';
        $result = $this->manageResult('QR', 0, 0,0,'',$regdNo,'','','','','','',0,0,0,0,'','',0,0);
        //print_r($result);exit;
        if ($result->num_rows > 0) 
        {

            $row = $result->fetch_array();

            $qualifyStatus  = $row['intQualify'];
            $levelIqualify  = $row['intLevelIQualify'];
            $confirmStatus  = $row['tinConfirmation'];
            $secondLvlStatus= $row['intPanelQualify'];
            $comptId        = $row['intCompetitionId'];
            $tagId          = $row['intTagId'];
            $name           = $row['vchFirstName'];
            $aadharId       = $row['vchAadharId'];
            $strSkills      = $row['strSkills'];
            $panelMark      = $row['intPanelMark'];
            $panelQualStatus = $row['intPanelQualify'];
            $strUpdatedSkills = $row['strUpdatedSkills'];
            $flag           = 1;
            $panelId        = $row['intPanalId'];
        }
        else
            {
                $outMsg = 'Please enter valid registration no. / aadhar no. / mobile no.';
                $flag = 0;
            }

        $arrResult = array('msg' => $outMsg,'redirect'=>$ridrectUrl,'qualifyStatus' =>$qualifyStatus,'comptId' =>$comptId,'levelIqualify'=>$levelIqualify,'confirmStatus'=>$confirmStatus,'secondLvlStatus'=>$secondLvlStatus,'tagId'=>$tagId,'name'=>$name,'aadharId'=>$aadharId,'flag'=>$flag,'strSkills'=>$strSkills,'panelMark'=>$panelMark,'panelQualStatus'=>$panelQualStatus,'strUpdatedSkills'=>$strUpdatedSkills,'panelId'=>$panelId);

        return $arrResult;
    }


    }
?>