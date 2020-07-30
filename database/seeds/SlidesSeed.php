<?php

use Illuminate\Database\Seeder;

class SlidesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= [
            // ['url', 'slogan','status'],
            ['uploads/slider/slide1.jpg','Giá cả phải chăng','1'],
            ['uploads/slider/slide2.jpg','Giá cả phải chăng','0'],
            ['uploads/slider/slide3.jpg','Ưu đãi cực lớn','1'],
            
        ];

        foreach($data as $key=> $val){
            DB::table('slides')->insert(
                [
                    'url' => $data[$key][0],
                    'slogan' => $data[$key][1],
                    'status' => $data[$key][2]
                ]
            );
        }
    }
}
