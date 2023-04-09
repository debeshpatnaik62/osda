<?php
/* ================================================
  File Name                       : addGL.php
  Description			  : This is used for add the Global Link details.
  Designed By			  : 
  Designed On			  :
  Devloped By                     : T Ketaki Debadarshini
  Devloped On                     : 21-Nov-2015
  Update History		  :	<Updated by>		<Updated On>		<Remarks>

  Style sheet           : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css
  Javscript Functions   : jquery.min.js, bootstrap.min.js, custom.js,  loadcomponent.js,loadAjax.js,jqueryOrdering.js
  includes	:	header.php, navigation.php, util.php, footer.php,addGLInner.php			  :

  ================================================== */
require 'addGLInner.php';
?>

<script src="<?php echo APP_URL; ?>js/jqueryOrdering.js"></script>
<script language="javascript">
    $(document).ready(function () {
        //loadNavigation('Global Link');
        pageHeader   = "Global Link";
        strFirstLink = "Manage Link";
        strLastLink  = "Global Link";   
        
      //  indicate = 'yes';
        $('#menuType').focus();
        /* For getting all published pages */
        getPublishedPage();

        /* For getting all main menu */
        getAssignedMenuList(0, 1, 'globalLink');

        /* For getting all bottom menu */
        getAssignedMenuList(0, 2, 'globalLink');

        /* For getting all Other menu */
        getAssignedMenuList(0, 3, 'globalLink');

        /* For getting all home portlet */
        getAssignedMenuList(0, 4, 'globalLink');
         getTotalMenuRecords();
        $("#mainMenu").sortable({revert: true});
        $("#bottomMenu").sortable({revert: true});
        $("#topMenu").sortable({revert: true});
        $("#homePortlet").sortable({revert: true});
        if ('<?php echo $outMsg != '' ?>')
            alert('<?php echo $outMsg; ?>');
		//Tooltip
		$('[data-rel=tooltip]').tooltip();
    });
    /* Function to add page to menu list */
    function addToList()
    {
        var allPageIds = $("#hdnFldForPageId").val();
        var menuType = $("#menuType").val();
        allPageIds = allPageIds.substring(1);
        var idArrs = allPageIds.split(',');
        var arrCount = idArrs.length;
        var flag = 0;
        var errflag = 0;
       
        for (var i = 0; i < arrCount; i++)
        {
             var maintotalCount = 0; var totaltopCount = 0; var totalbtmCount = 0; var totalhomeCount = 0;
            if ($("#chkPageId" + idArrs[i]).is(':checked'))
            {
                flag++;
                var menuText = $("#pageNameById" + idArrs[i]).text();

                /* For main menu */
                if (menuType == 1)
                {        
                    $(".mainMenuClass").each(function () {
                        maintotalCount++;
                        var hdnVal = $(this).val();
                        var checkedVal = $("#chkPageId" + idArrs[i]).val();
                        if (hdnVal == checkedVal)
                        {
                            errflag = 1;
                        }

                    });
                       // alert(maintotalCount);
                    if (maintotalCount > 8)
                    {
                        alert('Maximum 10 main menus can be added.');
                        return false;
                    }
                    else if (errflag > 0)
                    {
                        alert('' + menuText + ' already exists under Main menu.');
                        $(".checkBoxForPage").removeAttr('checked');
                         return false;
                    }
                    else {
                        var closeBtn = '<span style="float:right;cursor:pointer;"><img src="<?php echo APP_URL; ?>img/close-btn.png" width="16" height="16" alt="Close" title="Remove" onClick="removeFromMainMenu(' + idArrs[i] + ');"></span>';
                        var hdnFld = '<input type="hidden" name="mainMenuArr[]" id="hdnMainMenuId' + idArrs[i] + '" class="mainMenuClass" value="' + idArrs[i] + '" />';
                        var menuItem = '<div class="ui-sortable-handle mainMenuItem" id="mainMenuItem' + idArrs[i] + '">' + menuText + hdnFld + closeBtn + '</div>';
                         $("#emptyTextMainMenu").remove(); 
                        $("#mainMenu").append(menuItem);                       
                       
                    }
                }

                /* For bottom menu */
                else if (menuType == 2)
                {

                    $(".bottomMenuClass").each(function () {
                        totalbtmCount++;
                        var hdnVal = $(this).val();
                        var checkedVal = $("#chkPageId" + idArrs[i]).val();
                        if (hdnVal == checkedVal)
                        {
                            errflag = 1;
                        }

                    });

                   if (totalbtmCount > 10)
                    {
                        alert('Maximum 10 buttom menus can be added.');
                        return false;
                    }
                    else if (errflag > 0)
                    {
                        alert('' + menuText + ' already exists under Bottom menu.');
                        return false;
                    }

                    else {
                        var closeBtn = '<span style="float:right;cursor:pointer;"><img src="<?php echo APP_URL; ?>img/close-btn.png" width="16" height="16" alt="Close" title="Remove" onClick="removeFromBottomMenu(' + idArrs[i] + ');"></span>';
                        var hdnFld = '<input type="hidden" name="bottomMenuArr[]" id="hdnBottomMenuId' + idArrs[i] + '" class="bottomMenuClass" value="' + idArrs[i] + '" />';
                        var menuItem = '<div class="ui-sortable-handle bottomMenuItem" id="bottomMenuItem' + idArrs[i] + '">' + menuText + hdnFld + closeBtn + '</div>';
                        $("#emptyTextBottomMenu").remove();
                        $("#bottomMenu").append(menuItem);
                        
                    }
                }

                /* For top menu */
                else if (menuType == 3)
                {                 
                    $(".topMenuClass").each(function () {
                        //totalCount++;
                        totaltopCount++;
                        var hdnVal = $(this).val();
                        var checkedVal = $("#chkPageId" + idArrs[i]).val();
                        if (hdnVal == checkedVal)
                        {
                            errflag = 1;
                        }

                    });

                    if (totaltopCount > 5)
                    {
                        alert('Maximum 5 Top menus can be added.');
                        return false;
                    }
                    else if (errflag > 0)
                    {
                        alert('' + menuText + ' already exists under Top menu.');
                        return false;
                    }
                    else {
                        var closeBtn = '<span style="float:right;cursor:pointer;"><img src="<?php echo APP_URL; ?>img/close-btn.png" width="16" height="16" alt="Close" title="Remove" onClick="removeFromTopMenu(' + idArrs[i] + ');"></span>';
                        var hdnFld = '<input type="hidden" name="topMenuArr[]" id="hdnTopMenuId' + idArrs[i] + '" class="topMenuClass" value="' + idArrs[i] + '" />';
                        var menuItem = '<div class="ui-sortable-handle topMenuItem" id="topMenuItem' + idArrs[i] + '">' + menuText + hdnFld + closeBtn + '</div>';
                        $("#emptyTextTopMenu").remove();
                        $("#topMenu").append(menuItem);
                        
                    }
                }

                /* For home portlet */
                else if (menuType == 4)
                {
                   
                    $(".homePortletClass").each(function () {
                        totalhomeCount++;
                        var hdnVal = $(this).val();
                        var checkedVal = $("#chkPageId" + idArrs[i]).val();
                        if (hdnVal == checkedVal)
                        {
                            errflag = 1;
                        }

                    });

                   /* if (totalhomeCount > 1)
                    {
                        alert('Maximum 1  Home Portalets can be added.');
                        return false;
                    }
                    else*/ if (errflag > 0)
                    {
                        alert('' + menuText + ' already exists under SSA and RMSA Links.');
                        return false;
                    }

                    else {
                        var closeBtn = '<span style="float:right;cursor:pointer;"><img src="<?php echo APP_URL; ?>img/close-btn.png" width="16" height="16" alt="Close" title="Remove" onClick="removeFromHomePortlet(' + idArrs[i] + ');"></span>';
                        var hdnFld = '<input type="hidden" name="homePortletArr[]" id="hdnHomePortletId' + idArrs[i] + '" class="homePortletClass" value="' + idArrs[i] + '" />';
                        var menuItem = '<div class="ui-sortable-handle homePortletItem" id="homePortletItem' + idArrs[i] + '">' + menuText + hdnFld + closeBtn + '</div>';
                         $("#emptyTextHomePortlet").remove();
                        $("#homePortlet").append(menuItem);
                        
                    }
                }
                showHideChkBox(menuType);
            }
        }
        if (flag == 0)
        {
            alert('Please select record.');
        }
        $(".checkBoxForPage").removeAttr('checked');
    }


    /* For main menu */
    function removeFromMainMenu(id)
    {
        if (!confirm('Are you sure to remove the menu'))
            return false;
        $("#mainMenuItem" + id).remove();
        showHideChkBox(1);
        displayEmptyText(1);
    }

    /* For bottom menu */
    function removeFromBottomMenu(id)
    {
        if (!confirm('Are you sure to remove the menu'))
            return false;
        $("#bottomMenuItem" + id).remove();
        showHideChkBox(2);
        displayEmptyText(2);
    }

    /* For top menu */
    function removeFromTopMenu(id)
    {
        if (!confirm('Are you sure to remove the menu'))
            return false;
        $("#topMenuItem" + id).remove();
        showHideChkBox(4);
        displayEmptyText(4);
    }

    /* For home portlet */
    function removeFromHomePortlet(id)
    {
        if (!confirm('Are you sure to remove the menu'))
            return false;
        $("#homePortletItem" + id).remove();
         showHideChkBox(4);
          displayEmptyText(4);
    }
    function validateMenus()
    {
        var arrMainMenu = new Array();
        var arrBottomMenu = new Array();
        var arrTopMenu = new Array();
        var arrHomePortlet = new Array();
        var flag = 0;
        var totalCount = 0;
        var totalMenuRecord = $("#hdnTotalMenuRecords").val();
         if(totalMenuRecord == 0)
                {                    
                    if($('.clsMainMenu').css('display') == 'inline-block')
                    {
                        $('.clsMainMenu').prop('checked','checked');
                    }
                    if($('.clsBottomMenu').css('display') == 'inline-block')
                    {
                        $('.clsBottomMenu').prop('checked','checked');
                    }
                    if($('.clsTopMenu').css('display') == 'inline-block')
                    {
                        $('.clsTopMenu').prop('checked','checked');
                    }
                    if($('.clsHomePortlet').css('display') == 'inline-block')
                    {
                        $('.clsHomePortlet').prop('checked','checked');
                    }                    
                }
       if($(".checkBoxClass").is(':checked'))
        { 
        /* For main menu */
        if($(".clsMainMenu").is(':checked'))
        {
            if ($(".mainMenuClass").length > 0)
            {
                $(".mainMenuClass").each(function () {
                    totalCount++;
                    var hdnVal = $(this).val();
                    arrMainMenu.push(hdnVal);
                });
                arrMainMenu.sort();
                var last = arrMainMenu[0];
                for (var i = 1; i < arrMainMenu.length; i++)
                {
                    if (arrMainMenu[i] == last)
                    {
                        flag++;
                    }
                    last = arrMainMenu[i];
                }
                if (totalCount > 8)
                {
                    alert('Maximum 7 main menus can be added.');
                    return false;
                }
                if (flag > 0)
                {
                    alert('Duplicate menus added under main menu.');
                    return false;
                }
            }
            else
            {
                alert('Please add page from list.');
                return false;
            }
        }

        /* For bottom menu */
        if($(".clsBottomMenu").is(':checked'))
        {
            var totalCount        = 0;
            if ($(".bottomMenuClass").length > 0)
            {
                $(".bottomMenuClass").each(function () {
                    totalCount++;
                    var hdnVal = $(this).val();
                    arrBottomMenu.push(hdnVal);
                });
                arrBottomMenu.sort();
                var last = arrBottomMenu[0];
                for (var i = 1; i < arrBottomMenu.length; i++)
                {
                    if (arrBottomMenu[i] == last)
                    {
                        flag++;
                    }
                    last = arrBottomMenu[i];
                }
                if (totalCount > 10)
                {
                    alert('Maximum 10 bottom  menus can be added.');
                    return false;
                }
                if (flag > 0)
                {
                    alert('Duplicate menus added under bottom menu.');
                    return false;
                }
            }
            else
            {
                alert('Please add page from list.');
                return false;
            }
        }

        /* For top menu */
         if($(".clsTopMenu").is(':checked'))
        {
            var totalCount        = 0;
            if ($(".topMenuClass").length > 0)
            {
                $(".topMenuClass").each(function () {
                    totalCount++;
                    var hdnVal = $(this).val();
                    arrTopMenu.push(hdnVal);
                });
                arrTopMenu.sort();
                var last = arrTopMenu[0];
                for (var i = 1; i < arrTopMenu.length; i++)
                {
                    if (arrTopMenu[i] == last)
                    {
                        flag++;
                    }
                    last = arrTopMenu[i];
                }
                if (totalCount > 5)
                {
                    alert('Maximum 5 Other menus can be added.');
                    return false;
                }
                if (flag > 0)
                {
                    alert('Duplicate menus added under Other menu.');
                    return false;
                }
            }
            else
            {
                alert('Please add page from list.');
                return false;
            }
        }

        /* For home portlet */
       if($(".clsHomePortlet").is(':checked'))
        {
            var totalCount        = 0;
            if ($(".homePortletClass").length > 0)
            {
                $(".homePortletClass").each(function () {
                    totalCount++;
                    var hdnVal = $(this).val();
                    arrHomePortlet.push(hdnVal);
                });
                arrHomePortlet.sort();
                var last = arrHomePortlet[0];
                for (var i = 1; i < arrHomePortlet.length; i++)
                {
                    if (arrHomePortlet[i] == last)
                    {
                        flag++;
                    }
                    last = arrHomePortlet[i];
                }
               /* if (totalCount > 1)
                {
                    alert('Maximum 1 home portlet menu can be added.');
                    return false;
                }*/
                if (flag > 0)
                {
                    alert('Duplicate menus added under SSA and RMSA Links.');
                    return false;
                }
            }
            else
            {
                alert('Please add page from list.');
                return false;
            }
        }
    }else
        {
            alert('Please check menu');
            return false;
        }  
    }
     /* For displaying empty text */
            function displayEmptyText(menuType)
            {
                /* For main menu */
                if(menuType == 1)
                {
                    if($(".mainMenuClass").length > 0)
                    {
                        $("#emptyTextMainMenu").remove();
                    }
                    else
                    {
                        $("#mainMenu").html('<div id="emptyTextMainMenu" style="margin-left: 7px;">No menus assigned</div>');
                    }
                }
                /* For bottom menu */
                else if(menuType == 2)
                {
                    if($(".bottomMenuClass").length > 0)
                    {
                        $("#emptyTextBottomMenu").remove();
                    }
                    else
                    {
                        $("#bottomMenu").html('<div id="emptyTextBottomMenu" style="margin-left: 7px;">No menus assigned</div>');
                    }
                }
                /* For top menu */
                else if(menuType == 3)
                {
                    if($(".topMenuClass").length > 0)
                    {
                        $("#emptyTextTopMenu").remove();
                    }
                    else
                    {
                        $("#topMenu").html('<div id="emptyTextTopMenu" style="margin-left: 7px;">No menus assigned</div>');
                    }
                }
                /* For home portlet */
                else if(menuType == 4)
                {
                    if($(".homePortletClass").length > 0)
                    {
                        $("#emptyTextHomePortlet").remove();
                    }
                    else
                    {
                        $("#homePortlet").html('<div id="emptyTextHomePortlet" style="margin-left: 7px;">No menus assigned</div>');
                    }
                }
            }
    /* For show hide check box */
            function showHideChkBox(menuType)
            {
                /* For main menu */
                if(menuType == 1)
                {
                    if($(".mainMenuClass").length > 0)
                    {
                        $("#chkMainMenu").show();
                    }
                    else
                    {
                        $("#chkMainMenu").hide();
                    }
                }
                /* For Bottom menu */
                if(menuType == 2)
                {
                    if($(".bottomMenuClass").length > 0)
                    {
                        $("#chkBottomMenu").show();
                    }
                    else
                    {
                        $("#chkBottomMenu").hide();
                    }
                }
                /* For Top menu */
                if(menuType == 3)
                {
                    if($(".topMenuClass").length > 0)
                    {
                        $("#chkTopMenu").show();
                    }
                    else
                    {
                        $("#chkTopMenu").hide();
                    }
                }
                /* For home portlet */
                if(menuType == 4)
                {
                    if($(".homePortletClass").length > 0)
                    {
                        $("#chkHomePortlet").show();
                    }
                    else
                    {
                        $("#chkHomePortlet").hide();
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
      <div class="top_tab_container"> <a href="javascript:void(0);" class="btn btn-info active">Global Link</a></div>
      <?php include('includes/util.php'); ?>
      <div class="hr hr-solid"></div>
      <input type="hidden" name="hdnFldForPageId" id="hdnFldForPageId" value="" />
      <input type="hidden" name="hdnTotalMenuRecords" id="hdnTotalMenuRecords" value="" />
      <div id="viewTable">
        <div class="portletCategoryClass">
          <div class="innerPortlet">
            <h4>Pages</h4>
            Select Menu Type
            <select name="menuType" id="menuType" style="width:160px; margin-left:5px;" class="selectdrop">
              <option value="1">Main</option>
              <option value="2">Bottom</option>
              <option value="3">Top</option>
              <option value="4">Home Portlet</option>
            </select>
            <div class="scrollable" id="scrollablePages">
			<div id="pageListDiv" class="" style="margin:5px;"></div>
			</div>
            <div class="center">
              <input type="button" name="btnAdd" id="btnAdd" onClick="return addToList();" style="margin:5px;" value="Add Menu" class="btn btn-sm btn-success" />
            </div>
          </div>
        </div>
        <div class="portletCategoryClass">
          <div class="innerPortlet">
            <h4>
              <input type="checkbox" name="chkMainMenu" id="chkMainMenu" value="1" class="clsMainMenu checkBoxClass" />
              &nbsp;
              Main Menu </h4>
            <div class="scrollable">
             <div id="mainMenu" class="ui-sortable"></div>
            </div>
          </div>
        </div>
        <div class="portletCategoryClass">
          <div class="innerPortlet">
            <h4>
              <input type="checkbox" name="chkBottomMenu" id="chkBottomMenu" value="2" class="clsBottomMenu checkBoxClass" />
              &nbsp;
              Bottom Menu </h4>
            <div class="scrollable">
             <div id="bottomMenu" class="ui-sortable bottomMenu"></div>
            </div>
          </div>
        </div>
        <div class="portletCategoryClass">
          <div class="innerPortlet">
            <h4>
              <input type="checkbox" name="chkTopMenu" id="chkTopMenu" value="3" class="clsTopMenu checkBoxClass" />
              &nbsp;
              Top Menu </h4>
             <div class="scrollable">
                 <div id="topMenu" class="ui-sortable"></div>
             </div>
          </div>
        </div>
        <div class="portletCategoryClass">
          <div class="innerPortlet">
            <h4>
              <input type="checkbox" name="chkHomePortlet" id="chkHomePortlet" value="4" class="clsHomePortlet checkBoxClass" />
              &nbsp;
              Home Portlet </h4>
             <div class="scrollable">
                <div id="homePortlet" class="ui-sortable" ></div>
             </div>
          </div>
        </div>
        <input type="submit" name="btnPublishMenu" id="btnPublishMenu" value="Publish Menu" class="btn btn-sm btn-success pull-right" style="margin-right:6px;" onClick="return validateMenus();" />
      </div>
      
     
      <!-- PAGE CONTENT ENDS -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
<!-- /.page-content -->
<script type="text/javascript">
jQuery(function ($) {
// scrollables
	$('#scrollablePages').each(function () {
		var $this = $(this);
		$(this).ace_scroll({
			size: $this.data('size') || 180,
			//styleClass: 'scroll-left scroll-margin scroll-thin scroll-dark scroll-light no-track scroll-visible'
		});
	});
	$('.scrollable').each(function () {
		var $this = $(this);
		$(this).ace_scroll({
			size: $this.data('size') || 260,
			//styleClass: 'scroll-left scroll-margin scroll-thin scroll-dark scroll-light no-track scroll-visible'
		});
	});
});
</script>