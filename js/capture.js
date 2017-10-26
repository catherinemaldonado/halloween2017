 $( document ).ready(function() { 

  var hires;
var canvas1 = document.getElementById("bg");

function background(x){
  var bg = new Image();
  bg.src = x;

  var ctxbg = canvas1.getContext("2d");

  bg.onload = function() {
    ctxbg.drawImage(bg,0,0,1024,768);
  };
};

background('hats/arthur_spooky_bg.png');

function generateImage(num){
  var canvas2 = document.getElementById("screen");
  var canvas3 = document.getElementById("canvas");


  var combined = document.getElementById("combined");
  var ctx = combined.getContext("2d");

  ctx.drawImage(canvas1, 0, 0); 
  ctx.drawImage(canvas2, 0, 0); 
  ctx.drawImage(canvas3, 0, 0);

  hires = combined.toDataURL('image/jpeg', .5);

}

$("#bg-thumbs img").click(function(){
  var newbg = $(this).data("bg");
  background('bgs/'+newbg+'.png');
});

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

  }, 9000);

});

$("#new").click(function() { 
  $("#preview").toggleClass("show");
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

});