<?php
class DB
{
    private $db;

    function __construct()
    {
        $dbdir = dirname($_SERVER['SCRIPT_FILENAME']) . '\\Database.db';
        $dbExists = file_exists($dbdir);
        $this->db = new SQLite3($dbdir);

        if (!$dbExists) {
            $this->db->exec("CREATE TABLE TUsers (UserName TEXT NOT NULL UNIQUE, UserPassword TEXT NOT NULL, UserAdressName TEXT, UserPLZ TEXT, UserVillage TEXT, UserStreet TEXT, UserStreetNr TEXT, PRIMARY KEY(UserName));");
        }
    }

    function userExists($username)
    {
        $userCount = $this->db->query("SELECT COUNT(*) AS userCount FROM TUsers WHERE UserName = '$username'");
        $userCount = $userCount->fetchArray();
        // var_dump($userCount);
        return $userCount["userCount"] > 0;
    }

    function validateUser($username, $password)
    {
        if ($this->userExists($username)) {
            $user = $this->getUserInfo($username);
            return password_verify($password, $user['UserPassword']);
        } else {
            return false;
        }
    }

    function getUserInfo($username)
    {
        if ($this->userExists($username)) {
            $user = $this->db->query("SELECT * FROM TUsers WHERE UserName = '$username';");
            return $user->fetchArray();
        } else {
            throw new Exception("UserNameNotFound", 1);
        }
    }

    function createUser($username, $password)
    {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
        $this->db->exec("INSERT INTO TUsers (UserName, UserPassword) VALUES ('$username', '$passwordHash')");
    }

    function addAdressToUser($username, $adressName, $plz, $village, $street, $streetNr)
    {
        if ($this->userExists($username)) {
            $this->db->exec("UPDATE TUsers SET UserAdressName = '$adressName', UserPLZ = '$plz', UserVillage = '$village', UserStreet = '$street', UserStreetNr = '$streetNr' WHERE UserName = '$username';");
        } else {
            throw new Exception("UserNameNotFound", 1);
        }
    }
}

// $db = new DB(); // init DB