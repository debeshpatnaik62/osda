<?php

/* 
    File Name         	: viewNewsInner.php
    Description		: This is used for analyze the query.
    Devloped By		: Ajit Kumar Sahoo
    Date Created	: 22-June-2016
    Update History	:
    <Updated by>		<Updated On>		<Remarks>
 */
	include('./controller/cls-qry-analyzer.php');
	$objQuery	= new clsQuery;
	$elementsSql	= "
	SELECT TABLE_NAME, 'TABLE' AS ROUTINE_TYPE, TABLE_TYPE AS DEFINATION
	FROM information_schema.tables
	WHERE TABLE_TYPE = 'BASE TABLE' AND information_schema.tables.table_schema = '".DB_NAME."'
	
	UNION ALL
	
	SELECT TABLE_NAME, 'VIEW' AS ROUTINE_TYPE, VIEW_DEFINITION AS DEFINATION
	FROM information_schema.views
	WHERE information_schema.views.table_schema  = '".DB_NAME."'
    UNION ALL 
    
    SELECT ROUTINE_NAME, ROUTINE_TYPE, ROUTINE_DEFINITION FROM information_schema.ROUTINES 
	WHERE information_schema.ROUTINES.ROUTINE_SCHEMA  = '".DB_NAME."';
	";
     
	$resElements	= $objQuery->manageQuery($elementsSql);
	
	$query		= trim($_REQUEST['dqs']);
	if($query!='')
	{
		$result	= $objQuery->manageQuery($query);
	}