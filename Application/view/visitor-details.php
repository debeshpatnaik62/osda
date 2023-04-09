<?php
 /* ================================================
	  File Name         	  : visitor-details.php
	  Description	          : This is used view visitor details.
	  Author Name	          : Ashis kumar Patra
	  Date Created		  : 27-03-2017 
	  Devloped By		  : Ashis kumar Patra
	  Devloped On		  : 27-03-2017
	  Update History          :
	  <Updated by>		<Updated On>		<Remarks>
	 *       
	  Style sheet             : 
	  Javscript Functions     : 
	  includes                : visitor-detailsInner.php
  ================================================== */
    include_once('visitor-detailsInner.php');
?>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script language="javascript">
    $(document).ready(function () {
        loadNavigation('View Visitor Details');
        pageHeader   = "View Visitor Details";
        strFirstLink = "Manage Application";
        strLastLink  = "Visitor Details";
       
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
                <a href="javascript:void(0);" class="btn btn-info active">Visitor Details</a> 
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>    
            <div class="searchTable" >
                <div class="form-group">
                   
                    <label class="col-sm-3 control-label no-padding-right" for="txtSearch">Search By Name/E-mail/Mobile No</label>
                    <div class="col-sm-3"> <span class="colon">:</span>	
                        <input type="text" class="form-control" maxlength="80" name="txtSearch" id="txtSearch" value="<?php echo $strName; ?>"/>
                    </div>	

                    <label class="col-sm-2 control-label no-padding-right" for="txtVisitNo">Visitor Identity No.</label>
                       <div class="col-sm-2"> <span class="colon">:</span>
                          <div class="input-group">
                             <input class="form-control" id="txtVisitNo" name="txtVisitNo" type="text"  value="<?php echo $strVisitNo; ?>">
                            
                          </div>
                      </div>  
                    <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                        <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>visitor-details' ">
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
                                <th>E-mail</th>
                                <th>Phone</th>
                                <th>Identity No.</th>
                                <th>Registered On </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           while ($row = $result->fetch_array()) {
                                $ctr ++;
                                ?>
                                <tr>
                                    <td class="noPrint">
                                        <label class="position-relative">
                                            <input type="checkbox" class="ace chkItem" value="<?php echo $row['INT_VISITOR_ID']; ?>"><span class="lbl"></span></label>
                                    </td>
                                    <td><?php echo $ctr; ?></td>

                                    <td><?php echo htmlspecialchars_decode($row['VCH_NAME'], ENT_QUOTES); ?></td>
                                    
                                    <td><a href="mailto:<?php echo $row['VCH_EMAIL'];?>" title="<?php echo $row['VCH_EMAIL'];?>"><?php echo htmlspecialchars_decode($row['VCH_EMAIL'], ENT_QUOTES); ?></a></td>

                                    <td><?php echo $row['VCH_PHONE']; ?></td>

                                     <td align="center">
                                         <strong><?php echo $row['VCH_REF_NO']; ?></strong>
                                    </td>  

                                    <td><?php echo date('d-M-Y', strtotime($row['DTM_CREATED_ON'])); ?></td>
                             
                                </tr>
    <?php } ?>
                        </tbody>
                    </table>
                    <input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno; ?>" />
                    <input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno; ?>" />
                    <input name="hdn_IsPaging" id="hdn_IsPaging" type="hidden" value="<?php echo $isPaging; ?>" />
                    <input name="hdn_ids" id="hdn_ids" type="hidden" />
                    <input name="hdn_qs" id="hdn_qs" type="hidden" />
                    <input type="hidden" id="hdnFid" name="hdnFid" value="">
            <?php } else { ?>
                    <div class="noRecord">No record found</div>
            <?php } ?>
            </div>
            <?php if ($result->num_rows > 0) { ?>
                <div class="row noPrint">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="sample-table-2_info">
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a>/ <?php } ?> 
                            <?php echo $objStory->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                                    <?php echo $objStory->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
   