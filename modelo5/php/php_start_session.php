<?php
	session_start();
	$_SESSION['message'] = '';
	$page_title = 'Register';
	//include('includes/header.html');

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		require('./../mysqli_connect.php');

		$errors = array();

		if(empty($_POST['first_name'])){
			$errors[] = 'olvido colocar su nombres.';
		}else{
			$fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
		}

		if(empty($_POST['last_name'])){
			$errors[] = 'olvido colocar sus apellidos.';
		}else{
			$ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
		}	

		if(empty($_POST['testing_number'])){
			$errors[] = 'olvido colocar codigo de comprobacion.';
		}else{
			$e = mysqli_real_escape_string($dbc,trim($_POST['testing_number']));
		}

		if(empty($_POST['cellphone'])){
			$errors[] = 'olvido colocar codigo de comprobacion.';
		}else{
			$e = mysqli_real_escape_string($dbc,trim($_POST['cellphone']));
		}
		if(empty($_POST['email'])){
			$errors[] = 'olvido colocar su email';
		}else{
			$e = mysqli_real_escape_string($dbc,trim($_POST['email']));
		}

  		

		if(empty($errors)){

			$q = "INSERT INTO users(first_name, last_name, email, pass, registration_date) VALUES('$fn', '$ln', '$e', SHA1('$p'), NOW())";
			$r = @mysqli_query($dbc, $q);
			if($r){
				echo '<h1> Thank you! </h1>
				<p> you are now registered. In Chapter 12 you will actually be able to log in! </p><p></br></p>';

			}else{
				echo '<h1>System Error</h1>
				<p class="error"> You could not be registered due to a system error. We apolozige for any inconvenience.</p>';

				echo '<p>' . mysqli_error($dbc) . '<br /><br />Query : ' . $q . '</p>';
			}

			mysqli_close($dbc);
			include('includes/footer.html');
			exit();

		}else{

			echo '<h1>Error!</h1>
			<p class="error">The following error(s) occurred:<br />';
			foreach ($errors as $msg) {
				echo " - $msg<br />\n";
			}
			echo '</p><p>Please try again.</p><p><br /></p>';
		}
		mysqli_close($dbc);
	}


?>