<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['logout'])) {
    session_destroy();
	header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>GCETTB TPO - Home</title>
    <link rel="stylesheet" href="admin.css">
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
                    <a href="../logout.php" class="text-decoration-none"><button class="button"><h5 class="mb-1 mt-0">Logout</h5></button></a>
            </div>                
            </div>
        </div>
    </nav>
    
    <!-------------------------------SERVICES START-------------------------------->

    <section id="services" class="container-fluid">
    <div class="title"><h1><?php echo "Welcome " . strtok($_SESSION['username'], " ") . " to TPR Admin Portal"; ?></h1></div>
        <div class="container services mt-3">
            <div class="row">
                <div class="container col-12 services-container">
                    <div class="col-md-4">
                        <div class="service-box text-center color3">
                            <img src="../images/insert.png" alt="Insert Data" width=60 />
                            <i class="uil uil-database"></i>
                            <a href="../common/insert.php" class="text-decoration-none"><button class="button"><h3 class="mb-1 mt-0">Insert Data</h3></button></a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="service-box text-center color1">
                            <img src="../images/show.png" alt="show Data" width=60 />
                            <a href="show.php" class="text-decoration-none"><button class="button"><h3 class="mb-1 mt-0">Show Data</h3></button></a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="service-box text-center color2">
                            <img src="../images/update.png" alt="update Data" width=60 />
                            <a href="update.php" class="text-decoration-none"><button class="button"><h3 class="mb-1 mt-0">Update Data</h3></button></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service-box text-center color3">
                            <img src="../images/delete.png" alt="delete Data" width=60 />
                            <a href="delete.php" class="text-decoration-none"><button class="button"><h3 class="mb-1 mt-0">Delete Data</h3></button></a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="service-box text-center color1">
                            <img src="../images/search.png" alt="search Data" width=60 />
                            <a href="search.php" class="text-decoration-none"><button class="button"><h3 class="mb-1 mt-0">Search Data</h3></button></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service-box text-center color2">
                            <img src="../images/notify.png" alt="search Data" width=60 />
                            <a href="search.php" class="text-decoration-none"><button class="button"><h3 class="mb-1 mt-0">Drive Details</h3></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="footer text-center">Made by the students of GCETTB '23</p>
    </section>

    <!-------------------------------JS CODE---------------------------------->
    <script>
        window.onload = function() {
            var preloader = document.getElementsByClassName('preloader')[0];
            setTimeout(function() {
                preloader.style.display = 'none';
            }, 1000);
        };
    </script>
</body>

</html>
