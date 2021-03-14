<?php
// require_once '../AutoLoader.php';
require_once 'C:\MAMP\htdocs\cst236\milestone\Database\UserDataService.php';
require_once 'models/User.php';

class UserBusinessService
{

    function searchByUserName($name)
    {
        $search = new UserDataService();

        return $arr = $search->findByUserName($name);
    }

    function getUserByID($id)
    {
        $search = new UserDataService();
        // echo "i got to here";
        $arr = $search->findByUserID($id);
        return $arr;
    }
}