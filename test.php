<?php 
session_start(); 
include "db_connection.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$pass = validate($_POST['password']);

	if (empty($username)) {
		header("Location: index.php?error=Username is required.");
	    exit();

	}else if(empty($pass)) {
        header("Location: index.php?error=Password is required.");
	    exit();
	}else{
		$sql = "SELECT * FROM users WHERE user_name='$username' AND password='$pass' AND role= 'Admin'";
		$result_admin = mysqli_query($connect, $sql);

		$sql = "SELECT * FROM users WHERE user_name='$username' AND password='$pass' AND role= 'Chairman'";
		$result_chairman = mysqli_query($connect, $sql);

        $sql = "SELECT * FROM users WHERE user_name='$username' AND password='$pass' AND role= 'Mayor'";
		$result_mayor = mysqli_query($connect, $sql);

        $sql = "SELECT * FROM users WHERE user_name='$username' AND password='$pass' AND role= 'Congressman'";
		$result_congressman = mysqli_query($connect, $sql);

        $sql = "SELECT * FROM users WHERE user_name='$username' AND password='$pass' AND role= 'Governor'";
		$result_governor = mysqli_query($connect, $sql);

		if (mysqli_num_rows($result_admin) === 1) {
			$row = mysqli_fetch_assoc($result_admin);
            if ($row['user_name'] === $username && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
				$_SESSION['role'] = $row['role'];
            	header("Location: views/admin/dashboard.php");
		        exit();
            }
		}
        
        else if (mysqli_num_rows($result_chairman) === 1) {
				$row = mysqli_fetch_assoc($result_chairman);
				if ($row['user_name'] === $username && $row['password'] === $pass) {
					$_SESSION['user_name'] = $row['user_name'];
					$_SESSION['name'] = $row['name'];
					$_SESSION['id'] = $row['id'];
					$_SESSION['role'] = $row['role'];
					header("Location: views/chairman/dashboard.php");
					exit();
				}
			}	
            

            else if (mysqli_num_rows($result_mayor) === 1) {
				$row = mysqli_fetch_assoc($result_mayor);
				if ($row['user_name'] === $username && $row['password'] === $pass) {
					$_SESSION['user_name'] = $row['user_name'];
					$_SESSION['name'] = $row['name'];
					$_SESSION['id'] = $row['id'];
					$_SESSION['role'] = $row['role'];
					header("Location: views/mayor/dashboard.php");
					exit();
				}
			}	

            else if (mysqli_num_rows($result_congressman) === 1) {
				$row = mysqli_fetch_assoc($result_congressman);
				if ($row['user_name'] === $username && $row['password'] === $pass) {
					$_SESSION['user_name'] = $row['user_name'];
					$_SESSION['name'] = $row['name'];
					$_SESSION['id'] = $row['id'];
					$_SESSION['role'] = $row['role'];
					header("Location: views/congressman/dashboard.php");
					exit();
				}
			}	

            else if (mysqli_num_rows($result_governor) === 1) {
				$row = mysqli_fetch_assoc($result_governor);
				if ($row['user_name'] === $username && $row['password'] === $pass) {
					$_SESSION['user_name'] = $row['user_name'];
					$_SESSION['name'] = $row['name'];
					$_SESSION['id'] = $row['id'];
					$_SESSION['role'] = $row['role'];
					header("Location: views/governor/dashboard.php");
					exit();
				}
			}	
            
			else {
				header("Location: index.php?error=Incorrect username or password.");
		        exit();
			}
		}
	}
	