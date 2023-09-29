<?php

namespace Database\Seeders;

use App\Core\Data\ServiceData;
use App\Models\RadGroupReply;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = ServiceData::get();

        foreach ($list as $service) {
            $attributes = [
                'type_id' => $service['type_id'],
                'name' => $service['name'],
            ];
            $obj = new Service($attributes);
            $obj->save();

            if (!isset($service['def'])) {
                continue;
            }

            $defs = $service['def'];

            foreach ($defs as $def) {
                $attributes = $def;
                $attributes['groupname'] = $service['name'];
                $obj = new RadGroupReply($attributes);
                $obj->save();
            }
        }
    }
}
