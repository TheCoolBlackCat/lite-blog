<?php
function printSimpleHome () {
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

function printHead () {
  echo "<h1>Lite Blog</h1>";
}
function printIndex () {
  $files = array_diff(scandir("lite/content/posts"), array('.', '..'));
  krsort($files); // Reverse array
  foreach ($files as $k => $file) {
    $post = getPostById($file);
    $meta = $post[0];
    $body = $post[1];

    echo '<div class= "preview">';
      echo "<a href=\"post?id=$file\"><h2 class=\"title\">$meta[title]</h2></a>";
        echo "<p>";
          echo "<span class=\"author\">$meta[author] </span>";
          echo "<span class=\"date\">$meta[date]</span>";
        echo "</p>";
        echo '<div class="body">';
        $bodyText = "asdf";
        for ($line = 0; $line < count($body); $line++)
          $bodyText .= $body[$line];
          echo $bodyText;
        echo '</div>';
    echo"</div>";
  }
  // echo '<h1>Lite Blog</h1><ul><li><a href="/">Home</a></li><li><a href="post?id=1">Post 1</a></li><li><a href="post?id=2">Post 2</a></li><li><a href="post?id=3">Post 3</a></li></ul>';
}

?>