<?php

namespace Database\Seeders;

use App\Models\CrmStatus;
use Illuminate\Database\Seeder;

class CrmStatusTableSeeder extends Seeder
{
    public function run()
    {
        $crmStatuses = [
            [
                'id'         => 1,
                'name'       => 'Lead',
                'created_at' => '2020-10-06 12:40:53',
                'updated_at' => '2020-10-06 12:40:53',
            ],
            [
                'id'         => 2,
                'name'       => 'Customer',
                'created_at' => '2020-10-06 12:40:53',
                'updated_at' => '2020-10-06 12:40:53',
            ],
            [
                'id'         => 3,
                'name'       => 'Partner',
                'created_at' => '2020-10-06 12:40:53',
                'updated_at' => '2020-10-06 12:40:53',
            ],
        ];

        CrmStatus::insert($crmStatuses);
    }
}
