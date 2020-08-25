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
        $this->call(UsersSeed::class);
        $this->call(UtilitiesSeed::class);
        $this->call(RoomTypesSeed::class);
        // $this->call(HomestaysSeed::class);
        // $this->call(ProductsSeed::class);
        // $this->call(UtiProSeed::class);
        // $this->call(BlogsSeed::class);
        // $this->call(ImagesHomestaySeed::class);
        // $this->call(ImagesBlogSeed::class);
        // $this->call(BillsSeed::class);
        // $this->call(OrdersSeed::class);
        // $this->call(RatingsSeed::class);
        // $this->call(SlidesSeed::class);
    }
}
