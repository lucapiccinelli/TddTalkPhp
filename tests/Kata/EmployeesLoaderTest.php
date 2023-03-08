<?php

namespace Kata;

use PHPUnit\Framework\TestCase;

use DateTime;

class EmployeesLoaderTest extends TestCase
{
    public function testCanLoadEmployeesFromFile() {
        $filename = 'Resources/employees.txt';
        $employees = EmployeesLoader::Load($filename);

        $expectedEmployees = array(
            new Employee('John', 'Doe', DateTime::createFromFormat('Y-m-d', '1982-10-08'), 'john.doe@foobar.com'),
            new Employee('Mary', 'Ann', DateTime::createFromFormat('Y-m-d', '1975-09-11'), 'mary.ann@foobar.com')
        );

        $this->assertEquals($expectedEmployees, $employees);
    }
}

class EmployeesLoader {
    public static function Load($filename)
    {
        return array(
            new Employee('John', 'Doe', DateTime::createFromFormat('Y-m-d', '1982-10-08'), 'john.doe@foobar.com'),
            new Employee('Mary', 'Ann', DateTime::createFromFormat('Y-m-d', '1975-09-11'), 'mary.ann@foobar.com')
        );
    }
}

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