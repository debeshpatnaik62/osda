<?php
/* ================================================
  File Name         	  : viewPage.php
  Description		  : This is used for view the Page details.
  Author Name		  : T Ketaki Debadarshini
  Date Created		  : 29-Aug-2015
  Update History		  : <Updated by>		<Updated On>		<Remarks>

  Style sheet           : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css
  Javscript Functions   : jquery.min.js, bootstrap.min.js, custom.js, loadcomponent.js,loadAjax.js
  includes              : header.php, navigation.php, util.php, footer.php,viewPageInner.php

  ================================================== */
require("viewPageInner.php");
?>

<script src="<?php echo APP_URL; ?>js/loadAjax.js"></script>
<script src="<?php echo APP_URL; ?>js/modal.js"></script>
<script language="javascript">
    $(document).ready(function () {
        
            pageHeader   = "View Page";
            strFirstLink = "Manage Link";
            strLastLink  = "Pages";        
        
    <?php  //if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission==3) { ?>
            archiveMe	= "yes";
          
             <?php //}?>
            printMe		= "yes";
             <?php  //if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission!=1) { ?>		                
            publishMe       = "yes"
            unpublishMe     = "yes"	
            <?php //}?>       
         $('.showModal').click(function () {
            $('#myModal').modal();
        });
        
        
        if('<?php echo $outMsg;?>'!='')                
	   viewAlert('<?php echo $outMsg;?>');
           
           
           <?php if ($redirectPage != '') { ?>
            $('#alertModal').on('hidden.bs.modal', function () {
                window.location.href = '<?php echo $redirectPage; ?>';
            });

            <?php } ?>
                
         $('[data-rel=tooltip]').tooltip();  
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
                    <a href="<?php echo APP_URL ?>addPage/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a> 
              <?php }?>                
                <a href="javascript:void(0);" class="btn btn-info active">View</a>
                <a href="<?php echo APP_URL ?>archievePage/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Archive</a>
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="searchTable">
                <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtHeadLineE">Page Name</label>
                  <div class="col-sm-4"> <span class="colon">:</span>
                      <input type="text" id="txtHeadLineE" name="txtHeadLineE" class="form-control" value="<?php echo $strHeadlineE; ?>">
                  </div>			  
                    <div class="col-sm-2">
                          <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                          <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewPage/<?php echo $glId . '/' . $plId; ?>' ">
                    </div>
                </div>
            </div>
            <div class="legandBox">			
                <span class="greenLegend">&nbsp;</span>Published Pages&nbsp;			
                <span class="yellowLegend">&nbsp;</span> Unpublished Pages &nbsp;
            </div>
            <div id="viewTable">
                <?php if (mysqli_num_rows($result) > 0) {
                    $ctr = $intRecno; ?>
                    <table class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="20" class="noPrint" style="<?php echo $editPriv; ?>">
                                    <label class="position-relative">
                                         <input type="checkbox" class="ace chkAll"><span class="lbl"></span></label></th>
                                <th width="20">Sl.#</th>
                                <th>Page Name</th>                                
                                <th>Page Name in Odia</th>  
                                <th>Page Alias</th>     
                                <th>Meta Image</th>
                                <th>Featured Image </th>                       
                                <th>Link Type </th>                                
                                <th>URL </th>
                                <th>Windows Status</th>
                                <th>Created on</th>
                                <th width="30" class="noPrint" style="<?php echo $editPriv; ?>"> Edit </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($result)) {
                               
                                if($row['intPublishStatus']==2)
                                  $style	= 'class="greenBorder"';
                                else
                                   $style	= 'class="yellowBorder"'; 
                                $ctr++; 
                                ?>
                                <tr <?php echo $style;?>>
                                    <td class="noPrint" style="<?php echo $editPriv; ?>">
                                        <label class="position-relative">
                                            <input type="checkbox" class="ace chkItem" value="<?php echo $row['intPageId'];?>"><span class="lbl"></span></label></td>
                                    <td><?php echo $ctr; ?></td>
                                    <td>
                                    <?php
                                     if($row['TOTAL'] > 0)
                                      {
                                     ?>
                                        <a href="javascript:void(0);" class="showModal" onclick="getPageContent('<?php echo $row['intPageId'] ?>',1,'<?php echo htmlspecialchars_decode($row['vchTitle'],ENT_QUOTES); ?>');">
                                            <?php echo htmlspecialchars_decode($row['vchTitle'],ENT_QUOTES); ?>
                                        </a>
                                        
                                    <?php }else{ ?>
                                    <?php echo htmlspecialchars_decode($row['vchTitle'],ENT_QUOTES); ?>
                                    <?php } ?>
                                    </td> 
                                    
                                    <td class="odia">
                                     
                                     <?php
                                      if($row['TOTALO'] > 0)
                                      {
                                     ?>
                                        
                                         <a href="javascript:void(0);" class="showModal" onclick="getPageContent('<?php echo $row['intPageId'] ?>',2,'<?php echo $row['vchTitleH']; ?>');">
                                            <?php echo $row['vchTitleH']; ?>
                                        </a>
                                       
                                        <?php }else{ ?>
                                        <?php echo $row['vchTitleH']; ?>
                                        <?php } ?>
                                    </td>
                                     <td><?php echo $row['vchPageAlias']; ?></td>
                                    <td><?php if($row['vchMetaImage']!=''){ ?>
                                <img src="<?php echo APP_URL;?>uploadDocuments/banner/<?php echo $row['vchMetaImage'];?>" alt="<?php echo $row['vchTitle'];?>" width="100" height="80" />
                                <?php }else echo '&nbsp;';?></td>
                                    <td><?php if($row['vchFeaturedImage']!=''){ ?>
                                <img src="<?php echo APP_URL;?>uploadDocuments/featuredImage/<?php echo $row['vchFeaturedImage'];?>" alt="<?php echo $row['vchTitle'];?>" width="100" height="80" />
                                <?php }else echo '&nbsp;';?></td>
                                                                       
                                    <td><?php 
                                    $linkType = $row['intLinkType'];
                                    if($linkType==1)
                                        echo 'Internal';
                                     else 
                                        echo 'External';
                                    ?></td>
                                    
                                    <td><?php echo ($linkType==2)? $row['vchURL']:''; ?></td>
                                    <td>
                                        <?php  echo ($row['intWindowStatus']=='1' )?'Same':'New'; ?>
                                    </td> 
<!--                                     <td><?php //echo ($row['vchPluginName']!='0' )? $row['vchPluginName']:''; ?></td>-->
                                     
                                    <td><?php echo date("d-M-Y",strtotime($row['dtmCreatedOn']))?></td>
                                    <td align="center" valign="middle" class="noPrint" style="<?php echo $editPriv; ?>"><a href="<?php echo APP_URL ?>addPage/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intPageId'];?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>
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
                 <?php echo $objPages->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
            <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
            <?php echo $objPages->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Page Contents</h4>
            </div>
            <div class="modal-body" id="divContent">
               
            </div>

        </div>
    </div>
</div>
