 $( document ).ready(function() { 

var hires;
var canvas1 = document.getElementById("bg");

var vidRender=document.getElementById("screen");
var vidRctx=vidRender.getContext("2d");

function renderCanvas(vid) {

  

  var vidData = vidRctx.getImageData(0,0,vidRender.width, vidRender.height);
  
       if ( vid.paused || vid.embed ) return false;
       vidRctx.drawImage(vid,0,0,1024,768);
       var vidData = vidRctx.getImageData(0,0,vidRender.width, vidRender.height);
       
       vidRctx.putImageData(vidData,0,0);
  }

function generateImage(num){
  var canvas2 = document.getElementById("screen");
  var canvas3 = document.getElementById("canvas");

  video = document.getElementById('video');
  renderCanvas(video);

  var combined = document.getElementById("combined");
  var ctx = combined.getContext("2d");

  // ctx.drawImage(canvas1, 0, 0); 
  ctx.drawImage(canvas2, 0, 0); 
  ctx.drawImage(canvas3, 0, 0);

  hires = combined.toDataURL('image/jpeg', .5);

}

function countdown() {

seconds = document.getElementById('countdown').innerHTML;
seconds = parseInt(seconds, 10);

if (seconds == 1) {
  temp = document.getElementById('countdown');
  temp.innerHTML = "0";

  $("#timer").addClass("hide");

  temp.innerHTML = "5";

  return;
}

seconds--;
temp = document.getElementById('countdown');
temp.innerHTML = seconds;
timeoutMyOswego = setTimeout(countdown, 1000);
} 

// generate preview on "save"
$("#shoot").click(function() { 
  $("#timer").removeClass("hide");
  setTimeout(function(){
    countdown();
  }, 500);

  setTimeout(function(){

      generateImage(1.5);
      setTimeout(function(){ 
        $("#img-out").html('<img id="save-img" src="'+hires+'">');
        $("#fileToUpload").val(hires); 
      }, 3000);  

      $("#preview").toggleClass("show");

  }, 6500);

});

$("#new").click(function() { 
  $("#preview").toggleClass("show");

  vidRctx.clearRect(0, 0, canvas.width, canvas.height);

});

$("#email").click(function() { 

  $(".dialog").toggleClass("show");
});


$(".close").click(function() { 

  $(this).parent().toggleClass("show");
});

  $("#send").click(function() {  
      //  THIS LINE SUBMITS THE HIDDEN INPUT & UPLOADS IMAGE
      document.getElementById("uploadImage").submit();
  });

  $( ".change" ).click(function() {
    $(this).toggleClass("selected");
    $(this).parent().toggleClass("dark");
  });

  $("#roulette").click(function() {  
      $(".change").each(function() {
        $(this).addClass("selected");
        $(this).parent().addClass("dark");
      });
  });

  $("#reset").click(function() {  
      $(".change").each(function() {
        $(this).removeClass("selected");
        $(this).parent().removeClass("dark");
      });
  });


});