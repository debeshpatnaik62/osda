<?php 
/*plugin*/

/*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 7th Dec 2018
Author : MRD
*/ 
include_once('statisticsContentInner.php');
?>

<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?>
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/statistics.css">
<!--start:: contarea-->

<section class="container contarea">
	<div class="statistics">
      <ul class="nav statistics--tabs">
        <li class="nav-item">
          <a class="active" data-toggle="tab" href="#tab1"><?php echo $skilled; ?></a>
        </li>
        <li class="nav-item">
          <a data-toggle="tab" href="#tab2"><?php echo $longterm; ?></a>
        </li>
        <li class="nav-item">
          <a data-toggle="tab" href="#tab3"><?php echo $shortterm; ?></a>
        </li>
        <li class="nav-item">
          <a data-toggle="tab" href="#tab4"><?php echo $awards; ?></a>
        </li>
        <li class="nav-item">
          <a data-toggle="tab" href="#tab5"><?php echo $employers; ?></a>
        </li>
      </ul>

      <div class="tab-content">
        <div id="tab1" class="tab-pane active">
          <div class="statistics__info">
              
              <div class="statistics__info__container d-inline-block">
                  <img src="<?php echo SITE_URL;?>images/trades.png" alt="trades">
                  <span><?php echo $skillednum2; ?></span>
                  <p><?php echo $skilled2; ?></p>
              </div>
              <div class="statistics__info__container d-inline-block">
                  <img src="<?php echo SITE_URL;?>images/placement.png" alt="placement">
                  <span>60</span>
                  <p><?php echo $skilled3; ?></p>
              </div>
              
              
              <div class="statistics__info__container center--list">
				<!-- <img src="<?php echo SITE_URL;?>images/training.png" alt="training">-->
                  <span>04</span>
                  <p><?php echo $skilled1; ?></p>
                  <a href="javascript:void(0);" title="" data-toggle="modal" data-target="#centerList3"><?php echo $skilledlistbtn; ?></a>
              </div>
              
              <div class="statistics__info__container center--list">
                  <span>32</span>
                  <p><?php echo $skilled4; ?></p>
                  <a href="javascript:void(0);" title="" data-toggle="modal" data-target="#centerList1"><?php echo $skilledlistbtn; ?></a>
              </div>
              <div class="statistics__info__container center--list">
                  <span>38</span>
                  <p><?php echo $skilled5; ?></p>
                  <a href="javascript:void(0);" title="" data-toggle="modal" data-target="#centerList2"><?php echo $skilledlistbtn; ?></a>
              </div>
          </div>
          <div class="row">
            <div class="col-12 col-md-6">
                <h3><?php echo $specialtraininginstitute; ?></h3>
                <div class="sec--image">
                    <div class="sec__item">
                        <img src="<?php echo SITE_URL;?>images/Staticsimage1.jpg" alt="Students">
                    </div>
                    <div class="sec__item">
                        <img src="<?php echo SITE_URL;?>images/Staticsimage2.jpg" alt="Students">
                    </div>
                </div>
                <ul class="address--list">
                    <li>
                        <strong><?php echo $stiadress; ?></strong> 
                        <span><?php echo $stiadress1; ?></span> 
                    </li>
                    <li>
                        <strong><?php echo $stiadress2; ?></strong> 
                        <span><?php echo $stiadress3; ?></span> 
                    </li>
                    <li>
                        <strong><?php echo $stiadress4; ?></strong> 
                        <span><?php echo $stiadress5; ?></span> 
                    </li>
                    <li>
                        <strong><?php echo $stiadress6; ?></strong> 
                        <span><?php echo $stiadress7; ?></span> 
                    </li>
                    <li>
                        <strong><?php echo $stiadress8; ?></strong> 
                        <span><?php echo $stiadress9; ?></span> 
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-6 bg-light pt-3 pb-3 pt-sm-0 pb-sm-0">
                <h3 class="mb-3"><?php echo $pilotprog; ?></h3>
                <ul class="program--list">
                    <li>
                        <img src="<?php echo SITE_URL;?>images/program1.jpg" alt="Program">
                        <h4><?php echo $pilotprog1; ?></h4>
                    </li>
                    <li>
                        <img src="<?php echo SITE_URL;?>images/program2.jpg" alt="Program">
                        <h4><?php echo $pilotprog2; ?></h4>
                    </li>
                    <li>
                        <img src="<?php echo SITE_URL;?>images/program3.jpg" alt="Program">
                        <h4><?php echo $pilotprog3; ?></h4>
                    </li>
                    <li>
                        <img src="<?php echo SITE_URL;?>images/program4.jpg" alt="Program">
                        <h4><?php echo $pilotprog4; ?></h4>
                    </li>
                    <li>
                        <img src="<?php echo SITE_URL;?>images/program5.jpg" alt="Program">
                        <h4><?php echo $pilotprog5; ?></h4>
                    </li>
                </ul>
            </div>
          </div>

            <div class="row osda-bg pt-4 pb-4 pl-md-4 pr-md-4 ">
<!--                <h3 class="mb-4 mt-0 mx-auto"><?php echo $cmegpnum; ?></h3>-->
                 <h3 class="mb-4 mt-0 mx-auto"> <?php echo $youth; ?> </h3>
                <?php if($_SESSION['lang']=='O') 
                { ?>
                <img src="<?php echo SITE_URL;?>images/Statistics-odia.jpg" alt="Statistics" width="100%">
                <?php }  else { ?>
                  
                <img src="<?php echo SITE_URL;?>images/Statistics-Page.jpg" alt="Statistics" width="100%">
               <?php } ?>
                
                
                
