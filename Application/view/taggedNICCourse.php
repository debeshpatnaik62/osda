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
    require("taggedNICCourseInner.php");
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
        

        //fillMappingCourse('<?php echo $strMappingCOde;?>','ddlMappingData','NIC');   

   });
   
    //function to validate the form    
    function validator(){

        if(!selectDropdown('ddlOsda', 'Select OSDA Course'))
            return false;  
        if(!selectDropdown('ddlSams', 'Select SAMS Course'))
            return false;       
    }

</script>

<div class="page-content">
    <div class="page-header">
        <h1 id="title"></h1>
    </div>
    <div class="row">
        <div class="col-xs-12"> 
            <!-- PAGE CONTENT BEGINS -->
            <div class="top_tab_container"> 
               <a href="<?php echo APP_URL; ?>addCourseTagged/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">SAMS ITI Tag</a>
                <a href="<?php echo APP_URL; ?>taggedSamsPolitecnic/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">SAMS Politechnic Tag</a>
                <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab; ?></a>
               
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
              <th ><label>OSDA Course</label>
                <span class="red">*</span> 
              </th>
              <th><label>NIC Course</label>
                 <span class="red">*</span>  
              </th>             
            </tr>
            </thead>
            <tbody id="appendTr">
            <?php 
              for($k=1;$k<count($courseArray);$k++){?>
                <tr class="addTr">
                  <td width="10">

                  <?php echo $k;?>
                    
                  </td>
                <td width="250">
                <select  id="ddlOsda<?php echo $k;?>" class="form-control ddlOsda" name="ddlOsda[]">
                  <option value="0">--Select--</option>
                  <?php 
                  $a=1;
                  for ($i = 0; $i < count($courseArray); $i++) {

                    $intSelval      = $osdaVal;
                     $intCourseId   = $courseArray[$i]['intCourseId'];
                     $strCourseName = $courseArray[$i]['strCourseName'];

                     $select="";
                     if($intSelval>0)
                     {
                     $select        = ($intCourseId==$intSelval)?'selected="selected"':'';
                     }
                      else if ($k==$a)
                      {
                        $select        ='selected="selected"';
                     }
                        

                     $a++;
                     
                    $courseName     = '<option value="'.$intCourseId.'"'.$select.' >'.$strCourseName.'</option>';
                    echo $courseName;
            } ?> 
                </select></td>

                

                <td width="250">
                <select  id="ddlMappingData<?php echo $k;?>" class="form-control ddlMappingData" name="ddlMappingData[]">
                  <option value="0">--Select--</option>
                 <?php for ($j = 0; $j < count($nicCourseName); $j++) {

                     $intSelval      = $nicval;
                     $intInstituteId = $nicCourseName[$j]['intInstituteId'];
                     $strCourseName = $nicCourseName[$j]['strInsNameE'];
                     $select        = ($intInstituteId==$intSelval)?'selected="selected"':'';
                     $courseName    = '<option value="'.$intInstituteId.'"'.$select.' >'.$strCourseName.'</option>';
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
                        <input type="hidden" name ="hiddenITI" value="3"/>
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

