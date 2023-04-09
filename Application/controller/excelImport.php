<?php

/* ================================================
File Name               : excelImport.php
Description                : Page to manage excel file.
Date Created              : 28-March-2019
Developed By              : Ashis kumar Patra

================================================== */
$pageArray = array('viewITIReport', 'viewEngineeringReport', 'viewPolytechnicReport', 'viewGraduateReport', 'viewHMReport', 'viewNursingReport');
include_once APP_PATH . "Excel/Writer.php";
class clsExcelImport extends Model
{

    /*
    Function to Display Assessment Details.
    By: Ashis kumar Patra
    On: 28-FEB-2019
     */

    public function exportSkillCompititionData($strName, $intDistrict, $intBlock, $intSkill, $strStartDt, $strEndDate,$intQualify,$intConfirm,$intUpdateSkill,$regdType,$gender)
    {
        include_once CLASS_PATH . 'clsSkillCompetition.php';

        $objCompete = new clsSkillCompetition;
        $excelResult = $objCompete->manageSkillCompetition('EX', 0, $intDistrict, $intBlock, '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', $gender, $intConfirm, $regdType, $intQualify, $strName, 0, $intUpdateSkill, $intSkill, $strStartDt, $strEndDate);

        $fileName = "SkillComp" . time() . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet('Registration Details, Skill-Odisha-2022');
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        //$worksheet->setMerge(0, 0, 0,13);
        $ctr = 1;
        $worksheet->setRow(0, 30);
        $worksheet->setColumn(0, 15, 20);
        // $worksheet->write(0, 0, 'Registered Applicants-Skill Odisha-2019', $format_bold_h1);
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Applicant Name', $format_title);
        $worksheet->write(0, 2, 'Registration No.', $format_title);
        $worksheet->write(0, 3, 'Mobile Number', $format_title);
        $worksheet->write(0, 4, 'Email', $format_title);
        $worksheet->write(0, 5, 'Gender', $format_title);
        $worksheet->write(0, 6, 'Applied Skill', $format_title);
        $worksheet->write(0, 7, 'Registration Type', $format_title);
        $worksheet->write(0, 8, 'Aadhar ID', $format_title);
        $worksheet->write(0, 9, 'District', $format_title);
        $worksheet->write(0, 10, 'Block/ULB', $format_title);
        //$worksheet->write(1, 8, 'Profile Photo', $format_title);
        $worksheet->write(0, 11, 'Date Of Birth', $format_title);
        $worksheet->write(0, 12, 'Qualification', $format_title);
        $worksheet->write(0, 13, 'Institute Name', $format_title);

        $worksheet->write(0, 14, 'Registered On', $format_title);
        $worksheet->write(0, 15, 'Result', $format_title);


        while ($row = $excelResult->fetch_array()) {
            $ctr++;
            $applicantName = htmlspecialchars_decode($row['vchFirstName'], ENT_QUOTES) . ' ' . htmlspecialchars_decode($row['vchMiddleName'], ENT_QUOTES) . ' ' . htmlspecialchars_decode($row['vchLastName'], ENT_QUOTES);
            $mobNum = $row['vchPhoneno'];
            $email = htmlspecialchars_decode($row['vchEmailId'], ENT_QUOTES);
            $strSkill = htmlspecialchars_decode($row['strSkills'], ENT_QUOTES);
            $strUpdateSkills = htmlspecialchars_decode($row['strUpdateSkills'], ENT_QUOTES);
            $strAckNo = htmlspecialchars_decode($row['vchAckNo'], ENT_QUOTES);
            $strAadharNo = htmlspecialchars_decode($row['vchAadharId'], ENT_QUOTES);
            $strDistName = htmlspecialchars_decode($row['vchDistrictName'], ENT_QUOTES);
            $strBlockName = htmlspecialchars_decode($row['vchBlockName'], ENT_QUOTES);
            $phaseName = htmlspecialchars_decode($row['phaseName'], ENT_QUOTES);
            $image = APP_URL . 'uploadDocuments/skillCompetition/' . $row['vchAckNo'] . '/' . $row['vchProfilePhoto'];
            $dob = date('d-M-Y', strtotime($row['dtmDob']));
            $intQualify = ($row['intQualify']==0)?'Not Qualified':'Qualified';
            $tinGender = $row['tinGender'];
            if ($tinGender == 1) {
                $strGender = 'Male';
            } else if ($tinGender == 2) {
                $strGender = 'Female';
            } else {
                $strGender = 'Others';
            }
            $instituteName = ($row['vchAcademicInstitute'] != '' && $row['vchAcademicInstitute'] != '0' && $row['vchAcademicInstitute'] != '101') ? htmlspecialchars_decode($row['vchAcademicInstitute'], ENT_QUOTES) : htmlspecialchars_decode($row['vchWorkPlace'], ENT_QUOTES);

            $qualification = ($row['intQualificationId'] == 101) ? 'Others' : htmlspecialchars_decode($row['vchQualification'], ENT_QUOTES);
            $registeDate = date('d-M-Y', strtotime($row['stmCreatedOn']));

            $worksheet->write($ctr, 0, ($ctr - 1), $format_border);
            $worksheet->write($ctr, 1, $applicantName, $format_border);
            $worksheet->write($ctr, 2, $strAckNo, $format_border);
            $worksheet->write($ctr, 3, $mobNum, $format_border);
            $worksheet->write($ctr, 4, $email, $format_border);
            $worksheet->write($ctr, 5, $strGender, $format_border);

            $worksheet->write($ctr, 6, $strSkill, $format_border);
            $worksheet->write($ctr, 7, $phaseName, $format_border);
            $worksheet->writeNumber($ctr, 8, $strAadharNo, $num_format);
            $worksheet->write($ctr, 9, $strDistName, $format_border);
            $worksheet->write($ctr, 10, $strBlockName, $format_border);

            /*For Image Writing*/
//                        $objDrawing = new PHPExcel_Worksheet_Drawing();
            //                        $objDrawing->setName('skill_'.$strAadharNo."_");
            //                        $objDrawing->setDescription($applicantName.'_Image');
            //                        $objDrawing->setPath($image);
            //                        $objDrawing->setCoordinates('A1');
            //                        //setOffsetX works properly
            //                        $objDrawing->setOffsetX(5);
            //                        $objDrawing->setOffsetY(5);
            //                        //set width, height
            //                        $objDrawing->setWidth(100);
            //                        $objDrawing->setHeight(35);
            //                        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

            //$worksheet->write($ctr, 8, 'N/A', $format_border);
            $worksheet->write($ctr, 11, $dob, $format_border);
            $worksheet->write($ctr, 12, $qualification, $format_border);
            $worksheet->write($ctr, 13, $instituteName, $format_border);
            $worksheet->write($ctr, 14, $registeDate, $format_border);
            $worksheet->write($ctr, 15, $intQualify, $format_border);
        }

        $workbook->close();
        $objCompete->DownloadFile('temp/' . $fileName);
        exit();
    }

     /*
    Function to Display Skill WSID Details.
    By: Rahul kumar Saw
    On: 23-MARCH-2021
     */

