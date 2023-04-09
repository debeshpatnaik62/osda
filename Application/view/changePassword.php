<?php
	/* ================================================
	File Name         	  : changePassword.php
	Description		  : This is used to change password
	Designed By		  : Rasmi Ranjan Swain
        Designed On		  : 09-Feb-2016
        Devloped On               : 09-Feb-2016
        Devloped By               : Rasmi Ranjan Swain
	Update History		  :	<Updated by>		<Updated On>		<Remarks>
						
	Style sheet               : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css                                            
	Javscript Functions       : jquery.min.js, bootstrap.min.js, custom.js
	includes		  : changePasswordInner

	==================================================*/
     include_once("changePasswordInner.php");  
	
?>
<script src="<?php echo APP_URL;?>js/validatorchklist.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo APP_URL; ?>js/md5.js"></script>
<script language="javascript">
    
	$(document).ready(function () {
		
                pageHeader   = "Change Password";
                strFirstLink = "";
                strLastLink  = "Change Password"; 
                
		indicate = 'yes';
                $('#txtOldPwd').focus();
		<?php if($outMsg!='' && $errFlag>0){?>
			viewAlert('<?php echo $outMsg;?>');
		<?php }else if($outMsg!='' && $errFlag==0){?>
			viewAlert('<?php echo $outMsg;?>');
                        $('#alertModal').on('hidden.bs.modal', function () {
                            window.location.href = '<?php echo APP_URL;?>';
                        });
			
		<?php }?>

    //submit the form and assign the values
            $('#frmOGP').submit(function(){
                                
                  var oldStr=hex_md5($("#txtOldPwd").val());
                  var newStr=hex_md5($("#txtNewPwd").val());
                  var newCStr=hex_md5($("#txtConfPwd").val());
                 $("#htxtOldPwd").val(oldStr);   
                 $("#htxtNewPwd").val(newStr); 
                 $("#htxtConfPwd").val(hex_md5(newCStr));   

                 $("#txtOldPwd").val('');
                 $("#txtNewPwd").val('');
                 $("#txtConfPwd").val(''); 
            });

	});
        function validator()
	{
		if(!blankCheck('txtOldPwd','Old Password can not left blank'))
			return false;
		if(!checkSpecialChar('txtOldPwd'))
			return false;
		if(!blankCheck('txtNewPwd','New Password can not left blank'))
			return false;
		if(!checkSpecialChar('txtNewPwd'))
			return false;
		if(!blankCheck('txtConfPwd','Confirm Password can not left blank'))
			return false;
		if(!checkSpecialChar('txtConfPwd'))
			return false;
		if($('#txtNewPwd').val().length<8)
		{
			viewAlert("Password must be 8 digit");
			$('#txtNewPwd').focus();
			return false;
		}
		if($('#txtNewPwd').val() != $('#txtConfPwd').val())
		{
			viewAlert("Passwords must be matched");
			$('#txtConfPwd').focus();
			return false;
		}
    if($('#txtNewPwd').val() == $('#txtOldPwd').val())
    {
      viewAlert("New Password can not be same as Old Password");
      $('#txtNewPwd').focus();
      return false;
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
          <div class="top_tab_container"> <a href="<?php echo APP_URL?>changePassword" class="btn btn-info active">Change Password</a></div>
          <?php include('includes/util.php'); ?>
          <div class="hr hr-solid"></div>
            <div class="col-xs-12">
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtOldPwd">Old Password</label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="password" id="txtOldPwd" name="txtOldPwd" placeholder="" class="form-control" maxlength="30">
                  <span class="mandatory">*</span>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtNewPwd">New Password</label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="password" id="txtNewPwd" name="txtNewPwd" placeholder="" class="form-control" maxlength="30">
                  <span class="mandatory">*</span>
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtConfPwd">Confirm Password</label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="password" id="txtConfPwd" name="txtConfPwd" placeholder="" class="form-control" maxlength="30">
                  <span class="mandatory">*</span>
                </div>
              </div>
              <div class="form-group">
                <input type="hidden"   id="htxtOldPwd" name="htxtOldPwd"  />
                <input type="hidden"   id="htxtNewPwd" name="htxtNewPwd" />
                <input type="hidden"   id="htxtConfPwd" name="htxtConfPwd" />
                <div class="col-sm-2 no-padding-right"></div>
                <div class="col-sm-4">
                    <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" class="btn btn-success" onclick="return validator();"/>                  
                  <input type="reset" id="btnReset" name="btnReset"  class="btn btn-danger" value="Reset"/>
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

 
