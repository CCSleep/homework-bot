<p>
<?php
$db = mysqli_connect("localhost", "root", "","homework");

$q = "SELECT * FROM hw WHERE date=CURRENT_DATE()";
$result = mysqli_query($db, $q);
while($row = mysqli_fetch_assoc($result)) { 
	?>-&nbsp;<?php echo $row['content']."<br>";
}
	?>
</p>