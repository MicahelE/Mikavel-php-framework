<?php

class User {
    private $db;
    public function __construct()
    {
$this->db = new Database;
    }

public function register($data)
{
    $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
// Bind Values
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':password', $data['password']);

    // Execute
    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
    
}

    // Find user by email
    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        // $row =  $this->db->single();
        $row =  $this->db->resultSet();
        $count= count($row);
// return $row;
        // Check row
        if ($count > 0) {
            return true;
        } else {
            return false;
        }


// Alternative code that didnt work

        // return $this->db->rowCount() ;
        

        //  $this->db->query('SELECT COUNT(*) FROM users WHERE email = :email');
        // $this->db->bind(':email', $email);
        // return $this->db->fetchColumn();

        // $row =  $this->db->fetchColumn();
        // if ($this->db->fetchColumn() > 0) {
        //         return true;
        //     } else {
        //         return false;
        //     }
            // return $row();
    }
}