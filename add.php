<?php
  require 'function.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = sanitize($_POST);
    $errors = validate($data);

      if (count($errors) === 0) {
          $id = createEvent($data); 
          if ($id) {
              header("Location: index.php? id=$id");
              exit; 
          }
      }

    extract($_POST);
}
?>


?>a
<?php require 'head.php'; ?>
<body>
  <main class="container mb-5">
    <?php require 'header.php'; ?>
    <div class="row">
      <div class="col">  
        <form class="p-5 bg-light border border-1" method="post">
          <h2 class="fw-normal text-center mb-3">Add Event</h2>
          <input type="hidden" name="action" value="add">
          <div class="row">
            <div class="col-12 col-md-7 mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" name="title" id="title" placeholder="Event Title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : ""; ?>" class="form-control mb-1">
              <div class="text-danger">
                <?php if (isset($errors['title'])) : ?>
                  <?php echo $errors['title']; ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-12 col-md-5 mb-3">
              <label for="date" class="form-label">Date</label>
              <input type="date" name="date" id="date" value="<?php echo isset($_POST['date']) ? $_POST['date'] : ""; ?>" class="form-control mb-1">
              <div class="text-danger">
                <?php if (isset($errors['date'])) : ?>
                  <?php echo $errors['date']; ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-12 mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" name="email" id="email" placeholder="john.smith@email.com" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ""; ?>" class="form-control mb-1">
              <div class="text-danger">
                <?php if (isset($errors['email'])) : ?>
                  <?php echo $errors['email']; ?>
                <?php endif; ?>
              </div>
            </div>
          </div>

          <button class="btn btn-primary">Add Event</button>
        </form>
      </div>
    </div>
  </main>
</body>
</html>