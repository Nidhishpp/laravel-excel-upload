<?php

namespace App\Imports;

use App\Profile;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProfileImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            $profile        = new Profile;
            $profile->name  = $row['name'];
            $profile->place = $row['place'];
            $profile->save();
        }

        return $rows->count();
    }
}
