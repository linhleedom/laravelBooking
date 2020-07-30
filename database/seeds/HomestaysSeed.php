<?php

use Illuminate\Database\Seeder;

class HomestaysSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= [
            // ['id', 'name', 'alias','keyword(SE0)','status','user_id','xaid','description','point'],
            ['1', 'Mường Thanh Luxury', 'muong-thanh-luxury','','1','3','00010','Muong Thanh Nha Trang Centre Hotel chiếm vị trí trung tâm ở thành phố Nha Trang, cách Bãi biển Nha Trang chỉ 200 m. Khách sạn có hồ bơi ngoài trời và trung tâm thể dục hiện đại.','4.5'],
            ['2', 'Vinpearl', 'vinpearl','biển đẹp','1','2','00013','Vinpearl Nha Trang Bay Resort là resort 5 sao cung cấp các phòng máy lạnh rộng rãi với Wi-Fi miễn phí.','4'],
            ['3', 'Pavilion Garden', '','','0','3','00016','Tọa lạc tại vị trí đắc địa ở thành phố Nha Trang, Pavillon Garden Hotel Nha Trang chỉ cách 3 phút đi bộ từ bãi biển Nha Trang và quảng trường 2/4.','0'],
        
        ];

        foreach($data as $key=> $val){
            DB::table('homestays')->insert(
                [
                    'id' => $data[$key][0],
                    'name' => $data[$key][1],
                    'alias' => $data[$key][2],
                    'keyword(SE0)' => $data[$key][3],
                    'status' => $data[$key][4],
                    'user_id' => $data[$key][5],
                    'xaid' => $data[$key][6],
                    'description' => $data[$key][7],
                    'point' => $data[$key][8],
                ]
            );
        }
    }
}
