<?php

namespace Kata;

use PHPUnit\Framework\TestCase;

use Kata\Employee;
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
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
        $employeeLines = array_slice($lines, 1);

        return array_map('self::parseLineToEmployee', $employeeLines);
    }

    public static function parseLineToEmployee($employeeLine) {
        $employeeTokens = array_map('trim', explode(",", $employeeLine));
        $dateTime = DateTime::createFromFormat("Y/m/d", $employeeTokens[2]);
        return new Employee(
            $employeeTokens[1],
            $employeeTokens[0],
            $dateTime,
            $employeeTokens[3]
        );
    }
}