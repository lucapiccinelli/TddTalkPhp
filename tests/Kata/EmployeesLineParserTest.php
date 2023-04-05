<?php

namespace Kata;

use PHPUnit\Framework\TestCase;
use DateTime;
use Kata\EmployeesLineParser;

class EmployeeLineParserTest extends TestCase
{
    public function testParsingALineReturnsAnEmployee()
    {
        $employeeLine = "Doe, John, 1982/10/08, john.doe@foobar.com";
        $employee = EmployeesLineParser::parseLineToEmployee($employeeLine);
        $expectedEmployee = new Employee(
            "John",
            "Doe",
            DateTime::createFromFormat('Y/m/d', '1982/10/08'),
            "john.doe@foobar.com"
        );

        $this->assertEquals($expectedEmployee, $employee);
    }
}
