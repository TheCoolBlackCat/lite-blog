<?php
// function printSimpleHome () {
//   echo "<h1>Lite Blog</h1>";
//   $files = getFiles("lite/content/posts");
//   echo "<ul>";
//   echo '<li><a href="/">Home</a></li>';
//   foreach ($files as $file) {
//     echo "<li><a href=\"post/$file\">Post $file</a></li>";
//   }
//   echo "</ul>";
//   // echo '<h1>Lite Blog</h1><ul><li><a href="/">Home</a></li><li><a href="post?id=1">Post 1</a></li><li><a href="post?id=2">Post 2</a></li><li><a href="post?id=3">Post 3</a></li></ul>';
// }

function recursiveDelete($dir) {
  $files = array_diff(scandir($dir), array('.','..'));
  foreach ($files as $file) // If directory, recurse, else delete file
    (is_dir("$dir/$file")) ? recursiveDelete("$dir/$file") : unlink("$dir/$file");
  return rmdir($dir);
}

function printHead () {
  echo "<h1>Lite Blog</h1>";
}

function printIndex () {
  $files = getFiles("lite/content/posts");
  arsort($files); // Reverse array, sort values
  
  foreach ($files as $file) {
    $post = getPostById($file);
    $meta = $post[0];
    $body = $post[1];

    echo '<div class= "preview">';
      echo "<a href=\"post/$file\"><h2 class=\"title\">$meta[title]</h2></a>";
        echo '<div class="meta">';
          echo "<span class=\"author\">$meta[author] </span>";
          echo "<span class=\"date\">$meta[date]</span>";
        echo "</div>";
        echo '<div class="body">';
        $bodyText = "";
        for ($line = 0; $line < count($body); $line++)
          $bodyText .= $body[$line];
          echo substr($bodyText, 0, 100)."...";
        echo '</div>';
        echo "<div class=\"goTo\"><a href=\"post/$file\"><button class=\"invert\">Read More</button></a></div>";
    echo"</div>";
  }
  // echo '<h1>Lite Blog</h1><ul><li><a href="/">Home</a></li><li><a href="post?id=1">Post 1</a></li><li><a href="post?id=2">Post 2</a></li><li><a href="post?id=3">Post 3</a></li></ul>';
}

function getFiles ($path) {
  return array_diff(scandir($path), array('.', '..'));
}

?>