<?php
    /* ================================================
    File Name         	  : viewPanelMember.php
    Description		      : This is used for view panel member details.
    Author Name           : Rahul Kumar Saw
    Date Created          : 
    Devloped On           : 05-Aug-2021
    Devloped By           : Rahul Kumar Saw
    Update History	      : <Updated by>		<Updated On>		<Remarks>

    ==================================================*/
    require 'viewPanelMemberInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
	$(document).ready(function () {
		
            pageHeader = "View Panel Member";
            strFirstLink = "Manage Skill Competition";
            strLastLink = "Panel Member Details";
            
            deleteMe     = "<?php echo $deletePriv; ?>";          
            printMe		= "yes";            
		
            if('<?php echo $outMsg;?>'!='')                
               viewAlert('<?php echo $outMsg;?>');

            fillPanel('<?php echo $strPanel; ?>','ddlPanel','0','<?php echo $strVenue;?>');
            fillIndiaSkill('<?php echo $skillId;?>','selSkill');
            fillVenue('<?php echo $strVenue;?>','selVenue','<?php echo $level; ?>');
                    
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
                <?php  if ($noAdd != '1') { ?>
                    <a href="<?php echo APP_URL?>addPanelMember/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a>
                <?php }?>
                <a href="javascript:void(0);" class="btn btn-info active">View</a> </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>

                <div class="searchTable">
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label no-padding-right" for="selLevel">Level</label>
                           <select class="form-control" name="selLevel" id="selLevel" onchange="fillVenue(0,'selVenue',this.value)" >
                            <option value="0">- Select -</option> 
                            <option value="2" <?php if($level==2) echo 'selected="selected"'; ?>>Level-2</option> 
                            <option value="3" <?php if($level==3) echo 'selected="selected"'; ?>>Level-3</option>                             
                        </select>
                     </div>
                     <div class="col-sm-2">
                  <label class="control-label no-padding-right" for="selVenue">Venue Name</label>
                        <select class="form-control" name="selVenue" id="selVenue" onchange="fillPanel(0,'ddlPanel',$('#selLevel').val(),this.value)" >
                            <option value="0">- Select -</option>                             
                        </select>
                     </div>
                      <div class="col-sm-2">
                  <label class="control-label no-padding-right" for="ddlPanel">Panel Name</label>
                        <select class="form-control" name="ddlPanel" id="ddlPanel">
                           <option value="0">- All -</option>                                 
                        </select>
                     </div>
                     <div class="col-sm-2">
                   <label class="control-label no-padding-right" for="txtEmployeeName"> Panel Member Name</label> 
                          <input type="text" class="form-control" maxlength="200" name="txtMemberName" id="txtMemberName" value="<?php echo $strMemberName; ?>"/>
                      </div> 

                      <div class="col-sm-2">
                      <label class="control-label no-padding-right" for="selSkill">Skill</label>
                        <select class="form-control" name="selSkill" id="selSkill" >
                                <option value="0">--Select Skill--</option>
                                
                        </select>      
                    </div> 
                      
                      <div class="col-sm-2">
                        <input class="btn btn-success" style="margin-top: 2.7rem;"  name="btnSearch" type="submit" value="Show"/>
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
                                <th>Panel Name </th>                            
                                <th>Venue Name </th>                            
                                <th>Panel Member Name </th> 
                                <th>Email Id</th> 
                                <th>Level</th> 
                                <th>Branch / Trade</th>
                                <th>Skill</th> 
                                <th>Weightage</th> 
                                <th>Created On </th>
                                <th width="30" class="noPrint" style="<?php echo $editPriv; ?>">Edit</th>
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {
                            if($row['intLevel']=='L2')
                                {
                                    $level = 'Level-2';
                                }
                                else if($row['intLevel']=='L3')
                                {
                                    $level = 'Level-3';
                                }
                                else
                                {
                                    $level = '--';
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
                                <td> <?php  echo htmlspecialchars_decode($row['panelName'],ENT_NOQUOTES);?></td>                            
                                <td> <?php  echo htmlspecialchars_decode($row['venueName'],ENT_NOQUOTES);?></td>                            
                                <td> <?php  echo htmlspecialchars_decode($row['vchMemberName'],ENT_NOQUOTES);?></br> <small class="text-primary"><i class="fa fa-phone"></i> +91- <?php echo $row['vchMemberMobile']; ?></small>  </td>                             
                                <td> <?php  echo htmlspecialchars_decode($row['vchMemberEmail'],ENT_NOQUOTES);?> </td>                            
                                <td> <?php  echo $level;?> </td>                            
                                <td> <?php  echo htmlspecialchars_decode($row['vchMemberTrade'],ENT_NOQUOTES);?> </td>                            
                                <td> <?php  echo htmlspecialchars_decode($row['strSkills'],ENT_NOQUOTES);?> </td>                            
                                <td> <?php  echo htmlspecialchars_decode($row['intWeightage'],ENT_NOQUOTES);?> </td>                            
                                <!-- <td> <?php  echo !empty(htmlspecialchars_decode($row['vchDescription'],ENT_NOQUOTES))?htmlspecialchars_decode($row['vchDescription'],ENT_NOQUOTES):'--';?> </td> -->  
                                <td><?php echo date("d-M-Y",strtotime($row['stmCreatedOn']))?></td>
                                <td align="center" valign="middle" class="noPrint" style="<?php echo $editPriv; ?>"><a href="<?php echo APP_URL?>addPanelMember/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intId'] ?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>
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
         

