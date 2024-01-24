<div class="row p-5 mb-3">
  <div class="col">
    <h1 class="display-4"><a href="index.php" class="text-body text-decoration-none">Eventsy</a></h1>
  </div>
  <div class="col d-flex align-items-center justify-content-end">
    <?php if (!preg_match('/add.php/', $_SERVER['PHP_SELF'])) : ?>
    <a href="add.php" class="btn btn-secondary">&plus;</a>
    <?php endif; ?>
  </div>
</div>