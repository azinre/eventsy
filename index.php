<?php 
require 'function.php';

$events = getEvents(); 

if (isset($_POST['delete_event'])) {
    $delete_id = $_POST['delete_id'];

    if (deleteEvent($delete_id)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Event deletion failed.";
    }
}
?>

<?php require 'head.php'; ?>
<body>
  <main class="container mb-5">
    <?php require 'header.php'; ?>
    <div class="row">
      
      <!-- Loop through each event to create Event Cards -->
      <?php foreach ($events as $event): ?>
        <div class="col col-lg-4">
          <div class="card m-3">
            <div class="card-img-top bg-secondary-subtle fs-1 d-grid justify-content-center align-content-center p-5">
              <i class="bi bi-calendar-check"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title mb-3"><?php echo $event['title']; ?></h5>
              <p class="card-text text-danger mb-3"><?php echo date('D, M j, Y', strtotime($event['date'])); ?></p>
              <h6 class="card-subtitle mb-2 text-muted"><?php echo $event['email']; ?></h6>
              <div class="d-flex justify-content-center mt-5">
                <form method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $event['id']; ?>">
                  <button class="btn btn-sm btn-danger" name="delete_event">Delete</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- End Loop -->

    </div>
  </main>
</body>
</html>
