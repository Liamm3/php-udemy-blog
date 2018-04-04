<?php require __DIR__ . "/../../layout/header.php" ?>

<br>
<br>

<h3>Post editieren</h3>

<?php if (!empty($success)): ?>
    <p>Der Post wurde erfolgreich gespeichert!</p>
<?php endif; ?>

<form method="POST" action="posts-edit?id=<?php echo e($entry->id) ?>">
    <div class="form-group">
        <label>Titel:</label>
        <input type="text" name="title" value="<?php echo e($entry->title) ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Inhalt:</label>
        <textarea name="content" class="form-control" rows="10"><?php echo e($entry->content) ?></textarea>
    </div>
    <input type="submit" value="Speichern" class="btn btn-primary">
</form>

<?php require __DIR__ . "/../../layout/footer.php" ?>
