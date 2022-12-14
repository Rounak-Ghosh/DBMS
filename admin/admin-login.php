<?php

include '../config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

if (isset($_POST['signup'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
    $key = $_POST['key'];
    $usertype = 'admin';

    if($key == '23@gcettb') {
        if ($password == $cpassword) {
            $sql = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            if (!$result->num_rows > 0) {
                $sql = "INSERT INTO users (username, email, password, usertype)
                        VALUES ('$username', '$email', '$password', '$usertype')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>alert('Wow! User Registration Completed.')</script>";
                    $username = "";
                    $email = "";
                    $_POST['password'] = "";
                    $_POST['cpassword'] = "";
                } else {
                    echo "<script>alert('Woops! Something Wrong Went.')</script>";
                }
            } else {
                echo "<script>alert('Woops! Email Already Exists.')</script>";
            }
    
        } else {
            echo "<script>alert('Password Not Matched.')</script>";
        }
    } else {
        echo "<script>alert('Unauthorized personnel. Admin access denied.')</script>";
    }
}


if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
    
	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        if ($row['usertype'] == "admin") {
            header("Location: admin-home.php");
        } else {
            echo "<script>alert('Unauthorized personnel. Admin access denied.')</script>";    
        }
    } else {
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/bundle.css"> 
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/solid.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/thinline.css"> -->

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="../style.css">
         
    <title>Admin Login</title>
</head>
<body>
    <div class="preloader" id="preloader">
        <div id="loader"></div>
    </div>
    <div class="container">
        <div class="forms">
            
            <!-- Login Form -->
            <div class="form login">
                <span class="title">Login as Admin</span>

                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" name="email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Enter your password" name="password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="input-field button">
                        <input name="login" type="submit" value="Login">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="#" class="text signup-link">Signup Now</a>
                    </span>
                </div>
            </div>

            <!-- Registration Form -->
            <div class="form signup">
                <span class="title">Register as Admin</span>

                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your full name" name="username" value="<?php echo $username; ?>" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" name="email" value="<?php echo $email; ?>" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Create a password" name="password" value="<?php echo $_POST['password']; ?>" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Confirm a password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="input-field">
                        <input type="security" class="security" placeholder="Enter security key" name="key" value="<?php echo $_POST['key']; ?>" required>
                        <i class="uil uil-key-skeleton-alt"></i>
                    </div>

                    <div class="input-field button">
                        <input name="signup" type="submit" value="Signup">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Already a member?
                        <a href="#" class="text login-link">Login Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script>
        const container = document.querySelector(".container"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");

    //   js code to show/hide password and change icon
    pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })

    // js code to appear signup and login form
    signUp.addEventListener("click", ( )=>{
        container.classList.add("active");
    });
    login.addEventListener("click", ( )=>{
        container.classList.remove("active");
    });

    window.onload = function() {
        var preloader = document.getElementsByClassName('preloader')[0];
        setTimeout(function() {
            preloader.style.display = 'none';
        }, 1000);
    };
    </script>
</body>
</html>

