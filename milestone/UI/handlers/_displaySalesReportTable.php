<head>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js">
    </script>
    <style>
    #report {
        font-family: Verdana, Geneva, Tahoma, sans-serif, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #report td,
    #report th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #report tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #report tr:hover {
        background-color: #ddd;
    }

    #report th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: blue;
        color: white;
    }
    </style>
</head>

<body>
    <table id="report">
        <thead>
            <tr>
                <th>ID</th>
                <th>Time of Sale</th>
                <th>User ID of Buyer</th>
                <th>Quantity Sold</th>
                <th>Order Total</th>
            </tr>
        </thead>
        <tbody> <?php

                for ($x = 0; $x < count($report); $x++) {
                    // $y = $report[$x][0];
                    echo "<tr>";
                    echo "<td>" . $report[$x][0] . "</a></td>" . "<td>" . $report[$x][1] . "</td>" . "</td>" . "<td>" . $report[$x][2] . "</td>"
                        . "<td>" . $report[$x][3] . "</td>" . "<td>" . $report[$x][4] . "</td>";
                    echo "</tr>";
                }

                ?>
        </tbody>
    </table>
    <a href="processSalesReportJSON.php?=startDate=<?php echo $start; ?>&endDate=<?php echo $end; ?>">View JSON</a>
    <br />
    <a href="../views/index.php">Home</a>
    <script>
    $(document).ready(function() {
        $('#report').DataTable();
    });
    </script>
</body>