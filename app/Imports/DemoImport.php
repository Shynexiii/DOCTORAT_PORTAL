<?php

namespace App\Imports;

use App\DatabaseDemo;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DemoImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        dd($row);
        return new DatabaseDemo([
            // 'first_name'  => $row['first_name'],
            'Last name'   => $row['last_name'],
            'Password'    => Hash::make($row['password']),
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }
}