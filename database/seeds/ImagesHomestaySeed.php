<?php

use Illuminate\Database\Seeder;

class ImagesHomestaySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= [
            // ['url', 'homestay_id','status'],
            ['uploads/homestay/img1.jpg', '1','1'],
            ['uploads/homestay/img2.jpg', '1','1'],
            ['uploads/homestay/img3.jpg', '1','0'],
            ['uploads/homestay/img4.jpg', '1','1'],
            ['uploads/homestay/img5.jpg', '2','1'],
            ['uploads/homestay/img6.jpg', '2','1'],
            ['uploads/homestay/img7.jpg', '2','1'],
        ];

        foreach($data as $key=> $val){
            DB::table('images_homestay')->insert(
                [
                    'url' => $data[$key][0],
                    'homestay_id' => $data[$key][1],
                    'status' => $data[$key][2],
                ]
            );
        }
    }
}
