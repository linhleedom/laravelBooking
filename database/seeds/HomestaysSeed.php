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
            // ['id', 'name', 'alias','avatar','keyword(SE0)','status','user_id','matp','maqh','xaid','title','description','point','status_pay'],
            ['1', 'Mường Thanh Luxury', 'muong-thanh-luxury','uploads/homestay/img1.jpg','','1','3','01TTT','007HH','00241','Tọa lạc tại vị trí đắc địa ở thành phố Nha Trang, Pavillon Garden Hotel Nha Trang chỉ cách 3 phút đi bộ từ bãi biển Nha Trang và quảng trường 2/4.','Muong Thanh Nha Trang Centre Hotel chiếm vị trí trung tâm ở thành phố Nha Trang, cách Bãi biển Nha Trang chỉ 200 m. Khách sạn có hồ bơi ngoài trời và trung tâm thể dục hiện đại.','4.5','0'],
            ['2', 'Vinpearl', 'vinpearl','uploads/homestay/img2.jpg','biển đẹp','1','2','01TTT','007HH','00241','Tọa lạc tại vị trí đắc địa ở thành phố Nha Trang, Pavillon Garden Hotel Nha Trang chỉ cách 3 phút đi bộ từ bãi biển Nha Trang và quảng trường 2/4.','Vinpearl Nha Trang Bay Resort là resort 5 sao cung cấp các phòng máy lạnh rộng rãi với Wi-Fi miễn phí.','4','0'],
            ['3', 'Pavilion Garden', '','uploads/homestay/img1.jpg','','01TTT','3','2','024HH','00688','Tọa lạc tại vị trí đắc địa ở thành phố Nha Trang, Pavillon Garden Hotel Nha Trang chỉ cách 3 phút đi bộ từ bãi biển Nha Trang và quảng trường 2/4.','Tọa lạc tại vị trí đắc địa ở thành phố Nha Trang, Pavillon Garden Hotel Nha Trang chỉ cách 3 phút đi bộ từ bãi biển Nha Trang và quảng trường 2/4.','4.5','0'],
            ['4', 'Pavilion Garden', '','uploads/homestay/img3.jpg','','01TTT','3','2','024HH','00691','Tọa lạc tại vị trí đắc địa ở thành phố Nha Trang, Pavillon Garden Hotel Nha Trang chỉ cách 3 phút đi bộ từ bãi biển Nha Trang và quảng trường 2/4.','Tọa lạc tại vị trí đắc địa ở thành phố Nha Trang, Pavillon Garden Hotel Nha Trang chỉ cách 3 phút đi bộ từ bãi biển Nha Trang và quảng trường 2/4.','3','0'],
            ['5', 'Pavilion Garden', '','uploads/homestay/img5.jpg','','01TTT','3','2','024HH','00692','Tọa lạc tại vị trí đắc địa ở thành phố Nha Trang, Pavillon Garden Hotel Nha Trang chỉ cách 3 phút đi bộ từ bãi biển Nha Trang và quảng trường 2/4.','Tọa lạc tại vị trí đắc địa ở thành phố Nha Trang, Pavillon Garden Hotel Nha Trang chỉ cách 3 phút đi bộ từ bãi biển Nha Trang và quảng trường 2/4.','4','0'],
            ['6', 'Pavilion Garden', '','uploads/homestay/img4.jpg','','01TTT','3','2','024HH','00715','Tọa lạc tại vị trí đắc địa ở thành phố Nha Trang, Pavillon Garden Hotel Nha Trang chỉ cách 3 phút đi bộ từ bãi biển Nha Trang và quảng trường 2/4.','Tọa lạc tại vị trí đắc địa ở thành phố Nha Trang, Pavillon Garden Hotel Nha Trang chỉ cách 3 phút đi bộ từ bãi biển Nha Trang và quảng trường 2/4.','5','0'],
            ['7', 'Pavilion Garden', '','uploads/homestay/img7.jpg','','01TTT','3','2','024HH','00736','Tọa lạc tại vị trí đắc địa ở thành phố Nha Trang, Pavillon Garden Hotel Nha Trang chỉ cách 3 phút đi bộ từ bãi biển Nha Trang và quảng trường 2/4.','Tọa lạc tại vị trí đắc địa ở thành phố Nha Trang, Pavillon Garden Hotel Nha Trang chỉ cách 3 phút đi bộ từ bãi biển Nha Trang và quảng trường 2/4.','6','0'],
        ];

        foreach($data as $key=> $val){
            DB::table('homestays')->insert(
                [
                    'id' => $data[$key][0],
                    'name' => $data[$key][1],
                    'alias' => $data[$key][2],
                    'avatar' => $data[$key][3],
                    'keyword(SE0)' => $data[$key][4],
                    'status' => $data[$key][5],
                    'user_id' => $data[$key][6],
                    'matp' => $data[$key][7],
                    'maqh' => $data[$key][8],
                    'xaid' => $data[$key][9],
                    'title' => $data[$key][10],
                    'description' => $data[$key][11],
                    'point' => $data[$key][12],
                    'status_pay' => $data[$key][13]
                ]
            );
        }
    }
}
