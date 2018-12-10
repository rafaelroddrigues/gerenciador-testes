<?php

$workspace = $_GET['workspace'];
$project = $_GET['project'];
$testcase = $_GET['testcase'];

$dirpath = $_SERVER["DOCUMENT_ROOT"]."/webroot/testcafe/".$workspace."/".$project;
$dirpathlog = $_SERVER["DOCUMENT_ROOT"]."/webroot/testcafe/".$_GET['workspace']."/".$_GET['project'];

$cwd = $dirpathlog;

$cmd = "sudo docker run -v '/var/www/html/oeqm/webroot/testcafe/".$_GET['workspace']."/".$_GET['project']."':/tests testcafe/testcafe 'chromium --no-sandbox' '/tests/".$_GET['testcase'].".js' -e --selector-timeout 20000";
$descriptorspec = array(0 => array("pipe", "r"),1 => array("pipe", "w"),2 => array("pipe", "w") );

$process = proc_open($cmd, $descriptorspec, $pipes, $cwd);

$comp = preg_split('/\s+/', stream_get_contents($pipes[1]));
$val = "Error";
foreach ($comp as $value) { 
		if ($value == "passed"){
			$val = "Passed";
		}
		if ($value == "failed")
		{
			$val = "Failed";
		}
}
echo $val;
fclose($pipes[0]);
fclose($pipes[1]);

?>
