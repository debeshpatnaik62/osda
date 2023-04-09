<?php
/* ================================================
  File Name           : viewSLAConfiguration.php
  Description		  : This is used for view the SLA Configuration details.
  Author Name		  : Rahul Kumar Saw
  Date Created		  : 06-April-2023
  Update History	  : <Updated by>		<Updated On>		<Remarks>

  Style sheet           : 
  Javscript Functions   : 
  includes              : util.php, viewSLAConfigurationInner.php

  ================================================== */
    require("viewSLAConfigurationInner.php");
?>

<script language="javascript">
    $(document).ready(function () {
        loadNavigation('View SLA Configuration');
        pageHeader   = "SLA Configuration";
        strFirstLink = "Manage Grievance";
        strLastLink  = "SLA Configuration";
        $('[data-rel=tooltip]').tooltip(); 
         
       
           printMe          = "yes";
           //deleteMe         = "yes";		                
           //publishMe        = "yes";
           //unpublishMe      = "yes";

         if('<?php echo $outMsg;?>'!='')                
            viewAlert('<?php echo $outMsg;?>');
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
            
              <a href="<?php echo APP_URL ?>slaConfiguration/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a> 
            
              <a href="javascript:void(0);" class="btn btn-info active">View</a>
             
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
                <div class="searchTable">
                    <div class="form-group">
                        <label class="col-sm-1 control-label no-padding-right" for="txtCarrerName">Category</label>
                        <div class="col-sm-3"> <span class="colon">:</span>
                            <select class="form-control" name="selectCategory" id="selectCategory">
                            <option value="0">--Select--</option>
                            <option value="1"<?php if($strCatId==1) echo 'selected="selected"'; ?>>Exam</option>
                            <option value="2"<?php if($strCatId==2) echo 'selected="selected"'; ?>>Result</option>
                            <option value="3"<?php if($strCatId==3) echo 'selected="selected"'; ?>>Category is not populating</option>
                        </select>
                        </div>

                        <label class="col-sm-1 control-label no-padding-right" for="txtCarrerName">Complain Priorty</label>
                        <div class="col-sm-3"> <span class="colon">:</span>
                            <select class="form-control" name="slaPriority" id="slaPriority">
                            <option value="0">--Select--</option>
                            <option value="1" <?php if($ddlPriorty==1) echo 'selected="selected"'; ?>>High</option>
                            <option value="2" <?php if($ddlPriorty==2) echo 'selected="selected"'; ?>>Medium</option>
                            <option value="3" <?php if($ddlPriorty==3) echo 'selected="selected"'; ?>>Low</option>
                        </select>
                        </div>
                   
                        <div class="col-sm-2">
                            <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                            <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewSLAConfiguration/<?php echo $glId . '/' . $plId; ?>' ">
                        </div>
                    </div>
                </div>
             <div id="viewTable">
                <?php if ($result->num_rows > 0) {
                    $ctr = $intRecno; ?>
                    <table class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="20">Sl.#</th>
                                <th>Category Name </th>  
                                <th>Priority</th>  
                                <th>SLA Period  </th>                              
                                <th>Created On </th>
                                <th width="30" class="noPrint">Edit</th>
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = $result->fetch_array()) {
                                $ctr++; 
                                if($row['intPriority']==1)
                                {
                                    $priority ='High';
                                }
                                else if($row['intPriority']==2)
                                {
                                    $priority ='Medium';
                                }
                                else
                                {
                                    $priority ='Low';
                                }
                                $periodUnit = $row['intSLAPeriodUnit'];
                                if($periodUnit==1)
                                {
                                    $periodUnit='Hours';
                                }
                                else
                                {
                                    $periodUnit='Days';
                                }
                                $period = $row['intSLAPeriod'];
                                $slaPeriod = $period.' '.$periodUnit;
                              
                         ?>
                            <tr>
                               <td><?php echo $ctr;?></td>
                               <td> <?php  echo htmlspecialchars_decode($row['categoryName'],ENT_NOQUOTES);?> </td>
                                <td> <?php  echo $priority;?> </td>                            
                                <td> <?php  echo $slaPeriod;?> </td> 
                                <td><?php echo date("d-M-Y",strtotime($row['stmCreatedOn']))?></td>
                                
                               <td align="center" valign="middle" class="noPrint" style="<?php echo $editPriv; ?>"><a href="<?php echo APP_URL?>slaConfiguration/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intId'] ?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>
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
            <?php if($result->num_rows > 0) { ?>
                <div class="row noPrint">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="sample-table-2_info">
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a>/ <?php } ?> 
                            <?php echo $objConfig->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                     <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                                <?php echo $objConfig->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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