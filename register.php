<?php 
  require('connect.php');
// Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
      
if (isset($_POST['registerbtn']) && $_POST['randcheck']==$_SESSION['rand'])
{ 
    // get all of the form data 
    $empName = $_POST['empName']; 
    $empID = $_POST['empID']; 
    $email = $_POST['email']; 
	$mobileNo = $_POST['mobileNo']; 
	$department = $_POST['department'];
	$DoJ = $_POST['DoJ']; 
	$salary = $_POST['salary']; 
    $passwd = $_POST['passwd'];  

 // insert the user into the database
  $sql = "INSERT INTO emp (empName, empID, email, mobileNo, department, DoJ, salary, passwd) VALUES (
    '$empName', '$empID', '$email', '$mobileNo', '$department', '$DoJ', '$salary','$passwd')";	

  if ($conn->query($sql) === TRUE){
    $conn->close();
    ?>
      <script>
          alert( "New record created successfully");
          document.location='login.php';
          </script>
    <?php
  } else {
  // echo "Error: try again" . $sql . "<br>" . $conn->error;
      $conn->close();
      ?>
        <script>
            alert('Somthing Wrong, try again');
            document.location='register.php';
          </script>
      <?php
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Register</title>
        <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/assets/fonts/fontawesome5-overrides.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
        <script src="/assets/js/theme.js"></script>
    </head>

    <body class="bg-gradient-primary">
        <div class="container">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4">Create an Account!</h4>
                                </div>
                                <form class="user" method="post" action="#">
                                    <?php 
                                        $rand=rand();$_SESSION['rand']=$rand;
                                    ?>
                                    <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
                                    <div class="form-group">
                                        <!-- Start: Name --><input class="form-control form-control-user" type="text"
                                            id="InputEmail-1" placeholder="Name"
                                            name="empName" required><!-- End: Name -->
                                    </div>
                                    <div class="form-group">
                                        <!-- Start: Employee ID --><input class="form-control form-control-user"
                                            type="text" id="inputEmployeeId" placeholder="Employee ID" name="empID"
                                            required>
                                        <!-- End: Employee ID -->
                                    </div>
                                    <div class="form-group">
                                        <!-- Start: Email --><input class="form-control form-control-user" type="email"
                                            id="InputEmail-1" aria-describedby="emailHelp" placeholder="Email Address"
                                            name="email" required><!-- End: Email -->
                                    </div>
                                    <div class="form-group">
                                        <!-- Start: Salary --><input class="form-control form-control-user"
                                            type="number" id="inputSalary" placeholder="Salary" name="salary" required>
                                        <!-- End: Salary -->
                                    </div>
                                    <div class="form-group">
                                        <!-- Start: Department --><input class="form-control form-control-user"
                                            type="text" id="inputDepartment" placeholder="Department" name="department"
                                            required>
                                        <!-- End: Department -->
                                    </div>
                                    <div class="form-group">
                                        <!-- Start: Mobile No. --><input class="form-control form-control-user"
                                            type="tel" id="inputMobile" placeholder="Mobile No." name="mobileNo"
                                            required>
                                        <!-- End: Mobile No. -->
                                    </div>
                                    <div class="form-group">
                                        <!-- Start: DoJ --><input class="form-control form-control-user"  type="date" id="inputDoj" placeholder="Date of Joining" name="DoJ" required>
                                        <!-- End: DoJ -->
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <!-- Start: password --><input class="form-control form-control-user"
                                                type="password" id="PasswordInput" placeholder="Password"
                                                name="passwd" required><!-- End: password -->
                                        </div>
                                    </div><button class="btn btn-primary btn-block text-white btn-user"
                                        name="registerbtn" type="submit">Register Account</button>
                                    <hr>
                                    <div class="text-center"><a class="small" href="login.php">Already have an
                                            account?
                                            Login</a></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
