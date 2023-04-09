<?php
/*plugin*/
$phpvariable = "<script>document.write(localStorage.getItem('regdNo'))</script>";
//echo $phpvariable;exit;
/* ================================================
  File Name          : digital-skill.php
  Description        : This is to registered student dashboard
  Date Created       :
  Created By         : Rahul kumar saw
  Developed by       : Rahul Kumar Saw
  Developed on       : 20-April-2022
  Update History        :
  <Updated by>          <Updated On>      <Remarks>

  ================================================== */
  $strPageTitle             = 'Digital Skill Dashboard';
?>
<!doctype html>
<html lang="en">

<?php include 'include/header.php' ?>


<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/feedback.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/nano-unicorn.css">
<script src="<?php echo APP_URL; ?>js/loadAjax.js"></script>

   <section class="container contarea">
    <div class="row">
       <div class="col-lg-3 pr-lg-0">
         <div class="card mb-lg-0 mb-3">
            <div class="image_conteiner">
             <div class="image">
            <img src="<?php echo SITE_URL; ?>images/profile-img.png">
            </div>
            </div>
            <div class="card-body">
               <div class="text-center customemt-3">
                   <h3 class=""><?php echo $strName;?></h3>
               </div>
                <div class="d-flex ">
                  <div class="avatar-content mr-3 mt-3 w-19">
                         <img src="<?php echo SITE_URL; ?>images/mail.png">
                        </div>
                      
                    <div class="info-text w-190">
                      <p class="card-text mb-0">Email</p>
                     <h6 class="mb-0"><?php echo $strEmail;?></h6>
              
                </div>
              </div>
              <div class="d-flex mt-3">
                 <div class="avatar-content mr-3 mt-3 w-19">
                         <img src="<?php echo SITE_URL; ?>images/mobile.png">
                        </div>
                      
                    <div class="info-text w-190">
                      <p class="card-text mb-0">Mobile</p>
                     <h6 class="mb-0">+91 <?php echo $strMobile;?></h6>
              
                </div>
              </div>
               <div class="d-flex mt-3">
                    <div class="avatar-content mr-3 mt-3 w-19">
                         <img src="<?php echo SITE_URL; ?>images/card.png">
                        </div>
                      
                    <div class="info-text w-190">
                      <p class="card-text mb-0"><?php echo $strDocType;?></p>
                     <h6 class="mb-0"><?php echo $strDocNum;?></h6>
              
                </div>
              </div>
            </div>
            <a class="logout-card-footer mt-3 " href="<?php echo SITE_URL.'digitall-skill'; ?>" onclick ="resetSkillOTP('<?php echo $strMobile;?>')">
            <div class="text-center   p-3 mt-2 logout">
               
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Group_12" data-name="Group 12" width="19.467" height="19.421" viewBox="0 0 19.467 19.421">
  <defs>
    <clipPath id="clip-path">
      <rect id="Rectangle_17" data-name="Rectangle 17" width="19.467" height="19.421" />
    </clipPath>
  </defs>
  <g id="Group_11" data-name="Group 11" clip-path="url(#clip-path)">
    <path id="Path_72" data-name="Path 72" d="M4.576,19.421l-.022-.008-.092-.031c-.069-.023-.141-.046-.211-.074l-.639-.255c-.846-.337-1.721-.686-2.58-1.035a1.488,1.488,0,0,1-.828-.7,2.687,2.687,0,0,1-.142-.374c-.017-.053-.034-.107-.053-.159L0,16.762V2.652L.007,2.63c.017-.05.032-.1.047-.15a2.354,2.354,0,0,1,.128-.354,1.545,1.545,0,0,1,.869-.742C2.1.959,3.18.521,4.247.1A1.455,1.455,0,0,1,4.778,0,1.244,1.244,0,0,1,6.016,1.222c.015.191.022.365.022.533,0,5.693,0,10.831,0,16.062a2.6,2.6,0,0,1-.091.72,1.239,1.239,0,0,1-.976.88l-.016,0ZM4.788.912A.509.509,0,0,0,4.6.951c-.637.252-1.283.512-1.908.764q-.667.269-1.335.537A.639.639,0,0,0,.922,2.9v.081c0,.054,0,.107,0,.161q0,6.562,0,13.123c0,.1,0,.2.005.291a.6.6,0,0,0,.4.581c.1.039.2.082.294.124s.172.075.258.109l.227.091c.807.323,1.641.657,2.463.981a.613.613,0,0,0,.22.048h0c.178,0,.281-.126.306-.376.012-.119.018-.234.018-.34q0-3.416,0-6.831V8.406q0-3.389,0-6.779A3.429,3.429,0,0,0,5.1,1.27c-.011-.108-.064-.358-.308-.358" />
    <path id="Path_73" data-name="Path 73" d="M159.126,136.508a.43.43,0,0,1-.33-.153.441.441,0,0,1-.018-.584,1.071,1.071,0,0,1,.118-.13l.023-.023,2.3-2.3H150.965a1.224,1.224,0,0,1-.239-.017.424.424,0,0,1-.357-.42.419.419,0,0,1,.323-.45,1.281,1.281,0,0,1,.332-.031h10.193l-.981-.98-1.314-1.312-.016-.016a1.181,1.181,0,0,1-.138-.154.45.45,0,0,1,.051-.594.438.438,0,0,1,.586-.036,1.249,1.249,0,0,1,.151.135l0,0q1.5,1.493,2.993,2.988c.051.051.1.1.142.155l.061.069.036.04v.289l-.03.038c-.02.025-.038.051-.057.077a1.508,1.508,0,0,1-.15.184c-.93.932-1.879,1.878-2.8,2.792l-.21.21a1.1,1.1,0,0,1-.144.128.487.487,0,0,1-.28.092" transform="translate(-143.324 -123.159)" />
    <path id="Path_74" data-name="Path 74" d="M142.115,33.943a.417.417,0,0,1-.42-.311,1.012,1.012,0,0,1-.035-.3q0-.594,0-1.187c0-1.082-.008-2.2.009-3.3a.948.948,0,0,0-.251-.7.972.972,0,0,0-.7-.266h-.019c-.52.007-1.081.011-1.766.011l-1.26,0-1.19,0H136.4a.744.744,0,0,1-.155-.013.452.452,0,0,1-.04-.878.928.928,0,0,1,.261-.027h4.271a1.749,1.749,0,0,1,1.846,1.835c0,.509,0,1.026,0,1.526q0,.34,0,.681v.464q0,.927,0,1.854v.031a1.105,1.105,0,0,1-.014.219.426.426,0,0,1-.412.364h-.038" transform="translate(-129.511 -25.703)" />
    <path id="Path_75" data-name="Path 75" d="M139.391,245.393h-2.078a1.073,1.073,0,0,1-.235-.02.431.431,0,0,1-.361-.462.439.439,0,0,1,.408-.429,1.318,1.318,0,0,1,.153-.007h4.264a.834.834,0,0,0,.9-.634,1.43,1.43,0,0,0,.023-.321V243.5q0-1.156,0-2.312,0-1.078,0-2.155a1.08,1.08,0,0,1,.032-.3.416.416,0,0,1,.421-.32l.052,0a.425.425,0,0,1,.4.375,1.144,1.144,0,0,1,.012.2v.026q0,.969,0,1.938v.4q0,.341,0,.683c0,.506,0,1.028,0,1.543a1.707,1.707,0,0,1-1.318,1.746,2.066,2.066,0,0,1-.536.06c-.632,0-1.31,0-2.136,0" transform="translate(-130.313 -227.249)" />
    <path id="Path_76" data-name="Path 76" d="M82.318,179.853a.462.462,0,0,1-.452-.419.614.614,0,0,1-.008-.1q0-.233,0-.466c0-.435,0-.884,0-1.327a.462.462,0,0,1,.46-.517c.279,0,.454.2.458.52,0,.21,0,.422,0,.628q0,.135,0,.27v.141h0q0,.07,0,.14c0,.221,0,.449,0,.675a.444.444,0,0,1-.442.45Z" transform="translate(-78.022 -168.737)" />
  </g>
