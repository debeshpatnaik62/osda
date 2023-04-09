<?php /*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 3rd Dec 2018
Author : MRD
*/

    $strPageFeatureimg        = ($strPageFeatureimg!='')?$strPageFeatureimg:SITE_URL.'images/banner/share-story-banner.jpg';
?>

<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?>
<link rel="stylesheet" type="text/css" href="css/content.css">
<!--start:: contarea-->

<section class="container contarea">
	<?php if(trim($strPageSnippet!='')){?>    
                     <p class="font-lgb <?php echo $strPageSnptcls; ?>"><?php echo $strPageSnippet; ?> </p>
                  <?php }?>
                    <div class="separator mb20"></div>
                    
                    
                      <?php 
                    if($contPagedtails!='')
                        echo '<p>'.$contPagedtails.'</p>';
                      else
                          echo '<div class="noRecord">No Contents Found</div>';


                   //STarts Pagination details     
                      if(mysqli_num_rows($conResPg)>1)
                         {

                            $prepage=($hdnPgNo-1);
                            if($prepage>0)
                                {
                                        $activepre = "";
                                        $onclickpre = "changeContent('$prepage');";

                                }
                                else
                                {
                                        $activepre = "disabled";
                                        $onclickpre = "";
                                }

                       ?>
                      <form id="formPG" method="post" autocomplete="off">
                        <input type="hidden" name="hdnPgNo" id="hdnPgNo" value="<?php echo $hdnPgNo;?>" />
                      </form>

                        <ul class="pagination">
                          <li class="<?php echo $activepre;?>" onclick="<?php echo $onclickpre;?>"> <a href="javascript:void(0);" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>
                          <?php    
                                    $ctrn = 0;
                                    while($row = mysqli_fetch_array($conResPg))
                                    {  
                                        $ctrn++;                        
                                        $paging  = $row['intPageNo']; 
                                        if($ctrn == $hdnPgNo)
                                        {
                                                $active = "active";
                                                $onclick = "";
                                        }
                                        else
                                        {
                                                $active = "";
                                                $onclick = "changeContent('$paging');";
                                        }
                                ?>
                          <li class="<?php echo $active;?>"><a href="javascript:void(0);" onclick="<?php echo $onclick;?>"><?php echo $paging;?></a></li>
                          <?php 

                                    } 
                                 // echo 'ss'.$hdnPgNo.' '.$ctrn;  
                                   $nxtpage=($hdnPgNo+1);
                                    if($hdnPgNo==$ctrn)
                                        {
                                              $activenxt = "disabled";
                                              $onclicknxt = "";

                                        }
                                        else
                                        {
                                             $activenxt = "";
                                             $onclicknxt = "changeContent('$nxtpage');";     
                                        } 
                                  ?>
                          <li onclick="<?php echo $onclicknxt;?>" class="<?php echo $activenxt;?>"> <a href="javascript:void(0);" aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a> </li>
                        </ul>

                      <?php 

                        } 
                      ?>
</section>

<!--end:: contarea-->



<!--start::Footer-->
<?php include 'include/footer.php' ?>
   
</body>
</html>
