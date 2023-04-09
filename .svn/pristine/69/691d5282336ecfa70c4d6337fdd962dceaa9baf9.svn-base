<?php
    /* ================================================
    File Name         	  : viewRegistrationPhase.php
    Description		      : This is used for view registration phase details.
    Author Name           : Rahul Kumar Saw
    Date Created          : 
    Devloped On           : 31-May-2022
    Devloped By           : Rahul Kumar Saw
    Update History	      : <Updated by>		<Updated On>		<Remarks>

    ==================================================*/
    require 'viewRegistrationPhaseInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
	$(document).ready(function () {
		
            pageHeader = "View Registration Event";
            strFirstLink = "Manage Skill Competition";
            strLastLink = "Registration Event";
            
            //deleteMe     = "<?php echo $deletePriv; ?>";         
            printMe		= "yes";            
		
            if('<?php echo $outMsg;?>'!='')                
               viewAlert('<?php echo $outMsg;?>');
                    
	});
    function validStatus()
      {
        var flag  = 0;
        if(flag==0)
          gotoEnabled('ES');
      }
      function validDisStatus()
      {
        var flag  = 0;
        if(flag==0)
          gotodisabled('DS');
      }
    function gotoEnabled(e) {
    var t = "";
    if ($(".chkItem").each(function() {
            $(this).is(":checked") && (t += $(this).val() + ",")
        }), t.length > 0) {
        for (var i = (t = t.substring(0, t.length - 1)).split(","), o = i.length, r = 0; r < o; r++)
        "ES" == e && confirmAlert("Are you sure to update the selected record(s)"), $("#btnConfirmOk").on("click", function() {
            $("#hdn_ids").val(t), $("#hdn_qs").val(e), $("#frmOGP").submit()
        })
    } else viewAlert("Please select a record!")
}
function gotodisabled(e) {
    var t = "";
    if ($(".chkItem").each(function() {
            $(this).is(":checked") && (t += $(this).val() + ",")
        }), t.length > 0) {
        for (var i = (t = t.substring(0, t.length - 1)).split(","), o = i.length, r = 0; r < o; r++)
        "DS" == e && confirmAlert("Are you sure to update the selected record(s)"), $("#btnConfirmOk").on("click", function() {
            $("#hdn_ids").val(t), $("#hdn_qs").val(e), $("#frmOGP").submit()
        })
    } else viewAlert("Please select a record!")
}
</script>
    <div class="page-content">
        <div class="page-header">
            <h1 id="title" class="col-sm-5"></h1>
        </div>
        <div class="row">
            <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="top_tab_container">
                <?php  if ($noAdd != '1') { ?>
                    <a href="<?php echo APP_URL?>addRegistrationPhase/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a>
                <?php }?>
                <a href="javascript:void(0);" class="btn btn-info active">View</a> </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
               
               
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
                                <th>Phase Name </th>                            
                                <th>Phase Year</th> 
                                <th>Created On </th>
                                <th>Status</th>
                                <th class="noPrint">Action</th>
                                <!-- <th width="30" class="noPrint" style="<?php echo $editPriv; ?>">Edit</th> -->
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {
                                    $phaseStaus = $row['intStatus'];
                                    if($phaseStaus==1)
                                    {
                                        $status = 'Enabled';
                                    }
                                    else
                                    {
                                        $status = 'Disabled';
                                    }
                                $ctr++; 
                                ?>
                            <tr>
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intId'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['intId'];?>" name="hdnPubStatus<?php echo $row['intId'];?>" value=""/>
                                    </label>
                                </td>
                                <td><?php echo $ctr; ?></td>                           
                                <td> <?php  echo htmlspecialchars_decode($row['vchPhaseName'],ENT_NOQUOTES);?> </td>                            
                                <td> <?php  echo $row['vchPhaseYear'];?> </td>  
                                <td><?php echo date("d-M-Y",strtotime($row['dtmCreatedOn']))?></td>
                                <td><?php echo $status;?></td>
                                <td>
                                <?php if($phaseStaus==0) { ?><input type="button" name="btnUpdateStatus" id="btnUpdateStatus" class="btn btn-info noPrint" value="Enable" onclick="return validStatus()">
                                    <?php } else if($phaseStaus==1) { ?>
                                <input type="button" name="btnUpdateDStatus" id="btnUpdateDStatus" class="btn btn-primary noPrint" value="Disable" onclick="return validDisStatus()"></td>
                                <?php } ?>
                                <!--<input type="button" name="btnUpdateStatus" id="btnUpdateStatus" class="btn btn-info noPrint" value="Enabled" onclick="return validStatus()">
                                <input type="button" name="btnUpdateDStatus" id="btnUpdateDStatus" class="btn btn-primary noPrint" value="Disabled" onclick="return validDisStatus()">
                                <?php //} ?>
                                <td align="center" valign="middle" class="noPrint" style="<?php echo $editPriv; ?>"><a href="<?php echo APP_URL?>addRegistrationPhase/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intId'] ?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td> -->
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
    <?php echo $objRegistartion->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
        <?php echo $objRegistartion->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
         

