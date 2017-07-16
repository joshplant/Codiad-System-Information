<?php
function measureDisk($disk){
	return round(100 - ((disk_free_space($disk) / 1024 / 1024 / 1024) / (disk_total_space($disk) / 1024 / 1024 / 1024) * 100), 2); 
}

if(isset($_POST['systemInformation']) AND !empty($_POST['systemInformation'])){

	$systemInformation = $_POST['systemInformation'];

	switch($systemInformation){
		case "cpu":
			$cpuUsage = exec('top -bn1 | grep "Cpu(s)" | sed "s/.*, *\([0-9.]*\)%* id.*/\1/" | awk \'{print 100 - $1}\'');
			echo $cpuUsage;
		break;

		case "memory":
			$memoryUsage = round(shell_exec("free | grep Mem | awk '{print $3/$2 * 100.0}'"), 2);
			echo $memoryUsage;
		break;

		case "disk":
			$diskUsage = measureDisk("/");
			echo $diskUsage;
		break;
	}
}



?>