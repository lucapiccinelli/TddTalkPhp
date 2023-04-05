<?php

namespace Kata;

use DateTime;
use Kata\EmployeesLineParser;

class EmployeesLoader {
    public static function Load($filename)
    {
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
        $employeeLines = self::skipHeader($lines);

        return array_map('Kata\EmployeesLineParser::parseLineToEmployee', $employeeLines);
    }

    private static function skipHeader($lines){
        return array_slice($lines, 1);
    }
}