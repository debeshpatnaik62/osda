<?php
/*plugin*/

/* ================================================
  File Name          : skill-competition-dashboard.php
  Description        : This is to registered student dashboard
  Date Created       :
  Created By         : Rahul kumar saw
  Developed by       : Rahul Kumar Saw
  Developed on       : 13-May-2022
  Update History        :
  <Updated by>          <Updated On>      <Remarks>

  ================================================== */
  $strPageTitle             = 'Skill Competition Dashboard';
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
              <?php if(!empty($profile)) { ?>
            <img src="<?php echo $profile;?>">
            <?php } else { ?>
            <img src="<?php echo SITE_URL; ?>images/profile-img.png">
            <?php } ?>
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
              <div class="d-flex mt-2">
                 <div class="avatar-content mr-3 mt-3 w-19">
                         <img src="<?php echo SITE_URL; ?>images/mobile.png">
                        </div>
                      
                    <div class="info-text w-190">
                      <p class="card-text  mb-0">Mobile</p>
                     <h6 class="mb-0">+91 <?php echo $strMobile;?></h6>
              
                </div>
              </div>
               <div class="d-flex mt-2">
                    <div class="avatar-content mr-3 mt-3 w-19">
                         <img src="<?php echo SITE_URL; ?>images/card.png">
                        </div>
                      
                    <div class="info-text w-190">
                      <p class="card-text mb-0"><?php echo $strDocType;?></p>
                     <h6 class="mb-0"><?php echo $strDocNum;?></h6>
              
                </div>
              </div>
                 <div class="d-flex mt-2">
                    <div class="avatar-content mr-3 mt-3 w-19">
                         <img src="<?php echo SITE_URL; ?>images/dob.png">
                        </div>
                      
                    <div class="info-text w-190">
                      <p class="card-text mb-0">Date of Birth</p>
                     <h6 class="mb-0"><?php echo $dob;?></h6>
              
                </div>
              </div>
                   <div class="d-flex mt-2">
                    <div class="avatar-content mr-3 mt-3 w-19">
                         <img src="<?php echo SITE_URL; ?>images/gender.png">
                        </div>
                      
                    <div class="info-text w-190">
                      <p class="card-text mb-0">Gender</p>
                     <h6 class="mb-0"><?php echo $gender;?></h6>
              
                </div>
              </div>
                    <div class="d-flex mt-2">
                    <div class="avatar-content mr-3 mt-3 w-19">
                         <img src="<?php echo SITE_URL; ?>images/district1.png">
                        </div>
                      
                    <div class="info-text w-190">
                      <p class="card-text mb-0">District</p>
                     <h6 class="mb-0"><?php echo $dist;?></h6>
              
                </div>
              </div>
            </div>
            <a class="logout-card-footer mt-3" href="<?php echo SITE_URL.'skill-competition'; ?>" onclick ="resetOTP('<?php echo $strMobile;?>')">
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
          $strMobile   = htmlspecialchars_decode($row['vchPhoneno'], ENT_QUOTES);
          $strEmail    = htmlspecialchars_decode($row['vchEmailId'], ENT_QUOTES);
          $strRegdNum  = htmlspecialchars_decode($row['vchAckNo'], ENT_QUOTES);
          $skillName   = htmlspecialchars_decode($row['strSkills'], ENT_QUOTES);
          $strInstitute= htmlspecialchars_decode($row['vchAcademicInstitute'], ENT_QUOTES);
          $qualification   = htmlspecialchars_decode($row['vchQualification'], ENT_QUOTES);
          $registredDate= date('d-M-Y', strtotime($row['stmCreatedOn']));
          //$phase       = $row['intExtraField'];
          
          $intL1Marks    = ($row['intMarks']>0)?$row['intMarks']:'--';
          $intL2Marks    = ($row['intPanelMark']>0)?$row['intPanelMark']:'--';
          $intL3Marks    = ($row['intLevel3Mark']>0)?$row['intLevel3Mark']:'--';
          //$qualiStatus = ($row['tinEligibleStatus']==1)?'Qualified':'Disqualified';
          $encId = $objComp->encrypt($strRegdNum);
          $tagId         = $row['intTagId'];
          $panelId       = $row['intPanalId'];
          $level3Id      = $row['intLevel3TagId'];
          $level1Qualify  = $row['intLevelIQualify'];
          $level2Qualify  = $row['intPanelQualify'];
          $level3Qualify  = $row['intLevel3Qualify'];
          if($tagId>0)
          {
            $level1Tag  = 'active';
          }
          else
          {
            $level1Tag  = 'rejected';
            $level2Tag  = 'rejected';
            $level3Tag  = 'rejected';
            $level3Status = 'rejected';
          }
          if($panelId>0)
          {
            $level2Tag  = 'active';
          }
          else
          {
            $level2Tag  = 'rejected';
            $level3Tag  = 'rejected';
            $level3Status = 'rejected';
          }
          if($level3Id>0)
          {
            $level3Tag  = 'active';
          }
          else
          {
            $level3Tag  = 'rejected';
            $level3Status = 'rejected';
          }
          if($level3Qualify==1)
          {
            $level3Status = 'active';
          }
          else
          {
            $level3Status = 'rejected';
          }
        ?>
         <div class="col-12">
            <div class="card custome-card mt-lg-0 mb-3">
               <div class="deatils-card">
                <div class="card-header d-sm-flex justify-content-between">
                 <p class="mt-1 mb-0">Regd No. : - <span class="font-weight-bolder"><?php echo $strRegdNum;?></span></p>
                <!--  <a href="<?php echo SITE_URL;?>venue-details" class="osda--btn btn--rounded check-venue mt-sm-0 mt-3">Check Venue </a> -->
                </div>
               <div class="card-body">

                 <div class="row">
                  <div class="col-lg-4 col-sm-6  form-group">
                      <div class="card-media-body">
                      <p class="content-text m-0 ">Registered On</p>
                     <h6><?php echo $registredDate;?></h6>              
                </div>
                  </div>
                    <div class="col-lg-4 col-sm-6  form-group">
                      <div class="card-media-body">
                      <p class="content-text m-0 ">Applied Skill</p>
                     <h6><?php echo $skillName;?></h6>              
                </div>
                  </div>
                  <div class="col-lg-4 col-sm-6  form-group">
                      <div class="card-media-body">
                      <p class="content-text m-0 ">Qualification</p>
                     <h6><?php echo $qualification;?></h6>              
                </div>
                  </div>
                   <!-- <div class="col-lg-4 col-sm-6  form-group">
                      <div class="card-media-body">
                      <p class="content-text m-0 ">Institute Name</p>
                     <h6><?php echo $strInstitute;?></h6>              
                </div>
                  </div> -->
               <!--    <div class="col-lg-4 col-sm-6 form-group">
                    <div class="card-media-body">
                    <p class="content-text  my-0 ">Marks(Level-1)</p>
                     <h6><?php echo $intL1Marks;?></h6>             
                    </div>
                  </div> -->
                 <!--    <div class="col-lg-4 col-sm-6 form-group">
                      <div class="card-media-body">
                           <p class="content-text my-0 ">Qualify Status(Level-1)</p>
                          <?php   if($row['intMarks']>0){?>
                          <?php   if($row['intLevelIQualify']==1) { ?>
                             <h6 class="text-success">Qualified</h6> 
                             <?php } else {?>
                             <h6 class="text-danger">Disqualified</h6>
                           <?php } } else { ?> 
                             <h6>--</h6>
                             <?php } ?> 
                      </div>
                    </div> -->
                  <!--   <div class="col-lg-4 col-sm-6 form-group">
                    <div class="card-media-body">
                    <p class="content-text  my-0 ">Marks(Level-2)</p>
                     <h6><?php echo $intL2Marks;?></h6>             
                    </div>
                  </div> -->
                 <!--    <div class="col-lg-4 col-sm-6 form-group">
                      <div class="card-media-body">
                           <p class="content-text my-0 ">Qualify Status(Level-2)</p>
                          <?php   if($intL2Marks>0){?>
                          <?php   if($row['intPanelQualify']==1) { ?> 
                             <h6 class="text-success">Qualified</h6> 
                             <?php } else {?>
                             <h6 class="text-danger">Disqualified</h6>
                           <?php } } else { ?> 
                             <h6>--</h6>
                             <?php } ?>  
                      </div>
                    </div> -->
                   <!--  <div class="col-lg-4 col-sm-6 form-group">
                    <div class="card-media-body">
                    <p class="content-text  my-0 ">Marks(Level-3)</p>
                     <h6><?php echo $intL3Marks;?></h6>             
                    </div>
                  </div> -->
              <!--       <div class="col-lg-4 col-sm-6 form-group">
                      <div class="card-media-body">
                           <p class="content-text my-0 ">Qualify Status(Level-3)</p>
                          <?php   if($intL3Marks>0){?>
                          <?php   if($row['intLevel3Qualify']==1) { ?>
                             <h6 class="text-success">Qualified</h6> 
                             <?php } else {?>
                             <h6 class="text-danger">Disqualified</h6>
                           <?php } } else { ?> 
                             <h6>--</h6>
                             <?php } ?> 
                      </div>
                    </div> -->

                 </div>

                <div mb-3>
                    <ul class="progressbar mb-0 mt-4">
                      <li class="active">Registered</li>
                      <li class="<?php echo $level1Tag;?>">Level-1</li>
                      <li class="<?php echo $level2Tag;?>">Level-2</li>
                      <li class="<?php echo $level3Tag;?>">Level-3 </li>
                      <li class="<?php echo $level3Status;?>">Final Result</li>
                    </ul>
                  </div>

                <div class="row mt-lg-5 mt-4">
                   <div class="col-md-4">
                    <!--  <div class="card mark-card" style="box-shadow: rgb(0 0 0 / 16%) 0px 1px 4px!important;border-radius: 5px!important;"> -->
                    <div class="card mark-card mt-md-0 mt-4" style="box-shadow: rgb(0 0 0 / 16%) 0px 1px 4px!important;border-radius: 5px!important;">
                      <div class="card-header  h5 text-dark font-weight-bolder">
                        LEVEL 1
                      </div>
                     <div class="card-media-body p-3 ">
                        <!-- <div class="col-6 pr-0">
                           <p class="content-text m-0 ">Mark</p>
                        <h6><?php echo $intL1Marks;?></h6>
                        </div> -->
                            <p class="content-text m-0 ">Status</p>
                        <!-- <h6 class="qualified">Qualified</h6> -->
                        <?php   if($row['intMarks']>0){?>
                          <?php   if($row['intLevelIQualify']==1) { ?>
                             <h6 class="text-success">Qualified</h6> 
                             <?php } else if($row['intLevelIQualify']==2) {?>
                             <h6 class="text-danger">Disqualified</h6>
                            <?php } else {?>
                             <h6 class="yellow-text">Waiting</h6>
                           <?php } } else { ?> 
                             <h6>NA</h6>
                             <?php } ?> 
                       
                  
                     
                    </div>
                    <?php if($row['intTagId']>0 && ($intL1Marks==0)) {?>
             <div class="text-center px-3 pb-3 ">
                    
                     <a class="osda--btn btn--rounded btn-block admitcard-btn  mt-1 cw-100" href="javascript:void(0); " onclick ="downloadAdmitCard('<?php echo $strRegdNum;?>')"> <i class="fa fa-download mr-1" aria-hidden="true"></i> Download Admit Card</a>
                    </div>
                    <?php } ?>
                     </div>
                   </div>
                     <div class="col-md-4">
                    <div class="card mark-card mt-md-0 mt-4" style="box-shadow: rgb(0 0 0 / 16%) 0px 1px 4px!important;border-radius: 5px!important;">
                      <div class="card-header  h5 text-dark font-weight-bolder">
                        LEVEL 2
                      </div>
                     <div class="card-media-body p-3">
                        <!-- <div class="col-6 pr-0">
                             <p class="content-text m-0 ">Mark</p>
                        <h6><?php echo $intL2Marks;?></h6>
                        </div> -->
                              <p class="content-text m-0 ">Status</p>
                        <?php   if($intL2Marks>0){?>
                          <?php   if($row['intPanelQualify']==1) { ?>
                             <h6 class="text-success">Qualified</h6> 
                             <?php } else if($row['intPanelQualify']==2) {?>
                             <h6 class="text-danger">Disqualified</h6>
                            <?php } else {?>
                             <h6 class="yellow-text">Waiting</h6>
                           <?php } } else { ?> 
                             <h6>NA</h6>
                             <?php } ?> 
                      
                    </div>
                    <?php if($row['intPanalId']>0 && ($intL2Marks==0)) {?>
                    <div class="text-center px-3 pb-3 ">
               
                       <a class="osda--btn btn--rounded btn-block admitcard-btn  mt-1 cw-100" href="javascript:void(0); " onclick ="downloadAdmitCard('<?php echo $strRegdNum;?>')"> <i class="fa fa-download mr-1" aria-hidden="true"></i> Download Admit Card</a>
                    </div>
                    <?php } ?>

                     </div>
                   </div>
                       <div class="col-md-4  ">
                    <div class="card mark-card mt-md-0 mt-4" style="box-shadow: rgb(0 0 0 / 16%) 0px 1px 4px!important;border-radius: 5px!important;">
                      <div class="card-header  h5 text-dark font-weight-bolder">
                        LEVEL 3
                      </div>
                     <div class="card-media-body p-3">
                        <!-- <div class="col-6 pr-0">
                           <p class="content-text m-0 ">Mark</p>
                        <h6><?php echo $intL3Marks;?></h6>
                         
                        </div> -->
                                 <p class="content-text m-0 ">Status</p>
                        <?php   if($intL3Marks>0){?>
                          <?php   if($row['intLevel3Qualify']==1) { ?>
                             <h6 class="text-success">Qualified</h6> 
                             <?php } else if($row['intLevel3Qualify']==2) {?>
                             <h6 class="text-danger">Disqualified</h6>
                            <?php } else {?>
                             <h6 class="yellow-text">Waiting</h6>
                           <?php } } else { ?> 
                             <h6>NA</h6>
                             <?php } ?> 
                    
                    
                     
                    </div>
                    <?php if($row['intLevel3TagId']>0 && ($intL3Marks==0)) {?>
                    <div class="text-center px-3 pb-3 ">
                    <!--  <a class="osda--btn btn--rounded check-venue-cutome custome-markbtn mt-1 cw-100" href="<?php echo SITE_URL.'venue-details/'.$encId;?>">Check venue</a> -->
                        <a class="osda--btn btn--rounded btn-block admitcard-btn  mt-1 cw-100" href="javascript:void(0); " onclick ="downloadAdmitCard('<?php echo $strRegdNum;?>')"> <i class="fa fa-download mr-1" aria-hidden="true"></i> Download Admit Card</a>
                    </div>
                    <?php } ?>
                     </div>
                   </div>
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
   $('.logout').click(function() {
    $.ajax({
      type: 'GET',
      url: '<?php echo SITE_URL.'skill-competition-login'; ?>',
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
   // resetOTP();
});
    function downloadAdmitCard(regdNo){
        var qrUrl = "<?php echo SITE_URL.'include/generateQR2.php?text=';?>"+regdNo;
        //var qrUrl = "<?php //echo SITE_URL.'include/generateQR2.php?text='.$regdNo.'_'.$firstName.'_'.$examDate.'_'.$level ;?>";
        //console.log(qrUrl);
        var dowloadURL = "<?php echo SITE_URL;?>admitCard/"+regdNo;
           $.ajax({
               type: "GET",
               url: qrUrl,
               dataType: "html",
               success: function (data) {
                  if(data =='success'){
                      window.open(dowloadURL);
                    }
               }
           });
    }
  </script>