	<?php
	include 'admin_menu.php'; ?>

  <!-- Add trainee -->
  <div class="w3-container" id="addTrainee" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-blue-grey"><b>Add Trainee.</b></h1>
    <hr style="width:50px;border:5px solid #607d8b" class="w3-round">
    <p>Add information about your trainee!</p>
    <form name="form1" method="post" action="/save_addTrainee.php" target="_self">
      <div class="w3-group">
        <label>ID</label>
        <input class="w3-input w3-border" type="text" name="ID" required>
      </div>
      <div class="w3-group">
        <label>Name</label>
        <input class="w3-input w3-border" type="text" name="Name" required>
      </div>
      <div class="w3-group">
        <label>Gender</label>
        <select class="w3-input w3-border" type="text" name="Gender" >
  			<option value="Female">Female</option>
  			<option value="Male">Male</option>
		</select>
      </div>
      <div class="w3-group">
        <label>Weight</label>
        <input class="w3-input w3-border" type="text" name="Weight" required>
      </div>
      <div class="w3-group">
        <label>Height</label>
        <input class="w3-input w3-border" type="text" name="Height" required>
      </div>
      <div class="w3-group">
        <label>Age</label>
        <input class="w3-input w3-border" type="text" name="Age" required>
      </div>
      <button type="submit" class="w3-btn-block w3-padding-large w3-blue-grey w3-margin-bottom">Add Trainee</button>
    </form>  
  </div>

	<?php
	include 'footpage.php'; ?>
