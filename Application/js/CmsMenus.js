/*
 Function to get Page.
 By: Rasmi Ranjan Swain 
 On: 28-Aug-2015
 */
function getPublishedPage(publishOn,depId)
{
	//alert(publishOn+'pub on');
	//alert(depId+'depId');
    $.ajax({
        type: "POST",
        url: appURL + '/proxy',
        dataType: "json",
        data: {method: 'getPublishedPage',pubOn:publishOn,DID:depId},
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
 By: Rasmi Ranjan Swain 
 On: 28-Aug-2015
 */
function getAssignedMenuList(parentId,menuType,linkType,publishOn,deptId)
{
    
        $.ajax({
            type: "POST",
            url: appURL + '/proxy',
            dataType: "json",
            data: {method: "getAssignedMenuList", parentId: parentId, menuType: menuType, linkType: linkType,pubOn:publishOn,dId:deptId},
            success: function (data)
            {//console.log(data);
                var res = data.result;
                /* Load results. */
                if (menuType == 2)
                     $("#mainMenu").html(res);
                else if (menuType == 3)
                    $("#bottomMenu").html(res);                        
                else if (menuType == 4)                
                   $("#topMenu").html(res);
                if (menuType == 5)
                     $("#portletMenuBottom").html(res);   
                 if (menuType == 7)
                     $("#portletMenuTop").html(res); 
                 if (menuType == 8)
                 $("#rightPanelMenu").html(res);                
                //else if (menuType == 4)                
                   //$("#homePortlet").html(res);
                //if(linkType == 'globalLink')
                    showHideChkBox(menuType);
            }
        });
    
}

/*
 Function to fill assigned menu list.
 By:  Rasmi Ranjan Swain 
 On: 14-Aug-2015
 */
function fillMenuList(parentId, menuType, linkType, fillCtrlId)
{    
    $.ajax({
        type: "POST",
        url: appURL + '/proxy',
        dataType: "json",
        data: {method: "getAssignedMenuList", parentId: parentId, menuType: menuType, linkType: linkType},
        success: function (data)
        {
            var res = data.result;
            $("#"+fillCtrlId).html(res);            
        }
    });
    
}

/*
 Function to get global menu list.
 By: Rasmi Ranjan Swain 
 On: 14-Aug-2015
 */
function getGlobalMenuList(menuType, linkType)
{
    $.ajax({
        type: "POST",
        url: appURL + '/proxy',
        dataType: "json",
        data: {method: "getGlobalMenuList", menuType: menuType, linkType: linkType},
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
 By: Rasmi Ranjan Swain 
 On: 13-Aug-2015
 */
function deleteMenu(id)
{
    $.ajax({
        type: "POST",
        url: appURL + '/proxy',
        dataType: "json",
        data: {method: 'deleteMenu', PID: id},
        success: function (data) {
           //console.log(data);
            getTotalMenuRecords();  
        }
    });
}

/*
    Function to delete main menu.
    By: Rasmi Ranjan Swain 
    On: 13-Aug-2015
    */
        function deleteFromMainMenu(menuId,pageId)
        { 
            if (!confirm('Are you sure to remove the menu'))
                return false; 
            $.ajax({
                   type: "POST",
                   url: appURL + '/proxy',
                    dataType: "json",
                   data     : {method:'deleteFromMainMenu',menuId:menuId,pageId:pageId},
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
    By: Rasmi Ranjan Swain 
    On: 13-Aug-2015
    */  
    function getTotalMenuRecords()
    {
             $.ajax({
                    type: "POST",
                    url: appURL + '/proxy',
                    dataType: "json",
                    data     : {method:"getTotalMenuRecords"},
                    success  : function(data) 
                    {
                            var res      = data.result; 
                           
                            // Load results. //
                            $("#hdnTotalMenuRecords").val(res);                                
                    }
            });
    }


    /*Function to fill Department.
    By: Rasmi Ranjan Swain 
    On: 11-Sept-2015
    */
       function getMenuDepartments(intLocid,fillCtrlId,selVal)
       { 
           var tabDiv='';
            $.ajax({
                 type: "POST",
                 url: appURL + '/proxy',
                 dataType: "json",
                 data: {method: "getDepartments",intLocid: intLocid},
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
    Function to fill menu list
        By:  Rasmi Ranjan Swain 
        On: 07-JUN-2016
    */  
    function fillMainMenuList(fillCtrlId,menutype,publishOn,depId)
    {   
        $.ajax({
           type     : "POST",
           dataType : "json",
           url      : appURL + '/proxy',
           data     : {method:"fillMenuList",MTYPE:menutype,PON:publishOn,DID:depId},
           success  : function(data) 
           { //alert("bi");
          //console.log(data);
                var tabdiv  = '';
                var res = data.menu;
                 $(res).each(function(i){
                        tabdiv+=res[i];
                   });
                 $("#"+fillCtrlId).html(tabdiv);
                 $('.dd').nestable();

                    $('.dd-handle a').on('mousedown', function (e) {
            
                        e.stopPropagation();
                    });
                    
                    $('.dd-handle .close').on('mousedown', function (e) {
                        e.stopPropagation();
                    });
                    $('.dd-handle .txt').on('mousedown', function (e) {
                        e.stopPropagation();
                    });
           }
       });
    } 