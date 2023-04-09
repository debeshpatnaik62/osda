<?php
/*
    File Name               : index.php
    Description             : This is to set database connectiton and update data.
    Author Name             : Ashis kumar patra
    Date Created            : 20-May-2019
    Update History          : <Updated by>            <Updated On>        <Remarks>
                       
    Created By              : Ashis kumar patra
    Created On              : 20-MAY-2019
    ---------------------------------------------------------------------------------*/
    @session_start();
    error_reporting(E_ALL-E_NOTICE);
    date_default_timezone_set('Asia/Kolkata');
    ini_set("display_errors", 0);
    $rootPath   = $_SERVER['DOCUMENT_ROOT'];
    $dir        = 'OSDA/';
    include_once($rootPath.'/'.$dir."config.php");
    //when our script started to run.
     $executionStartTime = microtime(true);
    //echo date('H:i:s');exit;
    include_once(SITE_PATH."controller/classBind.php");
    $classBind= new clsClassPortal;
    $result=$classBind->updateAPIData('NIC');
        if (!$result)
        {
               print_r(error_get_last());
                throw new Exception('Service Error Occured');
        }
        else{
            $executionEndTime = microtime(true);
 
            //The result will be in seconds and milliseconds.
            $seconds = $executionEndTime - $executionStartTime;
             
            //Print it out
            echo "This script took $seconds to execute.";
             // echo "Data update service working..";
        }
        
