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
<script language="javascript" type="text/javascript" href="<?php echo SITE_URL; ?>js/jquery.min_3.2.1.js"></script>
<script src="<?php echo SITE_URL; ?>js/custom.js" type="text/javascript"></script>
<script src="<?php echo SITE_URL; ?>js/loadAjax.js" type="text/javascript"></script>
<!--start:: contarea-->


<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript" >
  var sectorN = "<?php echo $sectorName;?>";
  var noOfCourses = "<?php echo $noOfCourses;?>";
  var noOfITI  = "<?php echo $noOfITIInstitute;?>";
  var institute = "<?php echo $institute;?>";
  var courses = " <?php echo $coursesName;?>";
  var pltp = "<?php echo $pltp;?>";
  var ddugky  = "<?php echo $ddu;?>";
  var pmkvy1 = "<?php echo $pmkvy;?>";
  var pmkk1 = " <?php echo $pmkk;?>";
  var scheme  ="<?php echo $scheme;?>";
  sectorWiseCourses('Sector','<?php echo $sectorWise;?>');
  districtWiseITIInstitute('ITIInstitute','<?php echo $districtWise;?>');
  maintenanceStatusPai('piechartcustom','<?php echo $schemeWise;?>');
</script>
<style>
.card{border-top: 5px solid #83398c;box-shadow: 0 1px 17px #a5a2a280;padding: 10px;border-radius: 20px;margin-bottom: 10px;}
.highcharts-credits{display: none;}
.disclaimer{font-size: 20px;text-align: right;color: #565656;font-weight: bold;}
.disclaimer span{ color: #f00;font-size: 21px;padding-top: 20px;margin-right: 5px;}
.scrool-height{height: 400px;overflow-x: auto;}

	
	
.fix-width {overflow-y: hidden!important;overflow-x: auto !important;}


#ITIInstitute{width: 1050px;}	
#DistrictInstitute{width: 1050px;}	
	
.odiaGraph  g text, .odiaGraph tspan {font-family: AkrutiOriChandraUnicode!important;}
	
	
</style>
<?php if($_SESSION['lang'] == 'O') {?>

<section class="container contarea odiaGraph">
  <?php } else {?>
    <section class="container contarea">
  <?php } ?>

  <div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="scrool-height">
          <div id="Sector" style="width: 100%; height: 700px; margin: 0 auto"></div>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div id="YouthTrained" style="width: 100%; height: 400px; margin: 0 auto"></div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-sm-12">
      <div class="card">
		  <div class="fix-width">
			<div id="ITIInstitute"></div>
		  </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-sm-6">
      <div class="card">
        <div id="noOfInstitute" style="width: 100%; height: 400px; margin: 0 auto"></div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div id="piechartcustom" style="width: 100%; height: 400px; margin: 0 auto"></div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-sm-12">
      <div class="card">
       <div class="fix-width">
        <div id="DistrictInstitute"></div>
      </div>
      </div>
    </div>
  </div>


<div class="statistics__info pt-5"> 
              <div class="statistics__info__container four-col center--list">
        <!-- <img src="<?php echo SITE_URL;?>images/training.png" alt="training">-->
                  <span>04</span>
                  <p><?php echo $skilled1; ?></p>
                  <a href="javascript:void(0);" title="" data-toggle="modal" data-target="#centerList3"><?php echo $skilledlistbtn; ?></a>
              </div>
              
              <div class="statistics__info__container four-col center--list">
                  <span>32</span>
                  <p><?php echo $skilled4; ?></p>
                  <a href="javascript:void(0);" title="" data-toggle="modal" data-target="#centerList1"><?php echo $skilledlistbtn; ?></a>
              </div>
              <div class="statistics__info__container four-col center--list">
                  <span>38</span>
                  <p><?php echo $skilled5; ?></p>
                  <a href="javascript:void(0);" title="" data-toggle="modal" data-target="#centerList2"><?php echo $skilledlistbtn; ?></a>
              </div>

              <div class="statistics__info__container four-col center--list">
                  <span>05</span>
                  <p><?php echo $specialtraininginstitute; ?></p>
                  <a href="javascript:void(0);" title="" data-toggle="modal" data-target="#centerList4"><?php echo $skilledlistbtn; ?></a>
              </div>

      <p class="disclaimer"> <span>*</span><?php echo $dataAsOn;?></p>    
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
                    <h5 class="modal-title"><?php echo $skilled5; ?></h5>
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
                            <th><?php echo $sdc107; ?></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td><?php echo $sdc7; ?></td>
                            <td> <?php echo $sdc69; ?></td>
                          </tr>
                          <tr>
                            <td rowspan="2">2</td>
                            <td rowspan="2"><?php echo $sdc9; ?></td>
                            <td> <?php echo $sdc70; ?></td>
                          </tr>
                          <tr>
                            <td><?php echo $sdc71; ?></td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td><?php echo $sdc13; ?></td>
                            <td><?php echo $sdc72; ?></td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td><?php echo $sdc31; ?></td>
                            <td><?php echo $sdc73; ?></td>
                          </tr>
                          <tr>
                            <td rowspan="2">5</td>
                            <td rowspan="2"><?php echo $sdc55; ?></td>
                            <td><?php echo $sdc74; ?></td>
                          </tr>
                          <tr>
                            <td><?php echo $sdc75; ?></td>
                          </tr>
                          <tr>
                            <td>6</td>
                            <td><?php echo $sdc57; ?></td>
                            <td><?php echo $sdc76; ?></td>
                          </tr>
                          <tr>
                            <td>7</td>
                            <td><?php echo $sdc33; ?></td>
                            <td><?php echo $sdc77; ?></td>
                          </tr>
                          <tr>
                            <td>8</td>
                            <td><?php echo $sdc41; ?></td>
                            <td><?php echo $sdc78; ?></td>
                          </tr>
                          <tr>
                            <td>9</td>
                            <td><?php echo $sdc15; ?></td>
                            <td><?php echo $sdc79; ?></td>
                          </tr>
                          <tr>
                            <td rowspan="2">10</td>
                            <td rowspan="2"><?php echo $sdc43; ?></td>
                            <td><?php echo $sdc80; ?></td>
                          </tr>
                          <tr>
                            <td><?php echo $sdc81; ?></td>
                          </tr>
                          <tr>
                            <td>11</td>
                            <td><?php echo $sdc11; ?></td>
                            <td><?php echo $sdc82; ?></td>
                          </tr>
                          <tr>
                            <td>12</td>
                            <td><?php echo $sdc19; ?></td>
                            <td><?php echo $sdc83; ?></td>
                          </tr>
                          <tr>
                            <td>13</td>
                            <td><?php echo $sdc21; ?></td>
                            <td><?php echo $sdc84; ?></td>
                          </tr>
                          <tr>
                            <td>14</td>
                            <td><?php echo $sdc45; ?></td>
                            <td><?php echo $sdc85; ?></td>
                          </tr>
                          <tr>
                            <td rowspan="2">15</td>
                            <td rowspan="2"><?php echo $sdc17; ?></td>
                            <td><?php echo $sdc86; ?></td>
                          </tr>
                          <tr>
                            <td><?php echo $sdc87; ?></td>
                          </tr>
                          <tr>
                            <td>16</td>
                            <td><?php echo $sdc61; ?></td>
                            <td><?php echo $sdc88; ?></td>
                          </tr>
                          <tr>
                            <td rowspan="2">17</td>
                            <td rowspan="2"><?php echo $sdc29; ?></td>
                            <td><?php echo $sdc89; ?></td>
                          </tr>
                          <tr>
                            <td><?php echo $sdc90; ?></td>
                          </tr>
                          <tr>
                            <td rowspan="2">18</td>
                            <td rowspan="2"><?php echo $sdc39; ?></td>
                            <td><?php echo $sdc91; ?></td>
                          </tr>
                          <tr>
                            <td><?php echo $sdc92; ?></td>
                          </tr>
                          <tr>
                            <td rowspan="2">19</td>
                            <td rowspan="2"><?php echo $sdc47; ?></td>
                            <td><?php echo $sdc93; ?></td>
                          </tr>
                          <tr>
                            <td><?php echo $sdc94; ?></td>
                          </tr>
                          <tr>
                            <td>20</td>
                            <td><?php echo $sdc35; ?></td>
                            <td><?php echo $sdc95; ?></td>
                          </tr>
                          <tr>
                            <td>21</td>
                            <td><?php echo $sdc59; ?></td>
                            <td><?php echo $sdc96; ?></td>
                          </tr>
                          <tr>
                            <td>22</td>
                            <td><?php echo $sdc27; ?></td>
                            <td><?php echo $sdc97; ?></td>
                          </tr>
                          <tr>
                            <td rowspan="3">23</td>
                            <td rowspan="3"><?php echo $sdc25; ?></td>
                            <td><?php echo $sdc98; ?></td>
                          </tr>
                          <tr>
                            <td><?php echo $sdc99; ?></td>
                          </tr>
                          <tr>
                            <td><?php echo $sdc100; ?></td>
                          </tr>
                          <tr>
                            <td>24</td>
                            <td><?php echo $sdc5; ?></td>
                            <td><?php echo $sdc101; ?></td>
                          </tr>
                          <tr>
                            <td rowspan="2">25</td>
                            <td rowspan="2"><?php echo $sdc53; ?></td>
                            <td><?php echo $sdc102; ?></td>
                          </tr>
                          <tr>
                            <td><?php echo $sdc103; ?></td>
                          </tr>
                          <tr>
                            <td>26</td>
                            <td><?php echo $sdc49; ?></td>
                            <td><?php echo $sdc104; ?></td>
                          </tr>
                          <tr>
                            <td rowspan="2">27</td>
                            <td rowspan="2"><?php echo $sdc63; ?></td>
                            <td><?php echo $sdc105; ?></td>
                          </tr>
                          <tr>
                            <td><?php echo $sdc106; ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <a href="<?php echo SITE_URL;?>downloads/Skill_Development_Extension_Centres.pdf" target="_blank" class="btn btn-success"> Download</a>
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

             <div class="modal fade" id="centerList4" tabindex="-1" role="dialog" aria-labelledby="centerList4" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title"><?php echo $specialtraininginstitute; ?></h5>
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
                            <th><?php echo $specialtraininginstitute; ?></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td> <a href="https://www.cipet.gov.in/centres/cipet-bhubaneswar/introduction.php" target="_blank"><?php echo $stiadress; ?></a></td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td> <a href="https://www.cttc.gov.in/" target="_blank"><?php echo $stiadress2; ?></a></td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td><a href="http://hmvdti.com/" target="_blank"> <?php echo $stiadress4; ?></a></td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td> <a href="https://www.sihmbalangir.org/" target="_blank"><?php echo $stiadress6; ?></a></td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td><a href="https://www.cipet.gov.in/centres/cipet-balasore/introduction.php" target="_blank"> <?php echo $stiadress8; ?></a></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </div>

</section>

<!--end:: contarea-->



<!--start::Footer-->
<?php include 'include/footer.php' ?>



<script>
  $(function() {
    Highcharts.setOptions({
        chart: {
            style: {
                fontFamily: 'Roboto Condensed'
            }
        },
        lang: {
            thousandsSep: ',',
            numericSymbols: [" k" , " M" , " B" , " T" , "P" , "E"]
        }
    });

    // Create the chart
    Highcharts.chart('noOfInstitute', {
      chart: {
        type: 'pie'
      },
      title: {
        text: '<?php echo $insTypeDist ;?>'
      },
     /* plotOptions: {
        series: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
          enabled: false
          },
          showInLegend: true
        }
      },*/
      plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y}'
            }
        }
    },


      /*tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span>'
            },*/

       tooltip: {
        formatter: function (tooltip) {
          
            if (this.point.name=='<?php echo $other;?>') {
               //console.log(this.point);
                return '<span style="font-size:12px"><strong><?php echo $degree;?>:882</strong></span><br><span style="font-size:12px"><strong><?php echo $engineering;?>:98</strong></span><br><span style="font-size:12px"><strong><?php echo $nurshing;?>:45</strong></span><br><span style="font-size:12px"><strong><?php echo $hotel;?>:13</strong></span>';
            }
            return '<span style="font-size:10px"><b>'+this.point.name+':'+this.point.y+'</b></span>';
        }
    },      

      series: [{
        name: "",
        colorByPoint: true,
        data: [{
            name: "<?php echo $ITIs;?> ",
            y: 578,
            drilldown: "<?php echo $ITIs;?>"
          },
          {
            name: "<?php echo $polytechnic;?> ",
            y: 165,
            drilldown: "<?php echo $polytechnic;?>"
          },
          /*
          {
            name: "<?php echo $engineering;?> ",
            y: 940,
            drilldown: "<?php echo $engineering;?>"
          },
          {
            name: "<?php echo $degree;?> ",
            y: 882,
            drilldown: "<?php echo $degree;?>"
          },
          {
            name: "<?php echo $hotel;?> ",
            y: 13,
            drilldown: "<?php echo $hotel;?>"
          },
          {
            name: "<?php echo $nurshing;?> ",
            y: 45,
            drilldown: "<?php echo $nurshing;?>"
          },*/
          {
            name: "<?php echo $trainingCenter;?> ",
            y: 385,
            drilldown: "<?php echo $trainingCenter;?>"
          },{
            name: "<?php echo $other;?>",
            y: 1038,
            drilldown: "<?php echo $other;?>"
          }
        ]
      }]
    });


    Highcharts.chart('YouthTrained', {
      chart: {
        type: 'column'
      },
      title: {
        text: '<?php echo $youthWise; ?>'
      },
      xAxis: {
        type: 'category',
        labels: {
          rotation: -45,
          style: {
            fontSize: '13px',
            fontFamily: 'Verdana, sans-serif'
          }
        }
      },
      yAxis: {
        min: 0,
        title: {
          text: '<strong><?php echo $youthtrained ;?></strong>',
        }
      },
      legend: {
        enabled: false
      },
      series: [{
        color:'#EE1E5A',
        name: '<?php echo $youthtrained ;?>',
        data: [
          ['2014-15', 97238],
          ['2015-16', 249679],
          ['2016-17', 122492],
          ['2017-18', 225858],
          ['2018-19', 189299],
          ['2019-20', 327815],
          ['2020-21', 76142],
          ['2021-22', 103008]
        ],
        dataLabels: {
          enabled: false,
          rotation: -90,
          color: '#000',
          align: 'right',
          y: 10, 
          style: {
            fontSize: '13px',
            fontFamily: 'Verdana, sans-serif'
          }
        }
      }]
    });

    Highcharts.chart('DistrictInstitute', {
      chart: {
        type: 'column'
      },
      title: {
        text: '<?php echo $districtPre;?>'
      },
      xAxis: {
        categories: ['<?php echo $dist1;?>', '<?php echo $dist2;?>', '<?php echo $dist3;?>', '<?php echo $dist4;?>', '<?php echo $dist5;?>', '<?php echo $dist6;?>', '<?php echo $dist7;?>', '<?php echo $dist8;?>', '<?php echo $dist9;?>', '<?php echo $dist10;?>', '<?php echo $dist11;?>', '<?php echo $dist12;?>', '<?php echo $dist13;?>', '<?php echo $dist14;?>', '<?php echo $dist15;?>', '<?php echo $dist16;?>', '<?php echo $dist17;?>', '<?php echo $dist18;?>', '<?php echo $dist19;?>', '<?php echo $dist20;?>', '<?php echo $dist21;?>', '<?php echo $dist22;?>', '<?php echo $dist23;?>', '<?php echo $dist24;?>', '<?php echo $dist25;?>', '<?php echo $dist26;?>', '<?php echo $dist27;?>', '<?php echo $dist28;?>', '<?php echo $dist29;?>', '<?php echo $dist30;?>'],
        crosshair: true,
        title: {
            text: '<strong><?php echo $districtName;?></strong>'
          }
      },
      yAxis: {
        tickInterval : 5,
        min: 0,
        title: {
          text: '<strong><?php echo $noOfInstitute;?></strong>',
        }
      },
      /*tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
      },*/
      plotOptions: {
        column: {
          pointPadding: 0.2,
          borderWidth: 0
        }
      },
      series: [{
        name: '<?php echo $ITIs;?> (578)',
        data: [32, 50, 11, 29, 11, 2, 41, 3, 19, 5, 39, 19, 32, 7, 5, 2, 18, 22, 51, 17, 3, 53, 5, 12,4, 21, 14, 11, 2, 38]
      }, {
        name: '<?php echo $polytechnic;?> (165)',
        data: [9, 12, 3, 4, 2, 1, 14, 1, 6, 1, 11, 1, 3, 2, 2, 2, 2, 2, 48, 7, 1, 8, 1, 3, 2, 2, 5, 2, 1, 7]
      }, {
        name: '<?php echo $engineering;?> (98)',
        data: [1, 4, 2, 1, 0, 0, 3, 0, 2, 0, 9, 0, 0, 1, 1, 0, 0, 1, 59, 2, 0, 1, 0, 0, 0, 1, 4, 2, 0, 4]
      },{
        name: '<?php echo $degree;?> (882)',
        data: [25, 50, 33, 29, 39, 7, 62, 9, 33, 11, 61, 18, 44, 10, 32, 15, 31, 35, 67, 19, 9, 53, 9, 27, 12, 47, 13,21, 20, 41]
      }, {
        name: '<?php echo $hotel;?> (13)',
        data: [0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0]
      }, {
        name: '<?php echo $nurshing;?> (45)',
        data: [1, 1, 0, 0, 2, 0, 6, 0, 0, 2, 3, 0, 0, 1, 0, 0, 0, 0, 23,0, 0, 0, 0, 0, 1, 1, 0, 3, 0, 1]
      }, {
        name: '<?php echo $trainingCenter;?> (385)',
        data: [7, 23, 3, 11, 13, 1, 44, 3, 7, 5, 44, 10, 16, 3, 6, 2, 3, 9, 86, 8, 0, 13, 5, 10, 3, 9, 8, 11, 4, 18]
      }]
    });
  });
</script>

</body>

</html>