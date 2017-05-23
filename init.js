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
