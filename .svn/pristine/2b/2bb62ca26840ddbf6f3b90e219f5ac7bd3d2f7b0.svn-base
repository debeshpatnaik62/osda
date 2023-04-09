<?php

    /* ================================================
      File Name         	  : clsSearch.php
      Description		  : This is used for manage search results. 
      Devloped By		  : Ashis kumar Patra
      Devloped On	          : 27-March-2019
      Update History	  :	<Updated by>		<Updated On>		<Remarks>
                               
      ================================================== */
/* * ****Class to manage Search results ********************
'By                     : Ashis Kumar Patra'
'On                     : 27-March-2019
'Procedure Used        : USP_SEARCH       '
* ************************************************** */

class clsSearch extends Model {
    public function viewSearch($action,$intRecno,$searchTxt)
        {   
   
           $errsearch   = Model::isSpclChar($searchTxt);        
                                       
          if ($errsearch > 0)
             header("Location:" . SITE_PATH. "error");
            else {
            $sql	= "CALL USP_SEARCH('$action',$intRecno,'$searchTxt');"; 
         //echo $sql;
            $result = Model::executeQry($sql);
            return $result;
          }
           
          }
     
}
    
?>