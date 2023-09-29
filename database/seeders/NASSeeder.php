<?php

namespace Database\Seeders;

use App\Models\NAS;
use Illuminate\Database\Seeder;

class NASSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [
            [
                'nasname' => 'localhost',
                'secret' => 's3cr3t',
            ],
            [
                'nasname' => '127.0.0.1',
                'secret' => 's3cr3t',
            ],
            [
                'nasname' => '192.168.254.3',
                'secret' => 's3cr3t',
            ],
        ];

        foreach ($list as $attributes) {
            $obj = new NAS($attributes);
            $obj->save();
        }
    }

    /*
 $table->string('nasname', 128)->index('nasname');
            $table->string('shortname', 32)->nullable();
            $table->string('type', 30)->default('other');
            $table->integer('ports')->nullable();
            $table->string('secret', 60)->default('secret');
            $table->string('server', 64)->nullable();
            $table->string('community', 50)->nullable();
            $table->string('description', 200)->default('RADIUS Client');

    */
}
