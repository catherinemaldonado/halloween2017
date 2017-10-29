<head>
  <meta charset="utf-8">
  <meta http-equiv="refresh" content="300">
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
   body{
   	background-color: #000;
   }
   	#gallery{
   		max-width: 80%;
   		margin: 0 auto;
   	}

   </style>


 </head>

 <body>

<div id="gallery" class="gallery-carousel owl-carousel">

	<?php $dirname = "uploads/";
$images = glob($dirname."*.jpg");
foreach (array_reverse($images) as $image){
    $filename = $file = basename($image);
    echo '<div class="item"><img src="'.$image.'" /></div>';
}
?>

</div>

<script>

	setInterval(function() {
                  window.location.reload();
                }, 300000); 

</script>

</body>