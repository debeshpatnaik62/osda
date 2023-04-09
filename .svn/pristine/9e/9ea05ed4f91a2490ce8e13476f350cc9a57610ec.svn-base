<?php
 /* ================================================
    File Name             : viewAttandance.php
    Description           : This is used for add skill competiton result
    Author Name           : Rahul Kumar Saw
    Date Created          : 26-May-2022 
    Devloped By           : Rahul Kumar Saw
    Devloped On           : 26-May-2022
    Update History      :
    <Updated by>    <Updated On>    <Remarks>
   *       
    Style sheet             : 
    Javscript Functions     : 
    includes                : viewAttandance.php

   
  ================================================== */
    include_once('viewAttandanceInner.php');
?>
<script language="javascript">
    $(document).ready(function () {
        loadNavigation('View Student Attendance');
        pageHeader   = "View Student Attendance";
        strFirstLink = "Manage Attendance";
        strLastLink  = "View Student Attendance";
       
        //deleteMe     = "yes";
        printMe      = "yes";
        downloadMe    = "yes";
        
      
        if('<?php echo $outMsg;?>'!='')                
          viewAlert('<?php echo $outMsg;?>');
            
        
      fillIndiaSkill('<?php echo $skillId;?>','selSkill');
      fillDistricts('<?php echo $distId; ?>', 'ddlDist');
      fillRegistrationPhase('<?php echo $regdType; ?>','selRegdType');

        $(".qMark").change(function(){
            if($(this).val().length > 0) {
                $(this).parents('tr').find('input[type="checkbox"]').prop('checked', true);
            }
            else {
                $(this).parents('tr').find('input[type="checkbox"]').prop('checked', false);
            }
        });
      
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
                
                <a href="javascript:void(0);" class="btn btn-info active">View Attandance</a>
               
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="searchTable" id="searchPanel">
                <div class="form-group" >
                    <div class="col-sm-2">
                      <label class="control-label no-padding-right" for="selRegdType">Registration Type </label>
                        <select class="form-control" name="selRegdType" id="selRegdType" >
                                <option value="">--All--</option>
                                
                        </select>      
                    </div>
                    <div class="col-sm-2">
                      <label class="control-label no-padding-right" for="ddlDist">Select District</label>
                        <select class="form-control" name="ddlDist" id="ddlDist">
                            <option value="0">- Select -</option> 
                            
                        </select>
                          <!-- <span class="mandatory">*</span> -->              
                    </div>
                    <div class="col-sm-2">
                      <label class="control-label no-padding-right" for="selSkill">Skill</label>
                        <select class="form-control" name="selSkill" id="selSkill" >
                                <option value="0">--Select Skill--</option>
                                
                        </select>      
                    </div>

                   <div class="col-sm-2">
                      <label class="control-label no-padding-right" for="selLevel">Level</label>
                        <select class="form-control" name="selLevel" id="selLevel" >
                                <!-- <option value="">--All--</option> -->
                                <option value="L1" <?php if($level=='L1')echo 'selected="selected"'; ?>>Level-1</option>
                                <option value="L2" <?php if($level=='L2')echo 'selected="selected"'; ?>>Level-2</option>        
                                <option value="L3" <?php if($level=='L3')echo 'selected="selected"'; ?>>Level-3</option>        
                        </select>
                                 
                    </div>

                    <div class="col-sm-2">
                      <label class="control-label no-padding-right" for="selAttandance">Attandance</label>
                        <select class="form-control" name="selAttandance" id="selAttandance" >
                                 <option value="">--All--</option> 
                                <option value="1" <?php if($attandance=='1')echo 'selected="selected"'; ?>>Present</option>
                                <option value="2" <?php if($attandance=='2')echo 'selected="selected"'; ?>>Reject</option>        
                                <option value="0" <?php if($attandance=='0')echo 'selected="selected"'; ?>>Absent</option>        
                        </select>
                                 
                    </div>                    
    
                    <div class="col-sm-2">
                        <input class="btn btn-success" style="margin-top: 2.7rem;" name="btnSearch" type="submit" value="Show"/>
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
                                <th>Registration No</th>
                                <th>Applied Skill(s)</th> 
                                <th>District</th>
                                <th>Attendance</th>
                                <th>Marks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           while ($row = $result->fetch_array()) {
                            //print_r($row);exit;
                            if($row['intLevel']=='L1' || $row['intLevel']=='L2' )
                            {
                                $marks = $row['intMarks'];
                            } else if($row['intLevel']=='L3')
                            {
                                $marks = $row['intLevel3Marks'];
                            }
                            else
                            {
                               $marks = ''; 
                            }
                            if($row['intLevel']=='L1' )
                            {
                                $attendance = $row['tinLevelIStatus'];
                            } else if($row['intLevel']=='L2')
                            {
                                $attendance = $row['tinLevelIIStatus'];
                            }
                            else if($row['intLevel']=='L3')
                            {
                                $attendance = $row['tinLevel3Status'];
                            }
                            else
                            {
                               $attendance = ''; 
                            }
                            if($attendance==1)
                            {
                                $attenStatus = 'Present';
                            } else if($attendance==2)
                            {
                                $attenStatus = 'Reject';
                            }
                            else
                            {
                                $attenStatus = 'Absent';
                            }
                                $ctr ++;
                                ?>
                                <tr>
                                    <td><?php echo $ctr; ?></td>

                                    <td>
                                        <div class="media-body pull-left"> 
                                        <a data-toggle="modal" style="cursor:pointer;" data-target="#modalProfile" data-applicant="<?php echo $objResult->encrypt($row['intCompetitionId']); ?>" class="dispProfilemodal">
                                                
                                        <h4><?php echo htmlspecialchars_decode($row['vchFirstName'], ENT_QUOTES).' '.htmlspecialchars_decode($row['vchMiddleName'], ENT_QUOTES).' '.htmlspecialchars_decode($row['vchLastName'], ENT_QUOTES); ?></h4></a> 
                                        
                                            <small class="text-primary"><i class="fa fa-phone"></i> +91- <?php echo $row['vchPhoneno']; ?></small><br/>
                                        <small class="text-muted"><i class="fa fa-envelope"></i> <?php echo htmlspecialchars_decode($row['vchEmailId'],ENT_QUOTES); ?></small> 
                                      </div>
                                       
                                    </td>
                                     <td><?php echo htmlspecialchars_decode($row['vchAckNo'], ENT_QUOTES); ?></td>
                                    <td><?php echo htmlspecialchars_decode($row['strSkills'], ENT_QUOTES); ?></td>
                                    <td><?php echo htmlspecialchars_decode($row['vchDistrictName'], ENT_QUOTES); ?></td>
                                    <td><?php echo $attenStatus; ?></td>
                                    <td><?php echo $marks;?></td>
                             
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
                                    <?php echo $objResult->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                        <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                                    <?php echo $objResult->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