    public function exportSkillWSIDCompititionData($strName, $intDistrict, $intQualify, $intSkill,$intConfirm,$regType)
    {
        include_once CLASS_PATH . 'clsSkillCompetition.php';

        $objCompete = new clsSkillCompetition;
        $excelResult = $objCompete->manageSkillCompetition('WV', 0, $intDistrict, 0, '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, $regType, 0, $intConfirm, 0, $intQualify, $strName, 0, 0, $intSkill, '0000-00-00', '0000-00-00');

        $fileName = "WorldSkillComp" . time() . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet('World Skill Registration Details, Skill-Odisha-2020');
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        //$worksheet->setMerge(0, 0, 0,13);
        $ctr = 1;
        $worksheet->setRow(0, 30);
        $worksheet->setColumn(0, 9, 20);
        // $worksheet->write(0, 0, 'Registered Applicants-Skill Odisha-2019', $format_bold_h1);
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Applicant Name', $format_title);
        $worksheet->write(0, 2, 'Acknowledgement No.', $format_title);
        $worksheet->write(0, 3, 'Mobile Number', $format_title);
        $worksheet->write(0, 4, 'Email', $format_title);
        $worksheet->write(0, 5, 'Applied Skill', $format_title);
        $worksheet->write(0, 6, 'District', $format_title);
        $worksheet->write(0, 7, 'Institute Name', $format_title);
        $worksheet->write(0, 8, 'Result', $format_title);
        $worksheet->write(0, 9, 'Registration Type', $format_title);

        while ($row = $excelResult->fetch_array()) {
            $ctr++;
            $applicantName = htmlspecialchars_decode($row['vchFirstName'], ENT_QUOTES) . ' ' . htmlspecialchars_decode($row['vchMiddleName'], ENT_QUOTES) . ' ' . htmlspecialchars_decode($row['vchLastName'], ENT_QUOTES);
            $mobNum = $row['vchPhoneno'];
            $email = htmlspecialchars_decode($row['vchEmailId'], ENT_QUOTES);
            $strSkill = htmlspecialchars_decode($row['strSkills'], ENT_QUOTES);
            $strAckNo = htmlspecialchars_decode($row['vchAckNo'], ENT_QUOTES);
            $strAadharNo = htmlspecialchars_decode($row['vchAadharId'], ENT_QUOTES);
            $strDistName = htmlspecialchars_decode($row['vchDistrictName'], ENT_QUOTES);
            $intQualify = ($row['intQualify']==0)?'Not Qualified':'Qualified';
            $skillCenter = ($row['vchRegistrationType']=='ISID')?'India Skill':'World Skill';
            $qualification = ($row['intQualificationId'] == 101) ? 'Others' : htmlspecialchars_decode($row['vchQualification'], ENT_QUOTES);

            $worksheet->write($ctr, 0, ($ctr - 1), $format_border);
            $worksheet->write($ctr, 1, $applicantName, $format_border);
            $worksheet->write($ctr, 2, $strAckNo, $format_border);
            $worksheet->write($ctr, 3, $mobNum, $format_border);
            $worksheet->write($ctr, 4, $email, $format_border);
            $worksheet->write($ctr, 5, $strSkill, $format_border);
            $worksheet->write($ctr, 6, $strDistName, $format_border);
            $worksheet->write($ctr, 7, $qualification, $format_border);
            $worksheet->write($ctr, 8, $intQualify, $format_border);
            $worksheet->write($ctr, 9, $skillCenter, $format_border);

        }

        $workbook->close();
        $objCompete->DownloadFile('temp/' . $fileName);
        exit();
    }

    /*
    Function to Display Assessment Details.
    By: Ashis kumar Patra
    On: 28-FEB-2019
     */

    public function exportInstituteWiseData($type, $qualification, $strStartDt, $strEndDate,$regdType)
    {
        include_once CLASS_PATH . 'clsReport.php';

        $objReport = new clsReport;
        $excelResult = $objReport->manageReport('RAL', 0, $qualification, $type, '', '', '1000-01-01', 0, $regdType, 0, $strStartDt, $strEndDate);

        $sheetName = '';
        switch ($type) {
            case '1':
                $sheetName = 'Govt. ITIs';
                break;
            case '2':
                $sheetName = 'Private ITIs';
                break;
            case '1,2':
                $sheetName = 'ITIs';
                break;
            case '3':
                $sheetName = 'Govt. Polytechnics';
                break;
            case '4':
                $sheetName = 'Private Polytechnics';
                break;
            case '5':
                $sheetName = 'Govt. Engineering';
                break;
            case '6':
                $sheetName = 'Private Engineering';
                break;
            case '7':
                $sheetName = 'Graduation';
                break;
            case '8':
                $sheetName = 'Hotel Management';
                break;
            case '9' || '10':
                $sheetName = 'Nursing';
                break;
            default:
                $sheetName = 'Institute List';
                break;
        }

        $fileName = "Report_" . date('d_m_Y', time()) . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet($sheetName . ", Skill-Odisha-2022");
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white', 'halign' => 'center'));
        $format_border->setTextWrap();
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        $column_centered = &$workbook->addFormat(array('size' => 10, 'border' => 1, 'bordercolor' => 'black', "halign" => 'center', 'fgcolor' => 'white'));
        $column_centered->setBold();
        $column_centered->setColor('red');
        $column_centered->setAlign('center');
        //$worksheet->setMerge(0, 0, 0,13);
        $ctr = 1;
        $worksheet->setRow(0, 20);
        $worksheet->setColumn(0, 2, 20);
        $worksheet->setColumn(1, 1, 40);
        // $worksheet->write(0, 0, 'Registered Applicants-Skill Odisha-2019', $format_bold_h1);
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Institute Name', $format_title);
        $worksheet->write(0, 2, 'No. Of Applicants', $format_title);
        $totalApplicantCount = 0;

        while ($row = $excelResult->fetch_array()) {

            $InstituteName = htmlspecialchars_decode($row['vchInstituteName'], ENT_QUOTES);
            $mobNum = $row['vchPhoneno'];
            $applicantNum = $row['COUNTComp'];
            $totalApplicantCount += $applicantNum;
            $worksheet->write($ctr, 0, ($ctr), $format_border);
            $worksheet->write($ctr, 1, $InstituteName, $format_border);
            $worksheet->write($ctr, 2, $applicantNum, $format_border);
            $worksheet->setRow($ctr, 30);
            $ctr++;
        }

        $worksheet->setMerge($ctr, 0, $ctr, 1);
        $worksheet->write($ctr, 0, 'TOTAL', $column_centered);
        $worksheet->write($ctr, 2, $totalApplicantCount, $column_centered);

        $workbook->close();
        $objReport->DownloadFile('temp/' . $fileName);
        exit();
    }


/*
    Function to Display Other Institute Details.
    By: Rahul Kumar Saw
    On: 22-OCT-2019
     */

    public function exportInstituteWiseOtherData($type, $qualification, $strStartDt, $strEndDate)
    {
        include_once CLASS_PATH . 'clsReport.php';

        $objReport = new clsReport;
        $excelResult = $objReport->manageReport('OTH', 0, $qualification, $type, '', '', '1000-01-01', 0, 0, 0, $strStartDt, $strEndDate);

        $sheetName = 'Other Institute';

        $fileName = "Report_" . date('d_m_Y', time()) . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet($sheetName . ", Skill-Odisha-2022");
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white', 'halign' => 'center'));
        $format_border->setTextWrap();
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        $column_centered = &$workbook->addFormat(array('size' => 10, 'border' => 1, 'bordercolor' => 'black', "halign" => 'center', 'fgcolor' => 'white'));
        $column_centered->setBold();
        $column_centered->setColor('red');
        $column_centered->setAlign('center');
        //$worksheet->setMerge(0, 0, 0,13);
        $ctr = 1;
        $worksheet->setRow(0, 20);
        $worksheet->setColumn(0, 2, 20);
        $worksheet->setColumn(1, 1, 40);
        // $worksheet->write(0, 0, 'Registered Applicants-Skill Odisha-2019', $format_bold_h1);
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Institute Name', $format_title);
        $worksheet->write(0, 2, 'No. Of Applicants', $format_title);
        $totalApplicantCount = 0;

        while ($row = $excelResult->fetch_array()) {

            $InstituteName = htmlspecialchars_decode($row['vchWorkPlace'], ENT_QUOTES);
            $applicantNum = $row['totalOther'];
            $totalApplicantCount += $applicantNum;
            $worksheet->write($ctr, 0, ($ctr), $format_border);
            $worksheet->write($ctr, 1, $InstituteName, $format_border);
            $worksheet->write($ctr, 2, $applicantNum, $format_border);
            $worksheet->setRow($ctr, 30);
            $ctr++;
        }

        $worksheet->setMerge($ctr, 0, $ctr, 1);
        $worksheet->write($ctr, 0, 'TOTAL', $column_centered);
        $worksheet->write($ctr, 2, $totalApplicantCount, $column_centered);

        $workbook->close();
        $objReport->DownloadFile('temp/' . $fileName);
        exit();
    }


    /*
    Function to Display Skill Wise Report.
    By: Rahul Kumar Saw
    On: 24-OCT-2019
     */

    public function exportSkillWiseData($intSkillInstitute,$regdType,$gender)
    {
        include_once CLASS_PATH . 'clsReport.php';

        $objReport = new clsReport;
        $excelResult = $objReport->manageReport('SWR', 0, $intSkillInstitute,'','','', '1000-01-01',$gender,$regdType,0,'1000-01-01','1000-01-01');

        $sheetName = 'Skill Report';

        $fileName = "Skill_Report_" . date('d_m_Y', time()) . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet($sheetName . ", Skill-Odisha-2022");
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white', 'halign' => 'center'));
        $format_border->setTextWrap();
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        $column_centered = &$workbook->addFormat(array('size' => 10, 'border' => 1, 'bordercolor' => 'black', "halign" => 'center', 'fgcolor' => 'white'));
        $column_centered->setBold();
        $column_centered->setColor('red');
        $column_centered->setAlign('center');
        //$worksheet->setMerge(0, 0, 0,13);
        $ctr = 1;
        $worksheet->setRow(0, 20);
        $worksheet->setColumn(0, 2, 20);
        $worksheet->setColumn(1, 1, 40);
        // $worksheet->write(0, 0, 'Registered Applicants-Skill Odisha-2019', $format_bold_h1);
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Skill Name', $format_title);
        $worksheet->write(0, 2, 'No. Of Applicants', $format_title);
        $totalApplicantCount = 0;

        while ($row = $excelResult->fetch_array()) {

            $InstituteName = htmlspecialchars_decode($row['vchSkillName'], ENT_QUOTES);
            $applicantNum = $row['totalSkill'];
            $totalApplicantCount += $applicantNum;
            $worksheet->write($ctr, 0, ($ctr), $format_border);
            $worksheet->write($ctr, 1, $InstituteName, $format_border);
            $worksheet->write($ctr, 2, $applicantNum, $format_border);
            $worksheet->setRow($ctr, 30);
            $ctr++;
        }

        $worksheet->setMerge($ctr, 0, $ctr, 1);
        $worksheet->write($ctr, 0, 'TOTAL', $column_centered);
        $worksheet->write($ctr, 2, $totalApplicantCount, $column_centered);

        $workbook->close();
        $objReport->DownloadFile('temp/' . $fileName);
        exit();
    }


     /*
    Function to Display Skill Development Details.
    By: Rahul Kumar Saw
    On: 23-July-2020
     */

    public function exportSkillDevelopmentData($strNumber, $intCourse, $strStartDt, $strEndDate)
    {
        include_once CLASS_PATH . 'clsSkillDevelopment.php';

        $objDevelop = new clsSkillDevelopment;

        $intcourse = 'Coursera';
        $arrConditions=array('number'=> $strNumber , 'startDate'=> $strStartDt , 'endDate'=> $strEndDate , 'courseType'=> $intcourse);

        $excelResult     = $objDevelop->manageskillDevelopment('V', $arrConditions); 


        $fileName = "SkillDevelopment" . time() . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet('Skill Development Registration Details, Skill-Odisha-2022');
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        //$worksheet->setMerge(0, 0, 0,13);
        $ctr = 1;
        $worksheet->setRow(0, 30);
        $worksheet->setColumn(0, 8, 20);
        // $worksheet->write(0, 0, 'Registered Applicants-Skill Odisha-2019', $format_bold_h1);
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Applicant Name', $format_title);
        $worksheet->write(0, 2, 'Email', $format_title);
        $worksheet->write(0, 3, 'Registration No.', $format_title);
        $worksheet->write(0, 4, 'Course Type', $format_title);
        $worksheet->write(0, 5, 'Skill', $format_title);
        $worksheet->write(0, 6, 'Document Type', $format_title);
        //$worksheet->write(0, 7, 'Document Number', $format_title);
        $worksheet->write(0, 7, 'Address', $format_title);
        $worksheet->write(0, 8, 'Registered On', $format_title);

        while ($row = $excelResult->fetch_array()) {
            $ctr++;
            $applicantName = htmlspecialchars_decode($row['vchName'], ENT_QUOTES);
            $email = htmlspecialchars_decode($row['vchEmail'], ENT_QUOTES);
            $strSkill = htmlspecialchars_decode($row['vchSkill'], ENT_QUOTES);
            $strAckNo = htmlspecialchars_decode($row['vchRegdNumber'], ENT_QUOTES);
            $strCourseType = htmlspecialchars_decode($row['vchCourseType'], ENT_QUOTES);
            $strDocutType = htmlspecialchars_decode($row['vchDocumentType'], ENT_QUOTES);
            $strDocutNumber = htmlspecialchars_decode($row['vchDocumentNumber'], ENT_QUOTES);
            $strAddress = htmlspecialchars_decode($row['vchAddress'], ENT_QUOTES);

            $registeDate = date('d-M-Y', strtotime($row['stmCreatedOn']));

            $worksheet->write($ctr, 0, ($ctr - 1), $format_border);
            $worksheet->write($ctr, 1, $applicantName, $format_border);
            $worksheet->write($ctr, 2, $email, $format_border);
            $worksheet->write($ctr, 3, $strAckNo, $format_border);
            $worksheet->write($ctr, 4, $strCourseType, $format_border);
            $worksheet->write($ctr, 5, $strSkill, $format_border);

            $worksheet->write($ctr, 6, $strDocutType, $format_border);
           // $worksheet->writeNumber($ctr, 7, $strAadharNo, $num_format);
            //$worksheet->write($ctr, 7, $strDocutNumber, $format_border);
            $worksheet->write($ctr, 7, $strAddress, $format_border);

            $worksheet->write($ctr, 8, $registeDate, $format_border);

        }

        $workbook->close();
        $objDevelop->DownloadFile('temp/' . $fileName);
        exit();
    }

     /*
    Function to Display Skill Development Details of SAP ERP.
    By: Rahul Kumar Saw
    On: 31-July-2020
     */

    public function exportSkillDevelopmentDataSAP($strNumber, $intCourse, $strStartDt, $strEndDate,$paymentStatus,$eligibleStatus,$assignStatus,$instituteName)
    {
        include_once CLASS_PATH . 'clsSkillDevelopment.php';

        $objDevelop = new clsSkillDevelopment;

        $intcourse = 'SAP ERP';
        $instituteId = $_SESSION['institute_id'];
        if($instituteId!=9)
        {
            $sessinstituteId =$instituteId;
        }
        else
        {
            $sessinstituteId = 0;
        }
        $arrConditions=array('number'=> $strNumber , 'startDate'=> $strStartDt , 'endDate'=> $strEndDate , 'courseType'=> $intcourse,'instituteId' =>$sessinstituteId , 'paymentStatus' =>$paymentStatus,'eligibleStatus'=>$eligibleStatus,'assignStatus'=>$assignStatus,'instituteName'=>$instituteName);

        $excelResult     = $objDevelop->manageskillDevelopment('V', $arrConditions); 


        $fileName = "SkillDevelopment_SAP" . time() . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet('Skill Development Registration Details, Skill-Odisha-2022');
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        //$worksheet->setMerge(0, 0, 0,13);
        $ctr = 1;
        $worksheet->setRow(0, 30);
        /*if($instituteId!=9)  {
        $worksheet->setColumn(0, 14, 20);
        }*/
        $worksheet->setColumn(0, 19, 20); 
        
        // $worksheet->write(0, 0, 'Registered Applicants-Skill Odisha-2019', $format_bold_h1);
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Applicant Name', $format_title);
        $worksheet->write(0, 2, 'Registration No.', $format_title);
        $worksheet->write(0, 3, 'Course Type', $format_title);
        $worksheet->write(0, 4, 'Courses', $format_title);
        $worksheet->write(0, 5, 'College / Institute Roll / Registration Number', $format_title);
        $worksheet->write(0, 6, 'Branch / Discipline', $format_title);
        $worksheet->write(0, 7, 'Semester', $format_title);
        $worksheet->write(0, 8, 'Interested For Courses', $format_title);
        $worksheet->write(0, 9, 'College / Institution Name', $format_title);
        $worksheet->write(0, 10, 'Document Type', $format_title);
        //$worksheet->write(0, 13, 'Document Number', $format_title);
        $worksheet->write(0, 11, 'Address', $format_title);
        $worksheet->write(0, 12, 'Registered On', $format_title);
        $worksheet->write(0, 13, 'Email', $format_title);
        
        $worksheet->write(0, 14, 'Mobile Number', $format_title);
        $worksheet->write(0, 15, 'Test Mark', $format_title);
        $worksheet->write(0, 16, 'Eligibility', $format_title);
        $worksheet->write(0, 17, 'Test Attemped', $format_title);
        $worksheet->write(0, 18, 'Attend Date', $format_title);
        $worksheet->write(0, 19, 'Payment Status', $format_title);
        /*if($instituteId==9 || $instituteId==0)  {
        $worksheet->write(0, 20, 'Login Id Status', $format_title);
        }*/

        while ($row = $excelResult->fetch_array()) {
            $ctr++;
            $applicantName = htmlspecialchars_decode($row['vchName'], ENT_QUOTES);
            $email = htmlspecialchars_decode($row['vchEmail'], ENT_QUOTES);
            $strSkill = htmlspecialchars_decode($row['vchSkill'], ENT_QUOTES);
            $strAckNo = htmlspecialchars_decode($row['vchRegdNumber'], ENT_QUOTES);
            $strCourseType = htmlspecialchars_decode($row['vchCourseType'], ENT_QUOTES);
            $strDocutType = htmlspecialchars_decode($row['vchDocumentType'], ENT_QUOTES);
            $strDocutNumber = htmlspecialchars_decode($row['vchDocumentNumber'], ENT_QUOTES);
            $strcolRegdNo = htmlspecialchars_decode($row['vchInstituteRegdNo'], ENT_QUOTES);
            $strCourses = htmlspecialchars_decode($row['vchCoursesFor'], ENT_QUOTES);
            
            $strSemester = htmlspecialchars_decode($row['vchSemester'], ENT_QUOTES);
            $strInterCourse = htmlspecialchars_decode($row['interestedCourseName'], ENT_QUOTES);
            $strAddress = htmlspecialchars_decode($row['vchAddress'], ENT_QUOTES);
            $strMobile = htmlspecialchars_decode($row['vchMobile'], ENT_QUOTES);
            $instituteName = htmlspecialchars_decode($row['instituteName'], ENT_QUOTES);
            $strBranch = htmlspecialchars_decode($row['branchName'], ENT_QUOTES);
            $strMark = $row['intTestMark'];
            if($row['tinEligibleStatus']==1)
            {
                $status = 'Qualifiled';
            }
            else if($row['tinEligibleStatus']==2)
            {
                $status = 'Not Qualifiled';
            }
            else
            {
                $status = 'Not Attempted';
            }
            if($row['tinAttend']==1)
            {
                $attend = 'Yes';
            }
            else
            {
                $attend = 'No';
            }
            if($row['dtmAttendDate']=='0000-00-00 00:00:00')
            {
                $attendDate = 'Not Attempted';
            }
            else
            {
                $attendDate = date('d-M-Y', strtotime($row['dtmAttendDate']));
            }

             if($row['tinPayStatus']==1)
            {
                $payStatus = 'Paid';
            }
            else if($row['tinPayStatus']==2)
            {
                $payStatus = 'Failed';
            } /*else if($row['tinPayStatus']==3)
            {
                $payStatus = 'Cancel';
            }*/
            else
            {
                $payStatus = 'Not Paid';
            }

            if($row['intAssignedStatus']==2)
            {
                $assignStatus = 'Assigned';
            }
            else
            {
                $assignStatus = 'Not Assigned';
            }

            $registeDate = date('d-M-Y', strtotime($row['stmCreatedOn']));

            $worksheet->write($ctr, 0, ($ctr - 1), $format_border);
            $worksheet->write($ctr, 1, $applicantName, $format_border);
            $worksheet->write($ctr, 2, $strAckNo, $format_border);
            $worksheet->write($ctr, 3, $strCourseType, $format_border);
            $worksheet->write($ctr, 4, $strCourses, $format_border);
            $worksheet->write($ctr, 5, $strcolRegdNo, $format_border);
            $worksheet->write($ctr, 6, $strBranch, $format_border);
            $worksheet->write($ctr, 7, $strSemester, $format_border);
            $worksheet->write($ctr, 8, $strInterCourse, $format_border);
            $worksheet->write($ctr, 9, $instituteName, $format_border);
            $worksheet->write($ctr, 10, $strDocutType, $format_border);
            //$worksheet->write($ctr, 13, $strDocutNumber, $format_border);
            $worksheet->write($ctr, 11, $strAddress, $format_border);
            $worksheet->write($ctr, 12, $registeDate, $format_border);
            $worksheet->write($ctr, 13, $email, $format_border);
            //if($instituteId!=9)  { 
            $worksheet->write($ctr, 14, $strMobile, $format_border);
            $worksheet->write($ctr, 15, $strMark, $format_border);
            $worksheet->write($ctr, 16, $status, $format_border);
            $worksheet->write($ctr, 17, $attend, $format_border);
            $worksheet->write($ctr, 18, $attendDate, $format_border);
            $worksheet->write($ctr, 19, $payStatus, $format_border);
            /*if($instituteId==9 || $instituteId==0)  {
            $worksheet->write($ctr, 20, $assignStatus, $format_border);
            }*/

        }

        $workbook->close();
        $objDevelop->DownloadFile('temp/' . $fileName);
        exit();
    }
 /*
    Function to Go skill registration Details.
    By: Rahul Kumar Saw
    On: 04-Nov-2020
     */

    public function exportSkillInformation($strStartDt, $strEndDate)
    {
        include_once CLASS_PATH . 'clsSkillInformation.php';

        $objDevelop = new clsSkillInformation;

        
        $arrConditions=array('startDate'=> $strStartDt , 'endDate'=> $strEndDate);

        $excelResult     = $objDevelop->manageskillInformation('V', $arrConditions); 


        $fileName = "Job_Seeker_Registration" . time() . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet('Job Seeker Report, Skill-Odisha-2022');
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');
        $ctr = 1;
        $worksheet->setRow(0, 30);
        
        $worksheet->setColumn(0, 28, 20); 
        
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Applicant Name', $format_title);
        $worksheet->write(0, 2, 'Age', $format_title);
        $worksheet->write(0, 3, 'Gender', $format_title);
        $worksheet->write(0, 4, 'Address', $format_title);
        $worksheet->write(0, 5, 'Qualification', $format_title);
        $worksheet->write(0, 6, 'Applying For', $format_title);
        $worksheet->write(0, 7, 'Trained in the job role', $format_title);
        $worksheet->write(0, 8, 'Contact Number', $format_title);
        $worksheet->write(0, 9, 'Email', $format_title);
        $worksheet->write(0, 10, 'move out of the State', $format_title);
        //$worksheet->write(0, 11, 'Age', $format_title);
        $worksheet->write(0, 11, 'Application Id', $format_title);
        $worksheet->write(0, 12, 'Experience in Years Number', $format_title);
        $worksheet->write(0, 13, 'Experience Details', $format_title);
        $worksheet->write(0, 14, 'Date Of Birth', $format_title);
        $worksheet->write(0, 15, 'Institute Type', $format_title);
        $worksheet->write(0, 16, 'Institute Name', $format_title);
        $worksheet->write(0, 17, 'Valid Certification', $format_title);
        $worksheet->write(0, 18, 'Skill Details 1', $format_title);
        $worksheet->write(0, 19, 'Skill Details 2', $format_title);
        $worksheet->write(0, 20, 'State Name', $format_title);
        $worksheet->write(0, 21, 'District', $format_title);
        $worksheet->write(0, 22, 'ULB/Block', $format_title);
        $worksheet->write(0, 23, 'Ward/Gram Panchayat', $format_title);
        $worksheet->write(0, 24, 'Village', $format_title);
        $worksheet->write(0, 25, 'Language you speak', $format_title);
        $worksheet->write(0, 26, 'Other Information', $format_title);
        $worksheet->write(0, 27, 'Registered On', $format_title);
        

        while ($row = $excelResult->fetch_array()) {
            $ctr++;
            $applicantName = htmlspecialchars_decode($row['vchName'], ENT_QUOTES);
            $email = htmlspecialchars_decode($row['vchEmail'], ENT_QUOTES);
            $strMobile = htmlspecialchars_decode($row['vchMobile'], ENT_QUOTES);
            $strAddress = htmlspecialchars_decode($row['vchAddress'], ENT_QUOTES);
            $strAge = $row['intAge'];
            $expYear = $row['intYearOfExp'];

            $experience =  !empty($row['vchExperience'])?htmlspecialchars_decode($row['vchExperience'],ENT_NOQUOTES):'--';
            $information =  !empty($row['vchInformation'])?htmlspecialchars_decode($row['vchInformation'],ENT_NOQUOTES):'--';
            if($row['intFromOdisha']==2)
            {
            $vchStateName =  !empty($row['vchStateName'])?htmlspecialchars_decode($row['vchStateName'],ENT_NOQUOTES):'--';
            $districtName =  !empty($row['vchDistrict'])?htmlspecialchars_decode($row['vchDistrict'],ENT_NOQUOTES):'--';
            $blockName =  !empty($row['vchBlock'])?htmlspecialchars_decode($row['vchBlock'],ENT_NOQUOTES):'--';
            $panchayatName =  !empty($row['vchGP'])?htmlspecialchars_decode($row['vchGP'],ENT_NOQUOTES):'--';
            $villageName =  !empty($row['vchVillage'])?htmlspecialchars_decode($row['vchVillage'],ENT_NOQUOTES):'--';
            }
            else
            {
            $vchStateName =  !empty($row['vchStateName'])?htmlspecialchars_decode($row['vchStateName'],ENT_NOQUOTES):'--';
            $districtName =  !empty($row['districtName'])?htmlspecialchars_decode($row['districtName'],ENT_NOQUOTES):'--';
            $blockName =  !empty($row['blockName'])?htmlspecialchars_decode($row['blockName'],ENT_NOQUOTES):'--';
            $panchayatName =  !empty($row['panchayatName'])?htmlspecialchars_decode($row['panchayatName'],ENT_NOQUOTES):'--';
            $villageName =  !empty($row['villageName'])?htmlspecialchars_decode($row['villageName'],ENT_NOQUOTES):'--';
            }
            $skilldetails1 =  !empty($row['vchSkillName1'])?htmlspecialchars_decode($row['vchSkillName1'],ENT_NOQUOTES):'--';
            $skilldetails2 =  !empty($row['vchSkillName2'])?htmlspecialchars_decode($row['vchSkillName2'],ENT_NOQUOTES):'--';
            $speakLanguage =  !empty($row['vchSpeakLang'])?htmlspecialchars_decode($row['vchSpeakLang'],ENT_NOQUOTES):'--';
            
            $applyingFor = $row['intJobRole'];
            if($row['intValidCertificate']==1)
            {
               $certification = 'Yes'; 
            }
            else if($row['intValidCertificate']==2)
            {
                $certification = 'No';
            }
            else
            {
                $certification = '--';
            }

            
            $strSerial = $row['vchSlNumber'];
            if($row['intGender']==1)
                {
                    $gender = 'Male';
                } else if($row['intGender']==2)
                {
                    $gender = 'Female';
                }
                else
                {
                    $gender = 'Transgender';
                }
                if($row['intQualificationId']==1)
                {
                    $qualification = 'Below 10th';
                }
                else if($row['intQualificationId']==2)
                {
                    $qualification = '10th Pass';
                }
                else if($row['intQualificationId']==3)
                {
                    $qualification ='12th Pass';
                }
                else if($row['intQualificationId']==4)
                {
                    $qualification = 'ITI/Diploma';
                }
                else if($row['intQualificationId']==5)
                {
                    $qualification = 'Graduate';
                }
                else if($row['intQualificationId']==6)
                {
                    $qualification = 'Post Graduate';
                }
                else if($row['intQualificationId']==7)
                {
                    $qualification = 'No Formal Education';
                }
                if($row['intInstituteType']==1)
                {
                    $instituteType = 'Govt. ITI';
                    $instituteName = $row['instituteName'];
                } else if($row['intInstituteType']==2)
                {
                    $instituteType = 'Govt. Polytechnic';
                    $instituteName = $row['instituteName'];
                } else
                {
                    $instituteType = 'Training Partner';
                    $instituteName = $row['trainingName'];
                }
                if($row['intMoveStatus']==1)
                {
                    $moveStatus = 'Yes';
                } else if($row['intMoveStatus']==2)
                {
                    $moveStatus = 'No';
                }
                if($row['intTrained']==1)
                {
                    $trained = 'Yes';
                }
                else
                {
                    $trained = 'No';
                }
            $registeDate = date('d-M-Y', strtotime($row['stmCreatedOn']));
            $dob = date('d-M-Y', strtotime($row['dtmDob']));

            $worksheet->write($ctr, 0, ($ctr - 1), $format_border);
            $worksheet->write($ctr, 1, $applicantName, $format_border);
            $worksheet->write($ctr, 2, $strAge, $format_border);
            $worksheet->write($ctr, 3, $gender, $format_border);
            $worksheet->write($ctr, 4, $strAddress, $format_border);
            $worksheet->write($ctr, 5, $qualification, $format_border);
            $worksheet->write($ctr, 6, $applyingFor, $format_border);
            $worksheet->write($ctr, 7, $trained, $format_border);
            $worksheet->write($ctr, 8, $strMobile, $format_border);
            $worksheet->write($ctr, 9, $email, $format_border);
            $worksheet->write($ctr, 10, $moveStatus, $format_border);
            $worksheet->write($ctr, 11, $strSerial, $format_border);
            $worksheet->write($ctr, 12, $expYear, $format_border);
            $worksheet->write($ctr, 13, $experience, $format_border);
            $worksheet->write($ctr, 14, $dob, $format_border);
            $worksheet->write($ctr, 15, $instituteType, $format_border);
            $worksheet->write($ctr, 16, $instituteName, $format_border);
            $worksheet->write($ctr, 17, $certification, $format_border);
            $worksheet->write($ctr, 18, $skilldetails1, $format_border);
            $worksheet->write($ctr, 19, $skilldetails2, $format_border);
            $worksheet->write($ctr, 20, $vchStateName, $format_border);
            $worksheet->write($ctr, 21, $districtName, $format_border);
            $worksheet->write($ctr, 22, $blockName, $format_border);
            $worksheet->write($ctr, 23, $panchayatName, $format_border);
            $worksheet->write($ctr, 24, $villageName, $format_border);
            $worksheet->write($ctr, 25, $speakLanguage, $format_border);
            $worksheet->write($ctr, 26, $information, $format_border);
            $worksheet->write($ctr, 27, $registeDate, $format_border);

        }

        $workbook->close();
        $objDevelop->DownloadFile('temp/' . $fileName);
        exit();
    }


    /*
    Function to Display Skill Competion result.
    By: Rahul kumar Saw
    On: 19-Mar-2021
     */

    public function exportSkillCompititionResult($strName,  $intQualify)
    {
        include_once CLASS_PATH . 'clsSkillCompetition.php';

        $objCompete = new clsSkillCompetition;
        $excelResult = $objCompete->manageSkillCompetition('VQ', 0, 0, 0, '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 0, '', '', '', 0, '', 0, '', 0, $intQualify, $strName, 0, 0, 0, '0000-00-00', '0000-00-00');

        $fileName = "SkillCompResult" . time() . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet('Registration Result, Skill-Odisha-2022');
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        //$worksheet->setMerge(0, 0, 0,13);
        $ctr = 1;
        $worksheet->setRow(0, 30);
        $worksheet->setColumn(0, 13, 20);
        // $worksheet->write(0, 0, 'Registered Applicants-Skill Odisha-2019', $format_bold_h1);
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Applicant Name', $format_title);
        $worksheet->write(0, 2, 'Acknowledgement No.', $format_title);
        $worksheet->write(0, 3, 'Mobile Number', $format_title);
        $worksheet->write(0, 4, 'Email', $format_title);
        $worksheet->write(0, 5, 'Applied Skill', $format_title);
        $worksheet->write(0, 6, 'Aadhar ID', $format_title);
        $worksheet->write(0, 7, 'District', $format_title);
        $worksheet->write(0, 8, 'Qualification', $format_title);
        $worksheet->write(0, 9, 'Result', $format_title);

        while ($row = $excelResult->fetch_array()) {
            $ctr++;
            $applicantName = htmlspecialchars_decode($row['vchFirstName'], ENT_QUOTES) . ' ' . htmlspecialchars_decode($row['vchMiddleName'], ENT_QUOTES) . ' ' . htmlspecialchars_decode($row['vchLastName'], ENT_QUOTES);
            $mobNum = $row['vchPhoneno'];
            $email = htmlspecialchars_decode($row['vchEmailId'], ENT_QUOTES);
            $strSkill = htmlspecialchars_decode($row['strSkills'], ENT_QUOTES);
            $strAckNo = htmlspecialchars_decode($row['vchAckNo'], ENT_QUOTES);
            $strAadharNo = htmlspecialchars_decode($row['vchAadharId'], ENT_QUOTES);
            $strDistName = htmlspecialchars_decode($row['vchDistrictName'], ENT_QUOTES);

            $qualification = ($row['intQualificationId'] == 101) ? 'Others' : htmlspecialchars_decode($row['vchQualification'], ENT_QUOTES);
            $result = ($row['intQualify'] == 0) ? 'Not Qualified' : 'Qualified';
           
            $worksheet->write($ctr, 0, ($ctr - 1), $format_border);
            $worksheet->write($ctr, 1, $applicantName, $format_border);
            $worksheet->write($ctr, 2, $strAckNo, $format_border);
            $worksheet->write($ctr, 3, $mobNum, $format_border);
            $worksheet->write($ctr, 4, $email, $format_border);

            $worksheet->write($ctr, 5, $strSkill, $format_border);
            $worksheet->writeNumber($ctr, 6, $strAadharNo, $num_format);
            $worksheet->write($ctr, 7, $strDistName, $format_border);
            $worksheet->write($ctr, 8, $qualification, $format_border);
            $worksheet->write($ctr, 8, $result, $format_border);

        }

        $workbook->close();
        $objCompete->DownloadFile('temp/' . $fileName);
        exit();
    }

    /*
    Function to Display Venue Report.
    By: Rahul Kumar Saw
    On: 29-April-2021
     */

    public function exportVenueMaster($intDistid,$strEmployeeName)
    { 
        include_once CLASS_PATH . 'clsVenue.php';

        $objVenue = new clsVenue;
        $excelResult = $objVenue->manageVenue('V',0,$intDistid,$strEmployeeName,'','','','',0,'','',0,0,0,0);

        $sheetName = 'Venue Report';

        $fileName = "Venue_Report_" . date('d_m_Y', time()) . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet($sheetName . ", Venue Master");
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white', 'halign' => 'center'));
        $format_border->setTextWrap();
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        $column_centered = &$workbook->addFormat(array('size' => 10, 'border' => 1, 'bordercolor' => 'black', "halign" => 'center', 'fgcolor' => 'white'));
        $column_centered->setBold();
        $column_centered->setColor('red');
        $column_centered->setAlign('center');
        //$worksheet->setMerge(0, 0, 0,13);
        $ctr = 1;
        $worksheet->setRow(0, 10);
        $worksheet->setColumn(0, 2, 10);
        $worksheet->setColumn(1, 1, 10);
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Venue Name', $format_title);
        $worksheet->write(0, 2, 'Venue Officer Name', $format_title);
        $worksheet->write(0, 3, 'District', $format_title);
        $worksheet->write(0, 4, 'Email', $format_title);
        $worksheet->write(0, 5, 'Contact Number', $format_title);
        $worksheet->write(0, 6, 'Capacity', $format_title);
        $worksheet->write(0, 7, 'Address', $format_title);
        $worksheet->write(0, 8, 'Google Map Address', $format_title);
        $worksheet->write(0, 9, 'Created On', $format_title);
       

        while ($row = $excelResult->fetch_array()) {

            $venueName = htmlspecialchars_decode($row['vchVenueName'], ENT_QUOTES);
            $officerName = htmlspecialchars_decode($row['vchOfficerName'], ENT_QUOTES);
            $districtName = htmlspecialchars_decode($row['vchDistrictname'], ENT_QUOTES);
            $emailId = htmlspecialchars_decode($row['vchEmailId'], ENT_QUOTES);
            $mobileNo = htmlspecialchars_decode($row['vchOfficerMobile'], ENT_QUOTES);
            $address = htmlspecialchars_decode($row['vchAddress'], ENT_QUOTES);
            $mapAddress = htmlspecialchars_decode($row['vchMapAddress'], ENT_QUOTES);
            $capacity = $row['intCapacity'];
            $CreatedDate = date('d-M-Y', strtotime($row['stmCreatedOn']));
            
            $worksheet->write($ctr, 0, ($ctr), $format_border);
            $worksheet->write($ctr, 1, $venueName, $format_border);
            $worksheet->write($ctr, 2, $officerName, $format_border);
            $worksheet->write($ctr, 3, $districtName, $format_border);
            $worksheet->write($ctr, 4, $emailId, $format_border);
            $worksheet->write($ctr, 5, $mobileNo, $format_border);
            $worksheet->write($ctr, 6, $capacity, $format_border);
            $worksheet->write($ctr, 7, $address, $format_border);
            $worksheet->write($ctr, 8, $mapAddress, $format_border);
            $worksheet->write($ctr, 9, $CreatedDate, $format_border);
            $ctr++;
        }

        $workbook->close();
        $objVenue->DownloadFile('temp/' . $fileName);
    }

    /*
    Function to Display Skill Result Details.
    By: Rahul kumar Saw
    On: 03-Aug-2021
     */

    public function exportSkillResultData($skillId, $distId, $level, $marks, $qualify,$regdType,$gender)
    {
        include_once CLASS_PATH . 'clsResult.php';

        $objResult = new clsResult;
        $excelResult = $objResult->manageResult('VQ', 0,$distId,$skillId,'','','','','','',$marks,$level,0,$qualify,0,0,'','',$gender,$regdType);

        $fileName = "SkillResult" . time() . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet('Result Details, Skill-Odisha-2022');
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        $ctr = 1;
        $worksheet->setRow(0, 10);
        $worksheet->setColumn(0, 15, 20);
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Applicant Name', $format_title);
        $worksheet->write(0, 2, 'Acknowledgement No.', $format_title);
        $worksheet->write(0, 3, 'Mobile Number', $format_title);
        $worksheet->write(0, 4, 'Email', $format_title);
        $worksheet->write(0, 5, 'District', $format_title);
        $worksheet->write(0, 6, 'Applied Skill', $format_title);
        $worksheet->write(0, 7, 'Marks', $format_title);
        $worksheet->write(0, 8, 'Qualify Status', $format_title);
        $worksheet->write(0, 9, 'Gender', $format_title);


        while ($row = $excelResult->fetch_array()) {
            $ctr++;
            $applicantName = htmlspecialchars_decode($row['vchFirstName'], ENT_QUOTES) . ' ' . htmlspecialchars_decode($row['vchMiddleName'], ENT_QUOTES) . ' ' . htmlspecialchars_decode($row['vchLastName'], ENT_QUOTES);
            $mobNum = $row['vchPhoneno'];
            $email = htmlspecialchars_decode($row['vchEmailId'], ENT_QUOTES);
            $strSkill = htmlspecialchars_decode($row['strSkills'], ENT_QUOTES);
            $strAckNo = htmlspecialchars_decode($row['vchAckNo'], ENT_QUOTES);
            $marks = htmlspecialchars_decode($row['intMarks'], ENT_QUOTES);
            $strDistName = htmlspecialchars_decode($row['vchDistrictName'], ENT_QUOTES);
            $quaStatus = ($row['intStatus']==0)?'Not Qualified':'Qualified';
            $tinGender = $row['tinGender'];
            if ($tinGender == 1) {
                $strGender = 'Male';
            } else if ($tinGender == 2) {
                $strGender = 'Female';
            } else {
                $strGender = 'Others';
            }
            $worksheet->write($ctr, 0, ($ctr - 1), $format_border);
            $worksheet->write($ctr, 1, $applicantName, $format_border);
            $worksheet->write($ctr, 2, $strAckNo, $format_border);
            $worksheet->write($ctr, 3, $mobNum, $format_border);
            $worksheet->write($ctr, 4, $email, $format_border);
            $worksheet->write($ctr, 5, $strDistName, $format_border);
            $worksheet->write($ctr, 6, $strSkill, $format_border);
            $worksheet->write($ctr, 7, $marks, $format_border);
            $worksheet->write($ctr, 8, $quaStatus, $format_border);
            $worksheet->write($ctr, 9, $strGender, $format_border);
            
        }

        $workbook->close();
        $objResult->DownloadFile('temp/' . $fileName);
        exit();
    }



    /*
    Function to Display Skill Marks Details.
    By: Rahul kumar Saw
    On: 03-Aug-2021
     */

    public function exportSkillMarkData($skillId, $distId, $level,$regdType,$gender)
    {
        include_once CLASS_PATH . 'clsResult.php';

        $objResult = new clsResult;
        $excelResult = $objResult->manageResult('VR', 0,$distId,$skillId,'','','','','','','',$level,0,0,0,0,'','',$gender,$regdType);

        $fileName = "SkillMarks" . time() . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet('Marks Details, Skill-Odisha-2022');
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        $ctr = 1;
        $worksheet->setRow(0, 10);
        $worksheet->setColumn(0, 15, 20);
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Applicant Name', $format_title);
        $worksheet->write(0, 2, 'Acknowledgement No.', $format_title);
        $worksheet->write(0, 3, 'Mobile Number', $format_title);
        $worksheet->write(0, 4, 'Email', $format_title);
        $worksheet->write(0, 5, 'District', $format_title);
        $worksheet->write(0, 6, 'Applied Skill', $format_title);
        $worksheet->write(0, 7, 'Gender', $format_title);
        $worksheet->write(0, 8, 'Marks', $format_title);


        while ($row = $excelResult->fetch_array()) {
            $ctr++;
            $applicantName = htmlspecialchars_decode($row['vchFirstName'], ENT_QUOTES) . ' ' . htmlspecialchars_decode($row['vchMiddleName'], ENT_QUOTES) . ' ' . htmlspecialchars_decode($row['vchLastName'], ENT_QUOTES);
            $mobNum = $row['vchPhoneno'];
            $email = htmlspecialchars_decode($row['vchEmailId'], ENT_QUOTES);
            $strSkill = htmlspecialchars_decode($row['strSkills'], ENT_QUOTES);
            $strAckNo = htmlspecialchars_decode($row['vchAckNo'], ENT_QUOTES);
            $marks = htmlspecialchars_decode($row['intMarks'], ENT_QUOTES);
            $strDistName = htmlspecialchars_decode($row['vchDistrictName'], ENT_QUOTES);
            $quaStatus = ($row['intStatus']==0)?'Not Qualified':'Qualified';
            $tinGender = $row['tinGender'];
            if ($tinGender == 1) {
                $strGender = 'Male';
            } else if ($tinGender == 2) {
                $strGender = 'Female';
            } else {
                $strGender = 'Others';
            }
            $worksheet->write($ctr, 0, ($ctr - 1), $format_border);
            $worksheet->write($ctr, 1, $applicantName, $format_border);
            $worksheet->write($ctr, 2, $strAckNo, $format_border);
            $worksheet->write($ctr, 3, $mobNum, $format_border);
            $worksheet->write($ctr, 4, $email, $format_border);
            $worksheet->write($ctr, 5, $strDistName, $format_border);
            $worksheet->write($ctr, 6, $strSkill, $format_border);
            $worksheet->write($ctr, 7, $strGender, $format_border);
            $worksheet->write($ctr, 8, $marks, $format_border);
            
        }

        $workbook->close();
        $objResult->DownloadFile('temp/' . $fileName);
        exit();
    }


    /*
    Function to Display Skill Result Details.
    By: Rahul kumar Saw
    On: 03-Aug-2021
     */

    public function exportPanelResultData($skillId, $distId, $marks, $qualify)
    {
        include_once CLASS_PATH . 'clsPanel.php';

        $objPanel = new clsPanel;
        $userId     = $_SESSION['adminConsole_userID'];
        if($_SESSION['adminConsole_userID']==1)
        {
            $userId     = 0;
        }
        else
        {
            $userId     = $_SESSION['adminConsole_userID'];
        }
        $excelResult = $objPanel->managePanel('VQ',0,$marks,$skillId,'','','','','','','','',$distId,0,$userId,0,'','',0,0);

        $fileName = "PanelSkillResult" . time() . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet('Panel Result Details, Skill-Odisha-2022');
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        $ctr = 1;
        $worksheet->setRow(0, 10);
        $worksheet->setColumn(0, 15, 20);
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Applicant Name', $format_title);
        $worksheet->write(0, 2, 'Acknowledgement No.', $format_title);
        $worksheet->write(0, 3, 'Mobile Number', $format_title);
        $worksheet->write(0, 4, 'Email', $format_title);
        $worksheet->write(0, 5, 'District', $format_title);
        $worksheet->write(0, 6, 'Applied Skill', $format_title);
        $worksheet->write(0, 7, 'Marks', $format_title);
        $worksheet->write(0, 8, 'Qualify Status', $format_title);


        while ($row = $excelResult->fetch_array()) {
            $ctr++;
            $applicantName = htmlspecialchars_decode($row['vchFirstName'], ENT_QUOTES) . ' ' . htmlspecialchars_decode($row['vchMiddleName'], ENT_QUOTES) . ' ' . htmlspecialchars_decode($row['vchLastName'], ENT_QUOTES);
            $mobNum = $row['vchPhoneno'];
            $email = htmlspecialchars_decode($row['vchEmailId'], ENT_QUOTES);
            $strSkill = htmlspecialchars_decode($row['strSkills'], ENT_QUOTES);
            $strAckNo = htmlspecialchars_decode($row['vchAckNo'], ENT_QUOTES);
            $marks = htmlspecialchars_decode($row['intMarks'], ENT_QUOTES);
            $strDistName = htmlspecialchars_decode($row['vchDistrictName'], ENT_QUOTES);
            $quaStatus = ($row['intStatus']==0)?'Not Qualified':'Qualified';
            
            $worksheet->write($ctr, 0, ($ctr - 1), $format_border);
            $worksheet->write($ctr, 1, $applicantName, $format_border);
            $worksheet->write($ctr, 2, $strAckNo, $format_border);
            $worksheet->write($ctr, 3, $mobNum, $format_border);
            $worksheet->write($ctr, 4, $email, $format_border);
            $worksheet->write($ctr, 5, $strDistName, $format_border);
            $worksheet->write($ctr, 6, $strSkill, $format_border);
            $worksheet->write($ctr, 7, $marks, $format_border);
            $worksheet->write($ctr, 8, $quaStatus, $format_border);
            
        }

        $workbook->close();
        $objPanel->DownloadFile('temp/' . $fileName);
        exit();
    }



    /*
    Function to Display panel Skill Marks Details.
    By: Rahul kumar Saw
    On: 07-Aug-2021
     */

    public function exportEnterMarkData($skillId, $distId)
    {
        include_once CLASS_PATH . 'clsPanel.php';

        $objPanel = new clsPanel;
        $userId     = $_SESSION['adminConsole_userID'];
        if($_SESSION['adminConsole_userID']==1)
        {
            $userId     = 0;
        }
        else
        {
            $userId     = $_SESSION['adminConsole_userID'];
        }
        $excelResult = $objPanel->managePanel('VR',0,0,$skillId,'','','','','','','','',$distId,0,$userId,0,'','',0,0);

        $fileName = "PanelMarks" . time() . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet('Panel Marks Details, Skill-Odisha-2022');
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        $ctr = 1;
        $worksheet->setRow(0, 10);
        $worksheet->setColumn(0, 15, 20);
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Applicant Name', $format_title);
        $worksheet->write(0, 2, 'Acknowledgement No.', $format_title);
        $worksheet->write(0, 3, 'Mobile Number', $format_title);
        $worksheet->write(0, 4, 'Email', $format_title);
        $worksheet->write(0, 5, 'District', $format_title);
        $worksheet->write(0, 6, 'Applied Skill', $format_title);
        $worksheet->write(0, 7, 'Mark', $format_title);


        while ($row = $excelResult->fetch_array()) {
            $ctr++;
            $applicantName = htmlspecialchars_decode($row['vchFirstName'], ENT_QUOTES) . ' ' . htmlspecialchars_decode($row['vchMiddleName'], ENT_QUOTES) . ' ' . htmlspecialchars_decode($row['vchLastName'], ENT_QUOTES);
            $mobNum = $row['vchPhoneno'];
            $email = htmlspecialchars_decode($row['vchEmailId'], ENT_QUOTES);
            $strSkill = htmlspecialchars_decode($row['strSkills'], ENT_QUOTES);
            $strAckNo = htmlspecialchars_decode($row['vchAckNo'], ENT_QUOTES);
            $marks = htmlspecialchars_decode($row['intMarks'], ENT_QUOTES);
            $strDistName = htmlspecialchars_decode($row['vchDistrictName'], ENT_QUOTES);
            $quaStatus = ($row['intStatus']==0)?'Not Qualified':'Qualified';
            
            $worksheet->write($ctr, 0, ($ctr - 1), $format_border);
            $worksheet->write($ctr, 1, $applicantName, $format_border);
            $worksheet->write($ctr, 2, $strAckNo, $format_border);
            $worksheet->write($ctr, 3, $mobNum, $format_border);
            $worksheet->write($ctr, 4, $email, $format_border);
            $worksheet->write($ctr, 5, $strDistName, $format_border);
            $worksheet->write($ctr, 6, $strSkill, $format_border);
            $worksheet->write($ctr, 7, $marks, $format_border);
            
        }

        $workbook->close();
        $objPanel->DownloadFile('temp/' . $fileName);
        exit();
    }




    /*
    Function to Display Venue Report.
    By: Rahul Kumar Saw
    On: 29-April-2021
     */

    public function exportTaggedMember()
    {
        include_once CLASS_PATH . 'clsVenueTagged.php';

        $objVenueTag = new clsVenueTagged;
        $skillId            = (isset($_SESSION['skillId']))?$_SESSION['skillId']:0;
        $distId             = (isset($_SESSION['distId']))?$_SESSION['distId']:0;
        $venueId            = (isset($_SESSION['venueId']))?$_SESSION['venueId']:0;

        $excelResult = $objVenueTag->manageVenueTagged('VT',0,'',0,$skillId,$distId,$venueId,'1000-01-01','00:00:00',0,'','',0);

        $sheetName = 'Tagged Member Report';

        $fileName = "Tagged_Member_Report_" . date('d_m_Y', time()) . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet($sheetName . ", Tagged Member");
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white', 'halign' => 'center'));
        $format_border->setTextWrap();
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        $column_centered = &$workbook->addFormat(array('size' => 10, 'border' => 1, 'bordercolor' => 'black', "halign" => 'center', 'fgcolor' => 'white'));
        $column_centered->setBold();
        $column_centered->setColor('red');
        $column_centered->setAlign('center');
        //$worksheet->setMerge(0, 0, 0,13);
        $ctr = 1;
        $worksheet->setRow(0, 10);
        $worksheet->setColumn(0, 6, 10);
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Applicant Name', $format_title);
        $worksheet->write(0, 2, 'Competition Id', $format_title);
        $worksheet->write(0, 3, 'Skill', $format_title);
        $worksheet->write(0, 4, 'Venue', $format_title);
        $worksheet->write(0, 5, 'Tagged Date', $format_title);
       

        while ($row = $excelResult->fetch_array()) {

            $applicantName = htmlspecialchars_decode($row['applicantName'], ENT_QUOTES);
            $strSkills = htmlspecialchars_decode($row['strSkills'], ENT_QUOTES);
            $venueName = htmlspecialchars_decode($row['venueName'], ENT_QUOTES);
            $competitionId = htmlspecialchars_decode($row['competitionId'], ENT_QUOTES);
            $CreatedDate = date('d-M-Y', strtotime($row['stmCreatedOn']));
            
            $worksheet->write($ctr, 0, ($ctr), $format_border);
            $worksheet->write($ctr, 1, $applicantName, $format_border);
            $worksheet->write($ctr, 2, $competitionId, $format_border);
            $worksheet->write($ctr, 3, $strSkills, $format_border);
            $worksheet->write($ctr, 4, $venueName, $format_border);
            $worksheet->write($ctr, 5, $CreatedDate, $format_border);
            $ctr++;
        }

        $workbook->close();
        $objVenueTag->DownloadFile('temp/' . $fileName);
        exit();
    }


    /*
    Function to tender report Details.
    By: Rahul kumar Saw
    On: 01-Feb-2022
     */

    public function exportTenderReport($intTenderType, $strStartDt,$strEndDate)
    {
        include_once CLASS_PATH . 'clsTender.php';

        $objTender = new clsTender;
       
        $excelResult  = $objTender->manageTender('TR',0,$intTenderType,'','','','','',$strStartDt,$strEndDate,'','',0,0,0,0,BLANK_DATE,BLANK_DATE,BLANK_DATE,'','',0,0,'','');

        $fileName = "TenderReport" . time() . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet('Tender Details, Tender Report');
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        $ctr = 1;
        $worksheet->setRow(0, 8);
        $worksheet->setColumn(0, 15, 20);
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Tender Type', $format_title);
        $worksheet->write(0, 2, 'Title', $format_title);
        $worksheet->write(0, 3, 'Title in Odia', $format_title);
        $worksheet->write(0, 4, 'Opening Date', $format_title);
        $worksheet->write(0, 5, 'Closing Date', $format_title);
        $worksheet->write(0, 6, 'Created By', $format_title);
        $worksheet->write(0, 7, 'Updated By', $format_title);
        $worksheet->write(0, 8, 'Updated On', $format_title);


        while ($row = $excelResult->fetch_array()) {
            $ctr++;
            $type = $row['INT_TENDER_TYPE'];
            if($type==1)
            {
                $tenderType ='Advertisement';
            }
            else if($type==2)
            {
                $tenderType ='Notice';
            } else if($type==3)
            {
                $tenderType ='ERP';
            } else if($type==4)
            {
                $tenderType ='EOI';
            }
            $title = htmlspecialchars_decode($row['VCH_TENDER_TITLE'], ENT_QUOTES);
            $odiaTitle = htmlspecialchars_decode($row['VCH_TENDER_TITLE_O'], ENT_QUOTES);
            $openDt = date("d-M-Y, h:i A",strtotime(htmlspecialchars_decode($row['DTM_OPENING_DATETIME'],ENT_QUOTES)));
            $closeDt = date("d-M-Y, h:i A",strtotime(htmlspecialchars_decode($row['DTM_CLOSING_DATETIME'],ENT_QUOTES)));
            $udatedOn = date("d-M-Y",strtotime(htmlspecialchars_decode($row['DTM_CREATED_ON'],ENT_QUOTES)));
            $updatedBy = $row['updatedBy'];
            $createdBy = $row['createdBy'];
            
            $worksheet->write($ctr, 0, ($ctr - 1), $format_border);
            $worksheet->write($ctr, 1, $tenderType, $format_border);
            $worksheet->write($ctr, 2, $title, $format_border);
            $worksheet->write($ctr, 3, $odiaTitle, $format_border);
            $worksheet->write($ctr, 4, $openDt, $format_border);
            $worksheet->write($ctr, 5, $closeDt, $format_border);
            $worksheet->write($ctr, 6, $createdBy, $format_border);
            $worksheet->write($ctr, 7, $updatedBy, $format_border);
            $worksheet->write($ctr, 8, $udatedOn, $format_border);
            
        }

        $workbook->close();
        $objTender->DownloadFile('temp/' . $fileName);
        exit();
    }

    /*
    Function to export institute details.
    By: Rahul kumar Saw
    On: 06-May-2022
     */

    public function exportSkillInstituteData()
    {
        include_once CLASS_PATH . 'clsSkillInsRegd.php';

        $objIns = new clsSkillInsRegd;
        $userId     = $_SESSION['adminConsole_userID'];
        $arrConditions=array();
        $excelResult = $objIns->manageSkillInsRegd('VA',$arrConditions);

        $fileName = "Skill_Institute" . time() . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet('Skill Institute Details, Digital Skilling-2022');
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        $ctr = 1;
        $worksheet->setRow(0, 10);
        $worksheet->setColumn(0, 15, 20);
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Institute Name ', $format_title);
        $worksheet->write(0, 2, 'Email Id', $format_title);
        $worksheet->write(0, 3, 'Contact No.', $format_title);
        $worksheet->write(0, 4, 'PAN Number', $format_title);
        $worksheet->write(0, 5, 'Institute Regd No.', $format_title);
        $worksheet->write(0, 6, 'Institute Address', $format_title);
        $worksheet->write(0, 7, 'Total Tagged Program', $format_title);


        while ($row = $excelResult->fetch_array()) {
            $ctr++;
            $insName  = htmlspecialchars_decode($row['vchInsName'], ENT_QUOTES);
            $insEmail = htmlspecialchars_decode($row['vchInsEmail'], ENT_QUOTES);
            $insMobile= htmlspecialchars_decode($row['vchInsMobile'], ENT_QUOTES); 
            $insPan   = htmlspecialchars_decode($row['vchPan'], ENT_QUOTES);
            $insRegdNo=  htmlspecialchars_decode($row['vchRegdNo'], ENT_QUOTES);
            $insAddress= htmlspecialchars_decode($row['vchAddress'], ENT_QUOTES);
            
            $worksheet->write($ctr, 0, ($ctr - 1), $format_border);
            $worksheet->write($ctr, 1, $insName, $format_border);
            $worksheet->write($ctr, 2, $insEmail, $format_border);
            $worksheet->write($ctr, 3, $insMobile, $format_border);
            $worksheet->write($ctr, 4, $insPan, $format_border);
            $worksheet->write($ctr, 5, $insRegdNo, $format_border);
            $worksheet->write($ctr, 6, $insAddress, $format_border);
            $worksheet->write($ctr, 7, $row['totalProgram'], $format_border);
            
        }

        $workbook->close();
        $objIns->DownloadFile('temp/' . $fileName);
        exit();
    }

    /*
    Function to export TP Registration Request details.
    By: Rahul kumar Saw
    On: 06-May-2022
     */

    public function exportTPRegistration($vchOrgName,$tinApproveStatus,$vchRefNumber)
    {
        include_once CLASS_PATH . 'clsSkillTP.php';

        $objTP        = new clsSkillTP; 
        $userId     = $_SESSION['adminConsole_userID'];
        $arrConditions=array('vchOrgName'=>$vchOrgName,'vchRefNumber'=>$vchRefNumber,'tinApproveStatus'=>$tinApproveStatus);
        $excelResult = $objTP->manageskillTP('V', $arrConditions);

        $fileName = "Training_Partner" . time() . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet('Training Partner Registartion details, Digital Skilling-2022');
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        $ctr = 1;
        $worksheet->setRow(0, 10);
        $worksheet->setColumn(0, 15, 20);
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Training Partner Name ', $format_title);
        $worksheet->write(0, 2, 'Partner Regd No.', $format_title);
        $worksheet->write(0, 3, 'Person Name', $format_title);
        $worksheet->write(0, 4, 'Person Email Id', $format_title);
        $worksheet->write(0, 5, 'Person Mobile No.', $format_title);
        $worksheet->write(0, 6, 'Reference No.', $format_title);
        $worksheet->write(0, 7, 'Status', $format_title);
        $worksheet->write(0, 8, 'Remarks', $format_title);


        while ($row = $excelResult->fetch_array()) {
            $ctr++;
            $vchOrgName  = htmlspecialchars_decode($row['vchOrgName'], ENT_QUOTES);
            $vchRegdNo = htmlspecialchars_decode($row['vchRegdNo'], ENT_QUOTES);
            $vchConName= htmlspecialchars_decode($row['vchConName'], ENT_QUOTES); 
            $vchConEmail   = htmlspecialchars_decode($row['vchConEmail'], ENT_QUOTES);
            $vchConMobile=  htmlspecialchars_decode($row['vchConMobile'], ENT_QUOTES);
            $insAddress= htmlspecialchars_decode($row['vchAddress'], ENT_QUOTES);
            $status = $row['tinApproveStatus']; 
            if($status==1){
            $action=  "Approved"; }
            else if($status==2) {
              $action= "Rejected";} else { $action='--';}
            
            $worksheet->write($ctr, 0, ($ctr - 1), $format_border);
            $worksheet->write($ctr, 1, $vchOrgName, $format_border);
            $worksheet->write($ctr, 2, $vchRegdNo, $format_border);
            $worksheet->write($ctr, 3, $vchConName, $format_border);
            $worksheet->write($ctr, 4, $vchConEmail, $format_border);
            $worksheet->write($ctr, 5, $vchConMobile, $format_border);
            $worksheet->write($ctr, 6, $row['vchRefNumber'], $format_border);
            $worksheet->write($ctr, 7, $action, $format_border);
            $worksheet->write($ctr, 8, $row['vchAppRemark'], $format_border);
            
        }

        $workbook->close();
        $objTP->DownloadFile('temp/' . $fileName);
        exit();
    }

    /*
    Function to export institute registration details.
    By: Rahul kumar Saw
    On: 06-May-2022
     */

    public function exportSkillInstituteRegistration($vchInsName,$vchRefNumber,$tinApproveStatus)
    {
        include_once CLASS_PATH . 'clsSkillInsRegd.php';

        $objIns = new clsSkillInsRegd;
        $userId     = $_SESSION['adminConsole_userID'];
        $arrConditions=array('vchInsName'=>$vchInsName,'vchRefNumber'=>$vchRefNumber,'tinApproveStatus'=>$tinApproveStatus);
        $excelResult = $objIns->manageSkillInsRegd('V',$arrConditions);

        $fileName = "Skill_Institute_Registration" . time() . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet('Skill Institute Registration Details, Digital Skilling-2022');
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        $ctr = 1;
        $worksheet->setRow(0, 10);
        $worksheet->setColumn(0, 15, 20);
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Instute Name ', $format_title);
        $worksheet->write(0, 2, 'Institute Regd No.', $format_title);
        $worksheet->write(0, 3, 'Person Name', $format_title);
        $worksheet->write(0, 4, 'Person Email Id', $format_title);
        $worksheet->write(0, 5, 'Person Mobile No.', $format_title);
        $worksheet->write(0, 6, 'Reference No.', $format_title);
        $worksheet->write(0, 7, 'Status', $format_title);
        $worksheet->write(0, 8, 'Remarks', $format_title);


        while ($row = $excelResult->fetch_array()) {
            $ctr++;
            $vchInsName  = htmlspecialchars_decode($row['vchInsName'], ENT_QUOTES);
            $vchRegdNo = htmlspecialchars_decode($row['vchRegdNo'], ENT_QUOTES);
            $vchConName= htmlspecialchars_decode($row['vchConName'], ENT_QUOTES); 
            $vchConEmail   = htmlspecialchars_decode($row['vchConEmail'], ENT_QUOTES);
            $vchConMobile=  htmlspecialchars_decode($row['vchConMobile'], ENT_QUOTES);
            $status = $row['tinApproveStatus']; 
            if($status==1){
            $action=  "Approved"; }
            else if($status==2) {
              $action= "Rejected";} else { $action='--';}
            $worksheet->write($ctr, 0, ($ctr - 1), $format_border);
            $worksheet->write($ctr, 1, $vchInsName, $format_border);
            $worksheet->write($ctr, 2, $vchRegdNo, $format_border);
            $worksheet->write($ctr, 3, $vchConName, $format_border);
            $worksheet->write($ctr, 4, $vchConEmail, $format_border);
            $worksheet->write($ctr, 5, $vchConMobile, $format_border);
            $worksheet->write($ctr, 6, $row['vchRefNumber'], $format_border);
            $worksheet->write($ctr, 7, $action, $format_border);
            $worksheet->write($ctr, 8, $row['vchAppRemark'], $format_border);
            
        }

        $workbook->close();
        $objIns->DownloadFile('temp/' . $fileName);
        exit();
    }

    /*
    Function to export TP Program Registration Request details.
    By: Rahul kumar Saw
    On: 06-May-2022
     */

    public function exportSkillProgramRegistration($vchOrgName,$tinApproveStatus)
    {
        include_once CLASS_PATH . 'clsSkillTP.php';

        $objTP        = new clsSkillTP; 
        $userId     = $_SESSION['adminConsole_userID'];
        $arrConditions=array('vchOrgName'=>$vchOrgName,'tinApproveStatus'=>$tinApproveStatus);
        $excelResult = $objTP->manageskillTP('DP', $arrConditions);

        $fileName = "Training_Partner_Program" . time() . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet('Training Partner Program Registartion details, Digital Skilling-2022');
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        $ctr = 1;
        $worksheet->setRow(0, 10);
        $worksheet->setColumn(0, 15, 20);
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Training Partner Name ', $format_title);
        $worksheet->write(0, 2, 'Program Name', $format_title);
        $worksheet->write(0, 3, 'Start Date', $format_title);
        $worksheet->write(0, 4, 'End Date', $format_title);
        $worksheet->write(0, 5, 'Program Fee', $format_title);
        $worksheet->write(0, 6, 'Status', $format_title);
        $worksheet->write(0, 7, 'Remark', $format_title);


        while ($row = $excelResult->fetch_array()) {
            $ctr++;
            $vchOrgName= htmlspecialchars_decode($row['orgname'], ENT_QUOTES);
            $vchProgram= htmlspecialchars_decode($row['vchProgramName'], ENT_QUOTES);
            $startDate = date('d-M-Y', strtotime($row['dtmStartDate']));
            $endDate   =  date('d-M-Y', strtotime($row['dtmEndDate']));
            $programFee=($row['intProgramFee']>0)?$row['intProgramFee']:'Free';
            $status = $row['tinApproveStatus']; 
            if($status==1){
            $action=  "Approved"; }
            else if($status==2) {
              $action= "Rejected";} else { $action='--';}
            
            $worksheet->write($ctr, 0, ($ctr - 1), $format_border);
            $worksheet->write($ctr, 1, $vchOrgName, $format_border);
            $worksheet->write($ctr, 2, $vchProgram, $format_border);
            $worksheet->write($ctr, 3, $startDate, $format_border);
            $worksheet->write($ctr, 4, $endDate, $format_border);
            $worksheet->write($ctr, 5, $programFee, $format_border);
            $worksheet->write($ctr, 6, $action, $format_border);
            $worksheet->write($ctr, 7, $row['vchAppRemark'], $format_border);
            
        }

        $workbook->close();
        $objTP->DownloadFile('temp/' . $fileName);
        exit();
    }

    /*
    Function to export Skill Competition attandance details.
    By: Rahul kumar Saw
    On: 30-May-2022
     */

    public function exportSkillAttandance($skillId, $distId,$level,$attandance)
    {
        include_once(CLASS_PATH.'clsResult.php');

        $objResult            = new  clsResult;
        $userId     = $_SESSION['adminConsole_userID'];
        $excelResult = $objResult->manageResult('VRA',0,$distId,$skillId,'','','','','','',$attandance,$level,0,0,0,0,'','',0,0);

        $fileName = "Skill_Competition_Attandance" . time() . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet('Attandance Details, Skill Competition-2022');
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        $ctr = 1;
        $worksheet->setRow(0, 10);
        $worksheet->setColumn(0, 15, 20);
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Applicant Name ', $format_title);
        $worksheet->write(0, 2, 'Mobile Number', $format_title);
        $worksheet->write(0, 3, 'Email Id', $format_title);
        $worksheet->write(0, 4, 'Registration No.', $format_title);
        $worksheet->write(0, 5, 'Applied Skill', $format_title);
        $worksheet->write(0, 6, 'District', $format_title);
        $worksheet->write(0, 7, 'Attendance', $format_title);
        $worksheet->write(0, 8, 'Marks', $format_title);
        $worksheet->write(0, 9, 'Level', $format_title);


        while ($row = $excelResult->fetch_array()) {
            $ctr++;
            if($row['intLevel']=='L1' || $row['intLevel']=='L2' )
            {
                $marks = $row['intMarks'];
            } else if($row['intLevel']=='L3')
            {
                $marks = $row['intLevel3Marks'];
            }
            else
            {
               $marks = ''; 
            }
            if($row['intLevel']=='L1' )
            {
                $attendance = $row['tinLevelIStatus'];
            } else if($row['intLevel']=='L2')
            {
                $attendance = $row['tinLevelIIStatus'];
            }
            else if($row['intLevel']=='L3')
            {
                $attendance = $row['tinLevel3Status'];
            }
            else
            {
               $attendance = ''; 
            }
            if($attendance==1)
            {
                $attenStatus = 'Present';
            } else if($attendance==2)
            {
                $attenStatus = 'Reject';
            }
            else
            {
                $attenStatus = 'Absent';
            }
            $applicantName= htmlspecialchars_decode($row['vchFirstName'], ENT_QUOTES).' '.htmlspecialchars_decode($row['vchMiddleName'], ENT_QUOTES).' '.htmlspecialchars_decode($row['vchLastName'], ENT_QUOTES);
            $emailId= htmlspecialchars_decode($row['vchEmailId'],ENT_QUOTES);
            $mobileNO = $row['vchPhoneno'];
            $registrationNo   =  htmlspecialchars_decode($row['vchAckNo'], ENT_QUOTES);
            $skillName=htmlspecialchars_decode($row['strSkills'], ENT_QUOTES); 
            $distName = htmlspecialchars_decode($row['vchDistrictName'], ENT_QUOTES);
            if($status==1){
            $action=  "Approved"; }
            else if($status==2) {
              $action= "Rejected";} else { $action='--';}
            
            $worksheet->write($ctr, 0, ($ctr - 1), $format_border);
            $worksheet->write($ctr, 1, $applicantName, $format_border);
            $worksheet->write($ctr, 2, $mobileNO, $format_border);
            $worksheet->write($ctr, 3, $emailId, $format_border);
            $worksheet->write($ctr, 4, $registrationNo, $format_border);
            $worksheet->write($ctr, 5, $skillName, $format_border);
            $worksheet->write($ctr, 6, $distName, $format_border);
            $worksheet->write($ctr, 7, $attenStatus, $format_border);
            $worksheet->write($ctr, 8, $marks, $format_border);
            $worksheet->write($ctr, 9, $row['intLevel'], $format_border);
            
        }

        $workbook->close();
        $objResult->DownloadFile('temp/' . $fileName);
        exit();
    }

    /*
    Function to Display Dist Wise Report.
    By: Rahul Kumar Saw
    On: 05-July-2022
     */

    public function exportDistWiseData($regdType,$gender)
    {
        include_once CLASS_PATH . 'clsReport.php';

        $objReport = new clsReport;
        $excelResult = $objReport->manageReport('DW',0, $regdType,'','','', '1000-01-01',0,$gender,0,'1000-01-01','1000-01-01');

        $sheetName = 'District Wise SKill Report';

        $fileName = "Dist_wise_skill_report_" . date('d_m_Y', time()) . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet($sheetName . ", Skill-Odisha-2022");
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white', 'halign' => 'center'));
        $format_border->setTextWrap();
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        $column_centered = &$workbook->addFormat(array('size' => 10, 'border' => 1, 'bordercolor' => 'black', "halign" => 'center', 'fgcolor' => 'white'));
        $column_centered->setBold();
        $column_centered->setColor('red');
        $column_centered->setAlign('center');
        //$worksheet->setMerge(0, 0, 0,13);
        $ctr = 1;
        $worksheet->setRow(0, 20);
        $worksheet->setColumn(0, 2, 20);
        $worksheet->setColumn(1, 1, 40);
        // $worksheet->write(0, 0, 'Registered Applicants-Skill Odisha-2019', $format_bold_h1);
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'District Name', $format_title);
        $worksheet->write(0, 2, 'No. Of Applicants', $format_title);
        $totalApplicantCount = 0;

        while ($row = $excelResult->fetch_array()) {

            $distName = htmlspecialchars_decode($row['vchDistrictname'], ENT_QUOTES);
            $applicantNum = $row['totalCandidate'];
            $totalApplicantCount += $applicantNum;
            $worksheet->write($ctr, 0, ($ctr), $format_border);
            $worksheet->write($ctr, 1, $distName, $format_border);
            $worksheet->write($ctr, 2, $applicantNum, $format_border);
            $worksheet->setRow($ctr, 30);
            $ctr++;
        }

        $worksheet->setMerge($ctr, 0, $ctr, 1);
        $worksheet->write($ctr, 0, 'TOTAL', $column_centered);
        $worksheet->write($ctr, 2, $totalApplicantCount, $column_centered);

        $workbook->close();
        $objReport->DownloadFile('temp/' . $fileName);
        exit();
    }

     /*
    Function to Display TP Wise Report.
    By: Rahul Kumar Saw
    On: 05-July-2022
     */

    public function exportTPWiseData()
    {
        include_once CLASS_PATH . 'clsReport.php';

        $objReport = new clsReport;
        $excelResult = $objReport->manageReport('TP',0, 0,'','','', '1000-01-01',0,0,0,'1000-01-01','1000-01-01');

        $sheetName = 'Training Partner Wise SKill Report';

        $fileName = "TP_wise_skill_report_" . date('d_m_Y', time()) . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet($sheetName . ", Digital Skilling-2022");
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white', 'halign' => 'center'));
        $format_border->setTextWrap();
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        $column_centered = &$workbook->addFormat(array('size' => 10, 'border' => 1, 'bordercolor' => 'black', "halign" => 'center', 'fgcolor' => 'white'));
        $column_centered->setBold();
        $column_centered->setColor('red');
        $column_centered->setAlign('center');
        //$worksheet->setMerge(0, 0, 0,13);
        $ctr = 1;
        $worksheet->setRow(0, 20);
        $worksheet->setColumn(0, 2, 20);
        $worksheet->setColumn(1, 1, 40);
        // $worksheet->write(0, 0, 'Registered Applicants-Skill Odisha-2019', $format_bold_h1);
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Training Partner Name', $format_title);
        $worksheet->write(0, 2, 'No. Of Applicants', $format_title);
        $totalApplicantCount = 0;

        while ($row = $excelResult->fetch_array()) {

            $tpName = htmlspecialchars_decode($row['vchOrgName'], ENT_QUOTES);
            $applicantNum = $row['totalCandidate'];
            $totalApplicantCount += $applicantNum;
            $worksheet->write($ctr, 0, ($ctr), $format_border);
            $worksheet->write($ctr, 1, $tpName, $format_border);
            $worksheet->write($ctr, 2, $applicantNum, $format_border);
            $worksheet->setRow($ctr, 30);
            $ctr++;
        }

        $worksheet->setMerge($ctr, 0, $ctr, 1);
        $worksheet->write($ctr, 0, 'TOTAL', $column_centered);
        $worksheet->write($ctr, 2, $totalApplicantCount, $column_centered);

        $workbook->close();
        $objReport->DownloadFile('temp/' . $fileName);
        exit();
    }

     /*
    Function to Display Institute Wise Report.
    By: Rahul Kumar Saw
    On: 07-July-2022
     */

    public function exportInsWiseData()
    {
        include_once CLASS_PATH . 'clsReport.php';

        $objReport = new clsReport;
        $excelResult = $objReport->manageReport('IW',0, 0,'','','', '1000-01-01',0,0,0,'1000-01-01','1000-01-01');

        $sheetName = 'Institute Wise SKill Report';

        $fileName = "Institute_wise_skill_report_" . date('d_m_Y', time()) . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet($sheetName . ", Digital Skilling-2022");
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white', 'halign' => 'center'));
        $format_border->setTextWrap();
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        $column_centered = &$workbook->addFormat(array('size' => 10, 'border' => 1, 'bordercolor' => 'black', "halign" => 'center', 'fgcolor' => 'white'));
        $column_centered->setBold();
        $column_centered->setColor('red');
        $column_centered->setAlign('center');
        //$worksheet->setMerge(0, 0, 0,13);
        $ctr = 1;
        $worksheet->setRow(0, 20);
        $worksheet->setColumn(0, 2, 20);
        $worksheet->setColumn(1, 1, 40);
        // $worksheet->write(0, 0, 'Registered Applicants-Skill Odisha-2019', $format_bold_h1);
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Institute Name', $format_title);
        $worksheet->write(0, 2, 'No. Of Applicants', $format_title);
        $totalApplicantCount = 0;

        while ($row = $excelResult->fetch_array()) {

            $insName = htmlspecialchars_decode($row['vchInsName'], ENT_QUOTES);
            $applicantNum = $row['totalCandidate'];
            $totalApplicantCount += $applicantNum;
            $worksheet->write($ctr, 0, ($ctr), $format_border);
            $worksheet->write($ctr, 1, $insName, $format_border);
            $worksheet->write($ctr, 2, $applicantNum, $format_border);
            $worksheet->setRow($ctr, 30);
            $ctr++;
        }

        $worksheet->setMerge($ctr, 0, $ctr, 1);
        $worksheet->write($ctr, 0, 'TOTAL', $column_centered);
        $worksheet->write($ctr, 2, $totalApplicantCount, $column_centered);

        $workbook->close();
        $objReport->DownloadFile('temp/' . $fileName);
        exit();
    }

     /*
    Function to Display Program Wise Report.
    By: Rahul Kumar Saw
    On: 07-July-2022
     */

    public function exportProgramWiseData()
    {
        include_once CLASS_PATH . 'clsReport.php';

        $objReport = new clsReport;
        $excelResult = $objReport->manageReport('PW',0, 0,'','','', '1000-01-01',0,0,0,'1000-01-01','1000-01-01');

        $sheetName = 'Program Wise SKill Report';

        $fileName = "Program_wise_skill_report_" . date('d_m_Y', time()) . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet($sheetName . ", Digital Skilling-2022");
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white', 'halign' => 'center'));
        $format_border->setTextWrap();
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        $column_centered = &$workbook->addFormat(array('size' => 10, 'border' => 1, 'bordercolor' => 'black', "halign" => 'center', 'fgcolor' => 'white'));
        $column_centered->setBold();
        $column_centered->setColor('red');
        $column_centered->setAlign('center');
        //$worksheet->setMerge(0, 0, 0,13);
        $ctr = 1;
        $worksheet->setRow(0, 20);
        $worksheet->setColumn(0, 2, 20);
        $worksheet->setColumn(1, 1, 40);
        // $worksheet->write(0, 0, 'Registered Applicants-Skill Odisha-2019', $format_bold_h1);
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Program Name', $format_title);
        $worksheet->write(0, 2, 'No. Of Applicants', $format_title);
        $totalApplicantCount = 0;

        while ($row = $excelResult->fetch_array()) {

            $programName = htmlspecialchars_decode($row['vchProgramName'], ENT_QUOTES);
            $applicantNum = $row['totalCandidate'];
            $totalApplicantCount += $applicantNum;
            $worksheet->write($ctr, 0, ($ctr), $format_border);
            $worksheet->write($ctr, 1, $programName, $format_border);
            $worksheet->write($ctr, 2, $applicantNum, $format_border);
            $worksheet->setRow($ctr, 30);
            $ctr++;
        }

        $worksheet->setMerge($ctr, 0, $ctr, 1);
        $worksheet->write($ctr, 0, 'TOTAL', $column_centered);
        $worksheet->write($ctr, 2, $totalApplicantCount, $column_centered);

        $workbook->close();
        $objReport->DownloadFile('temp/' . $fileName);
        exit();
    }


    /*
    Function to Display digital skilling candidate Details.
    By: Rahul Kumar Saw
    On: 13-July-2022
     */

    public function exportDigitalSkillData($strNumber,$strStartDt, $strEndDate,$paymentStatus,$eligibleStatus,$assignStatus,$instituteName,$program,$regStatus,$insPaymentStatus,$tpId)
    {
        include_once CLASS_PATH . 'clsSkillDevelopment.php';

        $objDevelop = new clsSkillDevelopment;
        $privilege   = $_SESSION['userPrivilege'];
        $instituteId = $_SESSION['institute_id'];
        if($privilege==3)
        {
            $arrConditions=array('number'=> $strNumber , 'startDate'=> $strStartDt , 'endDate'=> $strEndDate  , 'paymentStatus'=> $paymentStatus ,'eligibleStatus'=>$eligibleStatus,'assignStatus' =>$assignStatus,'instituteName' =>$instituteName,'tpId'=>$instituteId,'insPaymentStatus'=>$insPaymentStatus,'program'=>$program,'regStatus'=>$regStatus,'tppId'=>$tpId);
        }
        else if($privilege ==4)
        {
            $arrConditions=array('number'=> $strNumber , 'startDate'=> $strStartDt , 'endDate'=> $strEndDate  ,'paymentStatus'=> $paymentStatus ,'eligibleStatus'=>$eligibleStatus,'assignStatus' =>$assignStatus,'instituteName' =>$instituteName,'instituteId'=>$instituteId,'insPaymentStatus'=>$insPaymentStatus,'program'=>$program,'regStatus'=>$regStatus,'tppId'=>$tpId);
        }
        else
        {
             $arrConditions=array('number'=> $strNumber , 'startDate'=> $strStartDt , 'endDate'=> $strEndDate  , 'paymentStatus'=> $paymentStatus ,'eligibleStatus'=>$eligibleStatus,'assignStatus' =>$assignStatus,'instituteName' =>$instituteName,'insPaymentStatus'=>$insPaymentStatus,'program'=>$program,'regStatus'=>$regStatus,'tppId'=>$tpId);
        }

        $excelResult     = $objDevelop->manageskillDevelopment('VR', $arrConditions); 


        $fileName = "Digital_skilling_program" . time() . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet('Digital Skill Registration Details, Skill-Odisha-2022');
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        
        $ctr = 1;
        $worksheet->setRow(0, 30);
      
        $worksheet->setColumn(0, 19, 20); 
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Applicant Name', $format_title);
        $worksheet->write(0, 2, 'Registration No.', $format_title);
        $worksheet->write(0, 3, 'Courses sought for (TP)', $format_title);
        $worksheet->write(0, 4, 'Courses', $format_title);
        $worksheet->write(0, 5, 'College / Institute Roll / Registration Number', $format_title);
        $worksheet->write(0, 6, 'Branch / Discipline', $format_title);
        $worksheet->write(0, 7, 'Semester', $format_title);
        $worksheet->write(0, 8, 'Program', $format_title);
        $worksheet->write(0, 9, 'College / Institution Name', $format_title);
        $worksheet->write(0, 10, 'Document Type', $format_title);
        $worksheet->write(0, 11, 'Address', $format_title);
        $worksheet->write(0, 12, 'Registered On', $format_title);
        $worksheet->write(0, 13, 'Email', $format_title);        
        $worksheet->write(0, 14, 'Mobile Number', $format_title);
        $worksheet->write(0, 15, 'Student Payment Status', $format_title);
        $worksheet->write(0, 16, 'Institute Payment Status', $format_title);
        $worksheet->write(0, 17, 'Program Fee', $format_title);
      

        while ($row = $excelResult->fetch_array()) {
            $ctr++;
            $applicantName = htmlspecialchars_decode($row['vchName'], ENT_QUOTES);
            $email = htmlspecialchars_decode($row['vchEmail'], ENT_QUOTES);
            $strAckNo = htmlspecialchars_decode($row['vchRegdNumber'], ENT_QUOTES);
            $strCourseType = htmlspecialchars_decode($row['tpName'], ENT_QUOTES);
            $strDocutType = htmlspecialchars_decode($row['vchDocumentType'], ENT_QUOTES);
            $strDocutNumber = htmlspecialchars_decode($row['vchDocumentNumber'], ENT_QUOTES);
            $strcolRegdNo = htmlspecialchars_decode($row['vchInstituteRegdNo'], ENT_QUOTES);
            $strCourses = htmlspecialchars_decode($row['vchCoursesFor'], ENT_QUOTES);
            
            $strSemester = htmlspecialchars_decode($row['vchSemester'], ENT_QUOTES);
            $strInterCourse = htmlspecialchars_decode($row['interestedCourseName'], ENT_QUOTES);
            $strAddress = htmlspecialchars_decode($row['vchAddress'], ENT_QUOTES);
            $strMobile = htmlspecialchars_decode($row['vchMobile'], ENT_QUOTES);
            $strBranch = htmlspecialchars_decode($row['branchName'], ENT_QUOTES);
            if($row['tinPayStatus']==1)
            {
                $payStatus = 'Paid';
            }
            else if($row['tinPayStatus']==2)
            {
                $payStatus = 'Failed';
            } 
            else
            {
                $payStatus = 'Not Paid';
            }
            if($row['tinInsPayStatus']==1)
            {
                $inspayStatus = 'Paid';
            }
            else if($row['tinInsPayStatus']==2)
            {
                $inspayStatus = 'Failed';
            }
            else
            {
                $inspayStatus = 'Not Paid';
            }
            
            if($row['intInstituteId']==1000)
            {
              $instituteName = $row['vchOtherInstituteName'];
            }
            else
            {
              $instituteName = $row['instituteName'];
            }
            $studentFee     = $row['intStudentFee'];
            $appStudFee     = $row['intAppStudFee'];
            if($appStudFee>0)
            {
               $programFee =  $appStudFee;
            }
            else
            {
                $programFee = $studentFee;
            }

            $registeDate = date('d-M-Y', strtotime($row['stmCreatedOn']));

            $worksheet->write($ctr, 0, ($ctr - 1), $format_border);
            $worksheet->write($ctr, 1, $applicantName, $format_border);
            $worksheet->write($ctr, 2, $strAckNo, $format_border);
            $worksheet->write($ctr, 3, $strCourseType, $format_border);
            $worksheet->write($ctr, 4, $strCourses, $format_border);
            $worksheet->write($ctr, 5, $strcolRegdNo, $format_border);
            $worksheet->write($ctr, 6, $strBranch, $format_border);
            $worksheet->write($ctr, 7, $strSemester, $format_border);
            $worksheet->write($ctr, 8, $strInterCourse, $format_border);
            $worksheet->write($ctr, 9, $instituteName, $format_border);
            $worksheet->write($ctr, 10, $strDocutType, $format_border);
            $worksheet->write($ctr, 11, $strAddress, $format_border);
            $worksheet->write($ctr, 12, $registeDate, $format_border);
            $worksheet->write($ctr, 13, $email, $format_border);
            $worksheet->write($ctr, 14, $strMobile, $format_border);
            $worksheet->write($ctr, 15, $payStatus, $format_border);
            $worksheet->write($ctr, 16, $inspayStatus, $format_border);
            $worksheet->write($ctr, 17, $programFee, $format_border);

        }

        $workbook->close();
        $objDevelop->DownloadFile('temp/' . $fileName);
        exit();
    }

    /*
    Function to Display digital skilling ToT Details.
    By: Rahul Kumar Saw
    On: 17-Mar-2023
     */

    public function exportDigitalSkillToTData($strNumber,$strStartDt, $strEndDate,$instituteName,$program,$tpId)
    {
        include_once CLASS_PATH . 'clsTotRegistration.php';

        $objDevelop = new clsTotRegistration;
        $privilege   = $_SESSION['userPrivilege'];
        $instituteId = $_SESSION['institute_id'];
        if($privilege==3)
        {
            $arrConditions=array('number'=> $strNumber , 'startDate'=> $strStartDt , 'endDate'=> $strEndDate  , 'paymentStatus'=> $paymentStatus ,'eligibleStatus'=>$eligibleStatus,'assignStatus' =>$assignStatus,'instituteName' =>$instituteName,'tpId'=>$instituteId,'insPaymentStatus'=>$insPaymentStatus,'program'=>$program,'regStatus'=>$regStatus,'tppId'=>$tpId);
        }
        else if($privilege ==4)
        {
            $arrConditions=array('number'=> $strNumber , 'startDate'=> $strStartDt , 'endDate'=> $strEndDate  ,'paymentStatus'=> $paymentStatus ,'eligibleStatus'=>$eligibleStatus,'assignStatus' =>$assignStatus,'instituteName' =>$instituteName,'instituteId'=>$instituteId,'insPaymentStatus'=>$insPaymentStatus,'program'=>$program,'regStatus'=>$regStatus,'tppId'=>$tpId);
        }
        else
        {
             $arrConditions=array('number'=> $strNumber , 'startDate'=> $strStartDt , 'endDate'=> $strEndDate  , 'paymentStatus'=> $paymentStatus ,'eligibleStatus'=>$eligibleStatus,'assignStatus' =>$assignStatus,'instituteName' =>$instituteName,'insPaymentStatus'=>$insPaymentStatus,'program'=>$program,'regStatus'=>$regStatus,'tppId'=>$tpId);
        }

        $excelResult     = $objDevelop->manageTotRegistration('V', $arrConditions); 


        $fileName = "Digital_skilling_ToT" . time() . ".xls";
        $workbook = new Spreadsheet_Excel_Writer('temp/' . $fileName);
        $workbook->setVersion(8);
        $worksheet = &$workbook->addWorksheet('ToT Registration Details, Skill-Odisha-2023');
        $worksheet->setInputEncoding('utf-8');
        $format_border = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $format_bold = &$workbook->addFormat();
        $format_bold->setBold();
        $format_title = &$workbook->addFormat();
        $format_title->setBold();
        $format_title->setColor('white');
        $format_title->setAlign('center');
        $format_title->setPattern(1);
        //$format_title->setFgColor('grey');
        $format_title->setFgColor(55);
        $format_title->setBorderColor('black');
        $format_title->setRight(1);
        $format_title->setBottom(1);
        $format_title->setLeft(1);
        $format_title->setTop(1);
        $format_title->setVAlign('center');
        $format_bold->setBorderColor('black');
        $format_bold_h1 = &$workbook->addFormat();
        $format_bold_h1->setBold();
        $format_bold_h1->setColor('white');
        $format_bold_h1->setAlign('center');
        $format_bold_h1->setPattern(1);
        $format_bold_h1->setFgColor(30);
        $format_bold_h1->setSize(15);

        $num_format = &$workbook->addFormat(array('right' => 1, 'bottom' => 1, 'pattern' => 1, 'bordercolor' => 'black', 'fgcolor' => 'white'));
        $num_format->setNumFormat('000000000000');

        
        $ctr = 1;
        $worksheet->setRow(0, 12);
      
        $worksheet->setColumn(0, 11, 12); 
        $worksheet->write(0, 0, 'Sl No.', $format_title);
        $worksheet->write(0, 1, 'Applicant Name', $format_title);
        $worksheet->write(0, 2, 'Mobile Number', $format_title);        
        $worksheet->write(0, 3, 'Email', $format_title);
        $worksheet->write(0, 4, 'Registration No.', $format_title);
        $worksheet->write(0, 5, 'Courses sought for (TP)', $format_title);
        $worksheet->write(0, 6, 'Program', $format_title);
        $worksheet->write(0, 7, 'College / Institution Name', $format_title);
        $worksheet->write(0, 8, 'Branch / Discipline', $format_title);
        $worksheet->write(0, 9, 'Document Type', $format_title);
        $worksheet->write(0, 10, 'Address', $format_title);
        $worksheet->write(0, 11, 'Registered On', $format_title);
      

        while ($row = $excelResult->fetch_array()) {
            $ctr++;
            $applicantName = htmlspecialchars_decode($row['vchName'], ENT_QUOTES);
            $email = htmlspecialchars_decode($row['vchEmail'], ENT_QUOTES);
            $strAckNo = htmlspecialchars_decode($row['vchRegdNumber'], ENT_QUOTES);
            $strCourseType = htmlspecialchars_decode($row['tpName'], ENT_QUOTES);
            $strDocutType = htmlspecialchars_decode($row['vchDocumentType'], ENT_QUOTES);
            $strDocutNumber = htmlspecialchars_decode($row['vchDocumentNumber'], ENT_QUOTES);
            $strInterCourse = htmlspecialchars_decode($row['interestedCourseName'], ENT_QUOTES);
            $strAddress = htmlspecialchars_decode($row['vchAddress'], ENT_QUOTES);
            $strMobile = htmlspecialchars_decode($row['vchMobile'], ENT_QUOTES);
            $strBranch = htmlspecialchars_decode($row['branchName'], ENT_QUOTES);
            
            if($row['intInstituteId']==1000)
            {
              $instituteName = $row['vchOtherInstituteName'];
            }
            else
            {
              $instituteName = $row['instituteName'];
            }
            

            $registeDate = date('d-M-Y', strtotime($row['stmCreatedOn']));

            $worksheet->write($ctr, 0, ($ctr - 1), $format_border);
            $worksheet->write($ctr, 1, $applicantName, $format_border);
            $worksheet->write($ctr, 2, $strMobile, $format_border);
            $worksheet->write($ctr, 3, $email, $format_border);
            $worksheet->write($ctr, 4, $strAckNo, $format_border);
            $worksheet->write($ctr, 5, $strCourseType, $format_border);
            $worksheet->write($ctr, 6, $strInterCourse, $format_border);
            $worksheet->write($ctr, 7, $instituteName, $format_border);
            $worksheet->write($ctr, 8, $strBranch, $format_border);
            $worksheet->write($ctr, 9, $strDocutType, $format_border);
            $worksheet->write($ctr, 10, $strAddress, $format_border);
            $worksheet->write($ctr, 11, $registeDate, $format_border);

        }

        $workbook->close();
        $objDevelop->DownloadFile('temp/' . $fileName);
        exit();
    }


}

/*
Function to Display Report Details.
By: Ashis kumar Patra
On: 28-FEB-2019
 */
//echo $page;exit;
if ($page == 'viewSkillCompetitionDetails' || $page == 'viewCandidateDetails' || $page == 'viewCandidateReport') {

    $strName = (isset($_REQUEST['txtSearch']) && $_REQUEST['txtSearch'] != '') ? $_REQUEST['txtSearch'] : '';
    $strStartDt = (isset($_REQUEST['txtStartDt']) && $_REQUEST['txtStartDt'] != '') ? date('Y-m-d', strtotime($_REQUEST['txtStartDt'])) : '0000-00-00';
    $strEndDate = (isset($_REQUEST['txtEndDt']) && $_REQUEST['txtEndDt'] != '') ? date('Y-m-d', strtotime($_REQUEST['txtEndDt'])) : '0000-00-00';

    $intSkill = (isset($_POST['selSkill']) && $_POST['selSkill'] != '') ? $_POST['selSkill'] : 0;
    $intDistrict = (isset($_POST['selDistrict']) && $_POST['selDistrict'] != '') ? $_POST['selDistrict'] : 0;
    $intBlock = (isset($_POST['selBlock']) && $_POST['selBlock'] != '') ? $_POST['selBlock'] : 0;
    $intQualify = (isset($_POST['selQualify']) && $_POST['selQualify'] != '') ? $_POST['selQualify'] : '0';
    $intConfirm = (isset($_POST['selConfirmation']) && $_POST['selConfirmation']!= '')?$_POST['selConfirmation']:'';
    $intUpdateSkill      = (isset($_POST['selUpdateSkill']) && $_POST['selUpdateSkill']!= '')?$_POST['selUpdateSkill']:0;
    $regdType            = (isset($_POST['selRegdType']) && $_POST['selRegdType']!= '')?$_POST['selRegdType']:3;
    $gender             = (isset($_POST['selGender']) && $_POST['selGender']!= '')?$_POST['selGender']:0;

    $objExcel = new clsExcelImport;
    //print_r($_POST);exit;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            $res = $objExcel->exportSkillCompititionData($strName, $intDistrict, $intBlock, $intSkill, $strStartDt, $strEndDate,$intQualify,$intConfirm,$intUpdateSkill,$regdType,$gender);
        }

    }

} else if (in_array($page, $pageArray)) {

    $strStartDt = (isset($_REQUEST['txtPublishDate']) && $_REQUEST['txtPublishDate'] != '') ? date('Y-m-d', strtotime($_REQUEST['txtPublishDate'])) : '1000-01-01';
    $strEndDate = (isset($_REQUEST['txtEndDt']) && $_REQUEST['txtEndDt'] != '') ? date('Y-m-d', strtotime($_REQUEST['txtEndDt'])) : '1000-01-01';
    $intQualification = (isset($_REQUEST['hdn_qualification']) && $_REQUEST['hdn_qualification'] != '') ? htmlspecialchars($_REQUEST['hdn_qualification'], ENT_QUOTES) : '0';
    $intType = (isset($_REQUEST['selType']) && $_REQUEST['selType'] != '') ? htmlspecialchars($_REQUEST['selType'], ENT_QUOTES) : '0';
    $regdType           = (isset($_POST['selRegdType']) && $_POST['selRegdType']!= '')?$_POST['selRegdType']:REGD_PHASE;


    $pageArray = array('viewITIReport', 'viewEngineeringReport', 'viewPolytechnicReport', 'viewGraduateReport', 'viewHMReport', 'viewNursingReport');
    switch ($page) {

        case 'viewITIReport':
            $strType = ($intType == 1) ? '1' : (($intType == 0) ? '1,2' : '2');
            break;
        case 'viewPolytechnicReport':
            $strType = ($intType == 3) ? '3' : (($intType == 0) ? '3,4' : '4');
            break;
        case 'viewEngineeringReport':
            $strType = ($intType == 5) ? '5' : (($intType == 0) ? '5,6' : '6');
            break;
        case 'viewGraduateReport':
            $strType = '7';
            break;
        case 'viewHMReport':
            $strType = '8';
            break;
        case 'viewNursingReport':
            $strType = '9,10';
            break;
        default:
            $strType = '0';
            break;

    }

    $objExcel = new clsExcelImport;
    //print_r($_POST);exit;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            $res = $objExcel->exportInstituteWiseData($strType, $intQualification, $strStartDt, $strEndDate,$regdType);
        }

    }

}


