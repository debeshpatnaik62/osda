/* ================================================
 File Name         	  : loadAjax.js
 Description          : This page is used to load AJAX JSON request.
 Author Name		  :  T Ketaki Debadarshini 
 Date Created		  : 16-MAY-2016
 Update History		  :
 <Updated by>			<Updated On>		<Remarks>	
 
 
 ==================================================*/

 	
    /*
        Function to get Page.
        By: T Ketaki Debadarshini 
        On: 28-Aug-2015
        */
       function getPublishedPage()
       {
            var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
           $.ajax({
               type: "POST",
               url: appURL + '/proxy',
               dataType: "json",
               data: {method: 'getPublishedPage',hdnPrevSessionId:hdnPrevSessionId},
               success: function (data) {
                   var res = data.result;
                   var finalRes = res.split('~::~');
                   /* Load results. */
                   $("#pageListDiv").html(finalRes[0]);
                   $("#hdnFldForPageId").val(finalRes[1]);
               }
           });
       }

       /*
        Function to get assigned menu list.
        By: T Ketaki Debadarshini 
        On: 28-Aug-2015
        */
       function getAssignedMenuList(parentId, menuType, linkType)
       {  var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
           if (parentId == 0 && linkType != 'globalLink')
               $("#mainMenu").html('No menus assigned');

           else
           {
               $.ajax({
                   type: "POST",
                   url: appURL + '/proxy',
                   dataType: "json",
                   data: {method: "getAssignedMenuList", parentId: parentId, menuType: menuType, linkType: linkType,hdnPrevSessionId:hdnPrevSessionId},
                   success: function (data)
                   {
                       var res = data.result;
                       /* Load results. */
                       if (menuType == 1)
                            $("#mainMenu").html(res);
                       else if (menuType == 2)
                           $("#bottomMenu").html(res);                        
                       else if (menuType == 3)                
                          $("#topMenu").html(res);                    
                       else if (menuType == 4)                
                          $("#homePortlet").html(res);
                       if(linkType == 'globalLink')
                           showHideChkBox(menuType);
                   }
               });
           }
       }

       /*
        Function to fill assigned menu list.
        By:  T Ketaki Debadarshini 
        On: 14-Aug-2015
        */
       function fillMenuList(parentId, menuType, linkType, fillCtrlId)
       {   var hdnPrevSessionId            = $('#hdnPrevSessionId').val();  
               $.ajax({
                       type: "POST",
                       url: appURL + '/proxy',
                       dataType: "json",
                       data: {method: "getAssignedMenuList", parentId: parentId, menuType: menuType, linkType: linkType,hdnPrevSessionId:hdnPrevSessionId},
                       success: function (data)
                       {
                               var res = data.result;
                               $("#"+fillCtrlId).html(res);			
                       }
               });

       }

       /*
        Function to get global menu list.
        By: T Ketaki Debadarshini 
        On: 14-Aug-2015
        */
       function getGlobalMenuList(menuType, linkType)
       {
            var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
           $.ajax({
               type: "POST",
               url: appURL + '/proxy',
               dataType: "json",
               data: {method: "getGlobalMenuList", menuType: menuType, linkType: linkType,hdnPrevSessionId:hdnPrevSessionId},
               success: function (data)
               {
                   var res = data.result;
                   /* Load results. */
                   $("#selGlobalMenu").append(res);
               }
           });
       }
       /*
        Function to delete menu list.
        By: T Ketaki Debadarshini 
        On: 13-Aug-2015
        */
       function deleteMenu(id)
       {
            var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
           $.ajax({
               type: "POST",
               url: appURL + '/proxy',
               dataType: "json",
               data: {method: 'deleteMenu', PID: id,hdnPrevSessionId:hdnPrevSessionId},
               success: function (data) {

                   getTotalMenuRecords();	
               }
           });
       }
       /*
               Function to delete main menu.
               By: T Ketaki Debadarshini 
               On: 13-Aug-2015
               */
               function deleteFromMainMenu(menuId,pageId)
               { 
                    var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
                   if (!confirm('Are you sure to remove the menu'))
                       return false; 
                   $.ajax({
                          type: "POST",
                          url: appURL + '/proxy',
                           dataType: "json",
                          data     : {method:'deleteFromMainMenu',menuId:menuId,pageId:pageId,hdnPrevSessionId:hdnPrevSessionId},
                          success  : function(data) {                   
                                 var res = data.result;		
                                 if(res == 1)
                                 {
                                   alert('Can not delete this global link as primary links present under this menu.');
                                 }
                                 else if(res == 2)
                                 {                              
                                   $("#mainMenuItem"+pageId).remove();
                                   showHideChkBox(1);
                                   displayEmptyText(1);
                                   getTotalMenuRecords();	
                                 }
                          }
                  });
               }
      


       /*
               Function to get all records.
               By: T Ketaki Debadarshini 
               On: 13-Aug-2015
               */	
           function getTotalMenuRecords()
           {
                var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
                    $.ajax({
                           type: "POST",
                           url: appURL + '/proxy',
                           dataType: "json",
                           data     : {method:"getTotalMenuRecords",hdnPrevSessionId:hdnPrevSessionId},
                           success  : function(data) 
                           {
                                   var res      = data.result;	

                                   /* Load results. */
                                   $("#hdnTotalMenuRecords").val(res);                                
                           }
                   });
           }


       /*
               Function to get Page content
               By: T Ketaki Debadarshini 
               On: 13-Aug-2015
               */	
           function getContent(controlID,PID,PAGEID,page)
           { 
                var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
                    $.ajax({
                           type: "POST",
                           url: appURL + '/proxy',
                           dataType: "json",
                           data     : {method:"content",PID:PID,PNO:PAGEID,hdnPrevSessionId:hdnPrevSessionId},
                           success  : function(data) 
                           {

                                   var res         = data.content.strContentE;
                                   var pageTitle   = data.content.pageTitle;
                                  // alert(data.content.strContentE);
                                   /* Load results. */ 
                                   //$("#txtContentE").val(res); alert($("#txtContentE").val());
                                   if(page==1)
                                   CKEDITOR.instances['txtContentE'].setData(res);
                               else
                               {
                                   $('#myModalLabel').html(pageTitle);
                                   $('#divContent').html(res);
                               }
                           }
                   });
           }

           /*
               Function to read Page content
               By: T Ketaki Debadarshini 
               On: 13-Aug-2015
               */
               var arrcontent = new Array();
               var validFlag   = '0';
             function readPageContent(pageId)
              { 
                   var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
                    $.ajax({
                           type: "POST",
                           url: appURL + '/proxy',
                           dataType: "json",
                           data     : {method:"redContent",PID:pageId,hdnPrevSessionId:hdnPrevSessionId},
                           success  : function(data) 
                           {
                               var totalRecord = data.contentResult.length;
                               var pageID		= '0';	
                               var hdnContentId	= '0';
                               var hdnPagevalue	= '';
                               $('#hdnPageId1').val(pageID);
                               $('#hdnContentId1').val(hdnContentId);	
                               $('#hdnPagevalue1').val(hdnPagevalue); 
                               var activeBtn	= 1;
                               if(totalRecord>0){
                                   for(var i=1;i<=totalRecord;i++)
                                   {

                                       pageID		= data.contentResult[i-1].intPageNo;
                                       //hdnContentId	= data.contentResult[i-1].intContentId;
                                       hdnPagevalue	= data.contentResult[i-1].strContent;
                                        // alert(hdnPagevalue);  
                                           $('#hdnPageId'+i).val(pageID);
                                           $('#hdnContentId'+i).val(pageId);	
                                           $('#hdnPagevalue'+i).val(hdnPagevalue);
                                           CKEDITOR.instances['txtContentE'].setData(hdnPagevalue);
                                           arrcontent.push(hdnPagevalue);
                                           validFlag=1; 
                                           if(i<totalRecord)
                                               $('.addMore').click();
                                           validFlag=0;									 
                                   }
                                    activeBtn=totalRecord;
                               }						
                           }
                   });

           }

       /*
            Function to read Page hindi content
            By: T Ketaki Debadarshini
            On: 23-Nov-2015
            */
           var arrcontentH = new Array();
           var validFlagH = '0';
           function readPageContentH(pageId)
           {    
                var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
               $.ajax({
                   type: "POST",
                   url: appURL + '/proxy',
                   dataType: "json",
                   data: {method: "redContentH", PID: pageId,hdnPrevSessionId:hdnPrevSessionId},
                   success: function (data)
                   {
                       var totalRecord = data.contentResult.length;
                       var pageID = '0';
                       var hdnContentId = '0';
                       var hdnPagevalue = '';
                       $('#hdnPageIdH1').val(pageID);
                       $('#hdnContentIdH1').val(hdnContentId);
                       $('#hdnPagevalueH1').val(hdnPagevalue);
                       var activeBtn = 1;
                       if (totalRecord > 0) {
                           for (var i = 1; i <= totalRecord; i++)
                           {

                               pageID = data.contentResult[i - 1].intPageNo;
                               hdnContentId = data.contentResult[i - 1].intContentId;
                               hdnPagevalue = data.contentResult[i - 1].strContent;

                               $('#hdnPageIdH' + i).val(pageID);
                               $('#hdnContentIdH' + i).val(hdnContentId);
                               $('#hdnPagevalueH' + i).val(hdnPagevalue);
                               CKEDITOR.instances['txtContentH'].setData(hdnPagevalue);
                               arrcontentH.push(hdnPagevalue);
                               validFlag = 1;
                               if (i < totalRecord)
                                   $('.addMoreH').click();
                               validFlag = 0;
                           }
                           activeBtn = totalRecord;
                       }
                   }
               });
           }

          /*
        Function to fillpage.
        By: T Ketaki Debadarshini 
        On: 13-Aug-2015
        */
        function fillPageList(selval,fillCtrlId)
           { 
                var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
               $.ajax({
                       type: "POST",
                       url: appURL + '/proxy',
                       dataType: "json",
                       data: {method: "getPage", SelVal: selval,hdnPrevSessionId:hdnPrevSessionId},
                       success: function (data)
                       {
                               var res = data.page.pagename;
                               $("#"+fillCtrlId).html(res);			
                       }
               });

           }

 	/*
        Function to get Page Content.
        By: Rasmi Ranjan Swain
        On: 07-Jan-2015
        */
       function getPageContent(id, lang,headline)
       {
            var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
           $('#myModalLabel').html('');
           $('#divContent').html('<div class="center" style="height:100px; font-size:24px;"><i class="fa fa-spinner fa-spin"></i></div>');
           $('#myModalLabel').removeClass('odia');
           $('#divContent').removeClass('odia');
           $.ajax({
               type: "POST",
               url: appURL + '/proxy',
               dataType: "json",
               data: {method: 'getPageContent', PID: id,lang:lang,hdnPrevSessionId:hdnPrevSessionId},
               success: function (data) {

                   var contentE = data.strContent;
                   
                   if(lang==2){
                        $('#myModalLabel').addClass('odia');
                        $('#divContent').addClass('odia');
                   }

                   $('#myModalLabel').html(headline);
                   if(data.strContent=='')
                       contentE = 'No content available. '

                   $('#divContent').html(contentE);

               }
           });
       }
  
 	 /*
	Function to get check duplicate location
        By:   T Ketaki Debadarshini 
        On: 16-MAY-2016
	*/	
	function checkDuplicateLocation(locname)
	{   
             var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
		$.ajax({
		   type     : "POST",
		   dataType : "json",
		   url      : appURL + '/proxy',
		   data     : {method:"checkDuplicateLocation",locname:locname,hdnPrevSessionId:hdnPrevSessionId},
		   success  : function(data) 
		   {
				var res = data.errFlag;
				return res;
		   }
	   });
	} 
 
    /*
	Function to get all users
        By:   T Ketaki Debadarshini 
        On: 16-Nov-2015
	*/	
	function getAllUsers(userId)
	{  
             var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
            $.ajax({
                   type     : "POST",
                   dataType : "json",
                   url      : appURL + '/proxy',
                   data     : {method:"getAllUsers",userId:userId,hdnPrevSessionId:hdnPrevSessionId},
                   success  : function(data) 
                   {
                        var res      = data.result;                        
                        /* Load results. */
                        $("#DdlName").html(res);                        
                   }
           });
	} 
        
        /*
	Function to get all users
        By:   T Ketaki Debadarshini 
        On: 3-Sep-2015
	*/	
	function fillPermission(userId)
	{ 
             var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
            $(".permissionList input[type='checkbox']").prop('checked',false);
            $(".permissionList input[type='text']").val(0);
            $(".viewTable").slideUp();
            $(".clickDiv").removeClass('active');
            $('#btnSave').val('Submit');
            //$('#gl1').hide();
            if(userId!=0)
            {
                $.ajax({
                    type     : "POST",
                    dataType : "json",
                    url      : appURL + '/proxy',
                    data     : {method:"getPermission",userId:userId,hdnPrevSessionId:hdnPrevSessionId},
                    success  : function(data) 
                    {
                         var result      = data.result;                        
                         /* Load results. */
                        //alert(res);     
                         if(result!='')
                         {
                             var splResult	= result.split('[==]');
                             var priv		= splResult[0]; 
                            /* if(priv==1)
                             {
                                     $('#gl1').show();	
                             }
                             else
                             {
                                     $('#gl1').hide();	
                             }*/
                             var splRes		= splResult[1].split('[=]');
                             for(var i=0;i<splRes.length-1;i++)
                             {
                                 var glResult	= splRes[i];
                                 var glSplit	= glResult.split(',');
                                 var glVal	= glSplit[0];
                                 var plVal	= glSplit[1];
                                 var authorVal	= glSplit[2];
                                 var editorVal	= glSplit[3];
                                 var publisherVal= glSplit[4];
                                 var managerVal	= glSplit[5];

                                 if($('#tab'+glVal).not(":visible"))
                                 {
                                     $('#tab'+glVal).slideDown();	
                                     $('#gl'+glVal).addClass('active');
                                 }
                                 $('#chkBox_'+glVal+'_'+plVal).prop('checked',true);					
                                 $('#hdnGl_'+glVal).val(1);
                                 $('#hdnPreGl_'+glVal).val(1);
                                 $('#hdn_'+glVal+'_'+plVal).val(1);
                                 $('#hdnPreVal_'+glVal+'_'+plVal).val(1);
                                 
                               
                                 
                                 if(authorVal==1){$('#chkAuthor_'+glVal+'_'+plVal).prop('checked', true);}
                                 if(editorVal==1){$('#chkEditor_'+glVal+'_'+plVal).prop('checked',true);}
                                 if(publisherVal==1){$('#chkPublisher_'+glVal+'_'+plVal).prop('checked',true);}
                                 if(managerVal==1){$('#chkManager_'+glVal+'_'+plVal).prop('checked',true);}
                                 
                                 if($('#btnSave').val()=='Submit')
                                  $('#btnSave').val('Update');
                             }
                         }
                         //
                    }
               });
           }
	} 
	
	
	
   


    
   /*
    Function to fill Primary Link
    By:  T Ketaki Debadarshini 
    On: 04-Sept-2015
    */
