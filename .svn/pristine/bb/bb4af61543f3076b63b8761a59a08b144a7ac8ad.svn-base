<?php
/* ================================================
  File Name             : viewGallery.php
  Description       : This is used for view Gallery details.
  Author Name           : T Ketaki Debadarshini
  Date Created          : 19-Feb-2016
  Devloped On           : 19-Feb-2016
  Devloped By           : T Ketaki Debadarshini
  Update History    : <Updated by>        <Updated On>        <Remarks>

  Style sheet           : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css
  Javscript Functions   : jquery.min.js, bootstrap.min.js, custom.js, loadcomponent.js
  includes          : header.php, navigation.php, util.php, footer.php,viewGalleryInner.php

  ================================================== */
require 'viewBannerInner.php';
?>
<script language="javascript">
    $(document).ready(function () {
        //loadNavigation('View Photo Gallery');
        pageHeader = "View Banner";
        strFirstLink = "Manage Application";
        strLastLink = "Media Banner";
        // fillCategory('<?php echo $intCategory; ?>','selCategory','<?php echo $intCattype; ?>');
<?php //if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission==3) {  ?>
        //archiveMe = "yes";
<?php //} ?>
        printMe = "yes";
<?php //if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission!=1) {  ?>
        publishMe = "yes";
        unpublishMe = "yes";
        showHome = "no"
        hideHome = "no"
        deleteMe = "yes";
<?php //} ?>


        if ('<?php echo $outMsg; ?>' != '')
            viewAlert('<?php echo $outMsg; ?>');


<?php if ($redirectPage != '') { ?>
            $('#alertModal').on('hidden.bs.modal', function () {
                window.location.href = '<?php echo $redirectPage; ?>';
            });

<?php } ?>

        $('.showModal').click(function () {
            $('#myModal1').modal();
        });
    });

    function validSl(totalVal)
  {
    var flag  = 0;
    $('.txtSLNo').each(function(){
      console.log('input: ',this.value);
      if(Number(this.value)==0)
      {
        alert('Rank must be greater than zero');
        this.focus();
        flag  = 1;
        return false;
      }
      if(Number(this.value)>Number(totalVal))
      {
        alert('Rank cannot greater than total records');
        this.focus();
        flag  = 1;
        return false;
      }
    });
    if(flag==0)
      gotoDelete('US');
  }
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
                    <a href="<?php echo APP_URL ?>addBanner/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a>
                <?php } ?>
                <a href="javascript:void(0);" class="btn btn-info active">View</a> 

                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                
                <div class="legandBox">         
                    <span class="greenLegend">&nbsp;</span>Published Media(s)&nbsp;         
                    <span class="yellowLegend">&nbsp;</span> Unpublished Media(s) &nbsp;
                </div>
                <div id="viewTable">
                    <?php if (mysqli_num_rows($result) > 0) {
                        $ctr = $intRecno;
                        ?>
                        <input type="button" name="btnUpdateSl" id="btnUpdateSl" class="btn btn-success noPrint" value="Update Sl. Number" onclick="return validSl(<?php echo $intTotalRec;?>)" style="margin-bottom:5px;">
                        <table class="table  table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="20" class="noPrint">
                                        <label class="position-relative">
                                            <input type="checkbox" class="ace chkAll"><span class="lbl"></span></label>
                                    </th>
                                    <th width="20">Sl.#</th>
                                    <th>Banner Title</th>  
                                    <th>Banner Title In Odia</th> 
                                    <th width="400">Banner Image</th>
                                    <th>Description</th>
                                    <th>Description in Odia</th>
                                    <th>Created On </th>
                                    <th width="30" class="noPrint" style="<?php echo $editPriv; ?>">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    if ($row['tinPublishStatus'] == 2)
                                        $style = 'class="greenBorder"';
                                    else
                                        $style = 'class="yellowBorder"';
                                    $ctr++;
                                    ?>
                                    
                                    <tr <?php echo $style; ?>>
                                        <td class="noPrint">
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace chkItem" value="<?php echo $row['intBannerId']; ?>"><span class="lbl"></span>
                                                <input type="hidden" id="hdnPubStatus<?php echo $row['intBannerId']; ?>" name="hdnPubStatus<?php echo $row['intBannerId']; ?>" value="<?php echo $row['tinPublishStatus']; ?>"/>
                                            </label>
                                        </td>
                                        <td>
                                <input type="text" class="txtSLNo" onkeypress="return isNumberKey(event);" name="txtSLNo<?php echo $row['intBannerId'];?>" id="txtSLNo<?php echo $row['intBannerId'];?>" value="<?php echo $row['intSlNo']; ?>" style="width:100%" maxlength="5"/>
                              </td>
                                        <td> 
        <?php echo htmlspecialchars_decode(stripslashes($row['vchBcNmEng']), ENT_QUOTES); ?>
                                        </td>  

                                        <td> 
        <?php echo htmlspecialchars_decode(stripslashes($row['vchBcNmOdia']), ENT_QUOTES); ?>
                                        </td> 

                                        <td align="center" width="200">
                                            <?php if ($row['vchFeaturedImage'] != '') { ?>
                                                <a href="<?php echo APP_URL ?>uploadDocuments/gallery/<?php echo $row['vchFeaturedImage']; ?>" target="_blank" title="Banner Photo"><img src="<?php echo APP_URL ?>uploadDocuments/banner/<?php echo $row['vchFeaturedImage']; ?>" alt="<?php echo $row['vchBcNmEng']; ?>" width="150" height="80" class="img-banner" /></a>
        <?php } else echo ''; ?>
                                        </td>


                                        <td> 

                                                <?php if ($row['vchDescpEng'] != '') { ?>
                                                <a href="#myModal<?php echo $row['intBannerId']; ?>" role="button" data-toggle="modal">
                                                    <?php
                                                    $strMessage = htmlspecialchars_decode($row['vchDescpEng'], ENT_QUOTES);
                                                    echo $shortmsg = $objBanner->wardWrap($strMessage, 100);
                                                    ?></a>

                                                <div class="modal fade" id="myModal<?php echo $row['intBannerId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                            </div>
                                                            <div class="modal-body noPrint" id="divContent">
            <?php echo htmlspecialchars_decode($row['vchDescpEng'], ENT_QUOTES); ?>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
            <?php echo htmlspecialchars_decode($row['vchDescpEng'], ENT_NOQUOTES); ?>
        <?php } ?>   
                                        </td> 


                                        <td> 

                                                <?php if ($row['vchDescpOdia'] != '') { ?>
                                                <a href="#myModalO<?php echo $row['intBannerId']; ?>" role="button" data-toggle="modal">
                                                    <?php
                                                    $strMessage = htmlspecialchars_decode($row['vchDescpOdia'], ENT_QUOTES);
                                                    echo $shortmsg = $objBanner->wardWrap($strMessage, 100);
                                                    ?></a>

                                                <div class="modal fade" id="myModalO<?php echo $row['intBannerId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                            </div>
                                                            <div class="modal-body noPrint" id="divContent">


            <?php echo htmlspecialchars_decode($row['vchDescpOdia'], ENT_NOQUOTES); ?>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
        <?php } else { ?>
            <?php echo htmlspecialchars_decode($row['vchDescpOdia'], ENT_NOQUOTES); ?>
        <?php } ?>   
                                        </td> 


                                        <td><?php echo date("d-M-Y", strtotime($row['dtmCreatedOn'])); ?></td>
                                        <td align="center" valign="middle" class="noPrint" style="<?php echo $editPriv; ?>"><a href="<?php echo APP_URL; ?>addBanner/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intBannerId'] ?>"  data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>
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
                        <?php echo $objBanner->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                            </div>
                        </div>
                                    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                            <div class="col-xs-6">
                                <div class="dataTables_paginate paging_bootstrap">
                                    <ul class="pagination">
                            <?php echo $objBanner->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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