</svg>
                <span  class="user-logout ml-3">Logout</span> 
            </div>
            </a>
         </div>

       </div>
       <div class="col-lg-9">
      <div class="row">
        <?php if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) { 
          $strMobile   = htmlspecialchars_decode($row['vchMobile'], ENT_QUOTES);
          $strEmail    = htmlspecialchars_decode($row['vchEmail'], ENT_QUOTES);
          $strRegdNum  = htmlspecialchars_decode($row['vchRegdNumber'], ENT_QUOTES);
          $strTPName   = htmlspecialchars_decode($row['vchTP'], ENT_QUOTES);
          $strProgram  = htmlspecialchars_decode($row['interestedCourseName'], ENT_QUOTES);
          //$strInstitute= htmlspecialchars_decode($row['instituteName'], ENT_QUOTES);
          $preTPName   = htmlspecialchars_decode($row['vchCourseType'], ENT_QUOTES);
          $preProgram  = htmlspecialchars_decode($row['previnterestedCourseName'], ENT_QUOTES);
          $preInstitute= htmlspecialchars_decode($row['previnstituteName'], ENT_QUOTES);
          $startDate   = date('d-M-Y', strtotime($row['startDate']));
          $endDate     = date('d-M-Y', strtotime($row['endDate']));
          $registredDate= date('d-M-Y', strtotime($row['stmCreatedOn']));
          $phase       = $row['intExtraField'];
          $status      = $row['tinApproveStatus'];
          $intMarks    = ($row['intTestMark']>0)?$row['intTestMark']:'--';
          $qualiStatus = ($row['tinEligibleStatus']==1)?'Qualified':'Disqualified';
          $studentFee     = $row['intStudentFee'];
          $studentQty     = $row['intStudentQty'];
          $trainFee       = $row['intTrainFee'];
          $trainQty       = $row['intTrainQty'];
          $insFee         = $row['intInsFee'];
          $insQty         = $row['intInsQty'];
          $appStudentFee  = $row['intAppStudFee'];
          $appStudentQty  = $row['intAppStudQty'];
          $appTrainFee    = $row['intAppTrainFee'];
          $appTrainQty    = $row['intAppTrainQty'];
          $appInsFee      = $row['intAppInsFee'];
          $appInsQty      = $row['intAppInsQty'];
          $totTPAmount      = ($studentFee*$studentQty)+($trainFee*$trainQty)+($insFee*$insQty);
          $totVerifiedAmount = ($appStudentFee*$appStudentQty)+($appTrainFee*$appTrainQty)+($appInsFee*$appInsQty);
          $studProFee     = $totTPAmount/$studentQty;
          $verifiedProFee = $totVerifiedAmount/$appStudentQty;
          if($totVerifiedAmount>0)
          {
             $programFee =  $verifiedProFee;
          }
          else if($totTPAmount>0)
          {
              $programFee = $studProFee;
          }
          else
          {
            $programFee = '0';
          }
          if($row['intInstituteId']==1000)
            {
              $strInstitute = $row['vchOtherInstituteName'];
            }
            else
            {
              $strInstitute = $row['instituteName'];
            }

          //$programFee  = ($row['programFee']==0)?'Free':$row['programFee'];
          $instituteFee= $row['instituteFee'];
          $TPFee       = $row['TPFee'];
          $OSDAFee     = $row['OSDAFee'];
          $payStatus   = ($row['tinPayStatus']==1)?'Paid':'Not paid';
          $totalPer    = $instituteFee+$TPFee+$OSDAFee;
          $payableFee  = ($programFee)-($programFee)/(100/$totalPer);
          //$strCourseName = $row['strCourseName'];
          $intInstituteId = $row['intInstituteId'];
          $strCourseCode = $row['vchCoursesFor'];
          $instituteCode = 'C'.$intInstituteId;
          if($row['vchCoursesFor']=='Others')
          {
              $strCourseName = $row['vchOtherCourseName'];
          }
          else
          {
              $strCourseName = $row['vchCoursesFor'];
          }
          if($phase==0)
          {
            $tpName   = $preTPName;
            $progName = $preProgram;
            $insName  = $preInstitute;
            $programFee= '--';
            $programDate = '--';
          }
          else
          {
            $tpName   = $strTPName;
            $progName = $strProgram;
            $insName  = $strInstitute;
            $programFee= $programFee;
            $programDate = $startDate .' To '.$endDate;
          }
          if($status==1)
          {
            $insApproval = 'active';  
          }
          else
          {
            $insApproval = 'rejected';
            $assignApproval= 'notstarted';
          }
          if($row['tinEligibleStatus']==1)
          {
            $assignApproval = 'active';
          }
          else
          {
            $assignApproval = 'rejected';
            $makePayment = 'notstarted';
            $takeTrining = 'notstarted';
          }
          if($row['tinPayStatus']==1)
          {
            $makePayment = 'active';
            $takeTrining = 'active';
          }
          else
          {
            $makePayment = 'rejected';
            $takeTrining = 'rejected';
          }
        ?>
         <div class="col-12">
            <div class="card custome-card mt-lg-0 mb-3">
               <div class="deatils-card">
                <div class="card-header">
                 <h4 class="my-0"><?php echo $progName;?></h4>
                 <p class="my-0">Regd No. : - <span class="font-weight-bolder"><?php echo $strRegdNum;?></span></p>
                </div>
               <div class="card-body">

                 <div class="row">
                  <!--  <div class="col-lg-4 col-sm-6 form-group">
                       <div class="card-media-body">
                      <p class="content-text m-0 ">Registration No.</p>
                     <h6></h6>              
                </div>
                  </div> -->
                  <div class="col-lg-4 col-sm-6  form-group">
                      <div class="card-media-body">
                      <p class="content-text m-0 ">Registered On</p>
                     <h6><?php echo $registredDate;?></h6>              
                </div>
                  </div>
                    <div class="col-lg-4 col-sm-6  form-group">
                      <div class="card-media-body">
                      <p class="content-text m-0 ">Training Partner Name</p>
                     <h6><?php echo $tpName;?></h6>              
                </div>
                  </div>

              <!--   <div class="col-lg-4 col-sm-6  form-group">
                      <div class="card-media-body">
                       <p class="content-text m-0 ">Program Name</p>
                     <h6></h6>              
                </div>
                  </div> -->

                 <div class="col-lg-4 col-sm-6  form-group">
                      <div class="card-media-body">
                      <p class="content-text m-0 ">Program Date</p>
                     <h6><?php echo $programDate;?></h6>              
                </div>
                  </div>
                  <div class="col-lg-4 col-sm-6  form-group">
                      <div class="card-media-body">
                     <p class="content-text m-0 ">Program Fee</p>
                      <h6><?php echo $programFee;?></h6>             
                </div>
                  </div>
                   <div class="col-lg-4 col-sm-6  form-group">
                      <div class="card-media-body">
                      <p class="content-text m-0 ">Institute Name</p>
                     <h6><?php echo $insName;?></h6>              
                </div>
                  </div>
                  <div class="col-lg-4 col-sm-6 form-group">
                    <div class="card-media-body">
                    <p class="content-text  my-0 ">Marks</p>
                     <h6><?php echo $intMarks;?></h6>             
                    </div>
                  </div>
                    <div class="col-lg-4 col-sm-6 form-group">
                      <div class="card-media-body">
                           <p class="content-text my-0 ">Qualify Status</p>
                          <?php   if($row['intTestMark']>0){?>
                          <?php   if($row['tinEligibleStatus']==1) { ?>
                             <h6 class="text-success"><?php echo $qualiStatus;?></h6> 
                             <?php } elseif($row['tinEligibleStatus']==2) { ?>
                             <h6 class="text-danger"><?php echo $qualiStatus;?></h6>
                             <?php } else {?>
                             <h6 class="yellow-text">Pending</h6>
                           <?php } } else { ?> 
                             <h6>NA</h6>
                             <?php } ?> 
                      </div>
                    </div>
                <div class="col-lg-4 col-sm-6 ">
                      
                 <div class="card-media-body ">
                       <p class="content-text m-0 ">Payment Status</p>
                       <?php if($row['tinEligibleStatus']==1) { ?>
                      <h6><?php echo $payStatus;?></h6>
                       <?php } else{?>
                       <h6>--</h6>
                       <?php } ?>              
                </div>
              
                  </div>

                 </div>
                 <div class="row mt-3">
                      
                      <?php if($row['tinEligibleStatus']==1 && ($phase==1) && ($row['tinPayStatus']!=1) && ($payableFee>0)) {?>
                      <div class="col-lg-4 col-6">
                         <p class="content-text m-0 ">Need to Pay</p>
                     <h3 class="mt-2 mb-0 pink-color"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $payableFee;?></h3>
                     </div>
                     <div class="card-media-body col-lg-3 col-sm-4 col-6">
                      <a class="osda--btn btn--rounded btn-block mt-lg-3 mt-4" id='paymentFormData' href="javascript:void(0);"  onclick="javascript:paymentForm('<?php echo $strRegdNum;?>','<?php echo $payableFee;?>','<?php echo $strMobile;?>','<?php echo $strEmail;?>','<?php echo $instituteCode;?>','<?php echo $strInstitute;?>','<?php echo $strCourseCode;?>','<?php echo $strTPName;?>');">Pay Now </a>
                      </div>
                      <?php } else if($phase==0){ ?>
                      
                      <?php } else if($status==0){ ?>
                        <?php  if($row['intInstituteId']==1000) {?>
                         <div class="col-12">
                        <div class="d-sm-flex">
                           <h4 class="  mt-3 mb-0">Registration Status :</h4>
                           <h4 class="ml-sm-2 mt-sm-3 mt-0 yellow-text">Pending at authority side</h4>
                        </div>
                     </div>
                      <?php } else { ?>
                      <div class="col-12">
                        <div class="d-sm-flex">
                           <h4 class="  mt-3 mb-0">Registration Status :</h4>
                           <h4 class="ml-sm-2 mt-sm-3 mt-0 yellow-text">Pending at institute side</h4>
                        </div>
                     </div>
                     <?php } } ?>
                     
                    
                  </div> 
                  <hr class="custome-bordertop">
                  <div>
                    <ul class="progressbar mb-0">
                      <li class="active">Applied</li>
                      <li class="<?php echo $insApproval;?>">Institution Approval</li>
                      <li class="<?php echo $assignApproval;?>">Assignment Qualification</li>
                      <li class="<?php echo $makePayment;?>">Make Payment</li>
                      <li class="<?php echo $takeTrining;?>">Training Practice</li>
                    </ul>
                  </div>
               </div>
                  
               
                 
            </div>
              </div>
         </div>
         <?php } } ?>
           
         </div>
      </div>
       </div>
    </div> 
   </section>


   <!--end:: contarea-->
   <!--start::Footer-->
   <?php include 'include/footer.php' ?>
  <script type="text/javascript">
    function paymentForm(regdNo,payableFee,strMobile,strEmail,instituteCode,strInstitute,strCourseCode,strTPName)
    { 
      var regdNo = regdNo;
      var payableFee = payableFee;
      var strMobile = strMobile;
      var strEmail = strEmail;
      var instituteCode = instituteCode;
      var strInstitute = strInstitute;
      var strCourseCode = strCourseCode;
      var strTPName = strTPName;


      fillPaymentData('',regdNo,payableFee,strMobile,strEmail,instituteCode,strInstitute,strCourseCode,strTPName);
        $('form').attr('action', '<?php echo SITE_URL;?>ccavRequestHandler'); 
        if(confirm('You are leaving the current webpage of www.skillodisha.gov.in to a merchant bank payment gateway for having a secured transaction to pay the relevant fees. Kindly do not close the browser while it is processing.')){
            $('#paymentFormData').hide();
            $('form').submit();
        }
    }

    $('.logout').click(function() {
    $.ajax({
      type: 'GET',
      url: '<?php echo SITE_URL.'digital-skill'; ?>',
      data: {
        id: '123'
      },
      datatype: 'html',
      cache: 'false',
      success: function(response) {
        localStorage.clear();
      },
      error: function() {

      }
    });
});
  </script>
