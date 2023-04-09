<?php

/* * ****Class to manage block details ********************
' By                     : T Ketaki Debadarshini   '
' On                     : 21-Sept-2016     '
' Procedure Used         : USP_BLOCK_MASTER '
* ************************************************** */

class clsBlock extends Model {

// Function To Manage block details By::T Ketaki Debadarshini    :: On:: 21-Sept-2016
   public function manageBlock($action,$intBlockId,$intDistId,$strBlockname,$strBlocknameO,$strDescription,$strDescriptionO,$intPublishsts,$createdBy,$intPgsize) {                  
        
        $blockSql = "CALL USP_BLOCK_MASTER('$action',$intBlockId,$intDistId,'$strBlockname','$strBlocknameO','$strDescription','$strDescriptionO',$intPublishsts,$createdBy,$intPgsize);";
       //echo $blockSql; 
 
        $errBlockname         = Model::isSpclChar($strBlockname);
        $errBlocknameO        = Model::isSpclChar($strBlocknameO);
        $errDescription       = Model::isSpclChar($strDescription);
        $errDescriptionO      = Model::isSpclChar($strDescriptionO);
        
        $errDistId            = Model::isSpclChar($intDistId);
        $errBlockId           = Model::isSpclChar($intBlockId);
         
        if ($errBlockname > 0 || $errDescription > 0 || $errDistId > 0 || $errBlockId > 0)
            header("Location:" . APP_URL . "error");
        else {
                $blockResult = Model::executeQry($blockSql);
                return $blockResult;
        }
    }

// Function To Add Update block details By::T Ketaki Debadarshini    :: On:: 21-Sept-2016
    public function addUpdateBlock($blockId) { 
        $newSessionId           = session_id();
        $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
        if($newSessionId == $hdnPrevSessionId){   
        
            $blockId                = ($blockId != '') ? $blockId : 0; 
            $ddlDistrict            = $_POST['ddlDistrict'];

            $txtBlock               = htmlspecialchars($_POST['txtBlock'],ENT_QUOTES);
            $blankBlock             = Model::isBlank($txtBlock);
            $errBlock               = Model::isSpclChar($_POST['txtBlock']);
            $lenBlock               = Model::chkLength('max', $txtBlock,100);

            $txtBlockO              = htmlspecialchars($_POST['txtBlockO'], ENT_QUOTES, 'UTF-8');
            $lenBlockO              = Model::chkLength('max', $txtBlockO,120);

            $txtDescription         = htmlspecialchars($_POST['txtDescription'],ENT_QUOTES);
            $errDescription         = Model::isSpclChar($_POST['txtDescription']);
            $lenDescription         = Model::chkLength('max', $txtDescription,500);

            $txtDescriptionO        = htmlspecialchars($_POST['txtDescriptionO'], ENT_QUOTES, 'UTF-8');

            $outMsg                 = '';
            $flag                   = ($blockId != 0) ? 1 : 0;
            $action                 = 'AU';
            $errFlag                = 0 ;

            if($blankBlock > 0)
            {
                        $errFlag    = 1;
                        $flag       = 1;
                        $outMsg     = "Mandatory Fields should not be blank";

            }
            else if($lenBlock>0 || $lenBlockO>0 || $lenDescription>0)
            {
                        $errFlag    = 1;
                        $flag       = 1;
                        $outMsg     = "Length should not exceed maxlength";
            }
            else if($errBlock>0  || $errDescription>0)
            {
                        $errFlag    = 1;
                        $flag       = 1;
                        $outMsg     = "Special Characters are not allowed";
            }

            if($errFlag==0){

                $result             = $this->manageBlock($action,$blockId,$ddlDistrict,$txtBlock,$txtBlockO,$txtDescription,$txtDescriptionO,0,USER_ID,0);

                if($result)
                {
                    $numRow         = $result->fetch_array();
                    $statusflag     = $numRow['@P_STATUS']; 

                    if($statusflag=='0'){
                      $outMsg       = 'Block Name already exists';
                      $errFlag      = 1;
                      $flag         = 1;
                    }
                   else{
                        $outMsg     = ($blockId != 0) ?'Block details updated successfully':'Block details added successfully';

                   }
                }
            }
         }else{
                header("Location:" . APP_URL . "error");
            }  
        $intDistid              = ($errFlag == 1) ? $ddlDistrict : '';
        $strBlock               = ($errFlag == 1) ? htmlentities($txtBlock) : '';
        $strBlockO              = ($errFlag == 1) ? htmlentities($txtBlockO) : '';   
        $strDescription         = ($errFlag == 1) ? htmlentities($txtDescription) : ''; 
        $strDescriptionO        = ($errFlag == 1) ? htmlentities($txtDescriptionO) : ''; 
        
        $arrResult = array('intDistid' => $intDistid,'strBlock' => $strBlock,'strBlockO' => $strBlockO,
            'strDescription' => $strDescription,'strDescriptionO' => $strDescriptionO,
            'msg' => $outMsg, 'flag' => $errFlag);
        return $arrResult;
      
    }

// Function To read Block details By::T Ketaki Debadarshini    :: On:: 21-Sept-2016
    public function readBlock($blockId) {

       $result = $this->manageBlock('R',$blockId,0,'','','','',0,0,0);
        if ($result->num_rows> 0) {
            
            $row                    = $result->fetch_array(); 
            $intDistid              = $row['intDistrictid'];
            $strBlock               = htmlspecialchars_decode($row['vchBlockname'],ENT_QUOTES);   
            $strBlockO              = $row['vchBlocknameO'];
            $strDescription         = htmlspecialchars_decode($row['vchDescription'],ENT_QUOTES); 
            $strDescriptionO        = $row['vchDescriptionO'];        
        }
        $arrResult = array('intDistid' => $intDistid,'strBlock' => $strBlock,'strBlockO' => $strBlockO,
            'strDescription' => $strDescription,'strDescriptionO' => $strDescriptionO);
        return $arrResult;
    }
    
 
// Function To Delete Block details By::T Ketaki Debadarshini    :: On:: 21-Sept-2016
    public function deleteBlock($action, $ids) {
        $newSessionId           = session_id();
        $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
        if ($newSessionId == $hdnPrevSessionId) {  
            $ctr        = 0;        
            $explIds    = explode(',', $ids);
            $delRec     = 0;

            $msgTitle           = 'Block detail(s)';
            foreach ($explIds as $indIds) {

                $result = $this->manageBlock($action,$indIds,0,'','','','',0,USER_ID,0);
                $row = $result->fetch_array();
                if ($row[0] == 1)   
                    $delRec++;

                  $ctr++;

            }

            if ($action == 'D') {
                 if ($delRec > 0)
                        $outMsg .= $msgTitle.' deleted successfully';
                    else
                        $outMsg .= 'Dependency record exist. '.$msgTitle.' can not be deleted';

            } 
            else if ($action == 'AC')
                $outMsg = $msgTitle.' activated successfully';
            else if ($action == 'IN')
                $outMsg =  $msgTitle.' unpublished successfully';
            else if ($action == 'AR')
                $outMsg =  $msgTitle.' archieved successfully';
            else if($action == 'P'){
                $outMsg =  $msgTitle.' Published successfully';
            }
            return $outMsg;
        }else{
               header("Location:".APP_URL."error");
            }  
    }

}