if ($page == 'viewOtherReport') {

    $strStartDt = (isset($_REQUEST['txtPublishDate']) && $_REQUEST['txtPublishDate'] != '') ? date('Y-m-d', strtotime($_REQUEST['txtPublishDate'])) : '1000-01-01';
    $strEndDate = (isset($_REQUEST['txtEndDt']) && $_REQUEST['txtEndDt'] != '') ? date('Y-m-d', strtotime($_REQUEST['txtEndDt'])) : '1000-01-01';
    $intQualification = (isset($_REQUEST['hdn_qualification']) && $_REQUEST['hdn_qualification'] != '') ? htmlspecialchars($_REQUEST['hdn_qualification'], ENT_QUOTES) : '0';
    $intType = (isset($_REQUEST['selType']) && $_REQUEST['selType'] != '') ? htmlspecialchars($_REQUEST['selType'], ENT_QUOTES) : '0';

    $objExcel = new clsExcelImport;
    //print_r($_POST);exit;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            $res = $objExcel->exportInstituteWiseOtherData($strType, $intQualification, $strStartDt, $strEndDate);
        }

    }

} 


if ($page == 'viewSkillReport') {
    $intSkillInstitute =(isset($_REQUEST['selSkillInstitute'])&& $_REQUEST['selSkillInstitute']!='')?htmlspecialchars($_REQUEST['selSkillInstitute'],ENT_QUOTES):'0';
    $regdType           = (isset($_POST['selRegdType']) && $_POST['selRegdType']!= '')?$_POST['selRegdType']:REGD_PHASE; 
    $gender             = (isset($_POST['selGender']) && $_POST['selGender']!= '')?$_POST['selGender']:0;
    $objExcel = new clsExcelImport;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            $res = $objExcel->exportSkillWiseData($intSkillInstitute,$regdType,$gender);
        }

    }

} 

