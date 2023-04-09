<?php
/*plugin*/
/*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 29th Dec 2018
Author : MRD
*/ ?>

<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?>
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/contact-us.css">
<!--start:: contarea-->
  <section class="container contarea">
      <div class="row">
          <div class="col-12">
            <!-- <a class="bg-dark text-light pl-2 pl-md-4 pt-3 pb-3 pr-4 w-100 d-block" data-toggle="collapse" id="collapseHandle" data-target="#contacts">Contact Us details for District Employment Officer <i class="fa fa-angle-down fa-2x"></i></a> -->
            <div class="text-dark">
                 <?php if($result->num_rows > 0)  {  ?>   
              <ul class="contact__officers grid">
                   <?php 
                  while ($emprow = $result->fetch_array()) {
                      
                      $strDistrictname      = ($_SESSION['lang']=='O' && $emprow['vchDistrictnameO']!='')?$emprow['vchDistrictnameO']:htmlspecialchars_decode($emprow['vchDistrictname'],ENT_QUOTES);
                      $strDistClass         = ($_SESSION['lang']=='O' && $emprow['vchDistrictnameO']!='')?'odia':'';
                      
                      $strEmployeeName      = ($_SESSION['lang']=='O' && $emprow['vchEmployeeNameO']!='')?$emprow['vchEmployeeNameO']:htmlspecialchars_decode($emprow['vchEmployeeName'],ENT_QUOTES);
                      $strEmpCls            = ($_SESSION['lang']=='O' && $emprow['vchEmployeeNameO']!='')?'odia':'';
                      
                      $strSeparater         = ($emprow['vchMobileNo']!='' && $emprow['vchPhoneno']!='')?' / ':'';?>
                        <li class="grid__item">
                            <span class="screenreader <?php echo $strDistClass; ?>"><?php echo $strDistrictname; ?></span>
                           <span class="screenreader <?php echo $strEmpCls; ?>"><?php echo $strEmployeeName; ?></span>
                           <span class="screenreader"><a title="<?php echo $strEmployeeName; ?>" href="mailto:<?php echo $emprow['vchEmailId']; ?>?Subject=Odisha Skill Development Authority " target="_top" ><?php echo $emprow['vchEmailId']; ?></a></span>
                          <span class="screenreader <?php echo $strNumLangCls; ?>"><?php echo (($emprow['vchMobileNo']!='')?'+91 '.$emprow['vchMobileNo']:'').$strSeparater.(($emprow['vchPhoneno']!='')?$emprow['vchPhoneno']:''); ?></span>
                        </li>
                  <?php }?>
                 </ul>
                      <div class="clearfix"></div>
                      <input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno; ?>" />
                      <input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno; ?>" />
                      <input name="hdn_IsPaging" id="hdn_IsPaging" type="hidden" value="<?php echo $isPaging; ?>" />
                     
                 <?php } else { ?>
                    <div class="noRecord">No record found</div>
                <?php } ?>
                    <?php if($result->num_rows > 0) { ?>
                        <div class="row noPrint">
                             
                            <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                                <div class="col-xs-12">
                                    <div class="dataTables_paginate paging_bootstrap">
                                        <ul class="pagination">
                                        <?php echo $objEmp->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
                                        </ul>
                                    </div>
                                </div>
                        <?php } ?>
                        </div>
                <?php } ?>
