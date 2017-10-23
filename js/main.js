$( document ).ready(function() { 

	// video = document.getElementById('video');
	// video.addEventListener("play", resize, false);


     function fitToContainer(resize){
	    var canvas = document.getElementById(resize);
	    canvas.width = $("#parent").width();
	    canvas.height = $("#parent").height();
	  }

	function resize(){
	  fitToContainer("bg");
	  fitToContainer("screen");
	  fitToContainer("canvas");

	  filterEffect();
	}



});