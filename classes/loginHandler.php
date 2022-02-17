<?php

require ('classes/connection.php');

class loginHandler
{
    private $username;
    private $password;

    public function __construct($post)
    {
        $this->password = $post['password'];
        $this->username = $post['username'];

    }

    public function checkIfPersonIsInDatabase(): bool
    {
        $data = (new connection())
            ->fetchData(
                sprintf(
                    "SELECT * 
                            FROM person 
                            WHERE username LIKE '%s'
                            AND password LIKE '%s'
                                        ",
                                        $this->username,
                                        $this->password
                                        )
            );

        if ($data) {
            return true;
        } else {
            return false;
        }
    }
}