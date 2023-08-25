<?php
require_once 'sample_head.php';
?>

<div class="container mt-4" style="color: var(--text-color);">
  <h2>Admin Upload Download Detail</h2>
  <form action="download_detail_upload_process.php" method="post">
    <div class="form-group">
      <label for="skinID">Skin ID:</label>
      <?php
      // Get the skin ID from the URL parameter
      if (isset($_GET['skinID'])) {
        $skinID = $_GET['skinID'];
        echo '<input type="number" class="form-control" id="skinID" name="skinID" value="' . $skinID . '" readonly>';
      }
      ?>
    </div>
    <div class="form-group">
      <label for="heroID">Hero ID:</label>
      <?php
      // Get the hero ID from the URL parameter
      if (isset($_GET['heroID'])) {
        $heroID = $_GET['heroID'];
        echo '<input type="number" class="form-control" id="heroID" name="heroID" value="' . $heroID . '" readonly>';
      }
      ?>
    </div>
    <div class="form-group">
      <label for="patch">Patch:</label>
      <input type="text" class="form-control" id="patch" name="patch" required>
    </div>
    <div class="form-group">
      <label for="sound">Sound:</label>
      <input type="text" class="form-control" id="sound" name="sound" required>
    </div>
    <div class="form-group">
      <label for="animation">Animation:</label>
      <input type="text" class="form-control" id="animation" name="animation" required>
    </div>
    <div class="form-group">
      <label for="recall">Recall:</label>
      <select class="form-control" id="recall" name="recall">
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select>
    </div>
    <div class="form-group">
      <label for="skinLogo">Skin Logo:</label>
      <select class="form-control" id="skinLogo" name="skinLogo">
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select>
    </div>
    <div class="form-group">
      <label for="backupFile">Backup File:</label>
      <select class="form-control" id="backupFile" name="backupFile">
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select>
    </div>
    <div class="form-group">
      <label for="dlink">Add Download Link:</label>
      <input type="text" class="form-control" id="dlink" name="dlink" required>
    </div>
    <div class="form-group">
      <label for="ylink">Add Youtube Link:</label>
      <input type="text" class="form-control" id="ylink" name="ylink">
    </div>

    <!-- Add a hidden input field for the hero ID -->
    <input type="hidden" name="heroID" value="<?php echo $heroID; ?>">

    <button type="submit" class="btn btn-primary">Upload Download Detail</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="./js/admin.js"></script>

</body>

</html>