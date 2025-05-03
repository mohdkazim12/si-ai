<?php

namespace App\Helpers;

class SchoolHelper
{
    public static function classList(): array
    {
        return [
            1 => 'Class 1',
            2 => 'Class 2',
            3 => 'Class 3',
            4 => 'Class 4',
            5 => 'Class 5',
            6 => 'Class 6',
            7 => 'Class 7',
            8 => 'Class 8',
            9 => 'Class 9',
            10 => 'Class 10',
            11 => 'Class 11',
            12 => 'Class 12',
        ];
    }

    public static function sectionList(): array
    {
        return [
            'A' => 'Section A',
            'B' => 'Section B',
            'C' => 'Section C',
            'D' => 'Section D',
        ];
    }

    public static function roles(): array
    {
        return [
            '1' => 'admin',
            '2' => 'teacher',
            '3' => 'student',
        ];
    }

}
