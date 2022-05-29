<html lang="HTML5">

<head>
    <title>PHP Quick Start</title>
    <style>
        body {
            background-color: aliceblue;
            color: black;
        }
    </style>
</head>

<body>
<?php
echo '<h1>Cloudinary PHP Quick Start</h1>';


use Cloudinary\Api\Admin\AdminApi;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Tag\ImageTag;
use Cloudinary\Transformation\Resize;


// Upload API
echo '<h2>Upload API Response</h2>';

// Upload the image 
$upload = new UploadApi();
echo '<h2>Upload API Response</h2>';
echo '<pre>';
echo json_encode(
  $upload->upload('https://res.cloudinary.com/demo/image/upload/flower.jpg', [
    'public_id' => 'flower_sample', 
    'use_filename' => TRUE, 
    'overwrite' => TRUE],
  JSON_PRETTY_PRINT
);
echo '</pre>';

// Admin api
echo '<h2>Admin API Response</h2>';

// Get the asset details

echo '<h2>Admin API Response</h2>';
$api = new AdminApi();

echo '<pre>';
echo json_encode($api->asset('flower_sample', [
  'colors' => TRUE]), JSON_PRETTY_PRINT
);
echo '</pre>';


echo '<h2>Cloudinary Image</h2>';


// Create the image tag with the transformed image
$imgtag = (new ImageTag('flower_sample'))
  ->resize(Resize::pad()
    ->width(400)
    ->height(400)
    ->background(Background::predominant())
  );

echo $imgtag;
// The code above generates the following HTML image tag (for the demo account):
//  <img src="https://res.cloudinary.com/demo/image/upload/b_auto:predominant,c_pad,h_400,w_400/flower_sample">

echo '<br>';
echo '<br>';
echo '<br>';
?>
</body>

</html>