<?php
  /* ================================================
    File Name       : philosophyInner.php
    Description     : This page is used to view Philosophies.
    Devloped By     : Ashis kumar Patra
    Devloped On     : 04-12-2018
    Update History  :
    <Updated by>    <Updated On>    <Remarks>

    Class Used    : clsPhilosophy
    Functions Used  : 
    ==================================================*/
    include(CLASS_PATH.'clsPhilosophy.php');

    $objPhilosophy       = new clsPhilosophy; 
   
    $arrConditions=array( 'Id'=>0,'pubStatus'=>2);
  
   $totalResult                 = $objPhilosophy->managePhilosophy('V',$arrConditions);
   $intTotalRec                 = $totalResult->num_rows; 
   $philoResult             = array(); 
   
           
?>