<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Photo Booth</title>
  <!-- <link rel="stylesheet" href="tracking/assets/demo.css"> -->
  <script src="js/jquery.min.js"></script>
   <script src="js/html2canvas.min.js"></script>
  <script src="tracking/build/tracking-min.js"></script>
  <!-- <script src="tracking/build/data/eye-min.js"></script> -->
  <script src="tracking/build/data/mouth-min.js"></script>
  <script src="tracking/build/data/face-min.js"></script>
  <script src="js/main.js"></script>
   <script src="js/dat.gui.min.js"></script>
   <script src="js/tracker.js"></script>
   <script src="js/capture.js"></script>
   <script src="https://smtpjs.com/smtp.js">
</script>
    <!-- <script src="tracking/assets/stats.min.js"></script>-->


  <style>
  video, canvas {
    margin-left: 10px;
    margin-top: 10px;
    position: absolute;
  }
  body{
    font-family:arial;
  }
  .change{
    max-width: 120px;
    margin: 0 20px;
  }
  #images{
    position: absolute;
    bottom: 0;
  }
  .button{
    border-radius: 30px;
    background-color: #FF8C00;
    color: #fff;
    display: table;
    padding:10px;
    margin:5px;
    float:left;
    cursor:pointer;
    font-weight: bold;
    text-transform: uppercase;
  }
  #shoot{
    float:right;
  }
  #combined{
    width:500px;
    position: relative;
    display: block;
    margin:0 auto;
  }

  #preview{
    display: none;
  }

  #preview.show{
    display: block;
    width:100%;
    height: 100%;
    background-color:#fff;
    position: absolute;
    top:0;
    left:0;
    z-index:3000;
  }

  #img-out{
    display:none;
  }

  #bg-image{
    /*display: none;*/
  }

  .dialog{
    position: absolute;
    top:50%;
    left:50%;
    width:300px;
    height:400px;
    border: 1px solid #000;
    display: none;
  }

  .dialog.show{
    display: block;
  }

  .close{
    float: right;
  }

  .selected{
    border:3px solid #000000;
  }

  </style>


</head>
<body>

  <div id="photo-box">
      <video id="video" width="1024" height="768" preload autoplay loop muted></video>
       <canvas id="bg" width="1024" height="768" ></canvas>
      <canvas id="screen" width="1024" height="768" ></canvas>
      <canvas id="canvas" width="1024" height="768" ></canvas>
  </div>

  <div id="shoot" class="button">SNAP</div>

<div id="preview">
<canvas id="combined" width="1024" height="768" ></canvas>
<div id="img-out"></div>
<br clear="all">
<div style="margin:0 auto;display:table;">
<!--  <a class="button" href="#"
onclick="this.href = $('#img-out img').attr('src');" download="halloween">download</a> -->

<div id="new" class="button">take a new photo</div><br><br><br><br>

<!-- <div id="email" class="button">email me a copy</div> -->

<form method="POST" enctype="multipart/form-data" action="save.php" id="uploadImage">
  <input type="hidden" name="fileToUpload" id="fileToUpload" value="" /><br>
  EMAIL: <input name="send-email" id="send-email" value="" /><br>
  <input type="checkbox" checked="checked" name="share" ide="share" value="share"/> I'm cool with this in a public gallery
  </form>
<br>
<div id="send" class="button">Save & Email</div>

<div class="dialog">
<div class="close">X</div>

<div id="send" class="button">send</div>
</div>

</div>

</div>

  <div id="images">
    <img class="change selected" src="hats/creature2.png" data-name="creature">
    <img class="change" src="hats/arthur.png" data-name="arthur">
    <img class="change" src="hats/dw.png" data-name="dw">
<!--     <img class="change" src="hats/curious_mask.png" data-name="curious_mask">
    <img class="change" src="hats/MIYH_hat.png" data-name="MIYH_hat">
    <img class="change" src="hats/womans_hat.png" data-name="womans_hat"> -->

<!--    <img class="change" src="hats/Red_Fedora.png" data-img="Red_Fedora.png" data-xpos=".02" data-ypos=".5" data-imgwidth="1" data-imgheight="1.2">
    <img class="change" src="hats/cowboy.png" data-img="cowboy.png" data-xpos=".2" data-ypos=".85" data-imgwidth="1.4" data-imgheight="1.2">
    <img class="change" src="hats/bowler.png" data-img="bowler.png" data-xpos=".02" data-ypos=".25" data-imgwidth="1.3" data-imgheight="1.2"> -->
  </div>

  <script>



  </script>



</body>
</html>