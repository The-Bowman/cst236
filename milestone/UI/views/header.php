<?php
session_start();
$loginstatus = $_SESSION['loggedIn'];
$adminStatus = $_SESSION['admin'];
?>
<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MLS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../views/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="loginBtn" onclick="loginOrOut()" style="cursor: pointer;">Login</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="../handlers/logout.php">Logout</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="../views/showCart.php">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../handlers/productSearchHandler.php">All Products</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Admin
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../views/admin.php">Admin</a></li>
                            <li><a class="dropdown-item" href="../views/salesReportCreator.php">Sales Report</a></li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" id="adminLink" href="../views/admin.php">Admin</a>
                            </li> -->

                        </ul>
                    </li>
                    <form class="d-flex" action="../handlers/productSearchHandler.php">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="productName">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
            </div>
        </div>
    </nav>
    <script>
    var x = <?php echo json_encode($loginstatus); ?>;
    var y = <?php echo json_encode($adminStatus); ?>;
    if (x == true) {
        document.getElementById("loginBtn").innerHTML = "Logout";
    }
    if (y != 1) {
        document.getElementById("navbarDropdown").style.visibility = "hidden";
    }

    function loginOrOut() {
        if (x == true) {
            location.href = "../handlers/logout.php";
        } else {
            location.href = "../views/login.php";
        }

    }
    </script>
</head>

</html>