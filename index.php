<?php
require("lite/lite.php");
require("lite/post.php");
include("lite/partials/header.php");

// Routing
$uri = $_SERVER['REQUEST_URI'];

$uri = substr($uri, 1);
$uri = explode("?",$uri);
$path = explode("/",$uri[0]);
// echo $path[0];

switch ($path[0]) {
//   case "post":
//     $split = ;
//     print_r($split);
//     break;
  case "post":
    $post = getPostById($path[1]);
    displayPostBasic($post);
    break;
  case "new":
    include("lite/newPost.php");
    break;
  case "create":
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
      $title = htmlspecialchars($_POST["title"]);
      $author = htmlspecialchars($_POST["author"]);
      $body = htmlspecialchars($_POST["body"]);
      
      echo "Creating Post";
      newPost($title, $author, $body);
      header("Location: /");
    } else {
      header("Location: /");
    }
    break;
  case "posts":
  case "index":
  case "":
    echo '<a href="new" id="postButton"><button>New Post</button></a>';
    printIndex();
    break;
  default:
    echo "<h1>404</h1>";
    echo $uri[0];
    echo '<a href="/">Back Home</a>';
    //header("Location: /");
    die();
    break;
}
include("lite/partials/footer.php");
?>