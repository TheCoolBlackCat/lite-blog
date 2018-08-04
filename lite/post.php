<?php
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
  echo '<div class="post">';
  echo "<h2 class=\"title\">$meta[title]</h2>";
  echo "<span class=\"author\">$meta[author] </span>";
  echo "<span class=\"date\">$meta[date]</span>";
  echo '<div class="body">';
  for ($line = 0; $line < count($body); $line++)
    echo "<p>".$body[$line]."</p>";
  echo '</div>';
//   echo '<form action="post" method="GET">
//           <input name="id" value="1" style="display:none;"/>
//           <input name="action" value="comment" style="display:none;"/>
//           <textarea name="data"></textarea>
//           <button type="submit">Submit</button>
//         </form';
  echo "<a href=\"/\">Back</a>";
  echo "</div>";
  
}

function displayComments($post) {
  
}
?>