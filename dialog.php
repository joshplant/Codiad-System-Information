<?php 
function measureDisk($disk){
	return round(100 - ((disk_free_space($disk) / 1024 / 1024 / 1024) / (disk_total_space($disk) / 1024 / 1024 / 1024) * 100), 2); 
}

function colorizeData($data){ 
	if ($data < 50){
		return "<b style='color:green;'>".$data."%</b>";
	}
	elseif($data < 75){
		return "<b style='color:orange;'>".$data."%</b>";
	}
	elseif($data >= 75){
		return "<b style='color:red;'>".$data."%</b>";
	}
}

$hostname = exec("hostname");
$cpuUsage = exec('top -bn1 | grep "Cpu(s)" | sed "s/.*, *\([0-9.]*\)%* id.*/\1/" | awk \'{print 100 - $1}\'');
$memoryUsage = round(shell_exec("free | grep Mem | awk '{print $3/$2 * 100.0}'"), 2);
$diskUsage = measureDisk("/");
$uptime = substr(exec("uptime -p"), 3);
?>

<h2 style="font-size:20px;">System Information</h2>
<br>

<p>Hostname: <strong><?php echo $hostname; ?></strong></p>
<br>

<table width="600px">
	<tr>
		<td>CPU Usage:</td>
		<td><?php echo colorizeData($cpuUsage); ?></td>
		<td>
			<span style="border:1px solid gray;border-radius:3px;width:150px;display:block;">
				<span style="background-color:white;border-radius:3px;width:<?php echo $cpuUsage; ?>%;display:block;">&nbsp;</span>
			</span>
		</td>
	</tr>

	<tr>
		<td>Memory Usage:</td>
		<td><?php echo colorizeData($memoryUsage); ?></td>
		<td>
			<span style="border:1px solid gray;border-radius:3px;width:150px;display:block;">
				<span style="background-color:white;border-radius:3px;width:<?php echo $memoryUsage; ?>%;display:block;">&nbsp;</span>
			</span>
		</td>
	</tr>

	<tr>
		<td>Used Disk Space:</td>
		<td><?php echo colorizeData($diskUsage); ?></td>
		<td>
			<span style="border:1px solid gray;border-radius:3px;width:150px;display:block;">
				<span style="background-color:white;border-radius:3px;width:<?php echo $diskUsage; ?>%;display:block;">&nbsp;</span>
			</span>
		</td>
	</tr>
</table>
<br>

<p>System has been up for <?php echo $uptime; ?>.</p>
