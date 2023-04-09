<?php

    require 'viewGoSkillRegistrationInner.php';
?>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
	$(document).ready(function () {
		pageHeader = "Job Seeker Report";
                strFirstLink = "Job Seeker Report";
                strLastLink = "Job Seeker Report";
               loadNavigation('Job Seeker Report');

		printMe		= "yes";     		                
        downloadMe    = "yes";
       // deleteMe = "yes";
		
		$('.showModal').click(function(){
			$('#myModal1').modal();			
		});
                $('.showModal2').click(function () {
                    $('#myModal2').modal();
                });
               if('<?php echo $outMsg;?>'!='')                
                    viewAlert('<?php echo $outMsg;?>');

                <?php if ($redirectPage != '') { ?>
                 $('#alertModal').on('hidden.bs.modal', function () {
                     window.location.href = '<?php echo $redirectPage; ?>';
                 });
                 <?php } ?>
                   
                  $('.date-picker').datepicker({
                        autoclose: true,
                        todayHighlight: true
                    });  

              
              
	});
        
        
</script>
    <div class="page-content">
        <div class="page-header">
            <h1 id="title" class="col-sm-5"></h1>
        </div>
        <div class="row no-margin">
            <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="top_tab_container">
               
                <a href="javascript:void(0);" class="btn btn-info active">Job Seeker Report</a>
                
                 </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                <div class="searchTable">
                    <div class="form-group">                   
                       
                    <!-- <label class="col-sm-2 control-label no-padding-right" for="txtEndDt">Date To</label>
                       <div class="col-sm-2"> <span class="colon">:</span>
                           <div class="input-group">
                               <input class="form-control date-picker" id="txtEndDt" name="txtEndDt" type="text" data-date-format="dd-mm-yyyy" value="<?php echo ($strEndDate!='0000-00-00')?date('d-m-Y',strtotime($strEndDate)):''; ?>">
                                <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 
                           </div>
                       </div>
                           
                    <label class="col-sm-2 control-label no-padding-right" for="txtStartDt">Date From</label>
                        <div class="col-sm-2"> <span class="colon">:</span>
                            <div class="input-group">
                                <input class="form-control date-picker" id="txtStartDt" name="txtStartDt" type="text" data-date-format="dd-mm-yyyy" value="<?php echo ($strStartDt!='0000-00-00')?date('d-m-Y',strtotime($strStartDt)):''; ?>">
                                 <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 
                            </div>
                       </div> --> 

                    <label class="col-sm-2 control-label no-padding-right" for="txtSearch">Applicant Name</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <input type="text" class="form-control" maxlength="200" name="txtName" id="txtName" value="<?php echo $strName; ?>"/>
                    </div>

                    <label class="col-sm-2 control-label no-padding-right" for="txtSearch">Mobile Number</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <input type="text" class="form-control" maxlength="12" name="txtMobile" id="txtMobile" value="<?php echo $strNumber; ?>"/>
                    </div>  
                   
                        <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                        <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewGoSkillRegistration/<?php echo $glId . '/' . $plId; ?>' ">
                    </div>
                </div>
                    </div>
                </div>
                <div id="viewTable">
                <?php if (mysqli_num_rows($result) > 0) {
                    $ctr = $intRecno; ?>
                    <table class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="20">Sl.#</th>
                                <th>Applicant Name</th>    
<!--                                 <th>Gender</th> -->
                                <th>District</th> 
                                <!-- <th>Address</th>  -->
                                <th>Qualification</th>
                                <th>Applying For</th>
                               <!--  <th>Age</th> -->
                                <th>Institute Type</th>
                                <th>Institute Name</th>
                                <th>Application Id</th>
                                <th>Experience(Years)</th>
                                <th>Experience Details</th>
                                <!-- <th>Other Information</th> -->
                                <th>Registered On</th>



                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {
                                
                                $strSerial = $row['vchSlNumber'];
                                if($row['intGender']==1)
                                {
                                    $gender = 'Male';
                                } else if($row['intGender']==2)
                                {
                                    $gender = 'Female';
                                }
                                else
                                {
                                    $gender = 'Transgender';
                                }
                                if($row['intQualificationId']==1)
                                {
                                    $qualification = 'Below 10th';
                                }
                                else if($row['intQualificationId']==2)
                                {
                                    $qualification = '10th Pass';
                                }
                                else if($row['intQualificationId']==3)
                                {
                                    $qualification ='12th Pass';
                                }
                                else if($row['intQualificationId']==4)
                                {
                                    $qualification = 'ITI/Diploma';
                                }
                                else if($row['intQualificationId']==5)
                                {
                                    $qualification = 'Graduate';
                                }
                                else if($row['intQualificationId']==6)
                                {
                                    $qualification = 'Post Graduate';
                                }
                                else if($row['intQualificationId']==7)
                                {
                                    $qualification = 'No Formal Education';
                                }
                                if($row['intInstituteType']==1)
                                {
                                    $instituteType = 'Govt. ITI';
                                    $instituteName = $row['instituteName'];
                                } else if($row['intInstituteType']==2)
                                {
                                    $instituteType = 'Govt. Polytechnic';
                                    $instituteName = $row['instituteName'];
                                } else
                                {
                                    $instituteType = 'Training Partner';
                                    $instituteName = $row['trainingName'];
                                }
                                if($row['intMoveStatus']==1)
                                {
                                    $moveStatus = 'Yes';
                                } else if($row['intMoveStatus']==2)
                                {
                                    $moveStatus = 'No';
                                }
                                if($row['intTrained']==1)
                                {
                                    $trained = 'Yes';
                                }
                                else
                                {
                                    $trained = 'No';
                                }

                                if($row['intFromOdisha']==2)
                                {
                                $vchStateName =  !empty($row['vchStateName'])?htmlspecialchars_decode($row['vchStateName'],ENT_NOQUOTES):'--';
                                $districtName =  !empty($row['vchDistrict'])?htmlspecialchars_decode($row['vchDistrict'],ENT_NOQUOTES):'--';
                                $blockName =  !empty($row['vchBlock'])?htmlspecialchars_decode($row['vchBlock'],ENT_NOQUOTES):'--';
                                $panchayatName =  !empty($row['vchGP'])?htmlspecialchars_decode($row['vchGP'],ENT_NOQUOTES):'--';
                                $villageName =  !empty($row['vchVillage'])?htmlspecialchars_decode($row['vchVillage'],ENT_NOQUOTES):'--';
                                }
                                else
                                {
                                $vchStateName =  !empty($row['vchStateName'])?htmlspecialchars_decode($row['vchStateName'],ENT_NOQUOTES):'--';
                                $districtName =  !empty($row['districtName'])?htmlspecialchars_decode($row['districtName'],ENT_NOQUOTES):'--';
                                $blockName =  !empty($row['blockName'])?htmlspecialchars_decode($row['blockName'],ENT_NOQUOTES):'--';
                                $panchayatName =  !empty($row['panchayatName'])?htmlspecialchars_decode($row['panchayatName'],ENT_NOQUOTES):'--';
                                $villageName =  !empty($row['villageName'])?htmlspecialchars_decode($row['villageName'],ENT_NOQUOTES):'--';
                                }

                                $ctr++; 
                                ?>
                            <tr>
                                
                                <td><?php echo $ctr; ?></td>
                                <td>
                                <div class="media-body pull-left"> 
                                                
                                        <h4><?php echo htmlspecialchars_decode($row['vchName'], ENT_QUOTES); ?></h4>
                                        <small class="text-primary"><i class="fa fa-phone"></i> +91- <?php echo $row['vchMobile']; ?></small><br/>    
                                        <small class="text-muted"><i class="fa fa-envelope"></i> <?php echo htmlspecialchars_decode($row['vchEmail'],ENT_QUOTES); ?></small> 
                                      </div>

                                 <!-- <td> <?php  //echo $gender;?> </td> --> 
                                  <td> <?php  echo $districtName;?> </td>
                              <!--  <td> <?php  //echo htmlspecialchars_decode($row['vchAddress'],ENT_NOQUOTES);?> </td> -->

                               <td> <?php  echo $qualification;?> </td> 
                                  <td> <?php  echo $row['intJobRole'];?> </td>
                              <!--  <td> <?php  echo $row['intAge'];?> </td> -->
                                  <td> <?php  echo $instituteType;?> </td>
                                  <td> <?php  echo $instituteName;?> </td>
                                  <td><?php echo $strSerial;?></td>
                                  <td><?php echo $row['intYearOfExp'];?></td>
                               <td> <?php  echo !empty($row['vchExperience'])?htmlspecialchars_decode($row['vchExperience'],ENT_NOQUOTES):'--';?> </td>
                               <!-- <td> <?php  //echo !empty($row['vchInformation'])?htmlspecialchars_decode($row['vchInformation'],ENT_NOQUOTES):'--';?> </td> -->

                                <td><?php echo date('d-M-Y', strtotime($row['stmCreatedOn'])); ?></td>
                                
                            </tr>

                        <?php } ?>
                         </tbody>
                    </table>
                    <input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno; ?>" />
                    <input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno; ?>" />
                    <input name="hdn_IsPaging" id="hdn_IsPaging" type="hidden" value="<?php echo $isPaging; ?>" />
                    <input name="hdn_ids" id="hdn_ids" type="hidden" />
                    <input name="hdn_qs" id="hdn_qs" type="hidden" />
                    <input name="hdnAction" id="hdnAction" type="hidden" />
                    
                <?php } else { ?>
                    <div class="noRecord">No record found</div>
            <?php } ?>
        </div>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <div class="row noPrint">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="sample-table-2_info">
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a>/ <?php } ?> 
    <?php echo $objDevelop->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
        <?php echo $objDevelop->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
         
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-Name" id="myModalLabel"></h4>
            </div>
            <div class="modal-body" id="divContent">

            </div>

        </div>
    </div>
</div>