$.fillPrimaryLink = function(controlId,glId,sval)
{	
     var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
	$.ajax({
		type: "POST",
		 url: appURL + '/proxy',
		 dataType: "json",
                 data     : {method:"getPrimary",selVal:sval,glID:glId,hdnPrevSessionId:hdnPrevSessionId},
		success: function(data) {
			$('#'+controlId).html(data.plLink);	
		},
	});
} 
 

/*
Function to Show FeedBack/Complain Remark details
By:  T Ketaki Debadarshini 
On: 13-Aug-2015
*/
$.viewFeedBackRemarks	= function(controlId, feedBackId)
{
     var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
    $('#'+controlId).html('');
    $.ajax({
    type: "POST",
    url: appURL + '/proxy',
    dataType: "json",
    data: {method:'viewFeedBackDetails',FID:feedBackId,hdnPrevSessionId:hdnPrevSessionId},
    success: function(data){
            var tabDiv ='';
            var subject			= data.strSubject;
            var message			= data.strMessage;
            var remark                  = data.strRemark;
            var remarkDate		= data.remarkDate;
            tabDiv       +='<div class="form-group">';
            tabDiv       +='<label class="col-sm-2 control-label no-padding-right">Subject</label>';
            tabDiv       +='<label class="col-sm-10 control-label no-padding-right">: '+subject+'</label></div>';
            tabDiv       +='<div class="form-group">';
            tabDiv       +='<label class="col-sm-2 control-label no-padding-right">Message</label>';
            tabDiv       +='<label class="col-sm-10 control-label no-padding-right">: '+message+'</label></div>';
            tabDiv       +='<div class="form-group">';
            if(remark != null) {
                tabDiv       +='<label class="col-sm-2 control-label no-padding-right">Remark</label>';
                tabDiv       +='<label class="col-sm-10 control-label no-padding-right">: '+remark+'</label></div>';
                tabDiv       +='<div class="form-group">';
                tabDiv       +='<label class="col-sm-2 control-label no-padding-right">Remark Date</label>';
                tabDiv       +='<label class="col-sm-10 control-label no-padding-right">: '+remarkDate+'</label></div>';
            }
            $('#'+controlId+'1').html(tabDiv);
            $('#'+controlId+'2').html(tabDiv);
            $('#'+controlId+'3').html(tabDiv);
        }
    });
}


/*
     Function to get  logo.
     Created by     : Rasmi Ranjan Swain
     Created On     : 26-Nov-2015
 */
function getLogo()
{
     var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
    $.ajax({
        type: "POST",
        url: appURL + '/proxy',
        dataType: "json",
        data: {method: 'getLogo',hdnPrevSessionId:hdnPrevSessionId},
        success: function (data) {
            var res=data.result;
          $("#homePageLogo").html(res);
      
              
            }
        
    });
}

       
        /*
    Function to reset password.
    By:  T Ketaki Debadarshini 
    On: 21-Aug-2015
    */
       function resetPassword(userId)
       {  
            var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          if(confirmAlert("Are you sure to reset the password ?"))   
          {
                $.ajax({
                       type: "POST",
                       url: appURL + '/proxy',
                       dataType: "json",
                       data: {method: "resetPassword", userId: userId,hdnPrevSessionId:hdnPrevSessionId},
                       success: function (data)
                       {
                               var res = data.user;
                              // 
                               var divMsg='Password has been changed successfully.<br>';
                               divMsg+='User Id : '+res.strEmailid+'<br>';
                               divMsg+='Change Password : '+res.strPassword+'<br>';
                               //alert(divMsg);
                               $("#divReset").html(divMsg);			
                       }
                  });
           }

       }
    

     
       
        /*
        Function to get check unique user/EMail-id.
        By: Rasmi Ranjan Swain
        On: 01-AUG-2015	
        */
       function checkDuplicateUser(userId,controlVal,controlName,spanName,hiddenName,flag)
       {
            var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          if(controlVal=='')
               {
                   $('#'+spanName).html('');
                   return false;
               }
              // alert(userId+controlVal);
              // if()

           $.ajax({
               type: "POST",
               url: appURL + '/proxy',
               dataType: "json",
               data: {method: 'checkDuplicateUser', userId: userId, controlVal: controlVal, flag:flag ,hdnPrevSessionId:hdnPrevSessionId},
               success: function (data) {

                   var res = data.result;
                   var num = Number(res);
                  // alert(Number(res));
                   $('#'+hiddenName).val(num);
                   if(num>0)
                    {	
                            if(flag==1)
                                    $('#'+spanName).html("<i class='icon-user'></i>&nbsp;User ID Already Exist");
                            else
                                    $('#'+spanName).html("<i class='icon-envelope'></i>&nbsp;email Already Exist");
                            $('#'+controlName).focus();
                    }
                    else
                    {
                            $('#'+spanName).html("");
                    }
               }
           });

       }
      
        /*
        Function to fill Location.
        By:  T Ketaki Debadarshini 
        On: 18-May-2016
        */
           function fillLocation(selVal,fillCtrlId)
           { 
                var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
               var tabDiv='<option value="0">--Select--</option>';
               var selected='';
                $.ajax({
                     type: "POST",
                     url: appURL + '/proxy',
                     dataType: "json",
                     data: {method: "fillLocation",hdnPrevSessionId:hdnPrevSessionId},
                     success: function (data)
                     {
                        var res = data.result;
                        var totalRecord = data.result.length;

                        if(totalRecord>0){
                             for (var i=0;i<totalRecord;i++)
                             {                            
                                if(selVal==res[i].intLocId)
                                  selected='selected="selected"';
                                else
                                  selected='';
                                 tabDiv+='<option value="'+res[i].intLocId+'" '+selected+'>';
                                 tabDiv+= res[i].strLocName;
                                 tabDiv+='</option>'; 
                             }
                        }

                         $("#"+fillCtrlId).html(tabDiv);				
                     }
                });

           }
      
         /*
    Function to fill Department.
    By:  T Ketaki Debadarshini 
    On: 11-Sept-2015
    */
       function getDepartments(intLocid,fillCtrlId,selVal)
       { 
            var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
           var tabDiv='<option value="0">--Select--</option>';
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "getDepartments",intLocid: intLocid,hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.result;
                    var totalRecord = data.result.length;
                     var selected='';
                    if(totalRecord>0){
                         for (var i=0;i<totalRecord;i++)
                         {                            
                            if(selVal==res[i].intDeptId)
                              selected='selected="selected"';
                            else
                              selected='';
                             tabDiv+='<option value="'+res[i].intDeptId+'" '+selected+'>';
                             tabDiv+= res[i].strDeptName;
                             tabDiv+='</option>'; 
                         }
                    }
                     $("#"+fillCtrlId).html(tabDiv);				
                 }
            });

       }
	   
	   
        /*
    Function to fill Designation.
    By:  T Ketaki Debadarshini 
    On: 11-Sept-2015
    */
       function getDesignation(intDeptid,fillCtrlId,selVal)
       { 
            var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
           var tabDiv='<option value="0">--Select--</option>';
           var selected='';
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "getDesignation",intDeptid: intDeptid,hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.result;
                    var totalRecord = data.result.length;
                    
                    if(totalRecord>0){
                         for (var i=0;i<totalRecord;i++)
                         {                            
                            if(selVal==res[i].intDesgId)
                              selected='selected="selected"';
                            else
                              selected='';
                             tabDiv+='<option value="'+res[i].intDesgId+'" '+selected+'>';
                             tabDiv+= res[i].strDesgName;
                             tabDiv+='</option>'; 
                         }
                    }
                    
                     $("#"+fillCtrlId).html(tabDiv);				
                 }
            });

       }
    
 
 
    
   /*
	Function to fill Bug Type
        By:   T Ketaki Debadarshini 
        On: 10-JUN-2016
	*/
  $.fillBugType = function(id,sval)
	{
             var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
		var ddlBType = $('#'+id);
		$.ajax({
			type: "POST",
			url: appURL+"/js/bugType.json",
			dataType: "text",
			success: function(data) {	
				var option	= '<option value="0">--Select--</option>';
				var json        = $.parseJSON(data);
				$(json.bugType).each(function(){
					var text 	= $(this)[0].type;
					var val		= $(this)[0].value;
					var selVal	= (val==sval)?" selected='selected'":"";
					option += "<option value='"+val+"' "+selVal+">"+text+"</option>";
				});
				ddlBType.html(option);
			}
		});
	} 

/*
	=Function to bind GlobalLink
        By:   T Ketaki Debadarshini 
        On: 10-JUN-2016
	*/
$.fillGLLink = function(controlId,selValue)
{
     var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
	$.ajax({
		type: "POST",
		url: appURL+'/proxy',			
		dataType: "json",
		data	: {method:'fillGLLink',selVal:selValue,hdnPrevSessionId:hdnPrevSessionId},
		success: function(data) {
			$('#'+controlId).html(data.globalMenu);			
		}
	});
}

/*
	=Function to bind PrimaryLink
        By:   T Ketaki Debadarshini 
        On: 10-JUN-2016
	*/
$.fillPLLink = function(controlId,glId,selValue)
{
     var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
    if(glId>0)
    {
	$.ajax({
		type: "POST",
		url: appURL+'/proxy',			
		dataType: "json",
		data	: {method:'fillPLLink',glID:glId,selVal:selValue,hdnPrevSessionId:hdnPrevSessionId},
		success: function(data) {
			$('#'+controlId).html(data.primaryMenu);			
		}
	});
    }
    else
    {
        var selOption = "<option value='0'>--Select--</option>";
        $('#'+controlId).html(selOption);
    }
}

