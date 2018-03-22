<?php include __DIR__ . "/../layout/header.php" ?>

<h1>Startseite des Blogs</h1>

<ul>
  <?php foreach ($posts AS $post): ?>
    <li>
      <a href="post?id=<?php echo $post->id ?>">
        <?php echo $post["title"]; ?>
      </a>
    </li>
  <?php endforeach; ?>
</ul>

<?php include __DIR__ . "/../layout/footer.php" ?>
