<?php

class SubscribeForm
{

    public $database;

    public function __construct()
    {
        // Only change code below this line 

        // Instruction: add database connection into $this->database
        $this->database = connectToDB();

        // Only change code above this line
    }

    public function subscribe($email = '')
    {
        // Only change code below this line 

        $error = '';
        // Instruction: check if $email is empty or not, if empty, return 'Email is required'
        if(empty($email)){
            $error = 'Email is required';
        }
        
        if (!empty($error))
            return $error;

        $statement =  $this->database->prepare(
            'INSERT INTO users (email)
            VALUES (:email)'
        );

        $statement->execute([
            'email' => $email
        ]);

        return 'You have successfully subscribed to our newsletter';
        // Only change code above this line
    }
}