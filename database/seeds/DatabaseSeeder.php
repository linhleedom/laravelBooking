<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProvincesSeed::class);
        $this->call(DistrictsSeed::class);
        $this->call(WardsSeed::class);
    }
}
