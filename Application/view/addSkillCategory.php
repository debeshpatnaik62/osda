<?php
	/* ================================================
	File Name         	  : addSkillCategory.php
	Description		        : This is used for add Skill Category.
	Designed By		        : 
        Designed On		  : 
        Devloped By		  : Rahul Kumar Saw
        Devloped On		  : 22-June-2022 
	Update History		  :	<Updated by>		<Updated On>		<Remarks>
						
	Style sheet                 : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css                                          
	Javscript Functions          : jquery.min.js, bootstrap.min.js, custom.js,  loadcomponent.js
	includes			  :	header.php, navigation.php, util.php, footer.php,addSkillCategoryInner.php

	==================================================*/
	
     require 'addSkillCategoryInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
        $(document).ready(function () {
                
                pageHeader   = "<?php echo $strTab; ?>  Category";
                strFirstLink = "Manage Skill Competition";
                strLastLink  = " Skill Category"; 
                
               
                indicate = 'yes';
                
                <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
                    viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
                <?php } ?>  
                   
         
             TextCounter('txtDescription','lblChar1',500);
             TextCounter('txtDescriptionO','lblChar2',750);
	});
         function validator()
            {           
                if (!blankCheck('txtCategory', 'Category can not be left blank'))
                    return false;
                if (!checkSpecialChar('txtCategory'))
                    return false;
                if (!maxLength('txtCategory',200, 'Category'))
                    return false;  
               //if (!checkSpecialChar('txtCategory_O'))
                //    return false;
               if (!maxLength('txtDescription', 500,'Description'))
                    return false;
              if (!checkSpecialChar('txtDescription'))
                return false;
             // if (!checkSpecialChar('txtDescriptionO'))
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
         
           <div class="clearfix"></div>
          <div class="top_tab_container"> 
          <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab;?></a> 
          <a href="<?php echo APP_URL;?>viewSkillCategory/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a></div>
         
         <?php include('includes/util.php'); ?>
          <div class="hr hr-solid"></div>
           <div class="col-xs-12">              
               
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtCategory">Category Name </label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="text" id="txtCategory" name="txtCategory" maxlength="200" placeholder="" class="form-control" value="<?php echo $strCategory; ?>">
                  <span class="mandatory">*</span>
                </div>
              </div>
               <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtCategory_O">Category Name in Odia</label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="text" id="txtCategory_O" name="txtCategory_O" maxlength="200" placeholder="" class="form-control odia" value="<?php echo $strCategoryO; ?>">
               
                </div>
              </div>
               
              <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDescription">Description</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <textarea class="form-control" id="txtDescription" name="txtDescription" style="height:100px;" onKeyUp="return TextCounter('txtDescription','lblChar1',500)" onMouseUp="return TextCounter('txtDescription','lblChar1',500)"><?php echo $strDescription;?></textarea>
                        <span class="red">Maximum <span id="lblChar1">500</span> characters </span>
                        
                    </div>
                </div> 	 
               <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDescriptionO">Description in Odia</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <textarea class="form-control odia" id="txtDescriptionO" name="txtDescriptionO" style="height:100px;" onKeyUp="return TextCounter('txtDescriptionO','lblChar2',750)" onMouseUp="return TextCounter('txtDescriptionO','lblChar2',750)" ><?php echo $strDescriptionO;?></textarea>
                       <span class="red">Maximum <span id="lblChar2">750</span> characters </span>
                        
                    </div>
                </div>
             <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="radStatus">Publish Status</label>
                <div class="col-sm-8">
                <span class="colon">:</span>
                 <div class="radio">
                    <label>
                        <input type="radio" name="radStatus" id="radStatus" class="ace" value="2" <?php if ($intStatus == 2) { ?>checked="checked" <?php } ?>/>
                        <span class="lbl"> Active</span>
                    </label>
                    <label>
                       <input type="radio" name="radStatus" id="radStatus" class="ace" value="1" <?php if ($intStatus == 1) { ?>checked="checked" <?php } ?>/>
                        <span class="lbl"> Inactive</span>
                    </label>
                     
                </div>
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

 
