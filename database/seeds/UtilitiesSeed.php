<?php

use Illuminate\Database\Seeder;

class UtilitiesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= [
            // ['id', 'name', 'alias','status'],
            ['1', 'Wifi miễn phí', 'wifi-mien-phi','1'],
            ['2', 'Đỗ xe miễn phí', 'do-xe-mien-phi','1'],
            ['3', 'Bữa sáng miễn phí', 'bua-sang-mien-phi','1'],
            ['4', 'Có cho thuê xe đạp', 'co-cho-thue-xe-dap','0'],
            ['5', 'Gần chợ', 'gan-cho','1'],
            ['6', 'Gần trụ sở Công An', 'gan-tru-so-cong-an','1'],
           
        ];

        foreach($data as $key=> $val){
            DB::table('utilities')->insert(
                [
                    'id' => $data[$key][0],
                    'name' => $data[$key][1],
                    'alias' => $data[$key][2],
                    'status' => $data[$key][3],
                ]
            );
        }
    }
}
