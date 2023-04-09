<?php

/* * ****Class to manage Contact ********************
  '	By	 	 : Samir Kumar'
  '	On	 	 : 14-SEP-2018        '
  ' Procedure Used       : USP_TRANSLATE      
  NOTE :- class for demo testing purpose server side validation not added      '
 * ************************************************** */

class clsTranslate extends Model {

// Function To Manage Translation By::Samir kumar  :: On:: 14-SEP-2018
    public function manageTranslate($action, $translateId, $webPage, $englishTxt, $hindiTxt, $odiaTxt, $query, $attr1, $attr2, $attr3, $attr4) {
        $translateSql = "CALL USP_TRANSLATE('$action',$translateId,'$webPage','$englishTxt','$hindiTxt','$odiaTxt','$query','$attr1','$attr2','$attr3','$attr4',@OUT);";
        //echo $translateSql;exit;
        //if($action=='AT'){echo $translateSql;exit;}
        /*         * ***********check CSRF**************** */
        //echo session_id().'--'.$_POST['hdnPrevSessionId'];exit;
        if (isset($_POST['hdnPrevSessionId'])) {
            $newSessionId = session_id();
            $hdnPrevSessionId = $_POST['hdnPrevSessionId'];

            if ($newSessionId != $hdnPrevSessionId) {
                header('HTTP/1.0 302 Found');
                //http_response_code(302);
                echo '<script>alert("Transaction failed due to session mismatch");</script>';
                echo '<script>window.location.href="' . APPURL . 'error";</script>';
                //header("location:error");
                exit;
            }
        }
        /*         * ***********check CSRF**************** */
        $TranslateResult = Model::executeQry($translateSql);
        return $TranslateResult;
    }

// Function To add update Translation By::Samir kumar  :: On:: 14-SEP-2018
    public function addUpdateTranslate($translateId) {
        $errFlag      = 0;
        $flag         = 1;
        $outMsg       = '';
        $userId     = $_SESSION['adminConsole_userID'];
        $projectId  = (isset($projectId)) ? $projectId : 0;
        $txtwebUrl  = $_POST['hdnPageId'];
        $txtEnglish = $_POST['txtEnglish'];
        $txtHindi   = $_POST['txtHindi'];
        $txtOdia    = $_POST['txtOdia'];
        $hdnIds     = $_POST['hdnIds'];
        $hdnPagename = $_POST['hdnPageUrl'];
        //echo count($txtEnglish);exit;
        $query = '';
        for($i=0;$i<count($txtEnglish);$i++){
            //$engVal     = str_replace("'", "&#39;", htmlspecialchars($_POST['txtEnglish'][$i]));
            $engVal         = htmlspecialchars($_POST['txtEnglish'][$i],ENT_QUOTES);
            $hinVal         = htmlspecialchars($_POST['txtHindi'][$i]);
            $odiVal         = htmlspecialchars($_POST['txtOdia'][$i]);
            $hdnIds         = ($_POST['hdnIds'][$i] != '')?htmlspecialchars($_POST['hdnIds'][$i]):0;

            $blankEnglish   = Model::isBlank($_POST['txtEnglish'][$i]);
            $splEnglish     = Model::isSpclChar($_POST['txtEnglish'][$i]);
            $splHindi       = Model::isSpclChar($_POST['txtHindi'][$i]);
            $splOdia        = Model::isSpclChar($_POST['txtOdia'][$i]);

            if ($blankEnglish > 0) {
                $errFlag = 1;
                $flag = 1;
                $outMsg = "Mandatory Fields should not be blank";
            }

            // else if(($splEnglish > 0) || ($splHindi > 0) || ($splOdia > 0)){
            //     $errFlag = 1;
            //     $flag = 1;
            //     $outMsg = "Special Characters are not allowed";
            // }



            //$query     .='(' . $hdnIds . ','.$txtwebUrl.',"'.$hdnPagename.'", "'.$engVal.'", "' . $hinVal . '","' . $odiVal . '"),';   
            $query     .='('.$txtwebUrl.',"'.$hdnPagename.'", "'.$engVal.'", "' . $hinVal . '","' . $odiVal . '"),';   
            
        }


        $query = substr($query, 0, -1);
        if($errFlag == 0){
            $result = $this->manageTranslate('AT', 0, $hdnPagename, '', '', '', $query, '', '','', '');    
            $outMsg = 'Record added successfully'; 
        }
        

        
                $arrResult = array(
                    'msg' => $outMsg,
                    'flag' => $flag,
                    'errFlag' => $errFlag
                );
                return $arrResult;
    }



