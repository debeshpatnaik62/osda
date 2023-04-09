<?php
	/* ================================================
  	File Name         	  : archiveImpLinks.php
  	Description		        : This is used for Archive link.
  	Author Name           : Arpita Rath
  	Date Created		      : 27-03-2017
    Devloped On           : 27-03-2017
    Devloped By           : Arpita Rath
  	Update History		    : <Updated by>		<Updated On>		<Remarks>
  						
  	Style sheet           : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css
  	Javscript Functions   : jquery.min.js, bootstrap.min.js, custom.js, loadcomponent.js
  	includes			        : header.php, navigation.php, util.php, footer.php,archiveImpLinkInner.php

	==================================================*/
     include_once('archiveImpLinksInner.php');
?>

<script language="javascript">
	$(document).ready(function () {
		//loadNavigation('Archieve Important Link');
                
                pageHeader   = "Archive Important Links";
                strFirstLink = "Manage Application";
                strLastLink  = "Important Links";
		
		            deleteMe	= "yes";
                enableMe	= "yes";  
		
		
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
              <?php if ($noAdd != '1') { ?>
             <a href="<?php echo APP_URL?>addImpLinks/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a>
              <?php }?>
               <a href="<?php echo APP_URL?>viewImpLinks/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info ">View</a> 
               <a href="javascript:void(0);" class="btn btn-info active">Archive</a></div>
          <?php include('includes/util.php'); ?>
          <div class="hr hr-solid"></div>
          
           <div class="searchTable">
            <div class="form-group">
              <label class="col-sm-1 control-label no-padding-right" for="txtHeadLineE">Headline</label>
                 <div class="col-sm-3"> <span class="colon">:</span>
                   <input type="text" id="txtHeadLineE" name="txtHeadLineE" maxlength="120" class="form-control" value="<?php echo $strHeadlineE; ?>">
                 </div>
                 <div class="col-sm-2">
                     <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                     <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href = '<?php echo APP_URL; ?>archiveImpLinks/<?php echo $glId . '/' . $plId; ?>' ">
                </div> 
            </div>
          </div>
          
            <div id="viewTable">
                <?php if (mysqli_num_rows($result) > 0) {
                    $ctr = $intRecno; ?>
            	<table class="table table-striped table-bordered table-hover">
                	<thead>
                          <tr>
                            <th width="20" class="noPrint">
                            	<label class="position-relative">
                                <input type="checkbox" class="ace chkAll"><span class="lbl"></span></label>
                             </th>
                            <th width="20">Sl.#</th>
                            <th>Headline</th>                           
                            <th>URL</th>
                            <th>Created On </th>
                           
                          </tr>
                      </thead>
              			<tbody>
                                    <?php while ($row = mysqli_fetch_array($result)) {
                               
                                if($row['tinPublishStatus']==2)
                                        $style	= 'style="background-color:#ecf8e6"';
                                else
                                        $style	= 'style=""'; 
                                $ctr++; 
                                ?>
                          <tr <?php echo $style;?>>
                            <td class="noPrint">
                            	<label class="position-relative">
                      				<input type="checkbox" class="ace chkItem" value="<?php echo $row['intLinkId'];?>"><span class="lbl"></span>                                </label>                            </td>
                            <td><?php echo $ctr; ?></td>
                            <td><?php echo htmlspecialchars_decode($row['vchLinkNameE'],ENT_NOQUOTES); ?></td>
                            
                            <td>
                                
                                <a href="<?php echo htmlspecialchars_decode($row['vchUrl'],ENT_NOQUOTES);?>" target="_blank"><?php echo htmlspecialchars_decode($row['vchUrl'],ENT_NOQUOTES);?></a>
                            </td>                            
                            <td><?php echo date("d-M-Y",strtotime($row['dtmCreatedOn']))?></td>
                            
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
    <?php echo $objLink->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
        <?php echo $objLink->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
         
