$(document).ready(function() {

	$("#hideLogin").click(function() {
		$("#loginForm").hide();
		$("#registerForm").show();
	});

	$("#hideRegister").click(function() {
		$("#loginForm").show();
		$("#registerForm").hide();
	});
});

// $(document).ready(function(){
// 	var audioElement = new Audio();
// 	audioElement.setTrack("assets/music/bensound-acousticbreeze.mp3");
// 	audioElement.audio.play().catch((e)=>console.log(e));
// });