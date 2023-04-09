<?php
/* ================================================
File Name         	  	: index.php
Description		  	: This is page is used for login propose.	
Designed By		  	: Bishnu Charan Sahoo
Designed On	        	: 03-Feb-2016
Devloped By                     : T Ketaki Debadarshini
Devloped On                     : 13-Aug-2015
Update History			:
										<Updated by>		<Updated On>		<Remarks>

Style sheet           	: bootstrap.min.css , custom.css                                            
Javscript Functions   	: jquery.min.js, bootstrap.min.js, custom.js,validator.js,md5.js,loadscript.js
includes			  	:

==================================================*/
require("indexInner.php"); 
$random = (rand()%1000);
$_SESSION["salt"] = $random;
?>
<!DOCTYPE html>
<html lang="en">
 <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
 <title><?php echo TITLE;?></title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- Bootstrap -->
 <link href="<?php echo APP_URL;?>css/bootstrap.min.css" rel="stylesheet">
 <script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>

 <script src="<?php echo APP_URL;?>js/bootstrap.min.js"></script>
 <script src="<?php echo APP_URL;?>js/custom.js"></script>
 <script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
 <script language="javascript" type="text/javascript" src="<?php echo APP_URL; ?>js/md5.js"></script>
 <link href="<?php echo APP_URL;?>css/custom.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <script src="<?php echo APP_URL;?>js/loadComponent.js"></script>
 <script src="<?php echo APP_URL;?>js/loadAjax.js"></script>
 <script type="text/javascript">
     

