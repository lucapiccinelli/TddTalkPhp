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

    /**
     * @dataProvider notWellFormattedLinesProvider
     */
    public function testParsingALineNotWellFormattedThrowsAnArgumentException($employeeLine)
    {
        $this->expectException(\InvalidArgumentException::class);
        EmployeesLineParser::parseLineToEmployee($employeeLine);
    }

    public function notWellFormattedLinesProvider()
    {
        return [
            ["Doe, John, john.doe@foobar.com"],
            ["Doe, John,, john.doe@foobar.com"],
            ["Doe, John, banana, john.doe@foobar.com"]
        ];
    }
}

