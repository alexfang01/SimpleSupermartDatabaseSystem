<?php



include 'conn.php';

$type2 = $_POST['type'];

if ($stmt = $con->prepare('SELECT id, password,type FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $password,$type);
		$stmt->fetch();
		// Account exists, now we verify the password.
		// Note: remember to use password_hash in your registration file to store the hashed passwords.
		if ($_POST['password'] === $password) {
			// Verification success! User has logged-in!
			// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
			if ($type == $type2)
			{
				session_regenerate_id();
				$_SESSION['loggedin'] = TRUE;
				$_SESSION['name'] = $_POST['username'];
				$_SESSION['id'] = $id;
				$_SESSION['type'] = $type;
					if ($type=='a')
					{
					echo nl2br("Login Successfully!\n");
					echo 'Welcome admin : ' . $_SESSION['name'] . '!';
					header('Refresh:3; url=admin.php');
					}
					else
					{
					echo nl2br("Login Successfully!\n");
					echo 'Welcome user : ' . $_SESSION['name'] . '!';
					header('Refresh:3; url=user.php');
					}
			} else{
				echo 'Incorrect roles';
				header("Refresh:3; url=index.php");
			}
					
		} else {
			// Incorrect password
			echo 'Incorrect password';
			header("Refresh:3; url=index.php");
		}
	} else {
		// Incorrect username
		echo 'No such username exist';
		header("Refresh:3; url=index.php");
	}

	$stmt->close();
}
?>