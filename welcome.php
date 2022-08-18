<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['logout'])) {
    session_destroy();
	header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="style.css">

    <title>Welcome</title>
</head>

<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <div class="title"><?php echo "Welcome " . $_SESSION['username']; ?></div>

                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                    
                    <div class="input-field button">
                        <input name="logout" type="submit" value="Logout">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>