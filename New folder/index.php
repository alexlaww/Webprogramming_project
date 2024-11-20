<?php
	include('config/config.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>form</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style type="text/css">
		.container{
			margin-top: 8%;
			width: 400px;
			border: ridge 1.5px white;
			padding: 20px;
		}
		body{
			background: #E0EAFC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #CFDEF3, #E0EAFC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #CFDEF3, #E0EAFC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

		}
	</style>
</head>
<body>

	<div>
		<?php
			if(isset($_POST['create'])){
				$firstname  = $_POST['firstname'];
				$lastname   = $_POST['lastname'];
				$phoneno    = $_POST['phoneno'];
				$email      = $_POST['email'];
				$password   = $_POST['password'];
				
				$sql_insert_statement2 ="insert into 
					sign_up(first_name,last_name,phone_num,email,pass)
					values('".$firstname."','".$lastname."','".$phoneno ."','".$email."','".$password."')";
								

				if ($conn->query($sql_insert_statement2) === TRUE) {
				 echo "scuess insert table";
				}else{
					 echo "create insert error";
				}
				echo $firstname ." ".$lastname ." ".$phoneno ." ".$email ." ".$password; 
			}
			if(isset($_POST['update'])){
				$firstname  = $_POST['firstname'];
				$lastname   = $_POST['lastname'];
				$phoneno    = $_POST['phoneno'];
				$email      = $_POST['email'];
				$password   = $_POST['password'];
				$employee_id   = $_POST['empoyee_id'];
				$update_statement= "update employee_information set employee_name='".$firstname."',
									employee_email='".$email."',
									employee_ic='".$password."' where employee_id=".$employee_id;

				if ($conn->query($update_statement) === TRUE) {
				 echo "scuess update table";
				}else{
					 echo "create ypdate error";
				}
			}

		?>
		<?php
    //to get the url parameter value
    if(isset($_GET['edit_id'])){
        echo $_GET['edit_id'];
		$_SESSION['edit_id'] = $_GET['edit_id'];
		echo "Session id:".$_SESSION['edit_id'];
		setcookie('edit_id',$_GET['edit_id'] );
		echo "cookie:".$_COOKIE['edit_id'];
        $select_whre_statement="select * from employee_information where employee_id=".$_GET['edit_id'];
        $result_slect = $conn->query($select_whre_statement);
        if ($result_slect->num_rows > 0) {
            while($data = $result_slect->fetch_assoc()) {
                $employee_id=$data['employee_id'];
                $employee_name=$data['employee_name'];
                $employee_ic=$data['employee_ic'];
                $employee_email=$data['employee_email'];
                $employee_contact=$data['employee_contact'];
            }
        }

    }

?>
	</div>
	<div class="container">
		<h2>Registration Form</h2>
	<form action="" method="post">
		<div class="form-group">
    <label for="firstname">First Name</label>
    <input type="text" class="form-control" id="exampleInputfirstname" name="firstname" value="<?php if(isset($_GET['edit_id'])){ echo $employee_name; }?>">
  </div>
  <div class="form-group">
    <label for="lastname">Last Name</label>
    <input type="text" class="form-control" id="exampleInputlastname" name="lastname" value="">
  </div>
  <div class="form-group">
    <label for="phoneno">Phone Number</label>
    <input type="text" class="form-control" id="exampleInputphoneno" name="phoneno" value="<?php if(isset($_GET['edit_id'])){ echo $employee_contact; }?>">
  </div>
  <div class="form-group">
    <label for="Email1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php if(isset($_GET['edit_id'])){ echo $employee_email; }?>">
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword" name="password" value="<?php if(isset($_GET['edit_id'])){ echo $employee_ic; }?>">
  </div>
  <?php
	if(isset($_GET["edit_id"])){
		echo "<input type='hidden' name='empoyee_id' value=".$employee_id.">";
		echo '<button type="submit" class="btn btn-primary" name="update" value="update">Sign up</button>';
	}else{
		echo '<button type="submit" class="btn btn-primary" name="create" value="create">Sign up</button>';
	}
	
  ?>
 <!-- <button type="submit" class="btn btn-primary" name="create">Sign up</button>-->
</form>

<?php include("list_employeesdetails.php"); ?>
</div>
</body>
</html>
