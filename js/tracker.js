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

var masks = [{  "creature":[{
				"src":"creature2.png","xpos":".19","ypos":".25","imgwidth":"1.45","imgheight":"1.5"
				}],
				"arthur":[{
				"src":"arthur.png","xpos":"-.05","ypos":".3","imgwidth":"1","imgheight":"1"
				}],
				"dw":[{
				"src":"dw.png","xpos":".4","ypos":".75","imgwidth":"1.8","imgheight":"1.8"
				}]
			}];

	// console.log(masks[0].arthur[0].src);

	var selected = [];
	

 
    // var hat = document.createElement("img");
    // hat.src = 'hats/creature2.png';

    // var xpos = .19;
    // var ypos = .25;
    // var imgwidth = 1.45;
    // var imgheight = 1.5;

    // var bowler = document.createElement("img");
    // bowler.src = 'hats/bowler.png';

    updateSelected();

    window.onload = function() {

      var video = document.getElementById('video');
      var canvas = document.getElementById('canvas');
      var context = canvas.getContext('2d');
      // var tracker = new tracking.ObjectTracker(['eye','mouth']);
      // tracker.setInitialScale(1);
      // tracker.setStepSize(2.7);
      // tracker.setEdgesDensity(.2);
      var tracker = new tracking.ObjectTracker('face');
      tracker.setInitialScale(4);
      tracker.setStepSize(2);
      tracker.setEdgesDensity(0.1);

      var addMasks = tracking.track('#video', tracker, { camera: true });

	      tracker.on('track', function(event) {
	        context.clearRect(0, 0, canvas.width, canvas.height);
	        
	        var num = 0;

	        event.data.forEach(function(rect) {
	        if ($(".selected").length > 0){

	        	// check if num of faces is greater than total chosen
	        	if (num > selected.length){
	        		num = 0;
	        	}

		        // increment and load variables

		        var activemask = selected[num];

		        var mask = document.createElement("img");
			    mask.src = 'hats/'+activemask+'.png';

			    var draw = masks[0];
			    draw = draw[activemask];

		        var xpos = draw[0].xpos;
			    var ypos = draw[0].ypos;
			    var imgwidth = draw[0].imgwidth;
			    var imgheight = draw[0].imgheight;

			    num++

	          // context.drawImage(hat, rect.x - rect.width * xpos, rect.y - rect.height * ypos, rect.width * imgwidth, rect.height * imgheight);
	          context.drawImage(mask, rect.x - rect.width * xpos, rect.y - rect.height * ypos, rect.width * imgwidth, rect.height * imgheight);
		 	}else{
		 		return;
		 		setTimeout(function () {
		            addMasks.stop(); 
		        }, 100);
		 		console.log("no masks");
		 	}



	        });
	      });

    };

    function updateSelected(){

    	selected = [];

    	$("#images .selected").each(function(){
    		var title = $(this).data("name");
		  	selected.push(title);
		});

    }




    $( ".change" ).click(function() {
	 	$(this).toggleClass("selected");
	 	updateSelected();
	});






});