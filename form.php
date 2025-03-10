
<?php include("connection.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIGN UP</title>
	<link rel="stylesheet" href="styles.css">
	<script>
    function validateForm(event) {
    	console.log('validateForm function is being executed.');
        var email = document.forms["registrationForm"]["email"].value;
        var password = document.forms["registrationForm"]["password"].value;
        var phone = document.forms["registrationForm"]["phone"].value;

        // Email validation using pattern attribute
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert("Invalid email address");
            event.preventDefault(); // Prevent form submission
            return false;
        }

        // Phone number validation
        var phoneRegex = /^\d{10}$/;
        if (!phoneRegex.test(phone)) {
            alert("Invalid phone number. It should be 10 digits");
            event.preventDefault(); // Prevent form submission
            return false;
        }

        // If all validations pass, the form will be submitted
        return true;
    }
</script>


</head>
<body>
	<div class="container">
		<form name="registrationForm" action="#" method="POST" onsubmit="validateForm(event);" autocomplete="off">
		<div class="title">  
			SIGN UP
		</div>
		<div class="form">
			<div class="input_field">
				<label>First Name:</label>
				<input type="text" class="input" name="fname" required />
			</div>
			<div class="input_field">
				<label>Last Name:</label>
				<input type="text" class="input" name="lname" required/>
			</div>
			<div class="input_field">
				<label>Password:</label>
				<input type="Password" class="input" minlength="6" name="password" placeholder="Min 6 digits" required/>
			</div>
			<div class="input_field">
				<label>Confirm Password:</label>
				<input type="Password" class="input" minlength="6" name="conpassword" placeholder="Min 6 digits" required/>
			</div>
			<div class="input_field">
				<label>Gender:</label>
				<select class="custom_select" name="gender" required>
					<option value="">Select</option>
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select>
			</div>
			<div class="input_field">
				<label>Email:</label>
				<input type="text" class="input" name="email" required/>
			</div>
			<div class="input_field">
				<label>Phone:</label>
				<input type="text" class="input" name="phone" required/>
			</div>
			<div class="input_field">
				<label>Address:</label>
				<textarea class="textarea" name="address" required></textarea>
			</div>
			<div class="input_field terms">
				<label class="check">
					<input type="checkbox" required>
					<span class="checkmark"></span>
				</label>
				<p>Agree to terms and conditions</p>
			</div>
			<div class="input_field">
				<input type="submit" value="register" class="btn" name="register" >
			</div>
		</div>
	   </form>
	</div>
</body>
</html>

<?php
if(isset($_POST['register']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pwd = $_POST['password'];
    $conpwd = $_POST['conpassword'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];


    

    $query = "INSERT INTO FORM (fname,lname,password,cpassword,gender,email,phone,address) VALUES ('$fname','$lname','$pwd','$conpwd','$gender','$email','$phone','$address')";
    $data = mysqli_query($conn, $query);

    if($data)
    {
        echo "<script>alert('Data inserted into the database');</script>";
        header('location:login.php');
;
    }
    else
    {
        echo "fail";
    }
    
    
}
?>
