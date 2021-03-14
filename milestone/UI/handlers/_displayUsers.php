<head>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js">
    </script>
    <style>
    #users {
        font-family: Verdana, Geneva, Tahoma, sans-serif, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #users td,
    #users th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #users tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #users tr:hover {
        background-color: #ddd;
    }

    #users th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: darkgreen;
        color: white;
    }
    </style>
</head>

<body>
    <table id="users">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>Admin</th>
            </tr>
        </thead>
        <tbody> <?php

                for ($x = 0; $x < count($users); $x++) {
                    $y = $users[$x][0];
                    echo "<tr>";
                    echo "<td><a href='../views/userpage.php?user_id=$y'>" . $users[$x][0] . "</a></td>" . "<td>" . $users[$x][1] . "</td>" . "</td>" . "<td>" . $users[$x][2] . "</td>"
                        . "<td>" . $users[$x][3] . "</td>" . "<td>" . $users[$x][4] . "</td>" . "<td>" . $users[$x][5] . "</td>" . "<td>" . $users[$x][6] . "</td>";
                    echo "</tr>";
                }

                ?>
        </tbody>
    </table>

    <script>
    $(document).ready(function() {
        $('#users').DataTable();
    });
    </script>


</body>