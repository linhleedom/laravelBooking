<?php

use Illuminate\Database\Seeder;

class RoomTypesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= [
            // ['id', 'name', 'alias','keyword(SE0)','status'],
            ['1', 'Phòng 1 giường đôi', 'phong-1-giuong-doi','đôi vợ chồng trẻ','1'],
            ['2', 'Phòng 2 giường đôi', 'phong-2-giuong-doi','','1'],
            ['3', 'Phòng 2 giường đơn', 'phong-2-giuong-don','','1'],
            ['4', 'Phòng 2 giường đôi', 'phong-2-giuong-doi','nhóm bạn','0'],
            ['5', 'Nguyên căn hộ', 'nguyen-can-ho','tập thể công ty','1'],
        ];

        foreach($data as $key=> $val){
            DB::table('room_types')->insert(
                [
                    'id' => $data[$key][0],
                    'name' => $data[$key][1],
                    'alias' => $data[$key][2],
                    'keyword(SE0)' => $data[$key][3],
                    'status' => $data[$key][4],
                ]
            );
        }
    }
}
