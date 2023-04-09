<?php
/*plugin*/

/*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 03 Feb 2018
Author : MRD
*/
include_once('statisticsContentInner.php');
?>

<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?>
<script language="javascript" type="text/javascript" href="<?php echo SITE_URL; ?>js/jquery.min_3.2.1.js"></script>
<script src="<?php echo SITE_URL; ?>js/custom.js" type="text/javascript"></script>
<script src="<?php echo SITE_URL; ?>js/loadAjax.js" type="text/javascript"></script>
<!--start:: contarea-->

<form name="frmOsda" id="frmOsda"  method="post" action="" enctype="multipart/form-data" autocomplete="off">
    <section>
  <div class="container">
       <div class="row">
           <?php
                if($strType ==''){
            ?>
                <div class="col-md-12 col-sm-12 col-xs-12 mrtop-120 pzero animatedParent" data-appear-top-offset='-150'>
            <?php } else { ?>
                <div class="col-md-12 col-sm-12 col-xs-12 pzero animatedParent" data-appear-top-offset='-150'>
            <?php } ?> 
            <h2 class="titlepage">
                 <span class="<?php echo $strPageTtlcls; ?>"> <?php echo $strPageTitle; ?></span>
              <small><?php echo $strTagline;?></small> 
                 </h2>
                 <div class="clearfix"></div>

                 <!-- Start :: navigation-->
                    <?php include('includes/navigation.php'); ?>
                  <!--Header navigation-->

                 <div class="clearfix"></div>
                  <div class="bggreysearch">  
               <div class="col-md-8 col-sm-8 noPrint col-sm-offset-2">
                    <div class="input-group searchbox">
                   
                          <input type="text" name="txtAckNo" id="txtAckNo" class="form-control" maxlength="30" title="Enter Your Acknowledgement No/Mobile No" placeholder="Enter Your Acknowledgement No/Mobile No" value="" autocomplete="off">
                          <span id="course-datalist"></span>
                          
                          <span class="input-group-btn">
                          <button class="btn btn-secondary" type="button" onclick="validateVenue();" name="btnSearch" id="btnSearch"><i class="fa fa-search"></i> </button>
                     </span> 
                    </div>
                 </div>
             </div> 
                 <div class="innerleft bgwhite">
                       
                    <div class="clearfix"></div>
                    
                    
                         <div class="col-md-12 col-sm-12 coursenewbox">
                                <div class="clearfix hidden-xs hidden-sm"></div>
                                
                                <span id="dispVenueRes"></span>

                                                         
                                <div class="clear50"></div>
                                                            
                                 
                               <h4> Instructions for Preliminary Level 1 Test - 2020</h4>
    
    
   <ol class="preliminaryol">
<li>The candidate is being allowed to appear in the Preliminary Examination, subject to fulfillment of the eligibility conditions and verification of applicant’s documents.</li> 

<li>Candidate should be formal dress and should be wearing black shoes.</li>
<li> Reporting time is one hour before the start of examination. Traffic may be heavy on the day of examination. Candidates are advised to reach the centre well in time.</li>
<li>Gate of the examination centre will close 15 minutes before the commencement of examination. Entry shall not be allowed under any circumstances after gate is closed.</li>
<li>No candidate is allowed to leave the examination hall before the end of examination.</li>
<li>Please bring a valid ID proof (in original).</li>
<li><strong>Electronic and communication devices like cellular phone / smart electronic gadgets etc. and textual materials are strictly prohibited in the examination centre premises.</strong></li>
<li> No bags are permitted in the exam premises. Smoking, eatables and water bottles are not allowed inside the examination hall.</li>

<li>Candidate will not be entertained by any examination centre other than the one allotted.</li>
<li>Don’t start answering the questions until you are asked to do so.</li>
<li>Ensure that there are questions in the Test Booklet with four responses A, B, C and D. Of them only one is correct as the best answer to the question concerned.</li>
<li>There will be <strong>NEGATIVE MARKING</strong> for wrong answer. Each correct answer shall be awarded 1 mark, while <strong>1/2 mark</strong> will be deducted for each wrong answer.</li>
<li>Multiple answering of a question will cause the answer to be rejected.</li>
<li>The applicant must bring <strong>black/blue ball point pen</strong> for filling the OMR sheet Use of pencil, ink/jel pen is strictly prohibited.</li>
<li>Use only <strong>Black or Blue</strong> Ball pen for darkening the circle completely.</li>

 For example :  <img src="<?php echo SITE_URL; ?>images/black-circle.jpg" height="50px"/>

<li>Rough work is to be done only on the rough pages of the Test Booklet and not on the answer (OMR) sheet or anywhere else.</li>
<li>Make sure that you do not possess any pages (Blank or Printed) or any unauthorized material in any form. If such material is found in your possession during the examination, you will be disqualified from the competition.</l>
<li>If you are found copying / helping others or indulging in unruly behaviour you will be disqualified from competition.</li>
<li>At the end of the examination hand over the answer (OMR) sheet to the invigilator.</li>
<li>Candidates are not allowed to take the Test Booklet with them. </li>
<li>Candidates are advised to contact the Examination Superintendent for submission of representation related to examination, if any.</li>
</ol>                                                          
                                                            
                                                            
                                                            </div>
                    
                  
                 
                    <div class="clearfix"></div> <br>                   
             
                        
                    
                    <div class="clear50"></div>


                    <div class="clear50 hidden-xs hidden-1024"></div>
                    
                </div>
            </div>
           <?php
                if($strType ==''){
           ?>
             
            <?php
                }
           ?>    
                
       </div>
  </div>
</section>
</form>

<!--end:: contarea-->



<!--start::Footer-->
<?php include 'include/footer.php' ?>



<script src="<?php echo APP_URL; ?>js/validatorchklist.js" defer></script>



<script type="text/javascript" language="javascript">
  $(document).ready(function () {
     <?php if($outMsg != '' && isset($_REQUEST['btnSubmitSkill'])) { ?>              
                viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
      <?php }  ?>
          
     
        
  });

   
    //function to validate the form
    function validateVenue()
     {
      
        
        if (!blankCheck('txtAckNo', 'Please enter your Acknowledgement No/Mobile No'))
            return false;
        if (!checkSpecialChar('txtAckNo'))
            return false;
        if (!maxLength('txtAckNo', 30, 'Acknowledgement Number'))
            return false;
       
        loadVenueDetails();
     }


  </script>