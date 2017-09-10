# Codiad-System-Information
![Plugin Screenshot](https://github.com/jpl42/Codiad-System-Information/raw/master/screen.png "Plugin Screenshot")
Server System Information Plugin for Codiad. 

## Overview
Currently shows the following information:
 - Disk space
 - CPU Usage Percentage
 - Memory Usage Percentage
 - Uptime
 - System Hostname
 - More to come...

## Installing
Open up your server in an SSH session, cd to Codiad's plugin directory and clone this repository. Reload Codiad in your browser and the plugin will be ready to use. Look for "Server Stats" in the plugin section of the right side bar.
```
cd /var/www/Codiad/plugins
git clone https://github.com/jpl42/Codiad-System-Information.git
```

## Notes
Only tested on Ubuntu 14.04 and 16.04 server with PHP7.0 on NGINX. Definitely not compatible with Windows.
