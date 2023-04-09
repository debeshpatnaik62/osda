<?php
    /* ================================================
    

    ==================================================*/
    require 'viewReportInner.php';
?>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script language="javascript">
	$(document).ready(function () {
		loadNavigation('View Report');
                 strFirstLink = "Manage Application";
                strLastLink = "Annual Report";
		printMe		= "yes";
                
		publishMe       = "yes";
                unpublishMe     = "yes";
                deleteMe = "yes";
               
		$('.showModal').click(function(){
			$('#myModal1').modal();			
		});
               
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
                    
                 $('[data-rel=tooltip]').tooltip();   
               fillReport('<?php echo $intReportCategoryId; ?>','ddlLocation');
           
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
                    <a href="<?php echo APP_URL?>addReport/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a>
                <?php }?>
                <a href="javascript:void(0);" class="btn btn-info active">View</a> 
                    <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                <div class="searchTable">
                    <div class="form-group"> 
                                
                    <label class="col-sm-2 control-label no-padding-right" for="ddlLocation">Select Category</label>
                    <div class="col-sm-2">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlCategory" id="ddlLocation">
                            <option value="0">- All -</option>  
                           <!--  <option value="1">Category 1</option>
                            <option value="2">Category 2</option>
                            <option value="3">Category 3</option> -->
                        </select>   
                    </div>

                          <label class="col-sm-1 control-label no-padding-right" for="txtStartDt">Date From</label>
                            <div class="col-sm-2"> <span class="colon">:</span>
                                <div class="input-group">
                                    <input class="form-control date-picker" id="txtStartDt" name="txtStartDt" type="text" data-date-format="dd-mm-yyyy" value="<?php echo ($strStartDt!='1000-01-01')?date('d-m-Y',strtotime($strStartDt)):''; ?>">
                                    <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 
                                </div>
                            </div>

                            <label class="col-sm-1 control-label no-padding-right" for="txtEndDt">Date To</label>
                            <div class="col-sm-2"> <span class="colon">:</span>
                                <div class="input-group">
                                    <input class="form-control date-picker" id="txtEndDt" name="txtEndDt" type="text" data-date-format="dd-mm-yyyy" value="<?php echo ($strEndDate!='1000-01-01')?date('d-m-Y',strtotime($strEndDate)):''; ?>">
                                    <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                                <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href = '<?php echo APP_URL; ?>viewReport/<?php echo $glId . '/' . $plId; ?>'"/>
                            </div>       
                    </div>                     
                </div>
                <div class="legandBox">			
                    <span class="greenLegend">&nbsp;</span>Published Report&nbsp;			
                    <span class="yellowLegend">&nbsp;</span> Unpublished Report &nbsp;
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
                                <th>Select Category </th>  
                                <th>Headline </th>
                                <th>Description In English </th>
                               <!--  <th>Description In Odia </th>  -->
                                <th>Report Image</th>   
                                <th>Report File</th>  
                                <th>Publish Date  </th>
                                
                                <th width="30" class="noPrint">Edit</th>
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {
                            if($row['tinPublishStatus']==2)
                                $style	= 'class="greenBorder"';
                            else
                                $style	= 'class="yellowBorder"'; 

                                $descriptionE =!empty($row['vchDescriptionE'])?htmlspecialchars_decode($row['vchDescriptionE'],ENT_QUOTES):'';
                                $descriptionO =!empty($row['vchDescriptionO'])?htmlspecialchars_decode($row['vchDescriptionO'],ENT_QUOTES):'';
                                $shortmsg = $objReport->wardWrap($descriptionE, 100);
                                $ctr++; 
                                ?>
                            <tr <?php echo $style;?>>
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intReportId'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['intReportId'];?>" name="hdnPubStatus<?php echo $row['intReportId'];?>" value="<?php echo $row['tinPublishStatus'];?>"/>
                                    </label>
                                </td>
                                <td><?php echo $ctr; ?></td>
                                 
                                     <td> <?php  echo htmlspecialchars_decode($row['categoryName'],ENT_NOQUOTES);?> </td>
                                      <td> <?php  echo htmlspecialchars_decode($row['vchReportHeadline'],ENT_NOQUOTES);?> </td>
                                      <td> <?php  echo $shortmsg;?> </td>

                            
                                 
                                <td align="center">
                                    <?php if($row['vchReportImage']!='')
                                     { ?>
                                            <a href="<?php echo APP_URL ?>uploadDocuments/Report/<?php echo $row['vchReportImage'];?>" target="_blank" title="Report Photo"><img src="<?php echo APP_URL ?>uploadDocuments/Report/<?php echo $row['vchReportImage'];?>" alt="<?php echo $row['vchReportHeadline']; ?>" width="150" height="80" /></a>
                                      <?php   } else { 

                                                echo "- -";
                                       } ?>
                                   
                                </td>
    
              <td align="center">
                                    <?php if($row['vchReportFile']!='')
                                     {
                                         $ReportFile =pathinfo($row['vchReportFile'], PATHINFO_EXTENSION);
                                         if($Reportfile!='pdf')
                                         {
                                    ?>
                                             <a href="<?php echo APP_URL ?>uploadDocuments/Report/<?php echo $row['vchReportFile'];?>" target="_blank" title="Report Photo"><img src="<?php echo APP_URL;?>img/pdf.png" alt="<?php echo $row['vchReportHeadline']; ?>" width="20" height="20" /></a> 
                                    <?php 
                                         }
                                        else {
                                       ?>
                                           <a href="<?php echo APP_URL;?>uploadDocuments/Report/<?php echo $row['vchReportFile'];?>" target="_blank"><?php if($ReportFile=='pdf'){?><img src="<?php echo APP_URL;?>img/pdf.png" alt="" width="16" height="16" border="0" align="absmiddle"><?php } else{?><img src="<?php echo APP_URL;?>img/pdf.png" alt="" width="20" height="20" border="0" align="absmiddle"><?php }?></a>
   
                                   <?php 
                                         }  
                                    }else echo '&nbsp;';?>
                                </td>





                                <td width="100"><?php
                                    if(strtotime($row['dtmPublishDate'])>0)
                                    echo date("d-M-Y",strtotime($row['dtmPublishDate']));
                                    else echo '&nbsp;';?>
                                </td>
                                
                                <td align="center" valign="middle" class="noPrint" style="<?php echo $editPriv; ?>"><a href="<?php echo APP_URL?>addReport/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intReportId'] ?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>
                            
                            </tr>
                        <?php } ?>
                         </tbody>
                    </table>
                    <input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno; ?>" />
                    <input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno; ?>" />
                    <input name="hdn_IsPaging" id="hdn_IsPaging" type="hidden" value="<?php echo $isPaging; ?>" />
                    <input name="hdn_ids" id="hdn_ids" type="hidden" />
                    <input name="hdn_qs" id="hdn_qs" type="hidden" />
                    <input name="hdn_catid" id="hdn_catid" type="hidden" value="1" />
                <?php } else { ?>
                    <div class="noRecord">No record found</div>
            <?php } ?>
        </div>
            <?php if (mysqli_num_rows($result) > 0) { ?>

                <div class="row noPrint">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="sample-table-2_info">
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a> <?php } ?> 
                            <?php echo $objReport->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                                <?php echo $objReport->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body" id="divContent">

            </div>

        </div>
    </div>
</div>

