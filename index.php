<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!--Material Design Bootstrap 
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/4.0.0/material-components-web.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/4.0.0/material-components-web.js">
<script src="/assets/bootstrap.js" /></script>
<link rel="stylesheet" href="/assets/bootstrap.css" /></script>
<link rel="stylesheet" href="/assets/animate.css" /></script>
<?php
$db = mysqli_connect("localhost", "root", "", "homework");
if (isset($_POST["cc"])){
	$content = $_POST["cc"];
	$sql = mysqli_query($db, "INSERT INTO `hw` (content,date) VALUES ('$content', CURRENT_DATE());");
	?>
<br>
<div class="alert alert-success animated flipInX" role="alert">
	
	Successfully added <b><?php echo $content; ?></b> to the database.
</div>
<?php	
}
?>
<br><br>
<div class="row animated bounceInUp">
	<div class="col-md-4"></div>
	<div class="col-md-4"><center><form method="post"><span><h1>Announcement</h1><br><input type="text" name="cc" class="form-control" placeholder="Homework"></span><br><button type="submit" class="btn btn-block btn-success">Submit</button></form></center></div>
	<div class="col-md-4"></div>
</div>
<br><br>
<center><h3 class="animated fadeIn" style="animation-delay: 1s;">Latest Announcement</h3></center>
<br><br>
<table class="table table-dark animated bounceInUp" style="animation-delay: 1s;">
  <thead>
    <tr>
      <th scope="col">Content</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
<?php


$qq = "SELECT * FROM hw";
$result = $db-> query($qq);
while($row = $result -> fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['content'];?></td>
    <td><?php echo $row['date'];?></td>
</tr>

<?php } ?>
</tbody>
</table>
<br><br>
<center><a class="animated fadeIn" style="animation-delay: 2s;" href="admin.php">Admin Login (coming soon)</a></center>