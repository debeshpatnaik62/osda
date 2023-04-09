<?php 
 /* * ****Class to manage Admin Links********************
  '	By	 	 : Rasmi Ranjan Swain	'
  '	On	 	 : 3-Sept-2015        '
  ' Procedure Used       : USP_ADMIN_GL,USP_ADMIN_PL            '
 * ************************************************** */
class clsAdminLinks extends Model {

       // Function To Manage Admin Globallink By::Rasmi Ranjan Swain   :: On::3-Sept-2015  
       public function manageAdminGLinks($action,$glId,$glName)
        {
            $glSql = "CALL USP_ADMIN_GL('$action',$glId,'$glName',@out);"; //echo $glSql;
            $glResult = Model::executeQry($glSql);
            return $glResult;
        }
    
      // Function To Manage Admin Primarylink By::Rasmi Ranjan Swain   :: On::3-Sept-2015  
       public function manageAdminPLinks($action,$plId,$glId,$plName,$plUrl)
        {
            $plSql = "CALL USP_ADMIN_PL('$action',$plId,$glId,'$plName','$plUrl',@out);";
            $plResult = Model::executeQry($plSql);
            return $plResult;
        }
     
    
 }

 ?>