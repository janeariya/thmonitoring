	<?php
	include 'admin_menu.php'; ?>

  <!-- Add trainee -->
  <div class="w3-container" id="addTrainer" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-blue-grey"><b>Add Trainer.</b></h1>
    <hr style="width:50px;border:5px solid #607d8b" class="w3-round">
    <p>Add information about your trainer!</p>
    <form name="form1" method="post" action="/admin_save_match.php" target="_self">
      <div class="w3-group">
        <label>Trainer ID</label>
        <input class="w3-input w3-border" type="text" name="trainer_id" required>
      </div>
      <div class="w3-group">
        <label>Trainee ID</label>
        <input class="w3-input w3-border" type="text" name="trainee_id" required>
      </div>
      <button type="submit" class="w3-btn-block w3-padding-large w3-blue-grey w3-margin-bottom">Match</button>
    </form>  
  </div>

	<?php
	include 'footpage.php'; ?>
