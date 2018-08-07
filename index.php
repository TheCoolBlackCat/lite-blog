<?php
require("lite/lite.php");
require("lite/random.php");
require("lite/post.php");

include("seed.php");
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
  case "delete":
    if (validPost($path[1])) {
      deletePostById($path[1]);
      echo "Deleted Post";
    }
    header("Location: /");
    break;
  case "edit":
    if ($_SERVER['REQUEST_METHOD'] === "POST" && validPost($path[1])) {
      $title = htmlspecialchars($_POST["title"]);
      $author = htmlspecialchars($_POST["author"]);
      $body = htmlspecialchars($_POST["body"]);
      $datetime = array(htmlspecialchars($_POST["date"]), htmlspecialchars($_POST["time"]));
      // print_r($datetime[0]);
      // echo $path[1]. $title . $author . $body;
      echo "Edited Post";
      editPost($path[1], $title, $author, $body, $datetime);
      header("Location: ../post/$path[1]");
    } else {
      include("lite/editPost.php");
    }
    break;
  case "create":
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
      $title = htmlspecialchars($_POST["title"]);
      $author = htmlspecialchars($_POST["author"]);
      $body = htmlspecialchars($_POST["body"]);
      
      echo "Creating Post";
      newPost($title, $author, $body);
    }
    header("Location: /");
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
    // header("Location: /");
    // die();
    break;
}
include("lite/partials/footer.php");
?>