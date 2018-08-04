<?php

// function checkBlank ($id, $title, $author, $body, $datetime) {
//   $invalid = false;
//   if(!isset($id)) {
//     echo "ID not specified";
//     $invalid = true;
//   }
//   if(!isset($title)) {
//     echo "Title cannot be blank";
//     $invalid = true;
//   }
//   if(!isset($author)) {
//     echo "Author cannot be blank";
//     $invalid = true;
//   }
//   if(!isset($body)) {
//     echo "Body cannot be blank";
//     $invalid = true;
//   }
//   if(!isset($datetime)) {
//     echo "Date/Time invalid";
//     $invalid = true;
//   }
//   return $invalid;
// }

function validPost($id) {
  $path = "lite/content/posts/". $id ."/post.md";
  return file_exists($path);
}

// Returns a Post in an array by its specified ID
function getPostById ($id) {
  $path = "lite/content/posts/". $id ."/post.md";
  
  $post = fopen ($path, "r") or die("Unable to read file.");
  $meta = array();
  $body = array();
  $content = array();
  $metaLeft = true;
    while(!feof($post)) {
      $x = fgets($post);
        
      
      if ($metaLeft) {
        if ($x[0] === "#") {
          $metaLeft = false;
          array_push($content, $meta);
        } else {
          $y = explode(":",$x);
          $meta[$y[0]] = $y[1];
        }
      } else {
        array_push($body, $x);
      }
    }
    fclose($post);
  array_push($content, $body);
  return $content;
}

function displayPostBasic ($post) {
  $meta = $post[0];
  $body = $post[1];
  $meta["time"] = str_replace("_",":", $meta["time"]);
  
  include("lite/showPost.php");
}

function displayComments($post) {
  
}

function newPost ($title, $author, $body) {
  // Get IDs, then add 1 to get new ID
  $files = getFiles("lite/content/posts");
  $id = max($files) + 1;
  $path = "lite/content/posts/$id";
  $date = date("d-m-Y");
  $time = date("h_i_s");
  
    if (!file_exists($path)) {
      mkdir($path."/comments", 0775, true);
      
$f = fopen($path . "/post.md", "w") or die("Unable to create file!");
$txt = "id:$id
title:$title
author:$author
date:$date
time:$time
#############################################################################################################################################################################################
$body";
fwrite($f, $txt);
fclose($f);
} else {
  echo "Directory Create Error";
}
}

function editPost ($id, $title, $author, $body, $datetime) {
  $path = "lite/content/posts/$id/post.md";
  echo $path;
  //$date = date("d-m-Y");
  //$time = date("h_i_s");
  
  if (file_exists($path)) {
    $f = fopen($path, "w") or die("Unable to open file!");
    $txt = "id:$id
title:$title
author:$author
date:$datetime[0]
time:$datetime[1]
#############################################################################################################################################################################################
$body";
    fwrite($f, $txt);
    fclose($f);
  } else {
    echo "File Not Found!";
  }
}

function recursiveDelete($dir) {
  $files = array_diff(scandir($dir), array('.','..'));
  foreach ($files as $file) // If directory, recurse, else delete file
    (is_dir("$dir/$file")) ? recursiveDelete("$dir/$file") : unlink("$dir/$file");
  return rmdir($dir);
}

function deletePostById($id) {
  $path = "lite/content/posts/$id";
  echo recursiveDelete($path); 
}
?>