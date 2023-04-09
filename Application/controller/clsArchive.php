<?php

    /******Class to manage archive Details ********************
    ' By                     : T Ketaki Debadarshini	'
    ' On                     : 31-March-2017            '
    ' Procedure Used         : USP_ARCHIVE_LOG       '
    *****************************************************************/

    class clsArchive extends Model {

        // Function To Manage archive Details By::T Ketaki Debadarshini   :: On:: 31-March-2017
        private function manageArchive($action,$intLogId,$intForId,$intYear,$intMonth,$intPagesize,$attr1,$attr2) {
            $archiveSql = "CALL USP_ARCHIVE_LOG('$action',$intLogId,$intForId,$intYear,$intMonth,$intPagesize,'$attr1','$attr2');";
           // echo $archiveSql;
            $errAction          = Model::isSpclChar($action);
            $errAttr1           = Model::isSpclChar($attr1);
            $errAttr2           = Model::isSpclChar($attr2);
            
            $errLogid           = Model::isSpclChar($intLogId);
            $errForid           = Model::isSpclChar($intForId);
            $errYear            = Model::isSpclChar($intYear);
            $errMonth           = Model::isSpclChar($intMonth);

            if ($errAction > 0 || $errAttr1 > 0 || $errAttr2 > 0 || $errLogid > 0 || $errForid > 0 || $errYear > 0 || $errMonth > 0)
                header("Location:" . APP_URL . "error");
            else{
                $archiveResult = Model::executeQry($archiveSql);
                return $archiveResult;
            }
        }

        //Function to view archive Details By::T Ketaki Debadarshini   :: On:: 31-March-2017
          public function viewArchive($action,$intLogId,$intForId,$intYear,$intMonth,$intPagesize,$attr1,$attr2)
          {
                  $result	= $this->manageArchive($action,$intLogId,$intForId,$intYear,$intMonth,$intPagesize,$attr1,$attr2);
                  return $result;
          }

      
    } 
    

?>
