<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta charset="utf-8">
  <title>Photo Booth</title>

   <link rel="stylesheet" type="text/css" href="js/assets/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="js/assets/owl.theme.default.min.css">

  <script src="js/jquery.min.js"></script>
   <script src="js/html2canvas.min.js"></script>
  <script src="tracking/build/tracking-min.js"></script>
  <!-- <script src="tracking/build/data/eye-min.js"></script> -->
  <script src="tracking/build/data/mouth-min.js"></script>
  <script src="tracking/build/data/face-min.js"></script>
  <script src="js/main.js"></script>
   <script src="js/owl.carousel.min.js"></script>

   <style>
   html, body {
  margin: 0;
  padding: 0;
  font-size: 13px;
}
@media (min-width: 750px) {
  html, body {
    font-size: 16px;
  }
}

.text-container {
  display: table;
  margin: 0 auto;
  padding: 2em;
  max-width: 80%;
}
@media (min-width: 750px) {
  .text-container {
    max-width: 30%;
  }
}
.text-container.white {
  background-color: #fff;
}
.text-container.left p {
  text-align: left;
  line-height: 1.35em;
  margin: 2em 0;
  letter-spacing: .05em;
}

.cssbox {
  float: left;
  overflow: hidden;
  width: 43.85%;
  margin: 3%;
  padding: 0;
}
@media (min-width: 750px) {
  .cssbox {
    width: 15.95%;
    padding: 0;
    margin: 2%;
  }
}
.cssbox .cssbox_thumb {
  display: block;
  width: 100%;
/*  filter: grayscale(100%);
  opacity: .5;*/
  transition: all .8s ease-in-out;
  cursor: pointer;
}
/*.cssbox:nth-child(1n) {
  background-color: #f39a35;
}
.cssbox:nth-child(4n+2) {
  background-color: #8875ad;
}
.cssbox:nth-child(4n+3) {
  background-color: #00b6c3;
}
.cssbox:nth-child(4n) {
  background-color: #dde145;
}*/
.cssbox:hover img {
  opacity: 1;
  filter: none;
  transition: all .8s ease-in-out;
}

.banner {
  background-color: #d3d3d3;
  color: #6d6d6d;
  font-family: arial;
  padding: 20px 0;
}

h1, p {
  text-align: center;
}

h1 {
  font-size: 2.5em;
  text-transform: uppercase;
  font-family: "Times New Roman", Georgia, Serif;
}

button {
  background-color: #ED1923;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
}

button:hover {
  background-color: #d60c13;
}

/* The work below, CSSBox, is released under the Creative Commons
   Attribution-SharAlike 4.0 license and is available on
   https://notabug.org/SylvieLorxu/CSSBox. You are not required to add
   additional credit to your website, just leave the above text in this file */
#gallery {
  position: relative;
  z-index: 7000;
}

div.cssbox:nth-child(2n+3) {
  clear: both;
}
@media (min-width: 750px) {
  div.cssbox:nth-child(2n+3) {
    clear: none;
  }
}

span.cssbox_full {
  position: fixed;
  height: 100%;
  width: 100%;
  background-color: rgba(255, 255, 255, 0.8);
  top: 0;
  left: 0;
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.5s linear;
  z-index: 8000;
  padding-bottom: 80px;
}

span.cssbox_full img {
  position: fixed;
  background-color: white;
  margin: 0;
  padding: 0;
  max-height: 90%;
  max-width: 70%;
  top: 50%;
  left: 50%;
  margin-right: -50%;
  transform: translate(-50%, -50%);
  box-shadow: 0 0 20px black;
}

a.cssbox_close,
a.cssbox_prev,
a.cssbox_next {
  position: fixed;
  text-decoration: none;
  visibility: hidden;
  color: white;
  font-size: 36px;
  z-index: 8000;
  cursor: pointer;
}

a.cssbox_close {
  top: 1%;
  right: 1%;
}

a.cssbox_close::after {
  content: '\00d7';
  line-height: 1.125em;
}

a.cssbox_prev,
a.cssbox_next {
  top: 50%;
  transform: translate(0%, -50%);
}

a.cssbox_prev {
  left: 2%;
}

a.cssbox_next {
  right: 2%;
}

a:target ~ a.cssbox_close,
a:target ~ a.cssbox_prev,
a:target ~ a.cssbox_next {
  visibility: visible;
}

a:target > img.cssbox_thumb + span.cssbox_full {
  visibility: visible;
  opacity: 1;
  pointer-events: initial;
}

span.cssbox_full {
  cursor: initial;
}

/* This is the end of CSSBox */
.cssbox_prev:after {
  content: "\2039";
}

.cssbox_next:after {
  content: "\203A";
}

.cssbox_prev:after, .cssbox_next:after, .cssbox_close::after {
  font-family: arial;
  font-weight: normal;
  font-size: 28px;
  line-height: 28px;
  height: 30px;
  width: 30px;
  display: block;
  font-family: arial;
  color: #fff;
  background-color: #ED1923;
  border: 2px solid #ED1923;
  border-radius: 80px;
  text-align: center;
}

.cssbox_next:hover:after, .cssbox_prev:hover:after, .cssbox_close:hover:after {
  color: #fff;
  background-color: #d60c13;
  border: 2px solid #d60c13;
}


   </style>


 </head>

 <body>

<div id="covers">

<?php $dirname = "uploads/";
$images = glob($dirname."*.jpg");
foreach (array_reverse($images) as $image){
    $filename = $file = basename($image);
    echo '<div class="cssbox"><img class="cssbox_thumb" src="'.$image.'" /></div>';
}
?>

</div>

<script type="text/javascript">
  var count = $(".cssbox").length;


$(".cssbox").each(function(){
  
  var img = $(this).find("img");
  var src = img.attr("src");
  var num = $(".cssbox").index(this);
  num = num+1;
  
  var nextnum = num+1;
  var prevnum = num-1;
  
  var link = '<a id="image'+num+'" href="#image'+num+'"></a>';
  var full = '<span class="cssbox_full"><img src="'+src+'"></span>'
 
  img.wrap(link);
  
  $("#image"+num).append(full);
  
  var close = '<a class="cssbox_close" href="#void"></a>';
  var next = '<a class="cssbox_next" href="#image'+nextnum+'"></a>';
  var prev = '<a class="cssbox_prev" href="#image'+prevnum+'"></a>';
  
  if (num == 1){
    $(this).append(close);
    $(this).append(next);
  }else if (num == count){
    $(this).append(close);
    $(this).append(prev);
  }else{
    $(this).append(close);
    $(this).append(next);
    $(this).append(prev);
  }
  

});

</script>

</body>