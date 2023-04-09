<?php
/* * ****Class to manage bulk data ********************
  ' By     : R Rout '
  ' On     : 12-11-2020         '
  ' Procedure Used       : USP_BULK_SKILLDEVELOPMENT            '
 * ************************************************** */
class clsBulk extends Model 
{
 // Function To Manage Bulk Data By::Rahul Kumar Saw  
    public function manageBulkSkillCompetition($action, $arrConditions) {
        try {

            $result = Model::callProc('USP_BULK_SKILLCOMPETITION', $action, $arrConditions);
            return $result;
//echo $result;exit;
        }//
        catch (Exception $e) {
            echo 'Error:' . $e->getMessage();
            exit();
        }
    }
     // Function To addUpdate bulk data By::Rahul Kumar Saw  :: On:: 13-May-2022
    public function importMarks()
    { 
        
        $userId = !empty($_SESSION['adminConsole_userID'])?$_SESSION['adminConsole_userID']:1;
        $dataStr                = array();
        $query                  = '';
        //$selType                = $_POST['selType'];
        $uploadPath             = APP_PATH.'temp/';
        $fileProgress           = $_FILES['excelfile']['name']; 
        $fileSize               = $_FILES['excelfile']['size'];
        $fileTemp               = $_FILES['excelfile']['tmp_name']; 
        $ext                    = pathinfo($fileProgress, PATHINFO_EXTENSION);
        $fileProgress           = ($fileProgress != '')?'MarksDetails'.date("Ymd_His").'.'.$ext:'';
        $fileMimetype           = ($fileProgress != '')?mime_content_type($fileTemp):'';
        if(move_uploaded_file($fileTemp,$uploadPath.$fileProgress))
        {
                include (APP_PATH.'spreadSheetReader/excel_reader.php');     // include the class

                // creates an object instance of the class, and read the excel file data
            $excel = new PhpExcelReader; 
            $excel->read($uploadPath.$fileProgress); 
            $nr_sheets = count($excel->sheets);       // gets the number of sheets
            $excel_data = ''; 
            $arrRow  = array();                         // to store the the html tables with data of each sheet
            // traverses the number of sheets and sets html table with each sheet data in $excel_data
            for($i=0; $i<$nr_sheets; $i++) 
            {
              $flag        =1;
              array_push($arrRow, $excel->sheets[$i]);
              $arrRow       =  json_encode(($arrRow)); //print_r($arrRow);
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
    public function insertMarksData()
    {   
                $userId = !empty($_SESSION['adminConsole_userID'])?$_SESSION['adminConsole_userID']:1;
                //$selType                = $_POST['selType'];
                $chkbox                 = $_POST['chkbx']; 
               // print_r($chkbox);echo "<br>";exit;

                $totalRegdRow            = $_POST['hdnRegistrationRow'];
                $query1                  = '';
                $totalrow                = json_decode($totalRegdRow,true);

               $firstRow=array();
               $queryRow=array();
               
                $ctr=1;
                $numDupAadhar =0;
                foreach ($chkbox as $value) {
                  array_push($firstRow,$totalrow[0]['cells'][$value]); 
                }
                
               if(count($totalrow)>0) 
               {
                
                 
                    foreach ($firstRow as $row11) 
                    {
                    
                    if($ctr>0)
                    {
                           $regdNumber    = (!empty($row11[1]))?$row11[1]:'';
                           $marks         = (!empty($row11[2]))?$row11[2]:'';
                           $level         = (!empty($row11[3]))?$row11[3]:'';

                           $intComId      = $this->showRegdId($regdNumber);
                           
                           
                           /*if($assignedStatus == "Assigned"){
                            $assigned = 2;
                           }
                           if($assignedStatus == "Not Assigned"){
                            $assigned = 1;
                           }*/
                  
                           if($intComId>0)
                           {
                           $arrSConditions=array('compId'=>$intComId,'regdNumber'=>$regdNumber ,'marks'=>$marks,'userId'=>$userId,'level'=>$level);

                            $result     = $this->manageBulkSkillCompetition('UB', $arrSConditions);

                            if ($result)
                             {
                                $numRow = $result->fetch_array();
                                $msg = $numRow[0];
                                $outMsg='"Marks" updated successfully.';
                             }
                             else
                             {
                              $outMsg="Please select record.";
                             }
                           }
                           else
                           {
                            $outMsg="Please enter valid data.";
                           }

                       }
                        
                    }
                           /* $ctr1 = $ctr-1;
                            $chkbox1 = count($chkbox)-1;
                           if($result)
                                  $outMsg="Login id assigned successfully.";*/

                        $arrResult = array('msg' => $outMsg,'regdNumber'=>$regdNumber);
                        return $arrResult;            
                }      
    }    
    
    // this function creates and returns a HTML table with excel rows and columns data
// Parameter - array with excel worksheet data
    public function sheetData($sheet,$arrRow) 
    {
      $mebereType             = "Choose all chekbox then click on submit button";//$this->showMember($selType);
      $re = '<p style="font-weight:bold;text-decoration:underline;">'.$mebereType.'</p>';
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
                           $regdNo               = (!empty($row22[1]))?$row22[1]:'';
                           $marks                = (!empty($row22[2]))?$row22[2]:'';
                           $level                = (!empty($row22[3]))?$row22[3]:'';


                           /*$districtId             = $this->showDistrictId($district);
                           $blockId                = $this->showBlockId($block);
                           $gpId                   = $this->showGpId($gp);
                           $villageId              = $this->showVillageId($village);
                           $qualificationId        = $this->showQualiId($qualification);
                           $getCategoryId          = $this->categoryId($category,1);
                           $courseId               = $this->showCourseId($trainingType);*/


                          /* if($regdNo != "Registration Number")
                           {
                            $disable = "disabled";
                            $color = "color:red;";
                           }else{
                            $disable = "";
                            $color = "";
                           }*/
        
                           $re     .= "<tr>\n";
                           if($regdNo == "Registration Number" || $marks == "Mark" || $level == "Level"){
                            $fontWeight = "font-weight:bold;";
                            $re .= '<th width="70px"><input type="checkbox" value="'.($ctr1).'" name="chkbx[]" id="chkbxAll"> All </th>';
                           }/*else if($disable != ""){
                            echo "2";//exit;

                              $re .= '<td></td>';
                           }*/else{
                            $fontWeight = "";
                            $re .= '<td><input type="checkbox" value="'.($ctr1).'" name="chkbx[]" '.$disable.' class="chkbxSelected"></td>';
                           }

                            $re .= '<td style="'.$fontWeight.''.$color.'"">'.$regdNo.'</td>';
                            $re .= '<td style="'.$fontWeight.''.$color.'"">'.$marks.'</td>';
                            $re .= '<td style="'.$fontWeight.''.$color.'"">'.$level.'</td>';
                            $re .= "</tr>";                          
                            
                    }
                    $ctr1++;
                  }
                }
                //$re .= "<input type='hidden' name='selType' id='selType' value='".$selType."'>";
                return $re .'</table>';     // ends and returns the html table
      
    }

