<?php
	/* ================================================
	File Name         	  : addSkill.php
	Description		  : This is used for add Skill Details.
	Designed By		  : 
        Designed On		  : 
        Devloped By		  : Rahul Kumar Saw
        Devloped On		  : 22-June-2022
	Update History		  :	<Updated by>		<Updated On>		<Remarks>
					
	Style sheet                 : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css                                          
	Javscript Functions          : jquery.min.js, bootstrap.min.js, custom.js,  loadcomponent.js
	includes			  :	header.php, navigation.php, util.php, footer.php,addSkillInner.php

	==================================================*/
	
     require 'addSkillInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
        $(document).ready(function () {
                
                pageHeader   = "<?php echo $strTab; ?> Skill";
                strFirstLink = "Manage Skill Competition";
                strLastLink  = "Skill"; 
                
                fillSkillCategory('<?php echo $intCategory; ?>','selCategory');
               
                indicate = 'yes';
              <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
                    viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
                <?php } ?>  
                   
            TextCounter('txtDescription','lblChar1',500);
            TextCounter('txtDescriptionH','lblChar2',750);       
	});
           function validator()
            {
                
                  if(!selectDropdown('selCategory', 'Select Category'))
                     return false;   
                   
                  if (!blankCheck('txtCaption', 'Skill Name can not be left blank'))
                    return false;
                  if (!checkSpecialChar('txtCaption'))
                    return false;
                  if (!maxLength('txtCaption',200, 'Caption'))
                    return false;  
                  if (!blankCheck('txtCaptionH', 'Skill Name in odia can not be left blank'))
                    return false;
                  if (!maxLength('txtDescription', 500,'Description'))
                    return false;
                  if (!checkSpecialChar('txtDescription'))
                 return false;
               //if (!checkSpecialChar('txtDescriptionH'))
               //  return false;

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
                
                <a href="javascript:void(0);" class="btn btn-info active">Add</a>
               
                <a href="<?php echo APP_URL;?>viewSkill/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>
            
             </div>
           
          <?php include('includes/util.php'); ?>
          <div class="hr hr-solid"></div>
           <div class="col-xs-12"> 
               
               
               <div class="form-group" id="categoryDiv">
                    <label class="col-sm-2 control-label no-padding-right" for="selCategory">Select Category</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="selCategory" id="selCategory" >
                            <option value="0">- Select -</option>
                        </select>
                             <span class="mandatory">*</span>          
                    </div>
                </div>             
                
               
                <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtCaption">Skill Name in English </label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="text" id="txtCaption" name="txtCaption" maxlength="200" placeholder="" class="form-control" value="<?php echo $strCaption; ?>">
                <span class="mandatory">*</span>
                </div>
              </div>
                 <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtCaptionH">Skill Name in Odia</label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="text" id="txtCaptionH" name="txtCaptionH" maxlength="200" placeholder="" class="form-control odia" value="<?php echo $strCaptionH; ?>">
                  <span class="mandatory">*</span>
                </div>
              </div>
            
              <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDescription">Description in English</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <textarea class="form-control" id="txtDescription" name="txtDescription" style="height:100px;" onKeyUp="return TextCounter('txtDescription','lblChar1',500)" onMouseUp="return TextCounter('txtDescription','lblChar1',500)"><?php echo $strDescription;?></textarea>
                        <span class="red">Maximum <span id="lblChar1">500</span> characters </span>
                        
                    </div>
                </div> 
               
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDescriptionH">Description in Odia</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <textarea class="form-control odia" id="txtDescriptionH" name="txtDescriptionH" style="height:100px;" onKeyUp="return TextCounter('txtDescriptionH','lblChar2',750)" onMouseUp="return TextCounter('txtDescriptionH','lblChar2',750)"><?php echo $strDescriptionH;?></textarea>                      
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

 