/*
    Function to fill Districts.
    By: T Ketaki Debadarshini
    On: 2-Sep-2016
    */
       function fillDistricts(selVal,fillCtrlId)
       { 
            var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
            var tabDiv='<option value="0">--Select--</option>';
           var selected='';
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "fillDistricts",hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.result;
                    var totalRecord = data.result.length;

                    if(totalRecord>0){
                         for (var i=0;i<totalRecord;i++)
                         {                            
                            if(selVal==res[i].intDistId)
                              selected='selected="selected"';
                            else
                              selected='';
                             tabDiv+='<option value="'+res[i].intDistId+'" '+selected+'>';
                             tabDiv+= res[i].strDistName;
                             tabDiv+='</option>'; 
                         }
                    }

                     $("#"+fillCtrlId).html(tabDiv);				
                 }
            });

       }
       
       
        /*
                Function to get News Details.
                By: T Ketaki Debadarshini
                On: 18-Nov-2015
         */
        function getNewsDetails(id, lang)
        { 
             var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
            $.ajax({
                type: "POST",
                url: appURL + '/proxy',
                dataType: "json",
                data: {method: 'news', ID: id,hdnPrevSessionId:hdnPrevSessionId},
                success: function (data) {

                    var newsHeadLineE = data.newss.news[0].strHeadLineE;
                    var newsHeadLineH = data.newss.news[0].strHeadLineH;
                    var newsDetailsE  = data.newss.news[0].strDetailE;
                    var newsDetailsH  = data.newss.news[0].strDetailH;
                    var snipetLen	  = data.newss.snipet.length;
                    var tabDiv		  ='';
                    if(snipetLen>0)
                    {
                            if(data.newss.news[0].intCategoryId==1)
                                tabDiv		  +='<h4><strong>News Heighlights</strong></h4>';
                            else
                                tabDiv		  +='<h4><strong>BJD Sandesh Heighlights</strong></h4>';
                            for(var i=0;i<snipetLen;i++)
                            {
                                  tabDiv		  +='<h5>'+data.newss.snipet[i].strHeighlight+'</h5>';
                            }
                             if (lang == 1)
                             {
                                  if(data.newss.news[0].intCategoryId==1)
                                    tabDiv		  +='<h4><strong>News Details</strong></h4>';
                                  else
                                    tabDiv		  +='<h4><strong>BJD Sandesh Details</strong></h4>';

                                    tabDiv+=newsDetailsE;
                                    $('#myModalLabel').html(newsHeadLineE);
                                    $('#divContent').html(tabDiv);
                             }
                             if (lang == 2)
                             {

                                 if(data.newss.news[0].intCategoryId==1)
                                    tabDiv		  +='<h4><strong>News Details in Odia</strong></h4>';
                                  else
                                    tabDiv		  +='<h4><strong>BJD Sandesh Details in Odia</strong></h4>';
                                 tabDiv+=newsDetailsH;
                                 $('#myModalLabel').html('<span class="odia">'+newsHeadLineH+'</span>');
                                 $('#divContent').html(tabDiv);
                             }
                    }
                    else
                    {
                             if (lang == 1)
                            {
                                    $('#myModalLabel').html(newsHeadLineE);
                                    $('#divContent').html(newsDetailsE);

                                    $('#myModalLabel').removeClass("odia");
                                    $('#divContent').removeClass("odia");
                            }
                            if (lang == 2)
                            {
                                    $('#myModalLabel').html(newsHeadLineH);
                                    $('#divContent').html(newsDetailsH);
                                    $('#myModalLabel').addClass("odia");
                                     $('#divContent').addClass("odia");
                            }
                    }
                }
            });
        }

           /*
                Function to get Gallery Category Details.
                By: T Ketaki Debadarshini
                On: 18-Nov-2015
         */
        function getGalleryCatDetails(id, lang)
        { 
             var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
            $.ajax({
                type: "POST",
                url: appURL + '/proxy',
                dataType: "json",
                data: {method: 'gelCat', ID: id,hdnPrevSessionId:hdnPrevSessionId},
                success: function (data) {

                    var galCatE = data.CatDetails.strCategory;
                    var galCatH = data.CatDetails.strCategoryH;
                    var galCatDetailsE = data.CatDetails.strDescription;
                    var  galCatDetailsH = data.CatDetails.strDescriptionH;
                    if (lang == 1)
                    {
                        $('#myModalLabel').removeClass("odia");
                        $('#divContent').removeClass("odia");
                        $('#myModalLabel').html(galCatE);
                        $('#divContent').html(galCatDetailsE);
                    }
                    if (lang == 2)
                    {
                        $('#myModalLabel').addClass("odia");
                        $('#divContent').addClass("odia");
                        $('#myModalLabel').html(galCatH);
                        $('#divContent').html(galCatDetailsH);
                    }

                }
            });
        }
        
        /*
    Function to fillCategory.
    By: T Ketaki Debadarshini 
    On: 18-Feb-2016
    */
    function fillCategory(selval,fillCtrlId,selType)
    {   
         var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
        $.ajax({
            type: "POST",
            url: appURL + '/proxy',
            dataType: "json",
            data: {method: "getCategory", SelVal: selval, selType: selType,hdnPrevSessionId:hdnPrevSessionId},
            success: function (data)
            {
                var res = data.category;
                $("#"+fillCtrlId).html(res);			
            }
        });

    }
    
    /*
            Function to get FAQ Details.
            By: T Ketaki Debadarshini 
            On: 30-Nov-2015
     */
    function getFaqDetails(id,lang)
    {
         var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
        $.ajax({
            type: "POST",
            url: appURL + '/proxy',
            dataType: "json",
            data: {method: 'getFaqDetails', ID: id,hdnPrevSessionId:hdnPrevSessionId},
            success: function (data) {

                var strHeadLineE = data.faqdtl.strHeadLineE;
                var strHeadLineH = data.faqdtl.strHeadLineH;

                var strDetailE = data.faqdtl.strDetailE;
                var strDetailH = data.faqdtl.strDetailH;
                if(lang==1)
                {
                    $('#myModalLabel').html(strHeadLineE);
                    $('#divContent').html(strDetailE);
                    $('#myModalLabel').removeClass("odia");
                     $('#divContent').removeClass("odia");
                }
               else if(lang==2)
               {
                   $('#myModalLabel').html(strHeadLineH);
                   $('#divContent').html(strDetailH);
                   $('#myModalLabel').addClass("odia");
                $('#divContent').addClass("odia");
               }
            }
        });
    } 
    
      /*
        Function to education details
        By  : T Ketaki Debadarshini 
        On  : 21-March-2017
        */
        function fillEducation(selval,fillCtrlId,selType)
        {   
             var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
            $.ajax({
                type: "POST",
                url: appURL + '/proxy',
                dataType: "json",
                data: {method: "fillEducation", selval: selval, selType: selType,hdnPrevSessionId:hdnPrevSessionId},
                success: function (data)
                {
                    var res = data.category;
                    $("#"+fillCtrlId).html(res);			
                }
            });

        }
        
        /*
        Function to sector details
        By  : T Ketaki Debadarshini 
        On  : 21-March-2017
        */
        function fillSector(selval,fillCtrlId)
        {   
             var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
            $.ajax({
                type: "POST",
                url: appURL + '/proxy',
                dataType: "json",
                data: {method: "fillSector", selval: selval,hdnPrevSessionId:hdnPrevSessionId},
                success: function (data)
                {
                    var res = data.category;
                    $("#"+fillCtrlId).html(res);			
                }
            });

        }

        /*
        Function to sector details
        By  : T Ketaki Debadarshini 
        On  : 23-March-2017
        */
        function fillInstitute(selval,fillCtrlId,selDist)
        {   
             var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
            $.ajax({
                type: "POST",
                url: appURL + '/proxy',
                dataType: "json",
                data: {method: "fillInstitute", selval: selval, selDist: selDist,hdnPrevSessionId:hdnPrevSessionId},
                success: function (data)
                {
                    var res = data.category;
                    $("#"+fillCtrlId).html(res);			
                }
            });

        }
       
       
        /*
        Function to get course details
        By  : T Ketaki Debadarshini 
        On  : 23-March-2017
        */
        function fillCourse(selval,fillCtrlId,selSector)
        {    
             var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
            $.ajax({
                type: "POST",
                url: appURL + '/proxy',
                dataType: "json",
                data: {method: "fillCourse", selval: selval, selSector: selSector,hdnPrevSessionId:hdnPrevSessionId},
                success: function (data)
                {
                    var res = data.course;
                    $("."+fillCtrlId).html(res);
                    
                    $("."+fillCtrlId).each(function() {
                            $( this ).closest( ".clsCourseIds" ).find(".txtHidCourse").val();
                            $( this ).val($( this ).closest( ".clsCourseIds" ).find(".txtHidCourse").val());
                      });
                }
            });

        }
        
        

         /*
     Function to get all Type List
     Created by     : T Ketaki Debadarshini
     Created On     : 31-May-2016
 */
    function getCoursesDetails(intInstituteid)
    {
            var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
            var tabDiv  = '';
            $.ajax({
                type: "POST",
                url: appURL + '/proxy',
                dataType: "json",
                data: {method: 'getCoursesDetails',intInstituteid:intInstituteid,hdnPrevSessionId:hdnPrevSessionId},
                success: function (data) {

                    var res              = data.courseDetails;  var singlequote = "'";
                    var straddStyle      = '';  
                    if(res.length > 0 && parseInt(intInstituteid)>0){
                     
                        for (var i=0;i<res.length;i++)
                        {                            
                         
                            tabDiv+='<tr class="addTr">';
                            tabDiv+='    <td class="clsCourseIds">'; 
                            tabDiv+='       <select class="form-control selCourse" name="selCourse[]" id="selCourse_'+(i)+'" >'; 
                            tabDiv+='           <option value="0">--Select--</option>'; 
                            tabDiv+='       </select>'; 
                            tabDiv+='<input type="hidden" class="form-control txtHidCourse" id="txtHidCourse_'+(i)+'" name="txtHidCourse[]" value="'+res[i].intCourseId+'" />'; 
                            tabDiv+='        <input type="hidden" class="form-control txtHidId" id="txtHidId_'+(i)+'" name="txtHidId[]" value="'+res[i].intInstCourseid+'" />'; 
                            tabDiv+='   </td>';
                            tabDiv+='   <td><input type="text" class="form-control txtBatch" id="txtBatch_'+(i)+'" name="txtBatch[]" maxlength="5" value="'+res[i].intBatchNo+'" onkeypress="return isNumberKey(event);" /></td>'; 
                            tabDiv+='    <td><input type="text" class="form-control txtBatchStrength" id="txtBatchStrength_'+(i)+'" name="txtBatchStrength[]" maxlength="10" value="'+res[i].intBatchStrength+'" onkeypress="return isNumberKey(event);" /></td>'; 

                             if(res.length==1)
                                 straddStyle      = 'style="display: none;"';
                           
                            tabDiv+='       <td align="center"><a href="javascript:void(0);"  class="btn btn-info btn-xs addMore"><i class=" fa fa-plus"></i></a> <a href="javascript:void(0);" '+straddStyle+' class="btn btn-danger btn-xs remove" ><i class=" fa fa-minus"></i></a></td>'; 				
                                  
                           tabDiv+='</tr>'; 

                        }
                       
                    }    
                   else{
                            tabDiv+='<tr class="addTr">';
                            tabDiv+='    <td class="clsCourseIds">'; 
                            tabDiv+='       <select class="form-control selCourse" name="selCourse[]" id="selCourse_0">'; 
                            tabDiv+='           <option value="0">--Select--</option>'; 
                            tabDiv+='       </select>'; 
                            tabDiv+='       <input type="hidden" class="form-control txtHidCourse" id="txtHidCourse_0" name="txtHidCourse[]" value="0" />'; 
                            tabDiv+='       <input type="hidden" class="form-control txtHidId" id="txtHidId_0" name="txtHidId[]" value="0" />'; 
                            tabDiv+='   </td>'; 

                            tabDiv+='   <td><input type="text" class="form-control txtBatch" id="txtBatch_0" name="txtBatch[]" maxlength="5" value="" onkeypress="return isNumberKey(event);" /></td>'; 
                            tabDiv+='    <td><input type="text" class="form-control txtBatchStrength" id="txtBatchStrength_0" name="txtBatchStrength[]" maxlength="10" value="" onkeypress="return isNumberKey(event);" /></td>'; 

                             
                            tabDiv+='       <td align="center"><a href="javascript:void(0);" class="btn btn-info btn-xs addMore"><i class=" fa fa-plus"></i></a> <a href="javascript:void(0);" class="btn btn-danger btn-xs remove" style="display:none;"><i class=" fa fa-minus"></i></a></td>'; 				
                                  
                           tabDiv+='</tr>'; 
                   }     
                     $("#appendddiv").html(tabDiv);
                     
                    ////fill course
                      fillCourse('0','selCourse','0');
                      
                      
                        
                        $('.addMore').on('click',function(){

                           var rowNo       = $('.addTr').length;
                           if (!validateCoursedetails())
                           return false;

                           var cloneRow    = $('.addTr:last').clone(true);
                           cloneRow.find('.selCourse').prop('selectedIndex', 0);
                           cloneRow.find('.txtBatch').val('');
                           cloneRow.find('.txtBatchStrength').val('');
                           cloneRow.find('.txtHidId').val('0');
                           cloneRow.find('.txtHidCourse').val('0');

                           $(this).closest('tr').after(cloneRow);
                           $('.addTr:last').find('.txtHidCourse').attr("id", "txtHidCourse_"+rowNo);
                           $('.addTr:last').find('.selCourse').attr("id", "selCourse_"+rowNo);
                           $('.addTr:last').find('.txtBatch').attr("id", "txtBatch_"+rowNo);
                           $('.addTr:last').find('.txtBatchStrength').attr("id", "txtBatchStrength_"+rowNo);
                           $('.addTr:last').find('.txtHidId').attr("id", "txtHidId_"+rowNo);

                           $('.remove').show();
                       });

                       $('.remove').on('click',function(){
                          
                               $(this).closest('.addTr').remove();
                               if($('.remove').length==1)
                                $('.remove').hide();
                            
                                $.each($('.addTr'),function(e){
                                    var rowNo	= Number(e)+0;  
                                    $(this).find('.txtHidCourse').attr("id", "txtHidCourse_"+rowNo);
                                    $(this).find('.selCourse').attr("id", "selCourse_"+rowNo);
                                    $(this).find('.txtBatch').attr("id", "txtBatch_"+rowNo);
                                    $(this).find('.txtBatchStrength').attr("id", "txtBatchStrength_"+rowNo);
                                    $(this).find('.txtHidId').attr("id", "txtHidId_"+rowNo);
                                  
                            });  
                                
                       });
                       
                        $('.selCourse').on('change',function(){

                                CheckPreviousCourse($(this).attr("id"))  ;
                       });
        
                 }
            });
            
      
    }

    /*
        Function to get course details
        By  : T Ketaki Debadarshini 
        On  : 23-March-2017
        */
        function showInstituteCourse(intInstituteId)
        {    
             var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
            $('#myModal').modal();
            $.ajax({
                         type: "POST",
                         url: appURL + '/proxy',
                         dataType: "json",
                         data: {method: "getCoursesDetails", intInstituteid: intInstituteId,hdnPrevSessionId:hdnPrevSessionId},
                         success: function (data)
                         {
                        
                                 var res              = data.courseDetails; 
                                 var tabDiv = '';
                                 
                          
                                if(res.length > 0){
                                    
                                     tabDiv += '<table class="table table-striped table-bordered table-hover"><thead> <tr>';
                                      tabDiv += '                   <th width="20">Sl.#</th>';
                                      tabDiv += '                  <th>Course</th>';
                                      tabDiv += '                  <th>No of Shift/Batch </th>';
                                      tabDiv += '                  <th>Batch Strength </th>';
                                      tabDiv += '                 </tr>';
                                      tabDiv += '               </thead>';
                                      tabDiv += '               <tbody>';

                                    for (var i=0;i<res.length;i++)
                                    {                            
                                            
                                        if(res[i].intCourseType==12)
                                       {
                                         var type = "(Fresh)";

                                       }
                                       else if (res[i].intCourseType==13)
                                       {
                                        var type = "(Lateral Entry)";
                                       }
                                       else
                                       {
                                        var type = " ";
                                       }  
                                            
                                        tabDiv+='<tr>';

                                        tabDiv+='    <td>'+(i+1)+'</td>'; 
                                        tabDiv+='    <td>'+res[i].vchCourseNameE+ ' '+type+'</td>'; 
                                        tabDiv+='    <td>'+res[i].intBatchNo+'</td>'; 
                                        tabDiv+='    <td>'+res[i].intBatchStrength+'</td>'; 
                                        tabDiv+='</tr>';

                                    }
                                    tabDiv += '               </tbody>';
                                    tabDiv += '               </table>';
                                } 
                                 $("#divInstituteCourse").html(tabDiv);
                                 
                         }
                 });

        }
        
        
        function uploadFileToTemp(forFileName,filename,hdnFilename,fileType,loadingId,fileSize,errMsgSize,mbKbType, imageId,topFlag,conformImg)
        { 
            
              var hdnPrevSessionId            = $('#hdnPrevSessionId').val();   
                if (!IsCheckFile(filename, 'Invalid File Type', fileType)) 
                {
                   // scrollToPosition(filename);
                    $("#"+hdnFilename).val('');
                    return false;
                }    
                if(!chkFileSize(filename,fileSize,errMsgSize,mbKbType))
                {
                    $("#"+hdnFilename).val('');
                    return false;
                }
                
                 $("#"+loadingId).show();
                var hdnVal	=  $("#"+hdnFilename).val();
                
                
                $.ajaxFileUpload
                (   
                    { 			
                        url:appURL + '/proxy',
                        secureuri:false,
                        fileElementId:filename,
                        dataType: 'json',
                        data:{method:'uploadToTemp',filename:filename,fName:forFileName,hdnVal:hdnVal,hdnPrevSessionId:hdnPrevSessionId},
                        success: function (data)
                        { 
                            if(data.status==0){
                                
                                if(topFlag==2)
                                {
                                    top.$("#"+hdnFilename).val(data.savedFileName);	
                                    top.$("#"+conformImg).show();
                                }
                                else
                                {
                                    $("#"+hdnFilename).val(data.savedFileName); 
                                    $("#"+conformImg).show();
                                }

                                if(imageId!='')
                                {  
                                    if (topFlag==2)
                                            top.$("#"+imageId).attr('src',data.filePath+data.savedFileName);
                                     else 
                             $("#"+imageId).attr('src',data.filePath+data.savedFileName);
                                 }
                             }else{
                              $("#" + imageId).prop('src', siteUrl+"/images/demo-profile.png");
                                    viewAlert(data.msg); 
                                    $("#"+loadingId).hide();
                                    return false;
                             }
                                    $("#"+loadingId).hide();
                        },
                        error: function (data, status, e)
                        {  
                          alert(e);
                        }
                    }
                )
            return false;
        }

          /*
            Function to get all gallery List
            Created by     : T Ketaki Debadarshini
            Created On     : 19-April-2017
        */
           function getInstGalleryDetails(intInstituteid)
           {
                 var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
                   var tabDiv  = '';
                   
                  
                   $.ajax({
                       type: "POST",
                       url: appURL + '/proxy',
                       dataType: "json",
                       data: {method: 'getInstGalleryDetails',intInstituteid:intInstituteid,hdnPrevSessionId:hdnPrevSessionId},
                       success: function (data) {

                           var res              = data.galleryDetails;  var singlequote = "'";
                           var straddStyle      = '';  
                           if(res.length > 0 && parseInt(intInstituteid)>0 ){

                               for (var i=0;i<res.length;i++)
                               {                            
                                    tabDiv+='<tr class="addTr">    ';
                                    tabDiv+='    <td class="clsCourseIds"> ';
                                    tabDiv+='        <input type="text" id="txtCaption_'+(i)+'" name="txtCaption[]" placeholder="" class="form-control txtCaption" maxlength="100" value="'+res[i].vchCaptionE+'">';
                                    tabDiv+='         <input type="hidden" class="form-control txtHidId" id="txtHidId_'+(i)+'" name="txtHidId[]" value="'+res[i].intInstGalId+'">   ';
                                    tabDiv+='    </td>   ';
                                    tabDiv+='    <td>';
                                    tabDiv+='        <input type="text" class="form-control txtCaptionO odia" id="txtCaptionO_'+(i)+'" name="txtCaptionO[]" maxlength="120" value="'+res[i].vchCaptionO+'" >';
                                    tabDiv+='    </td>    ';
                                    tabDiv+='    <td>  ';
                                    tabDiv+='         <input type="file" id="fileDocument_'+(i)+'" name="fileDocument_'+(i)+'" placeholder="" class="form-control fileGalleryimg" > ';
                                    tabDiv+='        <input type="hidden" class="hdnImageFile" name="hdnImageFile[]" id="hdnImageFile_'+(i)+'" value="'+res[i].vchImage+'"/>';
                                            
                                    tabDiv+='        <img id="loaderfile_'+(i)+'" class="loader" src="'+appURL+'/img/loading.gif" style="display: none;"> ';
                                    tabDiv+='        <i class="fa fa-check uploadConf" id="spnfileupload_'+(i)+'" style="display:none;"></i>';
                                    tabDiv+='     </td> ';
                                    tabDiv+='     <td height="80">  ';
                                    tabDiv+='            <img id="userImage_'+(i)+'" width="110" height="60" alt="" class="passportPhoto1 userImage" src="'+appURL+'/uploadDocuments/instGallery/'+res[i].vchImage+'">';
                                    tabDiv+='    </td>';      
                                    
                                    if(res.length==1)
                                        straddStyle      = 'style="display: none;"';

                                   tabDiv+='       <td align="center"><a href="javascript:void(0);"  class="btn btn-info btn-xs addMore"><i class=" fa fa-plus"></i></a> <a href="javascript:void(0);" '+straddStyle+' class="btn btn-danger btn-xs remove" ><i class=" fa fa-minus"></i></a></td>'; 				

                                  tabDiv+='</tr>'; 

                               }

                           }    
                          else{
                              
                                 tabDiv+='<tr class="addTr"> ';   
                                 tabDiv+='       <td class="clsCourseIds"> ';
                                 tabDiv+='           <input type="text" id="txtCaption_0" name="txtCaption[]" placeholder="" class="form-control txtCaption" maxlength="100" value="">';
                                 tabDiv+='            <input type="hidden" class="form-control txtHidId" id="txtHidId_0" name="txtHidId[]" value="0">   ';
                                 tabDiv+='       </td>   ';
                                 tabDiv+='       <td>';
                                 tabDiv+='           <input type="text" class="form-control txtCaptionO odia" id="txtCaptionO_0" name="txtCaptionO[]" maxlength="120" value="" >';
                                 tabDiv+='       </td>    ';
                                 tabDiv+='       <td>  ';
                                 tabDiv+='           <input type="file" id="fileDocument_0" name="fileDocument_0" placeholder="" class="form-control fileGalleryimg" > ';
                                 tabDiv+='           <input type="hidden" class="hdnImageFile" name="hdnImageFile[]" id="hdnImageFile_0" value=""/>';
                                       
                                 tabDiv+='              <img id="loaderfile_0" class="loader" src="'+appURL+'/img/loading.gif" style="display: none;"> ';
                                 tabDiv+='               <i class="fa fa-check uploadConf" id="spnfileupload_0" style="display:none;"></i>';
                                 tabDiv+='            </td> ';
                                 tabDiv+='            <td height="80">  ';
                                 tabDiv+='                   <img id="userImage_0" width="110" height="60" alt="" class="passportPhoto1 userImage" style="display: none;">';
                                 tabDiv+='           </td>       ';
                                 tabDiv+='           <td align="center">';
                                 tabDiv+='               <a href="javascript:void(0);" class="btn btn-info btn-xs addMore"><i class=" fa fa-plus"></i></a> ';
                                 tabDiv+='               <a href="javascript:void(0);" class="btn btn-danger btn-xs remove" style="display:none;"><i class=" fa fa-minus"></i></a>';
                                 tabDiv+='           </td>';
                                 tabDiv+='     </tr>';
                                 
                          }     
                            $("#appendddiv").html(tabDiv);

                           
                             $('.addMore').on('click',function(){

                                var rowNo       = $('.addTr').length;
                                if(rowNo<=15){
                                        if (!validator())
                                          return false;

                                        var cloneRow    = $('.addTr:last').clone(true);

                                        cloneRow.find('.txtCaption').val('');
                                        cloneRow.find('.txtCaptionO').val('');
                                        cloneRow.find('.fileGalleryimg').val('');
                                        cloneRow.find('.hdnImageFile').val('');
                                        cloneRow.find('.txtHidId').val(0);

                                        cloneRow.find('.loader').hide();
                                        cloneRow.find('.uploadConf').hide();
                                        cloneRow.find('.userImage').hide();

                                        $(this).closest('tr').after(cloneRow);

                                        $('.addTr:last').find('.txtCaption').attr("id", "txtCaption_"+rowNo);
                                        $('.addTr:last').find('.txtHidId').attr("id", "txtHidId_"+rowNo);
                                        $('.addTr:last').find('.txtCaptionO').attr("id", "txtCaptionO_"+rowNo);
                                        $('.addTr:last').find('.fileGalleryimg').attr("id", "fileDocument_"+rowNo);
                                        $('.addTr:last').find('.fileGalleryimg').attr("name", "fileDocument_"+rowNo);
                                        $('.addTr:last').find('.hdnImageFile').attr("id", "hdnImageFile_"+rowNo);
                                        $('.addTr:last').find('.loader').attr("id", "loaderfile_"+rowNo);
                                        $('.addTr:last').find('.uploadConf').attr("id", "spnfileupload_"+rowNo);
                                        $('.addTr:last').find('.userImage').attr("id", "userImage_"+rowNo);

                                        $('.remove').show();
                                    }else{
                                        viewAlert('Maximum 15 images are allowed to upload.');
                                                return false;
                                    }       
                            });

                            $('.remove').on('click',function(){

                                    $(this).closest('.addTr').remove();
                                    if($('.remove').length==1)
                                        $('.remove').hide();

                                     $.each($('.addTr'),function(e){
                                        var rowNo	= Number(e)+0;  

                                        $('.addTr:last').find('.txtCaption').attr("id", "txtCaption_"+rowNo);
                                        $('.addTr:last').find('.txtCaptionO').attr("id", "txtCaptionO_"+rowNo);
                                        $('.addTr:last').find('.fileGalleryimg').attr("id", "fileDocument_"+rowNo);
                                        $('.addTr:last').find('.fileGalleryimg').attr("name", "fileDocument_"+rowNo);
                                        $('.addTr:last').find('.hdnImageFile').attr("id", "hdnImageFile_"+rowNo);
                                        $('.addTr:last').find('.loader').attr("id", "loader_"+rowNo);
                                        $('.addTr:last').find('.uploadConf').attr("id", "uploadConf_"+rowNo);
                                        $('.addTr:last').find('.userImage').attr("id", "userImage_"+rowNo);

                                 });  

                            });

                              $(document).on('change','.fileGalleryimg',function(){
                                
                                    var elmId      = this.id;
                                    var aryelm     = elmId.split("_");

                                    readImage(this,'userImage_'+aryelm[1]);
                                    return uploadFileToTemp('InstGal',elmId, 'hdnImageFile_'+aryelm[1],'jpeg,jpg,gif','loaderfile_'+aryelm[1],1024,1,2, '', '', 'spnfileupload_'+aryelm[1]);

                                 });

                        }
                   });


           }
           
           /*
        Function to get Photo Gallery Details.
        By: T Ketaki Debadarshini
        On: 19-Nov-2015
        */
       function getGalleryDetails(id, lang)
       { 
            var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
           $.ajax({
               type: "POST",
               url: appURL + '/proxy',
               dataType: "json",
               data: {method: 'GalleryDetails', ID: id,hdnPrevSessionId:hdnPrevSessionId},
               success: function (data) {

                   var strCaption = data.GalleryDetails.strCaption;
                   var strCaptionH = data.GalleryDetails.strCaptionH;
                   var strDescription = data.GalleryDetails.strDescription;
                   var strDescriptionH = data.GalleryDetails.strDescriptionH;
                   if (lang == 1)
                   {
                       $('#myModalLabel').removeClass("odia");
                       $('#divContent').removeClass("odia");
                       $('#myModalLabel').html(strCaption);
                       $('#divContent').html(strDescription);
                   }
                   if (lang == 2)
                   {
                      $('#myModalLabel').addClass("odia");
                      $('#divContent').addClass("odia");
                      $('#myModalLabel').html(strCaptionH);
                      $('#divContent').html(strDescriptionH);

                   }

               }
           });
       }
       
       
       /*
        Function to get training partner details
        By  : T Ketaki Debadarshini 
        On  : 08-Jan-2018
        */
        function fillInstitutePartner(selval,fillCtrlId)
        {   
            var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
            $.ajax({
                type    : "POST",
                url     : appURL + '/proxy',
                dataType: "json",
                data    : {method: "fillInstitutePartner", selval: selval,hdnPrevSessionId:hdnPrevSessionId},
                success: function (data)
                {
                    var res = data.partnerDtls;
                    $("#"+fillCtrlId).html(res);			
                }
            });

        }
        
        function fillIndiaStates(s, e) {
            var a = $("#hdnPrevSessionId").val(),
                t = "";
            $.ajax({
                type: "POST",
                url: siteUrl + "/proxy",
                dataType: "json",
                data: {
                    method: "fillIndiaStates",
                    hdnPrevSessionId: a
                },
                success: function(a) {
                    var r = a.result,
                        l = a.result.length;
                    if (l > 0)
                        for (var i = '<option value="0" >--All--</option>"', n = 0; l > n; n++) t = s == r[n].intStateId ? 'selected="selected"' : "", i += '<option value="' + r[n].intStateId + '" ' + t + ' >', i += r[n].strStateName, i += "</option>";
                    $("#" + e).html(i)
                }
            })
        }

        function fillIndiaDistricts(s,intStateId, e) {
            var a = $("#hdnPrevSessionId").val(),
                t = "";
            $.ajax({
                type: "POST",
                url: siteUrl + "/proxy",
                dataType: "json",
                data: {
                    method: "fillIndiaDistricts",
                    hdnPrevSessionId: a,
                    intStateId : intStateId
                },
                success: function(a) {
                    var r = a.result,
                        l = a.result.length;
                    if (l > 0)
                        for (var i = '<option value="0" >--All--</option>"', n = 0; l > n; n++) t = s == r[n].intDistId ? 'selected="selected"' : "", i += '<option value="' + r[n].intDistId + '" ' + t + ' >', i += r[n].strDistName, i += "</option>";
                    $("#" + e).html(i)
                }
            })
        }
        
        
         function fillIndiaSkill(s, e) {
            var a = $("#hdnPrevSessionId").val(),
                t = "";
            $.ajax({
                type: "POST",
                url: appURL + "/proxy",
                dataType: "json",
                data: {
                    method: "fillIndiaSkill",
                    hdnPrevSessionId: a
                },
                success: function(a) {
                    var r = a.result,
                        l = a.result.length;
                    if (l > 0)
                        for (var i = '<option value="0" >--All--</option>"', n = 0; l > n; n++) t = s == r[n].intSkillId ? 'selected="selected"' : "", i += '<option value="' + r[n].intSkillId + '" ' + t + ' >', i += r[n].strSkillName, i += "</option>";
                    $("#" + e).html(i)
                }
            })
        }

        function fillIndiaSkillUpdate(s, e) {
            var a = $("#hdnPrevSessionId").val(),
                t = "";
            var allCase = (s==100)?'selected="selected"' : "";
            $.ajax({
                type: "POST",
                url: appURL + "/proxy",
                dataType: "json",
                data: {
                    method: "fillIndiaSkill",
                    hdnPrevSessionId: a
                },
                success: function(a) {
                    var r = a.result,
                        l = a.result.length;
                    if (l > 0)
                        for (var i = '<option value="0" >--Select--</option><option value="100" '+allCase+'>All Skill</option>"', n = 0; l > n; n++) t = s == r[n].intSkillId ? 'selected="selected"' : "", i += '<option value="' + r[n].intSkillId + '" ' + t + ' >', i += r[n].strSkillName, i += "</option>";
                    $("#" + e).html(i)
                }
            })
        }
        
         /*
            Function to get all Event gallery List
            Created by     : Ashis kumar Patra
            Created On     : 13-April-2018
        */
           function getEventGalleryDetails(eventId)
           {
                 var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
                   var tabDiv  = '';
                   
                  
                   $.ajax({
                       type: "POST",
                       url: appURL + '/proxy',
                       dataType: "json",
                       data: {method: 'getEventGalleryDetails',eventId:eventId,hdnPrevSessionId:hdnPrevSessionId},
                       success: function (data) {

                           var res              = data.galleryDetails; 
                           var singlequote = "'";
                           var straddStyle      = '';  
                           if(res.length > 0 && parseInt(eventId)>0 ){

                               for (var i=0;i<res.length;i++)
                               {                            
                                    tabDiv+='<tr class="addTr">    ';
                                    tabDiv+='    <td class="clsCourseIds"> ';
                                    tabDiv+='        <input type="text" id="txtCaption_'+(i)+'" name="txtCaption[]" placeholder="" class="form-control txtCaption" maxlength="200" value="'+res[i].vchCaptionE+'">';
                                    tabDiv+='         <input type="hidden" class="form-control txtHidId" id="txtHidId_'+(i)+'" name="txtHidId[]" value="'+res[i].intEventGalId+'">   ';
                                    tabDiv+='    </td>   ';
                                    tabDiv+='    <td>';
                                    tabDiv+='        <input type="text" class="form-control txtCaptionO odia" id="txtCaptionO_'+(i)+'" name="txtCaptionO[]" maxlength="220" value="'+res[i].vchCaptionO+'" >';
                                    tabDiv+='    </td>    ';
                                    tabDiv+='    <td>  ';
                                    tabDiv+='         <input type="text" id="videoURL_'+(i)+'" name="videoURL[]" placeholder="" class="form-control fileGalleryimg"  value="'+res[i].vchvideoURL+'" > ';
                                            
                                    tabDiv+='     </td> ';
                                    
                                    if(res.length==1)
                                        straddStyle      = 'style="display: none;"';
                                    
                                  tabDiv+='       <td align="center"></td>'; 				

                                  tabDiv+='</tr>'; 

                               }

                           }    
                          else{
                            
                                 tabDiv+='<tr class="addTr"> ';   
                                 tabDiv+='       <td class="clsCourseIds"> ';
                                 tabDiv+='           <input type="text" id="txtCaption_0" name="txtCaption[]" placeholder="" class="form-control txtCaption" maxlength="200" value="">';
                                 tabDiv+='            <input type="hidden" class="form-control txtHidId" id="txtHidId_0" name="txtHidId[]" value="0">   ';
                                 tabDiv+='       </td>   ';
                                 tabDiv+='       <td>';
                                 tabDiv+='           <input type="text" class="form-control txtCaptionO odia" id="txtCaptionO_0" name="txtCaptionO[]" maxlength="220" value="" >';
                                 tabDiv+='       </td>    ';
                                 tabDiv+='       <td>  ';
                                 tabDiv+='           <input type="text" id="videoURL_0" name="videoURL[]" placeholder="" class="form-control fileGalleryimg" > ';
                                 
                                 tabDiv+='            </td> ';
                                   
                                 tabDiv+='           <td align="center">';
                                 tabDiv+='               <a href="javascript:void(0);" class="btn btn-info btn-xs addMore"><i class=" fa fa-plus"></i></a> ';
                                 tabDiv+='               <a href="javascript:void(0);" class="btn btn-danger btn-xs remove" style="display:none;"><i class=" fa fa-minus"></i></a>';
                                 tabDiv+='           </td>';
                                 tabDiv+='     </tr>';
                                 
                          }     
                            $("#appendddiv").html(tabDiv);

                           
                             $('.addMore').on('click',function(){

                                var rowNo       = $('.addTr').length;
                                if(rowNo<=15){
                                        if (!validator())
                                          return false;

                                        var cloneRow    = $('.addTr:last').clone(true);

                                        cloneRow.find('.txtCaption').val('');
                                        cloneRow.find('.txtCaptionO').val('');
                                        cloneRow.find('.fileGalleryimg').val('');
                                        cloneRow.find('.txtHidId').val(0);
                                         cloneRow.find('.videoURL').val(0);
                                        $(this).closest('tr').after(cloneRow);

                                        $('.addTr:last').find('.txtCaption').attr("id", "txtCaption_"+rowNo);
                                        $('.addTr:last').find('.txtHidId').attr("id", "txtHidId_"+rowNo);
                                        $('.addTr:last').find('.txtCaptionO').attr("id", "txtCaptionO_"+rowNo);
                                        $('.addTr:last').find('.fileGalleryimg').attr("id", "videoURL_"+rowNo);
                                        //$('.addTr:last').find('.fileGalleryimg').attr("name", "videoURL_"+rowNo);
                                       

                                        $('.remove').show();
                                    }else{
                                        viewAlert('Maximum 15 videos are allowed to upload.');
                                                return false;
                                    }       
                            });

                            $('.remove').on('click',function(){

                                    $(this).closest('.addTr').remove();
                                    if($('.remove').length==1)
                                        $('.remove').hide();

                                     $.each($('.addTr'),function(e){
                                        var rowNo	= Number(e)+0;  

                                        $('.addTr:last').find('.txtCaption').attr("id", "txtCaption_"+rowNo);
                                        $('.addTr:last').find('.txtCaptionO').attr("id", "txtCaptionO_"+rowNo);
                                        $('.addTr:last').find('.fileGalleryimg').attr("id", "videoURL_"+rowNo);
                                       // $('.addTr:last').find('.fileGalleryimg').attr("name", "videoURL_"+rowNo);
                                       

                                 });  

                            });


                        }
                   });


           }
           
         /*
            Function to get all Event List
            Created by     : Ashis kumar Patra
            Created On     : 13-April-2018
        */  
           
           function fillEvents(s, e) {
            var a = $("#hdnPrevSessionId").val(),
                t = "";
            $.ajax({
                type: "POST",
                url: appURL + "/proxy",
                dataType: "json",
                data: {
                    method: "fillEventList",
                    hdnPrevSessionId: a
                },
                success: function(a) {
                    var r = a.result,
                        l = a.result.length;
                    if (l > 0)
                        for (var i = '<option value="0" >--All--</option>"', n = 0; l > n; n++) t = s == r[n].intEventId ? 'selected="selected"' : "", i += '<option value="' + r[n].intEventId + '" ' + t + ' >', i += r[n].strEventName, i += "</option>";
                    $("#" + e).html(i)
                }
            })
        }
        
        
      /*************************************get data from page by :: samir kumar on:: 10-09-2018************************************************************/

