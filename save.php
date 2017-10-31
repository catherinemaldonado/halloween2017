
 <?php
 header("Access-Control-Allow-Origin: *");
?>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<script src="js/jquery.min.js"></script>
</script>

<script type="text/javascript" src="https://cdn.emailjs.com/dist/email.min.js"></script>
<script type="text/javascript">
   (function(){
      emailjs.init("user_9O1Ddr1ulGu6EiQEhmuZG");
   })();
</script>

<style>

 body{
    font-family:arial;
    background-color: #000;
    color:#fff;
  }

  p{
    max-width: 300px;
    margin:20px auto;
  }

#success{
  display: none;
}

#success.show{
  display: block;
}

#sending.hide{
  display: none;
}

#user-image{
  width:300px;
  margin:0 auto;
  display: block;
}

a:link, a:visited, a:active{
  color:#fff;
}

</style>



</head>
<body>


<?php

$directory = 'uploads/';
$directoryp = 'uploadsp/';
$files = glob($directory . '*.jpg');



if ( $files !== false ){ $filecount = count( $files );}

function rand_string( $length ) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}
	return $str;
}

$my_string = rand_string( 5 );

//Get the base-64 string from data
$filteredData=substr($_POST['fileToUpload'], strpos($_POST['fileToUpload'], ",")+1);

$base64 = $filteredData;
 
//Decode the string
$unencodedData=base64_decode($filteredData);
 
if ($_POST['share'] == "share"){

//Save the image
file_put_contents($directory.'halloween_'. $filecount .'_'.$my_string.'.jpg', $unencodedData);

echo '<img id="user-image" src="'. $directory .'halloween_'. $filecount .'_'.$my_string.'.jpg" data-base="'. $base64 .'"/>';

  echo '<p>Your image is in the public gallery!</p>';

}else{
  file_put_contents($directoryp.'halloween_'. $filecount .'_'.$my_string.'.jpg', $unencodedData);

echo '<img id="user-image" src="'. $directoryp .'halloween_'. $filecount .'_'.$my_string.'.jpg" data-base="'. $base64 .'"/>';
  echo '<p>Your image is not in the public gallery.</p>';
}

?>

<?php $dirname = "public/";
$images = glob($dirname."*.jpg");
//foreach (array_reverse($images) as $image){
    //$filename = $file = basename($image);
  // echo '<img src="'.$image.'" />';
  //echo '<img src="'.$newest_file.'" />';
//}
?>

<p id="sending">
  <?php
    $email = $_POST['send-email'];

    echo 'Sending email to: <span id="address" data-email="'. $email .'">'. $email .'</span>'; 

  ?>
    
</p>

<p id="success">
  Email sent! Return to <a href="index.php">photo booth</a> or view the <a href="gallery.php">gallery</a>.
</p>


</body>
</html>

<script>
setTimeout(function() {
  var email = $("#address").data("email");
  var imgsrc = $("#user-image").attr('src');

  var content = $("#user-image").data("base");


    emailjs.send("outlook", "test", {content: content, email: email}); 

    $("#success").addClass("show");
    $("#sending").addClass("hide");
}, 1000);
</script>