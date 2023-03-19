<html lang="en">
  <head>
  <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/rsflips/rsflips1/includes/header.inc.php'; ?>
    <title>RsFlips</title>
  </head>
  <body>
  <div class="register">
			<h1>Register</h1>
            <p> The only information we can see is your email and username everything else is hashed </p>
			<form action="register.php" method="post" autocomplete="off">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<label for="email">
					<i class="fas fa-envelope"></i>
				</label>
				<input type="email" name="email" placeholder="Email" id="email" required>
				<input type="submit" value="Register">
			</form>
            <div>
                <h3>Already have an account?</h3>
                <p>Login <a href="login.php"> on this page</a> </p>
            </div>
		</div>
  </body>
</html>


<?php
   // Now we check if the data was submitted, isset() function will check if the data exists.
   if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
       // Could not get the data that should have been sent.
       exit('Please complete the registration form!');
   }
   // Make sure the submitted registration values are not empty.
   if (
       empty($_POST['username']) ||
       empty($_POST['password']) ||
       empty($_POST['email'])
   ) {
       // One or more values are empty.
       exit('Please complete the registration form');
   }
   // We need to check if the account with that username exists.
   if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	exit('Email is not valid!');
    }
    if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {
        exit('Username is not valid!');
    }
    if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        exit('Password must be between 5 and 20 characters long!');
    }
   if (
       $stmt = $con->prepare(
           'SELECT id, password FROM accounts WHERE username = ?'
       )
   ) {
       // Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
       $stmt->bind_param('s', $_POST['username']);
       $stmt->execute();
       $stmt->store_result();
       // Store the result so we can check if the account exists in the database.
       if ($stmt->num_rows > 0) {
           // Username already exists
           echo 'Username exists, please choose another!';
       } else {
           // Username doesn't exists, insert new account
           if (
               $stmt = $con->prepare(
                   'INSERT INTO accounts (username, password, email, admin) VALUES (?, ?, ?, 2)'
               )
           ) {
               // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
               $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
               $stmt->bind_param(
                   'sss',
                   $_POST['username'],
                   $password,
                   $_POST['email']
               );
               $stmt->execute();
               
               echo 'You have successfully registered! You can now login!';
               header("Location: login.php");
           } else {
               // Something is wrong with the SQL statement, so you must check to make sure your accounts table exists with all 3 fields.
               echo 'Could not prepare statement!';
           }
       }
       $stmt->close();
   } else {
       // Something is wrong with the SQL statement, so you must check to make sure your accounts table exists with all 3 fields.
       echo 'Could not prepare statement!';
   }
   $con->close();
   ?>