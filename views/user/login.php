<?php require __DIR__ . "/../layout/header.php" ?>

<br>
<br>

<?php if (!empty($error)): ?>
    <p><?php echo $error ?></p>
<?php endif; ?>

<form method="POST" action="login">
    <div class="form-group">
        <label class="control-label">Benutzername: </label>
        <input type="text" name="username" class="form-control">
    </div>
    <div class="form-group">
        <label class="control-label">Passwort: </label>
        <input type="password" name="password" class="form-control">
    </div>
    <input type="submit" value="Einloggen" class="btn btn-primary">
</form>

<?php require __DIR__ . "/../layout/footer.php" ?>