function getContentfromPage(){
    $('#btnSubmit').hide();
    //var selectedText = $("#txtwebUrl option:selected").html();
    var selectedText = $("#hdnPageUrl").val();
    // var pattern = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
    // if(!pattern.test(selectedText)) {
    //     viewAlert("Please enter an valid URL.");
    //     return false;
    // }
    //$('#hdnPagename').val(selectedText);
    $.ajax({ url: selectedText,
             success: function(data) { 
                var str = data;
                var domParser = new DOMParser();
                //var htmlString = str;
                var htmlString = document.getElementById('urlData').contentWindow.document.body.innerHTML;
                var docElement = domParser.parseFromString(htmlString, "text/html").documentElement;
                var array = textNodesUnder(docElement);
                array = array.payload;
                //console.log(textNodesUnder(docElement));
                //console.log(allElmnt.payload[0]['w'])
                // $("script", docElement).remove();
                // var emCollection = docElement.getElementsByTagName("*");
                // var array = [];
                // for(var i = 0; i < emCollection.length; i++) {
                //    var current = emCollection[i];
                //     if(current.children.length === 0 && current.textContent.replace(/ |\n/g,'') !== '') {
                //        array.push(current.textContent.trim());
                //     }
                // } 
                var appendDta = '';
                for(var j = 0;j<array.length;j++){
                    appendDta +='<tr class="appendedRow">';
                     appendDta +='<td><label class="lblSlNo">'+(j+1)+'</label></td>';
                     //appendDta +='<td><textarea class="form-control" id="txtEnglish'+j+'" name="txtEnglish[]" rows="3" readonly="readonly">'+array[j]+'</textarea><input type="hidden" name="transId[]"</td>';
                     appendDta +='<td>'+array[j]['w']+'<input type="hidden" name="txtEnglish[]" id="txtEnglish'+j+'" value="'+array[j]['w']+'"/><input type="hidden" value="0" name="hdnIds[]" id="hdnIds'+j+'"/></td>';
                     appendDta +='<td><textarea class="form-control" id="txtHindi'+j+'" name="txtHindi[]" rows="5"></textarea></td>';
                     appendDta +='<td><textarea class="form-control" id="txtOdia'+j+'" name="txtOdia[]" rows="5"></textarea></td>';
                     appendDta +='</tr>';
                    //console.log(j);
                }
                $('#appendTr').append(appendDta);
                setTimeout(function(){ getlangData(); }, 1000);
                
    } });
}