<!--
                <div class="col-12 col-md-6">
                   
                    <div class="table-responsive">
                        <table class="table table-bordered">
                              <thead class="bg-light text-dark">
                                <tr>
                                  <th class="align-middle"><?php echo $cmegpyear; ?></th>
                                  <th class="align-middle"><?php echo $cmegpyouthtrained; ?></th>
                                  <th class="align-middle"><?php echo $cmegpyouthplaced; ?></th>
                                </tr>
                              </thead>
                              <tbody > 
                                <tr>
                                    <td>2014-15</td>
                                  <td>97,238</td>
                                  <td>9,678</td>
                                </tr>
                                <tr>
                                  <td>2015-16</td>
                                  <td>2,49,679</td>
                                  <td>25,429</td>
                                </tr>
                                <tr>
                                  <td>2016-17</td>
                                  <td>1,22,492</td>
                                  <td>28,589</td>
                                </tr>
                                  <tr>
                                  <td>2017-18</td>
                                  <td>2,25,858</td>
                                  <td>13,629</td>
                                </tr>
                                <tr>
                                  <td>Total</td>
                                  <td>6,95,267</td>
                                  <td>77,325</td>
                                </tr>
                                
                              </tbody>
                            </table>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-sm-0 pt-4 pt-sm-0">
                    <h3 class="mb-4 mt-0"><?php echo $sdfyrs; ?></h3>
                    <div class="row text-center" >
                        <div class="col-6" >
                            <div class="fund--statistics">
                                <span >Rs. 13,28,66,526</span>
                                <span >2014-15</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="fund--statistics">
                                <span >Rs. 22,54,80,815</span>
                                <span >2015-16</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="fund--statistics">
                                <span >Rs. 33,35,93,400</span>
                                <span >2016-17</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="fund--statistics">
                                <span >Rs. 13,61,78,437</span>
                                <span >2017-18</span>
                            </div>
                        </div>
                    </div>
                </div>
