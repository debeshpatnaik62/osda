<?php
/* ================================================
  File Name           : cls-qry-analyzer.php
  Description		  : This is used for query analyzer
  Devloped By		  : Ajit Kumar Sahoo
  Devloped On	      : 24-June-2016
  Update History	  :	<Updated by>		<Updated On>		<Remarks>

  ================================================== */
	/********** Class to manage query analyzer ************
    'By                     : Ajit Kumar Sahoo
    'On                     : 24-June-2016    '
    ******************************************************/
	
    class clsQuery extends Model 
	{
		public function manageQuery($query) 
		{
			$query             = $query;
			$result            = Model::executeQryAnalyzer($query);
			return $result;
		 }
     }