<?php
//contact phone entity
require('..settings/db_class.php');

//add, edit, delete
/**
 * 
 */

 /**
  * A class with functions for manipulating phonebook entries
  * It includes delete, select and insert functions
  */
 class ContactPhoneClass extends db_connection 
 {
    //add function
    public function addContact_cls($uname,$uphone)
    {
        //write sql
        // $sql = "INSERT INTO phonebook VALUES('$uname','$uphone')";

        $sqltwo = "INSERT INTO phonebook ('pname','pphoned') VALUES ('$uname','$uphone')";
        
        //execute sql
        return $this->query($sqltwo);

    }

    // Delete function
    public function deleteContact_cls($uname,$uid)
    {
        # code...
        $sql = "DELETE FROM phonebook WHERE pid = '$uid',pname = '$uname' ";
        return $this->query($sql);
    }

    //every application needs a selectOne & selectAll
    public function selectOneContact_cls($uname,$uid)
    {
        # code...
        $sql = "SELECT 'pname','pphoned' FROM phonebook WHERE pid='$uid'  ";
        return $this->query($sql);
    }

    /**
     * A function to select all contacts in the phonebook
     */
    public function selectAllContact_cls()
    {
        # code...
        $sql = "SELECT * FROM phonebook";

        //execute sql
        $this->db_fetch_all($sql);
    }


    /**
     * A function to edit a specific contact in the phonebook
     * @param $uid The user ID to be edited
     * @param $uname The new user name
     * @param $uphone The new user's phone number
     */
    public function editContact_cls($uid,$uname,$uphone)
    {
        # code...
        $sql = "UPDATE phonebook set pname = '$uname',pphoned = '$uphone' WHERE pid='$uid'";

        return $this->query($sql);
    }


 }
