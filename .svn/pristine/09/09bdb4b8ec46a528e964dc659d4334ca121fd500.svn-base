<?php
/* ================================================
  File Name         	  : archiveStory.php
  Description		  : This is used for view the archieved success story details.
  Author Name		  : 
  Date Created		  : 
  Developed By		  : T Ketaki Debadarshini
  Developed On		  : 20-Sep-2016
  Update History	  : <Updated by>		<Updated On>		<Remarks>

  Style sheet             :
  Javscript Functions     : 
  includes                : util.php, archiveStoryInner.php

  ================================================== */
require("archiveStoryInner.php");
?>
<script language="javascript">
    $(document).ready(function () {
        loadNavigation('Archive Success Story');
        pageHeader = "Archive Success Story";
        strFirstLink = "Manage Institutions";
        strLastLink = "Success Story";
         $('[data-rel=tooltip]').tooltip(); 
	 <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission==3) { ?>
		 deleteMe	= "yes";
                 <?php }?>
		printMe		= "yes";
                 <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission!=1) { ?>		                
		enableMe	="yes";    
                <?php }?>
                    
            if('<?php echo $outMsg;?>'!='')                
                    viewAlert('<?php echo $outMsg;?>');

            <?php if ($redirectPage != '') { ?>
             $('#alertModal').on('hidden.bs.modal', function () {
                 window.location.href = '<?php echo $redirectPage; ?>';
             });

          <?php } ?>
          //fill the education details
                fillInstitute('<?php echo $intInst; ?>','ddlInst','');
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
            <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission!=2) { ?>
                    <a href="<?php echo APP_URL ?>addStory/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a> 
              <?php }?>
              <a href="<?php echo APP_URL ?>viewStories/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info ">View</a>
              <a href="javascript:void(0);" class="btn btn-info active">Archive</a> 
              <a href="<?php echo APP_URL; ?>share-your-story/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Shared Story</a>
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            
            <div class="searchTable">
              <div class="form-group">

                  <!-- <label class="col-sm-1 control-label no-padding-right" for="ddlDist">District</label>
                       <div class="col-sm-2"> 
                           <span class="colon">:</span>
                           <select class="form-control" name="ddlDist" id="ddlDist" onchange="fillInstitute(0,'ddlInst',this.value);">
                              <option value="0">- All -</option>                                 
                           </select>
                        </div>   --> 
              

                 <label class="col-sm-1 control-label no-padding-right" for="ddlInst"> Institute</label>
                    <div class="col-sm-3">       
                    <span class="colon">:</span>  
                    <select class="form-control" name="ddlInst" id="ddlInst">
                              <option value="0">- All -</option>                                 
                           </select>
                    </div>     

                    <label class="col-sm-1 control-label no-padding-right" for="txtName">  Name</label>
                      <div class="col-sm-3"> 
                      <span class="colon">:</span> 
                          <input type="text" class="form-control" maxlength="80" name="txtName" id="txtName" value="<?php echo $strName; ?>"/>
                      </div>       
                      
                      <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                        <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href = '<?php echo APP_URL; ?>archiveStory/<?php echo $glId . '/' . $plId; ?>' ">
                     </div>                
              </div>
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
                                <th>Name </th>  
                                <th>Name in Odia</th> 
                                <th>Place </th>  
                                <th>Place in Odia</th> 
                                <th>Image</th> 
                                 <th>Institute </th>  
                                <th>Snippet</th> 
                                <th>Created On </th>
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {
                            
                                $ctr++; 
                                ?>
                            <tr>
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intStoryId'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['intStoryId'];?>" name="hdnPubStatus<?php echo $row['intStoryId'];?>" value="<?php echo $row['tinPublishStatus'];?>"/>
                                    </label>
                                </td>
                                <td><?php echo $ctr; ?></td>
                                <td> 
                                 <?php
                                      if($row['vchDescriptionE']!='')
                                      {
                                     ?>
                                        <a href="#myModal<?php echo $row['intStoryId']; ?>" role="button" data-toggle="modal"><?php echo htmlspecialchars_decode($row['vchNameE'],ENT_QUOTES); ?></a>
                                        
                                        <div class="modal fade" id="myModal<?php echo $row['intStoryId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                  <h4 class="modal-title" id="myModalLabel">Description</h4>
                                                </div>
                                                  <div class="modal-body" id="divContent">
                                                    <?php echo htmlspecialchars_decode($row['vchDescriptionE'],ENT_QUOTES);?>
                                                   <?php
                                                     if($row['vchDescriptionO']!='')
                                                     {
                                                   ?>
                                                      <h5 class="modal-title" id="myModalLabel"><b>Description in Odia </b></h5> 
                                                      <span class="odia"> <?php echo urldecode($row['vchDescriptionO']);?> </span>
                                                    <?php
                                                     }
                                                    ?>
                                                 </div>

                                              </div>
                                            </div>
                                          </div>
                                        <?php }else{ ?>
                                        <?php echo htmlspecialchars_decode($row['vchNameE'],ENT_QUOTES); ?>
                                        <?php } ?>
                                
                                </td>                              
                                
                                <td class="odia"> <?php  echo $row['vchNameO'];?> </td>  
                                <td> <?php echo htmlspecialchars_decode($row['vchPlace'],ENT_QUOTES); ?> </td> 
                                <td class="odia"> <?php echo $row['vchPlaceO'];?> </td> 
                                <td align="center" width="120">
                                    <?php if($row['vchImageFile']!=''){ ?>
                                    <a href="<?php echo APP_URL ?>uploadDocuments/successStory/<?php echo $row['vchImageFile'];?>" target="_blank" title="Success Story"><img src="<?php echo APP_URL ?>uploadDocuments/successStory/<?php echo $row['vchImageFile'];?>" alt="<?php echo $row['vchNameE']; ?>" width="98" height="80" /></a>
                                    <?php }else echo '';?>
                                </td>
                                <td> <?php echo htmlspecialchars_decode($row['vchInstituteName'],ENT_QUOTES); ?> </td> 
                                 <td> 
                                    <?php 
                                        $strMessage         = htmlspecialchars_decode($row['vchSnippet'],ENT_QUOTES);
                                        $shortmsg           = $objStory->wardWrap($strMessage, 100);   
                                        echo $shortmsg ;
                                    ?> 
                                 </td>  
                                
                                <td><?php echo date("d-M-Y",strtotime($row['stmCreatedOn']))?></td>
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
