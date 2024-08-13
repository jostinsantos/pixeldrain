<!DOCTYPE html>
<html>
   <head>
	<title>LMost Embed</title>
    <link rel="shortcut icon" href="https://xonaplus.org/wp-content/uploads/2022/03/cropped-Captura1.png" type="image/ico">
	      <meta charset="utf-8">
	<meta name="robots" content="noindex">

	<script type="text/javascript" src="assets/js/js.js"></script>
<script src="https://mixplay.cc/assets/js/prebid-ads.js"></script><script src="https://mixplay.cc/assets/js/detect-adblocker.min.js"></script> 
    <script src="https://content.jwplatform.com/libraries/KB5zFt7A.js"></script>
    <script src="https://mixplay.cc/assets/vendor/crypto-js/crypto-js.js"></script><script src="https://mixplay.cc/assets/vendor/crypto-js/aes.js"></script><script src="https://mixplay.cc/assets/js/app.js"></script>
	<script src="assets/promise-polyfill.js"></script>
    <script src="assets/devtools-detector.js"></script>
	<script src="assets/ua-parser.min.js"></script>
<script disable-devtool-auto="" src="./Embeds_files/disable-devtool.min.js.descarga" ></script>
	<script type="text/javascript">jwplayer.key="64HPbvSQorQcd52B8XFuhMtEoitbvY/EXJmMBfKcXZQU2Rnn";</script>
	<style type="text/css" media="screen">html,body{padding:0;margin:0;height:100%}#apicodes-player{width:100%!important;height:100%!important;overflow:hidden;background-color:#000}</style>
      <link href="assets2/css/player.css" rel="stylesheet"/>
      <link href="assets2/libs/jw_skin/tube.min.css" rel="stylesheet"/>

<script type="text/javascript">
	
var parser = new UAParser();	
var ua = parser.getResult().ua;
!function() {
    ua == '' || (devtoolsDetector.addListener(function(t, e) {
        t && (document.location.href = "https://www.google.com")
    }), devtoolsDetector.lanuch())
}();
</script>
<script type="text/x-javascript">
//codigo javascript
 
var isCtrl = false;
document.onkeyup=function(e){
if(e.which == 17) isCtrl=false;
}
document.onkeydown=function(e){
if(e.which == 17) isCtrl=true;
if(e.which == 80 && isCtrl == true) {
//Combinancion de teclas CTRL+P y bloquear su ejecucion en el navegador
return false;
}
}
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
document.onkeydown = function(e) {
        if (e.ctrlKey && 
            (e.keyCode === 67 || 
             e.keyCode === 86 || 
             e.keyCode === 85 || 
             e.keyCode === 117)) {
            return false;
        } else {
            return true;
        }
};
$(document).keypress("u",function(e) {
  if(e.ctrlKey)
  {
return false;
}
else
{
return true;
}
});
</script>
</head>
<body>

<?php 
		error_reporting(0);
		
		$data = (isset($_GET['data'])) ? $_GET['data'] : '';

		if ($data != '') {
			
			include_once 'config.php';

			$data = json_decode(decode($data));

			$link = (isset($data->link)) ? $data->link : '';

			$sub = (isset($data->sub)) ? $data->sub : '';

			$poster = (isset($data->poster)) ? $data->poster : '';

			$label = (isset($data->label)) ? $data->label : '';
			$sub = (isset($data->sub)) ? $data->sub : '';

			$titulo = (isset($data->titulo)) ? $data->titulo : '';

			$tracks = '';
			
			foreach ($sub as $key => $value) {
			    $tracks .= '{ 
						        file: "'.$value.'", 
						        label: "'.$key.'",
						        kind: "captions"
							   },';
			}

      
			$sources = '[{"label":"HD","type":"mp4","file":"https://pixeldrain.com/api/file/'.$link.'"}]';
			
			$result = '<div id="apicodes-player"></div>';

			$data = 'var player = jwplayer("apicodes-player");
						player.setup({
							title: "'.$titulo.'",
							sources: '.$sources.',
							aspectratio: "16:9",
							startparam: "start",
							primary: "html5",
							autostart: false,
							preload: "auto",
							image: "'.$poster.'",

                     playbackRateControls: true,
                    playbackRates: [0.25, 0.5, 0.75, 1, 1.25, 1.5, 2],
 advertising: {
                                client: "vast",
                                tag: "https://www.videosprofitnetwork.com/watch.xml?key=cbe92e7f7102bbc871708ebd8e3b0d50"
                            },

                                                 skin: {
                        controlbar: {
                           "icons": "rgba(255,255,255,1.0)",
                           "iconsActive": "#ff0000"
                        },
                        timeslider: {
                           "progress": "#ff0000",
                        }
                     },
                        "logo": {
                       "file": "https://lmost.xyz/wp-content/uploads/2022/03/cropped-logo-500x500-1.png",
                       "link": "https://lmost.xyz/",
                       "hide": "false",
                       "position": "top-right"
                    },

						 
						});
						player.addButton("https://es.seaicons.com/wp-content/uploads/2015/06/paypal-icon.png", "Enviar Donacion", function() {
    var win = window.open("https://www.paypal.com/paypalme/mostplayer", "_blank");
    win.focus()
}, "donate");
			            player.on("setupError", function() {
			              swal("Server Error!", "Please contact us to fix it asap. Thank you!", "error");
			            });
						player.on("error" , function(){
							swal("Server Error!", "Please contact us to fix it asap. Thank you!", "error");
						});';
			
			$packer = new Packer($data, 'Normal', true, false, true);

			$packed = $packer->pack();

			$result .= '<script type="text/javascript">' . $packed . '</script>';

			echo $result;

		} else echo 'Empty link!';
?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</body>

</html>