<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Employee Dashboard</title>
</head>

<body>
<?php 
    session_start();
    $loginID=$_SESSION['id'];
    include 'connect.php';

    $query="SELECT  empName, DoJ, salary, department, mobileNo, email, passwd FROM emp WHERE empID ='".$loginID."' ";
    $empID      = $loginID;


if($result = $conn->query($query)) 
  {
    while ($row = $result->fetch_assoc())
      {
        $empName    = $row["empName"];
        $DoJ        = $row["DoJ"];
        $salary     = $row["salary"];
		$dept       = $row["department"];
		$mob        = $row["mobileNo"];
		$email      = $row["email"];
        $passwd     = $row["passwd"];
      }
    if($loginID==$_SESSION['id'])
    {
      echo '<div>
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <div class="container-fluid">
              <a class="navbar-brand" href="#">Welcome '.$empName.'</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  </ul>
                  <form method="post">
                      <button type="submit" class="btn text-light btn-outline-info bg-secondary" name="lgt">Logout</button>
                  </form>
              </div>
          </div>
      </nav>
      <div class="container-fluid my-2">
          <table class="table table-sm table-striped th-sm ">
              <tbody>
                  <tr>
                      <td colspan="2"><strong>Employee Name</strong></td>
                      <td>'.$empName.'</td>
                  <tr>
                      <td colspan="2"><strong>Employee ID</strong></td>
                      <td>'.$empID.'</td>
                  </tr>
                  <tr>
                      <td colspan="2"><strong>Password</strong></td>
                      <td>'.$passwd.'</td>
                  </tr>
                  <tr>
                      <td colspan="2"><strong>Date of Joining</strong></td>
                      <td>'.$DoJ.'</td>
                  </tr>
                  <tr>
                      <td colspan="2"><strong>Salary</strong></td>
                      <td>'.$salary.'</td>
                  </tr>
                  <tr>
  
                      <td colspan="2"><strong>Email</strong></td>
                      <td>'.$email.'</td>
                  </tr>
                  <tr>
  
                      <td colspan="2"><strong>Mobile No.</strong></td>
                      <td>'.$mob.'</td>
                  </tr>
                  <tr>
                      <td colspan="2"><strong>Department</strong></td>
                      <td>'.$dept.'</td>
                  </tr>               
              </tbody>
          </table>
      </div>
      <center>
          <button type="button" class="btn btn-info btn-lg btn-block" data-bs-toggle="modal" data-bs-target="#loginModal">
          Update Your Profile
          </button>
      </center>
      <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="loginModalLabel">Update Your Profile</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form  method="post" action="profile.php">
                          <div class="form-group">
                              <label for="loginInputEmail1">New Email address</label>
                              <input type="email" class="form-control" name="newEmail" aria-describedby="emailHelp" required>
                          </div>
                          <div class="form-group">
                              <label for="loginInputPassword1">New Mobile No.</label>
                              <input type="text" class="form-control" name="newMob" required>
                          </div>
                          <button type="submit" class="btn btn-primary mx-2" name="update">Update</button>
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>
  
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
          crossorigin="anonymous"></script>
        </div>';
        $result->free();
    }
    else
    {
        ?>
        <script>
            alert('Connection Reloded! login again');
            document.location('login.php');
        </script>
        <?php
    }
  } 
  else
  {
    // echo "Error: " . $sql . "<br>" . $conn->error;
    ?>
        <script>
            alert('Connection Error! Try to login again');
            document.location('login.php');
        </script>
        <?php
  }

  if (isset($_POST['update']))
  { 
        $newemail = $_POST['newEmail']; 
        $newmob   = $_POST['newMob'];
        $sql = "UPDATE emp SET email = '".$newemail."', mobileNo = '".$newmob."' WHERE empID='".$loginID."'";

        if($conn->query($sql) === TRUE)
        {
            ?>
                <script>
                    alert('Profile Updated Sucessfully');
                    document.location='profile.php'
                </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert('Something went wrong. Please try again');
                document.location='profile.php'
            </script>
            <?php
        }


   }

    $conn->close();
?> 


<?php
// update profile button action
    if(isset($_POST['lgt'])) 
    {
         session_destroy();
         unset($_SESSION['empID']);
         ?>
             <script>
                 alert('Logged Out Successfully!');
                 document.location='login.php';
             </script>
         <?php
 
    }

?>

</body>
</html>



