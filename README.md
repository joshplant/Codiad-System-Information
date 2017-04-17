# Codiad-System-Information
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
Open up your server in an SSH, cd to Codiad's plugin directory and clone this repository. Reload Codiad and the plugin should now be ready to use.
```
cd /var/www/Codiad/plugins
git clone https://github.com/jpl42/Codiad-System-Information.git
```

## Configuration
The plugin currently measures two sources for disk space - See lines 8 and 9 of `dialog.php`. To add more, simply copy the duplicate one of the lines, and set the path twice in the PHP in said line. To edit one of them, simply replace `/` or `/storage` twice in either line.