<!--                <li class="grid__item">
                   <span>Balasore</span>
                   <span>Shri Shankar Charna Murmu</span>
                   <span><a title="Shri Shankar Charna Murmu" href="mailto:deobaleswar@rediffmail.com?Subject=Odisha Skill Development Authority " target="_top" >deobaleswar@rediffmail.com</a></span>
                   <span>+91 9937353748 / 06782-262166</span>
                </li>
                <li class="grid__item">
                   <span>Bargarh</span>
                   <span>Shri Bidutprava Sahoo</span>
                   <span><a title="Shri Bidutprava Sahoo" href="mailto:eexbgh@yahoo.in?Subject=Odisha Skill Development Authority " target="_top" >eexbgh@yahoo.in</a></span>
                   <span>+91 9861164990 / 06646-246196</span>
                </li>
                                  <li class="grid__item">
                   <span>Bhadrak</span>
                   <span>Shri Prasant Kumar Bhoi</span>
                   <span><a title="Shri Prasant Kumar Bhoi" href="mailto:dee.exchange.bhadrak@gmail.com?Subject=Odisha Skill Development Authority " target="_top" >dee.exchange.bhadrak@gmail.com</a></span>
                   <span>+91 8763277369 / 06784-231717</span>
                </li>
                                  <li class="grid__item">
                   <span>Bolangir</span>
                   <span>Shri Binod Prakash Lakara</span>
                   <span><a title="Shri Binod Prakash Lakara" href="mailto:employment.bgr@gmail.com?Subject=Odisha Skill Development Authority " target="_top" >employment.bgr@gmail.com</a></span>
                   <span>+91 9938317877 / 06652-232067</span>
                </li>
                                  <li class="grid__item">
                   <span>Boudh</span>
                   <span>Shri Shoroichandra Hembram</span>
                   
                   <span><a title="Shri Shoroichandra Hembram" href="mailto:deoboudh@rediffmail.com?Subject=Odisha Skill Development Authority " target="_top" >deoboudh@rediffmail.com</a></span>
                   <span>+91 9437243542 / 06841-222263</span>
                </li>
                                  <li class="grid__item">
                   <span>Cuttack</span>
                   <span>Shri Manasa Ranjan Mohanty</span>
                   
                   <span><a title="Shri Manasa Ranjan Mohanty" href="mailto:deectcorissa@yahoo.in?Subject=Odisha Skill Development Authority " target="_top" >deectcorissa@yahoo.in</a></span>
                   <span>+91 9437268211 / 0671-2421056</span>
                </li>
                                  <li class="grid__item">
                   <span>Deogarh</span>
                   <span>Shri Chintamani Mahananda</span>
                   
                   <span><a title="Shri Chintamani Mahananda" href="mailto:eedeogarh@gmail.com?Subject=Odisha Skill Development Authority " target="_top" >eedeogarh@gmail.com</a></span>
                   <span>+91 9777077136 / 06641-226469</span>
                </li>
                                  <li class="grid__item">
                   <span>Dhenkanal</span>
                   <span>Shri Ashish Kumar Basantia</span>
                   
                   <span><a title="Shri Ashish Kumar Basantia" href="mailto:deo.dkl@rediffmail.com?Subject=Odisha Skill Development Authority " target="_top" >deo.dkl@rediffmail.com</a></span>
                   <span>+91 8763567767 / 06762-226653</span>
                </li>
                                  <li class="grid__item">
                   <span>Ganjam</span>
                   <span>Shri Ashok Kumar Tripathy</span>
                   
                   <span><a title="Shri Ashok Kumar Tripathy" href="mailto:deegjp@gmail.com?Subject=Odisha Skill Development Authority " target="_top" >deegjp@gmail.com</a></span>
                   <span>+91 9438161552 / 06815-222731</span>
                </li>
                                  <li class="grid__item">
                   <span>Jagatsinghpur</span>
                   <span>Shri Tapas Kumar Swain</span>
                   
                   <span><a title="Shri Tapas Kumar Swain" href="mailto:deejgsporissa@yahoo.com?Subject=Odisha Skill Development Authority " target="_top" >deejgsporissa@yahoo.com</a></span>
                   <span>+91 9437141489 / 06724-220467</span>
                </li>
                                  <li class="grid__item">
                   <span>Jajpur</span>
                   <span>Shri Gatikrushna Behera</span>
                   
                   <span><a title="Shri Gatikrushna Behera" href="mailto:dee_jajpur@yahoo.in?Subject=Odisha Skill Development Authority " target="_top" >dee_jajpur@yahoo.in</a></span>
                   <span>+91 9437444275 / 06728-222659</span>
                </li>
                                  <li class="grid__item">
                   <span>Jharsuguda</span>
                   <span>Shri Sanju Kumar Sahoo</span>
                   
                   <span><a title="Shri Sanju Kumar Sahoo" href="mailto:deo_empjsg@yahoo.in?Subject=Odisha Skill Development Authority " target="_top" >deo_empjsg@yahoo.in</a></span>
                   <span>+91 9853288456 / 06645-272437</span>
                </li>
                                  <li class="grid__item">
                   <span>Kalahandi</span>
                   <span>Shri Bijay Kumar Patra</span>
                   
                   <span><a title="Shri Bijay Kumar Patra" href="mailto:dexkalahandi@yahoo.com?Subject=Odisha Skill Development Authority " target="_top" >dexkalahandi@yahoo.com</a></span>
                   <span>+91 9437174675 / 06670-230628</span>
                </li>
                                  <li class="grid__item">
                   <span>Kandhamal</span>
                   <span>Shri Tusarkanta Mohanty</span>
                   
                   <span><a title="Shri Tusarkanta Mohanty" href="mailto:ori-dphulbani@gramsat.nic.in?Subject=Odisha Skill Development Authority " target="_top" >ori-dphulbani@gramsat.nic.in</a></span>
                   <span>+91 8280405107 / 06842-253696</span>
                </li>
                                  <li class="grid__item">
                   <span>Kandhamal</span>
                   <span>Shri Durga charna Das</span>
                   
                   <span><a title="Shri Durga charna Das" href="mailto:emp.plb@rediffmail.com?Subject=Odisha Skill Development Authority " target="_top" >emp.plb@rediffmail.com</a></span>
                   <span>+91 9437756654 / 06842-253626</span>
                </li>
                                  <li class="grid__item">
                   <span>Kendrapara</span>
                   <span>Shri Jayant Kumar Das</span>
                   
                   <span><a title="Shri Jayant Kumar Das" href="mailto:d.kendrapara@yahoo.in?Subject=Odisha Skill Development Authority " target="_top" >d.kendrapara@yahoo.in</a></span>
                   <span>+91 9853364899 / 06727-233599</span>
                </li>
                                  <li class="grid__item">
                   <span>Keonjhar</span>
                   <span>Shri Daitari Sethi</span>
                   
                   <span><a title="Shri Daitari Sethi" href="mailto:deo_kjr@yahoo.in?Subject=Odisha Skill Development Authority " target="_top" >deo_kjr@yahoo.in</a></span>
                   <span>+91 9437645935 / 06766-255449</span>
                </li>
                                  <li class="grid__item">
                   <span>Khurdha</span>
                   <span>Shri AP Pradhan</span>
                   
                   <span><a title="Shri AP Pradhan" href="mailto:employment_khurda@rediffmail.com?Subject=Odisha Skill Development Authority " target="_top" >employment_khurda@rediffmail.com</a></span>
                   <span>+91 9437305412 / 0674-2395744</span>
                </li>
                                  <li class="grid__item">
                   <span>Koraput</span>
                   <span>Shri Khanu Charna Behera</span>
                   
                   <span><a title="Shri Khanu Charna Behera" href="mailto:deo_koraput@rediffmail.com?Subject=Odisha Skill Development Authority " target="_top" >deo_koraput@rediffmail.com</a></span>
                   <span>+91 9178244726 / 06852-251207</span>
                </li>
                                  <li class="grid__item">
                   <span>Malkangiri</span>
                   <span>Shri Kahnu Charna Behera</span>
                   
                   <span><a title="Shri Kahnu Charna Behera" href="mailto:emp.mkg@rediffmail.com?Subject=Odisha Skill Development Authority " target="_top" >emp.mkg@rediffmail.com</a></span>
                   <span>+91 9178244726 / 06861-230427</span>
                </li>
                                  <li class="grid__item">
                   <span>Mayurbhanj</span>
                   <span>Shri Ranjan Kumar Mishra</span>
                   
                   <span><a title="Shri Ranjan Kumar Mishra" href="mailto:employment_baripada@rediffmail.com?Subject=Odisha Skill Development Authority " target="_top" >employment_baripada@rediffmail.com</a></span>
                   <span>+91 9437443992 / 06792-252747</span>
                </li>
                                  <li class="grid__item">
                   <span>Nabarangpur</span>
                   <span>Shri Karunakar Barik</span>
                   
                   <span><a title="Shri Karunakar Barik" href="mailto:deo_ngp@rediffmail.com?Subject=Odisha Skill Development Authority " target="_top" >deo_ngp@rediffmail.com</a></span>
                   <span>+91 9437533583 / 06858-222471</span>
                </li>
                                  <li class="grid__item">
                   <span>Nayagarh</span>
                   <span>Shri Dhrungaraj Mohanty</span>
                   
                   <span><a title="Shri Dhrungaraj Mohanty" href="mailto:emp.nayagarh@gmail.com?Subject=Odisha Skill Development Authority " target="_top" >emp.nayagarh@gmail.com</a></span>
                   <span>+91 9937883457 / 06753-252625</span>
                </li>
                                  <li class="grid__item">
                   <span>Nuapada</span>
                   <span>Shri SM Satapathy</span>
                   
                   <span><a title="Shri SM Satapathy" href="mailto:deenuapada@rediffmail.com?Subject=Odisha Skill Development Authority " target="_top" >deenuapada@rediffmail.com</a></span>
                   <span>+91 8093469525 / 06678-223371</span>
                </li>
                                  <li class="grid__item">
                   <span>Puri</span>
                   <span>Shri Ghanasyam Saha</span>
                   
                   <span><a title="Shri Ghanasyam Saha" href="mailto:deepuri2009@rediffmail.com?Subject=Odisha Skill Development Authority " target="_top" >deepuri2009@rediffmail.com</a></span>
                   <span>+91 9937928372 / 06752-222757</span>
                </li>
                                  <li class="grid__item">
                   <span>Rayagada</span>
                   <span>Shri RP Tete</span>
                   
                   <span><a title="Shri RP Tete" href="mailto:deex_rayagada@yahoo.in?Subject=Odisha Skill Development Authority " target="_top" >deex_rayagada@yahoo.in</a></span>
                   <span>+91 9437836604 / 06856-223133</span>
                </li>
                                  <li class="grid__item">
                   <span>Sambalpur</span>
                   <span>Smt Sangaita Kumari Meher</span>
                   
                   <span><a title="Smt Sangaita Kumari Meher" href="mailto:deexsambalpur@yahoo.in?Subject=Odisha Skill Development Authority " target="_top" >deexsambalpur@yahoo.in</a></span>
                   <span>+91 9658479833 / 0663-2411086</span>
                </li>
                                  <li class="grid__item">
                   <span>Sonepur</span>
                   <span>Smt Sarmistha Dhala</span>
                   
                   <span><a title="Smt Sarmistha Dhala" href="mailto:dee.snpr@yahoo.in?Subject=Odisha Skill Development Authority " target="_top" >dee.snpr@yahoo.in</a></span>
                   <span>+91 9437167181 / 06654-220007</span>
                </li>
                <li class="grid__item">
                   <span>Sundargarh</span>
                   <span>Shri Haris Chandra Sabar</span>
                   
                   <span><a title="Shri Haris Chandra Sabar" href="mailto:deorourkela@rediffmail.com?Subject=Odisha Skill Development Authority " target="_top" >deorourkela@rediffmail.com</a></span>
                   <span>+91 9437310655 / 0661-2504446</span>
                </li>-->
              
            </div>
          </div>
      </div>
  </section>
    <!--end:: contarea-->

    <!--start::Footer-->
    <?php include 'include/footer.php' ?>
</body>
</html>