/*************************************get content from database by :: samir kumar on:: 20-09-2018************************************************************/

function getContentfromDb(){
    $('#btnSubmit').hide();
    // var txtwebUrl    = $('#txtwebUrl').val();
    // var selectedText = $("#txtwebUrl option:selected").html();
    var selectedText   = $("#hdnPageUrl").val();
    var txtwebUrlId    = $('#hdnPageId').val();
    $.ajax({
            type: "POST",
            url: appURL + '/proxy',
            dataType: "json",
            data: {method: "getContentfromDb", txtwebUrlId: txtwebUrlId},
             success: function(data) { 
                var array = data.result;
                
                var appendDta = '';
                for(var j = 0;j<array.length;j++){
                    appendDta +='<tr class="appendedRow">';
                     appendDta +='<td><label class="lblSlNo">'+(j+1)+'</label></td>';
                     //appendDta +='<td><textarea class="form-control" id="txtEnglish'+j+'" name="txtEnglish[]" rows="3" readonly="readonly">'+array[j]+'</textarea><input type="hidden" name="transId[]"</td>';
                     appendDta +='<td>'+array[j]['vchEnglish']+'<input type="hidden" name="txtEnglish[]" id="txtEnglish'+j+'" value="'+array[j]['vchEnglish']+'"/><input type="hidden" value="0" name="hdnIds[]" id="hdnIds'+j+'"/></td>';
                     appendDta +='<td><textarea class="form-control" id="txtHindi'+j+'" name="txtHindi[]" rows="5"></textarea></td>';
                     appendDta +='<td><textarea class="form-control" id="txtOdia'+j+'" name="txtOdia[]" rows="5"></textarea></td>';
                     appendDta +='</tr>';
                    //console.log(j);
                }
                $('#appendTr').append(appendDta);
                setTimeout(function(){ getlangIds(selectedText); }, 1000);
                setTimeout(function(){ getlangData(selectedText); }, 1500);
                
    } });
}


