 $( document ).ready(function() { 	

  	video = document.getElementById('video');
	video.addEventListener("play", filterEffect, false);

	var vidRender=document.getElementById("screen");
	var vidRctx=vidRender.getContext("2d");

	function filterEffect() {
	     renderCanvas(video);
	}

	function renderCanvas(vid) {
	     if ( vid.paused || vid.embed ) return false;
	     vidRctx.drawImage(vid,0,0,1024,768);
	     var vidData = vidRctx.getImageData(0,0,vidRender.width, vidRender.height);

	     for ( var i=0; i<vidData.data.length; i+=4 ) {
	         // if green is super high, filter it out.
	         if ( vidData.data[i+1] > 230 ) {
	              vidData.data[i+3] = 0;
	         }
	     }
	     
	     vidRctx.putImageData(vidData,0,0);
	     
	     setTimeout(function(){
	          renderCanvas(vid);
	     }, 10);
	}

	var masks = [{  
		"creature":[{
				"xpos":".19","ypos":".25","imgwidth":"1.45","imgheight":"1.5"
		}],
		"ruff":[{
				"xpos":".19","ypos":".25","imgwidth":"1.45","imgheight":"1.5"
		}],
		"arthur":[{
				"xpos":"-.05","ypos":".3","imgwidth":"1","imgheight":"1"
		}],
		"dw":[{
				"xpos":".4","ypos":".75","imgwidth":"1.8","imgheight":"1.8"
		}],
		"george":[{
				"xpos":".19","ypos":".25","imgwidth":"1.45","imgheight":"1.5"
		}],
		"MIYH":[{
			"xpos":".1","ypos":"1","imgwidth":"1.5","imgheight":"1.3"
		}],
		"dracula":[{
				"xpos":".19","ypos":".25","imgwidth":"1.45","imgheight":"1.5"
		}],
		"wolfman":[{
				"xpos":".19","ypos":".25","imgwidth":"1.45","imgheight":"1.5"
		}],
		"mans_hat":[{
				"xpos":".19","ypos":".25","imgwidth":"1.45","imgheight":"1.5"
		}],
		"womans_hat":[{
				"xpos":".19","ypos":".25","imgwidth":"1.45","imgheight":"1.5"
		}],
		"mummy":[{
				"xpos":".19","ypos":".25","imgwidth":"1.45","imgheight":"1.5"
		}],
		"witch":[{
				"xpos":".19","ypos":".25","imgwidth":"1.45","imgheight":"1.5"
		}],
		"frankenstein":[{
				"xpos":".19","ypos":".25","imgwidth":"1.45","imgheight":"1.5"
		}]
	}];


	var selected = [];

    updateSelected();

    var num = 0;

    window.onload = function() {

      var video = document.getElementById('video');
      var canvas = document.getElementById('canvas');
      var context = canvas.getContext('2d');
      var tracker = new tracking.ObjectTracker('face');
      tracker.setInitialScale(4);
      tracker.setStepSize(2);
      tracker.setEdgesDensity(0.1);

      var addMasks = tracking.track('#video', tracker, { camera: true });

	      tracker.on('track', function(event) {
	        context.clearRect(0, 0, canvas.width, canvas.height);

	        event.data.forEach(function(rect) {

		     // increment and load variables

		      var activemask = selected[num];


	          if (activemask === undefined){
	          		var mask = document.createElement("img");
				    mask.src = 'hats/transparent.png';

				    var xpos = 0;
				    var ypos = 0;
				    var imgwidth = 0;
				    var imgheight = 0;
			    }else{
				  	var mask = document.createElement("img");
				    mask.src = 'hats/'+activemask+'.png';

				    var draw = masks[0];
				    draw = draw[activemask];

				    var xpos = draw[0].xpos;
				    var ypos = draw[0].ypos;
				    var imgwidth = draw[0].imgwidth;
				    var imgheight = draw[0].imgheight;
				}

				context.drawImage(mask, rect.x - rect.width * xpos, rect.y - rect.height * ypos, rect.width * imgwidth, rect.height * imgheight);

	        	num++

	        	updateSelected();
	        });
        });
    };

    function updateSelected(){

    	selected = [];

    	$("#images .selected").each(function(){
    		var title = $(this).data("name");
		  	selected.push(title);
		});

    	if (num+1 > selected.length){
    		num = 0;
    	}

    }


    $( ".change" ).click(function() {
	 	$(this).toggleClass("selected");
	 	$(this).parent().toggleClass("dark");
	});






});