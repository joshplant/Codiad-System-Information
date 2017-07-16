/*
 *  (C) 2017 Josh Plant (JPL42)
 */


(function(global, $){
    
    // Define core
    var codiad = global.codiad,
        scripts = document.getElementsByTagName('script'),
        path = scripts[scripts.length-1].src.split('?')[0],
        curpath = path.split('/').slice(0, -1).join('/')+'/';

    // Instantiates plugin
    $(function() {    
        codiad.System_Information.init();
    });

    codiad.System_Information = {
        
        path: curpath,

		init: function() {

		},
		
		Server_Dialog: function() {
			codiad.modal.load(400, curpath+"dialog.php");
		}

    };

})(this, jQuery);

var killed = true;

function colorizeData(data){
    if(data <50){
        return "<b style='color:green;'>"+data+"%</b>";
    }
    else if(data < 75){ 
        return "<b style='color:orange;'>"+data+"%</b>";
    } 
    else if(data >= 75){ 
        return "<b style='color:red;'>"+data+"%</b>";
    } 
};

function poll() {
    if(!killed){
        $.post( "plugins/Codiad-System-Information/poller.php", { systemInformation: "cpu"},function( data ) {
            $("#cpuUsage").html(colorizeData(data));
            $("#cpuBar").width(data+"%");
        });

        $.post( "plugins/Codiad-System-Information/poller.php", { systemInformation: "memory"},function( data ) {
            $("#memoryUsage").html(colorizeData(data));
            $("#memoryBar").width(data+"%");
        });

        $.post( "plugins/Codiad-System-Information/poller.php", { systemInformation: "disk"},function( data ) {
            $("#diskUsage").html(colorizeData(data));
            $("#diskBar").width(data+"%");
        });
    }
};

setInterval("poll();",1000);