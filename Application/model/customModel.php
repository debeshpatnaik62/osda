<?php
	/* ================================================
	File Name         	  : customModel.php
	Description	          : This is to manage model class and its function. This also used to maintain connection to database.
	Author Name		  	  : Rasmi Ranjan Swain
	Date Created		  : 10-Feb-2016
	Update History		  :
						<Updated by>		<Updated On>		<Remarks>
						
	includes			  : config.php

	==================================================*/
//require_once("config.php");

class Model {
	public $conn	= null;
	public $db = null;
	function __construct() 
	{
        try 
		{ 

			$accesingFile = strtolower(basename($_SERVER['PHP_SELF']));
			$allowedArr = ['index.php','cronsams.php'];
			if(!in_array($accesingFile, $allowedArr))
				exit();
			
        } 
		catch (Exception $e) 
		{
            exit('Exception occured.');
        }
    }
	/*================function to create connection ====================
					By  :Rasmi Ranjan Swain
					ON	:10-Feb-2016
	===================================================================*/	
	private function createConnection()
	{
		$this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);   
                $this->db->set_charset("latin1");
		if ($this->db->connect_errno) {
			echo "Failed to connect!!! Wrong user id, password or database name";
			exit();
		}
	}	
	/*================function to execute query ====================
			By	:Rasmi Ranjan Swain
			ON	:10-Feb-2016
	================================================================*/
	public function executeQry($sql)
	{
		try{
		$this->createConnection();
		$result	= $this->db->query($sql);//or die(mysqli_error($this->db));
               
        if (!$result)
		{
		   throw new Exception($this->db->error);
		}
		else{
				$this->db->close();
				return $result;
		 }
		}catch(Exception $e){

			$this->writeException($e,'Database Query Error');exit('Failed to Execute');
		}
		
	}
	
	/*================function to execute Analyzer query ====================
			By	:Ajit Kumar Sahoo
			ON	:24-June-2016
	================================================================*/
	public function executeQryAnalyzer($sql)
	{
		$this->createConnection();
		$result	= $this->db->query($sql) or $result = $this->db->error;
		$this->db->close();
		return $result;
	}
	
	//========= Check Special Character ==============
	public function isSpclChar($strToCheck)
	{	
		$arrySplChar	= explode(',',SPLCHRS);		
		$errFlag		= 0;
		for ($i=0; $i<count($arrySplChar); $i++)
		{
			$intPos=substr_count($strToCheck,trim($arrySplChar[$i]));
			if ($intPos>0)
				$errFlag++;	
		}
		return $errFlag;
	}

	//========= Check Special Tags By Rahul kumar Saw ON 29-08-2019 ==============
	public function isSpclTags($strToCheck)
	{	
		$arrySplChar	= explode(',',SPLTAGS);		
		$errFlag		= 0;
		for ($i=0; $i<count($arrySplChar); $i++)
		{
			$intPos=substr_count($strToCheck,trim($arrySplChar[$i]));
			if ($intPos>0)
				$errFlag++;	
		}
		return $errFlag;
	}
	/*==============function to check blank value ==================
			By  : Rasmi Ranjan Swain
			ON  : 10-Feb-2016
	================================================================*/
	public function isBlank($strToCheck)
	{	
		$errFlag		= 1;
		if($strToCheck!='')
			$errFlag	= 0;
		return $errFlag;
	}
	/*======== function to check Max, Min or Equal length ==========
			By  :Rasmi Ranjan Swain
			ON  : 10-Feb-2016
	================================================================*/
	public function chkLength($flag, $strToCheck, $length)
	{	
		//======= $flag= 'MAX'/'MIN'/'EQ' for Maximum Minimum or Equal length
		$errFlag		= 0;
		if($strToCheck!='')
		{
			if(strtolower($flag)=='max')
			{
				if(strlen($strToCheck)>$length)
					$errFlag		= 1;
			}
			else if(strtolower($flag)=='min')
			{
				if(strlen($strToCheck)<$length)
					$errFlag		= 1;
			}
			else if(strtolower($flag)=='eq')
			{
				if(strlen($strToCheck)!=$length)
					$errFlag		= 1;
			}	
		}	
		return $errFlag;
	}
	/*============== function to check dropdown field ==============
			By  : Rasmi Ranjan Swain
			ON  : 10-Feb-2016
	================================================================*/
	public function chkDropdown($drpVal)
	{	
		$errFlag		= 1;
		if($drpVal>0 && $drpVal!='')
			$errFlag		= 0;
		return $errFlag;
	}
	/*============ function to check only numeric data =============
			By  : Rasmi Ranjan Swain
			ON  : 10-Feb-2016
	================================================================*/
	public function isNumericData($data)
	{	
		$errFlag		= 1;
		if(preg_match('/^\d+$/',$data))
		   $errFlag		= 0;
		return $errFlag;
	}
	/*============ function to check only character data =============
			By  : Rasmi Ranjan Swain
			ON  : 10-Feb-2016
	================================================================*/
	public function isCharData($data)
	{	
		$errFlag		= 1;
		if(preg_match('/^[a-zA-Z.,-\s]+$/i',$data))
		   $errFlag		= 0;
		return $errFlag;
	}
	/*============ function to check decimal data =============
			By  : Rasmi Ranjan Swain
			ON  : 10-Feb-2016
	================================================================*/
	public function isDecimal($data,$afterDecimal=2)
	{			
		$errFlag		= 1;
		if(preg_match('/^[0-9]+(\.[0-9]{1,'.$afterDecimal.'})?$/',$data))
		   $errFlag		= 0;
		return $errFlag;
	}
	//=========== Function to get paging ===============
	public function getPaging($intTotalRec,$intCurrPage,$intPgSize,$isPaging)
	{
		$paging	= $this->ShowPaging($intTotalRec,$intCurrPage,$intPgSize,$isPaging);
		return $paging[1];
	}
	//============ Function to get page number ==========
	public function getPageNumbers($intTotalRec,$intCurrPage,$intPgSize,$isPaging)
	{
		$paging	= $this->ShowPaging($intTotalRec,$intCurrPage,$intPgSize,$isPaging);
		return $paging[0];
	}
	
	//================= Function for pagination =============================
	public function ShowPaging($intTotalRec,$intCurrPage,$intPgSize,$isPaging)
	{	
            
		$intPagecount		= ceil($intTotalRec/$intPgSize); // Total no of pages
	
		if($intCurrPage>$intPagecount)
			$intCurrPage 	= $intPagecount;
		$intMaxPage			= $intCurrPage+10;
		$intPrevPgno 		= $intCurrPage-1;
		$intRecPrev	 		= ($intCurrPage-2) * $intPgSize;
		$intNextPgno 		= $intCurrPage+1;
		$intRecNext 		= $intCurrPage * $intPgSize;
		
		// set max page number to show ===============
		if($intMaxPage > $intPagecount)
			$intMaxPage=$intPagecount;
	
		// First Page Link ====================================
		if($intCurrPage>1)
		$strPages.="<li class='prev'><a class='page-link' onclick='DoPaging(1,0)' href='#' title='First'><i class='fa fa-angle-double-left'></i></a></li>";
		
		// set previous page link ========================
		if($intPrevPgno>0)
			$strPages.="<li class='prev page-item'><a class='page-link' onclick='DoPaging(".$intPrevPgno.",".$intRecPrev.")' href='#' title='Previous'><i class='fa fa-angle-left'></i></a></li>";
		// Create page number links =======================
		$intStartPg=1;
		$intEndPg=10;
		if($intCurrPage<=10)
		{
			$intStartPg=1;
			$intEndPg=10;
		}
		else
		{
			/*$intStartPg	= floor($intCurrPage/10)*$intPgSize;
			$intEndPg	= ceil($intCurrPage/10)*$intPgSize;*/
                    $intStartPg=$intCurrPage-4;
		    $intEndPg=$intCurrPage+5;
		}
		if($intEndPg>$intPagecount)
			$intEndPg	= $intPagecount;
			
		for($intCtr=$intStartPg; $intCtr<=$intEndPg; $intCtr++)
		{	
			if($intCtr>=1)
				$intRec=$intPgSize*($intCtr-1);
			if($intCurrPage==$intCtr)	
				$strPages.=(($_SESSION['lang']=='O' && !in_array('Application',$requesturl))?"<li class='active page-item'><a class='page-link' href='javascript:void(0)' class='odianum'>".$intCtr."</a></li>":"<li class='active page-item' ><a class='page-link' href='javascript:void(0)'>".$intCtr."</a></li>");
			else
			   $strPages.=  (($_SESSION['lang']=='O' && !in_array('Application',$requesturl))?"<li class='page-item'><a class='page-link' onclick='DoPaging(".$intCtr.",".$intRec.")' href='#' title='".$intCtr."' class='odianum'>".$intCtr."</a></li>":"<li class='page-item'><a class='page-link' onclick='DoPaging(".$intCtr.",".$intRec.")' href='#' title='".$intCtr."'>".$intCtr."</a></li>");		
		}
		// set next page link ========================
		if($intCurrPage < $intPagecount)
			$strPages	.= "<li class='next page-item'><a class='page-link' onclick='DoPaging(".$intNextPgno.",".$intRecNext.")' href='#' title='Next'><i class='fa fa-angle-right'></i></a></li>";
			
		// Last Page Link ====================================
		$intLastPageRec	= ($intPagecount-1)*$intPgSize;
		if($intCurrPage<$intPagecount)
			$strPages	.= "<li class='page-item'><a class='page-link' onclick='DoPaging(".$intPagecount.",".$intLastPageRec.")' href='#' title='Last'>&raquo;</a></li>";
		//================================================
		$intStartRec	= ($intCurrPage-1)*$intPgSize+1;
		$intEndRec		= $intRecNext;
		if($intEndRec>$intTotalRec)
			$intEndRec	= $intTotalRec;
                
                $requesturl = explode("/",$_SERVER['REQUEST_URI']);
                
                if($_SESSION['lang']=='O' && !in_array('Application',$requesturl))
		   $strShowing		= ($isPaging==0)?'<span class="odia "><span class="odianum">'.' '.$intTotalRec.' '."</span>&#2847;&#2879;&#2864;&#2881; <span class='odianum'>".' '.$intStartRec.' '."</span>&#2864;&#2881; <span class='odianum'>".' '.$intEndRec.' '."</span> &#2858;&#2864;&#2893;&#2863;&#2893;&#2911;&#2856;&#2893;&#2852; &#2852;&#2853;&#2893;&#2911; &#2854;&#2887;&#2838;&#2878;&#2825;&#2843;&#2879;".'</span>':'<span class="odia "><span class="odianum">'.' '.$intTotalRec.' '."&#2847;&#2879;&#2864;&#2881; <span class='odianum'>".' '.$intStartRec.' '."</span>&#2864;&#2881; <span class='odianum'>".' '.$intTotalRec.' '."</span> &#2858;&#2864;&#2893;&#2863;&#2893;&#2911;&#2856;&#2893;&#2852; &#2852;&#2853;&#2893;&#2911; &#2854;&#2887;&#2838;&#2878;&#2825;&#2843;&#2879;".'</span>';
		else
                   $strShowing		= ($isPaging==0)?"Showing ".$intStartRec."&nbsp;to&nbsp;".$intEndRec." of ".$intTotalRec." entries":"Showing ".$intStartRec."&nbsp;to&nbsp;".$intTotalRec." of ".$intTotalRec." entries";
		  
                
                $ArrPaging[0]	= $strShowing;
		$ArrPaging[1]	= $strPages;
		return $ArrPaging;
	}
	
	/* ============= Fill dropdown select option ## By  : Rasmi Ranjan Swain
					ON  : 10-Feb-2016
           ========================================================================*/
	public function FillDropdown($sqlResult,$strSelVal)
	{
		$strOption 	= "";
		$strOption	.='<option value="0">--Select--</option>';	
		if($sqlResult->num_rows>0)	
		{
			while($row=$sqlResult->fetch_array())
			{
				$selected	=($row[0]==$strSelVal)?'selected="selected"':'';			
				$strOption.='<option value="'.$row[0].'" '.$selected.' title="'.$row[1].'">'.$row[1].'</option>';
			}
		}
		return $strOption;
	}
	
	//==================== Function to format date ## By Rasmi Ranjan Swain ## 10-Feb-2016 ========================
	public function dbDateFormat($date)
	{
			$explDate	= explode('-',$date);
			return $explDate[2].'-'.$explDate[1].'-'.$explDate[0];
	}
	
	// ======================Function to send mail ## By Rasmi Ranjan Swain ## 10-Feb-2016==========================	
	function Sendmail($strTo,$strFrom,$strSubject,$strMessage,$name='')
	{			
		$MailMessage	= "";
		$headers		= "";
		$name			= ($name!='')?$name:'Sir / Madam';
		if($strTo!="")
		{
			$mailTo		 = $strTo;
			$MailMessage.="<table cellspacing='0' cellpadding='2' border='0' bgcolor='#cccccc'>";
			$MailMessage.="<tr bgcolor='#FFFFFF'>";
			$MailMessage.="<td>Dear ".ucwords(strtolower($name)).",<br></td>";
			$MailMessage.="</tr>";		
			$MailMessage.="<tr bgcolor='#FFFFFF'>";
			$MailMessage.="<td>".$strMessage."</td>";
			$MailMessage.="</tr>";
			$MailMessage.="<tr>";			
			$MailMessage.="</tr>";
			$MailMessage.="</table>";
			$headers.= "FROM:".$strFrom."\n";
			//$headers.= "CC:sudam@csmpl.com\n";
			$headers.= 'MIME-Version: 1.0' . "\n";
			$headers.= "Content-Type: text/html; charset=ISO-8859-1\n";
                        
                      //  echo $MailMessage; 
			mail($mailTo, $strSubject, $MailMessage, $headers); 
		}
	}
        // ======================Function to send mail with attachment ## By Rasmi Ranjan Swain ## 10-Feb-2016==========================
        public function mail_attachment($filename, $path, $mailto, $from_mail, $from_name,$subject, $message) {
        $MailMessage	= "";
	$headers	= "";  
        if($mailto!="")
	{
        $MailMessage.="<table cellspacing='0' cellpadding='2' border='0' bgcolor='#cccccc'>";
	$MailMessage.="<tr bgcolor='#FFFFFF'>";
	$MailMessage.="<td>".$message."</td>";
	$MailMessage.="</tr>";
	$MailMessage.="<tr>";			
	$MailMessage.="</tr>";
	$MailMessage.="</table>";
        if($filename!=''){
            $file = $path.$filename;
            $file_size = filesize($file);
            $handle = fopen($file, "r");
            $content = fread($handle, $file_size);
            fclose($handle);
            $content = chunk_split(base64_encode($content));
            $uid = md5(uniqid(time()));
            $name = basename($file);
         }
        $header = "From: ".$from_name." <".$from_mail.">\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
        $header .= "This is a multi-part message in MIME format.\r\n";
        if($filename!=''){
            $header .= "--".$uid."\r\n";
            $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
            $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
            $header .= "--".$uid."\r\n";
            $header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; // use different content types here
            $header .= "Content-Transfer-Encoding: base64\r\n";
            $header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
            $header .= $content."\r\n\r\n";
            $header .= "--".$uid."--";
          } 
          mail($mailTo, $strSubject, $MailMessage, $header); 
        }
        
        }
        // Function to get Max Val
	function getMaxVal($colName,$tableName,$deletedFlag)
	{
		$sql	= "SELECT MAX(".$colName.") AS MAXNO FROM ".$tableName;
		if($deletedFlag!='')
			$sql.= ' WHERE '.$deletedFlag.'=0 ';		
		$result=$this->executeQry($sql);
		$row=mysqli_fetch_array($result);
		return $row[0]+1;
	}
	
	
	// Function to get number of unpublished data on CMS dashboard
    function getDashboardCount($tableName)
	{
		 $sql 		= "CALL USP_CMS_DASHBOARD('V','0',0,0,'$tableName');";                 
         $result	= $this->executeQry($sql);
         if ($result->num_rows > 0) 
		 {
			$row	= $result->fetch_array();
			return $row[0];
		 }
	}
	
	//======== Function for visitors counter === By Sunil Kumar Parida On 13-Aug-2015
	function hitCounter()
	{
		$curDate	= date("Y-m-d");
		$ipAddr		= $_SERVER['REMOTE_ADDR'];
		$hitSql	= "CALL USP_HIT_COUNTER('A','$curDate','$ipAddr')";
		$result	= $this->executeQry($hitSql);
		 if ($result->num_rows > 0) 
		 {
			$row	= $result->fetch_array();
			return $row[0];
		 }
	}
	
	//============ Function to view in money format By ## By Rasmi Ranjan Swain ##  13-Aug-2015=========
	function custom_money_format($n, $d = 0) 
	{
		$n	= str_replace(",","",$n);
		$n = number_format((double)$n, $d, '.', '');
		$n = strrev($n);
	
		if ($d) $d++;
		$d += 3;
	
		if (strlen($n) > $d)
			$n = substr($n, 0, $d) . ','. implode(',', str_split(substr($n, $d), 2));
		return strrev($n);
	}
	//============ Function to Get name by ## By Rasmi Ranjan Swain ## 13-Aug-2015=========
	public function getName($colName,$tableName,$colId,$id,$deletedFlag)
	{		
		$sql	= "SELECT ".$colName." FROM ".$tableName." WHERE ".$colId."='".$id."'";
                //echo $sql;
		if($deletedFlag!='')
			$sql.= ' AND '.$deletedFlag.'=0 ';		
		$result=$this->executeQry($sql);
		$row=mysqli_fetch_array($result);
		return $row[0];
	}
	//===========Function to create image from Bite code ## By Rasmi Ranjan Swain ## 13-Aug-2015
	public function getImage($imgCode,$height,$width,$imagePath,$file)
		{		
			$data = base64_decode($imgCode);			
			$im = imagecreatefromstring($data);
			// assign new width/height for resize purpose
			$newwidth 	= $height;
			$newheight  = $width;
			// Create a new image from the image stream in the string
			$thumb = imagecreatetruecolor($newwidth, $newheight); 
			if ($im !== false) {
				// alter or save the image  
				$imgName	= $file.date('ymdhis').'.png';
				$fileName = $imagePath.$imgName; // path to png image
				imagealphablending($im, false); // setting alpha blending on
				imagesavealpha($im, true); // save alphablending setting (important)
				// Generate image and print it
				$resp = imagepng($im, $fileName);
				// resizing png file
				/*imagealphablending($thumb, false); // setting alpha blending on
				imagesavealpha($thumb, true); // save alphablending setting (important)
				$source = imagecreatefrompng($fileName); // open image
				imagealphablending($source, true); // setting alpha blending on
				list($width, $height, $type, $attr) = getimagesize($fileName);
				imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
				$newFilename = $imagePath.$imgName;
				$resp = imagepng($thumb,$newFilename);*/
				// frees image from memory
				imagedestroy($im);
				imagedestroy($thumb);
				return $imgName;
			}
			
		}
    // function to get file comments
  function getFileComments($file)
    {
        $tokens = token_get_all(file_get_contents($file));
        $comments = array();
        foreach($tokens as $token) {
            if($token[0] == T_COMMENT || $token[0] == T_DOC_COMMENT) {
                $comments[] = $token[1];
            }
        }
        return $comments;
    }

   
   //======== Function to view as number By Rasmi Ranjan Swain On 10-Feb-2016
   function viewNumber($decimalVal)
   {
   		$lastval	= substr($decimalVal, strpos($decimalVal, ".") + 1);
		if($lastval==0)
		{
			$decimalExpl	= explode('.',$decimalVal);
			$decimalVal		= $decimalExpl[0];
		}
		return $decimalVal;
   }
	//======== Function to convert number to word By Rasmi Ranjan Swain On 10-Feb-2016 ======	
	function convert_number_to_words($number) {
		$hyphen      = '-';
		$conjunction = ' and ';
		$separator   = ', ';
		$negative    = 'negative ';
		$decimal     = ' point ';
		$dictionary  = array(
			0                   => 'zero',
			1                   => 'one',
			2                   => 'two',
			3                   => 'three',
			4                   => 'four',
			5                   => 'five',
			6                   => 'six',
			7                   => 'seven',
			8                   => 'eight',
			9                   => 'nine',
			10                  => 'ten',
			11                  => 'eleven',
			12                  => 'twelve',
			13                  => 'thirteen',
			14                  => 'fourteen',
			15                  => 'fifteen',
			16                  => 'sixteen',
			17                  => 'seventeen',
			18                  => 'eighteen',
			19                  => 'nineteen',
			20                  => 'twenty',
			30                  => 'thirty',
			40                  => 'fourty',
			50                  => 'fifty',
			60                  => 'sixty',
			70                  => 'seventy',
			80                  => 'eighty',
			90                  => 'ninety',
			100                 => 'hundred',
			1000                => 'thousand',
			1000000             => 'million',
			1000000000          => 'billion',
			1000000000000       => 'trillion',
			1000000000000000    => 'quadrillion',
			1000000000000000000 => 'quintillion'
		);
	
		if (!is_numeric($number)) {
			return false;
		}
	
		if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
			// overflow
			trigger_error(
				'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
				E_USER_WARNING
			);
			return false;
		}
	
		if ($number < 0) {
			return $negative . $this->convert_number_to_words(abs($number));
		}
	
		$string = $fraction = null;
	
		if (strpos($number, '.') !== false) {
			list($number, $fraction) = explode('.', $number);
		}
	
		switch (true) {
			case $number < 21:
				$string = $dictionary[$number];
				break;
			case $number < 100:
				$tens   = ((int) ($number / 10)) * 10;
				$units  = $number % 10;
				$string = $dictionary[$tens];
				if ($units) {
					$string .= $hyphen . $dictionary[$units];
				}
				break;
			case $number < 1000:
				$hundreds  = $number / 100;
				$remainder = $number % 100;
				$string = $dictionary[$hundreds] . ' ' . $dictionary[100];
				if ($remainder) {
					$string .= $conjunction . $this->convert_number_to_words($remainder);
				}
				break;
			default:
				$baseUnit = pow(1000, floor(log($number, 1000)));
				$numBaseUnits = (int) ($number / $baseUnit);
				$remainder = $number % $baseUnit;
				$string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
				if ($remainder) {
					$string .= $remainder < 100 ? $conjunction : $separator;
					$string .= $this->convert_number_to_words($remainder);
				}
				break;
		}
	
		if (null !== $fraction && is_numeric($fraction)) {
			$string .= $decimal;
			$words = array();
			foreach (str_split((string) $fraction) as $number) {
				$words[] = $dictionary[$number];
			}
			$string .= implode(' ', $words);
		}
	
		return $string;
	}
	
	//=========== Function to get json file data ========
	function get_json_value($json, $nodeName, $checkId, $valueNode, $textNode)
	{
		//$strJsonfile  = file_get_contents($fileName);
		//$json		   	= json_decode($strJsonfile, true); 
		$counter		= 0;
		$types			= '';
		foreach($json[$nodeName] as $type)
		{
			$userTypes	= $json[$nodeName][$counter][$valueNode];
			if($userTypes==$checkId)
			{
				$types	= $json[$nodeName][$counter][$textNode];
				break;
			}
			$counter++;
		}
		return $types;
	} 
        
	// ***function to Get address from Latitude and Longitude Coordinates **BY**RASMI RANJAN SWAIN ON 10-Feb-2016 *** 
	function getAddress($lat, $lon){
	   $url  = "http://maps.googleapis.com/maps/api/geocode/json?latlng=".
				$lat.",".$lon."&sensor=false";
	   $json = @file_get_contents($url);
	   $data = json_decode($json);
	   $status = $data->status;
	   $address = '';
	   if($status == "OK"){
		  $address = $data->results[0]->formatted_address;
		}
	   return $address;
           
        }
 /*Function to send SMS By Ashis kumar Patra*/
	public function sendSMS($mobileno,$message){
                   //echo $mobileno;
                        $fields = '';
                        https://mgov.gov.in/msdp_techarticle.jsp
                        $url = "https://msdgweb.mgov.gov.in/esms/sendsmsrequest";
                         $data = array(
                        "username" => "opscsms2012-ODIGOV", // type your assigned username here(for example: "username" => "CDACMUMBAI")
                        "password" => "Odisha#2018#", //type your password
                        "senderid" =>"ODIGOV", //type your senderID
                        "smsservicetype" =>"singlemsg", //*Note* for single sms enter ”singlemsg” , for bulk
                        "Key" => '88f6ae42-6a35-46d1-a038-bee1fdad08d7',
                        "mobileno" =>$mobileno, //enter the mobile number
                        "content" =>  $message //type the message. 
                        );
                        $fields = '';
                        foreach($data as $key => $value) {
                           $fields .= $key . '=' . $value . '&';
                        }
                        $fields=rtrim($fields, '&');

                      //echo $fields;exit;
                        $post = curl_init();
                        curl_setopt($post, CURLOPT_URL, $url);
                        curl_setopt($post, CURLOPT_POST, count($data));
                        curl_setopt($post, CURLOPT_POSTFIELDS, $fields);
                        curl_setopt($post, CURLOPT_RETURNTRANSFER, 1);
                        $result = curl_exec($post);
                        curl_close($post);
                    }
                    
                    
        function getExtension($str) {

         $i = strrpos($str,".");
         if (!$i) { return ""; } 

         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
	}
	// ***function to Resize Image **BY**RASMI RANJAN SWAIN ON 10-Feb-2016 *** 
        function GetResizeImage($objCusModel,$folderPath,$reqWidth,$reqHight,$fieldName,$txtTempName)
		{	
			$errors=0;
			$errMsg="";
			$image = $fieldName;
			$uploadedfile = $txtTempName;	
	        if ($image) 
				{
					$filename = stripslashes($fieldName);
					$extension = $objCusModel->getExtension($filename);
					$extension = strtolower($extension);
					if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
	  					{
							$errMsg=' Unknown Image extension ';
							$errors=1;
	  					}
			else
	 			{
					$size=filesize($txtTempName);
			if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $txtTempName;
					$src = imagecreatefromjpeg($uploadedfile);
				}
			else if($extension=="png")
				{
                                   
					$uploadedfile = $txtTempName;
					$src = @imagecreatefrompng($uploadedfile);
					//move_uploaded_file($folderPath,$uploadedfile);
				}
			else 
				{
					$src = imagecreatefromgif($uploadedfile);
				}

			list($width,$height)=getimagesize($uploadedfile);
                        $maxwidth = 800;
                        if($reqWidth==0){
                           if($width>$maxwidth)
                                $newwidth=$maxwidth;
                           else
                               $newwidth=$width;
                        } else
                           $newwidth=$reqWidth; 
                        
			$newheight=($height/$width)*$newwidth;
                        if($reqHight>0 && $reqHight!='')
                          $newheight=$reqHight;
                        
			$tmp=imagecreatetruecolor($newwidth,$newheight);		
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);                              
			$filename = $folderPath. $fieldName;                                                
			imagejpeg($tmp,$filename,80);		
			imagedestroy($src);
			imagedestroy($tmp);
			}
		}
		return $errors;//."==".$errMsg;
				
	}
      
  
  // ***function to Ward Wrap **BY**RASMI RANJAN SWAIN ON 10-Feb-2016 ***       
        function wardWrap($ward, $minNum) {
            $returnWard = $ward;
            $ward               = str_replace(array("\r", "\n"), "", $ward);
            if (strlen($ward) > $minNum) {
                
               
                $last_space         = mb_strrpos(mb_substr($ward, 0, $minNum, "UTF-8"), " ", 0, "UTF-8"); //Find the last space symbol position
                $remainText         = mb_substr($ward,0,$last_space, "UTF-8");
                
               // $remainText = substr($ward, 0, $minNum);
                $returnWard = $remainText . '...';
            }
            return $returnWard;
        }
        // ***function to Ward Wrap **BY**Ashis kumar Patra 10-Feb-2016 ***       
        function nthWardWrap($ward, $start,$minNum) {
           
            $returnStr = $ward;
            $ward               = str_replace(array("\r", "\n"), "", $ward);
          //  echo $ward;exit;
            $returnStr=mb_substr($ward, $start, $minNum, "UTF-8");
//            if (strlen($ward) < $minNum) {
//                
//               
//                $last_space            = mb_strrpos(mb_substr($ward, $start, $minNum, "UTF-8"), " ", $start, "UTF-8"); //Find the last space symbol position
//                $remainTextAbc         = mb_substr($ward,$start,$last_space, "UTF-8");
//                
//               // $remainText = substr($ward, 0, $minNum);
//                $returnStr = $remainTextAbc.".";
//            }
            return $returnStr;
        }
        // ***function to get WebPath **BY**RASMI RANJAN SWAIN ON 10-Feb-2016 *** 
        function webPath() {
            if (basename($_SERVER['PHP_SELF']) == 'index.php')
                $strPath = "";
            else
                $strPath = "../";

            $strQS = $_SERVER['QUERY_STRING'];
            $intQSCount = count(explode("&", $strQS));
            //echo $intQSCount."<br>";
            if ($intQSCount > 0) {
                for ($i = 1; $i < $intQSCount; $i = $i + 1) {
                    $strPath = "../" . $strPath;
                }
            }
            return $strPath;
        }
       // ***function to Get previlage details **BY**RASMI RANJAN SWAIN ON 10-Feb-2016 ***  
       // ***function to Get previlage details **BY**RASMI RANJAN SWAIN ON 10-Feb-2016 ***  
       public function checkPrivilege($userId, $glId, $plId, $pagename, $pagetype)
        {
            $strPath = $this->webPath();
            $flag = 0;
            if ($_SESSION['adminPrivilege'] == 1) {
                return array('edit' => '', 'delete' => 'yes', 'active' => 'yes', 'add' => '', 'publish' => 'yes');
            } else {
                //assign $page as 'A' for Add&View, 'V' for view&edit
                $sql = "CALL USP_USER_PERMISSION('S',0,$userId,$glId,$plId,'0','0','0','0','0','0','');";
              //  echo $sql;
                $result = $this->executeQry($sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    $relatedPage = $row['RELATED_PAGES'];
                    $explPage = explode(",", $relatedPage);
                    for ($i = 0; $i < count($explPage); $i++) {
                        if ($explPage[$i] == $pagename) {
                            $flag = 1;
                        }
                    }
                    if ($flag == 0) {
                        header('location: ' . $strPath . 'dashboard/');
                    }
                    
                    $noEdit = '';
                    $noDelete = 'yes';
                    $noActive = 'yes';
                    $noAdd = '';
                    $nopublish = '';
                    if ($pagetype == 'V') {
                        if ($row['INT_MANAGER'] != 1) {
                            if ($row['INT_AUTHOR'] == 1) {
                                $noEdit = 'display:none ';
                                $noDelete = 'No';
                                $noActive = 'No';
                            }
                            if ($row['INT_EDITOR'] == 1) {
                                $noEdit = '';
                                $noDelete = 'No';
                                if ($row['INT_AUTHOR'] == 1)
                                    $noAdd = '';
                                else
                                    $noAdd = '1';
                            }
                            if ($row['INT_PUBLISHER'] == 1) {
                                $noEdit = '';
                                $noDelete = "yes";
                                $noAdd = '1';
                                $nopublish = "yes";
                            }
                            if ($row['INT_PUBLISHER'] == 1) {
                                if ($row['INT_AUTHOR'] == 1)
                                    $noAdd = '';
                                else
                                    $noAdd = '1';
                                $noDelete = 'yes';
                                $noActive = 'yes';
                            }
                        }
                        else {
                            $nopublish = "yes";
                        }
                    }
                    if ($pagetype == 'A') {
                        if ($row['INT_MANAGER'] != 1) {
                            if ($row['INT_AUTHOR'] == 1 && $row['INT_EDITOR'] != 1) {
                                if (isset($_REQUEST['ID'])) {
                                    unset($_REQUEST['ID']);
                                }
                                $noAdd = '';
                            }
                            if ($row['INT_EDITOR'] == 1 && $row['INT_AUTHOR'] != 1) {
                                $noAdd = '1';
                            }
                        }
                    }
                    return array('edit' => $noEdit, 'delete' => $noDelete, 'active' => $noActive, 'add' => $noAdd, 'publish' => $nopublish);
                } else {
                    header('location: ' . $strPath . 'dashboard/');
                }
            }
        }
        
    // ***function to generate random string **BY**RASMI RANJAN SWAIN ON 10-Feb-2016 ***  
    public function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    }
    // ***function to Encode Url **BY**RASMI RANJAN SWAIN ON 10-Feb-2016 *** 
    function base64url_encode($data) {
    $encodeData    = rtrim(strtr(base64_encode(base64_encode($data)), '+/', '-_'), '=');
   // $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //$charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString.$encodeData;
}
// ***function to Decode Url **BY**RASMI RANJAN SWAIN ON 10-Feb-2016 ***  
    public function base64url_decode($data) {
   // $data    = substr($data,4);
    return base64_decode(base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)));
}
       //***function to get pluralize the difference day/month/year difference **BY**T Ketaki Debadarshini ON 04-March-2016 ***                   
      function pluralize($count,$text) 
        { 
             if($count>=1)
              return $count . ( ( $count == 1 ) ? ( " $text" ) : ( " ${text}s" ) );
             else
                 return 'now';
        }
        //***function to get day/month/year difference **BY**T Ketaki Debadarshini ON 04-March-2016 ***  
      function ago($datetime)
        {
            $interval = date_create('now')->diff($datetime);
            $suffix = ( $interval->invert ? ' ago' : '' );
            if ( $v = $interval->y >= 1 ) return $this->pluralize( $interval->y, 'year' ) . $suffix;
            if ( $v = $interval->m >= 1 ) return $this->pluralize( $interval->m, 'month' ) . $suffix;
            if ( $v = $interval->d >= 1 ) return $this->pluralize( $interval->d, 'day' ) . $suffix;
            if ( $v = $interval->h >= 1 ) return $this->pluralize( $interval->h, 'hour' ) . $suffix;
            if ( $v = $interval->i >= 1 ) return $this->pluralize( $interval->i, 'minute' ) . $suffix;
            return $this->pluralize( $interval->s, 'second' ) . $suffix;
        }
        
        //FUnction to load the navigation **BY**T Ketaki Debadarshini ON 18-April-2016 ***  
      function loadNavigation($pgName,$glhref,$glpageTitle,$lLink,$plpageTitle,$pageTitle){
        if($plpageTitle!=''){
            
            if($glpageTitle!='')
              $totLink=" &nbsp;&#47; &nbsp;<span >" .$glpageTitle ."</span>";
             $totLink.="&nbsp;&#47; &nbsp;<span  > " .$plpageTitle. " </span>";
         
        } else if($glpageTitle!='')
        {
            if($glhref!='')
              $totLink=" &nbsp;&#47; &nbsp;<a href='".SITE_PATH.$glhref."' >".$glpageTitle."</a> ";
            else
              $totLink.=" &nbsp;/&nbsp; <span>".$glpageTitle."</span>";
        }

          $titleLink.=" &nbsp;/&nbsp;<span class='active'>" .$pageTitle ." </span>";
                
            if($pageTitle!='') 
             $totLink.=$titleLink;
            
            return $totLink;
        }
