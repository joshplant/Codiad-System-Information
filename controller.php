<?php

function measureDisk($disk){ return round(100 - ((disk_free_space($disk) / 1024 / 1024 / 1024) / (disk_total_space($disk) / 1024 / 1024 / 1024) * 100), 2); }

header('Content-Type: application/xml');
echo '<?xml version="1.0"?>'.PHP_EOL;

echo "<document>";

echo "<hostname>".exec("hostname")."</hostname>".PHP_EOL;
echo "<uptime>".substr(exec("uptime -p"), 3)."</uptime>".PHP_EOL;
echo "<os>".exec("uname -s")." ".exec("uname -r")."</os>".PHP_EOL;
echo "<ip>".exec("ip route get 8.8.8.8 | head -1 | cut -d' ' -f8")."</ip>".PHP_EOL;

echo "<cpu>".exec('top -bn1 | grep "Cpu(s)" | sed "s/.*, *\([0-9.]*\)%* id.*/\1/" | awk \'{print 100 - $1}\'')."</cpu>".PHP_EOL;
echo "<mem>".round(shell_exec("free | grep Mem | awk '{print $3/$2 * 100.0}'"), 2)."</mem>".PHP_EOL;
echo "<disk1>".measureDisk("/")."</disk1>".PHP_EOL;
echo "<disk2>".measureDisk("/storage")."</disk2>".PHP_EOL;

echo "</document>".PHP_EOL;

?>