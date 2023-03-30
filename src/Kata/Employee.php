<?php

namespace Kata;

class Employee
{
    public $Email;
    public $Firstname;
    public $Lastname;
    public $DateOfBirth;

    public function __construct($firstname, $lastname, $dateOfBirth, $email)
    {
        $this->Email = $email;
        $this->Firstname = $firstname;
        $this->Lastname = $lastname;
        $this->DateOfBirth = $dateOfBirth;
    }
}
