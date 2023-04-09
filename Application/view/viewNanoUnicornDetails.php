<?php
 /* ================================================
      File Name               : viewNanoUnicornDetails.php
      Description             : This is used for view Submitted Query.
      Author Name             : Arpita Rath
      Date Created            : 31-03-2017 
      Devloped By             : Arpita Rath
      Devloped On             : 31-03-2017
      Update History          :
      <Updated by>      <Updated On>        <Remarks>
     *       
      Style sheet             : 
      Javscript Functions     : 
      includes                : submited-queryInner.php
  ================================================== */
    include_once('viewNanoUnicornDetailsInner.php');
?>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script language="javascript">
    $(document).ready(function () {
        loadNavigation('View Nano Unicorn Details');
        pageHeader   = "Nano Unicorn";
        strFirstLink = "Manage Institutions";
        strLastLink  = "Nano Unicorn";
       
        deleteMe     = "yes";
        printMe      = "yes";
        
      
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
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="top_tab_container">
                <?php  if ($noAdd != '1') { ?>
                    <a href="<?php echo APP_URL?>addNanoUnicorn/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a>
                <?php }?>
               <a href="<?php echo APP_URL; ?>viewNanoUnicorn/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>
                <a href="<?php echo APP_URL; ?>viewNanoUnicornDetails/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info active">Applicants</a>
                
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="searchTable" >
                <div class="form-group">                   
                    <label class="col-sm-2 control-label no-padding-right" for="txtSearch">Search By Name</label>
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
    
                    <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                        <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewNanoUnicornDetails/<?php echo $glId . '/' . $plId; ?>' ">
                    </div>
                </div>
            </div>     


            <div id="viewTable">
                <?php if ($result->num_rows > 0) {
                    $ctr = $intRecno;
                    ?>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="20" class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkAll"><span class="lbl"></span></label>
                                </th>
                                <th width="20">Sl.#</th>
                                <th>Name</th>
                                <th>District</th>
                                <th>Phone</th>
                                <th>Business Details</th>
                                <th>DOB</th>
                                <th>Skilled Institute</th>
                                <th>Course Name</th>
                                <th>Posted On </th>
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
                                            <input type="checkbox" class="ace chkItem" value="<?php echo $row['intNanoId']; ?>"><span class="lbl"></span></label>
                                    </td>
                                    <td><?php echo $ctr; ?></td>

                                    <td><?php echo htmlspecialchars_decode($row['vchName'], ENT_QUOTES); ?></td>
                                    
                                    <td><?php echo htmlspecialchars_decode($row['vchDistrictname'], ENT_QUOTES); ?></td>

                                    <td><?php echo $row['vchPhone']; ?></td>

                                    <td><?php echo htmlspecialchars_decode($row['vchBusiness'], ENT_QUOTES); ?>
                                    </td>
                                    <td><?php echo (!empty($row['dtDOB']))?date('d-M-Y', strtotime($row['dtDOB'])):'N/A'; ?></td>
                                    <td><?php echo (!empty(htmlspecialchars_decode($row['vchCentername'], ENT_QUOTES)))?htmlspecialchars_decode($row['vchCentername'], ENT_QUOTES):'--'; ?></td>
                                    <td><?php echo (!empty(htmlspecialchars_decode($row['vchTradename'], ENT_QUOTES)))?htmlspecialchars_decode($row['vchTradename'], ENT_QUOTES):'--'; ?></td>
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
            <?php } else { ?>
                    <div class="noRecord">No record found</div>
            <?php } ?>
            </div>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <div class="row noPrint">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="sample-table-2_info">
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a>/ <?php } ?> 
                                    <?php echo $objNano->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                        <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                                    <?php echo $objNano->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
