<?php
 /* ================================================
    File Name             : enterMark.php
    Description           : This is used for add skill competiton result
    Author Name           : Rahul Kumar Saw
    Date Created          : 03-Aug-2021 
    Devloped By           : Rahul Kumar Saw
    Devloped On           : 03-Aug-2021
    Update History      :
    <Updated by>    <Updated On>    <Remarks>
   *       
    Style sheet             : 
    Javscript Functions     : 
    includes                : updateMarksInner.php

   
  ================================================== */
    include_once('enterMarkInner.php');
?>
<script language="javascript">
    $(document).ready(function () {
        loadNavigation('View Skill Marks');
        pageHeader   = "View Skill Marks";
        strFirstLink = "Manage Skill Competiton";
        strLastLink  = "Enter Panel Marks";
       
        //deleteMe     = "yes";
        printMe      = "yes";
        downloadMe    = "yes";
        
      
        if('<?php echo $outMsg;?>'!='')                
          viewAlert('<?php echo $outMsg;?>');

        if('<?php echo $outMsgMark;?>'!='')                
          viewAlert('<?php echo $outMsgMark;?>');
            
         //View Applicant details 
        $('.dispProfilemodal').on('click',function(){
               var applicantId     = $(this).data( "applicant" );
              $("#dispProfile").load('<?php echo APP_URL;?>viewApplication/'+applicantId);
        });

            $('.dispQuestionmodal').on('click',function(){

               var appSkillId     = $(this).data( "applicant" );

               //alert(appSkillId);
              $("#dispQuestion").load('<?php echo APP_URL;?>viewQuestionDetails/'+appSkillId);
        });
        
      fillIndiaSkill('<?php echo $skillId;?>','selSkill');
      fillDistricts('<?php echo $distId; ?>', 'ddlDist');

        $(".qMark").change(function(){
            if($(this).val().length > 0) {
                $(this).parents('tr').find('input[type="checkbox"]').prop('checked', true);
            }
            else {
                $(this).parents('tr').find('input[type="checkbox"]').prop('checked', false);
            }
        });
      
    });

    function validMarks()
      {
        var flag  = 0;
        if(flag==0)
          gotoMarks('EM');
      }
    function gotoMarks(e) {
    var t = "";
    if ($(".chkItem").each(function() {
            $(this).is(":checked") && (t += $(this).val() + ",")
        }), t.length > 0) {
        for (var i = (t = t.substring(0, t.length - 1)).split(","), o = i.length, r = 0; r < o; r++)
        "EM" == e && confirmAlert("Are you sure to update the selected candidate(s) marks"), $("#btnConfirmOk").on("click", function() {
            $("#hdn_ids").val(t), $("#hdn_qs").val(e), $("#frmOGP").submit()
        })
    } else viewAlert("Please select a record!")
}
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
                
                <a href="javascript:void(0);" class="btn btn-info active">Enter Panel Mark</a>
                <!-- <a href="<?php echo APP_URL; ?>panelQualify/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Panel Qualify Result</a> -->        
                
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="searchTable" id="searchPanel">
                <div class="form-group" >
                    
                    <!-- <div class="col-sm-3">
                      <label class="control-label no-padding-right" for="ddlDist">Select District</label>
                        <select class="form-control" name="ddlDist" id="ddlDist">
                            <option value="0">- Select -</option> 
                            
                        </select>
                           <span class="mandatory">*</span>             
                    </div> -->
                    <div class="col-sm-3">
                      <label class="control-label no-padding-right" for="selSkill">Skill</label>
                        <select class="form-control" name="selSkill" id="selSkill" >
                                <option value="0">--Select Skill--</option>
                                
                        </select>      
                    </div>

                    <!-- <div class="col-sm-3">
                      <label class="control-label no-padding-right" for="selLevel">Level</label>
                        <select class="form-control" name="selLevel" id="selLevel" >
                                <option value="">--All--</option>
                                <option value="L1" <?php if($level=='L1')echo 'selected="selected"'; ?>>L1</option>
                                <option value="L2" <?php if($level=='L2')echo 'selected="selected"'; ?>>L2</option>        
                        </select>
                                 
                    </div> -->                    
    
                    <div class="col-sm-2">
                        <input class="btn btn-success" style="margin-top: 2.7rem;" name="btnSearch" type="submit" value="Show"/>
                    </div>
                </div>
            </div>     


            <div id="viewTable">
                <?php if ($result->num_rows > 0) {
                    $ctr = $intRecno;
                    ?>
                    <!-- <div class="text-right" style="margin-bottom: .3rem;">
                       <input type="button" name="btnUpdateStatus" id="btnUpdateStatus" class="btn btn-primary noPrint" value="Update Marks" onclick="return validMarks()"> 
                    </div> -->
                    <table class="table table-striped table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th width="20" class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkAll"><span class="lbl"></span></label>
                                </th>
                                <th width="20">Sl.#</th>
                                <th>Applicant Details</th>
                                <th>Registration No</th>
                                <th>Applied Skill(s)</th> 
                                <th>District</th>
                                <th>Action</th>
                                <th>Mark Secured</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           while ($row = $result->fetch_array()) {
                            //print_r($row);exit;
                                $ctr ++;
                                ?>
                                <tr>
                                    <td class="noPrint">
                                        <label class="position-relative">
                                            <input type="checkbox" class="ace chkItem" value="<?php echo $row['intCompetitionId']; ?>"><span class="lbl"></span></label>
                                    </td>
                                    <td><?php echo $ctr; ?></td>

                                    <td>
                                        <div class="media-body pull-left"> 
                                        <a data-toggle="modal" style="cursor:pointer;" data-target="#modalProfile" data-applicant="<?php echo $objPanel->encrypt($row['intCompetitionId']); ?>" class="dispProfilemodal">
                                                
                                        <h4><?php echo htmlspecialchars_decode($row['vchFirstName'], ENT_QUOTES).' '.htmlspecialchars_decode($row['vchMiddleName'], ENT_QUOTES).' '.htmlspecialchars_decode($row['vchLastName'], ENT_QUOTES); ?></h4></a> 
                                        
                                            <small class="text-primary"><i class="fa fa-phone"></i> +91- <?php echo $row['vchPhoneno']; ?></small><br/>
                                        <small class="text-muted"><i class="fa fa-envelope"></i> <?php echo htmlspecialchars_decode($row['vchEmailId'],ENT_QUOTES); ?></small> 
                                      </div>
                                       
                                    </td>
                                     <td><?php echo htmlspecialchars_decode($row['vchAckNo'], ENT_QUOTES); ?></td>
                                    <td><?php echo htmlspecialchars_decode($row['strSkills'], ENT_QUOTES); ?></td>
                                    <td><?php echo htmlspecialchars_decode($row['vchDistrictName'], ENT_QUOTES); ?></td>
                                    <!-- <input type="text" name="intMarks<?php echo $row['intCompetitionId'];?>" id="intMarks<?php echo $row['intCompetitionId'];?>" placeholder="Enter Mark" class="qMark" value="<?php echo ($row['intMarks'])?$row['intMarks']:'';?>" onkeypress="return isNumberKey(event);"> -->
                                    <td>
                                    <?php if($row['intMarks']>0) { 
                                        echo "Mark Entered"; ?>
                                     
                                    <?php } else { ?>
                                    <a data-toggle="modal" style="cursor:pointer;" data-target="#modalQuestion" data-applicant="<?php echo $objPanel->encrypt($row['intCompetitionId'].'/'.$row['skillId']); ?>" class="dispQuestionmodal btn btn-info" href="javascript:void(0)">
                                    Mark Entry </a>
                                   <?php } ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['intMarks'])?$row['intMarks']:'';?>
                                    </td>
                             
                                </tr>
    <?php } ?>
                        </tbody>
                    </table>
                    <!-- <div class="text-right">
                      <input type="button" name="btnUpdateStatus" id="btnUpdateStatus" class="btn btn-primary noPrint" value="Update Marks" onclick="return validMarks()">
                    </div> -->
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
                                    <?php echo $objPanel->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                        <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                                    <?php echo $objPanel->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
      </div>
        <div class="modal-body" id="dispProfile" style="padding: 1px 31px 19px 28px !important;">
          <div class="center" style="height:100px; font-size:24px;"><i class="fa fa-spinner fa-spin"></i></div>
          
          
      </div>
    </div>
   
  </div>
</div>


<div class="modal fade" id="modalQuestion" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated bounceInUp">
        <div class="modal-header" >
            
             <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
             <a href="javascript:void(0)" title="Print" onclick="printModal('myModalLabel1','dispQuestion');" class="btn btn-success btn-sm pull-right" style="margin-right:10px;"><i class="icon-white icon-print"></i> Print</a>
                <h4 class="modal-title" id="myModalLabel1">Question Details</h4>
      </div>
        <div class="modal-body" id="dispQuestion" style="padding: 1px 31px 19px 28px !important;">
          <div class="center" style="height:100px; font-size:24px;"><i class="fa fa-spinner fa-spin"></i></div>
          
          
      </div>
    </div>
   
  </div>
</div>