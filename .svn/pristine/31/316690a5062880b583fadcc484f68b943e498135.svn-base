<?php
 /* ================================================
	  File Name         	  : viewCandidateDetails.php
	  Description	          : This is used for view skill competiton details
	  Author Name	          : T Ketaki Debadarshini
	  Date Created		  : 24-Jan-2018 
	  Devloped By		  : T Ketaki Debadarshini
	  Devloped On		  : 24-Jan-2018 
	  Update History		  :
	  <Updated by>		<Updated On>		<Remarks>
	 *       
	  Style sheet             : 
	  Javscript Functions     : 
	  includes                : viewSkillCompetitionDetailsInner.php
  ================================================== */
    include_once('viewCandidateDetailsInner.php');
?>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>


<script language="javascript">
    $(document).ready(function () {
        loadNavigation('View Candidate Details');
        pageHeader   = "View Candidate Details";
        strFirstLink = "Manage Reports";
        strLastLink  = "Candidate Details";
       
        backMe     = "yes";
        printMe      = "yes";
        downloadMe    = "yes";
        backPath    ="";
      
        backPath='<?php echo $_COOKIES['backPath']; ?>';

        if('<?php echo $outMsg;?>'!='')                
	        viewAlert('<?php echo $outMsg;?>');
            
    

        $('.date-picker').datepicker({
                autoclose: true,
                todayHighlight: true
            });
            
         //View Applicant details 
        $('.dispProfilemodal').on('click',function(){
               var applicantId     = $(this).data( "applicant" );
              $("#dispProfile").load('<?php echo APP_URL;?>viewApplication/'+applicantId);
        });
        
        
        
      fillIndiaSkill('<?php echo $intSkill;?>','selSkill');
      fillIndiaSkillUpdate('<?php echo $intUpdateSkill;?>','selUpdateSkill');
      fillDistricts('<?php echo $intDistrict; ?>', 'selDistrict');
      fillBlocks('<?php echo $intBlock; ?>', '<?php echo $intDistrict; ?>', 'selBlock');
      fillRegistrationPhase('<?php echo $regdType; ?>','selRegdType');
      
      
    });
 </script>
 <script src="<?php echo SITE_URL; ?>js/loadAjax.js"></script>

 <div class="page-content">
    <div class="page-header">
        <h1 id="title" class="col-sm-5"></h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="top_tab_container">
               
                <a href="javascript:void(0);" class="btn btn-info active">View Details</a>
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="searchTable" >
                <div class="form-group">                   
                    <label class="col-sm-2 control-label no-padding-right" for="txtSearch">Search By Name/ Aadhar ID</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <input type="text" class="form-control" maxlength="80" name="txtSearch" id="txtSearch" value="<?php echo $strName; ?>"/>
                    </div>    

                    <label class="col-sm-1 control-label no-padding-right" for="txtStartDt">Date From</label>
                        <div class="col-sm-2"> <span class="colon">:</span>
                            <div class="input-group">
                                <input class="form-control date-picker" id="txtStartDt" name="txtStartDt" type="text" data-date-format="dd-mm-yyyy" value="<?php echo ($strStartDt!='0000-00-00')?date('d-m-Y',strtotime($strStartDt)):''; ?>">
                                 <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 
                            </div>
                       </div>

                    <label class="col-sm-1 control-label no-padding-right" for="txtEndDt">Date To</label>
                       <div class="col-sm-2"> <span class="colon">:</span>
                           <div class="input-group">
                               <input class="form-control date-picker" id="txtEndDt" name="txtEndDt" type="text" data-date-format="dd-mm-yyyy" value="<?php echo ($strEndDate!='0000-00-00')?date('d-m-Y',strtotime($strEndDate)):''; ?>">
                                <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 
                           </div>
                       </div>   
    
                    
                </div>
                <div class="form-group">                   
                    <label class="col-sm-2 control-label no-padding-right" for="selSkill">Skill</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <select class="form-control" name="selSkill" id="selSkill" >
                                <option value="0">--All--</option>
                                
                        </select>        
                    </div>    


                    <label class="col-sm-1 control-label no-padding-right" for="selDistrict">District</label>
                       <div class="col-sm-2"> <span class="colon">:</span>
                          <select class="form-control" name="selDistrict" id="selDistrict" onchange="fillBlocks('0', this.value, 'selBlock');" >
                                <option value="0">--All--</option>
                            </select> 
                       </div> 
                     <label class="col-sm-1 control-label no-padding-right" for="selBlock">Block</label>
                        <div class="col-sm-2"> <span class="colon">:</span>
                            <select class="form-control" name="selBlock" id="selBlock">
                                <option value="0">--All--</option>
                            </select>    
                       </div>
                   </div>
                   <div class="form-group">

                   
                        <label class="col-sm-2 control-label no-padding-right" for="selRegdType">Registration Type </label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <select class="form-control" name="selRegdType" id="selRegdType" >
                                <option value="">--All--</option>
                                <!-- <option value="1" <?php if($regdType==1)echo 'selected="selected"'; ?>>Pahse-2</option> -->
                                <!-- <option value="2" <?php if($qualify==2) echo 'selected="selected"'; ?>>Not Qualified</option> -->
                                
                        </select>        
                    </div>

                    <label class="col-sm-1 control-label no-padding-right" for="selGender">Gender </label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <select class="form-control" name="selGender" id="selGender" >
                                <option value="">--All--</option>
                                <option value="1" <?php if($gender==1)echo 'selected="selected"'; ?>>Male</option>
                                <option value="2" <?php if($gender==2) echo 'selected="selected"'; ?>>Female</option>
                                <option value="3" <?php if($gender==3) echo 'selected="selected"'; ?>>Others</option>
                                
                        </select>        
                    </div>

                    
    
                    <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                        <!-- <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewCandidateDetails/<?php echo $glId . '/' . $plId; ?>' "> -->
                    </div>
                </div>
            </div>     


            <div id="viewTable">
                <?php if ($result->num_rows > 0) {
                    $ctr = $intRecno;
                    ?>
                    <table class="table table-striped table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                
                                <th width="20">Sl.#</th>
                                <th>Applicant Details</th>
                                <th>Registration No.</th>
                                <th>Applied Skill(s)</th>                               
                                <!-- <th>Registration Type</th>
                                <th>Updated Skill</th> -->
                                <th>District</th>
                                <th>Profile Photo</th>
                                <th>Date of Birth</th>
                                <th>Qualification</th>
                                <th>Registered On </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           while ($row = $result->fetch_array()) {
                            //print_r($row);exit;
                                $ctr ++;
                                ?>
                                <tr>
                                  
                                    <td><?php echo $ctr; ?></td>

                                    <td>
                                        
                                        <div class="media-body pull-left"> 
                                        <a data-toggle="modal" style="cursor:pointer;" data-target="#modalProfile" data-applicant="<?php echo $objCompete->encrypt($row['intCompetitionId']); ?>" class="dispProfilemodal">
                                                
                                        <h4><?php echo ucwords(strtolower(htmlspecialchars_decode($row['vchFirstName'], ENT_QUOTES).' '.htmlspecialchars_decode($row['vchMiddleName'], ENT_QUOTES).' '.htmlspecialchars_decode($row['vchLastName'], ENT_QUOTES))); ?></h4>
                                        </a> 
                                            <small class="text-primary"><i class="fa fa-phone"></i> +91- <?php echo $row['vchPhoneno']; ?></small><br/>
                                        <small class="text-muted"><i class="fa fa-envelope"></i> <?php echo htmlspecialchars_decode($row['vchEmailId'],ENT_QUOTES); ?></small> 
                                      </div>
                                      
                                       
                                    </td>
                                     <td><?php echo htmlspecialchars_decode($row['vchAckNo'], ENT_QUOTES); ?></td>
                                    <td><?php echo htmlspecialchars_decode($row['strSkills'], ENT_QUOTES); ?></td>
                                   <!--  <td><?php echo htmlspecialchars_decode($row['phaseName'], ENT_QUOTES); ?></td>
                                    <td><?php echo htmlspecialchars_decode($row['strUpdateSkills'], ENT_QUOTES); ?></td>
                                    
                                     <td><?php echo htmlspecialchars_decode($row['vchAadharId'], ENT_QUOTES); ?></td> -->
                                    <td><?php echo htmlspecialchars_decode($row['vchDistrictName'], ENT_QUOTES); ?></td>
                                    <td><?php if($row['vchRegistrationType']>2){?>
                                        <a href="<?php echo NEW_APP_URL.'uploadDocuments/skillCompetition/'.$row['vchAckNo'].'/'.$row['vchProfilePhoto'];?>" target="_blank" alt="<?php echo htmlspecialchars_decode($row['vchFirstName'], ENT_QUOTES); ?>">
                                            <img src="<?php echo NEW_APP_URL.'uploadDocuments/skillCompetition/'.$row['vchAckNo'].'/'.$row['vchProfilePhoto']; ?>" width="80px" height="80px">
                                           
                                        </a>
                                        <?php } else {?>
                                        <a href="<?php echo APP_URL.'uploadDocuments/skillCompetition/'.$row['vchAckNo'].'/'.$row['vchProfilePhoto']; ?>" target="_blank" alt="<?php echo htmlspecialchars_decode($row['vchFirstName'], ENT_QUOTES); ?>">
                                            <img src="<?php echo APP_URL.'uploadDocuments/skillCompetition/'.$row['vchAckNo'].'/'.$row['vchProfilePhoto']; ?>" width="80px" height="80px">
                                           
                                        </a>
                                        <?php } ?>
                                    </td>
                                    <!-- <td>
                                        <a href="<?php echo APP_URL.'uploadDocuments/skillCompetition/'.$row['vchAckNo'].'/'.$row['vchProfilePhoto']; ?>" target="_blank" alt="<?php echo htmlspecialchars_decode($row['vchFirstName'], ENT_QUOTES); ?>">
                                            <img src="<?php echo APP_URL.'uploadDocuments/skillCompetition/'.$row['vchAckNo'].'/'.$row['vchProfilePhoto']; ?>" width="80px" height="80px">
                                           
                                        </a>
                                    </td> -->
                                    <td><?php echo date('d-M-Y', strtotime($row['dtmDob'])); ?></td>
                                    <td><?php echo ($row['intQualificationId']==101)?'Others':htmlspecialchars_decode($row['vchQualification'], ENT_QUOTES); ?>
                                    </td>
                                    
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
                                    <?php echo $objCompete->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                        <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                                    <?php echo $objCompete->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
 
 <div class="modal fade" id="modalProfile" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated bounceInUp">
        <div class="modal-header" >
            
             <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
             <a href="javascript:void(0)" title="Print" onclick="printModal('myModalLabel','dispProfile');" class="btn btn-success btn-sm pull-right" style="margin-right:10px;"><i class="icon-white icon-print"></i> Print</a>
                <h4 class="modal-title" id="myModalLabel">Applicant Details</h4>
                
<!--        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
		
        <h3 class="modal-title pull-left" id="myModalLabel">Applicant Details</h3>-->
      </div>
        <div class="modal-body" id="dispProfile" style="padding: 1px 31px 19px 28px !important;">
          <div class="center" style="height:100px; font-size:24px;"><i class="fa fa-spinner fa-spin"></i></div>
          
          
      </div>
    </div>
   
  </div>
</div>
 
