<?php
/* ================================================
  File Name                 : addInstituteCourse.php
  Description               : This is used for Manage Institute Courses details.
  Designed By               :
  Designed On               :
  Developed By        : T Ketaki Debadarshini
  Developed On        : 23-March-2017
  Update History            : <Updated by>    <Updated On>    <Remarks>

  Style sheet               : 
  Javscript Functions       :  validatorchklist.js
  includes                  :  util.php,addInstituteCourseInner.php       :

  ================================================== */
    require("addInstituteCourseInner.php");
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
    $(document).ready(function () {
        
        pageHeader   = "<?php echo $strTab; ?>  Institute Courses";
        strFirstLink = "Manage Application";
        strLastLink  = "Manage Institute Courses";
        loadNavigation('<?php echo $strTab; ?>  Institute Courses');
        $('#txtName').focus();
        
        indicate = 'yes';
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php 
            } 
        ?>
        
        //fill the districts details
        fillDistricts('<?php echo $intDistid; ?>','ddlDistrict');
        //fill the education details
        fillInstitute('<?php echo $intInstitute; ?>','ddlInstitute','<?php echo $intDistid; ?>');
             
        //fill the education details
       // fillSector('<?php //echo $intSector; ?>','ddlSector');
   
     
        getCoursesDetails('<?php echo $id; ?>');
       $('#btnReset').on('click',function(){
            getCoursesDetails(0);
        });
       
       
   });
   
   //function to validate the form
    function validateCoursedetails()
    {
        var totRowNumber = $('.addTr').length;
        
        for (var i = 0; i <totRowNumber; i++)
        {
         if(!selectDropdown('ddlDistrict', 'Select District'))
           return false;  
         
            if(!selectDropdown('ddlInstitute', 'Select Institute'))
             return false;  
        
            if(!selectDropdown('selCourse_'+ Number(i),'Select Course '))
             return false;
            
           // if (!blankCheck('txtBatch_'+ Number(i), 'No of Shift/Batch can not be left blank'))
           // return false;
            if (!checkSpecialChar('txtBatch_'+ Number(i)))
            return false;
            if (!maxLength('txtBatch_'+ Number(i), '5','No of Shift/Batch '))
             return false;
         
           // if (!blankCheck('txtBatchStrength_'+ Number(i), 'Batch Strength can not be left blank'))
           // return false;
            if (!checkSpecialChar('txtBatchStrength_'+ Number(i)))
            return false;
            if (!maxLength('txtBatchStrength_'+ Number(i), '10','Batch Strength'))
            return false;
         
        }
        return true;
    }
    function CheckPreviousCourse(id)
    {
       
       var totRowNumber = $('.addTr').length;
     
       if(totRowNumber>1)
       {
            for (var i = 0; i < totRowNumber; i++)
            {
               
                var curDes = $('#selCourse_'+ Number(i)).val();
                //console.log(id+' '+'selCourse_'+ Number(i))
                
                if($('#'+id).val() == curDes && id!='selCourse_'+ Number(i))
                {
                    viewAlert('This Course already selected');
                   $('#'+id).prop('selectedIndex', '0');
                     $('#'+id).focus();
                    return false;
                }
            }
       }
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
                <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab; ?></a> 
                <a href="<?php echo APP_URL; ?>viewInstituteCourse/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a> 
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="col-xs-12">
                <div class="form-group" >
                    <label class="col-sm-2 control-label no-padding-right" for="ddlDistrict">Select District</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlDistrict" id="ddlDistrict" onchange="fillInstitute(0,'ddlInstitute',this.value);">
                            <option value="0">- Select -</option> 
                            
                        </select>
                         <span class="mandatory">*</span>             
                    </div>
                </div>
                <div class="form-group" >
                    <label class="col-sm-2 control-label no-padding-right" for="ddlInstitute">Select Institute</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlInstitute" id="ddlInstitute" onchange="getCoursesDetails(this.value);">
                            <option value="0">- Select -</option> 
                           
                        </select>
                         <span class="mandatory">*</span>             
                    </div>
                </div>
          <!--       <hr>
               <div class="form-group" >
                    <label class="col-sm-2 control-label no-padding-right" for="ddlSector">Search By  Sector</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlSector" id="ddlSector" onchange="fillCourse('0','selCourse',this.value);">
                            <option value="0">- Select -</option> 
                           
                        </select>
                          
                    </div>
                </div>-->
                
                <div class="form-group">
                    <table class="table table-striped table-bordered table-hover">
                            <thead>
        <tr>
<!--                                       <th width="200">Search By Sector </th> -->
                                        <th width="200">Course <span class="viewMandatory">*</span></th>  
          <th width="150">No of Shift/Batch <!--<span class="viewMandatory">*</span>--></th>
          <th width="150">Batch Strength <!--<span class="viewMandatory">*</span>--></th>
          
          
                                        <th width="80">Add More</th>
                                     
        </tr>
        </thead>
        <tbody id="appendddiv">
                                     
        </tbody>
      </table>
    </div> 
                
                

                <div class="form-group">
                    <div class="col-sm-2 no-padding-right"></div>
                    <div class="col-sm-4">
                        <input type="submit" id="btnSubmit" name="btnSubmit" value="<?php echo $strSubmit; ?>" class="btn btn-success" onclick="return validateCoursedetails();"/>
                        <input type="reset" id="btnReset" name="btnReset"  class="btn btn-danger" value="<?php echo $strReset; ?>" onclick="<?php echo $strclick; ?>" />
                    </div>
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

