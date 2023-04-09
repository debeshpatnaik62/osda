<?php 
/*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 
Author : 
*/ 
$strPageTitle             = 'Payment Response';
include_once( CLASS_PATH . 'clsSkillDevelopment.php');


$objDevelopment = new clsSkillDevelopment;

include_once(APP_PATH . 'model/customModel.php');

$objModel  = new Model();
?>
<?php include('Crypto.php');?>
<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?>
<!--start:: contarea-->
<section class="container contarea">
    <h2 class="text-center">Registration for Digital Skilling Program</h2>
    <div class="row my-5">
        <div class="col-sm-12" style="text-align: center;">
        <?php    
            error_reporting(0);
    $nid   = (isset($_REQUEST['PARAM']) && ($_REQUEST['PARAM']!=''))?$_REQUEST['PARAM']:'';
    $workingKey= WORKING_KEY;//'16221BF2ED4E08F49111930A90B5A9D8';     //Working Key should be provided here.
    $encResponse=$_POST["encResp"];         //This is the response sent by the CCAvenue Server
    $rcvdString=decrypt($encResponse,$workingKey);      //Crypto Decryption used as per the specified working key.
    $order_status="";
    $decryptValues=explode('&', $rcvdString);
    $dataSize=sizeof($decryptValues);
    echo "<center>";
    $regNo = $_SESSION['regdNo'];
    $billing_email = $_SESSION['emailId'];
    $pageURl = SITE_URL."digital-skill-dashboard/".$nid;
 