    // Function To addUpdate bulk data for digital skilling By::Rahul Kumar Saw  :: On:: 20-June-2022
    public function importBulkMarks()
    { 
        
        $userId = !empty($_SESSION['adminConsole_userID'])?$_SESSION['adminConsole_userID']:1;
        $dataStr                = array();
        $query                  = '';
        //$selType                = $_POST['selType'];
        $uploadPath             = APP_PATH.'temp/';
        $fileProgress           = $_FILES['excelfile']['name']; 
        $fileSize               = $_FILES['excelfile']['size'];
        $fileTemp               = $_FILES['excelfile']['tmp_name']; 
        $ext                    = pathinfo($fileProgress, PATHINFO_EXTENSION);
        $fileProgress           = ($fileProgress != '')?'MarksDetails'.date("Ymd_His").'.'.$ext:'';
        $fileMimetype           = ($fileProgress != '')?mime_content_type($fileTemp):'';
        if(move_uploaded_file($fileTemp,$uploadPath.$fileProgress))
        {
                include (APP_PATH.'spreadSheetReader/excel_reader.php');     // include the class

                // creates an object instance of the class, and read the excel file data
            $excel = new PhpExcelReader; 
            $excel->read($uploadPath.$fileProgress); 
            $nr_sheets = count($excel->sheets);       // gets the number of sheets
            $excel_data = ''; 
            $arrRow  = array();                         // to store the the html tables with data of each sheet
            // traverses the number of sheets and sets html table with each sheet data in $excel_data
            for($i=0; $i<$nr_sheets; $i++) 
            {
              $flag        =1;
              array_push($arrRow, $excel->sheets[$i]);
              $arrRow       =  json_encode(($arrRow)); //print_r($arrRow);
              $excel_data .=$this->sheetBulkData($excel->sheets[$i],$arrRow) .'<br/>';
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
    public function insertBulkMarksData()
    {   
                $userId = !empty($_SESSION['adminConsole_userID'])?$_SESSION['adminConsole_userID']:1;
                //$selType                = $_POST['selType'];
                $chkbox                 = $_POST['chkbx']; 
               // print_r($chkbox);echo "<br>";exit;

                $totalRegdRow            = $_POST['hdnBulkRegistrationRow'];
                $query1                  = '';
                $totalrow                = json_decode($totalRegdRow,true);

               $firstRow=array();
               $queryRow=array();
               
                $ctr=1;
                $numDupAadhar =0;
                foreach ($chkbox as $value) {
                  array_push($firstRow,$totalrow[0]['cells'][$value]); 
                }
                
               if(count($totalrow)>0) 
               {
                
                 
                    foreach ($firstRow as $row11) 
                    {
                    
                    if($ctr>0)
                    {
                           $regdNumber    = (!empty($row11[1]))?$row11[1]:'';
                           $marks         = (!empty($row11[2]))?$row11[2]:'';

                           $intSkillId    = $this->showSkillRegdId($regdNumber);
                           
                           
                           /*if($assignedStatus == "Assigned"){
                            $assigned = 2;
                           }
                           if($assignedStatus == "Not Assigned"){
                            $assigned = 1;
                           }*/
                  
                           if($intSkillId>0)
                           {
                           $arrSConditions=array('compId'=>$intSkillId,'regdNumber'=>$regdNumber ,'marks'=>$marks,'userId'=>$userId);

                            $result     = $this->manageBulkSkillCompetition('UM', $arrSConditions);

                            if ($result)
                             {
                                $numRow = $result->fetch_array();
                                $msg = $numRow[0];
                                $outMsg='"Marks" updated successfully.';
                             }
                             else
                             {
                              $outMsg="Please select record.";
                             }
                           }
                           else
                           {
                            $outMsg="Please enter valid data.";
                           }

                       }
                        
                    }
                           /* $ctr1 = $ctr-1;
                            $chkbox1 = count($chkbox)-1;
                           if($result)
                                  $outMsg="Login id assigned successfully.";*/

                        $arrResult = array('msg' => $outMsg,'regdNumber'=>$regdNumber);
                        return $arrResult;            
                }      
    }    
    
    // this function creates and returns a HTML table with excel rows and columns data
// Parameter - array with excel worksheet data
    public function sheetBulkData($sheet,$arrRow) 
    {
      $mebereType             = "Choose all chekbox then click on submit button";//$this->showMember($selType);
      $re = '<p style="font-weight:bold;text-decoration:underline;">'.$mebereType.'</p>';
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
                           $regdNo               = (!empty($row22[1]))?$row22[1]:'';
                           $marks                = (!empty($row22[2]))?$row22[2]:'';
                           
                          
                           $re     .= "<tr>\n";
                           if($regdNo == "Registration Number" || $marks == "Mark"){
                            $fontWeight = "font-weight:bold;";
                            $re .= '<th width="70px"><input type="checkbox" value="'.($ctr1).'" name="chkbx[]" id="chkbxAll"> All </th>';
                           }/*else if($disable != ""){
                            echo "2";//exit;

                              $re .= '<td></td>';
                           }*/else{
                            $fontWeight = "";
                            $re .= '<td><input type="checkbox" value="'.($ctr1).'" name="chkbx[]" '.$disable.' class="chkbxSelected"></td>';
                           }

                            $re .= '<td style="'.$fontWeight.''.$color.'"">'.$regdNo.'</td>';
                            $re .= '<td style="'.$fontWeight.''.$color.'"">'.$marks.'</td>';
                            $re .= "</tr>";                          
                            
                    }
                    $ctr1++;
                  }
                }
                //$re .= "<input type='hidden' name='selType' id='selType' value='".$selType."'>";
                return $re .'</table>';     // ends and returns the html table
      
    }

}// end Class


?>
<?php 
/*<script type="text/javascript">
    $(document).ready(function(){
        $('#chkbxAll').click(function(){
            if($(this).is(":checked")){
              $('.chkbxSelected').prop('checked',true);
            }
            else if($(this).is(":not(:checked)")){
                $('.chkbxSelected').prop('checked',false);
            }
        });
    });
</script>*/
?>