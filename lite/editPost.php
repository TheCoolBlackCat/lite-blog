<?php
$post = getPostById($path[1]);
$meta = $post[0];
$body = $post[1];

?>

<div id="editPost">
  <?php
//   foreach ($post as $k => $value) {
//     echo $k ." => ". $value;
//   }
  
  ?>
  <form action="<?php echo $meta["id"]?>" method="POST">
    <input type="text" name="date" value="<?php echo $meta["date"]?>" style="display:none;"/>
    <input type="text" name="time" value="<?php echo $meta["time"]?>" style="display:none;"/>
    <div class="field">
      <label for="title">Title</label>
      <input type="text" id="title" name="title" value="<?php echo $meta["title"]?>" />
    </div>
    <div class="field">
      <label for="author">Author</label>
      <input type="text" id="author" name="author" value="<?php echo $meta["author"]?>" />
    </div>
    <div class="field">
      <label for="body">Post</label>
     <textarea id="body" name="body"><?php for ($line = 0; $line < count($body); $line++) echo $body[$line]."\n";?></textarea>
    </div>
    <button type="submit">Post!</button>
  </form>
  <a href="/">Back Home</a>
</div>