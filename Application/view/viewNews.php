<?php
    /* ================================================
    File Name         	  : viewNews.php
    Description		  : This is used for view News.
    Devloped On           : 23-April-2016
    Devloped By           : T Ketaki Debadarshini 
    Update History	  : <Updated by>		<Updated On>		<Remarks>

    Style sheet           : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css
    Javscript Functions   : jquery.min.js, bootstrap.min.js, custom.js, loadcomponent.js
    includes		  : header.php, navigation.php, util.php, footer.php,viewNewsInner.php

    ==================================================*/
    require 'viewNewsInner.php';
?>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script language="javascript">
	$(document).ready(function () {
		loadNavigation('View News');
                 strFirstLink = "Manage Application";
                strLastLink = "News";
          
		archiveMe	= "yes";
		printMe		= "yes";
             deleteMe = "yes";   
		publishMe       = "yes";
                unpublishMe     = "yes";
               // showHome        = "yes"
              //  hideHome        = "yes"
               
		
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
                // fillNewsCategory('<?php //echo $newsCat;?>','selCategory');
	});
     getNewsCategory('selNewsType','<?php echo $newsCat;?>');     
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
                    <a href="<?php echo APP_URL?>addNews/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a>
                <?php }?>
                <a href="javascript:void(0);" class="btn btn-info active">View</a> 
                <a href="<?php echo APP_URL;?>archieveNews/<?php echo $glId;?>/<?php echo $plId; ?>" class="btn btn-info">Archive</a></div>

                    <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                <div class="searchTable">
                    <div class="form-group"> 
                        <label class="col-sm-1 control-label no-padding-right" for="txtHeadLineE">Headline</label>
                        <div class="col-sm-3"> <span class="colon">:</span>
                            <input type="text" id="txtHeadLineE" maxlength="250" name="txtHeadLineE" class="form-control" value="<?php echo $strHeadlineE; ?>">
                        </div>
                      
                     
                    <label class="col-sm-1 control-label no-padding-right" for="selNewsType">News Type</label>
                    <div class="col-sm-3">
                        <span class="colon">:</span>
                        <select class="form-control" name="selNewsType" id="selNewsType" onChange="ShowHideLnkTyp(this.value);">
                            <option value="0">- Select -</option>
                        </select>            
                    </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group"> 
                          <label class="col-sm-1 control-label no-padding-right" for="txtStartDt">Date From</label>
                            <div class="col-sm-3"> <span class="colon">:</span>
                                <div class="input-group">
                                    <input class="form-control date-picker" id="txtStartDt" name="txtStartDt" type="text" data-date-format="dd-mm-yyyy" value="<?php echo ($strStartDt!='0000-00-00')?date('d-m-Y',strtotime($strStartDt)):''; ?>">
                                    <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 
                                </div>
                            </div>

                            <label class="col-sm-1 control-label no-padding-right" for="txtEndDt">Date To</label>
                            <div class="col-sm-3"> <span class="colon">:</span>
                                <div class="input-group">
                                    <input class="form-control date-picker" id="txtEndDt" name="txtEndDt" type="text" data-date-format="dd-mm-yyyy" value="<?php echo ($strEndDate!='0000-00-00')?date('d-m-Y',strtotime($strEndDate)):''; ?>">
                                    <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                                <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href = '<?php echo APP_URL; ?>viewNews/<?php echo $glId . '/' . $plId; ?>'"/>
                            </div>       
                    </div>                     
                </div>
                <div class="legandBox">			
                    <span class="greenLegend">&nbsp;</span>Published News&nbsp;			
                    <span class="yellowLegend">&nbsp;</span> Unpublished News &nbsp;
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
                               
                                <th>Headline </th>  
                                <th>Headline in Odia</th> 
                                <th>News Type</th>
                                <th>News Photo/Document</th>   
                                <th>Source</th>  
                                <th>News Date </th>
