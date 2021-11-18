<?php
    session_start();
    include 'connect.php';
    if(isset($_POST['submit']) && $_POST['randcheck']==$_SESSION['rand']){
    $empID = $_POST['empID'];
    $passwd = $_POST['passwd'];
    $query=mysqli_query($conn,"SELECT * FROM emp WHERE empID = '$empID' AND passwd = '$passwd'");
    $num_rows=mysqli_num_rows($query);
    $row=mysqli_fetch_array($query);
        if ($num_rows>0)
        {
            $_SESSION['id']=$row['empID'];
            ?>
            <script>
                document.location='profile.php';
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert('Invalid Username or Password');
                document.location='login.php';
            </script>
            <?php
        }
    }
?>

<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>

    <head>
        <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/assets/fonts/fontawesome5-overrides.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
        <script src="/assets/js/theme.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            import url('https://fonts.googleapis.com/css2?family=Comfortaa&display=swap');

            body
            {
                background: linear-gradient(90deg, #4b6cb7 0%, #182848 100%);
            }
            .signup{
                color: blue;
            }

            .login {
                width: 360px;
                padding: 8% 0 0;
                margin: auto;
                font-family: 'Comfortaa', cursive;
            }

            .form {
                position: relative;
                z-index: 1;
                background: #FFFFFF;
                border-radius: 10px;
                max-width: 400px;
                margin: 0 auto 100px;
                padding: 45px;
                text-align: center;
            }

            .form input {
                outline: 0;
                background: #f2f2f2;
                width: 100%;
                border: 0;
                border-radius: 5px;
                margin: 0 0 15px;
                padding: 15px;
                box-sizing: border-box;
                font-size: 14px;
                font-family: 'Comfortaa', cursive;
            }

            .form input:focus {
                background: #dbdbdb;
            }

            .form button {
                font-family: 'Comfortaa', cursive;
                text-transform: uppercase;
                outline: 0;
                background: #4b6cb7;
                width: 100%;
                border: 0;
                border-radius: 5px;
                padding: 15px;
                color: #FFFFFF;
                font-size: 14px;
                -webkit-transition: all 0.3 ease;
                transition: all 0.3 ease;
                cursor: pointer;
            }

            .form button:active {
                background: #395591;
            }

            .form span {
                font-size: 75px;
                color: #4b6cb7;
            }
        </style>
    </head>

    <body class="bg-gradient-primary">
        <form method="post" action="#"> 
            <?php 
            $rand=rand();$_SESSION['rand']=$rand;
            ?>
            <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
            <div class="login">
                <div class="form">
                    <form class="login-form">
                        <span class="material-icons">Login</span>
                        <input type="text" placeholder="Employee Id" name="empID" required />
                        <input type="password" name="passwd" placeholder="password" required />
                        <button type="submit" name="submit">login</button>
                        <hr/>
                        <p>Don't have account! <a href="SignUP_action.php" class="signup">Signup</a></p>
                    </form>
                </div>
            </div>
        </form>
    </body>

</html>



	  