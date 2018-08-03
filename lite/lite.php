<?php
function printHome () {
  echo "<h1>Lite Blog</h1>";
  $files = array_diff(scandir("lite/content/posts"), array('.', '..'));
  echo "<ul>";
  echo '<li><a href="/">Home</a></li>';
  foreach ($files as $k => $file) {
    echo "<li><a href=\"post?id=$file\">Post $file</a></li>";
  }
  echo "</ul>";
  // echo '<h1>Lite Blog</h1><ul><li><a href="/">Home</a></li><li><a href="post?id=1">Post 1</a></li><li><a href="post?id=2">Post 2</a></li><li><a href="post?id=3">Post 3</a></li></ul>';
}

?>