<?php
    /* ================================================
    File Name         	  : viewStudent Registration.php
    Description		  	  : This is used for view district details.
    Author Name           : 
    Date Created          : 
    Devloped On           : 10-Oct-2017
    Devloped By           : Rajesh Parida
    Update History	  : <Updated by>		<Updated On>		<Remarks>

    Style sheet           : 
    Javscript Functions   : 
    includes		  : util.php, viewStudent RegistrationInner.php

    ==================================================*/
    require 'viewStudentregistrationInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
	$(document).ready(function () {
            loadNavigation('View Student Registration');
            pageHeader      = "View Student Registration";
            strFirstLink    = "Manage Application";
            strLastLink     = "Student Registration";
            
            deleteMe        = "yes";          
            printMe         = "yes";            
		
            if('<?php echo $outMsg;?>'!='')                
                   viewAlert('<?php echo $outMsg;?>');

            <?php if ($redirectPage != '') { ?>
             $('#alertModal').on('hidden.bs.modal', function () {
                 window.location.href = '<?php echo $redirectPage; ?>';
             });

          <?php } ?>
               
                  
	});
</script>
    <div class="page-content">
        <div class="page-header">
            <h1 id="title" class="col-sm-5"></h1>
        </div>
        <div class="row">
            <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="top_tab_container">
                
                <a href="javascript:void(0);" class="btn btn-info active">View</a> </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                 
               
                <div id="viewTable">
                <?php 
				
				if (mysqli_num_rows($result) > 0) {
                    $ctr = $intRecno; ?>
                    <table class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="20" class="noPrint">
                                    <label class="position-relative">
                                    <input type="checkbox" class="ace chkAll"><span class="lbl"></span></label>
                                </th>
                                <th width="20">Sl.#</th>
                                <th>Name </th>   
                                <th>Age</th>
								<th>Gender</th>
								<th>Locality</th>
                                <th>District</th>  
                                <th>Admission  District</th>  
                                <th>Course </th>
								<th>Sector </th>
								<th>Email</th>
								<th>Mob No. </th>
								<th>Aadhaar No. </th>
								<th>Created On </th>
                               
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) { 
                           
                                $ctr++; 
                                ?>
                            <tr>
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intStudentid'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['intStudentid'];?>" name="hdnPubStatus<?php echo $row['intStudentid'];?>" value=""/>
                                    </label>
                                </td>
                                <td><?php echo $ctr; ?></td>
                                <td> <?php  echo htmlspecialchars_decode($row['vchStudentname'],ENT_NOQUOTES);?> </td>
								<td> <?php  echo $row['intStudentage'];?> </td>  
								<td> 
								
								<?php  
								   
								    echo $row['intStuentgender'] == 1 ? 'Male' : 'Female'; 
								
								?> </td>  
								
								<td> 
								<?php 
								
								if($row['intStudentlocality']==1)echo 'Residencial';else if($row['intStudentlocality']==2)echo 'Non Residencial';else echo'--'; 
								?> 
								</td>  
                                <td> <?php  echo $row['intStudentdistricts'];?> </td>
								
								
								<td> 
								
								<?php  
								include_once(CLASS_PATH.'clsDistrict.php'); 
								$dist_obj = new clsDistrict();
								
								if($row['intAdmissiondistrict'] == '') {
									echo '';
								} else {
								    
									$admission_dist_arr = explode(',', $row['intAdmissiondistrict']);
								    $admission_dist = array();
									for($i=0; $i<count($admission_dist_arr); $i++) {
										
										$districtId = $admission_dist_arr[$i];
										$dist_result = $dist_obj->manageDistrict('R',$districtId,'','','','',0,0,0)->fetch_array();
										array_push($admission_dist, $dist_result['vchDistrictname']);
										
									}
									echo implode(", ", $admission_dist);	
								}
								
								
								?> 
								
								
								</td>  
								
								<td> 
									<?php  
									
									if($row['intCoursetype'] == 1) 
										echo 'Short Term';
									else if($row['intCoursetype'] == 2) {
										echo 'Long Term';
									} else {
										echo '--';
									}
									?> 
									
								</td>  
								
								
								<td> 
								
								<?php 
								//echo $row['intStudentsectors'];
								include_once(CLASS_PATH.'clsSector.php'); 
								$sector_obj = new clsSector();
								
								if($row['intStudentsectors'] == '') {
									echo '';
								} else {
								    
									$sector_arr = explode(',', $row['intStudentsectors']);
									$sector = array();
									for($j=0; $j<count($sector_arr); $j++) {
										
										$id = $sector_arr[$j];
										$sector_result = $sector_obj->manageSector('R',$id,'','','','','','',0,0)->fetch_array();
										array_push($sector, $sector_result['vchSecotrName']);
									}
									echo implode(", ", $sector); 									
								}
								
								?> 
								
								
								</td>  
								
								
								<td> <?php  echo $row['vchStudentemail'];?> </td>
								<td> <?php  echo $row['vchStudentphone'];?> </td>
								<td> <?php  echo $row['vchStudentadharno'];?> </td>
								
                                <td><?php echo date("d-M-Y",strtotime($row['stmCreatedOn']))?></td>
                               
                            </tr>
                        <?php } ?>
                         </tbody>
                    </table>
                    <input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno; ?>" />
                    <input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno; ?>" />
                    <input name="hdn_IsPaging" id="hdn_IsPaging" type="hidden" value="<?php echo $isPaging; ?>" />
                    <input name="hdn_ids" id="hdn_ids" type="hidden" />
                    <input name="hdn_qs" id="hdn_qs" type="hidden" />
                <?php } else { ?>
                    <div class="noRecord">No record found</div>
            <?php } ?>
        </div>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <div class="row noPrint">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="sample-table-2_info">
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a>/ <?php } ?> 
    <?php echo $objStudentreg->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
        <?php echo $objStudentreg->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
                                </ul>
                            </div>
                        </div>
                <?php } ?>
                </div>
<?php } ?>
          <!-- PAGE CONTENT ENDS -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
         

