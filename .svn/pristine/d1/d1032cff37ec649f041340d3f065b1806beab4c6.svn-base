<?php        
        /* ================================================
    File Name             : config.php
    Description       : This is to set default data, configuration datas.
    Author Name               : Yasmin Naz
    Date Created          : 1-Aug-2016  
    Update History        : <Updated by>            <Updated On>        <Remarks>
    
    includes          : dbConfig.php
    ==================================================*/
    
    session_set_cookie_params(0);
    session_start();
    error_reporting(E_ALL-E_NOTICE-E_WARNING);
        //error_reporting(E_ALL);
    ini_set("display_errors", 0);
        
    
    define('TITLE', 'Youth Skills Training - Odisha Skill Development Authority');

        $host           = $_SERVER['HTTP_HOST'];

        /*Prevents from host header attack*/
//         switch ($_SERVER['HTTP_HOST']) {
//                           /*Staging Url*/
//                           case '164.164.122.169:8090':
//                               $host = '164.164.122.169:8090';
//                               break;
//                           /*Audit external Url*/
//                           case '164.164.122.169':
//                               $host = '164.164.122.169';
//                           break;
//                           /*Devlopment Url*/
//                           case 'localhost':
//                               $host = 'localhost';
//                           break;
//                           /*Live Url*/
//                           case 'skillodisha.gov.in':
//                               $host = 'skillodisha.gov.in';
//                           break;
//                           default:
//                              $host = '164.164.122.169';
//                           break;
//                       }
        
        $siteTitle      = 'Odisha Skill Development Authority';
        $strFooter      = 'Odisha Skill Development Authority';
        $url            = 'http'.(isset($_SERVER['HTTPS'])?'s':'').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $details        = parse_url($url);
        $dir            = explode("/",$details["path"]);
        //$dirName        = $dir[1];
        @define('DEV_ENV', 'D');
        $dirName        = (DEV_ENV=='D')? $dir[1]:'';


        /**==============Navigation Controlls===================**/
        define('SITE_URL', 'http://'.$host .'/'.$dirName.'/');    
        define('APP_URL', 'http://'.$host .'/'.$dirName.'/Application/');
        define('CLASS_PATH',$_SERVER['DOCUMENT_ROOT'] .'/'.$dirName.'/'.'Application/controller/');
        define('SITE_PATH',$_SERVER['DOCUMENT_ROOT'] .'/'.$dirName.'/');
        define('APP_PATH',$_SERVER['DOCUMENT_ROOT'] .'/'.$dirName.'/'.'Application/');
        //define('ABSPATH',realpath(dirname(__FILE__)));


       #### ==============   DATABASE CONTROLLS =========== ###
        include("Application/includes/dbConfig.php");
        //define('TITLE', $siteTitle); 
        define('FOOTER_TITLE', $strFooter);
        define('DB_HOST', $dbHost);
        define('DB_NAME', $dbName);
        define('DB_USER', $dbUser);
        define('DB_PASS', $dbPass);

        /*=============VALIDATION CONTROLL(S)=================*/    
        //define('SPLCHRS',"<,>,%,',--,/*,*/");
        define('SPLCHRS',"SLEEP(,sleep(,BENCHMARK(,benchmark(,<,>,%,',--,/*,*/,^,*,$,)waitfor,delay,;,prompt(,onmouseover,alert(,onclick,onmouseout,oncontextmenu,ondblclick,onmousedown,onmouseenter,onmouseleave,onmousemove,onmouseup,onkeydown,onkeypress,onkeyup,onload,onscroll,onunload,onchange,onblur,[,],<script>,</script>,<svg");

        define('SPLTAGS',"SLEEP(,sleep(,BENCHMARK(,benchmark(,<button,<form,<iframe,<input,<script,<select,<textarea,<svg,onload,onerror,alert,prompt,<script>,</script>");

        define('BLANKERRMSG','Mandatory fields should not left blank');
        define('SPCLCHARERRMSG','Special Characters are not allowed');
        define('LENERRMSG','Field length should be appropriate');

        /*=============FILE SIZE CONTROLL(S)=================*/
        define("SIZE1MB","1000000");
        define("SIZE2MB","2000000");
        define("SIZE5MB","5242880");
        define("SIZE10MB","10000000");
        define("SIZE30MB","7.34e+7");

        /*=============USER ACCESS CONTROLL(S)=================*/
       // define('DESG_ID',$_SESSION['adminConsole_Desg']);
        define('USER_ID',$_SESSION['adminConsole_userID']);
        define('ADMIN_PRIVILEGE',$_SESSION['adminPrivilege']);
        define('USER_PRIVILEGE',$_SESSION['userPrivilege']);
       
        define('PORTAL_TYPE',$_SESSION['portalType']);      
        define('DEFAULT_LANG','en');
        

        /**================Other Informations=================**/
        define('SEND_MAIL','Y');
        define('SEND_MESSAGE','N');
        define('PORTAL_EMAIL','osdasite@gmail.com'); 
         //define('PORTAL_EMAIL','kalyani.it.043@gmail.com'); 
        
        define('SMTP_HOST','smtp.gmail.com');
        define('SMTP_USER','osdasite@gmail.com');
        define('SMTP_PASS','skilled9');
        define('SMTP_ENCT','ssl');
        define('SMTP_PORT','465');
        define('SMTP_FROM','osdasite@gmail.com'); 
        define('PHP_MAILER_PATH', APP_PATH.'PHPMailer/');
        
        /*define('SMTP_USER','csmtech.web@gmail.com');
        define('SMTP_PASS','csmpl@12345');
        define('SMTP_FROM','csmtech.web@gmail.com');*/ 

        /**================== Email for Feedback =============**/

        define('SMTP_FEEDBACK_USER','feedback.osda@gmail.com');
        define('SMTP_FEEDBACK_PASS','feedback@123');
        define('FEEDBACK_EMAIL','feedback.osda@gmail.com');

        /**==================Email for Enquire Now =============**/
        define('SMTP_ENQUIRE_USER','enquire.osda@gmail.com');
        define('SMTP_ENQUIRE_PASS','enquire@123');
        define('ENQUIRE_EMAIL','enquire.osda@gmail.com'); 


       /**==================Email for Skill Competition =============**/
        define('SMTP_SKILLCOM_USER','skillcom.osda@gmail.com');
        //define('SMTP_SKILLCOM_PASS','skill@123');
        define('SMTP_SKILLCOM_PASS','cilligvnbgwqhxor');
        define('SKILLCOM_EMAIL','skillcom.osda@gmail.com');

        /**==================Email for Nano Unicorn =============**/
        define('SMTP_NANO_USER','nanounicorn.osda@gmail.com');
        define('SMTP_NANO_PASS','unicorn@123');
        define('NANO_EMAIL','nanounicorn.osda@gmail.com'); 

        /**==================Email for contact =============**/
        define('SMTP_CONTACT_USER','contacts.osda@gmail.com');
        define('SMTP_CONTACT_PASS','contact@123');
        define('CONTACT_EMAIL','contacts.osda@gmail.com'); 


        /**==================Email for skill develop =============**/
        define('SMTP_DEVELOP_USER','skilldev.osda@gmail.com');
        //define('SMTP_DEVELOP_PASS','skilldev2020@123');
        define('SMTP_DEVELOP_PASS','xznuhlluktfibcmw');
        define('DEVELOP_EMAIL','skilldev.osda@gmail.com'); 


        define('RE_CAPTHA_SITEKEY','6Lf1TxoUAAAAAE4w6XFgAZlTmtUMC57mSokhfQIO');
        define('RE_CAPTHA_SCRTKEY','6Lf1TxoUAAAAADrjo-V9qAL08bhh6uAkD7Z_88W6');
        
        
        $aryInstituteType       = array('1'=>'I.T.I','2'=>'Polytechnic','3'=>'Training Center','4'=>'ASTI','5'=>'Training Partner'); 
        
        $arySchemeType          = array('1'=>'OSDA','2'=>'DDU-GKY','3'=>'PMKVY','4'=>'PMKK'); 
       
        define("strtDate1","30-04-2018"); 
        define("strtDate","29-04-2018"); 
        define("BLANK_DATE","1000-01-01");
        define("BLANK_DATE_TIME","1000-01-01 00:00:01");
        define('EXTERNAL_MSG','The link redirect you to the external link, are you sure?');
        define("SMS_UNAME","osdaskill");
        define("SMS_PWD","skIL@2021");
        define("SMS_SENDOR_ID","ODOSDA");

        /* SMS For Skill updated by Rahul ON 09-03-2022 */
        define("SMS_SKILL_NAME","opscsms2012-OSDA");
        define("SMS_SKILL_PWD","OsdaSiz$2034!");
        define("SMS_SKILL_SENDOR_ID","ODIGOV");
        define("SMS_SECURE_KEY","ef09050d-aa0f-44cd-87d4-ccad4818b6f2");
        define("CLOUDINARY_URL","cloudinary://915863913945489:PJFL8NRNA8jBLazulHHFzdhow1g@dkj30hggk");
         //define("SAMS_URL","http://192.168.201.85/ITi_Service/OSDA_ITI.svc/");
         //define("SAMS_URL","http://192.168.10.9/SAMS-SKILL_service/OSDA_ITI.svc/"); //SAMS Testing Url updated By Rahul Kumar Saw ON 10-08-2019
        define("SAMS_URL","http://serviceskill.samsodisha.gov.in/OSDA_ITI.svc/"); //SAMS Live Url updated By Rahul Kumar Saw ON 19-08-2019
        
        @define('COURSERA_FEE', '3,000');
        @define('SAP_FEE', '3,000'); 
        @define('PAYMENT_SUCCESS', 1);
        @define('PAYMENT_FAILURE', 2);
        @define('PAYMENT_CANCEL', 3);
        @define('PAYMENT_PENDING', 9);
        @define('MERCHANT_ID', '277585');
        @define('WORKING_KEY', 'BB57942F3332C1781DF3F24C61DD0847');
        @define('ACCESS_CODE', 'AVZD95HJ71AK32DZKA');
        @define('REGD_PHASE',3);
        @define('NEW_APP_URL','http://localhost/competition/Application/');
        @define('NEW_SITE_URL','http://localhost/competition/');
?>