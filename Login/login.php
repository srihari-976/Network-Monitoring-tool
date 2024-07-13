<?php
	
include("connect.php");

if(isset($_POST['login'])) {
	$sql = mysqli_query($conn,
	"SELECT * FROM REGISTER WHERE username='"
	. $_POST["username"] . "' AND
	password='" . $_POST["pwd"] . "' ");

	$num = mysqli_num_rows($sql);

	if($num > 0) {
		$row = mysqli_fetch_array($sql);
		header("location:check.php");
		exit();
	}
	else {
?>
<hr>
<font color="red"><b>
		<h3>Sorry Invalid Username and Password<br>
			Please Enter Correct Credentials</br></h3>
	</b>
</font>
<hr>

<?php
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <style>
        @import url("https://fonts.googleapis.com/css2?family-Poppins:wght@300;400;500;600;700;800;900&display=swap");

* {
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: "Poppins", sans-serif;
}

body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background:url("dark.jpg") no-repeat;
    background-size: cover;
    background-position: center;
}

.wrapper {
width: 420px;
background: transparent;
box-shadow: 0 0 10px rgba(0, 0, 0,.2);
color: #fff;
border-radius: 10px;
padding: 30px 40px;
}

.wrapper h1 {
    font-size: 36px;
    text-align: center;
}

.wrapper .input-box {
    position: relative;
    width: 100%;
    height: 50px;
    margin: 30px 0;
}

.input-box input {
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    border: 2px solid rgba(225,225,225,.2);
    border-radius: 40px;
    padding: 20px 45px 20px 20px;
}

.input-box input::placeholder {
    color: #fff;
}

.input-box i {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 20px;
}

.wrapper .remember-forgot {
display: flex;
justify-content: space-between;
font-size: 14.5px;
margin: -15px 0 15px;
}

.remember-forgot label input {
    accent-color: #fff;
    margin-right: 3px;
}

.remember-forgot a {
    color: #fff;
    text-decoration: none;
}

.remember-forgot a:hover {
    text-decoration: underline;
}

.wrapper .btn {
    width: 100%;
    height: 45px;
    background: #fff;
    border: none;
    outline: none;
    border-radius: 40px;
    box-shadow: 0 0 10px rgba(0, 0, 0,.1);
    cursor: pointer;
    font-size: 16px;
    color: #333;
    font-weight: 600;
}

.wrapper .register-link {
    font-size: 14.5px;
    text-align: center;
    margin-top: 20px 0 15px;
}

.register-link p a {
    color: #fff;
    text-decoration: none;
    font-weight: 600;
}

.register-link p a:hover {
    text-decoration: underline;
}
    </style>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <div class="wrapper">
        <form action="login.php" method="post">
            <h1>Login</h1>
            <div class="input-box">
				<input type="text" name="username" id="username"placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
				<input type="password" name="pwd" id="pwd" placeholder="password" required>
                <i class='bx bxs-lock-alt' ></i>
            </div>
			<button type="submit" name="login" value="Login" class="btn">Login</button>
            <div class="register-link"><br>
                <p>Don't have a account? <a href="index.php">Register</a></p>
            </div>

        </form>
    </div>
</body>

</html>