if ($page == 'viewSkillDevelopment') {

    $strNumber = (isset($_REQUEST['txtRegdNumber']) && $_REQUEST['txtRegdNumber'] != '') ? $_REQUEST['txtRegdNumber'] : '';
    $strStartDt = (isset($_REQUEST['txtStartDt']) && $_REQUEST['txtStartDt'] != '') ? date('Y-m-d', strtotime($_REQUEST['txtStartDt'])) : '0000-00-00';
    $strEndDate = (isset($_REQUEST['txtEndDt']) && $_REQUEST['txtEndDt'] != '') ? date('Y-m-d', strtotime($_REQUEST['txtEndDt'])) : '0000-00-00';

    $intcourse = (isset($_POST['coursera']) && $_POST['coursera'] != '') ? $_POST['coursera'] : 'Coursera';

    $objExcel = new clsExcelImport;
    //print_r($_POST);exit;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            
            $res = $objExcel->exportSkillDevelopmentData($strNumber, $intcourse,$strStartDt, $strEndDate);
        }

    }

} 


if ($page == 'viewSapReport') {

    $strNumber = (isset($_REQUEST['txtRegdNumber']) && $_REQUEST['txtRegdNumber'] != '') ? $_REQUEST['txtRegdNumber'] : '';
    $strStartDt = (isset($_REQUEST['txtStartDt']) && $_REQUEST['txtStartDt'] != '') ? date('Y-m-d', strtotime($_REQUEST['txtStartDt'])) : '0000-00-00';
    $strEndDate = (isset($_REQUEST['txtEndDt']) && $_REQUEST['txtEndDt'] != '') ? date('Y-m-d', strtotime($_REQUEST['txtEndDt'])) : '0000-00-00';

    $intcourse = (isset($_POST['coursera']) && $_POST['coursera'] != '') ? $_POST['coursera'] : 'Coursera';
    $paymentStatus = (isset($_POST['paymentStatus']) && $_POST['paymentStatus'] != '') ? $_POST['paymentStatus'] : 0;
    $eligibleStatus      = (isset($_POST['eligibleStatus']) && $_POST['eligibleStatus']!= '')?$_POST['eligibleStatus']:'';
    $assignStatus      = (isset($_POST['assignStatus']) && $_POST['assignStatus']!= '')?$_POST['assignStatus']:'';
    $instituteName      = (isset($_POST['selInstituteName']) && $_POST['selInstituteName']!= '')?$_POST['selInstituteName']:0;
    $objExcel = new clsExcelImport;
    //print_r($_POST);exit;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            
            $res = $objExcel->exportSkillDevelopmentDataSAP($strNumber, $intcourse,$strStartDt, $strEndDate,$paymentStatus,$eligibleStatus,$assignStatus,$instituteName);
        }

    }

} 