/*************************************get language data by :: samir kumar on:: 10-09-2018************************************************************/

function getlangIds(getUrl){
    $.ajax({
        type: "POST",
        url: appURL + '/proxy',
        dataType: "json",
        data: {method: "getlangDataUrl", getUrl: getUrl},
        success: function (data)
        {
            var resSet = data.langData;
            var totRowNumber = $('.appendedRow').length;
            for (var i = 0; i < totRowNumber; i++){
                var engLang = $('#txtEnglish'+i).val();
                for(var j = 0; j<resSet.length; j++){
                    if(engLang == resSet[j].engLang){
                        var ids = (resSet[j].ids != 0 || resSet[j].ids != '')?resSet[j].ids:0;
                            $('#hdnIds'+i).val(resSet[j].ids);    
                    }
                }
            }

        }
    });
}






function getlangData(getUrl){
    $.ajax({
        type: "POST",
        url: appURL + '/proxy',
        dataType: "json",
        data: {method: "getlangDataUrl", getUrl: getUrl},
        success: function (data)
        {
            var resSet = data.langData;
            var totRowNumber = $('.appendedRow').length;
            for (var i = 0; i < totRowNumber; i++){
                var engLang = $('#txtEnglish'+i).val();
                for(var j = 0; j<resSet.length; j++){
                    if(engLang == resSet[j].engLang){
                        //var ids = (resSet[j].ids != 0 || resSet[j].ids != '')?resSet[j].ids:0;
                        //if(resSet[j].ids > 0){
                            //$('#hdnIds'+i).val(resSet[j].ids);    
                        //}
                        
                        $('#txtHindi'+i).val(resSet[j].hinLang);
                        $('#txtOdia'+i).val(resSet[j].odiLang);
                    }
                }
            }
            //$('#btnFetch').hide();
            $('#btnSubmit').show();

        }
    });
}









/*************************************translate function walk through every element by :: samir kumar on:: 10-09-2018************************************************************/


function el(id) {
        return document.getElementById(id)
    }

    function removeElement(obj) {
        if (obj) {
            return obj.parentNode.removeChild(obj)
        }
        return
    }

    function textNodesUnder(el) {
        var n, a = [],
            b = [],
            walk = document.createTreeWalker(el, 4, null, false);
        var c = [];
        var d = [];
        while (n = walk.nextNode()) {
            if (n.textContent.trim() != "" && n.textContent.trim().indexOf("BESbswy") < 0 && n.textContent.trim().indexOf("){") < 0 && n.textContent.trim().indexOf(") {") < 0 && isNaN(n.textContent.trim()) && !(n.textContent.trim().length == 1 && !isALetter(n.textContent.trim())) && n.parentNode.nodeName.toUpperCase() != "SCRIPT" && n.parentNode.nodeName.toUpperCase() != "STYLE" && n.parentNode.nodeName.toUpperCase() != "NOSCRIPT" && !hasAncestorAttribute(n.parentNode, "wg-notranslate")) {
                a.push(n.textContent);
                b.push(n);
                c.push(1);
                d.push({
                    t: 1,
                    w: n.textContent
                })
            }
        }
        if (typeof el !== "undefined") {
            var inputs = el.getElementsByTagName("input");
            for (var i = 0; i < inputs.length; i++) {
                var input = inputs[i];
                if (!hasAncestorAttribute(input, "wg-notranslate") && input.type != "hidden") {
                    if (input.placeholder.trim() != "" && isNaN(input.placeholder.trim())) {
                        a.push(input.placeholder);
                        b.push(input);
                        c.push(3);
                        d.push({
                            t: 3,
                            w: input.placeholder
                        })
                    }
                    if (input.value.trim() != "" && isNaN(input.value.trim())) {
                        a.push(input.value);
                        b.push(input);
                        c.push(2);
                        d.push({
                            t: 2,
                            w: input.value
                        })
                    }
                }
            }
            var textareas = el.getElementsByTagName("textarea");
            for (var i = 0; i < textareas.length; i++) {
                var textarea = textareas[i];
                if (!hasAncestorAttribute(textarea, "wg-notranslate")) {
                    if (textarea.placeholder.trim() != "" && isNaN(textarea.placeholder.trim())) {
                        a.push(textarea.placeholder);
                        b.push(textarea);
                        c.push(3);
                        d.push({
                            t: 3,
                            w: textarea.placeholder
                        })
                    }
                    if (textarea.value.trim() != "" && isNaN(textarea.value.trim())) {
                        a.push(textarea.value);
                        b.push(textarea);
                        c.push(1);
                        d.push({
                            t: 1,
                            w: textarea.value
                        })
                    }
                }
            }
        }
        return {
            values: a,
            nodes: b,
            types: c,
            payload: d
        }
    }

    function isALetter(letter) {
        var firstLetter = letter.toUpperCase();
        if (firstLetter.toLowerCase() != firstLetter) {
            return true
        } else {
            return false
        }
    }

    function jsoncount(obj) {
        return Object.keys(obj).length
    }

    function hasAncestorAttribute(el, attr) {
        while (el && el.nodeType === 1 && !el.hasAttribute(attr)) {
            el = el.parentNode
        }
        if (el && el.nodeType === 1 && el.hasAttribute(attr)) return true;
        else return false
    }

/*************************************fetch website urls by :: samir kumar on:: 20-09-2018************************************************************/

function getWebURL()
{
    $.ajax({
        type: "POST",
        dataType: "json",
        url: appURL + '/proxy',
        data: {method: "getWebURL"},
        success: function (data)
        {
            var res = data.result;
            /* Load results. */
            $("#txtwebUrl").html(res);
        }
    });
}

/*************************************fetch from page by :: samir kumar on:: 20-09-2018************************************************************/

function checkdbPage()
{
    $('#appendTr').html('');
    //$('#loader-div').html('<center><img src="'+appURL+'/img/loading.gif"><p> Loading... <p></center>');
    // var selectedText = $("#txtwebUrl option:selected").html();
    // var txtwebUrl    = $('#txtwebUrl').val();
    var selectedText = $("#hdnPageUrl").html();
    var txtwebUrl    = $('#hdnPageId').val();

    $.ajax({
        type: "POST",
        dataType: "json",
        url: appURL + '/proxy',
        data: {method: "checkdbPage", urlId:txtwebUrl},
        success: function (data)
        {
            $('#loader-div').html('');
            var res = data.result;
            if(res > 0){
                getContentfromDb();
            }else{
                getContentfromPage();
            }
        }
    });
}


/*************************************delete page data by :: samir kumar on:: 03-10-2018************************************************************/
function deletePagedata(pageId,ctr){
    confirmAlert('Are you sure to delete!!!');
    $('#btnConfirmOk').on('click', function () {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: appURL + '/proxy',
            data: {method: "deletePagedata", pageId:pageId},
            success: function (data)
            {
                var res = data.result;
                if(res == 200){
                    viewAlert('Data Deleted Successfully');
                }else{
                    viewAlert('Sorry Something went wrong');
                }
            }
        });
    });
     
}


/*************************************Translation form submit through ajax by :: samir kumar on:: 23-10-2018************************************************************/
function ajxSubmitData(){
    var txtwebUrl   = $('#hdnPageId').val();
    var hdnPagename = $('#hdnPageUrl').val();
    var englishVal  = $("input[name='txtEnglish[]']").map(function(){return $(this).val();}).get();
    var hindiVal    = $("textarea[name='txtHindi[]']").map(function(){return $(this).val();}).get();
    var odiaVal     = $("textarea[name='txtOdia[]']").map(function(){return $(this).val();}).get();
    var hdnIds      = $("input[name='hdnIds[]']").map(function(){return $(this).val();}).get();
    $.ajax({
            type: "POST",
            dataType: "json",
            url: appURL + '/proxy',
            data: {method: "translateSubmit", txtwebUrl:txtwebUrl,hdnPagename:hdnPagename,englishVal:englishVal,hindiVal:hindiVal,odiaVal:odiaVal,hdnIds:hdnIds},
            success: function (data)
            {
                if(data.status == 200){
                    viewAlert('Record Saved Successfully');
                    getPagepercent();
                    checkdbPage();
                }else{
                    viewAlert('Sorry Something Went Wrong');
                }
            }
        });
     
}



/*************************************get percent of translate page by :: samir kumar on:: 23-10-2018************************************************************/
function getPagepercent(){
    var webUrl       = $('#hdnPageUrl').val();
    $.ajax({
            type: "POST",
            dataType: "json",
            url: appURL + '/proxy',
            data: {method: "getPagepercent", webUrl:webUrl},
            success: function (data)
            {
                if(data.status == 200){
                    $('#hindiStat').html(data.hindiCnt);
                    $('#odiaStat').html(data.odiaCnt);
                }
            }
        });
     
}

        /*
        Function to fill News Categories.
        By:  Ashis kumar Patra
        On: 12-DEC-2018
        */
       function getNewsCategory(fillCtrlId,selVal)
       { 
            var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
           var tabDiv='<option value="0">--Select--</option>';
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "getNewsCategory",hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.newsCatRes;
                    var totalRecord = (res!=null || res !='')?data.newsCatRes.length:0;
                     var selected='';
                    if(totalRecord>0){
                         for (var i=0;i<totalRecord;i++)
                         {                            
                            if(selVal==res[i].intCategoryId)
                              selected='selected="selected"';
                            else
                              selected='';
                             tabDiv+='<option value="'+res[i].intCategoryId+'" '+selected+'>';
                             tabDiv+= res[i].strNewsType;
                             tabDiv+='</option>'; 
                         }
                    }
                     $("#"+fillCtrlId).html(tabDiv);				
                 }
            });

       }
       
       
    function fillReport(selval,fillCtrlId)
    { 
      //alert(1);
      var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
        $.ajax({
            type: "POST",
            url: appURL + '/proxy',
            dataType: "json",
            data: {method: "getReport", SelVal: selval,hdnPrevSessionId:hdnPrevSessionId},
            success: function (data)
            {
                var res = data.category;
                $("#"+fillCtrlId).html(res);      
            }
        });

    }



     /*
        Function to get Mapped Institute Details
        By  : Ashis Kumar Patra 
        On  : 11-June-2019
        */
       function fillMappingData(selval,fillCtrlId,type,insType)
       {  
           
           $.ajax({
               type: "POST",
               url: appURL + '/proxy',
               dataType: "json",
               data: {method: "fillMappingData", selval: selval,dataType:type,instituteType:insType},
               success: function (data)
               {
                   var res = data.mapData;
                   $("#"+fillCtrlId).html(res);			
               }
           });

       }


        /*
        Function to get Mapped Sector Details
        By  : Ashis Kumar Patra 
        On  : 11-June-2019
        */
       function fillMappingSector(selval,fillCtrlId,type)
       {  
           
           $.ajax({
               type: "POST",
               url: appURL + '/proxy',
               dataType: "json",
               data: {method: "fillMappingSector", selval: selval,dataType:type},
               success: function (data)
               {
                   var res = data.mapData;
                   $("#"+fillCtrlId).html(res);			
               }
           });

       }


        /*
        Function to get Mapped Course Details
        By  : Ashis Kumar Patra 
        On  : 11-June-2019
        */
       function fillMappingCourse(selval,fillCtrlId,type)
       {  
           
           $.ajax({
               type: "POST",
               url: appURL + '/proxy',
               dataType: "json",
               data: {method: "fillMappingCourse", selval: selval,dataType:type},
               success: function (data)
               {
                   var res = data.mapData;
                   $("#"+fillCtrlId).html(res);			
               }
           });

       }


        /*
        Function to get SAMS course details
        By  : Rahul Kumar Saw 
        On  : 06-AUGUST-2019
        */
        function fillSAMSCourse(selval,fillCtrlId,insType)
        {   
             var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
            $.ajax({
                type: "POST",
                url: appURL + '/proxy',
                dataType: "json",
                data: {method: "fillSAMSCourse", selval: selval,insType:insType,hdnPrevSessionId:hdnPrevSessionId},
                success: function (data)
                {
                    var res = data.samscourse;
                    $("."+fillCtrlId).html(res);
                    
                    $("."+fillCtrlId).each(function() {
                            $( this ).closest( ".clsCourseIds" ).find(".txtHidCourse").val();
                            $( this ).val($( this ).closest( ".clsCourseIds" ).find(".txtHidCourse").val());
                      });
                }
            });

        }

       
