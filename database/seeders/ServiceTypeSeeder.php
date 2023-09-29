<?php

namespace Database\Seeders;

use App\Core\Data\ServiceTypeData;
use App\Models\ServiceType;
use Illuminate\Database\Seeder;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = ServiceTypeData::get();

        foreach ($list as $attributes) {
            $obj = new ServiceType($attributes);
            $obj->save();
        }
    }
}
