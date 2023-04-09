<?php

    require 'viewInstituteProgramInner.php';
?>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
	$(document).ready(function () {
		pageHeader = "Digital Skilling";
                strFirstLink = "Digital Skilling";
                strLastLink = "Institute Registration Request";
               loadNavigation('Skill Development Program Report');

		    printMe		   = "yes";     		                
        downloadMe   = "yes";
        deleteMe     = "yes";

        <?php if ($msg != '' && isset($_REQUEST['btnUpdate'])) { ?>
            viewAlert('<?php echo $msg; ?>', '', '');
         <?php }  ?>
	
               
         if('<?php echo $outMsg;?>'!='')                
              viewAlert('<?php echo $outMsg;?>');

          
             
        $('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        });   

        //View Institute details 
        $('.dispProfilemodal').on('click',function(){
               var tpId     = $(this).data( "applicant" );
              $("#dispProfile").load('<?php echo APP_URL;?>instituteDetails/'+tpId);
        });

        fillSkillDevelopInstituteName('<?php echo $instituteName;?>','selInstituteName'); 

            
	});
        
  function programStatusData(intId,userId,programId)
    {   
        fillProgramSeatDetails(programId,intId);
        $('#proStatusId').val(intId);
        $('#programId').val(programId);
        $('#userId').val(userId);
        $('#proRejectId').val('');
        /*setTimeout(function(){
        var propSeat = $('#hdnPropSeat').val();
        $("#txtSeatPro").val(propSeat);
        }, 300);*/
        $("#seatDetails").modal();
       /*confirmAlert("Are you sure to submit ?");
       $('#btnConfirmOk').on('click',function()
        {
          $('#hdnAction').val('U');
          $('#frmOGP').submit();
        });*/
    } 

    function validatorSeat(){
        
        if (!blankCheck('txtSeatPro', 'Please allot seat'))
            return false;

        confirmAlert("Are you sure to submit ?");
        $('#btnConfirmOk').on('click',function()
        {
          $('#hdnAction').val('U');
          $('#frmOGP').submit();
        });

        $('#btnConfirmCancel').on('click', function () {
            $("#alertModal").modal('hide');
        })
        return false;
    } 

    function programRejectData(intId,userId)
    { 
        $('#proRejectId').val(intId);
        $('#proStatusId').val('');
        $('#userId').val(userId);
        $("#callDetails").modal();
    }  
    /*function programRemark(intId)
    { 
        $('#proMarkId').val(intId);
        $('#frmOGP').submit();
    }*/ 
     function validatorCall(){
        
        if (!blankCheck('txtRemark', 'Remarks can not be left blank'))
            return false;

        confirmAlert('Are you sure to submit ?');
        $('#btnConfirmOk').on('click', function () {
            $('#hdnAction').val('R');
            $('#frmOGP').submit();
        })

        $('#btnConfirmCancel').on('click', function () {
            $("#alertModal").modal('hide');
        })
        return false;
    }     
</script>
    <div class="page-content">
        <div class="page-header">
            <h1 id="title" class="col-sm-5"></h1>
        </div>
        <div class="row no-margin">
            <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="top_tab_container">
                
                <a href="<?php echo APP_URL; ?>viewTPRegistrationRequest/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View TP Registration Request</a>
                <a href="javascript:void(0);" class="btn btn-info active">View Institute Registration Request</a>
                <a href="<?php echo APP_URL; ?>viewProgramRequest/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View TP Program Request</a>
                <a href="<?php echo APP_URL; ?>instituteProgramRequest/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Institute Program Request</a>
                 </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                <div class="searchTable">
                    <div class="row">                   
                    <div class="form-group">                   
                        <label class="col-sm-1 control-label no-padding-right" for="txtSearch">Institute Name</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <input type="text" class="form-control" maxlength="200" name="vchInsName" id="vchInsName" value="<?php echo $vchInsName; ?>"/>
                    </div>
                                        
                        <label class="col-sm-1 control-label no-padding-right" for="txtSearch">Reference Number</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <input type="text" class="form-control" maxlength="100" name="vchRefNumber" id="vchRefNumber" value="<?php echo $vchRefNumber; ?>"/>
                    </div>
                    <label class="col-sm-1 control-label no-padding-right" for="txtSearch">Status</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <select name="tinApproveStatus" id="tinApproveStatus" class="form-control">
                          <option value="">--Select--</option>
                          <option value="1" <?php if($tinApproveStatus==1) echo 'selected="selected"'; ?>>Approved</option>
                          <option value="2" <?php if($tinApproveStatus==2) echo 'selected="selected"'; ?>>Rejected</option>
                        </select>
                    </div>
                    
                        <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                        <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewInstituteProgram/<?php echo $glId . '/' . $plId; ?>' ">
                    </div>
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
                                <th width="20" class="noPrint">
                                    <label class="position-relative">
                                    <input type="checkbox" class="ace chkAll"><span class="lbl"></span></label>
                                </th>
                                <th width="20">Sl.#</th>
                                <th>Institute Details</th>    
                                <th>Program Name</th>
                                <th>Contact Person Details</th>
                                <th>Details</th>   
                                <th>Action</th> 
                                <th>Remarks</th>
                            </tr>
                        </thead>
              		<tbody>
                         <?php while ($row = mysqli_fetch_array($result)) {

                                

                                $ctr++; 
                                ?>
                            <tr>
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value=""><span class="lbl"></span>
                                    </label>
                                </td>
                                <td><?php echo $ctr;?></td>
                                <td>
                                    <div class="media-body pull-left"> 
                                                
                                        <h4><?php echo htmlspecialchars_decode($row['vchInsName'], ENT_QUOTES); ?></h4>
                                        <small class="text-primary"><i class="fa fa-phone"></i> +91- <?php echo $row['vchInsMobile']; ?></small><br/>    
                                        <small class="text-muted"><i class="fa fa-envelope"></i> <?php echo htmlspecialchars_decode($row['vchInsEmail'],ENT_QUOTES); ?></small> 
                                      </div>
                                </td>
                                <td><?php echo htmlspecialchars_decode($row['programName'], ENT_QUOTES); ?> </td>
                                <td>
                                <div class="media-body pull-left"> 
                                                
                                        <h4><?php echo htmlspecialchars_decode($row['vchConName'], ENT_QUOTES); ?></h4>
                                        <small class="text-primary"><i class="fa fa-phone"></i> +91- <?php echo $row['vchConMobile']; ?></small><br/>    
                                        <small class="text-muted"><i class="fa fa-envelope"></i> <?php echo htmlspecialchars_decode($row['vchConEmail'],ENT_QUOTES); ?></small> 
                                      </div>
                                </td> 
                               
                                <td>
                                  <a data-toggle="modal" style="cursor:pointer;" data-target="#modalProfile" data-applicant="<?php echo $objIns->encrypt($row['intId']); ?>" class="dispProfilemodal btn btn-xs btn-info"><i class="ace-icon fa fa-file-text bigger-120"></i></a>
                                </td>
                                
                                <td> 
                                  <?php $status = $row['tinApproveStatus']; 
                                  if($status==1){
                                    echo "Approved"; }
                                    else if($status==2) {
                                      echo "Rejected";}
                                      else {?>
                                  <div style="display: flex;"> 
                                    <input type="button" name="btnUpdate" id="btnUpdate" class="btn btn-success noPrint" value="Approve" style="margin-left:5px;" onclick="programStatusData('<?php echo $row['intId'];?>','<?php echo $row['vchUserId'];?>','<?php echo $row['intProgramId'];?>')" >
                                    <input type="button" name="btnUpdate" id="btnUpdate" class="btn btn-danger noPrint" value="Reject" style="margin-left:5px;" onclick="programRejectData('<?php echo $row['intId'];?>','<?php echo $row['vchUserId'];?>')" >
                                 </div>
                                 <?php } ?>
                               </td> 
                                <td>
                                  <?php if($row['vchAppRemark']=='') {
                                   echo "--";
                                 } else {
                                  echo $row['vchAppRemark'];
                                } ?>
                              </td>                                 
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
                    <input type="hidden" name="proStatusId" id="proStatusId" value="">
                    <input type="hidden" name="proRejectId" id="proRejectId" value="">
                    <input type="hidden" name="proMarkId" id="proMarkId" value="">
                    <input type="hidden" name="userId" id="userId" value="">
                    <input type="hidden" name="programId" id="programId" value="">
               <?php } else { ?>
                    <div class="noRecord">No record found</div>
            <?php } ?>
                    
                
        </div>
           <?php if (mysqli_num_rows($result) > 0) { ?>
                <div class="row noPrint">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="sample-table-2_info">
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a>/ <?php } ?> 
                    <?php echo $objIns->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                                        </div>
                                    </div>
                    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                                        <div class="col-xs-6">
                                            <div class="dataTables_paginate paging_bootstrap">
                                                <ul class="pagination">
                        <?php echo $objIns->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
         
 
    <div class="modal fade" id="callDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title noPrint" id="myModalLabel">Institute Registration Request</h4>
            </div>
            <div class="modal-body noPrint" id="divContent">
                
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right">Remarks</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <textarea class="form-control" name="txtRemark" id="txtRemark" autocomplete="off" spellcheck="false"></textarea>
                        <span class="mandatory">*</span>                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right"></label>
                    <div class="col-sm-4">
                        <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" class="btn btn-success noPrint" onclick="return validatorCall();"/>
                    </div>
                </div>

                
                 <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>  


<div class="modal fade" id="seatDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title noPrint" id="myModalLabel">Seat Availability Request</h4>
            </div>
            <div class="modal-body noPrint" id="divContent">
                <div id="viewTable">
                  <div id="divTraingDetails">
                        <div class="alert alert-info" id="seatInfo">
                        
                    </div>
                 </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right">Seat Allow</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" class="form-control" name="txtSeatPro" id="txtSeatPro" autocomplete="off">
                        <span class="mandatory">*</span>                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right"></label>
                    <div class="col-sm-4">
                        <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" class="btn btn-success noPrint" onclick="return validatorSeat();"/>
                    </div>
                </div>

                
                 <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>  
 

<div class="modal fade" id="modalProfile" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated bounceInUp">
        <div class="modal-header" >
            
             <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
             <a href="javascript:void(0)" title="Print" onclick="printModal('myModalLabel','dispProfile');" class="btn btn-success btn-sm pull-right" style="margin-right:10px;"><i class="icon-white icon-print"></i> Print</a>
                <h4 class="modal-title" id="myModalLabel">Institute Details</h4>
                
<!--        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
    
        <h3 class="modal-title pull-left" id="myModalLabel">Applicant Details</h3>-->
      </div>
        <div class="modal-body" id="dispProfile" style="padding: 1px 31px 19px 28px !important;">
          <div class="center" style="height:100px; font-size:24px;"><i class="fa fa-spinner fa-spin"></i></div>
          
          
      </div>
    </div>
   
  </div>
</div>  