if ($page == 'viewGoSkillRegistration') {

    
    $strStartDt = (isset($_REQUEST['txtStartDt']) && $_REQUEST['txtStartDt'] != '') ? date('Y-m-d', strtotime($_REQUEST['txtStartDt'])) : '0000-00-00';
    $strEndDate = (isset($_REQUEST['txtEndDt']) && $_REQUEST['txtEndDt'] != '') ? date('Y-m-d', strtotime($_REQUEST['txtEndDt'])) : '0000-00-00';

    $objExcel = new clsExcelImport;
    //print_r($_POST);exit;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            
            $res = $objExcel->exportSkillInformation($strStartDt, $strEndDate);
        }

    }

} 


if ($page == 'viewQualifyStatus') {

    $strName = (isset($_REQUEST['txtSearch']) && $_REQUEST['txtSearch'] != '') ? $_REQUEST['txtSearch'] : '';

    $intQualify = (isset($_POST['selQualify']) && $_POST['selQualify'] != '') ? $_POST['selQualify'] : '';
    $objExcel = new clsExcelImport;
    //print_r($_POST);exit;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            $res = $objExcel->exportSkillCompititionResult($strName,  $intQualify);
        }

    }

}

if ($page == 'viewSkillWSIDDetails') {

    $strName = (isset($_REQUEST['txtSearch']) && $_REQUEST['txtSearch'] != '') ? $_REQUEST['txtSearch'] : '';

    $intSkill = (isset($_POST['selSkill']) && $_POST['selSkill'] != '') ? $_POST['selSkill'] : 0;
    $intDistrict = (isset($_POST['selDistrict']) && $_POST['selDistrict'] != '') ? $_POST['selDistrict'] : 0;
    $intQualify = (isset($_POST['selQualify']) && $_POST['selQualify'] != '') ? $_POST['selQualify'] : '0';
    $intConfirm = (isset($_POST['selConfirmation']) && $_POST['selConfirmation']!= '')?$_POST['selConfirmation']:'';
    $regType            = (isset($_POST['selRegType']) && $_POST['selRegType']!= '')?$_POST['selRegType']:'';
    $objExcel = new clsExcelImport;
    //print_r($_POST);exit;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            $res = $objExcel->exportSkillWSIDCompititionData($strName, $intDistrict, $intQualify, $intSkill,$intConfirm,$regType);
        }

    }

}

