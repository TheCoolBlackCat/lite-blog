<div class="post">
  <h2 class="title"><?php echo $meta[title] ?></h2>
  <div class="meta">
    <span class="author"><?php echo $meta[author] ?> | </span>
    <span class="date"><?php echo $meta[date] . " @ " . $meta[time] ?></span>
  </div>
  <div class="body">
  <?php 
  for ($line = 0; $line < count($body); $line++)
    echo "<p>".$body[$line]."</p>";
  ?>
  <a href="/" class="nav">Back</a>
</div>
  </div>
  
<!--     
  <form action="<?php //echo $meta[id]."/comment" ?>" method="GET">
    <textarea name="t"></textarea>
    <button type="submit">Submit</button>
  </form>

  <?php
//   if($_GET["t"])
//     echo htmlspecialchars($_GET["t"]);
  ?> -->