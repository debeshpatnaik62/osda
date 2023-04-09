<?php 
require 'admitCardInner.php';
?>
<?php 
$htmlStr = '<link rel="stylesheet" type="text/css" href="'.SITE_URL.'css/admin-card.css">';
$htmlStr .= '<section class="container">';
$htmlStr .= '<header>
                <img src="'.SITE_PATH.'images/logoload.png" width="100" />
                <h1>Odisha Skill Development Authority</h1>
                <p>Government of Odisha</p>
                <h3 style="margin-bottom: 0;">Admit Card for Odisha Skills -2022 ('.$level.')</h3>
            </header>';
if (!empty($strName)) {
    $htmlStr .='<table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <br>
                <table width="100%" cellpadding="6px">
                    <tr>
                        <td width="35%">Name:</td>
                        <td><strong>'.$strName.'</strong></td>
                    </tr>
                    <tr>
                        <td>Registration Number:</td>
                        <td><strong>'.$strAckNo.'</strong></td>
                    </tr>
                    <tr>
                        <td>Aadhar Number:</td>
                        <td><strong>'.$strAadharno.'</strong></td>
                    </tr>
                    <tr>
                        <td>Email Address:</td>
                        <td><strong>'.$strEmail.'</strong></td>
                    </tr>
                    <tr>
                        <td>Mobile Number:</td>
                        <td><strong>'.$strMobile.'</strong></td>
                    </tr>
                    <tr>
                        <td>Venue Name:</td>
                        <td><strong>'.$strVenueName.'</strong></td>
                    </tr>
                    <tr>
                        <td>Venue Address:</td>
                        <td><strong>'.$address.'</strong></td>
                    </tr>
                    <tr>
                        <td>Panel Name:</td>
                        <td><strong>'.$strPanelName.'</strong></td>
                    </tr>
                    <tr>
                        <td>Skill/ Trade:</td>
                        <td><strong>'.$skillName.'</strong></td>
                    </tr>
                    
                    <tr>
                        <td>Exam Date:</td>
                        <td><strong>'.$examDate.'</strong></td>
                    </tr>
                    <tr>
                        <td>Exam Time:</td>
                        <td><strong>'.$examTime.'</strong></td>
                    </tr>
                    <tr>
                        <td>Level:</td>
                        <td><strong>'.$level.'</strong></td>
                    </tr>
                </table>
            </td>
            <td width="250" valign="center" style="background: #eee;text-align:center; width:250px;vertical-align: middle;">
                <br />
                <table class="photos" width="100%" cellpadding="5">
                    <tr>
                        <td width="50%"><img src="'.$applicantPhoto.'" width="125px"></td>
                        <td><img src="'.APP_PATH.'uploadDocuments/QR/'.$fileName2 .'" width="125px"></td>
                    </tr>
                </table>
                <br />
                <br />
                <p>This Admit card verified at <br>https://www.skillodisha.gov.in/</p>
                <br />
            </td>
        </tr>
    </table>
    <br />
    <br />
    <hr>
     <h5>IMPORTANT INSTRUCTIONS</h5>
        <ul style="font-size:12px;margin-left: 8px;padding-left:0;">
        <li><strong>Candidate must report at the Venue on 25th August 2021 mandatorily. The time of reporting at venue will be as intimated to you by your concerned OSDA Official.</strong></li>
        <li><strong>The candidate must carry Admit Card , ID Proof and Negative COVID  test certificate  not older than 23rd August 2021.</strong> </li>
        <li><strong>The candidate must bring any essential Kit/Tools/Items etc. as required as instructed by OSDA Officials.</strong></li>
        <li>Candidate should be physically present in the assigned venue at least 1 Hour prior to the starting time of competition with Admit Card and  ID Proof.</li>
        <li>Candidates will not be permitted to  enter the exam hall after 15 minutes after scheduled start time of examination and will not be allowed to leave the exam hall before the end of the examination.</li>
        <li>Electronic devices like calculators, tables, pager, mobile phones etc are not allowed inside the exam hall. Text books, chit papers are not allowed inside the exam hall.</li>
        <li>Follow the COVID guidelines throughout the examination.</li>
        <li>In case of any queries, the candidate is advised to contact their respective OSDA officials.</li>
        </ul>'; 
} 

 $htmlStr .='</section>';
  // echo $htmlStr;exit;
    $fileName           = 'Admit_'.$regdNo.'.pdf';

    //include(SITE_PATH.'MPDF/mpdf.php');
    //$mpdf = new mPDF('','A4');  // L - landscape, P - portrait


    require_once SITE_PATH . 'MPDF/vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->showImageErrors = true;
    $mpdf->WriteHTML($htmlStr);

    $mpdf->Output($fileName, 'D');

    unlink(APP_PATH.'uploadDocuments/QR/'.$fileName2);