-->
            </div>

            <div class="row mt-4">
                <h3 class="col-12 mb-3 text-center"><?php echo $ittrainers; ?></h3>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="training--center">
                        <a href="javascript:void(0);" title=""></a>
                        <img src="<?php echo SITE_URL;?>images/center1.jpg" alt="Training center">
                        <div class="overlay--text">
                            <span>
                                <span><?php echo $ittrainers1; ?></span>
                                <span><?php echo $ittrainers2; ?></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="training--center">
                        <a href="javascript:void(0);" title=""></a>
                        <img src="<?php echo SITE_URL;?>images/center2.jpg" alt="Training center">
                        <div class="overlay--text">
                            <span>
                                <span><?php echo $ittrainers3; ?></span>
                                <span><?php echo $ittrainers4; ?></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="training--center">
                        <a href="javascript:void(0);" title=""></a>
                        <img src="<?php echo SITE_URL;?>images/center3.jpg" alt="Training center">
                        <div class="overlay--text">
                            <span>
                                <span><?php echo $ittrainers5; ?></span>
                                <span><?php echo $ittrainers6; ?></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <h3 class="text-center"><?php echo $stst; ?></h3>
                <div class="grid mt-3">
                    <div class="grid__item text-center">
                        <img src="<?php echo SITE_URL;?>images/electrical.jpg" alt="electrical">
                        <div class="text-center"><?php echo $stst1; ?></div>
                    </div>
                    <div class="grid__item text-center">
                        <img src="<?php echo SITE_URL;?>images/healthcare.jpg" alt="healthcare">
                        <div class="text-center"><?php echo $stst2; ?></div>
                    </div>
                    <div class="grid__item text-center">
                        <img src="<?php echo SITE_URL;?>images/ICT.jpg" alt="ICT">
                        <div class="text-center"><?php echo $stst3; ?></div>
                    </div>
                    <div class="grid__item text-center">
                        <img src="<?php echo SITE_URL;?>images/construction-ico.jpg" alt="construction">
                        <div class="text-center"><?php echo $stst4; ?></div>
                    </div>
                    <div class="grid__item text-center">
                        <img src="<?php echo SITE_URL;?>images/production.jpg" alt="production">
                        <div class="text-center"><?php echo $stst5; ?></div>
                    </div>
                    <div class="grid__item text-center">
                        <img src="<?php echo SITE_URL;?>images/garment.jpg" alt="garment">
                        <div class="text-center"><?php echo $stst6; ?></div>
                    </div>
                    <div class="grid__item text-center">
                        <img src="<?php echo SITE_URL;?>images/air-cnditioner.jpg" alt="air-cnditioner">
                        <div class="text-center"><?php echo $stst7; ?></div>
                    </div>
                    <div class="grid__item text-center">
                        <img src="<?php echo SITE_URL;?>images/automotive.jpg" alt="automotive">
                        <div class="text-center"><?php echo $stst8; ?></div>
                    </div>
                    <div class="grid__item text-center">
                        <img src="<?php echo SITE_URL;?>images/hospitality.jpg" alt="hospitality">
                        <div class="text-center"><?php echo $stst9; ?></div>
                    </div>
                    <div class="grid__item text-center">
                        <img src="<?php echo SITE_URL;?>images/plastic-processing.jpg" alt="plastic-processing">
                        <div class="text-center"><?php echo $stst10; ?></div>
                    </div>
                </div>
            </div>



            <!-- Modal (Skill Development Centres) -->
            <div class="modal fade" id="centerList1" tabindex="-1" role="dialog" aria-labelledby="centerList2" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title"><?php echo $sdc; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                   <div class="devCenterTbl table-responsive">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th><?php echo $sdc1; ?></th>
                            <th><?php echo $sdc2; ?></th>
                            <th><?php echo $sdc3; ?></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td><?php echo $sdc4; ?></td>
                            <td><?php echo $sdc5; ?></td>
                            <td><?php echo $sdc6; ?></td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td><?php echo $sdc7; ?></td>
                            <td><?php echo $sdc8; ?></td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td><?php echo $sdc9; ?></td>
                            <td><?php echo $sdc10; ?></td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td><?php echo $sdc11; ?></td>
                            <td><?php echo $sdc12; ?></td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td><?php echo $sdc13; ?></td>
                            <td><?php echo $sdc14; ?></td>
                          </tr>
                          <tr>
                            <td>6</td>
                            <td><?php echo $sdc15; ?></td>
                            <td><?php echo $sdc16; ?></td>
                          </tr>
                          <tr>
                            <td>7</td>
                            <td><?php echo $sdc17; ?></td>
                            <td><?php echo $sdc18; ?></td>
                          </tr>
                          <tr>
                            <td>8</td>
                            <td><?php echo $sdc19; ?></td>
                            <td><?php echo $sdc20; ?></td>
                          </tr>
                          <tr>
                            <td>9</td>
                            <td><?php echo $sdc21; ?></td>
                            <td><?php echo $sdc22; ?></td>
                          </tr>
                          <tr>
                            <td>10</td>
                            <td><?php echo $sdc23; ?></td>
                            <td><?php echo $sdc24; ?></td>
                          </tr>
                          <tr>
                            <td>11</td>
                            <td><?php echo $sdc25; ?></td>
                            <td><?php echo $sdc26; ?></td>
                          </tr>
                          <tr>
                            <td>12</td>
                            <td><?php echo $sdc27; ?></td>
                            <td><?php echo $sdc28; ?></td>
                          </tr>
                          <tr>
                            <td>13</td>
                            <td><?php echo $sdc29; ?></td>
                            <td><?php echo $sdc30; ?></td>
                          </tr>
                          <tr>
                            <td>14</td>
                            <td><?php echo $sdc31; ?></td>
                            <td><?php echo $sdc32; ?></td>
                          </tr>
                          <tr>
                            <td>15</td>
                            <td><?php echo $sdc33; ?></td>
                            <td><?php echo $sdc34; ?></td>
                          </tr>
                          <tr>
                            <td>16</td>
                            <td><?php echo $sdc35; ?></td>
                            <td><?php echo $sdc36; ?></td>
                          </tr>
                          <tr>
                            <td>17</td>
                            <td><?php echo $sdc37; ?></td>
                            <td><?php echo $sdc38; ?></td>
                          </tr>
                          <tr>
                            <td>18</td>
                            <td><?php echo $sdc39; ?></td>
                            <td><?php echo $sdc40; ?></td>
                          </tr>
                          <tr>
                            <td>19</td>
                            <td><?php echo $sdc41; ?></td>
                            <td><?php echo $sdc42; ?></td>
                          </tr>
                          <tr>
                            <td>20</td>
                            <td><?php echo $sdc43; ?></td>
                            <td><?php echo $sdc44; ?></td>
                          </tr>
                          <tr>
                            <td>21</td>
                            <td><?php echo $sdc45; ?></td>
                            <td><?php echo $sdc46; ?></td>
                          </tr>
                          <tr>
                            <td>22</td>
                            <td><?php echo $sdc47; ?></td>
                            <td><?php echo $sdc48; ?></td>
                          </tr>
                          <tr>
                            <td>23</td>
                            <td><?php echo $sdc49; ?></td>
                            <td><?php echo $sdc50; ?></td>
                          </tr>
                          <tr>
                            <td>24</td>
                            <td><?php echo $sdc51; ?></td>
                            <td><?php echo $sdc52; ?></td>
                          </tr>
                          <tr>
                            <td>25</td>
                            <td><?php echo $sdc53; ?></td>
                            <td><?php echo $sdc54; ?></td>
                          </tr>
                          <tr>
                            <td>26</td>
                            <td><?php echo $sdc55; ?></td>
                            <td><?php echo $sdc56; ?></td>
                          </tr>
                          <tr>
                            <td>27</td>
                            <td><?php echo $sdc57; ?></td>
                            <td><?php echo $sdc58; ?></td>
                          </tr>
                          <tr>
                            <td>28</td>
                            <td><?php echo $sdc59; ?></td>
                            <td><?php echo $sdc60; ?></td>
                          </tr>
                          <tr>
                            <td>29</td>
                            <td><?php echo $sdc61; ?></td>
                            <td><?php echo $sdc62; ?></td>
                          </tr>
                          <tr>
                            <td>30</td>
                            <td><?php echo $sdc63; ?></td>
                            <td><?php echo $sdc64; ?></td>
                          </tr>
                          <tr>
                            <td>31</td>
                            <td><?php echo $sdc65; ?></td>
                            <td><?php echo $sdc66; ?></td>
                          </tr>
                          <tr>
                            <td>32</td>
                            <td><?php echo $sdc67; ?></td>
                            <td><?php echo $sdc68; ?></td>
                          </tr>
                        </tbody>
                      </table>
                   </div>
                  </div>
                  <div class="modal-footer">
                    <a href="<?php echo SITE_URL;?>downloads/skill_development_centres.pdf" target="_blank" class="btn btn-success"> <?php echo $sdcdownload; ?></a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $sdcclose; ?></button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal (Skill Development Extension Centres) -->
            <div class="modal fade" id="centerList2" tabindex="-1" role="dialog" aria-labelledby="centerList2" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Skill Development Extension Centres</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="devCenterTbl table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Sl No</th>
                            <th>District</th>
                            <th>Name of the Institutes in which campus the SDECs have been  set up</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Angul</td>
                            <td> Government Polytechnic, Angul</td>
                          </tr>
                          <tr>
                            <td rowspan="2">2</td>
                            <td rowspan="2">Balasore</td>
                            <td> Government Polytechnic, Balasore</td>
                          </tr>
                          <tr>
                            <td>ITI, Balasore Balasore</td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Bargarh</td>
                            <td>ITI, Bargarh – 2nd campus at Kantapali</td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>Boudha</td>
                            <td>Government Polytechnic, Boudh</td>
                          </tr>
                          <tr>
                            <td rowspan="2">5</td>
                            <td rowspan="2">Bolangir</td>
                            <td>ITI, Bolangir</td>
                          </tr>
                          <tr>
                            <td>ITI, Kantabanji</td>
                          </tr>
                          <tr>
                            <td>6</td>
                            <td>Cuttack</td>
                            <td>ITI, Choudwar</td>
                          </tr>
                          <tr>
                            <td>7</td>
                            <td>Deogarh</td>
                            <td>ITI Barkote</td>
                          </tr>
                          <tr>
                            <td>8</td>
                            <td>Dhenkanal</td>
                            <td>Government Polytechnic, Dhenkanal</td>
                          </tr>
                          <tr>
                            <td>9</td>
                            <td>Gajapati</td>
                            <td>ITI, Mohana</td>
                          </tr>
                          <tr>
                            <td rowspan="2">10</td>
                            <td rowspan="2">Ganjam</td>
                            <td>ITI, Berhampur</td>
                          </tr>
                          <tr>
                            <td>SDC, Shergarh (KVY)</td>
                          </tr>
                          <tr>
                            <td>11</td>
                            <td>Jajpur</td>
                            <td>New ITI, Jajpur</td>
                          </tr>
                          <tr>
                            <td>12</td>
                            <td>Jharsuguda</td>
                            <td>JES, Jharsuguda</td>
                          </tr>
                          <tr>
                            <td>13</td>
                            <td>Kendrapara</td>
                            <td>SIPT (ITI), Pattamundai-2nd campus</td>
                          </tr>
                          <tr>
                            <td>14</td>
                            <td>Khurdha</td>
                            <td>Government Polytechnic, Bhubaneswar</td>
                          </tr>
                          <tr>
                            <td rowspan="2">15</td>
                            <td rowspan="2">Kandhamal</td>
                            <td>ITI, Phulbani</td>
                          </tr>
                          <tr>
                            <td>Government Polytechnic, Phulbani</td>
                          </tr>
                          <tr>
                            <td>16</td>
                            <td>Keonjhar</td>
                            <td>OSME, Keonjhar</td>
                          </tr>
                          <tr>
                            <td rowspan="2">17</td>
                            <td rowspan="2">Koraput</td>
                            <td>New ITI, Laxmipur</td>
                          </tr>
                          <tr>
                            <td>GITI, Ambaguda</td>
                          </tr>
                          <tr>
                            <td rowspan="2">18</td>
                            <td rowspan="2">Kalahandi</td>
                            <td>ITI, Bhawanipatna</td>
                          </tr>
                          <tr>
                            <td>Government Polytechnic, Kalahandi</td>
                          </tr>
                          <tr>
                            <td rowspan="2">19</td>
                            <td rowspan="2">Mayurbhanj</td>
                            <td>TTI, Takatpur</td>
                          </tr>
                          <tr>
                            <td>Government Polytechnic, Mayurbhanj</td>
                          </tr>
                          <tr>
                            <td>20</td>
                            <td>Malkanagiri</td>
                            <td>ITI, Malkangiri</td>
                          </tr>
                          <tr>
                            <td>21</td>
                            <td>Nayagarh</td>
                            <td>New Government ITI,  Nayagarh</td>
                          </tr>
                          <tr>
                            <td>22</td>
                            <td>Nuapada</td>
                            <td>Government Polytechnic, Nuapada</td>
                          </tr>
                          <tr>
                            <td rowspan="3">23</td>
                            <td rowspan="3">Nabarangapur</td>
                            <td>SDC, Kodinga, Kosagunda (KVY)</td>
                          </tr>
                          <tr>
                            <td>SDC, Dabugaon(KVY)</td>
                          </tr>
                          <tr>
                            <td>SDC, Nandahandi(KVY)</td>
                          </tr>
                          <tr>
                            <td>24</td>
                            <td>Puri</td>
                            <td>SDC, Krushnaprasad</td>
                          </tr>
                          <tr>
                            <td rowspan="2">25</td>
                            <td rowspan="2">Sambalpur</td>
                            <td>ITI, Hirakud</td>
                          </tr>
                          <tr>
                            <td>New ITI, Rasanpur (LWE)</td>
                          </tr>
                          <tr>
                            <td>26</td>
                            <td>Sonepur</td>
                            <td>ITI, Sonepur</td>
                          </tr>
                          <tr>
                            <td rowspan="2">27</td>
                            <td rowspan="2">Sundargarh</td>
                            <td>ITI, Rourkela</td>
                          </tr>
                          <tr>
                            <td>UGIE, Rourkela</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <a href="<?php echo SITE_URL;?>downloads/skill_development_centres.pdf" target="_blank" class="btn btn-success"> Download</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            
            
			<div class="modal fade" id="centerList3" tabindex="-1" role="dialog" aria-labelledby="centerList3" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title"><?php echo $skilled1; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th><?php echo $sdc1; ?></th>
                            <th><?php echo $sdc2; ?></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td> <?php echo $Rourkela; ?></td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td> <?php echo $Sambalpur; ?></td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td> <?php echo $Dhenkanal; ?></td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td> <?php echo $Cuttack; ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </div>

        <div id="tab2" class="tab-pane fade">
          <div class="row longCourse">
              <div class="col-12 col-md-6">
                  <h3 class="col-12 p-0 shortCourse__heading"><?php echo $longterm1; ?></h3>
                  <div class="row mt-2 mb-4">
                    <div class="col-6 pr-1 shortCourse__theme__blue">
                    <div>
                      <div class="shortCourse__item">
                        <span  class="shortCourse__count"  ><?php echo $longterm2; ?></span>
                        <span class="shortCourse__duration"><?php echo $longterm3; ?></span>
                      </div>
                    </div>
                      <div>
                      <div class="shortCourse__item" >
                        <span class="shortCourse__count" ><?php echo $longterm4; ?></span>
                        <span class="shortCourse__duration"><?php echo $longterm5; ?></span>
                      </div>
                    </div>
                    </div>
                    
                    <div class="col-6 pl-1 shortCourse__theme__pink">
                    <div>
                      <div class="shortCourse__item">
                        <span  class="shortCourse__count"><?php echo $longterm6; ?></span>
                        <span class="shortCourse__duration"><?php echo $longterm7; ?></span>
                      </div>
                      </div>
                      <div>
                      <div class="shortCourse__item">
                        <span class="shortCourse__count"><?php echo $longterm8; ?></span>
                        <span class="shortCourse__duration"><?php echo $longterm9; ?></span>
                      </div>
                      </div>
                    </div>
                    
                  </div>
              </div>

              <div class="col-12 col-md-6">
                  <h3 class="col-12 p-0 shortCourse__heading"><?php echo $longterm10; ?></h3>
                  <div class="row mt-2 mt-2 mb-4">
                    <div class="col-6 pr-1 shortCourse__theme__blue">
                    <div>
                      <div class="shortCourse__item">
                        <span class="shortCourse__count"><?php echo $longterm11; ?></span>
                        <span class="shortCourse__duration"><?php echo $longterm12; ?></span>
                      </div>
                    </div>
                    <div>
                      <div class="shortCourse__item">
                        <span class="shortCourse__count"><?php echo $longterm13; ?></span>
                        <span class="shortCourse__duration"><?php echo $longterm14; ?></span>
                      </div>
                    </div>
                    </div>
                    
                    <div class="col-6 pl-1 shortCourse__theme__pink">
                    <div>
                      <div class="shortCourse__item">
                        <span class="shortCourse__count"><?php echo $longterm15; ?></span>
                        <span class="shortCourse__duration"><?php echo $longterm16; ?></span>
                      </div>
                      </div>
                      <div>
                      <div class="shortCourse__item">
                        <span class="shortCourse__count" ><?php echo $longterm17; ?></span>
                        <span class="shortCourse__duration"><?php echo $longterm18; ?></span>
                      </div>
                    </div>
                  </div>
                  </div>
              </div>

              <div class="col-12 col-md-6">
                  <h3 class="col-12 p-0 shortCourse__heading"><?php echo $longterm19; ?></h3>
                  <div class="row mt-2 mb-4">
                    <div class="col-6 pr-1 shortCourse__theme__blue">
                    <div>
                      <div class="shortCourse__item">
                        <span class="shortCourse__count" ><?php echo $longterm20; ?></span>
                        <span class="shortCourse__duration"><?php echo $longterm21; ?></span>
                      </div>
                      </div>
                      <div>
                      <div class="shortCourse__item">
                        <span class="shortCourse__count"><?php echo $longterm22; ?></span>
                        <span class="shortCourse__duration"><?php echo $longterm23; ?></span>
                      </div>
                    </div>
                    </div>
                    
                    <div class="col-6 pl-1 shortCourse__theme__pink">
                    <div>
                      <div class="shortCourse__item">
                        <span class="shortCourse__count" ><?php echo $longterm24; ?></span>
                        <span class="shortCourse__duration"><?php echo $longterm25; ?></span>
                      </div>
                      </div>
                      <div>
                      <div class="shortCourse__item">
                        <span class="shortCourse__count"><?php echo $longterm26; ?></span>
                        <span class="shortCourse__duration"><?php echo $longterm27; ?></span>
                      </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
        </div>

        <div id="tab3" class="tab-pane fade">
          <div class="shortCourse">
            <div class="row">
              <div class="col-12 col-md-6">
                  <img src="<?php echo SITE_URL;?>images/logo.png" class="shortCourse__img">
                  <h3 class="col-12 p-0 shortCourse__heading"><?php echo $osda; ?> </h3>
                  <div class="row mt-4 mb-4">
                    <div class="col-6 pr-1 shortCourse__theme__blue">
                    <div>
                      <div class="shortCourse__item item--with--arrow">
                        <span class="shortCourse__count">60</span>
                        <span class="shortCourse__duration"><?php echo $osda1; ?> </span>
                      </div>
                      </div>
                      <div>
                      <div class="shortCourse__item">
                        <span class="shortCourse__count">576</span>
                        <span class="shortCourse__duration"><?php echo $osda2; ?> </span>
                      </div>
                      </div>
                      <div>
                      <div class="shortCourse__item">
                        <span class="shortCourse__count">3082</span>
                        <span class="shortCourse__duration"><?php echo $osda3; ?> </span>
                      </div>
                      </div>
                      <div>
                      <div class="shortCourse__item">
                        <span class="shortCourse__count">330</span>
                        <span class="shortCourse__duration"><?php echo $osda4; ?> </span>
                      </div>
                      </div>
                      <div>
                      <div class="shortCourse__item">
                        <span class="shortCourse__count">244</span>
                        <span class="shortCourse__duration"><?php echo $osda5; ?> </span>
                      </div>
                      </div>
                    </div>
                    <div class="col-6 pl-1 shortCourse__theme__pink">
                    <div>
                      <div class="shortCourse__item item--with--arrow">
                        <span class="shortCourse__count">12,051</span>
                        <span class="shortCourse__duration"><?php echo $osda6; ?> </span>
                      </div>
                      </div>
                      <div>
                      <div class="shortCourse__item">
                        <span class="shortCourse__count">6,047</span>
                        <span class="shortCourse__duration"><?php echo $osda7; ?> </span>
                      </div>
                      </div>
                      <div>
                      <div class="shortCourse__item">
                        <span class="shortCourse__count">947</span>
                        <span class="shortCourse__duration"><?php echo $osda8; ?> </span>
                      </div>
                      </div>
                      <div>
                      <div class="shortCourse__item">
                        <span class="shortCourse__count">622</span>
                        <span class="shortCourse__duration"><?php echo $osda9; ?> </span>
                      </div>
                      </div>
                      <div>
                      <div class="shortCourse__item">
                        <span class="shortCourse__count">203</span>
                        <span class="shortCourse__duration"><?php echo $osda10; ?> </span>
                      </div>
                      </div>
                    </div>
                  </div>
              </div>

              <div class="col-12 col-md-6">
                  <img src="<?php echo SITE_URL;?>images/DDUGKY.png" class="shortCourse__img border">
                  <h3 class="col-12 p-0 shortCourse__heading"><?php echo $ddugky; ?> </h3>
                  <div class="row mt-4 mb-4">
                    <div class="col-6 pr-1 shortCourse__theme__blue">
                    <div>
                      <div class="shortCourse__item item--with--arrow">
                        <span class="shortCourse__count">72</span>
                        <span class="shortCourse__duration"><?php echo $ddugky1; ?></span>
                      </div>
                      </div>
                      <div>
                      <div class="shortCourse__item">
                        <span class="shortCourse__count">12,126</span>
                        <span class="shortCourse__duration"><?php echo $ddugky2; ?></span>
                      </div>
                      </div>
                    </div>
                    <div class="col-6 pl-1 shortCourse__theme__pink">
                    <div>
                      <div class="shortCourse__item item--with--arrow">
                        <span class="shortCourse__count">19,002</span>
                        <span class="shortCourse__duration"><?php echo $ddugky3; ?></span>
                      </div>
                      </div>
                      <div>
                      <div class="shortCourse__item">
                        <span class="shortCourse__count">6,876</span>
                        <span class="shortCourse__duration"><?php echo $ddugky4; ?></span>
                      </div>
                      </div>
                    </div>
                  </div>
              </div>

              <div class="col-12">
                <img src="<?php echo SITE_URL;?>images/pmkvy.png" class="shortCourse__img">
                <h3 class="col-12 p-0 shortCourse__heading"><?php echo $pmkvy; ?></h3>
              </div>
              <div class="col-12 col-md-7">
                <div class="row mt-4 mb-4">
                    <div class="col-12 col-sm-6 shortCourse__theme__blue">
                    <div>
                      <div class="shortCourse__item osda-bg minheight-auto item--with--solidarrow">
                        <span class="shortCourse__duration"><?php echo $pmkvy1; ?></span>
                      </div>
                      </div>
                      <div>
                      <div class="shortCourse__item">
                        <span class="shortCourse__count">46</span>
                        <span class="shortCourse__duration"><?php echo $pmkvy2; ?></span>
                      </div>
                      </div>
                      <div>
                      <div class="shortCourse__item">
                        <span class="shortCourse__count">176</span>
                        <span class="shortCourse__duration"><?php echo $pmkvy3; ?></span>
                      </div>
                      </div>
                      <div>
                      <div class="shortCourse__item">
                        <span class="shortCourse__count">29,068</span>
                        <span class="shortCourse__duration"><?php echo $pmkvy4; ?></span>
                      </div>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 mt-2 mt-sm-0 shortCourse__theme__pink">
                    <div>
                      <div class="shortCourse__item osda-bg minheight-auto item--with--solidarrow">
                        <span class="shortCourse__duration"><?php echo $pmkvy5; ?></span>
                      </div>
                      </div>
                      <div>
                      <div class="shortCourse__item">
                        <span class="shortCourse__count">12</span>
                        <span class="shortCourse__duration"><?php echo $pmkvy6; ?></span>
                      </div>
                      </div>
                      <div>
                      <div class="shortCourse__item">
                        <span class="shortCourse__count">9961</span>
                        <span class="shortCourse__duration"><?php echo $pmkvy7; ?></span>
                      </div>
                      </div>
                    </div>
                  </div>
              </div>

              <div class="col-12 col-md-5">
                <p><?php echo $pmkvy8; ?></p>
                <div class="table-responsive">
                  <table class="table shortCourse__table">
                    <thead>
                      <tr>
                        <th class="bg-dark text-light"><?php echo $pmkvy9; ?></th>
                        <th class="bg-osdaColor1 text-center"><?php echo $pmkvy10; ?></th>
                        <th class="bg-osdaColor2 text-center"><?php echo $pmkvy11; ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?php echo $pmkvy12; ?></td>
                        <td >31650</td>
                        <td >13584</td>
                      </tr>
                      <tr>
                        <td><?php echo $pmkvy13; ?></td>
                        <td >19107</td>
                        <td >9961</td>
                      </tr>
                      <tr>
                        <td><?php echo $pmkvy14; ?></td>
                        <td >8965</td>
                        <td >112</td>
                      </tr>
                      <tr>
                        <td><?php echo $pmkvy15; ?></td>
                        <td >9192</td>
                        <td >9588</td>
                      </tr>
                      <tr>
                        <td><?php echo $pmkvy16; ?></td>
                        <td >6522</td>
                        <td >7728</td>
                      </tr>
                      <tr>
                        <td><?php echo $pmkvy17; ?></td>
                        <td > 5020</td>
                        <td >6892</td>
                      </tr>
                      <tr>
                        <td><?php echo $pmkvy18; ?></td>
                        <td >627</td>
                        <td >-</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="col-12 mt-4">
                <img src="<?php echo SITE_URL;?>images/PMKK.png" class="shortCourse__img">
                <h3 class="col-12 p-0 shortCourse__heading"><?php echo $pmkk; ?></h3>
              </div>
              <div class="col-12 col-md-4 mt-4 mb-3 mb-sm-4">
                <div class="pie-chart">
                  <img src="<?php echo SITE_URL;?>images/pie.png" alt="pie-chart">
                  <div class="pie-chart__data data--left">
                    <span>29</span>
                    <span><?php echo $pmkk1; ?></span>
                  </div>
                  <div class="pie-chart__data data--right">
                    <span>12</span>
                    <span><?php echo $pmkk2; ?></span>
                  </div>
                </div>
                <div class="shortCourse__report bg-osdaColor1">
                  <span>178</span>
                  <span><?php echo $pmkk3; ?></span>
                </div>
              </div>
              <div class="col-12 col-md-8 mt-sm-4">
                <h4 class="text-secondary"><?php echo $pmkk4; ?></h4>
                <div class="table-responsive">
                  <table class="table table-bordered table-text-nowrap">
                    <thead>
                      <tr class="bg-osdaColor1">
                        <th width="10%"><?php echo $pmkk5; ?></th>
                        <th width="35%"><?php echo $pmkk6; ?></th>
                        <th><?php echo $pmkk7; ?></th>
                        <th><?php echo $pmkk8; ?></th>
                      </tr>
                    </thead>
                    <tbody >
                      <tr>
                        <td>1</td>
                        <td><?php echo $pmkk9; ?></td>
                        <td><?php echo $pmkk10; ?></td>
                        <td><?php echo $pmkk11; ?></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td><?php echo $pmkk12; ?></td>
                        <td><?php echo $pmkk13; ?></td>
                        <td><?php echo $pmkk14; ?></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td><?php echo $pmkk15; ?></td>
                        <td><?php echo $pmkk16; ?></td>
                        <td><?php echo $pmkk17; ?></td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td><?php echo $pmkk18; ?></td>
                        <td><?php echo $pmkk19; ?></td>
                        <td><?php echo $pmkk20; ?></td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td><?php echo $pmkk21; ?></td>
                        <td><?php echo $pmkk22; ?></td>
                        <td><?php echo $pmkk23; ?></td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td><?php echo $pmkk24; ?></td>
                        <td><?php echo $pmkk25; ?></td>
                        <td><?php echo $pmkk26; ?></td>
                      </tr>
                      <tr>
                        <td>7</td>
                        <td><?php echo $pmkk27; ?></td>
                        <td><?php echo $pmkk28; ?></td>
                        <td><?php echo $pmkk29; ?></td>
                      </tr>
                      <tr>
                        <td>8</td>
                        <td><?php echo $pmkk30; ?></td>
                        <td><?php echo $pmkk31; ?></td>
                        <td><?php echo $pmkk32; ?></td>
                      </tr>
                      <tr>
                        <td>9</td>
                        <td><?php echo $pmkk33; ?></td>
                        <td><?php echo $pmkk34; ?></td>
                        <td><?php echo $pmkk35; ?></td>
                      </tr>
                      <tr>
                        <td>10</td>
                        <td><?php echo $pmkk36; ?></td>
                        <td><?php echo $pmkk37; ?></td>
                        <td><?php echo $pmkk38; ?></td>
                      </tr>
                      <tr>
                        <td>11</td>
                        <td><?php echo $pmkk39; ?></td>
                        <td><?php echo $pmkk40; ?></td>
                        <td><?php echo $pmkk41; ?></td>
                      </tr>
                      <tr>
                        <td>12</td>
                        <td><?php echo $pmkk42; ?></td>
                        <td><?php echo $pmkk43; ?></td>
                        <td><?php echo $pmkk44; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div id="tab4" class="tab-pane fade">
          <div class="award award--right">
            <div class="award__media">
              <img src="<?php echo SITE_URL;?>images/award1.jpg" alt="award">  
            </div>
            <div class="award__detail">
              <div class="award__icon"><img src="<?php echo SITE_URL;?>images/trophy-icon.png" alt="Trophy"></div>
              <h3 class="award__heading"><?php echo $award1; ?></h3>
              <p><?php echo $award2; ?></p>
            </div>
          </div>
          <div class="award award--left">
            <div class="award__media">
              <img src="<?php echo SITE_URL;?>images/award2.jpg" alt="award">  
            </div>
            <div class="award__detail">
              <div class="award__icon"><img src="<?php echo SITE_URL;?>images/trophy-icon.png" alt="Trophy"></div>
              <h3 class="award__heading"><?php echo $award3; ?></h3>
              <p><?php echo $award4; ?></p>
            </div>
          </div>
          <div class="award award--right">
            <div class="award__media">
              <img src="<?php echo SITE_URL;?>images/award3.jpg" alt="award">  
            </div>
            <div class="award__detail">
              <div class="award__icon"><img src="<?php echo SITE_URL;?>images/trophy-icon.png" alt="Trophy"></div>
              <h3 class="award__heading"><?php echo $award5; ?></h3>
              <p><?php echo $award6; ?></p>
            </div>
          </div>
          
          
          <div class="award award--left">
            <div class="award__media">
              <img src="<?php echo SITE_URL;?>images/award4.jpg" alt="award">  
            </div>
            <div class="award__detail">
              <div class="award__icon"><img src="<?php echo SITE_URL;?>images/trophy-icon.png" alt="Trophy"></div>
              <h3 class="award__heading"><?php echo $award7; ?></h3>
              <p><?php echo $award8; ?></p>
            </div>
          </div>
          
          
          <div class="award award--right">
            <div class="award__media">
              <img src="<?php echo SITE_URL;?>images/award5.jpg" alt="award">  
            </div>
            <div class="award__detail">
              <div class="award__icon"><img src="<?php echo SITE_URL;?>images/trophy-icon.png" alt="Trophy"></div>
              <h3 class="award__heading"><?php echo $award9; ?></h3>
              <p><?php echo $award10; ?></p>
            </div>
          </div>
          

          
          
          
