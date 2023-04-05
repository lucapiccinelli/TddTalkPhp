<?php

namespace Kata;

use DateTime;

class EmployeesLineParser {
    public static function parseLineToEmployee($employeeLine) {
        $employeeTokens = array_map('trim', explode(",", $employeeLine));
        if(count($employeeTokens) < 4) {
            throw new \InvalidArgumentException("Some information is missing on this line: {$employeeLine}");
        }
        if(in_array("", $employeeTokens, true)) {
            throw new \InvalidArgumentException("Some information is missing on this line: {$employeeLine}");
        }
        try {
            $dateTime = DateTime::createFromFormat("Y/m/d", $employeeTokens[2]);
            if(!$dateTime){
                throw new \InvalidArgumentException("wrong date format: {$employeeTokens[2]}");
            }
            return new Employee(
                $employeeTokens[1],
                $employeeTokens[0],
                $dateTime,
                $employeeTokens[3]
            );
        } catch (Exception $e) {
            throw new \InvalidArgumentException("The date has an invalid format: {$employeeLine}", 0, $e);
        }
    }
}