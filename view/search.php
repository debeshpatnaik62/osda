<?php
/*plugin*/
/* Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 4rd Dec 2018
Author : Rumana Parween
 */
?>

<!doctype html>
<html lang="en">
    <?php include 'include/header.php'?>

    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/search.css">
    <!--start:: contarea-->

    <section class="container contarea">

    <form name="frmSearch" id="frmSearch" method="post" action="" enctype="multipart/form-data" autocomplete="off">
    <div class="searchfilter">
        <div class="form-group row">
                    <div class="col-md-3"> <label class=""><?php echo $strSearchInput; ?> : </label></div>
            <div class="col-md-5"> <input type="text" class="form-control " placeholder="" name="txtSearch" id="txtSearchIn" value="<?php echo $searchTxt; ?>"  maxlength="100" value="" autocomplete="off"></div>
           <div class="col-md-2"> <button type="submit" name="btnSearch" value="btnSearch" class="osda--btn btn--rounded" onClick="return validateSearch();"><?php echo $strsearch; ?></button></div>
        </div>
    </div>





	 <div class="search-detail-list">
          <div>
                 <?php if ($linkResult->num_rows > 0) {?>
          <?php
while ($row = $linkResult->fetch_array()) {
    //print_r($row);exit;
    $intCount++;
    $srchTitleA = htmlspecialchars_decode($row['HEAD_LINE'], ENT_QUOTES);
    $srchTitleA = ($_SESSION['lang'] == 'O' && ($row['HEAD_LINE_O'] != '')) ? htmlspecialchars_decode($row['HEAD_LINE_O'], ENT_QUOTES) : $srchTitleA;
    $strCount = ($_SESSION['lang'] == 'O' && ($row['HEAD_LINE_O'] != '')) ? 180 : 100;
    $srchTitleA = $objSrch->wardWrap(strip_tags($srchTitleA), $strCount);

    $description = ucfirst(strip_tags(htmlspecialchars_decode($row['DESCRIPTION'], ENT_QUOTES)));
    $description = ($_SESSION['lang'] == 'O' && ($row['DESCRIPTION_O'] != '')) ? urldecode(htmlspecialchars_decode($row['DESCRIPTION_O'])) : $description;
    $intSearchId = $row['PID'];
    $srchCreatedOn = $row['CREATED_ON'];

    $srchRedirect = $row['VCH_URL'];
    $srchUpdatedOn = $row['UPDATE_ON'];
    $intPL = $row['PL_ID'];
    $srchUrl = $row['URL'];
    $intWindowType = $row['WINDOW_TYPE'];

    $linkId = '';
    //echo '- '.$row['HEAD_LINE_H'].' -';

    if ($row['URL'] != '') {
        switch (trim($row['FUNCTION_NAME'])) {
            case 'success-stories':
                $rdPath = 'success-stories-details' . '/' . $row['URL'];
                break;
            default:

                break;

        }
    } else {
        $rdPath = $row['FUNCTION_NAME']; //echo 2;
    }
    $linkName = ($row['LINK_TYPE'] == 2) ? $row['URL'] : SITE_URL . $rdPath;
    $target = ($row['LINK_TYPE'] == 2) ? '_blank' : '';
    $descCount = ($_SESSION['lang'] == 'O' && $row['vchDescriptionO'] != '') ? 250 : 180;
    $text = $objSrch->wardWrap(strip_tags($description), $descCount);
    $updateDate = ($row['UPDATE_ON'] == '' || $row['UPDATE_ON'] == '0000-00-00') ? date("d-F-Y", strtotime($row['CREATED_ON'])) : date("d-F-Y", strtotime($row['UPDATE_ON']));

    ?>
             <div class="searchResult">
            <h4><a  href="<?php echo $linkName; ?>" target="<?php echo $target; ?>"><?php echo $srchTitleA; ?></a></h4>
            <p><?php echo $text; ?></p>
            <p class="lgrey"><small><?php echo $strLastUpdate; ?>:<?php echo $updateDate; ?></small></p>
            </div>
                 <?php }} else {?>
             <div align="center">
            <h3><?php echo $strNorecordlbl; ?></h3>
            <?php echo $strWordSearchFor; ?>- "<?php echo $searchTxt; ?>" <?php echo $strWordSearchFor2; ?>  <br>
             </div>
               <?php }?>
          </div>
            <?php if (mysqli_num_rows($result) > 0) {?>
                <div class="row noPrint">
                    <div class="col-sm-12 text-right">
                          <div class="dataTables_info " id="sample-table-2_info">
                              <?php if ($intTotalRec > $intPgSize) {?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? $strPaginglbl1 : $strPaginglbl2; ?></a>/ <?php }?>
                                   <?php echo $objSrch->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                          </div>
                      </div>
                      <div class="clearfix"></div>
                    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) {?>
                        <div class="col-xs-12">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                                <?php echo $objSrch->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                                </ul>
                            </div>
                        </div>
                <?php }?>
                </div>
        <?php }?>

<!--       <div class="page">
        <div class="dataTables_paginate paging_bootstrap">
          <ul class="pagination">
            <li class="active page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
            <li class="page-item"><a class="page-link" onclick="DoPaging(2,20)" href="#" title="2">2</a></li>
            <li class="page-item"><a class="page-link" onclick="DoPaging(3,40)" href="#" title="3">3</a></li>
            <li class="page-item"><a class="page-link" onclick="DoPaging(4,60)" href="#" title="4">4</a></li>
            <li class="page-item"><a class="page-link" onclick="DoPaging(5,80)" href="#" title="5">5</a></li>
            <li class="page-item"><a class="page-link" onclick="DoPaging(6,100)" href="#" title="6">6</a></li>
            <li class="next page-item"><a class="page-link" onclick="DoPaging(2,20)" href="#" title="Next"><i class="fa fa-angle-right"></i></a></li>
            <li class="page-item"><a class="page-link" onclick="DoPaging(6,100)" href="#" title="Last">»</a></li>
          </ul>
        </div>
        </div>             -->
<br>
<br>




        <input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno; ?>" />
        <input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno; ?>" />

        </div>

         <div class="separator mb20"></div>
    </form>
</section>


    <!--end:: contarea-->

    <!--start::Footer-->
    <?php include 'include/footer.php'?>
</body>
<script type="text/javascript">
function validateSearch(){
    
      if($('#txtSearchIn').val().trim()=='')
        {
            viewAlert("Please enter search text");
            $('#txtSearchIn').focus();
            return false;
        } 
}

</script>


</html>
