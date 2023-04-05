<?php

namespace Kata;

use DateTime;

class EmployeesLineParser {
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

    private static function skipHeader($lines){
        return array_slice($lines, 1);
    }
}