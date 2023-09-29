<?php

namespace Database\Seeders;

use App\Core\Data\RadAcctSeedData;
use App\Models\RadAcct;
use Illuminate\Database\Seeder;

class RadAcctSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usernames = RadAcctSeedData::get();

        foreach ($usernames as $username) {
            for ($i = 0; $i < 100; ++$i) {
                $attributes = [];
                $attributes['acctsessionid'] = $this->getUUID(64);
                $attributes['acctuniqueid'] = $this->getUUID(32);
                $attributes['username'] = $username;

                $obj = new RadAcct($attributes);
                $obj->save();
            }
        }
    }

    public function getUUID(int $len = 32)
    {
        $string = fake()->uuid();
        $string = (strlen($string) > $len) ? substr($string, 0, $len) : $string;

        return $string;
    }
}
