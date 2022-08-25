<?php
include '../config.php';
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Registration</title>
    <link rel="stylesheet" href="insert.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">   

</head>

<body>
    <div class="preloader" id="preloader">
        <div id="loader"></div>
    </div>

    <!---------------------------------NAVBAR START---------------------------------->
    <navbar id="home"></navbar>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="logo"><a href="http://gcettb.ac.in/" target="blank">GCETTB TPR Admin Portal</a></div>
            <div class = "logout">   
                    <a href="../logout.php" class="text-decoration-none"><button class="logout-button"><h5 class="mb-1 mt-0">Logout</h5></button></a>
            </div>                
            </div>
        </div>
    </nav>

    <div class="f-container">
        <div class="forms-container">
            <div class="signin-signup">
                <?php

        $error_roll = $error_dept = $error_gender = $erdob = $error_phoneno = $error_diploma = $error_grad = $error_class10 = $error_class12 = "";
        $ern = $error_roll = $error_phoneno = $error_gender = $error_resume = $error_class12 = $error_roll = $erdob = "";
        $er = $errorName = false;
        $roll = $dept = $gender = $dob = $phoneNumber = $class10 = $class12 = $diploma = $grad = $resume = "";

        if ($_SERVER['REQUEST_METHOD']=="POST")
        {
            if(isset($_REQUEST['submit']) == true)
            {
                $c1 = $c2 = $c3 = $c4 = $c5 = $c6 = $c7 = $c8 = $c9 = $c10 = 1;

                //========================Writing data into db=============================               
                if(isset($_POST['submit'])) 
                {
                    if(!$er)
                    {
                        if($c1 ==1 && $c2==1 && $c3==1 && $c4==1 && $c5==1 && $c6==1 && $c7==1 && $c8==1 && $c9==1)
                        {
                            $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
                            $result = mysqli_query($conn, $sql);
                            //console_log($result); // not working
                            if ($result->num_rows > 0) 
                            {
                                $sql = "INSERT INTO users (roll, dept, gender, dob, phoneNumber, class10, class12, diploma, grad, resume)
                                        VALUES ('$roll', '$dept', '$gender', '$dob', '$phoneNumber', '$class10', '$class12', '$diploma', '$grad', '$resume')";
                                $result = mysqli_query($conn, $sql);
                                if($result) {
                                    echo "<script>alert('Submission done!')</script>";
                                } else {
                                    echo "<script>alert('Woops! Submission wasn't accepted.')</script>";
                                }
                            } else {
                                echo "<script>alert('Woopsie! Something Wrong Went.')</script>";
                            }                 
                        }
                    }
                }
            }    
        }
?>
                <h1>Working in Progress</h1>
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="form-row">
                        <div class="row">
                            <input type="text" name="roll" id="roll" placeholder="Enter Univ Roll No" required>
                        </div>
                        <div class="row">
                            <input type="text" name="dept" id="dept" placeholder="Enter Department" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="row">
                        <input type="text" name="gender" list="options" placeholder="Enter Gender" required>
                            <datalist id="options">
                                <option value="Female">
                                <option value="Male">
                            </datalist>
                        </div>
                        <div class="row">
                            <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Enter Phone Number" required maxlength="10">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="row">
                            <input type="text" name="class10" id="class10" placeholder="Enter Class 10%" required maxlength="5">
                        </div>
                        <div class="row">
                            <input type="text" name="class12" id="class12" placeholder="Enter Class 12%" required maxlength="5">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="row">
                            <input type="text" name="diploma" id="diploma" placeholder="Enter Diploma %" maxlength="5">
                        </div>
                        <div class="row">
                            <input type="text" name="grad" id="grad" placeholder="Enter YGPA" required maxlength="5">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="row">
                            <input type="text" class="resume" name="resume" id="resume" placeholder="Paste your Resume link" required>
                        </div>
                        <div class="row">
                            <input type="date" name="dob" id="dob" required>
                        </div>
                    </div>

                    <!--<button class="button" type="submit" value="submit" name="submit">Submit</button>-->
                    <div class="input-field button">
                        <input name="submit" type="submit" value="Submit">
                    </div>
                </form>
                <!--<p class="footer text-center pt-4 mt-5">Made by the students of GCETTB '23</p>-->
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Update Data?</h3>
                    <p>
                        If you want to update students data then you just have to click on the below button to update existing records.
                    </p>
                    <a href="update.php"><button class="btn transparent" id="sign-up-btn">
                            Update
                        </button></a>
                </div>
                <img src="../images/log.svg" class="image" alt="" />
            </div>
        </div>
    </div>
    <script type="text/javascript">
        /*setTimeout(function() {
            // Closing the alert 
            $('#alert').alert('close');
        }, 3500);*/

        window.onload = function() {
            var preloader = document.getElementsByClassName('preloader')[0];
            setTimeout(function() {
                preloader.style.display = 'none';
            }, 1000);
        };
    </script>


</body>

</html>
