<?php

/* * ****Class to manage INstitute ********************
'By                     : T Ketaki Debadarshini	'
'On                     : 23-March-2017       '
Update History        :	
  <Updated by>          :   Rajesh parida
  <Updated On>          : 10-oct-2017  <Remarks>
' Procedure Used        : USP_INSTITUTE_DETAILS       '
* ************************************************** */

class clsMobileVersion extends Model {
    
    // Function To Manage Institute By::T Ketaki Debadarshini   :: On:: 23-March-2017
    public function manageMobileVersion($action,$versio_code, $mand) {
		
        $mobileVersionSql = "CALL USP_MOB_VERSION('$action',$versio_code,'$mand');";
		//echo $mobileVersionSql; die;
        return Model::executeQry($mobileVersionSql);
           
    }

}



?>
