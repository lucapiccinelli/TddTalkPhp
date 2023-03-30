<?php

namespace Kata;

use DateTime;

class EmployeesLoader {
    public static function Load($filename)
    {
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
        $employeeLines = self::skipHeader($lines);

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

    private static function skipHeader($lines){
        return array_slice($lines, 1);
    }
}