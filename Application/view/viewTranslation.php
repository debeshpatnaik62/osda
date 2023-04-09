<?php
/* ================================================
  File Name           : viewTranslation.php
  Description         : This is used for view the Area details.
  Author Name         :
  Date Created        :
  Devloped By         : Samir Kumar
  Devloped On         : 23-04-2018
  Update History      : <Updated by>        <Updated On>        <Remarks>

  Style sheet           : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css
  Javscript Functions   : loadAjax.js
  includes              : header.php, navigation.php, util.php, footer.php,viewAreaInner.php

  ================================================== */
include_once("viewTranslationInner.php");
?>
<script src="<?php echo APP_URL; ?>js/loadAjax.js"></script>
<script src="<?php echo APP_URL; ?>js/modal.js"></script>
<script language="javascript">
    $(document).ready(function () {
        // loadNavigation('View Banner');
        pageHeader = "View Area";
        strFirstLink = "Manage Application";
        strMiddleLink = "Translation API";
        strLastLink = "View Translation Statistics";

        $('[data-rel=tooltip]').tooltip();
        deleteMe="yes";
        printMe = "yes";
        if ('<?php echo $outMsg; ?>' != '')
            viewAlert('<?php echo $outMsg; ?>');
    });
</script>

<div id="page-content">
    <div class="tab-base">
       
        <?php include('includes/util.php'); ?>
        <ul class="nav nav-tabs">
            <li><a href="<?php echo APP_URL; ?>registerPage/<?php echo $glId; ?>/<?php echo $plId; ?>" class="">Register Page</a></li>
            <li class="active"><a href="<?php echo APP_URL; ?>viewTranslation/<?php echo $glId; ?>/<?php echo $plId; ?>" class="">Progress</a></li>
        </ul>

        <!-- Tabs Content -->
        <div class="tab-content">
            <div class="tab-pane pad-btm fade active in" id="demo-bsc-tab-1">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="srvc_hdr_nav pull-right"></div>
                        <div class="clearfix"></div>
                        <div class="top_tab_container"></div>
                        <?php
                        if ($searchResult == 1) {
                            $display = 'style="display: block;"';
                        } else {
                            $display = 'style="display: none;"';
                        }
                        ?>  

                        <div class="search-sec" <?php echo $display; ?>>
                            <div class="form-group">

                                <label class="col-sm-1 control-label no-padding-right" for="txtCatName">Website Url</label>
                                <div class="col-sm-3"> 
                                    <span class="colon">:</span>
                                    <input type="text" class="form-control txtCatName" id="txtCatName" name="txtCatName" maxlength="25" value="<?php echo $txtcatName; ?>"/></td>
                                </div>
                                <div class="col-sm-2">
                                    <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                                </div>
                            </div>
                        </div>  
                        <center><a class="searchopen" title="" data-toggle="tooltip" data-original-title="Click me"><i class="fa fa-angle-up"></i> </a></center>
                        <!--                        <div class="legandBox pull-right">         
                                                    <span class="legends bg-success"></span>Published &nbsp;         
                                                    <span class="legends bg-danger"></span> Unpublished &nbsp;
                                                </div>-->
					
                        <div class="clearfix"></div>
<h4 class="text-main ">View Translation Statistics</h4>
                        <div id="viewTable" class="table-responsive">
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                $ctr = $intRecno;
                                ?>
                                <table class="table  table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="20" class="noPrint">
                                               <label class="position-relative">
                                               <input type="checkbox" class="ace chkAll"><span class="lbl"></span></label>
                                           </th>
                                            <th width="20">Sl.#</th>
                                            <th>Web Page URL</th>
                                            <th>Web Page Name</th>                              
                                            <th>Hindi Status</th>
                                            <th>Odia Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($result)) {
                                            $ctr++;
                                            ?>
                                            <tr <?php echo $style; ?>>
                                                 <td class="noPrint">
                                                    <label class="position-relative">
                                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intId'];?>"><span class="lbl"></span>
                                                    </label>
                                                </td>
                                                <td><?php echo $ctr; ?></td>
                                                <td> <a href="<?php echo htmlspecialchars_decode($row['vchWebpage'], ENT_NOQUOTES); ?>" target="_blank"><?php echo htmlspecialchars_decode($row['vchWebpage'], ENT_NOQUOTES); ?></a></td> 
                                                <td> <?php echo htmlspecialchars_decode($row['vchPagename'], ENT_NOQUOTES); ?> </td> 
                                                <td><?php echo round($row['hindiCnt']); ?>%</td>
                                                <td><?php echo round($row['odiaCnt']); ?>%</td>
                                                <td>
													<a href="<?php echo APP_URL; ?>addTranslateManual/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intId'];?>" title="Add Words" class="btn btn-sm btn-info"><i class="fa fa-plus"></i></a>
													<a href="<?php echo APP_URL; ?>addTranslate/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intId'];?>" title="Translation Editor" class="btn btn-sm btn-info"><i class="fa fa-exchange"></i></a> 
													<a href="javascript:void(0);" title="Delete Page Data" onclick="return deletePagedata(<?php echo $row['intId'];?>,<?php echo $ctr;?>);" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
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
                            <?php } else { ?>
                                <div class="noRecord">No record found</div>
                            <?php } ?>
                        </div>
                        <?php if (mysqli_num_rows($result) > 0) { ?>
                            <div class="row noPrint">
                                <div class="col-xs-6">
                                    <div class="dataTables_info" id="sample-table-2_info">
                                        <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a>/ <?php } ?> 
                                        <?php echo $obj->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                                    </div>
                                </div>
                                <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                                    <div class="col-xs-6">
                                        <div class="dataTables_paginate paging_bootstrap">
                                            <ul class="pagination">
                                                <?php echo $obj->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
        </div>
    </div>
</div>
