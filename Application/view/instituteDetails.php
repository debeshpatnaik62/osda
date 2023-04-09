<?php
  /* ================================================
  File Name       : instituteDetails.php
  Description     : This is used to view the selected Institute details.
  Author Name     : Rahul Kumar Saw
  Date Created      : 14-June-2022
  Update History      : 
        Devloped By               : Rahul Kumar Saw
        Devloped On               : 14-June-2022
  Style sheet               : 
  JS File       : 
  includes      : 
  ==================================================*/

  include_once('instituteDetailsInner.php');  
?>
       
        <!-- <div class="form-group p-sm border-bottom no-padding"> 
          <div class="bigger-150">
      <?php echo ucwords(strtolower(htmlspecialchars_decode($result['vchInsName'],ENT_QUOTES))); ?>  
          </div>
           
            
          <h5><i class="fa fa-phone"></i> +91-<?php echo $result['vchInsMobile']; ?></h5>
          <h5><i class="fa fa-envelope"></i> <?php echo $result['vchInsEmail']; ?></h5>
          <h5>Reference No : <b><?php echo $result['vchRefNumber']; ?></b></h5>
        </div> -->
        
      <h3 class="pdn-lft10">Basic Information</h3>
        <div class="form-con row pdn-lft0">
                
                <div class="form-content" >
                 <div class="borderedBox">   
                      <table class="table ">
                          <tr>
                              <td width="20%">Institute Name</td>
                              <td width="5">:</td>
                              <td><?php echo ucwords(strtolower(htmlspecialchars_decode($result['vchInsName'],ENT_QUOTES))); ?> </td>
                              <td width="20%">Mobile Number</td>
                              <td width="5">:</td>
                              <td><?php echo $result['vchInsMobile']; ?></td>
                          </tr>
                          <tr>
                              <td>Email Id</td>
                              <td>:</td>
                              <td><?php echo $result['vchInsEmail']; ?></td>
                              <td>Reference No.</td>
                              <td>:</td>
                              <td><?php echo htmlspecialchars_decode($result['vchRefNumber'],ENT_QUOTES); ?></td>
                          </tr>                          
                      </table>
                     
                 </div>     

            </div>
        </div>
         <h3 class="pdn-lft10">Bank Information</h3>
        <div class="form-con row pdn-lft0">
                
                <div class="form-content" >
                 <div class="borderedBox">   
                      <table class="table ">
                          <tr>
                              <td width="20%">Account Holder Name</td>
                              <td width="5">:</td>
                              <td><?php echo ucwords(strtolower(htmlspecialchars_decode($result['vchAccountName'],ENT_QUOTES))); ?> </td>
                              <td width="20%">Account Number</td>
                              <td width="5">:</td>
                              <td><?php echo $result['vchAccountNumber']; ?></td>
                          </tr>
                          <tr>
                              <td>IFSC Code</td>
                              <td>:</td>
                              <td><?php echo $result['vchIFSCCode']; ?></td>
                              <td>Branch Name</td>
                              <td>:</td>
                              <td><?php echo htmlspecialchars_decode($result['vchBranchName'],ENT_QUOTES); ?></td>
                          </tr>                          
                      </table>
                     
                 </div>     

            </div>
        </div>

         <h3 class="pdn-lft10">Placement Cell Details</h3>
        <div class="form-con row pdn-lft0">
                
                <div class="form-content" >
                 <div class="borderedBox">   
                      <table class="table ">
                          <tr>
                              <td width="20%">Name</td>
                              <td width="5">:</td>
                              <td><?php echo ucwords(strtolower(htmlspecialchars_decode($result['vchCellName'],ENT_QUOTES))); ?> </td>
                              <td width="20%">Email</td>
                              <td width="5">:</td>
                              <td><?php echo $result['vchCellEmail']; ?></td>
                          </tr>
                          <tr>
                              <td>Mobile Number</td>
                              <td>:</td>
                              <td><?php echo $result['vchCellMobile']; ?></td>
                              <td></td>
                              <td></td>
                              <td></td>
                          </tr>                          
                      </table>
                     
                 </div>     

            </div>
        </div>

         <h3 class="pdn-lft10">Principal Contact Details</h3>
        <div class="form-con row pdn-lft0">
                
                <div class="form-content" >
                 <div class="borderedBox">   
                      <table class="table ">
                          <tr>
                              <td width="20%">Name</td>
                              <td width="5">:</td>
                              <td><?php echo ucwords(strtolower(htmlspecialchars_decode($result['vchPrincipleName'],ENT_QUOTES))); ?> </td>
                              <td width="20%">Email</td>
                              <td width="5">:</td>
                              <td><?php echo $result['vchPrincipleEmail']; ?></td>
                          </tr>
                          <tr>
                              <td>Mobile Number</td>
                              <td>:</td>
                              <td><?php echo $result['vchPrincipleMobile']; ?></td>
                              <td></td>
                              <td></td>
                              <td></td>
                          </tr>                         
                      </table>
                     
                 </div>     

            </div>
        </div>

        <h3 class="pdn-lft10">Contact Person Details</h3>
        <div class="form-con row pdn-lft0">
                
                <div class="form-content" >
                 <div class="borderedBox">   
                      <table class="table ">
                          <tr>
                              <td width="20%">Name</td>
                              <td width="5">:</td>
                              <td><?php echo ucwords(strtolower(htmlspecialchars_decode($result['vchConName'],ENT_QUOTES))); ?> </td>
                              <td width="20%">Email</td>
                              <td width="5">:</td>
                              <td><?php echo $result['vchConEmail']; ?></td>
                          </tr>
                          <tr>
                              <td>Mobile Number</td>
                              <td>:</td>
                              <td><?php echo $result['vchConMobile']; ?></td>
                              <td></td>
                              <td></td>
                              <td></td>
                          </tr>                         
                      </table>
                     
                 </div>     

            </div>
        </div>
           