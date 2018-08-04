<script type="text/javascript">
  function deleteCheck() {
    if (confirm("Are you sure?"))
      <?php
      $meta[id] = substr($meta[id], 0, strlen($meta[id])-1);
      echo "window.location = \"../delete/$meta[id]\";"
       ?>
  }
</script>

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
    <div class="buttons">
      <a href="../edit/<?php echo $meta[id] ?>" id="edit"><button>Edit</button></a>
      <a id="delete"><button onClick="deleteCheck()">Delete</button></a>
    </div>
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