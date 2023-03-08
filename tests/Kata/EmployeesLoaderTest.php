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