    public function registerPage($pageId){
        $errFlag      = 0;
        $flag         = 1;
        $outMsg       = '';
//print_r($_POST);exit;
        $userId       = $_SESSION['adminConsole_userID'];
        $txtwebName   = $_POST['txtwebName'];
        $txtwebUrl    = $_POST['txtwebUrl'];

        $blankwebpage = Model::isBlank($txtwebName);
        $splwebpage   = Model::isSpclChar($_POST['txtwebUrl']);

        $blankwebUrl = Model::isBlank($txtwebUrl);
        $splwebUrl   = Model::isSpclChar($_POST['txtwebUrl']);

        $action       = 'AP';


        if (($blankwebpage > 0) || ($blankwebUrl > 0)) {
            $errFlag = 1;
            $flag = 1;
            $outMsg = "Mandatory Fields should not be blank";
        }else if(($splwebpage > 0) || ($splwebUrl > 0)){
            $errFlag = 1;
            $flag = 1;
            $outMsg = "Special Characters are not allowed";
        }



        if($errFlag == 0){
            //$result = $this->manageTranslate('CD', 0, $txtwebUrl, '', '', '', '', '', '','', '');
            $result = $this->manageTranslate('AP', $pageId, $txtwebName, '', '', '', '', $txtwebUrl, '','', '');
            if ($result){
                $row = mysqli_fetch_array($result);
                if ($row[0] == 1) {
                    $msg = ($action == 'AP') ? 'Record added successfully ' : 'Record updated successfully';
                }
                $outMsg = $msg;
            }
        }

        $arrResult = array(
            'msg' => $outMsg,
            'flag' => $flag,
            'errFlag' => $errFlag
        );
        return $arrResult;
    }


    public function addManual($translateId) {
        $userId     = $_SESSION['adminConsole_userID'];
        $projectId  = (isset($projectId)) ? $projectId : 0;
        $txtwebUrl  = $_POST['hdnPageUrl'];
        $txtEnglish = $_POST['txtEnglish'];
        $txtHindi   = $_POST['txtHindi'];
        $txtOdia    = $_POST['txtOdia'];
        $action     = 'AM';
            
        $result = $this->manageTranslate($action, $translateId, $txtwebUrl, $txtEnglish, $txtHindi, $txtOdia, '', '', '','', '');
        if ($result){
                $row = mysqli_fetch_array($result);
                if ($row[0] == 1) {
                    $msg = ($action == 'AM') ? 'Record added successfully ' : 'Record updated successfully';
                }
                $outMsg = $msg;
            }
        $arrResult = array(
            'msg' => $outMsg,
            'flag' => $flag,
            'errFlag' => $errFlag
        );
        return $arrResult;
    }



    public function readPagedata($translateId) {
        $action     = 'R';
        $errFlag    = 0;
        $blanktranslate = Model::isBlank($translateId);
        $spltranslate   = Model::isSpclChar($translateId);


        if ($blanktranslate > 0) {
            $errFlag = 1;
            $flag = 1;
            $outMsg = "Mandatory Fields should not be blank";
        }else if($spltranslate > 0){
            $errFlag = 1;
            $flag = 1;
            $outMsg = "Special Characters are not allowed";
        }

        if($errFlag == 0){
            $result = $this->manageTranslate($action, $translateId, '', '', '', '', '', '', '','', '');
            if ($result){
                    $row = mysqli_fetch_array($result);
            }
            $arrResult = $row;
        }
           
        return $arrResult;
    }



     public function deleteTranslatePage($action, $ids) {

        $ctr = 0;
        $userId = $_SESSION['sessID'];
        $explIds = explode(',', $ids);
        $delRec = 0;
        foreach ($explIds as $indIds) {
            //manageTranslate($action, $explIds[$ctr], '', '', '', '', '', '', '','', '');
            $result = $this->manageTranslate($action, $explIds[$ctr], '', '', '', '', '', '', '','', '');
            $row = $result->fetch_array();
            if ($row[0] == 0) {
                $delRec++;
            } else {
                $unDoRec++;
            }
            $ctr++;
        }
        if ($action == 'D') {
            if ($delRec > 0)
                $outMsg .= 'Page deleted successfully';
            if ($unDoRec > 0)
                $outMsg .= ' Dependency record exist category cannot be deleted';
        }

        return $outMsg;
    }

}

?>