<html> 
<head>
<meta http-equiv="origin-trial" data-feature="WebVR (For Chrome M59+)" data-expires="2017-07-28" content="ArFv1ZeTwzkhjNE00uAE+XtiQB41fwqG/TqlFMLrepd9sforQSvQE/tgfIbUMYNuNre4QR1k4/z8xp2mV3dbhwwAAABeeyJvcmlnaW4iOiJodHRwczovL2FmcmFtZS5pbzo0NDMiLCJmZWF0dXJlIjoiV2ViVlIxLjEiLCJleHBpcnkiOjE1MDEyMTcwMDIsImlzU3ViZG9tYWluIjp0cnVlfQ==">
<title>VR Plug_in</title>
<meta name="description" content="Text - A-Frame">
    <script src="https://aframe.io/releases/0.9.0/aframe.min.js"></script>
    <script type="text/javascript" src="gtag.js"></script>
    <script type="text/javascript">
    	function popup(){
    		document.getElementById('sound-1').setAttribute('src','./sound/welcome-home-insurance.mp3');
    	}
    	function stop(){
			var e=document.getElementById('video').getAttribute('src');
			if(e!='./images/other/paused.jpg'){
				document.getElementById('video').setAttribute('src','./images/other/paused.jpg'); 
               document.getElementById('video').components.sound.stopSound();
			}
            else if(e=='./images/other/paused.jpg'){
                document.getElementById('video').setAttribute('src','./videos/a.mp4');
                document.getElementById('video').components.sound.stopSound();
            }
			else{
				document.getElementById('video').setAttribute('src','./videos/a.mp4');
			     document.getElementById('video').components.sound.stopSound();
            }  		
    	}
        // CARD SOUNDS
        function card_1(){
            var e=document.getElementById('sound-1').getAttribute('src');
            if(e==''){
                document.getElementById('sound-1').setAttribute('src','./sound/home-insurance/whatscovered.mp3');    
            }
            else{
                var entity = document.querySelector('[sound]');
                entity.components.sound.stopSound();
                document.getElementById('sound-1').setAttribute('src','');
            }
            }
        //CARD 2
          function card_2(){
            var e=document.getElementById('sound-1').getAttribute('src');
            if(e==''){
                document.getElementById('sound-1').setAttribute('src','./sound/home-insurance/howtobuy.mp3');    
            }
            else{
                var entity = document.querySelector('[sound]');
                entity.components.sound.stopSound();
                document.getElementById('sound-1').setAttribute('src','');
            }
        }
        //CARD 2
          function card_3(){
            var e=document.getElementById('sound-1').getAttribute('src');
            if(e==''){
                document.getElementById('sound-1').setAttribute('src','./sound/home-insurance/whatsnotcovered.mp3');    
            }
            else{
                var entity = document.querySelector('[sound]');
                entity.components.sound.stopSound();
                document.getElementById('sound-1').setAttribute('src','');
            }
        }
        function redirect(){
            window.location.href="http://localhost/sih/voice-bot/";
        }
    </script>
</head>
<body>
<a-scene background="color: #222">
<!-- SOUND -->
<a-sound src="" id="sound-1" color="red" autoplay="true" position="0 0 0"></a-sound>
<!--background image  -->
<a-sky src="#bg-two" id="main-bg"></a-sky>
<a-assets>
<img src="images/a.jpg" id="bg-two">
</a-assets>
<a-entity position="-1 1.5 0" geometry="primitive: plane; width: auto; height: auto" material="color: #c0392b" text="color: yellow; align: center; value:WHATS COVERED?
; width: 2; " onclick="card_1()">
</a-entity>

<a-entity position="-1 1.3 0" geometry="primitive: plane; width: auto; height: auto" material="color: #34495e" text="color: yellow; align: center; value:HOW TO BUY?
; width: 2; " onclick="card_2()">
</a-entity>

<a-entity position="-1 1.1 0" geometry="primitive: plane; width: auto; height: auto" material="color: #34495e" text="color: yellow; align: center; value:WHATS NOT COVERED?
; width: 2; " onclick="card_3()">
</a-entity>
<a-entity position="-1 2.4 0" geometry="primitive: plane; width: auto; height: auto;" material="color: #2c3e50" text="color: white; align: center; value:
====================
LIFE INSURANCE
====================
\n
Life insurance is an irreplaceable part of a sound financial plan. It helps in securing your family’s financial future in case of an unfortunate event like your untimely death. It also provides you with a financial backup in case of an accident or any other event which may cause temporary or permanent disability and therefore loss of income.; width: 2 ">
\n


</a-entity>
<a-entity position="2 2 0">
<a-entity position="0 -0.5 0" geometry="primitive: plane; width: auto; height: auto" material="color: #333" text="color: yellow; align: center; value:START/STOP PLAYING THIS VIDEO; width: 2; " onclick="stop()">
</a-entity>
<a-entity position="0 -0.7 0" geometry="primitive: plane; width: auto; height: auto" material="color: #333" text="color: yellow; align: center; value:TALK TO YOUR VIRTUAL AGENT; width: 2; " onclick="redirect()">
</a-entity>
    <a-video src="./videos/a.mp4" id="video" position="0 0.4 0" width="3" height="1.5" ></a-video>
</a-entity>
<a-entity position="0 1.8 2">
<a-entity camera look-controls wasd-controls>
	<a-cursor position="0 0 -1" color="red" ></a-cursor>
</a-entity>
</a-entity>
</a-scene>
</body>
</html>
