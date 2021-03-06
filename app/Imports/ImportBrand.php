<?php

namespace App\Imports;

use App\Models\Brand;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportBrand implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Brand([
            'meta_keywords' => $row[0],
            'brand_name' => $row[1],
            'brand_slug' => $row[2],
            'brand_desc' => $row[3],
            'brand_status' => $row[4],
        ]);
    }
}