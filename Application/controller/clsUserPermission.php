<?php 

/* * ****Class to manage User Permission********************
  '	By	 	 		: Ashok Kumar Samal	  '
  '	On	 	 		: 22-JUL-2016         '
  ' Procedure Used  : USP_USER_PERMISSION '
 * ************************************************** */
class clsUserPermission extends Model {

// Function To Manage Globallink By::Rasmi Ranjan Swain   :: On::31-Aug-2015    
    public function managePermission($action, $pId,$userId,$glId,$plId,$auther,$editor,$publisher,$manager,$previlage,$createdBy)
    {
        $permissionSql = "CALL USP_USER_PERMISSION('$action',$pId,$userId,$glId,$plId,$auther,$editor,$publisher,$manager,$previlage,$createdBy,@out);"; 
       //echo $permissionSql;exit;
        $permissionResult = Model::executeQry($permissionSql);
        return $permissionResult;
    }
    
    
 }
?>