//==================== Function to return date  value ## By Chinmayee ## 09-Aug-2016 ========================
	public function showDateFormat($date)
	{
            if((empty($date)) || ($date=="0000-00-00") || ($date=="0000-00-00 00:00:00")|| (strtotime($date)==0)|| (strtotime($date)=='')){
			$Datevalue	= '--';
            } else {
                $Datevalue=$date;
            }
			return $Datevalue;
	}
        
         // Function to get permission details       
        function getPermission($glid,$plid,$userid)
	{
		 $sql = "CALL USP_ADMIN_PERMISSION('CP','0',$userid,$glid,$plid,'0','0','0','0','',@OUT);";
               //  echo $sql;
                $result=$this->executeQry($sql);
                 if ($result->num_rows > 0) {
					$row	= $result->fetch_array();
					return $row[0];
                 }
	}
	/*============ function to send authentication mail=================
                            By  : T Ketaki Debadarshini
                            ON  : 13/April/2017
	===================================================================*/
        
        function sendAuthMail($jsData){
            include_once(PHP_MAILER_PATH."PHPMailerAutoload.php");
            
            $data           = json_decode($jsData);
            $mail           = new PHPMailer;

            //Enable SMTP debugging. 
            $mail->SMTPDebug = false;                               
            //Set PHPMailer to use SMTP.
            $mail->isSMTP();            
            //Set SMTP host name                          
            $mail->Host = SMTP_HOST;
            //Set this to true if SMTP host requires authentication to send email
            $mail->SMTPAuth = true;                          
            //Provide username and password     
            $mail->Username = SMTP_USER;                 
            $mail->Password = SMTP_PASS;                           
            //If SMTP requires TLS encryption then set it
            $mail->SMTPSecure = SMTP_ENCT;                           
            //Set TCP port to connect to 
            $mail->Port = SMTP_PORT;                                   

            $mail->From = $data->from;
            $mail->FromName = TITLE;
            
            $countMail = count($data->to);
            $countccMail = count($data->cc);
            $countbccMail = count($data->bcc);
            if($countMail>0)
            {
                foreach($data->to as $mailTo)
                {                
                        $mail->addAddress($mailTo, $data->name);
                }
            }
            if($countccMail>0)
            {
                foreach($data->cc as $ccMail)
                {					
                        $mail->AddCC($ccMail);
                }
            }
            if($countbccMail)
            {
                foreach($data->bcc as $bccMail)
                {                
                        $mail->AddBCC($bccMail);
                }
            }
           
           if($data->FileName !=''){
            $mail->AddAttachment($data->FileName);
                //$url = APP_PATH."uploadDocuments/notification/".$data->FileName;
                 $url = $data->FileName;
                 $mail->AddAttachment($url, $name = '',  $encoding = 'base64', $type = '');
            }
            
            $mail->isHTML(true);

            $mail->Subject = $data->sub;
            $mail->Body = $data ->message;

            if(!$mail->send()) {
                $res['msg'] = "Mailer Error: " . $mail->ErrorInfo;
            } 
            else{
                $res['msg'] = "Success";
            }
            $jsRes = json_encode($res);
            return $jsRes;
        }
        
        
        /*============ function to send authentication mail=================
                            By  : Rahul Kumar Saw
                            ON  : 10/Jan/2020
	===================================================================*/
        
        function sendAuthMailFeedback($jsData){
            include_once(PHP_MAILER_PATH."PHPMailerAutoload.php");
            
            $data           = json_decode($jsData);
            $mail           = new PHPMailer;
			
			$mail->SMTPDebug = 0;
			$mail->isSMTP();
			$mail->Host = SMTP_HOST;
			$mail->Port = 587;
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'tls';
			$mail->Username = SMTP_FEEDBACK_USER;
			$mail->Password = SMTP_FEEDBACK_PASS;


			$mail->From = $data->from;
			$mail->FromName = TITLE;
			$countMail = count($data->to);
            $countccMail = count($data->cc);
            $countbccMail = count($data->bcc);
            if($countMail>0)
            {
                foreach($data->to as $mailTo)
                {                
                        $mail->addAddress($mailTo, $data->name);
                }
            }
            if($countccMail>0)
            {
                foreach($data->cc as $ccMail)
                {					
                        $mail->AddCC($ccMail);
                }
            }
            if($countbccMail)
            {
                foreach($data->bcc as $bccMail)
                {                
                        $mail->AddBCC($bccMail);
                }
            }
           
           if($data->FileName !=''){
            $mail->AddAttachment($data->FileName);
                //$url = APP_PATH."uploadDocuments/notification/".$data->FileName;
                 $url = $data->FileName;
                 $mail->AddAttachment($url, $name = '',  $encoding = 'base64', $type = '');
            }
            
            $mail->isHTML(true);

            $mail->Subject = $data->sub;
            $mail->Body = $data ->message;

            if(!$mail->send()) {
                $res['msg'] = "Mailer Error: " . $mail->ErrorInfo;
            } 
            else{
                $res['msg'] = "Success";
            }
            $jsRes = json_encode($res);
            return $jsRes;
        }
			
			
			

        function sendAuthMailContact($jsData){
            include_once(PHP_MAILER_PATH."PHPMailerAutoload.php");
            
            $data           = json_decode($jsData);
            $mail           = new PHPMailer;

            $mail->SMTPDebug = 0;
			$mail->isSMTP();
			$mail->Host = SMTP_HOST;
			$mail->Port = 587;
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'tls';
			$mail->Username = SMTP_CONTACT_USER;
			$mail->Password = SMTP_CONTACT_PASS;


			$mail->From = $data->from;
			$mail->FromName = TITLE;
			$countMail = count($data->to);
            $countccMail = count($data->cc);
            $countbccMail = count($data->bcc);
            if($countMail>0)
            {
                foreach($data->to as $mailTo)
                {                
                        $mail->addAddress($mailTo, $data->name);
                }
            }
            if($countccMail>0)
            {
                foreach($data->cc as $ccMail)
                {					
                        $mail->AddCC($ccMail);
                }
            }
            if($countbccMail)
            {
                foreach($data->bcc as $bccMail)
                {                
                        $mail->AddBCC($bccMail);
                }
            }
           
           if($data->FileName !=''){
            $mail->AddAttachment($data->FileName);
                //$url = APP_PATH."uploadDocuments/notification/".$data->FileName;
                 $url = $data->FileName;
                 $mail->AddAttachment($url, $name = '',  $encoding = 'base64', $type = '');
            }
            
            $mail->isHTML(true);

            $mail->Subject = $data->sub;
            $mail->Body = $data ->message;

            if(!$mail->send()) {
                $res['msg'] = "Mailer Error: " . $mail->ErrorInfo;
            } 
            else{
                $res['msg'] = "Success";
            }
            $jsRes = json_encode($res);
            return $jsRes;
        }
	
		function sendAuthMailSkillComp($jsData){
            include_once(PHP_MAILER_PATH."PHPMailerAutoload.php");
            
            $data           = json_decode($jsData);
            $mail           = new PHPMailer;

            $mail->SMTPDebug = 0;
			$mail->isSMTP();
			$mail->Host = SMTP_HOST;
			$mail->Port = 587;
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'tls';
			$mail->Username = SMTP_SKILLCOM_USER;
			$mail->Password = SMTP_SKILLCOM_PASS;


			$mail->From = $data->from;
			$mail->FromName = TITLE;
			$countMail = count($data->to);
            $countccMail = count($data->cc);
            $countbccMail = count($data->bcc);
            if($countMail>0)
            {
                foreach($data->to as $mailTo)
                {                
                        $mail->addAddress($mailTo, $data->name);
                }
            }
            if($countccMail>0)
            {
                foreach($data->cc as $ccMail)
                {					
                        $mail->AddCC($ccMail);
                }
            }
            if($countbccMail)
            {
                foreach($data->bcc as $bccMail)
                {                
                        $mail->AddBCC($bccMail);
                }
            }
           
           if($data->FileName !=''){
            $mail->AddAttachment($data->FileName);
                //$url = APP_PATH."uploadDocuments/notification/".$data->FileName;
                 $url = $data->FileName;
                 $mail->AddAttachment($url, $name = '',  $encoding = 'base64', $type = '');
            }
            
            $mail->isHTML(true);

            $mail->Subject = $data->sub;
            $mail->Body = $data ->message;

            if(!$mail->send()) {
                $res['msg'] = "Mailer Error: " . $mail->ErrorInfo;
            } 
            else{
                $res['msg'] = "Success";
            }
            $jsRes = json_encode($res);
            return $jsRes;
        }
		
		
		function sendAuthMailNanoUnicorn($jsData){
            include_once(PHP_MAILER_PATH."PHPMailerAutoload.php");
            
            $data           = json_decode($jsData);
            $mail           = new PHPMailer;

            $mail->SMTPDebug = 0;
			$mail->isSMTP();
			$mail->Host = SMTP_HOST;
			$mail->Port = 587;
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'tls';
			$mail->Username = SMTP_NANO_USER;
			$mail->Password = SMTP_NANO_PASS;


			$mail->From = $data->from;
			$mail->FromName = TITLE;
			$countMail = count($data->to);
            $countccMail = count($data->cc);
            $countbccMail = count($data->bcc);
            if($countMail>0)
            {
                foreach($data->to as $mailTo)
                {                
                        $mail->addAddress($mailTo, $data->name);
                }
            }
            if($countccMail>0)
            {
                foreach($data->cc as $ccMail)
                {					
                        $mail->AddCC($ccMail);
                }
            }
            if($countbccMail)
            {
                foreach($data->bcc as $bccMail)
                {                
                        $mail->AddBCC($bccMail);
                }
            }
           
           if($data->FileName !=''){
            $mail->AddAttachment($data->FileName);
                //$url = APP_PATH."uploadDocuments/notification/".$data->FileName;
                 $url = $data->FileName;
                 $mail->AddAttachment($url, $name = '',  $encoding = 'base64', $type = '');
            }
            
            $mail->isHTML(true);

            $mail->Subject = $data->sub;
            $mail->Body = $data ->message;

            if(!$mail->send()) {
                $res['msg'] = "Mailer Error: " . $mail->ErrorInfo;
            } 
            else{
                $res['msg'] = "Success";
            }
            $jsRes = json_encode($res);
            return $jsRes;
        }
		
		
		function sendAuthMailEnquire($jsData){
            include_once(PHP_MAILER_PATH."PHPMailerAutoload.php");
            
            $data           = json_decode($jsData);
            $mail           = new PHPMailer;

            $mail->SMTPDebug = 0;
			$mail->isSMTP();
			$mail->Host = SMTP_HOST;
			$mail->Port = 587;
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'tls';
			$mail->Username = SMTP_ENQUIRE_USER;
			$mail->Password = SMTP_ENQUIRE_PASS;


			$mail->From = $data->from;
			$mail->FromName = TITLE;
			$countMail = count($data->to);
            $countccMail = count($data->cc);
            $countbccMail = count($data->bcc);
            if($countMail>0)
            {
                foreach($data->to as $mailTo)
                {                
                        $mail->addAddress($mailTo, $data->name);
                }
            }
            if($countccMail>0)
            {
                foreach($data->cc as $ccMail)
                {					
                        $mail->AddCC($ccMail);
                }
            }
            if($countbccMail)
            {
                foreach($data->bcc as $bccMail)
                {                
                        $mail->AddBCC($bccMail);
                }
            }
           
           if($data->FileName !=''){
            $mail->AddAttachment($data->FileName);
                //$url = APP_PATH."uploadDocuments/notification/".$data->FileName;
                 $url = $data->FileName;
                 $mail->AddAttachment($url, $name = '',  $encoding = 'base64', $type = '');
            }
            
            $mail->isHTML(true);

            $mail->Subject = $data->sub;
            $mail->Body = $data ->message;

            if(!$mail->send()) {
                $res['msg'] = "Mailer Error: " . $mail->ErrorInfo;
            } 
            else{
                $res['msg'] = "Success";
            }
            $jsRes = json_encode($res);
            return $jsRes;
        }
     /*   function sendAuthMail($jsData)
	{
            include_once(PHP_MAILER_PATH."PHPMailerAutoload.php");
            
            $data           = json_decode($jsData);
            $mail           = new PHPMailer;

            //Enable SMTP debugging. 
            $mail->SMTPDebug = false;                               
            //Set PHPMailer to use SMTP.
            $mail->isSMTP();            
            //Set SMTP host name                          
            $mail->Host = $data->host;
            //Set this to true if SMTP host requires authentication to send email
            $mail->SMTPAuth = true;                          
            //Provide username and password     
            $mail->Username = $data->user;                 
            $mail->Password = $data->pass;                           
            //If SMTP requires TLS encryption then set it
            $mail->SMTPSecure = $data->enct;                           
            //Set TCP port to connect to 
            $mail->Port = $data->port;                                   

            $mail->From = $data->from;
            $mail->FromName = TITLE;
            
            $countMail = count($data->to);
            $countccMail = count($data->cc);
            $countbccMail = count($data->bcc);
            if($countMail>0)
			{
				foreach($data->to as $mailTo)
				{                
					$mail->addAddress($mailTo, $data->name);
				}
            }
			if($countccMail>0)
			{
				foreach($data->cc as $ccMail)
				{					
					$mail->AddCC($ccMail);
				}
            }
			if($countbccMail)
			{
				foreach($data->bcc as $bccMail)
				{                
					$mail->AddBCC($bccMail);
				}
            }
           
            if($data->FileName !='')
            {
            	$mail->AddAttachment($data->FileName);
            	$file_path 	= $data->FilePath;
                $url 		= $file_path.$data->FileName;
                $filename 	= $data->FileName;
                 $mail->AddAttachment($url, $name = $filename,  $encoding = 'base64', $type = 'application/pdf');
            }
            $mail->isHTML(true);

            $mail->Subject = $data->sub;
            $mail->Body = $data ->message;

            if(!$mail->send()) {
                $res['msg'] = "Mailer Error: " . $mail->ErrorInfo;
            } 
            else{
                $res['msg'] = "Success";
            }
            //print_r($res);
            $jsRes = json_encode($res);
            return $jsRes;
        }
        */
        /* --------------------------------------
          Function to check html tags
          Developed By : T Ketaki Debadarshini  
          Developed On : 08 Jun 2015
          --------------------------------------- */

        public function checkHtmlTags($string, $tags) {
            $flags  = 0;
            $tagArr = explode(',', $tags);
            $count  = count($tagArr);
            for ($i = 0; $i < $count; $i++) {
                $matchString = strtolower($tagArr[$i]);
                if (strpos($string, $matchString) !== false) {
                    $flags++;
                }
            }
            return $flags;
        }
         /* --------------------------------------
          Function to To decimal if needed
          Developed By : Ashis kumar Patra
          Developed On : 08 Jun 2015
          --------------------------------------- */

        public function format_decimals($string) {
           
            $decVal = str_replace(".00", "", (string)number_format ($string, 2, ".", ""));
            return $decVal;
        } 
        
         /* --------------------------------------
          Function to To get the odia wweek days
          Developed By : T Ketaki Debadarshini  
          Developed On : 08 Aug 2017
          --------------------------------------- */

        public function getOdiaWeekdays($intWeekday) {
                        
            $aryWeekdays = array(0=>'&#2864;&#2860;&#2879;&#2860;&#2878;&#2864;',1=>'&#2872;&#2891;&#2862;&#2860;&#2878;&#2864;',2=>'&#2862;&#2841;&#2893;&#2839;&#2867;&#2860;&#2878;&#2864;',3=>'&#2860;&#2881;&#2855;&#2860;&#2878;&#2864;',4=>'&#2839;&#2881;&#2864;&#2881;&#2860;&#2878;&#2864;',5=>'&#2870;&#2881;&#2837;&#2893;&#2864;&#2860;&#2878;&#2864;',6=>'&#2870;&#2856;&#2879;&#2860;&#2878;&#2864;');
            return $aryWeekdays[$intWeekday];
        } 
        
        /* --------------------------------------
          Function to To get the odia months
          Developed By : T Ketaki Debadarshini  
          Developed On : 08 Aug 2017
          --------------------------------------- */

        public function getOdiaMonths($intMonth) {
           
            $aryMonths = array(1=>'&#2844;&#2878;&#2856;&#2881;&#2822;&#2864;&#2880;',2=>'&#2859;&#2887;&#2860;&#2883;&#2822;&#2864;&#2880;',3=>'&#2862;&#2878;&#2864;&#2893;&#2842;&#2893;&#2842;',4=>'&#2821;&#2858;&#2893;&#2864;&#2887;&#2866;',5=>'&#2862;&#2823;',6=>'&#2844;&#2881;&#2856;',7=>'&#2844;&#2881;&#2866;&#2878;&#2823;',8=>'&#2821;&#2839;&#2871;&#2893;&#2847;',9=>'&#2872;&#2887;&#2858;&#2893;&#2847;&#2887;&#2862;&#2893;&#2860;&#2864;',10=>'&#2821;&#2837;&#2893;&#2847;&#2891;&#2860;&#2864;',11=>'&#2856;&#2861;&#2887;&#2862;&#2893;&#2860;&#2864;',12=>'&#2849;&#2879;&#2872;&#2887;&#2862;&#2893;&#2860;&#2864;');
           return $aryMonths[$intMonth];
        }
        
        public $crypKey="ODISHASKILLDEVEL";
        public $cipher 	  = "AES-128-CBC";
       //======== Function to encrypt data file BY:: Ashok Kumar Samal ON 28-JUN-2019 ======
     public function encrypt($data)
		{

    		if (version_compare(PHP_VERSION, '7.0.0') >= 0)
    	 {
            $cipher                 = $this->cipher;
            $ivlen                  = openssl_cipher_iv_length($cipher);
            $iv                       = openssl_random_pseudo_bytes($ivlen);
            $ciphertext_raw = openssl_encrypt($data, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
            $hmac                     = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
            $ciphertext         = base64_encode($iv.$hmac.$ciphertext_raw);

            $replacedStr    = str_replace("/","-",$ciphertext);
            $replacedStr    = str_replace("=","_",$replacedStr);
            $replacedStr    = str_replace("+","$",$replacedStr);
            return $replacedStr;
        }
        else
        {
        	$encrKey	= $this->crypKey;
			$encData	= base64_encode(
				mcrypt_encrypt(
				MCRYPT_RIJNDAEL_128,
				$encrKey,
				$data,
				MCRYPT_MODE_CBC,
				"\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0"
				)
			);
			$newString	= $data.'|'.$encData;
			$newEncStr	= base64_encode(
				mcrypt_encrypt(
				MCRYPT_RIJNDAEL_128,
				$encrKey,
				$newString,
				MCRYPT_MODE_CBC,
				"\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0"
				)
			);
			$replacedStr	= str_replace("/","-",$newEncStr);
			$replacedStr	= str_replace("=","_",$replacedStr);
			$replacedStr	= str_replace("+","$",$replacedStr);
			return $replacedStr;
        }
    }
	//======== Function to decrypt data file BY:: Ashok Kumar Samal ON 28-JUN-2019 ======

    public function decrypt($data)
		{
			if (version_compare(PHP_VERSION, '7.0.0') >= 0) 
			{
				$replacedStr    = str_replace("-","/",$data);
            $replacedStr    = str_replace("_","=",$replacedStr);
            $replacedStr    = str_replace("$","+",$replacedStr);

            $decryptTxt                    = '';
            $cipher                         = $this->cipher;
            $c                                     = base64_decode($replacedStr);
            $ivlen                             = openssl_cipher_iv_length($cipher);
            $iv                                 = substr($c, 0, $ivlen);
            $hmac                             = substr($c, $ivlen, $sha2len=32);
            $ciphertext_raw         = substr($c, $ivlen+$sha2len);
            $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
            $calcmac                         = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);


            if($replacedStr!='')
            {
                if (hash_equals($hmac, $calcmac))
                {
                    $decryptTxt = $original_plaintext;
                }
            }

            return $decryptTxt;
        }
        else
        {
        	$replacedStr	= str_replace("-","/",$data);
			$replacedStr	= str_replace("_","=",$replacedStr);
			$replacedStr	= str_replace("$","+",$replacedStr);
			$decrKey	= $this->crypKey;
			$decode 	= base64_decode($replacedStr);
			$decrData	= mcrypt_decrypt(
			MCRYPT_RIJNDAEL_128,
			$decrKey,
			$decode,
			MCRYPT_MODE_CBC,
			"\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0"
			);
			$explDecrData	= explode('|',$decrData);
			$decrData1	 	= base64_decode($explDecrData[1]);		
			$decrData2		= mcrypt_decrypt(
			MCRYPT_RIJNDAEL_128,
			$decrKey,
			$decrData1,
			MCRYPT_MODE_CBC,
			"\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0"
			);		
			if(trim($explDecrData[0]) == trim($decrData2))
			{
				return trim($decrData2);
			}
			else
			{
				return '';
			}
        }
     }
        
        
        function sendAndroidNotify($devices, $message, $type) {
        
        $apiKey = "AIzaSyB1cqqmtDkfdValceTtaveYpKzfIMcIGOY";
       // $senderId = '1098073104655';
        #API access key from Google API's Console
        define('API_ACCESS_KEY', $apiKey);

        #prep the bundle
        $msg = array
            (
            'body' => $message,
            'title' => 'OSDA',
            'click_action'=>'FCM_PLUGIN_ACTIVITY',
            'icon' => '', 
            'sound' => ''
           );
        $key = array
            (
                'param' => "1",
                'message'=>$message
            );
        
        //$fields = array('to' => $devices, 'notification' => $msg);
        //$fields = json_encode($fields);
        //echo '<pre>';print_r($fields);echo '</pre>';exit;
        //$fields = array('registration_ids' => $devices, 'data' => $msg);
        if($type == 1){
            //$fields = array('to' => $devices, 'notification' => $msg,'data' => $key);
            $fields = array('to' => $devices, 'notification' => $msg,'data' => $key);
        }
        if($type == 2){
            $fields = array('registration_ids' => $devices, 'notification' => $msg,'data' => $key);
        }
        
        $headers = array
            (
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );
        #Send Reponse To FireBase Server	
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
        #Echo Result Of FireBase Server
        $resArr = json_decode($result, true);
        
        //print_r($resArr);exit;
        return $resArr;
       
    }
    
     /* --------------------------------------
          Function to To Call  procedures
          Developed By : Ashis kumar Patra
          Developed On : 04 Dec 2018
          --------------------------------------- */
    
    
    public function callProc($strProcName, $strProcAction, $arrVals)
        {
            $parmaset = '';

            if (!empty($arrVals)) {

                foreach ($arrVals as $key => $val) {
                    $parmaset .= '@p_' . $key . "='" . str_replace(array("'", "\\", '"'), array("''", "\\\\\\\\", '\"'), $val) . "',";
                }
                    /*used for debug sql */

                     $parmaset .= "@p_debug=0"; // For get the select Statement from procedure

                $parmaset = rtrim($parmaset, ',');

            } else {
                $parmaset .= "@p_empty='1'";
            }

            $sql = "CALL $strProcName('$strProcAction', \"$parmaset\")";
//echo $sql;//exit;
            /*used for check sql */
            $result_set = $this->executeQry($sql);
//echo $sql;exit;
            return $result_set;
        }
     /* --------------------------------------
          Function to To check file myme types
          Developed By : Ashis kumar Patra
          Developed On : 04 Dec 2018
          --------------------------------------- */   
        
    function check_file_mime( $tmpname ,$allowMimeArray) {
    // MIME types: http://filext.com/faq/office_mime_types.php
        $errFlag=0;
            $finfo = finfo_open( FILEINFO_MIME_TYPE );
            $mtype = finfo_file( $finfo, $tmpname );
           
            finfo_close( $finfo );
            if(in_array($mtype,$allowMimeArray) ) {
                return $errFlag;
            }
                else {
                    $errFlag++;
                    return $errFlag;
                }
       }
       
       
       public function sendBulkSMS($mobile,$message){
                   $username    = SMS_UNAME;
                   $password    = SMS_PWD;
                   $sender      = SMS_SENDOR_ID;
                   $mobile      = trim($mobile,',');
                   $url         = "login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($mobile)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3');

             try {
                    $curl       = curl_init($url);
                     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                     $response   = curl_exec($curl);
                     $err        = curl_error($curl);
                     curl_close($curl);
                     if($response){

                         $resAry = json_decode($response,true);
                        
                         if($resAry['status']=='success')
                              return 1;
                         else
                            return 0;
                     }else
                         return 0;

             } catch (Exception $e) {

                 return 0;
             }
		 }
		 /* Send SMS By Rahul ON ::14-04-2021 */
		public function post_to_url($url, $data) {
        $fields = '';
        foreach($data as $key => $value) {
            $fields .= $key . '=' . urlencode($value) . '&';
        }
        rtrim($fields, '&');
        $post = curl_init();
        //curl_setopt($post, CURLOPT_SSLVERSION, 5); // uncomment for systems supporting TLSv1.1 only
        curl_setopt($post, CURLOPT_SSLVERSION, 6); // use for systems supporting TLSv1.2 or comment the line
        curl_setopt($post,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($post, CURLOPT_URL, $url);
        curl_setopt($post, CURLOPT_POST, count($data));
        curl_setopt($post, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($post, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($post); //result from mobile seva server
        print_r($result);exit; //output from server displayed
        curl_close($post);
        return $result;
    }

	public function sendSkillSMS($mobile,$message,$templateId){
                   $username    = SMS_SKILL_NAME;
                   $password    = SMS_SKILL_PWD;
                   $sender      = SMS_SKILL_SENDOR_ID;
                   $securekey   = SMS_SECURE_KEY;
                   $mobile      = trim($mobile,',');
                   $key=hash('sha512',SMS_SKILL_NAME.SMS_SKILL_SENDOR_ID.trim($message).SMS_SECURE_KEY);
                   
                   $data = array(
		            "username" => trim($username),
		            "password" => sha1($password),
		            "senderid" => $sender,
		            "content" => trim($message),
		            "smsservicetype" =>"singlemsg",
		            "mobileno" =>trim($mobile),
		            "key" => trim($key),
		            "templateid" => trim($templateId)
		        );
                   $fields = '';
			        foreach($data as $key => $value) {
			            $fields .= $key . '=' . urlencode($value) . '&';
			        }
			        rtrim($fields, '&');
			        $post = curl_init();
			        //curl_setopt($post, CURLOPT_SSLVERSION, 5); // uncomment for systems supporting TLSv1.1 only
			        curl_setopt($post, CURLOPT_SSLVERSION, 6); // use for systems supporting TLSv1.2 or comment the line
			        curl_setopt($post,CURLOPT_SSL_VERIFYPEER, false);
			        curl_setopt($post, CURLOPT_URL, "https://msdgweb.mgov.gov.in/esms/sendsmsrequestDLT");
			        curl_setopt($post, CURLOPT_POST, count($data));
			        curl_setopt($post, CURLOPT_POSTFIELDS, $fields);
			        curl_setopt($post, CURLOPT_RETURNTRANSFER, 1);
			        $result = curl_exec($post);
			        //print_r($result);exit;
			        curl_close($post);
        			return $result;
                   //return $this->post_to_url("https://msdgweb.mgov.gov.in/esms/sendsmsrequestDLT",$data);
		 }
		 

	/*
      Function to Call REST API for Institute Data Update
      By: Ashis kumar Patra
      On: 02-Feb-2018
    */
    
	public function callAPI($url,$methodName) {


		
		$curl      = curl_init();
		$username  ='sams_osda';
		$password  ='osda_sams#4321';
		
		try {

		curl_setopt_array($curl, array(
			CURLOPT_URL => $url.'/'.$methodName,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
			  "authorization: Basic ".base64_encode($username.":".$password),
			  "cache-control: no-cache",
			  "content-type: application/json"
			)
		  ));
		  $response   = curl_exec($curl);
		
	 	$http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		$curl_errno= curl_errno($curl);
		if ($curl_errno) {
			$err 	= curl_error($curl);
		}
				curl_close($curl);
				if ($http_status!='200') {
					//print_r($response); echo "hii";exit;
						return  array('message'=>$err,'status'=>$http_status,'count'=>0);
				} else if($http_status=='200') {
				
					return  json_decode($response,true);
				}
			} catch (Exception $e) {

				return  array('message'=>$e->getMessage(),'status'=>$http_status,'count'=>0);;
			}

	}

	function DownloadFile($file) { // $file = include path
        if(file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            exit;
        }

    }


    //------- Function for write error log By:: Rahul Kumar Saw On::29-04-2019
     public function writeException($e,$custmBlock) {
        $msg = $e->getMessage();
        $trace = $e->getTrace();
        $result .= 'Class: ' . $trace[0]['class'] . ', ';
        $result .= 'Function: ' . $trace[0]['function'] . ',';
        $result .= 'Line: ' . $trace[0]['line'] . ', ';
        $result .= 'File: ' . $trace[0]['file']. " \r\n";
        $result .= 'IP: ' . $_SERVER['REMOTE_ADDR']. " \r\n";
        $result .= 'Error Block: '.$custmBlock. " \r\n";
        //echo 'Caught exception: <pre>'.print_r($e->getMessage())."</pre>\n";
        // WRITE TEXTFILE START///
		$filename = 'errorLog' . date('d-m-Y') . '.txt';
	
        $myfile = fopen(SITE_PATH . 'errorLog/' . $filename, "a") or die("Unable to open file!");
        $txt = "Error Occured On :" . date('d-m-Y H:i:s') . " \r\n";
        fwrite($myfile, "\r\n" . $txt);
        $txt = "==============================================\r\n";
        fwrite($myfile, $txt);
        $txt = "Error Message: " . $msg . " \r\n";
        fwrite($myfile, "\r\n" . $txt);
        $txt = $result . "\r\n";
        fwrite($myfile, $txt);
        fclose($myfile);
        // WRITE TEXTFILE END///  
    }
function sendAuthMailSkillDevelop($jsData){
            include_once(PHP_MAILER_PATH."PHPMailerAutoload.php");
            
            $data           = json_decode($jsData);
            $mail           = new PHPMailer;

            $mail->SMTPDebug = 0;
			$mail->isSMTP();
			$mail->Host = SMTP_HOST;
			$mail->Port = 587;
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'tls';
			$mail->Username = SMTP_DEVELOP_USER;
			$mail->Password = SMTP_DEVELOP_PASS;


			$mail->From = $data->from;
			$mail->FromName = 'Skill Development Program';
			$countMail = count($data->to);
            $countccMail = count($data->cc);
            $countbccMail = count($data->bcc);
            if($countMail>0)
            {
                foreach($data->to as $mailTo)
                {                
                        $mail->addAddress($mailTo, $data->name);
                }
            }
            if($countccMail>0)
            {
                foreach($data->cc as $ccMail)
                {					
                        $mail->AddCC($ccMail);
                }
            }
            if($countbccMail)
            {
                foreach($data->bcc as $bccMail)
                {                
                        $mail->AddBCC($bccMail);
                }
            }
           
           if($data->FileName !=''){
            $mail->AddAttachment($data->FileName);
                //$url = APP_PATH."uploadDocuments/notification/".$data->FileName;
                 $url = $data->FileName;
                 $mail->AddAttachment($url, $name = '',  $encoding = 'base64', $type = '');
            }
            
            $mail->isHTML(true);

            $mail->Subject = $data->sub;
            $mail->Body = $data ->message;
//print_r($mail);exit;
            if(!$mail->send()) {
                $res['msg'] = "Mailer Error: " . $mail->ErrorInfo;
            } 
            else{
                $res['msg'] = "Success";
            }
            $jsRes = json_encode($res);
            return $jsRes;
        }


        # show district id for offline data By Rahul ON::28-07-2021
        public function showDistrictId($district)
        {   
            include_once( CLASS_PATH . 'clsVenue.php');
            $objVenue     = new clsVenue;
            if($district){          
                 $result            = $objVenue->manageVenue('FD',0,0,$district,'','','','',0,'','',0,0,0,0);
                 
                 if ($result->num_rows > 0)
                    {
                     $row                = $result->fetch_array();
                     $intDistrictid     = $row['intDistrictid'];
                    }
                                           
            }
                 return $intDistrictid;
        }

        # show skill id for offline data By Rahul ON::30-07-2021
        public function showSkillId($skillName)
        {   
            include_once( CLASS_PATH . 'clsVenue.php');
            $objVenue     = new clsVenue;
            if($skillName){          
                 $result            = $objVenue->manageVenue('FV',0,0,$skillName,'','','','',0,'','',0,0,0,0);
                 
                 if ($result->num_rows > 0)
                    {
                     $row                = $result->fetch_array();
                     $intSkillId     = $row['intSkillId'];
                    }
                                           
            }
                 return $intSkillId;
        }

        # show comp auto increment id for offline data By Rahul ON::13-05-2022
        public function showRegdId($regdNumber)
        {   
            include_once( CLASS_PATH . 'clsBulk.php');
            $objBulk     = new clsBulk;
            $arrSConditions=array('regdNumber'=>$regdNumber);
            if($regdNumber){          
                 $result            = $objBulk->manageBulkSkillCompetition('FV',$arrSConditions);
                 
                 if ($result->num_rows > 0)
                    {
                     $row                = $result->fetch_array();
                     $intComId     = $row['intCompetitionId'];
                    }
                                           
            }
                 return $intComId;
        }

        # show digital skill comp auto increment id for offline data By Rahul ON::20-06-2022
        public function showSkillRegdId($regdNumber)
        {   
            include_once( CLASS_PATH . 'clsBulk.php');
            $objBulk     = new clsBulk;
            $arrSConditions=array('regdNumber'=>$regdNumber);
            if($regdNumber){          
                 $result            = $objBulk->manageBulkSkillCompetition('GI',$arrSConditions);
                 
                 if ($result->num_rows > 0)
                    {
                     $row                = $result->fetch_array();
                     $intSkillId     = $row['intId'];
                    }
                                           
            }
                 return $intSkillId;
        }
         

	
}
?>
