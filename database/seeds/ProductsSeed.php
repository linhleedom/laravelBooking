<?php

use Illuminate\Database\Seeder;

class ProductsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= [
            // ['id', 'homestay_id', 'room_type_id','name','prices','discount','avatar','description','area','status'],
            ['1', '1', '1','Phòng luxury','200000','0','uploads/room/img.jpg','Với tầm nhìn ra biển, suite rộng rãi có ban công lớn, máy lạnh và phòng tắm riêng kèm vòi sen nước nóng.','16','1'],           
            ['2', '1', '2','Tiêu chuẩn','400000','5','uploads/room/img3.jpg','','16','1'],           
            ['3', '2', '3','Phòng 2','300000','10','uploads/room/img4.jpg','This double room has a satellite TV.','16','1'],           
            ['4', '2', '1','Phòng 3','250000','5','uploads/room/img8.jpg','Phòng Giường Đôi này có tầm nhìn ra hồ nước, ấm đun nước điện và ghế sofa.','20','0'],           
            ['5', '3', '3','phòng 4','500000','15','uploads/room/img3.jpg','This double room has a satellite TV.','25','1'],           
            ['6', '3', '3','phòng 4','500000','15','uploads/room/img4.jpg','This double room has a satellite TV.','25','1'],           
            ['7', '3', '3','phòng 4','500000','15','uploads/room/img.jpg','This double room has a satellite TV.','25','1'],           
            ['8', '3', '3','phòng 4','500000','15','uploads/room/img8.jpg','This double room has a satellite TV.','25','1'],           
            ['9', '3', '3','phòng 4','500000','15','uploads/room/img4.jpg','This double room has a satellite TV.','25','1'],           
            ['10', '3', '3','phòng 4','500000','15','uploads/room/img3.jpg','This double room has a satellite TV.','25','1'],           
        ];

        foreach($data as $key=> $val){
            DB::table('products')->insert(
                [
                    'id' => $data[$key][0],
                    'homestay_id' => $data[$key][1],
                    'room_type_id' => $data[$key][2],
                    'name' => $data[$key][3],
                    'prices' => $data[$key][4],
                    'discount' => $data[$key][5],
                    'avatar' => $data[$key][6],
                    'description' => $data[$key][7],
                    'area' => $data[$key][8],
                    'status' => $data[$key][9]
                ]
            );
        }
    }
}
