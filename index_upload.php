<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Photo Booth</title>

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
   <script src="https://smtpjs.com/smtp.js"></script>
   <script src="js/owl.carousel.min.js"></script>
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
    /*margin: 0 20px;*/

  }
  #images{
    position: absolute;
    bottom: 20px;
    z-index: 2500;
    width: 920px;
    max-height: 300px;
    margin: 0 10px 0 62px;
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
    background: url('img/take_photo_btn.png')no-repeat 0 0;
    width: 104px;
    height: 68px;
    display: block;
    margin: 20px auto;
    cursor: pointer;
  }

  #shoot:hover{
    background: url('img/take_photo_btn.png') no-repeat 0 -71px;
    width: 104px;
    height: 65px;
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
    /*border:3px solid #000000;*/
  }

  #photo-box{
    overflow: hidden;
    display: block;
    position: relative;
    height: 795px;
  }

  .item{
    background-color: rgba(203,247,255,.75);
    padding:3px;
    cursor: pointer;
  }

  .item:hover{
    background-color: rgba(203,247,255,1);
  }

  .item.dark{
    background-color: rgba(203,247,255,1);
  }

  #bg-thumbs{
    width: 200px;
    position: absolute;
    top:0;
    right:0;
    margin:12px 0 0 0;
  }

  #bg-thumbs img{
    width: 40%;
    margin: 2%;
    cursor: pointer;
  }

  .owl-prev, .owl-next{
    color: #000;
    font-size: 25px;
    font-weight: bold;
    background: rgba(255,255,255,.7);
    border-radius: 40px;
    padding: 5px 12px;
  }

  .owl-prev:hover, .owl-next:hover{
    background: rgba(255,255,255, 1);
  }

  .owl-prev.disabled, .owl-next.disabled{
    display: none;
  }

  .owl-prev{
    position: absolute;
    left:-45px;
    bottom: 20px;
  }
  .owl-prev:before{
    content:'<';
  }

  .owl-next{
    position: absolute;
    right: -45px;
    bottom: 20px;
  }
  .owl-next:before{
    content:'>';
  }

  #timer{
    font-size: 50px;
    border-radius: 500px;
    padding:20px;
    background-color: #000;
    color:#fff;
    position: absolute;
    z-index: 3000;
    top:30%;
    left: 30%;
  }

  #countdown{
    height:50px;
    width: 50px;
    margin:0 auto;
    text-align: center;
  }

  #timer.hide{
    display: none;
  }
  </style>
  <link rel="stylesheet" type="text/css" href="js/assets/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="js/assets/owl.theme.default.min.css">

</head>
<body>

  <div id="photo-box">
      <video id="video" width="1024" height="768" preload autoplay loop muted></video>
       <canvas id="bg" width="1024" height="768" ></canvas>
      <canvas id="screen" width="1024" height="768" ></canvas>
      <canvas id="canvas" width="1024" height="768" ></canvas>
  </div>


<div id="preview">
<canvas id="combined" width="1024" height="768" ></canvas>
<div id="img-out"></div>
<br clear="all">
<div style="margin:0 auto;display:table;">
 <a class="button" href="#"
onclick="this.href = $('#img-out img').attr('src');" download="halloween">download</a>

<div id="new" class="button">take a new photo</div><br><br><br><br>

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

  <div id="images" class="masks-carousel owl-carousel">
    <div class="item"><img class="change" src="hats/arthur.png" data-name="arthur"></div>
    <div class="item"><img class="change" src="hats/dw.png" data-name="dw"></div>
    <div class="item"><img class="change" src="hats/ruff.png" data-name="ruff"></div>
    <div class="item"><img class="change" src="hats/george.png" data-name="george"></div>
    <div class="item"><img class="change" src="hats/MIYH.png" data-name="MIYH"></div>
    <div class="item"><img class="change" src="hats/creature2.png" data-name="creature"></div>
    <div class="item"><img class="change" src="hats/dracula.png" data-name="dracula"></div>
    <div class="item"><img class="change" src="hats/wolfman.png" data-name="wolfman"></div>
    <div class="item"><img class="change" src="hats/mans_hat.png" data-name="mans_hat"></div>
    <div class="item"><img class="change" src="hats/womans_hat.png" data-name="womans_hat"></div>
    <div class="item"><img class="change" src="hats/mummy.png" data-name="mummy"></div>
    <div class="item"><img class="change" src="hats/witch.png" data-name="witch"></div>
    <div class="item"><img class="change" src="hats/frankenstein.png" data-name="frankenstein"></div>
  </div>

  <div id="bg-thumbs">

    <img src="bgs/thumb/arthur_spooky_bg_thumb.png" data-bg="arthur_spooky_bg" />
    <img src="bgs/thumb/Ruff_bg_thumb.png" data-bg="Ruff_bg" />
    <img src="bgs/thumb/black_lagoon_bg_thumb.png" data-bg="black_lagoon_bg" />
    <img src="bgs/thumb/Curious_george_bg_thumb.png" data-bg="Curious_george_bg" />
    <img src="bgs/thumb/edward_gorey_bg_thumb.png" data-bg="edward_gorey_bg" />
    <img src="bgs/thumb/egyptian_tomb_bg_thumb.png" data-bg="egyptian_tomb_bg" />
    <img src="bgs/thumb/franken_bg_thumb.png" data-bg="franken_bg" />
    <img src="bgs/thumb/full_moon_bg_thumb.png" data-bg="full_moon_bg" />
    <img src="bgs/thumb/spooky_organ_bg_thumb.png" data-bg="spooky_organ_bg" />

    <div id="shoot"></div>

  </div>

<div id="timer" class="hide">
  <div id="countdown">5</div>
</div>


</body>
</html>