<?php
require_once 'Database.php';

class UserDataService
{
    function findByUserName($n)
    {
        $db = new Database();

        $sql = "SELECT * FROM users WHERE username LIKE '%$n%';";
        $con = $db->getConnection();

        $result = $con->query($sql);

        if (!$result) {
            //      echo "assume there is an SQL statement error";
            exit;
        }

        if ($result->num_rows == 0) {
            return null;
        } else {
            // echo "I found " . $result->num_rows . " results<br>";

            $index = 0;
            $users = array();
            while ($row = $result->fetch_assoc()) {
                $users[$index] = array($row['user_id'], $row['first_name'], $row['last_name'], $row['username'], $row['pass'], $row['email'], $row['admin']);
                ++$index;
            }
            return $users;
        }
    }

    function findByUserID($id)
    {
        $db = new Database();
        // echo "<br>and now i'm here";
        $sql = "SELECT * FROM users WHERE user_id = '$id';";
        $con = $db->getConnection();

        $result = $con->query($sql);

        if (!$result) {
            echo "assume there is an SQL statement error";
            exit;
        }
        // echo "<br> and i got a result";

        if ($result->num_rows == 0) {
            echo "<br>num rows == 0";
            return null;
        } else {
            // echo "I found " . $result->num_rows . " results<br>";



            while ($row = $result->fetch_assoc()) {
                // echo "bump";
                $user = new User($row['user_id'], $row['first_name'], $row['last_name'], $row['email'], $row['username'], $row['pass'], $row['admin']);
            }
            // echo $product->getName();
            return $user;
        }
    }

    function findUserAddress($id)
    {
        $db = new Database();
        $con = $db->getConnection();


        $sql = "SELECT address_id FROM user_addresses WHERE user_id = '$id';";
        $result = $con->query($sql);

        if (!$result) {
            echo "<br>no user address<br>";
            return null;
        } else {

            while ($row = $result->fetch_assoc()) {
                $addy = $row['address_id'];
            }

            return $addy;
        }
    }
}