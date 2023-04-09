<?php
/* ================================================
  File Name         	  : viewEmpDirectory.php
  Description		  : This is used for view the EMp Directory details.
  Author Name		  : T Ketaki Debadarshini
  Date Created		  : 15-July-2017
  Update History	  : <Updated by>		<Updated On>		<Remarks>

  Style sheet           : 
  Javscript Functions   : 
  includes              : util.php, viewEmpDirectoryInner.php

  ================================================== */
    require("viewVenueInner.php");
?>

<script language="javascript">
    $(document).ready(function () {
        loadNavigation('View Venue');
        pageHeader      = "View Venue";
        strFirstLink    = "Manage Event";
        strLastLink     = "View Venue";
        $('[data-rel=tooltip]').tooltip(); 
         
       
           printMe          = "yes";		                
           publishMe        = "yes";
           unpublishMe      = "yes";
           downloadMe       = "yes";

         if('<?php echo $outMsg;?>'!='')                
                 viewAlert('<?php echo $outMsg;?>');


       fillDistricts('<?php echo $intDistid; ?>','ddlDistrict');
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
            
              <a href="<?php echo APP_URL ?>addVenue/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a> 
            
              <a href="javascript:void(0);" class="btn btn-info active">View</a>
              <a href="<?php echo APP_URL ?>addOfflineVenue/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add Offline Venue</a>
              
             
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>

            <div class="searchTable">
              <div class="form-group">
                  <label class="col-sm-2 control-label no-padding-right" for="ddlDistrict">District</label>
                    <div class="col-sm-2"> 
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlDistrict" id="ddlDistrict">
                           <option value="0">- All -</option>                                 
                        </select>
                     </div>
                   <label class="col-sm-2 control-label no-padding-right" for="txtEmployeeName"> Venue Name</label>
                      <div class="col-sm-2"> <span class="colon">:</span> 
                          <input type="text" class="form-control" maxlength="200" name="txtEmployeeName" id="txtEmployeeName" value="<?php echo $strEmployeeName; ?>"/>
                      </div>  
                      
                      <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                        <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewVenue/<?php echo $glId . '/' . $plId; ?>' ">
                     </div>                
              </div>
            </div>
			
          <div class="legandBox">			
                <span class="greenLegend">&nbsp;</span>Published Venue(s) &nbsp;			
                <span class="yellowLegend">&nbsp;</span> Unpublished Venue(s) &nbsp;
            </div>
             <div id="viewTable">
                <?php if ($result->num_rows > 0) {
                    $ctr = $intRecno; ?>
                    <table class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="20" class="noPrint">
                                    <label class="position-relative">
                                    <input type="checkbox" class="ace chkAll"><span class="lbl"></span></label>
                                </th>
                                <th width="20">Sl.#</th>
                                <th>Venue Name </th>  
                                <th>Venue Officer Name</th>                                 
                                <th>District</th> 
                                <th>Email </th> 
                                <th>Contact Number</th> 
                                <th>Capacity</th> 
                                <th>Created On </th>
                                <th>Updated On </th>
                                <th width="30" class="noPrint">Edit</th>
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = $result->fetch_array()) {
                            
                            if($row['tinPublishStatus']==2)
                                $style	= 'class="greenBorder"';
                            else
                                $style	= 'class="yellowBorder"'; 
                                $ctr++; 
                                
                              
                         ?>
                            <tr <?php echo $style;?>>
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intVenueId'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['intVenueId'];?>" name="hdnPubStatus<?php echo $row['intVenueId'];?>" value="<?php echo $row['tinPublishStatus'];?>"/>
                                    </label>
                                </td>
                                <td><?php echo $ctr; ?></td>
                                <td> 
                                    <?php echo htmlspecialchars_decode($row['vchVenueName'],ENT_QUOTES); ?>
                                </td>
                                
                                <td><?php  echo $row['vchOfficerName'];?> </td>
                              
                                <td><?php  echo htmlspecialchars_decode($row['vchDistrictname'],ENT_QUOTES);?> </td>  
                                <td><?php  echo htmlspecialchars_decode($row['vchEmailId'],ENT_QUOTES);?> </td>  
                               
                                <td><?php  echo htmlspecialchars_decode($row['vchOfficerMobile'],ENT_QUOTES);?></td>   
                                <td><?php  echo $row['intCapacity'];?> </td>
                                <td><?php echo date("d-M-Y",strtotime($row['stmCreatedOn']))?></td>
                                <td><?php echo ($row['dtmUpdatedOn']=='')?'--':date("d-M-Y",strtotime($row['dtmUpdatedOn']))?></td>

                                <td align="center" valign="middle" class="noPrint"><a href="<?php echo APP_URL?>addVenue/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intVenueId'] ?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>
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
            <?php if($result->num_rows > 0) { ?>
                <div class="row noPrint">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="sample-table-2_info">
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a>/ <?php } ?> 
                            <?php echo $objVenue->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                     <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                                <?php echo $objVenue->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
