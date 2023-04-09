<?php
/* ================================================
  File Name         	  : query.php
    Description		  : This is used for analyze the query.
    Devloped On           : 22-June-2016
    Devloped By           : Ajit Kumar Sahoo
    Update History	  : <Updated by>		<Updated On>		<Remarks>
 ==================================================*/
  require 'queryInner.php';
?>
<script language="javascript" src="<?php echo APP_URL;?>js/jquery.dataTables.min.js"></script>

<script language="javascript">
	$(document).ready(function () {
		$("[data-rel]").tooltip();
                
                 pageHeader   = "Query Analyzer";
                strFirstLink = "Query Analyzer";
                strLastLink  = "Query"; 
                
		//loadNavigation('Query Analyzer', '', 'Query Analyzer');
		$('.scrollable-horizontal').each(function () {
                        var $this = $(this);
                        
                        $(this).ace_scroll(
                        {
                            horizontal: true,
                            styleClass: 'scroll-top', //show the scrollbars on top(default is bottom)
                            size: $this.attr('data-size') || 500,
                            mouseWheelLock: true
                        }

                        ).css({'padding-top': 0});
                });
		$('#resultTbl').DataTable({
                    "sPaginationType": "full_numbers",
                    "bJQueryUI": true,
                    "iDisplayLength":50,
                    "aLengthMenu": [[50, 100, 500, 1000, -1], [50, 100, 500, 1000, "All"]]});
                $('.clsTblName').dblclick(function(){
			var tableName		= $(this).data('val');
			var tableType		= $(this).data('type');
			var tableDefinition	= $(this).data('definition');
			if(tableType == 'TABLE' || tableType == 'VIEW')
			{
				$('#dqs').val('SELECT * FROM '+tableName+';');
			}
			else if(tableType == 'PROCEDURE')
			{
				$('#dqs').val('SHOW CREATE PROCEDURE '+tableName+';');
			}
			else if(tableType == 'FUNCTION')
			{
				$('#dqs').val('SHOW CREATE FUNCTION '+tableName+';');
			}
		});         
	});
	
	function validate()
	{		
		var qry	= $('#dqs').val();
		qry		= qry.toLowerCase();
		var err	= 0;
		if(qry.indexOf("drop") >= 0)
		{
			err++;
			confirmAlert('Query contains "DROP" keyword! Would you like to continue?');
		}
		else if(qry.indexOf("update") >= 0)
		{
			err++;
			confirmAlert('Query contains "UPDATE" keyword! Would you like to continue?');
		}
		else if(qry.indexOf("truncate") >= 0)
		{
			err++;
			confirmAlert('Query contains "TRUNCATE" keyword! Would you like to continue?');
		}
		$('#btnConfirmOk').on('click',function(){						
			$("form").submit();
		});
		if(err == 0)
		{
			$("form").submit();
		}
	}
</script>
<style type="text/css">
.dataTable{
	margin-top:50px;
	margin-bottom:50px;
}
.dataTables_filter {
position: absolute;
    top: 0px;
	right:0px;
    padding: 10px;
}
.dataTables_length {
position: absolute;
    top: 0px;
    padding: 10px;
}
.dataTables_info {
position: absolute;
    bottom: 0px;
    padding: 10px;
}
.dataTables_paginate {
position: absolute;
    bottom: 0px;
	right:0px;
    padding: 10px;
}
.dataTables_paginate a{
    padding: 5px 10px 5px 10px;
	margin-left:1px;
	margin-right:1px;
	background:#fdfdfd;
	border:#ccc 1px solid;
	font-size:14px;
	font-weight:bold;
	text-decoration:none;
	cursor:pointer;
}
</style>
<div class="page-content">
      <div class="page-header">
            <h1 id="title" class="col-sm-5"></h1>
        </div>
     <div class="row">
        <div class="col-xs-12">
            <div class="form-group"> 
                 <label class="col-sm-9 control-label no-padding-right" for="dqs">Query</label>
                 <label class="col-sm-3 control-label no-padding-right">DB :: <?php echo DB_NAME;?></label>
                 <div class="col-sm-9">
                     <textarea id="dqs" name="dqs" rows="10" class="form-control"><?php echo $_REQUEST['dqs']; ?></textarea>
                 </div>
				 <div class="col-sm-3" style="height:200px; overflow:auto; border:#ccc solid 1px;">				 	
				 	<?php 
						if($resElements->num_rows > 0){
							while($elementRow = $resElements->fetch_array())
							{
					?>
					
					<div class="link">
					<?php if($elementRow['ROUTINE_TYPE'] == 'TABLE'){?>
					<i class="fa fa-table"></i>
					<?php }else if($elementRow['ROUTINE_TYPE'] == 'VIEW'){?>
					<i class="fa fa-caret-square-o-down"></i>
					<?php }else if($elementRow['ROUTINE_TYPE'] == 'FUNCTION'){?>
					<i class="fa fa-tag"></i>
					<?php }else if($elementRow['ROUTINE_TYPE'] == 'PROCEDURE'){?>
					<i class="fa fa-tasks"></i>
					<?php }?>
					<a class="clsTblName" data-rel="tooltip" data-original-title="<?php echo $elementRow['ROUTINE_TYPE'];?>" href="javascript:void(0);" data-type="<?php echo $elementRow['ROUTINE_TYPE'];?>" data-val="<?php echo $elementRow['TABLE_NAME'];?>"><?php echo $elementRow['TABLE_NAME'];?></a></div>
					<?php }}?>
				 </div>
             </div>
            <div class="form-group">
              <div class="col-sm-1">
               <input class="btn btn-success" name="btnExecute" type="button" value="Execute" onclick=" validate();"/>
             </div>
             </div>
			 <h4>Result : </h4>
            <div id="viewTable" class="scrollable-horizontal" style="min-height:300px; border:1px solid #ccc;"  data-size="1500">
                <?php if(is_object($result)) {?>  
                  <table class="table  table-bordered table-hover" id="resultTbl">
             <thead>
                 <tr>
                     <th width="20">Sl.#</th>
                    <?php  while ($finfo = $result->fetch_field()) { ?>
                     <th><?php echo $finfo->name; ?> </th>  
                    <?php } ?>
                 </tr>
             </thead>
             <tbody>
                    <?php  $ctrl = 1;while ($data = $result->fetch_array()) { ?>
                 <tr>
                     <td><?php echo $ctrl; ?></td>
                     <?php for($i=0;$i<$result->field_count;$i++){?>
                    <td><?php echo $data[$i]; ?> </td>  
                   <?php } ?>
                 </tr>
                 <?php $ctrl ++; }  ?>
             </tbody>
           </table>
                <?php } else { 
                    if($result==1)
                    {
                        echo "Query Executed Successfully";
                    }else {
                    ?>
                
                <?php print_r ($result); ?>
                <?php }} ?>
            </div>
        </div>
     
     
     
     </div>
</div>