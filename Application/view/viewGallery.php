<?php
    /* ================================================
    File Name         	  : viewGallery.php
    Description		  : This is used for view Gallery details.
    Author Name           : T Ketaki Debadarshini
    Date Created          : 19-Feb-2016
    Devloped On           : 19-Feb-2016
    Devloped By           : T Ketaki Debadarshini
    Update History	  : <Updated by>		<Updated On>		<Remarks>
     
    Style sheet           : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css
    Javscript Functions   : jquery.min.js, bootstrap.min.js, custom.js, loadcomponent.js
    includes		  : header.php, navigation.php, util.php, footer.php,viewGalleryInner.php

    ==================================================*/
    require 'viewGalleryInner.php';
?>
<script language="javascript">
	$(document).ready(function () {
		//loadNavigation('View Photo Gallery');
                pageHeader      = "View Media Gallery";
                strFirstLink    = "Manage Application";
                strLastLink     = "Media Gallery";
                fillCategory('<?php echo $intCategory; ?>','selCategory','0');
                  <?php  //if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission==3) { ?>
		archiveMe	= "yes";
                 <?php //}?>
                 
		printMe		= "yes";
                 <?php  //if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission!=1) { ?>		                
		publishMe       = "yes";

                unpublishMe     = "yes";
                showHome        = "yes"
                hideHome        = "yes"
                <?php //}?>
		
		
                if('<?php echo $outMsg;?>'!='')                
                    viewAlert('<?php echo $outMsg;?>');


                    <?php if ($redirectPage != '') { ?>
                     $('#alertModal').on('hidden.bs.modal', function () {
                         window.location.href = '<?php echo $redirectPage; ?>';
                     });

                  <?php } ?>
                   
                 $('.showModal').click(function(){
			$('#myModal1').modal();			
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
                <?php if ($noAdd != '1'){ ?>
                    <a href="<?php echo APP_URL?>addGallery/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a>
                <?php }?>
                <a href="javascript:void(0);" class="btn btn-info active">View</a> 
                <a href="<?php echo APP_URL;?>archieveGallery/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Archive</a></div>

                 <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
               <div class="searchTable">
                    <div class="form-group">
                      
                         <label class="col-sm-1 control-label no-padding-right" for="selCategory">Category</label>
                        <div class="col-sm-3"> 
                            <span class="colon">:</span>
                            <select class="form-control" name="selCategory" id="selCategory">
                                <option value="0">- All -</option>  
                                
                            </select>
                         </div>
                         <label class="col-sm-1 control-label no-padding-right" for="selType">Type</label>
                        <div class="col-sm-3"> 
                            <span class="colon">:</span>
                            <select class="form-control" name="selType" id="selType" >
                                <option value="0" <?php if($intCattype==0) echo 'selected="selected"'; ?>>- All -</option>
                                <option value="2" <?php if($intCattype==2) echo 'selected="selected"'; ?>>Photo</option>
                                <option value="3" <?php if($intCattype==3) echo 'selected="selected"'; ?>>Video</option>
                            </select>
                         </div>
                        <div class="col-sm-2">
                            <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                            <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href = '<?php echo APP_URL; ?>viewGallery/<?php echo $glId . '/' . $plId; ?>' ">
                        </div>
                    </div>
                </div>
                <div class="legandBox">			
                    <span class="greenLegend">&nbsp;</span>Published Media(s)&nbsp;			
                    <span class="yellowLegend">&nbsp;</span> Unpublished Media(s) &nbsp;
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
                                <th>Caption in English</th>   
                                <th>Caption in Odia </th>
                                <th>Type</th>
                                <th width="100">Photos</th>
                                <th width="100">Video</th>
                                
                                <th width="100">Category</th>
                                 <th>Show at Home </th>
                                <th>Created On </th>
                                <th width="30" class="noPrint" style="<?php echo $editPriv; ?>">Edit</th>
                            </tr>
                        </thead>
              		<tbody>
                        <?php                             
                        while ($row = mysqli_fetch_array($result)) {
                            if($row['INT_PUBLISH_STATUS']==2)
                                $style	= 'class="greenBorder"';
                            else
                                $style	= 'class="yellowBorder"'; 
                                $ctr++; 
                                ?>
                            <tr <?php echo $style;?>>
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['INT_GALLERY_ID'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['INT_GALLERY_ID'];?>" name="hdnPubStatus<?php echo $row['INT_GALLERY_ID'];?>" value="<?php echo $row['INT_PUBLISH_STATUS'];?>"/>
                                    </label>
                                </td>
                                <td><?php echo $ctr;?></td>
                                <td> <?php if($row['VCH_DESCRIPTION_E']!=''){?>
                                    <a href="javascript:void(0);" title="Gallery Details" class="showModal" onclick="getGalleryDetails('<?php echo $row['INT_GALLERY_ID'];?>',1)"><?php echo htmlspecialchars_decode($row['VCH_HEADLINE_E'],ENT_QUOTES);?></a>
                                    <?php }else{  echo htmlspecialchars_decode($row['VCH_HEADLINE_E'],ENT_QUOTES);}?>
                                </td>  
                                <td class="odia"> <?php if($row['VCH_HEADLINE_O']!=''){?>
                                    <a href="javascript:void(0);" title="Gallery Details" class="showModal" onclick="getGalleryDetails('<?php echo $row['INT_GALLERY_ID'];?>',2)"><?php echo htmlspecialchars_decode($row['VCH_HEADLINE_O'],ENT_QUOTES);?></a>
                                    <?php }else{  echo htmlspecialchars_decode($row['VCH_HEADLINE_O'],ENT_QUOTES);}?>
                                </td>  
                                <td>
                                    <?php
                                    if ($row['INT_TYPE_ID'] == 1)
                                         echo 'Audio';
                                    if ($row['INT_TYPE_ID'] == 2)
                                        echo 'Photo';
                                    if ($row['INT_TYPE_ID'] == 3)
                                         echo 'Video';                                  
                                    ?>
                                </td>
                               
                                <td align="center" width="200">
                                    <?php if($row['VCH_LARGE_IMAGE']!='' && $row['INT_TYPE_ID'] == 2){ ?>
                                    <a href="<?php echo APP_URL ?>uploadDocuments/gallery/<?php echo $row['VCH_LARGE_IMAGE']; ?>" target="_blank" title="Gallery Photo"><img src="<?php echo APP_URL ?>uploadDocuments/gallery/<?php echo $row['VCH_LARGE_IMAGE']; ?>" alt="<?php echo $row['VCH_HEADLINE_E']; ?>" width="150" height="80" /></a>
                                    <?php }else echo '&nbsp;';?>
                                </td>
                                <td>
                                 <?php if ($row['INT_VIDEO_LINK_TYPE'] == 1) { ?>
                                        <a href="<?php echo APP_URL; ?>uploadDocuments/Video/VideoFile/<?php echo $row['VCH_THUMB_IMAGE']; ?>" target="_blank">
                                            <img src="<?php echo APP_URL; ?>uploadDocuments/gallery/<?php echo $row['VCH_LARGE_IMAGE']; ?>" alt="" width="100" height="77">
                                        </a>
                                 <?php } else if ($row['INT_VIDEO_LINK_TYPE'] == 2) { ?>
                                    <a href="<?php echo $row['VCH_URL']; ?>" target="_blank">
                                        <img src="<?php echo APP_URL; ?>uploadDocuments/gallery/<?php echo $row['VCH_LARGE_IMAGE']; ?>" alt="" width="100" height="77">
                                    </a>
                                <?php } ?>
                                    
                                </td>
                                
                                <td><?php echo $objGallery->getName('VCH_CATEGORY_NAME', 't_gallery_category', 'INT_CATEGORY_ID', $row['INT_CATEGORY_ID'], 'BIT_DELETED_FLAG'); ?></td>
                                <td align="center" width="70" >
                                    <?php 
                                    if($row['INT_SHOW_HOME']==1){?>
                                    <i class="icon-ok" title="Show on Home page"></i>		
                                    <?php } else echo '';
                                    ?>
                                </td>
                                <td><?php echo date("d-M-Y", strtotime($row['DTM_CREATED_ON'])); ?></td>
                                <td align="center" valign="middle" class="noPrint" style="<?php echo $editPriv; ?>"><a href="<?php echo APP_URL; ?>addGallery/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['INT_GALLERY_ID'] ?>"  data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>
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
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a> <?php } ?> 
                                <?php echo $objGallery->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                                <?php echo $objGallery->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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