if ($page == 'viewVenue') {
    $intDistid                  = (isset($_REQUEST['ddlDistrict']) && $_REQUEST['ddlDistrict'] != '')?$_REQUEST['ddlDistrict']:0;
       $strEmployeeName         = (isset($_REQUEST['txtEmployeeName']) && $_REQUEST['txtEmployeeName'] != '')?htmlspecialchars(addslashes(trim($_REQUEST['txtEmployeeName'])),ENT_QUOTES):'';
    $objExcel = new clsExcelImport;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            $res = $objExcel->exportVenueMaster($intDistid,$strEmployeeName);
        }

    }

} 

if ($page == 'applicantTagDetails') {
    $objExcel = new clsExcelImport;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            $res = $objExcel->exportTaggedMember();
        }

    }

} 


if ($page == 'addMultiResult') {

    $skillId         = (isset($_POST['selSkill']) && $_POST['selSkill']!= '')?$_POST['selSkill']:0;
    $distId        = (isset($_POST['ddlDist']) && $_POST['ddlDist']!= '')?$_POST['ddlDist']:0;
    $level            = (isset($_POST['selLevel']) && $_POST['selLevel']!= '')?$_POST['selLevel']:'';
    $marks            = (isset($_POST['intMarks']) && $_POST['intMarks']!= '')?$_POST['intMarks']:0;
    $qualify          = (isset($_POST['selQualify']) && $_POST['selQualify']!= '')?$_POST['selQualify']:'0';
    $regdType         = (isset($_POST['selRegdType']) && $_POST['selRegdType']!= '')?$_POST['selRegdType']:3;
    $gender           = (isset($_POST['selGender']) && $_POST['selGender']!= '')?$_POST['selGender']:0;

    $objExcel = new clsExcelImport;
    //print_r($_POST);exit;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            $res = $objExcel->exportSkillResultData($skillId, $distId, $level, $marks, $qualify,$regdType,$gender);
        }

    }

}