<!--                                <th>Show at Home </th>-->
                                
                                <th width="30" class="noPrint">Edit</th>
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {
                            if($row['tinPublishStatus']==2)
                                $style	= 'class="greenBorder"';
                            else
                                $style	= 'class="yellowBorder"'; 
                                $ctr++; 
                                ?>
                            <tr <?php echo $style;?>>
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intNewsId'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['intNewsId'];?>" name="hdnPubStatus<?php echo $row['intNewsId'];?>" value="<?php echo $row['tinPublishStatus'];?>"/>
                                    </label>
                                </td>
                                <td><?php echo $ctr; ?></td>
                                <td> <?php if($row['vchDescriptionE']!=''){?>
                                    <a href="javascript:void(0);" title="News Details" class="showModal" onclick="getNewsDetails('<?php echo $row['intNewsId'];?>',1)"><?php echo htmlspecialchars_decode($row['vchHeadLineE'],ENT_NOQUOTES);?></a>
                                    <?php }else{  echo htmlspecialchars_decode($row['vchHeadLineE'],ENT_NOQUOTES);}?>
                                </td>  
                                <td class="odia"> <?php if($row['vchDescriptionH']!=''){?>
                                    <a href="javascript:void(0);" title="News Details" class="showModal" onclick="getNewsDetails('<?php echo $row['intNewsId'];?>',2)"><?php echo htmlspecialchars_decode($row['vchHeadLineH'],ENT_NOQUOTES);?></a>
                                    <?php }else{  echo htmlspecialchars_decode($row['vchHeadLineH'],ENT_NOQUOTES);}?>
                                </td>   
                                <td><?php  echo $row['vchNewsCategory']; ?></td> 
                                <td align="center">
                                    <?php if($row['vchImageFile']!='')
                                     {
                                         $fileExt =pathinfo($row['vchImageFile'], PATHINFO_EXTENSION);
                                         if($fileExt!='pdf')
                                         {
                                    ?>
                                            <a href="<?php echo APP_URL ?>uploadDocuments/news/<?php echo $row['vchImageFile'];?>" target="_blank" title="News Photo"><img src="<?php echo APP_URL ?>uploadDocuments/news/<?php echo $row['vchImageFile'];?>" alt="<?php echo $row['vchHeadLineE']; ?>" width="150" height="80" /></a>
                                    <?php 
                                         }
                                        else {
                                       ?>
                                           <a href="<?php echo APP_URL;?>uploadDocuments/news/<?php echo $row['vchImageFile'];?>" target="_blank"><?php if($fileExt=='pdf'){?><img src="<?php echo APP_URL;?>img/pdf.png" alt="" width="16" height="16" border="0" align="absmiddle"><?php } else{?><img src="<?php echo APP_URL;?>img/wordIcon.jpg" alt="" width="20" height="20" border="0" align="absmiddle"><?php }?></a>
   <?php 
                                         }  
                                    }else echo '&nbsp;';?>
                                </td>
                                <td width="100">
                                    <?php if($row['vchSource'] != '' ){?>
                                    <a href="<?php echo $row['vchSource']; ?>" target="_blank" /><?php echo $row['vchSourcename']; ?></a>
                                    <?php }?>
                                </td>
                                <td width="100"><?php
                                    if(strtotime($row['dtmNewsDate'])>0)
                                    echo date("d-M-Y",strtotime($row['dtmNewsDate']));
                                    else echo '&nbsp;';?>
                                </td>
<!--                                <td align="center" width="70" >
                                    <?php 
                                    //if($row['intShowHome']==1){?>
                                    <i class="icon-ok" title="Show on Home page"></i>		
                                    <?php/* } else
                                    echo '&nbsp;';*/
                                    ?>
                                </td>-->
                                
                                <td align="center" valign="middle" class="noPrint" style="<?php echo $editPriv; ?>"><a href="<?php echo APP_URL?>addNews/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intNewsId'] ?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>
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
                            <?php echo $objNews->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                                <?php echo $objNews->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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

