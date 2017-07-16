
<?php
$hostname = exec("hostname");
$uptime = substr(exec("uptime -p"), 3);
?>

<script>
var killed = false;

$(document).ready(function() {
	$("#close-handle").attr("onclick","codiad.modal.unload(); killed = true; return false;");
	killed = false;

	poll();
});


</script>

<h2 style="font-size:20px;">System Information</h2>
<br>

<p>Hostname: <strong><?php echo $hostname; ?></strong></p>
<br>



<table width="600px">
	<tr>
		<td>CPU Usage:</td>
		<td id="cpuUsage"></td>
		<td>
			<span style="border:1px solid gray;border-radius:3px;width:150px;display:block;">
				<span style="background-color:white;border-radius:3px;display:block;" id="cpuBar">&nbsp;</span>
			</span>
		</td>
	</tr>

	<tr>
		<td>Memory Usage:</td>
		<td id="memoryUsage"></td>
		<td>
			<span style="border:1px solid gray;border-radius:3px;width:150px;display:block;">
				<span style="background-color:white;border-radius:3px;display:block;" id="memoryBar">&nbsp;</span>
			</span>
		</td>
	</tr>

	<tr
>		<td>Used Disk Space:</td>
		<td id="diskUsage"></td>
		<td>
			<span style="border:1px solid gray;border-radius:3px;width:150px;display:block;">
				<span style="background-color:white;border-radius:3px;display:block;" id="diskBar">&nbsp;</span>
			</span>
		</td>
	</tr>
</table>
<br>

<p>System has been up for <?php echo $uptime; ?>.</p>
