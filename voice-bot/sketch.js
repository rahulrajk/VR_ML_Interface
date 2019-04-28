// Daniel Shiffman
// http://codingtra.in
// http://patreon.com/codingtrain

// Voice Chatbot with p5.Speech
// Edited Video: https://youtu.be/iFTgphKCP9U

function setup() {
  noCanvas();
  let speech = new p5.Speech();
  let speechRec = new p5.SpeechRec('en-US', gotSpeech);
  let continuous = true;
  let interim = false;
  speechRec.start(continuous, interim);

  let bot = new RiveScript();
  bot.loadFile("brain.rive", brainReady, brainError);

  function brainReady() {
    console.log('Chatbot ready!');
    bot.sortReplies();
  }

  function brainError() {
    console.log('Chatbot error!')
  }


   let button = select('#submit');
   let user_input = select('#user_input');
   let output = select('#output');

  //button.mousePressed(chat);

  function gotSpeech() {
    if (speechRec.resultValue) {
      let input = speechRec.resultString;
      user_input.value(input);
      bot.reply("local-user", input)
	  .then(function (value){
		  console.log('says',value);
		  //speech.speak(value);
		  //speech.speak(value);
		  //output.html(value);
		  if(value=='image1'){
			  output.html('<img src="https://life.futuregenerali.in/media/408486/hhi-howitworks1.jpg" style="width:80%">');
			  speech.speak("Here's what I Found");
		  }
		  else if(value=='video1'){
			  output.html('<iframe width="420" height="315" src="https://youtu.be/b8SlDSzaui0"></iframe>');
			  speech.speak("Here's what I Found");
		  }
		  else if(value=='redirect1'){
			  window.location.href="https://www.youtube.com/watch?v=b8SlDSzaui0";
			  speech.speak("Here's what I Found");
		  }
		  else{
			speech.speak(value);
		  }
		  
	  })
	  .catch(function (err){
		  console.log("error",err);
	  })
	  
    }
  }
	
  function chat() {
    let input = user_input.value();
  }

}