/*echo "===============";
print_r($decryptValues);exit;*/
    
    for($i = 0; $i < $dataSize; $i++) 
    {
        $information=explode('=',$decryptValues[$i]);
        if($i==0)
        {
            $order_id=$information[1];
        }   
        if($i==1){   
        $tracking_id=$information[1];
        }
        if($i==2)   {
        $bank_ref_no=$information[1];
    }
        if($i==3)   {
        $order_status=$information[1];
    }
        if($i==4)  { 
        $failure_message=$information[1];
    }
        if($i==5)   {
        $payment_mode=$information[1];
    }
        if($i==7) {  
        $status_code=$information[1];
    }
        if($i==9)   {
        $currency=$information[1];
    }
        if($i==10)  { 
        $amount=$information[1];
    }
        if($i==32) {
        $offer_type =$information[1];
    }
        if($i==33)  { 
        $offer_code=$information[1];
    }
        if($i==34) {  
        $discount_value=$information[1];
    }
        if($i==35) {  
        $mer_amount=$information[1];
    }
        if($i==37) {  
        $retry=$information[1];
    }
        if($i==40)
        {
        $trans_date = $information[1];
        }    
    }

    $tmp  = explode(" ",$trans_date);
    $temp2 = explode("/",$tmp[0]);
    $date = "$temp2[2]-$temp2[1]-$temp2[0]";
    $trans_date= date("Y-m-d H:i:s",strtotime($date." ".$tmp[1]));

    if(strtolower($order_status)==="success")
    {
        $payment_status=PAYMENT_SUCCESS;
    }
    else if(strtolower($order_status)==="failure")
    {
        $payment_status=PAYMENT_FAILURE;
    }
    else if(strtolower($order_status)==="aborted")
    {
        $payment_status=PAYMENT_CANCEL;
    }
    else
    {
        $payment_status=PAYMENT_PENDING;
    }


    /*if($regNo==$order_id)
    {*/
    $arrConditions = array('order_id'=>$order_id,'tracking_id' => $tracking_id,'bank_ref_no' => $bank_ref_no,'order_status' => $order_status,'failure_message' => $failure_message,'payment_mode' => $payment_mode,'offer_type' => $offer_type,'offer_code' => $offer_code,'discount_value' => $discount_value,'retry' => $retry,'trans_date' => $trans_date,'mer_amount' => $mer_amount,'response'=>$rcvdString,'tinPayStatus' => $payment_status);

    $result = $objDevelopment->manageskillDevelopment('UP', $arrConditions);
    //}
    if(strtolower($order_status)==="success")
    { ?>
        <img src="<?php echo SITE_URL;?>images/successful.png" alt="" width="100px">
            <h3 class="text-success mb-4 mt-3">Thank you for the payment towards Digital Skilling Program.  </h3>
            <p style="text-align: center;">Your transaction is processed successfully with transaction id " <strong><?php echo $order_id;?></strong> ". </p>
            <br><br>
            <p style="text-align: center;"><small><i>For any clarification you can reach out your College authorities (if you are a student) or <strong> skilldev.osda@gmail.com </strong> (if you are a professional) </p>
            <div class="my-5">
                <a id="" href="<?php echo $pageURl;?>" class="osda--btn btn--rounded">Close</a>
            </div>
        
   <?php  }
    else if(strtolower($order_status)==="aborted")
    {   ?>
        <img src="<?php echo SITE_URL;?>images/payment-fail.png" alt="" width="100px">
        <h3 class="text-danger mb-4 mt-3">Thank you for registration .However, your registration is aborted. </h3>
        <div class="my-5">
                <a href="<?php echo SITE_URL;?>skill-development" class="osda--btn btn--rounded" style="width: 120px;">Try Again</a>
            </div>
   <?php }
    else if(strtolower($order_status)==="failure")
    {?>
        <img src="<?php echo SITE_URL;?>images/payment-fail.png" alt="" width="100px">
            <h3 class="text-danger mb-4 mt-3">Thank you for registration .However,the transaction has been declined. </h3>
            <div class="my-5">
                <a href="<?php echo SITE_URL;?>skill-development" class="osda--btn btn--rounded" style="width: 120px;">Try Again</a>
            </div>
   <?php }
    else
    {
        echo "<br>Security Error. Illegal access detected";
    
    }

    //send mail to osda
                        if (SEND_MAIL == "T") { 
                          
                            $strUserTo[] = $billing_email;
                            $strUserFrom = DEVELOP_EMAIL;

                            $strsubject = "Payment for SAP ERP " ;

                            
                            $strUserMessage = "Thank you for the payment towards Digital Skilling Program..</br></br>";

                            $strUserMessage .= "Your transaction is " . $order_status ."  with transaction id  <strong>"  . $order_id ." </strong></br></br>";

                            $strUserMessage .= "For any clarifications you can reach out to <strong> skilldev.osda@gmail.com  </strong> with your registration number. </br>";
                            $strUserMessage .= "<div> <br>";
                            $strUserMessage .= "</div>";

                            $strUserMessage .= "All the Best! </br>";

                            //$strUserMessage .= "<div> <br>";
                            //$strUserMessage .= "</div>";
                            $strUserMessage .= "<div><br><br>Regards <br>Skill Development Team <br>OSDA</div>";

                            $userdata['from'] = $strUserFrom;
                            $userdata['to'] = $strUserTo;
                            $userdata['name'] = 'Odisha Skill Development Authority';
                            $userdata['sub'] = $strsubject;
                            $userdata['message'] = $strUserMessage;
                            $jsUserData = json_encode($userdata);
                            $mailUserRes = $objModel->sendAuthMailSkillDevelop($jsUserData);
                            //print_r($mailUserRes);exit;
                        }

    /*echo "<br><br>";

    echo "<table cellspacing=4 cellpadding=4>";
    for($i = 0; $i < $dataSize; $i++) 
    {
        $information=explode('=',$decryptValues[$i]);
            echo '<tr><td>'.$information[0].'</td><td>'.urldecode($information[1]).'</td></tr>';
    }

    echo "</table><br>";*/
    echo "</center>";

    unset($_SESSION['regdNo']);
    unset($_SESSION["extStatus"]);
    unset($_SESSION['fees']);
    unset($_SESSION['mobileNo']);
    unset($_SESSION['emailId']);
    unset($_SESSION['instituteCode']);
    unset($_SESSION['strInstituteName']);
    unset($_SESSION['strCourseCode']);
    unset($_SESSION['strCourseName']);

         ?>   

        </div>
    </div>
  
</section>
<script type="text/javascript">
// set value for local storage By Rahul ON::20-06-2022
   /* $(document).ready(function(){
        var getRegdNo = localStorage.getItem('regdNo');
        console.log(getRegdNo);
        if(typeof(getRegdNo)!='undefined' && getRegdNo!=null && getRegdNo!='')
        {
            var profUrl = localStorage.getItem('viewUrl');
            console.log(profUrl);
            $('#ancViewProfile').prop('href',profUrl);
        }
        else
        {   
            $('#ancViewProfile').addClass('d-none');            
        }

    });*/
</script>
<!--end:: contarea-->
<!--start::Footer-->
<?php include 'include/footer.php' ?>
</body>
</html>
