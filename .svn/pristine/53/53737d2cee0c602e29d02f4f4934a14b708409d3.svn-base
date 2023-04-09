<?php
    require 'archiveCareerInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
    $(document).ready(function () {
        pageHeader   = "Archive Career";
        strFirstLink = "Manage Application";
        strLastLink  = "Career";
        deleteMe     = "<?php echo $deletePriv; ?>";
        enableMe     = "<?php echo $noActive; ?>";
        printMe      = "yes";
               
        if('<?php echo $outMsg;?>'!='')                
        viewAlert('<?php echo $outMsg;?>');    
    });
        
function validSl(totalVal)
  {
    var flag  = 0;
    $('.txtSLNo').each(function(){
      if(Number(this.value)==0)
      {
        alert('Rank must be greater than zero');
        this.focus();
        flag  = 1;
        return false;
      }
      if(Number(this.value)>Number(totalVal))
      {
        alert('Rank cannot greater than total records');
        this.focus();
        flag  = 1;
        return false;
      }
    });
    if(flag==0)
      gotoDelete('US');
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
                    <a href="<?php echo APP_URL?>addCareer/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a>
                <?php }?>
                <a href="<?php echo APP_URL;?>viewCareer/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>
                <a href="javascript:void(0);" class="btn btn-info active">Archive</a>
                 </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                <div class="searchTable">
                    <div class="form-group">
                        <label class="col-sm-1 control-label no-padding-right" for="txtCarrerName">Career Name</label>
                        <div class="col-sm-3"> <span class="colon">:</span>
                            <input type="text" id="txtCarrerName" name="txtCarrerName" maxlength="200" class="form-control" value="<?php echo $strName; ?>">
                        </div>
                   
                        <div class="col-sm-2">
                            <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                            <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>archiveCareer/<?php echo $glId . '/' . $plId; ?>' ">
                        </div>
                    </div>
                </div>
                <div id="viewTable">
                <?php if (mysqli_num_rows($result) > 0) {
                    $ctr = $intRecno; ?>
                    <input type="button" name="btnUpdateSl" id="btnUpdateSl" class="btn btn-success noPrint" value="Update Sl. Number" onclick="return validSl(<?php echo $intTotalRec;?>)" style="margin-bottom:5px;">
                    <table class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="20" class="noPrint">
                                    <label class="position-relative">
                                    <input type="checkbox" class="ace chkAll"><span class="lbl"></span></label>
                                </th>
                                <th width="20">Sl.#</th>
                                <th>Career Name In English</th>    
                                <th>Career Name In Odia </th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Document</th>
                                <th>Created On</th>
                                <th>Reactive</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {
                            
                            if($row['tinPublishStatus']==2)
                                $style  = 'class="greenBorder"';
                            else
                                $style  = 'class="yellowBorder"'; 
                                $ctr++; 
                                ?>
                            <tr>
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intId'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['intId'];?>" name="hdnPubStatus<?php echo $row['intId'];?>" value="<?php echo $row['tinPublishStatus'];?>"/>
                                    </label>
                                </td>
                              
                                <td><?php echo $ctr; ?></td>
                                <td> <?php  echo htmlspecialchars_decode($row['vchCareerName'],ENT_NOQUOTES);?> </td>  
                                
                                 <td> <?php  echo htmlspecialchars_decode($row['vchCareerNameO'],ENT_NOQUOTES);?> </td>
                                <td width="100"><?php
                                    if(strtotime($row['dtmStartDate'])>0)
                                    echo date("d-M-Y",strtotime($row['dtmStartDate']));
                                    else echo '--';?>
                                </td>
                                <td width="100"><?php
                                    if(strtotime($row['dtmEndDate'])>0)
                                    echo date("d-M-Y",strtotime($row['dtmEndDate']));
                                    else echo '--';?>
                                </td>
                                <td align="center">
                                    <?php if($row['vchDocument']!='')
                                     {
                                         $vchDocument =pathinfo($row['vchDocument'], PATHINFO_EXTENSION);
                                       ?>
                                           <a href="<?php echo APP_URL;?>uploadDocuments/Career/<?php echo $row['vchDocument'];?>" target="_blank"><?php if($vchDocument=='pdf'){?><img src="<?php echo APP_URL;?>img/pdf.png" alt="" width="16" height="16" border="0" align="absmiddle"><?php } else{?><img src="<?php echo APP_URL;?>img/wordIcon.jpg" alt="" width="20" height="20" border="0" align="absmiddle"><?php }?></a>
                                   <?php 
                                    }?>
                                </td>
                                <td width="100"><?php
                                    if(strtotime($row['stmCreatedOn'])>0)
                                    echo date("d-M-Y",strtotime($row['stmCreatedOn']));
                                    else echo '&nbsp;';?>
                                </td>
                                 <td align="center" valign="middle" class="noPrint" style="<?php echo $editPriv; ?>"><a href="<?php echo APP_URL?>addCareer/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intId'] ?>" data-rel="tooltip" Name="" data-original-Name="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>
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
    <?php echo $objCareer->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
        <?php echo $objCareer->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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

