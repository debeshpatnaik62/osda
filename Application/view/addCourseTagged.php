<?php
/* ================================================
  File Name                 : addCourseTagged.php
  Description               : This is used for add course tagged details.
  Designed By               :
  Designed On               :
  Developed By		        : Rahul Kumar Saw
  Developed On		        : 02-August-2019
  Update History            :	<Updated by>		<Updated On>		<Remarks>

  Style sheet               : 
  Javscript Functions       :  validatorchklist.js
  includes                  :   util.php,addCourseTaggedInner.php			  :

  ================================================== */
    require("addCourseTaggedInner.php");
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
    $(document).ready(function () {
        loadNavigation('<?php echo $strTab; ?> Course Details');
        pageHeader   = "<?php echo $strTab; ?> Course Details";
        strFirstLink = "Manage Application";
        strLastLink  = "Course Tagged Details";
        
        indicate = 'yes';
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php 
            } 
        ?>
        
        //fill the education details
        //fillCourse('<?php echo $intOsda; ?>','ddlOsda',0);
        
        //fill the education details
        //fillSAMSCourse('<?php echo $intType; ?>','ddlSams',11);

        //fillMappingCourse('<?php echo $strMappingCOde;?>','ddlMappingData','NIC');   

   });
   
    //function to validate the form    
    function validator(){

        if(!selectDropdown('ddlOsda', 'Select OSDA Course'))
            return false;  
        if(!selectDropdown('ddlSams', 'Select SAMS Course'))
            return false;       
    }
$('#frmOGP').on('submit', function() {
    $('.selSamsTagged').prop('disabled', false);
});
</script>

<div class="page-content">
    <div class="page-header">
        <h1 id="title"></h1>
    </div>
    <div class="row">
        <div class="col-xs-12"> 
            <!-- PAGE CONTENT BEGINS -->
            <div class="top_tab_container"> 
                <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab; ?></a> 
               <a href="<?php echo APP_URL; ?>taggedSamsPolitecnic/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">SAMS Politechnic Tag</a>
               <!-- <a href="<?php echo APP_URL; ?>taggedNICCourse/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">NIC Course tag</a> -->  
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>

        <div id="viewTagged">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
              <th><label>Sl. No.</label>
                <span class="red">*</span> 
              </th>
              <th><label>SAMS ITI Course</label>
                <span class="red">*</span> 
              </th>
              <th ><label>OSDA Course</label>
                <span class="red">*</span> 
              </th>          
            </tr>
            </thead>
            <tbody id="appendTr">
              <?php 
              for($k=1;$k<=count($samsCourseName);$k++){
                //print_r($samsCourseName);?>  

                <tr class="addTr">
                  <td width="10">

                  <?php echo $k;?></td>
                  <td width="250">
                <select  id="ddlSams<?php echo $k;?>" class="form-control ddlSams selSamsTagged" name="ddlSams[]" disabled>
                  <option value="0">--Select--</option>
                  <?php 
                  $a = 1;
                    for ($j = 0; $j < count($samsCourseName); $j++) 
                    {


                     $intSelval     = ($k<=count($resultArray))?$resultArray[$k]['samsval']:0;
                     $intCourseId   = $samsCourseName[$j]['intSamsCourseId'];
                     $strCourseName = $samsCourseName[$j]['strInsNameE'];

                     $select="";
                      if ($k==$a)
                      {
                        $select        ='selected="selected"';
                     }
                        

                     $a++;

                     $courseName    = '<option value="'.$intCourseId.'"'.$select.' >'.$strCourseName.'</option>';
                     echo $courseName;
            } ?> 
                </select></td>
                <td width="250">
                <select  id="ddlOsda<?php echo $k;?>" class="form-control ddlOsda" name="ddlOsda[]">
                  <option value="0">--Select--</option>
                  <?php 
                  for ($i = 0; $i < count($courseArray); $i++) {

                     //$intSelval2     = ($k<=count($resultArray))?$resultArray[$k]['osdaVal']:0;
                    $intSelval     = ($resultArray[$samsCourseName[$k-1]['intSamsCourseId']]['osdaVal'] > 0)?$resultArray[$samsCourseName[$k-1]['intSamsCourseId']]['osdaVal']:0;
                     $intCourseId   = $courseArray[$i]['intCourseId'];
                     $strCourseName = $courseArray[$i]['strCourseName'];
                    $select         = ($intCourseId==$intSelval)?'selected="selected"':'';
                    $courseName     = '<option value="'.$intCourseId.'"'.$select.' >'.$strCourseName.'</option>';
                    echo $courseName;
            } ?>  
                </select></td>
                </tr>
              <?php }?>


          </tbody>
        </table>

        </div>
        <div class="form-group">
                    <div class="col-sm-2 no-padding-right"></div>
                    <div class="col-sm-4">
                        <input type="submit" id="btnSubmit" name="btnSubmit" value="<?php echo $strSubmit; ?>" class="btn btn-success" onclick="return validator();"/>
                        <input type="reset" id="btnReset" name="btnReset"  class="btn btn-danger" value="<?php echo $strReset; ?>" onclick="<?php echo $strclick; ?>" />
                        <input type="hidden" name ="hiddenITI" value="1"/>
                    </div>
                </div>


            <div class="hr hr32 hr-dotted"></div>
            <!-- PAGE CONTENT ENDS --> 
        </div>
        <!-- /.col --> 
    </div>

<!-- 
<script language="javascript">
    $(document).ready(function () {

      fillCourse('','ddlOSDA',0);
        
   });

 </script>
  <div class="clearfix"></div>
  <div id ="duplicate" name="duplicate">
    <div class="searchTable">
                    <div class="form-group"> 
                         <label class="col-sm-1 control-label no-padding-right" for="ddlOSDA">OSDA Course</label>
                        <div class="col-sm-3">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlOSDA" id="ddlOSDA" >
                            <option value="0">- Select -</option>
                        </select>            
                    </div>
                            <div class="col-sm-2">
                                <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                            </div>       
                    </div>                     
                </div>

    <div id="viewTable">
                    <?php if (mysqli_num_rows($result) > 0) {
                        $ctr =0;
                        ?>
                        <table class="table  table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="20">Sl.#</th>
                                    <th>OSDA Course</th>  
                                    <th>SAMS Course</th> 
                                    <th >NIC Course</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    $ctr++;
                                    ?>
                                    <tr>
                                        <td><?php echo $ctr; ?></td>
                                        <td> 
                                        <?php echo htmlspecialchars_decode(stripslashes($row['osdaCourse']), ENT_QUOTES); ?>
                                        </td>  

                                        <td> 
                                        <?php echo htmlspecialchars_decode(stripslashes($row['samsCourse']), ENT_QUOTES); ?>
                                        </td> 
                                        <td> 
                                        <?php echo htmlspecialchars_decode(stripslashes($row['nicCourse']), ENT_QUOTES); ?>
                                        </td> 
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
  </div> -->



    <!-- /.row --> 
</div>
<!-- /.page-content --> 

