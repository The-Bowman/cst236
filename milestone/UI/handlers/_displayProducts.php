<head>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js">
    </script>
    <style>
    #products {
        font-family: Verdana, Geneva, Tahoma, sans-serif, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #products td,
    #products th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #products tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #products tr:hover {
        background-color: #ddd;
    }

    #products th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: indigo;
        color: white;
    }
    </style>
</head>

<body>
    <table id="products">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody> <?php

                for ($x = 0; $x < count($products); $x++) {
                    $y = $products[$x][0];
                    echo "<tr>";
                    echo "<td><a href='../views/productpage.php?productID=$y'>" . $products[$x][0] . "</a></td>" . "<td>" . $products[$x][1] . "</td>" . "</td>" . "<td>" . $products[$x][2] . "</td>"
                        . "<td>" . $products[$x][3] . "</td>" . "<td>" . $products[$x][4] . "</td>" . "<td>" . $products[$x][5] . "</td>";
                    echo "</tr>";
                }

                ?>
        </tbody>
    </table>

    <script>
    $(document).ready(function() {
        $('#products').DataTable();
    });
    </script>


</body>