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

    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/employer-speak.css">
    <!--start:: contarea-->

    <section class="container contarea">
        <div class="row">
            <div class="col-12 col-md-12">

                <?php if ($result->num_rows > 0) {?>
                    <div class="card-columns">
                <?php
while ($empSRow = $result->fetch_array()) {
    $empIdary[] = $empSRow['INT_MSG_ID'];
}

    $ctr = 1;
    mysqli_data_seek($result, 0);
    while ($empRow = $result->fetch_array()) {

        $nameE = htmlspecialchars_decode($empRow['VCH_NAME'], ENT_QUOTES);
        $nameO = addslashes($empRow['VCH_NAME_O']);
        $name = ($_SESSION['lang'] == 'O' && $nameO != '') ? $nameO : $nameE;
        $nameCls = ($_SESSION['lang'] == 'O' && $nameO != '') ? 'clsNocaption odia' : '';
        $desgE = htmlspecialchars_decode($empRow['VCH_DESIGNATION'], ENT_QUOTES);
        $desgO = addslashes($empRow['VCH_DESIGNATION_O']);
        $desg = ($_SESSION['lang'] == 'O' && $desgO != '') ? $desgO : $desgE;
        $desgCls = ($_SESSION['lang'] == 'O' && $desgO != '') ? 'clsNocaption odia' : '';
        $descE = htmlspecialchars_decode($empRow['VCH_DESCRIPTION'], ENT_QUOTES);
        $descO = addslashes($empRow['VCH_DESCRIPTION_O']);
        $desc = ($_SESSION['lang'] == 'O' && $descO != '') ? $descO : $descE;
        $descCls = ($_SESSION['lang'] == 'O' && $descO != '') ? 'clsNocaption odia' : '';

        $k = array_rand($empIdary, ceil(($result->num_rows / 2)));

        foreach ($k as $key) {
            if (!in_array($empIdary[$key], $v)) {
                $v[] = $empIdary[$key];
            }

        }

        //$descCount = ($_SESSION['lang']=='O')?500:400;
        if (in_array($empRow['INT_MSG_ID'], $v)) {

            if($_SESSION['lang'] == 'O'){
                $descCount = 800;
            }else if($_SESSION['lang'] == 'E'){

                $descCount = 600;
            }

        } else {
            $descCount = 700;
        }
        $image = APP_URL . "uploadDocuments/messageBoard/" . $empRow['VCH_IMAGE'];
        $orgE = htmlspecialchars_decode($empRow['VCH_ORG'], ENT_QUOTES);
        $orgO = addslashes($empRow['VCH_ORG_O']);
        $org = ($_SESSION['lang'] == 'O' && $orgO != '') ? $orgO : $orgE;
        $orgCls = ($_SESSION['lang'] == 'O' && $orgO != '') ? 'clsNocaption odia' : '';
        $empId = $empRow['INT_MSG_ID'];
        //echo strlen(strip_tags($desc))."=====".$descCount;
        ?>



                    <div class="card" id="emp-<?php echo $empId; ?>">
                        <img class="card-img-top" src="<?php echo $image; ?>" alt="<?php echo $name; ?>">
                        <div class="card-body sidebar-box <?php echo ($empId == $empActiveId) ? 'purple-body' : ''; ?>">
                            <h5 class="card-title <?php echo $nameCls; ?> "><?php echo $name; ?></h5>
                            <span class="<?php echo $desgCls; ?>"><?php if ($desg != '') {echo $desg;?>, <?php }?> <?php echo $org; ?></span>
                            <div class="purple"></div>


                            <p class="card-text color <?php echo $descCls; ?>" id="text<?php echo $ctr; ?>">

                                <?php echo str_replace('...', '', $objMsg->wardWrap(strip_tags($desc), $descCount)); ?>

                                <?php if (strlen(strip_tags($desc)) <= $descCount) {?></p><?php } else {?>
                                        <span class="dots" id="dots<?php echo $ctr; ?>">...</span>
                            <?php }?>
                             <?php
// echo mb_strlen(str_replace(' ...','',$objMsg->wardWrap(strip_tags($desc),$descCount)),'UTF-8')."++++";
        //$descCount=($_SESSION['lang']=='O')?900:600;
        if (strlen(strip_tags($desc)) > $descCount) {?>
                            <span class="more" id="more<?php echo $ctr; ?>"><?php echo $objMsg->nthWardWrap(strip_tags($desc), mb_strlen(str_replace('...', '', $objMsg->wardWrap(strip_tags($desc), $descCount)), 'UTF-8'), strlen(strip_tags($desc))); ?></span></p>
					                <button onclick="myFunction(<?php echo $ctr; ?>)"  id="myBtn<?php echo $ctr; ?>" class="read-more myBtn <?php echo $odiaClass; ?>"><?php echo $strReadMorelbl; ?></button>
                              <?php }?>



                        </div>
                    </div>


                <?php $ctr++;}?>


                     <div class="clearfix"></div>
                </div>
                <?php } else {?>
                <div class="row"> <div class="col-md-12 col-sm-12 noRecord <?php echo $strLangCls; ?>" align="center"><?php echo $strNoRecordlbl; ?></div></div>

                <?php }?>
            </div>
        </div>

    </section>


    <!--end:: contarea-->

    <!--start::Footer-->
    <?php include 'include/footer.php'?>
</body>
<script>
 $(document).ready(function(){
     $('html,body').animate({
        scrollTop: $("#emp-"+<?php echo $empActiveId; ?>).offset().top
    }, 'slow');

});

</script>


<script>
function myFunction(elemCtr) {
  var dots     = document.getElementById("dots"+elemCtr);
  var moreText = document.getElementById("more"+elemCtr);
  var btnText  = document.getElementById("myBtn"+elemCtr);

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "<?php echo $strReadMorelbl; ?>";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "<?php echo $strReadLesslbl; ?>";
    moreText.style.display = "inline";
  }
}
</script>













</html>
