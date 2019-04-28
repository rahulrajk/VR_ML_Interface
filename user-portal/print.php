<?php include("./includes/connect.inc.php");?>
<?php
session_start();
if (isset($_SESSION['user_login'])) {
$log_user_name=$_SESSION['user_login'];
$coverpicposts=mysql_query("SELECT * FROM users WHERE policy_id='$log_user_name'") or die (mysql_error);
while($row = mysql_fetch_assoc($coverpicposts)) {
$user=$row['id'];
$name=$row['username'];
$policy_id=$row['policy_id'];
$dob=$row['dob'];
$type=$row['type'];
$start_date=$row['start_date'];
$stop_date=$row['stop_date'];
$specific_2=$row['specific_2'];
$total_cover=$row['total_cover'];
$premium=$row['premium'];
}
}
else
{
$user="";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container" style="margin-top: 30px;">
		<div class="row">
			<div class="col-md-4">
				<b>Name : <?php echo $name;?></b><br><br>
				<b>Policy Id : <?php echo $policy_id;?></b><br><br>
				<b>DOB : <?php echo $dob;?></b><br><br>
				<b>Type of Insurance : <?php echo $type;?></b><br><br>
				<b>Insurance Start date : <?php echo $start_date;?></b><br><br>
				<b>Expiry Date : <?php echo $stop_date;?></b><br><br>
				<!-- <b>Remaining No of days : <?php echo $stop_date-$start_date;?></b> -->
				<b>Cover Applied : <?php echo $specific_2;?></b><br><br>
				<b>Total Cover: <?php echo $total_cover;?></b><br><Br>
				<b>Premium : <?php echo $premium;?></b>
			</div>
			<div class="col-md-8">
				<h2 class="display-4" style="font-size: 40px;"><?php echo $type;?> - <?php echo $specific_2;?></h2>
				<p>[ Basic Life Cover + Monthly Income ]</p>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<p class="display-4" style="font-size:18px;">Whats Covered ?</p>
						<p>
							<?php
								$sql=mysql_query("SELECT * FROM cover WHERE id='1'");
								while($row=mysql_fetch_array($sql)){
									$exclusions=$row['inclusions'];
									echo $exclusions;
								}
							?>
						</p>
					</div>
					<div class="col-md-6">
						<p class="display-4" style="font-size:18px;">Whats Not Covered ?</p>
						<p>
							<?php
								$sql=mysql_query("SELECT * FROM cover WHERE id='1'");
								while($row=mysql_fetch_array($sql)){
									$exclusions=$row['exclusions'];
									echo $exclusions;
								}
							?>
						</p>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	
</body>
</html>