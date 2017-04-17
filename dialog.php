<h2 style="font-size:20px;">System Information</h2>
<br>
<table width="500px">
	<tr><td>Hostname:</td><td><?php echo exec("hostname"); ?></td></tr>
	<tr><td>Uptime:</td><td><?php echo substr(exec("uptime"), 0, 9); ?></td></tr>
	<tr><td>CPU Usage:</td><td><?php echo exec('top -bn2 | grep "Cpu(s)" | sed "s/.*, *\([0-9.]*\)%* id.*/\1/" | awk \'{print 100 - $1"%"}\''); ?></td></tr>
	<tr><td>Memory Usage:</td><td><?php echo round(shell_exec("free | grep Mem | awk '{print $3/$2 * 100.0}'"), 2)."%"; ?></td></tr>
	<tr><td>File Storage:</td><td><?php echo round(disk_free_space("/storage") / 1024 / 1024 / 1024, 2) . " GB / " . round(disk_total_space("/storage") / 1024 / 1024/ 1024, 2) . " GB"; ?></td></tr>
	<tr><td>System Storage:</td><td><?php echo round(disk_free_space("/") / 1024 / 1024 / 1024, 2) . " GB / " . round(disk_total_space("/") / 1024 / 1024/ 1024, 2) . " GB"; ?></td></tr>
</table>
