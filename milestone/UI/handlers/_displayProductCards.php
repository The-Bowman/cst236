<?php
session_start();
$admin = $_SESSION['admin'];
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body> </body>

<div class="card-group">


    <?php
    for ($x = 0; $x < count($products); $x++) {

    ?>

    <div class="col-12 col-sm-6 col-md-4 col-lg-3">

        <div class="card border-deck">
            <img class="card-img-top" src="<?php echo $products[$x][5]; ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?php echo $products[$x][1]; ?></h5>
                <p class="card-text"><?php echo $products[$x][2]; ?></p>
                <p class="card-text">Price: $<?php echo $products[$x][4]; ?></p>
                <p class="card-text"><?php if ($products[$x][3] > 0) {
                                                echo "In Stock";
                                            } else {
                                                echo "Not Currently Available";
                                            } ?>

                <form action="addToCart.php">
                    <input type="hidden" name="prod_id" value="<?php echo $products[$x][0]; ?>">
                    <input class="btn btn-primary" type="submit" value="Add to Cart">
                </form>
                <form id="adminLink" action="../views/productpage.php">
                    <input type="hidden" name="prod_id" value="<?php echo $products[$x][0]; ?>">
                    <input class="btn btn-secondary" type="submit" value="Edit Product">
                </form>
            </div>
        </div>


    </div>


    <?php
    }
    ?>
    <script>
    let x = <?php echo json_encode($admin); ?>;
    if (x != 1) {
        document.getElementById("adminLink").style.visibility = "hidden";
    }
    </script>
</div>