<!--
          <div class="award award--right">
            <div class="award__media">
              <img src="<?php echo SITE_URL;?>images/award5.jpg" alt="award">  
            </div>
            <div class="award__detail">
              <div class="award__icon"><img src="<?php echo SITE_URL;?>images/trophy-icon.png" alt="Trophy"></div>
              <h3 class="award__heading">SKOCH ORDER</h3>
              <p>SKOCH ORDER – of MERIT for Skill Development Initiatives – India’s Best Governance Projects-2014</p>
            </div>
          </div>
-->
        </div>

        <div id="tab5" class="tab-pane fade">
          <h3 class="mb-3"><?php echo $employeer; ?></h3>
          <div class="grid employer">
            <div class="grid__item">
              <div class="grid__media">
                <img src="<?php echo SITE_URL;?>images/tata.jpg" alt="Employer">
              </div>
              <span class="employer__location"><?php echo $employeer1; ?></span>
            </div>
            <div class="grid__item">
              <div class="grid__media">
                <img src="<?php echo SITE_URL;?>images/suzuki.jpg" alt="Employer">
              </div>
              <span class="employer__location"><?php echo $employeer2; ?></span>
            </div>
            <div class="grid__item">
              <div class="grid__media">
                <img src="<?php echo SITE_URL;?>images/itc.jpg" alt="Employer">
              </div>
              <span class="employer__location"><?php echo $employeer3; ?></span>
            </div>
            <div class="grid__item">
              <div class="grid__media">
                <img src="<?php echo SITE_URL;?>images/piaggio.jpg" alt="Employer">
              </div>
              <span class="employer__location"><?php echo $employeer4; ?></span>
            </div>
            <div class="grid__item">
              <div class="grid__media">
                <img src="<?php echo SITE_URL;?>images/honda.jpg" alt="Employer">
              </div>
              <span class="employer__location"><?php echo $employeer5; ?></span>
            </div>
          </div>

          <h3 class="mb-3 mt-5"><?php echo $employeer6; ?></h3>
          <div class="grid employer">
            <div class="grid__item">
              <div class="grid__media">
                <img src="<?php echo SITE_URL;?>images/shasi.jpg" alt="Employer">
              </div>
              <span class="employer__location"><?php echo $employeer7; ?></span>
            </div>
            <div class="grid__item">
              <div class="grid__media">
                <img src="<?php echo SITE_URL;?>images/takahata.jpg" alt="Employer">
              </div>
              <span class="employer__location"><?php echo $employeer8; ?></span>
            </div>
            <div class="grid__item">
              <div class="grid__media">
                <img src="<?php echo SITE_URL;?>images/aegis.jpg" alt="Employer">
              </div>
              <span class="employer__location"><?php echo $employeer9; ?></span>
            </div>
            <div class="grid__item">
              <div class="grid__media">
                <img src="<?php echo SITE_URL;?>images/Eureka.jpg" alt="Employer">
              </div>
              <span class="employer__location"><?php echo $employeer10; ?></span>
            </div>
            <div class="grid__item">
              <div class="grid__media">
                <img src="<?php echo SITE_URL;?>images/Welspun.jpg" alt="Employer">
              </div>
              <span class="employer__location"><?php echo $employeer11; ?></span>
            </div>
            <div class="grid__item">
              <div class="grid__media">
                <img src="<?php echo SITE_URL;?>images/westside.jpg" alt="Employer">
              </div>
              <span class="employer__location"><?php echo $employeer12; ?></span>
            </div>
            <div class="grid__item">
              <div class="grid__media">
                <img src="<?php echo SITE_URL;?>images/tatwa.jpg" alt="Employer">
              </div>
              <span class="employer__location"><?php echo $employeer13; ?></span>
            </div>
            <div class="grid__item">
              <div class="grid__media">
                <img src="<?php echo SITE_URL;?>images/poimtec.jpg" alt="Employer">
              </div>
              <span class="employer__location"><?php echo $employeer14; ?></span>
            </div>
            <div class="grid__item">
              <div class="grid__media">
                <img src="<?php echo SITE_URL;?>images/CafeCoffeeDay.jpg" alt="Employer">
              </div>
              <span class="employer__location"><?php echo $employeer15; ?></span>
            </div>
            <div class="grid__item">
              <div class="grid__media">
                <img src="<?php echo SITE_URL;?>images/Sista.jpg" alt="Employer">
              </div>
              <span class="employer__location"><?php echo $employeer16; ?></span>
            </div>
            <div class="grid__item">
              <div class="grid__media">
                <img src="<?php echo SITE_URL;?>images/vardhman.jpg" alt="Employer">
              </div>
              <span class="employer__location"><?php echo $employeer17; ?></span>
            </div>
            <div class="grid__item">
              <div class="grid__media">
                <img src="<?php echo SITE_URL;?>images/orient.jpg" alt="Employer">
              </div>
              <span class="employer__location"><?php echo $employeer18; ?></span>
            </div>
            <div class="grid__item">
              <div class="grid__media">
                <img src="<?php echo SITE_URL;?>images/trent.jpg" alt="Employer">
              </div>
              <span class="employer__location"><?php echo $employeer19; ?></span>
            </div>
          </div>

        </div>
      </div>
        
    </div>
</section>

<!--end:: contarea-->



<!--start::Footer-->
<?php include 'include/footer.php' ?>






</body>
</html>
