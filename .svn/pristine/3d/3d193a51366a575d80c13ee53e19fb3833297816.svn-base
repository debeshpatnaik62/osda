<?php
/* ================================================
  File Name                 : addCourse.php
  Description               : This is used for add course details.
  Designed By               :
  Designed On               :
  Developed By		    : T Ketaki Debadarshini
  Developed On		    : 21-March-2017
  Update History            :	<Updated by>		<Updated On>		<Remarks>

  Style sheet               : 
  Javscript Functions       :  validatorchklist.js
  includes                  :   util.php,addCourseInner.php			  :

  ================================================== */
    require("addCourseInner.php");
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
    $(document).ready(function () {
        loadNavigation('<?php echo $strTab; ?> Course Details');
        pageHeader   = "<?php echo $strTab; ?> Course Details";
        strFirstLink = "Manage Application";
        strLastLink  = "Course Details";
        
        $('#txtName').focus();
        
        indicate = 'yes';
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php 
            } 
        ?>
        
        //fill the education details
        fillEducation('<?php echo $intEligibility; ?>','ddlEligibility',1);
        
        //fill the education details
        fillSector('<?php echo $intType; ?>','ddlType');

        fillMappingCourse('<?php echo $strMappingCOde;?>','ddlMappingData','NIC');
            
        TextCounter('txtSnippet','lblChar1',500);
        TextCounter('txtSnippetO','lblChar2',750);    

   });
   
    //function to validate the form    
    function validator(){

        if(!selectDropdown('ddlType', 'Select Sector'))
            return false;  
        
        if (!blankCheck('txtCourseName', 'Course Name can not be left blank'))
            return false;
        if (!checkSpecialChar('txtCourseName'))
            return false;
        if (!maxLength('txtCourseName', 100, 'Course Name'))
            return false;
        
        if (!blankCheck('txtCourseAlias', 'Course Alias can not be left blank'))
            return false;
        if (!checkSpecialChar('txtCourseAlias'))
            return false;
        if (!maxLength('txtCourseAlias', 100, 'Course Alias'))
            return false;

        if (!blankCheck('txtDuration', 'Duration can not be left blank'))
            return false;
        if (!checkSpecialChar('txtDuration'))
            return false;
        if (!maxLength('txtDuration', 70, 'Duration '))
            return false;
        
        if(!selectDropdown('ddlEligibility', 'Select Eligibility'))
            return false; 

       // if (!blankCheck('txtSnippet', 'Description can not be left blank'))
        //    return false;
        if (!checkSpecialChar('txtSnippet'))
            return false;
        if (!maxLength('txtSnippet', 500, 'Description'))
            return false;
        
        if (!maxLength('txtSnippetO', 750, 'Description in Odia'))
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
                <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab; ?></a> 
                <a href="<?php echo APP_URL; ?>viewCourse/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a> 
                <a href="<?php echo APP_URL ?>archiveCourse/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Archive</a> 
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="col-xs-12">
                <div class="form-group" >
                    <label class="col-sm-2 control-label no-padding-right" for="ddlType">Select Sector</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlType" id="ddlType" >
                            <option value="0">- Select -</option> 
                           
                        </select>
                         <span class="mandatory">*</span>             
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtCourseName">Course Name </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                       <input type="text" id="txtCourseName" onkeyup="convertToSlug(this.value, 'txtCourseAlias');" name="txtCourseName" placeholder="" class="form-control" maxlength="100" value="<?php echo $strCourseName; ?>">
                   <!--     <span class="mandatory">*</span>  -->
                    </div>
                </div>
				
				
				 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="radCourseType">Course Type </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
			
                        <input type="radio"  name="radCourseType" class="ace" value="1" <?php echo ($intCourseType==1)?'checked':''?>>                           
                        <span class="lbl">Short Term</span>

                        <input type="radio"  name="radCourseType" class="ace" value="2" <?php echo ($intCourseType==2)?'checked':''?>>
                        <span class="lbl">Long Term</span>
						
                       <span class="mandatory">*</span> 
                    </div>
                </div>
				
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtCourseNameO">Course Name in Odia </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                       <input type="text" id="txtCourseNameO" name="txtCourseNameO" placeholder="" class="form-control odia" maxlength="150" value="<?php echo $strCourseNameO; ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtCourseAlias">Course Alias </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                       <input type="text" id="txtCourseAlias" name="txtCourseAlias" placeholder="" class="form-control" maxlength="100" value="<?php echo $strCourseAlias; ?>">
                       <span class="mandatory">*</span> 
                    </div>
                </div>

                
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDuration">Duration in Month(s)</label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtDuration" name="txtDuration" placeholder=""  class="form-control" maxlength="5" value="<?php echo $strDuration; ?>">
                        <span class="mandatory">*</span> 
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDurationHr">Duration in Hour(s)</label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtDurationHr" name="txtDurationHr" placeholder=""  class="form-control" maxlength="10"  value="<?php echo $strDurationHr; ?>">
                        
                    </div>
                </div>
                
                <div class="form-group" >
                    <label class="col-sm-2 control-label no-padding-right" for="ddlEligibility">Select Eligibility</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlEligibility" id="ddlEligibility" >
                            <option value="0">- Select -</option> 
                           
                        </select>
                         <span class="mandatory">*</span>             
                    </div>
                </div> 

                 <!--Modified On 11-June-2019 BY Ashis kumar Patra to add Mapping Id with NIC-->

                 <!-- <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="ddlMappingData">Map Course</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlMappingData" id="ddlMappingData" >
                            <option value="0">- Select -</option> 
                            
                        </select>
                    </div>
                </div>  -->
                
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtSnippet">Description </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <textarea id="txtSnippet" rows="3" name="txtSnippet" onKeyUp="return TextCounter('txtSnippet','lblChar1',500)" onMouseUp="return TextCounter('txtSnippet','lblChar1',500)" placeholder="" class="form-control"><?php echo $strSnippet; ?></textarea>
                        <span class="red">Maximum <span id="lblChar1">500</span> characters </span> <!--<span class="mandatory">*</span> -->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtSnippetO">Description in Odia </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <textarea id="txtSnippetO" onKeyUp="return TextCounter('txtSnippetO','lblChar2',750)" onMouseUp="return TextCounter('txtSnippetO','lblChar2',750)" rows="3" name="txtSnippetO" placeholder="" class="form-control odia" ><?php echo $strSnippetO; ?></textarea>
                        <span class="red">Maximum <span id="lblChar2">750</span> characters </span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2 no-padding-right"></div>
                    <div class="col-sm-4">
                        <input type="submit" id="btnSubmit" name="btnSubmit" value="<?php echo $strSubmit; ?>" class="btn btn-success" onclick="return validator();"/>
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

