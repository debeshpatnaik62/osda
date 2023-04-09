<?php
  /* ================================================
  File Name               : viewTimelineInner.php
  Description             : This is used for view the Timeline details.
  Author Name             : 
  Date Created            : 
  Designed On             :
  Devloped By         : Ashis kumar Patra
  Devloped On         : 04-12-2018
  Update History          : <Updated by>        <Updated On>        <Remarks>

  Style sheet             : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css
  Javscript Functions     : jquery.min.js, bootstrap.min.js, custom.js, loadcomponent.js,loadAjax.js
  includes                : header.php, navigation.php, util.php, footer.php,viewNewsLetterInner.php

  ================================================== */
require("viewTimelineInner.php");
?>
<script src="<?php echo APP_URL; ?>js/loadAjax.js"></script>
<script src="<?php echo APP_URL; ?>js/modal.js"></script>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script language="javascript">
  $(document).ready(function () {
        //loadNavigation('News');
        pageHeader = "View Journey So Far";
        strFirstLink = "Manage Application";
        strLastLink = "Journey So Far";
        $('[data-rel=tooltip]').tooltip();
        deleteMe = "<?php echo $deletePriv; ?>";
        printMe = "yes";
        publishMe = "<?php echo $noPublish; ?>";
        unpublishMe = "<?php echo $noPublish; ?>";
       
<?php //}   ?>
        if ('<?php echo $outMsg; ?>' != '')
            viewAlert('<?php echo $outMsg; ?>');
        $('.showModal').click(function () {
            $('#myModal1').modal();
        });
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
            <div class="top_tab_container">
                <?php if ($noAdd != '1') { ?>
                    <a href="<?php echo APP_URL ?>addTimeline/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a> 
                <?php } ?>
                <a href="javascript:void(0);" class="btn btn-info active">View</a> 
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="searchTable">
                    <div class="form-group"> 
                       
                          <label class="col-sm-1 control-label no-padding-right" for="txtStartDt">Date From</label>
                            <div class="col-sm-3"> <span class="colon">:</span>
                                <div class="input-group">
                                    <input class="form-control date-picker" id="txtStartDt" name="txtStartDt" type="text" data-date-format="dd-mm-yyyy" value="<?php echo ($strStartDt!='')?date('d-m-Y',strtotime($strStartDt)):''; ?>">
                                    <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 
                                </div>
                            </div>

                            <label class="col-sm-1 control-label no-padding-right" for="txtEndDt">Date To</label>
                            <div class="col-sm-3"> <span class="colon">:</span>
                                <div class="input-group">
                                    <input class="form-control date-picker" id="txtEndDt" name="txtEndDt" type="text" data-date-format="dd-mm-yyyy" value="<?php echo ($strEndDate!='')?date('d-m-Y',strtotime($strEndDate)):''; ?>">
                                    <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                                <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href = '<?php echo APP_URL; ?>viewTimeline/<?php echo $glId . '/' . $plId; ?>'"/>
                            </div>       
                    </div>                     
                </div>
      
            <div class="legandBox">     
                <span class="greenLegend">&nbsp;</span>Published &nbsp;     
                <span class="yellowLegend">&nbsp;</span> Unpublished &nbsp;
            </div>
            <div id="viewTable">
                   <?php
                if ($result->num_rows > 0) {
                    $ctr = $intRecno;
                    ?>
              <table class="table  table-bordered ">
                        <thead>
                            <tr>
                                <th width="20" class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkAll"><span class="lbl"></span></label>
                                </th>
                                <th width="20">Sl.#</th>
                                <th>Image</th>
                                <th>Description</th>
                                 <th>Description Odia</th>
                                 <th>Publish Date</th>
                                <th width="30" class="noPrint" style="<?php echo $editPriv; ?>">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
             
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                //print_r($row);
                                if ($row['INT_PUBLISH_STATUS'] == 2)
                                    $style = 'class="greenBorder"';
                                else
                                    $style = 'class="yellowBorder"';
                                $ctr++;

                                $adminName = $row["ADMIN_NAME"];
                                $portalUserName = $row["PORTAL_USER_NAME"];
                                $createdType = $row["INT_CREATED_BY_PORTAL"];

                                if ($createdType == 0) {
                                    $createdBy = $adminName;
                               } 
                               else {
                                    $createdBy = $portalUserName;
                                }
                                ?>
                                <tr <?php echo $style; ?>>
                                    <td class="noPrint">
                                        <label class="position-relative">
                                            <input type="checkbox" class="ace chkItem" value="<?php echo $row['INT_TIMELINE_ID']; ?>"><span class="lbl"></span>
                                            <input type="hidden" id="hdnPubStatus<?php echo $row['INT_TIMELINE_ID']; ?>" name="hdnPubStatus<?php echo $row['INT_TIMELINE_ID']; ?>" value="<?php echo $row['INT_TIMELINE_ID']; ?>"/>
                                        </label>
                                    </td>
                                    <td><?php echo $ctr; ?></td>
                               
                                     <td align="center" width="">
                                        <?php if ( $row['VCH_IMAGE'] != '' && file_exists("uploadDocuments/Timeline/" . $row['VCH_IMAGE'])) {
                                      ?>
                                        <img src="<?php echo APP_URL; ?>uploadDocuments/Timeline/<?php echo $row['VCH_IMAGE']; ?>" alt=""  border="0" align="absmiddle" style="width:100px; height:80px;">
                              <?php } ?>
                                    </td>

<!-- 

                                      <td> <?php if($row['VCH_DESCRIPTION']!=''){?>
                                    <a href="javascript:void(0);" title="Blog Details" class="showModal" onclick="getBlockDetails('<?php echo $row['INT_TIMELINE_ID'];?>',1)"><?php echo $objTimeline->wardWrap(htmlspecialchars_decode($row["VCH_DESCRIPTION"],ENT_QUOTES),150);?></a>
                                    <?php }else{  echo $objTimeline->wardWrap(htmlspecialchars_decode($row["VCH_DESCRIPTION"],ENT_QUOTES),150);}?>
                                </td>  --> 




                                 <td> 
                                    
                                    <?php if ($row['VCH_DESCRIPTION'] != '') { ?>
                                            <a href="#myModal<?php echo $row['INT_TIMELINE_ID']; ?>" role="button" data-toggle="modal">
                                            <?php $strMessage =  htmlspecialchars_decode($row['VCH_DESCRIPTION'], ENT_QUOTES); 
                                              echo $shortmsg = $objTimeline->wardWrap($strMessage, 100);
                                            ?></a>

                                            <div class="modal fade" id="myModal<?php echo $row['INT_TIMELINE_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                             <button type="button" class="close noPrint" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        </div>
                                                        <div class="modal-body noPrint" id="divContent">
                                                     <?php echo htmlspecialchars_decode($row['VCH_DESCRIPTION'], ENT_QUOTES); ?>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <?php echo htmlspecialchars_decode($row['VCH_DESCRIPTION'], ENT_NOQUOTES); ?>
                                      <?php } ?>   
                                 </td> 




<!-- 
                                <td class="odia"> <?php if($row['VCH_DESCRIPTION_O']!=''){?>
                                    <a href="javascript:void(0);" title="Blog Details" class="showModal" onclick="getNewsDetails('<?php echo $row['INT_TIMELINE_ID'];?>',2)"><?php echo $objTimeline->wardWrap(htmlspecialchars_decode($row["VCH_DESCRIPTION_O"],ENT_QUOTES),150);?></a>
                                    <?php }else{  echo $objTimeline->wardWrap(htmlspecialchars_decode($row["VCH_DESCRIPTION_O"],ENT_QUOTES),150);}?>
                                </td>   
 -->



                                
                                 <td> 
                                    
                                    <?php if ($row['VCH_DESCRIPTION_O'] != '') { ?>
                                            <a href="#myModal<?php echo $row['INT_TIMELINE_ID']; ?>" role="button" data-toggle="modal">
                                            <?php $strMessage =  htmlspecialchars_decode($row['VCH_DESCRIPTION_O'], ENT_QUOTES); 
                                              echo $shortmsg = $objTimeline->wardWrap($strMessage, 100);
                                            ?></a>

                                            <div class="modal fade" id="myModal<?php echo $row['INT_TIMELINE_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                             <button type="button" class="close noPrint" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        </div>
                                                        <div class="modal-body noPrint" id="divContent">
                                                     <?php echo htmlspecialchars_decode($row['VCH_DESCRIPTION_O'], ENT_QUOTES); ?>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <?php echo htmlspecialchars_decode($row['VCH_DESCRIPTION_O'], ENT_NOQUOTES); ?>
                                      <?php } ?>   
                                 </td> 

                                     
                                       <td><?php echo $row['DTM_PUBLISHDATE']; ?></td>
                            
                                    <td align="center" valign="middle" class="noPrint" style="<?php echo $editPriv; ?>"><a href="<?php echo APP_URL ?>addTimeline/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['INT_TIMELINE_ID'] ?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>
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
            <?php if ($result->num_rows > 0) { ?>
                <div class="row noPrint">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="sample-table-2_info">
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a>/ <?php } ?> 
                            <?php echo $objTimeline ->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                                    <?php echo $objTimeline ->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="modal fade" id="commentsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="commentsModalLabel">Comments/Replies</h4>
            </div>
            <div class="alert alert-success" id="NewsSuccDiv" style="display:none;">
                <strong>Success!</strong> Data updated successfully.
            </div>
            <div class="alert alert-danger" id="NewsErrDiv" style="display:none;">
                <strong>Error!</strong> Error in operation, please try again.
            </div>
            <div style="text-align:right;">
                <a style="margin:10px;display: none;" class="btn btn-sm" id="NewsBack" href="javascript:void(0)" onclick="$('#commentsDivContent').show();$('#commentsReplyDivContent').hide();$(this).hide();">
                    <i class="icon-white icon-arrow-left"></i>
                </a>
            </div>
            <div class="modal-body" id="commentsDivContent"></div>
            <div class="modal-body" id="commentsReplyDivContent"></div>
        </div>
    </div>
</div>