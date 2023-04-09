<?php
  /* ================================================
  File Name             : viewApplication.php
  Description     : This is used to view the selected applicant details.
  Author Name     : T Ketaki Debadarshini
  Date Created      : 19-Oct-2016
  Update History      : 
        Devloped By               : T Ketaki Debadarshini
        Devloped On               : 19-Oct-2016
  <Updated by>    <Updated On>    <Remarks>
  Ashis kumar Patra       3-October-2016           Payment tab added,
  Style sheet               : 
  JS File       : 
  includes      : 
  ==================================================*/
     
?>
<!--<style type="text/css">
    .form-horizontal .control-label{padding: 0px!important;}
</style>-->
       
        <div class="form-group p-sm border-bottom no-padding"> 
            <img src="<?php echo APP_URL.'uploadDocuments/skillCompetition/'.$result['vchAckNo'].'/'.$result['vchProfilePhoto']; ?>" class="img-thumbnail img-lg pull-right"  width="100px" height="100px">
           
          <div class="bigger-150">
      <?php echo ucwords(strtolower(htmlspecialchars_decode($result['vchFirstName'],ENT_QUOTES).' '.htmlspecialchars_decode($result['vchMiddleName'],ENT_QUOTES)).' '.htmlspecialchars_decode($result['vchLastName'],ENT_QUOTES)); ?>  
          </div>
           
            
          <h5><i class="fa fa-phone"></i> +91-<?php echo $result['vchPhoneno']; ?></h5>
          <h5><i class="fa fa-envelope"></i> <?php echo $result['vchEmailId']; ?></h5>
          <h5>Acknowledgement No : <b><?php echo $result['vchAckNo']; ?></b></h5>
        </div>
        <!--    START : PROFILE BUILDER    -->
        <?php $specialCat = ($result['strSpecialCategory']!='')?ucwords(htmlspecialchars_decode($result['strSpecialCategory'],ENT_QUOTES)):'--';
        $curDesign = ($result['strCurrentDesignation']!='')?ucwords(htmlspecialchars_decode($result['strCurrentDesignation'],ENT_QUOTES)):'--';
        $strpinNum = ($result['strPinNo']!='')?$result['strPinNo']:'--';
        if($result['tinGender']==1)
        {
          $gender = 'Male';
        }
        else if($result['tinGender']==2)
        {
          $gender = 'Female';
        }
        else
        {
          $gender = 'Others';
        }
        ?>
        <h3 class="pdn-lft10">Skill Details</h3>
         <div class="form-con row pdn-lft0">
                   
                <div class="form-content ">
                     <div class="borderedBox">   
                         <table class="table ">
                             <tr>
                                 <td width="20%">Selected Skill(s)</td>
                                 <td width="5">:</td>
                                 <td colspan="4"><?php echo ucwords(strtolower($result['strSkills'])); ?></td>
                             </tr>
                             <tr>
                                 <td width="20%">District</td>
                                 <td width="5">:</td>
                                 <td><?php echo ($result['vchDistrictName']!='')?$result['vchDistrictName']:'--'; ?></td>
                                 <td width="20%">Block</td>
                                 <td width="5">:</td>
                                 <td><?php echo ($result['vchBlockName']!='')?ucfirst($result['vchBlockName']):'--'; ?></td>
                             </tr>
                            
                         </table>
                     </div>     
                        
                </div>
            </div>
        
      
         <h3 class="pdn-lft10">Applicant Information</h3>
        <div class="form-con row pdn-lft0">
                
                <div class="form-content" >
                 <div class="borderedBox">   
                      <table class="table ">
                          <tr>
                              <td width="20%">Name</td>
                              <td width="5">:</td>
                              <td><?php echo ucwords(strtolower(htmlspecialchars_decode($result['vchFirstName'],ENT_QUOTES).' '.htmlspecialchars_decode($result['vchMiddleName'],ENT_QUOTES)).' '.htmlspecialchars_decode($result['vchLastName'],ENT_QUOTES)); ?> </td>
                              <td width="20%">Gender</td>
                              <td width="5">:</td>
                              <td><?php echo $gender; ?></td>
                          </tr>
                          <tr>
                              <td>Date of Birth</td>
                              <td>:</td>
                              <td><?php echo ($result['dtmDob']!='')?date('d-M-Y',  strtotime($result['dtmDob'])):'--'; ?></td>
                              <td>Email ID</td>
                              <td>:</td>
                              <td><?php echo htmlspecialchars_decode($result['vchEmailId'],ENT_QUOTES); ?></td>
                          </tr>
                          <tr>
                              <td>Mobile No</td>
                              <td>:</td>
                              <td><?php echo htmlspecialchars_decode($result['vchPhoneno'],ENT_QUOTES); ?></td>
                              <td></td>
                              <td></td>
                              <td></td>
                          </tr>
                          <tr>
                              <td>District</td>
                              <td>:</td>
                              <td><?php echo htmlspecialchars_decode($result['vchDistrictName'],ENT_QUOTES); ?></td>
                              <td>Block</td>
                              <td>:</td>
                              <td><?php echo htmlspecialchars_decode($result['vchBlockName'],ENT_QUOTES); ?></td>
                          </tr>
                          <tr>
                              <td>Aadhar proof document</td>
                              <td>:</td>
                              <td>
                                  <a href="<?php echo APP_URL.'uploadDocuments/skillCompetition/'.$result['vchAckNo'].'/'.$result['vchDocument']; ?>" target="_blank" alt="<?php echo htmlspecialchars_decode($result['vchFirstName'], ENT_QUOTES); ?>">
                                      
                                       <i class="fa fa-download"></i>
                                </a>
                              </td>
                              <td>Education Qualification</td>
                              <td>:</td>
                              <td><?php echo ($result['intQualificationId']==101)?'Others':htmlspecialchars_decode($result['vchQualification'], ENT_QUOTES); ?>
                                    </td>
                          </tr>
                          <tr>
                              <td colspan="3">Name of Academic Institution ( ITI, College, University. Training Center) :</td>
                             
                              <td colspan="3"><?php echo ($result['vchAcademicInstitute']!='')?htmlspecialchars_decode($result['vchAcademicInstitute'],ENT_QUOTES):htmlspecialchars_decode($result['vchWorkPlace'],ENT_QUOTES)?></td>
                              
                          </tr>
                         
                          
                      </table>
                     
                 </div>     

            </div>
        </div>
            <!--    END OF PROFILE BUILDER    -->
            
            
     