/*
        Function to get All Skill registered Institute name
        By  : Rahul Kumar Saw 
        On  : 22-JAN-2020
        */
       function fillSkillInstituteName(selVal,fillCtrlId)
       {  
           var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "fillSkillInstituteName",selVal:selVal,hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.skillInstituteResult;
                   $("#"+fillCtrlId).html(res);        
                 }
            });

       }

 /*
        Function to get All Course/ Degree name
        By  : Rahul Kumar Saw 
        On  : 20-AUG-2020
        */
       function fillDegreeName(selVal,fillCtrlId)
       {  
           var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "fillDegreeName",selVal:selVal,hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.skillCourseResult;
                   $("#"+fillCtrlId).html(res);        
                 }
            });

       }   


       /*
        Function to get All Branch / Diciplinee name
        By  : Rahul Kumar Saw 
        On  : 20-AUG-2020
        */
       function fillBranchName(selVal,fillCtrlId)
       {  
           var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "fillBranchName",selVal:selVal,hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.skillBranchResult;
                   $("#"+fillCtrlId).html(res);        
                 }
            });

       } 

       /*
        Function to get All Institute Name
        By  : Rahul Kumar Saw 
        On  : 20-AUG-2020
        */
       function fillSkillDevelopInstituteName(selVal,fillCtrlId)
       {  
           var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "fillSkillDevelopInstituteName",selVal:selVal,hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.skillDevelopInstituteResult;
                   $("#"+fillCtrlId).html(res);        
                 }
            });

       } 

       /*
        Function to get All Interested Course name
        By  : Rahul Kumar Saw 
        On  : 20-AUG-2020
        */
       function fillInterestedCourseName(selVal,fillCtrlId)
       {  
           var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "fillInterestedCourseName",selVal:selVal,hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.skillInterestedCourseResult;
                   $("#"+fillCtrlId).html(res);        
                 }
            });

       } 

        
        /*
        Function to get All District Nama for Skill
        By  : Rahul Kumar Saw 
        On  : 23-Nov-2020
        */
       function fillSkillDistrict(selVal,fillCtrlId)
       {  
           var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "fillSkillDistrict",hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.districtName;
                   $("#"+fillCtrlId).html(res);        
                 }
            });

       } 


       /*
        Function to get All Block Nama for Skill
        By  : Rahul Kumar Saw 
        On  : 23-Nov-2020
        */
       function fillSkillBlock(selVal,fillCtrlId,distId)
       {  
           var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "fillSkillBlock",distId:distId,hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.blockName;
                   $("#"+fillCtrlId).html(res);        
                 }
            });

       } 

       /*
        Function to get All GP Name for Skill
        By  : Rahul Kumar Saw 
        On  : 23-Nov-2020
        */
       function fillSkillGp(selVal,fillCtrlId,blockId)
       {  
           var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "fillSkillGp",blockId:blockId,hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.gpName;
                   $("#"+fillCtrlId).html(res);        
                 }
            });

       } 


        /*
        Function to get All GP Name for Skill
        By  : Rahul Kumar Saw 
        On  : 23-Nov-2020
        */
       function fillSkillVillage(selVal,fillCtrlId,gpId)
       {  
           var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "fillSkillVillage",gpId:gpId,hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.villageName;
                   $("#"+fillCtrlId).html(res);        
                 }
            });

       } 


        /*
        Function to get All govt clg name for Skill
        By  : Rahul Kumar Saw 
        On  : 23-Nov-2020
        */
       function fillJobInstituteName(selVal,fillCtrlId,instituteType)
       {  
           var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "fillJobInstituteName",instituteType:instituteType,hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.instituteName;
                   $("#"+fillCtrlId).html(res);        
                 }
            });

       } 

       /*
        Function to get All govt clg name for Skill
        By  : Rahul Kumar Saw 
        On  : 23-Nov-2020
        */
       function fillJobTraining(selVal,fillCtrlId)
       {  
           var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "fillJobTraining",hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.trainingName;
                   $("#"+fillCtrlId).html(res);        
                 }
            });

       } 


      /*
        Function to get All venue name for Skill
        By  : Rahul Kumar Saw 
        On  : 21-Apr-2021
        */
       function fillVenueName(selVal,fillCtrlId,distId)
       {  
           var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "fillVenueName",distId:distId,selVal:selVal,hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.venueName;
                   $("#"+fillCtrlId).html(res);        
                 }
            });

       }


       function fillMembers(controlId,distId,skillId,regdType)
        {
            var hdnPrevSessionId            = $('#hdnPrevSessionId').val();    
            
            //$('#'+controlId).html('<img src="'+siteUrl+'/img/spinner.gif" style="height:20px; width:20px; ">');
                $.ajax({
                    type: "POST",
                    url: appURL + '/proxy',
                    dataType: "json",
                    data: {method: 'fillMembers',distId:distId,skillId:skillId,regdType:regdType,hdnPrevSessionId:hdnPrevSessionId},
                    success: function (data) {
                        $('#'+controlId).html(data.timembers);  
                    }
                });
        }


        /*
    Function to show go to applicant assigned details
    By: Rahul Kumar Saw
    On: 27-April-2021
    */
   function gotoAssignment(backPath,skillId,distId,venueId,regdType)
       {

         $.ajax({
               type: "POST",
               url: appURL + '/proxy',
               dataType: "json",
               data: {method: 'gotoAssignment',backPath:backPath,skillId:skillId,distId:distId,venueId:venueId,regdType:regdType},
               success: function (data) {
                   window.location.href= appURL + '/applicantTagDetails';
               }
           });
       }


    /*
    Function to show go to candidate assigned details
    By: Rahul Kumar Saw
    On: 05-Aug-2021
    */
   function gotoCandidate(backPath,skillId,distId,panelId,levelId,regdType)
       {

         $.ajax({
               type: "POST",
               url: appURL + '/proxy',
               dataType: "json",
               data: {method: 'gotoCandidate',backPath:backPath,skillId:skillId,distId:distId,panelId:panelId,levelId:levelId,regdType:regdType},
               success: function (data) {
                   window.location.href= appURL + '/candidateTagDetails';
               }
           });
       }



  /*
 Function to fill member name According to skill.
 By: Rahul Kumar Saw
 On: 28-April-2021
 */
function fillAssignedMembers(controlId,selVal,skillId,distId,venueId)
{
    $("#countMember").show();
  /*if(TcodeId!='' && centerId >0 && batchId >0){
      $('#'+controlId).html('<img src="'+siteUrl+'/img/spinner.gif" style="height:20px; width:20px; ">');*/
      var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
        $.ajax({
             type: "POST",
             url: appURL + '/proxy',
             dataType: "json",
             data: {method: 'fillAssignedMembers',selVal:selVal,skillId:skillId,distId:distId,venueId:venueId,hdnPrevSessionId:hdnPrevSessionId},
             success: function (data) {
                // alert(data.tiassignedMember)         
                
                 $('#countMember').html(data.intmemCount);
                 $('#'+controlId).html(data.tiassignedMember);
                 selectAll(controlId,true);
             }
         });
   // } 
}

  /*
 Function to fill member name According to skill.
 By: Rahul Kumar Saw
 On: 28-April-2021
 */
function countAssignedMembers(controlId,selVal,skillId,distId,venueId)
{   
    var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
        $.ajax({
             type: "POST",
             url: appURL + '/proxy',
             dataType: "json",
             data: {method: 'countAssignedMembers',selVal:selVal,skillId:skillId,distId:distId,venueId:venueId,hdnPrevSessionId:hdnPrevSessionId},
             success: function (data) {       
                
                 $('#txtSeatNumberAvail').html(data.taggedMember);
             }
         }); 
}


/*function fillResultMembers(controlId,distId,skillId,level)
        {
            var hdnPrevSessionId            = $('#hdnPrevSessionId').val();    
            
            //$('#'+controlId).html('<img src="'+siteUrl+'/img/spinner.gif" style="height:20px; width:20px; ">');
                $.ajax({
                    type: "POST",
                    url: appURL + '/proxy',
                    dataType: "json",
                    data: {method: 'fillResultMembers',distId:distId,skillId:skillId,level:level},
                    success: function (data) {
                        $('#'+controlId).html(data.resmembers);  
                    }
                });
        }
*/

 /*
        Function to get All panel name
        By  : Rahul Kumar Saw 
        On  : 05-Aug-2021
        */
       function fillPanel(selVal,fillCtrlId,levelId,venueId)
       {  
           var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "fillPanel",selVal:selVal,levelId:levelId,venueId:venueId,hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.panelName;
                   $("#"+fillCtrlId).html(res);        
                 }
            });

       } 

    function fillCandidate(controlId,distId,skillId,level)
        {
            var hdnPrevSessionId            = $('#hdnPrevSessionId').val();    
            
            //$('#'+controlId).html('<img src="'+siteUrl+'/img/spinner.gif" style="height:20px; width:20px; ">');
                $.ajax({
                    type: "POST",
                    url: appURL + '/proxy',
                    dataType: "json",
                    data: {method: 'fillCandidate',distId:distId,skillId:skillId,level:level,hdnPrevSessionId:hdnPrevSessionId},
                    success: function (data) {
                        $('#'+controlId).html(data.ticandidate);  
                    }
                });
        }


      /*
        Function to get All Program name
        By  : Rahul Kumar Saw 
        On  : 29-Nov-2021
        */
       function fillProgramName(selVal,fillCtrlId)
       {  
           var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "fillProgramName",selVal:selVal,hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.tiprogram;
                   $("#"+fillCtrlId).html(res);        
                 }
            });

       }



       /*
        Function to get approved institute name
        By  : Rahul Kumar Saw 
        On  : 02-DEC-2021
        */
       function fillApproveInstituteName(selVal,fillCtrlId)
       {  
           var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "fillApproveInstituteName",selVal:selVal,hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.skillInstitute;
                   $("#"+fillCtrlId).html(res);        
                 }
            });

       } 

       /*
        Function to fill program by institute
        By  : Rahul Kumar Saw 
        On  : 02-DEC-2021
        */
        function fillInstituteProgram(selval,fillCtrlId,selInstitute)
        {   
             var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
            $.ajax({
                type: "POST",
                url: appURL + '/proxy',
                dataType: "json",
                data: {method: "fillInstituteProgram", selval: selval, selInstitute: selInstitute,hdnPrevSessionId:hdnPrevSessionId},
                success: function (data)
                {
                    var res = data.insProgram;
                    $("#"+fillCtrlId).html(res);      
                }
            });

        }

        /*
        Function to get TP name
        By  : Rahul Kumar Saw 
        On  : 03-DEC-2021
        */
       function fillTPName(selVal,fillCtrlId)
       {  
           var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "fillTPName",selVal:selVal,hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.tpname;
                   $("#"+fillCtrlId).html(res);        
                 }
            });

       }

       /*
        Function to get payment history name
        By  : Rahul Kumar Saw 
        On  : 26-April-2022
        */
       function fillPaymentData(controlId,regdNo,payableFee,strMobile,strEmail,instituteCode,strInstitute,strCourseCode,strTPName)
        { 
          var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          $.ajax({
            type: "POST",
             url: appURL + '/proxy',
             dataType: "json",
                         data     : {method:"fillPaymentData",regdNo:regdNo,payableFee:payableFee,strMobile:strMobile,strEmail:strEmail,instituteCode:instituteCode,strInstitute:strInstitute,strCourseCode:strCourseCode,strTPName:strTPName,hdnPrevSessionId:hdnPrevSessionId},
            success: function(data) {
              $('#'+controlId).html(data.payData); 
            },
          });
        } 

         /*
        Function to get TP Details
        By  : Rahul Kumar Saw 
        On  : 27-Apr-2022
        */
       function fillTPDetails(intId)
       {  
           var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "fillTPDetails",intId:intId,hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {                     
                   $("#searchInfo").html(data.dataInfo);        
                         
                 }
            });

       }

       /*
        Function to get TP Details
        By  : Rahul Kumar Saw 
        On  : 27-Apr-2022
        */
       function fillTPFeeDetails(intId)
       {  
           var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "fillTPFeeDetails",intId:intId,hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {                     
                   $("#searchFeeInfo").html(data.dataInfo);        
                         
                 }
            });

       }

       /*
        Function to get Registration Phase name
        By  : Rahul Kumar Saw 
        On  : 01-June-2022
        */
       function fillRegistrationPhase(selVal,fillCtrlId)
       {  
           var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "fillRegistrationPhase",selVal:selVal,hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.phaseName;
                   $("#"+fillCtrlId).html(res);        
                 }
            });

       }

       /*
    Function to fillCategory.
    By: Rahul Kumar Saw
    On: 22-June-2022
    */
    function fillSkillCategory(selval,fillCtrlId)
    {   
         var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
        $.ajax({
            type: "POST",
            url: appURL + '/proxy',
            dataType: "json",
            data: {method: "fillSkillCategory", SelVal: selval,hdnPrevSessionId:hdnPrevSessionId},
            success: function (data)
            {
                var res = data.skillcategory;
                $("#"+fillCtrlId).html(res);      
            }
        });

    }

    /*
        Function to get All venue name for level 2 and 3
        By  : Rahul Kumar Saw 
        On  : 27-June-2022
        */
       function fillVenue(selVal,fillCtrlId,levelId)
       {  
           var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "fillVenue",levelId:levelId,selVal:selVal,hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.venuePName;
                   $("#"+fillCtrlId).html(res);        
                 }
            });

       }


        /*
        Function to reset OTP
        By  : Rahul Kumar Saw 
        On  : 25-July-2022
        */
       function resetOTP(mobileNum)
       { 
           var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "resetOTP",mobileNum:mobileNum,hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                   window.location.href= siteUrl + '/skill-competition';        
                 }
            });

       }  


       /*
        Function to reset OTP
        By  : Rahul Kumar Saw 
        On  : 25-July-2022
        */
       function resetSkillOTP(mobileNum)
       { 
           var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "resetSkillOTP",mobileNum:mobileNum,hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                   window.location.href= siteUrl + '/skill-competition';        
                 }
            });

       } 


       /*
        Function to get Program Seat Availability Details
        By  : Rahul Kumar Saw 
        On  : 29-Aug-2022
        */
       function fillProgramSeatDetails(programId,intId)
       {  
           var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
          
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "fillProgramSeatDetails",programId:programId,intId:intId,hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {                     
                   $("#seatInfo").html(data.dataInfo);        
                         
                 }
            });

       }