$(document).ready(function(){
	$('form').attr('autocomplete','off');
	$('#txtuserID').focus();
	$('#passwordTitle').hide();
	$('.emailInput').hide();
	$('#btnSubmit').hide();
	$('#btnBack').hide();
        
	$('#forgotPwdLink').click(function(){
		$('.passwordInput').hide();
		$('#btnLogin').hide();
		$('#loginTitle').hide();
		$('.emailInput').show();
		$('#btnSubmit').show();
		$('#btnBack').show();	
		$('#passwordTitle').show();							   
	});
	
	$('#btnBack').click(function(){
		$('.passwordInput').show();
		$('#btnLogin').show();
		$('#loginTitle').show();
		$('.emailInput').hide();
		$('#btnSubmit').hide();
		$('#btnBack').hide();	
		$('#passwordTitle').hide();							   
	});
        
      getLogo();
	<?php if($out_msg!='' && isset($_REQUEST['btnLogin'])){?>
		alert('<?php echo $out_msg;?>');
        //$('#txtCaptcha').focus();
	<?php }?>
            
          <?php if($out_msg_fp!='' && isset($_REQUEST['btnFPassword'])){?>
		alert('<?php echo $out_msg_fp;?>');
	<?php }?>
              
           //submit the form and assign the values
            $('#frmLogin').submit(function(){
                                
                  var str=hex_md5($("#txtPassword").val())+"<?php echo $random;?>";
                 $("#htxtPassword").val(hex_md5(str));   
                 $("#htxtuserID").val($("#txtuserID").val());
                 //$("#henterPassword").val($("#txtPassword").val());
                 $("#htxtEmailID").val($("#txtEmailID").val());


                 $("#txtuserID").val('');
                 $("#txtPassword").val('');
                 $("#txtEmailID").val(''); 
            });
            
        
   });
        
        
    function Validate()
	{		
            if (!blankCheck('txtuserID', 'User Id can not be left blank'))
                    return false;	
            if (!checkSpecialChar('txtuserID'))
                    return false;	
            if (!blankCheck('txtPassword', 'Password can not be left blank')) 	
                    return false;	
            if (!checkSpecialChar('txtPassword'))	
                    return false;
     
        
             if (!blankCheck('txtCaptcha', 'Captcha can not be left blank'))
                    return false;	
         
	}
        
     function ValidateForgotPass()
        {
            if (!blankCheck('txtuserID', 'User ID can not be left blank'))
                return false;
            
            if (!checkSpecialChar('txtuserID'))
                return false;
            if (!blankCheck('txtEmailID', 'Email can not be left blank'))
                return false;
            if(!validEmail('txtEmailID'))
                return false;
             if (!blankCheck('txtCaptcha', 'Captcha can not be left blank'))
                    return false;	
            

	}
        
        function generateCaptcha()
	{
		var ranNo	= Math.floor((Math.random() * 100) + 1);
		$('#captchaImage').attr('src','<?php echo APP_URL;?>includes/captcha.php?'+ranNo);
	}
        
  </script>
				
	
     </head>
 <body id="loginBodyBg">
 <div class="container">
   <div class="row">
     <div class="col-sm-10 col-sm-offset-1">
       <div class="loginBox">
         <div class="panel panel-login" style="margin-top:50px;">
           <div class="panel-heading">
      
                
               <a href="<?php echo SITE_URL;?>" class="navbar-brand" title="Odisha Skill Development Authority">
                    <span id="homePageLogo" class="login-logo"></span>
                </a>
                <div class="clearfix"></div>
       
             
             
           </div>
           <div class="panel-body">
			<h3 id="loginTitle">SIGN IN</h3>
                            <h3 id="passwordTitle">Get your Password</h3>
                            
                                   

                                            <div class="form-group input-group-md">
                                                  
                                                    <div class="input-group inputfield">
                                                         <input type="text" name="txtuserID" value="" style="display: none" /> 
                                                        <input type="text" class="form-control entryfield" autocomplete="off" maxlength="100" id="txtuserID" name="txtuserID" tabindex="1" placeholder="User ID" value="" />
                                                            <span class="input-group-addon icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                                    </div>

                                            </div>
                                            <div class="form-group input-group-md emailInput ">
                                                        <input type="text" name="txtEmailID" value="" style="display: none" />
                                                    <input type="text" class="form-control emailfield" autocomplete="off" maxlength="50" placeholder="E-Mail ID" id="txtEmailID" name="txtEmailID" tabindex="2"/>
                                            </div>
                                            <div class="form-group input-group-md passwordInput">
                                                  
                                                    <div class="input-group inputfield">
                                                            <input type="password" name="txtPassword" value="<?php echo $enterPass;?>" style="display: none" /> 
                                                            <input type="password" autocomplete="off" class="form-control entryfield" maxlength="20" value="<?php echo $enterPass;?>" id="txtPassword" name="txtPassword" tabindex="3" placeholder="Password"/>
                                                            <span class="input-group-addon icon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                                    </div>
                                                   
                                            </div>
                            <form role="form" class="login_form" method="post" autocomplete="off" id="frmLogin">   
                                               <div class="row">
                                                <div class="col-sm-5 col-xs-12">
                                                    <div class="form-group input-group-md">

                                                            <input name="txtCaptcha" type="text" autocomplete="off" class="passwordinput form-control  pull-left " tabindex="4" style="width:100%;" id="txtCaptcha" onKeyUp="return blockspecialchar_first(this);" autocomplete="off" maxlength="20" placeholder="Captcha"/>
                                                    </div>
                                                </div>

                                                        <div class="col-sm-5 col-xs-10 captcha_form ">
                                                                <img src="<?php echo APP_URL;?>includes/captcha.php" alt="captcha image" align="absmiddle" style="" id="captchaImage"/>
                                                        </div>
                                                        <div class="col-sm-2 col-xs-2 captcha_refresh" style="cursor: pointer;">
                                                                <i class="fa fa-refresh" id="reload" onClick="generateCaptcha();" aria-hidden="true" style=""></i>
                                                        </div>
                                                      
                                                </div>



                                            <div class="form-group input-group-md ">
                                                
                                                <input type="hidden"   id="htxtuserID" name="htxtuserID"  />
                                                <input type="hidden"   id="htxtPassword" name="htxtPassword" />
                                                <input type="hidden"   id="henterPassword" name="henterPassword" />
                                                <input type="hidden" id="htxtEmailID" name="htxtEmailID" />
                                                
                                                
                                                    <input type="submit" id="btnLogin" name="btnLogin" value="Login" class="btn btn-warning btn-md hvr-shutter-in-horizontal" style="width:100%;" onClick="return Validate();"/>
                                                    <input type="submit" id="btnSubmit" name="btnFPassword" value="Submit" class="btn btn-warning btn-md" style="width:48%;" onClick="return ValidateForgotPass();"/>
                                                    <input type="button" id="btnBack" name="btnBack" value="Back" class="btn btn-warning btn-md" style="width:48%; margin-left:5px;"/>
                                                    <div class="clearfix"></div>
                                            </div>
                                            <hr>
                                            <!--<h4>Forgot your password ?</h4>-->
                                            <div class="col-sm-6 col-xs-6 forget_left">Forgot Password <i class="fa fa-question-circle" aria-hidden="true"></i>
                                            </div>
                                            <div class="col-sm-6 col-xs-6 forget_right"> Click <a href="javascript:void(0);" id="forgotPwdLink">here</a> to reset.</div>
                                    </form>
                            </div>



                            </div>
						</div>
						
					</div>
					<div class="clearfix"></div>
					<div class="loginFooter">Copyright &copy;
						<?php echo FOOTER_TITLE." ".date(Y);?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$( document ).ready( function () {
			var xheight = $( window ).height();
			$( "#loginBodyBg" ).css( 'min-height', xheight )
		} );
	</script>


        <div class="modal fade in" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <h4 class="alertMessage center" align="center"></h4>
              <div class="form-group">
                <div class="center" align="center"> <a class=" btn btn-danger btn-sm" id="btnAlertOk" data-dismiss="modal" style="width:100px; margin-top:30px;">Ok</a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>    
</body>

</html>