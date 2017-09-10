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
			
			function returnColor(d){
				if (d < 50){
					return "green";
				}else if(d < 75){
					return "orange";
				}else if(d >= 75){
					return "red";
				}else{
					return "white";
				}
			}
				
			function refreshData(){
				$.ajax({
					method: "GET",
					url: "https://tools.joshplant.co.uk/admin/Codiad/plugins/Codiad-System-Information/controller.php",
					dataType: "xml",
					success: function(xml){
						$("#CSIHost").text("").append($(xml).find("hostname").text());
						$("#CSIUptime").text("").append($(xml).find("uptime").text());
						$("#CSIOS").text("").append($(xml).find("os").text());
						$("#CSIIP").text("").append($(xml).find("ip").text());
						
						$("#CSICPU").text("").append($(xml).find("cpu").text()+"%");
						$("#CSICPUChart").text("").append('<span style="background-color:'+returnColor($(xml).find("cpu").text())+';border-radius:3px;width:'+$(xml).find("cpu").text()+'%;display:block;">&nbsp;</span>');
						
						$("#CSIMEM").text("").append($(xml).find("mem").text()+"%");
						$("#CSIMEMChart").text("").append('<span style="background-color:'+returnColor($(xml).find("mem").text())+';border-radius:3px;width:'+$(xml).find("mem").text()+'%;display:block;">&nbsp;</span>');
						
						$("#CSIDisk1").text("").append($(xml).find("disk1").text()+"%");
						$("#CSIDiskChart1").text("").append('<span style="background-color:'+returnColor($(xml).find("disk1").text())+';border-radius:3px;width:'+$(xml).find("disk1").text()+'%;display:block;">&nbsp;</span>');
						
						$("#CSIDisk2").text("").append($(xml).find("disk2").text()+"%");
						$("#CSIDiskChart2").text("").append('<span style="background-color:'+returnColor($(xml).find("disk2").text())+';border-radius:3px;width:'+$(xml).find("disk2").text()+'%;display:block;">&nbsp;</span>');
						
					}
				});
			}

			$(document).ready( function() {
				
				setInterval( function(){
					refreshData();
				}, 5000);
				
			});
			
			$("#CSI").ready( function() {
				refreshData();
			});
		},
		
		Server_Dialog: function() {
			codiad.modal.load(400, curpath+"dialog.php");
			refreshData();
		}

    };

})(this, jQuery);
