<?php
require_once 'header.php';
session_start();
if (!isset($_SESSION['loggedIn']) && $_SESSION['admin'] != 1) {
    header('location: index.php?=must_be_admin');
}
require 'C:\MAMP\htdocs\cst236\milestone\Services\UserBusinessService.php';
?>

<html>

<head>
    <style>
    html {
        text-align: center;
    }
    </style>
</head>

<body>
    <?php
    $user = new UserBusinessService();
    $result = $user->getUserByID($_GET['user_id']);
    ?>
    <div class="registerPos">
        <div class="formHeader">
            <h3>Edit Account</h3>
            <a href="../handlers/updateUserHandler.php">handlerpage</a>
        </div>
        <form action="../handlers/updateUserHandler.php" method="POST">
            <div class="label">
                <input type="hidden" name="id" value="<?php echo $_GET['user_id']; ?>">
                <label for="firstName">First Name: </label>
                <input type="text" name="firstName" value="<?php echo $result->getFirst(); ?>" required><br><br>
                <label for="lastName">Last Name: </label>
                <input type="text" name="lastName" value="<?php echo $result->getLast(); ?>" required><br><br>
                <label for="email">E-Mail: </label>
                <input type="email" name="email" value="<?php echo $result->getEmail(); ?>" required><br><br>
                <label for="userName">Username: </label>
                <input type="text" name="userName" value="<?php echo $result->getUsername(); ?>" required><br><br>
                <label for="password">Enter Password: </label>
                <input type="text" name="password" value="<?php echo $result->getPassword(); ?>" required><br><br>
                <label for="confirmpass">Confirm Password: </label>
                <input type="text" name="confirmpass" value="<?php echo $result->getPassword(); ?>" required><br><br>
                <input class="button" type="submit" value="Update Account" onclick="confirm('Update this account?')">
            </div>
        </form>
        <form onsubmit="return confirm('Promote to Admin?')" action="../handlers/_promoteUser.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $_GET['user_id']; ?>">
            <button>Promote to Admin</button>
        </form>
        <form onsubmit="return remove()" action="../handlers/_removeUser.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $_GET['user_id']; ?>">
            <button>Delete User</button>
        </form>
    </div>
    <script>
    function remove() {
        let confirmation = confirm("Delete User?");
        if (confirmation == true) {
            if (confirm("Are you sure? This cannot be undone")) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    </script>

</body>

</html>