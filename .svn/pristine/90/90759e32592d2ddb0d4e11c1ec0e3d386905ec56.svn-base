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
    require("addSAMSPOLInstituteInner.php");

?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
    $(document).ready(function () {
        loadNavigation('<?php echo $strTab; ?> Details');
        pageHeader   = "<?php echo $strTab; ?> Details";
        strFirstLink = "Manage Institutions";
        strLastLink  = "SAMS Institute Tag Details";
        
        indicate = 'yes';
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php 
            } 
        ?>

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
                 
               <a href="<?php echo APP_URL; ?>addSAMSInstitute/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">SAMS ITI Institute Tag</a>
               <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab; ?></a>
               <!-- <a href="<?php echo APP_URL; ?>taggedNICCourse/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">NIC Course tag</a>  --> 
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
              <th><label>SAMS Polytechnic Institute</label>
                <span class="red">*</span> 
              </th>
              <th ><label>OSDA Polytechnic Institute</label>
                <span class="red">*</span> 
              </th>          
            </tr>
            </thead>
            <tbody id="appendTr">
              <?php 
              for($k=1;$k<=count($samsInstituteName);$k++){
               ?>  

                <tr class="addTr">
                  <td width="10">

                  <?php echo $k;?></td>
                  <td width="250">
                <select  id="ddlSams<?php echo $k;?>" class="form-control ddlSams selSamsTagged" name="ddlSams[]" disabled >
                  <option value="0">--Select--</option>
                  <?php 
                  $a = 1;
                  //echo"hii");
                    for ($j = 0; $j < count($samsInstituteName); $j++) 
                    {


                     //$intSelval     = ($k<=count($resultArray))?$resultArray[$k]['samsval']:0;
                     $intInstituteId   = $samsInstituteName[$j]['intInstituteSamsCode'];
                     $strInstituteName = $samsInstituteName[$j]['strInsNameE'];

                     $select="";
                      if ($k==$a)
                      {
                        $select        ='selected="selected"';
                     }                       

                     $a++;

                     $instituteName    = '<option value="'.$intInstituteId.'"'.$select.' >'.$strInstituteName.'</option>';
                     echo $instituteName;
            } ?> 
                </select></td>
                <td width="250">
                <select  id="ddlOsda<?php echo $k;?>" class="form-control ddlOsda" name="ddlOsda[]">
                  <option value="0">--Select--</option>
                  <?php 
                  for ($i = 0; $i < count($instituteNameArray); $i++) {

                     //$intSelval2     = ($k<=count($resultArray))?$resultArray[$k]['osdaVal']:0;
                    $intSelval     = ($resultArray[$samsInstituteName[$k-1]['intInstituteSamsCode']]['osdaVal'] > 0)?$resultArray[$samsInstituteName[$k-1]['intInstituteSamsCode']]['osdaVal']:0;
                     $intInstituteId   = $instituteNameArray[$i]['intInstituteId'];
                     $strInstituteName = $instituteNameArray[$i]['strInstituteName'];
                    
                    $select         = ($intInstituteId==$intSelval)?'selected="selected"':'';
                    $instituteName     = '<option value="'.$intInstituteId.'"'.$select.' >'.$strInstituteName.'</option>';
                    echo $instituteName;
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
                        <input type="hidden" name ="hiddenITI" value="2"/>
                    </div>
                </div>


            <div class="hr hr32 hr-dotted"></div>
            <!-- PAGE CONTENT ENDS --> 
        </div>
        <!-- /.col --> 
    </div>



    <!-- /.row --> 
</div>
<!-- /.page-content --> 

