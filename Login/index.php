<?php

include("connect.php");

if(isset($_POST['submit'])) {
	$query = mysqli_query($conn,
	"INSERT INTO REGISTER SET firstname='"
	. $_POST["firstname"] . "' ,lastname ='"
	. $_POST["lastname"] . "' ,username ='"
	. $_POST["username"] . "' ,year	 ='"
	. $_POST["year"] . "'	 ,mobile	 ='"
	. $_POST["mob"] . "'	 ,password ='"
	. $_POST["pwd"] . "'	 ");
	
?>
<script>
	alert('You Registered Successfully, Login now');
</script>
<?php
}
?>
<html>

<head>
	<meta charset="utf-8">
	<title>Register Page</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</head>


<body>
	<a href="login.php"
		style="font-size:30px; float:down;">
		Login
	</a>
	<form method="post" action="index.php" name="frm1">

		<fieldset>
			<legend align="center">
				<h1>Register Here</h1>
			</legend>
			<table align="center" border="1"
				width="40%" style="border:thick;">
				<tr>
					<th height="40"><label for="firstname">
							First Name</label>
					</th>
					<td><input type="text"
						name="firstname"
						id="firstname" required>
					</td>
				</tr>
				<tr>
					<th height="40"><label for="lastname">
							Last Name</label>
					</th>
					<td><input type="text"
							name="lastname"
							id="lastname" required>
					</td>
				</tr>
				<tr>
					<th height="40"><label for="username">
							Username</label>
					</th>
					<td><input type="text"
						name="username"
						id="username" required>
					</td>
				</tr>
				<tr>
					<th height="40">
						<label for="year">Year</label>
					</th>
					<td><select name="year"
						id="year" required>
							<option value="">
								Choose Year
							</option>
							<option value="First Year">
								First Year
							</option>
							<option value="Second Year">
								Second Year
							</option>
							<option value="Third Year">
								Third Year
							</option>
							<option value="Fourth Year">
								Fourth Year
							</option>
						</select>
					</td>
				</tr>
				<tr>
					<th height="40">
						<label for="mob">Mob.No.</label>
					</th>
					<td><input type="tel" name="mob"
							id="mob" required>
					</td>
				</tr>
				<tr>
					<th height="40">
						<label for="pwd">Password</label>
					</th>
					<td><input type="password"
						name="pwd" id="pwd" required>
					</td>
				</tr>
				<tr>
					<td height="40" colspan="2"><input
						type="submit" name="submit"
						value="Register">
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>

</html>
