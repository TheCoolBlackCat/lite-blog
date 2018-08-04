<?php
require("lite/lite.php");
require("lite/post.php");
include("lite/partials/header.php");

// Routing
$uri = $_SERVER['REQUEST_URI'];
// echo $uri;
// echo "<br>";
$uri = substr($uri, 1);
$uri = explode("?",$uri);

switch ($uri[0]) {
  case "post":
    echo "<br>".$path;
    $my_post = getPostById(substr($uri[1], 3));
    // print_r($my_post);
    displayPostBasic($my_post);
    break;
  case "posts":
  case "index":
  case "":
    printIndex();
    break;
  default:
    echo "<h1>404</h1>";
    header("Location: /");
    die();
    break;
}
include("lite/partials/footer.php");
?>