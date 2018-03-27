<?php include __DIR__ . "/../layout/header.php" ?>

<h1>Post.php</h1>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">
      <?php echo e($post->title) ?>
    </h3>
  </div>
  <div class="panel-body">
    <?php echo nl2br(e($post->content)); ?>
  </div>
</div>

<ul class="list-group">
  <?php foreach($comments AS $comment): ?>
    <li class="list-group-item">
      <?php echo e($comment["content"]); ?>
    </li>
  <?php endforeach; ?>
</ul>

<form method="post" action="post?id=<?php echo e($post["id"]); ?>">
  <textarea name="content" class="form-control"></textarea>
  <br>
  <input type="submit" value="Send" class="btn btn-primary">
</form>

<?php include __DIR__ . "/../layout/footer.php" ?>