// IT Helpdesk Holiday Calender
       function getCalenderDetails(vendorId){
    $.ajax({
            type: "POST",
            url: appURL + '/proxy',
            dataType: "json",
            data: {method: 'getCalenderDetails', vendorId:vendorId},
            success: function (data) {
                var id=data.intOrgId;
                var fromTime=data.strTmFrom;
                var toTime=data.timeTo;
                 //fillVendorName('selVendorName',0,id);
                 fetchCalenderEvent(vendorId);
                 $("#txtTmFrom").val(fromTime);
                 $("#txtTmTo").val(toTime);
               
            }
        });
}
/* 

     Function to get Calender Events Details.
        By: Pusparani Mandal
        On: 14-Jul-2017

*/
 var tempArr = [];
function fetchCalenderEvent(wcid)
{
   tempArr = [];
  $('#calendar').html('<div class="text-center"><i class="fa fa-spinner fa-2x"></i></div>');
 $("#hdnAddData").val('');
    $.ajax({
            type: "POST",                        
            dataType: "json",                       
            url: appURL + '/proxy',
            data: {method:"fetchCalenderEvent",wcid:wcid},
            success: function (data) {  
            var eventdata="";
                if(data.length!=0)
                {                    
                    eventdata="[";
                    $.each(data, function(key, value) {
                        if (value.holidaytype == 1)
                        {
                            var clr = '#064469';
                        } else {
                            var clr = '#D2AC2B';
                        }
                           eventdata += "{";

                    eventdata += "id:" + value.id + ",";
                    eventdata += "name:'" + value.name + "',";
                    eventdata += "holidaytype:'" + value.holidaytype + "',";
                    eventdata += "startDate:new Date(" + value.sdate_year + "," + value.sdate_month + "," + value.sdate_date + "),";
                    eventdata += "endDate:new Date(" + value.edate_year + "," + value.edate_month + "," + value.edate_date + "),";
                    eventdata += "color:'" + clr + "',";

                    eventdata = eventdata.slice(0, -1);
                    eventdata += "},";
                    
                   var len=tempArr.length;
                   if(len>0){
                    for(var i=0;i<len;i++) {
                    if(tempArr[i]['id'] != value.id) {
                        
                 console.log(tempArr[i]['id']+'---'+ value.id);
                         }
                     }
                 }
                 
     
                    tempArr.push({
                        id: value.id,
                        name: value.name,
                        holidaytype: value.holidaytype,
                        startDate: value.sdate_date+ "-" + value.sdate_month_real+"-"+value.sdate_year,
                        endDate: value.edate_date+ "-" + value.edate_month_real + "-" +value.edate_year  ,
                        color: clr
                    });
              

                });
                eventdata = eventdata.slice(0, -1);
                eventdata += "]";

  

            }

            $("#hdnAddData").val(JSON.stringify(tempArr));
            
            calendarFun(wcid, eventdata);
        }
    });
 
    
}



function calendarFun(currentYear, eventdata,holidayData)
{
  var holidayTemp=[];
   
    var alleventdata = "";
    var listArray="";
    var holidayList="";
    if (eventdata != "")
    {
        alleventdata = eval(eventdata);
    }
    var selAll = 'chkweekItem';
   
        $(".chkweekItem:checked").each(function()
        {
           holidayTemp.push($(this).data('val'));
           holidayList=holidayTemp.toString();
     
        });
     
    var array = JSON.parse("[" + holidayList + "]");
    if($('#hdnViewData').val() == 'view')
    {
        $('#calendar').calendar({
            disabledWeekDays:array,
            enableContextMenu: true,
            enableRangeSelection: true,
            
            mouseOnDay: function (e) {
                if (e.events.length > 0) {
                    var content = '';
                    var cnt = 0;
                    for (var i in e.events) {
                        cnt++;
                        content += '<div class="event-tooltip-content">'
                                + '<div class="event-name" style="color:' + e.events[i].color + '">' + cnt + '. ' + e.events[i].name + '</div>'
                                + '</div>';
                    }
                    $(e.element).popover({
                        trigger: 'manual',
                        container: 'body',
                        html: true,
                        content: content
                    });

                    $(e.element).popover('show');
                }
            },
            mouseOutDay: function (e) {
                if (e.events.length > 0) {
                    $(e.element).popover('hide');
                }
            },
            dayContextMenu: function (e) {
                $(e.element).popover('hide');
            },
            dataSource: alleventdata
        });
    }
    else
    {
    $('#calendar').calendar({
        disabledWeekDays:array,
        enableContextMenu: true,
        enableRangeSelection: true,
        contextMenuItems: [
            {
                text: 'Update',
                click: editEvent
            },
            {
                text: 'Delete',
                click: deleteEvent
            }
        ],
        selectRange: function (e) {
            editEvent({startDate: e.startDate, endDate: e.endDate});
        },
        mouseOnDay: function (e) {
            if (e.events.length > 0) {
                var content = '';
                var cnt = 0;
                for (var i in e.events) {
                    cnt++;
                    content += '<div class="event-tooltip-content">'
                            + '<div class="event-name" style="color:' + e.events[i].color + '">' + cnt + '. ' + e.events[i].name + '</div>'
                            + '</div>';
                }
                $(e.element).popover({
                    trigger: 'manual',
                    container: 'body',
                    html: true,
                    content: content
                });

                $(e.element).popover('show');
            }
        },
        mouseOutDay: function (e) {
            if (e.events.length > 0) {
                $(e.element).popover('hide');
            }
        },
        dayContextMenu: function (e) {
            $(e.element).popover('hide');
        },
        dataSource: alleventdata

    });
    }
}


/* 

     Function to Edit Calender Events Details editEvent.
        By: Pusparani Mandal
        On: 14-Jul-2017

*/
function editEvent(event) {
    $('#event-modal input[name="event-index"]').val(event ? event.id : '');
    $('#event-modal input[name="event-name"]').val(event ? event.name : '');
    $('#event-modal select[name="ddl-holiday"]').val(event ? event.holidaytype : '');
    $('#event-modal input[name="event-start-date"]').datepicker('update', event ? event.startDate : '');
    $('#event-modal input[name="event-end-date"]').datepicker('update', event ? event.endDate : '');
    $('#event-modal').modal();
}
function removeIndexOfArray(property, num, arr) {
    for (var i in arr) {
        if (arr[i][property] == num)
            arr.splice(i, 1);
    }
}
/* 

     Function to Delete Calender Events Details deleteEvent.
        By: Pusparani Mandal
        On: 14-Jul-2017

*/

function deleteEvent(event) {
  
  
    
        var eventid = event.id;
        var removeItem = eventid;

        removeIndexOfArray('id', eventid, tempArr);

     
        var dataSource = $('#calendar').data('calendar').getDataSource();
        for (var i in dataSource) {
            if (dataSource[i].id == event.id) {
                dataSource.splice(i, 1);
                break;
            }
        }
        $('#calendar').data('calendar').setDataSource(dataSource);
        $("#hdnAddData").val(JSON.stringify(tempArr));
}     

/* 

     Function to Save Calender Events Details saveEvent.
        By: Pusparani Mandal
        On: 14-Jul-2017

*/

var tempArr = [];
/***Updated by shweta choudhry on 25-05-2018**/
function saveEvent() {
   
    var type= $('#event-modal select[id="ddl-holiday"]').val();
    console.log(type);
    var hname= $('#event-modal input[name="event-name"]').val();
      console.log(hname);
     if(!blankCheck('event-name','Holiday name can not be left blank'))
           return false;
     if(!checkSpecialChar('event-name'))
           return false;
     if(!maxLength('event-name',50, 'Holiday name'))
           return false;
     if(!blankCheck('event-start-date','From date can not be left blank'))
           return false;  
     if(!blankCheck('event-end-date','To date can not be left blank'))
           return false;
     if ($('#event-modal input[name="event-name"]').val()=="")
     {
        viewAlert('Holiday name can not be left blank');
     }
      else if (type==null)
     {
        viewAlert('Holiday type can not be left blank');
     }
    else
      {
          
        if ($('#event-modal select[name="ddl-holiday"]').val() == 1)
        {
            var clr = '#064469';
        } else {
            var clr = '#D2AC2B';
        }
        var event = {
            id: $('#event-modal input[name="event-index"]').val(),
            name: $('#event-modal input[name="event-name"]').val(),
            holidaytype:$('#event-modal select[name="ddl-holiday"]').val(),
            startDate: $('#event-modal input[name="event-start-date"]').datepicker('getDate'),
            endDate: $('#event-modal input[name="event-end-date"]').datepicker('getDate')
        }  
        
        var selectedHoliday = {
            id: $('#event-modal input[name="event-index"]').val(),
            name: $('#event-modal input[name="event-name"]').val(),
            holidaytype: $('#event-modal select[name="ddl-holiday"]').val(),
            startDate: $('#event-modal input[name="event-start-date"]').val(),
            endDate: $('#event-modal input[name="event-end-date"]').val(),
            color: clr,
        }
        var eventid=$('#event-modal input[name="event-index"]').val();  
        var hrefLoc=appURL+'/addCalender';        
         if(eventid!="")
        {
            for (var i = 0; i < tempArr.length; i++) {
                if (tempArr[i].id === eventid) {
                    tempArr[i]['name'] = selectedHoliday.name;
                    tempArr[i]['holidaytype'] = selectedHoliday.holidaytype;
                    tempArr[i]['startDate'] = selectedHoliday.startDate;
                    tempArr[i]['endDate'] = selectedHoliday.endDate;
                    tempArr[i]['color'] = selectedHoliday.color;
                    break;
                }
            }
        }
        else
        {            
            tempArr.push(selectedHoliday);
        }
        $("#hdnAddData").val(JSON.stringify(tempArr));
        
        var calData = $('#calendar').data('calendar').getDataSource();
        calData = calData.length;
        if(calData != '0'){
            var dataSource = $('#calendar').data('calendar').getDataSource();
        }else{
            var dataSource = [];
        }

        if(event.id) {
            for(var i in dataSource) {
                if (event.holidaytype == 1)
                    {
                        var clr = '#064469';
                    } else {
                        var clr = '#D2AC2B';
                    }
                if(dataSource[i].id == event.id) {
                    dataSource[i].name = event.name;
                    dataSource[i].holidaytype = event.holidaytype;
                    dataSource[i].startDate = event.startDate;
                    dataSource[i].endDate = event.endDate;
                }
            }
        }
        else
        {
            var newId = 0;
            for(var i in dataSource) {
                if(dataSource[i].id > newId) {
                    newId = dataSource[i].id;
                }
            }            
            newId++;
            event.id = newId;        
            dataSource.push(event);
        }        
        $('#calendar').data('calendar').setDataSource(dataSource);
        $('#event-modal').modal('hide');         
    }       
 }  


