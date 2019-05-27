<?php 

$currentDateString = date("Y") . "-" . date("m") . "-" . date("d");
$dateLoop = date_create($currentDateString);
$loopCount = 0;
$functionReturnArray = array();

while ($loopCount < 30) {
	$loopCount++;
	$temp = array();

		if ($count == 0) {
			$temp["count"]= 0;
			$temp["week"]=date_format($dateLoop,"W");
			$temp["week2"]=date_format($dateLoop,"w");
			$temp["weekday"]= date_format($dateLoop,"D");;
			$temp["date"]= date_format($dateLoop,"Y-m-d");
			array_push($functionReturnArray,$temp);
		}
	date_sub($dateLoop,date_interval_create_from_date_string("1 days"));
}
echo "<pre>";
print_r($functionReturnArray);
echo "</pre>";
?>