if ($page == 'updateMarks') {

    $skillId         = (isset($_POST['selSkill']) && $_POST['selSkill']!= '')?$_POST['selSkill']:0;
    $distId          = (isset($_POST['ddlDist']) && $_POST['ddlDist']!= '')?$_POST['ddlDist']:0;
    $level           = (isset($_POST['selLevel']) && $_POST['selLevel']!= '')?$_POST['selLevel']:'';
    $regdType        = (isset($_POST['selRegdType']) && $_POST['selRegdType']!= '')?$_POST['selRegdType']:3;
    $gender          = (isset($_POST['selGender']) && $_POST['selGender']!= '')?$_POST['selGender']:0;

    $objExcel = new clsExcelImport;
    //print_r($_POST);exit;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            $res = $objExcel->exportSkillMarkData($skillId, $distId, $level,$regdType,$gender);
        }

    }

}

if ($page == 'panelQualify') {

    $skillId         = (isset($_POST['selSkill']) && $_POST['selSkill']!= '')?$_POST['selSkill']:0;
    $distId        = (isset($_POST['ddlDist']) && $_POST['ddlDist']!= '')?$_POST['ddlDist']:0;
    $marks            = (isset($_POST['intMarks']) && $_POST['intMarks']!= '')?$_POST['intMarks']:0;
    $qualify          = (isset($_POST['selQualify']) && $_POST['selQualify']!= '')?$_POST['selQualify']:'0';

    $objExcel = new clsExcelImport;
    //print_r($_POST);exit;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            $res = $objExcel->exportPanelResultData($skillId, $distId, $marks, $qualify);
        }

    }

}


