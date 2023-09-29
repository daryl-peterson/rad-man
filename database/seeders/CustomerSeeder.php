<?php

namespace Database\Seeders;

use App\Core\Data\CustomerData;
use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = CustomerData::get();

        foreach ($customers as $attributes) {
            $obj = new Customer($attributes);
            $obj->save();
        }
    }
}