if ($page == 'enterMark') {

    $skillId         = (isset($_POST['selSkill']) && $_POST['selSkill']!= '')?$_POST['selSkill']:0;
    $distId        = (isset($_POST['ddlDist']) && $_POST['ddlDist']!= '')?$_POST['ddlDist']:0;
    $level            = (isset($_POST['selLevel']) && $_POST['selLevel']!= '')?$_POST['selLevel']:'';

    $objExcel = new clsExcelImport;
    //print_r($_POST);exit;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            $res = $objExcel->exportEnterMarkData($skillId, $distId);
        }

    }

    }


    if ($page == 'tenderReport') {

    $intTenderType     = (isset($_REQUEST['intTenderType'])&& $_REQUEST['intTenderType']!='')?htmlspecialchars(addslashes($_REQUEST['intTenderType']), ENT_QUOTES):0;
    $strStartDt         = (isset($_REQUEST['txtStartDt'])&& $_REQUEST['txtStartDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtStartDt'])):BLANK_DATE;
    $strEndDate         = (isset($_REQUEST['txtEndDt'])&& $_REQUEST['txtEndDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtEndDt'])):BLANK_DATE;

    $objExcel = new clsExcelImport;
    //print_r($_POST);exit;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            $res = $objExcel->exportTenderReport($intTenderType, $strStartDt,$strEndDate);
        }

    }

    }

    if ($page == 'approveInstitute') {

    $objExcel = new clsExcelImport;
    //print_r($_POST);exit;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            $res = $objExcel->exportSkillInstituteData();
        }

    }

    }

    if ($page == 'viewTPRegistrationRequest') {

    $vchOrgName          = (isset($_REQUEST['vchOrgName']) && $_REQUEST['vchOrgName']!= '')?$_REQUEST['vchOrgName']:'';   
    $tinApproveStatus    = (isset($_REQUEST['tinApproveStatus']) && $_REQUEST['tinApproveStatus']!= '')?$_REQUEST['tinApproveStatus']:'';   
    $vchRefNumber        = (isset($_POST['vchRefNumber']) && $_POST['vchRefNumber']!= '')?$_POST['vchRefNumber']:'';

    $objExcel = new clsExcelImport;
    //print_r($_POST);exit;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            $res = $objExcel->exportTPRegistration($vchOrgName, $tinApproveStatus,$vchRefNumber);
        }

    }

    }

    if ($page == 'viewInstituteProgram') {

    $vchInsName          = (isset($_REQUEST['vchInsName']) && $_REQUEST['vchInsName']!= '')?$_REQUEST['vchInsName']:'';   
    $vchRefNumber      = (isset($_POST['vchRefNumber']) && $_POST['vchRefNumber']!= '')?$_POST['vchRefNumber']:'';
    $tinApproveStatus          = (isset($_REQUEST['tinApproveStatus']) && $_REQUEST['tinApproveStatus']!= '')?$_REQUEST['tinApproveStatus']:''; 

    $objExcel = new clsExcelImport;
    //print_r($_POST);exit;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            $res = $objExcel->exportSkillInstituteRegistration($vchInsName, $vchRefNumber,$tinApproveStatus);
        }

    }

    }

    if ($page == 'viewProgramRequest') {

    $vchOrgName          = (isset($_REQUEST['intPartnerName']) && $_REQUEST['intPartnerName']!= '')?$_REQUEST['intPartnerName']:'0';   
    $tinApproveStatus    = (isset($_REQUEST['tinApproveStatus']) && $_REQUEST['tinApproveStatus']!= '')?$_REQUEST['tinApproveStatus']:'';

    $objExcel = new clsExcelImport;
    //print_r($_POST);exit;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            $res = $objExcel->exportSkillProgramRegistration($vchOrgName, $tinApproveStatus);
        }

    }

    }

    if ($page == 'viewAttandance') {

    $skillId         = (isset($_POST['selSkill']) && $_POST['selSkill']!= '')?$_POST['selSkill']:0;
    $distId          = (isset($_POST['ddlDist']) && $_POST['ddlDist']!= '')?$_POST['ddlDist']:0;
    $level           = (isset($_POST['selLevel']) && $_POST['selLevel']!= '')?$_POST['selLevel']:'L1';
    $marks           = (isset($_POST['intMarks']) && $_POST['intMarks']!= '')?$_POST['intMarks']:0;
    $attandance      = (isset($_POST['selAttandance']) && $_POST['selAttandance']!= '')?$_POST['selAttandance']:'';

    $objExcel = new clsExcelImport;
    //print_r($_POST);exit;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            $res = $objExcel->exportSkillAttandance($skillId, $distId,$level,$attandance);
        }

    }

    }

    if ($page == 'distWiseReport') {
    $regdType           = (isset($_POST['selRegdType']) && $_POST['selRegdType']!= '')?$_POST['selRegdType']:REGD_PHASE; 
    $gender             = (isset($_POST['selGender']) && $_POST['selGender']!= '')?$_POST['selGender']:0;
    $objExcel = new clsExcelImport;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            $res = $objExcel->exportDistWiseData($regdType,$gender);
        }

    }

}

if ($page == 'tpWiseDetails') {
    $objExcel = new clsExcelImport;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            $res = $objExcel->exportTPWiseData();
        }

    }

}

if ($page == 'instituteWiseDetails') {
    $objExcel = new clsExcelImport;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            $res = $objExcel->exportInsWiseData();
        }

    }

}


if ($page == 'programWiseDetails') {
    $objExcel = new clsExcelImport;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            $res = $objExcel->exportProgramWiseData();
        }

    }

}


if ($page == 'viewSkillRegistration') {
    $id                 = (isset($_REQUEST['ID']) && is_numeric($_REQUEST['ID']))?htmlspecialchars($_REQUEST['ID'],ENT_QUOTES):0;
    $strNumber          = (isset($_REQUEST['txtRegdNumber']) && $_REQUEST['txtRegdNumber']!= '')?$_REQUEST['txtRegdNumber']:'';   
    $strStartDt         = (isset($_REQUEST['txtStartDt'])&& $_REQUEST['txtStartDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtStartDt'])):'0000-00-00';
    $strEndDate         = (isset($_REQUEST['txtEndDt'])&& $_REQUEST['txtEndDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtEndDt'])):'0000-00-00';
    $paymentStatus      = (isset($_POST['paymentStatus']) && $_POST['paymentStatus']!= '')?$_POST['paymentStatus']:0;
    $insPaymentStatus   = (isset($_POST['insPaymentStatus']) && $_POST['insPaymentStatus']!= '')?$_POST['insPaymentStatus']:0;
    $eligibleStatus     = (isset($_POST['eligibleStatus']) && $_POST['eligibleStatus']!= '')?$_POST['eligibleStatus']:'';
    $assignStatus       = (isset($_POST['assignStatus']) && $_POST['assignStatus']!= '')?$_POST['assignStatus']:'';
    $instituteName      = (isset($_REQUEST['selInstituteName']) && $_REQUEST['selInstituteName']!= '')?$_REQUEST['selInstituteName']:0;
    $program            = (isset($_REQUEST['selInterestCourse']) && $_REQUEST['selInterestCourse']!= '')?$_REQUEST['selInterestCourse']:0;
    $regStatus          = (isset($_REQUEST['regStatus']) && $_REQUEST['regStatus']!= '')?$_REQUEST['regStatus']:'';
    $tpId               = $id;
    $objExcel = new clsExcelImport;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            
            $res = $objExcel->exportDigitalSkillData($strNumber,$strStartDt, $strEndDate,$paymentStatus,$eligibleStatus,$assignStatus,$instituteName,$program,$regStatus,$insPaymentStatus,$tpId);
        }

    }

} 

if ($page == 'viewInstituteCandidateDetails') {
    $id                 = (isset($_REQUEST['ID']) && is_numeric($_REQUEST['ID']))?htmlspecialchars($_REQUEST['ID'],ENT_QUOTES):0;
    $strNumber          = (isset($_REQUEST['txtRegdNumber']) && $_REQUEST['txtRegdNumber']!= '')?$_REQUEST['txtRegdNumber']:'';   
    $strStartDt         = (isset($_REQUEST['txtStartDt'])&& $_REQUEST['txtStartDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtStartDt'])):'0000-00-00';
    $strEndDate         = (isset($_REQUEST['txtEndDt'])&& $_REQUEST['txtEndDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtEndDt'])):'0000-00-00';
    $paymentStatus      = (isset($_POST['paymentStatus']) && $_POST['paymentStatus']!= '')?$_POST['paymentStatus']:0;
    $insPaymentStatus   = (isset($_POST['insPaymentStatus']) && $_POST['insPaymentStatus']!= '')?$_POST['insPaymentStatus']:0;
    $eligibleStatus     = (isset($_POST['eligibleStatus']) && $_POST['eligibleStatus']!= '')?$_POST['eligibleStatus']:'';
    $assignStatus       = (isset($_POST['assignStatus']) && $_POST['assignStatus']!= '')?$_POST['assignStatus']:'';
    $instituteName      = (isset($_REQUEST['selInstituteName']) && $_REQUEST['selInstituteName']!= '')?$_REQUEST['selInstituteName']:$id;
    $program            = (isset($_REQUEST['selInterestCourse']) && $_REQUEST['selInterestCourse']!= '')?$_REQUEST['selInterestCourse']:0;
    $regStatus          = (isset($_REQUEST['regStatus']) && $_REQUEST['regStatus']!= '')?$_REQUEST['regStatus']:'';
    $tpId               = 0;
    $objExcel = new clsExcelImport;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            
            $res = $objExcel->exportDigitalSkillData($strNumber,$strStartDt, $strEndDate,$paymentStatus,$eligibleStatus,$assignStatus,$instituteName,$program,$regStatus,$insPaymentStatus,$tpId);
        }

    }

} 

if ($page == 'viewProgramWiseCandidateDetails') {
    $id                 = (isset($_REQUEST['ID']) && is_numeric($_REQUEST['ID']))?htmlspecialchars($_REQUEST['ID'],ENT_QUOTES):0;
    $strNumber          = (isset($_REQUEST['txtRegdNumber']) && $_REQUEST['txtRegdNumber']!= '')?$_REQUEST['txtRegdNumber']:'';   
    $strStartDt         = (isset($_REQUEST['txtStartDt'])&& $_REQUEST['txtStartDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtStartDt'])):'0000-00-00';
    $strEndDate         = (isset($_REQUEST['txtEndDt'])&& $_REQUEST['txtEndDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtEndDt'])):'0000-00-00';
    $paymentStatus      = (isset($_POST['paymentStatus']) && $_POST['paymentStatus']!= '')?$_POST['paymentStatus']:0;
    $insPaymentStatus   = (isset($_POST['insPaymentStatus']) && $_POST['insPaymentStatus']!= '')?$_POST['insPaymentStatus']:0;
    $eligibleStatus     = (isset($_POST['eligibleStatus']) && $_POST['eligibleStatus']!= '')?$_POST['eligibleStatus']:'';
    $assignStatus       = (isset($_POST['assignStatus']) && $_POST['assignStatus']!= '')?$_POST['assignStatus']:'';
    $instituteName      = (isset($_REQUEST['selInstituteName']) && $_REQUEST['selInstituteName']!= '')?$_REQUEST['selInstituteName']:0;
    $program            = (isset($_REQUEST['selInterestCourse']) && $_REQUEST['selInterestCourse']!= '')?$_REQUEST['selInterestCourse']:$id;
    $regStatus          = (isset($_REQUEST['regStatus']) && $_REQUEST['regStatus']!= '')?$_REQUEST['regStatus']:'';
    $tpId               = 0;
    $objExcel = new clsExcelImport;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            
            $res = $objExcel->exportDigitalSkillData($strNumber,$strStartDt, $strEndDate,$paymentStatus,$eligibleStatus,$assignStatus,$instituteName,$program,$regStatus,$insPaymentStatus,$tpId);
        }

    }

}


if ($page == 'viewToTRegistration') {
    $id                 = (isset($_REQUEST['ID']) && is_numeric($_REQUEST['ID']))?htmlspecialchars($_REQUEST['ID'],ENT_QUOTES):0;
    $strNumber          = (isset($_REQUEST['txtRegdNumber']) && $_REQUEST['txtRegdNumber']!= '')?$_REQUEST['txtRegdNumber']:'';   
    $strStartDt         = (isset($_REQUEST['txtStartDt'])&& $_REQUEST['txtStartDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtStartDt'])):'0000-00-00';
    $strEndDate         = (isset($_REQUEST['txtEndDt'])&& $_REQUEST['txtEndDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtEndDt'])):'0000-00-00';
    $instituteName      = (isset($_REQUEST['selInstituteName']) && $_REQUEST['selInstituteName']!= '')?$_REQUEST['selInstituteName']:0;
    $program            = (isset($_REQUEST['selInterestCourse']) && $_REQUEST['selInterestCourse']!= '')?$_REQUEST['selInterestCourse']:0;
    $tpId               = $id;
    $objExcel = new clsExcelImport;
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] != '' && !(isset($_REQUEST['btnSearch']))) {
        $qs = $_POST['hdnAction'];

        if ($qs == 'EX') {
            
            $res = $objExcel->exportDigitalSkillToTData($strNumber,$strStartDt, $strEndDate,$instituteName,$program,$tpId);
        }

    }

} 





